<?php 
if(isset($_POST['SaveEdit']))
{
 $Sql2=mysql_query("Select * from hrm_dailyallow WHERE DailyAllowId='".$_POST['EditId']."' AND CompanyId=".$CompanyId, $con); $Result2 = mysql_fetch_assoc($Sql2); 

 $SqlInsert2 = mysql_query("INSERT INTO hrm_dailyallow_event(DailyAllowId,GradeValue,OutSiteHQ,OutSiteHQ_Sales,MH,MRSP,MRNS,MCS,MCSSP,CompanyId,CreatedBy,CreatedDate,YearId)VALUES('".$Result2['DailyAllowId']."', '".$Result2['GradeValue']."', '".$Result2['OutSiteHQ']."', '".$Result2['OutSiteHQ_Sales']."', '".$Result2['MH']."', '".$Result2['MRSP']."', '".$Result2['MRNS']."', '".$Result2['MCS']."', '".$Result2['MCSSP']."', '".$Result2['CompanyId']."', ".$Result2['CreatedBy'].", '".$Result2['CreatedDate']."', ".$Result2['YearId'].")", $con); 
  if($SqlInsert2)
    {
	 $SqlUpdate = mysql_query("UPDATE hrm_dailyallow SET OutSiteHQ='".$_POST['OutSiteHQ']."', OutSiteHQ_Sales='".$_POST['OutSiteHQ_Sales']."', MH='".$_POST['MH']."', MRSP='".$_POST['MRSP']."', MRNS='".$_POST['MRNS']."', MCS='".$_POST['MCS']."', MCSSP='".$_POST['MCSSP']."', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."', YearId=".$YearId." WHERE DailyAllowId=".$_POST['EditId'], $con) or die(mysql_error());
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
	}   
}
?>

