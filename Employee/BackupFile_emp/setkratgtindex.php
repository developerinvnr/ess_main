<?php session_start();
require_once('../AdminUser/config/config.php');
$sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$_REQUEST['c']." AND Process='KRA'", $con); 
$resSY=mysql_fetch_array($sqlSY); 
$sqlE=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['e'],$con);
$resE=mysql_fetch_assoc($sqlE);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta charset="windows-1252">
<title>KRA Achivement</title>
<style>.h{font-size:16px;font-family:Georgia;text-align:center;font-weight:bold;color:#FFF;}
.t{font-size:12px;font-family:Georgia;text-align:center;font-weight:bold;color:#FFFFFF;}
.d{font-size:12px;font-family:Georgia;color:#000000;}
.dc{font-size:12px;font-family:Georgia;color:#000000;text-align:center;}
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
 var fn=0; var kid=0;
 
 if(ach==''){ alert("please insert self rating"); return false;} 
 else if(cmnt==''){ alert("please type remark"); return false;}
 else
 {
  var Perid=document.getElementById("Perid"+i).value;
  var agree=confirm("The Avhievement has to be as per the "+Perid+" target and not annual target!");
  if(agree)
  {     
  var cmt=cmnt.replace(/[`~!@#$^&*_|+\-=÷¿?;:'"<>\{\}\[\]\\\/]/gi, ''); 
  var url = 'setkratgtindexact.php'; var pars = 'ach='+ach+'&cmnt='+cmt+'&id='+id+'&i='+i+'&fn='+fn+'&kid='+kid+'&scor='+Scor+'&logscr='+LogScr;
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_result });
  }
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
   var url = 'setkratgtindexact.php'; var pars = 'lockk=OkLock&id='+id+'&i='+i;
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
    
 var lgc=document.getElementById("lgc"+i).value; var wgt=document.getElementById("wgt"+i).value; 
 var tgt=parseFloat(document.getElementById("tgt"+i).value); 
 var ach=Math.round(((tgt*v)/100)*100)/100;   //var ach=parseFloat(v);
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
  else if(ach>20 && ach<=25){var EScore=document.getElementById("LogScr"+i).value=Per75;}
  else{var EScore=document.getElementById("LogScr"+i).value=0;}
  
  //else if(ach>20 && ach<=25){var EScore=document.getElementById("LogScr"+i).value=Per85;}
  //else if(ach>25 && ach<=30){var EScore=document.getElementById("LogScr"+i).value=Per75;}
  //else{var EScore=document.getElementById("LogScr"+i).value=0;}
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
 
}

function isNumberKey(evt)
{
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
  return false; return true;
}

//function FUnSaveK()
//{ document.getElementById('subIdOnes').click(); }

</script>
</head>
<body bgcolor="#6C6C00">
<span id="ResultSpan"></span>
<?php for($i=1; $i<=20; $i++){ ?>
<input type="hidden" id="AchScore<?php echo $i; ?>" value="0" />
<input type="hidden" id="KraScore<?php echo $i; ?>" value="0" />
<?php } ?>
<input type="hidden" id="ee" value="<?php echo $_REQUEST['e']; ?>" /> 
<input type="hidden" id="cc" value="<?php echo $_REQUEST['c']; ?>" /> 
<input type="hidden" id="yy" value="<?php echo $_REQUEST['y']; ?>" />
<center>
<table style="width:100%;">
 <tr>
  <td style="width:100%;" valign="top">
   <table align="center" border="0" cellspacing="1">
    <tr><td colspan="10" class="h"><u>Define Target</u></td></tr>
    <tr><td>&nbsp;</td></tr>
	<tr><td colspan="10" style="font-size:18px;font-family:Times New Roman;" align="center"><font color="#fff"><u>Note</u>:&nbsp;</font><font class="msg_r"><span class="blink_me">Please ensure that the achievement is calculated against the <b>"Target Value"</b> only</span></font></td></tr>
    
	<tr><td>&nbsp;</td></tr>
	<tr><td colspan="10"><font color="#9BFFFF">Name:</font>&nbsp;<font color="#FFFFFF"><?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?></font></td></font></tr>
	<?php //if($resDept['DepartmentId']==6 || $resDept['DepartmentId']==9){ ?>
	<script type="text/javascript">function FunChkCal(){ if(document.getElementById("ChkCal").checked==true){document.getElementById("SpanId").style.display='block';}else{document.getElementById("SpanId").style.display='none';} } function isNumberKey(evt){ var charCode = (evt.which) ? evt.which : evt.keyCode; if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) return false; return true; }
	function FunCalculator()
	{
	 var v1=parseFloat(document.getElementById("Intp1").value); var v2=parseFloat(document.getElementById("Intp2").value);
	 if(v1>0){var OnePer=(v1*1)/100;}else{var OnePer=1;}
	 if(v2>0){document.getElementById("Intp3").value=Math.round(v2/OnePer);} 
	}
	</script>
	<tr style="background-color:#6C6C00;height:25px;">
	 <td colspan="7" class="t" style="text-align:right; border:hidden;">
	  <span id="SpanId" style="display:none;">
	  Target Value:&nbsp;<input type="text" class="d" id="Intp1" onKeyPress="return isNumberKey(event)" style="width:100px;text-align:center;" onKeyUp="FunCalculator()" />
	  &nbsp;&nbsp;&nbsp;
	  Achive Value:&nbsp;<input type="text" class="d" id="Intp2" onKeyPress="return isNumberKey(event)" style="width:100px;text-align:center;" onKeyUp="FunCalculator()" />
	  &nbsp;&nbsp;&nbsp;
	  Rating:&nbsp;<input type="text" class="d" id="Intp3" style="width:60px;text-align:center;background-color:#FFAAFF;" readonly/>
	  </span>
	 </td>
	 <td colspan="3" class="t" style="text-align:center; font-size:14px;">
	  <input type="checkbox" id="ChkCal" onClick="FunChkCal()" />
	  <font color="#00FFFF"><span class="blink_me">CALCULATOR</span></font>
	 </td>
	</tr>
	<?php //} ?>	
	
	
    <tr style="background-color:#CC9900;height:25px;">
	 <td rowspan="2" class="t" style="width:40px;">Sn</td>
	 <td rowspan="2" class="t" style="width:80px;">Period</td>
	 <td rowspan="2" class="t" style="width:300px;">Activity Performed</td>
	 <td rowspan="2" class="t" style="width:60px;">Weigh<br>tage</td>
	 <td rowspan="2" class="t" style="width:60px;">Target</td>
	 <td colspan="3" class="t" style="width:60px;">Achivement Deatis</td>
	 <td colspan="2" class="t">
	 <script type="text/javascript">function FunClsWind(){window.close();}</script>
	 <input type="button" value="Close Window" onClick="FunClsWind()" style="cursor:pointer;width:98%;"/>
	 </td>
	</tr>
	<tr style="background-color:#9FCFFF;height:25px;">
	 <td class="t" style="width:60px;color:#000000;">Self Rating</td>
	 <td class="t" style="width:300px;color:#000000;">Remark</td>
	 <td class="t" style="width:60px;color:#000000;">Score</td>
	 <td class="t" style="width:50px;color:#000000;">Edit</td>
	 <td class="t" style="width:50px;color:#000000;">Submit</td>
	</tr>
<?php if(date("m")==2){ $Tit="Tital='January'"; }
elseif(date("m")==3){ $Tit="Tital='February'"; } 
elseif(date("m")==4){ $Tit="(Tital='March' OR Tital='Quarter 1')"; }
elseif(date("m")==5){ $Tit="Tital='April'"; }
elseif(date("m")==6){ $Tit="Tital='May'"; }
elseif(date("m")==7){ $Tit="(Tital='June' OR Tital='Quarter 2' OR Tital='Half Year 1')"; }
elseif(date("m")==8){ $Tit="Tital='July'"; }
elseif(date("m")==9){ $Tit="Tital='August'"; }
elseif(date("m")==10){ $Tit="(Tital='September' OR Tital='Quarter 3')"; }
elseif(date("m")==11){ $Tit="(Tital='October')"; }
elseif(date("m")==12){ $Tit="Tital='November'"; }


$sql=mysql_query("select kdf.*,Fname,Sname,Lname,DepartmentId from hrm_pms_kra_tgtdefin kdf inner join hrm_employee_general g on kdf.EmployeeID=g.EmployeeID inner join hrm_employee e on kdf.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.EmployeeID=".$_REQUEST['e']." AND ".$Tit." AND kdf.Ldate>='".date("2022-02-01")."' order by kdf.TgtDefId asc, kdf.NtgtN asc",$con); $row=mysql_num_rows($sql);  

//$sql=mysql_query("select kdf.*,Fname,Sname,Lname from hrm_pms_kra_tgtdefin kdf inner join hrm_employee_general g on kdf.EmployeeID=g.EmployeeID inner join hrm_employee e on kdf.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.EmployeeID=".$_REQUEST['e']." AND ".$Tit." order by kdf.TgtDefId asc, kdf.NtgtN asc ",$con); $row=mysql_num_rows($sql);  
if($row>0)
{ 
 $i=1;
 while($res=mysql_fetch_assoc($sql)){ 
 
 if($res['KRAId']>0){ $sqlK=mysql_query("select * from hrm_pms_kra where KRAId=".$res['KRAId'],$con); }
 elseif($res['KRASubId']>0){ $sqlK=mysql_query("select * from hrm_pms_krasub where KRASubId=".$res['KRASubId'],$con); }
 $resK=mysql_fetch_assoc($sqlK);
?>
	<tr style="background-color:#FFFFFF;height:24px;">
	 <td class="dc"><?php echo $i; ?></td>
	 <td class="dc"><?php echo $res['Tital']; ?></td>
     <?php if($resK['KRA']!=$res['Remark']){ ?><td class="d" id="TDD<?php echo $i; ?>"><?php echo $resK['KRA'].'. '.$res['Remark']; ?></td><?php }else{ ?><td class="d" id="TDD<?php echo $i; ?>"><?php echo $res['Remark']; ?></td><?php } ?>
	 <td class="dc"><?php echo floatval($res['Wgt']); ?></td>	
     <td class="dc"><?php if($resK['Logic']!='Logic6' AND $resK['Logic']!='Logic7'){echo 100;}else{echo '0%';}?></td>
	 
	 <td class="d" bgcolor="#D5FFAA" id="TD1<?php echo $i; ?>"><input type="text" name="Ach<?php echo $i; ?>" id="Ach<?php echo $i; ?>" class="d" style="width:60px;border:hidden;background-color:#D5FFAA;text-align:center;" onKeyUp="FunEnterAch(this.value,<?php echo $i; ?>)" onChange="FunEnterAch(this.value,<?php echo $i; ?>)" value="<?php if($res['Cmnt']!='' || $res['Ach']>0){ echo floatval($res['Ach']); }else{echo '';} ?>" maxlength="4" onKeyPress="return isNumberKey(event)" readonly/></td>
	 <td class="d" bgcolor="#D5FFAA" id="TD2<?php echo $i; ?>" valign="top"><textarea type="text" name="Cmnt<?php echo $i; ?>" id="Cmnt<?php echo $i; ?>" class="d" rows="2" style="width:300px;border:hidden;background-color:#D5FFAA;"><?php echo $res['Cmnt']; ?></textarea></td>
	 <td class="d" bgcolor="#D5FFAA" id="TD2<?php echo $i; ?>"><input type="text" name="Scor<?php echo $i; ?>" id="Scor<?php echo $i; ?>" class="d" style="width:60px;border:hidden;background-color:#D5FFAA;text-align:center;" value="<?php if($res['Scor']!=''){ echo $res['Scor'];}else{echo 0;} ?>" readonly/></td>

<input type="hidden" id="Perid<?php echo $i; ?>" name="Perid<?php echo $i; ?>" value="<?php echo $res['Tital'];?>"/>	  
<input type="hidden" id="wgt<?php echo $i; ?>" name="wgt<?php echo $i; ?>" value="<?php echo $res['Wgt'];?>"/>
<input type="hidden" id="tgt<?php echo $i; ?>" name="tgt<?php echo $i; ?>" value="<?php echo $res['Tgt'];?>"/>
<input type="hidden" id="lgc<?php echo $i; ?>" name="lgc<?php echo $i; ?>" value="<?php echo $resK['Logic'];?>"/>	
<input type="hidden" id="ld<?php echo $i; ?>" name="ld<?php echo $i; ?>" value="<?php echo $res['Ldate']; ?>"/>
<input type="hidden" id="LogScr<?php echo $i; ?>" name="LogScr<?php echo $i; ?>" value="<?php if($res['LogScr']!=''){ echo $res['LogScr'];}else{echo 0;} ?>"/>
	 
	 
	 <td align="center">
	 <?php $mchk=date("m",strtotime($res['Ldate'])); 
	 if($mchk==1){$LDate=date("Y-02-28");}
	 elseif($res['DepartmentId']==6 && $res['Tital']=='Half Year 1' && $res['Ldate']==date('Y-06-30'))
{$LDate=date("Y-09-30");}
elseif($res['DepartmentId']==6 && ($res['Tital']=='Quarter 1' || $res['Tital']=='Quarter 2') && ($res['Ldate']==date('Y-03-31') || $res['Ldate']==date('Y-06-30')))
{$LDate=date("Y-09-30");}
else{$LDate=$res['Ldate'];}
	 
	 /*elseif($res['DepartmentId']==6 && ($res['Tital']=='Half Year 1' || $res['Tital']=='Quarter 1' || $res['Tital']=='Quarter 2') && ($res['Ldate']=='2020-06-30' || $res['Ldate']=='2020-03-31')){$LDate=date("2020-07-31");}
	 else{$LDate=$res['Ldate'];}*/
	 
	 
	 
	 ?>
	 <?php $Nxt10Day=date("Y-m-d",strtotime('+07 day', strtotime(date($LDate)))); //date("2020-05-01") //$LDate
	       $Nxt14Day=date("Y-m-d",strtotime('+14 day', strtotime($LDate)));
	       ?>
	 <?php if($res['Tital']!='' AND $res['Tgt']!=''){ //AND $_REQUEST['prd']=='Monthly' ?>
	  <span style="cursor:pointer;">
	  <?php //echo 'aa='.$PerM; //$PerM==1 AND //$PerM==1 AND?>
	  <img src="images/edit.png" border="0" id="edit_<?php echo $i; ?>" style="display:<?php if(($res['lockk']==0 AND date("Y-m-d")<=$Nxt10Day) OR ($res['lockk']==0 AND $rpms['UnLckKRA']==1) OR ($res['lockk']==0 AND $res['Applockk']==0 AND $res['AppRevert']=='Y' AND date("Y-m-d")<=$Nxt14Day)){echo 'block';}else{echo 'none';} ?>" onClick="FunEdit(<?php echo $i; ?>)" />
	  
	  </span>
	  <span style="cursor:pointer"><img src="images/Floppy-Small-icon.png" border="0" id="save_<?php echo $i; ?>" style="display:none;" onClick="FunSave(<?php echo $i.','.$res['TgtDefId']; ?>)"/></span>
	  <img src="images/lock.png" border="0" style="display:<?php if($res['lockk']==0 AND date("Y-m-d")>$Nxt10Day){echo 'block';}else{echo 'none';} ?>;" />
	 <?php } ?> 
	 </td>
	 <td align="center"><?php // AND $PerM==1?>
	 <img src="images/ok.png" border="0" id="ok_<?php echo $i; ?>" style="display:<?php if($res['Ach']!='' AND $res['Cmnt']!=='' AND $res['lockk']==1){echo 'block';}else{echo 'none';} ?>;"/>
	 <span style="cursor:pointer"><img src="images/sub.png" border="0" id="lockk_<?php echo $i; ?>" style="display:<?php if($res['Ach']!='' AND $res['Cmnt']!=='' AND $res['lockk']==0 AND date("Y-m-d")<=$Nxt10Day){echo 'block';}else{echo 'none';} ?>;" onClick="FunLk(<?php echo $i.','.$res['TgtDefId']; ?>)"/></span>
	 </td>
	</tr>
    <?php $i++; } } ?>
	<tr style="height:24px;">
	 <td colspan="12" style="color:#FFFFFF;" align="right">
	 &nbsp;&nbsp;&nbsp;<img src="images/edit.png" border="0"/>&nbsp;:Edit
	 &nbsp;&nbsp;&nbsp;<img src="images/Floppy-Small-icon.png" border="0"/>&nbsp;:Save
	 &nbsp;&nbsp;&nbsp;<img src="images/sub.png" border="0"/>&nbsp;:Submit
	 &nbsp;&nbsp;&nbsp;<img src="images/ok.png" border="0"/>&nbsp;:Submitted
	 &nbsp;&nbsp;&nbsp;<img src="images/lock.png" border="0"/>&nbsp;:Locked
	 </td>
	</tr>

   </table>
  </td>
 </tr>
 <tr><td style="height:20px;">&nbsp;</td></tr>
 <tr>
  <td style="font-size:18px;color:#FFA275;">
   <?php 
    echo '&nbsp;&nbsp;&nbsp;<font color="#9BFFFF"><u>Note</u>:</font><br>';
	echo '&nbsp;&nbsp;&nbsp;';
    echo ' The achivement is required to be entered on the last day or within few days beyand which the KRA will set auto locked.';
   ?>
 </tr>
</table>
</center>
</body>
</html>
