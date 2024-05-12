<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_SESSION['login'] = true){require_once('PhpFile/QueryP.php'); } else {$msg= "Session Expiry..............."; }
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:block; font-family:Times New Roman; color:#620000;font-size:15px; }.span1 {display:block; font-family:Times New Roman; color:#620000;font-size:15px;  }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:150px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<Script type="text/javascript">window.history.forward(1);</script>
<script type="text/javascript" src="js/Query.js" ></script>
<script language="javascript"></script>
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
	  <td align="right" width="180" class="heading">Query</td>
	  <td align="left">
	    <b><span id="sStatusQ" class="span"></span></b>
	  </td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><span id="msg"><?php echo $msq; ?></span></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>
<td style="width:50px;" valign="top" align="center">&nbsp;</td>
 <td width="50">&nbsp;</td>
<?php //***********************************************Reply To Query******************************************************?>  
  <td align="left" id="ReplyToQuery" valign="top" style="display:block;">             
   <form name="formRTQ" method="post" onSubmit="return validate(this)">
   <table border="0">
	<tr>
	  <td align="left">
	  
	  
	  		 <form name="form" id="form2" method="post">
			 <table border="1" id="Activity">
			  <tr>
				 <td valign="top">
				    <table border="1" bgcolor="#7a6189">
					 <tr>
					  <td colspan="10">
					    <table><tr>
						   <td width="150" valign="top"><font color="#FFFFFF" style='font-family:Times New Roman;' size="3"><b>Reply Text : </b></font></td>
					       <td style="width:730px;" align="right">
						   <textarea name="ReplyText" id="ReplyText" cols="80" rows="3" style="display:none;"></textarea></td>
						</tr></table>
					  </td>
					 
					  </tr>
					  <tr>
					    <td colspan="10">
						<form name="Qdate" id="Qdate" method="post">
					     <table>
						   <tr><td class="TableHead"><b>From :</b></td>
						   <td><input name="FromQ2" id="FromQ2" class="InputText">&nbsp;<button id="f_btn3" class="CalenderButton"></button>
		                       <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
                               cal.manageFields("f_btn3", "FromQ2", "%d-%m-%Y");</script></td>
						   <td width="30">
						   <input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
						   <input type="hidden" name="QId" id="QId" value="" /> <input type="hidden" name="UserType" id="UserType" value="<?php echo $_SESSION['UserType']; ?>" />
						   </td>	   
						   <td class="TableHead"><b>To :</b></td>
						   <td><input name="ToQ2" id="ToQ2" class="InputText">&nbsp;<button id="f_btn4" class="CalenderButton"></button>
		                       <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
                               cal.manageFields("f_btn4", "ToQ2", "%d-%m-%Y");</script></td>
						   <td>&nbsp;&nbsp;<input type="button" name="QSentDate" id="QSentDate" value="click" onClick="ReplyToQU('<?php echo $_SESSION['UserType']; ?>')" style="height:25px;"></td></tr>
						 </table>
						 </form>
					    </td>
					  </tr>
					  <tr>
					   <td>
					   
					   <table border="0"><tr>
					   <td width="50" class="TableHead" align="center"><b>Sno</b></td>
					   <td width="80" class="TableHead" align="center"><b>EmpCode</b></td>
					   <td width="170" class="TableHead" align="center"><b>Name</b></td>
					   <td width="100" class="TableHead" align="center"><b>Department</b></td>
					   <td width="250" class="TableHead" align="center"><b>Subject</b></td>
					   <td width="160" class="TableHead" align="center"><b>Date</b></td>
					   <td width="150" class="TableHead" align="center"><b>Rep. Mgr.</b></td>
					   <td width="150" class="TableHead" align="center"><b>Admin</b></td>
					   <td width="150" class="TableHead" align="center"><b>HR</b></td>
                       <td width="130" class="TableHead" align="center"><b>Status</b></td>
					   </tr></table>
					   
					   </td>	
					  </tr>
					   <tr><td><span id="ReplyToQUSpan">
		 <table border="1">
<?php $sql=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,hrm_employee_hrquery.* from hrm_employee INNER JOIN hrm_employee_hrquery ON hrm_employee.EmployeeID=hrm_employee_hrquery.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_hrquery.QAction_Mngmt!=2", $con); $Sno=1; while($res=mysql_fetch_array($sql)){?>						 
	   <tr>
	   <td width="50" class="TableHead1" align="center">&nbsp;<?php echo $Sno; ?></td>
	   <td width="100" class="TableHead1" align="left">&nbsp;<?php echo $res['EmpCode']; ?></td>
	   <td width="170" class="TableHead1" align="left">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
<?php $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD); ?>					   
	   <td width="150" class="TableHead1" align="left">&nbsp;<?php echo $resD['DepartmentCode']; ?></td>
	   <td width="240" class="TableHead1" align="left">&nbsp;
<a href="javascript:void(0);" onclick="PopupCenter('QueryEmp.php?Qid=<?php echo $res['QueryId']; ?>', 'VNR(HRIMS)',350,300);"><?php echo $res['QuerySubject']; ?></a></td>
	   <td width="150" class="TableHead1" align="left">&nbsp;<?php echo date("d-m-Y H:i:s",strtotime($res['QueryDateTime'])); ?></td>
	   
	   <td width="150" class="TableHead1" align="left">&nbsp;
	   <?php if($res['QFwdHR_RepMgr']=='Y' AND $res['QToMngmt_DateTime']>date('Y-m-d H:i:s') AND $res['QStatus_RepMgr']==0) {echo 'Open';}
	         elseif($res['QFwdHR_RepMgr']=='Y' AND $res['QToMngmt_DateTime']<=date('Y-m-d H:i:s') AND $res['QStatus_RepMgr']==0) {echo 'Not Reply';} 
	         elseif($res['QFwdHR_RepMgr']=='Y' AND $res['QToMngmt_DateTime']>date('Y-m-d H:i:s') AND $res['QStatus_RepMgr']==1) {echo 'InProcess';}
	         elseif($res['QFwdHR_RepMgr']=='Y' AND $res['QToMngmt_DateTime']<=date('Y-m-d H:i:s') AND $res['QStatus_RepMgr']==1) {echo 'Not Reply';}
			 elseif($res['QFwdHR_RepMgr']=='N') {echo 'Not Allow';}
			 elseif($res['QFwdHR_RepMgr']=='Y' AND $res['QToMngmt_DateTime']>date('Y-m-d H:i:s') AND $res['QStatus_RepMgr']==2) { ?>
<a href="javascript:void(0);" onclick="PopupCenter('ReplyRepMgr.php?Qid=<?php echo $res['QueryId']; ?>', 'VNR(HRIMS)',350,300);">Reply</a>
	   <?php } elseif($res['QFwdHR_RepMgr']=='Y' AND $res['QToMngmt_DateTime']<=date('Y-m-d H:i:s') AND $res['QStatus_RepMgr']==2) { ?>
<a href="javascript:void(0);" onclick="PopupCenter('ReplyRepMgr.php?Qid=<?php echo $res['QueryId']; ?>', 'VNR(HRIMS)',350,300);">Reply</a><?php } ?></td>

	   
	   <td width="150" class="TableHead1" align="left">&nbsp;
	   <?php if($res['QFwdHR_RepMgr']=='N' AND $res['QToSAdmin_DateTime']>date('Y-m-d H:i:s') AND $res['QStatus_Admin']==0) {echo 'Open';}
	         elseif($res['QFwdHR_RepMgr']=='N' AND $res['QToSAdmin_DateTime']<=date('Y-m-d H:i:s') AND $res['QStatus_Admin']==0) {echo 'Not Reply';} 
	         elseif($res['QFwdHR_RepMgr']=='N' AND $res['QToSAdmin_DateTime']>date('Y-m-d H:i:s') AND $res['QStatus_Admin']==1) {echo 'InProcess';}
	         elseif($res['QFwdHR_RepMgr']=='N' AND $res['QToSAdmin_DateTime']<=date('Y-m-d H:i:s') AND $res['QStatus_Admin']==1) {echo 'Not Reply';}
			 elseif($res['QFwdHR_RepMgr']=='Y' AND $res['QStatus_Admin']==3 AND $res['QFwdHR_DateTime']<$res['QToSAdmin_DateTime']) {echo 'Forward Rep.Mgr.';}
			 elseif($res['QFwdHR_RepMgr']=='N' AND $res['QToSAdmin_DateTime']>date('Y-m-d H:i:s') AND $res['QStatus_Admin']==2) { ?>
<a href="javascript:void(0);" onclick="PopupCenter('ReplyAdmin.php?Qid=<?php echo $res['QueryId']; ?>', 'VNR(HRIMS)',350,300);">Reply</a>
	   <?php } elseif($res['QFwdHR_RepMgr']=='N' AND $res['QToSAdmin_DateTime']<=date('Y-m-d H:i:s') AND $res['QStatus_Admin']==2) { ?>
<a href="javascript:void(0);" onclick="PopupCenter('ReplyAdmin.php?Qid=<?php echo $res['QueryId']; ?>', 'VNR(HRIMS)',350,300);">Reply</a><?php } ?></td>
	  
	   <td width="150" class="TableHead1" align="left">&nbsp;
	   <?php if($res['QToMngmt_DateTime']>date('Y-m-d H:i:s') AND $res['QStatus_SAdmin']==0) {echo 'Open';}
	         elseif($res['QToMngmt_DateTime']<=date('Y-m-d H:i:s') AND $res['QStatus_SAdmin']==0) {echo 'Not Reply';} 
	         elseif($res['QToMngmt_DateTime']>date('Y-m-d H:i:s') AND $res['QStatus_SAdmin']==1) {echo 'InProcess';}
	         elseif($res['QToMngmt_DateTime']<=date('Y-m-d H:i:s') AND $res['QStatus_SAdmin']==1) {echo 'Not Reply';}
			 elseif($res['QFwdHR_RepMgr']=='Y' AND $res['QStatus_SAdmin']==3 AND ($res['QFwdHR_DateTime']>=$res['QToHR_DateTime'] OR $res['QFwdHR_DateTime']<$res['QToMngmt_DateTime'])) {echo 'Forward Rep.Mgr.';}
			 elseif($res['QToMngmt_DateTime']>date('Y-m-d H:i:s') AND $res['QStatus_SAdmin']==2) { ?>
<a href="javascript:void(0);" onclick="PopupCenter('ReplySAdmin.php?Qid=<?php echo $res['QueryId']; ?>', 'VNR(HRIMS)',350,300);">Reply</a>
	   <?php } elseif($res['QToMngmt_DateTime']<=date('Y-m-d H:i:s') AND $res['QStatus_SAdmin']==2) { ?>
<a href="javascript:void(0);" onclick="PopupCenter('ReplySAdmin.php?Qid=<?php echo $res['QueryId']; ?>', 'VNR(HRIMS)',350,300);">Reply</a><?php } ?></td>
	   
	  
	   <td width="110" class="TableHead1" align="center"> 
	   <select name="ActionReplyQ" id="ActionReplyQ" style="font-family:Times New Roman; height:20px; width:95px; background-color:#B3E3B0; color:#000000; font-size:13px;" onChange="return ChangeBtnU(this.value,<?php echo $res['QueryId']; ?>)" <?php if($_SESSION['UserType']=='A'){ if($res['QStatus_Admin']==3 OR date("Y-m-d H:i:s")<$res['QToAdmin_DateTime'] OR date("Y-m-d H:i:s")>=$res['QToSAdmin_DateTime']) { echo 'disabled'; } }  if($_SESSION['UserType']=='S'){ if($res['QStatus_SAdmin']==3 OR date("Y-m-d H:i:s")<$res['QToSAdmin_DateTime'] OR date("Y-m-d H:i:s")>=$res['QToMngmt_DateTime']) {echo 'disabled';} }?> >
	  <option  style="background-color:#BADCC5;" value="">Select</option> 
      <option value="0" style="background-color:#FFFFFF;">Open</option>
	  <option value="1" style="background-color:#FFFFFF;">InProcess</option>
	  <option value="3" style="background-color:#FFFFFF;">Forward Rep. Mgr.</option>  
	  <option value="2" style="background-color:#FFFFFF;">Reply</option>
	  </select></td>
	  
	  
	  
	   </tr>
<?php $Sno++; } ?>					   
		 </table>   
					   </span></td></tr>   
					</table>
				 </td>
				 
			  </tr>
			  <tr>
			     <td align="left" class="fontButton" colspan="2">
				   <table border="0" width="100%">
		             <tr>
		              <td align="right" id="SaveW" style="display:none;">&nbsp;<input type="Submit" name="SaveWating" id="SaveWaiting" style="width:90px;" value="Save"/></td>
					  <td align="right" id="SaveForw" style="display:none;"><input type="Submit" name="SaveForw" id="SaveForw" style="width:90px;" value="Save"/></td>
					  <td align="right" id="SaveR" style="display:none;"><input type="Submit" name="SaveReply" id="SaveReply" style="width:90px;" value="Save"/></td>
					  <td align="right" style="width:180px;"><input type="button" name="Back" id="Back" style="width:90px;" value="Back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/><input type="button" name="Refresh" id="Refresh" style="width:90px;" value="Refresh" onClick="javascript:window.location='Query.php'"/></td>
		  </tr>
		  </table>
      </td>
				   </tr>
	        </table>
			</form>
		
		
		
      </td>
   </tr>
  </table>
 </form>        
   </td>
<?php //*********************************************** Close Reply to Query******************************************************?>      

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
