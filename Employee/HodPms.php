<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}else{header('Location:../index.php');}
//include("SetKraPmsy.php");
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link type="text/css" href="css/mycss.css" rel="stylesheet"/>
<script src="../AdminUser/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../AdminUser/js/jquery.freezeheader.js"></script>
<script>$(document).ready(function () { $("#table1").freezeHeader({ 'height':'500px' }); })</script>

<script type="text/javascript" language="javascript">
function SelectHQEmp(value1,value2,YI,CI){ 
    document.getElementById('MyTeam').style.display='none'; 
	var url = 'RevHQEmp.php';	var pars = 'HQid='+value1+'&EmpId='+value2+'&YI='+YI+'&CI='+CI;	var myAjax = new Ajax.Request(
	url, { 	method: 'post', parameters: pars, onComplete: show_HQEmp });
} 

function show_HQEmp(originalRequest)
{ document.getElementById('MyTeamSpan').innerHTML = originalRequest.responseText; }


function SelectStateEmp(value1,value2,YI,CI){ 
    document.getElementById('MyTeam').style.display='none'; 
	var url = 'RevStateEmp.php';	var pars = 'StHQid='+value1+'&EmpId='+value2+'&YI='+YI+'&CI='+CI;	var myAjax = new Ajax.Request(
	url, { 	method: 'post', parameters: pars, onComplete: show_HQEmp });
} 

function show_HQEmp(originalRequest)
{ document.getElementById('MyTeamSpan').innerHTML = originalRequest.responseText; }




function SelectDeptEmp(value1,value2,YI,CI){ 
    document.getElementById('MyTeam').style.display='none'; 
	var url = 'RevHQEmp.php';	var pars = 'Deptid='+value1+'&EmpId='+value2+'&YI='+YI+'&CI='+CI;	var myAjax = new Ajax.Request(
	url, { 	method: 'post', parameters: pars, onComplete: show_HQEmp });
} 
function show_HQEmp(originalRequest)
{ document.getElementById('MyTeamSpan').innerHTML = originalRequest.responseText; }




function ReadHistory(EI)
{window.open("EmpHistory.php?EI="+EI,"HForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=920,height=600");}

function EmpKRA(CId,YId,EmpId) 
{ window.open ("EmpKraForm.php?YId="+YId+"&EmpId="+EmpId+"&CId="+CId,"KRAForm","menubar=yes,scrollbars=yes,resizable=1,width=1150,height=550");}


function OpenWindow(v,ci)
{window.open("RevEmpHistory.php?a="+v+"&CI="+ci,"RevForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=650");}

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
<input type="hidden" id="FormAMin5" value="" /><input type="hidden" id="FormAMax5" value="" />
<input type="hidden" id="FormBMin5" value="" /><input type="hidden" id="FormBMax5" value="" />
<input type="hidden" id="YearId" value="<?php echo $_SESSION['PmsYId']; ?>" />
<input type="hidden" id="EmployeeId" value="<?php echo $EmployeeId; ?>" />
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
 <td style="background-image:url(images/pmsback.png);width:100%;">	 
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
<td align="center" valign="top"><img id="Img_hod" style="display:block;" src="images/hod.png" border="0"/></td>

<?php } if($_SESSION['BtnRev2']>0) { ?>
<td align="center" valign="top"><a href="Rev2HodPms.php?ee=1&rr2=0&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/RevHod1.png" border="0"/></a></td>	
		   
<?php } if($_SESSION['BtnHod']>0) { ?><td align="center" valign="top"><a href="RevHodPms.php?ee=1&rr2=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/m1.png" border="0"/></a></td><?php } ?>

<td><font class="msg_b"><i><?php echo $msg; ?></i></font><font class="formc"><span id="MsgSpan"></span></font></td>	 
	</tr>
   </table>
  </td>
 </tr>
 
 <tr><td style="vertical-align:top;width:100%;"><?php include("SetKraPmsmr.php"); ?></td></tr>
<!--  Head Parts Close Close Close  --> 
<!--  Head Parts Close Close Close  --> 
 
  <tr>
    <td style="width:100%;">
	  <table border="0" style="width:100%;">
	    <tr>
        <?php /****************************************** Form Start **************************/ ?> 
 		 <td id="TeamDetails" style="display:block;width:100%;">
		  <table border="0"style="width:100%;">
<tr>
 <td style="width:100%;">
  <table border="0" style="width:100%;">
   <tr>
    <td class="formh" style="width:150px;">(<i>My Team</i>) :&nbsp;</td>
    <td class="fhead" style="width:100px;">Department :</td>
    <td class="td1" style="width:150px;"><select class="tdsel" name="DeE" id="DeE" onChange="SelectDeptEmp(this.value,<?php echo $EmployeeId.','.$_SESSION['PmsYId'].', '.$CompanyId; ?>)"><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Department</option><?php $SqlDept=mysql_query("select HR_Curr_DepartmentId,DepartmentName from hrm_employee_pms pms inner join hrm_department d on pms.HR_Curr_DepartmentId=d.DepartmentId where AssessmentYear=".$_SESSION['PmsYId']." AND pms.CompanyId=".$CompanyId." AND Reviewer_EmployeeID=".$EmployeeId." group by HR_Curr_DepartmentId order by DepartmentName ASC"); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['HR_Curr_DepartmentId']; ?>"><?php echo $ResDept['DepartmentName'];?></option><?php } ?><option value="All">All</option></select></td>
	<td style="width:20px;"></td>
    
    <td class="fhead" style="width:50px;">State :</td>
    <td class="td1" style="width:150px;"><select class="tdsel" name="StE" id="StE" onChange="SelectStateEmp(this.value,<?php echo $EmployeeId.', '.$_SESSION['PmsYId'].', '.$CompanyId; ?>)"><option value="" selected>Select State</option><?php $SqlSt=mysql_query("select st.* from hrm_state st inner join hrm_headquater hq on st.StateId=hq.StateId inner join hrm_employee_general g on hq.HqId=g.HqId inner join hrm_employee_pms pms on g.EmployeeID=pms.EmployeeID where pms.Reviewer_EmployeeID=".$EmployeeId." AND hq.CompanyId=".$CompanyId." group by st.StateId order by StateName ASC"); while($ResSt=mysql_fetch_array($SqlSt)) { ?><option value="<?php echo $ResSt['StateId']; ?>"><?php echo $ResSt['StateName'];?></option><?php } ?><option value="All">All</option></select></td>
    <td style="width:20px;"></td>
    <td class="fhead" style="width:100px;">Head Quarter :</td>
    <td class="td1" style="width:150px;"><select class="tdsel" name="HQE" id="HQE" onChange="SelectHQEmp(this.value,<?php echo $EmployeeId.', '.$_SESSION['PmsYId'].', '.$CompanyId ?>)"><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Head Quarter</option><?php $SqlHQ=mysql_query("select hq.* from hrm_headquater hq inner join hrm_employee_general g on hq.HqId=g.HqId inner join hrm_employee_pms pms on g.EmployeeID=pms.EmployeeID where pms.Reviewer_EmployeeID=".$EmployeeId." AND hq.CompanyId=".$CompanyId." group by hq.HqId order by HqName ASC", $con); while($ResHQ=mysql_fetch_array($SqlHQ)) { ?><option value="<?php echo $ResHQ['HqId']; ?>"><?php echo $ResHQ['HqName'];?></option><?php } ?><option value="All">All</option></select>
    <input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
    <input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
    </td>
    <td>&nbsp;</td>
   </tr>
  </table>
 </td>
</tr>	   

<?php 
 $sL=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'",$con); 
 $rL=mysql_fetch_assoc($sL); 
 $sLemp=mysql_query("select * from hrm_pms_allow_letter where EmployeeID=".$EmployeeId,$con); 
 $rowLemp=mysql_num_rows($sLemp); $rLemp=mysql_fetch_assoc($sLemp); 
?> 

<tr>
 <td style="width:100%;">
  <table border="0" style="width:100%;">
   <tr>
   <?php //************************************************ Start ******************************// ?>
   <?php //************************************************ Start ******************************// ?>		
	<td style="width:100%;"><span id="MyTeamSpan"></span>
	<span id="MyTeam">
	<table border="1" id="table11" cellpadding="0" cellspacing="0" style="width:100%;">
	<div class="thead">
	<thead>
	 <tr bgcolor="#7a6189" style="height:25px;">
	  <td class="th" style="width:3%;"><b>Sn</b></td>
	  <td class="th" style="width:4%;"><b>EC</b></td>
	  <td class="th" style="width:20%;"><b>Name</b></td>
	  <td class="th" style="width:10%;"><b>Department</b></td>
	  
	 <?php if($rL['Show_GradeDesig']=='Y'){ ?>
	  <td class="th" style="width:20%;"><b>Designation</b></td>
	  <td class="th" style="width:4%;"><b>Grade</b></td>
	 <?php } ?> 
	  <td class="th" style="width:10%;"><b>Head Quater</b></td>
	  <!--<td class="th" style="width:10%;"><b>State</b></td>-->
	  <td class="th" style="width:15%;"><b>Appraiser</b></td>
	  <?php if($rL['ViewLeteer_rev']=='Y' && $rowLemp>0 && $rLemp['REV']=='1'){ ?>
	  <td class="th" style="width:5%;"><b>Appraisal<br>Letter</b></td>
	  <?php } ?>
<?php if($_SESSION['rEKform']=='Y'){ ?><td class="th" style="width:4%;"><b>KRA</b></td>
<?php }if($_SESSION['rEHform']=='Y'){ ?><td class="th" style="width:4%;"><b>History</b></td>
<?php }if($_SESSION['rEPform']=='Y'){ ?><td class="th" style="width:4%;"><b>Form</b></td><?php } ?>
     </tr>
	</thead>
	</div>
<?php 
if($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y')
{
$sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateName, EmpPmsId, Emp_PmsStatus, Appraiser_EmployeeID, Appraiser_PmsStatus from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_EmployeeID=".$EmployeeId, $con); 
}
elseif($_SESSION['eKraform']=='Y')
{
$sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateName, EmpPmsId, Emp_PmsStatus, Appraiser_EmployeeID, Appraiser_PmsStatus from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND p.AssessmentYear=".$_SESSION['KraYId']." AND p.Reviewer_EmployeeID=".$EmployeeId, $con);
}

$sno=1; while($res=mysql_fetch_array($sql)){ ?>
   
     <div class="tbody">
	 <tbody> 		
	  <tr style="height:22px;background-color:#FFFFFF;">
	   <td class="tdc"><?php echo $sno; ?></td>
	   <td class="tdc"><?php echo $res['EmpCode']; ?></td>
	   <td class="tdl">&nbsp;<?php echo strtoupper($res['Fname'].' '.$res['Sname'].' '.$res['Lname']); ?></td>
       <td class="tdl">&nbsp;<?php echo strtoupper($res['DepartmentCode']);?></td>
     
     <?php if($rL['Show_GradeDesig']=='Y'){ ?>
	   <td class="tdl">&nbsp;<?php echo strtoupper($res['DesigName']);?></td>
	   <td class="tdc"><?php echo $res['GradeValue'];?></td>
	 <?php } ?> 
	  
	   <td class="tdl">&nbsp;<?php echo strtoupper($res['HqName']);?></td>				
	   <?php /*?><td class="tdl">&nbsp;<?php echo strtoupper($res['StateName']);?></td><?php */?>
<?php $sql6=mysql_query("select * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'],$con);  
      $res6=mysql_fetch_assoc($sql6); ?>					
	   <td class="tdl">&nbsp;<?php echo $res6['Fname'].' '.$res6['Sname'].' '.$res6['Lname']; ?></td>
	   
<!-------------------------------------->
<!-------------------------------------->
<?php if($rL['ViewLeteer_rev']=='Y' && $rowLemp>0 && $rLemp['REV']=='1'){ ?>
<script type="text/javascript" language="javascript">
function LetterAllPdf(P,E,Y,C,R,G,D)
{window.open("pmsletter/VeiwAppAllPdf.php?action=All&test=true&rightform=false&cc=102&prp=55&rtr=%true%&ff=ok&P="+P+"&E="+E+"&Y="+Y+"&C="+C+"&R="+R+"&G="+G+"&D="+D+"&nn=1","AppLetter","scrollbars=yes,resizable=no,menubar=yes,width=820,height=750,location=no,directories=no");}
</script>
<?php $SqlP=mysql_query("select Hod_TotalFinalRating,Hod_EmpDesignation,Hod_EmpGrade,HR_CurrDesigId,HR_CurrGradeId,HR_DesigId,HR_GradeId from hrm_employee_pms where AssessmentYear=".$_SESSION['PmsYId']." AND EmployeeID=".$res['EmployeeID']." AND EmpPmsId=".$res['EmpPmsId'], $con); $ResP=mysql_fetch_assoc($SqlP);

if($ResP['HR_DesigId']>0){$qryD="DesigId=".$ResP['HR_DesigId'];}else{$qryD="DesigId=".$ResP['Hod_EmpDesignation'];}
if($ResP['HR_GradeId']>0){$qryG="GradeId=".$ResP['HR_GradeId'];}else{$qryG="GradeId=".$ResP['Hod_EmpGrade'];}

$sqlD=mysql_query("select DesigName,DesigId from hrm_designation where ".$qryD,$con); 
$sqlG=mysql_query("select GradeValue from hrm_grade where CompanyId=".$CompanyId." AND ".$qryG,$con);

//$sqlD=mysql_query("select DesigName,DesigId from hrm_designation where DesigId=".$ResP['Hod_EmpDesignation'],$con); 
//$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['Hod_EmpGrade']." AND CompanyId=".$CompanyId,$con);


$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['Hod_EmpGrade']." AND CompanyId=".$CompanyId,$con); $sqlDe=mysql_query("select DesigName,DesigId from hrm_designation where DesigId=".$ResP['HR_CurrDesigId'], $con);
$sqlGr=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['HR_CurrGradeId']." AND CompanyId=".$CompanyId,$con); $resD=mysql_fetch_assoc($sqlD); $resG=mysql_fetch_assoc($sqlG); $resGrade=mysql_fetch_assoc($sqlGrade);
$resDe=mysql_fetch_assoc($sqlDe); $resGr=mysql_fetch_assoc($sqlGr);

if($ResP['Hod_TotalFinalRating']>0){$EmpRating=$ResP['Hod_TotalFinalRating']; } else{$EmpRating=$ResP['Reviewer_TotalFinalRating']; }if($resG['GradeValue']==''){$EmpGrade=$resGr['GradeValue'];} else{$EmpGrade=$resG['GradeValue'];} if($resD['DesigId']==''){$Desig=$resDe['DesigId'];}else {$Desig=$resD['DesigId']; } ?>
<td class="tdc" style="text-align:center;"><a href="#" onClick="LetterAllPdf(<?php echo $res['EmpPmsId'].','.$res['EmployeeID'].','.$_SESSION['PmsYId'].','.$CompanyId.','.$EmpRating; ?>,'<?php echo $EmpGrade; ?>',<?php echo $Desig; ?>)"><img src="images/AppLet.png" style="width:80px;height:20px;" border="0"/></a></td>
<?php } ?>
<!-------------------------------------->
<!-------------------------------------->	   
	   	
<?php if($_SESSION['rEKform']=='Y'){ ?><td class="tdc"><a href="#" onClick="EmpKRA(<?php echo $CompanyId.', '.$_SESSION['PmsYId'].','.$res['EmployeeID']; ?>)">Click</a></td>
<?php } if($_SESSION['rEHform']=='Y'){ ?><td class="tdc"><a href="javascript:ReadHistory(<?php echo $res['EmployeeID']; ?>)">Click</a></td>
<?php } if($_SESSION['rEPform']=='Y'){ ?><td class="tdc"><?php if($res['Appraiser_PmsStatus']==2){?><a href="javascript:OpenWindow(<?php echo $res['EmpPmsId'].','.$CompanyId; ?>)">Click</a> <?php } ?></td>
<?php } ?>			
	   </tr>
	  </tbody>
	  </div>
<?php $sno++;} ?>		
		</table>
		</span>
	   </td>
   <?php //************************************************ Close ******************************// ?>
   <?php //************************************************ Close ******************************// ?>
	</tr>
  </table>
   </td>
 </tr>
          </table>
		</td>

<?php /****************************************** Form Close **************************/ ?> 	   
		</tr>
	  </table>
	</td>
   </tr>    
  </table>
 </td>
</tr>					
<?php //*************************************** Close ********************************************* ?>	
<?php //*************************************** Close ********************************************* ?>				
				  </table>
				 </td>
			  </tr>
			 
			   </form>
			</table>
           </td>
			  </tr>
	        </table>
		   </td>
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