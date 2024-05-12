<?php 
//require_once('../../AdminUser/config/config.php');

/******************/	
//$con = mysqli_connect("localhost","vnrseed2_demo","vnrseed2_demo","vnrseed2_demo");

$con=mysqli_connect('localhost','hrims_user','hrims@192');
if(!$con) die("Failed to connect to database!");
$db=mysqli_select_db( $con, 'hrims');
if(!$db) die("Failed to select database!");
/******************/
date_default_timezone_set('asia/calcutta');  


if($_REQUEST['empid'] >0){
$run_qry=mysqli_query($con,"select * from hrm_employee where EmployeeID =".$_REQUEST['empid']." AND EmpStatus = 'A'");
$num=mysqli_num_rows($run_qry); 
if($num == 0){
    echo json_encode(array("Code" => "404") ); 
    die;
}}


//Declaration
if($_REQUEST['value'] == 'Investment_Decl_Detail_submit' && $_REQUEST['empid']!='')
{
  $sqlE=mysqli_query($con, "select EmpCode,CompanyId,Fname,Sname,Lname,EmailId_Vnr,DR,Married,Gender from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where e.EmployeeID=".$_REQUEST['empid']); $resE=mysqli_fetch_assoc($sqlE);
  
  $sqly=mysqli_query($con,"select * from hrm_investdecl_setting where CompanyId=".$resE['CompanyId']." AND Status='A'"); 
  $resy=mysqli_fetch_array($sqly);
  $sqlCy=mysqli_query($con,"select FromDate,ToDate from hrm_year where YearId=".$resy['C_YearId']); 
  $resCy=mysqli_fetch_array($sqlCy);
  $fc=date("Y",strtotime($resCy['FromDate'])); $tc=date("Y",strtotime($resCy['ToDate'])); $PrdCurr=$fc.'-'.$tc;
   
  $SBas=mysqli_query($con, "select BAS_Value from hrm_employee_ctc where EmployeeID=".$_REQUEST['empid']." AND Status='A'");
  $rBas=mysqli_fetch_assoc($SBas); $LTA=$rBas['BAS_Value']*2; 

  $sql=mysqli_query($con, "select * from hrm_employee_investment_declaration where EmployeeID=".$_REQUEST['empid']." AND Period='".$PrdCurr."' AND Month=".$resy['C_Month']); $row=mysqli_num_rows($sql); 
  
  
  
  if($_REQUEST['FormSubmit']=='Y'){ $subQ='0000-00-00'; }
  elseif($_REQUEST['FormSubmit']=='YY'){ $subQ=date("Y-m-d"); }
  
  if($row>0)
  {
   $sqlUp=mysqli_query($con, "update hrm_employee_investment_declaration set Regime='".$_REQUEST['Regime']."', FormSubmit='".$_REQUEST['FormSubmit']."', HRA='".$_REQUEST['HRA']."', Curr_LTA='".$LTA."', Curr_CEA='2400', LTA='".$_REQUEST['LTA']."', CEA='".$_REQUEST['CEA']."', MIP='".$_REQUEST['MIP']."', MTI='".$_REQUEST['MTI']."', MTS='".$_REQUEST['MTS']."', ROL='".$_REQUEST['ROL']."', Handi='".$_REQUEST['Handicapped']."', PenFun='".$_REQUEST['PenFun']."', LIP='".$_REQUEST['LIP']."', DA='".$_REQUEST['DA']."', PPF='".$_REQUEST['PPF']."', PostOff='".$_REQUEST['PostOff']."', ULIP='".$_REQUEST['ULIP']."', HL='".$_REQUEST['HL']."', MF='".$_REQUEST['MF']."', IB='".$_REQUEST['IB']."', CTF='".$_REQUEST['CTF']."', NHB='".$_REQUEST['NHB']."', NSC='".$_REQUEST['NSC']."', SukS='".$_REQUEST['SukS']."', NPS='".$_REQUEST['NPS']."', CorNPS='".$_REQUEST['CorNPS']."', EPF='".$_REQUEST['EPF']."', Form16='".$_REQUEST['Form16']."', SPE='".$_REQUEST['SPE']."', PT='".$_REQUEST['PT']."', PFD='".$_REQUEST['PFD']."', IT='".$_REQUEST['IT']."', IHL='".$_REQUEST['IHL']."', IL='".$_REQUEST['IL']."', Inv_Date='".date("Y-m-d",strtotime($_REQUEST['Date']))."', SubmittedDate='".$subQ."', Place='".$_REQUEST['Place']."' where EmployeeID=".$_REQUEST['empid']." AND Period='".$PrdCurr."' AND Month=".$resy['C_Month']);   
  }
  else
  {
   $sqlUp=mysqli_query($con, "insert into hrm_employee_investment_declaration(EmployeeID, EC, Regime, Period, Month, Status, FormSubmit, HRA, Curr_LTA, Curr_CEA, LTA, CEA, MIP, MTI, MTS, ROL, Handi, PenFun, LIP, DA, PPF, PostOff, ULIP, HL, MF, IB, CTF, NHB, NSC, SukS, NPS, CorNPS, EPF, Form16, SPE, PT, PFD, IT, IHL, IL, Inv_Date, SubmittedDate, Place, YearId) values(".$_REQUEST['empid'].", '".$resE['EmpCode']."', '".$_REQUEST['Regime']."', '".$PrdCurr."', ".$resy['C_Month'].", 'A', '".$_REQUEST['FormSubmit']."', '".$_REQUEST['HRA']."', '".$LTA."', '2400', '".$_REQUEST['LTA']."', '".$_REQUEST['CEA']."', '".$_REQUEST['MIP']."', '".$_REQUEST['MTI']."', '".$_REQUEST['MTS']."', '".$_REQUEST['ROL']."', '".$_REQUEST['Handicapped']."', '".$_REQUEST['PenFun']."', '".$_REQUEST['LIP']."', '".$_REQUEST['DA']."', '".$_REQUEST['PPF']."', '".$_REQUEST['PostOff']."', '".$_REQUEST['ULIP']."', '".$_REQUEST['HL']."', '".$_REQUEST['MF']."', '".$_REQUEST['IB']."', '".$_REQUEST['CTF']."', '".$_REQUEST['NHB']."', '".$_REQUEST['NSC']."', '".$_REQUEST['SukS']."', '".$_REQUEST['NPS']."', '".$_REQUEST['CorNPS']."', '".$_REQUEST['EPF']."', '".$_REQUEST['Form16']."', '".$_REQUEST['SPE']."', '".$_REQUEST['PT']."', '".$_REQUEST['PFD']."', '".$_REQUEST['IT']."', '".$_REQUEST['IHL']."', '".$_REQUEST['IL']."', '".date("Y-m-d",strtotime($_REQUEST['Date']))."', '".$subQ."', '".$_REQUEST['Place']."', ".$resY['C_YearId'].")");  
   
  }
 
  if($sqlUp)
  { 
   if($_REQUEST['FormSubmit']=='YY')
   {
    $msgg="Investment Declaration Form Submitted Successfully. Please Submit a Signed Copy Of The declaration To Accounts Which Will Be The Final Submission";
	////////////////////////////////////////////////////////////////////
	
	if($resy['C_Month']==1){$SelM='January';}elseif($resy['C_Month']==2){$SelM='February';}elseif($resy['C_Month']==3){$SelM='March';}elseif($resy['C_Month']==4){$SelM='April';}elseif($resy['C_Month']==5){$SelM='May';}elseif($resy['C_Month']==6){$SelM='June';}elseif($resy['C_Month']==7){$SelM='July';}elseif($resy['C_Month']==8){$SelM='August';}elseif($resy['C_Month']==9){$SelM='September';}elseif($resy['C_Month']==10){$SelM='October';}elseif($resy['C_Month']==11){$SelM='November';}elseif($resy['C_Month']==12){$SelM='December';}
  
   $Ename=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];
   if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';} $NameE=$M.' '.$Ename;
	
      //$email_to = $resE['EmailId_Vnr'];
      //$email_from='admin@vnrseeds.co.in';
      $email_subject = "Your Investment declaration form status";
      //$email_txt = "Your Investment declaration form status"; 
      //$headers = "From: $email_from ". "\r\n"; 
      //$headers .= "MIME-Version: 1.0\r\n";
      //$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $email_message .="<html><head></head><body>";
      $email_message .= "Dear <b>".$NameE."</b> <br><br>\n\n\n";
      $email_message .="You have successfully submitted investment declaration form in period-".$SelM."-(".$PrdCurr.").<br><br>\n\n";
	  $email_message .= "From <br><b>ADMIN ESS</b><br>";
      $email_message .="</body></html>";	      
	  //$ok = @mail($email_to, $email_subject, $email_message, $headers); 
	  
	   $subject=$email_subject;
       $body=$email_message;
       $email_to=$resE['EmailId_Vnr'];
       require 'vendor/mail_admin.php';
	  
	////////////////////////////////////////////////////////////////////
	
   }
   else{ $msgg="Investment Declaration Form Saved!, For Final Submission Please Click to Submit Button."; } 
   echo json_encode(array("Code"=>"300", "Msg"=>$msgg) ); 
   
   
  
  }
  else{ echo json_encode(array("Code"=>"100", "Msg"=>"Error..") ); }

}




//Submission
elseif($_REQUEST['value'] == 'Investment_Subm_Detail_submit' && $_REQUEST['empid']!='')
{

  $sqlE=mysqli_query($con, "select EmpCode,CompanyId from hrm_employee where EmployeeID=".$_REQUEST['empid']); $resE=mysqli_fetch_assoc($sqlE);
  
  $sqly=mysqli_query($con,"select * from hrm_investdecl_setting where CompanyId=".$resE['CompanyId']." AND Status='A'"); 
  $resy=mysqli_fetch_array($sqly);
  $sqlCy=mysqli_query($con,"select FromDate,ToDate from hrm_year where YearId=".$resy['C_YearId']); 
  $resCy=mysqli_fetch_array($sqlCy);
  $fc=date("Y",strtotime($resCy['FromDate'])); $tc=date("Y",strtotime($resCy['ToDate'])); $PrdCurr=$fc.'-'.$tc;
  
  
  $SBas=mysqli_query($con, "select BAS_Value from hrm_employee_ctc where EmployeeID=".$_REQUEST['empid']." AND Status='A'");
  $rBas=mysqli_fetch_assoc($SBas); $LTA=$rBas['BAS_Value']*2;

  $sql=mysqli_query($con, "select * from hrm_employee_investment_submission where EmployeeID=".$_REQUEST['empid']." AND Period='".$PrdCurr."' AND Month=".$resy['C_Month']); $row=mysqli_num_rows($sql);
  
  if($_REQUEST['FormSubmit']=='Y'){ $subQ='0000-00-00'; }
  elseif($_REQUEST['FormSubmit']=='YY'){ $subQ=date("Y-m-d"); }
  
  if($row>0)
  { 
    $sqlUp=mysqli_query($con,"update hrm_employee_investment_submission set FormSubmit='".$_REQUEST['FormSubmit']."', Regime='".$_REQUEST['Regime']."', HRA='".$_REQUEST['HRA']."', Curr_LTA='".$LTA."', Curr_CEA='2400', LTA='".$_REQUEST['LTA']."', CEA='".$_REQUEST['CEA']."', MIP='".$_REQUEST['MIP']."', MTI='".$_REQUEST['MTI']."', MTS='".$_REQUEST['MTS']."', ROL='".$_REQUEST['ROL']."', Handi='".$_REQUEST['Handi']."', PenFun='".$_REQUEST['PenFun']."', LIP='".$_REQUEST['LIP']."', DA='".$_REQUEST['DA']."', PPF='".$_REQUEST['PPF']."', PostOff='".$_REQUEST['PostOff']."', ULIP='".$_REQUEST['ULIP']."', HL='".$_REQUEST['HL']."', MF='".$_REQUEST['MF']."', IB='".$_REQUEST['IB']."', CTF='".$_REQUEST['CTF']."', NHB='".$_REQUEST['NHB']."', NSC='".$_REQUEST['NSC']."', SukS='".$_REQUEST['SukS']."', NPS='".$_REQUEST['NPS']."', CorNPS='".$_REQUEST['CorNPS']."', EPF='".$_REQUEST['EPF']."', Form16='".$_REQUEST['Form16']."', SPE='".$_REQUEST['SPE']."', PT='".$_REQUEST['PT']."', PFD='".$_REQUEST['PFD']."', IT='".$_REQUEST['IT']."', IHL='".$_REQUEST['IHL']."', IL='".$_REQUEST['IL']."', Inv_Date='".date("Y-m-d",strtotime($_REQUEST['Date']))."', SubmittedDate='".$subQ."', Place='".$_REQUEST['Place']."' where EmployeeID=".$_REQUEST['empid']." AND Period='".$PrdCurr."' AND Month=".$resy['C_Month']);
  }
  if($row==0)
  { 
    $sqlUp=mysqli_query($con,"insert into hrm_employee_investment_submission(EmployeeID, EC, Period, Month, Status, Regime, FormSubmit, HRA, Curr_LTA, Curr_CEA, LTA, CEA, MIP, MTI, MTS, ROL, Handi, PenFun, LIP, DA, PPF, PostOff, ULIP, HL, MF, IB, CTF, NHB, NSC, SukS, NPS, CorNPS, EPF, Form16, SPE, PT, PFD, IT, IHL, IL, Inv_Date, SubmittedDate, Place, YearId) values(".$_REQUEST['empid'].", '".$resE['EmpCode']."', '".$PrdCurr."', ".$resy['C_Month'].", 'A', '".$_REQUEST['Regime']."', '".$_REQUEST['FormSubmit']."', '".$_REQUEST['HRA']."', '".$LTA."', '2400', '".$_REQUEST['LTA']."', '".$_REQUEST['CEA']."', '".$_REQUEST['MIP']."', '".$_REQUEST['MTI']."', '".$_REQUEST['MTS']."', '".$_REQUEST['ROL']."', '".$_REQUEST['Handi']."', '".$_REQUEST['PenFun']."', '".$_REQUEST['LIP']."', '".$_REQUEST['DA']."', '".$_REQUEST['PPF']."', '".$_REQUEST['PostOff']."', '".$_REQUEST['ULIP']."', '".$_REQUEST['HL']."', '".$_REQUEST['MF']."', '".$_REQUEST['IB']."', '".$_REQUEST['CTF']."', '".$_REQUEST['NHB']."', '".$_REQUEST['NSC']."', '".$_REQUEST['SukS']."', '".$_REQUEST['NPS']."', '".$_REQUEST['CorNPS']."', '".$_REQUEST['EPF']."', '".$_REQUEST['Form16']."', '".$_REQUEST['SPE']."', '".$_REQUEST['PT']."', '".$_REQUEST['PFD']."', '".$_REQUEST['IT']."', '".$_REQUEST['IHL']."', '".$_REQUEST['IL']."', '".date("Y-m-d",strtotime($_REQUEST['Date']))."', '".$subQ."', '".$_REQUEST['Place']."', ".$resy['C_YearId'].")");
  }
  
  if($sqlUp)
  { 
   if($_REQUEST['FormSubmit']=='YY')
   {
    $msgg="Investment Submission Form Submitted Successfully. Please Submit a Signed Copy Of The declaration To Accounts Which Will Be The Final Submission";
   }
   else{ $msgg="Investment Submission Form Saved!, For Final Submission Please Click to Submit Button."; } 
   echo json_encode(array("Code"=>"300", "Msg"=>$msgg) ); 
   
  }
  else{ echo json_encode(array("Code"=>"100", "Msg"=>"Error..") ); }
  

}




//Investment Submission Details
elseif($_REQUEST['value'] == 'Investment_Subm_Details' && $_REQUEST['empid']>0 && $_REQUEST['comid']>0)
{
 
 $sqlE=mysqli_query($con, "select EmpCode,CompanyId from hrm_employee where EmployeeID=".$_REQUEST['empid']); $resE=mysqli_fetch_assoc($sqlE);
 $sqly=mysqli_query($con,"select * from hrm_investdecl_setting where CompanyId=".$resE['CompanyId']." AND Status='A'"); 
  $resy=mysqli_fetch_array($sqly);
  $sqlCy=mysqli_query($con,"select FromDate,ToDate from hrm_year where YearId=".$resy['C_YearId']); 
  $resCy=mysqli_fetch_array($sqlCy);
  $fc=date("Y",strtotime($resCy['FromDate'])); $tc=date("Y",strtotime($resCy['ToDate'])); $PrdCurr=$fc.'-'.$tc;
 
 
 $sInvSb=mysqli_query($con, "select OpenYN from hrm_investdecl_setting_submission where CompanyId=".$_REQUEST['comid']); 
 $rInvSb=mysqli_fetch_assoc($sInvSb);   
 $sqlEdit2=mysqli_query($con, "select count(*) as tot, s.* from hrm_employee_investment_submission s where s.EmployeeID=".$_REQUEST['empid']." AND s.Period='".$PrdCurr."' AND s.Month=".$resy['C_Month']); 
 $rowEdit2=mysqli_num_rows($sqlEdit2); $resIvst2=mysqli_fetch_assoc($sqlEdit2);
 
 if($rowEdit2==0 OR $rowEdit2=='null'){ $rowEdit2='0'; $resEdit2=''; }
 else { $rowEdit2=$resIvst2['tot']; $resEdit2=$resIvst2['FormSubmit']; }
 
 //Declaration
 $Check=mysqli_query($con,"select * from hrm_employee_investment_declaration where EmployeeID=".$_REQUEST['empid']." AND Period='".$PrdCurr."' AND Month=".$resy['C_Month']); $rowCheck=mysqli_num_rows($Check); 
 if($rowCheck==0 AND $res['ShowB_Form']=='Y')
 { 
   $sqlMax=mysqli_query($con,"select MAX(IvstDecId) as MaxId from hrm_employee_investment_declaration where EmployeeID=".$_REQUEST['empid']); $resMax=mysqli_fetch_assoc($sqlMax);
   if($resMax['MaxId']>0)
   { 
	 $SqlIvst=mysqli_query($con,"select * from hrm_employee_investment_declaration where IvstDecId=".$resMax['MaxId']." AND EmployeeID=".$_REQUEST['empid']); $resIvst=mysqli_fetch_assoc($SqlIvst); 
   } 
 }
 elseif($rowCheck>0){ $resIvst=mysqli_fetch_assoc($Check); }
 //Declaration
 
 
 if($rowEdit2>0 OR $resIvst['HRA']!='')
 {  
   echo json_encode(array( "data" => "300", "SubOpen"=>$rInvSb['OpenYN'], "Count"=>$rowEdit2, "FormSubmit"=>$resEdit2, "Regime" => $resIvst2['Regime'], "HRA"=>$resIvst2['HRA'], "LTA"=>$resIvst2['LTA'], "CEA"=>$resIvst2['CEA'], "MIP"=>$resIvst2['MIP'], "MTI"=>$resIvst2['MTI'], "MTS"=>$resIvst2['MTS'], "ROL"=>$resIvst2['ROL'], "Handicapped"=>$resIvst2['Handi'], "DTC"=>$resIvst2['DTC'], "DFS"=>$resIvst2['DFS'], "PenFun"=>$resIvst2['PenFun'], "LIP"=>$resIvst2['LIP'], "DA"=>$resIvst2['DA'], "PPF"=>$resIvst2['PPF'], "PostOff"=>$resIvst2['PostOff'], "ULIP"=>$resIvst2['ULIP'], "HL"=>$resIvst2['HL'], "MF"=>$resIvst2['MF'], "IB"=>$resIvst2['IB'], "CTF"=>$resIvst2['CTF'], "NHB"=>$resIvst2['NHB'], "NSC"=>$resIvst2['NSC'], "SukS"=>$resIvst2['SukS'], "EPF"=>$resIvst2['EPF'], "NPS"=>$resIvst2['NPS'], "CorNPS"=>$resIvst2['CorNPS'], "Form16"=>$resIvst2['Form16'], "SPE"=>$resIvst2['SPE'], "PT"=>$resIvst2['PT'], "PFD"=>$resIvst2['PFD'], "IT"=>$resIvst2['IT'], "IHL"=>$resIvst2['IHL'], "IL"=>$resIvst2['IL'], "InvSub_Date"=>$resIvst2['Inv_Date'], "InvSub_Place"=>$resIvst2['Place'], "Regime_dec" => $resIvst['Regime'], "HRA_dec"=>$resIvst['HRA'], "LTA_dec"=>$resIvst['LTA'], "CEA_dec"=>$resIvst['CEA'], "MIP_dec"=>$resIvst['MIP'], "MIP_Limit_dec" => $res['MIP_Limit'], "MTI_dec"=>$resIvst['MTI'], "MTI_Limit_dec"=>$res['MIT_Limit'], "MTS_dec"=>$resIvst['MTS'], "MTS_Limit_dec"=>$res['MTS_Limit'], "ROL_dec"=>$resIvst['ROL'], "ROL_Limit_dec"=>$res['ROL_Limit'], "Handicapped_dec"=>$resIvst['Handi'], "Handi_Limit_dec"=>$res['Handi_Limit'], "DTC_dec"=>$resIvst['DTC'], "DFS_dec"=>$resIvst['DFS'], "PenFun_dec"=>$resIvst['PenFun'], "LIP_dec"=>$resIvst['LIP'], "DA_dec"=>$resIvst['DA'], "PPF_dec"=>$resIvst['PPF'], "PostOff_dec"=>$resIvst['PostOff'], "ULIP_dec"=>$resIvst['ULIP'], "HL_dec"=>$resIvst['HL'], "MF_dec"=>$resIvst['MF'], "IB_dec"=>$resIvst['IB'], "CTF_dec"=>$resIvst['CTF'], "NHB_dec"=>$resIvst['NHB'], "NSC_dec"=>$resIvst['NSC'], "SukS_dec"=>$resIvst['SukS'], "EPF_dec"=>$resIvst['EPF'], "NPS_dec"=>$resIvst['NPS'], "CorNPS_dec"=>$resIvst['CorNPS'], "Form16_dec"=>$resIvst['Form16'], "SPE_dec"=>$resIvst['SPE'], "PT_dec"=>$resIvst['PT'], "PFD_dec"=>$resIvst['PFD'], "IT_dec"=>$resIvst['IT'], "IHL_dec"=>$resIvst['IHL'], "IL_dec"=>$resIvst['IL'], "Inv_Date_dec"=>$resIvst['Inv_Date'], "Inv_Place_dec"=>$resIvst['Place']) );
 }
 else 
 {
    echo json_encode(array( "data" => "100", "msg" => "Error! Data Not Fount") );
 } 
 
}

/*
//Investment Submission Details
elseif($_REQUEST['value'] == 'Investment_Subm_Details' && $_REQUEST['empid']>0 && $_REQUEST['comid']>0 && $_REQUEST['NewPeriod']!='' && $_REQUEST['NewMonth']>0)
{
 
 $sInvSb=mysqli_query($con, "select OpenYN from hrm_investdecl_setting_submission where CompanyId=".$_REQUEST['comid']); 
 $rInvSb=mysqli_fetch_assoc($sInvSb);   
 $sqlEdit=mysqli_query($con, "select count(*) as tot, s.* from hrm_employee_investment_submission s where s.EmployeeID=".$_REQUEST['empid']." AND s.Period='".$_REQUEST['NewPeriod']."' AND s.Month=".$_REQUEST['NewMonth']); 
 $rowEdit=mysqli_num_rows($sqlEdit); $resIvst=mysqli_fetch_assoc($sqlEdit);
 
 if($rowEdit==0 OR $rowEdit=='null'){ $rowEdit='0'; $resEdit=''; }
 else { $rowEdit=$resIvst['tot']; $resEdit=$resIvst['FormSubmit']; }
 
 if($rowEdit>0)
 {  
   echo json_encode(array( "data" => "300", "SubOpen"=>$rInvSb['OpenYN'], "Count"=>$rowEdit, "FormSubmit"=>$resEdit, "Regime" => $resIvst['Regime'], "HRA"=>$resIvst['HRA'], "LTA"=>$resIvst['LTA'], "CEA"=>$resIvst['CEA'], "MIP"=>$resIvst['MIP'], "MTI"=>$resIvst['MTI'], "MTS"=>$resIvst['MTS'], "ROL"=>$resIvst['ROL'], "Handicapped"=>$resIvst['Handi'], "DTC"=>$resIvst['DTC'], "DFS"=>$resIvst['DFS'], "PenFun"=>$resIvst['PenFun'], "LIP"=>$resIvst['LIP'], "DA"=>$resIvst['DA'], "PPF"=>$resIvst['PPF'], "PostOff"=>$resIvst['PostOff'], "ULIP"=>$resIvst['ULIP'], "HL"=>$resIvst['HL'], "MF"=>$resIvst['MF'], "IB"=>$resIvst['IB'], "CTF"=>$resIvst['CTF'], "NHB"=>$resIvst['NHB'], "NSC"=>$resIvst['NSC'], "SukS"=>$resIvst['SukS'], "EPF"=>$resIvst['EPF'], "NPS"=>$resIvst['NPS'], "CorNPS"=>$resIvst['CorNPS'], "Form16"=>$resIvst['Form16'], "SPE"=>$resIvst['SPE'], "PT"=>$resIvst['PT'], "PFD"=>$resIvst['PFD'], "IT"=>$resIvst['IT'], "IHL"=>$resIvst['IHL'], "IL"=>$resIvst['IL'], "InvSub_Date"=>$resIvst['Inv_Date'], "InvSub_Place"=>$resIvst['Place']) );
 }
 else 
 {
    echo json_encode(array( "data" => "100", "msg" => "Error! Data Not Fount") );
 } 
 
}
*/



//Last
else
{
 echo json_encode(array("return"=>"value missing") );
}

?>
