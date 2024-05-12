<?php require_once('AdminUser/config/config.php'); 

//viewto=".base64_encode('A')."&totd=".base64_encode($TotDays)."&ei=".base64_encode($EmployeeId)."&fd=".base64_encode($_POST['FromDate'])."&td=".base64_encode($_POST['ToDate'])."&lp=".base64_encode($_POST['LeaveType'])."&aplydt=".base64_encode(date('Y-m-d'))."&eType=".base64_encode('Rep')."&yi=".base64_encode($YearId)."'

//echo 'For :'.$action=base64_decode($_REQUEST['viewto']); 
//echo '<br>Emp: '.$ei=base64_decode($_REQUEST['ei']); 
//echo '<br>Tot Day: '.$tot_day=base64_decode($_REQUEST['totd']);
//echo '<br>From Day: '.$fdate=base64_decode($_REQUEST['fd']); 
//echo '<br>To Day: '.$tdate=base64_decode($_REQUEST['td']);
//echo '<br>Leave Type: '.$lv_type=base64_decode($_REQUEST['lp']); 
//echo '<br>Apply Date: '.$apply_date=base64_decode($_REQUEST['aplydt']);
//echo '<br>Emp Type: '.$eType=base64_decode($_REQUEST['eType']);
//echo '<br>YearId: '.$YearId=base64_decode($_REQUEST['yi']);

$action=base64_decode($_REQUEST['viewto']); 
$ei=base64_decode($_REQUEST['ei']); 
$tot_day=base64_decode($_REQUEST['totd']);
$fdate=base64_decode($_REQUEST['fd']); 
$tdate=base64_decode($_REQUEST['td']);
$lv_type=base64_decode($_REQUEST['lp']); 
$apply_date=base64_decode($_REQUEST['aplydt']);
$eType=base64_decode($_REQUEST['eType']);
$YearId=base64_decode($_REQUEST['yi']);

$sql=mysql_query("select ApplyLeaveId, Apply_Reason, Apply_SentToApp, Apply_SentToRev from hrm_employee_applyleave where EmployeeID=".$ei." AND Apply_Date='".date("Y-m-d",strtotime($apply_date))."' AND Leave_Type='".$lv_type."' AND Apply_FromDate='".date("Y-m-d",strtotime($fdate))."' AND Apply_ToDate='".date("Y-m-d",strtotime($tdate))."'",$con);
 $res=mysql_fetch_assoc($sql); $LvId=$res['ApplyLeaveId']; $RId=$res['Apply_SentToApp']; $RevId=$res['Apply_SentToRev'];
  
  $Fday=date("d",strtotime($fdate)); $Fmonth=date("m",strtotime($fdate)); $Fyear=date("Y",strtotime($fdate));
  $Tday=date("d",strtotime($tdate)); $Tmonth=date("m",strtotime($tdate)); $Tyear=date("Y",strtotime($tdate));
  $startTimeStamp = strtotime($fdate); $endTimeStamp = strtotime($tdate);
  $mkdate = mktime(0,0,0, $Fmonth, 1, $Fyear); $DateFmonth = date('t',$mkdate);
  $FromDate=date("d-m-Y",strtotime($fdate)); $ToDate=date("d-m-Y",strtotime($tdate)); 
  $ApplyDate=date("d-m-Y",strtotime($apply_date)); 
  $search =  '*"#$%@~/\':'; $search = str_split($search); $Reason=str_replace($search, "", $res['Apply_Reason']);
  
  $sqlE=mysql_query("select Fname,Sname,Lname,EmailId_Vnr,Gender,DR,Married from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where e.EmployeeID=".$ei, $con); $resE=mysql_fetch_assoc($sqlE);
  if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];

if($eType=='Rep')
{
  
 
 
/*Rep Rep Rep Rep Open Rep Rep Rep Rep Open */
/*Rep Rep Rep Rep Open Rep Rep Rep Rep Open */
  
 if($action=='A')
 {
  
  if($lv_type=='PL' AND $RId!=$RevId)
  { 
   
   $sqlUp=mysql_query("update hrm_employee_applyleave set LeaveStatus=1, LeaveAppStatus=2, LeaveAppUpDate='".date("Y-m-d")."', ApplyLeave_UpdatedYearId=".$YearId." where ApplyLeaveId=".$LvId, $con);  
   $sqlHod=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$RevId, $con); 
   $resHod=mysql_fetch_assoc($sqlHod);
	 
    if($sqlUp AND $lv_type=='PL' AND $resHod['EmailId_Vnr']!='')
    {
    $email_to = $resHod['EmailId_Vnr'];
    $email_from='admin@vnrseeds.co.in';
    $email_subject = "Leave Application";
    $headers = "From: " . $email_from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$email_message .= "<html><head></head><body>";
	$email_message .= $NameE." has submitted leave application for <b>".$lv_type."</b> from <b>".$FromDate."</b> to <b>".$ToDate."</b>, reason stated as <b>" .$Reason. "</b>, login in ESS to Approve/Reject or click on the following buttons:<br><br>\n\n";
	
	$email_message .="<a href='https://www.vnrseeds.co.in/hrims/lvapi.php?viewto=".base64_encode('A')."&td=".base64_encode($tot_day)."&ei=".base64_encode($ei)."&fd=".base64_encode($fdate)."&td=".base64_encode($tdate)."&lp=".base64_encode($lv_type)."&aplydt=".base64_encode($apply_date)."&eType=".base64_encode('Hod')."&yi=".base64_encode($YearId)."' style='text-decoration:none;cursor:pointer;'><input type='button' value='Accept' style='width:90px;' /></a>&nbsp;&nbsp;&nbsp;<a href='https://www.vnrseeds.co.in/hrims/lvapi.php?viewto=".base64_encode('R')."&td=".base64_encode($tot_day)."&ei=".base64_encode($ei)."&fd=".base64_encode($fdate)."&td=".base64_encode($tdate)."&lp=".base64_encode($lv_type)."&aplydt=".base64_encode($apply_date)."&eType=".base64_encode('Hod')."&yi=".base64_encode($YearId)."' style='text-decoration:none;cursor:pointer;'><input type='button' value='Reject' style='width:90px;' /></a><br><br>\n\n";
	$email_message .= " If rejected, please submit the reason.<br><br>\n\n";
    $email_message .="From,<br>Admin ESS<br>";
	$email_message .="</body></html>";
    $ok = @mail($email_to, $email_subject, $email_message, $headers);
	
	$msg='Leave approved successfully...';
	
    }  
  
  } //if($lv_type=='PL' AND $RId!=$RevId)
  else //11111 Start
  {  
   
//____________________________  Close ______________________________________________//
//____________________________  Close ______________________________________________//  
   if($Fmonth==$Tmonth) 
   { 
     
    for($i=$Fday; $i<=$Tday; $i++) 
    { if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	  { 
	   
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2); 
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$ei.",'".$lv_type."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','".$Fyear."',".$YearId.")", $con); 
	   }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$lv_type."' where EmployeeID=".$ei." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	   }
	  } 
	  elseif(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $lv_type=='EL') 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$ei.",'".$lv_type."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','Y','".$Fyear."',".$YearId.")", $con); 
	   }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$lv_type."',CheckSunday='Y' where EmployeeID=".$ei." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	   }
	  } 
    }  
   
   } //if($Fmonth==$Tmonth)
   elseif($Fmonth!=$Tmonth AND $Fyear==$Tyear)
   { 
   
    for($i=$Fday; $i<=$DateFmonth; $i++) 
	{ if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$ei.",'".$lv_type."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','".$Fyear."',".$YearId.")", $con); 
	   }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$lv_type."' where EmployeeID=".$ei." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	   }
	  }     
	  elseif(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $lv_type=='EL') 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$ei.",'".$lv_type."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','Y','".$Fyear."',".$YearId.")", $con); 
	   }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$lv_type."',CheckSunday='Y' where EmployeeID=".$ei." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	   }
	  }     
	} 
	for($i=1; $i<=$Tday; $i++) 
	{ if(date("w",strtotime(date($Fyear.'-'.$Tmonth.'-'.$i)))!=0) 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." and AttDate='".date($Fyear."-".$Tmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." and AttDate='".date($Fyear."-".$Tmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$ei.",'".$lv_type."','".date($Fyear.'-'.$Tmonth.'-'.$i)."','".$Fyear."',".$YearId.")", $con); 
	   }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$lv_type."' where EmployeeID=".$ei." AND AttDate='".date($Fyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	   }
	  } 
	  elseif(date("w",strtotime(date($Fyear.'-'.$Tmonth.'-'.$i)))==0 AND $lv_type=='EL') 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." and AttDate='".date($Fyear."-".$Tmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." and AttDate='".date($Fyear."-".$Tmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$ei.",'".$lv_type."','".date($Fyear.'-'.$Tmonth.'-'.$i)."','Y','".$Fyear."',".$YearId.")", $con); 
	   }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$lv_type."',CheckSunday='Y' where EmployeeID=".$ei." AND AttDate='".date($Fyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	   }
	  } 
	}     
   
   } //elseif($Fmonth!=$Tmonth AND $Fyear==$Tyear)
   elseif($Fmonth!=$Tmonth AND $Fyear!=$Tyear)
   { 
   
    for($i=$Fday; $i<=$DateFmonth; $i++) 
    { if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$ei.",'".$lv_type."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','".$Fyear."',".$YearId.")", $con); 
	   }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$lv_type."' where EmployeeID=".$ei." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	   }
	  } 
	  elseif(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $lv_type=='EL') 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$ei.",'".$lv_type."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','Y','".$Fyear."',".$YearId.")", $con); 
	   }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$lv_type."',CheckSunday='Y' where EmployeeID=".$ei." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	   }
	  } 
	}     
	for($i=1; $i<=$Tday; $i++) 
	{ if(date("w",strtotime(date($Tyear.'-'.$Tmonth.'-'.$i)))!=0) 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." and AttDate='".date($Tyear."-".$Tmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." and AttDate='".date($Tyear."-".$Tmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$ei.",'".$lv_type."','".date($Tyear.'-'.$Tmonth.'-'.$i)."','".$Tyear."',".$YearId.")", $con); 
	   }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$lv_type."' where EmployeeID=".$ei." AND AttDate='".date($Tyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	   }
	  }  
	  else if(date("w",strtotime(date($Tyear.'-'.$Tmonth.'-'.$i)))==0 AND $lv_type=='EL') 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." and AttDate='".date($Tyear."-".$Tmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." and AttDate='".date($Tyear."-".$Tmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$ei.",'".$lv_type."','".date($Tyear.'-'.$Tmonth.'-'.$i)."','Y','".$Tyear."',".$YearId.")", $con); 
	   }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$lv_type."',CheckSunday='Y' where EmployeeID=".$ei." AND AttDate='".date($Tyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	   }
	  }  
	}
	    
   } //elseif($Fmonth!=$Tmonth AND $Fyear!=$Tyear)
//____________________________  Close ______________________________________________//
//____________________________  Close ______________________________________________//
	
//**************** Update hrm_employee_leave Table OPEN*********************// 
//**************** Update hrm_employee_leave Table OPEN*********************// 
 if($sIns)
 { 
 
  $m=date("m"); $y=date("Y"); $id=$ei;
  $mk2date = mktime(0,0,0, $m, 1, $y); $day = date('t',$mk2date);
 
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
   $SL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$id." AND Month='".$m."' AND Year='".$y."'"); $RowL=mysql_num_rows($SL);
   if($RowL>0)
   { 
    $RL=mysql_fetch_assoc($SL);   
    if($m!=1){ $TotBalCL=$RL['OpeningCL']-$TotalCL;  $TotBalSL=$RL['OpeningSL']-$TotalSL; 
	 $TotBalPL=$RL['OpeningPL']-$TotalPL; $TotBalEL=$RL['OpeningEL']-$TotalEL; $TotBalFL=$RL['OpeningOL']-$TotalFL; }  
    if($m==1){ $TotBalCL=$RL['TotCL']-$TotalCL;  $TotBalSL=$RL['TotSL']-$TotalSL; $TotBalPL=$RL['TotPL']-$TotalPL;  
     $TotBalEL=$RL['TotEL']-($TotalEL+$RL['EnCashEL']); $TotBalFL=$RL['TotOL']-$TotalFL; }
	
	$sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedEL='".$TotalEL."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceEL='".$TotBalEL."', BalanceOL='".$TotBalFL."' where EmployeeID=".$id." AND Month='".$m."' AND Year='".$y."'", $con); 
   }
//*********** hrm_employee_monthlyleave_balance close *************************//

  //echo '<br>'.$RId.'!='.$RevId;
  if($RId!=$RevId){  $sqlUp=mysql_query("update hrm_employee_applyleave set LeaveStatus=2, LeaveAppStatus=2, LeaveAppUpDate='".date("Y-m-d")."', ApplyLeave_UpdatedYearId=".$YearId." where ApplyLeaveId=".$LvId, $con); 
  }
  elseif($RId==$RevId){ $sqlUp=mysql_query("update hrm_employee_applyleave set LeaveStatus=2, LeaveAppStatus=2, LeaveAppUpDate='".date("Y-m-d")."', LeaveHodStatus=2, LeaveHodUpDate='".date("Y-m-d")."', ApplyLeave_UpdatedYearId=".$YearId." where ApplyLeaveId=".$LvId, $con); 
  }
  if($sqlUp)
  {
     if($action=='A' AND $resE['EmailId_Vnr']!='')
     {
      $email_to2 = $resE['EmailId_Vnr'];
      $email_from2='admin@vnrseeds.co.in';
      $email_subject2 = "Leave Approved";
      $email_txt2 = "Leave Approved"; 
      $headers2 = "From: ".$email_from2."\r\n"; 
      $semi_rand2 = md5(time()); 
      $headers2 .= "MIME-Version: 1.0\r\n";
      $headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $email_message2 .="<html><head></head><body>";
      $email_message2 .= "Dear <b>".$NameE."</b> <br><br>\n\n\n";
      $email_message2 .=" Your leave request for ".$lv_type.", from date ".$FromDate." to ".$ToDate." is approved. For details, kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br><br>\n\n";
      $email_message2 .= "From <br><b>ADMIN ESS</b><br>";
      $email_message2 .="</body></html>";	      
      $ok = @mail($email_to2, $email_subject2, $email_message2, $headers2);
     }  
   
   $msg='Leave approved successfully...';
  }
  
 } //if($sIns)
 else {$msg='Error...';}
//*************************************** Update hrm_employee_leave Table CLOSE*****************// 
//*************************************** Update hrm_employee_leave Table CLOSE*****************// 
  
  } ////11111 Close
  
   

 }
 elseif($action=='R')
 {
  
  if($action=='R' && $_REQUEST['SubReason']!='')
  {
   
   $sqlUp=mysql_query("update hrm_employee_applyleave set LeaveStatus=3, LeaveAppStatus=3, LeaveAppReason='".$_REQUEST['SubReason']."', LeaveAppUpDate='".date("Y-m-d")."', ApplyLeave_UpdatedYearId=".$YearId." where ApplyLeaveId=".$_REQUEST['LvId'], $con);
   if($sqlUp)
   {
    $sEmp=mysql_query("select EmployeeID,Leave_Type,Apply_FromDate,Apply_ToDate from hrm_employee_applyleave where ApplyLeaveId=".$LvId, $con); $resEmp=mysql_fetch_assoc($sEmp); 
    $FromDate=date("d-m-Y",strtotime($resEmp['Apply_FromDate'])); $ToDate=date("d-m-Y",strtotime($resEmp['Apply_ToDate']));
    $sqlE=mysql_query("select Fname,Sname,Lname,EmailId_Vnr,Gender,DR,Married from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where e.EmployeeID=".$resEmp['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE);
    if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';} $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 

     if($resE['EmailId_Vnr']!='')
     {
      $email_to3 = $resE['EmailId_Vnr'];
      $email_from3='admin@vnrseeds.co.in';
      $email_subject3 = "Leave Rejected";
      $email_txt3 = "Leave Rejected"; 
      $headers3 = "From: ".$email_from3."\r\n"; 
      $semi_rand3 = md5(time()); 
      $headers3 .= "MIME-Version: 1.0\r\n";
      $headers3 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $email_message3 .="<html><head></head><body>";
      $email_message3 .= "Dear <b>".$NameE."</b> <br><br>\n\n\n";
      $email_message3 .=" Your leave request for ".$resEmp['Leave_Type'].", from date ".$FromDate." to ".$ToDate." is rejected. For details, kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br><br>\n\n";
      $email_message3 .= "From <br><b>ADMIN ESS</b><br>";
      $email_message3 .="</body></html>";	      
      $ok = @mail($email_to3, $email_subject3, $email_message3, $headers3);
     }  
     $msg='Leave rejected successfully...';
   }
  
  } //if($action=='R' && isset($_POST['SubReason']))
  
  ?>
  
   <script type="text/javascript" language="javascript">
   function FunSubReason()
   {
    if(document.getElementById("SubReason").value!='')
	{
	 var viewto = document.getElementById("viewto").value; var ei = document.getElementById("ei").value;
	 var totd = document.getElementById("totd").value; var fd = document.getElementById("fd").value;
	 var td = document.getElementById("td").value; var lp = document.getElementById("lp").value;
	 var aplydt = document.getElementById("aplydt").value; var eType = document.getElementById("eType").value;
	 var yi = document.getElementById("yi").value; var LvId = document.getElementById("LvId").value; 
	 var SubReason = document.getElementById("SubReason").value.replace(/[`~!@#$%^&*()_|+\-=???;:'",.<>\{\}\[\]\\\/]/gi, '');
	
	 window.location="lvapi.php?viewto="+viewto+"&totd="+totd+"&ei="+ei+"&fd="+fd+"&td="+td+"&lp="+lp+"&aplydt="+aplydt+"&eType="+eType+"&yi="+yi+"&SubReason="+SubReason+"&LvId="+LvId;
	}
	else{ alert("Please type reason!"); return false; }
   }
   </script>
   <input type="hidden" id="viewto" value="<?=$_REQUEST['viewto']?>" />
   <input type="hidden" id="ei" value="<?=$_REQUEST["ei"]?>" />
   <input type="hidden" id="totd" value="<?=$_REQUEST["totd"]?>" />
   <input type="hidden" id="fd" value="<?=$_REQUEST["fd"]?>" />
   <input type="hidden" id="td" value="<?=$_REQUEST["td"]?>" />
   <input type="hidden" id="lp" value="<?=$_REQUEST["lp"]?>" />
   <input type="hidden" id="aplydt" value="<?=$_REQUEST["aplydt"]?>" />
   <input type="hidden" id="eType" value="<?=$_REQUEST["eType"]?>" />
   <input type="hidden" id="yi" value="<?=$_REQUEST["yi"]?>" />
   <input type="hidden" id="LvId" value="<?=$LvId?>" />
   <P><br /><br />
   <font style="font-family:Times New Roman;font-size:16px;"><b> Please type reason, if leave is rejected.</b></font><br /><br />
   <textarea name="SubReason" id="SubReason" placeholder="Please type reason" cols="50" rows="4"></textarea><br />
   <input type="button" style="width:100px;height:25px;" onclick="FunSubReason()" value="Submit" /> 
  
  <?php 
 } //elseif($action=='R')

/*Rep Rep Rep Rep Close Rep Rep Rep Rep Close */
/*Rep Rep Rep Rep Close Rep Rep Rep Rep Close */  

} //else if($eType=='Rep')
else if($eType=='Hod')
{
  
/*Hod Hod Hod Hod Open Hod Hod Hod Hod Open */
/*Hod Hod Hod Hod Open Hod Hod Hod Hod Open */

 if($action=='A')
 {  
	
  if($Fmonth==$Tmonth) 
  { for($i=$Fday; $i<=$Tday; $i++) 
    { if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$ei.",'".$lv_type."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','".$Fyear."',".$YearId.")", $con); 
	   }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$lv_type."' where EmployeeID=".$ei." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	   }
	  } 
	  elseif(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $lv_type=='EL') 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$ei.",'".$lv_type."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','Y','".$Fyear."',".$YearId.")", $con); 
	   }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$lv_type."',CheckSunday='Y' where EmployeeID=".$ei." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	   }
	  } 
    }  
  } //if($Fmonth==$Tmonth)
  
  elseif($Fmonth!=$Tmonth AND $Fyear==$Tyear)
  { for($i=$Fday; $i<=$DateFmonth; $i++) 
	{ if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$ei.",'".$lv_type."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','".$Fyear."',".$YearId.")", $con); 
	   }
       elseif($row>0 AND $row2==0){ $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$lv_type."' where EmployeeID=".$ei." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	   }
	  }     
	  elseif(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $lv_type=='EL') 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$ei.",'".$lv_type."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','Y','".$Fyear."',".$YearId.")", $con); 
	   }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$lv_type."',CheckSunday='Y' where EmployeeID=".$ei." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	   }
	  }  
	} 
	for($i=1; $i<=$Tday; $i++) 
	{ if(date("w",strtotime(date($Fyear.'-'.$Tmonth.'-'.$i)))!=0) 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate='".date($Fyear."-".$Tmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate='".date($Fyear."-".$Tmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$ei.",'".$lv_type."','".date($Fyear.'-'.$Tmonth.'-'.$i)."','".$Fyear."',".$YearId.")", $con); 
	   }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$lv_type."' where EmployeeID=".$ei." AND AttDate='".date($Fyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	   }
	  } 
	  elseif(date("w",strtotime(date($Fyear.'-'.$Tmonth.'-'.$i)))==0 AND $lv_type=='EL') 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate='".date($Fyear."-".$Tmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate='".date($Fyear."-".$Tmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$ei.",'".$lv_type."','".date($Fyear.'-'.$Tmonth.'-'.$i)."','Y','".$Fyear."',".$YearId.")", $con); 
	   }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$lv_type."',CheckSunday='Y' where EmployeeID=".$ei." AND AttDate='".date($Fyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	   }
	  } 
	}     
  } //elseif($Fmonth!=$Tmonth AND $Fyear==$Tyear)
	 
  elseif($Fmonth!=$Tmonth AND $Fyear!=$Tyear)
  { for($i=$Fday; $i<=$DateFmonth; $i++) 
    { if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$ei.",'".$lv_type."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','".$Fyear."',".$YearId.")", $con); 
	   }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$lv_type."' where EmployeeID=".$ei." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	   }
	  } 
	  elseif(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $lv_type=='EL') 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$ei.",'".$lv_type."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','Y','".$Fyear."',".$YearId.")", $con); 
	   }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$lv_type."',CheckSunday='Y' where EmployeeID=".$ei." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	   }
	  } 
	}     
	for($i=1; $i<=$Tday; $i++) 
	{ if(date("w",strtotime(date($Tyear.'-'.$Tmonth.'-'.$i)))!=0) 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate='".date($Tyear."-".$Tmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate='".date($Tyear."-".$Tmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$ei.",'".$lv_type."','".date($Tyear.'-'.$Tmonth.'-'.$i)."','".$Tyear."',".$YearId.")", $con); 
	   }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$lv_type."' where EmployeeID=".$ei." AND AttDate='".date($Tyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	   }
	  }  
	  elseif(date("w",strtotime(date($Tyear.'-'.$Tmonth.'-'.$i)))==0 AND $lv_type=='EL') 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate='".date($Tyear."-".$Tmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	   $Sql2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate='".date($Tyear."-".$Tmonth."-".$i)."' AND AttValue='HO'", $con); 
	   $row2=mysql_num_rows($Sql2);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$ei.",'".$lv_type."','".date($Tyear.'-'.$Tmonth.'-'.$i)."','Y','".$Tyear."',".$YearId.")", $con); 
	   }
       elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$lv_type."',CheckSunday='Y' where EmployeeID=".$ei." AND AttDate='".date($Tyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	   }
	  }  
	}    
  } //elseif($Fmonth!=$Tmonth AND $Fyear!=$Tyear)

//____________________________  Close ______________________________________________//
//____________________________  Close ______________________________________________//
	
//**************** Update hrm_employee_leave Table OPEN*********************// 
//**************** Update hrm_employee_leave Table OPEN*********************//   
 if($sIns)
 { 
 
  $m=date("m"); $y=date("Y"); $id=$ei;
  $mk2date = mktime(0,0,0, $m, 1, $y); $day = date('t',$mk2date);
 
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
   $SL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$id." AND Month='".$m."' AND Year='".$y."'"); $RowL=mysql_num_rows($SL);
   if($RowL>0)
   { 
    $RL=mysql_fetch_assoc($SL);   
    if($m!=1){ $TotBalCL=$RL['OpeningCL']-$TotalCL;  $TotBalSL=$RL['OpeningSL']-$TotalSL; 
	 $TotBalPL=$RL['OpeningPL']-$TotalPL; $TotBalEL=$RL['OpeningEL']-$TotalEL; $TotBalFL=$RL['OpeningOL']-$TotalFL; }  
    if($m==1){ $TotBalCL=$RL['TotCL']-$TotalCL;  $TotBalSL=$RL['TotSL']-$TotalSL; $TotBalPL=$RL['TotPL']-$TotalPL;  
     $TotBalEL=$RL['TotEL']-($TotalEL+$RL['EnCashEL']); $TotBalFL=$RL['TotOL']-$TotalFL; }
	
	$sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedEL='".$TotalEL."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceEL='".$TotBalEL."', BalanceOL='".$TotBalFL."' where EmployeeID=".$id." AND Month='".$m."' AND Year='".$y."'", $con); 
   }
//*********** hrm_employee_monthlyleave_balance close *************************//

  
  $sqlUp=mysql_query("update hrm_employee_applyleave set LeaveStatus=2, LeaveHodStatus=2, LeaveHodUpDate='".date("Y-m-d")."', ApplyLeave_UpdatedYearId=".$YearId." where ApplyLeaveId=".$LvId, $con);
  if($sqlUp)
  {
     if($action=='A' AND $resE['EmailId_Vnr']!='')
     {
      $email_to2 = $resE['EmailId_Vnr'];
      $email_from2='admin@vnrseeds.co.in';
      $email_subject2 = "Leave Approved";
      $email_txt2 = "Leave Approved"; 
      $headers2 = "From: ".$email_from2."\r\n"; 
      $semi_rand2 = md5(time()); 
      $headers2 .= "MIME-Version: 1.0\r\n";
      $headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $email_message2 .="<html><head></head><body>";
      $email_message2 .= "Dear <b>".$NameE."</b> <br><br>\n\n\n";
      $email_message2 .=" Your leave request for ".$lv_type.", from date ".$FromDate." to ".$ToDate." is approved. For details, kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br><br>\n\n";
      $email_message2 .= "From <br><b>ADMIN ESS</b><br>";
      $email_message2 .="</body></html>";	      
      $ok = @mail($email_to2, $email_subject2, $email_message2, $headers2);
     }  
   
   $msg='Leave approved successfully...';
  }
  
 } //if($sIns)
 else {$msg='Error...';}
//************* Update hrm_employee_leave Table CLOSE**************************// 
/**************************************************/  
  

 } //if($action=='A')
 elseif($action=='R')
 {
 
  if($action=='R' && $_REQUEST['SubReasonHod']!='')
  {
 
   $sqlUp=mysql_query("update hrm_employee_applyleave set LeaveStatus=3, LeaveHodStatus=3, LeaveHodReason='".$_REQUEST['SubReasonHod']."', LeaveHodUpDate='".date("Y-m-d")."', ApplyLeave_UpdatedYearId=".$YearId." where ApplyLeaveId=".$_REQUEST['LvId'], $con);
   if($sqlUp)
   {
    $sEmp=mysql_query("select EmployeeID,Leave_Type,Apply_FromDate,Apply_ToDate from hrm_employee_applyleave where ApplyLeaveId=".$LvId, $con); $resEmp=mysql_fetch_assoc($sEmp); 
    $FromDate=date("d-m-Y",strtotime($resEmp['Apply_FromDate'])); $ToDate=date("d-m-Y",strtotime($resEmp['Apply_ToDate']));
    $sqlE=mysql_query("select Fname,Sname,Lname,EmailId_Vnr,Gender,DR,Married from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where e.EmployeeID=".$resEmp['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE);
    if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';} $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 

     if($resE['EmailId_Vnr']!='')
     {
      $email_to3 = $resE['EmailId_Vnr'];
      $email_from3='admin@vnrseeds.co.in';
      $email_subject3 = "Leave Rejected";
      $email_txt3 = "Leave Rejected"; 
      $headers3 = "From: ".$email_from3."\r\n"; 
      $semi_rand3 = md5(time()); 
      $headers3 .= "MIME-Version: 1.0\r\n";
      $headers3 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $email_message3 .="<html><head></head><body>";
      $email_message3 .= "Dear <b>".$NameE."</b> <br><br>\n\n\n";
      $email_message3 .=" Your leave request for ".$resEmp['Leave_Type'].", from date ".$FromDate." to ".$ToDate." is rejected. For details, kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br><br>\n\n";
      $email_message3 .= "From <br><b>ADMIN ESS</b><br>";
      $email_message3 .="</body></html>";	      
      $ok = @mail($email_to3, $email_subject3, $email_message3, $headers3);
     }  
      $msg='Leave rejected successfully...';
   } //if($sqlUp)

  } //if($action=='R' && $_REQUEST['SubReasonHod']!='')
  
  
  ?>
  
   <script type="text/javascript" language="javascript">
   function FunSubReasonHod()
   {
    if(document.getElementById("SubReasonHod").value!='')
	{
	 var viewto = document.getElementById("viewto").value; var ei = document.getElementById("ei").value;
	 var totd = document.getElementById("totd").value; var fd = document.getElementById("fd").value;
	 var td = document.getElementById("td").value; var lp = document.getElementById("lp").value;
	 var aplydt = document.getElementById("aplydt").value; var eType = document.getElementById("eType").value;
	 var yi = document.getElementById("yi").value; var LvId = document.getElementById("LvId").value; 
	 var SubReason = document.getElementById("SubReasonHod").value.replace(/[`~!@#$%^&*()_|+\-=???;:'",.<>\{\}\[\]\\\/]/gi, '');
	
	 window.location="lvapi.php?viewto="+viewto+"&totd="+totd+"&ei="+ei+"&fd="+fd+"&td="+td+"&lp="+lp+"&aplydt="+aplydt+"&eType="+eType+"&yi="+yi+"&SubReasonHod="+SubReasonHod+"&LvId="+LvId;
	}
	else{ alert("Please type reason!"); return false; }
   }
   </script>
   <input type="hidden" id="viewto" value="<?=$_REQUEST['viewto']?>" />
   <input type="hidden" id="ei" value="<?=$_REQUEST["ei"]?>" />
   <input type="hidden" id="totd" value="<?=$_REQUEST["totd"]?>" />
   <input type="hidden" id="fd" value="<?=$_REQUEST["fd"]?>" />
   <input type="hidden" id="td" value="<?=$_REQUEST["td"]?>" />
   <input type="hidden" id="lp" value="<?=$_REQUEST["lp"]?>" />
   <input type="hidden" id="aplydt" value="<?=$_REQUEST["aplydt"]?>" />
   <input type="hidden" id="eType" value="<?=$_REQUEST["eType"]?>" />
   <input type="hidden" id="yi" value="<?=$_REQUEST["yi"]?>" />
   <input type="hidden" id="LvId" value="<?=$LvId?>" />
   <P><br /><br />
   <font style="font-family:Times New Roman;font-size:16px;"><b>Please type reason, if leave is rejected.</b></font><br /><br />
   <textarea name="SubReasonHod" id="SubReasonHod" placeholder="Please type reason" cols="50" rows="4"></textarea><br />
   <input type="button" style="width:100px;height:25px;" onclick="FunSubReasonHod()" value="Submit" <?php if($msg=='Leave rejected successfully...'){echo 'disabled';} ?> /> 
  
  <?php 
  
  
 } //elseif($action=='R')


/*Hod Hod Hod Hod Close Hod Hod Hod Hod Close*/   
/*Hod Hod Hod Hod Close Hod Hod Hod Hod Close*/
         
} //else if($eType=='Hod')

echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Team Leave</title>
</head>
<body>';
echo '</body>
</html>';

?>
<P><br />
<font style="color:#00AE00;font-family:Times New Roman;font-size:18px;"><i><b><?=$msg;?></b></i></font>





