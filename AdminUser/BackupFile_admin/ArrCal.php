<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}

if(isset($_POST['sende']))
{ 
 $SelEmp= $_POST['SelEmp']; 
 if( is_array($SelEmp))
 {
  while (list ($key, $val) = each ($SelEmp))
  { 
   $schk=mysql_query("select EmployeeID from hrm_employee_arrearsel where EmployeeID=".$val." AND Month=".$_POST['m3']." AND Year=".$_POST['y3'], $con); $row=mysql_num_rows($schk);
   if($row==0){ $sql=mysql_query("insert into hrm_employee_arrearsel(EmployeeID, Month, Year, cBy, cDate) values(".$val.", ".$_POST['m3'].", ".$_POST['y3'].", ".$_POST['uid'].", '".date("Y-m-d")."')", $con); 
    if($sql)
    {
	 header('location:ArrCal.php?act=cal&c='.$_POST["cid"].'&y='.$_POST["yid"].'&m1='.$_POST["m1"].'&m2='.$_POST["m2"].'&m3='.$_POST["m3"].'&y1='.$_POST["y1"].'&y2='.$_POST["y2"].'&y3='.$_POST["y3"].'&chk='.$_POST["checkv"].'&uid='.$_POST["uid"].'&dept='.$_POST['dept'].'');
    } 
   }
  }
 } 
}

if(isset($_POST['deletev']))
{ 
 $SelEmp2=$_POST['SelEmp2']; 
 if(is_array($SelEmp2))
 { 
  while(list($key,$val)= each($SelEmp2))
  {
    $sql=mysql_query("delete from hrm_employee_arrearsel where EmployeeID=".$val." AND Month=".$_POST['m3']." AND Year=".$_POST['y3'], $con);
	if($sql)
    {
	 header('location:ArrCal.php?act=cal&c='.$_POST["cid"].'&y='.$_POST["yid"].'&m1='.$_POST["m1"].'&m2='.$_POST["m2"].'&m3='.$_POST["m3"].'&y1='.$_POST["y1"].'&y2='.$_POST["y2"].'&y3='.$_POST["y3"].'&chk='.$_POST["checkv"].'&uid='.$_POST["uid"].'&dept='.$_POST['dept'].'');
    } 
  }
 } 
}

if(isset($_POST['Processv']))
{  

 $SqlStat=mysql_query("select Pf_MaxSalPf from hrm_company_statutory_pf where CompanyId=".$_POST["cid"], $con); $ResStat=mysql_fetch_assoc($SqlStat); $MaxPf=$ResStat['Pf_MaxSalPf']; $WorkDay=26; 
 
 $SelEmp2= $_POST['SelEmp2']; 
 if(is_array($SelEmp2))
 { 
  while(list ($key,$val) = each ($SelEmp2))
  { 
    $EC=mysql_query("select EmpCode from hrm_employee where EmployeeID=".$val." AND CompanyId=".$_POST["cid"],$con); $rEC=mysql_fetch_assoc($EC);
	
	$Mx=mysql_query("select MAX(AppHistoryId) as MxId from hrm_pms_appraisal_history where EmpCode=".$rEC['EmpCode']." AND TotalProp_GSPM>Previous_GrossSalaryPM AND Previous_GrossSalaryPM!=0 AND CompanyId=".$_POST["cid"],$con); 
	$rMx=mysql_fetch_assoc($Mx);
	$Sl=mysql_query("select Previous_GrossSalaryPM,TotalProp_GSPM from hrm_pms_appraisal_history where AppHistoryId=".$rMx['MxId']." AND EmpCode=".$rEC['EmpCode']." AND CompanyId=".$_POST["cid"],$con); 
	$rSl=mysql_fetch_assoc($Sl);
	
/**************/
$x1=mysql_query("select MAX(CtcId) as Id1 from hrm_employee_ctc where Tot_GrossMonth=".$rSl['Previous_GrossSalaryPM']." AND EmployeeID=".$val,$con); $rx1=mysql_fetch_assoc($x1);
$x1v=mysql_query("select BAS_Value,CONV_Value,HRA_Value,SPECIAL_ALL_Value,ESCI from hrm_employee_ctc where CtcId=".$rx1['Id1']." AND EmployeeID=".$val,$con); $rx1v=mysql_fetch_assoc($x1v);
$x2=mysql_query("select MAX(CtcId) as Id1 from hrm_employee_ctc where Tot_GrossMonth=".$rSl['TotalProp_GSPM']." AND EmployeeID=".$val,$con); $rx2=mysql_fetch_assoc($x2);
$x2v=mysql_query("select BAS_Value,CONV_Value,HRA_Value,SPECIAL_ALL_Value,ESCI from hrm_employee_ctc where CtcId=".$rx2['Id1']." AND EmployeeID=".$val,$con); $rx2v=mysql_fetch_assoc($x2v);

$Diff_Bas=$rx2v['BAS_Value']-$rx1v['BAS_Value']; $Diff_Con=$rx2v['CONV_Value']-$rx1v['CONV_Value'];
$Diff_Hra=$rx2v['HRA_Value']-$rx1v['HRA_Value']; $Diff_Spl=$rx2v['SPECIAL_ALL_Value']-$rx1v['SPECIAL_ALL_Value'];
/**************/
	
/*******************/
    $DMx=mysql_query("select MonthlyPaySlipId from hrm_employee_monthlypayslip where EmployeeID=".$val." AND Year=".$_POST['y1']." AND Month=".$_POST['m1'],$con); $rDMx=mysql_fetch_assoc($DMx);
	$DMx2=mysql_query("select MonthlyPaySlipId from hrm_employee_monthlypayslip where EmployeeID=".$val." AND Year=".$_POST['y2']." AND Month=".$_POST['m2'],$con); $rDMx2=mysql_fetch_assoc($DMx2); 
	
	if($rDMx>0 AND $rDMx2>0)
	{ $PDay=mysql_query("select SUM(PaidDay) as PaidD,SUM(EPF_Employee) as Epf from hrm_employee_monthlypayslip where MonthlyPaySlipId>=".$rDMx['MonthlyPaySlipId']." AND MonthlyPaySlipId<=".$rDMx2['MonthlyPaySlipId']." AND EmployeeID=".$val,$con); $rPDay=mysql_fetch_assoc($PDay); $PaidDay=$rPDay['PaidD']; }
	elseif($rDMx>0 AND $rDMx2=='')
	{$PDay=mysql_query("select SUM(PaidDay) as PaidD,SUM(EPF_Employee) as Epf from hrm_employee_monthlypayslip where MonthlyPaySlipId>=".$rDMx['MonthlyPaySlipId']." AND EmployeeID=".$val." AND EmployeeID=".$val,$con); $rPDay=mysql_fetch_assoc($PDay); $PaidDay=$rPDay['PaidD']; }
	else{$PaidDay=0;}
/*******************/

	if($Diff_Bas>0){$OneDBas=$Diff_Bas/$WorkDay; $Basic=round($OneDBas*$PaidDay);}else{$Basic=0;}
	if($Diff_Con>0){$OneDCon=$Diff_Con/$WorkDay; $Conv=round($OneDCon*$PaidDay);}else{$Conv=0;}
	if($Diff_Hra>0){$OneDHra=$Diff_Hra/$WorkDay; $Hra=round($OneDHra*$PaidDay);}else{$Hra=0;}
	if($Diff_Spl>0){$OneDSpl=$Diff_Spl/$WorkDay; $Spl=round($OneDSpl*$PaidDay);}else{$Spl=0;}
	$TotGross=$Basic+$Conv+$Hra+$Spl;
	
	$Cal_Pf=round(($Basic*12)/100);
	if($rx2v['ESCI']>0){$ESIC=round(($TotGross*1.75)/100);}else{$ESIC=0;}
        //if($rx1v['ESCI']>0){$ESIC=ceil(($TotGross*1.75)/100);}else{$ESIC=0;}
	
	if($rx1v['BAS_Value']<$MaxPf)
	{
	 if($rx2v['BAS_Value']<$MaxPf){ $PF=$Cal_Pf; }
	 if($rx2v['BAS_Value']>=$MaxPf)
	 { 
	   //No Of Month
	   $d1 = strtotime($_POST['y1'].'-'.$_POST['m1'].'-01'); 
	   $d2 = strtotime($_POST['y2'].'-'.$_POST['m2'].'-01');
       $min_date = min($d1,$d2); $max_date = max($d1,$d2); $i = 1; //$i=0
       while(($min_date = strtotime("+1 MONTH", $min_date))<= $max_date){$i++;} $m=$i; $TotMxPf=$MaxPf*$m;
	   
           $TotCal_Pf=$rPDay['Epf']+$Cal_Pf; 
	   $Maxc_Pf=round(($TotMxPf*12)/100);
	   if($TotCal_Pf<=$Maxc_Pf){ $PF=$Cal_Pf; }
	   elseif($TotCal_Pf>$Maxc_Pf){ $Diff_pf=$TotCal_Pf-$Maxc_Pf; $PF=$Cal_Pf-$Diff_pf; }
	   else{ $PF=0; } 

           /*
	   $TotCal_Pf=$rPDay['Epf']+$Cal_Pf;
	   if($TotCal_Pf<=$TotMxPf){ $PF=$Cal_Pf; }
	   elseif($TotCal_Pf>$TotMxPf){ $Diff_pf=$TotCal_Pf-$TotMxPf; $PF=$Cal_Pf-$Diff_pf; }
	   else{ $PF=0; }
           */
	 }
	}
	else{ $PF=0; }
	
    $Deduct=$ESIC+$PF;
	$Net_Gross=$TotGross-$Deduct;
	
	$sE=mysql_query("update hrm_employee_arrearsel set Fdate='".$_POST['y1']."-".$_POST['m1']."-01', Tdate='".$_POST['y2']."-".$_POST['m2']."-01', PayPaidD=".$PaidDay.", Obas=".$rx1v['BAS_Value'].", Nbas=".$rx2v['BAS_Value'].", Dbas=".$Diff_Bas.", Arrbas=".$Basic.", Ohra=".$rx1v['HRA_Value'].", Nhra=".$rx2v['HRA_Value'].", Dhra=".$Diff_Hra.", Arrhra=".$Hra.", Ospl=".$rx1v['SPECIAL_ALL_Value'].", Nspl=".$rx2v['SPECIAL_ALL_Value'].", Dspl=".$Diff_Spl.", Arrspl=".$Spl.", Ocon=".$rx1v['CONV_Value'].", Ncon=".$rx2v['CONV_Value'].", Dcon=".$Diff_Con.", Arrcon=".$Conv.", Pf=".$PF.", Esic=".$ESIC." where EmployeeID=".$val." AND Month=".$_POST['m3']." AND Year=".$_POST['y3'],$con); 
	
	$cx=mysql_query("select MonthlyPaySlipId from hrm_employee_monthlypayslip where EmployeeID=".$val." AND Year=".$_POST['y3']." AND Month=".$_POST['m3'],$con); $rowcx=mysql_fetch_assoc($cx);
	if($rowcx>0){$sEPay=mysql_query("update hrm_employee_monthlypayslip set Arr_Basic=".$Basic.", Arr_Hra=".$Hra.", Arr_Spl=".$Spl.", Arr_Conv=".$Conv.", Arr_Pf=".$PF.", Arr_Esic=".$ESIC." where EmployeeID=".$val." AND Month=".$_POST['m3']." AND Year=".$_POST['y3'],$con);}
	elseif($rowcx==0){$sEPay=mysql_query("insert into hrm_employee_monthlypayslip(EmployeeID, Month, Year, Arr_Basic, Arr_Hra, Arr_Conv, Arr_Pf, Arr_Esic) values(".$val.", ".$_POST['m3'].", ".$_POST['y3'].", ".$Basic.", ".$Hra.", ".$Spl.", ".$Conv.", ".$PF.", ".$ESIC.")",$con);}
		 
	 	
  }
 
  
 } 
 
}

 


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#000; font-family:Times New Roman;font-size:15px; width:200px;} .font1 { font-family:Times New Roman; font-size:12px; height:14px; width:200px; } 
.font2{color:#fff;background-color:#006AD5;font-family:Times New Roman;font-size:12px;height:20px;text-align:center;} 
.font3{color:#000;background-color:#FFFFFF;font-family:Georgia;font-size:11px;}
.font4{color:#000;background-color:#C6FF8C;font-family:Georgia;font-size:11px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<title>Arrear Calculation</title>
<script type="text/javascript" language="javascript">
function CheckFun()
{ if(document.getElementById("chkokym").checked==true){ document.getElementById("checkv").value=1; document.getElementById("SelEmp").disabled=false; document.getElementById("sende").disabled=false; document.getElementById("SelEmp2").disabled=false; document.getElementById("deletev").disabled=false; document.getElementById("dept").disabled=false; }
  else if(document.getElementById("chkokym").checked==false){ document.getElementById("checkv").value=0; document.getElementById("SelEmp").disabled=true; document.getElementById("sende").disabled=true; document.getElementById("SelEmp2").disabled=true; document.getElementById("deletev").disabled=true; document.getElementById("dept").disabled=true; }
}

function FunM3(c,y,m1,m2,m3,y1,y2,y3,chk,uid,dept)
{ var chkn=document.getElementById("checkv").value; window.location="ArrCal.php?act=cal&c="+c+"&y="+y+"&m1="+m1+"&m2="+m2+"&m3="+m3+"&y1="+y1+"&y2="+y2+"&y3="+y3+"&chk="+chkn+"&uid="+uid+"&dept="+dept;
}

function FunY3(c,y,m1,m2,m3,y1,y2,y3,chk,uid,dept)
{ var chkn=document.getElementById("checkv").value; window.location="ArrCal.php?act=cal&c="+c+"&y="+y+"&m1="+m1+"&m2="+m2+"&m3="+m3+"&y1="+y1+"&y2="+y2+"&y3="+y3+"&chk="+chkn+"&uid="+uid+"&dept="+dept;}

function FunDept(dept,c,y,m1,m2,m3,y1,y2,y3,chk,uid)
{ var chkn=document.getElementById("checkv").value; window.location="ArrCal.php?act=cal&c="+c+"&y="+y+"&m1="+m1+"&m2="+m2+"&m3="+m3+"&y1="+y1+"&y2="+y2+"&y3="+y3+"&chk="+chkn+"&uid="+uid+"&dept="+dept;
}

function validate(formn)
{ var agree=confirm("Are you sure?"); if(agree){return true;}else{return false;} }

function listbox_selectall(listID, isSelect) 
{
 var listbox = document.getElementById(listID);
 for(var count=0; count < listbox.options.length; count++) 
 { listbox.options[count].selected = isSelect; }
}

function CheckList(v)
{ 
 if(v==1)
 {
  if(document.getElementById("chkList").checked==true)
  { listbox_selectall('SelEmp2', true); document.getElementById("Processv").disabled=false; }
  else if(document.getElementById("chkList").checked==false)
  { listbox_selectall('SelEmp2', false); document.getElementById("Processv").disabled=true; } 
 }
 else if(v==2){document.getElementById("Processv").disabled=false;}
}

</script>
</head>
<body class="body">
<center>
<b class="font" style="font-size:18px;"><u>Arrear Calculation</u></b><br />
<form name="formn"  method="post" onsubmit="return validate(this)">
<table border="0" style="margin-top:5px;width:100%;" align="center">
<?php $m1 = DateTime::createFromFormat('!m', $_REQUEST['m1']);
      $m2 = DateTime::createFromFormat('!m', $_REQUEST['m2']);
	  $m3 = DateTime::createFromFormat('!m', $_REQUEST['m3']);
?>
<input type="hidden" name="uid" value="<?php echo $_REQUEST['uid']; ?>" />
<input type="hidden" name="cid" value="<?php echo $_REQUEST['c']; ?>" />
<input type="hidden" name="yid" value="<?php echo $_REQUEST['y']; ?>" />
 <tr>
  <td colspan="10" valign="top">
   <table border="0" style="width:100%;">
    <tr>
	 <td colspan="2" class="font" style="width:100%;background-color:#4AA5FF;"></td>
	</tr>
   </table>
  </td>
 </tr>
 <tr><td colspan="10" style="width:10px;"></td></tr>
 <tr>
  <td style="width:120px;">&nbsp;</td>
  <td class="font" style="width:130px;"><b>Calculation:</b></td>
  <td class="font" style="width:50px;" align="right"><b>From</b></td>
  <td class="font" style="width:100px;" align="center"><select name="m1" style="width:100px;">
<option value="<?php echo $_REQUEST['m1']; ?>">&nbsp;<?php echo $m1->format('F'); ?></option>
  <?php for($i=1;$i<=12;$i++){ if($i!=$_REQUEST['m1']){ ?><option value="<?php echo $i; ?>">&nbsp;<?php if($i==1){$m='January';}elseif($i==2){$m='February';}elseif($i==3){$m='March';}elseif($i==4){$m='April';}elseif($i==5){$m='May';}elseif($i==6){$m='June';}elseif($i==7){$m='July';}elseif($i==8){$m='August';}elseif($i==9){$m='September';}elseif($i==10){$m='October';}elseif($i==11){$m='November';}elseif($i==12){$m='December';}echo $m; ?></option><?php } } ?>
  </select></td>
  <td class="font" style="width:100px;" align="center"><select name="y1" style="width:100px;">
  <option value="<?php echo $_REQUEST['y1']; ?>">&nbsp;<?php echo $_REQUEST['y1']; ?></option>
  <?php for($i=2015;$i<=date("Y")+1;$i++){ if($i!=$_REQUEST['y1']){ ?>
  <option value="<?php echo $i; ?>">&nbsp;<?php echo $i; ?></option><?php } } ?>
  </select></td>
  <td style="width:10px;">&nbsp;</td>
  <td class="font" style="width:50px;" align="right"><b>To</b></td>
  <td class="font" style="width:100px;" align="center"><select name="m2" style="width:100px;">
<option value="<?php echo $_REQUEST['m2']; ?>">&nbsp;<?php echo $m2->format('F'); ?></option>
  <?php for($i=1;$i<=12;$i++){ if($i!=$_REQUEST['m2']){ ?><option value="<?php echo $i; ?>">&nbsp;<?php if($i==1){$m='January';}elseif($i==2){$m='February';}elseif($i==3){$m='March';}elseif($i==4){$m='April';}elseif($i==5){$m='May';}elseif($i==6){$m='June';}elseif($i==7){$m='July';}elseif($i==8){$m='August';}elseif($i==9){$m='September';}elseif($i==10){$m='October';}elseif($i==11){$m='November';}elseif($i==12){$m='December';}echo $m; ?></option><?php } } ?>
  </select></td>
  <td class="font" style="width:100px;" align="center"><select name="y2" style="width:100px;">
  <option value="<?php echo $_REQUEST['y2']; ?>">&nbsp;<?php echo $_REQUEST['y2']; ?></option>
  <?php for($i=2015;$i<=date("Y")+1;$i++){ if($i!=$_REQUEST['y2']){ ?>
  <option value="<?php echo $i; ?>">&nbsp;<?php echo $i; ?></option><?php } } ?>
  </select></td>
  <td style="width:120px;">&nbsp;</td>
 </tr>
 <tr>
  <td style="width:120px;">&nbsp;</td>
  <td class="font" style="width:180px;" colspan="2"><b>Add For Payslip :</b></td>
  <td class="font" style="width:100px;" align="center"><select name="m3" style="width:100px;background-color:#CBFF97;" onchange="FunM3(<?php echo $_REQUEST['c'].','.$_REQUEST['y'].','.$_REQUEST['m1'].','.$_REQUEST['m2'];?>,this.value,<?php echo $_REQUEST['y1'].','.$_REQUEST['y2'].','.$_REQUEST['y2'].','.$_REQUEST['chk'].','.$_REQUEST['uid'].','.$_REQUEST['dept']; ?>)">
<option value="<?php echo $_REQUEST['m3']; ?>">&nbsp;<?php echo $m3->format('F'); ?></option>
  <?php for($i=1;$i<=12;$i++){ if($i!=$_REQUEST['m3']){ ?><option value="<?php echo $i; ?>">&nbsp;<?php if($i==1){$m='January';}elseif($i==2){$m='February';}elseif($i==3){$m='March';}elseif($i==4){$m='April';}elseif($i==5){$m='May';}elseif($i==6){$m='June';}elseif($i==7){$m='July';}elseif($i==8){$m='August';}elseif($i==9){$m='September';}elseif($i==10){$m='October';}elseif($i==11){$m='November';}elseif($i==12){$m='December';}echo $m; ?></option><?php } } ?>
  </select></td>
  <td class="font" style="width:100px;" align="center"><select name="y3" style="width:100px;background-color:#CBFF97;" onchange="FunY3(<?php echo $_REQUEST['c'].','.$_REQUEST['y'].','.$_REQUEST['m1'].','.$_REQUEST['m2'].','.$_REQUEST['m3'].','.$_REQUEST['y1'].','.$_REQUEST['y2']; ?>,this.value,<?php echo $_REQUEST['chk'].','.$_REQUEST['uid'].','.$_REQUEST['dept']; ?>)">
  <option value="<?php echo $_REQUEST['y3']; ?>">&nbsp;<?php echo $_REQUEST['y3']; ?></option>
  <?php for($i=2015;$i<=date("Y")+1;$i++){ if($i!=$_REQUEST['y3']){ ?>
  <option value="<?php echo $i; ?>">&nbsp;<?php echo $i; ?></option><?php } } ?>
  </select></td>
  <td style="width:10px;">&nbsp;</td> 
  <td colspan="2" class="font" style="width:100px;" align="right"><b>All Setting Ok:</b></td>
  <td style="width:100px;"><input type="checkbox" value="Okym" id="chkokym" onclick="CheckFun()" <?php if($_REQUEST['chk']==1){echo 'checked';} ?>/><input type="hidden" name="checkv" id="checkv" value="<?php echo $_REQUEST['chk']; ?>" /></td>
  <td style="width:120px;">&nbsp;</td>
 </tr>
 
 <tr><td colspan="10" style="height:10px;"></td></tr>
 <tr>
  <td colspan="10" align="center"> 
   <table border="0">
    <tr>
    <td class="font" style="width:360px;" align="center">
	 <select style="font-size:12px;width:150px;background-color:#CBFF97;" name="dept" id="dept" onChange="FunDept(this.value,<?php echo $_REQUEST['c'].','.$_REQUEST['y'].','.$_REQUEST['m1'].','.$_REQUEST['m2'].','.$_REQUEST['m3'].','.$_REQUEST['y1'].','.$_REQUEST['y2'].','.$_REQUEST['y3'].','.$_REQUEST['chk'].','.$_REQUEST['uid']; ?>)" <?php if($_REQUEST['chk']!=1){ echo 'disabled'; } ?>>
<?php if($_REQUEST['dept']==0){ echo '<option value="0" selected>&nbsp;All Department</option>'; } else { $sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['dept'], $con); $resD=mysql_fetch_assoc($sqlD); echo '<option value="'.$_REQUEST['dept'].'" selected>&nbsp;'.$resD['DepartmentName'].'</option>'; }
 $sqlD2=mysql_query("select * from hrm_department where CompanyId=".$_REQUEST['c']." AND DeptStatus='A' AND DepartmentId!=".$_REQUEST['dept']." order by DepartmentName ASC", $con); while($resD2=mysql_fetch_array($sqlD2)){ echo '<option value="'.$resD2['DepartmentId'].'">&nbsp;'.$resD2['DepartmentName'].'</option>'; } echo '<option value="0">&nbsp;All Department</option></select>'; ?>
	   <br />
	<select id="SelEmp" name="SelEmp[]" size="12" style="width:350px;" multiple <?php if($_REQUEST['chk']!=1){ echo 'disabled'; } ?>>
<?php if($_REQUEST['dept']==0){$sE=mysql_query("select he.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentCode from hrm_employee he inner join hrm_employee_general heg on he.EmployeeID=heg.EmployeeID inner join hrm_department hd on heg.DepartmentId=hd.DepartmentId where he.EmpStatus='A' AND he.CompanyId=".$_REQUEST['c']." order by he.EmpCode asc, hd.DepartmentCode ASC",$con); }
else{$sE=mysql_query("select he.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentCode from hrm_employee he inner join hrm_employee_general heg on he.EmployeeID=heg.EmployeeID inner join hrm_department hd on heg.DepartmentId=hd.DepartmentId where he.EmpStatus='A' AND he.CompanyId=".$_REQUEST['c']." AND heg.DepartmentId=".$_REQUEST['dept']." order by he.EmpCode asc, hd.DepartmentCode ASC",$con);}

while($rE=mysql_fetch_assoc($sE)){ $LEC=strlen($rE['EmpCode']); 
      if($LEC==1){$EC='000'.$rE['EmpCode'];} if($LEC==2){$EC='00'.$rE['EmpCode'];} if($LEC==3){$EC='0'.$rE['EmpCode'];} if($LEC>=4){$EC=$rE['EmpCode'];} ?><option value="<?php echo $rE['EmployeeID']; ?>">&nbsp;<?php echo $EC.' - '.$rE['Fname'].' '.$rE['Sname'].' '.$rE['Lname'].' ('.$rE['DepartmentCode'].')';  ?></option><?php } ?>	
	 </select></td>
	 
	 <td valign="middle" style="width:100px;">
	 <input type="button" value="Refresh" class="font" style="width:100px;font-weight:bold;" onClick="javascript:window.location='ArrCal.php?act=cal&c=<?php echo $_REQUEST['c']; ?>&y=<?php echo $_REQUEST['y']; ?>&m1=<?php echo $_REQUEST['m1']; ?>&m2=<?php echo $_REQUEST['m2']; ?>&m3=<?php echo $_REQUEST['m3']; ?>&y1=<?php echo $_REQUEST['y1']; ?>&y2=<?php echo $_REQUEST['y2']; ?>&y3=<?php echo $_REQUEST['y3']; ?>&chk=<?php echo $_REQUEST['chk']; ?>&uid=<?php echo $_REQUEST['uid']; ?>&dept=<?php echo $_REQUEST['dept']; ?>'"/>
	 <br /><br />
	 <input type="submit" id="sende" name="sende" value="Add >>" class="font" style="width:100px;font-weight:bold;" <?php if($_REQUEST['chk']!=1){ echo 'disabled'; } ?>/>
	 <br /><br />
	 <input type="submit" id="deletev" name="deletev" value="<< Delete" class="font" style="width:100px;font-weight:bold;" <?php if($_REQUEST['chk']!=1){ echo 'disabled'; } ?>/>
	 <br /><br />
<?php $sE2=mysql_query("select hes.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentCode from hrm_employee_arrearsel hes inner join hrm_employee he on hes.EmployeeID=he.EmployeeID inner join hrm_employee_general heg on he.EmployeeID=heg.EmployeeID inner join hrm_department hd on heg.DepartmentId=hd.DepartmentId where hes.Year=".$_REQUEST['y3']." AND hes.Month=".$_REQUEST['m3']." AND he.EmpStatus='A' AND he.CompanyId=".$_REQUEST['c']." order by he.EmpCode asc, hd.DepartmentCode ASC",$con);  
$rowE2=mysql_num_rows($sE2); ?>		 
     <input type="Submit" id="Processv" name="Processv" value="Process" class="font" style="width:100px;font-weight:bold;" disabled/>
	 </td> 
	 <td class="font" style="width:360px;" align="center"><b>Select All</b>&nbsp;<input type="checkbox" value="chkList" id="chkList" onclick="CheckList(1)" <?php if($rowE2==0){echo 'disabled';} ?> /><br />
	 <select id="SelEmp2" name="SelEmp2[]" size="12" style="width:350px;" multiple <?php if($_REQUEST['chk']!=1){ echo 'disabled'; } ?> onclick="CheckList(2)">
<?php while($rE2=mysql_fetch_assoc($sE2)){ $LEC2=strlen($rE2['EmpCode']); 
      if($LEC2==1){$EC2='000'.$rE2['EmpCode'];} if($LEC2==2){$EC2='00'.$rE2['EmpCode'];} if($LEC2==3){$EC2='0'.$rE2['EmpCode'];} if($LEC2>=4){$EC2=$rE2['EmpCode'];} ?><option value="<?php echo $rE2['EmployeeID']; ?>">&nbsp;<?php echo $EC2.' - '.$rE2['Fname'].' '.$rE2['Sname'].' '.$rE2['Lname'].' ('.$rE2['DepartmentCode'].')';  ?></option><?php } ?>	
	 </select></td>  
    </tr>
   </table>
  </td>
 </tr>
 <tr>
	<td colspan="10" class="font" align="center">
	 <table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
	  <tr>
	    <td rowspan="2" class="font2" style="width:40px;">EC</td>
		<td rowspan="2" class="font2" style="width:40px;">Paid Day</td>
		<td colspan="4" class="font2">Basic</td>
		<td colspan="4" class="font2">Hra</td>
		<td colspan="4" class="font2">Special</td>
		<td colspan="4" class="font2">Conveyance</td>
		<td rowspan="2" class="font2" style="width:50px;">Arr PF</td>
		<td rowspan="2" class="font2" style="width:50px;">Arr ESIC</td>
	  </tr>	  
	  <tr>
		<td class="font2" style="width:50px;">Old</td>
		<td class="font2" style="width:50px;">New</td>
		<td class="font2" style="width:50px;">Diff</td>
		<td class="font2" style="width:50px;">Arr</td>
		<td class="font2" style="width:50px;">Old</td>
		<td class="font2" style="width:50px;">New</td>
		<td class="font2" style="width:50px;">Diff</td>
		<td class="font2" style="width:50px;">Arr</td>
		<td class="font2" style="width:50px;">Old</td>
		<td class="font2" style="width:50px;">New</td>
		<td class="font2" style="width:50px;">Diff</td>
 		<td class="font2" style="width:50px;">Arr</td>
		<td class="font2" style="width:50px;">Old</td>
		<td class="font2" style="width:50px;">New</td>
		<td class="font2" style="width:50px;">Diff</td>
		<td class="font2" style="width:50px;">Arr</td>
	  </tr>  
<?php $sE3=mysql_query("select hes.*,EmpCode from hrm_employee_arrearsel hes inner join hrm_employee he on hes.EmployeeID=he.EmployeeID inner join hrm_employee_general heg on he.EmployeeID=heg.EmployeeID inner join hrm_department hd on heg.DepartmentId=hd.DepartmentId where hes.Year=".$_REQUEST['y3']." AND hes.Month=".$_REQUEST['m3']." AND he.EmpStatus='A' AND he.CompanyId=".$_REQUEST['c']." order by he.EmpCode asc, hd.DepartmentCode ASC",$con); while($rE3=mysql_fetch_assoc($sE3)){ ?>	  
	  <tr>
	    <td class="font3" align="center"><?php echo $rE3['EmpCode']; ?></td>
		<td class="font4" align="center"><?php echo floatval($rE3['PayPaidD']); ?></td>
	
		<td class="font3" align="right"><?php if($rE3['Obas']!=0){echo floatval($rE3['Obas']);} ?>&nbsp;</td>
		<td class="font3" align="right"><?php if($rE3['Nbas']!=0){echo floatval($rE3['Nbas']);} ?>&nbsp;</td>
		<td class="font3" align="right"><?php if($rE3['Dbas']!=0){echo floatval($rE3['Dbas']);} ?>&nbsp;</td>
		<td class="font4" align="right"><?php if($rE3['Arrbas']!=0){echo floatval($rE3['Arrbas']);} ?>&nbsp;</td>
		
		<td class="font3" align="right"><?php if($rE3['Ohra']!=0){echo floatval($rE3['Ohra']);} ?>&nbsp;</td>
		<td class="font3" align="right"><?php if($rE3['Nhra']!=0){echo floatval($rE3['Nhra']);} ?>&nbsp;</td>
		<td class="font3" align="right"><?php if($rE3['Dhra']!=0){echo floatval($rE3['Dhra']);} ?>&nbsp;</td>
		<td class="font4" align="right"><?php if($rE3['Arrhra']!=0){echo floatval($rE3['Arrhra']);} ?>&nbsp;</td>
		
		<td class="font3" align="right"><?php if($rE3['Ospl']!=0){echo floatval($rE3['Ospl']);} ?>&nbsp;</td>
		<td class="font3" align="right"><?php if($rE3['Nspl']!=0){echo floatval($rE3['Nspl']);} ?>&nbsp;</td>
		<td class="font3" align="right"><?php if($rE3['Dspl']!=0){echo floatval($rE3['Dspl']);} ?>&nbsp;</td>
		<td class="font4" align="right"><?php if($rE3['Arrspl']!=0){echo floatval($rE3['Arrspl']);} ?>&nbsp;</td>
		
		<td class="font3" align="right"><?php if($rE3['Ocon']!=0){echo floatval($rE3['Ocon']);} ?>&nbsp;</td>
		<td class="font3" align="right"><?php if($rE3['Ncon']!=0){echo floatval($rE3['Ncon']);} ?>&nbsp;</td>
		<td class="font3" align="right"><?php if($rE3['Dcon']!=0){echo floatval($rE3['Dcon']);} ?>&nbsp;</td>
		<td class="font4" align="right"><?php if($rE3['Arrcon']!=0){echo floatval($rE3['Arrcon']);} ?>&nbsp;</td>
		
		<td class="font4" align="right"><?php if($rE3['Pf']!=0){echo floatval($rE3['Pf']);} ?>&nbsp;</td>
		<td class="font4" align="right"><?php if($rE3['Esic']!=0){echo floatval($rE3['Esic']);} ?>&nbsp;</td>
	  </tr>
<?php } ?>	  
	 </table>	
	</td>
    </tr> 
</table>
</form>
</center>
</body>
</html>
