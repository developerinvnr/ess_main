<?php 
session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}

if(isset($_POST['SubCopyForm']))
{
 /************************************************************************************************/
 
 for($i=1; $i<=$_POST['RowNo']; $i++)
 { 
   if($_POST['EChk'.$i]==1)
   {
   
    $sql=mysql_query("select * from hrm_pms_kra where YearId=".$_POST['yi']." AND CompanyId=".$_POST['ci']." AND EmployeeID=".$_POST['ei']." order by KRAId ASC", $con); $row=mysql_num_rows($sql); 
	if($row>0)
	{
	 
	 while($res=mysql_fetch_assoc($sql)) 
	 {
	   
	   $chkKra=mysql_query("select * from hrm_pms_kra where YearId=".$_POST['yi']." AND EmployeeID=".$_POST['EmpId'.$i]." AND DepartmentId=".$_POST['di']." AND KRA='".$res['KRA']."'",$con); $rowKra=mysql_num_rows($chkKra);
	   if($rowKra==0)
	   { 
	    $sqlSaveK=mysql_query("insert into hrm_pms_kra(YearId, EmployeeID, DepartmentId, KRA, KRA_Description, Measure, Unit, Weightage, Logic, Period, Target, CompanyId, KRAStatus, UseKRA, EmpStatus, AppStatus, RevStatus, HODStatus, CreatedBy, CreatedDate)value(".$_POST['yi'].", ".$_POST['EmpId'.$i].", ".$_POST['di'].", '".addslashes($res['KRA'])."', '".addslashes($res['KRA_Description'])."', '".$res['Measure']."', '".$res['Unit']."', ".$res['Weightage'].", '".$res['Logic']."', '".$res['Period']."', ".$res['Target'].", ".$_POST['ci'].", 'R', 'H', 'A', 'A', 'A', 'A', ".$_POST['ui'].", '".date("Y-m-d")."')", $con);
		
		
		
		/*****************************************/
		/*****************************************/
		if($sqlSaveK)
        {
		  $Kid=mysql_insert_id();	  
		  $sSubK=mysql_query("select * from hrm_pms_krasub where KRAId=".$res['KRAId']." AND EmployeeID=".$_POST['ei']." AND KSubStatus='A' order by KRASubId ASC",$con); $rowSubK=mysql_num_rows($sSubK);
	      if($rowSubK>0)
	      {
	       while($rSubK=mysql_fetch_assoc($sSubK))
		   {  
		     $chkKraSub=mysql_query("select * from hrm_pms_krasub where EmployeeID=".$_POST['EmpId'.$i]." AND KRAId=".$Kid." AND KRA='".$rSubK['KRA']."'",$con); $rowKraSub=mysql_num_rows($chkKraSub);
			 //echo $rowKraSub.'<'.$rowSubK.'<br>';
			 if($rowKraSub<$rowSubK)
			 { 
			 
		      $sU=mysql_query("insert into hrm_pms_krasub(KRAId, EmployeeID, KRA, KRA_Description, Measure, Unit, Weightage, Logic, Period, Target, KSubStatus, CrUpDate)value(".$Kid.", ".$_POST['EmpId'.$i].", '".addslashes($rSubK['KRA'])."', '".addslashes($rSubK['KRA_Description'])."', '".$rSubK['Measure']."', '".$rSubK['Unit']."', ".$rSubK['Weightage'].", '".$rSubK['Logic']."', '".$rSubK['Period']."', ".$rSubK['Target'].", 'A', '".date("Y-m-d")."')", $con);
		     }
		   } //while($rSubK=mysql_fetch_assoc($sSubK))
		  }
        }
		/*****************************************/
		/*****************************************/
	   
	   
	   
	   } //if($rowKra==0)
	  
	 } //while($res=mysql_fetch_assoc($sql))
	 
	} //if($row>0)
	
   } //if($_POST['EChk'.$i]==1)	
   
   if($sqlSaveK){echo '<script>alert("KRA updated successfully");</script>';}
	
  }  //for($i=1; $i<=$_POST['RowNo']; $i++)
 
 /************************************************************************************************/
}
?>

<script type="text/javascript">
function FClick(n)
{
 if(document.getElementById("chk"+n).checked==true){ document.getElementById("EChk"+n).value=1; }
 else{ document.getElementById("EChk"+n).value=0; }
}

function ValiDate(fform)
{ 
  var agree=confirm("Are you sure you want to copy the KRA for all related employee?");
  if(agree)
  {
    var agree2=confirm("Are you sure?");
    if(agree2)
    {
	  return true;
    }
	else
	{
	  return false;
	}
  }
  else
  {
   return false;
  }
}

</script>

<?php $se=mysql_query("select EmpCode, Fname, Sname, Lname, DepartmentName, GradeValue from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_grade gr on g.GradeId=gr.GradeId where e.EmployeeID=".$_REQUEST['ei'],$con);
$re=mysql_fetch_assoc($se); ?>
<form name="fform" method="post" onsubmit="return ValiDate(this)"> 
<input type="hidden" name="ei" id="ei" value="<?=$_REQUEST['ei']?>" />
<input type="hidden" name="yi" id="yi" value="<?=$_REQUEST['YeId']?>" />
<input type="hidden" name="di" id="di" value="<?=$_REQUEST['di']?>" />
<input type="hidden" name="ci" id="ci" value="<?=$_REQUEST['ci']?>" />
<input type="hidden" name="ui" id="ui" value="<?=$_REQUEST['ui']?>" />
<table style="width:100%; vertical-align:top; margin-top:5px;">
<tr>
<td style="text-align:center;"><b><?=$re['EmpCode'].' - '.$re['Fname'].' '.$re['Sname'].' '.$re['Lname'].' ['.$re['GradeValue'].'] - {'.$re['DepartmentName'].'}'?></b></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td style="color:#004080;">Related Employee: <input type="submit" name="SubCopyForm" value="Copy to Related Checked Employee" /></td></tr>
<tr>
 <td style="width:100%; vertical-align:top;">
  <table style="width:100%; font-size:12px;" border="1" cellpadding="0" cellspacing="1">
   <tr style="background-color:#006CD9;color:#FFFFFF;height:25px;">
    <th style="width:5%;text-align:center;">Sn</th>
	<th style="width:10%;text-align:center;">EC</th>
	<th style="width:70%;text-align:center;">Name</th>
	<th style="width:5%;text-align:center;">Grade</th>
	<th style="width:10%;text-align:center;">Check</th>
   </tr>
   <?php $sEmp=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, GradeValue from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_grade gr on g.GradeId=gr.GradeId where g.DepartmentId=".$_REQUEST['di']." AND EmpStatus='A' AND e.EmployeeID!=".$_REQUEST['ei']." order by EmpCode ASC",$con); 
   
   //AND g.GradeId=".$_REQUEST['gi']."
   
   $sn=1; while($rEmp=mysql_fetch_assoc($sEmp)){
   
   $sql3E2=mysql_query("select * from hrm_pms_kra where YearId=".$_REQUEST['yi']." AND EmployeeID=".$rEmp['EmployeeID'], $con); $rows3E2=mysql_num_rows($sql3E2);
   
   ?>
   <tr style="background-color:<?php if($rows3E2>0){echo '#C4FF88';}?>;">
    <td style="text-align:center;"><?=$sn?></td>
	<td style="text-align:center;"><?=$rEmp['EmpCode']?></td>
	<td>&nbsp;<?=$rEmp['Fname'].' '.$rEmp['Sname'].' '.$rEmp['Lname']?></td>
	<td style="text-align:center;"><?=$rEmp['GradeValue']?></td>
	<td style="text-align:center; vertical-align:middle;"><input type="checkbox" id="chk<?=$sn?>" name="chk<?=$sn?>" onclick="FClick(<?=$sn?>)" <?php if($rows3E2>0){echo 'disabled';}?>/>
	<input type="hidden" id="EChk<?=$sn?>" name="EChk<?=$sn?>" value="0" />
	<input type="hidden" id="EmpId<?=$sn?>" name="EmpId<?=$sn?>" value="<?=$rEmp['EmployeeID']?>" /></td>
	
   </tr>
   <?php $sn++; } $snn=$sn-1; echo '<input type="hidden" name="RowNo" value='.$snn.' />'; ?>
  </table>  
 </td>
</tr>
</table>
</form>