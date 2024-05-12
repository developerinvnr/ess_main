<?php session_start(); require_once('../AdminUser/config/config.php');
if(isset($_POST['reqSubmit']))
{
 $search =  '!"#$%/\':_' ; $search = str_split($search);
 $RemarkI=str_replace($search, "", $_POST['remarkI']); $RemarkO=str_replace($search, "", $_POST['remarkO']);
 
 if($_POST['reasonI']!='' AND $RemarkI!=''){$InR='Y';}else{$InR='N';}
 if($_POST['reasonO']!='' AND $RemarkO!=''){$OutR='Y';}else{$OutR='N';}
 
 if($_POST['RId']!=''){$RId=$_POST['RId'];}else{$RId=0;}
 if($_POST['HId']!=''){$HId=$_POST['HId'];}else{$HId=0;}
 if($_POST['HtId']!=''){$HtId=$_POST['HtId'];}else{$HtId=0;}
 
 $Ins=mysql_query("insert into hrm_employee_attendance_req(EmployeeID, AttDate, InReason, InRemark, OutReason, OutRemark, RId, HId, HtId, InR, OutR, ReqDate) values(".$_POST['EId'].", '".$_POST['AttDate']."', '".$_POST['reasonI']."', '".$RemarkI."', '".$_POST['reasonO']."', '".$RemarkO."', ".$RId.", ".$HId.", ".$HtId.", '".$InR."', '".$OutR."', '".date("Y-m-d")."')",$con);
 if($Ins)
 { 
  
  if($_POST['Rname']!='' AND $_POST['Rmail']!='')  //Reporting
  {
   $eto = $_POST['Rmail'];
   $efrom = 'admin@vnrseeds.co.in';
   $esub = 'For authorisation of Attendance';
   $headers = "From: ".$efrom."\r\n"; 
   $headers .= "MIME-Version: 1.0\r\n";
   $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $emsg .= "<html><head></head><body>";
   $emsg .= "Dear <b>".$_POST['Rname'].",</b><br><br>\n\n\n";
   $emsg .= "Your team member ".$_POST['Ename']." has requested for attendance authorisation for dated ".date("d-m-Y",strtotime($_POST['AttDate']))." in ESS, Please log-in in ESS for taking necessary action.<br><br>\n\n";
   $emsg .= "From <br><b>ADMIN ESS</b><br>";
   $emsg .= "</body></html>";	      
   $ok=@mail($eto, $esub, $emsg, $headers);
  }
  
  if($_POST['Hname']!='' AND $_POST['Hmail']!='')  //HOD
  {
   $eto2 = $_POST['Hmail'];
   $efrom2 = 'admin@vnrseeds.co.in';
   $esub2 = 'For authorisation of Attendance';
   $headers2 = "From: ".$efrom2."\r\n"; 
   $headers2 .= "MIME-Version: 1.0\r\n";
   $headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $emsg2 .= "<html><head></head><body>";
   $emsg2 .= "Dear <b>".$_POST['Hname'].",</b><br><br>\n\n\n";
   $emsg2 .= "Your team member ".$_POST['Ename']." reporting to ".$_POST['Rname']." has requested for attendance authorisation for dated ".date("d-m-Y",strtotime($_POST['AttDate']))." in ESS, Please log-in in ESS for more details.<br><br>\n\n";
   $emsg2 .= "From <br><b>ADMIN ESS</b><br>";
   $emsg2 .= "</body></html>";	      
   $ok=@mail($eto2, $esub2, $emsg2, $headers2);
  }
  
  
  if($_POST['HrEname']!='' AND $_POST['HrEmail']!='')  //HrEmp
  {
   $eto3 = $_POST['HrEmail'];
   $efrom3 = 'admin@vnrseeds.co.in';
   $esub3 = 'For authorisation of Attendance';
   $headers3 = "From: ".$efrom3."\r\n"; 
   $headers3 .= "MIME-Version: 1.0\r\n";
   $headers3 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $emsg3 .= "<html><head></head><body>";
   $emsg3 .= "Dear <b>".$_POST['HrEname'].",</b><br><br>\n\n\n";
   $emsg3 .= $_POST['Ename']." has requested for attendance authorisation for dated ".date("d-m-Y",strtotime($_POST['AttDate']))." in ESS, for details, kindly log on to ESS.<br><br>\n\n";
   $emsg3 .= "From <br><b>ADMIN ESS</b><br>";
   $emsg3 .= "</body></html>";	      
   $ok=@mail($eto3, $esub3, $emsg3, $headers3);
  }
  
  /*HR*/                                              //HR
   $eto4 = 'vspl.hr@vnrseeds.com';
   $efrom4 = 'admin@vnrseeds.co.in';
   $esub4 = 'For authorisation of Attendance';
   $headers4 = "From: ".$efrom4."\r\n"; 
   $headers4 .= "MIME-Version: 1.0\r\n";
   $headers4 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $emsg4 .= "<html><head></head><body>";
   $emsg4 .= "Dear <b>Sir/Mam, </b> <br><br>\n\n\n";
   $emsg4 .= $_POST['Ename']." has requested for attendance authorisation for dated ".date("d-m-Y",strtotime($_POST['AttDate']))." in ESS, for details, kindly log on to ESS.<br><br>\n\n";
   $emsg4 .= "From <br><b>ADMIN ESS</b><br>";
   $emsg4 .= "</body></html>";	      
   $ok=@mail($eto4, $esub4, $emsg4, $headers4);
  /*HR*/  
  
  
  if($_POST['Htname']!='' AND $_POST['Htmail']!='')  //HOD -top level
  {
   $eto5 = $_POST['Htmail'];
   $efrom5 = 'admin@vnrseeds.co.in';
   $esub5 = 'For authorisation of Attendance';
   $headers5 = "From: ".$efrom5."\r\n"; 
   $headers5 .= "MIME-Version: 1.0\r\n";
   $headers5 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $emsg5 .= "<html><head></head><body>";
   $emsg5 .= "Dear <b>".$_POST['Hname'].",</b><br><br>\n\n\n";
   $emsg5 .= "Your team member ".$_POST['Ename']." reporting to ".$_POST['Rname']." has requested for attendance authorisation for dated ".date("d-m-Y",strtotime($_POST['AttDate']))." in ESS, Please log-in in ESS for more details.<br><br>\n\n";
   $emsg5 .= "From <br><b>ADMIN ESS</b><br>";
   $emsg5 .= "</body></html>";	      
   $ok=@mail($eto5, $esub5, $emsg5, $headers5);
  }
  
  echo '<script>alert("Request sent successfully...!!"); </script>';
  
 }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Attendance Request Form</title>
<style>
.font{ font-style:normal;text-align:center;font-family:Times New Roman;font-size:20px;font-weight:bold;}
.font2{ font-style:oblique;font-family:Times New Roman;font-size:16px;}
</style>
<script type="text/javascript" language="javascript">
function FunChk(v)
{
 if(v==1)
 {
  if(document.getElementById("check1").checked==true){document.getElementById("reasonI").disabled=false;document.getElementById("remarkI").disabled=false;}else{document.getElementById("reasonI").disabled=true;document.getElementById("remarkI").disabled=true;}
 }
 if(v==2)
 {
  if(document.getElementById("check2").checked==true){document.getElementById("reasonO").disabled=false;document.getElementById("remarkO").disabled=false;}else{document.getElementById("reasonO").disabled=true;document.getElementById("remarkO").disabled=true;} 
 }
 
  if(document.getElementById("Inn").value==1 && document.getElementById("Outt").value==1)
  {
   if(document.getElementById("check1").checked==true || document.getElementById("check2").checked==true)
   {document.getElementById("reqSubmit").disabled=false;}else{document.getElementById("reqSubmit").disabled=true;}
  }
  else if(document.getElementById("Inn").value==1 && document.getElementById("Outt").value==0)
  {
   if(document.getElementById("check1").checked==true){document.getElementById("reqSubmit").disabled=false;}
   else{document.getElementById("reqSubmit").disabled=true;}
  }
  else if(document.getElementById("Inn").value==0 && document.getElementById("Outt").value==1)
  {
   if(document.getElementById("check2").checked==true){document.getElementById("reqSubmit").disabled=false;}
   else{document.getElementById("reqSubmit").disabled=true;}
  }
 
 
 //else if(document.getElementById("check1").checked==false && document.getElementById("check2").checked==false)
 //{document.getElementById("reqSubmit").disabled=true;}
 
}

function validate(attreqform) 
{
 if(document.getElementById("Inn").value==1)
 {
  if(document.getElementById("check1").checked==true)
  {
   if(document.getElementById("reasonI").value==0){alert("Please select reason for In-Time request"); return false; }
   else if(document.getElementById("remarkI").value==''){alert("Please type remark for In-Time request"); return false; }
  }
 }
 
 if(document.getElementById("Outt").value==1)
 {
  if(document.getElementById("check2").checked==true)
  {
   if(document.getElementById("reasonO").value==0){alert("Please select reason for Out-Time request"); return false; }
   else if(document.getElementById("remarkO").value==''){alert("Please type remark for Out-Time request"); return false; }
  }
 }
 
  var agree=confirm("Are you sure?");
  if(agree)
  {
    getId("reqSubmit").style.display="none";
    getId("wait_tip").style.display="";
    return true;
  }
  else{return false;}
}

function getId(id)
{ return document.getElementById(id); }
   
</script>
</head>
<body>
<center>
<?php 
if($_REQUEST['id']>0)  //open open
{
$sE=mysql_query("SELECT * FROM hrm_employee_attendance WHERE AttId=".$_REQUEST['id'], $con); 
$rowE=mysql_num_rows($sE); $rE=mysql_fetch_array($sE); 
$chk=mysql_query("select * from hrm_employee_attendance_req where EmployeeID=".$rE['EmployeeID']." AND AttDate='".$rE['AttDate']."'",$con); $rowchk=mysql_num_rows($chk); $rchk=mysql_fetch_assoc($chk);

$sql=mysql_query("select Fname,Sname,Lname,RepEmployeeID,EmailId_Vnr,Gender,Married,DR from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=".$rE['EmployeeID'], $con); $res=mysql_fetch_assoc($sql); if($res['DR']=='Y'){$me='Dr.';} elseif($res['Gender']=='M'){$me='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$me='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$me='Miss.';}

if($res['RepEmployeeID']!=0 AND $res['RepEmployeeID']!='')
{

$sqlR=mysql_query("select Fname,Sname,Lname,RepEmployeeID,EmailId_Vnr,Gender,Married,DR from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=".$res['RepEmployeeID'], $con); $resR=mysql_fetch_assoc($sqlR); if($resR['DR']=='Y'){$mr='Dr.';} elseif($resR['Gender']=='M'){$mr='Mr.';} elseif($resR['Gender']=='F' AND $resR['Married']=='Y'){$mr='Mrs.';} elseif($resR['Gender']=='F' AND $resR['Married']=='N'){$mr='Miss.';}

 if($resR['RepEmployeeID']!=0 AND $resR['RepEmployeeID']!='')
 {
  $sqlH=mysql_query("select Fname,Sname,Lname,EmailId_Vnr,Gender,Married,DR,RepEmployeeID from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=".$resR['RepEmployeeID'], $con); $resH=mysql_fetch_assoc($sqlH); if($resH['DR']=='Y'){$mh='Dr.';} elseif($resH['Gender']=='M'){$mh='Mr.';} elseif($resH['Gender']=='F' AND $resH['Married']=='Y'){$mh='Mrs.';} elseif($resH['Gender']=='F' AND $resH['Married']=='N'){$mh='Miss.';}
  
  if($resH['RepEmployeeID']!=0 AND $resH['RepEmployeeID']!='')
  {
   $sqltH=mysql_query("select Fname,Sname,Lname,EmailId_Vnr,Gender,Married,DR from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=".$resH['RepEmployeeID'], $con); $restH=mysql_fetch_assoc($sqltH); if($restH['DR']=='Y'){$mht='Dr.';} elseif($restH['Gender']=='M'){$mht='Mr.';} elseif($restH['Gender']=='F' AND $restH['Married']=='Y'){$mht='Mrs.';} elseif($restH['Gender']=='F' AND $restH['Married']=='N'){$mht='Miss.';}
  } 
 }

}



$sqlHrE=mysql_query("select Fname,Sname,Lname,EmailId_Vnr,Gender,Married,DR from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=83",$con); $resHrE=mysql_fetch_assoc($sqlHrE); if($resHrE['DR']=='Y'){$mHrE='Dr.';} elseif($resHrE['Gender']=='M'){$mHrE='Mr.';} elseif($resHrE['Gender']=='F' AND $resHrE['Married']=='Y'){$mHrE='Mrs.';} elseif($resHrE['Gender']=='F' AND $resHrE['Married']=='N'){$mHrE='Miss.';}

} //close close
?>

<form name="attreqform" method="post" onsubmit="return validate(this)">
<input type="hidden" name="Ename" value="<?php echo $me.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?>" />
<input type="hidden" name="Email" value="<?php echo $res['EmailId_Vnr']; ?>" />
<input type="hidden" name="Rname" value="<?php echo $mr.' '.$resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname']; ?>" />
<input type="hidden" name="Rmail" value="<?php echo $resR['EmailId_Vnr']; ?>" />
<input type="hidden" name="Hname" value="<?php echo $mh.' '.$resH['Fname'].' '.$resH['Sname'].' '.$resH['Lname']; ?>" />
<input type="hidden" name="Hmail" value="<?php echo $resH['EmailId_Vnr']; ?>" />

<input type="hidden" name="Htname" value="<?php echo $mht.' '.$restH['Fname'].' '.$restH['Sname'].' '.$restH['Lname']; ?>" />
<input type="hidden" name="Htmail" value="<?php echo $restH['EmailId_Vnr']; ?>" />

<input type="hidden" name="HrEname" value="<?php echo $mHrE.' '.$resHrE['Fname'].' '.$resHrE['Sname'].' '.$resHrE['Lname']; ?>" />
<input type="hidden" name="HrEmail" value="<?php echo $resHrE['EmailId_Vnr']; ?>" />

<input type="hidden" name="EId" Id="EId" value="<?php echo $rE['EmployeeID']; ?>" />
<input type="hidden" name="RId" value="<?php echo $res['RepEmployeeID']; ?>" />
<input type="hidden" name="HId" value="<?php echo $resR['RepEmployeeID']; ?>" />
<input type="hidden" name="HtId" value="<?php echo $resH['RepEmployeeID']; ?>" />

<?php /*
<input type="hidden" name="EId" Id="EId" value="<?php echo $rE['EmployeeID']; ?>" />
<input type="hidden" name="RId" value="<?php echo $res['RepEmployeeID']; ?>" />
<input type="hidden" name="HId" value="<?php echo $resH['RepEmployeeID']; ?>" />
<input type="hidden" name="HtId" value="<?php echo $restH['RepEmployeeID']; ?>" />
*/ ?>
<input type="hidden" name="Inn" Id="Inn" value="<?php echo $rE['InnLate']; ?>" />
<input type="hidden" name="Outt" Id="Outt" value="<?php echo $rE['OuttLate']; ?>" />
<input type="hidden" name="AttDate" Id="AttDate" value="<?php echo date("Y-m-d", strtotime($rE['AttDate'])); ?>" />
<table style="margin-top:10px;width:100%;">
<tr><td colspan="3" class="font">Attendance Authorisation</td></tr>
<div style="position:absolute;top:120px;left:150px;">
<span id="wait_tip" style="display:none;"><img src="images/loading.gif" id="loading_img"/> Please wait...</span>
</div>
<tr><td colspan="3" valign="top">&nbsp;</td></tr>
<tr>
<td class="font2" style="width:25%;">Request Date</td>
<td class="font2" style="width:2%;">:</td>
<td class="font2" style="width:73%;"><?php echo date("d-m-Y", strtotime($rE['AttDate'])); ?></td>
</tr>
<tr>
<td class="font2">Time</td><td class="font2">:</td>
<td class="font2"><b><font color="#004080">In:</font>&nbsp;<font style="color:<?php if($rE['InnLate']==1){echo '#FF0000';}?>;"><?php if($rE['Inn']=='00:00:00' OR $rE['Inn']==''){echo '00:00';}else{echo date("h:i",strtotime($rE['Inn']));} ?>&nbsp;<?php if($rE['InnLate']==1){echo '- Late';}?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#004080">Out:</font>&nbsp;<font style="color:<?php if($rE['OuttLate']==1){echo '#FF0000';}?>;"><?php if($rE['Outt']=='00:00:00' OR $rE['Outt']==''){echo '00:00';}else{echo date("h:i",strtotime($rE['Outt']));} ?>&nbsp;<?php if($rE['OuttLate']==1){echo '- Early Going';}?></font></b></td>
</tr>
<tr><td style="height:10px;"></td></tr>
<?php if($rE['InnLate']==1){?>
<tr>
<td class="font2" colspan="2"></td>
<td class="font2" style="color:#000099;"><u><b>Request for In-Time Attendance</b></u>&nbsp;&nbsp;<input type="checkbox" id="check1" onclick="FunChk(1)" <?php if($rowchk>0 AND $rchk['InReason']!='' AND $rchk['InRemark']!=''){echo 'checked';} ?>/>&nbsp;&nbsp;&nbsp;<?php if($rowchk>0 AND $rchk['InReason']!='' AND $rchk['InRemark']!=''){ ?><font style="font-style:normal;font-weight:bold;color:#FF51A8;">[ Status:
<?php if($rchk['InStatus']==0){ echo '<font color="#FF8888">Draft</font>'; }elseif($rchk['InStatus']==1){ echo '<font color="#FF8888">Pending</font>'; }elseif($rchk['InStatus']==2){ echo '<font color="#009100">Approved</font>'; }elseif($rchk['InStatus']==3){ echo '<font color="#FF2D2D">Rejected</font>'; } ?> ]</font><?php } ?>

</td>
</tr>
<tr>
<td class="font2">Reason</td>
<td class="font2">:</td>
<td class="font2"><select class="font2" id="reasonI" name="reasonI" style="width:150px;" disabled>
<?php if($rowchk>0 AND $rchk['InReason']!=''){ ?><option value="<?php echo $rchk['InReason']; ?>"><?php echo $rchk['InReason']; ?></option><?php } else { ?><option value="0">Select</option><?php } ?><option value="Official">Official</option><option value="Other">Other</option></select></td>
</tr>
<tr>
<td class="font2" valign="top">Remark</td>
<td class="font2" valign="top">:</td>
<td class="font2"><textarea class="font2" id="remarkI" name="remarkI" cols="50" rows="2" disabled><?php echo $rchk['InRemark']; ?></textarea></td>
</tr>
<?php } ?>


<?php if($rE['OuttLate']==1){ ?>
<tr>
<td class="font2" colspan="2"></td>
<td class="font2" style="color:#000099;"><u><b>Request for Out-Time Attendance</b></u>&nbsp;&nbsp;<input type="checkbox" id="check2" onclick="FunChk(2)" <?php if($rowchk>0 AND $rchk['OutReason']!='' AND $rchk['OutRemark']!=''){echo 'checked';} ?>/>
&nbsp;&nbsp;&nbsp;<?php if($rowchk>0 AND $rchk['OutReason']!='' AND $rchk['OutRemark']!=''){ ?><font style="font-style:normal;font-weight:bold;color:#FF51A8;">[ Status:
<?php if($rchk['OutStatus']==0){ echo '<font color="#FF8888">Draft</font>'; }elseif($rchk['OutStatus']==1){ echo '<font color="#FF8888">Pending</font>'; }elseif($rchk['OutStatus']==2){ echo '<font color="#009100">Approved</font>'; }elseif($rchk['OutStatus']==3){ echo '<font color="#FF2D2D">Rejected</font>'; } ?> ]</font><?php } ?>
</td>
</tr>
<tr>
<td class="font2">Reason</td>
<td class="font2">:</td>
<td class="font2"><select class="font2" id="reasonO" name="reasonO" style="width:150px;" disabled>
<?php if($rowchk>0 AND $rchk['OutReason']!=''){ ?><option value="<?php echo $rchk['OutReason']; ?>"><?php echo $rchk['OutReason']; ?></option><?php } else { ?><option value="0">Select</option><?php } ?><option value="Official">Official</option><option value="Other">Other</option></select></td>
</tr>
<tr>
<td class="font2" valign="top">Remark</td>
<td class="font2" valign="top">:</td>
<td class="font2"><textarea class="font2" id="remarkO" name="remarkO" cols="50" rows="2" disabled><?php echo $rchk['OutRemark']; ?></textarea></td>
</tr>
<?php } if($rowchk==0){ ?>
<tr>
<td colspan="2" class="font2" valign="top"></td>
<?php if(date("m")==date("m",strtotime($rE['AttDate']))){?>
<td class="font2"><input class="font2" type="button" value="Refresh" onClick="javascript:window.location='AttReqForLate.php?id=<?php echo $_REQUEST['id']; ?>'"/><input class="font2" type="submit" name="reqSubmit" id="reqSubmit" value="Send Request" disabled/>

</td>
<?php } ?>
</tr>
<?php } ?>
<tr>
<td colspan="2" class="font2" valign="top"></td>
<td class="font2" style="color:#509F00;font-size:18px;"><b><?php echo $msg; ?></b></td>
</tr>
</table>
</form>
</center>
</body>
</html>
