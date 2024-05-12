<?php 
require_once('../../AdminUser/config/config.php');



if($_REQUEST['value'] == ''){ echo json_encode(array("msg" => "Parameter Missing!") ); }
 
//Dealer
elseif($_REQUEST['value'] == 'dealerlist_r')
{
 $run_qry=mysql_query("select DealerId, DealerName, DealerCity, DealerAdd, DealerPerson, DealerCont, DealerEmail, HqId, Hq_vc, Hq_fc, Terr_vc, Terr_fc from hrm_sales_dealer where DealerSts='A' order by DealerName asc");
 $num=mysql_num_rows($run_qry); $dealer_array=array();
 if($num>0)
 {
  while($res=mysql_fetch_assoc($run_qry)){ $dealer_array[]=$res; }
  echo json_encode(array("Code" => "300", "Dealer_list" => $dealer_array) ); 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Error!") ); }  
}


//Sales Team
elseif($_REQUEST['value'] == 'salexelist_r')
{
    
 $run_qry=mysql_query("select e.EmployeeID as EmpId,Fname,Sname,Lname from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_sales_dealer d on (e.EmployeeID=d.Terr_vc OR e.EmployeeID=d.Terr_fc) where e.EmpStatus='A' AND d.DealerSts='A' AND g.DepartmentId=6 group by e.EmployeeID order by e.Fname asc");
 $num=mysql_num_rows($run_qry); $exe_array=array();
 if($num>0)
 {
  while($res=mysql_fetch_assoc($run_qry)){ $exe_array[]=$res; }
  echo json_encode(array("Code" => "300", "SalExecutive_list" => $exe_array) ); 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Error!") ); }  
}


//Crop
elseif($_REQUEST['value'] == 'crop_r')
{
 $run_qry=mysql_query("select ItemId as CropId, ItemName as CropName, ItemCode as CropCode, GroupId from hrm_sales_seedsitem order by ItemName asc");
 $num=mysql_num_rows($run_qry); $crop_array=array();
 if($num>0)
 {
  while($res=mysql_fetch_assoc($run_qry)){ $crop_array[]=$res; }
  echo json_encode(array("Code" => "300", "Crop_list" => $crop_array) ); 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Error!") ); }  
}

//Product
elseif($_REQUEST['value'] == 'product_r')
{
 $run_qry=mysql_query("select ProductId, ProductName, ItemId as CropId, TypeId from hrm_sales_seedsproduct where ProductSts='A' order by ProductName asc");
 $num=mysql_num_rows($run_qry); $prd_array=array();
 if($num>0)
 {
  while($res=mysql_fetch_assoc($run_qry)){ $prd_array[]=$res; }
  echo json_encode(array("Code" => "300", "Product_list" => $prd_array) ); 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Error!") ); }  
}


//Last
else
{
 echo json_encode(array("Code" => "100", "msg" => "Invalid value!") );
}

 
