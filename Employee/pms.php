<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');} 
if($_SESSION['login'] = true){require_once('StartEmpMenuSession.php');}else{header('Location:../index.php');}
/******************************************************************************/
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

<script type="text/javascript" language="javascript">
function FinalSubmit() { var agree=confirm("Are you sure you want to submit appraisal form.?");
if (agree) { var x = "pms.php?action=submit&log=@4323yy6twecdsayaEay456ad";  window.location=x;}}	

function OpenWindow(a,k) 
{
var CI=document.getElementById("ComId").value; var PYI=document.getElementById("PmsYId").value; 
var KYI=document.getElementById("KraYId").value; window.open("AppraisalSchedule.php?C="+CI+"&PYI="+PYI+"&KYI="+KYI+"&App="+a+"&Kra="+k,"Schedule","menubar='no',resizable=1,width=850,height=400");
}

function KRAOpenWindow(a,k)
{
 var CI=document.getElementById("ComId").value; var PYI=document.getElementById("PmsYId").value;
 var KYI=document.getElementById("KraYId").value; window.open("KRASchedule.php?C="+CI+"&PYI="+PYI+"&KYI="+KYI+"&App="+a+"&Kra="+k,"Schedule","menubar='no',resizable=1,width=850,height=400");
}

function OpenHelpfile(value){window.open("HelpFile.php?a=open&v="+value,"HelpFile","width=800,height=650"); }
function OpenFaqfile(value){window.open("HelpFile.php?a=FaqOpen&v="+value,"HelpFile","width=800,height=650"); }
function OpenKRAHelpfile(value){window.open("KRAHelpFile.php?a=open&v="+value,"HelpFile","width=800,height=650"); }
function OpenKRAFaqfile(value){window.open("KRAHelpFile.php?a=FaqOpen&v="+value,"HelpFile","width=800,height=650"); }
function printpage(PmsId,EmpId){window.open("EmpAppFormPrint.php?PmsId="+PmsId+"&EmpId="+EmpId,"AppForm","menubar=yes,scrollbars=yes,resizable=1,width=1050,height=600");}
function printpageKRA(CId,YId,EmpId){window.open("EmpKraFormPrint.php?YId="+YId+"&EmpId="+EmpId+"&CId="+CId,"KRAForm","menubar=yes,scrollbars=yes,resizable=1,width=1170,height=500");}

<!--
function doBlink() 
{ var blink = document.all.tags("BLINK")
 for (var i=0; i<blink.length; i++){ blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" } }
function startBlink(){ if(document.all){ setInterval("doBlink()",1000); } }
window.onload = startBlink;
// -->
</SCRIPT>
</head>
<body class="body">   
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="KraYId" id="KraYId" value="<?php echo $_SESSION['KraYId']; ?>" /> 
<input type="hidden" name="PmsYId" id="PmsYId" value="<?php echo $_SESSION['PmsYId']; ?>" />
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
<td align="center" valign="top"><a href="#"><img id="Img_emp1" src="images/emp.png" border="0"/></a></td>

<?php } if($_SESSION['BtnApp']>0 OR $_SESSION['BtnKApp']>0) { ?><td align="center" valign="top"><a href="ManagerPms.php?ee=1&rr2=1&aa=0&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_manager1" src="images/manager1.png" border="0"/></a></td>
		   
<?php } if($_SESSION['BtnRev']>0 OR $_SESSION['BtnKRev']>0) { ?><td align="center" valign="top"><a href="HodPms.php?ee=1&aa=1&rr2=1&rr=0&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/hod1.png" border="0"/></a></td>

<?php } if($_SESSION['BtnRev2']>0) { ?><td align="center" valign="top"><a href="Rev2HodPms.php?ee=1&rr2=0&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/RevHod1.png" border="0"/></a></td>	
		   
<?php } if($_SESSION['BtnHod']>0) { ?><td align="center" valign="top"><a href="RevHodPms.php?ee=1&rr2=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/m1.png" border="0"/></a></td><?php } ?>

<td><font class="msg_b"><i><?php echo $msg; ?></i></font></td>	 
	</tr>
   </table>
  </td>
 </tr>
 
 <tr><td style="vertical-align:top;width:100%;"><?php include("SetKraPmsme.php"); ?></td></tr>
<!--  Head Parts Close Close Close  --> 
<!--  Head Parts Close Close Close  --> 
 
  <tr>
    <td style="width:100%;">
	  <table border="0" style="width:100%;">
	    <tr>
		 <td style="width:5px;">&nbsp;</td>
<?php /****************************************** Form Start **************************/ ?>
<?php /***************** PersonalDetails **************************/ ?>
<?php $LEC=strlen($EmpCode); if($LEC==1){$EC='000'.$EmpCode;} if($LEC==2){$EC='00'.$EmpCode;} if($LEC==3){$EC='0'.$EmpCode;} if($LEC>=4){$EC=$EmpCode;} 
$sqlDe=mysql_query("select DesigName from hrm_designation where DesigId=".$_SESSION['Desig'], $con); 
$sqlD=mysql_query("select DepartmentCode,FunName from hrm_department where DepartmentId=".$_SESSION['Dept'], $con);
$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$_SESSION['Grade'], $con);
$resD=mysql_fetch_assoc($sqlD); $resDe=mysql_fetch_assoc($sqlDe); $resG=mysql_fetch_assoc($sqlG); 
$sqlH=mysql_query("select HqName from hrm_headquater where HqId=".$_SESSION['Hq'],$con); $resH=mysql_fetch_assoc($sqlH); 

$sqlAp=mysql_query("select Fname,Sname,Lname,Gender,Married,DR from hrm_employee e INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where e.EmployeeID=".$resY['Appraiser_EmployeeID'],$con); $resAp=mysql_fetch_assoc($sqlAp);  
if($resAp['DR']=='Y'){$M='Dr.';}elseif($resAp['Gender']=='M'){$M='Mr.';} elseif($resAp['Gender']=='F' AND $resAp['Married']=='Y'){$M='Mrs.';} elseif($resAp['Gender']=='F' AND $resAp['Married']=='N'){$M='Miss.';}  
if($resAp['Sname']!=''){ $NameAp=$M.' '.$resAp['Fname'].' '.$resAp['Sname'].' '.$resAp['Lname']; }
else{ $NameAp=$M.' '.$resAp['Fname'].' '.$resAp['Lname']; }

$sqlRe=mysql_query("select Fname,Sname,Lname,Gender,Married,DR from hrm_employee e INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where e.EmployeeID=".$resY['Reviewer_EmployeeID'], $con); $resRe=mysql_fetch_assoc($sqlRe);
if($resRe['DR']=='Y'){$M2='Dr.';}elseif($resRe['Gender']=='M'){$M2='Mr.';} elseif($resRe['Gender']=='F' AND $resRe['Married']=='Y'){$M2='Mrs.';} elseif($resRe['Gender']=='F' AND $resRe['Married']=='N'){$M2='Miss.';} 
if($resRe['Sname']!=''){ $NameRe=$M2.' '.$resRe['Fname'].' '.$resRe['Sname'].' '.$resRe['Lname']; }
else{ $NameRe=$M2.' '.$resRe['Fname'].' '.$resRe['Lname']; }


$sqlR2e=mysql_query("select Fname,Sname,Lname,Gender,Married,DR from hrm_employee e INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where e.EmployeeID=".$resY['Rev2_EmployeeID'], $con); $resR2e=mysql_fetch_assoc($sqlR2e);
if($resR2e['DR']=='Y'){$Mr2='Dr.';}elseif($resR2e['Gender']=='M'){$Mr2='Mr.';} elseif($resR2e['Gender']=='F' AND $resR2e['Married']=='Y'){$Mr2='Mrs.';} elseif($resR2e['Gender']=='F' AND $resR2e['Married']=='N'){$Mr2='Miss.';} 
if($resR2e['Sname']!=''){ $NameR2e=$Mr2.' '.$resR2e['Fname'].' '.$resR2e['Sname'].' '.$resR2e['Lname']; }
else{ $NameR2e=$Mr2.' '.$resR2e['Fname'].' '.$resR2e['Lname']; }

$sqlHo=mysql_query("select Fname,Sname,Lname,Gender,Married,DR from hrm_employee e INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where e.EmployeeID=".$resY['HOD_EmployeeID'], $con); $resHo=mysql_fetch_assoc($sqlHo);
if($resHo['DR']=='Y'){$M3='Dr.';}elseif($resHo['Gender']=='M'){$M3='Mr.';} elseif($resHo['Gender']=='F' AND $resHo['Married']=='Y'){$M3='Mrs.';} elseif($resHo['Gender']=='F' AND $resHo['Married']=='N'){$M3='Miss.';} 
if($resHo['Sname']!=''){ $NameHo=$M3.' '.$resHo['Fname'].' '.$resHo['Sname'].' '.$resHo['Lname']; }
else{ $NameHo=$M3.' '.$resHo['Fname'].' '.$resHo['Lname']; }
?>				 
<?php if($_SESSION['EmpType']=='E'){ ?>
     <td id="PersonalDetails" style="width:100%;display:block;">
     
<?php $sqlSetH=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS' ", $con);  
      $resSetH=mysql_fetch_array($sqlSetH); ?>	
      
<table border="0" style="width:100%;">
 <tr><td colspan="2" class="tdl" style="font-size:18px;color:#00468C;"><b>(<i>Personal Details</i>)</font></b></td></tr>  
 <tr><td>&nbsp;</td></tr> 
 <tr>
  <td align="center" style="vertical-align:top;width:12%;"><?php include("EmpImgEmp.php"); ?></td>
  <td style="vertical-align:top;width:88%;">
  <table border="1" style="vertical-align:top;width:80%;background-color:#FFFFFF;" cellspacing="1">
   <tr style="height:25px;">
	<td class="head" style="width:15%;">&nbsp;Name</td>
	<td class="data" style="width:35%;">&nbsp;<?php echo $NameE; ?></td>
<td class="head" style="width:15%;">&nbsp;<?php if($_SESSION['RetiStatus']=='N'){echo 'EmpCode';}else{echo 'Code';}?></td>
	<td class="data" style="width:35%;">&nbsp;<?php echo $EC; ?></td>
   </tr>
   <tr>
	<td class="head">&nbsp;Designation</td><td class="data">&nbsp;<?php if($resSetH['Show_GradeDesig']=='Y'){ echo $resDe['DesigName']; } ?></td>
    <td class="head">&nbsp;<?php if($resD['FunName']==''){echo 'Department';}else{echo 'Function';}?></td><td class="data">&nbsp;<?php if($resD['FunName']==''){ echo $resD['DepartmentCode']; }else{ echo $resD['FunName']; } ?></td>
   </tr>
   <tr>
	<td class="head">&nbsp;Grade</td>
	<td class="data">&nbsp;<?php if($resSetH['Show_GradeDesig']=='Y'){ if($_SESSION['RetiStatus']=='N'){echo $resG['GradeValue'];} } ?></td>
    <td class="head">&nbsp;Head Quarter</td><td class="data">&nbsp;<?php echo $resH['HqName']; ?></td>
   </tr>
   <tr>
	<td class="head">&nbsp;Assessment Year</td>		
	<td class="data">&nbsp;<?php if($_SESSION['eAppform']=='Y'){echo '<b>PMS:</b>&nbsp;'.$_SESSION['PmsYear'];} if($_SESSION['eKraform']=='Y'){echo '&nbsp;&nbsp;&nbsp;&nbsp;<b>KRA:</b>&nbsp;'.$_SESSION['KraYear'];} ?></td>
	<td class="head">&nbsp;DOJ</td>			
	<td class="data">&nbsp;<?php echo date("d-m-Y",strtotime($_SESSION['Joining'])); ?></td>
   </tr>
<?php if($_SESSION['RetiStatus']=='N'){$StratDate=$_SESSION['Joining'];}
      elseif($_SESSION['RetiStatus']=='Y'){$StratDate=$_SESSION['RetiDate'];}

      $date1 = $StratDate; $date2 = date("Y-m-d");
      $diff = abs(strtotime($date2) - strtotime($date1));
      $years = floor($diff/(365*60*60*24));
      $months = floor(($diff-$years*365*60*60*24)/(30*60*60*24));
      $days = floor(($diff-$years*365*60*60*24-$months*30*60*60*24)/(60*60*24)); 
      //$VNRExpMain=$years.'.'.$months;	  
//New Open New Open New Open
$dos=date("d-m-Y",strtotime($StratDate));
$localtime = getdate();
$today = $localtime['mday']."-".$localtime['mon']."-".$localtime['year'];
$dob_a = explode("-", $dos);
$today_a = explode("-", $today);
$dob_d = $dob_a[0];$dob_m = $dob_a[1];$dob_y = $dob_a[2];
$today_d = $today_a[0];$today_m = $today_a[1];$today_y = $today_a[2];
$years = $today_y - $dob_y;
$months = $today_m - $dob_m;
if ($today_m.$today_d < $dob_m.$dob_d){ $years--; $months = 12 + $today_m - $dob_m; }
if ($today_d < $dob_d){ $months--; }
$firstMonths=array(1,3,5,7,8,10,12);
$secondMonths=array(4,6,9,11);
$thirdMonths=array(2);
if($today_m - $dob_m == 1) 
{
if(in_array($dob_m, $firstMonths)){ array_push($firstMonths, 0); }
elseif(in_array($dob_m, $secondMonths)){ array_push($secondMonths, 0); }
elseif(in_array($dob_m, $thirdMonths)){ array_push($thirdMonths, 0); }
}
//$VNRExpMain=$years.' Year - '.$months.' Month'; 
$len2=strlen($months); //if($len2==1){$months='0'.$months;}else{$months=$months;}
//$ExpVNRMain=$years.'.'.$mnt;

if($months<10){ $mnt='0.0'.$months; } 
elseif($months>=10 && $months<12){ $mnt='0.'.$months; }
//if($months<12){ $mnt='0.'.$str[1]; }  
elseif($months>=12 AND $months<24){ $m1=$months-12; $l=strlen($m1);if($l==1){$mnt='1.0'.$m1;}else{$mnt='1.'.$m1;} }
elseif($months>=24 AND $months<36){$m1=$months-24; $l=strlen($m1);if($l==1){$mnt='2.0'.$m1;}else{$mnt='2.'.$m1;} }
elseif($months>=36 AND $months<48){$m1=$months-36; $l=strlen($m1);if($l==1){$mnt='3.0'.$m1;}else{$mnt='3.'.$m1;} }
elseif($months>=48 AND $months<60){$m1=$months-48; $l=strlen($m1);if($l==1){$mnt='4.0'.$m1;}else{$mnt='4.'.$m1;} }
elseif($months>=60 AND $months<72){$m1=$months-60; $l=strlen($m1);if($l==1){$mnt='5.0'.$m1;}else{$mnt='5.'.$m1;} }
elseif($months>=72 AND $months<84){$m1=$months-72; $l=strlen($m1);if($l==1){$mnt='6.0'.$m1;}else{$mnt='6.'.$m1;} }
elseif($months>=84 AND $months<96){$m1=$months-84; $l=strlen($m1);if($l==1){$mnt='7.0'.$m1;}else{$mnt='7.'.$m1;} }
elseif($months>=96 AND $months<108){$m1=$months-96; $l=strlen($m1);if($l==1){$mnt='8.0'.$m1;}else{$mnt='8.'.$m1;} }
$str_a = explode('.',$mnt);
$VNRExpMain=($years+$str_a[0]).'.'.$str_a[1].' Year';


//New Close New Close New Close     
?> 	  	  
   <tr>
    <td class="head">&nbsp;<?php if($_SESSION['RetiStatus']=='N'){echo 'Total VNR-Exp.';}elseif($_SESSION['RetiStatus']=='Y'){echo 'Consultant Exp';}?></td>
	<td class="data">&nbsp;<?php echo $VNRExpMain; ?></td>
	<td class="head">&nbsp;Appraiser</td><td class="data">&nbsp;<?php echo $NameAp; ?></td>
   </tr>
   <tr>
	<td class="head">&nbsp;Reviewer</td><td class="data">&nbsp;<?php echo $NameRe; ?></td>
	<td class="head">&nbsp;HOD</td><td class="data">&nbsp;<?php if($resY['Rev2_EmployeeID']>0){echo $NameR2e;}else{echo $NameHo;} ?></td>
   </tr>
  </table>
  </td>
 </tr>
</table>

     </td>
<?php } ?>		
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
	  <td valign="top" style="">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

