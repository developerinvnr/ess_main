<?php require_once('../AdminUser/config/config.php');  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="../AdminUser/css/body.css" rel="stylesheet"/>
<link type="text/css" href="../AdminUser/css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" language="javascript">
function EditBtn(Id,no)
{ 
document.getElementById("DumEmp"+no).disabled=false; document.getElementById("DumApp"+no).disabled=false;
document.getElementById("DumRev"+no).disabled=false; document.getElementById("DumHod"+no).disabled=false;
document.getElementById("ImgE"+no).style.display='none'; document.getElementById("ImgS"+no).style.display='block';
}

function SaveRat(Id,No){  
    var DE=document.getElementById("DumEmp"+No).value;  var DA=document.getElementById("DumApp"+No).value;
    var DR=document.getElementById("DumRev"+No).value;  var DH=document.getElementById("DumHod"+No).value;
	var url = 'GetRatEmp.php';	var pars = 'ID='+Id+'&E='+DE+'&A='+DA+'&R='+DR+'&H='+DH+'&N='+No; 
	var myAjax = new Ajax.Request(url, { method: 'post', parameters: pars, onComplete: show_DEmpRat });
} 
function show_DEmpRat(originalRequest)
{  document.getElementById('MyEmpRat').innerHTML = originalRequest.responseText; var rno=document.getElementById("rno").value;
   document.getElementById("DumEmp"+rno).disabled=true; document.getElementById("DumApp"+rno).disabled=true;
   document.getElementById("DumRev"+rno).disabled=true; document.getElementById("DumHod"+rno).disabled=true;
   document.getElementById("ImgE"+rno).style.display='block'; document.getElementById("ImgS"+rno).style.display='none';
}

</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#E0DBE3">	
<center>
<form method="post" name="Form">
<table style="vertical-align:top;width:800px;height:390px;" align="center" border="1">
<tr bgcolor="#909090"><td align="center" style="height:20px;font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:130px;"><b>Unassessed Team</b></td></tr>
<tr>
<td valign="top" align="center"><span id="MyEmpRat"></span>
<table border="1" style="width:800px;">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;" class="All_50"><b>SN</b></td>
   <td align="center" style="color:#FFFFFF;" class="All_60"><b>EC</b></td>
   <td align="center" style="color:#FFFFFF;" class="All_250"><b>Name</b></td>
   <td align="center" style="color:#FFFFFF;" class="All_100"><b>Department</b></td>
   <td align="center" style="color:#FFFFFF;" class="All_50"><b>Emp</b></td>	
   <td align="center" style="color:#FFFFFF;" class="All_50"><b>App</b></td>	
   <td align="center" style="color:#FFFFFF;" class="All_50"><b>Rev</b></td>
   <td align="center" style="color:#FFFFFF;" class="All_50"><b>Hod</b></td>
   <td align="center" style="color:#FFFFFF;" class="All_50"><b>Action</b></td>
 </tr>
<?php $sql=mysql_query("select EmpCode,Fname,Sname,Lname,EmpPmsId,Dummy_EmpRating,Dummy_AppRating,Dummy_RevRating,Dummy_HodRating,DepartmentId,HR_CurrDesigId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$_REQUEST['CI']." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='2013-03-31' order by EmpCode ASC", $con); $no=1; while($res=mysql_fetch_array($sql)) {
 ?> 
 <tr bgcolor="<?php if($res['Dummy_EmpRating']==0 OR $res['Dummy_AppRating']==0 OR $res['Dummy_RevRating']==0 OR $res['Dummy_HodRating']==0){echo '#B0FFB0';}else{echo '#FFFFFF'; } ?>">
   <td align="center" style="" class="All_50"><?php echo $no; ?><input type="hidden" name="PmsId" id="PmsId" value="<?php echo $res['EmpPmsId']; ?>" /></td>
   <td align="center" style="" class="All_60"><?php echo $res['EmpCode']; ?></td>
   <td align="" style="" class="All_250">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
<?php $sqlDe = mysql_query("SELECT DepartmentCode FROM hrm_department WHERE DepartmentId=".$res['DepartmentId'], $con); $resDe = mysql_fetch_assoc($sqlDe); ?>   
   <td align="" style="" class="All_100">&nbsp;<?php echo $resDe['DepartmentCode']; ?></td>
   <td align="center" style="" class="All_50"><select name="DumEmp<?php echo $no; ?>" id="DumEmp<?php echo $no; ?>" style="width:48px;height:22px;font-family:Times New Roman;font-size:12px;" disabled><option value="<?php echo $res['Dummy_EmpRating']; ?>"><?php echo round($res['Dummy_EmpRating'],1); ?></option>
<?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$_REQUEST['CI']." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ ?><option value="<?php echo $resR['Rating']; ?>"><?php echo $resR['Rating']; ?></option><?php } ?>	   
   </select></td>	
   <td align="center" style="" class="All_50"><select name="DumApp<?php echo $no; ?>" id="DumApp<?php echo $no; ?>" style="width:48px;height:22px;font-family:Times New Roman;font-size:12px;" disabled><option value="<?php echo $res['Dummy_AppRating']; ?>"><?php echo round($res['Dummy_AppRating'],1); ?></option>
<?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$_REQUEST['CI']." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ ?><option value="<?php echo $resR['Rating']; ?>"><?php echo $resR['Rating']; ?></option><?php } ?>	   
   </select></td>	
   <td align="center" style="" class="All_50"><select name="DumRev<?php echo $no; ?>" id="DumRev<?php echo $no; ?>" style="width:48px;height:22px;font-family:Times New Roman;font-size:12px;" disabled><option value="<?php echo $res['Dummy_RevRating']; ?>"><?php echo round($res['Dummy_RevRating'],1); ?></option>
<?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$_REQUEST['CI']." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ ?><option value="<?php echo $resR['Rating']; ?>"><?php echo $resR['Rating']; ?></option><?php } ?>	   
   </select></td>
   <td align="center" style="" class="All_50"><select name="DumHod<?php echo $no; ?>" id="DumHod<?php echo $no; ?>" style="width:48px;height:22px;font-family:Times New Roman;font-size:12px;" disabled><option value="<?php echo $res['Dummy_HodRating']; ?>"><?php echo round($res['Dummy_HodRating'],1); ?></option>
<?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$_REQUEST['CI']." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ ?><option value="<?php echo $resR['Rating']; ?>"><?php echo $resR['Rating']; ?></option><?php } ?>	   
   </select></td>
   <td align="center" style="" class="All_50">
   <img src="images/edit.png" id="ImgE<?php echo $no; ?>" onClick="EditBtn(<?php echo $res['EmpPmsId'].', '.$no; ?>)" border="0" style="display:block;">
   <img id="ImgS<?php echo $no; ?>" src="images/Floppy-Small-icon.png" onClick="SaveRat(<?php echo $res['EmpPmsId'].', '.$no; ?>)" border="0" style="display:none;"></td>	
 </tr>
<?php $no++; } ?> 
</table>
</td>
</tr>
</table>
</form>
</center>
</body>
</html>
