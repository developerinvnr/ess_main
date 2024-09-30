<?php

require_once('config/config.php');
if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    $result = mysql_query("Select api_key,base_url FROM core_api_setup LIMIT 1", $con);
    if (!$result || mysql_num_rows($result) == 0) {
        echo json_encode(['status' => 400, 'msg' => 'Failed to retrieve API setup.']);
    } else {
        $apiData = mysql_fetch_assoc($result);
        $apiKey = $apiData['api_key'];
        $baseUrl = $apiData['base_url'];
    }
    if ($action == 'sync_api') {

        // Initialize cURL to make the GET request with headers
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$baseUrl/api/project/apis");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "api-key: $apiKey",
            "Accept: application/json"
        ]);

        $response = curl_exec($ch);
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Check if the request was successful
        if ($httpStatus != 200) {
            // Handle unsuccessful responses
            error_log("API sync failed: HTTP Status $httpStatus. Response: $response");
            die(json_encode(['status' => 400, 'msg' => 'Failed to synchronize APIs.']));
        }

        // Decode the JSON response
        $data = json_decode($response, true);
        // Validate the structure of the response
        if (!isset($data['api_list']) || !is_array($data['api_list'])) {
            error_log("Invalid API response structure. Response: " . json_encode($data));
            die(json_encode(['status' => 400, 'msg' => 'Unexpected API response format.']));
        }
        // Truncate core_apis table
        $truncateQuery = "TRUNCATE TABLE core_apis";
        mysql_query($truncateQuery, $con);
        foreach ($data['api_list'] as $api) {
            $apiId = $api['id'];
            $apiName = $api['api_name'];
            $apiEndPoint = $api['api_end_point'];
            $description = $api['description'];
            $parameters = $api['parameters']; // Encode parameters to JSON string
            // Insert query
            $insertQuery = "
                INSERT INTO core_apis (api_id, api_name, api_end_point, description, parameters)
                VALUES ($apiId, '$apiName', '$apiEndPoint', '$description', '$parameters')
            ";

            // Execute insert query
            mysql_query($insertQuery, $con);
        }


        echo json_encode(['status' => 200]);

    } elseif ($action == 'import_data') {
      
        $api_end_points = $_POST['api_end_points'];
    
        foreach ($api_end_points as $api) {
                $prefix = "core_"; // Define the prefix
               $query = mysql_query("SELECT parameters FROM core_apis WHERE api_end_point='" . mysql_real_escape_string($api) . "'", $con);

                $apiData1 = mysql_fetch_assoc($query);
                $parameter  = $apiData1['parameters'];
              
            // Case 1: If a parameter is provided, fetch the IDs from the corresponding table
            if ($parameter != null) {
                
                $tableName = $prefix . rtrim($parameter, '_id') . "s"; // e.g., 'state_id' becomes 'core_states'
             
                // Fetch all IDs from the corresponding table
                $idQuery = "SELECT `id` FROM $tableName";
                $idResult = mysql_query($idQuery, $con);

                if (!$idResult || mysql_num_rows($idResult) == 0) {
                    die(json_encode(['status' => 400, 'msg' => "No records found in table $tableName"]));
                }

                // Loop through each ID from the table and fetch data from the API
                while ($row = mysql_fetch_assoc($idResult)) {
                    $id = $row['id'];
                  
                    // Initialize cURL to make the GET request with the ID as a parameter
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "$baseUrl/api/$api?$parameter=$id"); // Append ID in API call
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, [
                        "api-key: $apiKey",
                        "Accept: application/json"
                    ]);

                    $response = curl_exec($ch);
                    $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    curl_close($ch);

                    // Process the API response
                    processApiResponse($response, $httpStatus, $api, $parameter, $id);
                }
            }
            // Case 2: No parameter is provided, make a simple API call without any parameters
            else {
                // Initialize cURL to make the GET request without parameters
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "$baseUrl/api/$api"); // No parameter in API call
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    "api-key: $apiKey",
                    "Accept: application/json"
                ]);

                $response = curl_exec($ch);
                $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);
  
                // Process the API response
                processApiResponse($response, $httpStatus, $api);
            }
        }
    }
}

  // Function to process API response and insert/update records
 function processApiResponse($response, $httpStatus, $api, $parameter = null, $id = null)
 {
            global $con;
           
            // Check if the request was successful
            if ($httpStatus != 200) {
                $errorMsg = $parameter && $id ? "$parameter=$id" : "No parameter";
                error_log("API sync failed for $api with $errorMsg: HTTP Status $httpStatus. Response: $response");
                die(json_encode(['status' => 400, 'msg' => 'Failed to synchronize APIs.']));
            }

            // Decode the JSON response
            $data = json_decode($response, true);
         
            // Validate the structure of the response
            if (!isset($data['list']) || !is_array($data['list'])) {
                $errorMsg = $parameter && $id ? "$parameter=$id" : "No parameter";
                error_log("Invalid API response structure for $api with $errorMsg. Response: " . json_encode($data));
                die(json_encode(['status' => 400, 'msg' => 'Unexpected API response format.']));
            }

            // Extract column names from the first item
            $columns = array_keys($data['list'][0]);

            // Dynamically create a table if it doesn't exist
            $createTableQuery = "CREATE TABLE IF NOT EXISTS core_$api (";
            foreach ($columns as $column) {
                $createTableQuery .= "`$column` VARCHAR(255),"; // Assuming all fields as VARCHAR(255), adjust as needed
            }
            $createTableQuery .= "PRIMARY KEY (`id`))"; // Assuming an `id` field as the primary key

            mysql_query($createTableQuery, $con);

            // Prepare insert or update queries
            foreach ($data['list'] as $item) {
                $columns = implode(",", array_keys($item)); // Get column names
                $values = implode("','", array_map('mysql_real_escape_string', array_values($item))); // Escape values

                // Construct the INSERT INTO ... ON DUPLICATE KEY UPDATE query
                $updateQueryParts = [];
                foreach ($item as $column => $value) {
                    $escapedValue = mysql_real_escape_string($value);
                    $updateQueryParts[] = "`$column` = '$escapedValue'";
                }
                $updateQuery = implode(", ", $updateQueryParts);

                $insertQuery = "INSERT INTO core_$api ($columns) VALUES ('$values') 
                                ON DUPLICATE KEY UPDATE $updateQuery";

                mysql_query($insertQuery, $con);
            }

            echo json_encode(['status' => 200, 'msg' => "APIs synchronized successfully" . ($parameter && $id ? " for $parameter=$id" : "")]);
        }
?>