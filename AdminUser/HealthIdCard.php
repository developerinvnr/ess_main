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
<style>.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}.inner_table{height:550px;overflow-y:auto;width:auto;}</style>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript" language="javascript">
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '480px' }); })

function SelectDept(d){ window.location='HealthIdCard.php?action=CardSub&d='+d;}

function ExportSub(d)
{ var c=document.getElementById("ComId").value; window.open("HealthIdCard.php?action=OpinionExport&d="+d+"&c="+c,"ExpForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");} 

function MyHelthfile(n,v,c){window.open("../Employee/MyHelthFile.php?a=open&File="+v+"&c="+c+"&n="+n,"MyFile","width=1000,height=650"); }

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
				   <td>
				    <table border="0">						
                    <tr>
				<td class="td1" style="width:100%;font-size:15px;font-family:Times New Roman;color:#00274F; font-weight:bold;">(Health Card)&nbsp;&nbsp;&nbsp;
				Department :&nbsp;<select style="font-size:11px; width:148px;height:22px;background-color:#DDFFBB;" name="Dept" id="Dept" onChange="SelectDept(this.value)">
				<option value="0" <?php if($_REQUEST['d']==0){echo 'selected';}?> >Select Department</option>
<?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
                <option value="<?php echo $ResDept['DepartmentId']; ?>" <?php if($_REQUEST['d']==$ResDept['DepartmentId']){echo 'selected';}?>><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?>
			    <option value="All">&nbsp;All</option></select>
				</td>
                     </tr>
				   </table>					
				   </td> 
		           </tr>
                  </table>
				</td>
			 </tr>
<?php //------------------- Display Record ----------------------------------- ?>
<?php /*if($_REQUEST['action']=='CardSub') { ?>
    <tr>	
	 <td valign="top" style="width:100%;font-size:14px; color:#005BB7; font-family:Georgia; font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="ExportCrad('<?php echo $_REQUEST['d']; ?>')" style="font-size:12px;">Export Excel</a>
	 </td>
	</tr>
<?php } */?>


<?php if($_REQUEST['action']=='CardSub') { ?>
<tr>
 <td>
  <table border="1" id="table1" cellspacing="1" width="100%" style="font-family:Times New Roman; font-size:15px;">  
   <div class="thead">
   <thead>
   <tr bgcolor="#7a6189" style="height:25px;">
    <td align="center" style="color:#FFFFFF;width:50px;"><b>SNo.</b></td>
	<td align="center" style="color:#FFFFFF;width:60px;"><b>Code</b></td>
	<td align="center" style="color:#FFFFFF;width:250px;"><b>Name</b></td>
	<td align="center" style="color:#FFFFFF;width:200px;"><b>Department</b></td>
	<td align="center" style="color:#FFFFFF;width:250px;"><b>Designation</b></td>
	<td align="center" style="color:#FFFFFF;width:200px;"><b>Halth Card</b></td>
   </tr>
   </thead>
   </div>
<?php if($_REQUEST['d']=='All'){$SubQ='1=1';}elseif($_REQUEST['d']>0){$SubQ='g.DepartmentId='.$_REQUEST['d'];}

$sql=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentCode,DesigCode from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_designation de on g.DesigId=de.DesigId where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND ".$SubQ." order by e.EmpCode ASC",$con); $row=mysql_num_rows($sql); $Sno=1; while($res=mysql_fetch_assoc($sql)){ ?> 
   <div class="tbody">
   <tbody>
   <tr bgcolor="#FFFFFF">
    <td align="center"><?php echo $Sno; ?></td>
    <td align="center"><?php echo $res['EmpCode']; ?></td>
    <td>&nbsp;<?php echo strtoupper($res['Fname'].' '.$res['Sname'].' '.$res['Lname']); ?></td>
    <td>&nbsp;<?php echo $res['DepartmentCode']; ?></td>
	<td>&nbsp;<?php echo $res['DesigCode']; ?></td>
	<td align="center">
	<?php $EC3=$res['EmpCode']; $filename3 = '../Employee/HealthIDCard/'.$EC3.'/'.$EC3.'_A.pdf';
          if(file_exists($filename3)){ ?>
		  
	<script language="javascript" type="text/javascript">function MyHelthfile(n,v,c){window.open("../Employee/MyHelthFile.php?a=open&File="+v+"&c="+c+"&n="+n,"MyFile","width=1000,height=650" "_blank"); }</script>
    <a href="#" style="text-decoration:none;" onClick="MyHelthfile(1,<?php echo $EC3.', '.$CompanyId; ?>)">
     <b style="color:#00509F;">Click</b></a>	  
	<?php } ?>	  
	</td>
   </tr>
   </tbody>
   </div>
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