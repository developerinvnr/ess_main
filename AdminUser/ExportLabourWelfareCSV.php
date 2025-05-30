<?php
require_once 'config/config.php';
$sY = mysql_query('select * from hrm_year where YearId=' . $_REQUEST['Y'] . '', $con);
$rY = mysql_fetch_assoc($sY);
$FD = date('Y', strtotime($rY['FromDate']));
$TD = date('Y', strtotime($rY['ToDate']));
$PRD = $FD . '-' . $TD;
/*************************************************************************************************************/
if ($_REQUEST['action'] = 'ExportReportAll') {
    if ($_REQUEST['value'] == 'All') {
        $DeptV = 'All_Employee';
    } else {
        $sqlDeptV = mysql_query('select department_code as DepartmentCode from core_departments where id=' . $_REQUEST['value'], $con);
        $resDeptV = mysql_fetch_assoc($sqlDeptV);
        $DeptV = $resDeptV['DepartmentCode'];
    }

    #  Create the Column Headings
    $csv_output .= '"SNo.",';
    $csv_output .= '"EmpCode",';
    $csv_output .= '"Name",';
    
    $csv_output .= '"Status",'; 
    $csv_output .= '"Function",'; 
    $csv_output .= '"Vertical",'; 
    $csv_output .= '"Department",'; 
    $csv_output .= '"Sub-Department",'; 
    $csv_output .= '"Section",';
    
    $csv_output .= '"Father Name",';
    $csv_output .= '"Parmanent Address",';
    $csv_output .= '"State",';
    $csv_output .= '"City",';
    $csv_output .= '"PinNo",';
    $csv_output .= '"Aadhar",';
    $csv_output .= '"Mobile",';
    $csv_output .= '"Cast",';
    $csv_output .= '"Marital Status",';
    $csv_output .= '"Gender",';
    $csv_output .= '"DOB",';
    $csv_output .= '"DOJ",';
    
    $csv_output .= '"State",';
    $csv_output .= '"BU",';
    $csv_output .= '"Zone",';
    $csv_output .= '"Region",';
    $csv_output .= '"HQ",';
    $csv_output .= '"Sub-Location",';
 
    $csv_output .= '"Bank Name",';
    $csv_output .= '"A/C No",';
    $csv_output .= '"IFSC",';
    $csv_output .= '"Branch",';
    $csv_output .= '"Branch Address",';
    $csv_output .= '"Basic",';
    $csv_output .= '"ESIC",';
    $csv_output .= "\n";

    # Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );
    
    if($_REQUEST['value']>0){ $Qdept="g.DepartmentId=".$_REQUEST['value']; }
  elseif($_REQUEST['value']=='All'){ $Qdept="1=1"; }
  
  if($_REQUEST['sts']=='All'){ $QSts="e.EmpStatus!='De'"; }
  else{ $QSts="e.EmpStatus='".$_REQUEST['sts']."'"; }

$result=mysql_query("select e.*, p.*,g.*,c.*,f.*,ct.BAS_Value, function_name, vertical_name, department_name, sub_department_name, section_name, designation_name, grade_name, state_name, city_village_name, business_unit_name, zone_name, region_name, territory_name from hrm_employee_general g 
  left join hrm_employee_contact c ON g.EmployeeID=c.EmployeeID 
  left join hrm_employee_family f ON g.EmployeeID=f.EmployeeID 
  left join hrm_employee e ON g.EmployeeID=e.EmployeeID 
  left join hrm_employee_personal p on g.EmployeeID=p.EmployeeID
  left join hrm_employee_ctc ct ON g.EmployeeID=ct.EmployeeID 
  left join core_functions fun on g.EmpFunction=fun.id
  left join core_verticals ver on g.EmpVertical=ver.id
  left join core_departments dept on g.DepartmentId=dept.id
  left join core_sub_department_master subdept on g.SubDepartmentId=subdept.id
  left join core_section sec on g.EmpSection=sec.id
  left join core_designation desig on g.DesigId=desig.id
  left join core_grades gr on g.GradeId=gr.id
  left join core_states st on g.CostCenter=st.id
  left join core_city_village_by_state vlg on g.HqId=vlg.id 
  left join core_business_unit Bu on g.BUId=Bu.id
  left join core_zones Zn on g.ZoneId=Zn.id
  left join core_regions Rg on g.RegionId=Rg.id
  left join core_territory Tr on g.TerrId=Tr.id
  where ".$QSts." AND ".$Qdept." AND e.CompanyId=".$_REQUEST['C']." AND ct.Status='A' group by e.EmpCode order by e.ECode ASC", $con); 
    

    $Sno = 1;
    while ($res = mysql_fetch_array($result)) {
        if($res['Sname']==''){ $Ename=trim($res['Fname']).' '.trim($res['Lname']); }
else{ $Ename=trim($res['Fname']).' '.trim($res['Sname']).' '.trim($res['Lname']); }


        if ($res['RepEmployeeID'] > 0) {
            $sqlRn = mysql_query('select DesigId from hrm_employee_general where EmployeeID=' . $res['RepEmployeeID'], $con);
            $resRn = mysql_fetch_assoc($sqlRn);
            $sqlDesigR = mysql_query('select DesigCode from hrm_designation where DesigId=' . $resRn['DesigId'], $con);
            $resDesigR = mysql_fetch_assoc($sqlDesigR);
        }
 
        $sqlS1 = mysql_query('select StateName from hrm_state where StateId=' . $res['CurrAdd_State'], $con);
        $resS1 = mysql_fetch_assoc($sqlS1);
        $sqlC1 = mysql_query('select CityName from hrm_city where CityId=' . $res['CurrAdd_City'], $con);
        $resC1 = mysql_fetch_assoc($sqlC1);
        $sqlS2 = mysql_query('select StateName from hrm_state where StateId=' . $res['ParAdd_State'], $con);
        $resS2 = mysql_fetch_assoc($sqlS2);
        $sqlC2 = mysql_query('select CityName from hrm_city where CityId=' . $res['ParAdd_City'], $con);
        $resC2 = mysql_fetch_assoc($sqlC2);
       
        $sqlF = mysql_query('select * from hrm_employee_family2 where EmployeeID=' . $res['EmployeeID'], $con);
        $csv_output .= '"' . str_replace('"', '""', $Sno) . '",';
          $csv_output .= '"' . str_replace('"', '""', strtoupper($res['EmpCode'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($Ename)) . '",';
        
        
$csv_output .= '"'.str_replace('"', '""', $res['EmpStatus']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['function_name']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['vertical_name']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['department_name']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['sub_department_name']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['section_name']).'",';


        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['FatherName'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['ParAdd'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($resS2['StateName'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($resC2['CityName'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['ParAdd_PinNo'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['AadharNo'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', $res['MobileNo_Vnr']) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['Categoryy'])) . '",';
        if ($res['Married'] == 'Y') {
            $Marr = 'Married';
        } else {
            $Marr = 'Single';
        }
   
        $csv_output .= '"' . str_replace('"', '""', strtoupper($Marr)) . '",';

        if ($res['Gender'] == 'M') {
            $Gender = 'Male';
        } else {
            $Gender = 'Female';
        }
        $csv_output .= '"' . str_replace('"', '""', strtoupper($Gender)) . '",';
        $csv_output .= '"' . str_replace('"', '""', date('d-M-y', strtotime($res['DOB']))) . '",';
        $DOJ = '';
        if ($res['DateJoining'] != '1970-01-01' and $res['DateJoining'] != '0000-00-00') {
            if ($res['RetiStatus'] == 'Y') {
                $DOJ = date('d-M-y', strtotime($res['RetiDate']));
            } else {
                $DOJ = date('d-M-y', strtotime($res['DateJoining']));
            }
        } else {
            $DOJ = '';
        }
        $csv_output .= '"' . str_replace('"', '""', $DOJ) . '",';
        
        
$csv_output .= '"'.str_replace('"', '""', $res['state_name']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['business_unit_name']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['zone_name']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['region_name']).'",';
if($res['TerrId']>0){$Hq=$res['territory_name'];}else{$Hq=$res['city_village_name']; }
$csv_output .= '"'.str_replace('"', '""', $Hq).'",';
$csv_output .= '"'.str_replace('"', '""', $res['SubLocation']).'",';
      
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['BankName'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['AccountNo'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['BankIfscCode'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['BranchName'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['BranchAdd'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', $res['BAS_Value']) . '",';
        $csv_output .= '"' . str_replace('"', '""', $res['EsicNo']) . '",';

        $csv_output .= "\n";
        $Sno++;
    }
    # Close the MySql connection
    mysql_close($con);
    # Set the headers so the file downloads
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Content-Length: ' . strlen($csv_output));
    header('Content-type: text/x-csv');
    header('Content-Disposition: attachment; filename=LabourWelfareReport_' . $DeptV . '.csv');
    echo $csv_output;
    exit();
}
?>
