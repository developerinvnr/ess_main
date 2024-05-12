<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
include("SetKraPmsy.php");
/******************************************************************************/
if($_REQUEST['action']=='r' && $_REQUEST['e']!="" && $_REQUEST['y']!=""){ 
$sqlR=mysql_query("update hrm_pms_kra set UseKRA='R', RevStatus='P', HodStatus='R' where YearId=".$_REQUEST['y']." AND EmployeeID=".$_REQUEST['e'], $con);
if($sqlR){$msg='Reviewer Resend Successfully!';} }
?>

<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style>.font {color:#000; font-family:Times New Roman; font-size:15px; font-weight:bold;} 
.Input{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;} .font1 { font-family:Georgia; font-size:11px; height:14px; } .font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function SelectHQEmp(value1,value2){ 
    document.getElementById('MyTeam').style.display='none'; var YI=document.getElementById('YearId').value;
	var url = 'HodHQEmp.php';	var pars = 'HQid='+value1+'&EmpId='+value2+'&YI='+YI;	var myAjax = new Ajax.Request(
	url, { 	method: 'post', parameters: pars, onComplete: show_HQEmp });
} 

function show_HQEmp(originalRequest)
{ document.getElementById('MyTeamSpan').innerHTML = originalRequest.responseText; }



function SelectStateEmp(value1,value2){ 
    document.getElementById('MyTeam').style.display='none'; var YI=document.getElementById('YearId').value;
	var url = 'HodStateEmp.php';	var pars = 'StHQid='+value1+'&EmpId='+value2+'&YI='+YI;	var myAjax = new Ajax.Request(
	url, { 	method: 'post', parameters: pars, onComplete: show_HQEmp });
} 

function show_HQEmp(originalRequest)
{ document.getElementById('MyTeamSpan').innerHTML = originalRequest.responseText; }

function OpenWindow(v,v1)
{window.open("HodScoreHistory.php?a="+v+"&b="+v1,"AppraisalForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1100,height=650");}



function UploadEmpfile(p,e)
{y=document.getElementById("YearId").value; 
 window.open("CheckUploadAppFile.php?action=up&P="+p+"&E="+e+"&Y="+y,"UploadFile","menubar=no,scrollbars=yes,resizable='no',width=600,height=400");} 

 

function ResentReason(p,e)
{y=document.getElementById("YearId").value; 
 window.open("ResentReason.php?action=Sent&P="+p+"&E="+e+"&Y="+y,"ResentReasonFile","menubar=no,scrollbars=yes,resizable='no',width=850,height=400");}


function ResentKRA(E,yi)
{ var agree=confirm("Are you sure you want to resend KRA form to Reviewer?");
  if (agree) { window.location='HodFinalEmpkra.php?action=r&e='+E+'&y='+yi+'&ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=0&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1'; } 
  else {return false;}
}

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
<?php //**************************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top">&nbsp;</td>
				 <td width="1250" valign="top">
				  <table border="0">
<?php //*************************************** Start ********************************************* ?>					
<tr>
 <td colspan="5" width="1200" style="background-image:url(images/pmsback.png); ">	 
 <table>
 <tr>
  <td>
<?php include("SetKraPmsmh.php"); ?>  
  </td>
 </tr>
  <tr>
    <td>
	  <table border="0">
	    <tr>
		 <td style="width:5px;">&nbsp;</td>
<?php /****************************************** Form Start **************************/ ?>
<input type="hidden" id="FormAMin5" value="" /><input type="hidden" id="FormAMax5" value="" />
<input type="hidden" id="FormBMin5" value="" /><input type="hidden" id="FormBMax5" value="" />
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
<input type="hidden" id="EmployeeId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="EmpId" value="" /> <input type="hidden" id="PmsId" value="" />	
<?php /***************** PersonalDetails **************************/ ?>			 
		 <td id="PersonalDetails" style="width:1250px;display:block;">		 	 
		   <table border="0">
 <tr>
  <td>
    <table border="0">

	<tr>	
 <td colspan="6" style="font-family:Times New Roman; font-size:18px; font-weight:bold;width:200px;"><font color="#00468C"><i>My Team KRA Status</i></font><br></td>
 <td>&nbsp;</td>
 <?php if($resKey['TeamStatus']=='Y') { ?>		 
 <td class="td1" style="font-family:Times New Roman; font-size:15px; width:150px; font-weight:bold;"> 
<select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="HQE" id="HQE" onChange="SelectHQEmp(this.value,<?php echo $EmployeeId; ?>)"><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>HEAD QUARTER</option><?php $SqlHQ=mysql_query("select * from hrm_headquater where CompanyId=".$CompanyId." order by HqName ASC", $con); while($ResHQ=mysql_fetch_array($SqlHQ)) { ?><option value="<?php echo $ResHQ['HqId']; ?>"><?php echo '&nbsp;'.$ResHQ['HqName'];?></option><?php } ?>
   <option value="All">&nbsp;All</option>
   </select>
   <input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
   <input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
 </td>
 <td>&nbsp;</td>
 <td class="td1" style="font-family:Times New Roman; font-size:15px; width:150px; font-weight:bold;"> 
   <select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="StE" id="StE" onChange="SelectStateEmp(this.value,<?php echo $EmployeeId; ?>)"><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>STATE</option><?php $SqlSt=mysql_query("select * from hrm_state order by StateName ASC", $con); while($ResSt=mysql_fetch_array($SqlSt)) { ?><option value="<?php echo $ResSt['StateId']; ?>"><?php echo '&nbsp;'.$ResSt['StateName'];?></option><?php } ?>
   <option value="All">&nbsp;All</option>
   </select>
 </td>		       
<?php } ?>
 <td>&nbsp;</td>
 <td style="width:280px;font-family:Times New Roman;font-weight:bold;color:#014E05;" size="3"><span id="MsgSpan">&nbsp;<b><?php echo $msg; ?></b></span></td>	  
 
 <td class="td1" style="font-family:Times New Roman; font-size:15px; width:10px; font-weight:bold;" align="right"><span id="StateInc"></span></td>
 <td style="width:100px;"></td>
 <?php if($resKey['KRAForm']=='Y') { ?>
 <td align="right" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:200px;" valign="top">
 <img src="images/go-back-icon.png" border="0"/>&nbsp; Resent
 &nbsp;&nbsp;&nbsp;&nbsp;
 <script>function FunLog(){ window.open("viewlogic.php", "F", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1000,height=500");}</script>	  
 <input type="button" style="width:90px;background-color:#99CC00;font-weight:bold;" value="Logic" onClick="FunLog()"/>
 </td>
 <?php } ?>
 
   </tr>

  </table>
  </td>
 </tr>	  

 <tr>
   <td style="width:1250px;">
     <table border="0">
	  <tr>
	  <?php //************************************************ Start ******************************// ?>
	   <td style="width:1250px;" id="" style="display:block;">
       <span id="MyTeamSpan"></span>	   
	   <span id="MyTeam">
		<table border="">
		 <tr bgcolor="#7a6189" style="height:20px;" valign="middle">
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:40px;"><b>SNo.</b></td>
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>EC</b></td>
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:220px;"><b>Name</b></td>
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>Department</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:250px;"><b>Designation</b></td>
<?php /*
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:60px;"><b>History</b></td>
*/ ?>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>HQ</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:120px;"><b>State</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>Employee</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>Appraiser</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>Reviewer</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>KRA</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>Action</b></td>
		 </tr>
<?php
$sql=mysql_query("select hrm_employee.*,EmpPmsId,DepartmentId,DesigId,DesigId2,HqId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$resSYP['CurrY']." AND hrm_employee_pms.HOD_EmployeeID=".$EmployeeId, $con); $sno=1; while($res=mysql_fetch_array($sql)){ ?>     		
		<tr bgcolor="#FFFFFF" style="height:20px;" valign="middle">
	        <td align="center" style="font:Georgia; font-size:11px; width:30px;"><?php echo $sno; ?></td>
	        <td align="center" style="font:Georgia; font-size:11px; width:80px;"><?php echo $res['EmpCode']; ?></td>
	        <td align="" style="font:Georgia; font-size:11px; width:250px;">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
<?php $sql2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); 
      $res2=mysql_fetch_assoc($sql2);?><td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;<?php echo $res2['DepartmentCode'];?></td>
<?php $sql31=mysql_query("select DesigName from hrm_designation where DesigId=".$res['DesigId']." OR DesigId=".$res['DesigId2'], $con); 
      $res31=mysql_fetch_assoc($sql31);?>	  
	  <td align="" style="font:Georgia; font-size:11px; width:200px;">&nbsp;<?php echo $res31['DesigName'];?></td>
<?php /*
	  <td align="center" style="font:Georgia; font-size:11px; width:60px;"><a href="javascript:ReadHistory(<?php echo $res['EmployeeID']; ?>)">Click</a></td>
*/ ?>
<?php $sql4=mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'], $con); 
      $res4=mysql_fetch_assoc($sql4);?>				
	  <td align="" style="font:Georgia; font-size:11px; width:150px;">&nbsp;<?php echo $res4['HqName'];?></td>
<?php $sql5=mysql_query("select StateName from hrm_state INNER JOIN hrm_headquater ON hrm_state.StateId=hrm_headquater.StateId where hrm_headquater.HqId=".$res['HqId'], $con); 
      $res5=mysql_fetch_assoc($sql5);?>				
			<td align="" style="font:Georgia; font-size:11px; width:120px;">&nbsp;<?php echo $res5['StateName'];?></td>
<?php $sql3E=mysql_query("select EmpStatus from hrm_pms_kra where YearId=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID'], $con); $row3E=mysql_num_rows($sql3E); 
      if($row3E==0){ $stE='Draft'; $stA='Draft'; $stR='Draft';} 
	  if($row3E>0){ $res3E=mysql_fetch_assoc($sql3E);
	  if($res3E['EmpStatus']=='D'){$stE='Draft';} if($res3E['EmpStatus']=='P'){$stE='Pending';} if($res3E['EmpStatus']=='A'){$stE='Submitted';}
} ?>		
			<td align="center" style="font:Georgia; font-size:11px; width:90px; color:<?php if($stE=='Draft') {echo '#A40000'; }if($stE=='Pending') {echo '#36006C'; }if($stE=='Submitted') {echo '#005300'; }?>;" ><?php echo $stE;?></td>
<?php $sql3A=mysql_query("select AppStatus from hrm_pms_kra where YearId=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID'], $con); $row3A=mysql_num_rows($sql3A); 
      if($row3A==0){ $stE='Draft'; $stA='Draft'; $stR='Draft';} 
	  if($row3A>0){ $res3A=mysql_fetch_assoc($sql3A);	   
if($res3A['AppStatus']=='D'){$stA='Draft';} if($res3A['AppStatus']=='P'){$stA='Pending';} if($res3A['AppStatus']=='A'){$stA='Approved';} if($res3A['AppStatus']=='R'){$stA='Resent';}  	
 } ?>				
			<td align="center" style="font:Georgia; font-size:11px; width:90px;color:<?php if($stA=='Draft') {echo '#A40000'; }if($stA=='Pending') {echo '#36006C'; }if($stA=='Approved') {echo '#005300'; } ?>;"><?php echo $stA;?></td>
<?php $sql3R=mysql_query("select RevStatus from hrm_pms_kra where YearId=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID'], $con); $row3R=mysql_num_rows($sql3R); 
      if($row3R==0){ $stE='Draft'; $stA='Draft'; $stR='Draft';} 
	  if($row3R>0){ $res3R=mysql_fetch_assoc($sql3R);	   	
if($res3R['RevStatus']=='D'){$stR='Draft';} if($res3R['RevStatus']=='P'){$stR='Pending';} if($res3R['RevStatus']=='A'){$stR='Approved';} if($res3R['RevStatus']=='R'){$stR='Resent';}
 } ?>					
			<td align="center" style="font:Georgia; font-size:11px; width:90px;color:<?php if($stR=='Draft') {echo '#A40000'; }if($stR=='Pending') {echo '#36006C'; }if($stR=='Approved') {echo '#005300'; } ?>;"><?php echo $stR;?></td>
			<td align="center" style="font:Georgia; font-size:11px; width:80px;">
<?php $sqlShow=mysql_query("select UseKRA from hrm_pms_kra where YearId=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID'], $con);  $resShow=mysql_fetch_assoc($sqlShow);	   	
      if($resShow['UseKRA']=='A' OR $resShow['UseKRA']=='H' OR $resShow['UseKRA']=='R') {?>
			<a href="#" onClick="javascript:window.location='HodCheckNewKRA.php?e=<?php echo $res['EmployeeID']; ?>&yi=<?php echo $resSY['CurrY']; ?>&ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=0&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1'">Click</a>
			<?php } ?>
			</td>
			<td align="center" style="font:Georgia; font-size:11px; width:80px;">
<?php $sqlShow2=mysql_query("select UseKRA from hrm_pms_kra where YearId=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID'], $con);  $resShow2=mysql_fetch_assoc($sqlShow2);	   	
      if($resShow2['UseKRA']=='H') {?>
			<a href="#"><img src="images/go-back-icon.png" border="0" onClick="return ResentKRA(<?php echo $res['EmployeeID'].', '.$resSY['CurrY'];?>)"/></a>
			<?php } ?>
			</td>
		 </tr>
<?php $sno++;} ?>				</table>
		</span>
	   </td>
      <?php //************************************************ Close ******************************// ?>	  	   

	 
	</tr>

  </table>

   </td>

 </tr>

          </table>

		</td>

		   

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

			     <td align="Right" class="fontButton" width="1200">

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



