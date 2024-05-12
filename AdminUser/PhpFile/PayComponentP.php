<?php 
if(isset($_POST['AddNewCompo']))
{ 
   $SqlInseart = mysql_query("INSERT INTO hrm_paycomponent(CompoName,CompoCode,CompoType,Lumpsum,Prorata,Con_For_Tds,Esti_For_Tds,Deduct_In_Tax,Con_For_Pf,Con_For_Ptax,Con_For_Esic,Con_For_ArrCalcu, CompanyId,CreatedBy,CreatedDate,YearId) VALUES('".$_POST['CompoName']."', '".$_POST['CompoCode']."', '".$_POST['CompoType']."', '".$_POST['Lumpsum']."', '".$_POST['Prorata']."', '".$_POST['ConTDS']."', '".$_POST['EstimateTDS']."', '".$_POST['DedIncTax']."', '".$_POST['ConPF']."', '".$_POST['ConPTax']."', '".$_POST['ConESIC']."', '".$_POST['ConArrCalcu']."', '".$CompanyId."', '".$UserId."','".date('Y-m-d')."','".$YearId."')", $con); 
   if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}
if(isset($_POST['ChangeCompo']))
{
 $Sql2=mysql_query("Select * from hrm_paycomponent WHERE PayCompoId='".$_POST['PayCompoId']."' AND CompanyId=".$CompanyId, $con); $Result2 = mysql_fetch_assoc($Sql2); 
 $SqlInsert2 = mysql_query("INSERT INTO hrm_paycomponent_event(PayCompoId,CompoName,CompoCode,CompoType,Lumpsum,Prorata,Con_For_Tds,Esti_For_Tds,Deduct_In_Tax,Con_For_Pf,Con_For_Ptax,Con_For_Esic,Con_For_ArrCalcu, CompanyId,CreatedBy,CreatedDate,YearId) VALUES('".$Result2['PayCompoId']."', '".$Result2['CompoName']."', '".$Result2['CompoCode']."', '".$Result2['CompoType']."', '".$Result2['Lumpsum']."', '".$Result2['Prorata']."', '".$Result2['Con_For_Tds']."', '".$Result2['Esti_For_Tds']."', '".$Result2['Deduct_In_Tax']."', '".$Result2['Con_For_Pf']."', '".$Result2['Con_For_Ptax']."', '".$Result2['Con_For_Esic']."', '".$Result2['Con_For_ArrCalcu']."', '".$Result2['CompanyId']."', ".$Result2['CreatedBy'].", '".$Result2['CreatedDate']."', ".$Result2['YearId'].")", $con); 
  if($SqlInsert2)
    {
	 $SqlUpdate = mysql_query("UPDATE hrm_paycomponent SET Lumpsum='".$_POST['Lumpsum1']."', Prorata='".$_POST['Prorata1']."', Con_For_Tds='".$_POST['ConTDS1']."', Esti_For_Tds='".$_POST['EstimateTDS1']."', Deduct_In_Tax='".$_POST['DedIncTax1']."', Con_For_Pf='".$_POST['ConPF1']."', Con_For_Ptax='".$_POST['ConPTax1']."', Con_For_Esic='".$_POST['ConESIC1']."', Con_For_ArrCalcu='".$_POST['ConArrCalcu1']."' WHERE PayCompoId='".$_POST['PayCompoId']."'", $con); 
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
	}   
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
  $SqlDelete=mysql_query("UPDATE hrm_paycomponent SET PayCompoStatus='De' WHERE PayCompoId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}
?>
