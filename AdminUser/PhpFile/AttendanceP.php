<?php 
if(isset($_POST['AddAtt']))
{ for($i=1; $i<=$_POST['EmpRows']; $i++) { $id=$_POST['EmpId'.$i]; $m=$_POST['MonthId'];
  if(date("m")==01){ if($m==12){$Y=date("Y")-1;}else{$Y=date("Y");} }
  if(date("m")!=01){ $Y=date("Y");}
  if($m==1)
  { for($j=1; $j<=31; $j++) 
    { 
     if($_POST['Jan'.$i.'_'.$j]!='') 
	 { 
	   if(date("w",strtotime(date($Y.'-'.$m.'-'.$j)))==0 AND $_POST['Jan'.$i.'_'.$j]=='EL')
	   {
	    $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	    if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$id.",'".$_POST['Jan'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','Y','".$Y."',".$YearId.")", $con);}
	    elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['Jan'.$i.'_'.$j]."',CheckSunday='Y' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);}  
	   }
	   else 
	   {
	   if($_POST['Jan'.$i.'_'.$j]=='S'){$_POST['Jan'.$i.'_'.$j]=='';}
       $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	   if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$id.",'".$_POST['Jan'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','".$Y."',".$YearId.")", $con);}
	   elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['Jan'.$i.'_'.$j]."' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);}  
	   }	   
	 }
	 if($_POST['Jan'.$i.'_'.$j]=='') 
	 { $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	   if($row>0) { $sUp=mysql_query("delete from hrm_employee_attendance where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."' ", $con);}  
	 }
	} 
  }
	
	
  elseif($m==2)
  { if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040) { $day=29; } 
	else { $day=28;} 
	for($j=1; $j<=$day; $j++) 
	{ if($_POST['Feb'.$i.'_'.$j]!='') 
	  { 
	   if(date("w",strtotime(date($Y.'-'.$m.'-'.$j)))==0 AND $_POST['Feb'.$i.'_'.$j]=='EL')
	   {
	    $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	    if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$id.",'".$_POST['Feb'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','Y','".$Y."',".$YearId.")", $con);}
	    elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['Feb'.$i.'_'.$j]."',CheckSunday='Y' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);}  
	   }
	   else 
	   {
	    if($_POST['Feb'.$i.'_'.$j]=='S'){$_POST['Feb'.$i.'_'.$j]=='';}
        $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	    if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$id.",'".$_POST['Feb'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','".$Y."',".$YearId.")", $con);}
	    elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['Feb'.$i.'_'.$j]."' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);}  
		}
	  } 
	  if($_POST['Feb'.$i.'_'.$j]=='') 
	  { $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	   if($row>0) { $sUp=mysql_query("delete from hrm_employee_attendance where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."' ", $con);}  
	  }
	} 
  }
  
  		 
  elseif($m==3) 
  { for($j=1; $j<=31; $j++) 
    { if($_POST['March'.$i.'_'.$j]!='') 
	  { 
	   if(date("w",strtotime(date($Y.'-'.$m.'-'.$j)))==0 AND $_POST['March'.$i.'_'.$j]=='EL')
	   {
	    $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	    if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$id.",'".$_POST['March'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','Y','".$Y."',".$YearId.")", $con);}
	    elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['March'.$i.'_'.$j]."',CheckSunday='Y' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);}  
	   }
	   else 
	   {
	   if($_POST['March'.$i.'_'.$j]=='S'){$_POST['March'.$i.'_'.$j]=='';}
        $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	    if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$id.",'".$_POST['March'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','".$Y."',".$YearId.")", $con);}
	    elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['March'.$i.'_'.$j]."' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);} 
	   } 
	  } 
	  if($_POST['March'.$i.'_'.$j]=='') 
	  { $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	   if($row>0) { $sUp=mysql_query("delete from hrm_employee_attendance where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."' ", $con);}  
	  }
	} 
  }

	
  elseif($m==4) 
  { for($j=1; $j<=30; $j++) 
    { if($_POST['Apr'.$i.'_'.$j]!='') 
	  { 
	   if(date("w",strtotime(date($Y.'-'.$m.'-'.$j)))==0 AND $_POST['Apr'.$i.'_'.$j]=='EL')
	   {
	    $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	    if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$id.",'".$_POST['Apr'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','Y','".$Y."',".$YearId.")", $con);}
	    elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['Apr'.$i.'_'.$j]."',CheckSunday='Y' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);}  
	   }
	   else 
	   {
	    if($_POST['Apr'.$i.'_'.$j]=='S'){$_POST['Apr'.$i.'_'.$j]=='';}
        $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	    if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$id.",'".$_POST['Apr'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','".$Y."',".$YearId.")", $con);}
	    elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['Apr'.$i.'_'.$j]."' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);}  
	   }	
	  } 
	  if($_POST['Apr'.$i.'_'.$j]=='') 
	  { $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	   if($row>0) { $sUp=mysql_query("delete from hrm_employee_attendance where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."' ", $con);}  
	  }
	} 
  }

	
  elseif($m==5) 
  { for($j=1; $j<=31; $j++) 
    { if($_POST['May'.$i.'_'.$j]!='') 
	  { 
	   if(date("w",strtotime(date($Y.'-'.$m.'-'.$j)))==0 AND $_POST['May'.$i.'_'.$j]=='EL')
	   {
	    $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	    if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$id.",'".$_POST['May'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','Y','".$Y."',".$YearId.")", $con);}
	    elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['May'.$i.'_'.$j]."',CheckSunday='Y' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);}  
	   }
	   else 
	   {
	   if($_POST['May'.$i.'_'.$j]=='S'){$_POST['May'.$i.'_'.$j]=='';}
        $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	    if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$id.",'".$_POST['May'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','".$Y."',".$YearId.")", $con);}
	    elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['May'.$i.'_'.$j]."' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);}  
	   } 
	  }
	  if($_POST['May'.$i.'_'.$j]=='') 
	  { $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	   if($row>0) { $sUp=mysql_query("delete from hrm_employee_attendance where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."' ", $con);}  
	  }
	} 
  }
	

  elseif($m==6) 
  { for($j=1; $j<=30; $j++) 
    { if($_POST['June'.$i.'_'.$j]!='') 
	  { 
	   if(date("w",strtotime(date($Y.'-'.$m.'-'.$j)))==0 AND $_POST['June'.$i.'_'.$j]=='EL')
	   {
	    $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	    if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$id.",'".$_POST['June'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','Y','".$Y."',".$YearId.")", $con);}
	    elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['June'.$i.'_'.$j]."',CheckSunday='Y' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);}  
	   }
	   else 
	   {
	    if($_POST['June'.$i.'_'.$j]=='S'){$_POST['June'.$i.'_'.$j]=='';}
        $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	    if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$id.",'".$_POST['June'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','".$Y."',".$YearId.")", $con);}
	    elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['June'.$i.'_'.$j]."' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);}  
	   }	
	  }
	  if($_POST['June'.$i.'_'.$j]=='') 
	  { $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	    if($row>0) { $sUp=mysql_query("delete from hrm_employee_attendance where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."' ", $con);}  
	  }
    } 
  }

	
  elseif($m==7) 
  { for($j=1; $j<=31; $j++) 
    {if($_POST['July'.$i.'_'.$j]!='') 
	 { 
	  if(date("w",strtotime(date($Y.'-'.$m.'-'.$j)))==0 AND $_POST['July'.$i.'_'.$j]=='EL')
	   {
	    $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	    if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$id.",'".$_POST['July'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','Y','".$Y."',".$YearId.")", $con);}
	    elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['July'.$i.'_'.$j]."',CheckSunday='Y' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);}  
	   }
	   else 
	   {
	  if($_POST['July'.$i.'_'.$j]=='S'){$_POST['July'.$i.'_'.$j]=='';}
       $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	   if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$id.",'".$_POST['July'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','".$Y."',".$YearId.")", $con);}
	   elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['July'.$i.'_'.$j]."' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);} 
	  }  
	 }
	 if($_POST['July'.$i.'_'.$j]=='') 
	 { $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	   if($row>0) { $sUp=mysql_query("delete from hrm_employee_attendance where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."' ", $con);}  
	 } 
    } 
  }

	
  elseif($m==8) 
  { for($j=1; $j<=31; $j++) 
    {if($_POST['Aug'.$i.'_'.$j]!='') 
	 { 
	  if(date("w",strtotime(date($Y.'-'.$m.'-'.$j)))==0 AND $_POST['Aug'.$i.'_'.$j]=='EL')
	   {
	    $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	    if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$id.",'".$_POST['Aug'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','Y','".$Y."',".$YearId.")", $con);}
	    elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['Aug'.$i.'_'.$j]."',CheckSunday='Y' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);}  
	   }
	   else 
	   {
	  if($_POST['Aug'.$i.'_'.$j]=='S'){$_POST['Aug'.$i.'_'.$j]=='';}
       $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	   if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$id.",'".$_POST['Aug'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','".$Y."',".$YearId.")", $con);}
	   elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['Aug'.$i.'_'.$j]."' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);} 
	  } 
	 } 
	 if($_POST['Aug'.$i.'_'.$j]=='') 
	 { $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	   if($row>0) { $sUp=mysql_query("delete from hrm_employee_attendance where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."' ", $con);}  
	 } 
   } 
  }

	
  elseif($m==9) 
  { for($j=1; $j<=30; $j++) 
    {if($_POST['Sep'.$i.'_'.$j]!='') 
	 { 
	  if(date("w",strtotime(date($Y.'-'.$m.'-'.$j)))==0 AND $_POST['Sep'.$i.'_'.$j]=='EL')
	   {
	    $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	    if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$id.",'".$_POST['Sep'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','Y','".$Y."',".$YearId.")", $con);}
	    elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['Sep'.$i.'_'.$j]."',CheckSunday='Y' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);}  
	   }
	   else 
	   {
	 if($_POST['Sep'.$i.'_'.$j]=='S'){$_POST['Sep'.$i.'_'.$j]=='';}
       $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	   if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$id.",'".$_POST['Sep'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','".$Y."',".$YearId.")", $con);}
	   elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['Sep'.$i.'_'.$j]."' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);} 
	  }
	 } 
	 if($_POST['Sep'.$i.'_'.$j]=='') 
	 { $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	   if($row>0) { $sUp=mysql_query("delete from hrm_employee_attendance where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."' AND ", $con);}  
	 } 
    } 
  }

	
  elseif($m==10) 
  { for($j=1; $j<=31; $j++) 
    { if($_POST['Oct'.$i.'_'.$j]!='') 
	  { 
	   if(date("w",strtotime(date($Y.'-'.$m.'-'.$j)))==0 AND $_POST['Oct'.$i.'_'.$j]=='EL')
	   {
	    $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	    if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$id.",'".$_POST['Oct'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','Y','".$Y."',".$YearId.")", $con);}
	    elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['Oct'.$i.'_'.$j]."',CheckSunday='Y' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);}  
	   }
	   else 
	   {
	   if($_POST['Oct'.$i.'_'.$j]=='S'){$_POST['Oct'.$i.'_'.$j]=='';}
        $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	    if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$id.",'".$_POST['Oct'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','".$Y."',".$YearId.")", $con);}
	    elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['Oct'.$i.'_'.$j]."' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);}  
	   }
	  }
	  if($_POST['Oct'.$i.'_'.$j]=='') 
	  { $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	   if($row>0) { $sUp=mysql_query("delete from hrm_employee_attendance where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."' ", $con);}  
	  } 
	} 
  }

	
  elseif($m==11) 
  { for($j=1; $j<=30; $j++) 
    { if($_POST['Nov'.$i.'_'.$j]!='') 
	  { 
	  if(date("w",strtotime(date($Y.'-'.$m.'-'.$j)))==0 AND $_POST['Nov'.$i.'_'.$j]=='EL')
	   {
	    $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	    if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$id.",'".$_POST['Nov'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','Y','".$Y."',".$YearId.")", $con);}
	    elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['Nov'.$i.'_'.$j]."',CheckSunday='Y' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);}  
	   }
	   else 
	   {
	   if($_POST['Nov'.$i.'_'.$j]=='S'){$_POST['Nov'.$i.'_'.$j]=='';}
        $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	    if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$id.",'".$_POST['Nov'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','".$Y."',".$YearId.")", $con);}
	    elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['Nov'.$i.'_'.$j]."' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);}  
	   }
	  } 
	  if($_POST['Nov'.$i.'_'.$j]=='') 
	  { $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	   if($row>0) { $sUp=mysql_query("delete from hrm_employee_attendance where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."' ", $con);}  
	  } 
	} 
  }

	
  elseif($m==12) 
  { for($j=1; $j<=31; $j++) 
    { if($_POST['Dec'.$i.'_'.$j]!='') 
	  { 
	   if(date("w",strtotime(date($Y.'-'.$m.'-'.$j)))==0 AND $_POST['Dec'.$i.'_'.$j]=='EL')
	   {
	    $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	    if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$id.",'".$_POST['Dec'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','Y','".$Y."',".$YearId.")", $con);}
	    elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['Dec'.$i.'_'.$j]."',CheckSunday='Y' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);}  
	   }
	   else 
	   {
	   if($_POST['Dec'.$i.'_'.$j]=='S'){$_POST['Dec'.$i.'_'.$j]=='';}
        $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	    if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$id.",'".$_POST['Dec'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','".$Y."',".$YearId.")", $con);}
	    elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['Dec'.$i.'_'.$j]."' where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);}  
	   }
	  } 
	  if($_POST['Dec'.$i.'_'.$j]=='') 
	  { $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	   if($row>0) { $sUp=mysql_query("delete from hrm_employee_attendance where EmployeeID=".$id." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);}  
	  } 
	} 
  }

 if($sql) 
    {
if($m==1 OR $m==3 OR $m==5 OR $m==7 OR $m==8 OR $m==10 OR $m==12){ 
       $SqlCL=mysql_query("select count(AttValue)as CL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con);
	   $SqlCH=mysql_query("select count(AttValue)as CH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con);
	   $SqlSL=mysql_query("select count(AttValue)as SL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con);
	   $SqlSH=mysql_query("select count(AttValue)as SH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con);
	   $SqlPH=mysql_query("select count(AttValue)as PH from hrm_employee_attendance where AttValue='PH' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con);
	   $SqlPL=mysql_query("select count(AttValue)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con);
	   $SqlEL=mysql_query("select count(AttValue)as EL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con);
	   $SqlFL=mysql_query("select count(AttValue)as FL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con);
	   $SqlTL=mysql_query("select count(AttValue)as TL from hrm_employee_attendance where AttValue='TL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con);
	  $SqlHf=mysql_query("select count(AttValue)as Hf from hrm_employee_attendance where AttValue='HF' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con);
	  $SqlPresent=mysql_query("select count(AttValue)as Present from hrm_employee_attendance where AttValue='P' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con);
	  $SqlAbsent=mysql_query("select count(AttValue)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con);
	  $SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con);
	  $SqlHoliday=mysql_query("select count(AttValue)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
	  $SqlELSun=mysql_query("select count(CheckSunday)as SUN from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); } 
	 
	  elseif($m==2){ if(date("Y")==2012 OR date("Y")==2016 OR date("Y")==2020 OR date("Y")==2024 OR date("Y")==2028 OR date("Y")==2032 OR date("Y")==2036 OR date("Y")==2040) { $day=29; } else { $day=28;}
	   $SqlCL=mysql_query("select count(AttValue)as CL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con);
	   $SqlCH=mysql_query("select count(AttValue)as CH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con);
	   $SqlSL=mysql_query("select count(AttValue)as SL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con);
	   $SqlSH=mysql_query("select count(AttValue)as SH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con);
	   $SqlPH=mysql_query("select count(AttValue)as PH from hrm_employee_attendance where AttValue='PH' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con);
	   $SqlPL=mysql_query("select count(AttValue)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con);
	   $SqlEL=mysql_query("select count(AttValue)as EL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con);
	   $SqlFL=mysql_query("select count(AttValue)as FL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con);
	   $SqlTL=mysql_query("select count(AttValue)as TL from hrm_employee_attendance where AttValue='TL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con);
	  $SqlHf=mysql_query("select count(AttValue)as Hf from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con);
	  $SqlPresent=mysql_query("select count(AttValue)as Present from hrm_employee_attendance where AttValue='P' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con);
	  $SqlAbsent=mysql_query("select count(AttValue)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con);
	  $SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con);
	  $SqlHoliday=mysql_query("select count(AttValue)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con); 
	  $SqlELSun=mysql_query("select count(CheckSunday)as SUN from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con);} 
	  
	  elseif($m==4 OR $m==6 OR $m==9 OR $m==11){ 
	   $SqlCL=mysql_query("select count(AttValue)as CL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-30")."')", $con);
	   $SqlCH=mysql_query("select count(AttValue)as CH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-30")."')", $con);
	   $SqlSL=mysql_query("select count(AttValue)as SL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-30")."')", $con);
	   $SqlSH=mysql_query("select count(AttValue)as SH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-30")."')", $con);
	   $SqlPH=mysql_query("select count(AttValue)as PH from hrm_employee_attendance where AttValue='PH' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-30")."')", $con);
	   $SqlPL=mysql_query("select count(AttValue)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-30")."')", $con);
	   $SqlEL=mysql_query("select count(AttValue)as EL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-30")."')", $con);
	   $SqlFL=mysql_query("select count(AttValue)as FL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-30")."')", $con);
	   $SqlTL=mysql_query("select count(AttValue)as TL from hrm_employee_attendance where AttValue='TL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-30")."')", $con);
	  $SqlHf=mysql_query("select count(AttValue)as Hf from hrm_employee_attendance where AttValue='HF' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-30")."')", $con);
	  $SqlPresent=mysql_query("select count(AttValue)as Present from hrm_employee_attendance where AttValue='P' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-30")."')", $con);
	  $SqlAbsent=mysql_query("select count(AttValue)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-30")."')", $con);
	  $SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-30")."')", $con);
	  $SqlHoliday=mysql_query("select count(AttValue)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-30")."')", $con); 
	  $SqlELSun=mysql_query("select count(CheckSunday)as SUN from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-30")."')", $con);} 

   $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); $ResSH=mysql_fetch_array($SqlSH); $ResPH=mysql_fetch_array($SqlPH);
   $ResPL=mysql_fetch_array($SqlPL); $ResEL=mysql_fetch_array($SqlEL); $ResFL=mysql_fetch_array($SqlFL); $ResTL=mysql_fetch_array($SqlTL); $ResHf=mysql_fetch_array($SqlHf); 
   $ResPresent=mysql_fetch_array($SqlPresent); 
   $ResAbsent=mysql_fetch_array($SqlAbsent); $ResOnDuties=mysql_fetch_array($SqlOnDuties); $ResHoliday=mysql_fetch_array($SqlHoliday); 
   $ResELSun=mysql_fetch_array($SqlELSun);

  
   $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $TotalCL=$CountCL+$CountCH; $CountSL=$ResSL['SL']; $CountSH=$ResSH['SH']/2; $TotalSL=$CountSL+$CountSH;
   $CountPH=$ResPH['PH']/2; $TotalPL=$ResPL['PL']+$CountPH; $TotalEL=$ResEL['EL']; $TotalFL=$ResFL['FL']; $TotalTL=$ResTL['TL']; 
   $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL; $TotELSun=$ResELSun['SUN'];
   $CountHf=$ResHf['Hf']/2; //$CountHf=$ResHf['Hf']/2;  
   $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountPH+$CountHf;  //$TotalPR=$ResPresent['Present']+$CountHf; 
   $TotalAbsent=$ResAbsent['Absent']+$CountHf;
   $TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
   
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalPD=$TotalDayWithSunEL-$TotELSun;
   
   $TotalPaidDay=$TotalDayWithSunEL-$TotELSun;
   $TotalWorkingDay=26;
   
   
    /********************************************** hrm_employee_monthlyleave_balance open***********************************************/
	  $SL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$id." AND Month='".$m."' AND Year='".date("Y")."'", $con);  
	  $RowL=mysql_num_rows($SL);
	  if($RowL>0) { $RL=mysql_fetch_assoc($SL); 
	  if($m!=1) { $TotBalCL=$RL['OpeningCL']-$TotalCL;  $TotBalSL=$RL['OpeningSL']-$TotalSL; $TotBalPL=$RL['OpeningPL']-$TotalPL;  $TotBalEL=$RL['OpeningEL']-$TotalEL; 
	              $TotBalFL=$RL['OpeningOL']-$TotalFL; }  
	  if($m==1) { $TotBalCL=$RL['TotCL']-$TotalCL;  $TotBalSL=$RL['TotSL']-$TotalSL; $TotBalPL=$RL['TotPL']-$TotalPL;  $TotBalEL=$RL['TotEL']-$TotalEL; 
	              $TotBalFL=$RL['TotOL']-$TotalFL;}  
	  
	  $sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedEL='".$TotalEL."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceEL='".$TotBalEL."', BalanceOL='".$TotBalFL."' where EmployeeID=".$id." AND Month='".$m."' AND Year='".date("Y")."'", $con); }
	  /********************************************** hrm_employee_monthlyleave_balance close ***********************************************/

   
/********************************************** hrm_employee_monthatt ***********************************************/  
   $SqlMonthLeave=mysql_query("select * from hrm_employee_monthatt where EmployeeID=".$id." AND Month=".$m." AND Year='".$Y."'", $con); 
   $RowMonthLeave=mysql_num_rows($SqlMonthLeave);
   if($RowMonthLeave==0){ $InsUpMonth=mysql_query("insert into hrm_employee_monthatt(YearId,Year,EmployeeID,Month,MonthAtt_TotCL,MonthAtt_TotSL,MonthAtt_TotPL,MonthAtt_TotEL,MonthAtt_TotOL,MonthAtt_TotTL,MonthAtt_TotLeave,MonthAtt_TotOD,MonthAtt_TotHO,MonthAtt_TotPR,MonthAtt_TotAP,MonthAtt_TotWorkDay,MonthAtt_TotPaidDay,MonthAtt_UpdatedBy,MonthAtt_UpdatedDate,MonthAtt_UpdatedYearId)values(".$YearId.",'".$Y."',".$id.",".$m.",'".$TotalCL."','".$TotalSL."','".$TotalPL."','".$TotalEL."','".$TotalFL."','".$TotalTL."','".$TotalLeaveCount."','".$TotalOnDuties."','".$TotalHoliday."','".$TotalPR."','".$TotalAbsent."','".$TotalWorkingDay."','".$TotalPaidDay."',".$UserId.",'".date("Y-m-d")."',".$YearId.")", $con);}
   if($RowMonthLeave>0){ $InsUpMonth=mysql_query("UPDATE hrm_employee_monthatt SET YearId=".$YearId.", Year='".$Y."', EmployeeID=".$id.", Month=".$m.", MonthAtt_TotCL='".$TotalCL."', MonthAtt_TotSL='".$TotalSL."', MonthAtt_TotPL='".$TotalPL."', MonthAtt_TotEL='".$TotalEL."', MonthAtt_TotOL='".$TotalFL."', MonthAtt_TotTL='".$TotalTL."', MonthAtt_TotLeave='".$TotalLeaveCount."', MonthAtt_TotOD='".$TotalOnDuties."', MonthAtt_TotHO='".$TotalHoliday."', MonthAtt_TotPR='".$TotalPR."', MonthAtt_TotAP='".$TotalAbsent."', MonthAtt_TotWorkDay='".$TotalWorkingDay."', MonthAtt_TotPaidDay='".$TotalPaidDay."', MonthAtt_UpdatedBy=".$UserId.", MonthAtt_UpdatedDate='".date("Y-m-d")."', MonthAtt_UpdatedYearId=".$YearId." where EmployeeID=".$id." AND Month=".$m." AND Year='".date("Y")."'", $con);}
  
  if($InsUpMonth) 
    {  /********************************************** hrm_employee_yearatt ***********************************************/
	  $SqlTotCL=mysql_query("select SUM(MonthAtt_TotCL)as TotCL from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id, $con);
	  $SqlTotSL=mysql_query("select SUM(MonthAtt_TotSL)as TotSL from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id, $con);
	  $SqlTotPL=mysql_query("select SUM(MonthAtt_TotPL)as TotPL from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id, $con);
	  $SqlTotEL=mysql_query("select SUM(MonthAtt_TotEL)as TotEL from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id, $con); 
	  $SqlTotFL=mysql_query("select SUM(MonthAtt_TotOL)as TotOL from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id, $con);
	  $SqlTotTL=mysql_query("select SUM(MonthAtt_TotTL)as TotTL from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$EMPID, $con); 
	  $SqlTotLeave=mysql_query("select SUM(MonthAtt_TotLeave)as TotLeave from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id, $con);
	  $SqlTotOD=mysql_query("select SUM(MonthAtt_TotOD)as TotOD from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id, $con);
	  $SqlTotHO=mysql_query("select SUM(MonthAtt_TotHO)as TotHO from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id, $con);
	  $SqlTotPR=mysql_query("select SUM(MonthAtt_TotPR)as TotPR from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id, $con);
	  $SqlTotAP=mysql_query("select SUM(MonthAtt_TotAP)as TotAP from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id, $con);
	  $SqlTotWorkDay=mysql_query("select SUM(MonthAtt_TotWorkDay)as TotWorkDay from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id, $con);
	  $SqlTotPaidDay=mysql_query("select SUM(MonthAtt_TotPaidDay)as TotPaidDay from hrm_employee_monthatt where Year='".$Y."' AND EmployeeID=".$id, $con); 
	  	
      $ResTotCL=mysql_fetch_array($SqlTotCL); $ResTotSL=mysql_fetch_array($SqlTotSL); $ResTotPL=mysql_fetch_array($SqlTotPL); $ResTotEL=mysql_fetch_array($SqlTotEL); 
	  $ResTotFL=mysql_fetch_array($SqlTotFL); $ResTotTL=mysql_fetch_array($SqlTotTL); $ResTotLeave=mysql_fetch_array($SqlTotLeave); $ResTotOD=mysql_fetch_array($SqlTotOD);
      $ResTotHO=mysql_fetch_array($SqlTotHO); $ResTotPR=mysql_fetch_array($SqlTotPR); $ResTotAP=mysql_fetch_array($SqlTotAP);
      $ResTotWorkDay=mysql_fetch_array($SqlTotWorkDay); $ResTotPaidDay=mysql_fetch_array($SqlTotPaidDay);
	  
	  $CountTotCL=$ResTotCL['TotCL']; $CountTotSL=$ResTotSL['TotSL']; $CountTotPL=$ResTotPL['TotPL']; $CountTotEL=$ResTotEL['TotEL']; $CountTotFL=$ResTotFL['TotOL'];
	  $CountTotTL=$ResTotTL['TotTL']; $CountTotLeave=$ResTotLeave['TotLeave']; $CountTotOD=$ResTotOD['TotOD']; $CountTotHO=$ResTotHO['TotHO']; $CountTotPR=$ResTotPR['TotPR'];
	  $CountTotAP=$ResTotAP['TotAP']; $CountTotWorkDay=$ResTotWorkDay['TotWorkDay']; $CountTotPaidDay=$ResTotPaidDay['TotPaidDay'];
	  
	  $SqlYearAtt=mysql_query("select * from hrm_employee_yearatt where EmployeeID=".$id." AND Year='".$Y."'", $con); 
      $RowYearAtt=mysql_num_rows($SqlYearAtt);
	  if($RowYearAtt==0){ $InsUpYear=mysql_query("insert into hrm_employee_yearatt(YearId,Year,EmployeeID,YearAtt_TotCL,YearAtt_TotSL,YearAtt_TotPL,YearAtt_TotEL,YearAtt_TotOL,YearAtt_TotTL,YearAtt_TotLeave,YearAtt_TotOD,YearAtt_TotHO,YearAtt_TotPR,YearAtt_TotAP,YearAtt_TotWorkDay,YearAtt_TotPaidDay,YearAtt_UpdatedBy,YearAtt_UpdatedDate,YearAtt_UpdatedYearId)values(".$YearId.",'".$Y."',".$id.",'".$CountTotCL."','".$CountTotSL."','".$CountTotPL."','".$CountTotEL."','".$CountTotFL."','".$CountTotTL."','".$CountTotLeave."','".$CountTotOD."','".$CountTotHO."','".$CountTotPR."','".$CountTotAP."','".$CountTotWorkDay."','".$CountTotPaidDay."',".$UserId.",'".date("Y-m-d")."',".$YearId.")", $con); }
	  if($RowYearAtt>0){ $InsUpYear=mysql_query("UPDATE hrm_employee_yearatt SET YearId=".$YearId.", Year='".$Y."', EmployeeID=".$id.", YearAtt_TotCL='".$CountTotCL."', YearAtt_TotSL='".$CountTotSL."', YearAtt_TotPL='".$CountTotPL."', YearAtt_TotEL='".$CountTotEL."', YearAtt_TotOL='".$CountTotFL."', YearAtt_TotTL='".$CountTotTL."', YearAtt_TotLeave='".$CountTotLeave."', YearAtt_TotOD='".$CountTotOD."', YearAtt_TotHO='".$CountTotHO."', YearAtt_TotPR='".$CountTotPR."', YearAtt_TotAP='".$CountTotAP."', YearAtt_TotWorkDay='".$CountTotWorkDay."', YearAtt_TotPaidDay='".$CountTotPaidDay."', YearAtt_UpdatedBy=".$UserId.", YearAtt_UpdatedDate='".date("Y-m-d")."', YearAtt_UpdatedYearId=".$YearId." where EmployeeID=".$id." AND Year='".$Y."'", $con); }
	  
	   /********************************************** hrm_employee_finyearatt ***********************************************/
	  $SqlFinCL=mysql_query("select SUM(MonthAtt_TotCL)as FinCL from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id, $con);
	  $SqlFinSL=mysql_query("select SUM(MonthAtt_TotSL)as FinSL from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id, $con);
	  $SqlFinPL=mysql_query("select SUM(MonthAtt_TotPL)as FinPL from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id, $con);
	  $SqlFinEL=mysql_query("select SUM(MonthAtt_TotEL)as FinEL from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id, $con); 
	  $SqlFinFL=mysql_query("select SUM(MonthAtt_TotOL)as FinOL from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id, $con); 
	  $SqlFinTL=mysql_query("select SUM(MonthAtt_TotTL)as FinTL from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$EMPID, $con);  
	  $SqlFinLeave=mysql_query("select SUM(MonthAtt_TotLeave)as FinLeave from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id, $con);
	  $SqlFinOD=mysql_query("select SUM(MonthAtt_TotOD)as FinOD from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id, $con);
	  $SqlFinHO=mysql_query("select SUM(MonthAtt_TotHO)as FinHO from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id, $con);
	  $SqlFinPR=mysql_query("select SUM(MonthAtt_TotPR)as FinPR from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id, $con);
	  $SqlFinAP=mysql_query("select SUM(MonthAtt_TotAP)as FinAP from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id, $con);
	  $SqlFinWorkDay=mysql_query("select SUM(MonthAtt_TotWorkDay)as FinWorkDay from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id, $con);
	  $SqlFinPaidDay=mysql_query("select SUM(MonthAtt_TotPaidDay)as FinPaidDay from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id, $con);
	  	
      $ResFinCL=mysql_fetch_array($SqlFinCL); $ResFinSL=mysql_fetch_array($SqlFinSL); $ResFinPL=mysql_fetch_array($SqlFinPL);  $ResFinEL=mysql_fetch_array($SqlFinEL); 
	  $ResFinFL=mysql_fetch_array($SqlFinFL); $ResFinTL=mysql_fetch_array($SqlFinTL); $ResFinLeave=mysql_fetch_array($SqlFinLeave); $ResFinOD=mysql_fetch_array($SqlFinOD);
      $ResFinHO=mysql_fetch_array($SqlFinHO); //$ResFinPR=mysql_fetch_array($SqlFinPR); $ResFinAP=mysql_fetch_array($SqlFinAP);
      $ResFinWorkDay=mysql_fetch_array($SqlFinWorkDay); $ResFinPaidDay=mysql_fetch_array($SqlFinPaidDay);
	  
	  $CountFinCL=$ResFinCL['FinCL']; $CountFinSL=$ResFinSL['FinSL']; $CountFinPL=$ResFinPL['FinPL']; $CountFinEL=$ResFinEL['FinEL']; $CountFinFL=$ResFinFL['FinOL'];
	  $CountFinTL=$ResFinTL['FinTL']; $CountFinLeave=$ResFinLeave['FinLeave']; $CountFinOD=$ResFinOD['FinOD']; $CountFinHO=$ResFinHO['FinHO']; $CountFinPR=$ResFinPR['FinPR'];
	  $CountFinAP=$ResFinAP['FinAP']; $CountFinWorkDay=$ResFinWorkDay['FinWorkDay']; $CountFinPaidDay=$ResFinPaidDay['FinPaidDay'];
	  
	  $SqlFinYearAtt=mysql_query("select * from hrm_employee_finyearatt where EmployeeID=".$id." AND YearId=".$YearId, $con); 
      $RowFinYearAtt=mysql_num_rows($SqlFinYearAtt);
	  if($RowFinYearAtt==0){ $InsUpFinYear=mysql_query("insert into hrm_employee_finyearatt(YearId,Year,EmployeeID,FinYearAtt_TotCL,FinYearAtt_TotSL,FinYearAtt_TotPL,FinYearAtt_TotEL,FinYearAtt_TotOL,FinYearAtt_TotTL,FinYearAtt_TotLeave,FinYearAtt_TotOD,FinYearAtt_TotHO,FinYearAtt_TotPR,FinYearAtt_TotAP,FinYearAtt_TotWorkDay,FinYearAtt_TotPaidDay,FinYearAtt_UpdatedBy,FinYearAtt_UpdatedDate,FinYearAtt_UpdatedYearId)values(".$YearId.",'".$Y."',".$id.",'".$CountFinCL."','".$CountFinSL."','".$CountFinPL."','".$CountFinEL."','".$CountFinFL."','".$CountFinTL."','".$CountFinLeave."','".$CountFinOD."','".$CountFinHO."','".$CountFinPR."','".$CountFinAP."','".$CountFinWorkDay."','".$CountFinPaidDay."',".$UserId.",'".date("Y-m-d")."',".$YearId.")", $con); }
	  if($RowFinYearAtt>0){ $InsUpFinYear=mysql_query("UPDATE hrm_employee_finyearatt SET YearId=".$YearId.", Year='".$Y."', EmployeeID=".$id.", FinYearAtt_TotCL='".$CountFinCL."', FinYearAtt_TotSL='".$CountFinSL."', FinYearAtt_TotPL='".$CountFinPL."', FinYearAtt_TotEL='".$CountFinEL."', FinYearAtt_TotOL='".$CountFinFL."', FinYearAtt_TotTL='".$CountFinTL."', FinYearAtt_TotLeave='".$CountFinLeave."', FinYearAtt_TotOD='".$CountFinOD."', FinYearAtt_TotHO='".$CountFinHO."', FinYearAtt_TotPR='".$CountFinPR."', FinYearAtt_TotAP='".$CountFinAP."', FinYearAtt_TotWorkDay='".$CountFinWorkDay."', FinYearAtt_TotPaidDay='".$CountFinPaidDay."', FinYearAtt_UpdatedBy=".$UserId.", FinYearAtt_UpdatedDate='".date("Y-m-d")."', FinYearAtt_UpdatedYearId=".$YearId." where EmployeeID=".$id." AND YearId=".$YearId, $con); }
	 
	
	  if($InsUpFinYear){$msg="Employee attendance date updated successfully"; }
	}
  
  }
 } 
}
?>