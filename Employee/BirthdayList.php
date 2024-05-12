<?php session_start();
	  $con=mysql_connect('localhost','vnrseed2_hr','vnrhrims321');
	  $db=mysql_select_db('vnrseed2_hrims', $con);
      require_once('StartEmpMenuSession.php');
?>
<html><head>
<style type="text/css"> #marqueecontainer{ position:relative;width:280px;height:180px; padding:0px;padding-left:0px;} </style>
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
<?php $sqlEventDOB=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DepartmentId,DesigId,HqId,MobileNo_Vnr,MobileNo,DOB,Married,DR from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DOB!='1970-01-01' AND hrm_employee_general.DOB_dm>='".date("0000-m-1")."' AND hrm_employee_general.DOB_dm<='".date("0000-m-31")."'  AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by DOB_dm ASC", $con); ?>
<body style="background-color:#D7CCE3;">	
<div id="marqueecontainer" onMouseover="copyspeed=pausespeed" onMouseout="copyspeed=marqueespeed">
<div id="vmarquee" style="position: absolute; width: 98%;">		
<?php      $j=1; while($resEventDOB=mysql_fetch_array($sqlEventDOB)){ if($resEventDOB['DR']=='Y'){$M='Dr.';}elseif($resEventDOB['Gender']=='M'){$M='Mr.';} elseif($resEventDOB['Gender']=='F' AND $resEventDOB['Married']=='Y'){$M='Mrs.';} elseif($resEventDOB['Gender']=='F' AND $resEventDOB['Married']=='N'){$M='Miss.';} $EmpNameDOB=$M.' '.$resEventDOB['Fname'].' '.$resEventDOB['Sname'].' '.$resEventDOB['Lname'];
           $sqlDept2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resEventDOB['DepartmentId'], $con); $resDept2=mysql_fetch_assoc($sqlDept2);
		   $sqlDesig2=mysql_query("select DesigName from hrm_designation where DesigId=".$resEventDOB['DesigId'], $con); $resDesig2=mysql_fetch_assoc($sqlDesig2);
		   $sqlHq2=mysql_query("select HqName from hrm_headquater where HqId=".$resEventDOB['HqId'], $con); $resHq2=mysql_fetch_assoc($sqlHq2);?>		   
	<table>  
		 <tr>
		   <td><img src="../images/Cack/<?php if($j==1){echo 'c1';}if($j==2){echo 'c2';}if($j==3){echo 'c3';}if($j==4){echo 'c4';}if($j==5){echo 'c5';}if($j==6){echo 'c6';}if($j==7){echo 'c7';}if($j==8){echo 'c8';}if($j==9){echo 'c9';}if($j==10){echo 'c10';}if($j==11){echo 'c1';}if($j==12){echo 'c2';}if($j==13){echo 'c3';}if($j==14){echo 'c4';}if($j==15){echo 'c5';}if($j==16){echo 'c6';}if($j==17){echo 'c7';}if($j==18){echo 'c8';}if($j==19){echo 'c9';}if($j==20){echo 'c10';}if($j==21){echo 'c1';}if($j==22){echo 'c2';}if($j==23){echo 'c3';}if($j==24){echo 'c4';}if($j==25){echo 'c5';}if($j==26){echo 'c6';}if($j==27){echo 'c7';}if($j==28){echo 'c8';}if($j==29){echo 'c9';}if($j==30){echo 'c10';}if($j==31){echo 'c1';}if($j==32){echo 'c2';}if($j==33){echo 'c3';}if($j==34){echo 'c4';}if($j==35){echo 'c5';}if($j==36){echo 'c6';}if($j==37){echo 'c7';}if($j==38){echo 'c8';}if($j==39){echo 'c9';}if($j==40){echo 'c10';}if($j==41){echo 'c1';}if($j==42){echo 'c2';}if($j==43){echo 'c3';}if($j==44){echo 'c4';}if($j==45){echo 'c5';}if($j==46){echo 'c6';}if($j==47){echo 'c7';}if($j==48){echo 'c8';}if($j==49){echo 'c9';}if($j==50){echo 'c10';} ?>.png" style="width:70px;height:70px;" border="0"></td>
		   <td valign="top" style="font-family:Georgia; font-size:12px;overflow:hidden;">
		   <font color="#3535FF" style="font-family:Georgia; font-size:12px;"><b><?php echo date("d M",strtotime($resEventDOB['DOB'])); ?></b></font><br>
		   <?php echo $EmpNameDOB; ?><br>
		   Dept - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDept2['DepartmentCode']; ?></font><br>
		   Desig - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDesig2['DesigName']; ?></font><br>
		   HQ - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resHq2['HqName']; ?></font>
		  </td>
		 </tr>
	    </table>  
<?php $j++; }?>	
</div>
</div>
</body></head></html>