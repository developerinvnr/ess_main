<?php session_start();
if ($_SESSION['login'] = true) {
  require_once('config/config.php');
} else {
  $msg = "Session Expiry...............";
}
include("../function.php");
include('codeEncDec.php');
if (check_user() == false) {
  header('Location:../index.php');
}
require_once('logcheck.php');
if ($_SESSION['logCheckUser'] != $logadmin) {
  header('Location:../index.php');
}
if ($_SESSION['login'] = true) {
  require_once('AdminMenuSession.php');
} else {
  $msg = "Session Expiry...............";
}
if ($_SESSION['login'] = true) {
  require_once('PhpFile/CompanyDetailsP.php');
}

mysql_query("SET SESSION sql_mode = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

?>

<html>

<head>
  <title><?php include_once('../Title.php'); ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link type="text/css" href="css/body.css" rel="stylesheet" />
  <link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet" />

  <script src="https://kit.fontawesome.com/ffb012e977.js" crossorigin="anonymous"></script>
</head>

<body class="body">
  <table class="table">
    <tr>
      <td>
        <table class="menutable">
          <tr>
            <td><?php if ($_SESSION['login'] = true) {
              require_once("AMenu.php");
            } ?></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td valign="top">
        <table width="100%" style="margin-top:0px;" border="0">
          <tr>
            <td valign="top"><?php if ($_SESSION['login'] = true) {
              require_once("AWelcome.php");
            } ?></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>

  <div class="container">
    <div class="row">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <p class="mb-0" style="font-size:16px;">Core APIs List</p>
          <button class="btn btn-light btn-sm" id="syncAPI"><i class="fas fa-sync"></i> Sync</button>
        </div>
        <div class="card-body">
          <table class="table table-sm table-striped" id="mytable">
            <thead>
              <tr>
                <th class="text-center"><i class="fa-solid fa-list-check" style="font-size:19px;"></i></th>
                <th>S.No</th>
                <th>API Name</th>
                <th>API End Point</th>
                <th>Parameter</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
                <?php
                    $sql = mysql_query("Select * from core_apis",$con);
                   while($res = mysql_fetch_assoc($sql)) { 
                ?>
                <tr>
                    <td class="text-center">
                        <input type="checkbox" name="apis" value="<?= $res['api_end_point']?>" class="form-check-input">
                    </td>
                    <td class="text-center"><?= $res['id']; ?></td>
                    <td><?= $res['api_name']; ?></td>
                    <td><?= $res['api_end_point']; ?></td>
                    <td><?= $res['parameters']; ?></td>
                    <td><?= $res['description']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <td class="text-center">
                    <button class="btn btn-sm btn-primary" id="import_btn">Import Data</button>
                </td>
                <td colspan="5"></td>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    <script>
        $(document).on('click', '#syncAPI', function () {
            $.ajax({
                url: 'core_api_ajax.php',
                type: 'POST',
                data: {
                    'action': 'sync_api',
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        alert("API synchronized successfully...!!");
                    } else {
                        alert("Something went wrong...!!");
                    }
                },
                error: function(xhr, status, error) {
                    // This handles network or server errors
                    alert("Error: "  + error);
                }
            });
        });
        
           $(document).on('click', '#import_btn', function () {
            var api_end_points = [];
           
            $("input[name='apis']").each(function () {
                if ($(this).prop("checked") == true) {
                    var value = $(this).val();
                    api_end_points.push(value);
                }
            });
            if (api_end_points.length > 0) {
                if (confirm('Are you sure to import selected api data?')) {
                    $.ajax({
                       url: 'core_api_ajax.php',
                        type: 'POST',
                        data: {
                            'action': 'import_data',
                             api_end_points: api_end_points,
                        },
                        success: function (data) {
                            if (data.status == 400) {
                               alert("Something went wrong...!!");
                            } else {
                                alert("Data imported successfully...!!");
                            }
                        }
                    });
                }

            } else {
                alert('No API Selected!\nPlease select atleast one api to proceed.');
            }

           });

    </script>
</body>

</html>