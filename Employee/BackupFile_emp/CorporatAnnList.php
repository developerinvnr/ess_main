<?php session_start();
	  $con=mysql_connect('localhost','vnrseed2_hr','vnrhrims321');
	  $db=mysql_select_db('vnrseed2_hrims', $con);
      require_once('StartEmpMenuSession.php');
?>
<html><head>
<style type="text/css"> #marqueecontainer{ position:relative;width:280px;height:180px; padding:0px;padding-left: 0px; border:0px; border-style:hidden; } </style>
<script type="text/javascript">
var delayb4scroll=2000; var marqueespeed=1; var pauseit=1; var copyspeed=marqueespeed; var pausespeed=(pauseit==0)? copyspeed: 0; var actualheight='';

function scrollmarquee(){
if (parseInt(cross_marquee.style.top)>(actualheight*(-1)+8)) cross_marquee.style.top=parseInt(cross_marquee.style.top)-copyspeed+"px";
else cross_marquee.style.top=parseInt(marqueeheight)+8+"px"; }

function initializemarquee(){ cross_marquee=document.getElementById("vmarquee"); cross_marquee.style.top=0;
marqueeheight=document.getElementById("marqueecontainer").offsetHeight; actualheight=cross_marquee.offsetHeight;
if (window.opera || navigator.userAgent.indexOf("Netscape/7")!=-1){ cross_marquee.style.height=marqueeheight+"px"; cross_marquee.style.overflow="scroll"; return }
setTimeout('lefttime=setInterval("scrollmarquee()",30)', delayb4scroll); }

if (window.addEventListener) window.addEventListener("load", initializemarquee, false);
else if (window.attachEvent) window.attachEvent("onload", initializemarquee);
else if (document.getElementById) window.onload=initializemarquee;
</script>
<?php $Y=date("Y");
 if(date("m")==01 OR date("m")==03 OR date("m")==05 OR date("m")==07 OR date("m")==08 OR date("m")==10 OR date("m")==12){$day=31;}
 elseif(date("m")==02){if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040) { $day=29; } else { $day=28;} }
 elseif(date("m")==04 OR date("m")==06 OR date("m")==09 OR date("m")==11){$day=30;}
 $Be_7D_1 = date("Y-m-01",strtotime('-2555 day'));  $Be_7D_2 = date("Y-m-".$day,strtotime('-2555 day'));
 $Be_5D_1 = date("Y-m-01",strtotime('-1825 day')); $Be_5D_2 = date("Y-m-".$day,strtotime('-1825 day'));
 $Be_3D_1 = date("Y-m-01",strtotime('-1095 day')); $Be_3D_2 = date("Y-m-".$day,strtotime('-1095 day'));
 $Be_1D_1 = date("Y-m-01",strtotime('-365 day')); $Be_1D_2 = date("Y-m-".$day,strtotime('-365 day'));
 
 $S7=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DepartmentId,DesigId,HqId,Married,DateJoining,DR from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DateJoining>='".$Be_7D_1."' AND hrm_employee_general.DateJoining<='".$Be_7D_2."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by DateJoining ASC", $con); 
 $S5=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DepartmentId,DesigId,HqId,Married,DateJoining,DR from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DateJoining>='".$Be_5D_1."' AND hrm_employee_general.DateJoining<='".$Be_5D_2."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by DateJoining ASC", $con); 
 $S3=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DepartmentId,DesigId,HqId,Married,DateJoining,DR from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DateJoining>='".$Be_3D_1."' AND hrm_employee_general.DateJoining<='".$Be_3D_2."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by DateJoining ASC", $con); 
 $S1=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DepartmentId,DesigId,HqId,Married,DateJoining,DR from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DateJoining>='".$Be_1D_1."' AND hrm_employee_general.DateJoining<='".$Be_1D_2."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by DateJoining ASC", $con); 
 //$Ro2=mysql_num_rows($S2);  $Ro4=mysql_num_rows($S4); $Ro6=mysql_num_rows($S6);  $Ro8=mysql_num_rows($S8); $Ro9=mysql_num_rows($S9); 
 $Ro1=mysql_num_rows($S1); $Ro3=mysql_num_rows($S3); $Ro5=mysql_num_rows($S5); $Ro7=mysql_num_rows($S7);?>	
<body style="background-color:#D7CCE3;">	 
<div id="marqueecontainer" onMouseover="copyspeed=pausespeed" onMouseout="copyspeed=marqueespeed">
<div id="vmarquee" style="position: absolute; width: 98%;">		
<?php  while($RS7=mysql_fetch_array($S7)) { if($RS7['DR']=='Y'){$M='Dr.';}elseif($RS7['Gender']=='M'){$M='Mr.';} elseif($RS7['Gender']=='F' AND $RS7['Married']=='Y'){$M='Mrs.';} elseif($RS7['Gender']=='F' AND $RS7['Married']=='N'){$M='Miss.';} $EmpName=$M.' '.$RS7['Fname'].' '.$RS7['Sname'].' '.$RS7['Lname']; 
		  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$RS7['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
		  $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$RS7['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
		  $sqlHq=mysql_query("select HqName from hrm_headquater where HqId=".$RS7['HqId'], $con); $resHq=mysql_fetch_assoc($sqlHq);?>		  
		  <table>
		   <tr>
		    <td valign="top"><img src="../images/Shield/7.png" style="width:70px;height:70px;" border="0"></td>
		    <td valign="top" style="font-family:Georgia; font-size:12px; overflow:hidden;">
			<font color="#3535FF"><b><?php echo date("d-M-y",strtotime($RS7['DateJoining'])); ?></b></font><br>
		    <?php echo $EmpName; ?><br>
		    Dept - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDept['DepartmentCode']; ?></font><br>
		    Desig - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDesig['DesigName']; ?></font><br>
		    HQ - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resHq['HqName']; ?></font>
		   </td>
		   </tr>
	     </table>  
<?php } while($RS5=mysql_fetch_array($S5)) { if($RS5['DR']=='Y'){$M='Dr.';}elseif($RS5['Gender']=='M'){$M='Mr.';} elseif($RS5['Gender']=='F' AND $RS5['Married']=='Y'){$M='Mrs.';} elseif($RS5['Gender']=='F' AND $RS5['Married']=='N'){$M='Miss.';} $EmpName=$M.' '.$RS5['Fname'].' '.$RS5['Sname'].' '.$RS5['Lname']; 
		  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$RS5['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
		  $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$RS5['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
		  $sqlHq=mysql_query("select HqName from hrm_headquater where HqId=".$RS5['HqId'], $con); $resHq=mysql_fetch_assoc($sqlHq);?>	
		  <table>
		   <tr>
		    <td valign="top"><img src="../images/Shield/5.png" style="width:70px;height:70px;" border="0"></td>
		    <td valign="top" style="font-family:Georgia; font-size:12px; overflow:hidden;">
			<font color="#3535FF"><b><?php echo date("d-M-y",strtotime($RS5['DateJoining'])); ?></b></font><br>
		    <?php echo $EmpName; ?><br>
		    Dept - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDept['DepartmentCode']; ?></font><br>
		    Desig - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDesig['DesigName']; ?></font><br>
		    HQ - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resHq['HqName']; ?></font>
		   </td>
		   </tr>
	     </table>  
<?php } while($RS3=mysql_fetch_array($S3)) { if($RS3['DR']=='Y'){$M='Dr.';}elseif($RS3['Gender']=='M'){$M='Mr.';} elseif($RS3['Gender']=='F' AND $RS3['Married']=='Y'){$M='Mrs.';} elseif($RS3['Gender']=='F' AND $RS3['Married']=='N'){$M='Miss.';} $EmpName=$M.' '.$RS3['Fname'].' '.$RS3['Sname'].' '.$RS3['Lname']; 
		  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$RS3['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
		  $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$RS3['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
		  $sqlHq=mysql_query("select HqName from hrm_headquater where HqId=".$RS3['HqId'], $con); $resHq=mysql_fetch_assoc($sqlHq);?>	
		  <table>
		   <tr>
		    <td valign="top"><img src="../images/Shield/3.png" style="width:70px;height:70px;" border="0"></td>
		    <td valign="top" style="font-family:Georgia; font-size:12px; overflow:hidden;">
			<font color="#3535FF"><b><?php echo date("d-M-y",strtotime($RS3['DateJoining'])); ?></b></font><br>
		    <?php echo $EmpName; ?><br>
		    Dept - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDept['DepartmentCode']; ?></font><br>
		    Desig - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDesig['DesigName']; ?></font><br>
		    HQ - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resHq['HqName']; ?></font>
		   </td>
		   </tr>
	     </table>  
<?php }  while($RS1=mysql_fetch_array($S1)) { if($RS1['DR']=='Y'){$M='Dr.';}elseif($RS1['Gender']=='M'){$M='Mr.';} elseif($RS1['Gender']=='F' AND $RS1['Married']=='Y'){$M='Mrs.';} elseif($RS1['Gender']=='F' AND $RS1['Married']=='N'){$M='Miss.';} $EmpName=$M.' '.$RS1['Fname'].' '.$RS1['Sname'].' '.$RS1['Lname']; 
		  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$RS1['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
		  $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$RS1['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
		  $sqlHq=mysql_query("select HqName from hrm_headquater where HqId=".$RS1['HqId'], $con); $resHq=mysql_fetch_assoc($sqlHq);?>	
		  <table>
		   <tr>
		    <td valign="top"><img src="../images/Shield/1.png" style="width:70px;height:70px;" border="0"></td>
		    <td valign="top" style="font-family:Georgia; font-size:12px; overflow:hidden;">
			<font color="#3535FF"><b><?php echo date("d-M-y",strtotime($RS1['DateJoining'])); ?></b></font><br>
		    <?php echo $EmpName; ?><br>
		    Dept - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDept['DepartmentCode']; ?></font><br>
		    Desig - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDesig['DesigName']; ?></font><br>
		    HQ - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resHq['HqName']; ?></font>
		   </td>
		   </tr>
	     </table>
		   
<?php } ?>	
</div>
</div>
</body></head></html>