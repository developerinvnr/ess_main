<?php 
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');


$xls_filename = 'Employee_Assest.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEmpCode\tName\tDepartment\tAsset Name\tStatus\tLimit";
print("\n");

 if($_REQUEST['DpId']=='All') { $dept='1=1';}
 elseif($_REQUEST['DpId']>0) { $dept="g.DepartmentId=".$_REQUEST['DpId']; }
 
  $sql = mysql_query("SELECT e.EmployeeID,EmpCode,Fname,Sname,Lname,HqId,DepartmentId,DesigId,Gender,Married FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID WHERE e.EmpStatus='A' AND e.CompanyId=".$_REQUEST['c']." AND ".$dept, $con);
  
 $Sno=1; while($res=mysql_fetch_array($sql))
 { 
 
  $schema_insert = "";
  $schema_insert .= $Sno.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['Fname'].' '.$res['Sname'].' '.$res['Lname'].$sep;		
 
  $sD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'],$con); $rD=mysql_fetch_assoc($sD);
 
  $schema_insert .= $rD['DepartmentCode'].$sep;
  
  $sqlA=mysql_query("select * from hrm_asset_name where AssetNId=".$_REQUEST['a'], $con); $resA=mysql_fetch_assoc($sqlA);
  $schema_insert .= $resA['AssetName'].$sep;
   
  $Sts='';
  if($_REQUEST['a']!=11 AND $_REQUEST['a']!=12 AND $_REQUEST['a']!=18)
  { $sa=mysql_query("select * from hrm_asset_name_emp where EmployeeID=".$res['EmployeeID']." AND AssetNId=".$_REQUEST['a'], $con); 
    $rowa=mysql_num_rows($sa);
    if($rowa>0)
    {   $ra=mysql_fetch_array($sa);
        $Sts=$ra['AssetESt'];
    }
    
  } 
  elseif($_REQUEST['a']==11 OR $_REQUEST['a']==12 OR $_REQUEST['a']==18){
      $sqlElig=mysql_query("select Mobile_Hand_Elig,Mobile_Hand_Elig_Rs from hrm_employee_eligibility where EmployeeID=".$res['EmployeeID']." AND Status='A'",$con); $resElig=mysql_fetch_assoc($sqlElig);   
      $Sts=$resElig['Mobile_Hand_Elig'];
  }	  
  
  $schema_insert .= $Sts.$sep;
  
  $Limit='';
  if($_REQUEST['a']!=11)
  { 
      if($rowa>0){ $sa=mysql_query("select * from hrm_asset_name_emp where EmployeeID=".$res['EmployeeID']." AND AssetNId=".$resA['AssetNId'], $con); $ra=mysql_fetch_assoc($sa); $Limit=intval($ra['AssetELimit']); }
  }
  elseif($_REQUEST['a']==11)
  {
    if($resElig['Mobile_Hand_Elig']=='Y'){ $Limit=$resElig['Mobile_Hand_Elig_Rs']; }
  }
  $schema_insert .= $Limit.$sep;
  
  
  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $Sno++;
 }

?>