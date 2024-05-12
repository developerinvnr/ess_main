<?php session_start();
require_once('../AdminUser/config/config.php');


if($_POST['Action']='workingSheet' && $_POST['type']=='SaveIncData' && $_POST['act']=='SaveInc')
{ 

 $yi=$_REQUEST['yi'];
 $ci=$_REQUEST['ci'];
 $ei=$_REQUEST['ei'];
 $di=$_REQUEST['di'];
 $ti=$_REQUEST['ti'];
 $tr=$_REQUEST['tr'];
 $gi=$_REQUEST['gi'];
 
 $sql=mysql_query("select e.EmployeeID,p.EmpPmsId from hrm_employee_pms p inner join hrm_employee e on p.EmployeeID=e.EmployeeID inner join hrm_employee_general g on p.EmployeeID=g.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$ci." AND g.DateJoining<='".$_SESSION['AllowDoj']."' AND p.AssessmentYear=".$yi." AND p.HOD_EmployeeID=".$ei." order by e.ECode ASC", $con); $row=mysql_num_rows($sql);
 $no=1; 
 while($res=mysql_fetch_array($sql))
 {
   /** ----------------------------------------------------------- **/
   /** ----------------------------------------------------------- **/
   $Eprodata=0; $Eactual=0; $Ectc=0; $Ecorr=0; $Ecorr_per=0; $Einc=0; $Etotctc=0; $Etotctc_per=0; $ActualCtc=0;
   $sE=mysql_query("select * from hrm_pms_workingsheet where hodid=".$ei." AND yearid=".$yi." AND empid=".$res['EmployeeID']." AND typeid='emp'",$con); $rEd=mysql_num_rows($sE); 
   if($rEd==1)
   { 
    $rEd=mysql_fetch_assoc($sE); 
    $Eprodata=$rEd['per_prorata']; $Eactual=$rEd['per_actual']; $Ectc=$rEd['ctc']; $Ecorr=$rEd['corr']; 
    $Ecorr_per=$rEd['per_corr'];  $Einc=$rEd['inc'];  $Etotctc=$rEd['tot_ctc']; $Etotctc_per=$rEd['per_totctc'];
	if($rEd['pre_ctc']>0){ $ActualCtc = round((($rEd['pre_ctc']*$Eactual)/100)+$rEd['pre_ctc']); }
   }
   else if($rEd>=2)
   { 
    $s2E=mysql_query("select * from hrm_pms_workingsheet where hodid=".$ei." AND yearid=".$yi." AND Rep1>0 AND empid=".$res['EmployeeID']." AND typeid='emp'",$con); $r2Ed=mysql_num_rows($s2E);
    if($r2Ed>0)
    {
      $r2Ed=mysql_fetch_assoc($s2E); 
      $Eprodata=$r2Ed['per_prorata']; $Eactual=$r2Ed['per_actual']; $Ectc=$r2Ed['ctc']; $Ecorr=$r2Ed['corr']; 
      $Ecorr_per=$r2Ed['per_corr'];  $Einc=$r2Ed['inc'];  $Etotctc=$r2Ed['tot_ctc']; $Etotctc_per=$r2Ed['per_totctc'];
      if($r2Ed['pre_ctc']>0){ $ActualCtc = round((($r2Ed['pre_ctc']*$Eactual)/100)+$r2Ed['pre_ctc']); }
	}
    else
    {
      $s3E=mysql_query("select * from hrm_pms_workingsheet where hodid=".$ei." AND yearid=".$yi." AND deptid>0 AND empid=".$res['EmployeeID']." AND typeid='emp'",$con); $r3Ed=mysql_num_rows($s3E);
	  $r3Ed=mysql_fetch_assoc($s3E); 
      $Eprodata=$r3Ed['per_prorata']; $Eactual=$r3Ed['per_actual']; $Ectc=$r3Ed['ctc']; $Ecorr=$r3Ed['corr']; 
      $Ecorr_per=$r3Ed['per_corr'];  $Einc=$r3Ed['inc'];  $Etotctc=$r3Ed['tot_ctc']; $Etotctc_per=$r3Ed['per_totctc'];
      if($r3Ed['pre_ctc']>0){ $ActualCtc = round((($r3Ed['pre_ctc']*$Eactual)/100)+$r3Ed['pre_ctc']); }
	} 
   
   } //else if($rEd>=2)

   /**** -------------------- ****/
   $sqlUp=mysql_query("update hrm_employee_pms set HodSubmit_IncStatus=1, HodSubmit_IncDate='".date("Y-m-d")."', Hod_ProIncCTC=".$Ectc.", Hod_Percent_ProIncCTC=".$Eprodata.", Hod_ProCorrCTC=".$Ecorr.", Hod_Percent_ProCorrCTC=".$Ecorr_per.", Hod_Proposed_ActualCTC=".$Etotctc.", Hod_CTC='".$Etotctc."', Hod_IncNetCTC=".$Einc.", Hod_Percent_IncNetCTC=".$Etotctc_per.", Hod_ActualInc_Per='".$Eactual."', Hod_ProRataInc_Per='".$Eprodata."', Hod_ActualInc_Amt='".$ActualCtc."', Hod_ProRataInc_Amt='".$Ectc."' where EmpPmsId=".$res['EmpPmsId']." AND EmployeeID=".$res['EmployeeID'], $con); 
   /**** -------------------- ****/
   
   
   /** ----------------------------------------------------------- **/
   /** ----------------------------------------------------------- **/ 
 $no++; } //while
 
 $Nw=$no-1;
 if($sqlUp AND $row==$Nw){ echo '<input type="hidden" id="RstVal" value="1" />'; }
 else{ echo '<input type="hidden" id="RstVal" value="0" />'; }
  
}

?> 
