<?php session_start();
if($_SESSION['login'] = true)
{require_once('config/config.php');} else {$msg= "Session Expiry...............";}

if($_REQUEST['actti']=='formbempdel' && $_REQUEST['id']!='')
{
 $sdel=mysql_query("delete from hrm_employee_pms_behavioralformb where BehavioralFormBId=".$_REQUEST['id'],$con);
 if($sdel)
 { 
     echo '<script>window.location="GradeFormBEmp.php?DPid='.$_REQUEST['DPid'].'&fbid='.$_REQUEST['fbid'].'&yid='.$_REQUEST['yid'].'"; </script>'; 
     //alert("Data deleted successfully!"); 
 }
}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.font{font-family:Times New Roman;font-size:16px;text-align:center;font-weight:bold;} 
.th{font-family:Times New Roman;color:#FFFFFF;font-size:14px;text-align:center;font-weight:bold;height:24px;}
.td{font-family:Times New Roman;font-size:14px;text-align:center;color:#000000;}
.tdl{font-family:Times New Roman;font-size:14px;text-align:left;}
.tdr{font-family:Times New Roman;font-size:14px;text-align:right;}
.InputT{font-family:Times New Roman;font-size:14px;width:100%;height:20px;text-align:center;border:hidden; background-color:#CDFF9B;}.InputTl{font-family:Times New Roman;font-size:14px;width:100%;height:20px;text-align:left;border:hidden;}.InputTr{font-family:Times New Roman;font-size:14px;width:100%;height:20px;text-align:right;border:hidden;background-color:#CDFF9B;}
.InputS{font-family:Times New Roman;font-size:12px;width:100%;height:20px;}
.fontButton{ background-color:#7a6189;color:#009393;font-family:Times New Roman;font-size:13px; }
.SaveButton{ background-image:url(images/save.gif);width:20px;height:20px;background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit; }
.CalenderButton{ background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3; border-color:#FFFFFF; }
</style>
<Script> 
function fEDel(id,fbId,YId,DpId)
{ 
 var agree=confirm("Are you sure!");
 if(agree){ window.location='GradeFormBEmp.php?DPid='+DpId+'&fbid='+fbId+'&yid='+YId+'&id='+id+'&actti=formbempdel'; }
 else { return false; } 
}

</SCRIPT> 
</head>
<body class="body">
<table class="table">
 <tr>
  <td align="left" id="type" valign="top" style="display:block;width:100%;">             
  <table border="0" width="100%">  
   <tr>
	<td align="left" width="100%">
	<table border="1" width="100%" border="1" bgcolor="#FFFFFF" cellspacing="1">
	 <tr>
	  <td colspan="6" style="font-family:Times New Roman;font-size:16px;text-align:center;">
	   <?php $sqlb=mysql_query("select Skill,SkillComment from hrm_pms_formb where FormBId=".$_REQUEST['fbid'],$con); $resb=mysql_fetch_assoc($sqlb); echo '<b>'.$resb['Skill'].'</b><br><b style="color:#005BB7;"><u>Description</u>:</b> '.$resb['SkillComment']; ?>
	  </td>
	 </tr>
     <tr bgcolor="#7a6189">
	  <td class="th" style="width:5%;"><b>Sn</b></td>
	  <td class="th" style="width:10%;"><b>EC</b></td>
	  <td class="th" style="width:50%;"><b>name</b></td>
	  <td class="th" style="width:25%;"><b>Department</b></td>
	  <?php /*?><td class="th" style="width:20%;"><b>Behavioral(Form B)</b></td>
	  <td class="th" style="width:45%;"><b>Skill Comment</b></td><?php */?>
	  <td class="th" style="width:10%;"><b>Action</b></td>
     </tr>
	 <?php $sql=mysql_query("select BehavioralFormBId,EmpCode,Fname,Sname,Lname,DepartmentName from hrm_employee_pms_behavioralformb bfb inner join hrm_employee e on bfb.EmpId=e.EmployeeID inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where bfb.FormBId=".$_REQUEST['fbid']." AND bfb.YearId=".$_REQUEST['yid']." AND g.DepartmentId=".$_REQUEST['DPid']." order by bfb.EmpId ASC", $con); $sn=1; while($res=mysql_fetch_assoc($sql)){ ?>	 	 		      
     <tr>
	  <td class="td"><?php echo $sn; ?></td>
	  <td class="td"><?php echo $res['EmpCode']; ?></td>
	  <td class="tdl">&nbsp;<?php echo ucwords(strtolower($res['Fname'].' '.$res['Sname'].' '.$res['Lname'])); ?></td>
	  <td class="tdl">&nbsp;<?php echo $res['DepartmentName']; ?></td>
	  <?php /*?><td class="tdl"><input class="InputTl" value="<?php echo $res['Skill']; ?>" /></td>
	  <td class="tdl"><input class="InputTl" value="<?php echo $res['SkillComment']; ?>" /></td><?php */?>
      <td class="td"><span style="cursor:pointer;color:#007500;" onClick="fEDel(<?php echo $res['BehavioralFormBId'].','.$_REQUEST['fbid'].','.$_REQUEST['yid'].','.$_REQUEST['DPid'];?>)"><u><img src="images/delete.png" border="0" /></u></span></td>  
     </tr>
	 <?php $sn++; } ?>
	</table>	 
    </td>
   </tr> 
  </table>  
  </td> 
 </tr>
</table>
</body>
</html>
