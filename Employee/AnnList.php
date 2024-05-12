<?php session_start();
	  $con=mysql_connect('localhost','vnrseed2_hr','vnrhrims321');
	  $db=mysql_select_db('vnrseed2_hrims', $con);
      require_once('StartEmpMenuSession.php');
?>
<html><head>
<style type="text/css"> #marqueecontainer{ position:relative;width:280px;height:180px; padding:0px;padding-left: 0px; } </style>
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
<?php $sqlEventAnn=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DepartmentId,DesigId,HqId,MobileNo_Vnr,MobileNo,Married,MarriageDate,DR from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_personal.MarriageDate!='1970-01-01' AND hrm_employee_personal.MarriageDate_dm>='".date("0000-m-1")."' AND hrm_employee_personal.MarriageDate_dm<='".date("0000-m-31")."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by MarriageDate_dm ASC", $con); $rowAnn=mysql_num_rows($sqlEventAnn); ?>
<body style="background-color:#D7CCE3;">	
<div id="marqueecontainer" onMouseover="copyspeed=pausespeed" onMouseout="copyspeed=marqueespeed">
<div id="vmarquee" style="position: absolute; width: 98%;">		
<?php  $i=1; while($resEventAnn=mysql_fetch_array($sqlEventAnn)) { if($resEventAnn['DR']=='Y'){$M='Dr.';}elseif($resEventAnn['Gender']=='M'){$M='Mr.';} elseif($resEventAnn['Gender']=='F' AND $resEventAnn['Married']=='Y'){$M='Mrs.';} elseif($resEventAnn['Gender']=='F' AND $resEventAnn['Married']=='N'){$M='Miss.';} $EmpNameAnn=$M.' '.$resEventAnn['Fname'].' '.$resEventAnn['Sname'].' '.$resEventAnn['Lname']; 
		  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resEventAnn['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
		  $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resEventAnn['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
		  $sqlHq=mysql_query("select HqName from hrm_headquater where HqId=".$resEventAnn['HqId'], $con); $resHq=mysql_fetch_assoc($sqlHq);?>		   
	 <table>
		 <tr>
		   <td valign="top"><img src="../images/Cack/<?php if($i==1){echo 'r1';}if($i==2){echo 'r2';}if($i==3){echo 'r3';}if($i==4){echo 'r4';}if($i==5){echo 'r5';}if($i==6){echo 'r6';}if($i==7){echo 'r7';}if($i==8){echo 'r8';}if($i==9){echo 'r9';}if($i==10){echo 'r10';}if($i==11){echo 'r11';}if($i==12){echo 'r12';}if($i==13){echo 'r1';}if($i==14){echo 'r2';}if($i==15){echo 'r3';}if($i==16){echo 'r4';}if($i==17){echo 'r5';}if($i==18){echo 'r6';}if($i==19){echo 'r7';}if($i==20){echo 'r8';}if($i==21){echo 'r9';}if($i==22){echo 'r10';}if($i==23){echo 'r11';}if($i==24){echo 'r12';}if($i==25){echo 'r1';}if($i==26){echo 'r2';}if($i==27){echo 'r3';}if($i==28){echo 'r4';}if($i==29){echo 'r5';}if($i==30){echo 'r6';}if($i==31){echo 'r7';}if($i==32){echo 'r8';}if($i==33){echo 'r9';}if($i==34){echo 'r10';}if($i==35){echo 'r11';}if($i==36){echo 'r12';}if($i==37){echo 'r1';}if($i==38){echo 'r2';}if($i==39){echo 'r3';}if($i==40){echo 'r4';}if($i==41){echo 'r5';}if($i==42){echo 'r6';}if($i==43){echo 'r7';}if($i==44){echo 'r8';}if($i==45){echo 'r9';}if($i==46){echo 'r10';}if($i==47){echo 'r11';}if($i==48){echo 'r12';}if($i==49){echo 'r1';}if($i==50){echo 'r2';} ?>.png" style="width:70px;height:70px;" border="0"></td>
		   <td valign="top" style="font-family:Georgia; font-size:12px; overflow:hidden;">
		   <font color="#3535FF" style="font-family:Georgia; font-size:12px;"><b><?php echo date("d M",strtotime($resEventAnn['MarriageDate'])); ?></b></font><br>
		   <?php echo $EmpNameAnn; ?><br>
		   Dept - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDept['DepartmentCode']; ?></font><br>
		   Desig - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDesig['DesigName']; ?></font><br>
		   HQ - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resHq['HqName']; ?></font>
		  </td>
		 </tr>
	    </table>  
<?php $i++; }?>	
</div>
</div>
</body></head></html>