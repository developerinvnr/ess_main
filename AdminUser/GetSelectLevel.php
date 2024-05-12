<?php
require_once('config/config.php');
if(isset($_POST['One']) && $_POST['One']!=""){ $id=$_POST['id']; $dept=$_POST['dept']; $YId=$_POST['YId']; $UId=$_POST['UId']; $CId=$_POST['CId'];
$sql_L1=mysql_query("select * from hrm_querylevel_employee where DepartmentId=".$dept." AND EmployeeID=".$id." AND Level=1", $con);  $rowL1=mysql_num_rows($sql_L1);
if($rowL1==0){ $sql_L11=mysql_query("insert into hrm_querylevel_employee(DepartmentId,EmployeeID,Level,CreatedBy,CreatedDate,YearId) values(".$dept.",".$id.",1,".$UId.",'".date("Y-m-d")."',".$YId.")", $con); } ?>
<table id="TableL1" border="1">
 <tr bgcolor="#7a6189">
    <td class="font" style="width:50px;" align="center"><b>EC</b></td>
	<td class="font" style="width:270px;" align="center"><b>Name</b></td>
	<td class="font" style="width:40px;" align="center"><b>Order</b></td>
	<td class="font" style="width:40px;" align="center"><b>Del</b></td> 
 </tr>
<?php $sqlL1=mysql_query("select hrm_querylevel_employee.*,EmpCode,Fname,Sname,Lname from hrm_querylevel_employee INNER JOIN hrm_employee ON hrm_querylevel_employee.EmployeeID=hrm_employee.EmployeeID where hrm_querylevel_employee.DepartmentId=".$dept." AND hrm_querylevel_employee.Level=1 Order By LevelNo ASC", $con); 
while($resL1=mysql_fetch_array($sqlL1)) { ?>
  <tr bgcolor="#FFFFFF">
   <td class="font1" style="width:50px;" align="center"><?php echo $resL1['EmpCode']; ?></td>
   <td class="font1" style="width:270px;" align=""><?php echo $resL1['Fname'].' '.$resL1['Sname'].' '.$resL1['Lname']; ?></td>  
   <td class="font1" style="width:40px;" align=""><select style="width:40px; height:18px;" onChange="OrderC(this.value,<?php echo $resL1['QLevelId']; ?>)">
   <option value="<?php echo $resL1['LevelNo']; ?>">&nbsp;<?php echo $resL1['LevelNo']; ?></option><option value="1">&nbsp;1</option><option value="2">&nbsp;2</option>
   <option value="3">&nbsp;3</option></select></td>
   <td class="font1" style="width:40px;" align="center">
   <a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="DelLevel('L1',<?php echo $resL1['QLevelId'].', '.$dept; ?>)"></a></td>  
  </tr>
<?php } ?></table><?php } ?>

<?php if(isset($_POST['Two']) && $_POST['Two']!=""){ $id=$_POST['id']; $dept=$_POST['dept']; $YId=$_POST['YId']; $UId=$_POST['UId']; $CId=$_POST['CId'];
$sql_L2=mysql_query("select * from hrm_querylevel_employee where DepartmentId=".$dept." AND EmployeeID=".$id." AND Level=2", $con);  $rowL2=mysql_num_rows($sql_L2);
if($rowL2==0){ $sql_L22=mysql_query("insert into hrm_querylevel_employee(DepartmentId,EmployeeID,Level,CreatedBy,CreatedDate,YearId) values(".$dept.",".$id.",2,".$UId.",'".date("Y-m-d")."',".$YId.")", $con); } ?>
<table id="TableL2" border="1">
 <tr bgcolor="#7a6189">
    <td class="font" style="width:50px;" align="center"><b>EC</b></td>
	<td class="font" style="width:270px;" align="center"><b>Name</b></td>
	<td class="font" style="width:40px;" align="center"><b>Order</b></td>
	<td class="font" style="width:40px;" align="center"><b>Del</b></td> 
 </tr>
<?php $sqlL2=mysql_query("select hrm_querylevel_employee.*,EmpCode,Fname,Sname,Lname from hrm_querylevel_employee INNER JOIN hrm_employee ON hrm_querylevel_employee.EmployeeID=hrm_employee.EmployeeID where hrm_querylevel_employee.DepartmentId=".$dept." AND hrm_querylevel_employee.Level=2 Order By LevelNo ASC", $con); 
while($resL2=mysql_fetch_array($sqlL2)) { ?>
  <tr bgcolor="#FFFFFF">
   <td class="font1" style="width:50px;" align="center"><?php echo $resL2['EmpCode']; ?></td>
   <td class="font1" style="width:270px;" align=""><?php echo $resL2['Fname'].' '.$resL2['Sname'].' '.$resL2['Lname']; ?></td>  
   <td class="font1" style="width:40px;" align=""><select style="width:40px; height:18px;" onChange="OrderC(this.value,<?php echo $resL2['QLevelId']; ?>)">
   <option value="<?php echo $resL2['LevelNo']; ?>">&nbsp;<?php echo $resL2['LevelNo']; ?></option><option value="1">&nbsp;1</option><option value="2">&nbsp;2</option>
   <option value="3">&nbsp;3</option></select></td>
   <td class="font1" style="width:40px;" align="center">
   <a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="DelLevel('L2',<?php echo $resL2['QLevelId'].', '.$dept; ?>)"></a></td>  
  </tr>
<?php } ?></table><?php } ?>

<?php if(isset($_POST['Three']) && $_POST['Three']!=""){ $id=$_POST['id']; $dept=$_POST['dept']; $YId=$_POST['YId']; $UId=$_POST['UId']; $CId=$_POST['CId'];
$sql_L3=mysql_query("select * from hrm_querylevel_employee where DepartmentId=".$dept." AND EmployeeID=".$id." AND Level=3", $con);  $rowL3=mysql_num_rows($sql_L3);
if($rowL3==0){ $sql_L33=mysql_query("insert into hrm_querylevel_employee(DepartmentId,EmployeeID,Level,CreatedBy,CreatedDate,YearId) values(".$dept.",".$id.",3,".$UId.",'".date("Y-m-d")."',".$YId.")", $con); } ?>
<table id="TableL3" border="1">
 <tr bgcolor="#7a6189">
    <td class="font" style="width:50px;" align="center"><b>EC</b></td>
	<td class="font" style="width:270px;" align="center"><b>Name</b></td>
	<td class="font" style="width:40px;" align="center"><b>Order</b></td>
	<td class="font" style="width:40px;" align="center"><b>Del</b></td> 
 </tr>
<?php $sqlL3=mysql_query("select hrm_querylevel_employee.*,EmpCode,Fname,Sname,Lname from hrm_querylevel_employee INNER JOIN hrm_employee ON hrm_querylevel_employee.EmployeeID=hrm_employee.EmployeeID where hrm_querylevel_employee.DepartmentId=".$dept." AND hrm_querylevel_employee.Level=3 Order By LevelNo ASC", $con); 
while($resL3=mysql_fetch_array($sqlL3)) { ?>
  <tr bgcolor="#FFFFFF">
   <td class="font1" style="width:50px;" align="center"><?php echo $resL3['EmpCode']; ?></td>
   <td class="font1" style="width:270px;" align=""><?php echo $resL3['Fname'].' '.$resL3['Sname'].' '.$resL3['Lname']; ?></td>  
   <td class="font1" style="width:40px;" align=""><select style="width:40px; height:18px;" onChange="OrderC(this.value,<?php echo $resL3['QLevelId']; ?>)">
   <option value="<?php echo $resL3['LevelNo']; ?>">&nbsp;<?php echo $resL3['LevelNo']; ?></option><option value="1">&nbsp;1</option><option value="2">&nbsp;2</option>
   <option value="3">&nbsp;3</option></select></td>
   <td class="font1" style="width:40px;" align="center">
   <a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="DelLevel('L3',<?php echo $resL3['QLevelId'].', '.$dept; ?>)"></a></td>  
  </tr>
<?php } ?></table><?php } ?>

