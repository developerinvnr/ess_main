<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
/******************************************************************************/
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
  <?php  /*  <table class="menutable"><tr><td><?php //if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table> */ ?>
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
				    <tr><td colspan="5" style="font-size:14px;font-family:Georgia; width:1200px;" align="right" valign="top">
                     <a href="ChangePwd.php"><i><font color="#F5530E"><b>Change Password</b></font></i></a></a></td></tr>
<?php //*************************************************************** Start ******************************************************************************** ?>					
<tr>
 <td colspan="5" width="1200" style="background-image:url(images/pmsback.png); ">
 <?php $sqlSch=mysql_query("select * from hrm_pms_appdate where AssessmentYear=".$YearId." AND CompanyId=".$CompanyId, $con); 
      $resSch=mysql_fetch_assoc($sqlSch); $CuDate=date("Y-m-d");?>
  <table>
<?php //******************************************** ?>  
   <tr>
    <td width="1200">
	  <table>
	    <tr>
        <?php if($_SESSION['EmpType']=='E') {?> 
         <?php if($CuDate>=$resSch['EmpFromDate'] AND $CuDate<=$resSch['EmpToDate'] AND $resSch['EmpDateStatus']=='A') { ?>
		 <td align="center"><a href="Index.php?log=<?php echo $_SESSION['logCheckEmp']; ?>"><img id="Img_emp1" style="display:block;" src="images/emp1.png" border="0"/></a>
		   <img id="Img_emp" style="display:none;" src="images/emp.png" border="0"/></td>
        <?php } } ?>   
<?php $sqlApp=mysql_query("select Appraiser_EmployeeID from hrm_employee_pms where Appraiser_EmployeeID=".$EmployeeId, $con); $rowApp=mysql_num_rows($sqlApp); 
      if($rowApp>0) { ?>
      <?php if($CuDate>=$resSch['AppFromDate'] AND $CuDate<=$resSch['AppToDate'] AND $resSch['AppDateStatus']=='A') { ?>		   
		 <td align="center"><a href="ManagerPms.php"><img id="Img_manager1" style="display:block;" src="images/manager1.png" border="0"/></a>
		   <img id="Img_manager" style="display:none;" src="images/manager.png" border="0"/></td>
<?php } } $sqlRev=mysql_query("select Reviewer_EmployeeID from hrm_employee_pms where Reviewer_EmployeeID=".$EmployeeId, $con); $rowRev=mysql_num_rows($sqlRev); 
      if($rowRev>0) { ?>
      <?php if($CuDate>=$resSch['RevFromDate'] AND $CuDate<=$resSch['RevToDate'] AND $resSch['RevDateStatus']=='A') { ?>			   
		 <td align="center"><a href="HodPms.php"><img id="Img_hod1" style="display:block;" src="images/hod1.png" border="0"/></a>
		   <img id="Img_hod" style="display:none;" src="images/hod.png" border="0"/></td>
<?php } } $sqlHod=mysql_query("select HOD_EmployeeID from hrm_employee_pms where HOD_EmployeeID=".$EmployeeId, $con); $rowHod=mysql_num_rows($sqlHod); 
      if($rowHod>0) { ?>
	  <?php if($CuDate>=$resSch['HodFromDate'] AND $CuDate<=$resSch['HodToDate'] AND $resSch['HodDateStatus']=='A') { ?> 			   
		 <td align="center"><a href="RevHodPms.php"><img id="Img_hod1" style="display:none;" src="images/RevHod1.png" border="0"/></a>
		   <img id="Img_hod" style="display:block;" src="images/RevHod.png" border="0"/></td>					     
<?php } } ?>		
         <td style="width:50px;">&nbsp;</td>
		 <td style="width:300px;"><font color="#014E05" style='font-family:Times New Roman; font-weight:bold;' size="3"><span id="MsgSpan">&nbsp;<b><?php echo $msq; ?></b></span></font></td>	   
	  </table>
	</td>
   </tr>
    <tr>
    <td width="1200">
	   <table>
	    <tr> 
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:100px;">
		 <a href="Index.php?log=<?php echo $_SESSION['logCheckEmp']; ?>"><font color="#620000">Home</font></a></td>
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:100px;">
		 <a href="RevHodPms.php"><font color="#620000">Team Status</font></a></td>    			   
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:100px;">
		<?php if($CuDate>=$resSch['HodFromDate'] AND $CuDate<=$resSch['HodToDate'] AND $resSch['HodDateStatus']=='A') { ?> 	
         <a href="HodPmsScore.php"><font color="#620000">Score</font></td> 
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:100px;">	
         <a href="HodPmsIncrement.php"><font color="#FFFFFF">Increment</font></a><?php } ?></td>  			     			       
	  </table>
	</td>
   </tr>
   <tr>
    <td>
	  <table border="0">
	    <tr>
		 <td style="width:5px;">&nbsp;</td>
<?php /****************************************** Form Start **************************/ ?>
<?php /***************** Submitted **************************/ ?>		 
		 <td id="Submitted" style="width:1000px;display:block;">
<?php $sqlS=mysql_query("select EmployeeID,AppraiserFormAScore,RevFormAKra_Score,AppraiserFormBScore,RevFormBBehavi_Score from hrm_employee_pms where EmpPmsId=".$_REQUEST['b']); 
$resS=mysql_fetch_assoc($sqlS); ?>		 
		 
	  		   		   <table border="0">
 <tr>
  <td>
    <table border="0">
	<tr>
 <td colspan="6" style="font-family:Times New Roman; font-size:18px; font-weight:bold;"><font color="#00468C">(<i>Increment History</i>)</font><br></td>
 <?php $sqlEmp=mysql_query("select * from hrm_employee where EmployeeID=".$resS['EmployeeID']); $resEmp=mysql_fetch_assoc($sqlEmp); ?>
 <td style="font-family:Times New Roman; font-size:15px; font-weight:bold; width:600px;" align="center">
 <input type="hidden" id="EmpId" name="EmpId" value="<?php echo $Id; ?>" />
 EmpCode :
 <font color="#EFFA1B"><?php echo $resEmp['EmpCode'].'</font> &nbsp;/&nbsp;Name : <font color="#EFFA1B">'.$resEmp['Fname'].' '.$resEmp['Sname'].' '.$resEmp['Lname']; ?></font>
 </td>
 <td style="width:80px;"></td>
   </tr>
  </table>
  </td>
 </tr>	   
 <tr>
   <td style="width:900px;">
     <table border="0">
	  <tr>
	  <?php //************************************************ Start ******************************// ?>
	   <td style="width:1000px;" id="EmpAppInc" style="display:block;">
		<table border="0">
		 <tr>
 <td id="Increment" style="width:1000px;">
   <table>
      <tr bgcolor="#EEF0AA">	   
	  <td align="center" style="width:40px; font-size:11px;font-weight:bold;">SNo.</td>
	  <td align="center" style="width:100px;font-size:11px;font-weight:bold;">Year</td>
	  <td align="center" style="width:120px;font-size:11px;font-weight:bold;">Department</td>  
	  <td align="center" style="width:100px;font-size:11px;font-weight:bold;">Designation</td>
	  <td align="center" style="width:50px;font-size:11px;font-weight:bold;">Grade</td>
	  <td align="center" style="width:50px;font-size:11px;font-weight:bold;">Score</td>
	  <td align="center" style="width:50px;font-size:11px;font-weight:bold;">Rating</td>
	  <td align="center" style="width:100px;font-size:11px;font-weight:bold;">Monthaly Gross</td>
      <td align="center" style="width:100px;font-size:11px;font-weight:bold;">Increment(%) Gross PM</td>
	  <td align="center" style="width:100px;font-size:11px;font-weight:bold;">Annual Gross</td>
      <td align="center" style="width:100px;font-size:11px;font-weight:bold;">Annual CTC</td>
 </tr>
<?php $sql=mysql_query("select * from hrm_employee_pms where EmployeeID=".$_REQUEST['a']." AND HR_PmsStatus=2 order by AssessmentYear ASC"); 
      $Sno=1; while($res=mysql_fetch_array($sql)){ ?>		      
<tr bgcolor="#FFFFFF"> 	   
	  <td align="center" class="font" style="width:40px;font-size:11px;" valign="top"><?php echo $Sno; ?></td>
<?php $sqlY=mysql_query("select FromDate from hrm_year where YearId=".$res['AssessmentYear']); $resY=mysql_fetch_array($sqlY);?>      
	  <td align="" style="width:100px;font-size:11px;" valign="top"><?php echo date("Y",strtotime($resY['FromDate']));?></td>
<?php $sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$res['AfterPms_DepartmentId']); 
      $resD=mysql_fetch_array($sqlD);?>              
	  <td align="" style="width:120px;font-size:11px;" valign="top"><?php echo $resD['DepartmentName'];?></td> 
<?php $sqlDe=mysql_query("select DesigName from hrm_designation where DesigId=".$res['AfterPms_DesigId']); 
      $resDe=mysql_fetch_array($sqlDe);?>          
	  <td align="center" style="width:100px;font-size:11px;" valign="top"><?php echo $resDe['DesigName'];?></td>
<?php $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['AfterPms_GradeId']); 
      $resG=mysql_fetch_array($sqlG);?>
      <td align="center" style="width:50px;font-size:11px;" valign="top"><?php echo $resG['GradeValue'];?></td>     
	  <td align="center" style="width:50px;font-size:11px;" valign="top"><?php echo $res['HR_OverAllFinalScore'];?></td>
	  <td align="center" style="width:50px;font-size:11px;" valign="top"><?php echo $res['HR_OverAllFinalRating'];?></td>
	  <td align="center" style="width:100px;font-size:11px;" valign="top"><?php echo $res['AfterPms_GrossMonthlySalary'];?></td>
	  <td align="center" style="width:100px;font-size:11px;" valign="top"><?php echo $res['NetMonPercent_IncrementSalary'];?></td>
	  <td align="" style="width:150px;font-size:11px;" valign="top"><?php echo $res['AfterPms_GrossAnnualSalary'];?></td>
      <td align="center" style="width:100px;font-size:11px;" valign="top"><?php echo $res['AfterPms_CTC'];?></td>
 </tr>
 <?php $Sno++;} ?>
 <tr><td colspan="7">&nbsp;</td></tr>
   </table>
 </td>   
</tr>
<?php //************************************************************************************************// ?>
		</table>
		</span>
	   </td>
       </td>
      <?php //************************************************ Close ******************************// ?>	  	   
	  
	</tr>
  </table>
   </td>
 </tr>
          </table>
		 
		   
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

