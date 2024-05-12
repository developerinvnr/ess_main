<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
/*************************************************************************************************************************/

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> 
.th{ font-family:Times New Roman;font-size:13px; font-weight:bold; text-align:center; height:26px; color:#FFFFFF; background-color:#7a6189; }
.tdc{ font-family:Times New Roman;font-size:13px; text-align:center;height:22px; }
.tdl{ font-family:Times New Roman;font-size:13px; text-align:left;height:22px; }
.tdr{ font-family:Times New Roman;font-size:13px; text-align:right;height:22px; }
.input{ font-family:Times New Roman; font-size:12px; width:99%; height:20px; border:hidden; background-color:#FFFFB0;}
.inputc{ font-family:Times New Roman; font-size:12px; width:100%; height:20px; border:hidden; text-align:center; background-color:#FFFFB0;}
.sel{ font-family:Times New Roman; font-size:12px; width:99%; height:21px; }
.selb{ font-family:Times New Roman; font-size:12px; width:99%; height:21px; border:hidden; background-color:#CBD6B4; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">
function FunFolder(n,pi,ci,ui)
{ //alert(n+","+pi+","+ci+","+ui);
 if(n==1)
 {
  document.getElementById("SpanCF"+pi).style.display='none';
  document.getElementById("SpanOF"+pi).style.display='block';
  document.getElementById("Tbl_"+pi).style.display='block';
 }
 else if(n==0)
 {
  document.getElementById("SpanOF"+pi).style.display='none';
  document.getElementById("SpanCF"+pi).style.display='block';
  document.getElementById("Tbl_"+pi).style.display='none';
 }
}

function FunEdit(n,pi,sno)
{ 
 document.getElementById("Et"+n+"_"+pi).style.display='none'; document.getElementById("Se"+n+"_"+pi).style.display='block';
 for(var i=1; i<=sno; i++)
 { 
  var j=document.getElementById(pi+"_"+n+"_"+i).value; 
  document.getElementById("F"+pi+"_"+n+"_"+j).readOnly=false;
  document.getElementById("F"+pi+"_"+n+"_"+j).style.background='#FFFFFF';
 }
}
function FunSave(n,pi,sno,gi,ui)
{  
 for(var i=1; i<=sno; i++)
 {
  var fi=document.getElementById(pi+"_"+n+"_"+i).value;
  var v=document.getElementById("F"+pi+"_"+n+"_"+document.getElementById(pi+"_"+n+"_"+i).value).value;
  //var fiv=v.replace(/[`~^&*-=???;:'"<>\{\}\[\]\\\/]/gi, '');
  
  var fiv=v;
  
  //alert('ActTblIns=InsploicyField&gi='+gi+'&n='+n+'&pi='+pi+'&sno='+sno+'&fi='+fi+'&fiv='+fiv+'&ui='+ui+'&i='+i);
  
  if(fiv!='')
  {
  var url = 'EligPolicyAjax.php'; var pars = 'ActTblIns=InsploicyField&gi='+gi+'&n='+n+'&pi='+pi+'&sno='+sno+'&fi='+fi+'&fiv='+fiv+'&ui='+ui+'&i='+i;
  
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_TblCreturn });
  }
      
  }
 
}

function show_TblCreturn(originalRequest)
{ 
 document.getElementById('AjaxSpan').innerHTML = originalRequest.responseText;
 if(document.getElementById("RstInp").value==1)
 { alert("Date Inserted Successfully");
   var n=document.getElementById("FFn").value;
   var pi=document.getElementById("FFpi").value;
   var sno=document.getElementById("FFsno").value;
   document.getElementById("Se"+n+"_"+pi).style.display='none'; 
   document.getElementById("Et"+n+"_"+pi).style.display='block';
   for(var i=1; i<=sno; i++)
   {
    var j=document.getElementById(pi+"_"+n+"_"+i).value;
    document.getElementById("F"+pi+"_"+n+"_"+j).readOnly=true;
    document.getElementById("F"+pi+"_"+n+"_"+j).style.background='#FFFFB0';
   }
 }
 else{alert("Error");}

 document.getElementById('loaderDiv').style.display='none';
 
} 

</SCRIPT> 

</head>
<body class="body">

<div id="loaderDiv" style="background-color: rgba(0,0,0,0.8);width: 100%;height: 100%;position: fixed;top:0px;left: 0px;font-size: 12px; display:none;">	
	<center>
	<span style="color:white;top: 50%;left:38%;position: absolute;">Please Wait, working on Progress...<img src="images/loader.gif"></span>
	</center>
</div>
<span id="AjaxSpan"></span>
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

<span id="SpanForElig"></span>	  
<table border="0" style="margin-top:0px; width:100%;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td width="300" class="heading">Eligibility Policy Table</td>
	  <td align="right">
		<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
		<input type="button" name="Refrash" value="refresh" style="width:90px;" onClick="javascript:window.location='EligPolicyTable.php?d=1&t=1'"/></td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if($_SESSION['login'] = true) { ?>	
 <tr>
 
<?php //************************************* 111111 Policy Name ****************************?> 
<?php //************************************* 111111 Policy Name ****************************?> 
<td id="type" valign="top" style="width:20%;">             
	     <table border="1" style="width:100%;background-color:#FFFFFF;" cellspacing="0">
		 <tr>
		   <td class="th" style="width:40px;">Sn</td>
		   <td class="th" style="width:200px;">Policy Name</td>
		   <td class="th" style="width:100px;">Department</td>
		   <td class="th" style="width:50px;">View</td>
		 </tr>
        <?php $sql=mysql_query("select * from hrm_master_eligibility_policy where CompanyId=".$CompanyId." order by PolicyId ASC", $con); $sn=1; while($res=mysql_fetch_array($sql)){ 
		
		//$sD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DeptId'],$con);
		//$rD=mysql_fetch_assoc($sD);
		?>
		  <tr>
           <td class="tdc"><?=$sn?></td>
		   <td class="tdl">&nbsp;<?=$res['PolicyName']?></td>
		   <td class="tdl">&nbsp;
		   <?php $sqlD=mysql_query("select DepartmentCode from hrm_master_eligibility_policy_dept pd inner join hrm_department d on pd.DeptId=d.DepartmentId where pd.PolicyId=".$res['PolicyId']." AND pd.Sts=1",$con); 
		   $rowD=mysql_num_rows($sqlD);  $no=1;
		   while($resD=mysql_fetch_assoc($sqlD)){ echo ucfirst(strtolower($resD['DepartmentCode'])); if($no<$rowD){echo ', ';} $no++; }?></td>
           <td align="center" valign="middle">
		   <?php if($res['CreatedTbl']==1){ ?>
		   <span style="cursor:pointer;"><img src="images/open-folder.png" style="height:12px;display:none;" onClick="FunFolder(0,<?=$res['PolicyId']?>,<?=$CompanyId.','.$UserId?>)" id="SpanOF<?=$res['PolicyId']?>"/><img src="images/close-folder.png" style="height:12px;display:block;" onClick="FunFolder(1,<?=$res['PolicyId']?>,<?=$CompanyId.','.$UserId?>)" id="SpanCF<?=$res['PolicyId']?>"/></span>
		   <?php } ?>
		   </td>
		  </tr> 
		
<?php $sn++; } //while($res=mysql_fetch_array($sql)) ?>
		 </table>
</td>
<?php /********* Close Close *******/ ?>
<?php /********* Close Close *******/ ?>

<td style="width:1%;">&nbsp;</td>

<?php //******************************* 222222 Field **********************************?> 
<?php //******************************* 222222 Field **********************************?>
<td id="type" valign="top" style="width:80%;">  
<?php $sql2=mysql_query("select * from hrm_master_eligibility_policy where CompanyId=".$CompanyId." order by PolicyId ASC", $con); while($res2=mysql_fetch_array($sql2)){ ?>
<div id="Tbl_<?=$res2['PolicyId']?>" style="max-height:500px;overflow:scroll;display:none;">           
<table style="width:100%;vertical-align:top;" border="1" cellspacing="1">
 <tr>
  <td colspan="20" class="th">&nbsp;Policy Table: { <?=$res2['PolicyName']?> }</td>
 </tr>
 <tr>
   <td class="th" rowspan="1" style="width:40px;">Sn</td>
   <td class="th" rowspan="1" style="width:50px;">Grade</td>
   <?php $schk=mysql_query("select t.*,FiledName from hrm_master_eligibility_mapping_tblfield t inner join hrm_master_eligibility_field f on t.FieldId=f.FieldId where t.PolicyId=".$res2['PolicyId']." AND t.Sts=1 order by t.FOrder asc",$con); while($rchk=mysql_fetch_assoc($schk)){ 
   
   //$sub=mysql_query("select * from hrm_master_eligibility_subfield where FiledId=".$rchk['FieldId']." and SubFiledName!='' order by SubFieldId asc",$con); $rub=mysql_num_rows($sub); if($rub==0){$rspan=2;}else{$rspan=0;}
   ?>
   <td class="th" rowspan="1" colspan="1" style="width:150px;"><?=$rchk['FiledName']?></td>
   <?php } ?>
   
   <td class="th" rowspan="1" style="width:50px;">Act</td>
 </tr>
 
 <?php /*
 <tr>
   <?php $ssub=mysql_query("select * from hrm_master_eligibility_subfield sf inner join hrm_master_eligibility_mapping_tblfield f on sf.FiledId=f.FieldId where f.PolicyId=".$res2['PolicyId']." AND SubFiledName!='' order by f.FOrder asc, sf.SubFieldId asc",$con); while($resub=mysql_fetch_assoc($ssub)){ ?>
   <td class="th" style="width:150px;"><?=$resub['SubFiledName']?></td>
   <?php } ?>
 </tr>
 */ ?>
 
 <?php if($CompanyId==1){ $grd="CreatedDate>='2014-02-01'"; }else{ $grd='1=1'; }
 $sG=mysql_query("select GradeId,GradeValue from hrm_grade where CompanyId=".$CompanyId." AND ".$grd." AND GradeStatus='A' order by GradeId ASC",$con); $sn=1; while($rG=mysql_fetch_assoc($sG)){ ?>
 <tr style="background-color:#FFFFFF;">
  <td class="tdc"><?=$sn?></td> 
  <td class="tdc"><?=$rG['GradeValue']?></td> 
  <?php $schk=mysql_query("select FieldId from hrm_master_eligibility_mapping_tblfield where PolicyId=".$res2['PolicyId']." AND Sts=1 order by FOrder asc",$con); $no=1; while($rchk=mysql_fetch_assoc($schk)){ 
  
  $sv=mysql_query("select * from hrm_master_eligibility_policy_tbl".$res2['PolicyId']." where GradeId=".$rG['GradeId'],$con);
  $rv=mysql_fetch_assoc($sv); ?>
   <td class="tdc"><input class="inputc" id="F<?=$res2['PolicyId']."_".$sn.'_'.$rchk['FieldId']?>" value="<?=$rv['Fn'.$rchk['FieldId']]?>" readonly/><input type="hidden" id="<?=$res2['PolicyId']."_".$sn."_".$no?>" value="<?=$rchk['FieldId']?>" /></td>
   <?php $no++; } $sno=$no-1; ?>
   
   <td align="center" valign="middle">
    <span style="cursor:pointer;">
	  <img src="images/edit.png" style="display:block;" id="Et<?=$sn.'_'.$res2['PolicyId']?>" onClick="FunEdit(<?=$sn.','.$res2['PolicyId'].','.$sno?>)"><img src="images/save.gif" style="display:none;" id="Se<?=$sn.'_'.$res2['PolicyId']?>" onClick="FunSave(<?=$sn.','.$res2['PolicyId'].','.$sno.','.$rG['GradeId'].','.$UserId?>)">
    </span>
   </td>
 </tr>
 <?php $sn++; } ?>
</table>	     
		 
</div>		 
<?php } ?>
</td>
<?php /********* Close Close *******/ ?>
<?php /********* Close Close *******/ ?>

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
