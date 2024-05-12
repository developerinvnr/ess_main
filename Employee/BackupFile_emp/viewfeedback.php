<?php require_once('../AdminUser/config/config.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Feedback Form</title>
<style>
.td1{ text-align:center;font-family:Times New Roman;color:#FFFFFF;font-size:14px;font-weight:bold; }
.td1l{ font-family:Times New Roman;color:#FFFFFF;font-size:14px;font-weight:bold; }
.td2{ text-align:center;font-family:Times New Roman;font-size:12px; }
.td3{ font-family:Times New Roman;font-size:12px; }
.td22{ text-align:center;font-family:Times New Roman;font-size:14px; }
.td33{ font-family:Times New Roman;font-size:14px; }
</style>
<script type="text/javascript" src="js/Prototype.js"></script>
<script>
function SelectDept(value){ 
var url = 'viewfeedbackdept.php'; var pars = 'action=deptemp&dept='+value;	var myAjax = new Ajax.Request(
	url, { method: 'post', parameters: pars, onComplete: show_BehEmp });
} 
function show_BehEmp(originalRequest)
{ document.getElementById('EmpSpan').innerHTML = originalRequest.responseText; }

function FunChk(v)
{
 if(v=='OTHER'){ document.getElementById('OtherBehAtt').disabled=false; }
 else{ document.getElementById('OtherBehAtt').disabled=true; }
}

function validation(FeedbackF)
{
 if(document.getElementById('BehDept').value==''){alert("please select department!"); return false; }
 else if(document.getElementById('BehEmp').value==''){alert("please select person!"); return false; }
 else if(document.getElementById('BehAtt').value==''){alert("please select behavioral attribute!"); return false; }
 else if(document.getElementById('BehAtt').value=='OTHER' && document.getElementById('OtherBehAtt').value==''){alert("please enter other behavioral attribute!"); return false; }
 else if(document.getElementById('BehRmk').value==''){alert("please enter behavioral comment!"); return false; }
 else { var agree=confirm("Are you sure?"); if(agree){return true;}else{return false;} }
}
</script>
</head>
<body>
<center><b style="font-family:Georgia;font-size:25px;">"<u>Feedback Form</u>"</b></center>
<br />
<form name="FeedbackF" method="post" onsubmit="return validation(this)" action="viewfeedbackdept.php">
<input type="hidden" name="e" value="<?php echo $_REQUEST['e']; ?>" />
<input type="hidden" name="c" value="<?php echo $_REQUEST['c']; ?>" />
<table style="width:100%;" align="center">
 <tr>
  <td style="width:25%;">&nbsp;</td>
  <td valign="top" align="center" style="width:50%;">
   <table style="width:100%;" border="0" cellpadding="2" align="center">
    <tr>
	 <td style="width:150px;">Department</td>
	 <td>
	 <select name="BehDept" id="BehDept" onchange="SelectDept(this.value)" style="width:100%;height:24px;">
<option value="" selected>SELECT DEPARTMENT</option>
<?php $sql=mysql_query("select DepartmentId,DepartmentName from hrm_department where CompanyId=".$_REQUEST['c']." order by DepartmentName ASC",$con); while($res=mysql_fetch_assoc($sql)){ ?>
<option value="<?php echo $res['DepartmentId']; ?>"><?php echo strtoupper($res['DepartmentName']); ?></option>
<?php } ?></select></td>
	</tr>
	<tr>
	 <td>Person</td>
	 <td>
	 <span id="EmpSpan"><select name="BehEmp" id="BehEmp" style="width:100%;height:24px;" disabled="disabled">
<option value=""></option></select></span></td>
	</tr>
	<tr>
	 <td>Behavioral Attribute</td>
	 <td>
<select name="BehAtt" id="BehAtt" style="width:100%;height:24px;" onchange="FunChk(this.value)">
<option value="">SELECT BEHAVIORAL ATTRIBUTE</option>
<option value="INTERPERSONAL SKILLS">INTERPERSONAL SKILLS</option>
<option value="COMMUNICATION">COMMUNICATION</option>
<option value="INITIATIVE">INITIATIVE</option>
<option value="PROBLEM SOLVING">PROBLEM SOLVING</option>
<option value="ATTENDANCE & PUNCTUALITY">ATTENDANCE & PUNCTUALITY</option>
<option value="ATTITUDE TOWARDS ORGANIZATION/WORK/AUTHORITY">ATTITUDE TOWARDS ORGANIZATION/WORK/AUTHORITY</option>
<option value="TEAM LEADERSHIP">TEAM LEADERSHIP</option>
<option value="MENTORING AND COACHING">MENTORING AND COACHING</option>
<option value="STRATEGIC THINKING AND SCENARIO - BUILDING">STRATEGIC THINKING AND SCENARIO - BUILDING</option>
<option value="PLANNING AND ORGANIZING">PLANNING AND ORGANIZING</option>  
<option value="CHANGE MANAGEMENT">CHANGE MANAGEMENT</option> 
<option value="MEDIATION AND NEGOTIATION">MEDIATION AND NEGOTIATION</option>
<option value="TEAM LEADERSHIP: BUILD">TEAM LEADERSHIP: BUILD</option>
<option value="ANALYSIS,PROBLEM SOLVING AND DECISION MAKING">ANALYSIS,PROBLEM SOLVING AND DECISION MAKING</option>
<option value="OTHER">OTHER</option>
</select></td>
	</tr>
	<tr>
	 <td>If Other</td>
	 <td><input type="text" name="OtherBehAtt" id="OtherBehAtt" style="width:98%;" value="" disabled="disabled"/></td>
	</tr>
	<tr>
	 <td>Comment</td>
	 <td><textarea name="BehRmk" id="BehRmk" style="width:98%;" rows="4"></textarea></td>
	</tr>
   </table>
  </td>
  <td style="width:25%; vertical-align:bottom;">
   <font color="#4A9500"><?php echo $_REQUEST['msg']; ?></font><br />
   <input type="submit" name="SubmitAtt" id="SubmitAtt" value="Submit" style="width:100px;" /><br /><br />
  </td>
 </tr>
 <tr>
  <td colspan="3" valign="top" align="center">
   <table border="1" cellspacing="1" style="width:100%;">
	<tr bgcolor="#7a6189" valign="middle">
     <td class="td1" style="width:30px;"><b>SN</b></td>
	 <td class="td1" style="width:200px;"><b>Name</b></td>
	 <td class="td1" style="width:100px;"><b>Department</b></td>
	 <td class="td1" style="width:80px;"><b>Feedback<bR />Date</b></td>
	 <td class="td1" style="width:200px;"><b>Attribute</b></td>
	 <td class="td1" style="width:400px;"><b>Comment</b></td>
    </tr>
	<?php $sql=mysql_query("select Fname,Sname,Lname,DepartmentCode,f.* from hrm_feedback f inner join hrm_employee e on f.EmployeeID=e.EmployeeID inner join hrm_employee_general g on f.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where SubBy=".$_REQUEST['e']." order by f.SubDate DESC",$con); 
	$sno=1; while($res=mysql_fetch_array($sql)){ ?>
	<tr style="height:20px; background-color:<?php if($sno%2==0){echo '#ECFFEC';} else {echo '#FFFFFF';} ?>;">
		<td class="td2"><?php echo $sno; ?></td>
		<td class="td3"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
        <td class="td3"><?php echo $res['DepartmentCode'];?></td>			
		<td class="td2"><?php echo date("d M y",strtotime($res['SubDate']));?></td>	
		<td class="td3"><?php echo $res['BehAtt'];?></td>		
		<td class="td3"><?php echo $res['Remark'];?></td>
	</tr>
	<?php $sno++; } ?>
  </td>
 </tr>
</table>
</form>
</body>
</html>
