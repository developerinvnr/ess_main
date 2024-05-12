<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
$sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='KRA'", $con); 
$sqlSYP=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'", $con);
$SNo=1; $resSY=mysql_fetch_array($sqlSY); $resSYP=mysql_fetch_array($sqlSYP);

if($_REQUEST['action']=='SetKRA' AND $_REQUEST['EI']!='' AND $_REQUEST['YI']!='')
{ 
 $sqlPms=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['EI'], $con); $rowPms=mysql_num_rows($sqlPms);
 if($rowPms>0)
 { $resPms=mysql_fetch_array($sqlPms);
 
   /********************** Kra Kra Open****************************/
   $sqlKra=mysql_query("select * from hrm_employee_pms_kraforma where EmpPmsId=".$resPms['EmpPmsId']." AND EmpId=".$_REQUEST['EI'], $con); $rows=mysql_num_rows($sqlKra); 
   if($rows>0)
   { $sqlK=mysql_query("select * from hrm_pms_kra where YearId=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['EI']." AND KRAStatus!='D' order by KRAId ASC", $con); 
     while($resK=mysql_fetch_array($sqlK))
     { $sqlKF=mysql_query("select * from hrm_employee_pms_kraforma where KRAId=".$resK['KRAId']." AND EmpPmsId=".$resPms['EmpPmsId']." AND EmpId=".$_REQUEST['EI'], $con); 
       $rowKF=mysql_num_rows($sqlKF);
	   if($rowKF>0) 
	   {$sqlUp=mysql_query("update hrm_employee_pms_kraforma set Weightage='".$resK['Weightage']."', Logic='".$resK['Logic']."', Period='".$resK['Period']."', Target='".$resK['Target']."' where KRAId=".$resK['KRAId']." AND EmpPmsId=".$resPms['EmpPmsId']." AND EmpId=".$_REQUEST['EI'], $con);}
	   else
	   {$sqlUp=mysql_query("insert into hrm_employee_pms_kraforma(EmpPmsId, EmpId, KRAId, Weightage, Logic, Period, Target) values(".$resPms['EmpPmsId'].", '".$_REQUEST['EI']."', ".$resK['KRAId'].", '".$resK['Weightage']."', '".$resK['Logic']."', '".$resK['Period']."', '".$resK['Target']."')", $con);}
	   if($sqlUp){$msg='KRA set to PMS successfully'; 
	              $sqlUp2=mysql_query("update hrm_employee_pms set KRASetting='Y' where EmpPmsId=".$resPms['EmpPmsId']." AND AssessmentYear=".$_REQUEST['YI'], $con); }
      }
	  $sqlCkk=mysql_query("select * from hrm_employee_pms_kraforma where EmpPmsId=".$resPms['EmpPmsId']." AND EmpId=".$_REQUEST['EI'], $con); 
	  while($resCkk=mysql_fetch_array($sqlCkk)) 
	  { $sqlCkf=mysql_query("select * from hrm_pms_kra where KRAId=".$resCkk['KRAId']." AND EmployeeID=".$_REQUEST['EI'], $con); $rowCkf=mysql_num_rows($sqlCkf);
	    if($rowCkf==0){$sqlDel=mysql_query("delete from hrm_employee_pms_kraforma where KRAId=".$resCkk['KRAId']." AND EmpId=".$_REQUEST['EI'], $con);}
	  } 
	  
   }
   if($rows==0)
   { $sqlK=mysql_query("select * from hrm_pms_kra where YearId=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['EI']." AND KRAStatus!='D' order by KRAId ASC", $con); 
     while($resK=mysql_fetch_array($sqlK))
     { $sqlUp=mysql_query("insert into hrm_employee_pms_kraforma(EmpPmsId, EmpId, KRAId, Weightage, Logic, Period, Target) values(".$resPms['EmpPmsId'].", '".$_REQUEST['EI']."', ".$resK['KRAId'].", '".$resK['Weightage']."', '".$resK['Logic']."', '".$resK['Period']."', '".$resK['Target']."')", $con); }
     if($sqlUp){$msg='KRA set to PMS successfully'; 
	            $sqlUp2=mysql_query("update hrm_employee_pms set KRASetting='Y' where EmpPmsId=".$resPms['EmpPmsId']." AND AssessmentYear=".$_REQUEST['YI'], $con); }
   }  
   /********************** Kra Kra Close ****************************/
   
 }
}



if($_REQUEST['action']=='SetFormBB' AND $_REQUEST['EI']!='' AND $_REQUEST['YI']!='')
{ 
 $sqlPms=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['EI'], $con); $rowPms=mysql_num_rows($sqlPms);
 if($rowPms>0)
 { $resPms=mysql_fetch_array($sqlPms);

   /********************** FormB FormB Open ****************************/
   $sqlb=mysql_query("select * from hrm_employee_pms_behavioralformb where EmpId=".$_REQUEST['EI']." AND YearId=".$_REQUEST['YI']."", $con); $rowb=mysql_num_rows($sqlb);
   if($rowb>0)
   {
    $sqlbUp=mysql_query("update hrm_employee_pms_behavioralformb set EmpPmsId=".$resPms['EmpPmsId'].", EmpStatus='A' where EmpId=".$_REQUEST['EI']." AND YearId=".$_REQUEST['YI']."", $con);
	if($sqlbUp){ $msg='FormB set successfully'; 
	             $sqlUp2=mysql_query("update hrm_employee_pms set SkillSetting='Y' where EmpPmsId=".$resPms['EmpPmsId']." AND AssessmentYear=".$_REQUEST['YI'], $con); }
   }
   else
   {
	$sql=mysql_query("select GradeId,DepartmentId from hrm_employee_general where EmployeeID=".$_REQUEST['EI'],$con); $res=mysql_fetch_array($sql);
     /* AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA */
	 $sqlBck=mysql_query("select * from hrm_pms_formb fb INNER JOIN hrm_pms_formb_grade fbg ON fb.FormBId=fbg.FormBId where fb.SkillStatus='A' AND fb.GroupFor='' AND fb.DepartmentId=".$res['DepartmentId']." AND fbg.GradeId=".$res['GradeId']." AND fbg.Vertical=0", $con); 
	 while($resBck=mysql_fetch_array($sqlBck))
     {
      $sqlIn=mysql_query("insert into hrm_employee_pms_behavioralformb(EmpPmsId, FormBId, EmpId, YearId, EmpStatus, AppStatus) values(".$resPms['EmpPmsId'].", ".$resBck['FormBId'].", ".$_REQUEST['EI'].", ".$_REQUEST['YI'].", 'A', 'A')",$con);
     }
	 
	 /* BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB */
	 $sqlBck=mysql_query("select * from hrm_pms_formb fb INNER JOIN hrm_pms_formb_grade fbg ON fb.FormBId=fbg.FormBId where fb.SkillStatus='A' AND fb.GroupFor!='' AND fb.DepartmentId=".$res['DepartmentId']." AND fbg.GradeId=".$res['GradeId']." AND fbg.Vertical=0 group by GroupFor", $con); 
	 while($resBck=mysql_fetch_array($sqlBck))
     {
      $sqlIn=mysql_query("insert into hrm_employee_pms_behavioralformb(EmpPmsId, FormBId, EmpId, YearId, EmpStatus, AppStatus) values(".$resPms['EmpPmsId'].", ".$resBck['FormBId'].", ".$_REQUEST['EI'].", ".$_REQUEST['YI'].", 'A', 'A')",$con);
     }
	 
	 if($sqlIn){ $msg='FormB set successfully'; $sqlUp2=mysql_query("update hrm_employee_pms set SkillSetting='Y' where EmpPmsId=".$resPms['EmpPmsId']." AND AssessmentYear=".$_REQUEST['YI'], $con); }
	 
   }
   /********************** FormB FormB Close ****************************/
   
 }
}
?>

<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.font{font-family:Times New Roman;font-size:12px;text-align:center;font-weight:bold;} 
.th{font-family:Times New Roman;color:#FFFFFF;font-size:12px;text-align:center;font-weight:bold;height:24px;}
.td{font-family:Times New Roman;font-size:12px;text-align:center;color:#000000;}
.tdl{font-family:Times New Roman;font-size:12px;text-align:left;}
.tdr{font-family:Times New Roman;font-size:12px;text-align:right;}
.InputT{font-family:Times New Roman;font-size:14px;width:100%;height:20px;text-align:center;border:hidden; background-color:#CDFF9B;}.InputTl{font-family:Times New Roman;font-size:14px;width:100%;height:20px;text-align:left;border:hidden;background-color:#CDFF9B;}.InputTr{font-family:Times New Roman;font-size:14px;width:100%;height:20px;text-align:right;border:hidden;background-color:#CDFF9B;}
.InputS{font-family:Times New Roman;font-size:12px;width:100%;height:20px;}
.fontButton{ background-color:#7a6189;color:#009393;font-family:Times New Roman;font-size:13px; }
.SaveButton{ background-image:url(images/save.gif);width:20px;height:20px;background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit; }
.CalenderButton{ background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3; border-color:#FFFFFF; } .inner_table{height:500px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript">
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '500px' }); })

function SelYearId(YeId){ document.getElementById("DisPyRecd").style.display='none'; }
function edit(value,YeId)
{ var DI=document.getElementById("DId").value;  window.location="EditEmpKRA.php?act=checked&valu=true&rr=234&rtr=4&Dpp=55&rest=false&e="+value+"&DI="+DI+"&YeId="+YeId; }				
	
function  SelectDeptEmp(v)
{ var YeId = document.getElementById("YearE").value; var x = "EditKRA.php?act=checked&valu=true&rr=234&rtr=4&Dpp=55&rest=false&DpId="+v+"&YeId="+YeId+"&tt=44&rtr=r%r";  window.location=x;}				

function EmpKRA(CId,YId,EmpId) 
{ window.open ("EmpKraForm.php?YId="+YId+"&EmpId="+EmpId+"&CId="+CId,"KRAForm","menubar=yes,scrollbars=yes,resizable=1,width=1100,height=550");}

function SetK(EI,YI)
{ var DI=document.getElementById("DId").value;  window.location="EditKRA.php?action=SetKRA&EI="+EI+"&YI="+YI+"&DpId="+DI;}		

function EmpFormB(T,CId,YId,EmpId) 
{ window.open ("EmpFormBForm.php?YId="+YId+"&EmpId="+EmpId+"&CId="+CId+"&T="+T,"FormBForm","menubar=yes,scrollbars=yes,resizable=1,width=1100,height=550");}

function SetBB(EI,YI)
{ var DI=document.getElementById("DId").value;  window.location="EditKRA.php?action=SetFormBB&EI="+EI+"&YI="+YI+"&DpId="+DI;}

function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#9BEF47'; }
  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; }
}

</Script>     
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //***********************************************************************************************?>
<?php //**********************START*****START*****START******START******START*********************?>
<?php //********************************************************************?>
<table border="0" style="margin-top:0px; width:100%; height:400px;">
	<tr>
	    <td align="right" width="1%">&nbsp;</td>
		<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
		
		<td align="center" width="100%" valign="top">
		   <table border="0" style="width:100%;">
		     <tr>
			  <td align="left" class="heading" style="width:200px;">Edit Employee KRA</td>
			  <td style="font-size:11px; width:120px;">
			  <select class="tdsel" style="background-color:#DDFFBB;width:100%;" name="YearE" id="YearE" onChange="SelYearId(this.value)"><?php if($_REQUEST['YeId']!=''){ $SqlY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YeId'], $con); $ResY=mysql_fetch_array($SqlY); ?><option value="<?php echo $ResY['YearId']; ?>"><?php echo '&nbsp;'.date("Y",strtotime($ResY['FromDate'])).'-'.date("Y",strtotime($ResY['ToDate'])); if($ResYear['YearId']>5){ echo ' - Y'; }?></option><?php }else{ ?><option value="" selected>Select Year</option><?php } $SqlYear=mysql_query("select YearId,FromDate,ToDate from hrm_year where YearId<=".$resSY['CurrY']." order by YearId DESC", $con); while($ResYear=mysql_fetch_array($SqlYear)) { ?><option value="<?php echo $ResYear['YearId']; ?>"><?php echo '&nbsp;'.date("Y",strtotime($ResYear['FromDate'])).'-'.date("Y",strtotime($ResYear['ToDate'])); if($ResYear['YearId']>5){ echo ' - Y'; } ?></option><?php } ?></select>
			  </td>
			  <td class="td1" style="font-size:11px; width:150px;">
			   <select class="tdsel" style="background-color:#DDFFBB;width:100%;" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmp(this.value)"><?php if($_REQUEST['DpId']>0){ $SqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['DpId'], $con); $ResDet=mysql_fetch_array($SqlDept); ?><option value="<?php echo $_REQUEST['DpId'];?>" style="margin-left:0px; background-color:#84D9D5;" selected><?php echo $ResDet['DepartmentCode']; ?></option><?php }else{?><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Select Department</option><?php } $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?></select>
			   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
			   <input type="hidden" name="DId" id="DId" value="<?php echo $_REQUEST['DpId']; ?>" />
			  </td>
			  <td align="right" style="font-family:Times New Roman;font-size:16px;color:#007700; width:600px;"><b><?php echo $msg; ?></b><font class="font4"><b>&nbsp;<span id="msg"></span></b></font></td>
			  </td></tr>
			 
			 <tr>
			   <td valign="top" colspan="5" style="width:100%;" id="DisPyRecd"> 
			   
<?php $sqlKey=mysql_query("select * from hrm_pms_key where Person='emp' AND CompanyId=".$CompanyId, $con); 
$resKey=mysql_fetch_assoc($sqlKey); ?>			   
<table border="1" id="table1" style="width:100%;">
 <div class="thead">
 <thead>
 <tr bgcolor="#7a6189">
   <td rowspan="2" class="th" style="width:3%;">&nbsp;</td> 
   <td rowspan="2" class="th" style="width:3%;">SNo.</td>
   <td rowspan="2" class="th" style="width:5%;">EC</td>
   <td rowspan="2" class="th" style="width:20%;">Name</td>
   <td rowspan="2" class="th" style="width:13%;">HeadQuater</td>
   <td rowspan="2" class="th" style="width:10%;">Department</td>
 <?php /*?><td rowspan="2" class="th" style="width:15%;"><b>Designation</b></td><?php */?>
   <td colspan="4" class="th" style="width:15%;">KRA</td>
   <td colspan="4" class="th" style="width:15%;">Form-B</td>
 </tr>
 <tr bgcolor="#7a6189">
	<td class="th" style="width:5%;"><b>KRA</b></td>	
	<td class="th" style="width:5%;"><b>Action</b></td>
	<td class="th" style="width:5%;"><b>SetKRA</b></td>
	<td class="th" style="width:5%;"><b>Set</b></td>
	
	<td class="th" style="width:5%;"><b>FormB</b></td>
	<td class="th" style="width:5%;"><b>Action</b></td>
	<td class="th" style="width:5%;"><b>SetFormB</b></td>
	<td class="th" style="width:5%;"><b>Set</b></td>
 </tr>
 </thead>
 </div>
<?php if($_REQUEST['DpId'] AND $_REQUEST['DpId']!='' AND $_REQUEST['YeId']!='') { 
      $sqlDP = mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, HqName, DepartmentCode, DesigName, Gender, Married, DateJoining from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON g.DesigId=de.DesigId INNER JOIN hrm_grade gr ON g.GradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DepartmentId=".$_REQUEST['DpId'], $con); $Sno=1; while($resDP = mysql_fetch_assoc($sqlDP)){ 
if($resDP['Gender']=='M'){$M='Mr.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='Y'){$M='Mrs.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='N'){$M='Miss.';} $Name=$M.' '.$resDP['Fname'].' '.$resDP['Sname'].' '.$resDP['Lname']; $LEC=strlen($resDP['EmpCode']); 
if($LEC==1){$EC='000'.$resDP['EmpCode'];} if($LEC==2){$EC='00'.$resDP['EmpCode'];} if($LEC==3){$EC='0'.$resDP['EmpCode'];} if($LEC>=4){$EC=$resDP['EmpCode'];}	 

$sql3E2=mysql_query("select EmpStatus from hrm_pms_kra where YearId=".$_REQUEST['YeId']." AND EmployeeID=".$resDP['EmployeeID'], $con); $res3E2=mysql_fetch_assoc($sql3E2);
$sqlb=mysql_query("select * from hrm_employee_pms_behavioralformb where EmpId=".$resDP['EmployeeID']." AND YearId=".$_REQUEST['YeId']."", $con); $rowb=mysql_num_rows($sqlb);
$sqlSet=mysql_query("select KRASetting,SkillSetting from hrm_employee_pms where AssessmentYear=".$_REQUEST['YeId']." AND EmployeeID=".$resDP['EmployeeID'], $con); $resSet=mysql_fetch_assoc($sqlSet);  
?>
 <div class="tbody">
 <tbody>
 <tr bgcolor="#FFFFFF" style="height:24px;" id="TR<?php echo $Sno; ?>">
   <td align="center" style="width:30px;"><input type="checkbox" id="Chk<?php echo $Sno; ?>" onClick="FucChk(<?php echo $Sno; ?>)" /></td> 
  <td class="td"><?php echo $Sno; ?></td>
  <td class="td"><?php echo $EC; ?></td>
  <td class="tdl">&nbsp;<?php echo $Name; ?></td>
  <td class="tdl">&nbsp;<?php echo $resDP['HqName'];?></td>
  <td class="tdl">&nbsp;<?php echo $resDP['DepartmentCode'];?></td>
<?php /*?><td class="tdl">&nbsp;<?php echo $resDP['DesigName'];?></td><?php */?>   
  <td class="td" style="background-color:#D2E9FF;"><?php if($res3E2['EmpStatus']=='A'){ ?><a href="#" onClick="EmpKRA(<?php echo $CompanyId.', '.$_REQUEST['YeId'].', '.$resDP['EmployeeID']; ?>)">Click</a><?php } ?></td>

  <td class="td" style="background-color:#D2E9FF;"><?php if($_REQUEST['YeId']==$resSY['CurrY'] OR $_REQUEST['YeId']==$resSYP['CurrY']){ ?><?php if($_SESSION['User_Permission']=='Edit'){ ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resDP['EmployeeID'].','.$_REQUEST['YeId']; ?>)"></a><?php } } ?></td>
  		
  <td class="td" style="background-color:#D2E9FF;"><?php if($resSet['KRASetting']=='Y'){echo '<font color="#008000">Yes</font>';}else{echo 'No';}?></td>
  <td class="td" style="background-color:#D2E9FF;">
  <?php if($resKey['AppraisalForm']=='Y' OR $resKey['MidPmsForm']=='Y')
        { 		
         if($res3E2['EmpStatus']=='A' AND $resDP['DateJoining']<=date("Y").'-06-30')
         { 
		  if($_SESSION['User_Permission']=='Edit'){ ?><a href="#"><img src="images/select.png" border="0" alt="Set" onClick="SetK(<?php echo $resDP['EmployeeID'].', '.$_REQUEST['YeId']; ?>)"></a><?php } ?>
   <?php } 
        } ?>
  </td>

  <td class="td" style="background-color:#FFFFDD;"><?php if($rowb>0 ){ ?>
  <a href="#" onClick="EmpFormB('V',<?php echo $CompanyId.', '.$_REQUEST['YeId'].', '.$resDP['EmployeeID'];?>)">Click</a>
  <?php } ?></td> 
  
  <td class="td" style="background-color:#FFFFDD;"><?php if($_REQUEST['YeId']==$resSY['CurrY'] OR $_REQUEST['YeId']==$resSYP['CurrY']){ ?><?php if($_SESSION['User_Permission']=='Edit'){ ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EmpFormB('E', <?php echo $CompanyId.', '.$_REQUEST['YeId'].', '.$resDP['EmployeeID'];?>)"></a><?php } } ?></td>
  
  <td class="td" style="background-color:#FFFFDD;"><?php if($resSet['SkillSetting']=='Y'){echo '<font color="#008000">Yes</font>';}else{echo 'No';}?> </td>
   <td class="td" style="background-color:#FFFFDD;">
   <?php if($_REQUEST['YeId']==$resSY['CurrY'] OR $_REQUEST['YeId']==$resSYP['CurrY']){ ?>
   <?php if($resKey['AppraisalForm']=='Y' OR $resKey['MidPmsForm']=='Y')
         { 		
          if($res3E2['EmpStatus']=='A' AND $resDP['DateJoining']<=date("Y").'-06-30')
          { 
		   if($_SESSION['User_Permission']=='Edit'){ ?><a href="#"><img src="images/select.png" border="0" alt="Set" onClick="SetBB(<?php echo $resDP['EmployeeID'].', '.$_REQUEST['YeId']; ?>)"></a><?php } ?>
    <?php } 
         } 
		 
		}?>
   		 
  </td>
</tr>
</tbody>
</div>
<?php $Sno++; } } ?>
</table>
   </td>	
  </tr>
<?php //------------------------Display Record------------------------------------ ?>
 <tr><td><span id="DeptEmpName"></span></td></tr> 
 <tr><td bgcolor="#B6E9E2" colspan="6"></td></tr>
		   </table>  		
		</td>
        <?php } ?>
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
		
<?php //**************************************************************************?>
<?php //******************END*****END*****END******END******END********************************?>
<?php //***********************************************************************************?>
		
	  </td>
	</tr>
	
	<!--<tr>
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
	    <?php //require_once("../footer.php"); ?>
	  </td>
	</tr>-->
  </table>
 </td>
</tr>
</table>
</body>
</html>