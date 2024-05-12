<?php 
require_once('config/config.php');

if($_REQUEST['action']='FFExport') 
{ 
  
 $xls_filename = 'Full&Final_Summary.xls';
 header("Content-Type: application/xls");
 header("Content-Disposition: attachment; filename=$xls_filename");
 header("Pragma: no-cache"); header("Expires: 0"); $sep = "\t"; 
 echo "Sn\tEmpCode\tName\tDepartment\tGarde\tDesignation\tDOJ\tResignation Date\tRelieving Date\tClearance Status\tBankName\tBankBranch\tAccountNo\tTotal Earn\tTotal Deduct\tTotal Paid\tAny Note\tEmp Apply\tRep Approved\tHOD Approved\tHR Approved\tEmp ClearanceDate\tRep ClearanceDate\tIT ClearanceDate\tHR ClearanceDate\tAccount ClearanceDate";
 print("\n");
 $sql=mysql_query("select EmpSepId,EmpCode,Fname,Sname,Lname,GradeValue,DesigName,DepartmentName,DateJoining,Emp_ResignationDate,HR_RelievingDate, HR_RelievingDate3, HR_RelievingDate2, NoticeBankName, BankName, BranchName, AccountNo, IT_NOC, Rep_NOC, HR_NOC, Acc_NOC, Note  from hrm_employee_separation s INNER JOIN hrm_employee e ON s.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g on s.EmployeeID=g.EmployeeID inner join hrm_grade gr on g.GradeId=gr.GradeId inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_designation de on g.DesigId=de.DesigId where s.ResignationStatus=4 AND e.CompanyId=".$_REQUEST['value']." order by s.Emp_ResignationDate DESC", $con); $row=mysql_num_rows($sql);
  
 if($row>0) 
 { 
  $no=1; 
  while($res=mysql_fetch_array($sql))
  {
   
   $HRev3=' '; $HRev2=' '; $HRev=' ';      
      
   $schema_insert = "";
   $schema_insert .= $no.$sep;	
   $schema_insert .= $res['EmpCode'].$sep;	
   $schema_insert .= $res['Fname'].' '.$res['Sname'].' '.$res['Lname'].$sep;
   $schema_insert .= $res['DepartmentName'].$sep;	
   $schema_insert .= $res['GradeValue'].$sep;
   $schema_insert .= $res['DesigName'].$sep;	
   $schema_insert .= $res['DateJoining'].$sep;
   $schema_insert .= $res['Emp_ResignationDate'].$sep;	
   
   if($res['HR_RelievingDate3']!='' AND $res['HR_RelievingDate3']!='0000-00-00' AND $res['HR_RelievingDate3']!='1970-01-01')
   { $HRev3=$res['HR_RelievingDate3'].', '; } 
   if($res['HR_RelievingDate2']!='' AND $res['HR_RelievingDate2']!='0000-00-00' AND $res['HR_RelievingDate2']!='1970-01-01')
   { $HRev2=$res['HR_RelievingDate2'].', '; } 
   if($res['HR_RelievingDate']!='' AND $res['HR_RelievingDate']!='0000-00-00' AND $res['HR_RelievingDate']!='1970-01-01')
   { $HRev=$res['HR_RelievingDate']; }
   
   $schema_insert .= $HRev3.' '.$HRev2.' '.$HRev.$sep;	
   
   if($res['IT_NOC']=='Y' AND $res['Rep_NOC']=='Y' AND $res['HR_NOC']=='Y' AND $res['Acc_NOC']=='Y'){$Csts='SUBMITTED';}
   else{$Csts='PENDING'; } 
   $schema_insert .= $Csts.$sep;
   
   $schema_insert .= $res['BankName'].$sep;
   $schema_insert .= $res['BranchName'].$sep;
   $schema_insert .= $res['AccountNo'].$sep;
   
   $sqlHr=mysql_query("select * from hrm_employee_separation_nochr where EmpSepId=".$res['EmpSepId'],$con); 
   $sqlAcc=mysql_query("select * from hrm_employee_separation_nocacc where EmpSepId=".$res['EmpSepId'],$con);
   $sqlRep=mysql_query("select * from hrm_employee_separation_nocrep where EmpSepId=".$res['EmpSepId'],$con);
   $sqlIt=mysql_query("select * from hrm_employee_separation_nocit where EmpSepId=".$res['EmpSepId'],$con); 
   $resHr=mysql_fetch_assoc($sqlHr); $resAcc=mysql_fetch_assoc($sqlAcc); 
   $resRep=mysql_fetch_assoc($sqlRep); $resIt=mysql_fetch_assoc($sqlIt);
 
   $TotalEarn=$resHr['TotEar']+$resAcc['TotAmt'];
   $TotRepAmt=$resRep['Prtis_1Amt']+$resRep['Prtis_2Amt']+$resRep['Prtis_3Amt']+$resRep['Prtis_4Amt']+$resRep['Prtis_5Amt']+$resRep['Prtis_6Amt']+$resRep['Prtis_7Amt']+$resRep['Prtis_8Amt']+$resRep['Prtis_9Amt']+$resRep['Prtis_10Amt']+$resRep['Prtis_11Amt']+$resRep['Prtis_12Amt']+$resRep['Prtis_13Amt']+$resRep['Prtis_14Amt']+$resRep['Prtis_15Amt']+$resRep['Prtis_16Amt']+$resRep['Prtis_17Amt']+$resRep['Prtis_18Amt']+$resRep['Prtis_19Amt']+$resRep['Prtis_20Amt']+$resRep['Prtis_21Amt']+$resRep['Prtis_22Amt']+$resRep['Prtis_23Amt']+$resRep['Prtis_24Amt']+$resRep['Prtis_25Amt']+$resRep['Prtis_26Amt']+$resRep['Prtis_27Amt']+$resRep['Prtis_28Amt']+$resRep['Prtis_29Amt']+$resRep['Prtis_30Amt']+$resRep['Prtis_31Amt']+$resRep['Prtis_32Amt']+$resRep['Prtis_33Amt']+$resRep['Prtis_34Amt']+$resRep['Prtis_35Amt']+$resRep['Prtis_36Amt']+$resRep['Prtis_37Amt']+$resRep['Prtis_38Amt']+$resRep['Prtis_39Amt']+$resRep['Prtis_40Amt'];
   $TotalDeduct=$resHr['TotDeduct']+$resAcc['TotAmt2']+$resIt['TotItAmt']+$TotRepAmt;
   
   if($TotalEarn>=$TotalDeduct){$TotalPayable=$TotalEarn-$TotalDeduct;}
   elseif($TotalEarn<$TotalDeduct){$TotalPayable=$TotalDeduct-$TotalEarn;}
   
   $schema_insert .= $TotalEarn.$sep;
   $schema_insert .= $TotalDeduct.$sep;
   $schema_insert .= $TotalPayable.$sep;
   $schema_insert .= $res['Note'].$sep;
   
   
   $sqlSE=mysql_query("select * from hrm_employee_separation where EmpSepId=".$res['EmpSepId'], $con); 
   $resSE=mysql_fetch_assoc($sqlSE);
   $schema_insert .= $resSE['Emp_SaveDate'].$sep;
   $schema_insert .= $resSE['Rep_SaveDate'].$sep;
   $schema_insert .= $resSE['Hod_SaveDate'].$sep;
   $schema_insert .= $resSE['HR_SaveDate'].$sep;
   
$ne=mysql_query("select FormSubmitDate from hrm_employee_separation_exitint where EmpSepId=".$res['EmpSepId'],$con);
$nr=mysql_query("select NocSubmitDate from hrm_employee_separation_nocrep where EmpSepId=".$res['EmpSepId'],$con);   
$ni=mysql_query("select NocSubmitDate from hrm_employee_separation_nocit where EmpSepId=".$res['EmpSepId'],$con);  
$nh=mysql_query("select NocSubmitDate from hrm_employee_separation_nochr where EmpSepId=".$res['EmpSepId'],$con);
$na=mysql_query("select NocSubmAccDate from hrm_employee_separation_nocacc where EmpSepId=".$res['EmpSepId'],$con);
$rowe=mysql_num_rows($ne); $rowr=mysql_num_rows($nr); $rowi=mysql_num_rows($ni);
$rowh=mysql_num_rows($nh); $rowa=mysql_num_rows($na);
$rese=mysql_fetch_assoc($ne); $resr=mysql_fetch_assoc($nr); $resi=mysql_fetch_assoc($ni);
$resh=mysql_fetch_assoc($nh); $resa=mysql_fetch_assoc($na);   
   
   if($rowe>0){ $schema_insert .= $rese['FormSubmitDate'].$sep; }else{ $schema_insert .= ''.$sep; }
   if($rowr>0){ $schema_insert .= $resr['NocSubmitDate'].$sep; }else{ $schema_insert .= ''.$sep; }
   if($rowi>0){ $schema_insert .= $resi['NocSubmitDate'].$sep; }else{ $schema_insert .= ''.$sep; }
   if($rowh>0){ $schema_insert .= $resh['NocSubmitDate'].$sep; }else{ $schema_insert .= ''.$sep; }
   if($rowa>0){ $schema_insert .= $resa['NocSubmAccDate'].$sep; }else{ $schema_insert .= ''.$sep; }
   
			  
   $schema_insert = str_replace($sep."$", "", $schema_insert);
   $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
   $schema_insert .= "\t";
   print(trim($schema_insert)); print "\n"; 
   $no++;
  }
 }//if($row>0)
 
}
?>