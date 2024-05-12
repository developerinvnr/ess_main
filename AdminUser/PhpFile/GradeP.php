<?php 
if(isset($_POST['AddNewGrade']))
{ 
   $SqlInseart = mysql_query("INSERT INTO hrm_grade(GradeValue,CompanyId,GradeStatus,CreatedBy,CreatedDate,YearId) VALUES('".$_POST['GradeName']."', '".$CompanyId."', 'A', '".$UserId."','".date('Y-m-d')."','".$YearId."')", $con); 
   $sql=mysql_query("select GradeId from hrm_grade where GradeValue='".$_POST['GradeName']."' AND CompanyId=".$CompanyId." AND GradeStatus='A'", $con); $res=mysql_fetch_assoc($sql);
   $SqlInseart_2 = mysql_query("INSERT INTO hrm_lodentitle(GradeId,GradeValue,CompanyId,CreatedBy,CreatedDate,YearId) VALUES(".$res['GradeId'].",'".$_POST['GradeName']."', '".$CompanyId."', '".$UserId."','".date('Y-m-d')."','".$YearId."')", $con); 
   $SqlInseart_3 = mysql_query("INSERT INTO hrm_travelentitle(GradeId,GradeValue,CompanyId,CreatedBy,CreatedDate,YearId) VALUES(".$res['GradeId'].",'".$_POST['GradeName']."', '".$CompanyId."', '".$UserId."','".date('Y-m-d')."','".$YearId."')", $con);
   $SqlInseart_4 = mysql_query("INSERT INTO hrm_traveleligibility(GradeId,GradeValue,CompanyId,CreatedBy,CreatedDate,YearId) VALUES(".$res['GradeId'].",'".$_POST['GradeName']."', '".$CompanyId."', '".$UserId."','".date('Y-m-d')."','".$YearId."')", $con);
   $SqlInseart_5 = mysql_query("INSERT INTO hrm_dailyallow(GradeId,GradeValue,CompanyId,CreatedBy,CreatedDate,YearId) VALUES(".$res['GradeId'].",'".$_POST['GradeName']."', '".$CompanyId."', '".$UserId."','".date('Y-m-d')."','".$YearId."')", $con);
   
   if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}
if(isset($_POST['ChangeGrade']))
{
 $Sql2=mysql_query("Select * from hrm_grade WHERE GradeId='".$_POST['GradeId']."' AND CompanyId=".$CompanyId, $con); $Result2 = mysql_fetch_assoc($Sql2); 
 $SqlInsert2 = mysql_query("INSERT INTO hrm_grade_event(GradeId,GradeValue,CompanyId,GradeStatus,CreatedBy,CreatedDate,YearId) VALUES('".$Result2['GradeId']."', '".$Result2['GradeValue']."', '".$Result2['CompanyId']."', '".$Result2['GradeStatus']."', ".$Result2['CreatedBy'].", '".$Result2['CreatedDate']."', ".$Result2['YearId'].")", $con); 
  if($SqlInsert2)
    {
	 $SqlUpdate = mysql_query("UPDATE hrm_grade SET GradeValue='".$_POST['GradeName']."' WHERE GradeId=".$_POST['GradeId'], $con) or die(mysql_error());
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
	}   
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
  $SqlDelete=mysql_query("UPDATE hrm_grade SET GradeStatus='De' WHERE GradeId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}
?>
