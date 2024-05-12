<?php require_once('config/config.php'); 
if(isset($_POST['save']))
{ 
  $AppFromDate=date("Y-m-d",strtotime($_POST['DateFrom']));  $AppToDate=date("Y-m-d",strtotime($_POST['DateTo']));
  $startTimeStamp = strtotime($AppFromDate); $endTimeStamp = strtotime($AppToDate);
  $timeDiff = abs($endTimeStamp - $startTimeStamp); 
  $days = ($timeDiff/86400)+1;  // 86400 seconds in one day 
  
  if($_POST['FromHF']=='F' AND $_POST['ToHF']=='F'){$Duration=$days;}
  elseif($_POST['FromHF']=='H' AND $_POST['ToHF']=='H'){ if($AppFromDate==$AppToDate){$Duration=0.5;} else{$Duration=$days-1;} }
  elseif($_POST['FromHF']=='H' AND $_POST['ToHF']=='F'){$Duration=$days-0.5;}
  elseif($_POST['FromHF']=='F' AND $_POST['ToHF']=='H'){$Duration=$days-0.5;}
 
 $sqlUp=mysql_query("update hrm_company_conference set ConfTitle='".$_POST['Tital']."', ConfYear=".date("Y",strtotime($_POST['DateFrom'])).", ConfFrom='".date("Y-m-d",strtotime($_POST['DateFrom']))."', ConfFrom_HF='".$_POST['FromHF']."', ConfTo='".date("Y-m-d",strtotime($_POST['DateTo']))."', ConfTo_HF='".$_POST['ToHF']."', Duration='".$Duration."', ConductedBy='".$_POST['ConductedBy']."', Location='".$_POST['Vanue']."', TotalCost='".$_POST['TotAmt']."', CreatedBy=".$_POST['UId'].", CreatedDate='".date("Y-m-d")."' where ConferenceId=".$_POST['TId'], $con); 
 
 $search =  '!"#$%&/\'-:_' ;
 $search = str_split($search);
 for($i=1; $i<=$_POST['RowNo']; $i++)
 {
   $str_Remark = $_POST['remark'.$i]; 
   $Remark=str_replace($search, "", $str_Remark);
   $sqlc=mysql_query("select Amount from hrm_company_conference_cost where ParticularId=".$_POST['Id_'.$i]." AND ConferenceId=".$_POST['TId'], $con); $rowc=mysql_num_rows($sqlc);
   if($rowc>0)
   { $sqlUp=mysql_query("update hrm_company_conference_cost set Remark='".$Remark."', Amount='".$_POST['Amt_'.$i]."' where ParticularId=".$_POST['Id_'.$i]." AND ConferenceId=".$_POST['TId'], $con); }
   else if($rowc==0)
   { $sqlUp=mysql_query("insert into hrm_company_conference_cost(ConferenceId, ParticularId, Remark, Amount) values(".$_POST['TId'].", ".$_POST['Id_'.$i].", '".$Remark."', '".$_POST['Amt_'.$i]."')", $con); }
   
  }
 if($sqlUp)
 { $msg="Data saved successfully...";}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?php include_once('../Title.php'); ?>&nbsp;Employee Conference Program</title>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style>.head{font-family:Times New Roman;font-size:14px;font-weight:bold;}.textInput{font-family:Times New Roman;font-size:12px;height:16px;}
.textInputA{font-family:Times New Roman;font-size:14px;height:16px;}.head2{font-family:Times New Roman;font-size:12px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.body{font-family:Times New Roman;font-size:12px;}</style>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" language="javascript">
function ClickEdit()
{
 document.getElementById("edit").style.display='none'; document.getElementById("save").style.display='block';
 document.getElementById("Tital").readOnly=false; document.getElementById("Vanue").readOnly=false; document.getElementById("ConductedBy").readOnly=false;
 document.getElementById("DateFrom").readOnly=false; document.getElementById("DateTo").readOnly=false;
 document.getElementById("FromHalf").disabled=false; document.getElementById("FromFull").disabled=false;
 document.getElementById("ToHalf").disabled=false; document.getElementById("ToFull").disabled=false;
 document.getElementById("f_btn1").disabled=false; document.getElementById("f_btn2").disabled=false;
 var row=document.getElementById("RowNo").value; //document.getElementById("Inst").readOnly=false; 
 for(var i=1; i<=row; i++) {document.getElementById("remark"+i).readOnly=false; document.getElementById("Amt_"+i).readOnly=false;}
}

function ClickFrom(v){document.getElementById("FromHF").value=v;}
function ClickTo(v){document.getElementById("ToHF").value=v;}


function ClickEmp(EI,CI,ID)
{ var url = 'GetConfParticularEmp.php';	
  if(document.getElementById("checkEmp_"+EI).checked==true)
  { document.getElementById("ETR_"+EI).style.backgroundColor='#FFD5BF'; var pars = 'Action=Add&EI='+EI+'&CI='+CI+'&ID='+ID;}
  else if(document.getElementById("checkEmp_"+EI).checked==false)
  { document.getElementById("ETR_"+EI).style.backgroundColor='#FFFFFF'; var pars = 'Action=Delete&EI='+EI+'&CI='+CI+'&ID='+ID;} 
  var myAjax = new Ajax.Request(url, { method: 'post', parameters: pars, onComplete: show_NewEmpParti });
} 
function show_NewEmpParti(originalRequest)
{ document.getElementById('PartcularEmp').innerHTML = originalRequest.responseText; 
  var totE=document.getElementById("TotParti").value=document.getElementById("TotEmpParti").value; 
}


/*
function ClickDept(v)
{ 
 if(document.getElementById("CDept_"+v).checked==true){document.getElementById("TR_"+v).style.display='block';}
 else if(document.getElementById("CDept_"+v).checked==false){document.getElementById("TR_"+v).style.display='none';}
}
*/

function clickCO(d,v)
{ //alert(d+"-"+v)
 if(v=='C')
 {document.getElementById("TR_"+d).style.display='block'; document.getElementById("clsfol_"+d).style.display='none'; document.getElementById("opnfol_"+d).style.display='block';}
 else if(v=='O')
 {document.getElementById("TR_"+d).style.display='none'; document.getElementById("clsfol_"+d).style.display='block'; document.getElementById("opnfol_"+d).style.display='none';}
}


function  AddAmount(v)
{ 
  document.getElementById("Amt2_"+v).value=document.getElementById("Amt_"+v).value;
  var TotAmt=parseFloat(document.getElementById("TotAmt").value);
  var row=document.getElementById("RowNo").value; 
  if(row==1)
  { 
  var s1=parseFloat(document.getElementById("Amt2_1").value); 
  var q = document.getElementById("TotAmt").value=Math.round((s1)*100)/100;
  }
  else if(row==2)
  { 
  var s1=parseFloat(document.getElementById("Amt2_1").value); var s2=parseFloat(document.getElementById("Amt2_2").value);
  var q = document.getElementById("TotAmt").value=Math.round((s1+s2)*100)/100;
  }
  else if(row==3)
  { 
  var s1=parseFloat(document.getElementById("Amt2_1").value); var s2=parseFloat(document.getElementById("Amt2_2").value);
  var s3=parseFloat(document.getElementById("Amt2_3").value); 
  var q = document.getElementById("TotAmt").value=Math.round((s1+s2+s3)*100)/100;
  }
  else if(row==4)
  { 
  var s1=parseFloat(document.getElementById("Amt2_1").value); var s2=parseFloat(document.getElementById("Amt2_2").value);
  var s3=parseFloat(document.getElementById("Amt2_3").value); var s4=parseFloat(document.getElementById("Amt2_4").value);
  var q = document.getElementById("TotAmt").value=Math.round((s1+s2+s3+s4)*100)/100;
  }
  else if(row==5)
  { 
  var s1=parseFloat(document.getElementById("Amt2_1").value); var s2=parseFloat(document.getElementById("Amt2_2").value);
  var s3=parseFloat(document.getElementById("Amt2_3").value); var s4=parseFloat(document.getElementById("Amt2_4").value);
  var s5=parseFloat(document.getElementById("Amt2_5").value); 
  var q = document.getElementById("TotAmt").value=Math.round((s1+s2+s3+s4+s5)*100)/100;
  }
  else if(row==6)
  { 
  var s1=parseFloat(document.getElementById("Amt2_1").value); var s2=parseFloat(document.getElementById("Amt2_2").value);
  var s3=parseFloat(document.getElementById("Amt2_3").value); var s4=parseFloat(document.getElementById("Amt2_4").value);
  var s5=parseFloat(document.getElementById("Amt2_5").value); var s6=parseFloat(document.getElementById("Amt2_6").value);
  var q = document.getElementById("TotAmt").value=Math.round((s1+s2+s3+s4+s5+s6)*100)/100;
  }
  else if(row==7)
  { 
  var s1=parseFloat(document.getElementById("Amt2_1").value); var s2=parseFloat(document.getElementById("Amt2_2").value);
  var s3=parseFloat(document.getElementById("Amt2_3").value); var s4=parseFloat(document.getElementById("Amt2_4").value);
  var s5=parseFloat(document.getElementById("Amt2_5").value); var s6=parseFloat(document.getElementById("Amt2_6").value);
  var s7=parseFloat(document.getElementById("Amt2_7").value); 
  var q = document.getElementById("TotAmt").value=Math.round((s1+s2+s3+s4+s5+s6+s7)*100)/100;
  }
  else if(row==8)
  { 
  var s1=parseFloat(document.getElementById("Amt2_1").value); var s2=parseFloat(document.getElementById("Amt2_2").value);
  var s3=parseFloat(document.getElementById("Amt2_3").value); var s4=parseFloat(document.getElementById("Amt2_4").value);
  var s5=parseFloat(document.getElementById("Amt2_5").value); var s6=parseFloat(document.getElementById("Amt2_6").value);
  var s7=parseFloat(document.getElementById("Amt2_7").value); var s8=parseFloat(document.getElementById("Amt2_8").value);
  var q = document.getElementById("TotAmt").value=Math.round((s1+s2+s3+s4+s5+s6+s7+s8)*100)/100;
  }
 else if(row==9)
  { 
  var s1=parseFloat(document.getElementById("Amt2_1").value); var s2=parseFloat(document.getElementById("Amt2_2").value);
  var s3=parseFloat(document.getElementById("Amt2_3").value); var s4=parseFloat(document.getElementById("Amt2_4").value);
  var s5=parseFloat(document.getElementById("Amt2_5").value); var s6=parseFloat(document.getElementById("Amt2_6").value);
  var s7=parseFloat(document.getElementById("Amt2_7").value); var s8=parseFloat(document.getElementById("Amt2_8").value);
  var s9=parseFloat(document.getElementById("Amt2_9").value);
  var q = document.getElementById("TotAmt").value=Math.round((s1+s2+s3+s4+s5+s6+s7+s8+s9)*100)/100;
  }
  else if(row==10)
  { 
  var s1=parseFloat(document.getElementById("Amt2_1").value); var s2=parseFloat(document.getElementById("Amt2_2").value);
  var s3=parseFloat(document.getElementById("Amt2_3").value); var s4=parseFloat(document.getElementById("Amt2_4").value);
  var s5=parseFloat(document.getElementById("Amt2_5").value); var s6=parseFloat(document.getElementById("Amt2_6").value);
  var s7=parseFloat(document.getElementById("Amt2_7").value); var s8=parseFloat(document.getElementById("Amt2_8").value);
  var s9=parseFloat(document.getElementById("Amt2_9").value); var s10=parseFloat(document.getElementById("Amt2_10").value);
  var q = document.getElementById("TotAmt").value=Math.round((s1+s2+s3+s4+s5+s6+s7+s8+s9+s10)*100)/100;
  }
  else if(row==11)
  { 
  var s1=parseFloat(document.getElementById("Amt2_1").value); var s2=parseFloat(document.getElementById("Amt2_2").value);
  var s3=parseFloat(document.getElementById("Amt2_3").value); var s4=parseFloat(document.getElementById("Amt2_4").value);
  var s5=parseFloat(document.getElementById("Amt2_5").value); var s6=parseFloat(document.getElementById("Amt2_6").value);
  var s7=parseFloat(document.getElementById("Amt2_7").value); var s8=parseFloat(document.getElementById("Amt2_8").value);
  var s9=parseFloat(document.getElementById("Amt2_9").value); var s10=parseFloat(document.getElementById("Amt2_10").value);
  var s11=parseFloat(document.getElementById("Amt2_11").value);
  var q = document.getElementById("TotAmt").value=Math.round((s1+s2+s3+s4+s5+s6+s7+s8+s9+s10+s11)*100)/100;
  }
  else if(row==12)
  { 
  var s1=parseFloat(document.getElementById("Amt2_1").value); var s2=parseFloat(document.getElementById("Amt2_2").value);
  var s3=parseFloat(document.getElementById("Amt2_3").value); var s4=parseFloat(document.getElementById("Amt2_4").value);
  var s5=parseFloat(document.getElementById("Amt2_5").value); var s6=parseFloat(document.getElementById("Amt2_6").value);
  var s7=parseFloat(document.getElementById("Amt2_7").value); var s8=parseFloat(document.getElementById("Amt2_8").value);
  var s9=parseFloat(document.getElementById("Amt2_9").value); var s10=parseFloat(document.getElementById("Amt2_10").value);
  var s11=parseFloat(document.getElementById("Amt2_11").value); var s12=parseFloat(document.getElementById("Amt2_12").value);
  var q = document.getElementById("TotAmt").value=Math.round((s1+s2+s3+s4+s5+s6+s7+s8+s9+s10+s11+s12)*100)/100;
  }
  
}

function PrintData(v,c)
{ window.open("PrintConfDetailsData.php?id="+v+"&c="+c,"PrintForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=50,height=50");}

function EditPar(c,u,id,yi)
{ var win=window.open("New2ConfParticular.php?c="+c+"&u="+u+"&yi="+yi,"PForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=440,height=400");
  var timer = setInterval( function() { if(win.closed) { clearInterval(timer);  window.location="ConferenceProgDetails.php?c="+c+"&u="+u+"&id="+id+"&yi="+yi; } }, 1000);
}

</script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#E0DBE3">
<form name="formName" method="post">
<?php $sqlT = mysql_query("SELECT * from hrm_company_conference WHERE ConferenceId=".$_REQUEST['id'], $con); $Sno=1; $resT = mysql_fetch_assoc($sqlT);?> 	
<input type="hidden" name="ComId" id="ComId" class="textInput" value="<?php echo $_REQUEST['c']; ?>"/>
<input type="hidden" name="UId" id="UId" class="textInput" value="<?php echo $_REQUEST['u']; ?>"/>
<input type="hidden" name="TId" id="TId" class="textInput" value="<?php echo $_REQUEST['id']; ?>"/> 
<input type="hidden" name="YId" id="YId" class="textInput" value="<?php echo $_REQUEST['yi']; ?>"/> 
<table style="vertical-align:top;width:1000px;" align="center" border="0">
 <tr>
  <td style="vertical-align:top;width:700px;">
    <table style="vertical-align:top;width:700px;" align="center" border="0">
 <tr>
 <td>
  <table border="0" style="vertical-align:top;width:700px;">
   <tr>
    <td class="head" style="width:100px;">Title :</td><td style="width:240px;">
	<input name="Tital" id="Tital" class="textInput" style="width:240px;" value='<?php echo $resT['ConfTitle']; ?>' readonly/> </td>
	<td style="width:10px;">&nbsp;</td>
	<td class="head" style="width:100px;">Venue :</td><td style="width:240px;">
	<input name="Vanue" id="Vanue" class="textInput" style="width:240px;" value='<?php echo $resT['Location']; ?>' readonly/> </td>
   </tr>
   <tr>
    <td class="head" style="width:110px;">ConductedBy :</td><td style="width:240px;">
	<input name="ConductedBy" id="ConductedBy" class="textInput" style="width:240px;" value='<?php echo $resT['ConductedBy']; ?>' readonly/> </td>
	<td style="width:10px;">&nbsp;</td>
	<td class="head" style="width:100px;">&nbsp;</td><td style="width:240px;">
	<input type="hidden" name="Inst" id="Inst" class="textInput" style="width:240px;" value='<?php echo $resT['Institute']; ?>' readonly/> </td>
   </tr>
    <tr>
    <td class="head" style="width:100px;">Date From :</td><td style="width:240px;" class="head">
	<input name="DateFrom" id="DateFrom" class="textInput" style="width:60px;" value="<?php echo date("d-m-Y",strtotime($resT['ConfFrom'])); ?>" readonly/>
	<button id="f_btn1" class="CalenderButton" disabled></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
     cal.manageFields("f_btn1", "DateFrom", "%d-%m-%Y");</script>&nbsp;<font size="2">
	 <input type="radio" name="FromDay" id="FromHalf" onClick="ClickFrom(this.value)" value="H" <?php if($resT['ConfFrom_HF']=='H'){echo 'checked';} ?> disabled/>HalfDay&nbsp;&nbsp;
	 <input type="radio" name="FromDay" id="FromFull" onClick="ClickFrom(this.value)" value="F" <?php if($resT['ConfFrom_HF']=='F'){echo 'checked';} ?> disabled/>FullDay</font>
	 <input type="hidden" name="FromHF" id="FromHF" value="<?php echo $resT['ConfFrom_HF']; ?>"/>
	 </td>
	<td style="width:10px;">&nbsp;</td>
	<td class="head" style="width:100px;">Date To :</td><td style="width:240px;" class="head">
	<input name="DateTo" id="DateTo" class="textInput" style="width:60px;" value="<?php echo date("d-m-Y",strtotime($resT['ConfTo'])); ?>" readonly/>
	<button id="f_btn2" class="CalenderButton" disabled></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
     cal.manageFields("f_btn2", "DateTo", "%d-%m-%Y");</script>&nbsp;<font size="2">
	 <input type="radio" name="ToDay" id="ToHalf" onClick="ClickTo(this.value)" value="H" <?php if($resT['ConfTo_HF']=='H'){echo 'checked';} ?> disabled/>HalfDay&nbsp;&nbsp;
	 <input type="radio" name="ToDay" id="ToFull" onClick="ClickTo(this.value)" value="F" <?php if($resT['ConfTo_HF']=='F'){echo 'checked';} ?> disabled/>FullDay</font>
	 <input type="hidden" name="ToHF" id="ToHF" value="<?php echo $resT['ConfTo_HF']; ?>"/>
	 </td>
   </tr>
   <tr><td>&nbsp;</td></tr>   
   <tr>
   <td class="head" colspan="4">Training Expenses Cost :&nbsp;&nbsp;<font color="#007700"><?php echo $msg; ?></font></td>
   <td align="right">
    <table border="0">
	 <tr>		  
	  <td style="font-size:14px;height:20px;font-family:Times New Roman;">
	  <a href="#" onClick="PrintData(<?php echo $_REQUEST['id'].', '.$_REQUEST['c']; ?>)">Print</a></td>
	  <td>&nbsp;</td>
	  <td style="font-size:14px;height:20px;font-family:Times New Roman;">
	  <a href="#" onClick="EditPar(<?php echo $_REQUEST['c'].', '.$_REQUEST['u'].', '.$_REQUEST['id'].', '.$_REQUEST['yi']; ?>)">New Particular</a></td>
	  <td>&nbsp;</td>
	  <td><input type="button" name="edit" id="edit" style="width:80px;display:block;background-color:#FFC4FF;" value="edit" onClick="ClickEdit()">
      <input type="submit" name="save" id="save" style="width:80px;display:block;display:none;background-color:#00B300;" value="save"></td>
      </td>
	 </tr>
	</table>
   </td>
   
   </tr>
   <tr>
   <td colspan="5" style="width:700px;">
    <table border="1">
	 <tr bgcolor="#7a6189">
	  <td class="head" align="center" style="width:50px;color:#FFFFFF;">SN</td>
	  <td class="head" align="center" style="width:250px;color:#FFFFFF;">Particular</td>
	  <td class="head" align="center" style="width:100px;color:#FFFFFF;">Amount</td>
	  <td class="head" align="center" style="width:300px;color:#FFFFFF;">Remark</td>
	 </tr> 	 
<?php $sqlP=mysql_query("select * from hrm_company_conference_particular where CompanyId=".$_REQUEST['c']." order by ParticularId ASC", $con); 
      $sn=1; while($resP=mysql_fetch_assoc($sqlP)) {?>
      <tr bgcolor="#FFFFFF">
	  <td class="body" align="center" style="width:50px;"><?php echo $sn; ?></td>
	  <td class="body" align="" style="width:250px;"><?php echo $resP['Particular'];?>
	  <input type="hidden" name="Id_<?php echo $sn; ?>" value="<?php echo $resP['ParticularId']; ?>"/></td>
<?php $sqlC=mysql_query("select Remark,Amount from hrm_company_conference_cost where ParticularId=".$resP['ParticularId']." AND ConferenceId=".$_REQUEST['id'], $con); 
      $resC=mysql_fetch_assoc($sqlC);?>		  
	  <td class="body" align="center" style="width:100px;">	  
	  <input class="textInputA" id="Amt_<?php echo $sn; ?>" name="Amt_<?php echo $sn; ?>" style="width:100px;text-align:right;" onChange="AddAmount(<?php echo $sn; ?>)" value="<?php echo $resC['Amount'] ?>" readonly/>
	  <input type="hidden" id="Amt2_<?php echo $sn; ?>" name="Amt2_<?php echo $sn; ?>" value="<?php if($resC['Amount']>0){echo $resC['Amount'];}else{echo 0;} ?>" /></td>
	  <td class="body" align="center" style="width:300px;">  
	  <input class="textInput" id="remark<?php echo $sn; ?>" name="remark<?php echo $sn; ?>" style="width:300px;" value="<?php echo $resC['Remark'] ?>" readonly/></td>
	 </tr>
<?php $sn++; } $No=$sn-1;?> <input type="hidden" id="RowNo" name="RowNo" value="<?php echo $No; ?>" />
      <tr bgcolor="#7a6189">
	  <td colspan="2" class="head" align="right" style="color:#FFFFFF;">Total Amount&nbsp;&nbsp;</td>
	  <?php $sqlTot=mysql_query("select SUM(Amount) as TotAmt from hrm_company_conference_cost where ConferenceId=".$_REQUEST['id'], $con); $resTot=mysql_fetch_assoc($sqlTot); ?>	  
	  <td class="body" align="right"><input class="textInputA" id="TotAmt" name="TotAmt" style="width:100px;text-align:right;background-color:#67CE00;font-weight:bold;" value="<?php if($resTot['TotAmt']>0){echo $resTot['TotAmt'];} ?>" readonly/></td>
	  <td>&nbsp;</td>

	 </tr>
	</table>
   </td>
   </tr>
   <tr><td>&nbsp;</td></tr>
   <tr><td class="head" colspan="4">No. Of Participant :</td>
       <td class="head" align="right">Total Participant :&nbsp;<input id="TotParti" style="width:40px;height:16px;text-align:center;" value="<?php if($resT['TotalParticipant']>0){echo $resT['TotalParticipant'];}else{echo 0;} ?>" /></td>
   </tr>
    <tr>
   <td colspan="5" style="width:700px;">
   <span id="PartcularEmp">
    <table border="1">
	 <tr bgcolor="#7a6189">
	  <td class="head" align="center" style="width:50px;color:#FFFFFF;">SN</td>
	  <td class="head" align="center" style="width:60px;color:#FFFFFF;">EmpCode</td>
	  <td class="head" align="center" style="width:400px;color:#FFFFFF;">Name</td>
	  <td class="head" align="center" style="width:190px;color:#FFFFFF;">Department</td>
	  </tr>  
<?php $sqlP=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentCode,DR,Married,Gender from hrm_company_conference_participant INNER JOIN hrm_employee_general ON hrm_company_conference_participant.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_company_conference_participant.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee ON hrm_company_conference_participant.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_department ON hrm_employee_general.DepartmentId=hrm_department.DepartmentId where hrm_company_conference_participant.ConferenceId=".$_REQUEST['id'], $con); 
$sn=1; while($resP=mysql_fetch_array($sqlP)){  if($resP['DR']=='Y'){$MS='Dr.';} elseif($resP['Gender']=='M'){$MS='Mr.';} elseif($resP['Gender']=='F' AND $resP['Married']=='Y'){$MS='Mrs.';} elseif($resP['Gender']=='F' AND $resP['Married']=='N'){$MS='Miss.';}  $Name=$MS.' '.$resP['Fname'].' '.$resP['Sname'].' '.$resP['Lname'];
?>	  
	 <tr bgcolor="#FFFFFF">
	  <td class="head2" align="center" style="width:50px;"><?php echo $sn; ?></td>
	  <td class="head2" align="center" style="width:60px;"><?php echo $resP['EmpCode']; ?></td>
	  <td class="head2" align="" style="width:400px;"><?php echo $Name; ?></td>
	  <td class="head2" align="" style="width:190px;"><?php echo $resP['DepartmentCode']; ?></td>
	 </tr> 
<?php $sn++;} ?>	 
	</table>
    </span>
   </td>
   </tr>
<script type="text/javascript" language="javascript">
function SaveClick(ID)
{ if(document.getElementById("OthName").value==''){ alert("please type participant name"); return false;}
  var OthName=document.getElementById("OthName").value;
  var url = 'GetConfParticularEmp.php';	var pars = 'Act=OthEmp&Val='+OthName+'&ID='+ID;
  var myAjax = new Ajax.Request(url, { method: 'post', parameters: pars, onComplete: show_OthEmp });
  
}
function show_OthEmp(originalRequest)
{ document.getElementById('OthPartEmp').innerHTML = originalRequest.responseText; 
  document.getElementById("OthName").value='';
  var totE=document.getElementById("TotParti").value=document.getElementById("TotEmpParti").value; 
}

function OthDel(v,ID)
{
  var url = 'GetConfParticularEmp.php';	var pars = 'Act2=DelOthEmp&v='+v+'&ID='+ID;
  var myAjax = new Ajax.Request(url, { method: 'post', parameters: pars, onComplete: show_OthEmp2 }); //alert(v+"-"+ID)
}
function show_OthEmp2(originalRequest)
{ document.getElementById('OthPartEmp').innerHTML = originalRequest.responseText; 
  var totE=document.getElementById("TotParti").value=document.getElementById("TotEmpParti").value; 
}

</script>   
   <tr>
   <td colspan="5" style="width:700px;">
    <table border="0">
	 <tr >
	  <td class="head" style="width:500px;c">Other Participant</td>
	 </tr>  
	 <tr>
	  <td>
	   <table border="0" cellpadding="0" cellspacing="0">
	    <tr>
		 <td style="width:600px;">
		 <span id="OthPartEmp">
		 <table style="width:600px;" cellpadding="0" cellspacing="0" border="1">
		  <tr bgcolor="#7a6189"><td colspan="3" class="head" align="center" style="width:600px;color:#FFFFFF;">Name/ Details</td></tr>
<?php $sqlP2=mysql_query("select * from hrm_company_conference_participant where EmployeeID='' AND OtherName!='' AND ConferenceId=".$_REQUEST['id']." order by ConfEmpId ASC", $con); 
$sn2=1; while($resP2=mysql_fetch_array($sqlP2)){ ?>			 
		  <tr bgcolor="#FFFFFF">
		    <td style="width:50px;font-family:Times New Roman;font-size:12px;" align="center"><?php echo $sn2; ?></td>
		    <td style="width:500px;font-family:Times New Roman;font-size:14px;">&nbsp;<?php echo $resP2['OtherName']; ?></td>
		    <td style="width:50px;" align="center"><img src="images/delete.png" border="0" onClick="OthDel(<?php echo $resP2['ConfEmpId'].', '.$_REQUEST['id']; ?>)"/></td>
		  </tr>
<?php $sn2++;} ?>	
          <tr bgcolor="#FFFFFF">
		    <td style="width:50px;font-family:Times New Roman;font-size:12px;" align="center"><?php echo $sn2; ?></td>
		    <td style="width:500px;font-family:Times New Roman;font-size:14px;">
			<input style="width:490px;font-family:Times New Roman;font-size:14px;border-style:hidden;" id="OthName" name="OthName" value="" maxlength="199"/></td>
		    <td style="width:50px;" align="center"><input type="button" id="SavBtn" class="SaveButton" onClick="SaveClick(<?php echo $_REQUEST['id']; ?>)" /></td>
		  </tr>  			  
		 </table>
		 </span>
		 </td>
		</tr>	
	   </table>
	  </td>
	 </tr>
	 
	</table>
   </td>
   </tr>
   
  </table>
 </td>
 </tr> 
</table>
  </td>
<?php /******************************************** Select Employee Open*************************************/ ?>  
  <td style="vertical-align:top;width:300px;">
     <table border="0" style="vertical-align:top;width:300px;">
   <tr>
     <td colspan="5" style="width:300px;">
    <table border="0">
<?php /***************** Company 1 *******************************/ ?>	
<tr bgcolor="#FFFFFF"><td colspan="2" align="center"><b style="font-size:14px;font-family:Times New Roman;">VNR SEEDS</b></td></tr>
<?php $sqlD=mysql_query("select DepartmentId,DepartmentCode,DepartmentName from hrm_department where DeptStatus='A' AND CompanyId=".$_REQUEST['c']." order by DepartmentName ASC", $con); 
      while($resD=mysql_fetch_array($sqlD)) { ?>
	 <tr bgcolor="#7a6189">
	  <td class="body" align="center" style="width:30px;">
	  <a href="#" style="text-decoration:none;">
	  <img src="images/close-folder.png" border="0" id="clsfol_<?php echo $resD['DepartmentId']; ?>" onClick="clickCO(<?php echo $resD['DepartmentId']; ?>, 'C')" />
      <img src="images/open-folder.png" border="0" id="opnfol_<?php echo $resD['DepartmentId']; ?>" onClick="clickCO(<?php echo $resD['DepartmentId']; ?>, 'O')" style="display:none;" />
	  </a>
	<?php /* <input type="checkbox" id="CDept_<?php echo $resD['DepartmentId']; ?>" onClick="ClickDept(<?php echo $resD['DepartmentId']; ?>)" /> */ ?> </td>
	  <td class="head" align="" style="width:270px;color:#FFFFFF;" bgcolor="#0080FF">&nbsp;<?php echo ucfirst(strtolower(strtoupper($resD['DepartmentName']))); ?></td>
	 </tr>	
     <tr>
	  <td colspan="2">
	   <table id="TR_<?php echo $resD['DepartmentId']; ?>" style="display:none;" border="1">
<?php $sqlE=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$resD['DepartmentId']." AND hrm_employee.CompanyId=".$_REQUEST['c']." AND EmpStatus='A' order by EmpCode ASC", $con); while($resE=mysql_fetch_array($sqlE)) { 
$sqlc=mysql_query("select ConferenceId from hrm_company_conference_participant where ConferenceId=".$_REQUEST['id']." AND EmployeeID=".$resE['EmployeeID'], $con);
$row=mysql_num_rows($sqlc);
?>	   
	   <tr id=ETR_<?php echo $resE['EmployeeID']; ?> bgcolor="<?php if($row>0){echo '#FFD5BF';}else{echo '#FFFFFF';} ?>">	   
	   <td class="body" align="center" style="width:30px;"><input type="checkbox" id="checkEmp_<?php echo $resE['EmployeeID']; ?>" onClick="ClickEmp(<?php echo $resE['EmployeeID'].', '.$_REQUEST['c'].', '.$_REQUEST['id']; ?>)" <?php if($row>0){echo 'checked';}?> /></td>
	   <td class="body" align="center" style="width:40px;"><?php echo $resE['EmpCode']; ?></td>
	   <td class="body" align="" style="width:230px;"><?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?>
	   </td>
	   </tr>  
<?php } ?>		
	   </table>
	  </td>
	 </tr>
<?php } ?>	 

<?php /***************** Company 2 *******************************/ ?>
<tr bgcolor="#FFFFFF"><td colspan="2" align="center"><b style="font-size:14px;font-family:Times New Roman;">VNR GROUP CONCERNS</b></td></tr>
<?php $sqlD=mysql_query("select DepartmentId,DepartmentCode,DepartmentName from hrm_department where DeptStatus='A' AND CompanyId=2 AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); 
      while($resD=mysql_fetch_array($sqlD)) { ?>
	 <tr bgcolor="#7a6189">
	  <td class="body" align="center" style="width:30px;">
	  <a href="#" style="text-decoration:none;">
	  <img src="images/close-folder.png" border="0" id="clsfol_<?php echo $resD['DepartmentId']; ?>" onClick="clickCO(<?php echo $resD['DepartmentId']; ?>, 'C')" />
      <img src="images/open-folder.png" border="0" id="opnfol_<?php echo $resD['DepartmentId']; ?>" onClick="clickCO(<?php echo $resD['DepartmentId']; ?>, 'O')" style="display:none;" />
	  </a>
	<?php /* <input type="checkbox" id="CDept_<?php echo $resD['DepartmentId']; ?>" onClick="ClickDept(<?php echo $resD['DepartmentId']; ?>)" /> */ ?> </td>
	  <td class="head" align="" style="width:270px;color:#FFFFFF;" bgcolor="#0080FF">&nbsp;<?php echo ucfirst(strtolower(strtoupper($resD['DepartmentName']))); ?></td>
	 </tr>	
     <tr>
	  <td colspan="2">
	   <table id="TR_<?php echo $resD['DepartmentId']; ?>" style="display:none;" border="1">
<?php $sqlE=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$resD['DepartmentId']." AND hrm_employee.CompanyId=2 AND EmpStatus='A' order by EmpCode ASC", $con); while($resE=mysql_fetch_array($sqlE)) { 
$sqlc=mysql_query("select ConferenceId from hrm_company_conference_participant where ConferenceId=".$_REQUEST['id']." AND EmployeeID=".$resE['EmployeeID'], $con);
$row=mysql_num_rows($sqlc);
?>	   
	   <tr id=ETR_<?php echo $resE['EmployeeID']; ?> bgcolor="<?php if($row>0){echo '#FFD5BF';}else{echo '#FFFFFF';} ?>">	   
	   <td class="body" align="center" style="width:30px;"><input type="checkbox" id="checkEmp_<?php echo $resE['EmployeeID']; ?>" onClick="ClickEmp(<?php echo $resE['EmployeeID'].', '.$_REQUEST['c'].', '.$_REQUEST['id']; ?>)" <?php if($row>0){echo 'checked';}?> /></td>
	   <td class="body" align="center" style="width:40px;"><?php echo $resE['EmpCode']; ?></td>
	   <td class="body" align="" style="width:230px;"><?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?>
	   </td>
	   </tr>  
<?php } ?>		
       </table>
	  </td>
	 </tr>
<?php } ?>	

  
<?php /***************** Company 3 *******************************/ ?>
<tr bgcolor="#FFFFFF"><td colspan="2" align="center"><b style="font-size:14px;font-family:Times New Roman;">VNR NURSERY</b></td></tr>
<?php $sqlD=mysql_query("select DepartmentId,DepartmentCode,DepartmentName from hrm_department where DeptStatus='A' AND CompanyId=3 AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); 
      while($resD=mysql_fetch_array($sqlD)) { ?>
	 <tr bgcolor="#7a6189">
	  <td class="body" align="center" style="width:30px;">
	  <a href="#" style="text-decoration:none;">
	  <img src="images/close-folder.png" border="0" id="clsfol_<?php echo $resD['DepartmentId']; ?>" onClick="clickCO(<?php echo $resD['DepartmentId']; ?>, 'C')" />
      <img src="images/open-folder.png" border="0" id="opnfol_<?php echo $resD['DepartmentId']; ?>" onClick="clickCO(<?php echo $resD['DepartmentId']; ?>, 'O')" style="display:none;" />
	  </a>
	<?php /* <input type="checkbox" id="CDept_<?php echo $resD['DepartmentId']; ?>" onClick="ClickDept(<?php echo $resD['DepartmentId']; ?>)" /> */ ?> </td>
	  <td class="head" align="" style="width:270px;color:#FFFFFF;" bgcolor="#0080FF">&nbsp;<?php echo ucfirst(strtolower(strtoupper($resD['DepartmentName']))); ?></td>
	 </tr>	
     <tr>
	  <td colspan="2">
	   <table id="TR_<?php echo $resD['DepartmentId']; ?>" style="display:none;" border="1">
<?php $sqlE=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$resD['DepartmentId']." AND hrm_employee.CompanyId=3 AND EmpStatus='A' order by EmpCode ASC", $con); while($resE=mysql_fetch_array($sqlE)) { 
$sqlc=mysql_query("select ConferenceId from hrm_company_conference_participant where ConferenceId=".$_REQUEST['id']." AND EmployeeID=".$resE['EmployeeID'], $con);
$row=mysql_num_rows($sqlc);
?>	   
	   <tr id=ETR_<?php echo $resE['EmployeeID']; ?> bgcolor="<?php if($row>0){echo '#FFD5BF';}else{echo '#FFFFFF';} ?>">	   
	   <td class="body" align="center" style="width:30px;"><input type="checkbox" id="checkEmp_<?php echo $resE['EmployeeID']; ?>" onClick="ClickEmp(<?php echo $resE['EmployeeID'].', '.$_REQUEST['c'].', '.$_REQUEST['id']; ?>)" <?php if($row>0){echo 'checked';}?> /></td>
	   <td class="body" align="center" style="width:40px;"><?php echo $resE['EmpCode']; ?></td>
	   <td class="body" align="" style="width:230px;"><?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?>
	   </td>
	   </tr>  
<?php } ?>		
       </table>
	  </td>
	 </tr>
<?php } ?>	

	</table>
   </td>
   </tr>
    </table>
  </td>
<?php /******************************************** Select Employee Close*************************************/ ?>    
 </tr>
</table>

</form>  
</body>
</html>
