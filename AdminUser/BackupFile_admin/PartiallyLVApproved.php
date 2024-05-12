<?php require_once('../AdminUser/config/config.php');  ?>		
<?php 
if(isset($_POST['SubmitLeave']))
{ 
  $Fday=date("d",strtotime($_POST['FromDate'])); $Fmonth=date("m",strtotime($_POST['FromDate'])); $Fyear=date("Y",strtotime($_POST['FromDate']));
  $Tday=date("d",strtotime($_POST['ToDate'])); $Tmonth=date("m",strtotime($_POST['ToDate'])); $Tyear=date("Y",strtotime($_POST['ToDate']));
  $startTimeStamp = strtotime($_POST['FromDate']); $endTimeStamp = strtotime($_POST['TD']);
  if($Fmonth==01){$DateFmonth=31;} 
  elseif($Fmonth==02){ if($Fyear==2012 OR $Fyear==2016 OR $Fyear==2020 OR $Fyear==2024 OR $Fyear==2028 OR $Fyear==2032) {$DateFmonth=29;}else{$DateFmonth=28;}} 
  elseif($Fmonth==03){$DateFmonth=31;}  elseif($Fmonth==04){$DateFmonth=30;}  elseif($Fmonth==05){$DateFmonth=31;}  elseif($Fmonth==06){$DateFmonth=30;}
  elseif($Fmonth==07){$DateFmonth=31;}  elseif($Fmonth==08){$DateFmonth=31;}  elseif($Fmonth==09){$DateFmonth=30;}  elseif($Fmonth==10){$DateFmonth=31;}
  elseif($Fmonth==11){$DateFmonth=30;}  elseif($Fmonth==12){$DateFmonth=31;} 
  $FromDate=date("d-m-Y",strtotime($_POST['FromDate'])); $ToDate=date("d-m-Y",strtotime($_POST['ToDate']));
  $YearId=$_POST['YI'];
  if($_POST['LeT']=='PL' AND $_POST['App']!=$_POST['Hod'])
  { 
   $sqlUp=mysql_query("update hrm_employee_applyleave set Apply_FromDate='".date("Y-m-d",strtotime($_POST['FromDate']))."', Apply_ToDate='".date("Y-m-d",strtotime($_POST['ToDate']))."', Apply_TotalDay='".$_POST['TotDay']."', LeaveStatus=1, LeaveAppStatus=".$_POST['v'].", LeaveAppUpDate='".date("Y-m-d")."', ApplyLeave_UpdatedYearId=".$YearId.", Partial='Y', PartialComment='".$_POST['Comment']."' where ApplyLeaveId=".$_POST['lid'], $con);  
   $sqlHod=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$_POST['Hod'], $con); $resHod=mysql_fetch_assoc($sqlHod);
   $sqlE=mysql_query("select Fname,Sname,Lname,EmailId_Vnr,Gender,DR,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$_POST['EI'], $con); $resE=mysql_fetch_assoc($sqlE);
   if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
   
/*	 
  if($_POST['LeT']=='PL' AND $resHod['EmailId_Vnr']!='')
  { $email_to = $resHod['EmailId_Vnr'];
    if($resE['EmailId_Vnr']==''){$email_from = $NameE;} else {$email_from=$resE['EmailId_Vnr'];}
    $email_subject = "Leave Application"; $email_txt = "Leave Application";
    $headers = "From: ".$email_from; $semi_rand = md5(time()); 
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
    $headers .= "\nMIME-Version: 1.0\n" . 
			    "Content-Type: multipart/mixed;\n" . 
			    " boundary=\"{$mime_boundary}\""; 
    $email_message .= "This is a multi-part message in MIME format.\n\n" . 
				      "--{$mime_boundary}\n" . 
				      "Content-Type:text/html; charset=\"iso-8859-1\"\n" . 
				      "Content-Transfer-Encoding: 7bit\n\n" . 
    $email_message . $NameE." has submitted leave application for ".$_POST['LeT']." from ".$FromDate." to ".$ToDate.", for your approval kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a> to approve\n\n";
    $data = chunk_split(base64_encode($data)); 
    $email_message .= "--{$mime_boundary}\n" . 
				      "Content-Transfer-Encoding: base64\n\n" . 
	$data . "\n\n" . 
		    "--{$mime_boundary}--\n"; 
    $ok = @mail($email_to, $email_subject, $email_message, $headers);
   }
*/   
   if($sqlUp){echo '<script>alert("Leave approved successfully..."); window.close(); </script>';}
   }
   else
   {  
/********************************************************************************/ 
//____________________________  Open ______________________________________________//	
if($Fmonth==$Tmonth) 
{ 

$BY=date("Y")-1;
if($Fyear>=date("Y")){ $AttTable='hrm_employee_attendance'; }
elseif($Fyear==$BY AND date("m")=='01' AND $Fmonth==12){ $AttTable='hrm_employee_attendance'; }
elseif($Fyear==$BY AND $Fmonth<12){ $AttTable='hrm_employee_attendance_'.$Fyear; }
else{$AttTable='hrm_employee_attendance_'.$Fyear; }

for($i=$Fday; $i<=$Tday; $i++) 
  { if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	{ 
	 $Sql=mysql_query("select * from ".$AttTable." where EmployeeID=".$_POST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	 $Sql2=mysql_query("select * from ".$AttTable." where EmployeeID=".$_POST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	 $row2=mysql_num_rows($Sql2);
     if($row==0) { $sIns=mysql_query("insert into ".$AttTable."(EmployeeID,AttValue,AttDate,Year,YearId)values(".$_POST['EI'].",'".$_POST['LeT']."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','".$Fyear."',".$YearId.")", $con); }
     elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE ".$AttTable." SET AttValue='".$_POST['LeT']."' where EmployeeID=".$_POST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); }
	} 
	elseif(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $_POST['LeT']=='EL') 
	{ 
	 $Sql=mysql_query("select * from ".$AttTable." where EmployeeID=".$_POST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	 $Sql2=mysql_query("select * from ".$AttTable." where EmployeeID=".$_POST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	 $row2=mysql_num_rows($Sql2);
     if($row==0) { $sIns=mysql_query("insert into ".$AttTable."(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$_POST['EI'].",'".$_POST['LeT']."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','Y','".$Fyear."',".$YearId.")", $con); }
     elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE ".$AttTable." SET AttValue='".$_POST['LeT']."',CheckSunday='Y' where EmployeeID=".$_POST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); }
	} 
  }  
}  
elseif($Fmonth!=$Tmonth AND $Fyear==$Tyear)
{ 

$BY=date("Y")-1;
if($Fyear>=date("Y")){ $AttTable='hrm_employee_attendance'; }
elseif($Fyear==$BY AND date("m")=='01' AND $Fmonth==12){ $AttTable='hrm_employee_attendance'; }
elseif($Fyear==$BY AND $Fmonth<12){ $AttTable='hrm_employee_attendance_'.$Fyear; }
else{$AttTable='hrm_employee_attendance_'.$Fyear; }

for($i=$Fday; $i<=$DateFmonth; $i++) 
  { if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	{ 
	 $Sql=mysql_query("select * from ".$AttTable." where EmployeeID=".$_POST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	 $Sql2=mysql_query("select * from ".$AttTable." where EmployeeID=".$_POST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	 $row2=mysql_num_rows($Sql2);
     if($row==0) { $sIns=mysql_query("insert into ".$AttTable."(EmployeeID,AttValue,AttDate,Year,YearId)values(".$_POST['EI'].",'".$_POST['LeT']."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','".$Fyear."',".$YearId.")", $con); }
     elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE ".$AttTable." SET AttValue='".$_POST['LeT']."' where EmployeeID=".$_POST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); }
	}     
	elseif(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $_POST['LeT']=='EL') 
	{ 
	 $Sql=mysql_query("select * from ".$AttTable." where EmployeeID=".$_POST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	 $Sql2=mysql_query("select * from ".$AttTable." where EmployeeID=".$_POST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	 $row2=mysql_num_rows($Sql2);
     if($row==0) { $sIns=mysql_query("insert into ".$AttTable."(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$_POST['EI'].",'".$_POST['LeT']."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','Y','".$Fyear."',".$YearId.")", $con); }
     elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE ".$AttTable." SET AttValue='".$_POST['LeT']."',CheckSunday='Y' where EmployeeID=".$_POST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); }
	}     
  } 
  for($i=1; $i<=$Tday; $i++) 
  { if(date("w",strtotime(date($Fyear.'-'.$Tmonth.'-'.$i)))!=0) 
	{ 
	 $Sql=mysql_query("select * from ".$AttTable." where EmployeeID=".$_POST['EI']." and AttDate='".date($Fyear."-".$Tmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	 $Sql2=mysql_query("select * from ".$AttTable." where EmployeeID=".$_POST['EI']." and AttDate='".date($Fyear."-".$Tmonth."-".$i)."' AND AttValue='HO'", $con); 
	 $row2=mysql_num_rows($Sql2);
     if($row==0) { $sIns=mysql_query("insert into ".$AttTable."(EmployeeID,AttValue,AttDate,Year,YearId)values(".$_POST['EI'].",'".$_POST['LeT']."','".date($Fyear.'-'.$Tmonth.'-'.$i)."','".$Fyear."',".$YearId.")", $con); }
     elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE ".$AttTable." SET AttValue='".$_POST['LeT']."' where EmployeeID=".$_POST['EI']." AND AttDate='".date($Fyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$YearId, $con); }
	} 
	elseif(date("w",strtotime(date($Fyear.'-'.$Tmonth.'-'.$i)))==0 AND $_POST['LeT']=='EL') 
	{ 
	 $Sql=mysql_query("select * from ".$AttTable." where EmployeeID=".$_POST['EI']." and AttDate='".date($Fyear."-".$Tmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	 $Sql2=mysql_query("select * from ".$AttTable." where EmployeeID=".$_POST['EI']." and AttDate='".date($Fyear."-".$Tmonth."-".$i)."' AND AttValue='HO'", $con); 
	 $row2=mysql_num_rows($Sql2);
     if($row==0) { $sIns=mysql_query("insert into ".$AttTable."(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$_POST['EI'].",'".$_POST['LeT']."','".date($Fyear.'-'.$Tmonth.'-'.$i)."','Y','".$Fyear."',".$YearId.")", $con); }
     elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE ".$AttTable." SET AttValue='".$_POST['LeT']."',CheckSunday='Y' where EmployeeID=".$_POST['EI']." AND AttDate='".date($Fyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$YearId, $con); }
	} 
  }     
}
elseif($Fmonth!=$Tmonth AND $Fyear!=$Tyear)
{ 

for($i=$Fday; $i<=$DateFmonth; $i++) 
  { 
  
$BY=date("Y")-1;
if($Fyear>=date("Y")){ $AttTable='hrm_employee_attendance'; }
elseif($Fyear==$BY AND date("m")=='01' AND $Fmonth==12){ $AttTable='hrm_employee_attendance'; }
elseif($Fyear==$BY AND $Fmonth<12){ $AttTable='hrm_employee_attendance_'.$Fyear; }
else{$AttTable='hrm_employee_attendance_'.$Fyear; }  
  
  
  if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	{ 
	 $Sql=mysql_query("select * from ".$AttTable." where EmployeeID=".$_POST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	 $Sql2=mysql_query("select * from ".$AttTable." where EmployeeID=".$_POST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	 $row2=mysql_num_rows($Sql2);
     if($row==0) { $sIns=mysql_query("insert into ".$AttTable."(EmployeeID,AttValue,AttDate,Year,YearId)values(".$_POST['EI'].",'".$_POST['LeT']."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','".$Fyear."',".$YearId.")", $con); }
     elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE ".$AttTable." SET AttValue='".$_POST['LeT']."' where EmployeeID=".$_POST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); }
	} 
	elseif(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $_POST['LeT']=='EL') 
	{ 
	 $Sql=mysql_query("select * from ".$AttTable." where EmployeeID=".$_POST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	 $Sql2=mysql_query("select * from ".$AttTable." where EmployeeID=".$_POST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."' AND AttValue='HO'", $con); 
	 $row2=mysql_num_rows($Sql2);
     if($row==0) { $sIns=mysql_query("insert into ".$AttTable."(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$_POST['EI'].",'".$_POST['LeT']."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','Y','".$Fyear."',".$YearId.")", $con); }
     elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE ".$AttTable." SET AttValue='".$_POST['LeT']."',CheckSunday='Y' where EmployeeID=".$_POST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); }
	} 
  }     
  for($i=1; $i<=$Tday; $i++) 
  { 
  
$BY=date("Y")-1;
if($Tyear>=date("Y")){ $AttTable='hrm_employee_attendance'; }
elseif($Tyear==$BY AND date("m")=='01' AND $Tmonth==12){ $AttTable='hrm_employee_attendance'; }
elseif($Tyear==$BY AND $Tmonth<12){ $AttTable='hrm_employee_attendance_'.$Tyear; }
else{$AttTable='hrm_employee_attendance_'.$Tyear; }  
  
  if(date("w",strtotime(date($Tyear.'-'.$Tmonth.'-'.$i)))!=0) 
	{ 
	$Sql=mysql_query("select * from ".$AttTable." where EmployeeID=".$_POST['EI']." and AttDate='".date($Tyear."-".$Tmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	$Sql2=mysql_query("select * from ".$AttTable." where EmployeeID=".$_POST['EI']." and AttDate='".date($Tyear."-".$Tmonth."-".$i)."' AND AttValue='HO'", $con); 
	$row2=mysql_num_rows($Sql2);
    if($row==0) { $sIns=mysql_query("insert into ".$AttTable."(EmployeeID,AttValue,AttDate,Year,YearId)values(".$_POST['EI'].",'".$_POST['LeT']."','".date($Tyear.'-'.$Tmonth.'-'.$i)."','".$Tyear."',".$YearId.")", $con); }
    elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE ".$AttTable." SET AttValue='".$_POST['LeT']."' where EmployeeID=".$_POST['EI']." AND AttDate='".date($Tyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$YearId, $con); }
	}  
	else if(date("w",strtotime(date($Tyear.'-'.$Tmonth.'-'.$i)))==0 AND $_POST['LeT']=='EL') 
	{ 
	$Sql=mysql_query("select * from ".$AttTable." where EmployeeID=".$_POST['EI']." and AttDate='".date($Tyear."-".$Tmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
	$Sql2=mysql_query("select * from ".$AttTable." where EmployeeID=".$_POST['EI']." and AttDate='".date($Tyear."-".$Tmonth."-".$i)."' AND AttValue='HO'", $con); 
	$row2=mysql_num_rows($Sql2);
    if($row==0) { $sIns=mysql_query("insert into ".$AttTable."(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$_POST['EI'].",'".$_POST['LeT']."','".date($Tyear.'-'.$Tmonth.'-'.$i)."','Y','".$Tyear."',".$YearId.")", $con); }
    elseif($row>0 AND $row2==0) { $sIns=mysql_query("UPDATE ".$AttTable." SET AttValue='".$_POST['LeT']."',CheckSunday='Y' where EmployeeID=".$_POST['EI']." AND AttDate='".date($Tyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$YearId, $con); }
	}  
  }    
}
//____________________________  Close ______________________________________________//	
//*************************************** Update hrm_employee_leave Table OPEN*******************************************//  
  if($sIns)
  { 
  
  $AttTable='hrm_employee_attendance';  
  
  $m=date("m");	$id=$_POST['EI']; 
    if($m==1 OR $m==3 OR $m==5 OR $m==7 OR $m==8 OR $m==10 OR $m==12)
	{ 
     $SqlCL=mysql_query("select count(AttValue)as CL from ".$AttTable." where AttValue='CL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')"); $SqlCH=mysql_query("select count(AttValue)as CH from ".$AttTable." where AttValue='CH' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')"); $SqlSL=mysql_query("select count(AttValue)as SL from ".$AttTable." where AttValue='SL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')"); $SqlSH=mysql_query("select count(AttValue)as SH from ".$AttTable." where AttValue='SH' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')"); $SqlPL=mysql_query("select count(AttValue)as PL from ".$AttTable." where AttValue='PL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')"); $SqlEL=mysql_query("select count(AttValue)as EL from ".$AttTable." where AttValue='EL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')"); $SqlFL=mysql_query("select count(AttValue)as FL from ".$AttTable." where AttValue='FL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')"); $SqlTL=mysql_query("select count(AttValue)as TL from ".$AttTable." where AttValue='TL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')"); $SqlHf=mysql_query("select count(AttValue)as Hf from ".$AttTable." where AttValue='HF' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')"); $SqlPresent=mysql_query("select count(AttValue)as Present from ".$AttTable." where AttValue='P' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')"); $SqlAbsent=mysql_query("select count(AttValue)as Absent from ".$AttTable." where AttValue='A' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')"); $SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from ".$AttTable." where AttValue='OD' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')"); $SqlHoliday=mysql_query("select count(AttValue)as Holiday from ".$AttTable." where AttValue='HO' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')"); $SqlELSun=mysql_query("select count(CheckSunday)as SUN from ".$AttTable." where CheckSunday='Y' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')", $con);
	} 
    elseif($m==2)
	{ 
	 if(date("Y")==2012 OR date("Y")==2016 OR date("Y")==2020 OR date("Y")==2024 OR date("Y")==2028 OR date("Y")==2032 OR date("Y")==2036 OR date("Y")==2040) { $day=29; } 
     else { $day=28;}
    $SqlCL=mysql_query("select count(AttValue)as CL from ".$AttTable." where AttValue='CL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')"); $SqlCH=mysql_query("select count(AttValue)as CH from ".$AttTable." where AttValue='CH' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')"); $SqlSL=mysql_query("select count(AttValue)as SL from ".$AttTable." where AttValue='SL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')"); $SqlSH=mysql_query("select count(AttValue)as SH from ".$AttTable." where AttValue='SH' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')"); $SqlPL=mysql_query("select count(AttValue)as PL from ".$AttTable." where AttValue='PL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')"); $SqlEL=mysql_query("select count(AttValue)as EL from ".$AttTable." where AttValue='EL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')"); $SqlFL=mysql_query("select count(AttValue)as FL from ".$AttTable." where AttValue='FL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')"); $SqlTL=mysql_query("select count(AttValue)as TL from ".$AttTable." where AttValue='TL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')"); $SqlHf=mysql_query("select count(AttValue)as Hf from ".$AttTable." where AttValue='CH' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')"); $SqlPresent=mysql_query("select count(AttValue)as Present from ".$AttTable." where AttValue='P' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')"); $SqlAbsent=mysql_query("select count(AttValue)as Absent from ".$AttTable." where AttValue='A' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')"); $SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from ".$AttTable." where AttValue='OD' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')"); $SqlHoliday=mysql_query("select count(AttValue)as Holiday from ".$AttTable." where AttValue='HO' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')"); $SqlELSun=mysql_query("select count(CheckSunday)as SUN from ".$AttTable." where CheckSunday='Y' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')", $con);
	} 	  
    elseif($m==4 OR $m==6 OR $m==9 OR $m==11)
	{ 
    $SqlCL=mysql_query("select count(AttValue)as CL from ".$AttTable." where AttValue='CL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')"); $SqlCH=mysql_query("select count(AttValue)as CH from ".$AttTable." where AttValue='CH' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')"); $SqlSL=mysql_query("select count(AttValue)as SL from ".$AttTable." where AttValue='SL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')"); $SqlSH=mysql_query("select count(AttValue)as SH from ".$AttTable." where AttValue='SH' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')"); $SqlPL=mysql_query("select count(AttValue)as PL from ".$AttTable." where AttValue='PL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')"); $SqlEL=mysql_query("select count(AttValue)as EL from ".$AttTable." where AttValue='EL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')"); $SqlFL=mysql_query("select count(AttValue)as FL from ".$AttTable." where AttValue='FL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')"); $SqlTL=mysql_query("select count(AttValue)as TL from ".$AttTable." where AttValue='TL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')"); $SqlHf=mysql_query("select count(AttValue)as Hf from ".$AttTable." where AttValue='HF' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')"); $SqlPresent=mysql_query("select count(AttValue)as Present from ".$AttTable." where AttValue='P' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')"); $SqlAbsent=mysql_query("select count(AttValue)as Absent from ".$AttTable." where AttValue='A' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')"); $SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from ".$AttTable." where AttValue='OD' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')"); $SqlHoliday=mysql_query("select count(AttValue)as Holiday from ".$AttTable." where AttValue='HO' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')"); $SqlELSun=mysql_query("select count(CheckSunday)as SUN from ".$AttTable." where CheckSunday='Y' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')", $con);
	} 
    $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); $ResSH=mysql_fetch_array($SqlSH);
    $ResPL=mysql_fetch_array($SqlPL); $ResEL=mysql_fetch_array($SqlEL); $ResFL=mysql_fetch_array($SqlFL); $ResTL=mysql_fetch_array($SqlTL); $ResHf=mysql_fetch_array($SqlHf); 
	$ResPresent=mysql_fetch_array($SqlPresent); 
    $ResAbsent=mysql_fetch_array($SqlAbsent); $ResOnDuties=mysql_fetch_array($SqlOnDuties); $ResHoliday=mysql_fetch_array($SqlHoliday); $ResELSun=mysql_fetch_array($SqlELSun);
    $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $TotalCL=$CountCL+$CountCH; $CountSL=$ResSL['SL']; $CountSH=$ResSH['SH']/2; $TotalSL=$CountSL+$CountSH;
    $TotalPL=$ResPL['PL']; $TotalEL=$ResEL['EL']; $TotalFL=$ResFL['FL']; $TotalTL=$ResTL['TL']; $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL; 
	$TotELSun=$ResELSun['SUN']; $CountHf=$ResHf['Hf']/2;  
    $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountHf; $TotalAbsent=$ResAbsent['Absent']+$CountHf;
    $TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
    $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday; $TotalPaidDay=$TotalDayWithSunEL-$TotELSun;  $TotalWorkingDay=26;
   
    /******************** hrm_employee_monthlyleave_balance open ****************************/
	$SL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$id." AND Month='".$m."' AND Year='".date("Y")."'");  $RowL=mysql_num_rows($SL);
	if($RowL>0)  
	{ $RL=mysql_fetch_assoc($SL);   
	  if($m!=1) { $TotBalCL=$RL['OpeningCL']-$TotalCL;  $TotBalSL=$RL['OpeningSL']-$TotalSL; $TotBalPL=$RL['OpeningPL']-$TotalPL;  $TotBalEL=$RL['OpeningEL']-$TotalEL;
	              $TotBalFL=$RL['OpeningOL']-$TotalFL; }  
      if($m==1) { $TotBalCL=$RL['TotCL']-$TotalCL;  $TotBalSL=$RL['TotSL']-$TotalSL; $TotBalPL=$RL['TotPL']-$TotalPL;  $TotBalEL=$RL['TotEL']-$TotalEL;
	              $TotBalFL=$RL['TotOL']-$TotalFL; }
	  $sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedEL='".$TotalEL."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceEL='".$TotBalEL."', BalanceOL='".$TotBalFL."' where EmployeeID=".$id." AND Month='".$m."' AND Year='".date("Y")."'", $con);    }
 
    if($_POST['App']!=$_POST['Hod']) { $sqlUp=mysql_query("update hrm_employee_applyleave set Apply_FromDate='".date("Y-m-d",strtotime($_POST['FromDate']))."', Apply_ToDate='".date("Y-m-d",strtotime($_POST['ToDate']))."', Apply_TotalDay='".$_POST['TotDay']."', LeaveStatus=".$_POST['v'].", LeaveAppStatus=".$_POST['v'].", LeaveAppUpDate='".date("Y-m-d")."', ApplyLeave_UpdatedYearId=".$YearId.", Partial='Y', PartialComment='".$_POST['Comment']."' where ApplyLeaveId=".$_POST['lid'], $con); }
    elseif($_POST['App']==$_POST['Hod']) { $sqlUp=mysql_query("update hrm_employee_applyleave set Apply_FromDate='".date("Y-m-d",strtotime($_POST['FromDate']))."', Apply_ToDate='".date("Y-m-d",strtotime($_POST['ToDate']))."', Apply_TotalDay='".$_POST['TotDay']."', LeaveStatus=".$_POST['v'].", LeaveAppStatus=".$_POST['v'].", LeaveAppUpDate='".date("Y-m-d")."', LeaveHodStatus=".$_REQUEST['v'].", LeaveHodUpDate='".date("Y-m-d")."', ApplyLeave_UpdatedYearId=".$YearId.", Partial='Y', PartialComment='".$_POST['Comment']."' where ApplyLeaveId=".$_POST['lid'], $con); } if($sqlUp){echo '<script>alert("Leave approved successfully..."); window.close(); </script>';}
} else {$msg='Error...';}
//************** Update hrm_employee_leave Table CLOSE********************// 
/***********************************************************/  
   }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Approved Partially Leave:&nbsp;<?php echo $EmpName; ?></title>
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
function Refresh()
{ var FD=document.getElementById("FD").value; var TD=document.getElementById("TD").value; 
  document.getElementById("FromDate").value=FD; document.getElementById("ToDate").value=TD; document.getElementById("Comment").value=''; 
}

function tt()
{
  var d1 = document.getElementById("FromDate").value; var d2 = document.getElementById("ToDate").value; var LeaveType = document.getElementById("LeT").value;;
  var DMY=d1.split('-');  var DMY2=d2.split('-');   var day=DMY[0];  var month=DMY[1];  var year=DMY[2];  var day1=DMY2[0];  var month1=DMY2[1];  var year1=DMY2[2];
  var dateTemp1=month+'/'+day+'/'+year;   var dateTemp2=month1+'/'+day1+'/'+year1;
  var date1 = new Date(dateTemp1);  var date2 = new Date(dateTemp2); 
  var Timed1=date1.getTime(); var Timed2=date2.getTime();
  var timeDiff = Math.abs(date2.getTime() - date1.getTime());
  var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
  var TotDay = diffDays+1;
  //Count no of SUNDAY beetween two day...
  if(date2 < date1) return; //avoid infinite loop;
  for(var count=0; date1 <= date2; date1.setDate(date1.getDate() + 1)){
  if(date1.getDay() == 0) count++;}  
  if(count==0){var ActualDays = TotDay;}
  if(count>0){ if(LeaveType=='EL') { var ActualDays = TotDay; } if(LeaveType!='EL') { var ActualDays = TotDay-count; } }  
  if(ActualDays>1){document.getElementById("day").value='Total '+ActualDays+' Days';}
  else{document.getElementById("day").value='Total '+ActualDays+' Day';}
  document.getElementById("TotDay").value=ActualDays;
}

function validate(form) 
{ var d1 = form.FromDate.value; var d2 = form.ToDate.value; var LeaveType = form.LeT.value; var TotalD = form.TotD.value; 		
  var DMY=d1.split('-');  var DMY2=d2.split('-');
  var day=DMY[0];  var month=DMY[1];  var year=DMY[2];
  var day1=DMY2[0];  var month1=DMY2[1];  var year1=DMY2[2];
  var dateTemp1=month+'/'+day+'/'+year;  
  var dateTemp2=month1+'/'+day1+'/'+year1;
  var date1 = new Date(dateTemp1);//mm/dd/yy 
  var date2 = new Date(dateTemp2); //mm/dd/yy
  var Timed1=date1.getTime(); var Timed2=date2.getTime();
  if(Timed1>Timed2){alert('Error : Please check leave date!'); return false;}	
  var timeDiff = Math.abs(date2.getTime() - date1.getTime());
  var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
  var TotDay = diffDays+1;
  //Count no of SUNDAY beetween two day...
  if(date2 < date1) return; //avoid infinite loop;
  for(var count=0; date1 <= date2; date1.setDate(date1.getDate() + 1)){
  if(date1.getDay() == 0) count++;}  
  if(count==0){var ActualDays = TotDay;}
  if(count>0) 
  {
    if(LeaveType=='EL') { var ActualDays = TotDay; } 
	if(LeaveType!='EL') { var ActualDays = TotDay-count; } 
  }  
  //alert();
  if(ActualDays>TotalD){alert('Error : Please check number of day leave!'); return false;}	
  var d11 = form.FD.value; var d22 = form.TD.value; 
  var FDMY=d11.split('-');  var TDMY=d22.split('-');
  var Fday=FDMY[0];  var Fmonth=FDMY[1];  var Fyear=FDMY[2];
  var Tday=TDMY[0];  var Tmonth=TDMY[1];  var Tyear=TDMY[2];
  var FdateTemp=Fmonth+'/'+Fday+'/'+Fyear;  
  var TdateTemp=Tmonth+'/'+Tday+'/'+Tyear;
  var Fdate = new Date(FdateTemp);//mm/dd/yy 
  var Tdate = new Date(TdateTemp); //mm/dd/yy
  var FTime=Fdate.getTime(); var TTime=Tdate.getTime();
  if(Timed1<FTime || Timed1>TTime || Timed2>TTime){alert('Error : Please check leave date!'); return false;}
  var agree=confirm("Are you sure you want to partially approved this apply leave?");
  if (agree) { return true; } else { return false; }  	   
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
   <tr><td align="center" colspan="4" style="width:540px;font-family:Times New Roman;size:15px; color:#8A0000;"><b>Partially Approved Leave</b></td></tr>
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
  <td><input type="hidden" id="lid" name="lid" value="<?php echo $_REQUEST['lid']; ?>" />
      <input type="hidden" id="LeT" name="LeT" value="<?php echo $_REQUEST['LeT']; ?>" />
	  <input type="hidden" id="FD" name="FD" value="<?php echo date("d-m-Y",strtotime($_REQUEST['FD'])); ?>" />
      <input type="hidden" id="TD" name="TD" value="<?php echo date("d-m-Y",strtotime($_REQUEST['TD'])); ?>" />
	  <input type="hidden" id="TotD" name="TotD" value="<?php echo $_REQUEST['TotD']; ?>" />
	  <input type="hidden" id="EI" name="EI" value="<?php echo $_REQUEST['EI']; ?>" />
	  <input type="hidden" id="App" name="App" value="<?php echo $_REQUEST['App']; ?>" />
      <input type="hidden" id="Hod" name="Hod" value="<?php echo $_REQUEST['Hod']; ?>" />
	  <input type="hidden" id="v" name="v" value="2" /><input type="hidden" id="YI" name="YI" value="<?php echo $_REQUEST['YI']; ?>" />
	  <input type="hidden" id="TotDay" name="TotDay" value=""/>
   <table style="width:540px;" border="0">
   <tr>
   <td colspan="2" style="width:340px;font-family:Times New Roman;size:13px;">
   &nbsp;<b>Change Date :</b>&nbsp;From :<input name="FromDate" id="FromDate" class="InputText" value="<?php echo date("d-m-Y",strtotime($_REQUEST['FD'])); ?>" readonly>&nbsp;<button id="f_btn1" class="CalenderButton"></button>
<script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
cal.manageFields("f_btn1", "FromDate", "%d-%m-%Y");</script> &nbsp;
   To :<input name="ToDate" id="ToDate" class="InputText" value="<?php echo date("d-m-Y",strtotime($_REQUEST['TD'])); ?>" readonly>&nbsp;<button id="f_btn2" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
cal.manageFields("f_btn2", "ToDate", "%d-%m-%Y");</script>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input name="day" id="day" style=" font-size:14px; font-family:Times New Roman;border-style:hidden;width:100px;text-align:center;background-color:#E0DBE3;font-weight:bold;" readonly/></td>
   </tr>
   <tr>
     <td style="width:100px;font-family:Times New Roman;size:13px;" valign="top">&nbsp;<b>Comment :</b>&nbsp;</td>
     <td style="width:440px;font-family:Times New Roman;size:13px;"><textarea id="Comment" name="Comment" rows="3" cols="64" style="font-family:Times New Roman;" onKeyDown="tt()"></textarea></td>
   </tr>
   <tr><td colspan="2" style="width:540px;" align="right">
       <input type="button" style="width:80px;" value="close" onClick="Close()"/>
       <input type="button" style="width:80px;" value="refresh" onClick="Refresh()"/>
	   <input type="submit" name="SubmitLeave" style="width:80px;" value="save" onClick="tt()" />&nbsp;&nbsp;&nbsp;</td>
   </tr>
   <tr><td colspan="2" style="width:540px;color:#005500;font-weight:bold;font-size:15px;" align="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $msg; ?></td></tr>
   </table>
  </td>
 </tr>
</table>
</form>
</center>  
</body>
</html>
