<?php session_start();
require_once('config/config.php');
date_default_timezone_set('asia/calcutta');

if(isset($_POST['submitform']))
{
 $sqlIn=mysql_query("update hrm_employee_attendance_settime set S1=".$_POST['S1'].", I1='".$_POST['I1']."', O1='".$_POST['O1']."', S2=".$_POST['S2'].", I2='".$_POST['I2']."', O2='".$_POST['O2']."', S3=".$_POST['S3'].", I3='".$_POST['I3']."', O3='".$_POST['O3']."', S4=".$_POST['S4'].", I4='".$_POST['I4']."', O4='".$_POST['O4']."', S5=".$_POST['S5'].", I5='".$_POST['I5']."', O5='".$_POST['O5']."', S6=".$_POST['S6'].", I6='".$_POST['I6']."', O6='".$_POST['O6']."', S7=".$_POST['S7'].", I7='".$_POST['I7']."', O7='".$_POST['O7']."', S8=".$_POST['S8'].", I8='".$_POST['I8']."', O8='".$_POST['O8']."', S9=".$_POST['S9'].", I9='".$_POST['I9']."', O9='".$_POST['O9']."', S10=".$_POST['S10'].", I10='".$_POST['I10']."', O10='".$_POST['O10']."', S11=".$_POST['S11'].", I11='".$_POST['I11']."', O11='".$_POST['O11']."', S12=".$_POST['S12'].", I12='".$_POST['I12']."', O12='".$_POST['O12']."', S13=".$_POST['S13'].", I13='".$_POST['I13']."', O13='".$_POST['O13']."', S14=".$_POST['S14'].", I14='".$_POST['I14']."', O14='".$_POST['O14']."', S15=".$_POST['S15'].", I15='".$_POST['I15']."', O15='".$_POST['O15']."', S16=".$_POST['S16'].", I16='".$_POST['I16']."', O16='".$_POST['O16']."', S17=".$_POST['S17'].", I17='".$_POST['I17']."', O17='".$_POST['O17']."', S18=".$_POST['S18'].", I18='".$_POST['I18']."', O18='".$_POST['O18']."', S19=".$_POST['S19'].", I19='".$_POST['I19']."', O19='".$_POST['O19']."', S20=".$_POST['S20'].", I20='".$_POST['I20']."', O20='".$_POST['O20']."', S21=".$_POST['S21'].", I21='".$_POST['I21']."', O21='".$_POST['O21']."', S22=".$_POST['S22'].", I22='".$_POST['I22']."', O22='".$_POST['O22']."', S23=".$_POST['S23'].", I23='".$_POST['I23']."', O23='".$_POST['O23']."', S24=".$_POST['S24'].", I24='".$_POST['I24']."', O24='".$_POST['O24']."', S25=".$_POST['S25'].", I25='".$_POST['I25']."', O25='".$_POST['O25']."', S26=".$_POST['S26'].", I26='".$_POST['I26']."', O26='".$_POST['O26']."', S27=".$_POST['S27'].", I27='".$_POST['I27']."', O27='".$_POST['O27']."', S28=".$_POST['S28'].", I28='".$_POST['I28']."', O28='".$_POST['O28']."', S29=".$_POST['S29'].", I29='".$_POST['I29']."', O29='".$_POST['O29']."', S30=".$_POST['S30'].", I30='".$_POST['I30']."', O30='".$_POST['O30']."', S31=".$_POST['S31'].", I31='".$_POST['I31']."', O31='".$_POST['O31']."' where EmployeeID=".$_POST['EI'], $con);
 
 if($sqlIn){echo '<script>alert("Data updated successfully..!!");</script>';}
}

if(isset($_POST['submitReset']))
{
  $sql=mysql_query("select Shift,InTime,OutTime from hrm_employee where EmployeeID=".$_POST['EI'],$con);
  $res=mysql_fetch_assoc($sql); 
  $sqlIn=mysql_query("update hrm_employee_attendance_settime set S1=".$res['Shift'].", I1='".$res['InTime']."', O1='".$res['OutTime']."', S2=".$res['Shift'].", I2='".$res['InTime']."', O2='".$res['OutTime']."', S3=".$res['Shift'].", I3='".$res['InTime']."', O3='".$res['OutTime']."', S4=".$res['Shift'].", I4='".$res['InTime']."', O4='".$res['OutTime']."', S5=".$res['Shift'].", I5='".$res['InTime']."', O5='".$res['OutTime']."', S6=".$res['Shift'].", I6='".$res['InTime']."', O6='".$res['OutTime']."', S7=".$res['Shift'].", I7='".$res['InTime']."', O7='".$res['OutTime']."', S8=".$res['Shift'].", I8='".$res['InTime']."', O8='".$res['OutTime']."', S9=".$res['Shift'].", I9='".$res['InTime']."', O9='".$res['OutTime']."', S10=".$res['Shift'].", I10='".$res['InTime']."', O10='".$res['OutTime']."', S11=".$res['Shift'].", I11='".$res['InTime']."', O11='".$res['OutTime']."', S12=".$res['Shift'].", I12='".$res['InTime']."', O12='".$res['OutTime']."', S13=".$res['Shift'].", I13='".$res['InTime']."', O13='".$res['OutTime']."', S14=".$res['Shift'].", I14='".$res['InTime']."', O14='".$res['OutTime']."', S15=".$res['Shift'].", I15='".$res['InTime']."', O15='".$res['OutTime']."', S16=".$res['Shift'].", I16='".$res['InTime']."', O16='".$res['OutTime']."', S17=".$res['Shift'].", I17='".$res['InTime']."', O17='".$res['OutTime']."', S18=".$res['Shift'].", I18='".$res['InTime']."', O18='".$res['OutTime']."', S19=".$res['Shift'].", I19='".$res['InTime']."', O19='".$res['OutTime']."', S20=".$res['Shift'].", I20='".$res['InTime']."', O20='".$res['OutTime']."', S21=".$res['Shift'].", I21='".$res['InTime']."', O21='".$res['OutTime']."', S22=".$res['Shift'].", I22='".$res['InTime']."', O22='".$res['OutTime']."', S23=".$res['Shift'].", I23='".$res['InTime']."', O23='".$res['OutTime']."', S24=".$res['Shift'].", I24='".$res['InTime']."', O24='".$res['OutTime']."', S25=".$res['Shift'].", I25='".$res['InTime']."', O25='".$res['OutTime']."', S26=".$res['Shift'].", I26='".$res['InTime']."', O26='".$res['OutTime']."', S27=".$res['Shift'].", I27='".$res['InTime']."', O27='".$res['OutTime']."', S28=".$res['Shift'].", I28='".$res['InTime']."', O28='".$res['OutTime']."', S29=".$res['Shift'].", I29='".$res['InTime']."', O29='".$res['OutTime']."', S30=".$res['Shift'].", I30='".$res['InTime']."', O30='".$res['OutTime']."', S31=".$res['Shift'].", I31='".$res['InTime']."', O31='".$res['OutTime']."' where EmployeeID=".$_POST['EI'], $con);
 
 if($sqlIn){echo '<script>alert("Data reset successfully..!!");</script>';}
}


?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.htf{ background-color:#AEAE00;font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:12px;}
.htf2{background-color:#AEAE00;font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:15px;}
.tdf{ font-family:Times New Roman;font-size:12px;color:#000000; height:25px;}
.tdft{ background-color:#FFFF9D;font-family:Times New Roman;font-size:14px;color:#000000;}
.tdf2{background-color:#FFFFC4;font-family:Times New Roman;;font-size:14px;text-align:center;}
</style>
<script language="javascript" type="text/javascript">
function FunCheckv() 
{ 
 if(document.getElementById("chkv").checked==true){ document.getElementById("submitReset").disabled=false; }
 else{ document.getElementById("submitReset").disabled=true; }
}

function FunShift(v,n)
{ 
 //if(v==1){document.getElementById("I"+n).value='09:00';document.getElementById("O"+n).value='17:30';}
 if(v==2){document.getElementById("I"+n).value='06:00';document.getElementById("O"+n).value='14:00';}
 else if(v==3){document.getElementById("I"+n).value='14:00';document.getElementById("O"+n).value='22:00';}
 else if(v==4){document.getElementById("I"+n).value='22:00';document.getElementById("O"+n).value='06:00';}
}

function validate(formn)
{ var agree=confirm("Are you sure?"); 
  if(agree){ return true; } else { return false; }
}
</script>
</head>
<body>
<?php $sql=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,TimeApply,InTime,OutTime,HqName from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_headquater h ON g.HqId=h.hqId where e.EmployeeID=".$_REQUEST['ei'], $con); 
      $rows=mysql_num_rows($sql); $res=mysql_fetch_array($sql); 
$sqlchk=mysql_query("select * from hrm_employee_attendance_settime where EmployeeID=".$res['EmployeeID'],$con);
$chk=mysql_fetch_assoc($sqlchk); 	  
?>
<table border="0" style="margin-top:0px;width:100%;">
<form method="post" name="formn" onSubmit="return validate(this)">
 <tr>
  <td align="center" height="20" valign="top">
   <table border="0">
    <tr>
	  <td align="center"><font color="#2D002D" style='font-family:Times New Roman;' size="4">
	  <b>Set In/Out Time (Month wise)</b><br>
	  Name:&nbsp;<b><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></b>,&nbsp;&nbsp;
	  Location:&nbsp;<b><?php echo $res['HqName']; ?></b></font><br>
	  Standard Time:&nbsp;<b>In-<?php echo date("H:i",strtotime($res['InTime'])).',&nbsp;&nbsp;Out-'.date("H:i",strtotime($res['OutTime'])); ?></b></font></td>
    </tr>
   </table>
  </td>
 </tr>
 <tr>
  <td valign="top">
   <table border="0">
    <tr>
<input type="hidden" id="EI" name="EI" value="<?php echo $res['EmployeeID']; ?>" />	
<?php for($i=1; $i<=31; $i++){ ?>	
	  <td align="center">
	   <table border="0">
	    <tr><td colspan="3" class="htf2"><?php echo $i; ?></td></tr>
		<tr>
		 <td class="htf" style="width:50px;">Shift</td>
		 <td class="htf" style="width:50px;">In</td>
		 <td class="htf" style="width:50px;">Out</td>
		</tr>
		<tr>
		 <td class="tdf" align="center"><select name="S<?php echo $i; ?>" id="S<?php echo $i; ?>" style="width:45px;height:22px;" onChange="FunShift(this.value,<?php echo $i; ?>)"><option value="<?php echo $chk['S'.$i]; ?>"><?php if($chk['S'.$i]==0){echo '';}elseif($chk['S'.$i]==1){echo 'Gn';}elseif($chk['S'.$i]==2){echo 'Mo';}elseif($chk['S'.$i]==3){echo 'Af';}elseif($chk['S'.$i]==4){echo 'Ng';} ?></option><option value="1">Gn</option><option value="2">Mo</option><option value="3">Af</option><option value="4">Ng</option></select></td>
		 
		 <td class="tdf" align="center"><input name="I<?php echo $i; ?>" id="I<?php echo $i; ?>" style="width:50px;text-align:center; background-color:<?php if($res['InTime']!=$chk['I'.$i]){echo '#2492FF';} ?>;" value="<?php echo date("H:i",strtotime($chk['I'.$i])); ?>"  /></td>
		 <td class="tdf" align="center"><input name="O<?php echo $i; ?>" id="O<?php echo $i; ?>" style="width:50px;text-align:center;background-color:<?php if($res['OutTime']!=$chk['O'.$i]){echo '#2492FF';} ?>;" value="<?php echo date("H:i",strtotime($chk['O'.$i])); ?>" /></td>
		</tr>
	   </table>
	  </td>
	  <?php $j=$i+1; if($j==32){ ?>
	   <td colspan="4" align="right">
<?php if($_SESSION['User_Permission']=='Edit'){?>	   
	    <table border="0">
         <tr>
	      <td align="left"><input type="button" style="width:90px;display:block;" value="refresh" onClick="javascript:window.location='EmpSetmTime.php?D=<?php echo $_REQUEST['D']; ?>&rr=false&ei=<?php echo $_REQUEST['ei']; ?>&rr=false'" /></td>
<td align="left"><input type="submit" name="submitform" style="width:90px;display:block;" value="save"/></td>
<td align="left"><input type="submit" name="submitReset" id="submitReset" style="width:90px;display:block;" value="reset" disabled/></td>
<td align="left"><input type="checkbox" id="chkv" onClick="FunCheckv()" /></td>
        </tr>
       </table>
<?php } ?>	   
	   </td>
	  <?php } ?>
<?php if($i%6==0){ ?></tr><tr> <?php } } ?>
   </table>
  </td>
 </tr>
</form>

</table>
</body>
</html>