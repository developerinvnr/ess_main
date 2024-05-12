<?php require_once('config/config.php');  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/stuHover.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<style>
.font{font-family:Times New Roman;font-size:12px;text-align:center;font-weight:bold;} 
.th{font-family:Times New Roman;color:#FFFFFF;font-size:12px;text-align:center;font-weight:bold;height:24px;}
.tdc{font-family:Times New Roman;font-size:12px;text-align:center;color:#000000;}
.tdl{font-family:Times New Roman;font-size:12px;text-align:left;}
.tdr{font-family:Times New Roman;font-size:12px;text-align:right;}
.inner_table{height:520px;overflow-y:auto;width:auto;}
</style>
<Script type="text/javascript">
document.getElementById("TotVal_A").value=0;

$(document).ready(function () { $("#table1").freezeHeader({ 'height': '520px' }); })

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

function FunATotal(v)
{ var A=parseFloat(v); var TotA=parseFloat(document.getElementById("TotVal_A").value); 
  document.getElementById("TotVal_A").value=Math.round(A+TotA);  
  document.getElementById("TotVal_B").value=Math.round(A+TotA); 
}
</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#E0DBE3" onLoad="FunRef()">	
<?php if($_REQUEST['YI']==1){$Y=2012;}elseif($_REQUEST['YI']==2){$Y=2013;}elseif($_REQUEST['YI']==3){$Y=2014;}elseif($_REQUEST['YI']==4){$Y=2015;}elseif($_REQUEST['YI']==5){$Y=2016;}elseif($_REQUEST['YI']==6){$Y=2017;}elseif($_REQUEST['YI']==7){$Y=2018;}elseif($_REQUEST['YI']==8){$Y=2019;}elseif($_REQUEST['YI']==9){$Y=2020;}elseif($_REQUEST['YI']==10){$Y=2021;}elseif($_REQUEST['YI']==11){$Y=2022;}elseif($_REQUEST['YI']==12){$Y=2023;}  ?>	
<center>
<form method="post" name="Form">
<table style="vertical-align:top;width:98%;" align="center" border="0" cellspacing="0">
<tr bgcolor="#909090">
 <td align="center" style="height:24px;font-family:Times New Roman;color:#FFFFFF;font-size:15px;width:130px;"><b>Unassessed Team</b></td></tr>
<tr>
 <td valign="top" align="center" style="width:100%;"><span id="MyEmpRat"></span>
  <table border="1" id="table1" style="width:100%;" cellspacing="0">
   <div id="thead">
   <thead>
   <tr bgcolor="#7a6189" style="height:24px;">
    <td class="th" style="width:4%;"><b>SN</b></td>
    <td class="th" style="width:6%;"><b>EC</b></td>
    <td class="th" style="width:31%;"><b>Name</b></td>
    <td class="th" style="width:20%;"><b>Department</b></td>
    <td class="th" style="width:6%;"><b>Emp</b></td>	
    <td class="th" style="width:6%;"><b>App</b></td>	
    <td class="th" style="width:6%;"><b>Rev</b></td>
    <td class="th" style="width:6%;"><b>Hod</b></td>
	<td class="th" style="width:10%;"><b>Pro-rata<br>Value</b></td>
    <td class="th" style="width:5%;"><b>Action</b></td>
   </tr>
    <tr bgcolor="#7a6189">
    <td class="th" colspan="8" style=" text-align:right;"><b>Total:&nbsp;</b></td>
	<td class="th" ><input class="tdr" name="TotVal_A" id="TotVal_A" style="width:90%;font-family:Times New Roman;font-size:12px;border:hidden;color:#FFFFFF;background-color:#7a6189;" value="0" readonly/></td>
    <td class="th">&nbsp;</td>
   </tr>
   </thead>
   </div>
  
<?php
if($Y<2017){ $Yydate=$Y.'-03-31'; }else{ $Yydate=$Y.'-06-30'; }

$sql=mysql_query("select p.EmployeeID,EmpCode,Fname,Sname,Lname,DateJoining,EmpPmsId,Dummy_EmpRating,Dummy_AppRating,Dummy_RevRating,Dummy_HodRating,HR_Curr_DepartmentId,HR_CurrDesigId,DepartmentCode,EmpCurrGrossPM from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_department de ON p.HR_Curr_DepartmentId=de.DepartmentId where p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$_REQUEST['CI']." AND e.EmpStatus='A' AND g.DateJoining<='".$Yydate."' AND p.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con); 
$no=1; while($res=mysql_fetch_array($sql)) { //".$_REQUEST['YI']."
 ?> 
 <div id="tbody">
 <tbody>
 <tr bgcolor="<?php if($res['Dummy_EmpRating']==0 OR $res['Dummy_AppRating']==0 OR $res['Dummy_RevRating']==0 OR $res['Dummy_HodRating']==0){echo '#B0FFB0';}else{echo '#FFFFFF'; } ?>">
   <td class="tdc"><?php echo $no; ?><input type="hidden" name="PmsId" id="PmsId" value="<?php echo $res['EmpPmsId']; ?>" /></td>
   <td class="tdc"><?php echo $res['EmpCode']; ?></td>
   <td class="tdl">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>  
   <td class="tdl">&nbsp;<?php echo $res['DepartmentCode']; ?></td>
   <td class="tdc"><select name="DumEmp<?php echo $no; ?>" id="DumEmp<?php echo $no; ?>" style="width:100%;height:22px;font-family:Times New Roman;font-size:12px;border:hidden;" disabled><option value="<?php echo $res['Dummy_EmpRating']; ?>"><?php echo round($res['Dummy_EmpRating'],1); ?></option><?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$_REQUEST['CI']." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ ?><option value="<?php echo $resR['Rating']; ?>"><?php echo $resR['Rating']; ?></option><?php } ?></select></td>	
   <td class="tdc"><select name="DumApp<?php echo $no; ?>" id="DumApp<?php echo $no; ?>" style="width:100%;height:22px;font-family:Times New Roman;font-size:12px;border:hidden;" disabled><option value="<?php echo $res['Dummy_AppRating']; ?>"><?php echo round($res['Dummy_AppRating'],1); ?></option><?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$_REQUEST['CI']." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ ?><option value="<?php echo $resR['Rating']; ?>"><?php echo $resR['Rating']; ?></option><?php } ?></select></td>	
   <td class="tdc"><select name="DumRev<?php echo $no; ?>" id="DumRev<?php echo $no; ?>" style="width:100%;height:22px;font-family:Times New Roman;font-size:12px;border:hidden;" disabled><option value="<?php echo $res['Dummy_RevRating']; ?>"><?php echo round($res['Dummy_RevRating'],1); ?></option><?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$_REQUEST['CI']." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ ?><option value="<?php echo $resR['Rating']; ?>"><?php echo $resR['Rating']; ?></option><?php } ?></select></td>
   <td class="tdc"><select name="DumHod<?php echo $no; ?>" id="DumHod<?php echo $no; ?>" style="width:100%;height:22px;font-family:Times New Roman;font-size:12px;border:hidden;" disabled><option value="<?php echo $res['Dummy_HodRating']; ?>"><?php echo round($res['Dummy_HodRating'],1); ?></option><?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$_REQUEST['CI']." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ ?><option value="<?php echo $resR['Rating']; ?>"><?php echo $resR['Rating']; ?></option><?php } ?></select></td>
	  
   <?php
   $sql2I=mysql_query("select PerInc from hrm_pms_dummy_increment where YearId=".$_REQUEST['YI']." AND CompanyId=".$_REQUEST['CI']." AND Rating=".$res['Dummy_HodRating'], $con);  $res2I=mysql_fetch_array($sql2I); //".$_REQUEST['YI']."
   
  $EffDM='01-01';                             // $_SESSION['EffDate']=2018-01-01  
  $MinMD='12-31';                             // $Prev_From_EffDate=2018-12-31, $MinMD=12-31 
  $ExtraOneD='2021-07-01';                    // $ExtraOneD=2018-07-01
  $ExtraOneMD='07-01';                        //07-01
  $PrvY='2021';                               //2018
  $PrvMD='06-30';                             //06-30
  $cY='2022'; $pY='2021';                     //$cY=date("Y"); $pY=date("Y")-1; $cY=2018, $pY=2017
  $TPreGross=$res['EmpCurrGrossPM'];
  
  if($res['DateJoining']>=$pY.'-'.$ExtraOneMD AND $res['DateJoining']<=$cY.'-'.$PrvMD AND $res['Dummy_HodRating']>0)
  {
 
   //Joining>=2017-07-01 AND Joining<=2017-12-31 -->New
   if($res['DateJoining']>=$pY.'-'.$ExtraOneMD AND $res['DateJoining']<=$pY.'-'.$MinMD AND $res['Dummy_HodRating']>0)
   {
     $date11 = new DateTime($res['DateJoining']); $date22 = new DateTime($pY.'-'.$MinMD);
     $interval = date_diff($date22, $date11);
     $YY=$interval->format('%y');  $MM=$interval->format('%m');  $DD=$interval->format('%d');
	 $PerM2=$res2I['PerInc']/12;  $PerD2=$PerM2/30;
	 $Month_Per2=round($PerM2*$MM, 3); $Day_Per2=round($PerD2*$DD, 3);
	 $MSal2=($TPreGross*$Month_Per2)/100; 
	 $DSal2=($TPreGross*$Day_Per2)/100; 
	 $TotInc=round($MSal2+$DSal2);   
   }
   //Joining>=2018-01-01 AND Dj<=2018-06-30 -->New
   elseif($res['DateJoining']>=$cY.'-'.$EffDM AND $res['DateJoining']<=$cY.'-'.$PrvMD AND $res['Dummy_HodRating']>0)
   {
    $date1 = new DateTime($res['DateJoining']); $date2 = new DateTime($cY."-".$MinMD);  //$PrvMD
    $interval = date_diff($date2, $date1);
    $Y=$interval->format('%y');  $M=$interval->format('%m');  $D=$interval->format('%d');
    $PerM=$res2I['PerInc']/12;  $PerD=$PerM/30;
    $Month_Per=round($PerM*$M, 3); $Day_Per=round($PerD*$D, 3);
    $MSal=($TPreGross*$Month_Per)/100; 
    $DSal=($TPreGross*$Day_Per)/100; 
    $TotInc=round($MSal+$DSal);
	
	//echo $res['EmployeeID'].'-'.$res2I['PerInc'].'-'.$TPreGross;
	                      
   }
	 
  }
  else
  {
   $TotInc=0; 
  }
  ?>	  
	  
   <td class="tdc"><input class="tdr" name="prorata<?php echo $no; ?>" id="prorata<?php echo $no; ?>" value="<?php echo $TotInc; ?>" style="width:90%;font-family:Times New Roman;font-size:12px;border:hidden;background-color:<?php if($res['Dummy_EmpRating']==0 OR $res['Dummy_AppRating']==0 OR $res['Dummy_RevRating']==0 OR $res['Dummy_HodRating']==0){echo '#B0FFB0';}else{echo '#FFFFFF'; } ?>;" readonly/>
   
   <?php if($TotInc>0){$valA=$TotInc;}else{$valA=0;} echo '<script>FunATotal('.$valA.');</script>'; ?>
   </td>	  
	  
   <td class="tdc" align="center"><center><img src="images/edit.png" id="ImgE<?php echo $no; ?>" onClick="EditBtn(<?php echo $res['EmpPmsId'].', '.$no; ?>)" border="0" style="display:block;"><img id="ImgS<?php echo $no; ?>" src="images/save.gif" onClick="SaveRat(<?php echo $res['EmpPmsId'].', '.$no; ?>)" border="0" style="display:none;"></center></td>	
 </tr>
 </tbody>
 </div>
<?php $no++; } ?>
 <tr bgcolor="#7a6189">
    <td class="th" colspan="8" style=" text-align:right;"><b>Total:&nbsp;</b></td>
	<td class="th" ><input class="tdr" name="TotVal_A" id="TotVal_A" style="width:90%;font-family:Times New Roman;font-size:12px;border:hidden;color:#FFFFFF;background-color:#7a6189;" value="0" readonly/></td>
    <td class="th">&nbsp;</td>
 </tr>
</table>
</td>
</tr>
</table>
</form>
</center>
</body>
</html>
