<?php session_start();
require_once('../AdminUser/config/config.php');
//$sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$_REQUEST['c']." AND Process='PMS'", $con); $resSY=mysql_fetch_array($sqlSY); $spms = mysql_query("select UnLckKRA from hrm_employee_pms where EmployeeID=".$_REQUEST['e']." AND AssessmentYear=".$resSY['CurrY'],$con); $rpms=mysql_fetch_assoc($spms);

if($_REQUEST['n']==1){ $fn='FormBId'; $sqlk=mysql_query("select Skill,SkillComment from hrm_employee_pms_behavioralformb efb inner join hrm_pms_formb fb on efb.FormBId=fb.FormBId where efb.FormBId=".$_REQUEST['fbid'],$con); }elseif($_REQUEST['n']==2){ $fn='FormBSubId'; $sqlk=mysql_query("select Skill,SkillComment from hrm_employee_pms_behavioralformb_sub efbs inner join hrm_pms_formbsub fbs on efbs.FormBSubId=fbs.FormBSubId where efbs.FormBSubId=".$_REQUEST['fbid'],$con); } $resk=mysql_fetch_assoc($sqlk);

$sqlDept=mysql_query("select DepartmentId,DateJoining from hrm_employee_general where EmployeeID=".$_REQUEST['eid'],$con);
$resDept=mysql_fetch_assoc($sqlDept); 
$DojY=date("Y",strtotime($resDept['DateJoining'])); $DojM=date("m",strtotime($resDept['DateJoining']));
if($DojY<date("Y")){$Mnt_cal=12; $Qtr_cal=4; $Hlf_cal=2;}
else
{ //echo 'aa='.$DojM;
 if($DojM==01 OR $DojM==1){$Mnt_cal=12; $Qtr_cal=4; $Hlf_cal=2;}
 elseif($DojM==02 OR $DojM==2){$Mnt_cal=11; $Qtr_cal=4; $Hlf_cal=2;}
 elseif($DojM==03 OR $DojM==3){$Mnt_cal=10; $Qtr_cal=4; $Hlf_cal=2;}
 elseif($DojM==04 OR $DojM==4){$Mnt_cal=9; $Qtr_cal=3; $Hlf_cal=2;}
 elseif($DojM==05 OR $DojM==5){$Mnt_cal=8; $Qtr_cal=3; $Hlf_cal=2;}
 elseif($DojM==06 OR $DojM==6){$Mnt_cal=7; $Qtr_cal=3; $Hlf_cal=2;}
 elseif($DojM==07 OR $DojM==7){$Mnt_cal=6; $Qtr_cal=2; $Hlf_cal=1;}
 elseif($DojM==08 OR $DojM==8){$Mnt_cal=5; $Qtr_cal=2; $Hlf_cal=1;}
 elseif($DojM==09 OR $DojM==9){$Mnt_cal=4; $Qtr_cal=2; $Hlf_cal=1;}
 elseif($DojM==10){$Mnt_cal=3; $Qtr_cal=1; $Hlf_cal=1;}
 elseif($DojM==11){$Mnt_cal=2; $Qtr_cal=1; $Hlf_cal=1;}
 elseif($DojM==12){$Mnt_cal=1; $Qtr_cal=1; $Hlf_cal=1;}
}

if($_REQUEST['prd']=='Monthly')
{ $countrow=12; $tit='Month'; $num=12; 
  $tgt=round(($_REQUEST['tgt']/$Mnt_cal),2); $wgt=round(($_REQUEST['wgt']/$Mnt_cal),2); }
elseif($_REQUEST['prd']=='Quarter')
{ $countrow=4; $tit='Quarter'; $num=4; 
  $tgt=round($_REQUEST['tgt']/$Qtr_cal); $wgt=round(($_REQUEST['wgt']/$Qtr_cal),2); }
elseif($_REQUEST['prd']=='1/2 Annual')
{ $countrow=2; $tit='Year'; $num=2; 
  $tgt=round($_REQUEST['tgt']/$Hlf_cal); $wgt=round(($_REQUEST['wgt']/$Hlf_cal),2); }



if(isset($_POST['subsave']))
{
 for($i=1; $i<=$_POST['TotRow']; $i++)
 {
   if($_POST['wgt'.$i]!='' AND $_POST['tgt'.$i]!='' AND $_POST['Remark'.$i]!='')
   {
   
    $sqlchk=mysql_query("select * from hrm_pms_formb_tgtdefin where ".$fn."=".$_POST['Idd']." AND NtgtN=".$_POST['NtgtN'.$i],$con); $row=mysql_num_rows($sqlchk);
    if($row>0)
    { 
     $upIn=mysql_query("update hrm_pms_formb_tgtdefin set Remark='".addslashes($_POST['Remark'.$i])."', Ldate='".$_POST['ld'.$i]."', Wgt='".$_POST['wgt'.$i]."', Tgt='".$_POST['tgt'.$i]."' where ".$fn."=".$_POST['Idd']." AND NtgtN=".$_POST['NtgtN'.$i]);
    }
    else
    {
     $upIn=mysql_query("insert into hrm_pms_formb_tgtdefin(".$fn.", EmployeeID, YearId, Tital, Ldate, Wgt, Tgt, NtgtN, Remark) values(".$_POST['Idd'].", ".$_POST['eid'].", ".$_POST['yid'].", '".$_POST['tit'.$i]."', '".$_POST['ld'.$i]."', '".$_POST['wgt'.$i]."', '".$_POST['tgt'.$i]."', ".$_POST['NtgtN'.$i].", '".addslashes($_POST['Remark'.$i])."')",$con);
    }
	
   } //if($_POST['wgt'.$i]!='' AND $_POST['tgt'.$i]!='' AND $_POST['Remark'.$i]!='')	 
 }
 if($upIn){echo '<script>alert("Data save successfully");</script>';}
}



?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Target Define</title>
<style>.h{font-size:16px;font-family:Times New Roman;text-align:center;font-weight:bold;color:#FFF;}
.t{font-size:12px;font-family:Times New Roman;text-align:center;font-weight:bold;color:#FFFFFF;}

.dc{font-size:12px;font-family:Times New Roman;color:#000000;text-align:center;}
.d{font-size:12px;font-family:Times New Roman;color:#000000;}
.input{font-size:12px;font-family:Times New Roman;color:#000000;width:100%;border:hidden;}
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
 var fn=document.getElementById("fn").value; var fbid=document.getElementById("fbid").value;
 
 if(ach==''){ alert("please insert self rating"); return false;} 
 else if(cmnt==''){ alert("please type remark"); return false;}
 else
 {
  var Perid=document.getElementById("Perid").value;
  var agree=confirm("Are You Sure!");
  //var agree=confirm("The Achievement has to be as per the "+Perid+" target and not annual target!");
  if(agree)
  {
  //$("#LoaderOpen").loading("start");  $("#LoaderOpen").loading({ message: "Please Wait..." });      
  var cmt=cmnt.replace(/[`~!@#$^&*_|+\-=÷¿?;:'"<>\{\}\[\]\\\/]/gi, ''); 
  var url = 'setkrapptgtformbactpms.php'; var pars = 'ach='+ach+'&cmnt='+cmt+'&id='+id+'&i='+i+'&fn='+fn+'&fbid='+fbid+'&scor='+Scor+'&logscr='+LogScr;
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_result });
  }
 }
}
function show_result(originalRequest)
{ document.getElementById('ResultSpan').innerHTML = originalRequest.responseText; 
  var i=document.getElementById('ir').value; var rst=document.getElementById('rst').value;
  if(rst==1)
  {
   //$("#LoaderOpen").loading("stop");       
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
   var url = 'setkrapptgtformbactpms.php'; var pars = 'lockk=OkLock&id='+id+'&i='+i;
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

//function FUnSaveK()
//{ document.getElementById('subIdOnes').click(); }


//var setv=document.getElementById("aa").value;
//var tovf=Math.round(Setv*4);

function closedw()
{
window.close();
}

</script>
</head>
<body bgcolor="#6C6C00">
<span id="ResultSpan"></span>
<?php for($i=1; $i<=12; $i++){ ?>
<input type="hidden" id="AchScore<?php echo $i; ?>" value="0" />
<input type="hidden" id="KraScore<?php echo $i; ?>" value="0" />
<?php } ?>
<?php //$sqle=mysql_query("select EmpCode,Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['e'],$con);

    $sqle=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentId from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$_REQUEST['eid'],$con);
      $rese=mysql_fetch_assoc($sqle); ?>
<center>
<div id="LoaderOpen" class="loading-div"> 
<table style="width:100%;">
 <tr>
  <td style="width:100%;" valign="top">
   <table align="center" border="0" cellspacing="1">
    <tr><td colspan="15" class="h"><u>Define Target (Form-B)</u></td></tr>
	
	<?php /*?><tr><td>&nbsp;</td></tr>
	<tr><td colspan="10" style="font-size:20px;" align="center"><font color="#000000"><u>Note</u>:&nbsp;</font><font class="msg_r"><span class="blink_me">Please enter achievement numbers as per the <u><?php echo $_REQUEST['prd']; ?></u> broken targets and not the complete annual target</span></font></td></tr><?php */?>
	
	<tr><td>&nbsp;</td></tr>
	<tr><td colspan="15"><font color="#9BFFFF">Name:</font>&nbsp;<font color="#FFFFFF"><?php echo $rese['EmpCode'].': '.$rese['Fname'].' '.$rese['Sname'].' '.$rese['Lname']; ?></font></td></tr>
	<tr><td colspan="10"><font color="#9BFFFF">Logic:</font>&nbsp;<font color="#FFFFFF"><?php echo $_REQUEST['lgc']; ?></font>&nbsp;,&nbsp;<font color="#9BFFFF">Skill:</font>&nbsp;<font color="#FFFFFF"><?php echo $resk['Skill']; ?></font></td></tr><tr><td colspan="10"><font color="#9BFFFF">Description:</font>&nbsp;<font color="#FFFFFF"><?php echo $resk['SkillComment']; ?></td></font></tr>	
    <tr style="background-color:#CC9900;height:25px;">
	 <td rowspan="2" class="t" style="width:40px;">Sn</td>
	 <td rowspan="2" class="t" style="width:80px;"><?php echo $tit; ?></td>
	 <td rowspan="2" class="t" style="width:60px;">Weigh<br>tage</td>
	 <td rowspan="2" class="t" style="width:60px;">Target</td>
	 <td rowspan="2" class="t" style="width:300px;">Activity Performed</td>
	 <td colspan="3" class="t">Employee Achivement</td>
	 <td colspan="3" class="t">Appraiser Achivement</td>
	 <td rowspan="2" class="t" style="width:50px;">Edit</td>
	 <td rowspan="2" class="t" style="width:50px;">Submit</td>
	</tr>
	<tr style="background-color:#9FCFFF;height:25px;">
	 
	 <td class="t" style="background-color:#CC9900;width:50px;color:#FFF;">Self Rating</td>
	 <td class="t" style="background-color:#CC9900;width:200px;color:#FFF;">Remark</td>
	 <!--<td class="t" style="width:60px;color:#000000;">Allow Logic</td>-->
	 <td class="t" style="background-color:#CC9900;width:50px;color:#FFF;">Score</td>
	 <td class="t" style="background-color:#9FCFFF;width:50px;color:#000000;">Rep Rating</td>
	 <td class="t" style="background-color:#9FCFFF;width:200px;color:#000000;">Remark</td>
	 <?php /*?><td class="t" style="background-color:#9FCFFF;width:50px;color:#000000;">Allow Logic</td><?php */?>
	 <td class="t" style="background-color:#9FCFFF;width:50px;color:#000000;">Score</td>
	 
	</tr>
<form name="TgtForm" method="post" onSubmit="return ValidatCmt(this)">	
<input type="hidden" name="numr" id="numr" value="<?php echo $num; ?>"/>
<input type="hidden" name="fn" id="fn" value="<?php echo $fn; ?>"/>
<input type="hidden" name="fbid" id="fbid" value="<?php echo $_REQUEST['fbid']; ?>"/>
<input type="hidden" name="eid" id="eid" value="<?php echo $_REQUEST['eid']; ?>"/>
<input type="hidden" name="lgc" id="lgc" value="<?php echo $_REQUEST['lgc']; ?>"/>
<input type="hidden" name="wgt" id="wgt" value="<?php echo $_REQUEST['wgt']; ?>"/>
<input type="hidden" name="Perid" id="Perid" value="<?php echo $_REQUEST['prd']; ?>"/>
<input type="hidden" name="yid" id="yid" value="<?php echo $_REQUEST['yid']; ?>" />
<input type="hidden" id="prd" value="<?php echo $_REQUEST['prd']; ?>" /> 
<input type="hidden" id="tgt" value="<?php echo $_REQUEST['tgt']; ?>" /> 
<input type="hidden" id="nn" value="<?php echo $_REQUEST['n']; ?>" />
<input type="hidden" id="c" value="<?php echo $_REQUEST['c']; ?>" />


<?php //$sql=mysql_query("select * from hrm_pms_formb_tgtdefin where FormBId=".$_REQUEST['fbid']." AND EmployeeID=".$_REQUEST['e']." AND YearId=".$_REQUEST['yid'],$con); $row=mysql_num_rows($sql); if($countrow!=$row){ $del=mysql_query("delete from hrm_pms_formb_tgtdefin where FormBId=".$_REQUEST['fbid']." AND EmployeeID=".$_REQUEST['e']." AND YearId=".$_REQUEST['yid'],$con); } ?>

	<?php for($i=1; $i<=$num; $i++){ ?>
	<tr style="background-color:#FFFFFF;height:24px;">
	 <td class="d" align="center"><?php echo $i; ?></td>
	 <td class="d" align="center">
	  <?php 
	    if($_REQUEST['prd']=='Monthly'){ if($i==1){$t='January'; $ld=date("Y-02-28"); $lm=3; }elseif($i==2){$t='February'; $ld=date("Y-02-28"); $lm=3; }elseif($i==3){$t='March'; $ld=date("Y-03-31"); $lm=3; }elseif($i==4){$t='April';$ld=date("Y-04-30"); $lm=4; }elseif($i==5){$t='May'; $ld=date("Y-05-31"); $lm=5; }elseif($i==6){$t='June'; $ld=date("Y-06-30"); $lm=6; }elseif($i==7){$t='July'; $ld=date("Y-07-31"); $lm=7; }elseif($i==8){$t='August'; $ld=date("Y-08-31"); $lm=8; }elseif($i==9){$t='September'; $ld=date("Y-09-30"); $lm=9; }elseif($i==10){$t='October'; $ld=date("Y-10-31"); $lm=10; }elseif($i==11){$t='November'; $ld=date("Y-11-30"); $lm=11; }elseif($i==12){$t='December'; $ld=date("Y-12-31"); $lm=12; } }	
        elseif($_REQUEST['prd']=='Quarter'){ if($i==1){$t='Quarter 1'; $ld=date("Y-03-31"); $lm=3; }elseif($i==2){$t='Quarter 2'; $ld=date("Y-06-30"); $lm=4; }elseif($i==3){$t='Quarter 3'; $ld=date("Y-09-30"); $lm=7; }elseif($i==4){$t='Quarter 4'; $ld=date("Y-12-31"); $lm=10; } }
        elseif($_REQUEST['prd']=='1/2 Annual'){ if($i==1){$t='Half Year 1'; $ld=date("Y-06-30"); $lm=3; }elseif($i==2){$t='Half Year 2'; $ld=date("Y-12-31"); $lm=7; } }
		
		echo $t; ?><input type="hidden" name="tit<?php echo $i; ?>" value="<?php echo $t; ?>"/>
		<input type="hidden" id="ChkEdit<?php echo $i; ?>" value="<?php if(date("m")<$lm){echo 1;}else{echo 0;} ?>" />
		
		<input type="hidden" name="tgt<?php echo $i; ?>" value="<?php echo $tgt; ?>"/>
		<input type="hidden" name="nn<?php echo $i; ?>" value="<?php echo $i; ?>"/>
	
	<?php //$sqlchk=mysql_query("select * from hrm_pms_formb_tgtdefin where ".$fn."=".$_REQUEST['fbid']." AND EmployeeID=".$_REQUEST['e']." AND YearId=".$_REQUEST['yid']." AND NtgtN=".$i,$con); $rrow=mysql_num_rows($sqlchk); if($rrow==0){ $upIn=mysql_query("insert into hrm_pms_formb_tgtdefin(".$fn.", EmployeeID, YearId, Tital, Ldate, Wgt, Tgt, NtgtN, Remark) values(".$_REQUEST['fbid'].", ".$_REQUEST['e'].", ".$_REQUEST['yid'].", '".$t."', '".$ld."', '".$wgt."', '".$tgt."', ".$i.", '".$resk['Skill']."')",$con); } ?>
			
	 </td>

<?php $sql=mysql_query("select * from hrm_pms_formb_tgtdefin where ".$fn."=".$_REQUEST['fbid']." AND EmployeeID=".$_REQUEST['eid']." AND YearId=".$_REQUEST['yid']." AND Tital='".$t."' AND NtgtN='".$i."'",$con); $row=mysql_num_rows($sql); $res=mysql_fetch_assoc($sql); ?>

	 <td align="center" bgcolor="#FFFFC6" id="TDw<?php echo $i; ?>"><input type="text" class="d" style="width:60px;height:40px;border:hidden;text-align:center;background-color:#FFFFC6;" id="wgt<?php echo $i; ?>" name="wgt<?php echo $i; ?>" value="<?php if($res['Wgt']!=''){echo floatval($res['Wgt']);}else{echo floatval($wgt);} ?>" readonly/></td>
	 
	 <td align="center" bgcolor="#FFFFC6" id="TDt<?php echo $i; ?>"><input type="text" class="d" style="width:60px;height:40px;border:hidden;text-align:center;background-color:#FFFFC6;" value="<?php if($res['Tgt']!=''){echo 100;}//else{echo floatval($tgt);} ?>" readonly />
	 
<input type="hidden" class="d" style="width:60px;height:40px;border:hidden;text-align:center;background-color:#FFFFC6;" id="tgt<?php echo $i; ?>" name="tgt<?php echo $i; ?>" value="<?php if($res['Tgt']!=''){echo floatval($res['Tgt']);}else{echo floatval($tgt);} ?>" readonly />	 
	 
<input type="hidden" id="NtgtN<?php echo $i; ?>" name="NtgtN<?php echo $i; ?>" value="<?php echo $i; ?>"/></td> 
 
	 <td class="d" bgcolor="#FFFFC6" id="TDD<?php echo $i; ?>" valign="top"><textarea type="text" name="Remark<?php echo $i; ?>" id="Remark<?php echo $i; ?>" class="d" rows="2" style="width:300px;border:hidden;background-color:#FFFFC6;" readonly><?php if($res['Remark']!=''){echo $res['Remark'];}else{echo $resk['KRA'];}?></textarea>
	 
	 <input type="hidden" name="ld<?php echo $i; ?>" value="<?php if($row>0 AND $res['Ldate']!='0000-00-00' AND $res['Ldate']!='1970-01-01'){ echo $res['Ldate']; }else{ echo $ld; } ?>"/>
	 </td>
	 
	 <td class="d" bgcolor="#FFFFC6" align="center"><?php if($res['Cmnt']!='' || $res['Ach']>0){ echo floatval($res['Ach']); }else{echo '';} ?></td>
	 <td class="d" bgcolor="#FFFFC6" valign="top"><?php echo $res['Cmnt']; ?></td>
	 <?php /*?><td class="d" bgcolor="#FFFFC6" align="center"><?php if($res['LogScr']!=''){ echo $res['LogScr'];}else{echo 0;} ?></td><?php */?>
	 <td class="d" bgcolor="#FFFFC6" align="center"><?php if($res['Cmnt']!='' || $res['Ach']>0){ echo $res['Scor'];}else{echo '';} ?></td>
	 
	 
	 <td class="d" bgcolor="#D5FFAA" id="TD1<?php echo $i; ?>"><input class="input" name="Ach<?php echo $i; ?>" id="Ach<?php echo $i; ?>" class="d" style="width:60px;border:hidden;background-color:#D5FFAA;text-align:center;" onKeyUp="FunEnterAch(this.value,<?php echo $i; ?>)" onChange="FunEnterAch(this.value,<?php echo $i; ?>)" value="<?php if($res['AppCmnt']!='' || $res['AppAch']>0){ echo floatval($res['AppAch']); }else{ echo ''; } ?>" maxlength="4" onKeyPress="return isNumberKey(event)" readonly/></td>
	 <td class="d" bgcolor="#D5FFAA" id="TD2<?php echo $i; ?>" valign="top"><textarea type="text" name="Cmnt<?php echo $i; ?>" id="Cmnt<?php echo $i; ?>" class="d" rows="2" style="width:300px;border:hidden;background-color:#D5FFAA;"><?php echo $res['AppCmnt']; ?></textarea>
	 
	 <input type="hidden" name="LogScr<?php echo $i; ?>" id="LogScr<?php echo $i; ?>" class="d" style="width:60px;border:hidden;background-color:#D5FFAA;text-align:center;" value="<?php if($res['AppLogScr']!=''){ echo $res['AppLogScr'];}else{echo 0;} ?>" readonly/>
	 </td>
	 
	 <?php /*?><td class="d" bgcolor="#D5FFAA" id="TD2<?php echo $i; ?>"><input type="text" name="LogScr<?php echo $i; ?>" id="LogScr<?php echo $i; ?>" class="d" style="width:60px;border:hidden;background-color:#D5FFAA;text-align:center;" value="<?php if($res['LogScr']!=''){ echo $res['LogScr'];}else{echo 0;} ?>" readonly/></td><?php */?>
	 
	 <td class="d" bgcolor="#D5FFAA" id="TD2<?php echo $i; ?>"><input type="text" name="Scor<?php echo $i; ?>" id="Scor<?php echo $i; ?>" class="d" style="width:60px;border:hidden;background-color:#D5FFAA;text-align:center;" value="<?php if($res['AppScor']!=''){ echo $res['AppScor'];}else{echo 0;} ?>" readonly/></td>
	 
	 
	 <td align="center">
	     
	     <?php //if(($res['Applockk']==0 AND date("Y-m-d")<=$Nxt10Day) OR ($res['lockk']==0 AND $rpms['UnLckKRA']==1)){echo 'block';}else{echo 'none';} ?>
	 <?php 
	 
	 if($rese['DepartmentId']==6 && $res['Tital']=='Half Year 1' && $res['Ldate']=='2019-06-30'){$LDate=date("2019-07-31");}
	 else{$LDate=$res['Ldate'];}
	 $Nxt10Day=date("Y-m-d",strtotime('+7 day', strtotime($LDate))); ?>
	 
	 
	 
	 <?php if($res['Tital']!='' AND $res['Tgt']!=''){ //AND $_REQUEST['prd']=='Monthly' ?>
	  <span style="cursor:pointer"><img src="images/edit.png" border="0" id="edit_<?php echo $i; ?>" style="display:<?php if($res['Applockk']==0){echo 'block';}else{echo 'block';} //none ?>" onClick="FunEdit(<?php echo $i; ?>)"/></span>
	  <span style="cursor:pointer"><img src="images/Floppy-Small-icon.png" border="0" id="save_<?php echo $i; ?>" style="display:none;" onClick="FunSave(<?php echo $i.','.$res['TgtFbDefId']; ?>)"/></span>
	  <img src="images/lock.png" border="0" style="display:<?php if($res['lockk']==0 AND date("Y-m-d")>$Nxt10Day){echo 'block';}else{echo 'none';} ?>;" />
	 <?php } ?> 
	 </td>
	 <td align="center">
	 <img src="images/ok.png" border="0" id="ok_<?php echo $i; ?>" style="display:<?php if($res['AppAch']!='' AND $res['AppCmnt']!=='' AND $res['Applockk']==1){echo 'none'; /*block*/}else{echo 'none';} ?>;"/>
	 <span style="cursor:pointer;"><img src="images/sub.png" border="0" id="lockk_<?php echo $i; ?>" style="display:<?php if($res['AppAch']!='' AND $res['AppCmnt']!=='' AND $res['Applockk']==0 AND date("Y-m-d")<=$Nxt10Day){echo 'block';}else{echo 'none';} ?>;" onClick="FunLk(<?php echo $i.','.$res['TgtFbDefId']; ?>)"/></span>
	 </td>
	</tr>
    <?php } ?>
	<tr style="height:24px;">
	 <td class="d" colspan="2" align="right" bgcolor="#FFFFFF"><b>Total:&nbsp;</b></td>
	 <td class="d" align="center" bgcolor="#FFFFFF"><b><?php echo $_REQUEST['wgt']; ?></b></td>
	 <td class="d" align="center" bgcolor="#FFFFFF"><b><?php //echo $_REQUEST['tgt']; ?></b>
     <input type="hidden" id="twgt" name="twgt" value="<?php echo $_REQUEST['wgt']; ?>"/>
	 <input type="hidden" id="ttgt" name="ttgt" value="<?php echo $_REQUEST['tgt']; ?>"/></td>
	 <td class="d" align="" bgcolor="#FFFFFF"></td>
	 <?php $sqlt=mysql_query("select SUM(Ach) as tAche, SUM(LogScr) as tELogScr, SUM(Scor) as tEScor, SUM(AppAch) as tAch, SUM(AppLogScr) as tLogScr, SUM(AppScor) as tScor from hrm_pms_formb_tgtdefin where ".$fn."=".$_REQUEST['fbid']." AND EmployeeID=".$_REQUEST['eid']." AND YearId=".$_REQUEST['yid'],$con); 
	 $rest=mysql_fetch_assoc($sqlt); ?>
	 
	 <td class="d" align="center" bgcolor="#FFFFFF"><b><?php //if($rest['tAche']>0){echo floatval($rest['tAche']);} ?></b></td>
	 <td class="d" align="" bgcolor="#FFFFFF"></td>	 
<?php /*?><td class="d" align="center" bgcolor="#FFFFFF"><b><?php if($rest['tELogScr']>0){echo floatval($rest['tELogScr']);}?></b></td><?php */?>	 	<td class="d" align="center" bgcolor="#FFFFFF"><b><?php if($rest['tEScor']>0){echo floatval($rest['tEScor']);} ?></b></td>
	 	 
	 <td class="d" align="center" bgcolor="#FFFFFF"><b><input type="hidden" id="totAch" style="width:50px;font-weight:bold; text-align:center;background-color:#FFFFFF;border:hidden;" value="<?php if($rest['tAch']>0){echo floatval($rest['tAch']);} ?>" readonly/></b></td>
	 <td class="d" align="" bgcolor="#FFFFFF">
	 
	 <input type="hidden" id="TotLogScr" style="width:50px;font-weight:bold; text-align:center;background-color:#FFFFFF;border:hidden;" value="<?php if($rest['tLogScr']>0){echo floatval($rest['tLogScr']);} ?>" readonly/>
	 </td>	
	  
	 <?php /*?><td class="d" align="center" bgcolor="#FFFFFF"><b><input type="text" id="TotLogScr" style="width:50px;font-weight:bold; text-align:center;background-color:#FFFFFF;border:hidden;" value="<?php if($rest['tLogScr']>0){echo floatval($rest['tLogScr']);} ?>" readonly/></b></td><?php */?>
	 	 	 
	  <td class="d" align="center" bgcolor="#FFFFFF"><b><input type="hidden" id="TotScore" style="width:50px;font-weight:bold; text-align:center;background-color:#FFFFFF;border:hidden;" value="<?php if($rest['tScor']>0){echo floatval($rest['tScor']);} ?>" readonly/></b></td>
	 <td colspan="2" class="d" align="right" bgcolor="#FFFFFF">&nbsp;</td>
	</tr>
	<tr>
	<td colspan="15" style="color:#FFFFFF;" align="right">
	 <input type="hidden" name="TotRow" value="<?php echo $num; ?>" />
	 <input type="hidden" name="Idd" value="<?php echo $_REQUEST['fbid']; ?>" />
	 <a href="#" onClick="closedw()" style="cursor:pointer;text-decoration:none;color:#FFFFFF;">
	   <img src="images/delete.png" border="0">&nbsp;<u>Window Close</u>&nbsp;<img src="images/delete.png" border="0">
	 </a>
	 
	 &nbsp;&nbsp;&nbsp;<img src="images/go-back-icon.png"border="0" />&nbsp;Revert
	 &nbsp;&nbsp;&nbsp;<img src="images/edit.png" border="0"/>&nbsp;:Edit
	 &nbsp;&nbsp;&nbsp;<img src="images/Floppy-Small-icon.png" border="0"/>&nbsp;:Save
	 &nbsp;&nbsp;&nbsp;<img src="images/sub.png" border="0"/>&nbsp;:Submit
	 &nbsp;&nbsp;&nbsp;<img src="images/ok.png" border="0"/>&nbsp;:Submitted
	 &nbsp;&nbsp;&nbsp;<img src="images/lock.png" border="0"/>&nbsp;:Lock
	 
	 </td>

	</tr>
</form>	
   </table>
  </td>
 </tr>
 <tr><td style="height:20px;">&nbsp;</td></tr>
 
</table>
</div>
</center>
</body>
</html>
<!--
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="loader/jquery.loading.js"></script>
-->
