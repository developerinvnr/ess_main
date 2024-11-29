<?php
header("Content-type: application/json; charset=utf-8");
$con=mysqli_connect('localhost','hrims_user','hrims@192');
if(!$con) die("Failed to connect to database!");
$db=mysqli_select_db( $con, 'hrims');
if(!$db) die("Failed to select database!");
date_default_timezone_set('Asia/Calcutta');

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
/*$image = base64_decode($_POST['image']);
if(file_put_contents('1.png',$image)){
    echo json_encode(array('msg'=>"file uploaded",'status'=>200));
}*/
//$target_file = 'upload/';
//move_uploaded_file($_FILES['image']['tmp_name'],$target_file.'1.png');



if($_REQUEST['empid'] >0){
$run_qry=mysqli_query($con,"select * from hrm_employee where EmployeeID =".$_REQUEST['empid']." AND EmpStatus = 'A'");
$num=mysqli_num_rows($run_qry); 
if($num == 0){
    echo json_encode(array("Code" => "404") ); 
    die;
}}

    
if($_REQUEST['value']=='')
{ 
   echo json_encode(array("msg" => "Parameter Missing!") ); 
}


//My Assest List
elseif($_REQUEST['value']=='MyAssetName' && $_REQUEST['empid']>0)
{
    
 $sqlMax=mysqli_query($con,"select AssetEmpReqId from hrm_asset_employee_request where EmployeeID=".$ei);  $rowMax=mysqli_num_rows($sqlMax); 
 $ReqNo=$rowMax+1;
    
 $sElg=mysqli_query($con,"select Mobile_Hand_Elig from hrm_employee_eligibility where EmployeeID=".$_REQUEST['empid']." AND Status='A'"); $rElig=mysqli_fetch_assoc($sElg);
 if($rElig['Mobile_Hand_Elig']=='Y'){ $sub_qry="1=1"; }
 else{ $sub_qry="an.AssetNId!=11 AND an.AssetNId!=12 AND an.AssetNId!=18"; }
 
 $run_qry=mysqli_query($con,"select ne.AssetNId,AssetName,AssetELimit,AssetLimit from hrm_asset_name_emp ne LEFT JOIN hrm_asset_name an ON ne.AssetNId=an.AssetNId where ne.EmployeeID=".$_REQUEST['empid']." AND ne.AssetESt='Y' AND an.Status='A' AND ".$sub_qry." order by an.AssetName ASC");
 $num=mysqli_num_rows($run_qry); $carray = array();
 if($num>0)
 {
  while($res=mysqli_fetch_assoc($run_qry)){ $carray[]=$res; }
  echo json_encode(array("Code" => "300", "assest_list" => $carray, "ReqNo" => $ReqNo) ); 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Data Not Found!") ); }  
 
}


//Assest Limit
elseif($_REQUEST['value']=='Asset_Limit' && $_REQUEST['empid']>0 && $_REQUEST['AssetNId']>0)
{
 if($_REQUEST['AssetNId']==11 OR $_REQUEST['AssetNId']==12 OR $_REQUEST['AssetNId']==18)
 { $sEg=mysqli_query($con,"select Mobile_Hand_Elig_Rs from hrm_employee_eligibility where EmployeeID=".$_REQUEST['empid']." AND Status='A'"); $rEg=mysqli_fetch_assoc($sEg);  
   if($rEg['Mobile_Hand_Elig_Rs']!=0 AND $rEg['Mobile_Hand_Elig_Rs']!=''){$Amt=$rEg['Mobile_Hand_Elig_Rs'];}else{$Amt=0;}
 }
 else
 { 
  //$sqlG=mysqli_query($con,"select GradeId from hrm_employee_general where EmployeeID=".$_REQUEST['empid']); 
  //$resG=mysqli_fetch_assoc($sqlG); 
  $sqlEE=mysqli_query($con,"select AssetELimit from hrm_asset_name_emp where EmployeeID=".$_REQUEST['empid']." AND AssetNId=".$_REQUEST['AssetNId'].""); $resEE=mysqli_fetch_assoc($sqlEE);  
  if($resEE['AssetELimit']>0){$Amt=$resEE['AssetELimit'];}else{$Amt=0;} 
 }
 
 
 
 if($_REQUEST['AssetNId']==8 OR $_REQUEST['AssetNId']==9 OR $_REQUEST['AssetNId']==19)
 {
  $sqlEOldReq=mysqli_query($con,"select SUM(ApprovalAmt) as AppAmt from hrm_asset_employee_request where EmployeeID=".$_REQUEST['empid']." AND (AssetNId=8 OR AssetNId=9 OR AssetNId=19) AND ApprovalStatus=2 AND ReqAmtExpiryDate>='".date("Y-m-d")."'"); 
 }
 elseif($_REQUEST['AssetNId']==11 OR $_REQUEST['AssetNId']==12 OR $_REQUEST['AssetNId']==18)
 {
  $sqlEOldReq=mysqli_query($con,"select SUM(ApprovalAmt) as AppAmt from hrm_asset_employee_request where EmployeeID=".$_REQUEST['empid']." AND (AssetNId=11 OR AssetNId=12 OR AssetNId=18) AND ApprovalStatus=2 AND ReqAmtExpiryDate>='".date("Y-m-d")."'"); 
 }
 else
 {
  $sqlEOldReq=mysqli_query($con,"select SUM(ApprovalAmt) as AppAmt from hrm_asset_employee_request where EmployeeID=".$_REQUEST['empid']." AND AssetNId=".$_REQUEST['AssetNId']." AND ApprovalStatus=2 AND ReqAmtExpiryDate>='".date("Y-m-d")."'");
 }
 
 $rowEOldReq=mysqli_num_rows($sqlEOldReq); 
 if($rowEOldReq>0)
 { $resEOldReq=mysqli_fetch_assoc($sqlEOldReq); $ActualAmt=$Amt-$resEOldReq['AppAmt']; }else{$ActualAmt=$Amt;}
 if($ActualAmt>0){$ActAsstAmt=$ActualAmt;}else{$ActAsstAmt=0.00;}

 echo json_encode(array("Code" => "300", "assest_limit" => $ActAsstAmt) );   
 
}





//Assest Request Reports
elseif($_REQUEST['value']=='MyAssetReq_Reports' && $_REQUEST['empid']>0)
{
 $sql=mysqli_query($con,"select AssetName,r.* from hrm_asset_employee_request r inner join hrm_asset_name n on r.AssetNId=n.AssetNId where r.EmployeeID=".$_REQUEST['empid']." AND r.Status!=0 order by r.ReqDate DESC");
 $num=mysqli_num_rows($sql); $ReportList = array();
 if($num>0)
 {
  while($res=mysqli_fetch_assoc($sql)){ $ReportList[]=$res; }
  echo json_encode(array("Code" => "300", "MyAssestReq_List" => $ReportList) ); 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Data Not Found!") ); } 
 
}





//Assest Request
elseif($_REQUEST['value'] == 'assest_req' && $_REQUEST['empid']>0 && $_REQUEST['AssetNId']>0)
{
  $sqlE=mysqli_query($con,"select EmpCode,Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr,RepEmployeeID from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where e.EmployeeID=".$_REQUEST['empid']); $resE=mysqli_fetch_assoc($sqlE); 
  if($resRep['DR']=='Y'){$MM='Dr.';} elseif($resRep['Gender']=='M'){$MM='Mr.';} elseif($resRep['Gender']=='F' AND $resRep['Married']=='Y'){$MM='Mrs.';} elseif($resRep['Gender']=='F' AND $resRep['Married']=='N'){$MM='Miss.';}  $EmpName=$MM.' '.$resRep['Fname'].' '.$resRep['Sname'].' '.$resRep['Lname'];
  
  $Lenght=strlen($resE['EmpCode']); 
  if($Lenght==1){$FileN='000'.$resE['EmpCode'];} 
  elseif($Lenght==2){$FileN='00'.$resE['EmpCode'];} 
  elseif($Lenght==3){$FileN='0'.$resE['EmpCode'];}
  elseif($Lenght==4){$FileN=$resE['EmpCode'];}  
  
  
  $uploadedBill=0; $extBill=""; $uploadedAsset=0; $extAsset="";
  
  //$Bill = base64_decode($_REQUEST['uBill']);
  $newfilenameBill='B'.$FileN.'_'.date("dmyHis").'.jpg';
  move_uploaded_file($_FILES['uBill']['tmp_name'],"../../Employee/AssetReqUploadFile/".$newfilenameBill);
  //file_put_contents("../../Employee/AssetReqUploadFile/".$newfilenameBill, $Bill);
  
  if(isset($_FILES['uAssImg'])){
  //$AssImg = base64_decode($_REQUEST['uAssImg']);
      $newfilenameAsset='A'.$FileN.'_'.date("dmyHis").'.jpg';
      move_uploaded_file($_FILES['uAssImg']['tmp_name'],"../../Employee/AssetReqUploadFile/".$newfilenameAsset);
      //file_put_contents("../../Employee/AssetReqUploadFile/".$newfilenameAsset, $AssImg);
  }
 
  
/***************************************************/  
/***************************************************/  
  if($_REQUEST['AssetNId']==1)
  {
    
	$RCImg_File=''; $DLImg_File=''; $InsuImg_File='';
	
	//$RCImg = base64_decode($_REQUEST['RCImg']);
    $RCImg_File='RC_'.$FileN.'_'.date("dmyHis").'.jpg';
    move_uploaded_file($_FILES['RCImg']['tmp_name'],"../../Employee/AssetReqUploadFile/".$RCImg_File);
    //file_put_contents("../../Employee/AssetReqUploadFile/".$RCImg_File, $RCImg);
	
	//$DLImg = base64_decode($_REQUEST['DLImg']);
    $DLImg_File='DL_'.$FileN.'_'.date("dmyHis").'.jpg';
    move_uploaded_file($_FILES['DLImg']['tmp_name'],"../../Employee/AssetReqUploadFile/".$DLImg_File);
    //file_put_contents("../../Employee/AssetReqUploadFile/".$DLImg_File, $DLImg);
    
    //$InsuImg = base64_decode($_REQUEST['InsuImg']);
    $InsuImg_File='Insu_'.$FileN.'_'.date("dmyHis").'.jpg';
    move_uploaded_file($_FILES['InsuImg']['tmp_name'],"../../Employee/AssetReqUploadFile/".$InsuImg_File);
    //file_put_contents("../../Employee/AssetReqUploadFile/".$InsuImg_File, $InsuImg);
	
	$RCNo=$_REQUEST['RCNo']; $DLNo=$_REQUEST['DLNo']; $InsuNo=$_REQUEST['InsuNo']; $VehiNo=$_REQUEST['VehiNo']; 
	$DLExpTo=$_REQUEST['DLExpTo']; $ChasNo=$_REQUEST['ChasNo']; $EngNo=$_REQUEST['EngNo']; $RegNo=$_REQUEST['RegNo']; 
	$RegDate=date("Y-m-d",strtotime($_REQUEST['RegDate']));
    
  } //if($_REQUEST['AssetNId']==1)
  else
  {
    $RCImg_File=''; $DLImg_File=''; $InsuImg_File=''; $RCNo=''; $DLNo=''; $InsuNo=''; $VehiNo=''; $DLExpTo='0000-00-00';
	$ChasNo=''; $EngNo=''; $RegNo=''; $RegDate='';
  }
/***************************************************/  
/***************************************************/   
 $ExpMDate=date('Y-m-d', strtotime("+36 months", strtotime(date("Y-m-d"))));
 $sqlOldReq=mysqli_query($con,"select * from hrm_asset_employee_request where EmployeeID=".$_REQUEST['empid']." AND AssetNId=".$_REQUEST['AssetNId']." AND ITApprovalStatus!=2 AND ITApprovalStatus!=3 "); $rowOldReq=mysqli_num_rows($sqlOldReq); 
 
 if($rowOldReq>0)
 { 
     //$msgerror="Your request is allready processed..."; 
     echo json_encode(array("Code" => "100", "msg" => "Your request is allready processed.") ); 
 }
 else
 { 
  $Rep=mysqli_query($con,"select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr,RepEmployeeID from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where e.EmployeeID=".$resRep['RepEmployeeID']); $RR=mysqli_fetch_assoc($Rep); if($RR['DR']=='Y'){$M='Dr.';} elseif($RR['Gender']=='M'){$M='Mr.';} elseif($RR['Gender']=='F' AND $RR['Married']=='Y'){$M='Mrs.';} elseif($RR['Gender']=='F' AND $RR['Married']=='N'){$M='Miss.';} $RepName=$M.' '.$RR['Fname'].' '.$RR['Sname'].' '.$RR['Lname'];
  
   $sqlHEmail=mysqli_query($con,"select e.EmployeeID,Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr,RepEmployeeID from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where e.EmployeeID=(select HodId from hrm_employee_reporting where EmployeeID=".$_REQUEST['empid'].")"); $resHEmail=mysqli_fetch_assoc($sqlHEmail); if($resHEmail['DR']=='Y'){$MMH='Dr.';} elseif($resHEmail['Gender']=='M'){$MMH='Mr.';} elseif($resHEmail['Gender']=='F' AND $resHEmail['Married']=='Y'){$MMH='Mrs.';} elseif($resHEmail['Gender']=='F' AND $resHEmail['Married']=='N'){$MMH='Miss.';} $HodName=$MMH.' '.$resHEmail['Fname'].' '.$resHEmail['Sname'].' '.$resHEmail['Lname'];   
     
     
   $sqlMax=mysqli_query($con,"select AssetEmpReqId from hrm_asset_employee_request where EmployeeID=".$ei); 
   $rowMax=mysqli_num_rows($sqlMax); $Sn=$rowMax+1;   
   
   $sqlItEmp=mysqli_query($con,"select e.EmployeeID,Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr,RepEmployeeID from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where e.EmployeeID=(select EmployeeID from hrm_asset_dept_access where DepartmentId=9)", $con); $resItEmp=mysqli_fetch_assoc($sqlItEmp); if($resItEmp['DR']=='Y'){$MMIT='Dr.';} elseif($resItEmp['Gender']=='M'){$MMIT='Mr.';} elseif($resItEmp['Gender']=='F' AND $resItEmp['Married']=='Y'){$MMIT='Mrs.';} elseif($resItEmp['Gender']=='F' AND $resItEmp['Married']=='N'){$MMIT='Miss.';} $ITEmpName=$MMIT.' '.$resItEmp['Fname'].' '.$resItEmp['Sname'].' '.$resItEmp['Lname'];
  
   if($_REQUEST['AssetNId']==11 OR $_REQUEST['AssetNId']==12 OR $_REQUEST['AssetNId']==18){ $sqlIns=mysqli_query($con,"insert into hrm_asset_employee_request(EmployeeID, AssetNId, ReqAmt, ReqDate, ReqAmtExpiryNOM, ReqAmtExpiryDate, ComName, Srn, ModelNo, ModelName, WarrantyNOY, WarrantyExpiry, PurDate, BillNo, Price, EmiNo, ReportingId, HodId, HODApprovalStatus, ITId, MaxLimitAmt, ReqAssestImgExtName, ReqAssestImgExt, ReqBillImgExtName, ReqBillImgExt, DealeName, DealerContNo, BatteryCom, BatteryModel, AnyOtherRemark, ApprovalStatus) values(".$_REQUEST['empid'].", ".$_REQUEST['AssetNId'].", '".$_REQUEST['ReqAmt']."', '".date("Y-m-d")."', 36, '".$ExpMDate."', '".$_REQUEST['ComName']."', '".$Sn."', '".$_REQUEST['ModelNo']."', '".$_REQUEST['ModelName']."', '".$_REQUEST['WarrantyNOY']."', '".date("Y-m-d",strtotime($_REQUEST['WarrantyExpiry']))."', '".date("Y-m-d",strtotime($_REQUEST['PurDate']))."', '".$_REQUEST['BillNo']."', '".$_REQUEST['Price']."', '".$_REQUEST['EmiNo']."', '".$resRep['RepEmployeeID']."', '".$resHEmail['EmployeeID']."', 2, '".$resItEmp['EmployeeID']."', '".$_REQUEST['MaxLimitAmt']."', '".$newfilenameAsset."', 'jpg', '".$newfilenameBill."', 'jpg', '".$_REQUEST['DealeName']."', '".$_REQUEST['DealerContNo']."', '".$_REQUEST['BatteryCom']."', '".$_REQUEST['BatteryModel']."', '".$_REQUEST['Remark']."', 1)"); }
   else{
       $sqlIns=mysqli_query($con,"insert into hrm_asset_employee_request(EmployeeID, AssetNId, ReqAmt, ReqDate, ReqAmtExpiryNOM, ReqAmtExpiryDate, ComName, Srn, ModelNo, ModelName, WarrantyNOY, WarrantyExpiry, PurDate, BillNo, Price, EmiNo, ReportingId, HodId, ITId, MaxLimitAmt, ReqAssestImgExtName, ReqAssestImgExt, ReqBillImgExtName, ReqBillImgExt, DealeName, DealerContNo, BatteryCom, BatteryModel, AnyOtherRemark, RCNo, RCNo_File, DLNo, DLNo_File, InsuNo, InsuNo_File, VehiNo, DLExpTo, ChasNo, EngNo, RegNo, RegDate,CreatedDate) values(".$_REQUEST['empid'].", ".$_REQUEST['AssetNId'].", '".$_REQUEST['ReqAmt']."', '".date("Y-m-d")."', 36, '".$ExpMDate."', '".$_REQUEST['ComName']."', '".$_REQUEST['Srn']."', '".$_REQUEST['ModelNo']."', '".$_REQUEST['ModelName']."', '".$_REQUEST['WarrantyNOY']."', '".date("Y-m-d",strtotime($_REQUEST['WarrantyExpiry']))."', '".date("Y-m-d",strtotime($_REQUEST['PurDate']))."', '".$_REQUEST['BillNo']."', '".$_REQUEST['Price']."', '".$_REQUEST['EmiNo']."', '".$resRep['RepEmployeeID']."', '".$resHEmail['EmployeeID']."', '".$resItEmp['EmployeeID']."', '".$_REQUEST['MaxLimitAmt']."', '".$newfilenameAsset."', 'jpg', '".$newfilenameBill."', 'jpg', '".$_REQUEST['DealeName']."', '".$_REQUEST['DealerContNo']."', '".$_REQUEST['BatteryCom']."', '".$_REQUEST['BatteryModel']."', '".$_REQUEST['Remark']."', '".$RCNo."', '".$RCImg_File."', '".$DLNo."', '".$DLImg_File."', '".$InsuNo."', '".$InsuImg_File."', '".$VehiNo."', '".date("Y-m-d",strtotime($DLExpTo))."', '".addslashes($ChasNo)."', '".addslashes($EngNo)."', '".addslashes($RegNo)."', '".$RegDate."','".date("Y-m-d")."')"); }
 }
  
  if($sqlIns)
  {   
      if($RR['EmailId_Vnr']!='')
      {
       //$email_to = $RR['EmailId_Vnr'];
       //$email_from='admin@vnrseeds.co.in';
       $email_subject = $EmpName." submitted asset request form";
       //$headers = "From: ".$email_from."\r\n"; 
       //$headers .= "MIME-Version: 1.0\r\n";
       //$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_message .="<html><head></head><body>";
	   $email_message .= "Dear <b>".$RepName."</b> <br><br>\n\n\n";
       $email_message .=$EmpName." has submitted asset request form, for details, kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br><br>\n\n";
	   $email_message .= "From <br><b>ADMIN ESS</b><br>";
       $email_message .="</body></html>";	      
	   //$ok = @mail($email_to, $email_subject, $email_message, $headers);
	   
	   $subject=$email_subject;
       $body=$email_message;
       $email_to=$RR['EmailId_Vnr'];
       require 'vendor/mail_admin.php';
	   
	  }	  
	  
  if($_REQUEST['AssetNId']!=11 OR $_REQUEST['AssetNId']!=12 OR $_REQUEST['AssetNId']!=18)
  {
     if($resHEmail['EmailId_Vnr']!='')
      {
      //$email_to22 = $resHEmail['EmailId_Vnr'];
      //$email_from22='admin@vnrseeds.co.in';
      $email_subject22 = $EmpName." submitted asset request form";
      //$headers22 = "From: ".$email_from22."\r\n"; 
      //$headers22 .= "MIME-Version: 1.0\r\n";
      //$headers22 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $email_message22 .="<html><head></head><body>";
	  $email_message22 .= "Dear <b>".$HodName."</b> <br><br>\n\n\n";
      $email_message22 .=$EmpName." has submitted asset request form, for your approval & details, kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br><br>\n\n";
	  $email_message22 .= "From <br><b>ADMIN ESS</b><br>";
      $email_message22 .="</body></html>";	      
	  //$ok2 = @mail($email_to22, $email_subject22, $email_message22, $headers22);
	  
	   $subject=$email_subject22;
       $body=$email_message22;
       $email_to=$resHEmail['EmailId_Vnr'];
       require 'vendor/mail_admin.php';
	  
	  }
  }	  
      if($resItEmp['EmailId_Vnr']!='')
      {
      //$email_to33 = $resItEmp['EmailId_Vnr'];
      //$email_from33='admin@vnrseeds.co.in';
      $email_subject33 = $EmpName." submitted asset request form";
      //$headers33 = "From: ".$email_from33."\r\n"; 
      //$headers33 .= "MIME-Version: 1.0\r\n";
      //$headers33 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $email_message33 .="<html><head></head><body>";
      $email_message33 .= "Dear <b>".$ITEmpName."</b> <br><br>\n\n\n";

if($_REQUEST['AssetNId']==11 OR $_REQUEST['AssetNId']==12 OR $_REQUEST['AssetNId']==18){ $email_message33 .=$EmpName." has submitted asset request form, for approval next level, kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br><br>\n\n"; }
else { $email_message33 .=$EmpName." has submitted asset request form, for details, kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br><br>\n\n"; }

      $email_message33 .= "From <br><b>ADMIN ESS</b><br>";
      $email_message33 .="</body></html>";	      
	  //$ok3 = @mail($email_to33, $email_subject33, $email_message33, $headers33);
	  
	   $subject=$email_subject33;
       $body=$email_message33;
       $email_to=$resItEmp['EmailId_Vnr'];
       require 'vendor/mail_admin.php';
	  
	  }
	  
      //$email_to44 = 'vspl.hr@vnrseeds.com';
      //$email_from44='admin@vnrseeds.co.in';
      $email_subject44 = $_REQUEST['Ename']." submitted asset request form";
      //$email_txt44 = $_REQUEST['Ename']." submitted asset request form"; 
      //$headers44 = "From: ".$email_from44."\r\n"; 
      //$headers44 .= "MIME-Version: 1.0\r\n";
      //$headers44 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $email_message44 .="<html><head></head><body>";
	  $email_message44 .= "Dear <b>Sir/Mam, </b> <br><br>\n\n\n";
      $email_message44 .=$_REQUEST['EName']." has submitted asset request form, for details, kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br><br>\n\n";
	  $email_message44 .= "From <br><b>ADMIN ESS</b><br>";
      $email_message44 .="</body></html>";	      
	  //$ok4 = @mail($email_to44, $email_subject44, $email_message44, $headers44);
	  
	   $subject=$email_subject44;
       $body=$email_message44;
       $email_to='vspl.hr@vnrseeds.com';
       require 'vendor/mail_admin.php';
      
      header("Content-type: application/json; charset=utf-8");
	  echo json_encode(array("Code" => "300", "msg" => "Your request has been submitted successfully") ); 
  }
//   else
//   {
//     header("Content-type: application/json; charset=utf-8");  
//     echo json_encode(array("Code" => "100", "msg" => "Error..") ); 
//   }

 
   
  
} //assest_req




//My Team Assest Reports
elseif($_REQUEST['value']=='Team_AssestReq' && $_REQUEST['empid']>0){ 
 $sql=mysqli_query($con,"select r.*,EmpCode,Fname,Sname,Lname,AssetName from hrm_asset_employee_request r inner join hrm_employee e on r.EmployeeID=e.EmployeeID inner join hrm_asset_name n on r.AssetNId=n.AssetNId where e.EmpStatus='A' AND (ReportingId=".$_REQUEST['empid']." OR HodId=".$_REQUEST['empid'].") AND r.Status!=0 order by r.ReqDate DESC");
 $num=mysqli_num_rows($sql); $Ass_ReqList = array();
 if($num>0)
 {
  while($res=mysqli_fetch_assoc($sql)){ $Ass_ReqList[]=$res; }
  echo json_encode(array("Code" => "300", "MyTeam_Assest_ReqList" => $Ass_ReqList) ); 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Data Not Found!") ); }  
}

//My Team Assest Approval List
elseif($_REQUEST['value']=='assest_approval_list' && $_REQUEST['empid']>0){     
 $sql=mysqli_query($con,"select r.AssetEmpReqId,r.EmployeeID,r.AssetNId,r.ReqAmt,r.ReqDate,r.ApprovalAmt,r.ReqAssestImgExtName,r.ReqAssestImgExt,r.ReqBillImgExtName,r.ReqBillImgExt,
r.HODApprovalStatus,r.FwdApprovalStatus,r.ITApprovalStatus,r.AccPayStatus,
e.EmpCode,e.Fname,e.Sname,e.Lname,n.AssetName,hq.HqName 
 from hrm_asset_employee_request r 
left join hrm_employee e on r.EmployeeID=e.EmployeeID 
left join hrm_employee_general g on e.EmployeeID=g.EmployeeID 
left join hrm_asset_name n on r.AssetNId=n.AssetNId left join hrm_headquater hq on g.HqId=hq.HqId 
where e.EmpStatus='A' AND (ReportingId='".$_REQUEST['empid']."' OR HodId='".$_REQUEST['empid']."') AND r.Status!=0 AND  r.HODApprovalStatus not in(2,3,4)
order by r.ReqDate DESC");
 
 $num=mysqli_num_rows($sql); $Ass_ReqList = array();
 if($num>0)
 {
  while($res=mysqli_fetch_assoc($sql)){ $Ass_ReqList[]=$res; }
  echo json_encode(array("Code" => "300", "Assest_approval_list" => $Ass_ReqList) ); 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Data Not Found!") ); }  
}




//Request Approval
elseif($_REQUEST['value']=='AssetReq_Approval' && $_REQUEST['AssetEmpReqId']>0 && $_REQUEST['ReqSts']>0 && $_REQUEST['ReqRmk']!='')
{ 
 $sqlUp=mysqli_query($con,"update hrm_asset_employee_request set HODApprovalStatus='".$_REQUEST['ReqSts']."', HODRemark='".$_REQUEST['ReqRmk']."', HODSubDate='".date("Y-m-d")."', ApprovalStatus=1 where AssetEmpReqId=".$_REQUEST['AssetEmpReqId']);
 if($sqlUp)
 {
  
  if($_REQUEST['ReqSts']==2 OR $_REQUEST['ReqSts']==3)
  {
   if($_REQUEST['ReqSts']==2){$EMsg='approved';}elseif($_REQUEST['ReqSts']==3){$EMsg='rejected';}
   $SqlEmp=mysqli_query($con,"select r.EmployeeID,Fname,Sname,Lname from hrm_asset_employee_request r inner join hrm_employee e on r.EmployeeID=e.EmployeeID where r.AssetEmpReqId=".$_REQUEST['AssetEmpReqId']); $ResEmp=mysqli_fetch_assoc($SqlEmp);
   $Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; 
   //$email_to = 'vspl.hr@vnrseeds.com';
   //$email_from='admin@vnrseeds.co.in';
   $email_subject = $Ename." asset request ".$EMsg." by HOD";
   //$email_txt = $Ename." asset request ".$EMsg." by HOD";
   //$headers = "From: ".$email_from."\r\n"; 
   //$semi_rand = md5(time()); 
   //$headers .= "MIME-Version: 1.0\r\n";
   //$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $email_message .="<html><head></head><body>";
   $email_message .=$Ename." asset request ".$EMsg." by HOD, kindly details log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br><br>\n\n";
   $email_message .= "From <br><b>ADMIN ESS</b><br>";
   $email_message .="</body></html>";	      
   //$ok = @mail($email_to, $email_subject, $email_message, $headers); 
   
   $subject=$email_subject;
   $body=$email_message;
   $email_to='vspl.hr@vnrseeds.com';
   require 'vendor/mail_admin.php';
   
   $sqlIT=mysqli_query($con,"select EmployeeID from hrm_asset_dept_access where DepartmentId=9"); 
   $resIT=mysqli_fetch_assoc($sqlIT);
   $sqlItEmp=mysqli_query($con,"select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr,RepEmployeeID from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where e.EmployeeID=".$resIT['EmployeeID']); $resItEmp=mysqli_fetch_assoc($sqlItEmp); if($resItEmp['DR']=='Y'){$MMIT='Dr.';} elseif($resItEmp['Gender']=='M'){$MMIT='Mr.';} elseif($resItEmp['Gender']=='F' AND $resItEmp['Married']=='Y'){$MMIT='Mrs.';} elseif($resItEmp['Gender']=='F' AND $resItEmp['Married']=='N'){$MMIT='Miss.';} $ITEmpName=$MMIT.' '.$resItEmp['Fname'].' '.$resItEmp['Sname'].' '.$resItEmp['Lname'];
   
	 if($resItEmp['EmailId_Vnr']!='')
	 {
	  //$email_to22 = $resItEmp['EmailId_Vnr'];
      //$email_from22='admin@vnrseeds.co.in';
      $email_subject22 = $Ename." asset request ".$EMsg." by HOD";
     // $email_txt22 = $Ename." asset request ".$EMsg." by HOD"; 
      //$headers22 = "From: ".$email_from22."\r\n"; 
      //$semi_rand22 = md5(time()); 
      //$headers22 .= "MIME-Version: 1.0\r\n";
      //$headers22 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $email_message22 .="<html><head></head><body>";
	  $email_message22 .= "Dear <b>".$ITEmpName."</b> <br><br>\n\n\n";
      $email_message22 .=$Ename." asset request ".$EMsg." by HOD, kindly details & your approval next level, log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br><br>\n\n";
	  $email_message22 .= "From <br><b>ADMIN ESS</b><br>";
      $email_message22 .="</body></html>";	      
	  //$ok2 = @mail($email_to22, $email_subject22, $email_message22, $headers22);
	  
	  $subject=$email_subject22;
      $body=$email_message22;
      $email_to=$resItEmp['EmailId_Vnr'];
      require 'vendor/mail_admin.php';
	  
	 } 
   
  
  } //if($_REQUEST['ReqSts']==2 OR $_REQUEST['ReqSts']==3)
  
  echo json_encode(array("Code" => "300", "Msg" => "Successfully request updated") ); 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Error!") ); }  
}



//Assest Request
elseif($_REQUEST['value'] == 'assest_req_exmple' && $_REQUEST['empid']>0 && $_REQUEST['AssetNId']>0)
{
  //$image = $_REQUEST['image'];
  //$decodedImage = base64_decode("$image");
  //$return = file_put_contents("upload/A_aa.jpg", $decodedImage);
  
  //$name = $_REQUEST['name'];
  //$png = base64_to_jpeg($image,$name);
  //$target = 'upload/'.$name;
  //$result = move_uploaded_file( $_FILES['$png']['tmp_name'], $target);
  
  if($return)
  {
  echo json_encode(array("Code" => "300", "image"=> $_REQUEST['image'], "msg" => "successfully uploaded") ); 
  }
  else
  {
    echo json_encode(array("Code" => "100", "image"=> $_REQUEST['image'], "msg" => "Error..") ); 
  }
}   

// else 
// {
//     echo json_encode(array("Code" => "100", "msg"=> "Error..") );
// }

  
?>