<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
include("SetKraPmsy.php");

/*
if($_REQUEST['action']=='r' && $_REQUEST['e']!="" && $_REQUEST['y']!=""){ 
$sqlR=mysql_query("update hrm_pms_kra set UseKRA='R', RevStatus='P', HodStatus='R' where YearId=".$_REQUEST['y']." AND EmployeeID=".$_REQUEST['e'], $con);
if($sqlR){$msg='Reviewer Resend Successfully!';} }
*/
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
.td1{ text-align:center;font-family:Times New Roman;color:#FFFFFF;font-size:14px; }
.td2{ text-align:center;font-family:Times New Roman;font-size:12px; }
.td3{ font-family:Times New Roman;font-size:12px; }
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function SelectHQEmp(value1,value2,CI)
{ document.getElementById('MyTeam').style.display='none'; var YI=document.getElementById('PmsYearId').value;
  var url = 'HodDeptEmp.php';	var pars = 'HQid='+value1+'&EmpId='+value2+'&YI='+YI+'&CI='+CI;	
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_HQEmp });
} 
function show_HQEmp(originalRequest)
{ document.getElementById('MyTeamSpan').innerHTML = originalRequest.responseText; }


function SelectStateEmp(value1,value2,CI)
{ document.getElementById('MyTeam').style.display='none'; var YI=document.getElementById('PmsYearId').value;
  var url = 'HodDeptEmp.php'; var pars = 'StHQid='+value1+'&EmpId='+value2+'&YI='+YI+'&CI='+CI;	
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_HQEmp });
} 
function show_HQEmp(originalRequest)
{ document.getElementById('MyTeamSpan').innerHTML = originalRequest.responseText; }


function SelectDeptEmp(value1,value2,CI)
{ document.getElementById('MyTeam').style.display='none'; var YI=document.getElementById('PmsYearId').value;
  var url = 'HodDeptEmp.php'; var pars = 'StDeptid='+value1+'&EmpId='+value2+'&YI='+YI+'&CI='+CI;	
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_DeptEmp });
} 
function show_DeptEmp(originalRequest)
{ document.getElementById('MyTeamSpan').innerHTML = originalRequest.responseText; }



function OpenWindow(v,v1,CI)
{window.open("HodScoreHistory.php?a="+v+"&b="+v1+'&CI='+CI,"AppraisalForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1100,height=650");}

function UploadEmpfile(p,e)
{y=document.getElementById("PmsYearId").value; 
 window.open("CheckUploadAppFile.php?action=up&P="+p+"&E="+e+"&Y="+y,"UploadFile","menubar=no,scrollbars=yes,resizable='no',width=600,height=400");} 


function ResentReason(p,e)
{y=document.getElementById("PmsYearId").value; 
 window.open("ResentReason.php?action=Sent&P="+p+"&E="+e+"&Y="+y,"ResentReasonFile","menubar=no,scrollbars=yes,resizable='no',width=900,height=450");}


function ResentKRA(E)
{ var agree=confirm("Are you sure you want to resend KRA form to Reviewer?");
  if (agree) { window.location='RevHodPms.php?action=r&e='+E+'&y=3'; } 
  else {return false;}
}

function ReadHistory(EI)
{window.open("EmpHistory.php?EI="+EI,"HForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=920,height=600");}

function UploadEmpKrafile(p,e,file,ext)
{ window.open("CheckUploadKraXlsFilee.php?action=upkraxls&P="+p+"&E="+e+"&file="+file+"&ext="+ext,"UploadFile","menubar=no,scrollbars=yes,resizable='no',width=600,height=400"); }

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
<?php //**************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top">&nbsp;</td>
				 <td width="100%" valign="top">
				  <table border="0" width="100%">				  
<?php //*************************************** Start ********************************************* ?>					
<tr>
 <td colspan="5" width="100%" style="background-image:url(images/pmsback.png); ">	 
 <table>
 <tr>
  <td>
<?php include("SetKraPmsmh.php"); ?>  
  </td>
 </tr>
  <tr>
    <td>
	  <table border="0" width="100%">
	    <tr>
		 <td style="width:5px;">&nbsp;</td>
<input type="hidden" id="FormAMin5" value="" /><input type="hidden" id="FormAMax5" value="" />
<input type="hidden" id="FormBMin5" value="" /><input type="hidden" id="FormBMax5" value="" />
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
<input type="hidden" id="PmsYearId" value="<?php echo $resSYP['CurrY']; ?>" />
<input type="hidden" id="KraYearId" value="<?php echo $resSY['CurrY']; ?>" />
<input type="hidden" id="EmployeeId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="EmpId" value="" /> <input type="hidden" id="PmsId" value="" />		 
<?php /****************************************** Form Start **************************/ ?>
<?php /***************** PersonalDetails **************************/ ?>			 
		 <td id="PersonalDetails" width="100%" style="display:block;">		 	 
		   <table border="0" width="100%">
 <tr>
  <td>
    <table border="0">
	<tr>			
 <td colspan="6" style="font-family:Times New Roman;font-size:18px; font-weight:bold; width:200px;"><?php if($resKey['TeamStatus']=='Y') { ?> <font color="#00468C"><i>My Team Status</i></font><?php } ?><br></td>
 <td>&nbsp;</td>	
 <?php if($resKey['TeamStatus']=='Y') { ?> 
 <td class="td1" style="font-family:Times New Roman; font-size:15px; width:150px; font-weight:bold;"> 
   <select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="DeE" id="DeE" onChange="SelectDeptEmp(this.value,<?php echo $EmployeeId.','.$CompanyId; ?>)"><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>SELECT DEPARTMENT</option><?php $SqlDe=mysql_query("select hrm_department.DepartmentId,DepartmentCode from hrm_department INNER JOIN hrm_employee_general ON hrm_department.DepartmentId=hrm_employee_general.DepartmentId INNER JOIN hrm_employee_pms ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_pms.HOD_EmployeeID=".$EmployeeId." AND hrm_employee_pms.AssessmentYear=".$resSYP['CurrY']." group by DepartmentCode ASC", $con); while($ResDe=mysql_fetch_array($SqlDe)) { ?><option value="<?php echo $ResDe['DepartmentId']; ?>"><?php echo $ResDe['DepartmentCode'];?></option><?php } ?>
   </select>
 </td>	 
 <td>&nbsp;</td>
 <td class="td1" style="font-family:Times New Roman; font-size:15px; width:150px; font-weight:bold;"> 
   <select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="StE" id="StE" onChange="SelectStateEmp(this.value,<?php echo $EmployeeId.','.$CompanyId; ?>)"><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>SELECT STATE</option><?php $SqlSt=mysql_query("select st.* from hrm_state st inner join hrm_headquater hq on st.StateId=hq.StateId inner join hrm_employee_general g on hq.HqId=g.HqId inner join hrm_employee_pms pms on g.EmployeeID=pms.EmployeeID where pms.HOD_EmployeeID=".$EmployeeId." AND hq.CompanyId=".$CompanyId." group by st.StateId order by StateName ASC"); while($ResSt=mysql_fetch_array($SqlSt)) { ?><option value="<?php echo $ResSt['StateId']; ?>"><?php echo $ResSt['StateName'];?></option><?php } ?>
   <option value="All">All</option>
   </select>
 </td>	
<td>&nbsp;</td>
 <td class="td1" style="font-family:Times New Roman; font-size:15px; width:150px; font-weight:bold;"> 
<select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="HQE" id="HQE" onChange="SelectHQEmp(this.value,<?php echo $EmployeeId.','.$CompanyId; ?>)"><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>SELECT HQ</option><?php $SqlHQ=mysql_query("select hq.* from hrm_headquater hq inner join hrm_employee_general g on hq.HqId=g.HqId inner join hrm_employee_pms pms on g.EmployeeID=pms.EmployeeID where pms.HOD_EmployeeID=".$EmployeeId." AND hq.CompanyId=".$CompanyId." group by hq.HqId order by HqName ASC", $con); while($ResHQ=mysql_fetch_array($SqlHQ)){ ?><option value="<?php echo $ResHQ['HqId']; ?>"><?php echo $ResHQ['HqName'];?></option><?php } ?>
   <option value="All">All</option>
   </select>
   <input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
   <input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
 </td>
 <td>&nbsp;</td>
 
       	       
<?php } ?>
 <td>&nbsp;</td>
 <td style="width:280px;font-family:Times New Roman;font-weight:bold;color:#014E05;" size="3"><span id="MsgSpan">&nbsp;<b><?php echo $msg; ?></b></span></td>	  
 <td class="td1" style="font-family:Times New Roman; font-size:15px; width:10px; font-weight:bold;" align="right"><span id="StateInc"></span></td>
 <td style="width:100px;"></td>
   </tr>
  </table>
  </td>
 </tr>	  
 <tr>
   <td width="100%">
     <table border="0">
	  <tr>
<?php if($resKey['TeamStatus']=='Y') { ?>	  
	  <?php //************************************************ Start ******************************// ?>
	   <td width="100%" style="display:block;">
       <span id="MyTeamSpan"></span>	   
	   <span id="MyTeam">
		<table border="1" cellspacing="1">
		 <tr bgcolor="#7a6189" style="height:20px;" valign="middle">
	        <td class="td1" style="width:30px;"><b>SN</b></td>
	        <td class="td1" style="width:50px;"><b>EC</b></td>
	        <td class="td1" style="width:250px;"><b>Name</b></td>
	        <td class="td1" style="width:80px;"><b>Department</b></td>
			<td class="td1" style="width:300px;"><b>Designation</b></td>
            <?php /*?><td class="td1" style="width:50px;"><b>Grade</b></td><?php */?>
			<td class="td1" style="width:90px;"><b>HQ</b></td>
			<td class="td1" style="width:50px;"><b>State</b></td>
<?php if($resKey['FHistoryForm']=='Y'){ ?><td class="td1" style="width:50px;"><b>His<br>tory</b></td><?php } ?>
<?php if($resKey['FPmsForm']=='Y'){ ?><td class="td1" style="width:60px;"><b>Form</b></td><?php } ?>
			<td class="td1" style="width:50px;"><b>Files</b></td>
            <td class="td1" style="width:50px;"><b>Kra Xls</b></td>
			<td class="td1" style="width:50px;"><b>Resent</b></td>
			<td class="td1" style="width:80px;"><b>Employee</b></td>
			<td class="td1" style="width:80px;"><b>Appraiser</b></td>
			<td class="td1" style="width:80px;"><b>Reviewer</b></td>
			<?php if($resKeye['AppraisalForm']=='Y'){?>
			<td class="td1" style="width:60px;"><b>HOD</b></td>
			<?php } ?>
		 </tr>
<?php $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateCode, EmpPmsId, Kra_filename, Kra_ext, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, HodSubmit_IncStatus, Appraiser_NoOfResend, Reviewer_NoOfResend, Hod_NoOfResend from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND p.AssessmentYear=".$resSYP['CurrY']." AND p.HOD_EmployeeID=".$EmployeeId, $con); $sno=1; while($res=mysql_fetch_array($sql)){ ?>     		
		<tr bgcolor="#FFFFFF" style="height:20px;" valign="middle">
	      <td class="td2"><?php echo $sno; ?></td>
	      <td class="td2"><?php echo $res['EmpCode']; ?></td>
	      <td class="td3">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
          <td class="td3">&nbsp;<?php echo $res['DepartmentCode'];?></td>		
		  <td class="td3">&nbsp;<?php echo $res['DesigName'];?></td>						
		  <?php /*?><td class="td2"><?php echo $res['GradeValue'];?></td>	<?php */?>
		  <td class="td3">&nbsp;<?php echo $res['HqName'];?></td>					
		  <td class="td2">&nbsp;<?php echo $res['StateCode'];?></td>
		  
<?php if($resKey['FHistoryForm']=='Y'){ ?><td class="td2"><a href="javascript:ReadHistory(<?php echo $res['EmployeeID']; ?>)">Click</a></td><?php } ?>
		
<?php if($resKey['FPmsForm']=='Y'){ ?><td class="td2"><?php if($res['Emp_PmsStatus']==2){ ?><a href="javascript:OpenWindow(<?php echo $res['EmployeeID'].','.$res['EmpPmsId'].','.$CompanyId; ?>)">Click</a> <?php }else{ echo 'Wait'; }?></td><?php } ?>

		  <td class="td2"><?php $sqlR=mysql_query("select * from hrm_employee_pms_uploadfile where EmpPmsId=".$res['EmpPmsId']." AND EmployeeID=".$res['EmployeeID']." AND YearId=".$resSYP['CurrY'], $con); $no=1; $resR=mysql_num_rows($sqlR); if($resR>0){ ?><a href="#" onClick="UploadEmpfile(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>)">Yes</a><?php } if($resR==0){echo 'No'; }?></td>	

          <td class="td2"><?php if($res['Kra_filename']!='' AND $res['Kra_ext']!=''){ ?><a href="#" onClick="UploadEmpKrafile(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>,'<?php echo $res['Kra_filename']; ?>','<?php echo $res['Kra_ext']; ?>')">Yes</a><?php } ?></td>

		  <td class="td2"><?php $sum=$res['Appraiser_NoOfResend']+$res['Reviewer_NoOfResend']+$res['Hod_NoOfResend']; ?><?php if($sum>0) { ?><a href="#" onClick="ResentReason(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>)">Yes</a><?php } else { echo 'No'; }?></td>
		  	
<?php if($res['Emp_PmsStatus']==0){$stE='Draft';}elseif($res['Emp_PmsStatus']==1){$stE='Pending';}elseif($res['Emp_PmsStatus']==2){$stE='Submitted';} ?><td class="td2" style="color:<?php if($stE=='Draft') {echo '#A40000'; }if($stE=='Pending') {echo '#36006C'; }if($stE=='Submitted') {echo '#005300'; }?>;"><?php echo $stE;?></td>  

<?php if($res['Appraiser_PmsStatus']==0){$stA='Draft';}elseif($res['Appraiser_PmsStatus']==1){$stA='Pending';}elseif($res['Appraiser_PmsStatus']==2){$stA='Approved';}elseif($res['Appraiser_PmsStatus']==3){$stA='Resent';} ?><td class="td2" style="color:<?php if($stA=='Draft') {echo '#A40000'; }if($stA=='Pending') {echo '#36006C'; }if($stA=='Approved') {echo '#005300'; }if($stA=='Resent') {echo '#006AD5'; }?>;"><?php echo $stA;?></td>
			
<?php if($res['Reviewer_PmsStatus']==0){$stR='Draft';}elseif($res['Reviewer_PmsStatus']==1){$stR='Pending';}elseif($res['Reviewer_PmsStatus']==2){$stR='Approved';}elseif($res['Reviewer_PmsStatus']==3){$stR='Resent';} ?><td class="td2" style="color:<?php if($stR=='Draft') {echo '#A40000'; }if($stR=='Pending') {echo '#36006C'; }if($stR=='Approved') {echo '#005300'; }if($stR=='Resent') {echo '#006AD5'; } ?>;"><?php echo $stR;?></td>
		   
		   <?php if($resKeye['AppraisalForm']=='Y'){?>	
<?php if($res['HodSubmit_IncStatus']==0){$stH='Draft';}elseif($res['HodSubmit_IncStatus']==1){$stH='Pending';}elseif($res['HodSubmit_IncStatus']==2){$stH='Approved';} ?><td class="td2" style="color:<?php if($stH=='Draft') {echo '#A40000'; }if($stH=='Pending') {echo '#36006C'; }if($stH=='Approved') {echo '#005300'; }?>;"><?php echo $stH;?></td>
		   <?php } ?>
		</tr>
<?php $sno++;} ?>		
		</table>
		</span>
	   </td>
      <?php //************************************************ Close ******************************// ?>	
<?php } ?>	    	   
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
<?php //******************************************** Close ************************************ ?>					
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
<?php //******************************************************************************************* ?>
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>

	<tr>
	  <td valign="top">
	    <?php //require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>







