<?php require_once('../user/config/config.php'); 
 
if($_POST['action']=='setRcpv') 
{ 
 $sql=mysql_query("select * from erp_rcp where DealerId=".$_POST['di']." AND RcpMonth=".$_POST['m']." AND RcpYear=".$_POST['yy'],$con2); $row=mysql_num_rows($sql);
 if($row>0)
 {
 
  if($_POST['crop']==1)
  {   
   $su=mysql_query("update erp_rcp set SalPTgt_Val=".$_POST['TotSpV'].", Tot_CollVal=".$_POST['tot'].", SalPTgt_CollVal=".$_POST['sp'].", Oust_CollVal=".$_POST['oust'].", Abs_CollVal=".$_POST['absv'].", AbsName='".$_POST['absn']."', FilledBy=".$_POST['ei'].", CrBy=".$_POST['ei'].", CrDate='".date("Y-m-d")."', YId=".$_POST['y']." where DealerId=".$_POST['di']." AND RcpMonth=".$_POST['m']." AND RcpYear=".$_POST['yy'],$con2);
  }
  elseif($_POST['crop']==2)
  {   
   $su=mysql_query("update erp_rcp set SalPTgt_Valfc=".$_POST['TotSpV'].", Tot_CollValfc=".$_POST['tot'].", SalPTgt_CollValfc=".$_POST['sp'].", Oust_CollValfc=".$_POST['oust'].", Abs_CollValfc=".$_POST['absv'].", AbsNamefc='".$_POST['absn']."', FilledBy=".$_POST['ei'].", CrBy=".$_POST['ei'].", CrDate='".date("Y-m-d")."', YId=".$_POST['y']." where DealerId=".$_POST['di']." AND RcpMonth=".$_POST['m']." AND RcpYear=".$_POST['yy'],$con2);
  }
   if($su){echo '<input type="hidden" id="vsts" value="1" />';}
   else{echo '<input type="hidden" id="vsts" value="0" />';}
  
 }
 if($row==0)
 {
 
  if($_POST['crop']==1)
  {
   $si=mysql_query("insert into erp_rcp(DealerId, RcpMonth, RcpYear, SalPTgt_Val, Tot_CollVal, SalPTgt_CollVal, Oust_CollVal, Abs_CollVal, AbsName, FilledBy, CrBy, CrDate, YId) values(".$_POST['di'].", ".$_POST['m'].", ".$_POST['yy'].", ".$_POST['TotSpV'].", ".$_POST['tot'].", ".$_POST['sp'].", ".$_POST['oust'].", ".$_POST['absv'].", '".$_POST['absn']."', ".$_POST['ei'].", ".$_POST['ei'].", '".date("Y-m-d")."', ".$_POST['y'].")",$con2);
  }
  elseif($_POST['crop']==2)
  {
   $si=mysql_query("insert into erp_rcp(DealerId, RcpMonth, RcpYear, SalPTgt_Valfc, Tot_CollValfc, SalPTgt_CollValfc, Oust_CollValfc, Abs_CollValfc, AbsNamefc, FilledBy, CrBy, CrDate, YId) values(".$_POST['di'].", ".$_POST['m'].", ".$_POST['yy'].", ".$_POST['TotSpV'].", ".$_POST['tot'].", ".$_POST['sp'].", ".$_POST['oust'].", ".$_POST['absv'].", '".$_POST['absn']."', ".$_POST['ei'].", ".$_POST['ei'].", '".date("Y-m-d")."', ".$_POST['y'].")",$con2);
  }
   if($si){echo '<input type="hidden" id="vsts" value="1" />';}
   else{echo '<input type="hidden" id="vsts" value="0" />';}
  
 }
 
}
	

///MRp Mrp MRp Mrp MRp Mrp MRp Mrp MRp Mrp Open Open Open Open Open Open Open
///MRp Mrp MRp Mrp MRp Mrp MRp Mrp MRp Mrp Open Open Open Open Open Open Open

elseif($_POST['action']=='setMrpv') 
{ 
  for($i=1; $i<=$_POST['sn']; $i++)
  {  
    $sql=mysql_query("select * from erp_mrp_require where ReqMrpMonth=".$_POST['m']." AND ReqMrpYear=".$_POST['yy']." AND StateId=".$_POST['s'.$i]." AND ProductId=".$_POST['pi']." AND TypeId=".$_POST['ti']." AND SizeId=".$_POST['szi'],$con2); $row=mysql_fetch_assoc($sql);
	if($row>0)
	{
	 $su=mysql_query("update erp_mrp_require set BranchId=".$_POST['bi'].", RequireQty=".$_POST['r'.$i].", FilledBy_RequireQty=".$_POST['ei'].", Crd='".date("Y-m-d")."', YId=".$_POST['y']." where ReqMrpMonth=".$_POST['m']." AND ReqMrpYear=".$_POST['yy']." AND StateId=".$_POST['s'.$i]." AND ProductId=".$_POST['pi']." AND TypeId=".$_POST['ti']." AND SizeId=".$_POST['szi'],$con2);
	} 
	elseif($row==0)
	{
	 $su=mysql_query("insert into erp_mrp_require(ReqMrpMonth, ReqMrpYear, BranchId, StateId, ProductId, TypeId, SizeId, RequireQty, FilledBy_RequireQty, Crd, YId) values(".$_POST['m'].", ".$_POST['yy'].", ".$_POST['bi'].", ".$_POST['s'.$i].", ".$_POST['pi'].", ".$_POST['ti'].", ".$_POST['szi'].", ".$_POST['r'.$i].", ".$_POST['ei'].", '".date("Y-m-d")."', ".$_POST['y'].")",$con2);
	}
  }
  if($su){echo '<input type="hidden" id="vsts" value="1" />';}
  else{echo '<input type="hidden" id="vsts" value="0" />';}
}



// Product-Size, Product-Size, Product-Size, Product-Size //
// Product-Size, Product-Size, Product-Size, Product-Size //

elseif($_POST['action']=='setProduct'){ 
 echo '<select class="itd3" id="Product" onChange="PFun(this.value,'.$_POST['m'].','.$_POST['yy'].','.$_POST['bi'].')"><option value="0" selected>select</option>'; $sp=mysql_query("select ProductId,ProductName,TypeName from hrm_sales_seedsproduct sp inner join hrm_sales_seedtype st on sp.TypeId=st.TypeId where sp.ItemId=".$_POST['v']." order by ProductName ASC",$con); while($rp=mysql_fetch_assoc($sp)){ echo '<option value="'.$rp['ProductId'].'">'.$rp['ProductName'].' - '.$rp['TypeName'].'</option>'; } echo '</select>'; 
}

elseif($_POST['action']=='setSize'){ 

 echo '<select class="itd3" id="Size"><option value="0" selected>select</option>';
 $sz=mysql_query("select SizeId,SizeName from hrm_sales_itemsize order by SizeId ASC",$con); while($rz=mysql_fetch_assoc($sz)){ $srz=mysql_query("select * from erp_mrp where MrpMonth=".$_POST['m']." AND MrpYear=".$_POST['yy']." AND BranchId=".$_POST['bi']." AND ProductId=".$_POST['v']." AND SizeId=".$rz['SizeId'],$con2);$rowrz=mysql_num_rows($srz); if($rowrz==0){ echo '<option value="'.$rz['SizeId'].'">'.$rz['SizeName'].'</option>'; } } echo '</select>'; 
}
