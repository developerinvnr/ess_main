<?php session_start();
require_once('../AdminUser/config/config.php');
$sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$_REQUEST['c']." AND Process='KRA'", $con); $resSY=mysql_fetch_array($sqlSY); $spms = mysql_query("select UnLckKRA from hrm_employee_pms where EmployeeID=".$_REQUEST['eid']." AND AssessmentYear=".$resSY['CurrY'],$con); $rpms=mysql_fetch_assoc($spms); 


if($_REQUEST['n']==1){ $fn='KRAId'; $sqlk=mysql_query("select KRA,KRA_Description from hrm_pms_kra where KRAId=".$_REQUEST['kid'],$con); }elseif($_REQUEST['n']==2){ $fn='KRASubId'; $sqlk=mysql_query("select KRA,KRA_Description from hrm_pms_krasub where KRASubId=".$_REQUEST['kid'],$con); } $resk=mysql_fetch_assoc($sqlk);

if($_REQUEST['prd']=='Monthly')
{ $countrow=12; $tit='Month'; $num=12; $tgt=round(($_REQUEST['tgt']/12),2); $wgt=round(($_REQUEST['wgt']/12),2); }
elseif($_REQUEST['prd']=='Quarter')
{ $countrow=4; $tit='Quarter'; $num=4; $tgt=round($_REQUEST['tgt']/4); $wgt=round(($_REQUEST['wgt']/4),2); }
elseif($_REQUEST['prd']=='1/2 Annual')
{ $countrow=2; $tit='Year'; $num=2; $tgt=round($_REQUEST['tgt']/2); $wgt=round(($_REQUEST['wgt']/2),2); } 

if($_REQUEST['actionv']=='revert')
{
 
 $sqlu=mysql_query("update hrm_pms_kra_tgtdefin set lockk=2,Applockk=0,AppRevert='Y' where TgtDefId=".$_REQUEST['revertId'],$con); 
 if($sqlu){ echo '<script>alert("Revert Successfully!"); window.location="setkrapptgt.php?act=setkratgt&n='.$_REQUEST['n'].'&valueins=true&checkalpha=false&d=12&pa=4&y=2&kid='.$_REQUEST['kid'].'&prd='.$_REQUEST['prd'].'&yy=t1t&tgt='.$_REQUEST['tgt'].'&e='.$_REQUEST['e'].'&lgc='.$_REQUEST['lgc'].'&wgt='.$_REQUEST['wgt'].'&row='.$_REQUEST['row'].'&row2='.$_REQUEST['row2'].'&eid='.$_REQUEST['eid'].'&c='.$_REQUEST['c'].'"; </script>'; }
}


?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta charset="windows-1252">

<title>Target Define</title>
<style>.h{font-size:16px;font-family:Georgia;text-align:center;font-weight:bold;color:#FFF;}
.t{font-size:12px;font-family:Georgia;text-align:center;font-weight:bold;color:#FFFFFF;}
.d{font-size:12px;font-family:Georgia;color:#000000;}
.blink_me { animation: blinker 1s linear infinite; }
@keyframes blinker {  50% { opacity: 0; } }
.msg_g{ font-family:Times New Roman;font-size:18px;font-weight:bold;color:#006600;}
.msg_r{ font-family:Times New Roman;font-size:20px;font-weight:bold;color:#FFC1C1;}
.msg_y{ font-family:Times New Roman;font-size:18px;font-weight:bold;color:#FFFF79;}
.msg_b{ font-family:Times New Roman;font-size:18px;font-weight:bold;color:#0075EA;}
</style>
<script type="text/javascript" src="js/Prototype.js"></script><?php /* Ajax */ ?>
<script type="text/javascript" language="javascript">
function FunEdit(i)
{
 document.getElementById("edit_"+i).style.display='none'; document.getElementById("save_"+i).style.display='block';
 document.getElementById("Ach"+i).readOnly=false; document.getElementById("Ach"+i).style.background='#FFF';
 document.getElementById("Cmnt"+i).readOnly=false; document.getElementById("Cmnt"+i).style.background='#FFF';
 document.getElementById("TD1"+i).style.background='#FFF'; document.getElementById("TD2"+i).style.background='#FFF';
}

function FunSave(i,id)
{
 var ach=document.getElementById("Ach"+i).value; var cmnt=document.getElementById("Cmnt"+i).value;
 var LogScr=document.getElementById("LogScr"+i).value; var Scor=document.getElementById("Scor"+i).value; 
 var fn=document.getElementById("fn").value; var kid=document.getElementById("kid").value;
 
 if(ach==''){ alert("please insert reporting rating"); return false;} 
 else if(cmnt==''){ alert("please type remark"); return false;}
 else
 {
  var cmt=cmnt.replace(/[`~!@#$^&*_|+\-=÷¿?;:'"<>\{\}\[\]\\\/]/gi, ''); 
  var url = 'setkrapptgtact.php'; var pars = 'ach='+ach+'&cmnt='+cmt+'&id='+id+'&i='+i+'&fn='+fn+'&kid='+kid+'&scor='+Scor+'&logscr='+LogScr;
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_result });
 }
}
function show_result(originalRequest)
{ document.getElementById('ResultSpan').innerHTML = originalRequest.responseText; 
  var i=document.getElementById('ir').value; var rst=document.getElementById('rst').value;
  if(rst==1)
  {
   alert("Data saved successfully!"); 
   //document.getElementById("totAch").value=document.getElementById("tAch").value;
   document.getElementById("edit_"+i).style.display='block'; document.getElementById("save_"+i).style.display='none'; 
   document.getElementById("Ach"+i).readOnly=true; document.getElementById("Ach"+i).style.background='#D5FFAA';
   document.getElementById("Cmnt"+i).readOnly=true; document.getElementById("Cmnt"+i).style.background='#D5FFAA';
   document.getElementById("TD1"+i).style.background='#D5FFAA'; document.getElementById("TD2"+i).style.background='#D5FFAA';
   document.getElementById("lockk_"+i).style.display='block';
  }
}


function FunLk(i,id)
{
  var agree=confirm("Do you want to submit?");
  if(agree)
  {
   var url = 'setkrapptgtact.php'; var pars = 'lockk=OkLock&id='+id+'&i='+i;
   var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_result2 });
  }
  else{return false;}
}
function show_result2(originalRequest)
{ document.getElementById('ResultSpan').innerHTML = originalRequest.responseText; 
  var i2=document.getElementById('ir2').value; var rst2=document.getElementById('rst2').value;
  if(rst2==1)
  {
   alert("Achivement submitted successfully!"); 
   document.getElementById("edit_"+i2).style.display='none'; 
   document.getElementById("lockk_"+i2).style.display='none'; document.getElementById("ok_"+i2).style.display='block';
  }
}

function FunEnterAch(v,i) //LogScr Scor
{ 
 var lgc=document.getElementById("lgc").value; var wgt=document.getElementById("wgt"+i).value; 
 var tgt=parseFloat(document.getElementById("tgt"+i).value);
 var ach=Math.round(((tgt*v)/100)*100)/100; //var ach=parseFloat(v);  
 var EAch=document.getElementById("AchScore"+i).value=ach;
 
 if(lgc=='Logic1')
 { 
  //var Per50=Math.round((tgt/2)*100)/100; 
  var Per50=Math.round(((tgt*20)/100)*100)/100; var Per150=Math.round((tgt+Per50)*100)/100;
  if(ach<=Per150){var EScore=document.getElementById("LogScr"+i).value=ach;}
  else{var EScore=document.getElementById("LogScr"+i).value=Per150;} 
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
 else if(lgc=='Logic2')
 {
  if(ach<=tgt){var EScore=document.getElementById("LogScr"+i).value=ach;}
  else{var EScore=document.getElementById("LogScr"+i).value=tgt;}
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
 else if(lgc=='Logic3')
 {
  if(ach==tgt){var EScore=document.getElementById("LogScr"+i).value=ach;}
  else{var EScore=document.getElementById("LogScr"+i).value=0;}
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
 else if(lgc=='Logic4')
 {
  if(ach>=tgt){var EScore=document.getElementById("LogScr"+i).value=tgt;}
  else{var EScore=document.getElementById("LogScr"+i).value=0;}
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
 else if(lgc=='Logic5')
 {
  var Per30=Math.round(((tgt*30)/100)*100)/100; var Per70=Math.round((tgt-Per30)*100)/100;
  if(ach>=Per70 && ach<tgt){var EScore=document.getElementById("LogScr"+i).value=ach;}
  else if(ach>=tgt){var EScore=document.getElementById("LogScr"+i).value=tgt;}
  else{var EScore=document.getElementById("LogScr"+i).value=0;}
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
 else if(lgc=='Logic6')
 {
  if(tgt==8.33){ach=ach*12;}else if(tgt==25){ach=ach*4;}else if(tgt==50){ach=ach*2;}else{ach=ach;}
  var Per150=Math.round(((tgt*150)/100)*100)/100; var Per125=Math.round(((tgt*125)/100)*100)/100;
  var Per100=Math.round(((tgt*100)/100)*100)/100; var Per85=Math.round(((tgt*85)/100)*100)/100;
  var Per75=Math.round(((tgt*75)/100)*100)/100; var PerAct=Math.round(((tgt*ach)/100)*100)/100; 
  var ScoAct=Math.round((tgt-PerAct)*100)/100;
  
  if(ach<=10){var EScore=document.getElementById("LogScr"+i).value=Per150;}
  else if(ach>10 && ach<=15){var EScore=document.getElementById("LogScr"+i).value=Per125;}
  else if(ach>15 && ach<=20){var EScore=document.getElementById("LogScr"+i).value=Per100;}
  else if(ach>20 && ach<=25){var EScore=document.getElementById("LogScr"+i).value=Per85;}
  else if(ach>25 && ach<=30){var EScore=document.getElementById("LogScr"+i).value=Per75;}
  else{var EScore=document.getElementById("LogScr"+i).value=0;}
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
 else if(lgc=='Logic7')
 { 
  if(tgt==8.33){ach=ach*12;}else if(tgt==25){ach=ach*4;}else if(tgt==50){ach=ach*2;}else{ach=ach;}
  var Per150=Math.round(((tgt*150)/100)*100)/100; var Per100=Math.round(((tgt*100)/100)*100)/100;
  var Per90=Math.round(((tgt*90)/100)*100)/100; var Per75=Math.round(((tgt*75)/100)*100)/100;
  var PerAct=Math.round(((tgt*ach)/100)*100)/100; var ScoAct=Math.round((tgt-PerAct)*100)/100;
  
  if(ach==0){var EScore=document.getElementById("LogScr"+i).value=Per150;}
  else if(ach>0 && ach<=2){var EScore=document.getElementById("LogScr"+i).value=Per100;}
  else if(ach>2 && ach<=5){var EScore=document.getElementById("LogScr"+i).value=Per90;}
  else if(ach>5 && ach<=10){var EScore=document.getElementById("LogScr"+i).value=Per75;}
  else{var EScore=document.getElementById("LogScr"+i).value=0;} 
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
 else if(lgc=='Logic8a')
 {
  var Percent=((ach/tgt)*115)/100; 
  var MScore=document.getElementById("Scor"+i).value=Math.round((Percent*wgt)*100)/100;
 }
 else if(lgc=='Logic8b')
 {
  var Percent=((ach/tgt)*100)/100; 
  var MScore=document.getElementById("Scor"+i).value=Math.round((Percent*wgt)*100)/100;
 }
 else if(lgc=='Logic8c')
 {
  var Percent=((ach/tgt)*90)/100; 
  var MScore=document.getElementById("Scor"+i).value=Math.round((Percent*wgt)*100)/100;
 }
 else if(lgc=='Logic8d')
 {
  var Percent=((ach/tgt)*65)/100; 
  var MScore=document.getElementById("Scor"+i).value=Math.round((Percent*wgt)*100)/100;
 }
 else if(lgc=='Logic8e')
 {
  var Percent=((ach/tgt)*(-100))/100; 
  var MScore=document.getElementById("Scor"+i).value=Math.round((Percent*wgt)*100)/100;
 }
 else if(lgc=='Logic9')
 {
  var Per10=Math.round(((tgt*10)/100)*100)/100; var Per90=Math.round((tgt-Per10)*100)/100;
  if(ach<Per90){var EScore=document.getElementById("LogScr"+i).value=ach;}
  else if(ach>=Per90){var EScore=document.getElementById("LogScr"+i).value=tgt;}
  else{var EScore=document.getElementById("LogScr"+i).value=0;}
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
 else if(lgc=='Logic10')
 {
 var Per1=Math.round(((tgt*1)/100)*100)/100; var Per2=Math.round(((tgt*2)/100)*100)/100; 
 var Per3=Math.round(((tgt*3)/100)*100)/100; var Per5=Math.round(((tgt*5)/100)*100)/100; 
 var Per6=Math.round(((tgt*6)/100)*100)/100; var Per7=Math.round(((tgt*7)/100)*100)/100; 
 var Per10=Math.round(((tgt*10)/100)*100)/100; var Per20=Math.round(((tgt*20)/100)*100)/100;
 var Per90=Math.round((tgt-Per10)*100)/100; var Per91=Math.round((Per90+Per1)*100)/100;
 var Per93=Math.round((Per90+Per3)*100)/100; var Per94=Math.round((tgt-Per6)*100)/100;
 var Per97=Math.round((tgt-Per3)*100)/100; var Per98=Math.round((tgt-Per2)*100)/100;
 var Per98=Math.round((tgt-Per2)*100)/100; var Per105=Math.round((tgt+Per5)*100)/100;
 var Per110=Math.round((tgt+Per10)*100)/100; var Per120=Math.round((tgt+Per20)*100)/100;
  
  if(ach<Per90){var EScore=document.getElementById("LogScr"+i).value=0;}
  else if(ach==Per90){var EScore=document.getElementById("LogScr"+i).value=tgt;}
  else if(ach>Per90 && ach<=Per93){var EScore=document.getElementById("LogScr"+i).value=Per105;}
  else if(ach>Per93 && ach<=Per97){var EScore=document.getElementById("LogScr"+i).value=Per110;}
  else if(ach>Per97){var EScore=document.getElementById("LogScr"+i).value=Per120;}
  else{var EScore=document.getElementById("LogScr"+i).value=0;}
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
 else if(lgc=='Logic11')
 { 
  var EScore=document.getElementById("LogScr"+i).value=ach; 
  var MScore=document.getElementById("Scor"+i).value=Math.round(((tgt/EScore)*wgt)*100)/100;
 }
  
 //var EScore=document.getElementById("Scor"+i).value=Math.round(((ach/tgt)*wgt)*100)/100; 
 //var Score=document.getElementById("KraScore"+i).value=Math.round((EScore)*100)/100;
  
 var num=document.getElementById("numr").value;
 if(num==2)
 {
  var a1= parseFloat(document.getElementById("Ach"+1).value); var a2= parseFloat(document.getElementById("Ach"+2).value); var s1= parseFloat(document.getElementById("LogScr"+1).value); var s2= parseFloat(document.getElementById("LogScr"+2).value);  var t1= parseFloat(document.getElementById("Scor"+1).value); var t2= parseFloat(document.getElementById("Scor"+2).value); 
  document.getElementById("totAch").value=Math.round((a1+a2)*100)/100; 
  document.getElementById("TotLogScr").value=Math.round((s1+s2)*100)/100;
  document.getElementById("TotScore").value=Math.round((t1+t2)*100)/100;
 }
 else if(num==4)
 {

  var a1= parseFloat(document.getElementById("Ach"+1).value); var a2= parseFloat(document.getElementById("Ach"+2).value); var a3= parseFloat(document.getElementById("Ach"+3).value); var a4= parseFloat(document.getElementById("Ach"+4).value); var s1= parseFloat(document.getElementById("LogScr"+1).value); var s2= parseFloat(document.getElementById("LogScr"+2).value); var s3= parseFloat(document.getElementById("LogScr"+3).value); var s4= parseFloat(document.getElementById("LogScr"+4).value); var t1= parseFloat(document.getElementById("Scor"+1).value); var t2= parseFloat(document.getElementById("Scor"+2).value); var t3= parseFloat(document.getElementById("Scor"+3).value); var t4= parseFloat(document.getElementById("Scor"+4).value);
  document.getElementById("totAch").value=Math.round((a1+a2+a3+a4)*100)/100; 
  document.getElementById("TotLogScr").value=Math.round((s1+s2+s3+s4)*100)/100;
  document.getElementById("TotScore").value=Math.round((t1+t2+t3+t4)*100)/100;
 }
 else if(num==12)
 {
  var a1= parseFloat(document.getElementById("Ach"+1).value); var a2= parseFloat(document.getElementById("Ach"+2).value); var a3= parseFloat(document.getElementById("Ach"+3).value); var a4= parseFloat(document.getElementById("Ach"+4).value); var a5= parseFloat(document.getElementById("Ach"+5).value); var a6= parseFloat(document.getElementById("Ach"+6).value); var a7= parseFloat(document.getElementById("Ach"+7).value); var a8= parseFloat(document.getElementById("Ach"+8).value); var a9= parseFloat(document.getElementById("Ach"+9).value); var a10= parseFloat(document.getElementById("Ach"+10).value); var a11= parseFloat(document.getElementById("Ach"+11).value); var a12= parseFloat(document.getElementById("Ach"+12).value); var s1= parseFloat(document.getElementById("LogScr"+1).value); var s2= parseFloat(document.getElementById("LogScr"+2).value); var s3= parseFloat(document.getElementById("LogScr"+3).value); var s4= parseFloat(document.getElementById("LogScr"+4).value); var s5= parseFloat(document.getElementById("LogScr"+5).value); var s6= parseFloat(document.getElementById("LogScr"+6).value); var s7= parseFloat(document.getElementById("LogScr"+7).value); var s8= parseFloat(document.getElementById("LogScr"+8).value); var s9= parseFloat(document.getElementById("LogScr"+9).value); var s10= parseFloat(document.getElementById("LogScr"+10).value); var s11= parseFloat(document.getElementById("LogScr"+11).value); var s12= parseFloat(document.getElementById("LogScr"+12).value); var t1= parseFloat(document.getElementById("Scor"+1).value); var t2= parseFloat(document.getElementById("Scor"+2).value); var t3= parseFloat(document.getElementById("Scor"+3).value); var t4= parseFloat(document.getElementById("Scor"+4).value); var t5= parseFloat(document.getElementById("Scor"+5).value); var t6= parseFloat(document.getElementById("Scor"+6).value); var t7= parseFloat(document.getElementById("Scor"+7).value); var t8= parseFloat(document.getElementById("Scor"+7).value); var t9= parseFloat(document.getElementById("Scor"+9).value); var t10= parseFloat(document.getElementById("Scor"+10).value); var t11= parseFloat(document.getElementById("Scor"+11).value); var t12= parseFloat(document.getElementById("Scor"+12).value);
  document.getElementById("totAch").value=Math.round((a1+a2+a3+a4+a5+a6+a7+a8+a9+a10+a11+a12)*100)/100;
  document.getElementById("TotLogScr").value=Math.round((s1+s2+s3+s4+s5+s6+s7+s8+s9+s10+s11+s12)*100)/100;
  document.getElementById("TotScore").value=Math.round((t1+t2+t3+t4+t5+t6+t7+t8+t9+t10+t11+t12)*100)/100;
 }
 
 
 

}

function isNumberKey(evt)
{
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
  return false; return true;
}

function funRevert(id)
{
 var agree=confirm("Are you sure?");
 if(agree)
 {
  var prd=document.getElementById("prd").value; var tgt=document.getElementById("tgt").value;
  var kid=document.getElementById("kid").value; var nn=document.getElementById("nn").value;
  var e=document.getElementById("e").value; var lgc=document.getElementById("lgc").value;
var wgt=document.getElementById("wgt").value; var row=document.getElementById("row").value;
var row2=document.getElementById("row2").value; var eid=document.getElementById("eid").value;
var c=document.getElementById("c").value; 
window.location="setkrapptgt.php?act=setkratgt&n="+nn+"&valueins=true&checkalpha=false&d=12&pa=4&y=2&kid="+kid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&actionv=revert&revertId="+id+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&row="+row+"&row2="+row2+"&eid="+eid+"&c="+c;  
 }
 else
 {
  return false;
 }
}



</script>

</head>
<?php if($_SESSION['EmployeeID']==$_REQUEST['e']){  ?>
<body bgcolor="#6C6C00">
<span id="ResultSpan"></span>
<?php for($i=1; $i<=12; $i++){ ?>
<input type="hidden" id="AchScore<?php echo $i; ?>" value="0" />
<input type="hidden" id="KraScore<?php echo $i; ?>" value="0" />
<?php } ?>
<?php $sqle=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentId,DateJoining from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$_REQUEST['eid'],$con);
      $rese=mysql_fetch_assoc($sqle); ?>
<center>
<table style="width:100%;">
 <tr>
  <td style="width:100%;" valign="top">
   <table align="center" border="0" cellspacing="1">
    <tr><td colspan="15" class="h"><u>Define Target</u></td></tr>
    <tr><td>&nbsp;</td></tr>
	<tr><td colspan="10" style="font-size:18px;font-family:Times New Roman;" align="center"><font color="#fff"><u>Note</u>:&nbsp;</font><font class="msg_r"><span class="blink_me">Please ensure that the achievement is calculated against the <b>"Target Value"</b> only</span></font></td></tr>
    
	<tr><td>&nbsp;</td></tr>
	<tr><td colspan="15"><font color="#9BFFFF">Name:</font>&nbsp;<font color="#FFFFFF"><?php echo $rese['EmpCode'].': '.$rese['Fname'].' '.$rese['Sname'].' '.$rese['Lname']; ?></font></td></tr>
	<tr><td colspan="15"><font color="#9BFFFF">Logic:</font>&nbsp;<font color="#FFFFFF"><?php echo $_REQUEST['lgc']; ?></font>&nbsp;,&nbsp;<font color="#9BFFFF">KRA:</font>&nbsp;<font color="#FFFFFF"><?php echo $resk['KRA']; ?></font></td></tr><tr><td colspan="15"><font color="#9BFFFF">Description:</font>&nbsp;<font color="#FFFFFF"><?php echo $resk['KRA_Description']; ?></td></font></tr>	
    <tr style="background-color:#CC9900;height:25px;">
	 <td rowspan="2" class="t" style="width:40px;">Sn</td>
	 <td rowspan="2" class="t" style="width:80px;"><?php echo $tit; ?></td>
	 <td rowspan="2" class="t" style="width:50px;">Weigh<br>tage</td>
	 <td rowspan="2" class="t" style="width:50px;">Target <?php if($_REQUEST['lgc']=='Logic6' OR $_REQUEST['lgc']=='Logic7'){echo '<p><font color="#FFFF00">Sales Return</font>'; } ?></td>
	 <td rowspan="2" class="t" style="width:200px;">Activity Performed</td>
	 <td colspan="3" class="t"><?php if($_REQUEST['lgc']!='Logic6' AND $_REQUEST['lgc']!='Logic7'){ ?>Employee Achivement Deatis<?php }else{ ?>Employee Sales Return Details<?php } ?></td>
	 <td colspan="3" class="t"><?php if($_REQUEST['lgc']!='Logic6' AND $_REQUEST['lgc']!='Logic7'){ ?>Appraiser Achivement Deatis<?php }else{ ?>Appraiser Sales Return Details<?php } ?></td>
	 <td rowspan="2" class="t" style="width:40px;">Revert</td>
	 <td rowspan="2" class="t" style="width:40px;">Edit</td>
	 <td rowspan="2" class="t" style="width:40px;">Submit</td>
	</tr>
	<tr style="height:25px;">
	 <td class="t" style="background-color:#CC9900;width:50px;color:#FFF;"><?php if($_REQUEST['lgc']!='Logic6' AND $_REQUEST['lgc']!='Logic7'){ ?>Self Rating<?php }elseif($_REQUEST['lgc']=='Logic6'){ ?>FC<br>(in %)<?php }elseif($_REQUEST['lgc']=='Logic7'){ ?>VC<br>(in %)<?php } ?></td>
	 <td class="t" style="background-color:#CC9900;width:200px;color:#FFF;">Remark</td>
	 <!--<td class="t" style="background-color:#CC9900;width:50px;color:#FFF;">Allow Logic</td>-->
	 <td class="t" style="background-color:#CC9900;width:50px;color:#FFF;">Score</td>
	 <td class="t" style="background-color:#9FCFFF;width:50px;color:#000000;"><?php if($_REQUEST['lgc']!='Logic6' AND $_REQUEST['lgc']!='Logic7'){ ?>Rep Rating<?php }elseif($_REQUEST['lgc']=='Logic6'){ ?>FC<br>(in %)<?php }elseif($_REQUEST['lgc']=='Logic7'){ ?>VC<br>(in %)<?php } ?></td>
	 <td class="t" style="background-color:#9FCFFF;width:200px;color:#000000;">Remark</td>
	 <!--<td class="t" style="background-color:#9FCFFF;width:50px;color:#000000;">Allow Logic</td>-->
	 <td class="t" style="background-color:#9FCFFF;width:50px;color:#000000;">Score</td>
	</tr>
<form name="TgtForm" method="post" onSubmit="return ValidatCmt(this)">	
<input type="hidden" name="numr" id="numr" value="<?php echo $num; ?>"/>
<input type="hidden" name="fn" id="fn" value="<?php echo $fn; ?>"/>
<input type="hidden" name="kid" id="kid" value="<?php echo $_REQUEST['kid']; ?>"/>
<input type="hidden" name="lgc" id="lgc" value="<?php echo $_REQUEST['lgc']; ?>"/>
<input type="hidden" name="wgt" id="wgt" value="<?php echo $_REQUEST['wgt']; ?>"/>

<input type="hidden" id="e" value="<?php echo $_REQUEST['e']; ?>" /> 
<input type="hidden" id="lgc" value="<?php echo $_REQUEST['lgc']; ?>" />
<input type="hidden" id="wgt" value="<?php echo $_REQUEST['wgt']; ?>" />
<input type="hidden" id="row" value="<?php echo $_REQUEST['row']; ?>" />
<input type="hidden" id="row2" value="<?php echo $_REQUEST['row2']; ?>" />
<input type="hidden" id="eid" value="<?php echo $_REQUEST['eid']; ?>" />
<input type="hidden" id="c" value="<?php echo $_REQUEST['c']; ?>" />

<input type="hidden" id="prd" value="<?php echo $_REQUEST['prd']; ?>" /> 
<input type="hidden" id="tgt" value="<?php echo $_REQUEST['tgt']; ?>" /> 
<input type="hidden" id="kid" value="<?php echo $_REQUEST['kid']; ?>" /> 	
<input type="hidden" id="nn" value="<?php echo $_REQUEST['n']; ?>" /> 

	<?php for($i=1; $i<=$num; $i++){ ?>
	<tr style="background-color:#FFFFFF;height:24px;">
	 <td class="d" align="center"><?php echo $i; ?></td>
	 <td class="d" align="center">
	  <?php 
	    if($_REQUEST['prd']=='Monthly')
		{ 
		 if($i==1){$t='January'; $ld=date("Y-02-28"); }elseif($i==2){$t='February'; $ld=date("Y-02-28"); }elseif($i==3){$t='March'; $ld=date("Y-03-31"); }elseif($i==4){$t='April';$ld=date("Y-04-30"); }elseif($i==5){$t='May'; $ld=date("Y-05-31"); }elseif($i==6){$t='June'; $ld=date("Y-06-30"); }elseif($i==7){$t='July'; $ld=date("Y-07-31"); }elseif($i==8){$t='August'; $ld=date("Y-08-31"); }elseif($i==9){$t='September'; $ld=date("Y-09-30"); }elseif($i==10){$t='October'; $ld=date("Y-10-31"); }elseif($i==11){$t='November'; $ld=date("Y-11-30"); }elseif($i==12){$t='December'; $ld=date("Y-12-31"); } 
		}	
        elseif($_REQUEST['prd']=='Quarter')
		{ 
		 if($i==1){$t='Quarter 1'; $ld=date("Y-03-31"); }elseif($i==2){$t='Quarter 2'; $ld=date("Y-06-30"); }elseif($i==3){$t='Quarter 3'; $ld=date("Y-09-30"); }elseif($i==4){$t='Quarter 4'; $ld=date("Y-12-31"); } 
		}
        elseif($_REQUEST['prd']=='1/2 Annual')
		{ 
		 if($i==1){$t='Half Year 1'; $ld=date("Y-06-30"); }elseif($i==2){$t='Half Year 2'; $ld=date("Y-12-31"); } 
		}
		
		echo $t; ?><input type="hidden" name="tit<?php echo $i; ?>" value="<?php echo $t; ?>"/>
	 </td>

<?php $sql=mysql_query("select * from hrm_pms_kra_tgtdefin where ".$fn."=".$_REQUEST['kid']." AND Tital='".$t."' AND NtgtN='".$i."'",$con); $row=mysql_num_rows($sql); $res=mysql_fetch_assoc($sql); ?>	 
	 
	 <td class="d" align="center"><?php if($row>0){echo floatval($res['Wgt']);}//else{echo floatval($wgt);} ?></td>
	 <td class="d" align="center"><?php if($_REQUEST['lgc']!='Logic6' AND $_REQUEST['lgc']!='Logic7'){ if($row>0){echo 100;} }else{ echo '0%'; } ?><?php //if($row>0){echo floatval($res['Tgt']);}//else{echo floatval($tgt);} ?>
	 <input type="hidden" id="wgt<?php echo $i; ?>" name="wgt<?php echo $i; ?>" value="<?php if($row>0){echo floatval($res['Wgt']);}else{echo floatval($wgt);} ?>"/>
	 <input type="hidden" id="tgt<?php echo $i; ?>" name="tgt<?php echo $i; ?>" value="<?php if($row>0){echo floatval($res['Tgt']);}else{echo floatval($tgt);} ?>"/>
	 <?php //if($row>0){echo floatval($res['Tgt']);}else{echo floatval($tgt);} ?>
	 
	 <input type="hidden" id="NtgtN<?php echo $i; ?>" name="NtgtN<?php echo $i; ?>" value="<?php echo $i; ?>"/>
	 </td>  

	 <td class="d" id="TDD<?php echo $i; ?>" valign="top"><?php if($row>0){echo $res['Remark'];}//else{echo $resk['KRA'];}?>	
	 <input type="hidden" name="ld<?php echo $i; ?>" value="<?php if($row>0 AND $res['Ldate']!='0000-00-00' AND $res['Ldate']!='1970-01-01'){ echo $res['Ldate']; }else{ echo $ld; } ?>"/>
	 </td>
	 
	 <td class="d" bgcolor="#FFFFC6" align="center"><?php if($res['Cmnt']!='' || $res['Ach']>0){ echo floatval($res['Ach']); }else{echo '';} ?></td>
	 <td class="d" bgcolor="#FFFFC6" valign="top"><?php echo $res['Cmnt']; ?></td>
	 
	 <?php /*?><td class="d" bgcolor="#FFFFC6" align="center"><?php if($res['LogScr']!=''){ echo $res['LogScr'];}else{echo 0;} ?></td><?php */?>
	 
	 <td class="d" bgcolor="#FFFFC6" align="center"><?php if($res['Cmnt']!='' || $res['Ach']>0){ echo floatval($res['Scor']); }else{echo '';} ?></td>
	 
	 <td class="d" bgcolor="#D5FFAA" id="TD1<?php echo $i; ?>"><input type="text" name="Ach<?php echo $i; ?>" id="Ach<?php echo $i; ?>" class="d" style="width:50px;background-color:#D5FFAA;text-align:center;" onKeyUp="FunEnterAch(this.value,<?php echo $i; ?>)" onChange="FunEnterAch(this.value,<?php echo $i; ?>)" value="<?php if($res['AppCmnt']!='' || $res['AppAch']>0){ echo floatval($res['AppAch']); }else{echo '';} ?>" maxlength="4" onKeyPress="return isNumberKey(event)" readonly/></td>
	 <td class="d" bgcolor="#D5FFAA" id="TD2<?php echo $i; ?>" valign="top"><textarea type="text" name="Cmnt<?php echo $i; ?>" id="Cmnt<?php echo $i; ?>" class="d" style="width:200px;border:hidden;background-color:#D5FFAA;"><?php echo $res['AppCmnt']; ?></textarea>
	 
	 <input type="hidden" name="LogScr<?php echo $i; ?>" id="LogScr<?php echo $i; ?>" class="d" style="width:50px;border:hidden;background-color:#D5FFAA;text-align:center;" value="<?php if($res['AppLogScr']!=''){ echo $res['AppLogScr'];}else{echo 0;} ?>" readonly/>
	 </td>
	 
	 <?php /*?><td class="d" bgcolor="#D5FFAA" id="TD2<?php echo $i; ?>"><input type="text" name="LogScr<?php echo $i; ?>" id="LogScr<?php echo $i; ?>" class="d" style="width:50px;border:hidden;background-color:#D5FFAA;text-align:center;" value="<?php if($res['AppLogScr']!=''){ echo $res['AppLogScr'];}else{echo 0;} ?>" readonly/></td><?php */?>
	 
	 <td class="d" bgcolor="#D5FFAA" id="TD2<?php echo $i; ?>"><input type="text" name="Scor<?php echo $i; ?>" id="Scor<?php echo $i; ?>" class="d" style="width:50px;border:hidden;background-color:#D5FFAA;text-align:center;" value="<?php if($res['AppScor']!=''){ echo $res['AppScor'];}else{echo 0;} ?>" readonly/></td>
	 
	  
	<td align="center">
<?php $mchk=date("m",strtotime($res['Ldate'])); 
	 if($mchk==1){$LDate=date("Y-02-28");}
	 elseif($rese['DepartmentId']==6 && $res['Tital']=='Half Year 1' && $res['Ldate']==date('Y-06-30'))
{$LDate=date("Y-09-30");}
elseif($rese['DepartmentId']==6 && ($res['Tital']=='Quarter 1' || $res['Tital']=='Quarter 2') && ($res['Ldate']==date('Y-03-31') || $res['Ldate']==date('Y-06-30')))
{$LDate=date("Y-09-30");}
else{$LDate=$res['Ldate'];} //echo '-'.$LDate;
	 
	 $Nxt14Day=date("Y-m-d",strtotime('+15 day', strtotime(date($LDate))));
	 
	 ?>	    
	    
	    
	    
<?php /* $mchk=date("m",strtotime($res['Ldate'])); 
if($mchk==1){$LDate=date("Y-02-28");}
elseif($rese['DepartmentId']==6 && $res['Tital']=='Half Year 1' && $res['Ldate']=='2020-06-30'){$LDate=date("2020-07-31");}
else{$LDate=$res['Ldate'];} ?>	
<?php $Nxt14Day=date("Y-m-d",strtotime('+15 day', strtotime(date($LDate)))); //date("2020-05-01") //$LDate //if($res['lockk']==1) */ ?>

	 <?php if($res['Ach']>0){ ?><span style="cursor:pointer"><img src="images/go-back-icon.png" onClick="funRevert(<?php echo $res['TgtDefId']; ?>)"></span><?php } ?>
	 </td>  
	  
	<td align="center">
	 <?php if($res['Tital']!='' AND $res['Tgt']!==''){ ?>
	  <span style="cursor:pointer;">
	  
	  <img src="images/edit.png" border="0" id="edit_<?php echo $i; ?>" style="display:<?php if(($res['Wgt']>0 AND $res['Tgt']>0 AND $res['Applockk']==0 AND date("Y-m-d")<=$Nxt14Day) OR ($res['Wgt']>0 AND $res['Tgt']>0 AND $res['Applockk']==0 AND $rpms['UnLckKRA']==1)){echo 'block';}else{echo 'none';} ?>" onClick="FunEdit(<?php echo $i; ?>)"/>
	  
	  </span>
	  <span style="cursor:pointer"><img src="images/Floppy-Small-icon.png" border="0" id="save_<?php echo $i; ?>" style="display:none;" onClick="FunSave(<?php echo $i.','.$res['TgtDefId']; ?>)"/></span>
	 <?php } ?> 
	 </td>
	 <td align="center">
	  <img src="images/ok.png" border="0" id="ok_<?php echo $i; ?>" style="display:<?php if($res['AppAch']!='' AND $res['AppCmnt']!=='' AND $res['Applockk']==1){echo 'block';}else{echo 'none';} ?>;"/>
	  <span style="cursor:pointer"><img src="images/sub.png" border="0" id="lockk_<?php echo $i; ?>" style="display:<?php if($res['AppAch']!='' AND $res['AppCmnt']!=='' AND $res['Applockk']==0  AND date("Y-m-d")<=$Nxt14Day){echo 'block';}else{echo 'none';} ?>;" onClick="FunLk(<?php echo $i.','.$res['TgtDefId']; ?>)"/></span>
	 </td>
	 
	</tr>
    <?php } ?>
	<tr style="height:24px;">
	 <td class="d" colspan="2" align="right" bgcolor="#FFFFFF"><b>Total:&nbsp;</b></td>
	 <td class="d" align="center" bgcolor="#FFFFFF"><b><?php echo $_REQUEST['wgt']; ?></b></td>
	 <td class="d" align="center" bgcolor="#FFFFFF"><b><?php //if($_REQUEST['lgc']!='Logic6' AND $_REQUEST['lgc']!='Logic7'){ echo $_REQUEST['tgt']; }else{ echo '0%'; } ?><?php //echo $_REQUEST['tgt']; ?></b></td>
	 <td class="d" align="" bgcolor="#FFFFFF"></td>
<?php $sqlt=mysql_query("select SUM(Ach) as tAch, SUM(LogScr) as tLogScr, SUM(Scor) as tScor, SUM(AppAch) as tAppAch, SUM(AppLogScr) as tAppLogScr, SUM(AppScor) as tAppScor from hrm_pms_kra_tgtdefin where ".$fn."=".$_REQUEST['kid'],$con); $rest=mysql_fetch_assoc($sqlt); ?>	 
	 <td class="d" align="center" bgcolor="#FFFFFF"><b><?php //if($rest['tAch']>0){echo floatval($rest['tAch']);} ?></b></td>
	 <td class="d" align="" bgcolor="#FFFFFF"></td>	 
	 
<?php /*?><td class="d" align="center" bgcolor="#FFFFFF"><b><?php if($rest['tLogScr']>0){echo floatval($rest['tLogScr']);}?></b></td>	<?php */?> 	

<td class="d" align="center" bgcolor="#FFFFFF"><b><?php //if($rest['tScor']>0){echo floatval($rest['tScor']);} ?></b></td>

	 <td class="d" align="center" bgcolor="#FFFFFF"><b><input type="hidden" id="totAch" style="width:50px;font-weight:bold; text-align:center;background-color:#FFFFFF;border:hidden;" value="<?php if($rest['tAppAch']>0){echo floatval($rest['tAppAch']);} ?>" readonly/></b></td>
	 <td class="d" align="" bgcolor="#FFFFFF">
	 
	 <input type="hidden" id="TotLogScr" style="width:50px;font-weight:bold; text-align:center;background-color:#FFFFFF;border:hidden;" value="<?php if($rest['tAppLogScr']>0){echo floatval($rest['tAppLogScr']);} ?>" readonly/>
	 </td>	
	  
	 <?php /*?><td class="d" align="center" bgcolor="#FFFFFF"><b><input type="text" id="TotLogScr" style="width:50px;font-weight:bold; text-align:center;background-color:#FFFFFF;border:hidden;" value="<?php if($rest['tAppLogScr']>0){echo floatval($rest['tAppLogScr']);} ?>" readonly/></b></td>	<?php */?>
	  	 
	  <td class="d" align="center" bgcolor="#FFFFFF"><b><input type="hidden" id="TotScore" style="width:50px;font-weight:bold; text-align:center;background-color:#FFFFFF;border:hidden;" value="<?php if($rest['tAppScor']>0){echo floatval($rest['tAppScor']);} ?>" readonly/></b></td>
	 <td colspan="3" class="d" align="right" bgcolor="#FFFFFF">&nbsp;</td>
	</tr>
	<tr>
	 <td colspan="15" style="color:#FFFFFF;" align="right">
	 <input type="hidden" name="TotRow" value="<?php echo $num; ?>" />
	 <input type="hidden" name="Idd" value="<?php echo $_REQUEST['kid']; ?>" />
	 &nbsp;&nbsp;&nbsp;<img src="images/edit.png" border="0"/>&nbsp;:Edit
	 &nbsp;&nbsp;&nbsp;<img src="images/Floppy-Small-icon.png" border="0"/>&nbsp;:Save
	 &nbsp;&nbsp;&nbsp;<img src="images/sub.png" border="0"/>&nbsp;:Submit
	 &nbsp;&nbsp;&nbsp;<img src="images/ok.png" border="0"/>&nbsp;:Submitted
	 &nbsp;&nbsp;&nbsp;<img src="images/lock.png" border="0"/>&nbsp;:Locked
	 
	 </td>
	</tr>
</form>	
   </table>
  </td>
 </tr>
 <tr><td style="height:20px;">&nbsp;</td></tr>
<?php /*?> <tr>
  <td style="font-size:18px;color:#FFA275;">
   <?php 
    echo '&nbsp;&nbsp;&nbsp;<font color="#9BFFFF"><u>Note</u>:</font><br>';
	echo '&nbsp;&nbsp;&nbsp;';
    if($_REQUEST['prd']=='Monthly'){ echo 'Please fill achivement before every last day of month'; }
    elseif($_REQUEST['prd']=='Quarter'){ echo 'Please fill achivement before every last day of quarter'; }
    elseif($_REQUEST['prd']=='1/2 Annual'){ echo 'Please fill achivement before every last day of half year'; }
	echo '&nbsp;';
	echo '<u>becouse</u>, <u>if date is over</u>, system auto lock your achivement.';
   ?>
  
 </tr>
<?php */?>
</table>
</center>
</body>
<?php } ?>
</html>
