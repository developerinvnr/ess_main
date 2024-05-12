<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************************************************
if(isset($_POST['SaveNew']))
{  if($_POST['State_1']==''){$_POST['State_1']=0;} if($_POST['State_2']==''){$_POST['State_2']=0;}
   if($_POST['State_3']==''){$_POST['State_3']=0;} if($_POST['State_4']==''){$_POST['State_4']=0;}
   $SqlInseart = mysql_query("INSERT INTO hrm_holiday(Year,HolidayName,HolidayDate,Day,State_1,State_2,State_3,State_4,status,CompanyId,CreatedBy,CreatedDate,YearId) VALUES('".$_POST['y']."','".$_POST['HolidayName']."', '".date("Y-m-d",strtotime($_POST['HolidayDate']))."', '".$_POST['HalfFullDay']."', ".$_POST['State_1'].", ".$_POST['State_2'].", ".$_POST['State_3'].", ".$_POST['State_4'].", '".$_POST['Status']."', '".$CompanyId."', '".$UserId."','".date('Y-m-d')."','".$YearId."')", $con); 
   if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}
if(isset($_POST['SaveEdit']))
{
 
  if($_POST['State_1']==''){$_POST['State_1']=0;} if($_POST['State_2']==''){$_POST['State_2']=0;}
  if($_POST['State_3']==''){$_POST['State_3']=0;} if($_POST['State_4']==''){$_POST['State_4']=0;}
	 
	 $SqlUpdate = mysql_query("UPDATE hrm_holiday SET Year='".$_POST['y']."', HolidayName='".$_POST['HolidayName']."', HolidayDate='".date("Y-m-d",strtotime($_POST['HolidayDate']))."', Day='".$_POST['HalfFullDay']."', State_1=".$_POST['State_1'].", State_2=".$_POST['State_2'].", State_3=".$_POST['State_3'].", State_4=".$_POST['State_4'].", status='".$_POST['Status']."' WHERE HolidayId=".$_POST['HolidayId'], $con);
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
	  
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
  $SqlDelete=mysql_query("UPDATE hrm_holiday SET status='De' WHERE HolidayId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}

if(isset($_POST['OSaveNew']))
{  $SqlInseart = mysql_query("INSERT INTO hrm_holiday_optional(Year,HoOpName,HoOpDate,HoOpDay,HoOpStatus,CompanyId,CreatedBy,CreatedDate,YearId) VALUES('".$_POST['y']."','".$_POST['OHolidayName']."', '".date("Y-m-d",strtotime($_POST['OHolidayDate']))."', '".$_POST['OHalfFullDay']."', '".$_POST['OStatus']."', '".$CompanyId."', '".$UserId."','".date('Y-m-d')."','".$YearId."')", $con); 
   if($SqlInseart){ $msgOH = "Data has been Inserted successfully..."; }
}
if(isset($_POST['OSaveEdit']))
{
  $SqlUpdate = mysql_query("UPDATE hrm_holiday_optional SET Year='".$_POST['y']."', HoOpName='".$_POST['OHolidayName']."', HoOpDate='".date("Y-m-d",strtotime($_POST['OHolidayDate']))."', HoOpDay='".$_POST['OHalfFullDay']."', HoOpStatus='".$_POST['OStatus']."' WHERE HoOpId=".$_POST['OHolidayId'], $con);
     if($SqlUpdate){ $msgOH = "Data has been Updeted successfully...";}
	 
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="Odelete")
{
  $SqlDelete=mysql_query("UPDATE hrm_holiday_optional SET HoOpStatus='De' WHERE HoOpId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msgOH = "Data has been deleted successfully..."; }
}

?>

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style> .font { color:#ffffff; font-family:Times New Roman; font-size:15px; width:200px;} .font1 { font-family:Times New Roman; font-size:12px; height:14px; width:200px; } 
.font2 { font-size:12px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MandatoryAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script>

function SelYear(v)
{  
  if(v==0){alert("please select year"); return false;}
  else{ var x="Holiday.php?y="+v; window.location=x;}
}



function edit(value) { var y=document.getElementById("YearSel").value; var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "Holiday.php?action=edit&eid="+value+"&y="+y;  window.location=x;}}
function del(value) { var y=document.getElementById("YearSel").value; var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "Holiday.php?action=delete&did="+value+"&y="+y;  window.location=x;}}
function newsave() { var y=document.getElementById("YearSel").value; var x = "Holiday.php?action=newsave&y="+y;  window.location=x;}

                                                     //Date Validation Start 
var dtCh= "-";
var minYear=1900;
var maxYear=2100;
												 
function isInteger(s){
	var i;
    for (i = 0; i < s.length; i++){   
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}

function stripCharsInBag(s, bag){
	var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++){   
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}

function daysInFebruary (year){
	// February has 29 days in any year evenly divisible by four,
    // EXCEPT for centurial years which are not also divisible by 400.
    return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
}
function DaysArray(n) {
	for (var i = 1; i <= n; i++) {
		this[i] = 31
		if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
		if (i==2) {this[i] = 29}
   } 
   return this
}

function isDate(dtStr){
	var daysInMonth = DaysArray(12)
	var pos1=dtStr.indexOf(dtCh)
	var pos2=dtStr.indexOf(dtCh,pos1+1)
	var strDay=dtStr.substring(0,pos1)
	var strMonth=dtStr.substring(pos1+1,pos2)
	var strYear=dtStr.substring(pos2+1)
	strYr=strYear
	if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
	if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
	for (var i = 1; i <= 3; i++) {
		if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
	}
	day=parseInt(strDay)
	month=parseInt(strMonth)
	//day=parseInt(strDay)
	year=parseInt(strYr)
	if (pos1==-1 || pos2==-1){
	    alert("The date format should be : dd/mm/yyyy")
		//alert("The date format should be : mm/dd/yyyy")
		return false
	}
	if (strMonth.length<1 || month<1 || month>12){
		alert("Please enter a valid month")
		return false
	}
	if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
		alert("Please enter a valid day")
		return false
	}
	if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
		alert("Please enter a valid 4 digit year between "+minYear+" and "+maxYear)
		return false
	}
	if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
		alert("Please enter a valid date")
		return false
	}
return true
}
 
 function validateEdit(formEdit){
 var dt=document.formEdit.HolidayDate
	if (isDate(dt.value)==false){
		dt.focus()
		return false
	}
    //return true
  var HolidayName = formEdit.HolidayName.value;  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(HolidayName);
  if (HolidayName.length === 0) { alert("You must enter a HolidayName Name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Holiday Name Field');  return false; }	
  
  var State = formEdit.State.value;  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(State);
  if (State.length === 0) { alert("You must enter a Minimum one State Name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the State Name Field');  return false; }	


 }
                                 // Date Validation End 

function S1Check()
{if(document.getElementById("State_1").checked==true){document.getElementById("State_1").value=1;}
 if(document.getElementById("State_1").checked==false){document.getElementById("State_1").value=0;}}
function S2Check()
{if(document.getElementById("State_2").checked==true){document.getElementById("State_2").value=1;}
 if(document.getElementById("State_2").checked==false){document.getElementById("State_2").value=0;}}
function S3Check()
{if(document.getElementById("State_3").checked==true){document.getElementById("State_3").value=1;}
 if(document.getElementById("State_3").checked==false){document.getElementById("State_3").value=0;}}  
function S4Check()
{if(document.getElementById("State_4").checked==true){document.getElementById("State_4").value=1;}
 if(document.getElementById("State_4").checked==false){document.getElementById("State_4").value=0;}}  
 
</SCRIPT> 
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td align="" width="200" class="heading">&nbsp;&nbsp;&nbsp;&nbsp;Holiday</td>	
	  <td style="width:150px;" class="heading"><u>Year</u> :&nbsp;<select style="font-family:Times New Roman;height:20px;width:78px;color:#000000;font-size:14px;" id="YearSel" onChange="SelYear(this.value)" >
	  <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $_REQUEST['y']; ?></option>
	  <?php for($i=date("Y")+1; $i>=2015; $i--){ ?>
<?php if($_REQUEST['y']!=$i){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>
<?php } ?>
	  </select></td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td width="10">&nbsp;</td>
<?php //*********************************************** Open Holidays******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" width="1150">
   
	<tr>
	  <td align="left" width="1150">
	     <table border="1" width="1150" border="1" bgcolor="#FFFFFF">
 <tr bgcolor="#7a6189">
   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;" valign="top"><b>SNo</b></td>
   <td class="font" align="center" style="width:150;" valign="top"><b>Holiday</b></td>
   <td class="font" align="center" style="width:120;" valign="top"><b>Date</b></td>
   <td class="font" align="center" style="width:120;" valign="top"><b>Day</b></td>
   <td class="font" align="center" style="width:200;" valign="top"><b>States except AP, Kerala, Tamil Nadu, Karnataka, Telangana</b></td>
   <td class="font" align="center" style="width:200;" valign="top"><b>Only for AP, Kerala, Tamil Nadu, Karnataka, Telangana</b></td>
   <td class="font" align="center" style="width:120;" valign="top"><b>Hyderabad Plant</b></td>
   <td class="font" align="center" style="width:120;" valign="top"><b>Durg Plant</b></td>
   <td style=" color:#FFFFFF; font-size:11px; width:100px; height:13px;" valign="top" align="center"><b>Status</b></td>
   <td valign="top" align="center" style="font:Georgia; font-size:11px; width:100px; color:#FFFFFF"><b>Action</b></td>
 </tr>
<?php $sqlHoliday=mysql_query("select * from hrm_holiday where status!='De' AND Year='".$_REQUEST['y']."' order by HolidayDate ASC", $con); $SNo=1; while($resHoliday=mysql_fetch_array($sqlHoliday)) {
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$resHoliday['HolidayId']){ ?>
  <form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
  <tr>
   <td align="center" style="font:Georgia; font-size:12px; width:50px;" valign="top"><?php echo $SNo; ?></td>
   <td class="font" style="width:150;" align="left" valign="top"><input name="HolidayName" id="HolidayName" class="EditInput" value="<?php echo $resHoliday['HolidayName']; ?>" style="width:145px;" /></td>
   <td class="font" style="width:120;" align="center" valign="top"><input name="HolidayDate" id="HolidayDate" maxlength="25" style="font-family:Georgia; font-size:12px; width:80px; height:20px;" value="<?php echo date("d-m-Y",strtotime($resHoliday['HolidayDate'])); ?>"><button id="f_btn1" class="CalenderButton"></button>
   <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
   cal.manageFields("f_btn1", "HolidayDate", "%d-%m-%Y");</script></td>
   <td class="font" style="width:120;" align="center" valign="top"><select name="HalfFullDay" id="HalfFullDay" class="EditInput" style="width:120px;">
   <option value="<?php echo $resHoliday['Day']; ?>"><?php echo $resHoliday['Day']; ?></option>
   <option value="Monday">Monday</option><option value="Tuesday">Tuesday</option><option value="Wednesday">Wednesday</option>
   <option value="Thursday">Thursday</option><option value="Friday">Friday</option><option value="Saturday">Saturday</option>
   <option value="Sunday">Sunday</option>
   </td>
   <td class="font" style="width:200;" align="center" valign="top">
   <input type="checkbox" name="State_1" id="State_1" class="EditInput" <?php if($resHoliday['State_1']==1){ echo 'checked'; } ?> value="<?php if($resHoliday['State_1']==1){ echo '1'; }else {echo '0';} ?>" onClick="S1Check()"/></td>
   <td class="font" style="width:200;" align="center" valign="top">
   <input type="checkbox" name="State_2" id="State_2" class="EditInput" <?php if($resHoliday['State_2']==1){ echo 'checked'; } ?> value="<?php if($resHoliday['State_2']==1){ echo '1'; }else {echo '0';} ?>" onClick="S2Check()"/></td>
   <td class="font" style="width:120;" align="center" valign="top">
   <input type="checkbox" name="State_3" id="State_3" class="EditInput" <?php if($resHoliday['State_3']==1){ echo 'checked'; } ?> value="<?php if($resHoliday['State_3']==1){ echo '1'; }else {echo '0';} ?>" onClick="S3Check()"/></td>
   <td class="font" style="width:120;" align="center" valign="top">
   <input type="checkbox" name="State_4" id="State_4" class="EditInput" <?php if($resHoliday['State_4']==1){ echo 'checked'; } ?> value="<?php if($resHoliday['State_4']==1){ echo '1'; }else {echo '0';} ?>" onClick="S4Check()"/></td>
   <td style="font-size:11px; width:100px; height:18px;" align="center" valign="top"><select name="Status" id="Status" style="font-size:11px; width:99px; height:20px;">
   <option value="<?php echo $resHoliday['status']; ?>"><?php if($resHoliday['status']=='A'){ echo 'Active'; } else { echo 'Deactive';} ?></option>
   <option value="A">Active</option><option value="D">Deactive</option></select></td>		  
   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:100px;" valign="top">
<?php if($_SESSION['User_Permission']=='Edit'){?>
   <input type="hidden" name="y" id="y" value="<?php echo $_REQUEST['y']; ?>" />
 &nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;<input type="hidden" name="HolidayId" id="HolidayId" value="<?php echo $_REQUEST['eid']; ?>"/>
<?php } ?>
   </td>
 </tr>
		 </form>
		 
<?php } else { ?>	 
		  <tr>
		   <td align="center" style="font:Times New Roman; font-size:12px; width:50px;"><?php echo $SNo; ?></td>
		   <td class="font1" style="width:150;" align="left">&nbsp;<?php echo $resHoliday['HolidayName']; ?></td>
		   <td class="font1" style="width:120;" align="center"><?php echo date("d-m-Y",strtotime($resHoliday['HolidayDate'])); ?></td>
 		   <td class="font1" style="width:120;" align="center"><?php echo $resHoliday['Day']; ?></td>
		   <td class="font1" style="width:200;" align="center"><?php if($resHoliday['State_1']==1){ echo '<img src="images/checkbox_UnCheck.png" border="0" />'; } else { echo '<img src="images/checkbox.png" border="0" />';}?></td>
		   <td class="font1" style="width:200;" align="center"><?php if($resHoliday['State_2']==1){ echo '<img src="images/checkbox_UnCheck.png" border="0" />'; } else { echo '<img src="images/checkbox.png" border="0" />';}?></td>
		   <td class="font1" style="width:120;" align="center"><?php if($resHoliday['State_3']==1){ echo '<img src="images/checkbox_UnCheck.png" border="0" />'; } else { echo '<img src="images/checkbox.png" border="0" />';}?></td>
		   <td class="font1" style="width:120;" align="center"><?php if($resHoliday['State_4']==1){ echo '<img src="images/checkbox_UnCheck.png" border="0" />'; } else { echo '<img src="images/checkbox.png" border="0" />';}?></td>
 		   <td style="font-size:12px; width:100px; height:13px;" align="center">&nbsp;<?php if($resHoliday['status']=='A'){ echo 'Active'; } else { echo 'Deactive';} ?></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:12px; width:100px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
			 <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resHoliday['HolidayId']; ?>)"></a>
			 &nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $resHoliday['HolidayId']; ?>)"></a>
<?php } ?>
		   </td>
		 </tr>
<?php } $SNo++;} ?>
         <tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
		 <?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
		 <form name="formEdit" method="post" onSubmit="return validateEdit(this)">
	     <tr>
		   <td align="center" style="font:Times New Roman; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
		   <td class="font1" style="width:150;" align="left" align="left"><input name="HolidayName" id="HolidayName" class="EditInput" style="width:145;" value=""></td>
		   <td class="font1" style="width:120;" align="left" align="left"><input name="HolidayDate" id="HolidayDate2" style="font-family:Times New Roman; font-size:11px; width:85px; height:18px;" value=""> <button id="f_btn2" class="CalenderButton"></button>
		   <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
           cal.manageFields("f_btn2", "HolidayDate2", "%d-%m-%Y");</script></td>
 		   <td class="font1" style="width:120;" align="center"><select name="HalfFullDay" id="HalfFullDay" class="EditInput" style="width:120px;">
   <option value="">Select</option><option value="Monday">Monday</option><option value="Tuesday">Tuesday</option><option value="Wednesday">Wednesday</option>
   <option value="Thursday">Thursday</option><option value="Friday">Friday</option><option value="Saturday">Saturday</option>
   <option value="Sunday">Sunday</option></td>
		   <td class="font" style="width:200;" align="center" valign="top">
   <input type="checkbox" name="State_1" id="State_1" class="EditInput" onClick="S1Check()"/></td>
   <td class="font" style="width:200;" align="center" valign="top">
   <input type="checkbox" name="State_2" id="State_2" class="EditInput" onClick="S2Check()"/></td>
   <td class="font" style="width:120;" align="center" valign="top">
   <input type="checkbox" name="State_3" id="State_3" class="EditInput" onClick="S3Check()"/></td>
   <td class="font" style="width:120;" align="center" valign="top">
   <input type="checkbox" name="State_4" id="State_4" class="EditInput" onClick="S4Check()"/></td>
 		   <td style="font-size:12px; width:100px; height:18px;" align="left"><select name="Status" id="Status" style="font-size:12px; width:99px; height:20px;">
		                                                                     <option value="A">Active</option><option value="D">Deactive</option></select></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:100px;">
		   <input type="hidden" name="y" id="y" value="<?php echo $_REQUEST['y']; ?>" />
<?php if($_SESSION['User_Permission']=='Edit'){?>
			 &nbsp;<input type="submit" name="SaveNew"  value="" class="SaveButton">&nbsp;
<?php } ?>
		   </td>
		 </tr>
		 </form>
		 <?php } ?>
		     
			
		 </table>
	  </td>
    </tr>
	  
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr><td align="right">
		<input type="hidden" name="y" id="y" value="<?php echo $_REQUEST['y']; ?>" />
		<input type="button" name="NewSave" id="NewSave" value="new" onClick="newsave()" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
		<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
		<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='Holiday.php?y=<?php echo $_REQUEST['y']; ?>'"/>&nbsp;
			     </td>
		</tr></table>
      </td>
   </tr>
  </table>  
</td>
<?php //*********************************************** Close Holidays******************************************************?>   
<Script>
function Oedit(value) { var y=document.getElementById("YearSel").value; var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "Holiday.php?action=Oedit&Oeid="+value+"&y="+y;  window.location=x;}}
function Odel(value) { var y=document.getElementById("YearSel").value; var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "Holiday.php?action=Odelete&did="+value+"&y="+y;  window.location=x;}}
function Onewsave() { var y=document.getElementById("YearSel").value; var x = "Holiday.php?action=Onewsave&y="+y;  window.location=x;}

var dtCh= "-";  var minYear=1900;  var maxYear=2100;
												 
function isInteger(s){
	var i;
    for (i = 0; i < s.length; i++){   
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}

function stripCharsInBag(s, bag){
	var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++){   
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}

function daysInFebruary (year){
	// February has 29 days in any year evenly divisible by four,
    // EXCEPT for centurial years which are not also divisible by 400.
    return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
}
function DaysArray(n) {
	for (var i = 1; i <= n; i++) {
		this[i] = 31
		if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
		if (i==2) {this[i] = 29}
   } 
   return this
}

function isDate(dtStr){
	var daysInMonth = DaysArray(12)
	var pos1=dtStr.indexOf(dtCh)
	var pos2=dtStr.indexOf(dtCh,pos1+1)
	var strDay=dtStr.substring(0,pos1)
	var strMonth=dtStr.substring(pos1+1,pos2)
	var strYear=dtStr.substring(pos2+1)
	strYr=strYear
	if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
	if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
	for (var i = 1; i <= 3; i++) {
		if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
	}
	day=parseInt(strDay)
	month=parseInt(strMonth)
	//day=parseInt(strDay)
	year=parseInt(strYr)
	if (pos1==-1 || pos2==-1){
	    alert("The date format should be : dd/mm/yyyy")
		//alert("The date format should be : mm/dd/yyyy")
		return false
	}
	if (strMonth.length<1 || month<1 || month>12){
		alert("Please enter a valid month")
		return false
	}
	if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
		alert("Please enter a valid day")
		return false
	}
	if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
		alert("Please enter a valid 4 digit year between "+minYear+" and "+maxYear)
		return false
	}
	if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
		alert("Please enter a valid date")
		return false
	}
return true
}
 
 function OvalidateEdit(OformEdit){
 var dt=document.OformEdit.OHolidayDate
	if (isDate(dt.value)==false){
		dt.focus()
		return false
	}
    //return true
  var OHolidayName = OformEdit.OHolidayName.value;  var filter=/^[a-zA-Z. /]+$/; var Otest_bool = filter.test(OHolidayName);
  if (OHolidayName.length === 0) { alert("You must enter a HolidayName Name.");  return false; }
  if(Otest_bool==false) { alert('Please Enter Only Alphabets in the Holiday Name Field');  return false; }	
  
 }
                                 // Date Validation End 
 
</SCRIPT>  
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td align="" width="200" class="heading">&nbsp;&nbsp;&nbsp;&nbsp;Optional Holiday</td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msgOH; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
 </tr>
 <tr>
 <td width="10">&nbsp;</td>
<?php //*********************************************** Open Optional ******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" width="700">
   
	<tr>
	  <td align="left" width="700">
	     <table border="1" width="700" border="1" bgcolor="#FFFFFF">
 <tr bgcolor="#7a6189">
   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;" valign="top"><b>SNo</b></td>
   <td class="font" align="center" style="width:150;" valign="top"><b>Holiday</b></td>
   <td class="font" align="center" style="width:120;" valign="top"><b>Date</b></td>
   <td class="font" align="center" style="width:120;" valign="top"><b>Day</b></td>
   <td style=" color:#FFFFFF; font-size:11px; width:100px; height:13px;" valign="top" align="center"><b>Status</b></td>
   <td valign="top" align="center" style="font:Georgia; font-size:11px; width:100px; color:#FFFFFF"><b>Action</b></td>
 </tr>
<?php $sqlOHoliday=mysql_query("select * from hrm_holiday_optional where HoOpStatus!='De' AND Year='".$_REQUEST['y']."' order by HoOpDate ASC", $con); 
      $SNo=1; while($resOHoliday=mysql_fetch_array($sqlOHoliday)) {
if(isset($_REQUEST['action']) && $_REQUEST['action']=="Oedit" && $_REQUEST['Oeid']==$resOHoliday['HoOpId']){ ?>
  <form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">	
  <tr>
   <td align="center" style="font:Georgia;font-size:12px;width:50px;" valign="top"><?php echo $SNo; ?></td>
   <td class="font" style="width:150;" align="left" valign="top"><input name="OHolidayName" id="OHolidayName" class="EditInput" value="<?php echo $resOHoliday['HoOpName']; ?>" style="width:145px;" /></td>
   <td class="font" style="width:120;" align="center" valign="top"><input name="OHolidayDate" id="OHolidayDate" maxlength="25" style="font-family:Georgia; font-size:12px; width:80px; height:20px;" value="<?php echo date("d-m-Y",strtotime($resOHoliday['HoOpDate'])); ?>"><button id="f_btn11" class="CalenderButton"></button>
   <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
   cal.manageFields("f_btn11", "OHolidayDate", "%d-%m-%Y");</script></td>
   <td class="font" style="width:120;" align="center" valign="top"><select name="OHalfFullDay" id="OHalfFullDay" class="EditInput" style="width:120px;">
   <option value="<?php echo $resOHoliday['HoOpDay']; ?>"><?php echo $resOHoliday['HoOpDay']; ?></option>
   <option value="Monday">Monday</option><option value="Tuesday">Tuesday</option><option value="Wednesday">Wednesday</option>
   <option value="Thursday">Thursday</option><option value="Friday">Friday</option><option value="Saturday">Saturday</option>
   <option value="Sunday">Sunday</option>
   </td>
   <td style="font-size:11px;width:100px;height:18px;" align="center" valign="top"><select name="OStatus" id="OStatus" style="font-size:11px; width:99px; height:20px;">
   <option value="<?php echo $resOHoliday['HoOpStatus']; ?>"><?php if($resOHoliday['HoOpStatus']=='A'){ echo 'Active'; } else { echo 'Deactive';} ?></option>
   <option value="A">Active</option><option value="D">Deactive</option></select></td>		  
   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:100px;" valign="top">
   <input type="hidden" name="y" id="y" value="<?php echo $_REQUEST['y']; ?>" />
<?php if($_SESSION['User_Permission']=='Edit'){?>
 &nbsp;<input type="submit" name="OSaveEdit"  value="" class="SaveButton">&nbsp;<input type="hidden" name="OHolidayId" id="OHolidayId" value="<?php echo $_REQUEST['Oeid']; ?>"/>
<?php } ?>
   </td>
 </tr>
		 </form>
		 
<?php } else { ?>	 
		  <tr>
		   <td align="center" style="font:Times New Roman; font-size:12px; width:50px;"><?php echo $SNo; ?></td>
		   <td class="font1" style="width:150;" align="left">&nbsp;<?php echo $resOHoliday['HoOpName']; ?></td>
		   <td class="font1" style="width:120;" align="center"><?php echo date("d-m-Y",strtotime($resOHoliday['HoOpDate'])); ?></td>
 		   <td class="font1" style="width:120;" align="center"><?php echo $resOHoliday['HoOpDay']; ?></td>
 		   <td style="font-size:12px; width:100px; height:13px;" align="center">&nbsp;<?php if($resOHoliday['HoOpStatus']=='A'){ echo 'Active'; } else { echo 'Deactive';} ?></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:12px; width:100px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
			 <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="Oedit(<?php echo $resOHoliday['HoOpId']; ?>)"></a>
			 &nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="Odel(<?php echo $resOHoliday['HoOpId']; ?>)"></a>
<?php } ?>
		   </td>
		 </tr>
<?php } $SNo++;} ?>
         <tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
		 <?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="Onewsave"){ ?>
		 <form name="formEdit" method="post" onSubmit="return validateEdit(this)">
	     <tr>
		   <td align="center" style="font:Times New Roman; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
		   <td class="font1" style="width:150;" align="left" align="left"><input name="OHolidayName" id="OHolidayName" class="EditInput" style="width:145;" value=""></td>
		   <td class="font1" style="width:120;" align="left" align="left"><input name="OHolidayDate" id="OHolidayDate2" style="font-family:Times New Roman; font-size:11px; width:85px; height:18px;" value=""> <button id="f_btn22" class="CalenderButton"></button>
		   <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
           cal.manageFields("f_btn22", "OHolidayDate2", "%d-%m-%Y");</script></td>
 		   <td class="font1" style="width:120;" align="center"><select name="OHalfFullDay" id="OHalfFullDay" class="EditInput" style="width:120px;">
   <option value="">Select</option><option value="Monday">Monday</option><option value="Tuesday">Tuesday</option><option value="Wednesday">Wednesday</option>
   <option value="Thursday">Thursday</option><option value="Friday">Friday</option><option value="Saturday">Saturday</option>
   <option value="Sunday">Sunday</option></td>
 		   <td style="font-size:12px;width:100px; height:18px;" align="left"><select name="OStatus" id="OStatus" style="font-size:12px; width:99px; height:20px;">
		                                                                     <option value="A">Active</option><option value="D">Deactive</option></select></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:100px;">
		   <input type="hidden" name="y" id="y" value="<?php echo $_REQUEST['y']; ?>" />
<?php if($_SESSION['User_Permission']=='Edit'){?>
			 &nbsp;<input type="submit" name="OSaveNew"  value="" class="SaveButton">&nbsp;
<?php } ?>
		   </td>
		 </tr>
		 </form>
		 <?php } ?>
		     
			
		 </table>
	  </td>
    </tr>
	  
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr><td align="right">
		<input type="button" name="ONewSave" id="ONewSave" value="new" onClick="Onewsave()" <?php if($_REQUEST['action']=="Onewsave" OR $_REQUEST['action']=="Oedit"){ echo "style=display:none;"; }?>/>
		<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
		<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='Holiday.php?y=<?php echo $_REQUEST['y']; ?>'"/>&nbsp;
			     </td>
		</tr></table>
      </td>
   </tr>
  </table>  
</td>
<?php //*********************************************** Close Optional******************************************************?>    

 </tr>
 
 
<?php } ?> 
</table>
		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
	  </td>
	</tr>
	
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>
