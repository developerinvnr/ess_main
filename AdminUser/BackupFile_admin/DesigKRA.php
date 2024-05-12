<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************************************************//
if(isset($_POST['SaveDesigKRA']))
{ 
  $DTNo=$_POST['DesigNo']; $KraNo=$_POST['KraNo']; $DeptId=$_POST['DPid']; 
  for($i=1; $i<=$KraNo; $i++)
   { $Kid=$_POST['Kid_'.$i];
    for($j=1; $j<=$DTNo; $j++)
	{ 
	  if($_POST['KRA'.$i.'_'.$j]!='') 
	  { 
	   $sql=mysql_query("select * from hrm_pms_kra_designation where KRAId=".$Kid." AND DesigId=".$_POST['KRA'.$i.'_'.$j], $con);  $row=mysql_num_rows($sql);
	   if($row==0)
	    { $sqlMax = mysql_query("SELECT MAX(DesigKraId) as DesigKraId FROM hrm_pms_kra_designation", $con); $resMax = mysql_fetch_assoc($sqlMax);
	      $NextKraId = $resMax['DesigKraId']+1;
	      $sql2=mysql_query("insert into hrm_pms_kra_designation(DesigKraId,YearId,KRAId,DesigId,CreatedBy,CreatedDate) values(".$NextKraId.",".$YearId.",".$Kid.",".$_POST['KRA'.$i.'_'.$j].",".$UserId.",'".date("Y-m-d")."')", $con);
	   if($sql2){$msg="Data Updated Successfully";}
	    }
	  }  
	}
   }
}
if(isset($_POST['SingleSaveDesigKRA']))
{ $DTNo=$_POST['DesigNo']; $KraNo=$_POST['KraNo']; $DeptId=$_POST['DPid']; 
  $msg="Data Updated Successfully";
}
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
function SelectDeptEmp(value){  var x = 'DesigKRA.php?DPid='+value; window.location=x; }

function Check(value,sn) 
{ 
  document.getElementById("Check_"+value).style.display='none'; document.getElementById("UnCheck_"+value).style.display='block';
  var DesigNo=document.getElementById("DesigNo").value; var YId=document.getElementById("YearId").value; var UId=document.getElementById("UserId").value; 
  for(var i=1; i<=DesigNo; i++)
  { document.getElementById('KRA'+sn+'_'+i).disabled=false;
  
 /*  var k=value; var d=document.getElementById("KRA"+sn+"_"+i).value; document.getElementById("KRA"+sn+"_"+i).checked=true;
  if(document.getElementById('KRA'+sn+'_'+i).checked==true)
   	{ 
	var url = 'CheckKraDesig.php';	var pars = 'kid2='+k+'&did2='+d+'&YId='+YId+'&UId='+UId;	var myAjax = new Ajax.Request(
	url, 
	  { method: 'post', parameters: pars,  onComplete: show_CheckKraDesig });
    }
   function show_CheckKraDesig(originalRequest)
   { document.getElementById('MsgSpan').innerHTML = originalRequest.responseText; } */
  }
}

function UnCheck(value,sn) {
document.getElementById("Check_"+value).style.display='block'; document.getElementById("UnCheck_"+value).style.display='none';
var DesigNo=document.getElementById("DesigNo").value; var YId=document.getElementById("YearId").value; var UId=document.getElementById("UserId").value;
  for(var i=1; i<=DesigNo; i++)
  { document.getElementById('KRA'+sn+'_'+i).disabled=true; 
  
 /* var k=value; var d=document.getElementById("KRA"+sn+"_"+i).value; document.getElementById("KRA"+sn+"_"+i).checked=false;
  if(document.getElementById('KRA'+sn+'_'+i).checked==false)
   {
	var url = 'CheckKraDesig.php';	var pars = 'kid='+k+'&did='+d;	var myAjax = new Ajax.Request(
	url, 
	  { method: 'post', parameters: pars,  onComplete: show_CheckKraDesig });
   }
   function show_CheckKraDesig(originalRequest)
   { document.getElementById('MsgSpan').innerHTML = originalRequest.responseText; } */
  }
}

function Click(k,d,sn,dt){ 
  if(document.getElementById('KRA'+sn+'_'+dt).checked==false)
   {
	var url = 'CheckKraDesig.php';	var pars = 'kid='+k+'&did='+d;	var myAjax = new Ajax.Request(
	url, 
	{ 	method: 'post', parameters: pars,  onComplete: show_CheckKraDesig
	});
   }
  else if(document.getElementById('KRA'+sn+'_'+dt).checked==true)
   	{ 
	var YId=document.getElementById("YearId").value; var UId=document.getElementById("UserId").value;
	var url = 'CheckKraDesig.php';	var pars = 'kid2='+k+'&did2='+d+'&YId='+YId+'&UId='+UId;	var myAjax = new Ajax.Request(
	url, 
	{ 	method: 'post', parameters: pars,  onComplete: show_CheckKraDesig
	});
   }
}
function show_CheckKraDesig(originalRequest)
{ document.getElementById('MsgSpan').innerHTML = originalRequest.responseText; }
		
</SCRIPT> 
</head>
<body class="body">
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
	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr><td align="right" width="280" class="heading">PMS - Designation wise KRA</td><td width="50">&nbsp;</td>
        <td class="td1" style="font-size:11px; width:150px;">
                       <select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmp(this.value)">
					   <option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Select Department</option><?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' AND DepartmentId!=2 order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?></select>
					   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
        </td>
		<td width="20">&nbsp;</td>
		<td>
<?php if($_REQUEST['DPid']){ $_SESSION['DPid']=$_REQUEST['DPid']; $Sql=mysql_query("select * from hrm_department where DepartmentId=".$_SESSION['DPid'], $con); $Res=mysql_fetch_assoc($Sql); } ?>		
<input style="font:Times New Roman; color:#4A0000; font-size:14px; background-color:#E0DBE3; width:300px; border-style:none; font-weight:bold;" value="<?php echo $Res['DepartmentName'] ?>" />

		</td>
		<td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><span id="MsgSpan"></span><?php echo $msg; ?></b></td>
	
	</tr>
   </table>
  </td>
 </tr>
<?php if(( $_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:5px;" valign="top" align="center">&nbsp;</td>

<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" width="1000">
   
	<tr>
	  <td align="left" width="1100">
	     <table border="1" width="1250" border="1" bgcolor="#FFFFFF">
		 <form name="editForm" method="post" />
		 <tr bgcolor="#7a6189">
		   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>SNo</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:250px;" valign="top" align="center"><b>KRA</b></td>
<?php if($_REQUEST['DPid']){ $_SESSION['DPid']=$_REQUEST['DPid']; ?>
      <input type="hidden" name="DPid" value="<?php echo $_SESSION['DPid']; ?>" />
	  
   <?php  $sql=mysql_query("select DesigId from hrm_deptgradedesig where DGDStatus='A' AND CompanyId=".$CompanyId." AND DepartmentId=".$_REQUEST['DPid'], $con); $n=1;
	  while($res=mysql_fetch_array($sql)){ echo '<input type="hidden" value="'.$n.'" />'; $n++; } $n2=$n-1; } ?>
		   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:450px;" valign="top" align="center" colspan="<?php echo $n2; ?>"><b>Designation</b></td>  
		   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:80px;" valign="top" align="center"><b>Action</b></td>
		 </tr>
		 <tr bgcolor="#7a6189">
		   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:250px;" valign="top" align="center"></td>		   
<?php if($_REQUEST['DPid']){ $_SESSION['DPid']=$_REQUEST['DPid'];
	  $sqlD=mysql_query("select hrm_deptgradedesig.DesigId,hrm_designation.DesigCode from hrm_deptgradedesig INNER JOIN hrm_designation ON hrm_deptgradedesig.DesigId=hrm_designation.desigId where hrm_deptgradedesig.CompanyId=".$CompanyId." AND hrm_deptgradedesig.DepartmentId=".$_REQUEST['DPid']." AND hrm_deptgradedesig.DGDStatus='A'", $con); $count=1; while($resD=mysql_fetch_array($sqlD)){ ?>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" align="center"><b><?php echo $resD['DesigCode']; ?></b></td>
	    <?php $count++; } } $no=$count-1;?>	<input type="hidden" name="DesigNo" id="DesigNo" value="<?php echo $no; ?>" />	
	  <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:80px;" valign="top" align="center"><b>Edit</b></td>
		 </tr>
	
<?php if($_REQUEST['DPid']){ $_SESSION['DPid']=$_REQUEST['DPid']; 
      $sqlDept=mysql_query("select KRAId,KRA from hrm_pms_kra where KRAStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND DepartmentId=".$_REQUEST['DPid'], $con); 
	  $Sno=1; while($resDept=mysql_fetch_array($sqlDept)){ 
	  //$Sn=$Sno+2; $n=Sn-$Sno;?>			 		 
	  <tr <?php //if($n==2){echo 'style="background-color:#FAF8D8;"';} ?>>
		   <td align="center" style="font:Times New Roman; font-size:13px;  width:50px;" valign="top">
		   <input type="hidden" name="Kid_<?php echo $Sno; ?>" value="<?php echo $resDept['KRAId']; ?>" />
		   <?php echo $Sno; ?></td>
		   <td style="font-family:Times New Roman; font-size:13px; width:250px;"><?php echo $resDept['KRA']; ?></td>
<?php $sqlD2=mysql_query("select DesigId from hrm_deptgradedesig where DGDStatus='A' AND DepartmentId=".$_REQUEST['DPid'], $con); $DNo=1;
	  while($resD2=mysql_fetch_array($sqlD2)){ $sqlD3=mysql_query("select * from hrm_pms_kra_designation where KRAId=".$resDept['KRAId']." AND DesigId=".$resD2['DesigId']); $row2=mysql_num_rows($sqlD3);?>
		      <td style="width:100px;" align="center"><input type="checkbox" style="height:10px;" name="<?php echo 'KRA'.$Sno.'_'.$DNo; ?>" id="<?php echo 'KRA'.$Sno.'_'.$DNo; ?>" value="<?php echo $resD2['DesigId']; ?>"  <?php if($row2>0){echo 'checked';}?> onClick="Click(<?php echo $resDept['KRAId'].','.$resD2['DesigId'].','.$Sno.','.$DNo; ?>)"  disabled/>
			  </td>
			  <?php $DNo++;} $DNo2=$DNo-1;?>
             <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:80px;" bgcolor="#A9E1F1">
<img src="images/checkbox.png" border="0" id="Check_<?php echo $resDept['KRAId']; ?>" onClick="Check(<?php echo $resDept['KRAId'].','.$Sno; ?>)" style="display:block;">
<img src="images/checkbox_UnCheck.png" border="0" id="UnCheck_<?php echo $resDept['KRAId']; ?>" onClick="UnCheck(<?php echo $resDept['KRAId'].','.$Sno; ?>)" style="display:none;">
		     </td> 
		 </tr>
<?php $Sno++;} $no2=$Sno-1; ?>	<input type="hidden" name="KraNo" id="KraNo" value="<?php echo $no2; ?>" /> <?php } ?>	 
		 
		 <input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
		 <input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
		 
		</table>	 
      </td>
	 </tr> 
		 

   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr><td style="width:210px;">&nbsp;</td><td align="right" style="width:120px;">
		       <?php    //<input type="submit" name="SaveDesigKRA" id="SaveDesigKRA" value="save" style="display:none;"/>
		                // <input type="submit" name="SingleSaveDesigKRA" id="SingleSaveDesigKRA" value="save" style="display:none;"/> ?>
							  </td>
			<td align="center" style="width:60px;">				  
<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
</td><td align="center" style="width:60px;"><input type="button" name="Refresh" value="refresh" onClick="javascript:window.location='DesigKRA.php'"/></td>
			     </td>
		</tr></table>
      </td>
   </tr>
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
