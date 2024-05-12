<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************************************************//
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:12px; width:100px;} .font1 { font-family:Georgia; font-size:12px; height:14px; width:100px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; display:none; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:11px; width:120px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; width:100px; height:20px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script> 
function SelectDeptEmp(value){  var x = 'DesigGrade.php?DPid='+value; window.location=x; }                                
function Check(value,sn) 
{ 
  document.getElementById("Check_"+value).style.display='none'; document.getElementById("UnCheck_"+value).style.display='block';
  var GradeNo=document.getElementById("GradeNo").value; var YId=document.getElementById("YearId").value; var UId=document.getElementById("UserId").value; 
  for(var i=1; i<=GradeNo; i++)
  {  document.getElementById('FormB'+sn+'_'+i).disabled=false;
  }
}

function UnCheck(value,sn) {
document.getElementById("Check_"+value).style.display='block'; document.getElementById("UnCheck_"+value).style.display='none';
var GradeNo=document.getElementById("GradeNo").value; var YId=document.getElementById("YearId").value; var UId=document.getElementById("UserId").value;
  for(var i=1; i<=GradeNo; i++)
  { document.getElementById('FormB'+sn+'_'+i).disabled=true;  }
}

function Click(d,g,sn,dt){ 
  if(document.getElementById('FormB'+sn+'_'+dt).checked==false)
   { var DeptId=document.getElementById("DeptId").value; var ComId=document.getElementById("ComId").value;
     var YId=document.getElementById("YearId").value; var UId=document.getElementById("UserId").value;
	 var url = 'CheckDesigGrade.php'; var pars = 'did='+d+'&gid='+g+'&dptId='+DeptId+'&ComId='+ComId+'&YId='+YId+'&UId='+UId;	var myAjax = new Ajax.Request(
	url, 
	{ 	method: 'post', parameters: pars,  onComplete: show_FormBGrade
	});
   }
  else if(document.getElementById('FormB'+sn+'_'+dt).checked==true)
   	{
	 var ComId=document.getElementById("ComId").value; var DeptId=document.getElementById("DeptId").value;
	 var YId=document.getElementById("YearId").value; var UId=document.getElementById("UserId").value;
	 var url = 'CheckDesigGrade.php';	var pars = 'did2='+d+'&gid2='+g+'&YId='+YId+'&UId='+UId+'&dptId='+DeptId+'&ComId='+ComId;	var myAjax = new Ajax.Request(
	url, 
	{ 	method: 'post', parameters: pars,  onComplete: show_FormBGrade2
	});
   }
}
function show_FormBGrade(originalRequest)
{ document.getElementById('MsgSpan').innerHTML = originalRequest.responseText; 
  var DptId=document.getElementById("DptId").value; var DsgId=document.getElementById("DsgId").value; var GrdId=document.getElementById("GrdId").value;
  document.getElementById(DptId+"_"+DsgId+"_"+GrdId).style.background='#FFFFFF'; 
}
function show_FormBGrade2(originalRequest)
{ document.getElementById('MsgSpan').innerHTML = originalRequest.responseText; 
  var DptId=document.getElementById("DptId").value; var DsgId=document.getElementById("DsgId").value; var GrdId=document.getElementById("GrdId").value;
  document.getElementById(DptId+"_"+DsgId+"_"+GrdId).style.background='#008000'; 
}


function FunChngSts(v,de,ui)
{ 
 var url = 'CheckDesigGrade.php'; var pars = 'act=upDesigSts&v='+v+'&de='+de+'&ui='+ui;	
 var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars,  onComplete: show_Rst });
}
function show_Rst(originalRequest)
{ 
 document.getElementById('Msg2Span').innerHTML = originalRequest.responseText;
 if(document.getElementById("Rstv").value==1){ alert("Success"); }else{ alert("False"); }
}

</SCRIPT> 
</head>
<body class="body">
<span id="Msg2Span"></span>
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
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<?php if($_REQUEST['DPid'])
     { $_SESSION['DPid']=$_REQUEST['DPid']; $Sql=mysql_query("select * from hrm_department where DepartmentId=".$_SESSION['DPid'], $con); $Res=mysql_fetch_assoc($Sql); } ?>		  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr><td align="right" width="200" class="heading">Designation Wise Grade</td><td width="50">&nbsp;</td>
		 <td class="td1" style="font-size:11px; width:150px;">
                       <select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmp(this.value)">
					   <option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Select Department</option><?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?></select>
					   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
					   <input type="hidden" name="DeptId" id="DeptId" value="<?php echo $_SESSION['DPid']; ?>" /> 
        </td>
		<td width="20">&nbsp;</td>
		<td>	
<input style="font:Times New Roman; color:#4A0000; font-size:14px; background-color:#E0DBE3; width:300px; border-style:none; font-weight:bold;" value="<?php echo $Res['DepartmentName'] ?>" />

		</td>
		<td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><span id="MsgSpan"></span><?php echo $msg; ?></b></td>
	
	</tr>
   </table>
  </td>
 </tr>
<?php if(( $_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:5px;" valign="top" align="center">&nbsp;</td>

<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" width="1200">
   
	<tr>
	  <td align="left" width="1200">
	     <table border="1" width="1200" border="1" bgcolor="#FFFFFF">
		 <form name="editForm" method="post" />
		 <tr bgcolor="#7a6189">
		   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>SNo</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:250px;" valign="top" align="center"><b>Designation</b></td>
   <?php  if($CompanyId==1){$sql=mysql_query("select GradeId from hrm_grade where GradeStatus='A' AND CompanyId=".$CompanyId." AND CreatedDate>='2014-02-01'", $con);}elseif($CompanyId==2 OR $CompanyId==3){$sql=mysql_query("select GradeId from hrm_grade where GradeStatus='A' AND CompanyId=".$CompanyId, $con);} $n=1;
	  while($res=mysql_fetch_array($sql)){ echo '<input type="hidden" value="'.$n.'" />'; $n++; } $n2=$n-1; ?>
		   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:450px;" valign="top" align="center" colspan="<?php echo $n2; ?>"><b>Grade</b></td>  
		   <td colspan="2" style="color:#ffffff; font-family:Georgia; font-size:12px; width:80px;" valign="top" align="center"><b>Action</b></td>
		 </tr>
		 <tr bgcolor="#7a6189">
		   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:250px;" valign="top" align="center"></td>		   
<?php if($CompanyId==1){$sqlG=mysql_query("select GradeId,GradeValue from hrm_grade where GradeStatus='A' AND CompanyId=".$CompanyId." AND CreatedDate>='2014-02-01'", $con);}elseif($CompanyId==2 OR $CompanyId==3){$sqlG=mysql_query("select GradeId,GradeValue from hrm_grade where GradeStatus='A' AND CompanyId=".$CompanyId, $con);} 
      $count=1; while($resG=mysql_fetch_array($sqlG)){ ?>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:30px;" align="center"><b><?php echo $resG['GradeValue']; ?></b></td>
	    <?php $count++; }  $no=$count-1;?>	<input type="hidden" name="GradeNo" id="GradeNo" value="<?php echo $no; ?>" />	
	  <td colspan="2" style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:50px;" align="center"><b>Edit</b></td>  
		 </tr>
<?php if($_REQUEST['DPid']){ $_SESSION['DPid']=$_REQUEST['DPid']; ?>
      <input type="hidden" name="DPid" value="<?php echo $_SESSION['DPid']; ?>" />	
<?php $sqlGrade=mysql_query("select hrm_designation.DesigId,DesigName,DesigCode,DeptGradeDesigId,GradeId from hrm_designation INNER JOIN hrm_deptgradedesig ON hrm_designation.DesigId=hrm_deptgradedesig.DesigId where hrm_deptgradedesig.DepartmentId=".$_REQUEST['DPid']." AND hrm_deptgradedesig.DGDStatus='A' AND hrm_deptgradedesig.CompanyId=".$CompanyId." GROUP BY DesigId ORDER BY DesigName ASC", $con); $Sno=1; while($resGrade=mysql_fetch_array($sqlGrade)){ if($resGrade['DesigId']!=69){ ?>			 		      
       <tr>
		  <td align="center" style="font:Times New Roman; font-size:13px; width:50px;" valign="top">
		   <input type="hidden" name="FormBid_<?php echo $Sno; ?>" value="<?php echo $resGrade['DeptGradeDesigId']; ?>" /><?php echo $Sno; ?></td>
		  <td style="font-family:Times New Roman; font-size:13px; width:250px;"><?php echo strtoupper($resGrade['DesigName']); ?></td>
<?php if($CompanyId==1){$sqlG2=mysql_query("select GradeId from hrm_grade where GradeStatus='A' AND CompanyId=".$CompanyId." AND CreatedDate>='2014-02-01'", $con);}
elseif($CompanyId==2 OR $CompanyId==3){$sqlG2=mysql_query("select GradeId from hrm_grade where GradeStatus='A' AND CompanyId=".$CompanyId, $con);}  
      $GNo=1; while($resG2=mysql_fetch_array($sqlG2)){ //$resGrade['DesigId']==69
	  $sqlG3=mysql_query("select DeptGradeDesigId from hrm_deptgradedesig where DesigId=".$resGrade['DesigId']." AND (GradeId=".$resG2['GradeId']." OR GradeId_2=".$resG2['GradeId']." OR GradeId_3=".$resG2['GradeId']." OR GradeId_4=".$resG2['GradeId']." OR GradeId_5=".$resG2['GradeId'].")", $con); $row2=mysql_num_rows($sqlG3);?>
		  <td id="<?php echo $_REQUEST['DPid'].'_'.$resGrade['DesigId'].'_'.$resG2['GradeId']; ?>" style="width:30px;<?php if($row2>0){echo 'background-color:#008000;';} ?>" align="center"><input type="checkbox" style="height:10px;" name="<?php echo 'FormB'.$Sno.'_'.$GNo; ?>" id="<?php echo 'FormB'.$Sno.'_'.$GNo; ?>" value="<?php echo $resG2['GradeId']; ?>"  <?php if($row2>0){echo 'checked';}?> onClick="Click(<?php echo $resGrade['DesigId'].','.$resG2['GradeId'].','.$Sno.','.$GNo; ?>)" disabled />
			  </td>
			  <?php $GNo++;} $GNo2=$GNo-1;?>
             <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:50px;" bgcolor="#A9E1F1">
<?php if($_SESSION['User_Permission']=='Edit'){?>
<img src="images/checkbox.png" id="Check_<?php echo $resGrade['DeptGradeDesigId']; ?>" onClick="Check(<?php echo $resGrade['DeptGradeDesigId'].','.$Sno; ?>)" style="display:block;">
<img src="images/checkbox_UnCheck.png" id="UnCheck_<?php echo $resGrade['DeptGradeDesigId']; ?>" onClick="UnCheck(<?php echo $resGrade['DeptGradeDesigId'].','.$Sno; ?>)" style="display:none;">
<?php } ?>
		     </td> 
		     <td align="center" style="width:80px;">
			  <?php $sDe=mysql_query("Select DesigStatus from hrm_designation WHERE DesigId='".$resGrade['DesigId']."' AND CompanyId=".$CompanyId, $con); $rDe = mysql_fetch_assoc($sDe); ?>
			  <select onChange="FunChngSts(this.value,<?=$resGrade['DesigId'].",".$UserId?>)" style="width:80px;">
			  <option value="A" <?php if($rDe['DesigStatus']=='A'){echo 'selected';}?>>Active</option> 
			  <option value="D" <?php if($rDe['DesigStatus']=='D'){echo 'selected';}?>>Deactive</option> 
			 </td>
		     
		     
		 </tr>
<?php } $Sno++;} $no2=$Sno-1; ?>	<input type="hidden" name="FormBNo" id="FormBNo" value="<?php echo $no2; ?>" />  <?php } ?>		 
		 <input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
		 <input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
		 
		</table>	 
      </td>
	 </tr> 

<?php if($_SESSION['User_Permission']=='Edit'){?>	 

   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr><td style="width:210px;">&nbsp;</td><td align="right" style="width:120px;">
		       <?php    //<input type="submit" name="GradeSaveFormB" id="GradeSaveFormB" value="save" style="display:none;"/>
		                // <input type="submit" name="SingleGradeSaveFormB" id="SingleGradeSaveFormB" value="save" style="display:none;"/> ?>
							  </td>
			<td align="center" style="width:60px;">				  
<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
</td><td align="center" style="width:60px;"><input type="button" name="Refresh" value="refresh" onClick="javascript:window.location='DesigGrade.php'"/></td>
			     </td>
		</tr></table>
      </td>
   </tr>
<?php } ?>
   </form>
  </table>  
</td>
<?php //*********************************************** Close Department******************************************************?>    

 </tr>
<?php } ?> 
</table>
		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
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
