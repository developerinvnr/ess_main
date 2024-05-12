<?php require_once('../AdminUser/config/config.php');  

if($_REQUEST['LidApp'] AND $_REQUEST['LidApp']!='')
{ 
  $search =  '!"#$%&/\'-:_' ;
  $search = str_split($search);
  $Cmt=str_replace($search, "", $_REQUEST['Cmt']);
  
  $Fday=date("d",strtotime($_REQUEST['FD'])); $Fmonth=date("m",strtotime($_REQUEST['FD'])); $Fyear=date("Y",strtotime($_REQUEST['FD']));
  $Tday=date("d",strtotime($_REQUEST['TD'])); $Tmonth=date("m",strtotime($_REQUEST['TD'])); $Tyear=date("Y",strtotime($_REQUEST['TD']));
  $startTimeStamp = strtotime($_REQUEST['FD']); $endTimeStamp = strtotime($_REQUEST['TD']);
  if($Fmonth==01){$DateFmonth=31;} 
  elseif($Fmonth==02){ if($Fyear==2012 OR $Fyear==2016 OR $Fyear==2020 OR $Fyear==2024 OR $Fyear==2028 OR $Fyear==2032) {$DateFmonth=29;}else{$DateFmonth=28;}} 
  elseif($Fmonth==03){$DateFmonth=31;}  elseif($Fmonth==04){$DateFmonth=30;}  elseif($Fmonth==05){$DateFmonth=31;}   elseif($Fmonth==06){$DateFmonth=30;}
  elseif($Fmonth==07){$DateFmonth=31;}  elseif($Fmonth==08){$DateFmonth=31;}  elseif($Fmonth==09){$DateFmonth=30;}   elseif($Fmonth==10){$DateFmonth=31;}
  elseif($Fmonth==11){$DateFmonth=30;}  elseif($Fmonth==12){$DateFmonth=31;} 
  $FromDate=date("d-m-Y",strtotime($_REQUEST['FD'])); $ToDate=date("d-m-Y",strtotime($_REQUEST['TD']));
  
  if($_REQUEST['v']==2)
  {  
/***************************************************************************************************************************/ 
//____________________________  Open ______________________________________________//	
  if($Fmonth==$Tmonth) 
  { for($i=$Fday; $i<=$Tday; $i++) 
    { if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$_REQUEST['EI'].",'".$_REQUEST['LeT']."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','".$Fyear."',".$_REQUEST['YI'].")", $con); }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LeT']."' where EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$_REQUEST['YI'], $con); }
	  } 
	  elseif(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $_REQUEST['LeT']=='EL') 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$_REQUEST['EI'].",'".$_REQUEST['LeT']."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','Y','".$Fyear."',".$_REQUEST['YI'].")", $con); }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LeT']."',CheckSunday='Y' where EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$_REQUEST['YI'], $con); }
	  } 
    }  
  }
  
  elseif($Fmonth!=$Tmonth AND $Fyear==$Tyear)
  { for($i=$Fday; $i<=$DateFmonth; $i++) 
	{ if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$_REQUEST['EI'].",'".$_REQUEST['LeT']."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','".$Fyear."',".$_REQUEST['YI'].")", $con); }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LeT']."' where EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$_REQUEST['YI'], $con); }
	  }     
	  elseif(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $_REQUEST['LeT']=='EL') 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$_REQUEST['EI'].",'".$_REQUEST['LeT']."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','Y','".$Fyear."',".$_REQUEST['YI'].")", $con); }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LeT']."',CheckSunday='Y' where EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$_REQUEST['YI'], $con); }
	  }     
	} 
	for($i=1; $i<=$Tday; $i++) 
	{ if(date("w",strtotime(date($Fyear.'-'.$Tmonth.'-'.$i)))!=0) 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Fyear."-".$Tmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Fyear."-".$Tmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$_REQUEST['EI'].",'".$_REQUEST['LeT']."','".date($Fyear.'-'.$Tmonth.'-'.$i)."','".$Fyear."',".$_REQUEST['YI'].")", $con); }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LeT']."' where EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$_REQUEST['YI'], $con); }
	  } 
	  elseif(date("w",strtotime(date($Fyear.'-'.$Tmonth.'-'.$i)))==0 AND $_REQUEST['LeT']=='EL') 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Fyear."-".$Tmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Fyear."-".$Tmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$_REQUEST['EI'].",'".$_REQUEST['LeT']."','".date($Fyear.'-'.$Tmonth.'-'.$i)."','Y','".$Fyear."',".$_REQUEST['YI'].")", $con); }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LeT']."',CheckSunday='Y' where EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$_REQUEST['YI'], $con); }
	  } 
	}     
  }
	 
  elseif($Fmonth!=$Tmonth AND $Fyear!=$Tyear)
  { for($i=$Fday; $i<=$DateFmonth; $i++) 
    { if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$_REQUEST['EI'].",'".$_REQUEST['LeT']."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','".$Fyear."',".$_REQUEST['YI'].")", $con); }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LeT']."' where EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$_REQUEST['YI'], $con); }
	  } 
	  elseif(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $_REQUEST['LeT']=='EL') 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$_REQUEST['EI'].",'".$_REQUEST['LeT']."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','Y','".$Fyear."',".$_REQUEST['YI'].")", $con); }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LeT']."',CheckSunday='Y' where EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$_REQUEST['YI'], $con); }
	  } 
	}     
	for($i=1; $i<=$Tday; $i++) 
	{ if(date("w",strtotime(date($Tyear.'-'.$Tmonth.'-'.$i)))!=0) 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Tyear."-".$Tmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Tyear."-".$Tmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$_REQUEST['EI'].",'".$_REQUEST['LeT']."','".date($Tyear.'-'.$Tmonth.'-'.$i)."','".$Tyear."',".$_REQUEST['YI'].")", $con); }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LeT']."' where EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Tyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$_REQUEST['YI'], $con); }
	  }  
	  else if(date("w",strtotime(date($Tyear.'-'.$Tmonth.'-'.$i)))==0 AND $_REQUEST['LeT']=='EL') 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Tyear."-".$Tmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Tyear."-".$Tmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$_REQUEST['EI'].",'".$_REQUEST['LeT']."','".date($Tyear.'-'.$Tmonth.'-'.$i)."','Y','".$Tyear."',".$_REQUEST['YI'].")", $con); }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LeT']."',CheckSunday='Y' where EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Tyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$_REQUEST['YI'], $con); }
	  }  
	}    
  }
//____________________________  Close ______________________________________________//	
//*************************************** Update hrm_employee_leave Table OPEN*******************************************//  
if($sIns)
{ 
 if(date("m")==1){$m=12; $Y=date("Y")-1;}else{$m=date("m")-1; $Y=date("Y");} $id=$_REQUEST['EI'];	 
 
if($m==1 OR $m==3 OR $m==5 OR $m==7 OR $m==8 OR $m==10 OR $m==12){ $day=31; }
elseif($m==2){if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040){$day=29;} 
else{$day=28;} }
elseif($m==4 OR $m==6 OR $m==9 OR $m==11){ $day=30;}
$SqlCL=mysql_query("select count(AttValue)as CL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlCH=mysql_query("select count(AttValue)as CH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlSL=mysql_query("select count(AttValue)as SL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlSH=mysql_query("select count(AttValue)as SH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlPL=mysql_query("select count(AttValue)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlEL=mysql_query("select count(AttValue)as EL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlFL=mysql_query("select count(AttValue)as FL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlTL=mysql_query("select count(AttValue)as TL from hrm_employee_attendance where AttValue='TL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlHf=mysql_query("select count(AttValue)as Hf from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlPresent=mysql_query("select count(AttValue)as Present from hrm_employee_attendance where AttValue='P' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlAbsent=mysql_query("select count(AttValue)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlHoliday=mysql_query("select count(AttValue)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')"); 
$SqlELSun=mysql_query("select count(CheckSunday)as SUN from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')", $con);
	  
   $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); $ResSH=mysql_fetch_array($SqlSH);
   $ResPL=mysql_fetch_array($SqlPL); $ResEL=mysql_fetch_array($SqlEL); $ResFL=mysql_fetch_array($SqlFL); $ResTL=mysql_fetch_array($SqlTL); $ResHf=mysql_fetch_array($SqlHf); 
   $ResPresent=mysql_fetch_array($SqlPresent); 
   $ResAbsent=mysql_fetch_array($SqlAbsent); $ResOnDuties=mysql_fetch_array($SqlOnDuties); $ResHoliday=mysql_fetch_array($SqlHoliday); 
   $ResELSun=mysql_fetch_array($SqlELSun);

   $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $TotalCL=$CountCL+$CountCH; $CountSL=$ResSL['SL']; $CountSH=$ResSH['SH']/2; $TotalSL=$CountSL+$CountSH;
   $TotalPL=$ResPL['PL']; $TotalEL=$ResEL['EL']; $TotalFL=$ResFL['FL']; $TotalTL=$ResTL['TL']; $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL; 
   $TotELSun=$ResELSun['SUN'];
   $CountHf=$ResHf['Hf']/2;  
   $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountHf; //$TotalPR=$ResPresent['Present']+$CountHf;  
   $TotalAbsent=$ResAbsent['Absent']+$CountHf;
   $TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
   
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;

   $TotalPaidDay=$TotalDayWithSunEL-$TotELSun;
   $TotalWorkingDay=26;
   
    /********************************************** hrm_employee_monthlyleave_balance open***********************************************/
	  $SL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$id." AND Month='".$m."' AND Year='".$Y."'");  
	  $RowL=mysql_num_rows($SL);
	  if($RowL>0) { $RL=mysql_fetch_assoc($SL);   
	  if($m!=1) { $TotBalCL=$RL['OpeningCL']-$TotalCL;  $TotBalSL=$RL['OpeningSL']-$TotalSL; $TotBalPL=$RL['OpeningPL']-$TotalPL;  $TotBalEL=$RL['OpeningEL']-$TotalEL;
	              $TotBalFL=$RL['OpeningOL']-$TotalFL; }  
      if($m==1) { $TotBalCL=$RL['TotCL']-$TotalCL;  $TotBalSL=$RL['TotSL']-$TotalSL; $TotBalPL=$RL['TotPL']-$TotalPL;  $TotBalEL=$RL['TotEL']-$TotalEL; 
	              $TotBalFL=$RL['TotOL']-$TotalFL;}
	  
	                //$TotBalCL=$RL['OpeningCL']-$TotalCL;  $TotBalSL=$RL['OpeningSL']-$TotalSL;  
	                //$TotBalPL=$RL['OpeningPL']-$TotalPL;  $TotBalEL=$RL['OpeningEL']-$TotalEL;
	  $sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedEL='".$TotalEL."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceEL='".$TotBalEL."', BalanceOL='".$TotBalFL."' where EmployeeID=".$id." AND Month='".$m."' AND Year='".$Y."'", $con); }
	  /********************************************** hrm_employee_monthlyleave_balance close ***********************************************/

/********************************************** hrm_employee_monthatt ***********************************************/  
   $SqlMonthLeave=mysql_query("select * from hrm_employee_monthatt where EmployeeID=".$id." AND Month=".$m." AND Year='".$Y."'"); 
   $RowMonthLeave=mysql_num_rows($SqlMonthLeave);
   if($RowMonthLeave==0){ $InsUpMonth=mysql_query("insert into hrm_employee_monthatt(YearId,Year,EmployeeID,Month,MonthAtt_TotCL,MonthAtt_TotSL,MonthAtt_TotPL,MonthAtt_TotEL,MonthAtt_TotOL,MonthAtt_TotTL,MonthAtt_TotLeave,MonthAtt_TotOD,MonthAtt_TotHO,MonthAtt_TotPR,MonthAtt_TotAP,MonthAtt_TotWorkDay,MonthAtt_TotPaidDay,MonthAtt_UpdatedDate,MonthAtt_UpdatedYearId)values(".$_REQUEST['YI'].",'".$Y."',".$id.",".$m.",'".$TotalCL."','".$TotalSL."','".$TotalPL."','".$TotalEL."','".$TotalFL."','".$TotalTL."','".$TotalLeaveCount."','".$TotalOnDuties."','".$TotalHoliday."','".$TotalPR."','".$TotalAbsent."','".$TotalWorkingDay."','".$TotalPaidDay."','".date("Y-m-d")."',".$_REQUEST['YI'].")");}
   if($RowMonthLeave>0){ $InsUpMonth=mysql_query("UPDATE hrm_employee_monthatt SET YearId=".$_REQUEST['YI'].", Year='".$Y."', EmployeeID=".$id.", Month=".$m.", MonthAtt_TotCL='".$TotalCL."', MonthAtt_TotSL='".$TotalSL."', MonthAtt_TotPL='".$TotalPL."', MonthAtt_TotEL='".$TotalEL."', MonthAtt_TotOL='".$TotalFL."', MonthAtt_TotTL='".$TotalTL."', MonthAtt_TotLeave='".$TotalLeaveCount."', MonthAtt_TotOD='".$TotalOnDuties."', MonthAtt_TotHO='".$TotalHoliday."', MonthAtt_TotPR='".$TotalPR."', MonthAtt_TotAP='".$TotalAbsent."', MonthAtt_TotWorkDay='".$TotalWorkingDay."', MonthAtt_TotPaidDay='".$TotalPaidDay."', MonthAtt_UpdatedDate='".date("Y-m-d")."', MonthAtt_UpdatedYearId=".$_REQUEST['YI']." where EmployeeID=".$id." AND Month=".$m." AND Year='".$Y."'");}
  
  if($InsUpMonth) 
    {  
	 /********************************************** hrm_employee_yearatt open ***********************************************/
	  $SqlTotCL=mysql_query("select SUM(MonthAtt_TotCL)as TotCL from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id);
	  $SqlTotSL=mysql_query("select SUM(MonthAtt_TotSL)as TotSL from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id);
	  $SqlTotPL=mysql_query("select SUM(MonthAtt_TotPL)as TotPL from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id);
	  $SqlTotEL=mysql_query("select SUM(MonthAtt_TotEL)as TotEL from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id);  
	  $SqlTotFL=mysql_query("select SUM(MonthAtt_TotOL)as TotOL from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id); 
	  $SqlTotTL=mysql_query("select SUM(MonthAtt_TotTL)as TotTL from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id, $con);
	  $SqlTotLeave=mysql_query("select SUM(MonthAtt_TotLeave)as TotLeave from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id);
	  $SqlTotOD=mysql_query("select SUM(MonthAtt_TotOD)as TotOD from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id);
	  $SqlTotHO=mysql_query("select SUM(MonthAtt_TotHO)as TotHO from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id);
	  $SqlTotPR=mysql_query("select SUM(MonthAtt_TotPR)as TotPR from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id);
	  $SqlTotAP=mysql_query("select SUM(MonthAtt_TotAP)as TotAP from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id);
	  $SqlTotWorkDay=mysql_query("select SUM(MonthAtt_TotWorkDay)as TotWorkDay from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id);
	  $SqlTotPaidDay=mysql_query("select SUM(MonthAtt_TotPaidDay)as TotPaidDay from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id); 
	  	
      $ResTotCL=mysql_fetch_array($SqlTotCL); $ResTotSL=mysql_fetch_array($SqlTotSL); $ResTotPL=mysql_fetch_array($SqlTotPL); $ResTotEL=mysql_fetch_array($SqlTotEL); 
	  $ResTotFL=mysql_fetch_array($SqlTotFL); $ResTotTL=mysql_fetch_array($SqlTotTL); $ResTotLeave=mysql_fetch_array($SqlTotLeave); $ResTotOD=mysql_fetch_array($SqlTotOD);
      $ResTotHO=mysql_fetch_array($SqlTotHO); $ResTotPR=mysql_fetch_array($SqlTotPR); $ResTotAP=mysql_fetch_array($SqlTotAP);
      $ResTotWorkDay=mysql_fetch_array($SqlTotWorkDay); $ResTotPaidDay=mysql_fetch_array($SqlTotPaidDay);
	  
	  $CountTotCL=$ResTotCL['TotCL']; $CountTotSL=$ResTotSL['TotSL']; $CountTotPL=$ResTotPL['TotPL']; $CountTotEL=$ResTotEL['TotEL']; $CountTotFL=$ResTotFL['TotOL'];
	  $CountTotTL=$ResTotTL['TotTL']; $CountTotLeave=$ResTotLeave['TotLeave']; $CountTotOD=$ResTotOD['TotOD']; $CountTotHO=$ResTotHO['TotHO']; $CountTotPR=$ResTotPR['TotPR'];
	  $CountTotAP=$ResTotAP['TotAP']; $CountTotWorkDay=$ResTotWorkDay['TotWorkDay']; $CountTotPaidDay=$ResTotPaidDay['TotPaidDay'];
	  
	  $SqlYearAtt=mysql_query("select * from hrm_employee_yearatt where EmployeeID=".$id." AND Year='".$Y."'"); 
      $RowYearAtt=mysql_num_rows($SqlYearAtt);
	  if($RowYearAtt==0){ $InsUpYear=mysql_query("insert into hrm_employee_yearatt(YearId,Year,EmployeeID,YearAtt_TotCL,YearAtt_TotSL,YearAtt_TotPL,YearAtt_TotEL,YearAtt_TotOL,YearAtt_TotTL,YearAtt_TotLeave,YearAtt_TotOD,YearAtt_TotHO,YearAtt_TotPR,YearAtt_TotAP,YearAtt_TotWorkDay,YearAtt_TotPaidDay,YearAtt_UpdatedDate,YearAtt_UpdatedYearId)values(".$_REQUEST['YI'].",'".$Y."',".$id.",'".$CountTotCL."','".$CountTotSL."','".$CountTotPL."','".$CountTotEL."','".$CountTotFL."','".$CountTotTL."','".$CountTotLeave."','".$CountTotOD."','".$CountTotHO."','".$CountTotPR."','".$CountTotAP."','".$CountTotWorkDay."','".$CountTotPaidDay."','".date("Y-m-d")."',".$_REQUEST['YI'].")"); }
	  if($RowYearAtt>0){ $InsUpYear=mysql_query("UPDATE hrm_employee_yearatt SET YearId=".$_REQUEST['YI'].", Year='".$Y."', EmployeeID=".$id.", YearAtt_TotCL='".$CountTotCL."', YearAtt_TotSL='".$CountTotSL."', YearAtt_TotPL='".$CountTotPL."', YearAtt_TotEL='".$CountTotEL."', YearAtt_TotOL='".$CountTotFL."', YearAtt_TotTL='".$CountTotTL."', YearAtt_TotLeave='".$CountTotLeave."', YearAtt_TotOD='".$CountTotOD."', YearAtt_TotHO='".$CountTotHO."', YearAtt_TotPR='".$CountTotPR."', YearAtt_TotAP='".$CountTotAP."', YearAtt_TotWorkDay='".$CountTotWorkDay."', YearAtt_TotPaidDay='".$CountTotPaidDay."', YearAtt_UpdatedDate='".date("Y-m-d")."', YearAtt_UpdatedYearId=".$_REQUEST['YI']." where EmployeeID=".$id." AND Year='".$Y."'"); }
	  
	   /********************************************** hrm_employee_finyearatt open***********************************************/
	  $SqlFinCL=mysql_query("select SUM(MonthAtt_TotCL)as FinCL from hrm_employee_monthatt where YearId='".$_REQUEST['YI']."' AND EmployeeID=".$id);
	  $SqlFinSL=mysql_query("select SUM(MonthAtt_TotSL)as FinSL from hrm_employee_monthatt where YearId='".$_REQUEST['YI']."' AND EmployeeID=".$id);
	  $SqlFinPL=mysql_query("select SUM(MonthAtt_TotPL)as FinPL from hrm_employee_monthatt where YearId='".$_REQUEST['YI']."' AND EmployeeID=".$id);
	  $SqlFinEL=mysql_query("select SUM(MonthAtt_TotEL)as FinEL from hrm_employee_monthatt where YearId='".$_REQUEST['YI']."' AND EmployeeID=".$id);  
	  $SqlFinFL=mysql_query("select SUM(MonthAtt_TotOL)as FinOL from hrm_employee_monthatt where YearId='".$_REQUEST['YI']."' AND EmployeeID=".$id); 
	  $SqlFinTL=mysql_query("select SUM(MonthAtt_TotTL)as FinTL from hrm_employee_monthatt where YearId='".$_REQUEST['YI']."' AND EmployeeID=".$id, $con); 
	  $SqlFinLeave=mysql_query("select SUM(MonthAtt_TotLeave)as FinLeave from hrm_employee_monthatt where YearId='".$_REQUEST['YI']."' AND EmployeeID=".$id);
	  $SqlFinOD=mysql_query("select SUM(MonthAtt_TotOD)as FinOD from hrm_employee_monthatt where YearId='".$_REQUEST['YI']."' AND EmployeeID=".$id);
	  $SqlFinHO=mysql_query("select SUM(MonthAtt_TotHO)as FinHO from hrm_employee_monthatt where YearId='".$_REQUEST['YI']."' AND EmployeeID=".$id);
	  $SqlFinPR=mysql_query("select SUM(MonthAtt_TotPR)as FinPR from hrm_employee_monthatt where YearId='".$_REQUEST['YI']."' AND EmployeeID=".$id);
	  $SqlFinAP=mysql_query("select SUM(MonthAtt_TotAP)as FinAP from hrm_employee_monthatt where YearId='".$_REQUEST['YI']."' AND EmployeeID=".$id);
	  $SqlFinWorkDay=mysql_query("select SUM(MonthAtt_TotWorkDay)as FinWorkDay from hrm_employee_monthatt where YearId='".$_REQUEST['YI']."' AND EmployeeID=".$id);
	  $SqlFinPaidDay=mysql_query("select SUM(MonthAtt_TotPaidDay)as FinPaidDay from hrm_employee_monthatt where YearId='".$_REQUEST['YI']."' AND EmployeeID=".$id);
	  	
      $ResFinCL=mysql_fetch_array($SqlFinCL); $ResFinSL=mysql_fetch_array($SqlFinSL); $ResFinPL=mysql_fetch_array($SqlFinPL);  $ResFinEL=mysql_fetch_array($SqlFinEL); 
	  $ResFinFL=mysql_fetch_array($SqlFinFL); $ResFinTL=mysql_fetch_array($SqlFinTL); $ResFinLeave=mysql_fetch_array($SqlFinLeave); $ResFinOD=mysql_fetch_array($SqlFinOD);
      $ResFinHO=mysql_fetch_array($SqlFinHO); //$ResFinPR=mysql_fetch_array($SqlFinPR); $ResFinAP=mysql_fetch_array($SqlFinAP);
      $ResFinWorkDay=mysql_fetch_array($SqlFinWorkDay); $ResFinPaidDay=mysql_fetch_array($SqlFinPaidDay);
	  
	  $CountFinCL=$ResFinCL['FinCL']; $CountFinSL=$ResFinSL['FinSL']; $CountFinPL=$ResFinPL['FinPL']; $CountFinEL=$ResFinEL['FinEL']; $CountFinFL=$ResFinFL['FinOL'];
	  $CountFinTL=$ResFinTL['FinTL']; $CountFinLeave=$ResFinLeave['FinLeave']; $CountFinOD=$ResFinOD['FinOD']; $CountFinHO=$ResFinHO['FinHO']; $CountFinPR=$ResFinPR['FinPR'];
	  $CountFinAP=$ResFinAP['FinAP']; $CountFinWorkDay=$ResFinWorkDay['FinWorkDay']; $CountFinPaidDay=$ResFinPaidDay['FinPaidDay'];
	  
	  $SqlFinYearAtt=mysql_query("select * from hrm_employee_finyearatt where EmployeeID=".$id." AND YearId=".$_REQUEST['YI']); 
      $RowFinYearAtt=mysql_num_rows($SqlFinYearAtt);
	  if($RowFinYearAtt==0){ $InsUpFinYear=mysql_query("insert into hrm_employee_finyearatt(YearId,Year,EmployeeID,FinYearAtt_TotCL,FinYearAtt_TotSL,FinYearAtt_TotPL,FinYearAtt_TotEL,FinYearAtt_TotOL,FinYearAtt_TotTL,FinYearAtt_TotLeave,FinYearAtt_TotOD,FinYearAtt_TotHO,FinYearAtt_TotPR,FinYearAtt_TotAP,FinYearAtt_TotWorkDay,FinYearAtt_TotPaidDay,FinYearAtt_UpdatedBy,FinYearAtt_UpdatedDate,FinYearAtt_UpdatedYearId)values(".$_REQUEST['YI'].",'".$Y."',".$id.",'".$CountFinCL."','".$CountFinSL."','".$CountFinPL."','".$CountFinEL."','".$CountFinFL."','".$CountFinTL."','".$CountFinLeave."','".$CountFinOD."','".$CountFinHO."','".$CountFinPR."','".$CountFinAP."','".$CountFinWorkDay."','".$CountFinPaidDay."',".$UserId.",'".date("Y-m-d")."',".$_REQUEST['YI'].")"); }
	  if($RowFinYearAtt>0){ $InsUpFinYear=mysql_query("UPDATE hrm_employee_finyearatt SET YearId=".$_REQUEST['YI'].", Year='".$Y."', EmployeeID=".$id.", FinYearAtt_TotCL='".$CountFinCL."', FinYearAtt_TotSL='".$CountFinSL."', FinYearAtt_TotPL='".$CountFinPL."', FinYearAtt_TotEL='".$CountFinEL."', FinYearAtt_TotOL='".$CountFinFL."', FinYearAtt_TotTL='".$CountFinTL."', FinYearAtt_TotLeave='".$CountFinLeave."', FinYearAtt_TotOD='".$CountFinOD."', FinYearAtt_TotHO='".$CountFinHO."', FinYearAtt_TotPR='".$CountFinPR."', FinYearAtt_TotAP='".$CountFinAP."', FinYearAtt_TotWorkDay='".$CountFinWorkDay."', FinYearAtt_TotPaidDay='".$CountFinPaidDay."', FinYearAtt_UpdatedDate='".date("Y-m-d")."', FinYearAtt_UpdatedYearId=".$_REQUEST['YI']." where EmployeeID=".$id." AND YearId=".$_REQUEST['YI']); }
	  /********************************************** hrm_employee_finyearatt close ***********************************************/
	  
    /********************************************** hrm_employee_yearatt close ***********************************************/
	}
/********************************************** hrm_employee_monthatt Close***********************************************/ 
 
  if($_REQUEST['LeT']!='PL')
  { $sqlUp=mysql_query("update hrm_employee_applyleave set LeaveStatus=".$_REQUEST['v'].", LeaveAppStatus=".$_REQUEST['v'].", LeaveAppUpDate='".date("Y-m-d")."', ApplyLeave_UpdatedYearId=".$_REQUEST['YI'].", UserId=".$_REQUEST['UI'].", AdminComment='".$Cmt."' where ApplyLeaveId=".$_REQUEST['LidApp'], $con); }
  elseif($_REQUEST['LeT']=='PL') { $sqlUp=mysql_query("update hrm_employee_applyleave set LeaveStatus=".$_REQUEST['v'].", LeaveAppStatus=".$_REQUEST['v'].", LeaveAppUpDate='".date("Y-m-d")."', LeaveHodStatus=".$_REQUEST['v'].", LeaveHodUpDate='".date("Y-m-d")."', ApplyLeave_UpdatedYearId=".$_REQUEST['YI'].", UserId=".$_REQUEST['UI'].", AdminComment='".$Cmt."' where ApplyLeaveId=".$_REQUEST['LidApp'], $con); }
  if($sqlUp){echo '<script>alert("Leave approved successfully..."); window.close();</script>'; }
}
else {$msg='Error...';}
//*************************************** Update hrm_employee_leave Table CLOSE*******************************************// 
/***************************************************************************************************************************/  
  }
  if($_REQUEST['v']!=2)
  { 
    if($_REQUEST['LeT']!='PL')
    { $sqlUpPen=mysql_query("update hrm_employee_applyleave set LeaveStatus=".$_REQUEST['v'].", LeaveAppStatus=".$_REQUEST['v'].", LeaveAppUpDate='".date("Y-m-d")."', ApplyLeave_UpdatedYearId=".$_REQUEST['YI'].", UserId=".$_REQUEST['UI'].", AdminComment='".$Cmt."' where ApplyLeaveId=".$_REQUEST['LidApp'], $con); }
	 elseif($_REQUEST['LeT']=='PL') { $sqlUpPen=mysql_query("update hrm_employee_applyleave set LeaveStatus=".$_REQUEST['v'].", LeaveAppStatus=".$_REQUEST['v'].", LeaveAppUpDate='".date("Y-m-d")."', LeaveHodStatus=".$_REQUEST['v'].", LeaveHodUpDate='".date("Y-m-d")."', ApplyLeave_UpdatedYearId=".$_REQUEST['YI'].", UserId=".$_REQUEST['UI'].", AdminComment='".$Cmt."' where ApplyLeaveId=".$_REQUEST['LidApp'], $con); }
	
  if($sqlUpPen){echo '<script>alert("Leave pending successfully..."); window.close();</script>';}
  }
   
}

if($_REQUEST['action'] AND $_REQUEST['action']=='Dis')
{
  $search =  '!"#$%&/\'-:_' ;
  $search = str_split($search);
  $Cmt=str_replace($search, "", $_REQUEST['Cmt']);
  $sqlUp=mysql_query("update hrm_employee_applyleave set LeaveStatus=".$_REQUEST['v'].", LeaveAppStatus=".$_REQUEST['v'].", LeaveAppReason='".$_POST['DisReason']."', LeaveAppUpDate='".date("Y-m-d")."', ApplyLeave_UpdatedYearId=".$_REQUEST['YI'].", UserId=".$_REQUEST['UI'].", AdminComment='".$Cmt."' where ApplyLeaveId=".$_REQUEST['LD'], $con);
  if($sqlUp){echo '<script>alert("Leave dis-approved successfully..."); window.close();</script>';}
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Approve/ Dis-approve Leave:&nbsp;<?php echo $EmpName; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="../AdminUser/css/body.css" rel="stylesheet"/>
<link type="text/css" href="../AdminUser/css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style>.InputText {font-family:Times New Roman; font-size:12px; width:90px; height:15px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<script type="text/javascript" language="javascript">
function Close(){window.close();}

function ClickSave(act,AL,LId,v,LT,FD,TD,TotD,EI,PG,App,Hod,UI,ls,yly,YI)
{ 
 var Cmt=document.getElementById("Comment").value; 
 if (Cmt.length === 0) { alert("Please type remark.");  return false; }
 if(v==2)
 { var agree=confirm("Are you sure you want to approved this apply leave?");
   if (agree) 
   { var x = "LeaveApproved.php?action=App&LidApp="+LId+"&v="+v+"&LeT="+LT+"&FD="+FD+"&TD="+TD+"&TotD="+TotD+"&EI="+EI+"&page="+PG+"&App="+App+"&Hod="+Hod+"&UI="+UI+"&ls="+ls+"&yly="+yly+"&YI="+YI+"&Cmt="+Cmt;  window.location=x;
   }
 }
		   
 else if(v==3)
 { var agree=confirm("Are you sure you want to disapproved status this apply leave?"); 
   if (agree) 
   { 
    var x = "LeaveApproved.php?action=Dis&LD="+LId+"&v="+v+"&page="+PG+"&App="+App+"&Hod="+Hod+"&EI="+EI+"&UI="+UI+"&ls="+ls+"&yly="+yly+"&wew=q12q&e=ere&YI="+YI+"&Cmt="+Cmt;  window.location=x;
   }
 }
 
}

</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#E0DBE3">	
<?php  $sqlE=mysql_query("select EmpCode, Fname, Sname, Lname from hrm_employee where EmployeeID=".$_REQUEST['EI'], $con); 
       $resE=mysql_fetch_assoc($sqlE); $EmpName=$resE['EmpCode'].'/'.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?>	
<center>
 <form name="form" method="post" onSubmit="return validate(this)"/>
<table>
 <tr>
  <td>
   <table style="width:540px;" border="1" bgcolor="#FFFFFF">
   <tr><td align="center" colspan="4" style="width:540px;font-family:Times New Roman;size:15px; color:#8A0000;">
   <b><?php if($_REQUEST['action']=='App'){echo 'Approve';}elseif($_REQUEST['action']=='Dis'){echo 'Dis-Approve';} ?> Leave</b></td></tr>
   <tr>
     <td style="width:100px;font-family:Times New Roman;size:13px;">&nbsp;<b>EC/Name :</b></td>
     <td style="width:300px;font-family:Times New Roman;size:15px;">&nbsp;<?php echo $EmpName; ?></td>
     <td style="width:100px;font-family:Times New Roman;size:13px;">&nbsp;<b>Leave :</b></td>
     <td style="width:50px;font-family:Times New Roman;size:15px;">&nbsp;<?php echo $_REQUEST['LeT']; ?></td>
   </tr>
   <tr>
    <td colspan="2" style="width:400px;font-family:Times New Roman;size:13px;">
    &nbsp;<b>Apply Leave Date :&nbsp;&nbsp;<font color="#007100"><?php echo date("d-m-Y",strtotime($_REQUEST['FD'])); ?></font> to <font color="#007100"><?php echo date("d-m-Y",strtotime($_REQUEST['TD'])); ?></font></b></td>
    <td style="width:100px;font-family:Times New Roman;size:13px;">&nbsp;<b>Total Day :</b></td>
    <td style="width:50px;font-family:Times New Roman;size:15px;">&nbsp;<?php echo $_REQUEST['TotD']; ?></td>
   </tr>
   </table>
  </td>
 </tr>
 <tr>
  <td>
   <table style="width:540px;" border="0">
   <tr>
     <td style="width:80px;font-family:Times New Roman;size:13px;" valign="top">&nbsp;<b>Remark :</b>&nbsp;</td>
     <td style="width:440px;font-family:Times New Roman;size:13px;">
	 <textarea id="Comment" name="Comment" rows="2" cols="65" style="font-family:Times New Roman;"></textarea></td>
   </tr>
   <tr><td colspan="2" style="width:540px;" align="right">
	   <input type="button" name="SaveLeave" id="SaveLeave" style="width:80px;" value="save" onClick="ClickSave('<?php echo $_REQUEST['action']; ?>','<?php echo $_REQUEST['AppLeave']; ?>',<?php echo $_REQUEST['lid'].','.$_REQUEST['v']; ?>,'<?php echo $_REQUEST['LeT']; ?>','<?php echo $_REQUEST['FD']; ?>','<?php echo $_REQUEST['TD']; ?>',<?php echo $_REQUEST['TotD'].','.$_REQUEST['EI'].','.$_REQUEST['page'].','.$_REQUEST['App'].','.$_REQUEST['Hod'].','.$_REQUEST['UI'].','.$_REQUEST['ls'].','.$_REQUEST['yly'].','.$_REQUEST['YI']; ?>)" />&nbsp;&nbsp;</td>
   </tr>
   </table>
  </td>
 </tr>
</table>
</form>
</center>  
</body>
</html>
