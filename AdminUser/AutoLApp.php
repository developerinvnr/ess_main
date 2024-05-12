<?php 
$sqlALA=mysql_query("select * from hrm_autoupdate_leave where LUpDate='".date("Y-m-d")."' AND ComId=".$CompanyId." AND OkUp='Y'", $con); $rowALA=mysql_num_rows($sqlALA); 

if($rowALA==0)
{
 $mkdate = mktime(0,0,0, date("m"), 1, date("Y")); $wd=date('t',$mkdate); $d1=$wd-1; $d2=$wd-2; $d3=$wd-3; $d4=$wd-4;
 $NextMDate = date("Y-m-d",strtotime('+1 day', strtotime(date("Y-m-".$wd))));
 
 //$Before5D = date("Y-m-d",strtotime('-5 day')); 
 //$Before5D=date("Y-m-d",strtotime('-5 day', strtotime(date("Y-m-d"))));
 
 if(date("d")>05) //date("d")>05
 {
  if(date("d")<=$d4)
  { $BeforeD = date("Y-m-d",strtotime('-5 day'));
    $al=mysql_query("SELECT al.* FROM hrm_employee_applyleave al inner join hrm_employee e on al.EmployeeID=e.EmployeeID where (al.LeaveStatus=0 OR al.LeaveStatus=1) AND al.Apply_Date>='".date("Y-m-01")."' AND al.Apply_Date<='".$BeforeD."' AND al.SLHodApp='N' AND e.CompanyId=".$CompanyId." ORDER BY al.Apply_Date ASC");
  }
  elseif(date("d")<=$d3)
  { $BeforeD = date("Y-m-d");
    $al=mysql_query("SELECT al.* FROM hrm_employee_applyleave al inner join hrm_employee e on al.EmployeeID=e.EmployeeID where (al.LeaveStatus=0 OR al.LeaveStatus=1) AND al.Apply_Date>='".date("Y-m-01")."' AND al.Apply_Date<='".$BeforeD."' AND al.SLHodApp='N' AND e.CompanyId=".$CompanyId." ORDER BY al.Apply_Date ASC");
  }
  elseif(date("d")>$d3)
  { $BeforeD = date("Y-m-d");
    $al=mysql_query("SELECT al.* FROM hrm_employee_applyleave al inner join hrm_employee e on al.EmployeeID=e.EmployeeID where (al.LeaveStatus=0 OR al.LeaveStatus=1) AND al.Apply_Date>='".date("Y-m-".$d2)."' AND al.Apply_Date<='".$BeforeD."' AND al.SLHodApp='N' AND Apply_FromDate<'".$NextMDate."' AND e.CompanyId=".$CompanyId." ORDER BY al.Apply_Date ASC");
  }
 
  
  
   $ralRow=mysql_num_rows($al); 


  while($ral=mysql_fetch_assoc($al))
  { //while
   
/******************************************************/   
/*********************** Open auto Approval ******************************/
/*****************************************************/
  $Lid=$ral['ApplyLeaveId']; $Eid=$ral['EmployeeID']; $Lt=$ral['Leave_Type'];
  $Cmt='Auto Approved Leave';
  $FromDate=date("d-m-Y",strtotime($ral['Apply_FromDate'])); $ToDate=date("d-m-Y",strtotime($ral['Apply_ToDate']));
  
  $Fd=date("d",strtotime($ral['Apply_FromDate'])); $Fm=date("m",strtotime($ral['Apply_FromDate'])); 
  $Fy=date("Y",strtotime($ral['Apply_FromDate'])); $Td=date("d",strtotime($ral['Apply_ToDate'])); 
  $Tm=date("m",strtotime($ral['Apply_ToDate'])); $Ty=date("Y",strtotime($ral['Apply_ToDate']));
  $STs = strtotime($ral['Apply_FromDate']); $ETs = strtotime($ral['Apply_ToDate']);
  $DateFmonth=$wd;

//____________________________  Open ______________________________________________//  
/**/
  if($Fm==$Tm) 
  { //o1 
   for($i=$Fd; $i<=$Td; $i++) 
   { //o2
    if(date("w",strtotime(date($Fy.'-'.$Fm.'-'.$i)))!=0) 
	{ //o3
	 $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$Eid." and AttDate='".date($Fy."-".$Fm."-".$i)."'", $con); $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$Eid." and AttDate='".date($Fy."-".$Fm."-".$i)."' AND AttValue='HO'", $con); $row=mysql_num_rows($Sql); $row2=mysql_num_rows($Sql2);

     if($row==0){ $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$Eid.",'".$Lt."','".date($Fy.'-'.$Fm.'-'.$i)."','".$Fy."',".$YearId.")", $con); }
     elseif($row>0 AND $row2==0){ $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$Lt."' where EmployeeID=".$Eid." AND AttDate='".date($Fy.'-'.$Fm.'-'.$i)."'", $con); }
    } //c3 
	elseif(date("w",strtotime(date($Fy.'-'.$Fm.'-'.$i)))==0 AND $Lt=='EL') 
	{ //o3a
	 $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$Eid." and AttDate='".date($Fy."-".$Fm."-".$i)."'", $con); $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$Eid." and AttDate='".date($Fy."-".$Fm."-".$i)."' AND AttValue='HO'", $con); $row=mysql_num_rows($Sql); $row2=mysql_num_rows($Sql2);
	 
	 if($row==0){ $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$Eid.",'".$Lt."','".date($Fy.'-'.$Fm.'-'.$i)."','Y','".$Fy."',".$YearId.")", $con); }
     elseif($row>0 AND $row2==0){ $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$Lt."', CheckSunday='Y' where EmployeeID=".$Eid." AND AttDate='".date($Fy.'-'.$Fm.'-'.$i)."'", $con); }
    } //c3a
   } //c2 
  } //c1

  elseif($Fm!=$Tm AND $Fy==$Ty)
  { //oA 
   for($i=$Fd; $i<=$wd; $i++) 
   { //oB
	if(date("w",strtotime(date($Fy.'-'.$Fm.'-'.$i)))!=0) 
	{ //oC 
	  $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$Eid." and AttDate='".date($Fy."-".$Fm."-".$i)."'", $con); $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$Eid." and AttDate='".date($Fy."-".$Fm."-".$i)."' AND AttValue='HO'", $con); $row=mysql_num_rows($Sql);  $row2=mysql_num_rows($Sql2);

      if($row==0){ $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$Eid.",'".$Lt."','".date($Fy.'-'.$Fm.'-'.$i)."','".$Fy."',".$YearId.")", $con); }
      elseif($row>0 AND $row2==0){ $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$Lt."' where EmployeeID=".$Eid." AND AttDate='".date($Fy.'-'.$Fm.'-'.$i)."'", $con); }
	} //cC     
	elseif(date("w",strtotime(date($Fy.'-'.$Fm.'-'.$i)))==0 AND $Lt=='EL') 
    { //oC1
	 $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$Eid." and AttDate='".date($Fy."-".$Fm."-".$i)."'", $con); $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$Eid." and AttDate='".date($Fy."-".$Fm."-".$i)."' AND AttValue='HO'", $con); $row=mysql_num_rows($Sql);  $row2=mysql_num_rows($Sql2);
     
	 if($row==0){ $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$Eid.",'".$Lt."','".date($Fy.'-'.$Fm.'-'.$i)."','Y','".$Fy."',".$YearId.")", $con); }
     elseif($row>0 AND $row2==0){ $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$Lt."',CheckSunday='Y' where EmployeeID=".$Eid." AND AttDate='".date($Fy.'-'.$Fm.'-'.$i)."'", $con); }
	} //cC1    
   } //cB
 
   for($i=1; $i<=$Td; $i++) 
   { //oBa
    if(date("w",strtotime(date($Fy.'-'.$Tm.'-'.$i)))!=0) 
	{ //oBb
	  $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$Eid." and AttDate='".date($Fy."-".$Tm."-".$i)."'", $con); $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$Eid." and AttDate='".date($Fy."-".$Tm."-".$i)."' AND AttValue='HO'", $con); $row=mysql_num_rows($Sql);  $row2=mysql_num_rows($Sql2);
      if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$Eid.",'".$Lt."','".date($Fy.'-'.$Tm.'-'.$i)."','".$Fy."',".$YearId.")", $con); }
      elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$Lt."' where EmployeeID=".$Eid." AND AttDate='".date($Fy.'-'.$Tm.'-'.$i)."'", $con); }
	} //cBb
	elseif(date("w",strtotime(date($Fy.'-'.$Tm.'-'.$i)))==0 AND $Lt=='EL') 
	{ //oBc
	 $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$Eid." and AttDate='".date($Fy."-".$Tm."-".$i)."'", $con); $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$Eid." and AttDate='".date($Fy."-".$Tm."-".$i)."' AND AttValue='HO'", $con); $row=mysql_num_rows($Sql);  $row2=mysql_num_rows($Sql2);
     if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$Eid.",'".$Lt."','".date($Fy.'-'.$Tm.'-'.$i)."','Y','".$Fy."',".$YearId.")", $con); }
     elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$Lt."',CheckSunday='Y' where EmployeeID=".$Eid." AND AttDate='".date($Fy.'-'.$Tm.'-'.$i)."'", $con); }
	} //cBc
   } //cBa    
  } //cA

  elseif($Fm!=$Tm AND $Fy!=$Ty)
  { 
   for($i=$Fd; $i<=$wd; $i++) 
   { 
	if(date("w",strtotime(date($Fy.'-'.$Fm.'-'.$i)))!=0) 
	{ 
	 $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$Eid." and AttDate='".date($Fy."-".$Fm."-".$i)."'", $con); $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$Eid." and AttDate='".date($Fy."-".$Fm."-".$i)."' AND AttValue='HO'", $con); $row=mysql_num_rows($Sql);  $row2=mysql_num_rows($Sql2);
     
	 if($row==0){ $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$Eid.",'".$Lt."','".date($Fy.'-'.$Fm.'-'.$i)."','".$Fy."',".$YearId.")", $con); }
     elseif($row>0 AND $row2==0){ $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$Lt."' where EmployeeID=".$Eid." AND AttDate='".date($Fy.'-'.$Fm.'-'.$i)."'", $con); }
	} 
	elseif(date("w",strtotime(date($Fy.'-'.$Fm.'-'.$i)))==0 AND $Lt=='EL') 
    { 
	 $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$Eid." and AttDate='".date($Fy."-".$Fm."-".$i)."'", $con); $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$Eid." and AttDate='".date($Fy."-".$Fm."-".$i)."' AND AttValue='HO'", $con); $row=mysql_num_rows($Sql);  $row2=mysql_num_rows($Sql2);

     if($row==0){ $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$Eid.",'".$Lt."','".date($Fy.'-'.$Fm.'-'.$i)."','Y','".$Fy."',".$YearId.")", $con); }
     elseif($row>0 AND $row2==0){ $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$Lt."',CheckSunday='Y' where EmployeeID=".$Eid." AND AttDate='".date($Fy.'-'.$Fm.'-'.$i)."'", $con); }
	} 
   }     
   for($i=1; $i<=$Td; $i++) 
   { 
    if(date("w",strtotime(date($Ty.'-'.$Tm.'-'.$i)))!=0) 
	{ 
	 $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$Eid." and AttDate='".date($Ty."-".$Tm."-".$i)."'", $con); $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$Eid." and AttDate='".date($Ty."-".$Tm."-".$i)."' AND AttValue='HO'", $con); $row=mysql_num_rows($Sql); $row2=mysql_num_rows($Sql2);

     if($row==0){ $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$Eid.",'".$Lt."','".date($Ty.'-'.$Tm.'-'.$i)."','".$Ty."',".$YearId.")", $con); }
     elseif($row>0 AND $row2==0){ $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$Lt."' where EmployeeID=".$Eid." AND AttDate='".date($Ty.'-'.$Tm.'-'.$i)."'", $con); }
	}  
	else if(date("w",strtotime(date($Ty.'-'.$Tm.'-'.$i)))==0 AND $Lt=='EL') 
	{ 
	 $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$Eid." and AttDate='".date($Ty."-".$Tm."-".$i)."'", $con); $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$Eid." and AttDate='".date($Ty."-".$Tm."-".$i)."' AND AttValue='HO'", $con); $row=mysql_num_rows($Sql); $row2=mysql_num_rows($Sql2);

     if($row==0){ $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$Eid.",'".$Lt."','".date($Ty.'-'.$Tm.'-'.$i)."','Y','".$Ty."',".$YearId.")", $con); }
     elseif($row>0 AND $row2==0){ $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$Lt."',CheckSunday='Y' where EmployeeID=".$Eid." AND AttDate='".date($Ty.'-'.$Tm.'-'.$i)."'", $con); }
	}  
   }    
  }
/**/  
//____________________________  Close ______________________________________________//	

//*********** Update hrm_employee_leave Table OPEN *************************//  
 if($sIns)
 { 
  $day=$wd; $m=date("m"); $Y=date("Y"); $id=$Eid;	 
  
  $SqlCL=mysql_query("select * from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."') group by AttDate", $con);
  $SqlCH=mysql_query("select * from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."') group by AttDate", $con);
  $SqlSL=mysql_query("select * from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."') group by AttDate", $con);
  $SqlSH=mysql_query("select * from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."') group by AttDate", $con);
  $SqlPL=mysql_query("select * from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."') group by AttDate", $con);
  $SqlEL=mysql_query("select * from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."') group by AttDate", $con);
  $SqlFL=mysql_query("select * from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."') group by AttDate", $con);
  $SqlTL=mysql_query("select * from hrm_employee_attendance where AttValue='TL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."') group by AttDate", $con);
  $SqlHf=mysql_query("select * from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."') group by AttDate", $con);
  $SqlPresent=mysql_query("select * from hrm_employee_attendance where AttValue='P' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."') group by AttDate", $con);
  $SqlAbsent=mysql_query("select * from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."') group by AttDate", $con);
  $SqlOnDuties=mysql_query("select * from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."') group by AttDate", $con);
  $SqlHoliday=mysql_query("select * from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."') group by AttDate", $con); 
  $SqlELSun=mysql_query("select * from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."') group by AttDate", $con);

   $ResCL=mysql_num_rows($SqlCL); $ResCH=mysql_num_rows($SqlCH); $ResSL=mysql_num_rows($SqlSL); 
   $ResSH=mysql_num_rows($SqlSH); $ResPL=mysql_num_rows($SqlPL); $ResEL=mysql_num_rows($SqlEL); 
   $ResFL=mysql_num_rows($SqlFL); $ResTL=mysql_num_rows($SqlTL); $ResHf=mysql_num_rows($SqlHf); 
   $ResPresent=mysql_num_rows($SqlPresent); $ResAbsent=mysql_num_rows($SqlAbsent); 
   $ResOnDuties=mysql_num_rows($SqlOnDuties); $ResHoliday=mysql_num_rows($SqlHoliday); 
   $ResELSun=mysql_num_rows($SqlELSun);
   $CountCL=$ResCL; $CountCH=$ResCH/2; $TotalCL=$CountCL+$CountCH; 
   $CountSL=$ResSL; $CountSH=$ResSH/2; $TotalSL=$CountSL+$CountSH;
   $TotalPL=$ResPL; $TotalEL=$ResEL; $TotalFL=$ResFL; $TotalTL=$ResTL; 
   $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL; 
   $TotELSun=$ResELSun; $CountHf=$ResHf/2;  
   $TotalPR=$ResPresent+$CountCH+$CountSH+$CountHf; 
   $TotalAbsent=$ResAbsent+$CountHf;
   $TotalOnDuties=$ResOnDuties; $TotalHoliday=$ResHoliday; 
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalPaidDay=$TotalDayWithSunEL-$TotELSun;
   $TotalWorkingDay=26;
    
//*********** hrm_employee_monthlyleave_balance open *************************// 
   $SL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$id." AND Month='".$m."' AND Year='".$Y."'"); $RowL=mysql_num_rows($SL);
   if($RowL>0)
   { 
    $RL=mysql_fetch_assoc($SL);   
    if($m!=1){ $TotBalCL=$RL['OpeningCL']-$TotalCL;  $TotBalSL=$RL['OpeningSL']-$TotalSL; 
	 $TotBalPL=$RL['OpeningPL']-$TotalPL; $TotBalEL=$RL['OpeningEL']-$TotalEL; $TotBalFL=$RL['OpeningOL']-$TotalFL; }  
    if($m==1){ $TotBalCL=$RL['TotCL']-$TotalCL;  $TotBalSL=$RL['TotSL']-$TotalSL; $TotBalPL=$RL['TotPL']-$TotalPL;  
     $TotBalEL=$RL['TotEL']-($TotalEL+$RL['EnCashEL']); $TotBalFL=$RL['TotOL']-$TotalFL; }
	  
	$sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedEL='".$TotalEL."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceEL='".$TotBalEL."', BalanceOL='".$TotBalFL."' where EmployeeID=".$id." AND Month='".$m."' AND Year='".$Y."'", $con); 
   }
//*********** hrm_employee_monthlyleave_balance close *************************//

   if($Lt!='PL'){$HodLeS=0; $HodLeDate='0000-00-00';}else{$HodLeS=2; $HodLeDate=date("Y-m-d");}
   $sqlUp=mysql_query("update hrm_employee_applyleave set LeaveStatus=2, LeaveAppStatus=2, LeaveAppUpDate='".date("Y-m-d")."', LeaveHodStatus=".$HodLeS.", LeaveHodUpDate='".$HodLeDate."', ApplyLeave_UpdatedYearId=".$YearId.", UserId=".$UserId.", AdminComment='".$Cmt."' where ApplyLeaveId=".$Lid." AND EmployeeID=".$Eid, $con); 


   if($sqlUp)
   {
/************************************************/   
     if(date("d")>$d3)
	 {
	  $sql=mysql_query("select Fname,Sname,Lname,RepEmployeeID,Gender,Married,DR from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=".$Eid, $con); $res=mysql_fetch_assoc($sql); if($res['DR']=='Y'){$me='Dr.';} elseif($res['Gender']=='M'){$me='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$me='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$me='Miss.';}
 
      //Chk Reporting open 
      if($res['RepEmployeeID']!=0 AND $res['RepEmployeeID']!='')
      {
       $sqlR=mysql_query("select Fname,Sname,Lname,EmailId_Vnr,Gender,Married,DR from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=".$res['RepEmployeeID'], $con); $resR=mysql_fetch_assoc($sqlR); if($resR['DR']=='Y'){$mr='Dr.';} elseif($resR['Gender']=='M'){$mr='Mr.';} elseif($resR['Gender']=='F' AND $resR['Married']=='Y'){$mr='Mrs.';} elseif($resR['Gender']=='F' AND $resR['Married']=='N'){$mr='Miss.';}
	   
 $aa=0;
 
   $emsg .= "<html><head></head><body>";
   $emsg .= "Dear <b>".$resR['Fname']." ".$resR['Sname']." ".$resR['Lname'].",</b><br><br>\n\n\n";
   $emsg .= "Your team member ".$res['Fname']." ".$res['Sname']." ".$res['Lname']." has submitted leave application for ".$Lt." from ".$FromDate." to ".$ToDate." with reason (".$ral['Apply_Reason']."), which is auto-approved to facilitate the month end salary processing procedure. You may however disapprove this applied leave/s by informing HR. For information kindly log on to ESS.<br><br>\n\n";
   $emsg .= "From <br><b>ADMIN ESS</b><br>";
   $emsg .= "</body></html>";
 
 if($res['RepEmployeeID']!='' AND $resR['EmailId_Vnr']!='')  //Reporting
 {
   $eto = $resR['EmailId_Vnr'];  //$resR['EmailId_Vnr']
   $efrom = 'admin@vnrseeds.co.in';
   $esub = 'Notification For Auto Approved Leave';
   $headers = "From: ".$efrom."\r\n"; 
   $headers .= "MIME-Version: 1.0\r\n";
   $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   //$ok=@mail($eto, $esub, $emsg, $headers);
  }	   
	  }
	 }  //if(date("d")>$d3)
/************************************************/	
   } //if($sqlUp)


      
 }

/******************************************************/   
/*********************** Open auto Approval ******************************/
/*****************************************************/   
   
  } //while
  
 } //date("d")>05
 
 $InsALA=mysql_query("insert into hrm_autoupdate_leave(LUpDate,ComId,OkUp) values('".date("Y-m-d")."', ".$CompanyId.", 'Y')", $con);
}

?>