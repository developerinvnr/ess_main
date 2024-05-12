<?php require_once('../AdminUser/config/config.php'); 
if(isset($_POST['AppId']) && $_POST['AppId']!=""){  $AppId = $_POST['AppId'];
$sql=mysql_query("select * from hrm_employee where EmployeeId=".$AppId, $con); $res=mysql_fetch_assoc($sql); ?>
<font style="font-family:Times New Roman; font-size:14px; font-weight:bold;color:#440088;">Appraiser Name :</font>
<font style="font-family:Times New Roman; font-size:14px; font-weight:bold;color:#005E00;"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></font>
<?php } 
if(isset($_POST['RevId']) && $_POST['RevId']!=""){  $RevId = $_POST['RevId'];
$sql=mysql_query("select * from hrm_employee where EmployeeId=".$RevId, $con); $res=mysql_fetch_assoc($sql); ?>
<font style="font-family:Times New Roman; font-size:14px; font-weight:bold;color:#440088;">Reviewer Name :</font>
<font style="font-family:Times New Roman; font-size:14px; font-weight:bold;color:#005E00;"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></font>
<?php } 
if(isset($_POST['PmsId']) && $_POST['PmsId']!=""){  
$PmsId = $_POST['PmsId']; $EmpId = $_POST['EmpId']; $ComId = $_POST['ComId']; $No = $_POST['No']; $DesigId = $_POST['DesigId']; $GradeId = $_POST['GradeId'];

//$Justi = $_POST['Justi']; 
$search =  '!"#$%&/=?*+\'-;:_' ;
$search = str_split($search);
$str_Remark = $_POST['Justi'];  
$Justi=str_replace($search, "", $str_Remark);

echo '<input type="hidden" id="NoId" value="'.$No.'" />'; 

$sqlUp=mysql_query("update hrm_employee_pms set Hod_EmpDesignation=".$DesigId.", Hod_EmpGrade=".$GradeId.", Hod_Justification='".$Justi."', HodSubmit_PramotionStatus=2, HodSubmit_PramotionDate='".date("Y-m-d")."', HodSubmit_IncStatus=1 where EmpPmsId=".$PmsId." AND EmployeeID=".$EmpId, $con);  
if($sqlUp){echo 'Promotion data save successfully...';}

 } ?>

