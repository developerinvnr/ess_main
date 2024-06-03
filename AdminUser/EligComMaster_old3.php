<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
/*********************************************/
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> 
.th{ font-family:Times New Roman;font-size:13px; font-weight:bold; text-align:center; height:24px; color:#FFFFFF; background-color:#7a6189; }
.tdc{ font-family:Times New Roman;font-size:13px; text-align:center;height:22px; }
.tdl{ font-family:Times New Roman;font-size:13px; text-align:left;height:22px; }
.tdr{ font-family:Times New Roman;font-size:13px; text-align:right;height:22px; }
.input{ font-family:Times New Roman; font-size:12px; width:99%; height:20px; border:hidden; background-color:#FFFFFF;}
.inputc{ font-family:Times New Roman; font-size:12px; width:99%; height:20px; border:hidden; text-align:center; background-color:#FFFFFF;}
.sel{ font-family:Times New Roman; font-size:12px; width:99%; height:21px; }
.selb{ font-family:Times New Roman; font-size:12px; width:99%; height:21px; border:hidden; background-color:#CBD6B4; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.inner_table{height:550px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript">
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '500px' }); })

function SelBtnFun(d)
{
 var t=document.getElementById("ActivityList").value;
 var s1=document.getElementById("Inp_1").value; var s2=document.getElementById("Inp_2").value; 
 var s3=document.getElementById("Inp_3").value; var s4=document.getElementById("Inp_4").value;
 var s5=document.getElementById("Inp_5").value; var s6=document.getElementById("Inp_6").value; 
 var s7=document.getElementById("Inp_7").value;	var s8=document.getElementById("Inp_8").value;
 var s9=document.getElementById("Inp_9").value; var s10=document.getElementById("Inp_10").value; 
 var s11=document.getElementById("Inp_11").value; var s12=document.getElementById("Inp_12").value;
 var s13=document.getElementById("Inp_13").value; var s14=document.getElementById("Inp_14").value;	
 var s15=document.getElementById("Inp_15").value; var s16=document.getElementById("Inp_16").value;
 var s17=document.getElementById("Inp_17").value; var s18=document.getElementById("Inp_18").value;	
 var s19=document.getElementById("Inp_19").value; var s20=document.getElementById("Inp_20").value;
 var x = "EligComMaster.php?d="+d+"&t="+t+"&dp1="+s1+"&dp2="+s2+"&dp3="+s3+"&dp4="+s4+"&dp5="+s5+"&dp6="+s6+"&dp7="+s7+"&dp8="+s8+"&dp9="+s9+"&dp10="+s10+"&dp11="+s11+"&dp12="+s12+"&dp13="+s13+"&dp14="+s14+"&dp15="+s15+"&dp16="+s16+"&dp17="+s17+"&dp18="+s18+"&dp19="+s19+"&dp20="+s20; window.location=x; 
} 

function SelFun(t,d)
{ 
 var s1=document.getElementById("Inp_1").value; var s2=document.getElementById("Inp_2").value; 
 var s3=document.getElementById("Inp_3").value; var s4=document.getElementById("Inp_4").value;
 var s5=document.getElementById("Inp_5").value; var s6=document.getElementById("Inp_6").value; 
 var s7=document.getElementById("Inp_7").value;	var s8=document.getElementById("Inp_8").value;
 var s9=document.getElementById("Inp_9").value; var s10=document.getElementById("Inp_10").value; 
 var s11=document.getElementById("Inp_11").value; var s12=document.getElementById("Inp_12").value;
 var s13=document.getElementById("Inp_13").value; var s14=document.getElementById("Inp_14").value;	
 var s15=document.getElementById("Inp_15").value; var s16=document.getElementById("Inp_16").value;
 var s17=document.getElementById("Inp_17").value; var s18=document.getElementById("Inp_18").value;	
 var s19=document.getElementById("Inp_19").value; var s20=document.getElementById("Inp_20").value;
 var x = "EligComMaster.php?d="+d+"&t="+t+"&dp1="+s1+"&dp2="+s2+"&dp3="+s3+"&dp4="+s4+"&dp5="+s5+"&dp6="+s6+"&dp7="+s7+"&dp8="+s8+"&dp9="+s9+"&dp10="+s10+"&dp11="+s11+"&dp12="+s12+"&dp13="+s13+"&dp14="+s14+"&dp15="+s15+"&dp16="+s16+"&dp17="+s17+"&dp18="+s18+"&dp19="+s19+"&dp20="+s20; window.location=x; 
}

function FunSetElig(vlu,type,clm,grd,dpt,vrt,ii,com,usr,idnm,gv)
{ 
 
 document.getElementById('loaderDiv').style.display='block';	 
 var url = 'EligComMasterAjax.php'; var pars = 'Act=EligMasterUpdate&vlu='+vlu+'&type='+type+'&clm='+clm+'&grd='+grd+'&dpt='+dpt+'&vrt='+vrt+'&ii='+ii+'&com='+com+'&usr='+usr+'&idnm='+idnm+'&gv='+gv;	
 var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_Return });

}
function show_Return(originalRequest)
{ document.getElementById('SpanForElig').innerHTML = originalRequest.responseText; 

  var Upsts = document.getElementById("Upsts").value; 
  var type = document.getElementById("type").value; var grd = document.getElementById("grd").value;  
  var dpt = document.getElementById("dpt").value; var vrt = document.getElementById("vrt").value;  
  var ii = document.getElementById("ii").value; var idnm = document.getElementById("idnm").value;
  document.getElementById('loaderDiv').style.display='none';
  
  //alert(idnm+""+ii+"_"+grd+"_"+dpt+"_"+vrt);
  //alert(document.getElementById(idnm+""+ii+"_"+grd+"_"+dpt+"_"+vrt).value);
  if(Upsts=='Y')
  {
	//alert("Records update successfully!");
	document.getElementById(idnm+""+ii+"_"+grd+"_"+dpt+"_"+vrt).style.background='#CBFF97';
  }
  else
  { 
   //alert("Error occour"); 
   document.getElementById(idnm+""+ii+""+grd+"_"+dpt+"_"+vrt).style.background='#FFCACA';
  }
  
    
} 

</SCRIPT> 
</head>
<body class="body">

<div id="loaderDiv" style="background-color: rgba(0,0,0,0.8);width: 100%;height: 100%;position: fixed;top:0px;left: 0px;font-size: 12px; display:none;">	
	<center>
	<span style="color:white;top: 50%;left:38%;position: absolute;">Please Wait, working on Progress...<img src="images/loader.gif"></span>
	</center>
</div>
<span id="SpanForElig"></span>
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //******************************************************************************?>
<?php //****************START*****START*****START******START******START***************************?>
<?php //******************************************************************************?>


<table border="0" style="margin-top:0px; width:100%;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td width="200" class="heading">Eligibility Master </td>
	  <td style="width:300px;"><select class="sel" id="ActivityList" onChange="SelFun(this.value,<?=$_REQUEST['d']?>)">
	  <option value="1" <?php if($_REQUEST['t']==1){echo 'selected';}?>>Lodging Entitlement</option>
	  <option value="2" <?php if($_REQUEST['t']==2){echo 'selected';}?>>Daily Allowance</option>
	  <option value="3" <?php if($_REQUEST['t']==3){echo 'selected';}?>>Mobile Handset & Reimbursement</option>
	  <option value="4" <?php if($_REQUEST['t']==4){echo 'selected';}?>>Laptop Eligibility & Limit</option>
	  <option value="5" <?php if($_REQUEST['t']==5){echo 'selected';}?>>Mediclaim Cov. & Helth Checkup</option>
	  <option value="6" <?php if($_REQUEST['t']==6){echo 'selected';}?>>Travel Entitlement - Flight</option>
	  <option value="7" <?php if($_REQUEST['t']==7){echo 'selected';}?>>Travel Entitlement - Train</option>
	  <option value="8" <?php if($_REQUEST['t']==8){echo 'selected';}?>>Travel Eligibility - Two Wheeler</option>
	  <option value="9" <?php if($_REQUEST['t']==9){echo 'selected';}?>>Travel Eligibility - Four Wheeler</option>
	  <option value="10" <?php if($_REQUEST['t']==10){echo 'selected';}?>>Vehicle Value Limit</option>
	  <option value="11" <?php if($_REQUEST['t']==11){echo 'selected';}?>>Travel Mode</option>
	  </select> </td>
	  <td align="left">
	    <input type="button" name="click" id="click" style="width:90px;" value="click" onClick="SelBtnFun(<?=$_REQUEST['d']?>)"/>
		<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
		<input type="button" name="Refrash" value="refresh" style="width:90px;" onClick="javascript:window.location='EligComMaster.php?d=1&t=1'"/></td>
	  <td style="width:250px; text-align:right; font-family:Times New Roman;font-size:14px; color:#DF4800;">
	 
	  </td>	
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
	<tr>
	 <td colspan="10">
<!-------------------------------------->
 <table border="0" cellpadding="0" cellspacing="4" cellpadding="0"> 
   <tr> 
<?php $sqlDe=mysql_query("select DepartmentId, DepartmentName, DepartmentCode from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' AND DepartmentName!='Management' AND DepartmentName!='Farm' order by DepartmentName", $con); $no=0; $rowDe=mysql_num_rows($sqlDe); while($resDe=mysql_fetch_array($sqlDe)){ $no=$no+1; ?>		
    <td align="center" style="height:25px;background-color:#AD6DB6;font-family:Times New Roman;font-size:12px;color:#FFFFFF;font-weight:bold; width:120px;" id="TD_<?php echo $no; ?>">
	<input type="checkbox" id="Chk_<?php echo $no; ?>" <?php if($_REQUEST['dp'.$no]>0){echo 'checked';} ?> onClick="ClickChkHq(<?php echo $no.','.$resDe['DepartmentId']; ?>)" />&nbsp;<?php echo substr_replace($resDe['DepartmentCode'], '', 10); ?></td>
<?php if($no%10==0) { ?></tr><tr> <?php } } ?>
  <?php for($no=1; $no<=20; $no++){ ?> <input type="hidden" id="Inp_<?php echo $no; ?>" value="<?php if($_REQUEST['dp'.$no]>0){echo $_REQUEST['dp'.$no]; }else{echo '0';} ?>" /> <?php } ?>	
  </table>
<script language="javascript">
function ClickChkHq(no,dpi)
{ if(document.getElementById("Chk_"+no).checked==true){document.getElementById("Inp_"+no).value=dpi;}
  else if(document.getElementById("Chk_"+no).checked==false){document.getElementById("Inp_"+no).value=0;} 
}
</script>
<!-------------------------------------->	  
	 </td>
	</tr>
   </table>
  </td>
 </tr>
<?php if($_SESSION['login'] = true) { ?>	
 <tr>
<?php $Dpt="AND (DepartmentId='".$_REQUEST['dp1']."' OR DepartmentId='".$_REQUEST['dp2']."' OR DepartmentId='".$_REQUEST['dp3']."' OR DepartmentId='".$_REQUEST['dp4']."' OR DepartmentId='".$_REQUEST['dp5']."' OR DepartmentId='".$_REQUEST['dp6']."' OR DepartmentId='".$_REQUEST['dp7']."' OR DepartmentId='".$_REQUEST['dp8']."' OR DepartmentId='".$_REQUEST['dp9']."' OR DepartmentId='".$_REQUEST['dp10']."' OR DepartmentId='".$_REQUEST['dp11']."' OR DepartmentId='".$_REQUEST['dp12']."' OR DepartmentId='".$_REQUEST['dp13']."' OR DepartmentId='".$_REQUEST['dp14']."' OR DepartmentId='".$_REQUEST['dp15']."' OR DepartmentId='".$_REQUEST['dp16']."' OR DepartmentId='".$_REQUEST['dp17']."' OR DepartmentId='".$_REQUEST['dp18']."' OR DepartmentId='".$_REQUEST['dp19']."' OR DepartmentId='".$_REQUEST['dp20']."')"; ?>

<?php $sD=mysql_query("select DepartmentId, DepartmentName, DepartmentCode from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' AND DepartmentName!='Management' AND DepartmentName!='Farm' ".$Dpt." order by DepartmentName",$con); 
$rowD=mysql_num_rows($sD);  $Dptry=array(); while($rD=mysql_fetch_assoc($sD)){ $Dptry[]=$rD; } ?>
 
<?php //*****************************************************************************************************?> 
<td align="left" id="type" valign="top" style="display:block;width:100%">             
   <table border="0" style="width:100%;">
   
	<tr>
	  <td align="left" style="width:100%;">
	     <table border="1" id="table1" style="width:100%;background-color:#FFFFFF;" cellspacing="0">
		  <div class="thead">
		  <thead>
		  <tr>
		   <td class="th" rowspan="3" style="width:40px;">Grade</td>
		   <td class="th" style="width:150px;">Eligibility Type</td>
		   <td class="th" colspan="40">Department</td>
		  </tr>
		  <tr>
		   <td class="th" rowspan="2"><?php if($_REQUEST['t']==1){echo 'Lodging Entitlement';}elseif($_REQUEST['t']==2){echo 'Daily Allowance';}elseif($_REQUEST['t']==3){echo 'Mobile Handset & Reimbursement'; }elseif($_REQUEST['t']==4){echo 'Laptop Eligibility & Limit'; } elseif($_REQUEST['t']==5){echo 'Mediclaim Cov. & Helth Checkup';}elseif($_REQUEST['t']==6){echo 'Travel Entitlement - Flight';}elseif($_REQUEST['t']==7){echo 'Travel Entitlement - Train';}elseif($_REQUEST['t']==8){echo 'Travel Eligibility - Two Wheeler';}elseif($_REQUEST['t']==9){echo 'Travel Eligibility - Four Wheeler';}elseif($_REQUEST['t']==10){echo 'Vehicle Value Limit';}elseif($_REQUEST['t']==11){echo 'Travel Mode';} ?>
		   </td>
		   <?php foreach($Dptry as $data){ //while($rD=mysql_fetch_assoc($sD)){ ?>
		    <?php $sVr=mysql_query("select v.VerticalId,v.VerticalName from hrm_department_vertical v inner join hrm_employee_general g on v.VerticalId=g.EmpVertical where v.ComId=".$CompanyId." AND v.DeptId=".$data['DepartmentId']." group by v.VerticalName order by v.VerticalName ASC", $con); $rowVr=mysql_num_rows($sVr);  
			$Verry=array(); 
			?>
		   <td class="th" style="width:100px;" <?php if($rowVr>0){echo "colspan=".$rowVr;}else{echo "rowspan=2"; }?>><?=$data['DepartmentCode']?></td>
		   <?php } ?>
		 </tr>
		 <tr>
		   <?php foreach($Dptry as $data){ ?>
		    <?php $sVr=mysql_query("select v.VerticalId,v.VerticalName from hrm_department_vertical v inner join hrm_employee_general g on v.VerticalId=g.EmpVertical where v.ComId=".$CompanyId." AND v.DeptId=".$data['DepartmentId']." group by v.VerticalName order by v.VerticalName ASC", $con); $rowVr=mysql_num_rows($sVr);  
			$Verry=array(); while($rVr=mysql_fetch_assoc($sVr)){ ?>
		   <td class="th" style="width:100px;"><?=$rVr['VerticalName']?></td>
		   <?php } } ?>
		 </tr>
		 </thead>
		 </div>
		 
		 <?php if($_REQUEST['t']==1 OR $_REQUEST['t']==6 OR $_REQUEST['t']==7 OR $_REQUEST['t']==8 OR $_REQUEST['t']==9){$n=3;}elseif($_REQUEST['t']==2 OR $_REQUEST['t']==5){$n=2;}elseif($_REQUEST['t']==3){$n=4;}elseif($_REQUEST['t']==4 OR $_REQUEST['t']==10 OR $_REQUEST['t']==11){$n=1;}?>
         <?php if($CompanyId==1){$sqlG = mysql_query("select * from hrm_grade where CompanyId=".$CompanyId." AND CreatedDate>='2014-02-01' order by GradeId DESC", $con);}else{$sqlG = mysql_query("select * from hrm_grade where CompanyId=".$CompanyId." order by GradeId DESC", $con);} $sno=1; while($resG = mysql_fetch_array($sqlG)){ ?>
		 
		 <div class="tbody">
         <tbody>
		 
		 <?php for($i=1; $i<=$n; $i++){  $iv=''; ?> 		 
		 <tr style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>">
		  <?php if($i==1){?><td class="tdc" rowspan="<?php if($_REQUEST['t']==1 OR $_REQUEST['t']==6 OR $_REQUEST['t']==7 OR $_REQUEST['t']==8 OR $_REQUEST['t']==9){echo '3';}elseif($_REQUEST['t']==2 OR $_REQUEST['t']==5){echo '2';}elseif($_REQUEST['t']==3){echo '4'; }elseif($_REQUEST['t']==4){echo '1'; }?>"><b><?=$resG['GradeValue']?></b></td><?php } ?>
		  
		  <?php if($_REQUEST['t']==1){ /******* -------- 1111111111 --------**********/ ?>
	      <td class="tdl">City Cetegory <?php if($i==1){echo 'A'; $iv='CategoryA'; }
	      elseif($i==2){echo 'B'; $iv='CategoryB'; }
	      elseif($i==3){echo 'C'; $iv='CategoryC'; }?></td>
		    <?php foreach($Dptry as $data){ $sVr=mysql_query("select v.VerticalId,v.VerticalName from hrm_department_vertical v inner join hrm_employee_general g on v.VerticalId=g.EmpVertical where v.ComId=".$CompanyId." AND v.DeptId=".$data['DepartmentId']." group by v.VerticalName order by v.VerticalName ASC", $con); $rowVr=mysql_num_rows($sVr);
			if($rowVr==0){ $sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$data['DepartmentId']." AND GradeId=".$resG['GradeId'],$con); $res=mysql_fetch_assoc($sql);?>
			 <td class="tdc">
			 <input class="inputc" id="Category<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_0'?>" value="<?php if($i==1){echo $res['CategoryA'];}elseif($i==2){echo $res['CategoryB'];}elseif($i==3){echo $res['CategoryC'];}?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].',0,'.$i.','.$CompanyId.','.$UserId?>,'Category','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"/></td> 
		    <?php }else{ $Verry=array(); while($rVr=mysql_fetch_assoc($sVr)){ 
			$sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$data['DepartmentId']." AND GradeId=".$resG['GradeId']." AND VerticalId=".$rVr['VerticalId'],$con); $res=mysql_fetch_assoc($sql);?>
		     <td class="tdc"><input class="inputc" id="Category<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_'.$rVr['VerticalId']?>" value="<?php if($i==1){echo $res['CategoryA'];}elseif($i==2){echo $res['CategoryB'];}elseif($i==3){echo $res['CategoryC'];}?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].','.$rVr['VerticalId'].','.$i.','.$CompanyId.','.$UserId?>,'Category','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"/></td>
		    <?php }/*while*/  }/*else*/ }/*foreach*/ ?>
		   
		  
		  <?php } elseif($_REQUEST['t']==2){ /******* -------- 2222222222 --------**********/ ?>
		   <td class="tdl">DA <?php if($i==1){echo 'OutSide@HQ'; $iv='DA_OutSiteHQ'; }
		   elseif($i==2){echo '@HQ'; $iv='DA_InSiteHQ'; }  ?></td>
		   <?php foreach($Dptry as $data){ $sVr=mysql_query("select v.VerticalId,v.VerticalName from hrm_department_vertical v inner join hrm_employee_general g on v.VerticalId=g.EmpVertical where v.ComId=".$CompanyId." AND v.DeptId=".$data['DepartmentId']." group by v.VerticalName order by v.VerticalName ASC", $con); $rowVr=mysql_num_rows($sVr);
			if($rowVr==0){ $sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$data['DepartmentId']." AND GradeId=".$resG['GradeId'],$con); $res=mysql_fetch_assoc($sql);?>
			 <td class="tdc"><input class="inputc" id="DA<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_0'?>" value="<?php if($i==1){echo $res['DA_OutSiteHQ'];}elseif($i==2){echo $res['DA_InSiteHQ'];}?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].',0,'.$i.','.$CompanyId.','.$UserId?>,'DA','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"/></td> 
		    <?php }else{ $Verry=array(); while($rVr=mysql_fetch_assoc($sVr)){ 
			$sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$data['DepartmentId']." AND GradeId=".$resG['GradeId']." AND VerticalId=".$rVr['VerticalId'],$con); $res=mysql_fetch_assoc($sql);?>
		     <td class="tdc"><input class="inputc" id="DA<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_'.$rVr['VerticalId']?>" value="<?php if($i==1){echo $res['DA_OutSiteHQ'];}elseif($i==2){echo $res['DA_InSiteHQ'];}?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].','.$rVr['VerticalId'].','.$i.','.$CompanyId.','.$UserId?>,'DA','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"/></td>
		    <?php }/*while*/  }/*else*/ }/*foreach*/ ?>
		  
		  <?php } elseif($_REQUEST['t']==3){ /******* -------- 3333333333 --------**********/ ?>
		   <td class="tdl"><?php if($i==1){echo 'Mobile Normal(Rs)'; $iv='Mobile'; }
		   elseif($i==2){echo 'Mobile GPRS(Rs)'; $iv='Mobile_WithGPS'; }
		   elseif($i==3){echo 'Reimb.(Rs)'; $iv='Mobile_Remb'; }
		   elseif($i==4){echo 'Reimb. Period'; $iv='Mobile_Remb_Period'; }?></td>
		   <?php foreach($Dptry as $data){ $sVr=mysql_query("select v.VerticalId,v.VerticalName from hrm_department_vertical v inner join hrm_employee_general g on v.VerticalId=g.EmpVertical where v.ComId=".$CompanyId." AND v.DeptId=".$data['DepartmentId']." group by v.VerticalName order by v.VerticalName ASC", $con); $rowVr=mysql_num_rows($sVr);
			
			if($rowVr==0){ $sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$data['DepartmentId']." AND GradeId=".$resG['GradeId'],$con); $res=mysql_fetch_assoc($sql);?>
			 <td class="tdc"><?php if($i!=4){?><input class="inputc" id="Mob<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_0'?>" value="<?php if($i==1){echo $res['Mobile'];}elseif($i==2){echo $res['Mobile_WithGPS'];}elseif($i==3){echo $res['Mobile_Remb'];}?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].',0,'.$i.','.$CompanyId.','.$UserId?>,'Mob','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"/><?php }else{ ?><select class="selb" id="Mob<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_0'?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].',0,'.$i.','.$CompanyId.','.$UserId?>,'Mob','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"><option value="" <?php if($res['Mobile_Remb_Period']==''){echo 'selected';}?>></option>
		    <option value="Mnt" <?php if($res['Mobile_Remb_Period']=='Mnt'){echo 'selected';}?>>Monthly</option>
		    <option value="Qtr" <?php if($res['Mobile_Remb_Period']=='Qtr'){echo 'selected';}?>>Quarter</option>
		    <option value="1/2 Yearly" <?php if($res['Mobile_Remb_Period']=='1/2 Yearly'){echo 'selected';}?>>1/2 Yearly</option>
		   <option value="Yearly" <?php if($res['Mobile_Remb_Period']=='Yearly'){echo 'selected';}?>>Yearly</option>
		   </select><?php } ?>
			 </td> 
		    <?php }else{ $Verry=array(); while($rVr=mysql_fetch_assoc($sVr)){ 
			$sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$data['DepartmentId']." AND GradeId=".$resG['GradeId']." AND VerticalId=".$rVr['VerticalId'],$con); $res=mysql_fetch_assoc($sql);?>
		     <td class="tdc"><?php if($i!=4){?><input class="inputc" id="Mob<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_'.$rVr['VerticalId']?>" value="<?php if($i==1){echo $res['Mobile'];}elseif($i==2){echo $res['Mobile_WithGPS'];}elseif($i==3){echo $res['Mobile_Remb'];}?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].','.$rVr['VerticalId'].','.$i.','.$CompanyId.','.$UserId?>,'Mob','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"/><?php }else{ ?><select class="selb" id="Mob<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_'.$rVr['VerticalId']?>" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].','.$rVr['VerticalId'].','.$i.','.$CompanyId.','.$UserId?>,'Mob','<?=$resG['GradeValue']?>')"><option value="" <?php if($res['Mobile_Remb_Period']==''){echo 'selected';}?>></option>
		    <option value="Mnt" <?php if($res['Mobile_Remb_Period']=='Mnt'){echo 'selected';}?>>Monthly</option>
		    <option value="Qtr" <?php if($res['Mobile_Remb_Period']=='Qtr'){echo 'selected';}?>>Quarter</option>
		    <option value="1/2 Yearly" <?php if($res['Mobile_Remb_Period']=='1/2 Yearly'){echo 'selected';}?>>1/2 Yearly</option>
		   <option value="Yearly" <?php if($res['Mobile_Remb_Period']=='Yearly'){echo 'selected';}?>>Yearly</option>
		   </select><?php } ?></td>
		    <?php }/*while*/  }/*else*/ }/*foreach*/ ?>
		  
		  <?php } elseif($_REQUEST['t']==4){ /******* -------- 4444444444 --------**********/ ?>
		   <td class="tdl"><?php if($i==1){echo 'Laptop (Rs)';} $iv='Laptop_Amt'; ?></td>
		   <?php foreach($Dptry as $data){ $sVr=mysql_query("select v.VerticalId,v.VerticalName from hrm_department_vertical v inner join hrm_employee_general g on v.VerticalId=g.EmpVertical where v.ComId=".$CompanyId." AND v.DeptId=".$data['DepartmentId']." group by v.VerticalName order by v.VerticalName ASC", $con); $rowVr=mysql_num_rows($sVr);
			if($rowVr==0){ $sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$data['DepartmentId']." AND GradeId=".$resG['GradeId'],$con); $res=mysql_fetch_assoc($sql);?>
			 <td class="tdc"><input class="inputc" id="Laptop<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_0'?>" value="<?php if($i==1){echo $res['Laptop_Amt'];}?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].',0,'.$i.','.$CompanyId.','.$UserId?>,'Laptop','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"/></td> 
		    <?php }else{ $Verry=array(); while($rVr=mysql_fetch_assoc($sVr)){ 
			$sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$data['DepartmentId']." AND GradeId=".$resG['GradeId']." AND VerticalId=".$rVr['VerticalId'],$con); $res=mysql_fetch_assoc($sql);?>
		     <td class="tdc"><input class="inputc" id="Laptop<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_'.$rVr['VerticalId']?>" value="<?php if($i==1){echo $res['Laptop_Amt'];}?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].','.$rVr['VerticalId'].','.$i.','.$CompanyId.','.$UserId?>,'Laptop','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"/></td>
		    <?php }/*while*/  }/*else*/ }/*foreach*/ ?>
		  
		  <?php } elseif($_REQUEST['t']==5){ /******* -------- 5555555555 --------**********/ ?>
		  <td class="tdl"><?php if($i==1){echo 'Mediclaim Slabs(Rs)'; $iv='Mediclaim_Coverage_Slabs'; }
		  elseif($i==2){echo 'Helth Checkup(Rs)'; $iv='Helth_CheckUp'; }?></td>
		   <?php foreach($Dptry as $data){ $sVr=mysql_query("select v.VerticalId,v.VerticalName from hrm_department_vertical v inner join hrm_employee_general g on v.VerticalId=g.EmpVertical where v.ComId=".$CompanyId." AND v.DeptId=".$data['DepartmentId']." group by v.VerticalName order by v.VerticalName ASC", $con); $rowVr=mysql_num_rows($sVr);
			if($rowVr==0){ $sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$data['DepartmentId']." AND GradeId=".$resG['GradeId'],$con); $res=mysql_fetch_assoc($sql);?>
			 <td class="tdc"><input class="inputc" id="Medi<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_0'?>" value="<?php if($i==1){echo $res['Mediclaim_Coverage_Slabs'];}elseif($i==2){echo $res['Helth_CheckUp'];} ?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].',0,'.$i.','.$CompanyId.','.$UserId?>,'Medi','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"/></td> 
		    <?php }else{ $Verry=array(); while($rVr=mysql_fetch_assoc($sVr)){ 
			$sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$data['DepartmentId']." AND GradeId=".$resG['GradeId']." AND VerticalId=".$rVr['VerticalId'],$con); $res=mysql_fetch_assoc($sql);?>
		     <td class="tdc"><input class="inputc" id="Medi<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_'.$rVr['VerticalId']?>" value="<?php if($i==1){echo $res['Mediclaim_Coverage_Slabs'];}elseif($i==2){echo $res['Helth_CheckUp'];}?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].','.$rVr['VerticalId'].','.$i.','.$CompanyId.','.$UserId?>,'Medi','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"/></td>
		    <?php }/*while*/  }/*else*/ }/*foreach*/ ?>
		   
		  <?php } elseif($_REQUEST['t']==6){ /******* -------- 6666666666 --------**********/ ?>
		   <td class="tdl"><?php if($i==1){echo 'Flight Allow'; $iv='Flight_YN'; }
		   elseif($i==2){echo 'Flight Class'; $iv='Flight_Class'; }
		   elseif($i==3){echo 'Any Remark'; $iv='Flight_Class_Rmk'; }?></td>
		   <?php foreach($Dptry as $data){ $sVr=mysql_query("select v.VerticalId,v.VerticalName from hrm_department_vertical v inner join hrm_employee_general g on v.VerticalId=g.EmpVertical where v.ComId=".$CompanyId." AND v.DeptId=".$data['DepartmentId']." group by v.VerticalName order by v.VerticalName ASC", $con); $rowVr=mysql_num_rows($sVr);
			if($rowVr==0){ $sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$data['DepartmentId']." AND GradeId=".$resG['GradeId'],$con); $res=mysql_fetch_assoc($sql);?>
			 <td class="tdc">
			 <?php if($i==1){ ?><select class="selb" id="Flight<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_0'?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].',0,'.$i.','.$CompanyId.','.$UserId?>,'Flight','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"><option value="N" <?php if($res['Flight_YN']=='N'){echo 'selected';}?>>No</option><option value="Y" <?php if($res['Flight_YN']=='Y'){echo 'selected';}?>>Yes</option></select>
			 <?php } elseif($i==2){ ?><select class="selb" id="Flight<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_0'?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].',0,'.$i.','.$CompanyId.','.$UserId?>,'Flight','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"><option value="Economy" <?php if($res['Flight_Class']=='Economy'){echo 'selected';}?>>Economy</option><option value="Business" <?php if($res['Flight_Class']=='Business'){echo 'selected';}?>>Business</option><option value="" <?php if($res['Flight_Class']==''){echo 'selected';}?>></option></select>
			 <?php } elseif($i==3){ ?><input class="inputc" id="Flight<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_0'?>" value="<?=$res['Flight_Class_Rmk']?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].',0,'.$i.','.$CompanyId.','.$UserId?>,'Flight','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"/>
			 <?php } ?>
			 </td> 
		    <?php }else{ $Verry=array(); while($rVr=mysql_fetch_assoc($sVr)){ 
			$sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$data['DepartmentId']." AND GradeId=".$resG['GradeId']." AND VerticalId=".$rVr['VerticalId'],$con); $res=mysql_fetch_assoc($sql);?>
		     <td class="tdc">
			 <?php if($i==1){ ?><select class="selb" id="Flight<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_'.$rVr['VerticalId']?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].','.$rVr['VerticalId'].','.$i.','.$CompanyId.','.$UserId?>,'Flight','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"><option value="N" <?php if($res['Flight_YN']=='N'){echo 'selected';}?>>No</option><option value="Y" <?php if($res['Flight_YN']=='Y'){echo 'selected';}?>>Yes</option></select>
			 <?php } elseif($i==2){ ?><select class="selb" id="Flight<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_'.$rVr['VerticalId']?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].','.$rVr['VerticalId'].','.$i.','.$CompanyId.','.$UserId?>,'Flight','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"><option value="Economy" <?php if($res['Flight_Class']=='Economy'){echo 'selected';}?>>Economy</option><option value="Business" <?php if($res['Flight_Class']=='Business'){echo 'selected';}?>>Business</option><option value="" <?php if($res['Flight_Class']==''){echo 'selected';}?>></option></select>
			 <?php } elseif($i==3){ ?><input class="inputc" id="Flight<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_'.$rVr['VerticalId']?>" value="<?=$res['Flight_Class_Rmk']?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].','.$rVr['VerticalId'].','.$i.','.$CompanyId.','.$UserId?>,'Flight','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"/>
			 <?php } ?>
			 </td>
		    <?php }/*while*/  }/*else*/ }/*foreach*/ ?>
		   
		  <?php } elseif($_REQUEST['t']==7){ /******* -------- 7777777777 --------**********/ ?>
		   <td class="tdl"><?php if($i==1){echo 'Train Allow'; $iv='Train_YN'; }
		   elseif($i==2){echo 'Train Class'; $iv='Train_Class'; }
		   elseif($i==3){echo 'Any Remark'; $iv='Train_Class_Rmk'; }?></td>
		  <?php foreach($Dptry as $data){ $sVr=mysql_query("select v.VerticalId,v.VerticalName from hrm_department_vertical v inner join hrm_employee_general g on v.VerticalId=g.EmpVertical where v.ComId=".$CompanyId." AND v.DeptId=".$data['DepartmentId']." group by v.VerticalName order by v.VerticalName ASC", $con); $rowVr=mysql_num_rows($sVr);
			if($rowVr==0){ $sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$data['DepartmentId']." AND GradeId=".$resG['GradeId'],$con); $res=mysql_fetch_assoc($sql);?>
			 <td class="tdc">
			 <?php if($i==1){ ?><select class="selb" id="Train<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_0'?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].',0,'.$i.','.$CompanyId.','.$UserId?>,'Train','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"><option value="N" <?php if($res['Train_YN']=='N'){echo 'selected';}?>>No</option><option value="Y" <?php if($res['Train_YN']=='Y'){echo 'selected';}?>>Yes</option></select>
			 <?php } elseif($i==2){ ?><select class="selb" id="Train<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_0'?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].',0,'.$i.','.$CompanyId.','.$UserId?>,'Train','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>">           <option value="General" <?php if($res['Train_Class']=='General'){echo 'selected';}?>>General</option>
		   <option value="Sleeper" <?php if($res['Train_Class']=='Sleeper'){echo 'selected';}?>>Sleeper</option>
		   <option value="AC-III" <?php if($res['Train_Class']=='AC-III'){echo 'selected';}?>>AC-III</option>
		   <option value="AC-II" <?php if($res['Train_Class']=='AC-II'){echo 'selected';}?>>AC-II</option> 
		   <option value="AC-I" <?php if($res['Train_Class']=='AC-I'){echo 'selected';}?>>AC-I</option>
		   <option value="AC" <?php if($res['Train_Class']=='AC'){echo 'selected';}?>>AC</option>
		   </select>
			 <?php } elseif($i==3){ ?><input class="inputc" id="Train<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_0'?>" value="<?=$res['Train_Class_Rmk']?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].',0,'.$i.','.$CompanyId.','.$UserId?>,'Train','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"/>
			 <?php } ?>
			 </td> 
		    <?php }else{ $Verry=array(); while($rVr=mysql_fetch_assoc($sVr)){ 
			$sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$data['DepartmentId']." AND GradeId=".$resG['GradeId']." AND VerticalId=".$rVr['VerticalId'],$con); $res=mysql_fetch_assoc($sql);?>
		     <td class="tdc">
			 <?php if($i==1){ ?><select class="selb" id="Train<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_'.$rVr['VerticalId']?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].','.$rVr['VerticalId'].','.$i.','.$CompanyId.','.$UserId?>,'Train','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"><option value="N" <?php if($res['Train_YN']=='N'){echo 'selected';}?>>No</option><option value="Y" <?php if($res['Train_YN']=='Y'){echo 'selected';}?>>Yes</option></select>
			 <?php } elseif($i==2){ ?><select class="selb" id="Train<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_'.$rVr['VerticalId']?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].','.$rVr['VerticalId'].','.$i.','.$CompanyId.','.$UserId?>,'Train','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>">
		   <option value="General" <?php if($res['Train_Class']=='General'){echo 'selected';}?>>General</option>
		   <option value="Sleeper" <?php if($res['Train_Class']=='Sleeper'){echo 'selected';}?>>Sleeper</option>
		   <option value="AC-III" <?php if($res['Train_Class']=='AC-III'){echo 'selected';}?>>AC-III</option>
		   <option value="AC-II" <?php if($res['Train_Class']=='AC-II'){echo 'selected';}?>>AC-II</option> 
		   <option value="AC-I" <?php if($res['Train_Class']=='AC-I'){echo 'selected';}?>>AC-I</option>
		   <option value="AC" <?php if($res['Train_Class']=='AC'){echo 'selected';}?>>AC</option>
		   </select>
			 <?php } elseif($i==3){ ?><input class="inputc" id="Train<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_'.$rVr['VerticalId']?>" value="<?=$res['Train_Class_Rmk']?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].','.$rVr['VerticalId'].','.$i.','.$CompanyId.','.$UserId?>,'Train','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"/>
			 <?php } ?>
			 </td>
		    <?php }/*while*/  }/*else*/ }/*foreach*/ ?> 
		   
		  <?php } elseif($_REQUEST['t']==8){ /******* -------- 8888888888 --------**********/ ?>
		   <td class="tdl"><?php if($i==1){echo '2W: Rs/Km'; $iv='TW_Km'; }
		   elseif($i==2){echo '2W: Km/Month'; $iv='TW_InHQ_M'; }
		   elseif($i==3){echo '2W: Remark'; $iv='TW_InHQ_D'; } ?></td>
		   <?php foreach($Dptry as $data){ $sVr=mysql_query("select v.VerticalId,v.VerticalName from hrm_department_vertical v inner join hrm_employee_general g on v.VerticalId=g.EmpVertical where v.ComId=".$CompanyId." AND v.DeptId=".$data['DepartmentId']." group by v.VerticalName order by v.VerticalName ASC", $con); $rowVr=mysql_num_rows($sVr);
			if($rowVr==0){ $sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$data['DepartmentId']." AND GradeId=".$resG['GradeId'],$con); $res=mysql_fetch_assoc($sql);?>
			 <td class="tdc"><input class="inputc" id="Two<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_0'?>" value="<?php if($i==1){echo $res['TW_Km'];}elseif($i==2){echo $res['TW_InHQ_M'];}elseif($i==3){echo $res['TW_InHQ_D'];}?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].',0,'.$i.','.$CompanyId.','.$UserId?>,'Two','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"/></td> 
		    <?php }else{ $Verry=array(); while($rVr=mysql_fetch_assoc($sVr)){ 
			$sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$data['DepartmentId']." AND GradeId=".$resG['GradeId']." AND VerticalId=".$rVr['VerticalId'],$con); $res=mysql_fetch_assoc($sql);?>
		     <td class="tdc"><input class="inputc" id="Two<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_'.$rVr['VerticalId']?>" value="<?php if($i==1){echo $res['TW_Km'];}elseif($i==2){echo $res['TW_InHQ_M'];}elseif($i==3){echo $res['TW_InHQ_D'];} ?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].','.$rVr['VerticalId'].','.$i.','.$CompanyId.','.$UserId?>,'Two','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"/></td>
		    <?php }/*while*/  }/*else*/ }/*foreach*/ ?> 
		   
		  <?php } elseif($_REQUEST['t']==9){ /******* -------- 9999999999 --------**********/ ?>
		   <td class="tdl"><?php if($i==1){echo '4W: Rs/Km'; $iv='FW_Km'; }
		   elseif($i==2){echo '4W: Km/Month'; $iv='FW_InHQ_M'; }
		   elseif($i==3){echo '4W: Remark'; $iv='FW_InHQ_D'; } ?></td>
		   <?php foreach($Dptry as $data){ $sVr=mysql_query("select v.VerticalId,v.VerticalName from hrm_department_vertical v inner join hrm_employee_general g on v.VerticalId=g.EmpVertical where v.ComId=".$CompanyId." AND v.DeptId=".$data['DepartmentId']." group by v.VerticalName order by v.VerticalName ASC", $con); $rowVr=mysql_num_rows($sVr);
			if($rowVr==0){ $sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$data['DepartmentId']." AND GradeId=".$resG['GradeId'],$con); $res=mysql_fetch_assoc($sql);?>
			 <td class="tdc"><input class="inputc" id="Four<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_0'?>" value="<?php if($i==1){echo $res['FW_Km'];}elseif($i==2){echo $res['FW_InHQ_M'];}elseif($i==3){echo $res['FW_InHQ_D'];}?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].',0,'.$i.','.$CompanyId.','.$UserId?>,'Four','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"/></td> 
		    <?php }else{ $Verry=array(); while($rVr=mysql_fetch_assoc($sVr)){ 
			$sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$data['DepartmentId']." AND GradeId=".$resG['GradeId']." AND VerticalId=".$rVr['VerticalId'],$con); $res=mysql_fetch_assoc($sql);?>
		     <td class="tdc"><input class="inputc" id="Four<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_'.$rVr['VerticalId']?>" value="<?php if($i==1){echo $res['FW_Km'];}elseif($i==2){echo $res['FW_InHQ_M'];}elseif($i==3){echo $res['FW_InHQ_D'];} ?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].','.$rVr['VerticalId'].','.$i.','.$CompanyId.','.$UserId?>,'Four','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"/></td>
		    <?php }/*while*/  }/*else*/ }/*foreach*/ ?> 
		   
		  <?php } elseif($_REQUEST['t']==10){ /******* -------- 10 10 10 10 10 --------**********/ ?>
		   <td class="tdl"><?php if($i==1){echo 'Vehicle Limit';} $iv='Vehicle_Value_Limit'; ?></td>
		   <?php foreach($Dptry as $data){ $sVr=mysql_query("select v.VerticalId,v.VerticalName from hrm_department_vertical v inner join hrm_employee_general g on v.VerticalId=g.EmpVertical where v.ComId=".$CompanyId." AND v.DeptId=".$data['DepartmentId']." group by v.VerticalName order by v.VerticalName ASC", $con); $rowVr=mysql_num_rows($sVr);
			if($rowVr==0){ $sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$data['DepartmentId']." AND GradeId=".$resG['GradeId'],$con); $res=mysql_fetch_assoc($sql);?>
			 <td class="tdc"><input class="inputc" id="VehicleL<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_0'?>" value="<?php if($i==1){echo $res['Vehicle_Value_Limit'];}?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].',0,'.$i.','.$CompanyId.','.$UserId?>,'VehicleL','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"/></td> 
		    <?php }else{ $Verry=array(); while($rVr=mysql_fetch_assoc($sVr)){ 
			$sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$data['DepartmentId']." AND GradeId=".$resG['GradeId']." AND VerticalId=".$rVr['VerticalId'],$con); $res=mysql_fetch_assoc($sql);?>
		     <td class="tdc"><input class="inputc" id="VehicleL<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_'.$rVr['VerticalId']?>" value="<?php if($i==1){echo $res['Vehicle_Value_Limit'];}?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].','.$rVr['VerticalId'].','.$i.','.$CompanyId.','.$UserId?>,'VehicleL','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"/></td>
		    <?php }/*while*/  }/*else*/ }/*foreach*/ ?>	
			
		  <?php } elseif($_REQUEST['t']==11){ /******* -------- 11 11 11 11 11 --------**********/ ?>
		   <td class="tdl"><?php if($i==1){echo 'Travel Mode';} $iv='Travel_Mode'; ?></td>
		   <?php foreach($Dptry as $data){ $sVr=mysql_query("select v.VerticalId,v.VerticalName from hrm_department_vertical v inner join hrm_employee_general g on v.VerticalId=g.EmpVertical where v.ComId=".$CompanyId." AND v.DeptId=".$data['DepartmentId']." group by v.VerticalName order by v.VerticalName ASC", $con); $rowVr=mysql_num_rows($sVr);
			if($rowVr==0){ $sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$data['DepartmentId']." AND GradeId=".$resG['GradeId'],$con); $res=mysql_fetch_assoc($sql);?>
			 <td class="tdc"><input class="inputc" id="TravelM<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_0'?>" value="<?php if($i==1){echo $res['Travel_Mode'];}?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].',0,'.$i.','.$CompanyId.','.$UserId?>,'TravelM','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"/></td> 
		    <?php }else{ $Verry=array(); while($rVr=mysql_fetch_assoc($sVr)){ 
			$sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$data['DepartmentId']." AND GradeId=".$resG['GradeId']." AND VerticalId=".$rVr['VerticalId'],$con); $res=mysql_fetch_assoc($sql);?>
		     <td class="tdc"><input class="inputc" id="TravelM<?=$i.'_'.$resG['GradeId'].'_'.$data['DepartmentId'].'_'.$rVr['VerticalId']?>" value="<?php if($i==1){echo $res['Travel_Mode'];}?>" onChange="FunSetElig(this.value,<?=$_REQUEST['t']?>,'<?=$iv?>',<?=$resG['GradeId'].','.$data['DepartmentId'].','.$rVr['VerticalId'].','.$i.','.$CompanyId.','.$UserId?>,'TravelM','<?=$resG['GradeValue']?>')" style="background-color:<?php if($sno%2==0){echo '#ECE0F5';}else{echo '#FFFFFF';}?>"/></td>
		    <?php }/*while*/  }/*else*/ }/*foreach*/ ?>	
		   
		   <?php } //elseif($_REQUEST['t']==10) ?>	  		  
			 
		 
		 </tr>
		 <?php }//for ?>
		 
		 </tbody>
         </div>
		 
		 
		 <?php $sno++; } //while ?>
		 </table>
	  </td>
    </tr>
	  
   
  </table>
</td>
<?php //*****************************************************************************************************?>    

 </tr>
<?php } ?> 
</table>
		
<?php //******************************************************************************?>
<?php //****************END*****END*****END******END******END***************************?>
<?php //******************************************************************************?>
		
	  </td>
	</tr>
	
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>