<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}

if($_REQUEST['action']=='EditReqEmp')
{
 $sE=mysql_query("select * from fa_request_employee where EmployeeID=".$_REQUEST['ei'],$con); 
 $rE=mysql_num_rows($sE);
 if($rE>0){ $up=mysql_query("update fa_request_employee set Request='".$_REQUEST['v']."' where EmployeeID=".$_REQUEST['ei'],$con); }
 else if($rE==0){$up=mysql_query("insert into fa_request_employee(EmployeeID,Request) values(".$_REQUEST['ei'].",'".$_REQUEST['v']."')",$con); }
 //if($up){echo '';}
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script language="javascript">
function SelAct(v,ei)
{ 
  var agree=confirm("Are You Sure?");
  if(agree){ window.location='f_assignreq.php?action=EditReqEmp&v='+v+'&ei='+ei; }else{return false;}
}

</Script>
<style>.hd{color:#FFFFFF;font-size:14px;font-family:Times New Roman; text-align:center;}</style>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />	
<input type="hidden" id="YId" value="<?php echo $YearId; ?>" />		  
<table border="0" style="margin-top:0px;width:100%;">
 <tr>
  <td align="left" height="10" valign="top" colspan="3">
   <table border="0">
    <tr><td style="margin-top:0px;" class="heading">&nbsp;Assign FA Request Employee&nbsp;&nbsp;&nbsp;</td></tr>
   </table>
  </td>
 </tr>	
 <tr>
  <td valign="top">
<table border="1">
 <tr bgcolor="#7a6189">
<td class="hd" style="width:50px;"><b>Sn</b></td>
<td class="hd" style="width:250px;"><b>Name</b></td>
<td class="hd" style="width:350px;"><b>Designation</b></td>
<td class="hd" style="width:60px;"><b>Assign</b></td>
 </tr> 
<?php $sql=mysql_query("select e.EmployeeID,Fname,Sname,Lname,DesigName from hrm_employee e inner join hrm_employee_general eg on e.EmployeeID=eg.EmployeeID inner join hrm_designation d on eg.DesigId=d.DesigId where eg.departmentId=6 AND e.EmpStatus='A' AND eg.GradeId<=75 order by Fname ASC",$con); //AND eg.GradeId>=67 
$sn=1; while($res=mysql_fetch_assoc($sql)){ $En=strtoupper($res['Fname'].' '.$res['Sname'].' '.$res['Lname']); ?>    
 <tr bgcolor="#FFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $sn; ?></td>
  <td style="font-size:14px;font-family:Times New Roman;"><?php echo $En; ?></td>
  <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['DesigName']); ?></td>
  <td style="font-size:14px;font-family:Times New Roman;">
  <?php $sqlE=mysql_query("select * from fa_request_employee where EmployeeID=".$res['EmployeeID']." AND Request='Y'",$con); $rowE=mysql_num_rows($sqlE); ?>
  <select style="width:60px;font-family:Times New Roman;size:15px;background-color:<?php if($rowE>0){echo '#80FF00';} ?>;" onChange="SelAct(this.value,<?php echo $res['EmployeeID']; ?>)">
<?php if($rowE>0){ ?><option value="Y" selected>YES</option><option value="N">NO</option>
<?php } elseif($rowE==0){ ?><option value="Y">YES</option><option value="N" selected>NO</option><?php } ?>
 </td>  
 </tr>
<?php $sn++; } ?> 
</table>
  </td>
 </tr> 
</table>
<td><span id="RecordsSpan"></span></td>		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

</html>
