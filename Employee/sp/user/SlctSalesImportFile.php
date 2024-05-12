<?php require_once('config/config.php'); ?>

<?php if(isset($_POST['CouId']) && $_POST['CouId']!=""){ ?>
<select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value)">
<option value="" selected>SELECT STATE</option>	
<?php $sql = mysql_query("SELECT * FROM hrm_state where CountryId=".$_POST['CouId']." order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
<option value="<?php echo $res['StateId']; ?>"><?php echo strtoupper($res['StateName']); ?></option><?php } ?></select>
<?php } ?>

<?php if(isset($_POST['StaId']) && $_POST['StaId']!=""){ ?>
<select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="Hq" id="Hq" onChange="ClickHq(this.value)">
<option value="" selected>SELECT HEAD QUARTER</option>
<?php $sql = mysql_query("SELECT DISTINCT HqId FROM hrm_headquater where StateId=".$_POST['StaId']." AND HQStatus='A' order by HqName ASC", $con); 
while($res = mysql_fetch_array($sql)){ $sql2 = mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$res['HqId'], $con); $res2 = mysql_fetch_assoc($sql2); ?>
<option value="<?php echo $res['HqId']; ?>"><?php echo strtoupper($res2['HqName']); ?></option><?php } ?></select>
<?php } ?>

<?php if(isset($_POST['HqId']) && $_POST['HqId']!=""){ ?>
<select style="font-size:12px;width:300px;height:20px;background-color:#DDFFBB;" name="Dealer" id="Dealer" onChange="ClickDealer(this.value)">
<option value="" selected>SELECT DEALER NAME</option>
<?php $sql = mysql_query("SELECT * FROM hrm_sales_dealer where HqId=".$_POST['HqId']." order by DealerName ASC", $con); while($res = mysql_fetch_array($sql)){ ?> 
<option value="<?php echo $res['DealerId']; ?>"><?php echo strtoupper($res['DealerName'].'-'.$res['DealerCity']); ?></option><?php } ?></select>
<?php } ?>

<?php if(isset($_POST['DealerId']) && $_POST['DealerId']!=""){ ?>
<?php 
$sql_hs = mysql_query("SELECT hrm_sales_dealer.HqId,StateId FROM hrm_sales_dealer INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId where hrm_sales_dealer.DealerId=".$_POST['DealerId'], $con); $reshs = mysql_fetch_array($sql_hs); 

$sql1 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=61", $con); 
$res1=mysql_num_rows($sql1); if($res1>0){ $res1 = mysql_fetch_assoc($sql1); $EmpID=$res1['EmployeeID']; }
elseif($res1==0)
{ $sql2 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=62", $con); 
  $res2=mysql_num_rows($sql2); if($res2>0){ $res2 = mysql_fetch_assoc($sql2); $EmpID=$res2['EmployeeID']; }
  elseif($res2==0)
  { $sql3 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=63", $con); 
    $res3=mysql_num_rows($sql3); if($res3>0){ $res3 = mysql_fetch_assoc($sql3); $EmpID=$res3['EmployeeID']; }
	elseif($res3==0)
    { $sql4 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=64", $con); 
      $res4=mysql_num_rows($sql4); if($res4>0){ $res4 = mysql_fetch_assoc($sql4); $EmpID=$res4['EmployeeID']; }
	  elseif($res4==0)
      { $sql5 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=65", $con); 
        $res5=mysql_num_rows($sql5); if($res5>0){ $res5 = mysql_fetch_assoc($sql5); $EmpID=$res5['EmployeeID']; }
		elseif($res5==0)
        { $sql6 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=66", $con); 
          $res6=mysql_num_rows($sql6); if($res6>0){ $res6 = mysql_fetch_assoc($sql6); $EmpID=$res6['EmployeeID']; }
		  elseif($res6==0)
          { $sql7 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=67", $con); 
            $res7=mysql_num_rows($sql7); if($res7>0){ $res7 = mysql_fetch_assoc($sql7); $EmpID=$res7['EmployeeID']; }
			elseif($res7==0)
            { $sql8 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=68", $con); 
              $res8=mysql_num_rows($sql8); if($res8>0){ $res8 = mysql_fetch_assoc($sql8); $EmpID=$res8['EmployeeID']; }
			  elseif($res8==0)
              { $sql9 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=69", $con); 
                $res9=mysql_num_rows($sql9); if($res9>0){ $res9 = mysql_fetch_assoc($sql9); $EmpID=$res9['EmployeeID']; }
				elseif($res9==0)
                { $sql10 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=70", $con); 
                  $res10=mysql_num_rows($sql10); if($res10>0){ $res10 = mysql_fetch_assoc($sql10); $EmpID=$res10['EmployeeID']; }
				  elseif($res10==0)
                  { $sql11 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=71", $con); 
                    $res11=mysql_num_rows($sql11); if($res11>0){ $res11 = mysql_fetch_assoc($sql11); $EmpID=$res11['EmployeeID']; }
					else{ $EmpID=0; }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
} echo "SELECT R1,R2,R3,R4,R5 FROM hrm_sales_reporting_level where EmployeeID=".$EmpID;
$sqlL = mysql_query("SELECT R1,R2,R3,R4,R5 FROM hrm_sales_reporting_level where EmployeeID=".$EmpID, $con); $rowL = mysql_num_rows($sqlL);
//echo '(1)'.$reshs['HqId'].'--(2)'.$reshs['StateId'].'--(3)'.$EmpID.'--(4)'.$resL['R1'].'--(5)'.$resL['R2'].'--(6)'.$resL['R3'].'--(7)'.$resL['R4'].'--(8)'.$resL['R5'];
if($rowL>0){  $resL = mysql_fetch_assoc($sqlL); $V=1;}else{$V=0;}
?> 
<input type="hidden" name="EId" id="EId" value="<?php echo $EmpID; ?>"><input type="hidden" name="TId" id="TId" value="<?php echo $EmpID; ?>">
<input type="hidden" name="SId" id="SId" value="<?php echo $reshs['StateId']; ?>"><input type="hidden" name="HqId" id="HqId" value="<?php echo $reshs['HqId']; ?>">
<input type="hidden" name="L1" id="L1" value="<?php echo $resL['R1']; ?>"><input type="hidden" name="L2" id="L2" value="<?php echo $resL['R2']; ?>">
<input type="hidden" name="L3" id="L3" value="<?php echo $resL['R3']; ?>"><input type="hidden" name="L4" id="L4" value="<?php echo $resL['R4']; ?>">
<input type="hidden" name="L5" id="L5" value="<?php echo $resL['R5']; ?>"><input type="" name="CheckV" id="CheckV" value="<?php echo $V; ?>">
<?php } ?>


<?php /********************************** 222222222222 *****************************************/ ?>


<?php if(isset($_POST['CouId2']) && $_POST['CouId2']!=""){ ?>
<select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State2" id="State2" onChange="ClickState2(this.value)">
<option value="" selected>SELECT STATE</option>	
<?php $sql = mysql_query("SELECT * FROM hrm_state where CountryId=".$_POST['CouId2']." order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
<option value="<?php echo $res['StateId']; ?>"><?php echo strtoupper($res['StateName']); ?></option><?php } ?></select>
<?php } ?>

<?php if(isset($_POST['StaId2']) && $_POST['StaId2']!=""){ ?>
<select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="Hq2" id="Hq2" onChange="ClickHq2(this.value)">
<option value="" selected>SELECT HEAD QUARTER</option>
<?php $sql = mysql_query("SELECT DISTINCT HqId FROM hrm_headquater where StateId=".$_POST['StaId2']." AND HQStatus='A' order by HqName ASC", $con); 
while($res = mysql_fetch_array($sql)){ $sql2 = mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$res['HqId'], $con); $res2 = mysql_fetch_assoc($sql2); ?>
<option value="<?php echo $res['HqId']; ?>"><?php echo strtoupper($res2['HqName']); ?></option><?php } ?></select>
<?php } ?>

<?php if(isset($_POST['HqId2']) && $_POST['HqId2']!=""){ ?>
<select style="font-size:12px;width:300px;height:20px;background-color:#DDFFBB;" name="Dealer2" id="Dealer2" onChange="ClickDealer2(this.value)">
<option value="" selected>SELECT DEALER NAME</option>
<?php $sql = mysql_query("SELECT * FROM hrm_sales_dealer where HqId=".$_POST['HqId2']." order by DealerName ASC", $con); while($res = mysql_fetch_array($sql)){ ?> 
<option value="<?php echo $res['DealerId']; ?>"><?php echo strtoupper($res['DealerName']); ?></option><?php } ?></select>
<?php } ?>

<?php if(isset($_POST['DealerId2']) && $_POST['DealerId2']!=""){ ?>
<?php 
$sql_hs = mysql_query("SELECT hrm_sales_dealer.HqId,StateId FROM hrm_sales_dealer INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId where hrm_sales_dealer.DealerId=".$_POST['DealerId2'], $con); $reshs = mysql_fetch_array($sql_hs); 

$sql1 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=61", $con); 
$res1=mysql_num_rows($sql1); if($res1>0){ $res1 = mysql_fetch_assoc($sql1); $EmpID=$res1['EmployeeID']; }
elseif($res1==0)
{ $sql2 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=62", $con); 
  $res2=mysql_num_rows($sql2); if($res2>0){ $res2 = mysql_fetch_assoc($sql2); $EmpID=$res2['EmployeeID']; }
  elseif($res2==0)
  { $sql3 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=63", $con); 
    $res3=mysql_num_rows($sql3); if($res3>0){ $res3 = mysql_fetch_assoc($sql3); $EmpID=$res3['EmployeeID']; }
	elseif($res3==0)
    { $sql4 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=64", $con); 
      $res4=mysql_num_rows($sql4); if($res4>0){ $res4 = mysql_fetch_assoc($sql4); $EmpID=$res4['EmployeeID']; }
	  elseif($res4==0)
      { $sql5 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=65", $con); 
        $res5=mysql_num_rows($sql5); if($res5>0){ $res5 = mysql_fetch_assoc($sql5); $EmpID=$res5['EmployeeID']; }
		elseif($res5==0)
        { $sql6 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=66", $con); 
          $res6=mysql_num_rows($sql6); if($res6>0){ $res6 = mysql_fetch_assoc($sql6); $EmpID=$res6['EmployeeID']; }
		  elseif($res6==0)
          { $sql7 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=67", $con); 
            $res7=mysql_num_rows($sql7); if($res7>0){ $res7 = mysql_fetch_assoc($sql7); $EmpID=$res7['EmployeeID']; }
			elseif($res7==0)
            { $sql8 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=68", $con); 
              $res8=mysql_num_rows($sql8); if($res8>0){ $res8 = mysql_fetch_assoc($sql8); $EmpID=$res8['EmployeeID']; }
			  elseif($res8==0)
              { $sql9 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=69", $con); 
                $res9=mysql_num_rows($sql9); if($res9>0){ $res9 = mysql_fetch_assoc($sql9); $EmpID=$res9['EmployeeID']; }
				elseif($res9==0)
                { $sql10 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=70", $con); 
                  $res10=mysql_num_rows($sql10); if($res10>0){ $res10 = mysql_fetch_assoc($sql10); $EmpID=$res10['EmployeeID']; }
				  elseif($res10==0)
                  { $sql11 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=71", $con); 
                    $res11=mysql_num_rows($sql11); if($res11>0){ $res11 = mysql_fetch_assoc($sql11); $EmpID=$res11['EmployeeID']; }
					else{ $EmpID=0; }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}
$sqlL = mysql_query("SELECT R1,R2,R3,R4,R5 FROM hrm_sales_reporting_level where EmployeeID=".$EmpID, $con); $rowL = mysql_num_rows($sqlL);
//echo '(1)'.$reshs['HqId'].'--(2)'.$reshs['StateId'].'--(3)'.$EmpID.'--(4)'.$resL['R1'].'--(5)'.$resL['R2'].'--(6)'.$resL['R3'].'--(7)'.$resL['R4'].'--(8)'.$resL['R5'];
if($rowL>0){  $resL = mysql_fetch_assoc($sqlL); $V=1;}else{$V=0;}
?> 
<input type="hidden" name="EId" id="EId" value="<?php echo $EmpID; ?>"><input type="hidden" name="TId" id="TId" value="<?php echo $EmpID; ?>">
<input type="hidden" name="SId" id="SId" value="<?php echo $reshs['StateId']; ?>"><input type="hidden" name="HqId" id="HqId" value="<?php echo $reshs['HqId']; ?>">
<input type="hidden" name="L1" id="L1" value="<?php echo $resL['R1']; ?>"><input type="hidden" name="L2" id="L2" value="<?php echo $resL['R2']; ?>">
<input type="hidden" name="L3" id="L3" value="<?php echo $resL['R3']; ?>"><input type="hidden" name="L4" id="L4" value="<?php echo $resL['R4']; ?>">
<input type="hidden" name="L5" id="L5" value="<?php echo $resL['R5']; ?>"><input type="hidden" name="CheckV" id="CheckV" value="<?php echo $V; ?>">
<?php } ?>


<?php /*********************************** 3333333333333 ****************************************/ ?>


<?php if(isset($_POST['CouId3']) && $_POST['CouId3']!=""){ ?>
<select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State3" id="State3" onChange="ClickState3(this.value)">
<option value="" selected>SELECT STATE</option>	
<?php $sql = mysql_query("SELECT * FROM hrm_state where CountryId=".$_POST['CouId3']." order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
<option value="<?php echo $res['StateId']; ?>"><?php echo strtoupper($res['StateName']); ?></option><?php } ?></select>
<?php } ?>

<?php if(isset($_POST['StaId3']) && $_POST['StaId3']!=""){ ?>
<select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="Hq3" id="Hq3" onChange="ClickHq3(this.value)">
<option value="" selected>SELECT HEAD QUARTER</option>
<?php $sql = mysql_query("SELECT DISTINCT HqId FROM hrm_headquater where StateId=".$_POST['StaId3']." AND HQStatus='A' order by HqName ASC", $con); 
while($res = mysql_fetch_array($sql)){ $sql2 = mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$res['HqId'], $con); $res2 = mysql_fetch_assoc($sql2); ?>
<option value="<?php echo $res['HqId']; ?>"><?php echo strtoupper($res2['HqName']); ?></option><?php } ?></select>
<?php } ?>

<?php if(isset($_POST['HqId3']) && $_POST['HqId3']!=""){ ?>
<select style="font-size:12px;width:300px;height:20px;background-color:#DDFFBB;" name="Dealer3" id="Dealer3" onChange="ClickDealer3(this.value)">
<option value="" selected>SELECT DEALER NAME</option>
<?php $sql = mysql_query("SELECT * FROM hrm_sales_dealer where HqId=".$_POST['HqId3']." order by DealerName ASC", $con); while($res = mysql_fetch_array($sql)){ ?> 
<option value="<?php echo $res['DealerId']; ?>"><?php echo strtoupper($res['DealerName'].'-'.$res['DealerCity']); ?></option><?php } ?></select>
<?php } ?>

<?php if(isset($_POST['DealerId3']) && $_POST['DealerId3']!=""){ ?>
<?php 
$sql_hs = mysql_query("SELECT hrm_sales_dealer.HqId,StateId FROM hrm_sales_dealer INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId where hrm_sales_dealer.DealerId=".$_POST['DealerId3'], $con); $reshs = mysql_fetch_array($sql_hs); 

$sql1 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=61", $con); 
$res1=mysql_num_rows($sql1); if($res1>0){ $res1 = mysql_fetch_assoc($sql1); $EmpID=$res1['EmployeeID']; }
elseif($res1==0)
{ $sql2 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=62", $con); 
  $res2=mysql_num_rows($sql2); if($res2>0){ $res2 = mysql_fetch_assoc($sql2); $EmpID=$res2['EmployeeID']; }
  elseif($res2==0)
  { $sql3 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=63", $con); 
    $res3=mysql_num_rows($sql3); if($res3>0){ $res3 = mysql_fetch_assoc($sql3); $EmpID=$res3['EmployeeID']; }
	elseif($res3==0)
    { $sql4 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=64", $con); 
      $res4=mysql_num_rows($sql4); if($res4>0){ $res4 = mysql_fetch_assoc($sql4); $EmpID=$res4['EmployeeID']; }
	  elseif($res4==0)
      { $sql5 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=65", $con); 
        $res5=mysql_num_rows($sql5); if($res5>0){ $res5 = mysql_fetch_assoc($sql5); $EmpID=$res5['EmployeeID']; }
		elseif($res5==0)
        { $sql6 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=66", $con); 
          $res6=mysql_num_rows($sql6); if($res6>0){ $res6 = mysql_fetch_assoc($sql6); $EmpID=$res6['EmployeeID']; }
		  elseif($res6==0)
          { $sql7 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=67", $con); 
            $res7=mysql_num_rows($sql7); if($res7>0){ $res7 = mysql_fetch_assoc($sql7); $EmpID=$res7['EmployeeID']; }
			elseif($res7==0)
            { $sql8 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=68", $con); 
              $res8=mysql_num_rows($sql8); if($res8>0){ $res8 = mysql_fetch_assoc($sql8); $EmpID=$res8['EmployeeID']; }
			  elseif($res8==0)
              { $sql9 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=69", $con); 
                $res9=mysql_num_rows($sql9); if($res9>0){ $res9 = mysql_fetch_assoc($sql9); $EmpID=$res9['EmployeeID']; }
				elseif($res9==0)
                { $sql10 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=70", $con); 
                  $res10=mysql_num_rows($sql10); if($res10>0){ $res10 = mysql_fetch_assoc($sql10); $EmpID=$res10['EmployeeID']; }
				  elseif($res10==0)
                  { $sql11 = mysql_query("SELECT hrm_employee_general.EmployeeID FROM hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where EmpStatus='A' AND DepartmentId=6 AND HqId=".$reshs['HqId']." AND GradeId=71", $con); 
                    $res11=mysql_num_rows($sql11); if($res11>0){ $res11 = mysql_fetch_assoc($sql11); $EmpID=$res11['EmployeeID']; }
					else{ $EmpID=0; }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}


if($EmpID!='' OR $EmpID!=0)
{
  $sqlL = mysql_query("SELECT R1,R2,R3,R4,R5 FROM hrm_sales_reporting_level where EmployeeID=".$EmpID, $con); $rowL = mysql_num_rows($sqlL); //.$EmpID
//echo '(1)'.$reshs['HqId'].'--(2)'.$reshs['StateId'].'--(3)'.$EmpID.'--(4)'.$resL['R1'].'--(5)'.$resL['R2'].'--(6)'.$resL['R3'].'--(7)'.$resL['R4'].'--(8)'.$resL['R5'];
  if($rowL>0){$resL = mysql_fetch_assoc($sqlL); $V=1;}else{$V=0;}
  $EI=$EmpID;
}  
else
{ $sqlEI = mysql_query("SELECT EmployeeID FROM hrm_sales_hq_temp where HqId=".$reshs['HqId']." AND HqTEmpStatus='A'", $con); $rowEI=mysql_num_rows($sqlEI); 
  if($rowEI==1)
  { $resEI = mysql_fetch_assoc($sqlEI); 
    $sqlL = mysql_query("SELECT R1,R2,R3,R4,R5 FROM hrm_sales_reporting_level where EmployeeID=".$resEI['EmployeeID'], $con); $rowL = mysql_num_rows($sqlL); //.$EmpID
    if($rowL>0){$resL = mysql_fetch_assoc($sqlL); $V=1;}else{$V=0;}
	$EI=$resEI['EmployeeID'];
  }
}

?> 
<input type="hidden" name="EId" id="EId" value="<?php echo $EI; ?>"><input type="hidden" name="TId" id="TId" value="<?php echo $EI; ?>">
<input type="hidden" name="SId" id="SId" value="<?php echo $reshs['StateId']; ?>"><input type="hidden" name="HqId" id="HqId" value="<?php echo $reshs['HqId']; ?>">
<input type="hidden" name="L1" id="L1" value="<?php echo $resL['R1']; ?>"><input type="hidden" name="L2" id="L2" value="<?php echo $resL['R2']; ?>">
<input type="hidden" name="L3" id="L3" value="<?php echo $resL['R3']; ?>"><input type="hidden" name="L4" id="L4" value="<?php echo $resL['R4']; ?>">
<input type="hidden" name="L5" id="L5" value="<?php echo $resL['R5']; ?>"><input type="hidden" name="CheckV" id="CheckV" value="<?php echo $V; ?>">
<?php } ?>


