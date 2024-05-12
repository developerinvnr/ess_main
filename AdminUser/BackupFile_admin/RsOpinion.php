<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</script>
<Script type="text/javascript" language="javascript">
function SelectSub(v){ window.location='RsOpinion.php?action=OpeninSub&value='+v;}
function PrintSub(v)
{ var c=document.getElementById("ComId").value; window.open("RsOpinionPrint.php?action=Opinion&v="+v+"&c="+c,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=1000,height=400");}

function ExportSub(v)
{ var c=document.getElementById("ComId").value; window.open("RsOpinionExp.php?action=OpinionExport&v="+v+"&c="+c,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");} 

</Script>  
</head>
<body class="body">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="DeptValue" id="DeptValue" value="<?php echo $_REQUEST['value']; ?>" />
<table class="table" border="0">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center" width="100%" id="MainWindow">
<?php //************************************************************************************************?>
<?php //***************************START*****START*****START******START******START******************?>
<?php //*********************************************************************************************?>
<table border="0" style="margin-top:0px; width:95%; height:400px;">
	<tr>
		<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
		<td align="" width="100%" valign="top">
		   <table border="0">
			 <tr><td>
			       <table>
				     <tr>
<?php  if($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') { ?>
				   <td>
				    <table border="0">						
                    <tr>
				<td class="td1" style="width:100%;font-size:15px;font-family:Times New Roman;color:#00274F; font-weight:bold;">(Reports Opinion)&nbsp;&nbsp;&nbsp;
				Subject :&nbsp;<select style="font-size:14px;width:200px;height:24px;font-family:Times New Roman;background-color:#DDFFBB;" name="Sub" id="Sub" onChange="SelectSub(this.value)"><option value="" style="margin-left:0px;" selected>Select Subject</option><?php $SqlSub=mysql_query("select o.OpenionName from hrm_opinion o inner join hrm_employee e on o.EmployeeID=e.EmployeeID where e.CompanyId=".$CompanyId." group by OpenionName order by OpenionName ASC", $con); while($ResSub=mysql_fetch_array($SqlSub)) { ?><option value="<?php echo $ResSub['OpenionName']; ?>"><?php echo strtoupper($ResSub['OpenionName']);?></option><?php } ?></select>
				</td>
                     </tr>
				   </table>					
				   </td> 
<?php } ?>
		           </tr>
                  </table>
				</td>
			 </tr>
<?php //------------------- Display Record ----------------------------------- ?>
<?php if($_REQUEST['action']=='OpeninSub') { ?>
    <tr>	
	 <td valign="top" style="width:100%;font-size:14px; color:#005BB7; font-family:Georgia; font-weight:bold;">&nbsp;&nbsp;Subject - <?php echo strtoupper($_REQUEST['value']); ?>&nbsp;&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="PrintSub('<?php echo $_REQUEST['value']; ?>')" style="font-size:12px;">Print</a>
      &nbsp;&nbsp;<a href="#" onClick="ExportSub('<?php echo $_REQUEST['value']; ?>')" style="font-size:12px;">Export Excel</a>
	 </td>
	</tr>
<?php } ?>


<?php if($_REQUEST['action']=='OpeninSub') { ?>
<tr>
 <td>
  <table border="1" cellspacing="1" width="100%" style="font-family:Times New Roman; font-size:15px;">
  
<?php $sy=mysql_query("select * from hrm_opinion o inner join hrm_employee e on o.EmployeeID=e.EmployeeID where o.OpenionName='".$_REQUEST['value']."' AND o.Openion='y' AND e.CompanyId=".$CompanyId,$con); 
$sn=mysql_query("select * from hrm_opinion o inner join hrm_employee e on o.EmployeeID=e.EmployeeID where o.OpenionName='".$_REQUEST['value']."' AND o.Openion='n' AND e.CompanyId=".$CompanyId,$con);
$ry=mysql_num_rows($sy); $rn=mysql_num_rows($sn);

$sql=mysql_query("select o.*,EmpStatus,EmpCode,Fname,Sname,Lname,DepartmentName from hrm_opinion o inner join hrm_employee e on o.EmployeeID=e.EmployeeID inner join hrm_employee_general g on o.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where o.OpenionName='".$_REQUEST['value']."' AND e.CompanyId=".$CompanyId." order by e.EmpCode ASC",$con); $row=mysql_num_rows($sql); ?>
   <tr bgcolor="#7a6189" style="height:25px;">
    <td colspan="9" style="color:#FFFFFF;">&nbsp;&nbsp;
	<b><font color="#E2EF87">Total Vote:</font>&nbsp;<?php echo $row; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<b><font color="#E2EF87">Yes:</font>&nbsp;<?php echo $ry; ?></b>&nbsp;&nbsp;&nbsp;
	<b><font color="#E2EF87">No:</font>&nbsp;<?php echo $rn; ?></b>&nbsp;&nbsp;&nbsp;
	</td>
   </tr>  
   <tr bgcolor="#7a6189" style="height:25px;">
    <td align="center" style="color:#FFFFFF;width:50px;"><b>SNo.</b></td>
	<td align="center" style="color:#FFFFFF;width:60px;"><b>Code</b></td>
	<td align="center" style="color:#FFFFFF;width:300px;"><b>Name</b></td>
	<td align="center" style="color:#FFFFFF;width:250px;"><b>Department</b></td>
	<td align="center" style="color:#FFFFFF;width:80px;"><b>Emp-Status</b></td>
	<!--<td align="center" style="color:#FFFFFF;width:50px;"><b>Vote</b></td>-->
	<td align="center" style="color:#FFFFFF;width:100px;"><b>Voting Date</b></td>
	
	<td align="center" style="color:#FFFFFF;width:100px;"><b>Cast</b></td>
	<td align="center" style="color:#FFFFFF;width:200px;"><b>Scheme</b></td>
   </tr>
<?php $Sno=1; while($res=mysql_fetch_assoc($sql)){ ?> 
   <tr bgcolor="#FFFFFF">
    <td align="center"><?php echo $Sno; ?></td>
    <td align="center"><?php echo $res['EmpCode']; ?></td>
    <td><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
    <td><?php echo $res['DepartmentName']; ?></td>
	<td><?php if($res['EmpStatus']=='A'){echo 'Active';}else{echo 'Deactive';} ?></td>
    <?php /*?><td align="center"><?php echo strtoupper($res['Openion']); ?></td><?php */?>
	<td align="center"><?php echo date("d-m-Y",strtotime($res['OpenionDate'])); ?></td>
	
	<td><?php if($res['Cast']!='Any Other'){echo $res['Cast'];}else{echo $res['CastOther'];} ?></td>
	<td><?php echo $res['Scheme1'].', '.$res['Scheme2'].', '.$res['Scheme3'].', '.$res['Scheme4']; ?></td>
	
   </tr>
<?php $Sno++; } ?> 
  </table>
 </td>
</tr> 
<?php } ?>
<?php //--------------- Close Record --------------------------------------- ?>

	   </table>
     </tr>
	 <tr>
 </tr> 
</table>
		 </td> 
	   </tr>
	 </table>
   </td>
 </tr>
 		   </table>
		    </form>  		
		</td>
        <?php } ?>

		<?php //-------------------------------------------------------------------------------------------------------- ?>
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
<?php //*************************************************************************************/ ?>
<?php /**************************END*****END*****END******END******END************************/ ?>
<?php //************************************************************************************/ ?>
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