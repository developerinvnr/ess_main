<?php 
  require_once('config/config.php');
  include('codeEncDec.php');
  if($_REQUEST['action']=='Submit' && $_REQUEST['action']!='')
  { 

    $Eccheck = mysql_query("SELECT count(*) as total FROM hrm_employee where EmpCode=".$_REQUEST['EmpCode']." AND EmpStatus!='De' AND CompanyId=".$_REQUEST['ComId'], $con);
	$Eccrow=mysql_fetch_assoc($Eccheck);
    if($Eccrow['total']>0){echo '<script>alert("This employee code already exist.");</script>'; header('Location:AddEmp.php?action=false&CompanyId='.$_REQUEST['ComId']);}
    else
    {  //Open

    if($_REQUEST['ComId']!='' && $_REQUEST['EmpCode']!='')
	{ if($_REQUEST['SName']==''){$_REQUEST['SName']='';} 
	  if($_REQUEST['DOC']!='' AND $_REQUEST['DOC']!='0000-00-00' AND $_REQUEST['DOC']!='00-00-0000' AND $_REQUEST['DOC']!='1970-01-01'){$YN='Y'; $YH='Y';} else {$YN='N'; $YH='N';}
	  if($_REQUEST['DOC']==''){$_REQUEST['DOC']='0000-00-00';}
	  if($_REQUEST['OffiMobileNo']==''){$_REQUEST['OffiMobileNo']=0;} if($_REQUEST['FileNo']==''){$_REQUEST['FileNo']=0;}
	  $pass=encrypt($_REQUEST['EmpPass']);
	  $Fname=strtoupper($_REQUEST['FName']);  $Sname=strtoupper($_REQUEST['SName']);  $Lname=strtoupper($_REQUEST['LName']);
	  $sqlIns = mysql_query("insert into hrm_employee(EmpCode,EmpPass,EmpStatus,Fname,Sname,Lname,CompanyId,CreatedBy,CreatedDate,YearId)values(".$_REQUEST['EmpCode'].", '".$pass."', '".$_REQUEST['EmpStatus']."', '".$Fname."', '".$Sname."', '".$Lname."', ".$_REQUEST['ComId'].", ".$_REQUEST['UserId'].", '".date("Y-m-d")."', ".$_REQUEST['YearId'].")", $con);
	  if($sqlIns) 
       { $SqlEmpID = mysql_query("SELECT EmployeeID FROM hrm_employee where EmpCode=".$_REQUEST['EmpCode']." AND CompanyId=".$_REQUEST['ComId'], $con);  
	     $ResEmpID=mysql_fetch_assoc($SqlEmpID);
	     if($SqlEmpID)
		  { $sql_1 = mysql_query("insert into hrm_employee_general(EmployeeID,EC,FileNo,DateJoining,DateConfirmationYN,ConfirmHR,DateConfirmation,DOB,DOB_dm,GradeId,CostCenter,HqId,DepartmentId,DesigId,MobileNo_Vnr,EmailId_Vnr,CreatedBy,CreatedDate,YearId)values(".$ResEmpID['EmployeeID'].", ".$_REQUEST['EmpCode'].", ".$_REQUEST['FileNo'].", '".date("Y-m-d",strtotime($_REQUEST['DOJ']))."', '".$YN."', '".$YH."', '".date("Y-m-d",strtotime($_REQUEST['DOC']))."', '".date("Y-m-d",strtotime($_REQUEST['DOB']))."', '".date("0000-m-d",strtotime($_REQUEST['DOB']))."', ".$_REQUEST['GradeName'].", '".$_REQUEST['CostCenter']."', ".$_REQUEST['HQName'].", ".$_REQUEST['DeptName'].", ".$_REQUEST['DesigName'].", ".$_REQUEST['OffiMobileNo'].", '".$_REQUEST['OffiEmialId']."', ".$_REQUEST['UserId'].", '".date("Y-m-d")."', ".$_REQUEST['YearId'].")", $con); 
		    $sql_2 = mysql_query("insert into hrm_employee_personal(EmployeeID,EC)values(".$ResEmpID['EmployeeID'].",".$_REQUEST['EmpCode'].")", $con); 
            $sql_3 = mysql_query("insert into hrm_employee_photo(EmployeeID,EC)values(".$ResEmpID['EmployeeID'].",".$_REQUEST['EmpCode'].")", $con); 
            $sql_4 = mysql_query("insert into hrm_employee_contact(EmployeeID,EC)values(".$ResEmpID['EmployeeID'].",".$_REQUEST['EmpCode'].")", $con);    
            $sql_5 = mysql_query("insert into hrm_employee_family(EmployeeID,EC)values(".$ResEmpID['EmployeeID'].",".$_REQUEST['EmpCode'].")", $con);    
            //$sql_6 = mysql_query("insert into hrm_employee_leave(LeaveYearId,Year,EmployeeID,EC)values(".$_REQUEST['YearId'].",'".date("Y")."',".$ResEmpID['EmployeeID'].",".$_REQUEST['EmpCode'].")", $con);    
            $sql_7 = mysql_query("insert into hrm_employee_eligibility(EmployeeID,EC)values(".$ResEmpID['EmployeeID'].",".$_REQUEST['EmpCode'].")", $con); 
            $sql_8 = mysql_query("insert into hrm_employee_ctc(EmployeeID,EC)values(".$ResEmpID['EmployeeID'].",".$_REQUEST['EmpCode'].")", $con); 
			$sql_9 = mysql_query("insert into hrm_employee_experience(EmployeeID,EC)values(".$ResEmpID['EmployeeID'].",".$_REQUEST['EmpCode'].")", $con);

$sqlSY=mysql_query("select CurrY from hrm_pms_setting where CompanyId=".$_REQUEST['ComId']." AND Process='KRA'", $con); $SNo=1; $resSY=mysql_fetch_array($sqlSY);
                        $sql10=mysql_query("insert into hrm_employee_pms(AssessmentYear,CompanyId,EmployeeID,HR_Curr_DepartmentId,YearId) values(".$resSY['CurrY'].", ".$_REQUEST['ComId'].", ".$ResEmpID['EmployeeID'].", ".$_REQUEST['DeptName'].", ".$resSY['CurrY'].")", $con);

		    $sql_11 = mysql_query("insert into hrm_employee_reporting(EmployeeID)values(".$ResEmpID['EmployeeID'].")", $con);
			$sql_12 = mysql_query("insert into hrm_employee_checklist(EmployeeID,EC)values(".$ResEmpID['EmployeeID'].",".$_REQUEST['EmpCode'].")", $con);
			//$sql_12 = mysql_query("insert into hrm_employee_assets(EmployeeID,EC)values(".$ResEmpID['EmployeeID'].",".$_REQUEST['EmpCode'].")", $con);
			$sql_13 = mysql_query("insert into hrm_employee_monthlyleave_balance(EmployeeID,EC,Month,Year)values(".$ResEmpID['EmployeeID'].",".$_REQUEST['EmpCode'].",'".date("m",strtotime($_REQUEST['DOJ']))."','".date("Y",strtotime($_REQUEST['DOJ']))."',)", $con);
            $sql_14 = mysql_query("insert into hrm_employee_reporting_pmskra(EmployeeID)values(".$ResEmpID['EmployeeID'].")", $con);
		    
		    
		    if(date("Y-m-d",strtotime($_REQUEST['DOJ']))>date('Y-01-01') AND date("Y")>='2019')
            {
			
			 if($_REQUEST['CostCenter']==1 OR $_REQUEST['CostCenter']==14 OR $_REQUEST['CostCenter']==13 OR $_REQUEST['CostCenter']==26){ $statee='State_2'; }else{ $statee='State_1'; }
			 $sqlS_2=mysql_query("select HolidayDate from hrm_holiday where ".$statee."=1 AND Year='".date("Y")."' AND HolidayDate>'".date("Y-m-d",strtotime($_REQUEST['DOJ']))."' AND status='A' order by HolidayId ASC", $con); 
             while($resS_2=mysql_fetch_array($sqlS_2))
             {
              $sql_2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ResEmpID['EmployeeID']." AND AttDate='".$resS_2['HolidayDate']."'", $con); $row_2=mysql_num_rows($sql_2);
              if($row_2==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$ResEmpID['EmployeeID'].",'HO','".$resS_2['HolidayDate']."','".date("Y")."',".$YearId.")"); }elseif($row_2>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='HO' where EmployeeID=".$ResEmpID['EmployeeID']." AND AttDate='".$resS_2['HolidayDate']."' AND YearId=".$YearId); } 
             }
			 
            }
            
		    
		    $_SESSION['EMPID']=$ResEmpID['EmployeeID'];
		    header('Location:EmpGeneral.php?ID='.$_SESSION['EMPID'].'&Event=Edit');
		  }
	
	   }
	
	}
        
        } //Close
  
  }
?>