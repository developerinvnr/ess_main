<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
$m=$_REQUEST['m']; $y=$_REQUEST['y']; $hq=$_REQUEST['hq']; $s=$_REQUEST['s']; $md=$_REQUEST['md'];
$rbm=$_REQUEST['rbm']; $abm=$_REQUEST['abm'];

if($_REQUEST['action']=='setve')
{
  if($rbm>0){$ri=$rbm;}else{$ri=$abm;}
  if($_REQUEST['nn']==0)
  { $up=mysql_query("delete from fa_notaccemp where RepEmpId=".$ri." AND EmpId=".$_REQUEST['e'],$con); }
  else
  { $up=mysql_query("insert into fa_notaccemp(RepEmpId,EmpId) values(".$ri.",".$_REQUEST['e'].")",$con);}
 
}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> /*background-color:#D9D9FF;  background-color:#EEEEEE; */
.cell {color:#000;font-family:Times New Roman;font-size:14px;font-weight:bold;}
.htf{font-family:Georgia;color:#000;font-weight:bold;text-align:center;font-size:12px;background-color:#97FFFF;height:22px;}
.htf2{font-family:Georgia;color:#FF80FF;font-weight:bold;text-align:center;font-size:18px;height:24px;}
.tdf{font-family:Georgia;font-size:12px;height:20px;color:#fff;}
.tdf2{font-family:Georgia;font-size:12px;height:20px;color:#000000;}
.InputSel {font-family:Georgia;font-size:12px;text-align:left; }
.InputSelAtt {font-family:Times New Roman;font-size:12px;text-align:left; }
.InputType {font-family:Georgia;font-size:12px;text-align:left; height:20px; border:hidden; }
.InputType2 {font-family:Georgia;font-size:12px;border:hidden;}
.SaveButton {background-image:url(images/save.gif);width:18px;height:18px;background-repeat:no-repeat;border:0;}
</style>
<script type="text/javascript" src="script/jquery.min.js"></script>
<script type="text/javascript" src="script/jquery.form.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script language="javascript">
function FunRef(rbm,abm){ window.location="f_addfareplev.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=0&y=0&filter=zero&s=0&hq=0&dis=0&md=0&rbm=0&abm=0"; }

function funrbm(rbm)
{ var sts=''; window.location="f_addfareplev.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=0&y=0&filter=zero&s=0&hq=0&dis=0&sts=0&rbm="+rbm+"&abm=0&md=0"; }

function funabm(abm)
{ var sts=''; window.location="f_addfareplev.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=0&y=0&filter=zero&s=0&hq=0&dis=0&sts=0&rbm=0&abm="+abm+"&md=0"; }

function funClick(sn,e,r,a)
{
 if(document.getElementById("chke"+sn).checked==true){var nn=1;}else{var nn=0;}
 var sts=''; window.location="f_addfareplev.php?action=setve&ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=0&y=0&filter=zero&s=0&hq=0&dis=0&sts=0&rbm="+r+"&abm="+a+"&md=0&e="+e+"&nn="+nn;
}

<!--
function isNumberKey(evt)
{
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode != 46 && charCode > 31 
	&& (charCode < 48 || charCode > 57))
	 return false;
  return true;
}
//-->

</Script>
</head>
<body class="body">
<span id="AttMsgSpan"></span>
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login']=true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" width="100%" id="MainWindow">
<!DOCTYPE html>
<html>
<?php //***************START*****START*****START******START******START*************************** ?>
<table border="0" style="margin-top:0px;width:100%;height:150px;">	
<tr>
 <td valign="top" style="width:100%;">
 <table border="0" style="width:100%;">
 <tr>
<td style="width:100%;">
 <table border="0" style="width:100%;">
  <td style="width:100%;" valign="top">  
   <table border="0" cellpadding="0" cellspacing="1">
    <tr>
	 <td colspan="35">
	  <table border="0">
   <tr>
	<td colspan="6">
	 <table border="0" style="width:800px;">
		<tr>
	    <td class="htf2" align="left"><u>FA Reporting Level</u>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	    <td class="tdf" align="center">&nbsp;</td>
		<td class="tdf">&nbsp;RBM/ZBM/ZTM/ZSC</td>
		<td><select style="width:150px;" class="InputSel" id="rbm" name="rbm" onChange="funrbm(this.value)"><?php if($_REQUEST['rbm']>0){ $sb=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['rbm'],$con); $rb=mysql_fetch_assoc($sb); ?><option value='<?php echo $_REQUEST['rbm'];?>' selected><?php echo ucwords(strtolower($rb['Fname'].' '.$rb['Sname'].' '.$rb['Lname']));?></option><?php }else{?><option value="0">Select</option><?php } ?><?php $sb2=mysql_query("select e.EmployeeID,Fname,Sname,Lname,DesigCode from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId where e.EmpStatus='A' AND (g.DesigId=65 OR g.DesigId=66 OR g.DesigId=358 OR g.DesigId=375)",$con); while($rb2=mysql_fetch_assoc($sb2)){ ?><option value="<?php echo $rb2['EmployeeID']; ?>"><?php echo ucwords(strtolower($rb2['Fname'].' '.$rb2['Sname'].' '.$rb2['Lname'].' - '.$rb2['DesigCode'])); ?></option><?php } ?></select></td>
		<td class="tdf">&nbsp;ABM/ATM/ASC</td>
		<td><select style="width:150px;" class="InputSel" id="abm" name="abm" onChange="funabm(this.value)"><?php if($_REQUEST['abm']>0){ $sa=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['abm'],$con); $ra=mysql_fetch_assoc($sa); ?><option value='<?php echo $_REQUEST['abm'];?>' selected><?php echo ucwords(strtolower($ra['Fname'].' '.$ra['Sname'].' '.$ra['Lname']));?></option><?php }else{?><option value="0">Select</option><?php } ?><?php $sa2=mysql_query("select e.EmployeeID,Fname,Sname,Lname,DesigCode from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId where e.EmpStatus='A' AND (g.DesigId=67 OR g.DesigId=414 OR g.DesigId=415 OR g.DesigId=212)",$con); while($ra2=mysql_fetch_assoc($sa2)){ ?><option value="<?php echo $ra2['EmployeeID']; ?>"><?php echo ucwords(strtolower($ra2['Fname'].' '.$ra2['Sname'].' '.$ra2['Lname'].' - '.$ra2['DesigCode'])); ?></option><?php } ?></select></td>  
		</tr>
	  </table>
	 </td>
	</tr>
     <?php if($_REQUEST['rbm']>0)
           { $Id=$_REQUEST['rbm']; $Name=ucwords(strtolower($rb['Fname'].' '.$rb['Sname'].' '.$rb['Lname'])); }
	       else
	       { $Id=$_REQUEST['abm']; $Name=ucwords(strtolower($ra['Fname'].' '.$ra['Sname'].' '.$ra['Lname'])); } ?>
	<tr>
	 <td>&nbsp;</td>
	</tr>
	<tr>
	 <td>
	  <table>
	   <tr>
	 <td colspan="5" style="font-size:14px;color:#FFFFFF;font-weight:bold; font-family:Georgia; width:600px;">Check If <font color="#FFFF80"><?php echo $Name; ?></font> Access FA, within Checked Employee</td>
	</tr>
<?php if($_REQUEST['rbm']>0 OR $_REQUEST['abm']>0){ ?>	
	  <tr style="height:22px;">
      <td style="width:40px;" class="htf">&nbsp;Sn&nbsp;</td>
      <td style="width:300px;" class="htf">Employee [Under <font color="#0080FF"><?php echo $Name; ?></font>]</td>
	  <td style="width:60px;" class="htf">Check</td>
	  </tr>
	
<?php $sql=mysql_query("select e.EmployeeID,Fname,Sname,Lname from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where EmpStatus='A' AND RepEmployeeID=".$Id." order by EmployeeID ASC",$con);
      $sn=1; while($res=mysql_fetch_array($sql)){ 
	  $sqlee=mysql_query("select * from fa_notaccemp where RepEmpId=".$Id." AND EmpId=".$res['EmployeeID'],$con); 
	  $rowee=mysql_num_rows($sqlee);
	  ?>	 
      <tr style="height:22px;" bgcolor="#FFFFFF" id="TR<?php echo $sn; ?>">
	   <td class="tdf2" align="center"><?php echo $sn; ?></td>
       <td class="tdf2">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
	   <td class="tdf2" align="center" style="background-color:<?php if($rowee>0){echo '#8FFF20';}else{echo "#FFF";}?>;"><input type="checkbox" id="chke<?php echo $sn; ?>" name="chke<?php echo $sn; ?>" onClick="funClick(<?php echo $sn.','.$res['EmployeeID'].','.$_REQUEST['rbm'].','.$_REQUEST['abm']; ?>)" <?php if($rowee>0){echo 'checked';}?>/></td>
	</tr> 
<?php $sn++; $no++; } ?>
   
<?php } ?> 
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
  </td>
 </table>
</td>  
  </tr>
  
 </table>
 </td>
</tr>
</table>	

<?php //*****************END*****END*****END******END******END**************************?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>
