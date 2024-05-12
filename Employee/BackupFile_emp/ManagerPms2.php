<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
$sqlSY=mysql_query("select OldY,CurrY,NewY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='KRA'", $con); $resSY=mysql_fetch_array($sqlSY); 
$sqlSYP=mysql_query("select OldY,CurrY,NewY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'", $con); $resSYP=mysql_fetch_array($sqlSYP); 
//echo $resSY['OldY'].'-'.$resSY['CurrY'].'-'.$resSY['NewY'].'-'.$resSYP['OldY'].'-'.$resSYP['CurrY'].'-'.$resSYP['NewY'];
/******************************************************************************/
$SD=mysql_query("select DepartmentId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $RD=mysql_fetch_assoc($SD);
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
<style>.font {color:#000; font-family:Times New Roman; font-size:15px; font-weight:bold;} 
.Input{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;} .font1 { font-family:Georgia; font-size:11px; height:14px; } .font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function SelectHQEmp(value1,value2,YI){ 
    document.getElementById('MyTeam').style.display='none'; 
	var url = 'AppHQEmp.php';	var pars = 'HQid='+value1+'&EmpId='+value2+'&YI='+YI;	var myAjax = new Ajax.Request(
	url, { 	method: 'post', parameters: pars, onComplete: show_HQEmp });
} 
function show_HQEmp(originalRequest)
{ document.getElementById('MyTeamSpan').innerHTML = originalRequest.responseText; }

function SelectStateEmp(value1,value2,YI){ 
    document.getElementById('MyTeam').style.display='none'; 
	var url = 'AppStateEmp.php';	var pars = 'StHQid='+value1+'&EmpId='+value2+'&YI='+YI;	var myAjax = new Ajax.Request(
	url, { 	method: 'post', parameters: pars, onComplete: show_HQEmp });
} 
function show_HQEmp(originalRequest)
{ document.getElementById('MyTeamSpan').innerHTML = originalRequest.responseText; }

function ReadHistory(EI)
{window.open("EmpHistory.php?EI="+EI,"HForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=920,height=600");}

function EmpKRA(CId,YId,EmpId) 
{ window.open ("EmpKraForm.php?YId="+YId+"&EmpId="+EmpId+"&CId="+CId,"KRAForm","menubar=yes,scrollbars=yes,resizable=1,width=1100,height=500");}

function OpenWindow(v)
{window.open("MgrEmpHistory.php?a="+v,"AppraisalForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=650");}


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
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
<?php //*************************************************************************************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top">&nbsp;</td>
				 <td width="1200" valign="top">
				  <table border="0">
<?php //*************************************************************** Start ******************************************************************************** ?>					
<tr>
 <td colspan="5" style="width:1200px;background-image:url(images/pmsback.png);">
 <?php $sqlKey=mysql_query("select * from hrm_pms_key where Person='app' AND CompanyId=".$CompanyId, $con); $resKey=mysql_fetch_assoc($sqlKey);  
       $sqlSch=mysql_query("select * from hrm_pms_appdate where AssessmentYear=".$resSYP['CurrY']." AND CompanyId=".$CompanyId, $con); 
       $resSch=mysql_fetch_assoc($sqlSch); $CuDate=date("Y-m-d"); ?> 
  <table>
<?php //******************************************** ?>  
   <tr>
    <td width="1200">
	  <table>
	    <tr>
        <?php if($_SESSION['EmpType']=='E') {?> 
		 <td align="center"><a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>"><img id="Img_emp1" style="display:block;" src="images/emp1.png" border="0"/></a>
		   <img id="Img_emp" style="display:none;" src="images/emp.png" border="0"/></td>  
<?php } $sqlApp=mysql_query("select Appraiser_EmployeeID from hrm_employee_pms where AssessmentYear=".$resSYP['CurrY']." AND Appraiser_EmployeeID=".$EmployeeId, $con); $rowApp=mysql_num_rows($sqlApp); 
      if($rowApp>0) { ?>		   
		 <td align="center"><a href="ManagerPms.php"><img id="Img_manager1" style="display:none;" src="images/manager1.png" border="0"/></a>
		   <img id="Img_manager" style="display:block;" src="images/manager.png" border="0"/></td>
<?php } $sqlRev=mysql_query("select Reviewer_EmployeeID from hrm_employee_pms where AssessmentYear=".$resSYP['CurrY']." AND Reviewer_EmployeeID=".$EmployeeId, $con); $rowRev=mysql_num_rows($sqlRev); 
      if($rowRev>0) { ?>		   
		 <td align="center"><a href="HodPms.php"><img id="Img_hod1" style="display:block;" src="images/hod1.png" border="0"/></a>
		   <img id="Img_hod" style="display:none;" src="images/hod.png" border="0"/></td>
<?php }  $sqlHod=mysql_query("select HOD_EmployeeID from hrm_employee_pms where AssessmentYear=".$resSYP['CurrY']." AND HOD_EmployeeID=".$EmployeeId, $con); $rowHod=mysql_num_rows($sqlHod); 
      if($rowHod>0) { ?> 			   
		 <td align="center"><a href="RevHodPms.php"><img id="Img_hod1" style="display:block;" src="images/RevHod1.png" border="0"/></a>
		   <img id="Img_hod" style="display:none;" src="images/RevHod.png" border="0"/></td>		     
<?php } ?>	

         <td style="width:50px;">&nbsp;</td>
		 <td style="width:300px;"><font color="#014E05" style='font-family:Times New Roman;' size="4"><b><i><span id="MsgSpan"></span></i><?php echo $msq; ?></b></font></td>	   
	  </table>
	</td>
   </tr>
    <tr>
    <td width="1200">
	  <table>
	    <tr>
         <?php if($resKey['Home']=='Y') { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold; width:80px;">
		 <a href="Indexpms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>"><img src="images/Home.png" border="0" /></a></td><?php } ?>    
		 <?php if($resKey['MyTeam']=='Y') { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;">
		 <a href="ManagerPms.php"><img src="images/MyTeam.png" border="0" /></a></td><?php } ?>    			   
		 <?php if($resKey['TeamStatus']=='Y') { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;">
<?php $sqlCh = mysql_query("select * from hrm_pms_allow where Appraiser_EmployeeID=".$EmployeeId." AND CompanyId=".$CompanyId." AND AssesmentYear=".$resSYP['CurrY'], $con); 
	  $sqlCh2  = mysql_query("select EmpPmsId from hrm_employee_pms where Appraiser_PmsStatus=1 AND Reviewer_PmsStatus=3 AND Appraiser_EmployeeID=".$EmployeeId." AND CompanyId=".$CompanyId." AND AssessmentYear=".$YearId, $con); $rowCh=mysql_num_rows($sqlCh); $rowCh2=mysql_num_rows($sqlCh2);
	  if(($CuDate>=$resSch['AppFromDate'] AND $CuDate<=$resSch['AppToDate'] AND $resSch['AppDateStatus']=='A') OR $rowCh>0 OR ($CuDate>$resSch['AppToDate'] AND $rowCh2>0)) { ?> 
         <a href="ManagerTeamStatus.php?action=teamS"><img src="images/TeamStatus1.png" border="0" /></a><?php } ?></td><?php } ?> 
		 
	    <?php if($resKey['RatingGraph']=='Y') { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;">
         <a href="ManagerRatingGraph.php"><img src="images/ratinggraph1.png" border="0" /></a></td><?php } ?>
		 <?php if($resKey['KRAForm']=='Y') { ?>
<?php $sqlChK = mysql_query("select * from hrm_pms_allowkra where Appraiser_EmployeeID=".$EmployeeId." AND CompanyId=".$CompanyId." AND AssesmentYear=".$resSY['CurrY'], $con); 
	  $sqlCh2K  = mysql_query("select KRAId from hrm_pms_kra INNER JOIN hrm_employee_pms ON hrm_pms_kra.EmployeeID=hrm_employee_pms.EmployeeID where hrm_pms_kra.AppStatus='P' AND hrm_pms_kra.RevStatus='R' AND hrm_employee_pms.Appraiser_EmployeeID=".$EmployeeId." AND hrm_pms_kra.CompanyId=".$CompanyId." AND hrm_pms_kra.YearId=".$resSY['CurrY'], $con); 
	  $rowChK=mysql_num_rows($sqlChK); $rowCh2K=mysql_num_rows($sqlCh2K);
	  if(($CuDate>=$resSch['AppFromDate'] AND $CuDate<=$resSch['AppToDate'] AND $resSch['AppDateStatus']=='A') OR $rowChK>0 OR ($CuDate>$resSch['AppToDate'] AND $rowCh2K>0)) { ?>		
         <td style="font-family:Times New Roman;width:180px; font-size:14px; font-weight:bold;" valign="middle">
         <a href="AppCheckNewKRA.php"/><img src="images/KraYearMyTeam1.png" border="0"/></a> </td><?php } } ?>
		 <td style="width:20px;">&nbsp;</td>
		 <td style="font-family:Times New Roman; font-size:16px; font-weight:bold;width:400px; color:#E10000;" >
		  <?php if($CuDate>=$resSch['AppFromDate'] AND $CuDate<=$resSch['AppToDate'] AND $resSch['AppDateStatus']=='A') { 
		  $LastDate=$resSch['AppToDate']; $CurrentDate=date("Y-m-d");
		  $diff = abs(strtotime($LastDate) - strtotime($CurrentDate));
          //$years = floor($diff / (365*60*60*24));
          //$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
          $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); ?>
		  <b><blink><?php echo $days; ?> Days Remaining! Last date : 
		  <font color="#5B0000"><?php echo date("d-F",strtotime($resSch['AppToDate'])); ?></font></blink></b><?php } ?>
		 </td> 	   			       
	  </table>
	</td>
   </tr>

   <tr>
    <td>
	  <table border="0">
	    <tr>
		 <td style="width:5px;">&nbsp;</td>
<?php /****************************************** Form Start **************************/ ?>	 
		 <td id="PersonalDetails" style="width:1000px;display:block;">
		   <table border="0">
 <tr>
  <td>
    <table border="0">
	<tr>
 <td colspan="6" style="font-family:Times New Roman; font-size:18px; font-weight:bold;width:150px;"><font color="#00468C">(<i>My Team</i>)</font><br></td>
 <td style="width:20px;"></td>
 <td class="td1" style="font-family:Times New Roman; font-size:15px; width:150px; font-weight:bold;" align="right">Head Quarter :</td>
 <td class="td1" style="font-family:Times New Roman; font-size:15px; width:200px; font-weight:bold;"> 
   <select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="HQE" id="HQE" onChange="SelectHQEmp(this.value,<?php echo $EmployeeId.', '.$resSYP['CurrY']; ?>)"><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Head Quarter</option><?php $SqlHQ=mysql_query("select * from hrm_headquater where CompanyId=".$CompanyId." order by HqName ASC", $con); while($ResHQ=mysql_fetch_array($SqlHQ)) { ?><option value="<?php echo $ResHQ['HqId']; ?>"><?php echo '&nbsp;'.$ResHQ['HqName'];?></option><?php } ?>
   <option value="All">&nbsp;All</option>
   </select>
 </td>
 <td>&nbsp;</td>
 <td class="td1" style="font-family:Times New Roman; font-size:15px; width:50px; font-weight:bold;" align="right">State :</td>
 <td class="td1" style="font-family:Times New Roman; font-size:15px; width:200px; font-weight:bold;"> 
   <select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="StE" id="StE" onChange="SelectStateEmp(this.value,<?php echo $EmployeeId.', '.$resSYP['CurrY']; ?>)"><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>State</option><?php $SqlSt=mysql_query("select * from hrm_state order by StateName ASC"); while($ResSt=mysql_fetch_array($SqlSt)) { ?><option value="<?php echo $ResSt['StateId']; ?>"><?php echo '&nbsp;'.$ResSt['StateName'];?></option><?php } ?>
   <option value="All">&nbsp;All</option>
   </select>
 </td>
   </tr>
  </table>
  </td>
 </tr>	   
 <tr>
   <td style="width:1100px;">
     <table border="0">
	  <tr>
	  <?php //************************************************ Start ******************************// ?>
	   <td style="width:1100px;" id="" style="display:block;">
       <span id="MyTeamSpan"></span>	   
	   <span id="MyTeam">
		<table border="">
		 <tr bgcolor="#7a6189" style="height:20px;" valign="middle">
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>SN</b></td>
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>EC</b></td>
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:300px;"><b>Name</b></td>
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:150px;"><b>Department</b></td>
		<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:250px;"><b>Designation</b></td>
                <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>Grade</b></td>
		<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:60px;"><b>KRA</b></td>
   <?php /* <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:60px;"><b>History</b></td> 
			
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:60px;"><b>Appraisal Form</b></td> */ ?>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:150px;"><b>Head Quater</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:150px;"><b>State</b></td>
		 </tr>
<?php //$Y=$YearId;  //if($CompanyId==2){$Y=$YearId;} if($CompanyId==1){$Y=2;}?>	
<?php 
$sql=mysql_query("select hrm_employee.*,DepartmentId,HR_CurrDesigId,HR_CurrGradeId,DesigId,DesigId2,GradeId,HqId,EmpPmsId,Emp_PmsStatus from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$resSYP['CurrY']." AND hrm_employee_pms.Appraiser_EmployeeID=".$EmployeeId, $con); $sno=1; while($res=mysql_fetch_array($sql)){ ?>     		
		<tr bgcolor="#FFFFFF" style="height:20px;" valign="middle">
	        <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $sno; ?></td>
	        <td align="center" style="font:Georgia; font-size:11px; width:80px;"><?php echo $res['EmpCode']; ?></td>
	        <td align="" style="font:Georgia; font-size:11px; width:300px;">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
<?php $sql2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); 
      $res2=mysql_fetch_assoc($sql2);?><td align="" style="font:Georgia; font-size:11px; width:150px;">&nbsp;<?php echo $res2['DepartmentCode'];?></td>
<?php $sql3=mysql_query("select DesigName from hrm_designation where DesigId=".$res['HR_CurrDesigId']." OR DesigId=".$res['DesigId2'], $con); 
      $res3=mysql_fetch_assoc($sql3);?>			
			<td align="" style="font:Georgia; font-size:11px; width:250px;">&nbsp;<?php echo $res3['DesigName'];?></td>
<?php $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con);  $resG=mysql_fetch_assoc($sqlG);?>						
			<td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $resG['GradeValue'];?></td>
			<td align="center" style="font:Georgia; font-size:11px; width:60px;">		
<?php $sqlShow=mysql_query("select UseKRA from hrm_pms_kra where YearId=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID'], $con);  $resShow=mysql_fetch_assoc($sqlShow);	   	
      if($resShow['UseKRA']=='A' OR $resShow['UseKRA']=='H' OR $resShow['UseKRA']=='R') {?>
			<a href="#" onClick="EmpKRA(<?php echo $CompanyId.', '.$resSY['CurrY'].','.$res['EmployeeID']; ?>)">Click</a>
<?php } ?></td>
			
<?php /*	<td align="center" style="font:Georgia; font-size:11px; width:60px;"><a href="javascript:ReadHistory(<?php echo $res['EmployeeID']; ?>)">Click</a></td> 
			<td align="center" style="font:Georgia; font-size:11px; width:60px;">
			<?php if($res['Emp_PmsStatus']==2) { ?><a href="javascript:OpenWindow(<?php echo $res['EmpPmsId']; ?>)">Click</a> <?php }?></td> */ ?>
<?php $sql4=mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'], $con); 
      $res4=mysql_fetch_assoc($sql4);?>				
			<td align="" style="font:Georgia; font-size:11px; width:150px;">&nbsp;<?php echo $res4['HqName'];?></td>
<?php $sql5=mysql_query("select StateName from hrm_state INNER JOIN hrm_headquater ON hrm_state.StateId=hrm_headquater.StateId where hrm_headquater.HqId=".$res['HqId'], $con); 
      $res5=mysql_fetch_assoc($sql5);?>				
			<td align="" style="font:Georgia; font-size:11px; width:150px;">&nbsp;<?php echo $res5['StateName'];?></td>
		 </tr>
<?php $sno++;} ?>		
		</table>
		</span>
	   </td>
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
<?php //******************************************** ?>    
  </table>
 </td>
</tr>					
<?php //*************************************************************** Close ******************************************************************************** ?>					
				  </table>
				 </td>
			  </tr>
			  <tr>
			     <td>&nbsp;</td>
			     <td align="Right" class="fontButton" width="550">
				   </td>
		      </tr>
			   </form>
			</table>
           </td>
			  </tr>
	        </table>

<?php //*************************************************************************************************************************************************** ?>
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



