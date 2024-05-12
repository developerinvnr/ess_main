<?php session_start();
if($_SESSION['login'] = true){require_once('../user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../../../index.php');}
$EmployeeId=$_SESSION['EmployeeID'];
/*********************************************************/

$SpP=mysql_query("select EmpCode, Fname, Sname, Lname, EmpType, EmpStatus, GradeId, DepartmentId, HqId, RepEmployeeID, CompanyId, DR, Married, Gender, EmpVertical from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID inner join hrm_employee_personal p on e.EmployeeID=p.EmployeeID where e.EmployeeID=".$EmployeeId, $con); $resSpP=mysql_fetch_assoc($SpP);
$_SESSION['EmpCode']=$resSpP['EmpCode']; $_SESSION['Fname']=$resSpP['Fname']; $_SESSION['Sname']=$resSpP['Sname'];
$_SESSION['Lname']=$resSpP['Lname']; $_SESSION['EmpType']=$resSpP['EmpType']; $_SESSION['EmpStatus']=$resSpP['EmpStatus'];
$_SESSION['CompanyId']=$resSpP['CompanyId']; 
$_SESSION['DR']=$resSpP['DR']; $_SESSION['Married']=$resSpP['Married']; $_SESSION['Gender']=$resSpP['Gender'];
$_SESSION['GradeId']=$resSpP['GradeId']; $_SESSION['DepartmentId']=$resSpP['DepartmentId']; 
$_SESSION['HqId']=$resSpP['HqId']; $_SESSION['RepEmployeeID']=$resSpP['RepEmployeeID'];

if($resSpP['EmpVertical']==0 || ($resSpP['EmpVertical']!=14 AND $resSpP['EmpVertical']!=15 AND $resSpP['EmpVertical']!=16)){ $EmpVertical=16; }else{ $EmpVertical=$resSpP['EmpVertical']; }
$_SESSION['Vertical']=$EmpVertical;  //echo $_SESSION['Vertical'];


$sHqv=mysql_query("select Hq_vc from hrm_sales_dealer where Terr_vc=".$EmployeeId." AND DealerSts='A'");
$sHqf=mysql_query("select Hq_fc from hrm_sales_dealer where Terr_fc=".$EmployeeId." AND DealerSts='A'");
$rowHqv=mysql_num_rows($sHqv); $rowHqf=mysql_num_rows($sHqf);
$_SESSION['Hqv']=$rowHqv; $_SESSION['Hqf']=$rowHqf;


$slSt=mysql_query("select StateId from hrm_headquater where HqId=".$_SESSION['HqId'],$con); $rsSt=mysql_fetch_assoc($slSt);
$_SESSION['StateId']=$rsSt['StateId'];

if($_SESSION['DR']=='Y'){$M='Dr.';} elseif($_SESSION['Gender']=='M'){$M='Mr.';} elseif($_SESSION['Gender']=='F' AND $_SESSION['Married']=='Y'){$M='Mrs.';} elseif($_SESSION['Gender']=='F' AND $_SESSION['Married']=='N'){$M='Miss.';}  
$_SESSION['NameE']=$M.' '.$_SESSION['Fname'].' '.$_SESSION['Sname'].' '.$_SESSION['Lname'];

$LEC=strlen($_SESSION['EmpCode']);
if($LEC==1){$EC='000'.$_SESSION['EmpCode'];} 
elseif($LEC==2){$EC='00'.$_SESSION['EmpCode'];} 
elseif($LEC==3){$EC='0'.$_SESSION['EmpCode'];} 
elseif($LEC>=4){$EC=$_SESSION['EmpCode'];}
$_SESSION['EC']=$EC; 

$SqlCom=mysql_query("select CompanyName from hrm_company_basic where CompanyId=".$_SESSION['CompanyId'], $con); 
$resCom=mysql_fetch_assoc($SqlCom); $_SESSION['CompanyName']=$resCom['CompanyName'];

$sqly=mysql_query("select YearId,FromDate,ToDate from hrm_sales_year where Company".$_SESSION['CompanyId']."='A'", $con); 
$resy=mysql_fetch_assoc($sqly); $_SESSION['YearId']=$resy['YearId'];
$_SESSION['fromdate']=date("Y",strtotime($resy['FromDate'])); 
$_SESSION['todate']=date("Y",strtotime($resy['ToDate']));

$sqlCPerMi=mysql_query("select EditPerMi from hrm_sales_reporting_level where EmployeeID=".$EmployeeId,$con); 
$resCPerMi=mysql_fetch_assoc($sqlCPerMi); $_SESSION['EditPerMi']=$resCPerMi['EditPerMi'];

$sHq2=mysql_query("select HqId from hrm_sales_hq_temp where EmployeeID=".$EmployeeId." AND HqTEmpStatus='A' AND HqId!=".$_SESSION['HqId'], $con); $rowHq2=mysql_num_rows($sHq2); $resHq2=mysql_fetch_assoc($sHq2); 
$_SESSION['rowHq2']=$rowHq2; $_SESSION['Hq2Id']=$resHq2['HqId'];

$sqlERev=mysql_query("select * from hrm_sales_revised_employee where EmployeeID=".$EmployeeId." AND Status='A'",$con); $rowERev=mysql_num_rows($sqlERev); $_SESSION['rowERev']=$rowERev;
$sqlRpt=mysql_query("select g.EmployeeID from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where g.DepartmentId=6 AND e.EmpStatus='A' AND g.RepEmployeeID=".$EmployeeId, $con); $rowRpt=mysql_num_rows($sqlRpt);
$_SESSION['rowRpt']=$rowRpt;
$stl = mysql_query("SELECT * FROM hrm_sales_tlemp where TLRepId=".$EmployeeId." AND TLStatus='A'", $con);
$rtl = mysql_num_rows($stl); $_SESSION['rtl']=$rtl; 

$Eq=mysql_query("select * from fa_request_employee where EmployeeID=".$EmployeeId." AND Request='Y'",$con); 
$rowEq=mysql_num_rows($Eq); $_SESSION['rowEq']=$rowEq;
$sgm2=mysql_query("select * from fa_approvalgm where Id=2 AND (Gm1=".$EmployeeId." OR Gm2=".$EmployeeId.")",$con); 
$rowgm2=mysql_num_rows($sgm2); $_SESSION['rowgm2']=$rowgm2;
$sPnd=mysql_query("select * from fa_request where gm=".$EmployeeId." AND Status=1",$con);
$rowPnd=mysql_num_rows($sPnd); $_SESSION['rowPnd']=$rowPnd;

$sqlCoc=mysql_query("select * from hrm_sales_planshow where PlanshowId=1",$con); $resCoc=mysql_fetch_assoc($sqlCoc); 
$_SESSION['EntryPlan']=$resCoc['EntryPlan']; $_SESSION['ResultPlan']=$resCoc['ResultPlan'];

for($i=1; $i<=25; $i++){ $_SESSION['a'.$i]=0; }

//$sqlSt = mysql_query("select hq.StateId from hrm_headquater hq inner join hrm_sales_hq_temp hqt on hq.HqId=hqt.HqId inner join hrm_sales_reporting_level rl on hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") group by hq.StateId ASC", $con); 

if($_SESSION['Vertical']==16 || ($_SESSION['Hqv']>0 && $_SESSION['Hqf']>0))
{ $qrr='(hq.HqId=d.Hq_vc OR hq.HqId=d.Hq_fc)'; $qrrEj='(d.Terr_vc=rl.EmployeeID OR d.Terr_fc=rl.EmployeeID)'; 
  $qrrE='d.Terr_vc='.$EmployeeId.' OR d.Terr_fc='.$EmployeeId; }
elseif($_SESSION['Vertical']==14 || $_SESSION['Hqv']>0)
{ $qrr='hq.HqId=d.Hq_vc'; $qrrEj='d.Terr_vc=rl.EmployeeID'; $qrrE='d.Terr_vc='.$EmployeeId;  }
elseif($_SESSION['Vertical']==15 || $_SESSION['Hqf']>0)
{ $qrr='hq.HqId=d.Hq_fc'; $qrrEj='d.Terr_fc=rl.EmployeeID'; $qrrE='d.Terr_fc='.$EmployeeId;  }

$sqlSt = mysql_query("select hq.StateId from hrm_headquater hq inner join hrm_sales_dealer d on ".$qrr." inner join hrm_sales_reporting_level rl on ".$qrrEj." where d.DealerSts='A' AND (".$qrrE." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") group by hq.StateId ASC", $con);



$rowSt=mysql_num_rows($sqlSt); 
$j=1; while($resSt=mysql_fetch_assoc($sqlSt)){ $_SESSION['a'.$j]=$resSt['StateId']; $j++; } 

/*********************************************************/
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
<!--
function doBlink() { var blink = document.all.tags("BLINK"); 
for (var i=0; i<blink.length; i++)	blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" }
function startBlink() {	if (document.all) setInterval("doBlink()",1000); }
window.onload = startBlink;
// -->
</SCRIPT>
</head>
<body class="body"> 
<?php $sqlE=mysql_query("select Gender,DOB,Married,MarriageDate,HusWifeName,ProfileCertify from hrm_employee_general INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_family ON hrm_employee_general.EmployeeID=hrm_employee_family.EmployeeID INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$EmployeeId, $con); $resE=mysql_fetch_assoc($sqlE); 
?> 
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
<td>
<table style="margin-top:0px;">
<tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
<tr>
 <td valign="top" align="center">
 <table border="0" style="width:1200px; height:350px; float:none;" cellpadding="0">
 <tr>
  <td valign="top"> 	   
<?php //***************************************************** Main Body ********************************************************************************************** ?>	   
<table border="0" id="Activity">
<tr>
 <td valign="top">
  <table border="0">
  <tr>
	<td valign="top">			   
     <table border="0">
	 <tr>
	   <td align="left" valign="top" style="width:600px;height:280px;">
	     <table border="0">
		   <tr>
		    <td colspan="2" align="left" valign="top" style="width:180px;">
<?php $SqlE = mysql_query("SELECT EmpCode FROM hrm_employee WHERE EmployeeID=".$EmployeeId." AND Companyid=".$CompanyId, $con);  $Emp=mysql_fetch_assoc($SqlE); 
	  echo '<img width="105px" height="125px" src="../../../AdminUser/EmpImg'.$CompanyId.'Emp/'.$Emp['EmpCode'].'.jpg" border="1" />'; ?> 			
			<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\" border=1>\n";?></td>
			<td style="width:10px;">&nbsp;</td>
			<td valign="bottom" style="font-family:Times New Roman;font-size:48px;font-weight:bold;color:#183E83;background-image:url(images/footer-leaf.png);background-repeat:no-repeat;height:280px;width:800px;">
			  <table border="0" style="width:800px;">
                <tr>
<?php $sql=mysql_query("select HqId,CostCenter,ReportingName,ReportingDesigId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $res=mysql_fetch_assoc($sql); 
      $sqlHQ=mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'], $con); $resHQ=mysql_fetch_assoc($sqlHQ);
	  $sqlCC=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resCC=mysql_fetch_assoc($sqlCC);
	  $sqlDesigR=mysql_query("select DesigName from hrm_designation where DesigId=".$res['ReportingDesigId'], $con); $resDesigR=mysql_fetch_assoc($sqlDesigR); ?>					
				 <td style="height:60px;width:400px;" colspan="2">
	               <table border="0">
	                <tr>
		             <td style="font-family:Times New Roman;font-size:14px;color:#BFF3F7;width:1250px;">
                     <b>HeadQuarter: <font color="#FFFFAA"><?php echo $resHQ['HqName']; ?></font><br>
		             State: <font color="#FFFFAA"><?php echo $resCC['StateName']; ?></font><br>
		             Reporting Name: <font color="#FFFFAA"><?php echo $res['ReportingName']; ?></font><br>
		             Reporting Designation: <font color="#FFFFAA"><?php echo strtoupper($resDesigR['DesigName']); ?>&nbsp;&nbsp;</font>
                     </td>
		           </tr>
	              </table>				 
				 </td>
			    </tr>
                <tr><td style="height:115px;width:340px;">&nbsp;</td>
                    <td style="font-family:Times New Roman;font-size:40px;font-weight:bold;color:#FFFFFF;width:460px;">Sales Module</td>
                </tr>
                <tr><td style="height:150px;">&nbsp;</td></tr>
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
	</table>
<?php //*************************************************************************************************************************************************** ?>
          
		  </td>  
		 </tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

