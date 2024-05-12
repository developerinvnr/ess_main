<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************************************************//
if(isset($_POST['GradeSaveFormB']))
{ 
  $GTNo=$_POST['GradeNo']; $FormBNo=$_POST['FormBNo'];
  for($i=1; $i<=$FormBNo; $i++)
   { $Fid=$_POST['FormBid_'.$i];
    for($j=1; $j<=$GTNo; $j++)
	{ 
	  if($_POST['FormB'.$i.'_'.$j]!='') 
	  { 
	   $sql=mysql_query("select * from hrm_pms_formb_grade where FormBId=".$Fid." AND GradeId=".$_POST['FormB'.$i.'_'.$j], $con);  $row=mysql_num_rows($sql);
	   if($row==0)
	    { $sqlMax = mysql_query("SELECT MAX(GradeFormBId) as GradeFormBId FROM hrm_pms_formb_grade", $con); $resMax = mysql_fetch_assoc($sqlMax);
	      $NextFormBId = $resMax['GradeFormBId']+1;
	      $sql2=mysql_query("insert into hrm_pms_formb_grade(GradeFormBId,YearId,FormBId,GradeId,CreatedBy,CreatedDate) values(".$NextFormBId.",".$YearId.",".$Fid.",".$_POST['FormB'.$i.'_'.$j].",".$UserId.",'".date("Y-m-d")."')", $con);
	   if($sql2){$msg="Data Updated Successfully";}
	    }
	  }  
	}
   }
}
if(isset($_POST['SingleGradeSaveFormB']))
{ $GTNo=$_POST['GradeNo']; $FormBNo=$_POST['FormBNo']; 
  $msg="Data Updated Successfully";
}

if($_REQUEST['actti']=='formbempproc' && $_REQUEST['DPid']!='' && $_REQUEST['fbid']!='' && $_REQUEST['yid']!='')
{
 
 $sql=mysql_query("select e.EmployeeID,g.GradeId from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DepartmentId=".$_REQUEST['DPid']." order by e.EmployeeID ASC",$con);
 while($res=mysql_fetch_array($sql))
 {

  $sqlBck=mysql_query("select * from hrm_pms_formb fb INNER JOIN hrm_pms_formb_grade fbg ON fb.FormBId=fbg.FormBId where fb.SkillStatus='A' AND fb.FormBId=".$_REQUEST['fbid']." AND fb.DepartmentId=".$_REQUEST['DPid']." AND fbg.GradeId=".$res['GradeId'], $con); $resBck=mysql_num_rows($sqlBck);
  
  $sqlb=mysql_query("select * from hrm_employee_pms_behavioralformb where FormBId=".$_REQUEST['fbid']." AND EmpId=".$res['EmployeeID']." AND YearId=".$_REQUEST['yid']."", $con); $rowb=mysql_num_rows($sqlb);
  $sqlPmsId=mysql_query("select EmpPmsId from hrm_employee_pms where EmployeeID=".$res['EmployeeID']." AND AssessmentYear=".$_REQUEST['yid']."", $con); $rowPmsId=mysql_num_rows($sqlPmsId);
  if($rowPmsId>0){$resPmsId=mysql_fetch_assoc($sqlPmsId); $PmsId=$resPmsId['EmpPmsId'];}else{$PmsId=0;}
  if($resBck>0 AND $rowb==0)
  {
   $sqlIn=mysql_query("insert into hrm_employee_pms_behavioralformb(EmpPmsId, FormBId, EmpId, YearId) values(".$PmsId.", ".$_REQUEST['fbid'].", ".$res['EmployeeID'].", ".$_REQUEST['yid'].")",$con);
   if($sqlIn){ echo '<script>alert("FormB set successfully!"); window.location="GradeFormB.php?DPid='.$_REQUEST['DPid'].'"; </script>'; }
  }
  
 }
}


?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.font{font-family:Times New Roman;font-size:16px;text-align:center;font-weight:bold;} 
.th{font-family:Times New Roman;color:#FFFFFF;font-size:14px;text-align:center;font-weight:bold;height:24px;}
.td{font-family:Times New Roman;font-size:14px;text-align:center;color:#000000;}
.tdl{font-family:Times New Roman;font-size:14px;text-align:left;}
.tdr{font-family:Times New Roman;font-size:14px;text-align:right;}
.InputT{font-family:Times New Roman;font-size:14px;width:100%;height:20px;text-align:center;border:hidden; background-color:#CDFF9B;}.InputTl{font-family:Times New Roman;font-size:14px;width:100%;height:20px;text-align:left;border:hidden;background-color:#CDFF9B;}.InputTr{font-family:Times New Roman;font-size:14px;width:100%;height:20px;text-align:right;border:hidden;background-color:#CDFF9B;}
.InputS{font-family:Times New Roman;font-size:12px;width:100%;height:20px;}
.fontButton{ background-color:#7a6189;color:#009393;font-family:Times New Roman;font-size:13px; }
.SaveButton{ background-image:url(images/save.gif);width:20px;height:20px;background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit; }
.CalenderButton{ background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3; border-color:#FFFFFF; }
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script> 
function SelectDeptEmp(value){  var x = 'GradeFormB.php?DPid='+value; window.location=x; }                                
function Check(value,sn) 
{ 
  document.getElementById("Check_"+value).style.display='none'; document.getElementById("UnCheck_"+value).style.display='block';
  var GradeNo=document.getElementById("GradeNo").value; var YId=document.getElementById("YearId").value; var UId=document.getElementById("UserId").value; 
  for(var i=1; i<=GradeNo; i++)
  {  document.getElementById('FormB'+sn+'_'+i).disabled=false; }
}

function UnCheck(value,sn) {
document.getElementById("Check_"+value).style.display='block'; document.getElementById("UnCheck_"+value).style.display='none';
var GradeNo=document.getElementById("GradeNo").value; var YId=document.getElementById("YearId").value; var UId=document.getElementById("UserId").value;
  for(var i=1; i<=GradeNo; i++)
  { document.getElementById('FormB'+sn+'_'+i).disabled=true; }
}

function Click(b,g,sn,dt)
{ 
 document.getElementById("sn").value=sn; document.getElementById("dt").value=dt;
 if(document.getElementById('FormB'+sn+'_'+dt).checked==false)
 { var url = 'CheckFormBGrade.php';	var pars = 'bid='+b+'&gid='+g;	var myAjax = new Ajax.Request(
   url, { method: 'post', parameters: pars,  onComplete: show_CheckFormBGrade});
 }
 else if(document.getElementById('FormB'+sn+'_'+dt).checked==true)
 { var YId=document.getElementById("YearId").value; var UId=document.getElementById("UserId").value;
   var url = 'CheckFormBGrade.php';	var pars = 'bid2='+b+'&gid2='+g+'&YId='+YId+'&UId='+UId; var myAjax = new Ajax.Request(
   url, { 	method: 'post', parameters: pars,  onComplete: show_CheckFormBGrade });
 }
}
function show_CheckFormBGrade(originalRequest)
{ document.getElementById('MsgSpan').innerHTML = originalRequest.responseText; 
  var sn=document.getElementById("sn").value; var dt=document.getElementById("dt").value;
  if(document.getElementById('FormB'+sn+'_'+dt).checked==true)
  { document.getElementById('TD'+sn+'_'+dt).style.background='#C1FF84'; }
  else
  { document.getElementById('TD'+sn+'_'+dt).style.background='#FFFFFF'; }
}

function PopupCenter(pageURL, title,w,h) {
var left = (screen.width/2)-(w/2);
var top = (screen.height/2)-(h/2);
var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}	

function fESet(fbId,YId,DpId)
{ 
 var agree=confirm("Are you sure!");
 if(agree){ window.location='GradeFormB.php?DPid='+DpId+'&fbid='+fbId+'&yid='+YId+'&actti=formbempproc'; }
 else { return false; } 
}

function fEmpSingleSet(fbId,YId,DpId)
{
 window.open('GradeFormBSetEmp.php?DPid='+DpId+'&fbid='+fbId+'&yid='+YId+'&actti=formbempproc','Form','menubar=no,scrollbars=yes,resizable=no,directories=no,width=800,height=500'); 
}

function fEView(fbId,YId,DpId)
{ 
 window.open('GradeFormBEmp.php?DPid='+DpId+'&fbid='+fbId+'&yid='+YId+'&actti=formbempproc','Form','menubar=no,scrollbars=yes,resizable=no,directories=no,width=800,height=500'); 
}



</SCRIPT> 
</head>
<body class="body">
<input type="hidden" id="sn"><input type="hidden" id="dt">
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
	  <td valign="top" align="center" width="100%" id="MainWindow"><br>
<?php //********************************************************************************/ ?>
<?php //***************START*****START*****START******START******START*************/ ?>
<?php //*******************************************************************************/ ?>
	  
<table border="0" style="margin-top:0px;width:100%;height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr><td align="right" width="400" class="heading">PMS - Grade Wise Behavioral Parameter(Form B)</td><td width="50">&nbsp;</td>
		 <td class="td1" style="font-size:11px; width:150px;">
           <select class="InputS" style="width:150px;" id="DepartmentE" onChange="SelectDeptEmp(this.value)"><option value="" selected>Select Department</option><?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?></select>
		   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
        </td>
		<td width="20">&nbsp;</td>
		<td><?php if($_REQUEST['DPid']){ $_SESSION['DPid']=$_REQUEST['DPid']; $Sql=mysql_query("select * from hrm_department where DepartmentId=".$_SESSION['DPid'], $con); $Res=mysql_fetch_assoc($Sql); } ?>		
<input class="InputT" style="color:#4A0000;font-size:14px;background-color:#E0DBE3;border-style:none;font-weight:bold;" value="<?php echo $Res['DepartmentName'] ?>" /></td>
		<td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><span id="MsgSpan"></span><?php echo $msg;?></b></td>
		<td align="center" style="width:60px;"><input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/></td>        <td align="center" style="width:60px;"><input type="button" name="Refresh" value="refresh" onClick="javascript:window.location='GradeFormB.php'"/></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(( $_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:5px;" valign="top" align="center">&nbsp;</td>
 
<?php $sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'", $con); $resSY=mysql_fetch_array($sqlSY); $RunYId=$resSY['CurrY']; ?>
<?php //**************************** Open Department***************************************************?> 
<td align="left" id="type" valign="top" style="display:block;width:100%;">             
   <table border="0" width="100%">
   
	<tr>
	  <td align="left" width="100%">
	     <table border="1" width="100%" border="1" bgcolor="#FFFFFF" cellspacing="1">
		 <form name="editForm" method="post" />
		 <tr bgcolor="#7a6189">
		   <td rowspan="2" class="th" style="width:3%;"><b>Sn</b></td>
		   <td rowspan="2" class="th" style="width:30%;"><b>Behavioral(Form B)</b></td>
		   <td rowspan="2" class="th" style="width:4%;"><b>Weight</b></td>
		   <?php /*?><td rowspan="2" class="th" style="width:30%;"><b>SkillComment</b></td><?php */?>
   <?php  if($CompanyId==1){$sql=mysql_query("select GradeId from hrm_grade where GradeStatus='A' AND GradeId>=61 AND CompanyId=".$CompanyId, $con);}else{$sql=mysql_query("select GradeId from hrm_grade where GradeStatus='A' AND GradeValue>0 AND CompanyId=".$CompanyId, $con);} $n=1;
	  while($res=mysql_fetch_array($sql)){ echo '<input type="hidden" value="'.$n.'" />'; $n++; } $n2=$n-1; ?>
		   <td class="th" style="width:55%;" colspan="<?php echo $n2; ?>"><b>Grade</b></td> 
		   <td class="th" style="width:8%;" colspan="2"><b>Setup</b></td> 
		   <td rowspan="2" class="th" style="width:4%;">view</td> 
		 </tr>
		 <tr bgcolor="#7a6189">		
<?php if($CompanyId==1){$sqlG=mysql_query("select GradeId,GradeValue from hrm_grade where GradeStatus='A' AND GradeId>=61 AND CompanyId=".$CompanyId." order by GradeId ASC", $con); }
else{$sqlG=mysql_query("select GradeId,GradeValue from hrm_grade where GradeStatus='A' AND GradeValue>0 AND CompanyId=".$CompanyId." order by GradeId ASC", $con); } $count=1; while($resG=mysql_fetch_array($sqlG)){ ?>
	      <td class="th"><b><?php echo $resG['GradeValue']; ?></b></td>
	    <?php $count++; } $no=$count-1;?>
		  <td class="th" style="width:4%;">Grade<br>Wise</td>
		  <td class="th" style="width:4%;">Emp<br>Wise</td>
		
		<input type="hidden" name="GradeNo" id="GradeNo" value="<?php echo $no; ?>" />	
		 </tr>
		 
<?php if($_REQUEST['DPid']){ $_SESSION['DPid']=$_REQUEST['DPid']; ?>
      <input type="hidden" name="DPid" value="<?php echo $_SESSION['DPid']; ?>" />	
<?php $sqlGrade=mysql_query("select FormBId,Skill,SkillComment,Weightage from hrm_pms_formb where SkillStatus='A' AND CompanyId=".$CompanyId." AND DepartmentId=".$_REQUEST['DPid'], $con); $Sno=1; while($resGrade=mysql_fetch_array($sqlGrade)){ ?>			 		      
        <tr>
		  <td class="td"><?php echo $Sno; ?><input type="hidden" name="FormBid_<?php echo $Sno; ?>" value="<?php echo $resGrade['FormBId']; ?>" /></td>
		  <td class="tdl"><a href="javascript:void(0);" onClick="PopupCenter('FormBDes.php?Bid=<?php echo $resGrade['FormBId']; ?>', 'VNR(HRIMS)',350,300);"><?php echo $resGrade['Skill']; ?></a></td>
		  <td class="td"><?php echo $resGrade['Weightage']; ?></td>
		  
		  <?php /*?><td class="tdl"><textarea class="tdl" style="width:100%;border:hidden;" rows="1"><?php echo $resGrade['SkillComment']; ?></textarea></td><?php */?>
		  	  
<?php if($CompanyId==1){$sqlG2=mysql_query("select GradeId from hrm_grade where GradeStatus='A' AND GradeId>=61 AND CompanyId=".$CompanyId." order by GradeId ASC", $con);}else{$sqlG2=mysql_query("select GradeId from hrm_grade where GradeStatus='A' AND GradeValue>0 AND CompanyId=".$CompanyId." order by GradeId ASC", $con);} $GNo=1;
	  while($resG2=mysql_fetch_array($sqlG2)){ $sqlG3=mysql_query("select * from hrm_pms_formb_grade where FormBId=".$resGrade['FormBId']." AND GradeId=".$resG2['GradeId'], $con); $row2=mysql_num_rows($sqlG3);?>
		  <td class="td" style="background-color:<?php if($row2>0){echo '#C1FF84';}else{echo '#FFFFFF';}?>;" id="<?php echo 'TD'.$Sno.'_'.$GNo; ?>"><input type="checkbox" name="<?php echo 'FormB'.$Sno.'_'.$GNo; ?>" id="<?php echo 'FormB'.$Sno.'_'.$GNo; ?>" value="<?php echo $resG2['GradeId']; ?>"  <?php if($row2>0){echo 'checked';}?> onClick="Click(<?php echo $resGrade['FormBId'].','.$resG2['GradeId'].','.$Sno.','.$GNo; ?>)" /></td>
<?php $GNo++;} $GNo2=$GNo-1; ?>
          
		  <?php $rowBY=mysql_num_rows(mysql_query("select * from hrm_employee_pms_behavioralformb where FormBId=".$resGrade['FormBId']." AND YearId=".$RunYId, $con)); ?>
          <td class="td" style="background-color:<?php if($rowBY>0){echo '#FFA6FF';} ?>;"><span style="cursor:pointer;"><img src="images/select.png" onClick="fESet(<?php echo $resGrade['FormBId'].','.$RunYId.','.$_SESSION['DPid'];?>)"></span></td>
		  
		  <td class="td"><span style="cursor:pointer;"><img src="images/man.png" onClick="fEmpSingleSet(<?php echo $resGrade['FormBId'].','.$RunYId.','.$_SESSION['DPid'];?>)"></span></td>
		
          <td class="td"><span style="cursor:pointer;color:#007500;" onClick="fEView(<?php echo $resGrade['FormBId'].','.$RunYId.','.$_SESSION['DPid'];?>)"><u>click</u></span></td>
		  
		</tr>
		 
<?php $Sno++;} $no2=$Sno-1; ?>	<input type="hidden" name="FormBNo" id="FormBNo" value="<?php echo $no2; ?>" />  <?php } ?>		
		 <input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
		 <input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
	   </table>	 
      </td>
	 </tr> 
   </form>
  </table>  
</td>
<?php //**************************************** Close Department ********************?>    

 </tr>
<?php } ?> 
</table>
		
<?php //********************************************************************************?>
<?php //************************END*****END*****END******END******END*****************************?>
<?php //***************************************************************************************?>
		
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
