<?php require_once('../AdminUser/config/config.php');  ?>
<?php
if(isset($_POST['Save']))
{ $sY=mysql_query("select * from hrm_year where YearId=".$_POST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
  $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD;
/* 
$sql=mysql_query("select * from hrm_emplyee_tds_da where EmployeeID=".$_POST['E']." AND YearId=".$_POST['YI']."", $con); $row=mysql_num_rows($sql);
if($row>0){ $Upp=mysql_query("update hrm_emplyee_tds_da set Apr_Amt='".$_POST['Apr_Amt']."', Apr_TaxFree='".$_POST['Apr_Tf']."', Apr_Taxble='".$_POST['Apr_Tb']."', May_Amt='".$_POST['May_Amt']."', May_TaxFree='".$_POST['May_Tf']."', May_Taxble='".$_POST['May_Tb']."', Jun_Amt='".$_POST['Jun_Amt']."', Jun_TaxFree='".$_POST['Jun_Tf']."', Jun_Taxble='".$_POST['Jun_Tb']."', Jul_Amt='".$_POST['Jul_Amt']."', Jul_TaxFree='".$_POST['Jul_Tf']."', Jul_Taxble='".$_POST['Jul_Tb']."', Aug_Amt='".$_POST['Aug_Amt']."', Aug_TaxFree='".$_POST['Aug_Tf']."', Aug_Taxble='".$_POST['Aug_Tb']."', Sep_Amt='".$_POST['Sep_Amt']."', Sep_TaxFree='".$_POST['Sep_Tf']."', Sep_Taxble='".$_POST['Sep_Tb']."', Oct_Amt='".$_POST['Oct_Amt']."', Oct_TaxFree='".$_POST['Oct_Tf']."', Oct_Taxble='".$_POST['Oct_Tb']."', Nov_Amt='".$_POST['Nov_Amt']."', Nov_TaxFree='".$_POST['Nov_Tf']."', Nov_Taxble='".$_POST['Nov_Tb']."', Dec_Amt='".$_POST['Dec_Amt']."', Dec_TaxFree='".$_POST['Dec_Tf']."', Dec_Taxble='".$_POST['Dec_Tb']."', Jan_Amt='".$_POST['Jan_Amt']."', Jan_TaxFree='".$_POST['Jan_Tf']."', Jan_Taxble='".$_POST['Jan_Tb']."', Feb_Amt='".$_POST['Feb_Amt']."', Feb_TaxFree='".$_POST['Feb_Tf']."', Feb_Taxble='".$_POST['Feb_Tb']."', Mar_Amt='".$_POST['Mar_Amt']."', Mar_TaxFree='".$_POST['Mar_Tf']."', Mar_Taxble='".$_POST['Mar_Tb']."', Tot_Amt='".$_POST['Tot_Amt']."', Tot_TaxFree='".$_POST['Tot_Tf']."', Tot_Taxble='".$_POST['Tot_Tb']."', CreatedBy=".$_POST['U'].", CreatedDate='".date("Y-m-d")."' where EmployeeID=".$_POST['E']." AND YearId=".$_POST['YI'], $con); }
else{ $Ins=mysql_query("insert into hrm_emplyee_tds_da(EmployeeID, Period, YearId, Apr_Amt, Apr_TaxFree, Apr_Taxble, May_Amt, May_TaxFree, May_Taxble, Jun_Amt, Jun_TaxFree, Jun_Taxble, Jul_Amt, Jul_TaxFree, Jul_Taxble, Aug_Amt, Aug_TaxFree, Aug_Taxble, Sep_Amt, Sep_TaxFree, Sep_Taxble, Oct_Amt, Oct_TaxFree, Oct_Taxble, Nov_Amt, Nov_TaxFree, Nov_Taxble, Dec_Amt, Dec_TaxFree, Dec_Taxble, Jan_Amt, Jan_TaxFree, Jan_Taxble, Feb_Amt, Feb_TaxFree, Feb_Taxble, Mar_Amt, Mar_TaxFree, Mar_Taxble, Tot_Amt, Tot_TaxFree, Tot_Taxble, Status, CreatedBy, CreatedDate) values(".$_POST['E'].", '".$PRD."', ".$_POST['YI'].", '".$_POST['Apr_Amt']."', '".$_POST['Apr_Tf']."', '".$_POST['Apr_Tb']."', '".$_POST['May_Amt']."', '".$_POST['May_Tf']."', '".$_POST['May_Tb']."', '".$_POST['Jun_Amt']."', '".$_POST['Jun_Tf']."', '".$_POST['Jun_Tb']."', '".$_POST['Jul_Amt']."', '".$_POST['Jul_Tf']."', '".$_POST['Jul_Tb']."', '".$_POST['Aug_Amt']."', '".$_POST['Aug_Tf']."', '".$_POST['Aug_Tb']."', '".$_POST['Sep_Amt']."', '".$_POST['Sep_Tf']."', '".$_POST['Sep_Tb']."', '".$_POST['Oct_Amt']."', '".$_POST['Oct_Tf']."', '".$_POST['Oct_Tb']."', '".$_POST['Nov_Amt']."','".$_POST['Nov_Tf']."', '".$_POST['Nov_Tb']."', '".$_POST['Dec_Amt']."', '".$_POST['Dec_Tf']."', '".$_POST['Dec_Tb']."', '".$_POST['Jan_Amt']."', '".$_POST['Jan_Tf']."', '".$_POST['Jan_Tb']."', '".$_POST['Feb_Amt']."', '".$_POST['Feb_Tf']."', '".$_POST['Feb_Tb']."', '".$_POST['Mar_Amt']."', '".$_POST['Mar_Tf']."', '".$_POST['Mar_Tb']."', '".$_POST['Tot_Amt']."', '".$_POST['Tot_Tf']."', '".$_POST['Tot_Tb']."', 'A', ".$_POST['U'].", '".date("Y-m-d")."')", $con);}
*/

$M=$_POST['M'];
if($M==1){$DA=$_POST['Jan_Tb']; $DAF=$_POST['Jan_Tf']; $DAmt=$_POST['Jan_Amt'];}elseif($M==2){$DA=$_POST['Feb_Tb']; $DAF=$_POST['Feb_Tf']; $DAmt=$_POST['Feb_Amt'];}elseif($M==3){$DA=$_POST['Mar_Tb']; $DAF=$_POST['Mar_Tf']; $DAmt=$_POST['Mar_Amt'];}elseif($M==4){$DA=$_POST['Apr_Tb']; $DAF=$_POST['Apr_Tf']; $DAmt=$_POST['Apr_Amt'];}elseif($M==5){$DA=$_POST['May_Tb']; $DAF=$_POST['May_Tf']; $DAmt=$_POST['May_Amt'];}elseif($M==6){$DA=$_POST['Jun_Tb']; $DAF=$_POST['Jun_Tf']; $DAmt=$_POST['Jun_Amt'];}elseif($M==7){$DA=$_POST['Jul_Tb']; $DAF=$_POST['Jul_Tf']; $DAmt=$_POST['Jul_Amt'];}elseif($M==8){$DA=$_POST['Aug_Tb']; $DAF=$_POST['Aug_Tf']; $DAmt=$_POST['Aug_Amt'];}elseif($M==9){$DA=$_POST['Sep_Tb']; $DAF=$_POST['Sep_Tf']; $DAmt=$_POST['Sep_Amt'];}elseif($M==10){$DA=$_POST['Oct_Tb']; $DAF=$_POST['Oct_Tf']; $DAmt=$_POST['Oct_Amt'];}elseif($M==11){$DA=$_POST['Nov_Tb']; $DAF=$_POST['Nov_Tf']; $DAmt=$_POST['Nov_Amt'];}elseif($M==12){$DA=$_POST['Dec_Tb']; $DAF=$_POST['Dec_Tf']; $DAmt=$_POST['Dec_Amt'];}

/*
$SqlAllow=mysql_query("select TdsAllowId from hrm_emplyee_tds_allowance where EmployeeID=".$_POST['E']." AND Month=".$M." AND Period='".$PRD."'", $con); 
$RowAllow=mysql_num_rows($SqlAllow);
if($RowAllow==0){$InsSalary=mysql_query("insert into hrm_emplyee_tds_allowance(EmployeeID, Period, YearId, Month, DA_Amt, DA_TaxFree, Status, CreatedBy, CreatedDate) values(".$_POST['E'].", '".$PRD."', ".$_POST['YI'].", ".$M.", '".$DA."', '".$DAF."', 'A', ".$_POST['U'].", '".date("Y-m-d")."')", $con);}
if($RowAllow>0){$UpSalary=mysql_query("update hrm_emplyee_tds_allowance set YearId=".$_POST['YI'].", DA_Amt='".$DA."', DA_TaxFree='".$DAF."', CreatedBy=".$_POST['U'].", CreatedDate='".date("Y-m-d")."' where EmployeeID=".$_POST['E']." AND Month=".$M." AND Period='".$PRD."'", $con);}
*/
 
$sqlMP=mysql_query("select * from hrm_employee_monthlypayslip where EmployeeID=".$_POST['E']." AND Month=".$_POST['M']." AND Year=".$_POST['Y']."", $con); 
$rowMP=mysql_num_rows($sqlMP);
if($rowMP>0){
$UpSal=mysql_query("update hrm_employee_monthlypayslip set DA='".$DAmt."' where EmployeeID=".$_POST['E']." AND Month=".$M." AND Year=".$_POST['Y']."", $con);}
else{$UpSal=mysql_query("insert into hrm_employee_monthlypayslip(EmployeeID, Month, Year, DA) values(".$_POST['E'].", ".$M.", ".$_POST['Y'].", '".$DAmt."')", $con);}
 if($UpSal){$msg='Successfully updated...';}
} 
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php include_once('../Title.php'); ?>&nbsp;Daily Allowance</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.Des{font-family:Times New Roman;font-size:12px;width:130px;}.Amt{font-family:Times New Roman;font-size:12px;width:90px;}
.TaxF{font-family:Times New Roman;font-size:12px;width:80px;}
</style>
<script language="javascript" type="text/javascript">
function EditAOI(m)
{document.getElementById("Save").style.display='block'; document.getElementById("Change").style.display='none'; 
if(m==1){document.getElementById("Jan_Amt").readOnly=false; document.getElementById("Jan_Tf").readOnly=false;}
else if(m==2){document.getElementById("Feb_Amt").readOnly=false; document.getElementById("Feb_Tf").readOnly=false;}
else if(m==3){document.getElementById("Mar_Amt").readOnly=false; document.getElementById("Mar_Tf").readOnly=false;}
else if(m==4){document.getElementById("Apr_Amt").readOnly=false; document.getElementById("Apr_Tf").readOnly=false;}
else if(m==5){document.getElementById("May_Amt").readOnly=false; document.getElementById("May_Tf").readOnly=false;}
else if(m==6){document.getElementById("Jun_Amt").readOnly=false; document.getElementById("Jun_Tf").readOnly=false;}
else if(m==7){document.getElementById("Jul_Amt").readOnly=false; document.getElementById("Jul_Tf").readOnly=false;}
else if(m==8){document.getElementById("Aug_Amt").readOnly=false; document.getElementById("Aug_Tf").readOnly=false;}
else if(m==9){document.getElementById("Sep_Amt").readOnly=false; document.getElementById("Sep_Tf").readOnly=false;}
else if(m==10){document.getElementById("Oct_Amt").readOnly=false; document.getElementById("Oct_Tf").readOnly=false;}
else if(m==11){document.getElementById("Nov_Amt").readOnly=false; document.getElementById("Nov_Tf").readOnly=false;}
else if(m==12){document.getElementById("Dec_Amt").readOnly=false; document.getElementById("Dec_Tf").readOnly=false;}
}

function AmtCalcu()
{
 var Apr_Amt=parseFloat(document.getElementById("Apr_Amt").value); var May_Amt=parseFloat(document.getElementById("May_Amt").value); 
 var Jun_Amt=parseFloat(document.getElementById("Jun_Amt").value); var Jul_Amt=parseFloat(document.getElementById("Jul_Amt").value);
 var Aug_Amt=parseFloat(document.getElementById("Aug_Amt").value); var Sep_Amt=parseFloat(document.getElementById("Sep_Amt").value);
 var Oct_Amt=parseFloat(document.getElementById("Oct_Amt").value); var Nov_Amt=parseFloat(document.getElementById("Nov_Amt").value);
 var Dec_Amt=parseFloat(document.getElementById("Dec_Amt").value); var Jan_Amt=parseFloat(document.getElementById("Jan_Amt").value);
 var Feb_Amt=parseFloat(document.getElementById("Feb_Amt").value); var Mar_Amt=parseFloat(document.getElementById("Mar_Amt").value);
 var Tot_Amt=parseFloat(document.getElementById("Tot_Amt").value);
 var Apr_Tf=parseFloat(document.getElementById("Apr_Tf").value); var May_Tf=parseFloat(document.getElementById("May_Tf").value); 
 var Jun_Tf=parseFloat(document.getElementById("Jun_Tf").value); var Jul_Tf=parseFloat(document.getElementById("Jul_Tf").value);
 var Aug_Tf=parseFloat(document.getElementById("Aug_Tf").value); var Sep_Tf=parseFloat(document.getElementById("Sep_Tf").value);
 var Oct_Tf=parseFloat(document.getElementById("Oct_Tf").value); var Nov_Tf=parseFloat(document.getElementById("Nov_Tf").value);
 var Dec_Tf=parseFloat(document.getElementById("Dec_Tf").value); var Jan_Tf=parseFloat(document.getElementById("Jan_Tf").value);
 var Feb_Tf=parseFloat(document.getElementById("Feb_Tf").value); var Mar_Tf=parseFloat(document.getElementById("Mar_Tf").value);
 var Tot_Tf=parseFloat(document.getElementById("Tot_Tf").value);
 var Apr_Tb=parseFloat(document.getElementById("Apr_Tb").value); var May_Tb=parseFloat(document.getElementById("May_Tb").value); 
 var Jun_Tb=parseFloat(document.getElementById("Jun_Tb").value); var Jul_Tb=parseFloat(document.getElementById("Jul_Tb").value);
 var Aug_Tb=parseFloat(document.getElementById("Aug_Tb").value); var Sep_Tb=parseFloat(document.getElementById("Sep_Tb").value);
 var Oct_Tb=parseFloat(document.getElementById("Oct_Tb").value); var Nov_Tb=parseFloat(document.getElementById("Nov_Tb").value);
 var Dec_Tb=parseFloat(document.getElementById("Dec_Tb").value); var Jan_Tb=parseFloat(document.getElementById("Jan_Tb").value);
 var Feb_Tb=parseFloat(document.getElementById("Feb_Tb").value); var Mar_Tb=parseFloat(document.getElementById("Mar_Tb").value);
 var Tot_Tb=parseFloat(document.getElementById("Tot_Tb").value);
 var Apr=document.getElementById("Apr_Tb").value=Math.round((Apr_Amt-Apr_Tf)*100)/100;
 var May=document.getElementById("May_Tb").value=Math.round((May_Amt-May_Tf)*100)/100;
 var Jun=document.getElementById("Jun_Tb").value=Math.round((Jun_Amt-Jun_Tf)*100)/100;
 var Jul=document.getElementById("Jul_Tb").value=Math.round((Jul_Amt-Jul_Tf)*100)/100;
 var Aug=document.getElementById("Aug_Tb").value=Math.round((Aug_Amt-Aug_Tf)*100)/100;
 var Sep=document.getElementById("Sep_Tb").value=Math.round((Sep_Amt-Sep_Tf)*100)/100;
 var Oct=document.getElementById("Oct_Tb").value=Math.round((Oct_Amt-Oct_Tf)*100)/100;
 var Nov=document.getElementById("Nov_Tb").value=Math.round((Nov_Amt-Nov_Tf)*100)/100;
 var Dec=document.getElementById("Dec_Tb").value=Math.round((Dec_Amt-Dec_Tf)*100)/100;
 var Jan=document.getElementById("Jan_Tb").value=Math.round((Jan_Amt-Jan_Tf)*100)/100;
 var Feb=document.getElementById("Feb_Tb").value=Math.round((Feb_Amt-Feb_Tf)*100)/100;
 var Mar=document.getElementById("Mar_Tb").value=Math.round((Mar_Amt-Mar_Tf)*100)/100;
 var AmtTotal=document.getElementById("Tot_Amt").value=Math.round((Apr_Amt+May_Amt+Jun_Amt+Jul_Amt+Aug_Amt+Sep_Amt+Oct_Amt+Nov_Amt+Dec_Amt+Jan_Amt+Feb_Amt+Mar_Amt)*100)/100;
 var TfTotal=document.getElementById("Tot_Tf").value=Math.round((Apr_Tf+May_Tf+Jun_Tf+Jul_Tf+Aug_Tf+Sep_Tf+Oct_Tf+Nov_Tf+Dec_Tf+Jan_Tf+Feb_Tf+Mar_Tf)*100)/100;
 TbCalcu();
}
function TfCalcu()
{
var Apr_Amt=parseFloat(document.getElementById("Apr_Amt").value); var May_Amt=parseFloat(document.getElementById("May_Amt").value); 
 var Jun_Amt=parseFloat(document.getElementById("Jun_Amt").value); var Jul_Amt=parseFloat(document.getElementById("Jul_Amt").value);
 var Aug_Amt=parseFloat(document.getElementById("Aug_Amt").value); var Sep_Amt=parseFloat(document.getElementById("Sep_Amt").value);
 var Oct_Amt=parseFloat(document.getElementById("Oct_Amt").value); var Nov_Amt=parseFloat(document.getElementById("Nov_Amt").value);
 var Dec_Amt=parseFloat(document.getElementById("Dec_Amt").value); var Jan_Amt=parseFloat(document.getElementById("Jan_Amt").value);
 var Feb_Amt=parseFloat(document.getElementById("Feb_Amt").value); var Mar_Amt=parseFloat(document.getElementById("Mar_Amt").value);
 var Tot_Amt=parseFloat(document.getElementById("Tot_Amt").value);
 var Apr_Tf=parseFloat(document.getElementById("Apr_Tf").value); var May_Tf=parseFloat(document.getElementById("May_Tf").value); 
 var Jun_Tf=parseFloat(document.getElementById("Jun_Tf").value); var Jul_Tf=parseFloat(document.getElementById("Jul_Tf").value);
 var Aug_Tf=parseFloat(document.getElementById("Aug_Tf").value); var Sep_Tf=parseFloat(document.getElementById("Sep_Tf").value);
 var Oct_Tf=parseFloat(document.getElementById("Oct_Tf").value); var Nov_Tf=parseFloat(document.getElementById("Nov_Tf").value);
 var Dec_Tf=parseFloat(document.getElementById("Dec_Tf").value); var Jan_Tf=parseFloat(document.getElementById("Jan_Tf").value);
 var Feb_Tf=parseFloat(document.getElementById("Feb_Tf").value); var Mar_Tf=parseFloat(document.getElementById("Mar_Tf").value);
 var Tot_Tf=parseFloat(document.getElementById("Tot_Tf").value);
 var Apr_Tb=parseFloat(document.getElementById("Apr_Tb").value); var May_Tb=parseFloat(document.getElementById("May_Tb").value); 
 var Jun_Tb=parseFloat(document.getElementById("Jun_Tb").value); var Jul_Tb=parseFloat(document.getElementById("Jul_Tb").value);
 var Aug_Tb=parseFloat(document.getElementById("Aug_Tb").value); var Sep_Tb=parseFloat(document.getElementById("Sep_Tb").value);
 var Oct_Tb=parseFloat(document.getElementById("Oct_Tb").value); var Nov_Tb=parseFloat(document.getElementById("Nov_Tb").value);
 var Dec_Tb=parseFloat(document.getElementById("Dec_Tb").value); var Jan_Tb=parseFloat(document.getElementById("Jan_Tb").value);
 var Feb_Tb=parseFloat(document.getElementById("Feb_Tb").value); var Mar_Tb=parseFloat(document.getElementById("Mar_Tb").value);
 var Tot_Tb=parseFloat(document.getElementById("Tot_Tb").value);
 var Apr=document.getElementById("Apr_Tb").value=Math.round((Apr_Amt-Apr_Tf)*100)/100;
 var May=document.getElementById("May_Tb").value=Math.round((May_Amt-May_Tf)*100)/100;
 var Jun=document.getElementById("Jun_Tb").value=Math.round((Jun_Amt-Jun_Tf)*100)/100;
 var Jul=document.getElementById("Jul_Tb").value=Math.round((Jul_Amt-Jul_Tf)*100)/100;
 var Aug=document.getElementById("Aug_Tb").value=Math.round((Aug_Amt-Aug_Tf)*100)/100;
 var Sep=document.getElementById("Sep_Tb").value=Math.round((Sep_Amt-Sep_Tf)*100)/100;
 var Oct=document.getElementById("Oct_Tb").value=Math.round((Oct_Amt-Oct_Tf)*100)/100;
 var Nov=document.getElementById("Nov_Tb").value=Math.round((Nov_Amt-Nov_Tf)*100)/100;
 var Dec=document.getElementById("Dec_Tb").value=Math.round((Dec_Amt-Dec_Tf)*100)/100;
 var Jan=document.getElementById("Jan_Tb").value=Math.round((Jan_Amt-Jan_Tf)*100)/100;
 var Feb=document.getElementById("Feb_Tb").value=Math.round((Feb_Amt-Feb_Tf)*100)/100;
 var Mar=document.getElementById("Mar_Tb").value=Math.round((Mar_Amt-Mar_Tf)*100)/100;
 var AmtTotal=document.getElementById("Tot_Amt").value=Math.round((Apr_Amt+May_Amt+Jun_Amt+Jul_Amt+Aug_Amt+Sep_Amt+Oct_Amt+Nov_Amt+Dec_Amt+Jan_Amt+Feb_Amt+Mar_Amt)*100)/100;
 var TfTotal=document.getElementById("Tot_Tf").value=Math.round((Apr_Tf+May_Tf+Jun_Tf+Jul_Tf+Aug_Tf+Sep_Tf+Oct_Tf+Nov_Tf+Dec_Tf+Jan_Tf+Feb_Tf+Mar_Tf)*100)/100;
 TbCalcu();
}
function TbCalcu()
{
 var Apr_Tb=parseFloat(document.getElementById("Apr_Tb").value); var May_Tb=parseFloat(document.getElementById("May_Tb").value); 
 var Jun_Tb=parseFloat(document.getElementById("Jun_Tb").value); var Jul_Tb=parseFloat(document.getElementById("Jul_Tb").value);
 var Aug_Tb=parseFloat(document.getElementById("Aug_Tb").value); var Sep_Tb=parseFloat(document.getElementById("Sep_Tb").value);
 var Oct_Tb=parseFloat(document.getElementById("Oct_Tb").value); var Nov_Tb=parseFloat(document.getElementById("Nov_Tb").value);
 var Dec_Tb=parseFloat(document.getElementById("Dec_Tb").value); var Jan_Tb=parseFloat(document.getElementById("Jan_Tb").value);
 var Feb_Tb=parseFloat(document.getElementById("Feb_Tb").value); var Mar_Tb=parseFloat(document.getElementById("Mar_Tb").value);
 var Tot_Tb=parseFloat(document.getElementById("Tot_Tb").value);
 var TbTotal=document.getElementById("Tot_Tb").value=Math.round((Apr_Tb+May_Tb+Jun_Tb+Jul_Tb+Aug_Tb+Sep_Tb+Oct_Tb+Nov_Tb+Dec_Tb+Jan_Tb+Feb_Tb+Mar_Tb)*100)/100;
}
</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#D9D1E7">	
<?php $sqlE = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DR,Gender,Married,DesigId,DepartmentId FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$_REQUEST['E'], $con);  $ResE = mysql_fetch_assoc($sqlE); 
$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$ResE['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResE['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
if($ResE['DR']=='Y'){$M='Dr.';} elseif($ResE['Gender']=='M'){$M='Mr.';} elseif($ResE['Gender']=='F' AND $ResE['Married']=='Y'){$M='Mrs.';} elseif($ResE['Gender']=='F' AND $ResE['Married']=='N'){$M='Miss.';}  
$Ename=$M.' '.$ResE['Fname'].' '.$ResE['Sname'].' '.$ResE['Lname']; $LEC=strlen($ResE['EmpCode']); 
if($LEC==1){$EC='000'.$ResE['EmpCode'];} if($LEC==2){$EC='00'.$ResE['EmpCode'];} if($LEC==3){$EC='0'.$ResE['EmpCode'];} if($LEC>=4){$EC=$ResE['EmpCode'];}
?>
<table style="vertical-align:top;" width="400" align="center" border="1">
<?php $sql = mysql_query("SELECT * FROM hrm_emplyee_tds_da WHERE EmployeeID=".$_REQUEST['E']." AND YearId=".$_REQUEST['YI'], $con); 
      $res = mysql_fetch_array($sql); ?>
<tr>
<td style="width:400px;">
<form method="post" name="FormDA">
<table border="0">
 <tr>
 <tr>
<td colspan="3" style="font-family:Times New Roman;font-size:14px;width:400px; font-weight:bold;background-color:#BCB198; color:#000;">
&nbsp;<font color="#800000">EC:</font>&nbsp;<?php echo $EC.'&nbsp;&nbsp;&nbsp;<font color="#800000">Name:</font>&nbsp;'.$Ename; ?>
</td>
</tr>
 <td bgcolor="#D9D1E7">
 <table border="1">
 <tr><td colspan="4" align="center" style="font-family:Times New Roman;font-size:12px;width:400px;background-color:#7a6189;color:#FFFFFF;"><b>Daily Allowance</b></td></tr> 
 <tr>
   <td align="center" class="Des" style="background-color:#BCB198;">Month</td>
   <td align="center" class="Amt" style="background-color:#BCB198;">Amount</td>
   <td align="center" class="Amt" style="background-color:#BCB198;">TaxFree</td>
   <td align="center" class="Amt" style="background-color:#BCB198;">Taxable</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;April</td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Apr_Amt" name="Apr_Amt" value="<?php echo intval($res['Apr_Amt']); ?>" onChange="AmtCalcu()" onKeyDown="AmtCalcu()" onClick="AmtCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Apr_Tf" name="Apr_Tf" value="<?php echo intval($res['Apr_TaxFree']); ?>" onChange="TfCalcu()" onKeyDown="TfCalcu()" onClick="TfCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Apr_Tb" name="Apr_Tb" value="<?php echo intval($res['Apr_Taxble']); ?>" onChange="TbCalcu()" onBlur="TbCalcu()" readonly /></td> 
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;May</td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="May_Amt" name="May_Amt" value="<?php echo intval($res['May_Amt']); ?>" onChange="AmtCalcu()" onKeyDown="AmtCalcu()" onClick="AmtCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="May_Tf" name="May_Tf" value="<?php echo intval($res['May_TaxFree']); ?>" onChange="TfCalcu()" onKeyDown="TfCalcu()" onClick="TfCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="May_Tb" name="May_Tb" value="<?php echo intval($res['May_Taxble']); ?>" onChange="TbCalcu()" onBlur="TbCalcu()" readonly /></td> 
 </tr>
 <tr>
  <td class="Des" style="background-color:#FFFFFF;">&nbsp;Jun</td>
  <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Jun_Amt" name="Jun_Amt" value="<?php echo intval($res['Jun_Amt']); ?>" onChange="AmtCalcu()" onKeyDown="AmtCalcu()" onClick="AmtCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Jun_Tf" name="Jun_Tf" value="<?php echo intval($res['Jun_TaxFree']); ?>" onChange="TfCalcu()" onKeyDown="TfCalcu()" onClick="TfCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Jun_Tb" name="Jun_Tb" value="<?php echo intval($res['Jun_Taxble']); ?>" onChange="TbCalcu()" onBlur="TbCalcu()" readonly /></td> 
 </tr>
 <tr>
  <td class="Des" style="background-color:#FFFFFF;">&nbsp;July</td>
  <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Jul_Amt" name="Jul_Amt" value="<?php echo intval($res['Jul_Amt']); ?>" onChange="AmtCalcu()" onKeyDown="AmtCalcu()" onClick="AmtCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Jul_Tf" name="Jul_Tf" value="<?php echo intval($res['Jul_TaxFree']); ?>" onChange="TfCalcu()" onKeyDown="TfCalcu()" onClick="TfCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Jul_Tb" name="Jul_Tb" value="<?php echo intval($res['Jul_Taxble']); ?>" onChange="TbCalcu()" onBlur="TbCalcu()" readonly /></td>
 </tr>
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;August</td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Aug_Amt" name="Aug_Amt" value="<?php echo intval($res['Aug_Amt']); ?>" onChange="AmtCalcu()" onKeyDown="AmtCalcu()" onClick="AmtCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Aug_Tf" name="Aug_Tf" value="<?php echo intval($res['Aug_TaxFree']); ?>" onChange="TfCalcu()" onKeyDown="TfCalcu()" onClick="TfCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Aug_Tb" name="Aug_Tb" value="<?php echo intval($res['Aug_Taxble']); ?>" onChange="TbCalcu()" onBlur="TbCalcu()" readonly /></td>  
 </tr>
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;September</td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Sep_Amt" name="Sep_Amt" value="<?php echo intval($res['Sep_Amt']); ?>" onChange="AmtCalcu()" onKeyDown="AmtCalcu()" onClick="AmtCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Sep_Tf" name="Sep_Tf" value="<?php echo intval($res['Sep_TaxFree']); ?>" onChange="TfCalcu()" onKeyDown="TfCalcu()" onClick="TfCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Sep_Tb" name="Sep_Tb" value="<?php echo intval($res['Sep_Taxble']); ?>" onChange="TbCalcu()" onBlur="TbCalcu()" readonly /></td> 
 </tr>
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;October</td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Oct_Amt" name="Oct_Amt" value="<?php echo intval($res['Oct_Amt']); ?>" onChange="AmtCalcu()" onKeyDown="AmtCalcu()" onClick="AmtCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Oct_Tf" name="Oct_Tf" value="<?php echo intval($res['Oct_TaxFree']); ?>" onChange="TfCalcu()" onKeyDown="TfCalcu()" onClick="TfCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Oct_Tb" name="Oct_Tb" value="<?php echo intval($res['Oct_Taxble']); ?>" onChange="TbCalcu()" onBlur="TbCalcu()" readonly /></td> 
 </tr>
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;November</td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Nov_Amt" name="Nov_Amt" value="<?php echo intval($res['Nov_Amt']); ?>" onChange="AmtCalcu()" onKeyDown="AmtCalcu()" onClick="AmtCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Nov_Tf" name="Nov_Tf" value="<?php echo intval($res['Nov_TaxFree']); ?>" onChange="TfCalcu()" onKeyDown="TfCalcu()" onClick="TfCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Nov_Tb" name="Nov_Tb" value="<?php echo intval($res['Nov_Taxble']); ?>" onChange="TbCalcu()" onBlur="TbCalcu()" readonly /></td> 
 </tr>
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;December</td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Dec_Amt" name="Dec_Amt" value="<?php echo intval($res['Dec_Amt']); ?>" onChange="AmtCalcu()" onKeyDown="AmtCalcu()" onClick="AmtCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Dec_Tf" name="Dec_Tf" value="<?php echo intval($res['Dec_TaxFree']); ?>" onChange="TfCalcu()" onKeyDown="TfCalcu()" onClick="TfCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Dec_Tb" name="Dec_Tb" value="<?php echo intval($res['Dec_Taxble']); ?>" onChange="TbCalcu()" onBlur="TbCalcu()" readonly /></td> 
 </tr>
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;January</td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Jan_Amt" name="Jan_Amt" value="<?php echo intval($res['Jan_Amt']); ?>" onChange="AmtCalcu()" onKeyDown="AmtCalcu()" onClick="AmtCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Jan_Tf" name="Jan_Tf" value="<?php echo intval($res['Jan_TaxFree']); ?>" onChange="TfCalcu()" onKeyDown="TfCalcu()" onClick="TfCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Jan_Tb" name="Jan_Tb" value="<?php echo intval($res['Jan_Taxble']); ?>" onChange="TbCalcu()" onBlur="TbCalcu()" readonly /></td> 
 </tr>
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;February</td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Feb_Amt" name="Feb_Amt" value="<?php echo intval($res['Feb_Amt']); ?>" onChange="AmtCalcu()" onKeyDown="AmtCalcu()" onClick="AmtCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Feb_Tf" name="Feb_Tf" value="<?php echo intval($res['Feb_TaxFree']); ?>" onChange="TfCalcu()" onKeyDown="TfCalcu()" onClick="TfCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Feb_Tb" name="Feb_Tb" value="<?php echo intval($res['Feb_Taxble']); ?>" onChange="TbCalcu()" onBlur="TbCalcu()" readonly /></td> 
 </tr>
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;March</td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Mar_Amt" name="Mar_Amt" value="<?php echo intval($res['Mar_Amt']); ?>" onChange="AmtCalcu()" onKeyDown="AmtCalcu()" onClick="AmtCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Mar_Tf" name="Mar_Tf" value="<?php echo intval($res['Mar_TaxFree']); ?>" onChange="TfCalcu()" onKeyDown="TfCalcu()" onClick="TfCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Mar_Tb" name="Mar_Tb" value="<?php echo intval($res['Mar_Taxble']); ?>" onChange="TbCalcu()" onBlur="TbCalcu()" readonly /></td> 
 </tr>
 <tr>
   <td class="Des" align="right" style="background-color:#BCB198;">&nbsp;Total&nbsp;</td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Tot_Amt" name="Tot_Amt" value="<?php echo intval($res['Tot_Amt']); ?>" onChange="AmtCalcu()" onKeyDown="AmtCalcu()" onClick="AmtCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Tot_Tf" name="Tot_Tf" value="<?php echo intval($res['Tot_TaxFree']); ?>" onChange="TfCalcu()" onKeyDown="TfCalcu()" onClick="TfCalcu()" readonly /></td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:75px; border-style:hidden;" id="Tot_Tb" name="Tot_Tb" value="<?php echo intval($res['Tot_Taxble']); ?>" onChange="TbCalcu()" onBlur="TbCalcu()" readonly /></td> 
   <input type="hidden" name="E" value="<?php echo $_REQUEST['E']; ?>" /><input type="hidden" name="C" value="<?php echo $_REQUEST['C']; ?>" />
   <input type="hidden" name="YI" value="<?php echo $_REQUEST['YI']; ?>" /><input type="hidden" name="U" value="<?php echo $_REQUEST['U']; ?>" />
   <input type="hidden" name="M" value="<?php echo $_REQUEST['M']; ?>" /><input type="hidden" name="Y" value="<?php echo $_REQUEST['Y']; ?>" />
   </td> 
 </tr>
 <tr bgcolor="#7a6189">
   <td align="right" colspan="4">
    <table>
	 <tr>
	 <td style="font-family:Times New Roman;font-size:12px; font-weight:bold; color:#FFFFFF;"><?php echo $msg; ?>&nbsp;</td>
	 <td align="right"><input type="button" name="Change" id="Change" style="width:80px;" value="edit" onClick="EditAOI(<?php echo $_REQUEST['M']; ?>)">
					   <input type="submit" name="Save" id="Save" value="save" style="display:none;width:80px;"></td>
	 <td align="right" style="width:90px;"><input type="button" name="Refresh" id="Refresh" style="width:90px;" value="refresh" onClick="javascript:window.location='EmpEditDA.php?E=<?php echo $_REQUEST['E']; ?>&C=<?php echo $_REQUEST['C']; ?>&YI=<?php echo $_REQUEST['YI']; ?>&U=<?php echo $_REQUEST['U']; ?>&M=<?php echo $_REQUEST['M']; ?>&Y=<?php echo $_REQUEST['Y']; ?>'"/> </td>				   
	</tr>
	</table>
	</td>
	</tr>
 </table>
 </form>
 </td>
 </tr>
</table>
</td>
</tr>
</table>
</body>
</html>