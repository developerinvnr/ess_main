<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}else{header('Location:../index.php');}
//include("SetKraPmsy.php");
/******************************************************************************/
/*if($_REQUEST['action']=='r' && $_REQUEST['e']!="" && $_REQUEST['y']!=""){ 
$sqlR=mysql_query("update hrm_pms_kra set UseKRA='R', RevStatus='P', HodStatus='R' where YearId=".$_REQUEST['y']." AND EmployeeID=".$_REQUEST['e'], $con);
if($sqlR){$msg='Reviewer Resend Successfully!';} }*/
?>

<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link type="text/css" href="css/mycss.css" rel="stylesheet"/>
<script src="../AdminUser/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../AdminUser/js/jquery.freezeheader.js"></script>
<script>$(document).ready(function () { $("#table1").freezeHeader({ 'height':'500px' }); })</script>
<script type="text/javascript" language="javascript">
function UploadEmpfile(c,y,e)
{ window.open("CheckUploadKraFile.php?action=up&C="+c+"&E="+e+"&Y="+y,"UploadFile","menubar=no,scrollbars=yes,resizable='no',width=600,height=300");}
 

function ResentReason(p,e)
{y=document.getElementById("YearId").value; 
 window.open("ResentReason.php?action=Sent&P="+p+"&E="+e+"&Y="+y,"ResentReasonFile","menubar=no,scrollbars=yes,resizable='no',width=850,height=400");}


function ResentKRA(E,yi)
{ var agree=confirm("Are you sure you want to resend KRA form to Reviewer?");
  if (agree) { window.location='HodFinalEmpkra.php?action=r&e='+E+'&y='+yi+'&ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=0&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1'; } 
  else {return false;}
}

function EmpKRA(CId,YId,EmpId) 
{ window.open ("EmpKraForm.php?YId="+YId+"&EmpId="+EmpId+"&CId="+CId,"KRAForm","menubar=yes,scrollbars=yes,resizable=1,width=1100,height=600");}

function ReadHistory(EI)
{window.open("EmpHistory.php?EI="+EI,"HForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=920,height=600");}

<!-- 
function doBlink() {
	var blink = document.all.tags("BLINK")
	for (var i=0; i<blink.length; i++)
		blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" 
}
function startBlink() {
	if (document.all)
		setInterval("doBlink()",1000)
}
window.onload = startBlink;
// -->
</script>

</head>
<body class="body"> 
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td>
 <table width="100%" style="margin-top:0px;">
  <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
  <tr>
   <td valign="top" style="background-image:url(images/pmsback.png);width:100%;">
   <table border="0" style="width:100%;height:500px;float:none;" cellpadding="0">
   <tr>
    <td valign="top" style="width:100%;">      
    <table border="0" id="Activity" style="width:100%;">
	<tr>
     <td style="width:100%;" valign="top">
	 <table border="0" style="width:100%;">
<?php //*************************************** Start ********************************************* ?>	
<?php //*************************************** Start ********************************************* ?>
					
<tr>
 <td>	 
 <table style="width:100%;">
<!--  Head Parts Open Open Open  --> 
<!--  Head Parts Open Open Open  --> 
 <tr>
  <td>
   <table>
    <tr>
<?php if($_SESSION['EmpType']=='E'){ ?>
<td align="center" valign="top"><a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>&ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&rr2=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=0&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_emp1" style="display:<?php if($_REQUEST['ee']==1){echo 'block';}else{echo 'none';} ?>;" src="images/emp1.png" border="0"/></a></td>

<?php } if($_SESSION['BtnApp']>0) { ?>
<td align="center" valign="top"><a href="ManagerPms.php?ee=1&aa=0&rr=1&rr2=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_manager1" style="display:<?php if($_REQUEST['aa']==1){echo 'block';}else{echo 'none';} ?>;" src="images/manager1.png" border="0"/></a></td></td>
		   
<?php } if($_SESSION['BtnRev']>0) { ?>
<td align="center" valign="top"><a href="HodPms.php?ee=1&aa=1&rr2=1&rr=0&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/hod1.png" border="0"/></a></td>

<?php } if($_SESSION['BtnRev2']>0) { ?>
<td align="center" valign="top"><a href="Rev2HodPms.php?ee=1&rr2=0&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/RevHod1.png" border="0"/></a></td>	
		   
<?php } if($_SESSION['BtnHod']>0) { ?>
<td align="center" valign="top"><img id="Img_hod1" src="images/m.png" border="0"/></td><?php } ?>

<?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg OPEN************/ ?>
<?php if($_SESSION['eMsg']=='Y'){ ?>
 <td>
 <?php $CuDate=date("Y-m-d"); if(($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y') AND $CuDate>=$_SESSION['hFrom'] AND $CuDate<=$_SESSION['hTo'] AND $_SESSION['hSts']=='A'){ $LastDate=$_SESSION['hTo']; $CurrentDate=date("Y-m-d");
		 $diff = abs(strtotime($LastDate) - strtotime($CurrentDate));
         $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/(60*60*24)); ?>
 <font class="msg_r"><font color="#00366C">&nbsp;&nbsp;PMS :</font><span class="blink_me"> <?php echo $days;?> Days Remaining! Last date : <?php echo date("d-F",strtotime($_SESSION['hTo'])); ?> </span></font>
 <?php } ?>
 </td>
<?php } ?>
<?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg CLOSE************/ ?>
 
	</tr>
   </table>
  </td>
 </tr>
 
 <tr><td style="vertical-align:top;width:100%;"><?php include("SetKraPmsmh.php"); ?></td></tr>
<!--  Head Parts Close Close Close  --> 
<!--  Head Parts Close Close Close  --> 
 
  <tr>
    <td style="width:100%;">
	  <table border="0" style="width:100%;">
	    <tr>
        <?php /****************************************** Form Start **************************/ ?>
		<?php /****************************************** Form Start **************************/ ?>
		
<input type="hidden" id="FormAMin5" value="" /><input type="hidden" id="FormAMax5" value="" />
<input type="hidden" id="FormBMin5" value="" /><input type="hidden" id="FormBMax5" value="" />
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
<input type="hidden" id="EmployeeId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="EmpId" value="" /> <input type="hidden" id="PmsId" value="" />	
<form name="AppraisalForm" method="post" onSubmit="Validation(this)">	
 		 <td id="TeamDetails" style="display:block;width:100%;">
		  <table border="0"style="width:100%;">
<tr>
 <td style="width:100%;">
  <table border="0" style="width:100%;" cellspacing="0">
   <tr>
    <td class="formh" style="width:250px;">(<i>My Team KRA</i>) :&nbsp;</td>
    <td class="fhead" style="text-align:right;">
	<!--<img src="images/edit.png" border="0"/>&nbsp;:&nbsp; Edit &nbsp;&nbsp;&nbsp;&nbsp;
    <img src="images/go-back-icon.png" border="0"/>&nbsp; Resent&nbsp;&nbsp;&nbsp;&nbsp;-->
    <script>function FunLog(){ window.open("viewlogic.php", "F", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1000,height=500");}</script>	  
    <input type="button" style="width:90px;background-color:#99CC00;font-weight:bold;" value="Logic" onClick="FunLog()"/>
	</td>
	<td style="width:1px;">&nbsp;</td>
   </tr>
  </table>
  </td>
 </tr>	   
 <tr>
  <td style="width:100%;">
   <table border="0" style="width:100%;">
    <!--<tr>
     <td id="ResendText" style="display:none;width:100%;">
     <table>
     <tr>
      <form method="post" name="formResend" />
      <td class="tdl" style="color:#C10000;font-size:15px;width:13%;"><b>Reason For Resend :</b></td>
      <td style="width:77%;"><input name="Resend" id="Resend" maxlength="200" style=" background-color:#FFFFFF; height:20px;font-size:11px;width:800px; border-style:hidden;"/></td>
      <td style="width:10%;"><input type="button" id="btnResend" name="btnResend" value="Send" style="width:90px; background-color:#B9DCFF;" onClick="return send()" /></td>
      </form>  
     </tr>
     </table>
     </td>
    </tr>-->

    <tr>
	
<?php //************************************************ Start ******************************// ?>
<?php //************************************************ Start ******************************// ?>
<td style="width:100%;" id="EmpkraStatus" style="display:block;">
<span id="MyTeamStatusSpan"></span>	   
<span id="MyTeamStatus">
 <table border="1" id="table1" cellpadding="0" cellspacing="0" style="width:100%;">
   <div id="thead">
   <thead>
    <tr bgcolor="#7a6189" style="height:25px;">
	 <td class="th" style="width:3%;">Sn</td>
	 <td class="th" style="width:5%;">EmpCode</td>
	 <td class="th" style="width:20%;">Name</td>
	 <td class="th" style="width:10%;">Department</td>
	 <td class="th" style="width:25%;">Designation</td>
	 <td class="th" style="width:9%;">HQ</td>
	 <!--<td class="th" style="width:10%;">State</td>-->
	 <td class="th" style="width:6%;">Employee</td>
	 <td class="th" style="width:6%;">Appraiser</td>
	 <td class="th" style="width:6%;"><b>Reviewer</b></td>
	 <td class="th" style="width:5%;">KRA</td>
     <?php if($_SESSION['Dept']==4){?><td class="th" style="width:5%;">Attach</td><?php } ?>	
	 <!--<td class="th" style="width:6%;">Action</td>-->
    </tr>
   </thead>
   </div>
<?php $sql=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,department_code as DepartmentCode, designation_name as DesigName, grade_name as GradeValue, city_village_name as HqName, state_name as StateName from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID left join core_departments dept on g.DepartmentId=dept.id
  left join core_sub_department_master subdept on g.SubDepartmentId=subdept.id
  left join core_section sec on g.EmpSection=sec.id
  left join core_designation desig on g.DesigId=desig.id
  left join core_grades gr on g.GradeId=gr.id
  left join core_states st on g.CostCenter=st.id
  left join core_city_village_by_state vlg on g.HqId=vlg.id where e.EmpStatus='A' AND p.AssessmentYear=".$_SESSION['KraYId']." AND p.HOD_EmployeeID=".$EmployeeId." order by e.ECode", $con); 
$sno=1; while($res=mysql_fetch_array($sql)){ 

$sql3E=mysql_query("select EmpStatus,AppStatus,RevStatus,UseKRA from hrm_pms_kra where YearId=".$_SESSION['KraYId']." AND EmployeeID=".$res['EmployeeID'], $con); $row3E=mysql_num_rows($sql3E); 
if($row3E==0){ $stE='Draft';$stA='Draft';$stR='Draft'; $clr='#A40000';$Aclr='#A40000';$Rclr='#A40000';} 
if($row3E>0)
{ 
  $res3E=mysql_fetch_assoc($sql3E);
  if($res3E['EmpStatus']=='D'){$stE='Draft'; $clr='#A40000';}elseif($res3E['EmpStatus']=='P'){$stE='Pending'; $clr='#36006C';} elseif($res3E['EmpStatus']=='A'){$stE='Submitted'; $clr='#005300';}
  if($res3E['AppStatus']=='D'){$stA='Draft'; $Aclr='#A40000';}elseif($res3E['AppStatus']=='P'){$stA='Pending'; $Aclr='#36006C';}elseif($res3E['AppStatus']=='A'){$stA='Submitted'; $Aclr='#005300';}
  if($res3E['RevStatus']=='D'){$stR='Draft'; $Rclr='#A40000';}elseif($res3E['RevStatus']=='P'){$stR='Pending'; $Rclr='#36006C';}elseif($res3E['RevStatus']=='A'){$stR='Submitted'; $Rclr='#005300';}		
} 
?> 
   <div id="tbody">
   <tbody>    		
   <tr style="height:22px;background-color:#FFFFFF;">
	<td class="tdc"><?php echo $sno; ?></td>
	<td class="tdc"><?php echo $res['EmpCode']; ?></td>
	<td class="tdl">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
	<td class="tdl">&nbsp;<?php echo $res['DepartmentCode'];?></td>  
	<td class="tdl">&nbsp;<?php echo $res['DesigName'];?></td>				
	<td class="tdl">&nbsp;<?php echo $res['HqName'];?></td>			
	<?php /*?><td class="tdl">&nbsp;<?php echo $res['StateName'];?></td><?php */?>	
	<td class="tdc" style="color:<?php echo $clr;?>;"><?php echo $stE;?></td>
	<td class="tdc" style="color:<?php echo $Aclr;?>;"><?php echo $stA;?></td>
	<td class="tdc" style="color:<?php echo $Rclr;?>;"><?php echo $stR;?></td>
	
	<td class="tdc"><?php if($row3E>0){?><a href="#" onClick="EmpKRA(<?php echo $CompanyId.', '.$_SESSION['KraYId'].', '.$res['EmployeeID']; ?>)">Click</a><?php } ?></td>
	<?php if($_SESSION['Dept']==4){ ?><td class="tdc"><?php $sqlR=mysql_query("select * from hrm_employee_kra_uploadfile where EmployeeID=".$res['EmployeeID']." AND YearId=".$_SESSION['KraYId'], $con); $no=1; $resR=mysql_num_rows($sqlR); if($resR>0){ ?><a href="#" onClick="UploadEmpfile(<?php echo $CompanyId.', '.$_SESSION['KraYId'].', '.$res['EmployeeID']; ?>)">Yes</a><?php } if($resR==0){echo 'No'; }?></td><?php } ?> 

	<?php /*?><td class="tdc"><a href="#"><img src="images/edit.png" border="0" onClick="javascript:window.location='RevAddNewKRA.php?e=<?php echo $res['EmployeeID']?>&ee=1&aa=1&rr=0&hh=1&sh=1&hp=1&fr=1&kr=0&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1'"/></a><?php if($res3E['UseKRA']=='R'){ ?>&nbsp;&nbsp;&nbsp;<a href="#"><img src="images/go-back-icon.png" border="0" onClick="return ResentKRA(<?php echo $res['EmployeeID'].', '.$_SESSION['KraYId'];?>)"/></a><?php } ?></td><?php */?>
	</tr>
	</tbody>
    </div>
<?php $sno++;} ?>		
 </table>
 </span>
 <td id="ScoreEmpkra" style="display:block;"><span id="ScoreEmpKraSpan"></span></td>
<?php //************************************************ Close ******************************// ?>
<?php //************************************************ Close ******************************// ?>	 
		 
	</tr></table></td>
   </tr></table></td>
</form>		 
   </tr></table></td>
   </tr></table></td>
  </tr>					
<?php //********************** Form Start ******************************* ?>					
	</table></td>
  </tr></table></td>
  </tr></table></td>
  </tr></table></td>
  </tr>
  <tr><td valign="top"><?php require_once("../footer.php"); ?></td></tr></table></td></tr>
</table>
</body>
</html>html>



