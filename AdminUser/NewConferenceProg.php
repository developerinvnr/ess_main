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

 $sqlIns=mysql_query("insert into hrm_company_conference(CompanyId, ConfTitle, ConfYear, ConfFrom, ConfFrom_HF, ConfTo, ConfTo_HF, Duration, ConductedBy, Location, CreatedBy, CreatedDate, YearId) values(".$_POST['ComId'].", '".$_POST['Tital']."', ".date("Y",strtotime($_POST['DateFrom'])).", '".date("Y-m-d",strtotime($_POST['DateFrom']))."', '".$_POST['FromHF']."', '".date("Y-m-d",strtotime($_POST['DateTo']))."', '".$_POST['ToHF']."', '".$Duration."', '".$_POST['ConductedBy']."', '".$_POST['Vanue']."', ".$_POST['UId'].", '".date("Y-m-d")."', ".$_POST['YId'].")", $con);
 if($sqlIns)
 {echo '<script>alert("data saved successfully.."); window.close();</script>';}
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
.CalenderButton {background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.body{font-family:Times New Roman;font-size:14px;}</style>
<script type="text/javascript" language="javascript">
function ClickEdit()
{
 document.getElementById("edit").style.display='none'; document.getElementById("save").style.display='block';
 document.getElementById("Tital").readOnly=false; document.getElementById("Vanue").readOnly=false; document.getElementById("ConductedBy").readOnly=false;
 document.getElementById("DateFrom").readOnly=false; document.getElementById("DateTo").readOnly=false;
 document.getElementById("FromHalf").disabled=false; document.getElementById("FromFull").disabled=false;
 document.getElementById("ToHalf").disabled=false; document.getElementById("ToFull").disabled=false;
 document.getElementById("f_btn1").disabled=false; document.getElementById("f_btn2").disabled=false;
 //document.getElementById("Inst").readOnly=false;
 
}

function ValidateForm(form) 
{ 
 
  var Tital = formName.Tital.value; var filter=/^[a-zA-Z.&()-, /]+$/; var test_bool = filter.test(Tital);  
  if (Tital.length === 0) { alert("You must enter a Tital Name.");  return false; }
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Tital Name Field');  return false; } 
  
  var Vanue = formName.Vanue.value; var test_bool2 = filter.test(Vanue);
  if (Vanue.length === 0) { alert("You must enter a Venue Name.");  return false; }
  //if(test_bool2==false) { alert('Please Enter Only Alphabets in the Vanue Name Field');  return false; } 
  
  var ConductedBy = formName.ConductedBy.value; var test_bool3 = filter.test(ConductedBy);
  if (ConductedBy.length === 0) { alert("You must enter a ConductedBy Name.");  return false; }
  //if(test_bool3==false) { alert('Please Enter Only Alphabets in the ConductedBy Name Field');  return false; } 
  
  //var Inst = formName.Inst.value; var test_bool4 = filter.test(Inst);
  //if (Inst.length === 0) { alert("You must enter a Institute Name.");  return false; }
  //if(test_bool4==false) { alert('Please Enter Only Alphabets in the Institute Name Field');  return false; } 
  
  var DF = formName.DateFrom.value; var test_bool5 = filter.test(DF);
  if (DF.length === 0) { alert("You must enter a Date From Field.");  return false; }
 
  var DT = formName.DateTo.value; var test_bool6 = filter.test(DT);
  if (DT.length === 0) { alert("You must enter a Date To Field.");  return false; }
  
  var DMY=DF.split('-');     //splits the date string by '-' and stores in a array.
  var DMY2=DT.split('-');
  var day=DMY[0];  var month=DMY[1];  var year=DMY[2];
  var day1=DMY2[0];  var month1=DMY2[1];  var year1=DMY2[2];
  var dateTemp1=month+'/'+day+'/'+year;  
  var dateTemp2=month1+'/'+day1+'/'+year1;
  var date1 = new Date(dateTemp1);//mm/dd/yy 
  var date2 = new Date(dateTemp2); //mm/dd/yy
  var Timed1=date1.getTime(); var Timed2=date2.getTime();
  if(Timed1>Timed2){alert('Error : Please check training date!'); return false;}
  
  
  var FromHF = formName.FromHF.value;  var ToHF = formName.ToHF.value;
  if(DF==DT)
  {
   if((FromHF=='F' && ToHF=='H') || (FromHF=='H' && ToHF=='F'))
   {alert("Please Check HalfDay FullDay!"); return false; }
  }
  
  var agree=confirm("Are you sure you want to add new conference program.")
  if(agree){return true;}else{return false;}
  
}

function ClickFrom(v){document.getElementById("FromHF").value=v;}

function ClickTo(v){document.getElementById("ToHF").value=v;}

</script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#E0DBE3">
<form name="formName" method="post" onSubmit="return ValidateForm(this.value)" />
<input type="hidden" name="ComId" id="ComId" class="textInput" value="<?php echo $_REQUEST['c']; ?>"/>
<input type="hidden" name="UId" id="UId" class="textInput" value="<?php echo $_REQUEST['u']; ?>"/>
<input type="hidden" name="YId" id="YId" class="textInput" value="<?php echo $_REQUEST['yi']; ?>"/>
<table style="vertical-align:top;width:350px;" align="center" border="0">
 <tr><td align="center" style="font-family:Times New Roman;font-size:18px;height:16px;"><b><u>Conference Details</u></b></td></tr>
 <tr><td>&nbsp;</td></tr>
 <tr><td>&nbsp;</td></tr>
 <tr><td>&nbsp;</td></tr>
 <tr>
 <td>
  <table border="0" style="vertical-align:top;width:350px;">
   <tr><td class="head" style="width:100px;">Title :</td><td style="width:240px;"><input name="Tital" id="Tital" class="textInput" style="width:240px;" readonly/></td></tr>
   <tr><td class="head" style="width:100px;">Venue :</td><td style="width:240px;"><input name="Vanue" id="Vanue" class="textInput" style="width:240px;" readonly/></td></tr>
   <tr><td class="head" style="width:100px;">Conducted By :</td><td style="width:240px;"><input name="ConductedBy" id="ConductedBy" class="textInput" style="width:240px;" readonly/></td></tr>
 <?php /*<tr><td class="head" style="width:100px;">Institute :</td><td style="width:240px;"><input name="Inst" id="Inst" class="textInput" style="width:240px;" readonly/></td></tr>*/ ?>
   <tr><td class="head" style="width:100px;">Date From :</td><td style="width:240px;" class="head"><input name="DateFrom" id="DateFrom" class="textInput" style="width:70px;" readonly/>
	 <button id="f_btn1" class="CalenderButton" disabled></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
       cal.manageFields("f_btn1", "DateFrom", "%d-%m-%Y");</script>&nbsp;<font size="2">
	   <input type="radio" name="FromDay" id="FromHalf" onClick="ClickFrom(this.value)" value="H" disabled/>HalfDay&nbsp;&nbsp;
	   <input type="radio" name="FromDay" id="FromFull" onClick="ClickFrom(this.value)" value="F" checked disabled/>FullDay</font>
	   <input type="hidden" name="FromHF" id="FromHF" value="F"/>
	  </td></tr>
   <tr><td class="head" style="width:100px;">Date To :</td><td style="width:240px;" class="head"><input name="DateTo" id="DateTo" class="textInput" style="width:70px;" readonly/>
	 <button id="f_btn2" class="CalenderButton" disabled></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
       cal.manageFields("f_btn2", "DateTo", "%d-%m-%Y");</script>&nbsp;<font size="2">
	   <input type="radio" name="ToDay" id="ToHalf" onClick="ClickTo(this.value)" value="H" disabled/>HalfDay&nbsp;&nbsp;
	   <input type="radio" name="ToDay" id="ToFull" onClick="ClickTo(this.value)" value="F" checked disabled/>FullDay</font>
	   <input type="hidden" name="ToHF" id="ToHF" value="F"/>
	  </td></tr>	  
   <tr>
   <td bgcolor="#7a6189" align="right" style="width:100%;" colspan="2">
    <table border="0">
    <tr>
	  <td align="right"><input type="button" name="edit" id="edit" style="width:50px;display:block;" value="edit" onClick="ClickEdit()">
	  <input type="submit" name="save" id="save" style="width:50px;display:block;display:none;" value="save"></td>
	  <td align="right"><input type="button" name="close" id="close" style="width:50px;display:block;" value="close" onClick="javascript:window.close();"></td>
   </tr>
  </table>
  </td>
 </tr>
 </td>
 </tr> 
</table>
</form>  
</body>
</html>
