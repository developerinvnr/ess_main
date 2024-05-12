<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
 
if($_REQUEST['action']=='Up' && $_REQUEST['did'])
{ $SqlUp=mysql_query("UPDATE hrm_employee_hrquery SET QAction_Emp=2 WHERE QueryId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlUp) { $msg = "Your Query have been Closed successfully..."; }
 }
 ?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style>.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function StatusQuery(value)
{ var d1=document.getElementById("FromQ").value; var d2=document.getElementById("ToQ").value; 
  var url = 'StatusQuery.php';	 var pars = 'EmpId='+value+'&d1='+d1+'&d2='+d2;	var myAjax = new Ajax.Request(
	url, 
	{	method: 'post', 
		parameters: pars, 
		onComplete: show_StatusQuery
	});
}
function show_StatusQuery(originalRequest)
{ document.getElementById('QListSpan').innerHTML = originalRequest.responseText; }


function PopupCenter(pageURL, title,w,h) {
var left = (screen.width/2)-(w/2);
var top = (screen.height/2)-(h/2);
var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}

function ChangeBtnU(value){ var agree=confirm("Are you sure you want to closed this query?");
if (agree) { var x = "AskQueryStatus.php?action=Up&did="+value;  window.location=x;}}
</script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px; ">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //*************************************************************************************************************************************************** ?>	   
		     <table border="0" id="Activity">
			 <tr>
			 <td></td><td></td>
			 <td valign="bottom">&nbsp;<font color="#620000" style='font-family:Times New Roman;' size="4">Query Status :</font>&nbsp;&nbsp;&nbsp;
			                           <font color="#014E05" style='font-family:Times New Roman;' size="3"><b><?php echo $msg;; ?></b></font></td>
			 </tr>
			  <tr>
			     <td id="Anni" valign="top">
				    <table border="0">
						  <tr height="20">
						    <td align="center" valign="top" width="100">
<?php include("EmpImgEmp.php"); ?>
<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>
						  </tr>
					 </table>
				 </td>
			     <td id="Anni" valign="top">&nbsp;</td>
				 <td valign="top">
				    <table border="1" bgcolor="#7a6189">
					  <tr>
					    <td colspan="10">
						<form name="Qdate" id="Qdate" method="post">
					     <table>
						   <tr><td class="TableHead"><b>From :</b></td>
						   <td><input name="FromQ" id="FromQ" class="InputText">&nbsp;<button id="f_btn1" class="CalenderButton"></button>
		                       <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
                               cal.manageFields("f_btn1", "FromQ", "%d-%m-%Y");</script></td>
						   <td width="30"><input type="hidden" name="EmpID" id="EmpID" value="<?php echo $EmployeeId; ?>" /></td>	   
						   <td class="TableHead"><b>To :</b></td>
						   <td><input name="ToQ" id="ToQ" class="InputText">&nbsp;<button id="f_btn2" class="CalenderButton"></button>
		                       <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
                               cal.manageFields("f_btn2", "ToQ", "%d-%m-%Y");</script></td>
						   <td>&nbsp;&nbsp;<input type="button" name="QSentDate" id="QSentDate" value="click" onClick="StatusQuery('<?php echo $EmployeeId; ?>')" style="height:25px;"></td></tr>
						 </table>
						 </form>
					    </td>
					  </tr>
					  <tr>
					   <td><table border="0"><tr>
					   <td width="40" class="TableHead" align="center"><b>SNo.</b></font></td>
					   <td width="150" class="TableHead" align="center"><b>Subject</b></td>
					   <td width="150" class="TableHead" align="center"><b>Date</b></td>
					   <td width="130" class="TableHead" align="center"><b>Status1</b></td>
					   <td width="120" class="TableHead" align="center"><b>Status2</b></td>
					   <td width="120" class="TableHead" align="center"><b>Status3</b></td>
					   <td width="120" class="TableHead" align="center"><b>Mode</b></td>
					   <td width="100" class="TableHead" align="center"><b>Action</b></td>
					   </tr></table></td>	
					  </tr>
					   <tr><td><span id="QListSpan">
					   <table border="0">
<?php $sql=mysql_query("select * from hrm_employee_hrquery where EmployeeID=".$EmployeeId." AND QAction_Emp!=2", $con); $Sno=1; while($res=mysql_fetch_array($sql)){?>					
					   <tr>
					   <td width="40" class="TableHead1" align="left">&nbsp;<?php echo $Sno; ?></td>
					   <td width="150" class="TableHead1" align="left">&nbsp;
			<a href="javascript:void(0);" onclick="PopupCenter('QueryEmp.php?Qid=<?php echo $res['QueryId']; ?>', 'VNR(HRIMS)',350,300);"><?php echo $res['QuerySubject']; ?></a></td>
					   <td width="150" class="TableHead1" align="left">&nbsp;<?php echo date("d-m-Y H:i:s",strtotime($res['QueryDateTime'])); ?></td>
					   <td width="120" class="TableHead1" align="left">&nbsp;<?php if($res['QStatus_RepMgr']==0){echo '"';} elseif($res['QStatus_RepMgr']==1){echo 'InProcess';} elseif($res['QStatus_RepMgr']==2){?><a href="javascript:void(0);" onclick="PopupCenter('ReplyRepMgr.php?Qid=<?php echo $res['QueryId']; ?>', 'VNR(HRIMS)',350,300);">Click</a><?php } ?></td>
					   <td width="120" class="TableHead1" align="left">&nbsp;<?php if($res['QStatus_Admin']==0){echo '"';} elseif($res['QStatus_Admin']==1){echo 'InProcess';} elseif($res['QStatus_Admin']==2){ ?><a href="javascript:void(0);" onclick="PopupCenter('ReplyAdmin.php?Qid=<?php echo $res['QueryId']; ?>', 'VNR(HRIMS)',350,300);">Click</a>
			           <?php } elseif($res['QStatus_Admin']==3){echo $res['Forword to Rep. Mgr.'];}?></td>
					   <td width="120" class="TableHead1" align="left">&nbsp;<?php if($res['QStatus_SAdmin']==0){echo '"';} elseif($res['QStatus_SAdmin']==1){echo 'InProcess';} elseif($res['QStatus_SAdmin']==2){ ?><a href="javascript:void(0);" onclick="PopupCenter('ReplySAdmin.php?Qid=<?php echo $res['QueryId']; ?>', 'VNR(HRIMS)',350,300);">Click</a>
			           <?php } elseif($res['QStatus_SAdmin']==3){echo $res['Forword to Rep. Mgr.'];}?></td>
					   <td width="120" class="TableHead1" align="left">&nbsp;<?php  ?></td>
					   <td width="100" class="TableHead1" align="center">
					   <select name="ActionReplyQ" id="ActionReplyQ" style="font-family:Times New Roman; height:20px; width:95px; background-color:#B3E3B0; color:#000000; font-size:13px;" onChange="return ChangeBtnU('<?php echo $res['QueryId']; ?>')" >
	  <option  style="background-color:#BADCC5;" value="0">Select</option> 
	  <option value="1" style="background-color:#FFFFFF;">Closed</option>
	  </select>
					   
					   </td>
					   </tr>
<?php $Sno++; } ?>	   
					   </table>  
					   </span></td></tr> 
				       
					</table>
				 </td>
				 
			  </tr>
			  <tr>
			     <td>&nbsp;</td>
				 <td width="50">&nbsp;</td>
			     <td align="Right" class="fontButton" colspan="2">
				   <table border="0" width="500">
		             <tr>
		              <td align="right">&nbsp;</td>
                      <td align="right" style="width:180px;"><input type="button" name="Back" id="Back" style="width:90px;" value="Back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/><input type="button" name="Refresh" id="Refresh" style="width:90px;" value="Refresh" onClick="javascript:window.location='AskQueryStatus.php'"/></td>
		</tr></table>
      </td>
			  </tr>
	        </table>
			
<?php //*************************************************************************************************************************************************** ?>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;">
		    <tr><td align="center" valign="top" width="100">&nbsp;</td></tr>
	        </table>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;"><tr><td align="center" valign="top">&nbsp;&nbsp;</td></tr></table>
		   </td>
		  </tr>
		</table>
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

