<?php
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');


if($_REQUEST['action']=='ExpQ')
{ 
 
$xls_filename = 'Query_List_'.date("d-My").'.xls';
 
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEmpCode\tName\tDepartment\tQueryDate\tSubject\tQueryDetails\tReplyDetails\tQurtyTo\tHideName\tStatus\tLevel-1\tLevel-2\tLevel-3\tLevel-4";
print("\n");


 $sql=mysql_query("select * from hrm_employee_queryemp qe INNER JOIN hrm_employee e ON e.EmployeeID=qe.EmployeeID where e.CompanyId=".$_REQUEST['ci']." order by QueryDT DESC", $con); 

 $no=1;
 while($resQ=mysql_fetch_array($sql))
 {
  $sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmployeeID=".$resQ['EmployeeID'], $con); 
  $resE=mysql_fetch_assoc($sqlE); 
  $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); 
  $resD=mysql_fetch_assoc($sqlD);
 
  $schema_insert = "";
  $schema_insert .= $no.$sep;
  $schema_insert .= $resE['EmpCode'].$sep;
  $schema_insert .= $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'].$sep;
  $schema_insert .= $resD['DepartmentCode'].$sep;	
  
  $schema_insert .= date("d-M-y", strtotime($resQ['QueryDT'])).$sep;
  $schema_insert .= $resQ['OtherSubject'].$sep;
  
  $QDetails=' '; $ReplyDetails=' '; $Level_1=0; $Level_2=0; $Level_3=0; $Mngmt=0; 
  
  if($resQ['Query5Value']!=''){ $QDetails='(1)'.$resQ['QueryDT'].'-'.$resQ['QueryValue'].' (2)'.$resQ['Query2DT'].'-'.$resQ['Query2Value'].' (3)'.$resQ['Query3DT'].'-'.$resQ['Query3Value'].' (4)'.$resQ['Query4DT'].'-'.$resQ['Query4Value'].' (5)'.$resQ['Query5DT'].'-'.$resQ['Query5Value']; }
  else if($resQ['Query4Value']!=''){ $QDetails='(1)'.$resQ['QueryDT'].'-'.$resQ['QueryValue'].' (2)'.$resQ['Query2DT'].'-'.$resQ['Query2Value'].' (3)'.$resQ['Query3DT'].'-'.$resQ['Query3Value'].' (4)'.$resQ['Query4DT'].'-'.$resQ['Query4Value']; }
  else if($resQ['Query3Value']!=''){ $QDetails='(1)'.$resQ['QueryDT'].'-'.$resQ['QueryValue'].' (2)'.$resQ['Query2DT'].'-'.$resQ['Query2Value'].' (3)'.$resQ['Query3DT'].'-'.$resQ['Query3Value']; }
  else if($resQ['Query2Value']!=''){ $QDetails='(1)'.$resQ['QueryDT'].'-'.$resQ['QueryValue'].' (2)'.$resQ['Query2DT'].'-'.$resQ['Query2Value']; }
  else if($resQ['QueryValue']!=''){ $QDetails='(1)'.$resQ['QueryDT'].'-'.$resQ['QueryValue']; }
  $schema_insert .= $QDetails.$sep;
  
  if($resQ['Query5Reply']!=''){ $ReplyDetails='(1)'.$resQ['QReplyDT'].'-'.$resQ['QueryReply'].' (2)'.$resQ['QReply2DT'].'-'.$resQ['Query2Reply'].' (3)'.$resQ['QReply3DT'].'-'.$resQ['Query3Reply'].' (4)'.$resQ['QReply4DT'].'-'.$resQ['Query4Reply'].' (5)'.$resQ['QReply5DT'].'-'.$resQ['Query5Reply']; }
  else if($resQ['Query4Reply']!=''){ $ReplyDetails='(1)'.$resQ['QReplyDT'].'-'.$resQ['QueryReply'].' (2)'.$resQ['QReply2DT'].'-'.$resQ['Query2Reply'].' (3)'.$resQ['QReply3DT'].'-'.$resQ['Query3Reply'].' (4)'.$resQ['QReply4DT'].'-'.$resQ['Query4Reply']; }
  else if($resQ['Query3Reply']!=''){ $ReplyDetails='(1)'.$resQ['QReplyDT'].'-'.$resQ['QueryReply'].' (2)'.$resQ['QReply2DT'].'-'.$resQ['Query2Reply'].' (3)'.$resQ['QReply3DT'].'-'.$resQ['Query3Reply']; }
  else if($resQ['Query2Reply']!=''){ $ReplyDetails='(1)'.$resQ['QReplyDT'].'-'.$resQ['QueryReply'].' (2)'.$resQ['QReply2DT'].'-'.$resQ['Query2Reply']; }
  else if($resQ['QueryReply']!=''){ $ReplyDetails='(1)'.$resQ['QReplyDT'].'-'.$resQ['QueryReply']; }
  $schema_insert .= $ReplyDetails.$sep;
  
  $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resQ['QToDepartmentId'], $con); 
  $resD=mysql_fetch_assoc($sqlD);
  $schema_insert .= $resD['DepartmentCode'].$sep;
  
  if($resQ['HideYesNo']=='N'){ $Hide='No'; }else{ $Hide='Yes'; }	
  $schema_insert .= $Hide.$sep;
  
  if($resQ['QStatus']==0){ $Status='Open'; }elseif($resQ['QStatus']==1){ $Status='InProcess'; }elseif($resQ['QStatus']==2){ $Status='Answer'; }elseif($resQ['QStatus']==3){ $Status='Close'; } elseif($resQ['QStatus']==4){ $Status='Esclated';}
  $schema_insert .= $Status.$sep;
  
  if($resQ['Level_1QStatus']==0){ $Level_1='Open'; }elseif($resQ['Level_1QStatus']==1){ $Level_1='Pending'; }elseif($resQ['Level_1QStatus']==2){ $Level_1='Reply'; }elseif($resQ['Level_1QStatus']==3){ $Level_1='Close'; } elseif($resQ['Level_1QStatus']==4){ $Level_1='Esclated';}
  $schema_insert .= $Level_1.$sep;
  
  if($resQ['Level_2QStatus']==0){ $Level_2='Open'; }elseif($resQ['Level_2QStatus']==1){ $Level_2='Pending'; }elseif($resQ['Level_2QStatus']==2){ $Level_2='Reply'; }elseif($resQ['Level_2QStatus']==3){ $Level_2='Close'; } elseif($resQ['Level_2QStatus']==4){ $Level_2='Esclated';}
  $schema_insert .= $Level_2.$sep;
  
  if($resQ['Level_3QStatus']==0){ $Level_3='Open'; }elseif($resQ['Level_3QStatus']==1){ $Level_3='Pending'; }elseif($resQ['Level_3QStatus']==2){ $Level_3='Reply'; }elseif($resQ['Level_3QStatus']==3){ $Level_3='Close'; } elseif($resQ['Level_3QStatus']==4){ $Level_3='Esclated';}
  $schema_insert .= $Level_3.$sep;
  
  if($resQ['Mngmt_QStatus']==0){ $Mngmt='Open'; }elseif($resQ['Mngmt_QStatus']==1){ $Mngmt='Pending'; }elseif($resQ['Mngmt_QStatus']==2){ $Mngmt='Reply'; }elseif($resQ['Mngmt_QStatus']==3){ $Mngmt='Close'; } elseif($resQ['Mngmt_QStatus']==4){ $Mngmt='Esclated';}
  $schema_insert .= $Mngmt.$sep;
  
				  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $no++;
 }

}

?>

