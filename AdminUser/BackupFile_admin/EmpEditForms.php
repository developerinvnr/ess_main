<?php require_once('../AdminUser/config/config.php'); 

if($_REQUEST['act']=='DelAchive' AND $_REQUEST['FId']!='' AND $_REQUEST['PmsId']!='')
{
 $sqlDel=mysql_query("delete from hrm_employee_pms_achivement where AchivementId=".$_REQUEST['FId'],$con); 
 if($sqlDel){$msg=$_REQUEST['FId'].' Achive ID deleted successfully';}
}

if($_REQUEST['act']=='DelFormB' AND $_REQUEST['FId']!='' AND $_REQUEST['PmsId']!='')
{ 
 $sqlDel=mysql_query("delete from hrm_employee_pms_behavioralformb where BehavioralFormBId=".$_REQUEST['FId']." AND EmpPmsId=".$_REQUEST['PmsId'],$con); 
 if($sqlDel){$msg=$_REQUEST['FId'].' FormB ID deleted successfully';}
}

if($_REQUEST['act']=='DelFeedBack' AND $_REQUEST['FId']!='' AND $_REQUEST['PmsId']!='')
{
 $sqlDel=mysql_query("delete from hrm_employee_pms_workenvironment where EmpWorkEnvId=".$_REQUEST['FId'],$con); 
 if($sqlDel){$msg=$_REQUEST['FId'].' FeedBack ID deleted successfully';}
}

 

?>

<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.th{ font-family:Times New Roman;font-size:13px;height:25px;text-align:center;color:#000000;font-weight:bold;}
.tdl{ font-family:Times New Roman;font-size:14px;text-align:left; }
.tdc{ font-family:Times New Roman;font-size:14px;text-align:center; }
.font {color:#000; font-family:Georgia; font-size:15px; font-weight:bold;}  .font {color:#000; font-family:Times New Roman; font-size:12px;}
.Input{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;background-color:#FFFFFF;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;} .font1 { font-family:Georgia; font-size:11px; height:14px; } .font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:18px; color:#0080FF; }.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.Input2{font-family:Times New Roman; height:22px;border-style:hidden; border-bottom-color:#EEF0AA; border-left-color:#EEF0AA; border-right-color:#EEF0AA; border-top-color:#EEF0AA; border:0;background-color:#EEF0AA; font-weight:bold;}
.inner_table{height:500px;overflow-y:auto;width:auto;}
</style>
<script language="javascript" type="text/javascript">
function DelF1(FormId,EmpId,PmsId,act) 
{
 var agree = confirm("Are you sure you want delete Achive records?");
 if(agree){window.location="EmpEditForms.php?act=DelAchive&FId="+FormId+"&EmpId="+EmpId+"&PmsId="+PmsId+"&action="+act;}
 else{return false;}
}

function DelF3(FormId,EmpId,PmsId,act)
{
 var agree = confirm("Are you sure you want delete Form B records?");
 if(agree){window.location="EmpEditForms.php?act=DelFormB&FId="+FormId+"&EmpId="+EmpId+"&PmsId="+PmsId+"&action="+act;}
 else{return false;}
}

function DelF4(FormId,EmpId,PmsId,act)
{
 var agree = confirm("Are you sure you want delete FeedBack records?");
 if(agree){window.location="EmpEditForms.php?act=DelFeedBack&FId="+FormId+"&EmpId="+EmpId+"&PmsId="+PmsId+"&action="+act;}
 else{return false;}
}
</script>
</head>
<body class="body" style="" <?php //background-image:url(images/pmsback.png);" ?> >
<table border="0" style="width:100%;">
<?php $sqlE=mysql_query("select * from hrm_employee where EmployeeID=".$_REQUEST['EmpId'], $con); $resE=mysql_fetch_array($sqlE);?>   
<tr>
 <td style="width:100%;">
  <table border="0" style="width:100%;">
   <tr>
 <td style="size:13px;color:#000000;font-weight:bold;font-family:Times New Roman;" align="right">&nbsp;EmpCode :</td>
 <td style="size:13px;color:#0067CE;font-weight:bold;font-family:Times New Roman;"><?php echo $resE['EmpCode']; ?></td>
 <td style="size:13px;color:#000000;font-weight:bold;width:60px;font-family:Times New Roman;" align="right">Name :</td>
 <td style="size:13px;color:#0067CE;font-weight:bold;font-family:Times New Roman;" ><?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?></td>
 <td>&nbsp;</td>
    </td>
  </tr>
 </table>
 </td>
</tr>
<tr><td style="height:5px;">&nbsp;</td></tr>
 <tr>
   <td class="TableHead" style="width:100%;">&nbsp;&nbsp;&nbsp;<?php if($_REQUEST['action']=='AchivForm'){echo 'Achivement Form';}elseif($_REQUEST['action']=='KraForm'){echo 'KRA Form A';}elseif($_REQUEST['action']=='BehavForm'){echo 'Behavioral Form B';}elseif($_REQUEST['action']=='FeedBckForm'){echo 'FeedBack Form';} ?>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 <font color="#006600"><i><?php echo $msg; ?></i></font>
     <table border="0" style="width:100%;">
<tr>
<?php 
if($_REQUEST['action']=='AchivForm'){ //**** Achivement ****// ?>
<td colspan="7" style="width:100%;">
  <table style="width:100%;" bgcolor="#EEF0AA" border="1" cellspacing="0" style="border-color:#EEF0AA;"> 
  <tr bgcolor="#EEF0AA">   
  <td class="th" style="width:5%;">SNo</td>
  <td class="th" style="width:8%;">ID</td>
  <td class="th" style="width:82%;">Achivement</td>
  <td class="th" style="width:5%;">Delete</td>
 </tr>

<?php $sql1=mysql_query("select AchivementId,Achivement from hrm_employee_pms_achivement INNER JOIN hrm_employee_pms ON hrm_employee_pms_achivement.EmpPmsId=hrm_employee_pms.EmpPmsId where hrm_employee_pms.EmployeeID=".$_REQUEST['EmpId']." AND hrm_employee_pms.EmpPmsId=".$_REQUEST['PmsId']." order by AchivementId ASC",$con); 
$A=1; while($res1=mysql_fetch_array($sql1)){ ?>	
 <tr bgcolor="#FFFFFF" style="height:22px;">   
  <td class="tdc"><?php echo $A;?></td>
  <td class="tdc"><?php echo $res1['AchivementId'];?></td>
  <td class="tdl"><?php echo $res1['Achivement'];?></td>
  <td class="tdc"><img src="images/delete.png" onClick="DelF1(<?php echo $res1['AchivementId'].','.$_REQUEST['EmpId'].','.$_REQUEST['PmsId']; ?>,'<?php echo $_REQUEST['action']; ?>')" /></td> 
  </tr>
<?php $A++; } ?>
 </table>
</td>

<?php }elseif($_REQUEST['action']=='KraForm'){ //**** Form A ****// ?>
<td colspan="7" style="width:100%;">
  <table style="width:100%;" bgcolor="#EEF0AA" border="1" cellspacing="0" style="border-color:#EEF0AA;"> 
  <tr bgcolor="#EEF0AA">   
   <td class="th" style="width:3%;">SNo</td>
   <td class="th" style="width:15%;">KRA/Goals</td>
   <td class="th" style="width:60%;">Description</td> 
   <td class="th" style="width:7%;">Measure</td>
   <td class="th" style="width:5%;">Unit</td> 
   <td class="th" style="width:5%;">Weightage</td>
   <td class="th" style="width:5%;">Target</td>
  </tr>

<?php $sql2=mysql_query("select * from hrm_employee_pms_kraforma INNER JOIN hrm_employee_pms ON hrm_employee_pms_kraforma.EmpPmsId=hrm_employee_pms.EmpPmsId where hrm_employee_pms.EmployeeID=".$_REQUEST['EmpId']." AND hrm_employee_pms.EmpPmsId=".$_REQUEST['PmsId']." AND hrm_employee_pms_kraforma.KRAFormAStatus='A' order by KRAFormAId ASC", $con); $B=1; while($res2=mysql_fetch_array($sql2)){ 
	 $sqlK=mysql_query("select * from hrm_pms_kra where KRAId=".$res2['KRAId'], $con); 
	 $resK=mysql_fetch_array($sqlK); ?>	
 <tr bgcolor="#FFFFFF">   
  <td class="tdc"><?php echo $B;?></td>
  <td class="tdl"><?php echo $resK['KRA'];?></td>
  <td class="tdl"><?php echo $resK['KRA_Description'];?></td> 
  <td class="tdc"><?php echo $resK['Measure'];?></td>
  <td class="tdc"><?php echo $resK['Unit'];?></td>
  <td class="tdc"><?php echo $res2['Weightage'];?></td>
  <td class="tdc"><?php echo $res2['Target'];?></td>
  </tr>
<?php $B++; } ?>
 </table>
 </td>
<?php }elseif($_REQUEST['action']=='BehavForm'){ //**** Form B ****// ?> 
<td colspan="7" style="width:100%;">
  <table style="width:100%;" bgcolor="#EEF0AA" border="1" cellspacing="0" style="border-color:#EEF0AA;"> 
  <tr bgcolor="#EEF0AA">   
  <td class="th" style="width:3%;">SNo</td>
  <td class="th" style="width:7%;">ID</td>
  <td class="th" style="width:20%;">Behavioral/Skills</td>
  <td class="th" style="width:55%;">Description</td>  
  <td class="th" style="width:5%;">Weightage</td>
  <td class="th" style="width:5%;">Target</td>
  <?php /*?><td class="th" style="width:5%;">Delete</td><?php */?>
 </tr>

<?php $sql3=mysql_query("select * from hrm_employee_pms_behavioralformb where EmpPmsId=".$_REQUEST['PmsId']." order by BehavioralFormBId ASC",$con); $C=1; while($res3=mysql_fetch_array($sql3)){
 $sqlB=mysql_query("select Skill,SkillComment,Weightage,Target from hrm_pms_formb where FormBId=".$res3['FormBId'],$con);  $resB=mysql_fetch_assoc($sqlB); ?>	
 <tr bgcolor="#FFFFFF">   
  <td class="tdc"><?php echo $C;?></td>
  <td class="tdc"><?php echo $res3['BehavioralFormBId'];?></td>
  <td class="tdl"><?php echo $resB['Skill'];?></td>
  <td class="tdl"><?php echo $resB['SkillComment'];?></td>  
  <td class="tdc"><?php echo $resB['Weightage'];?></td>
  <td class="tdc"><?php echo $resB['Target'];?></td>
  <?php /*?><td class="tdc"><img src="images/delete.png" onClick="DelF3(<?php echo $res3['BehavioralFormBId'].','.$_REQUEST['EmpId'].','.$_REQUEST['PmsId']; ?>,'<?php echo $_REQUEST['action']; ?>')" /></td> <?php */?>
  </tr>
<?php $C++; } ?>
 </table>
 </td>
<?php }elseif($_REQUEST['action']=='FeedBckForm'){ //**** FeedBack ****// ?>
<td colspan="7" style="width:100%;">
  <table style="width:100%;" bgcolor="#EEF0AA" border="1" cellspacing="0" style="border-color:#EEF0AA;"> 
  <tr bgcolor="#EEF0AA">   
  <td class="th" style="width:3%;">SNo</td>
  <td class="th" style="width:7%;">ID</td>
  <td class="th" style="width:40;">Question</td>
  <td class="th" style="width:45;">Answer</td>
  <td class="th" style="width:5%;">Delete</td>
 </tr>

<?php $sql4=mysql_query("select * from hrm_employee_pms_workenvironment where EmpPmsId=".$_REQUEST['PmsId']." order by EmpWorkEnvId ASC",$con); $D=1; while($res4=mysql_fetch_array($sql4)){ ?>	
 <tr bgcolor="#FFFFFF">   
  <td class="tdc"><?php echo $D;?></td>
  <td class="tdc"><?php echo $res4['EmpWorkEnvId'];?></td>
  <td class="tdl"><?php echo $res4['WorkEnvironment'];?></td>
  <td class="tdl"><?php echo $res4['Answer'];?></td>
  <td class="tdc"><img src="images/delete.png" onClick="DelF4(<?php echo $res4['EmpWorkEnvId'].','.$_REQUEST['EmpId'].','.$_REQUEST['PmsId']; ?>,'<?php echo $_REQUEST['action']; ?>')" /></td> 
  </tr>
<?php $D++; } ?>
 </table>
</td>
<?php } ?> 
</tr>
		</table>
	     </td>
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
</body>
</html>







