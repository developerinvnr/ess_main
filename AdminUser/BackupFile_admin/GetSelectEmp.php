<?php
require_once('config/config.php');
if(isset($_POST['id']) && $_POST['id']!=""){ $id=$_POST['id']; //$YId=$_POST['YId']; $UId=$_POST['UId']; 
$sql=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,DateJoining,DateConfirmationYN,DateConfirmation,GradeId,HqId,Gender,DR,Married,ReportingName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$id, $con);  $res=mysql_fetch_assoc($sql);
$Ename = $res['Fname'].'&nbsp;'.$res['Sname'].'&nbsp;'.$res['Lname']; $LEC=strlen($res['EmpCode']); 
if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$Ename; 
if($LEC==1){$EC='000'.$res['EmpCode'];} if($LEC==2){$EC='00'.$res['EmpCode'];} if($LEC==3){$EC='0'.$res['EmpCode'];} if($LEC>=4){$EC=$res['EmpCode'];}

$sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
$sqlDe=mysql_query("select DesigName from hrm_designation where DesigId=".$res['DesigId'], $con); $resDe=mysql_fetch_assoc($sqlDe);
$sqlH=mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'], $con); $resH=mysql_fetch_assoc($sqlH);
$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resG=mysql_fetch_assoc($sqlG); 
$sqlHOD=mysql_query("select Fname,Sname,Lname,Gender,DR,Married from hrm_employee_reporting INNER JOIN hrm_employee ON hrm_employee_reporting.HodId=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_reporting.HodId=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_reporting.HodId=hrm_employee_personal.EmployeeID where hrm_employee_reporting.EmployeeID=".$id, $con); $rowHOD=mysql_num_rows($sqlHOD); 
if($rowHOD>0) 
{ $resHOD=mysql_fetch_assoc($sqlHOD); if($resHOD['DR']=='Y'){$M2='Dr.';} elseif($resHOD['Gender']=='M'){$M2='Mr.';} elseif($resHOD['Gender']=='F' AND $resHOD['Married']=='Y'){$M2='Mrs.';} elseif($resHOD['Gender']=='F' AND $resHOD['Married']=='N'){$M2='Miss.';}
  $NameHOD=$M2.' '.$resHOD['Fname'].'&nbsp;'.$resHOD['Sname'].'&nbsp;'.$resHOD['Lname'];
}
$dmyC=date("d-m-Y",strtotime($res['DateConfirmation'])); 
$d=date("d", strtotime($res['DateJoining'])); $m=date("m", strtotime($res['DateJoining'])); $y=date("Y",strtotime($res['DateJoining']));
if($m=='01'){$cm='07'; $cy=$y;} elseif($m=='02'){$cm='08'; $cy=$y;} elseif($m=='03'){$cm='09'; $cy=$y;} elseif($m=='04'){$cm='10'; $cy=$y;} elseif($m=='05'){$cm='11'; $cy=$y;} elseif($m=='06'){$cm='12'; $cy=$y;} elseif($m=='07'){$cm='01'; $cy=$y+1;} elseif($m=='08'){$cm='02'; $cy=$y+1;} elseif($m=='09'){$cm='03'; $cy=$y+1;} elseif($m=='10'){$cm='04'; $cy=$y+1;} elseif($m=='11'){$cm='05'; $cy=$y+1;} elseif($m=='12'){$cm='06'; $cy=$y+1;}
?>
<input type="hidden" id="EI" name="EI" value="<?php echo $id; ?>"><input type="hidden" id="EC" name="EC" value="<?php echo $EC; ?>">
<input type="hidden" id="EN" name="EN" value="<?php echo $NameE; ?>">
<input type="hidden" id="DesigId" name="DesigId" value="<?php echo $res['DesigId']; ?>"><input type="hidden" id="Desig" name="Desig" value="<?php echo $resDe['DesigName']; ?>">
<input type="hidden" id="DeptId" name="DeptId" value="<?php echo $res['DepartmentId']; ?>"><input type="hidden" id="Dept" name="Dept" value="<?php echo $resD['DepartmentName']; ?>">
<input type="hidden" id="GradeId" name="GradeId" value="<?php echo $res['GradeId']; ?>"><input type="hidden" id="Grade" name="Grade" value="<?php echo $resG['GradeValue']; ?>">
<input type="hidden" id="HNId" name="HNId" value="<?php echo $res['HqId']; ?>"><input type="hidden" id="HN" name="HN" value="<?php echo $resH['HqName']; ?>">
<input type="hidden" id="DOJ" name="DOJ" value="<?php echo date("d-m-Y", strtotime($res['DateJoining'])); ?>">
<input type="hidden" id="DOCYN" name="DOCYN" value="<?php echo $res['DateConfirmationYN']; ?>">
<input type="hidden" id="DOC" name="DOC" value="<?php if($dmyC=='' OR $dmyC=='00-00-0000' OR $dmyC=='01-01-1970'){echo date($d."-".$cm."-".$cy);} else {echo $dmyC;} ?>">
<input type="hidden" id="RRname" name="RRname" value="<?php echo $res['ReportingName']; ?>">	
<input type="hidden" id="HHname" name="HHname" value="<?php echo $NameHOD; ?>">	
<input type="hidden" id="HHRRname" name="HHRRname" value="Mrs. PARUL PARMAR">	

<?php $sqlL=mysql_query("select * from hrm_employee_confletter where Status='A' AND EmployeeID=".$id, $con);  $rowL=mysql_num_rows($sqlL); 
      if($rowL>0){$resL=mysql_fetch_assoc($sqlL);} ?>
<input type="hidden" id="ConfDate" name="ConfDate" value="<?php if($rowL>0) {echo date("d-m-Y", strtotime($resL['ConfDate'])); } else { echo ''; } ?>">
<input type="hidden" id="Communi" name="Communi" value="<?php if($rowL>0) {echo $resL['Communi']; } else { echo ''; } ?>">	
<input type="hidden" id="JobKnowl" name="JobKnowl" value="<?php if($rowL>0) {echo $resL['JobKnowl']; } else { echo ''; } ?>">
<input type="hidden" id="OutPut" name="OutPut" value="<?php if($rowL>0) {echo $resL['OutPut']; } else { echo ''; } ?>">  
<input type="hidden" id="Initiative" name="Initiative" value="<?php if($rowL>0) {echo $resL['Initiative']; } else { echo ''; } ?>">
<input type="hidden" id="InterSkill" name="InterSkill" value="<?php if($rowL>0) {echo $resL['InterSkill']; } else { echo ''; } ?>">	
<input type="hidden" id="ProblemSolve" name="ProblemSolve" value="<?php if($rowL>0) {echo $resL['ProblemSolve']; } else { echo ''; } ?>">
<input type="hidden" id="Attitude" name="Attitude" value="<?php if($rowL>0) {echo $resL['Attitude']; } else { echo ''; } ?>">  
<input type="hidden" id="Attendance" name="Attendance" value="<?php if($rowL>0) {echo $resL['Attendance']; } else { echo ''; } ?>">
<input type="hidden" id="EmpStrenght" name="EmpStrenght" value="<?php if($rowL>0) {echo $resL['EmpStrenght']; } else { echo ''; } ?>">	
<input type="hidden" id="AreaImprovement" name="AreaImprovement" value="<?php if($rowL>0) {echo $resL['AreaImprovement']; } else { echo ''; } ?>">
<input type="hidden" id="Rating" name="Rating" value="<?php if($rowL>0) {echo $resL['Rating']; } else { echo ''; } ?>">  
<input type="hidden" id="Recommendation" name="Recommendation" value="<?php if($rowL>0) {echo $resL['Recommendation']; } else { echo ''; } ?>">
<input type="hidden" id="ExtReason" name="ExtReason" value="<?php if($rowL>0) {echo $resL['Reason']; } else { echo ''; } ?>">	 
<input type="hidden" id="Hr_Rk" name="Hr_Rk" value="<?php if($rowL>0) {echo $resL['HrRemark']; } else { echo ''; } ?>">	 
<?php } ?>



     
