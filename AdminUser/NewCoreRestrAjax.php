<?php
require_once('config/config.php');
if(isset($_POST['Act']) && $_POST['Act']=="ApplyCore")
{ 
    /*SELECT d.id,d.department_name FROM org_function org 
     LEFT JOIN function_vertical_mapping fvm ON fvm.org_function_id = org.id
     LEFT JOIN vertical v ON v.id = fvm.vertical_id AND fvm.org_function_id = org.id
     LEFT JOIN fun_vertical_dept_mapping fvdm ON fvdm.function_vertical_id = fvm.id 
     LEFT JOIN department d ON d.id = fvdm.department_id 
    WHERE org.id =2 AND v.id=1*/
    $nm=$_POST['nm'];
    if($nm=='Ver')
    {
      $idnm='Verr'; $nmm='Dept';
      $qry="select v.id,v.vertical_name as value from core_verticals v left join core_vertical_function_mapping vf on v.id=vf.vertical_id where vf.org_function_id=".$_POST['v']." group by v.vertical_name order by vertical_name ASC";
    }
    elseif($nm=='Dept')
    {
      $idnm='Deptt'; $nmm='SubDept';
      //$qry="select d.id,d.department_name as value from core_departments d left join core_vertical_department_mapping vdm on d.id=vdm.department_id where vdm.function_vertical_id=".$_POST['v']." group by d.department_name order by d.department_name ASC";
      $qry="select d.id,d.department_name as value FROM core_functions cf 
       left join core_vertical_function_mapping cvfm on cvfm.org_function_id = cf.id 
       left join core_verticals v on v.id = cvfm.vertical_id and cvfm.org_function_id = cf.id 
       left join core_vertical_department_mapping cvdm on cvdm.function_vertical_id = cvfm.id 
       left join core_departments d on d.id = cvdm.department_id 
       where cf.id=".$_POST['fun']." and v.id=".$_POST['v']." group by d.department_name order by d.department_name ASC";
    }
    elseif($nm=='SubDept')
    {
      $idnm='SubDeptt'; $nmm=' ';
      $qry="select subd.id,sub_department_name as value from core_sub_department_master subd left join core_sub_department_mapping subdm on subd.id=subdm.sub_department_id left join core_vertical_department_mapping vd on subdm.fun_vertical_dept_id=vd.id where vd.department_id=".$_POST['v']." group by subd.sub_department_name order by sub_department_name";
    }
    elseif($nm=='Desig')
    {
      $idnm='Desigg'; $nmm=' '; //Grade
      $qry="select de.id,designation_name as value from core_designation de left join core_designation_department_mapping dde on de.id=dde.designation_id where dde.department_id=".$_POST['v']." group by de.designation_name order by de.designation_name";
    }
    elseif($nm=='Sec')
    {
      $idnm='Secc'; $nmm=' ';
      $qry="select sec.id,sec.section_name as value from core_section sec where is_active=1 group by section_name order by section_name";
    }
    elseif($nm=='Hq')
    {
      $idnm='Hqq'; $nmm=' ';
      $qry="select id,city_village_name as value from core_city_village_by_state WHERE is_active=1 and state_id=".$_POST['v']." group by city_village_name order by city_village_name";
    }    
    elseif($nm=='Zone')
    {
      $idnm='Zonee'; $nmm='Region';
      $qry="select z.id,z.zone_name  as value from core_zones z left join core_bu_zone_mapping bz on z.id=bz.zone_id where is_active=1 and bz.business_unit_id=".$_POST['v']." group by zone_name order by zone_name";
    }
    elseif($nm=='Region')
    {
      $idnm='Regionn'; $nmm='Terr';
      $qry="select r.id,r.region_name as value from core_regions r left join core_zone_region_mapping zr on r.id = zr.region_id where is_active=1 and zr.zone_id=".$_POST['v']." group by region_name order by region_name";
    }
    elseif($nm=='Terr')
    {
      $idnm='Terrr'; $nmm='';
      $qry="select t.id,t.territory_name as value from core_territory t left join core_region_territory rt on t.id = rt.territory_id where is_active=1 and rt.region_id=".$_POST['v']." group by territory_name order by territory_name";
    }
    //echo $qry;
    //echo $idnm;
    ?>
      <select name="<?=$nm."_".$no?>" id="<?=$nm."_".$no?>" onChange="ApplyCore(this.value,<?=$_POST['no']?>,'<?=$idnm?>','<?=$nmm?>')" class="tdll">
	    <option style="background-color:#DBD3E2; " value="0">Select</option>
      <?php $sql = mysql_query($qry, $con); while($res = mysql_fetch_array($sql)){ ?>
	     <option value="<?php echo $res['id']; ?>"><?=$res['value']?></option><?php } ?>
      </select> 
	  
<?php } 

elseif(isset($_POST['Act']) && $_POST['Act']=="UpdateCoreMapping")
{
  $qry = mysql_query("select * from core_ess_mapping where EmployeeID=".$_POST['empid']); $row = mysql_num_rows($qry);
  if($row>0)
  {
   $InsUp = mysql_query("update core_ess_mapping set GradeId='".$_POST['Grade']."', CostCenter='".$_POST['CostC']."', HqId='".$_POST['Hq']."', DepartmentId='".$_POST['Dept']."', DesigId='".$_POST['Desig']."', SubDepartmentId='".$_POST['SubDept']."', EmpFunction='".$_POST['Fun']."', EmpVertical='".$_POST['Ver']."', EmpSection='".$_POST['Sec']."', CompanyId=".$_POST['comid'].", CreatedBy='".$_POST['uid']."', CreatedDate='".date("Y-m-d")."', SysDate='".date("Y-m-d")."' where EmployeeID=".$_POST['empid'], $con);
  }
  else
  {
    $InsUp = mysql_query("insert into core_ess_mapping(EmployeeID, GradeId, CostCenter, HqId, DepartmentId, DesigId, SubDepartmentId, EmpFunction, EmpVertical, EmpSection, CompanyId, CreatedBy, CreatedDate, SysDate) values('".$_POST['empid']."', '".$_POST['Grade']."', '".$_POST['CostC']."', '".$_POST['Hq']."', '".$_POST['Dept']."', '".$_POST['Desig']."', '".$_POST['SubDept']."', '".$_POST['Fun']."', '".$_POST['Ver']."', '".$_POST['Sec']."', ".$_POST['comid'].", '".$_POST['uid']."', '".date("Y-m-d")."', '".date("Y-m-d")."')", $con);
  }

  if($InsUp){ $result=1; }else{ $result=0; }
  echo '<input type="hidden" id="RstVal" value='.$result.' />';
}

elseif(isset($_POST['Act']) && $_POST['Act']=="UpdateCoreLocMapping")
{
  $qry = mysql_query("select * from core_ess_mapping where EmployeeID=".$_POST['empid']); $row = mysql_num_rows($qry);
  if($row>0) 	
  {
   $InsUp = mysql_query("update core_ess_mapping set BUId='".$_POST['Bu']."', ZoneId='".$_POST['Zone']."', RegionId='".$_POST['Region']."', TerrId='".$_POST['Terr']."', CreatedByLoc='".$_POST['uid']."', CreatedDateLoc='".date("Y-m-d")."', SysDateLoc='".date("Y-m-d")."' where EmployeeID=".$_POST['empid'], $con);
  }
  else
  {
    $InsUp = mysql_query("insert into core_ess_mapping(EmployeeID, BUId, ZoneId, RegionId, TerrId, CreatedByLoc, CreatedDateLoc, SysDateLoc) values('".$_POST['empid']."', '".$_POST['Bu']."', '".$_POST['Zone']."', '".$_POST['Region']."', '".$_POST['Terr']."', '".$_POST['uid']."', '".date("Y-m-d")."', '".date("Y-m-d")."' )", $con);
  }

  if($InsUp){ $result=1; }else{ $result=0; }
  echo '<input type="hidden" id="RstVal" value='.$result.' />';
}


elseif(isset($_POST['Act']) && $_POST['Act']=="UpdateCoreTerrMapping")
{
  if($_POST['t']=='FC')
  { 
    $fld='HqFC'; $Bu='FC_BUId'; $Zn='FC_ZoneId'; $Rg='FC_RegionId'; $Tr='New_HQFC'; $CrBy='HqFC_CreatedBy'; $CrDt='HqFC_CreatedDate';
  }
  else if($_POST['t']=='VC')
  { 
    $fld='HqVC'; $Bu='VC_BUId'; $Zn='VC_ZoneId'; $Rg='VC_RegionId'; $Tr='New_HQVC'; $CrBy='HqVC_CreatedBy'; $CrDt='HqVC_CreatedDate';
  }


  $qry = mysql_query("select * from core_terr_mapping where ".$fld."=".$_POST['Hq']); $row = mysql_num_rows($qry);
  if($row>0) 	
  {
   $InsUp = mysql_query("update core_terr_mapping set ".$Bu."='".$_POST['Bu']."', ".$Zn."='".$_POST['Zone']."', ".$Rg."='".$_POST['Region']."', ".$Tr."='".$_POST['Terr']."', ".$CrBy."='".$_POST['uid']."', ".$CrDt."='".date("Y-m-d")."' where ".$fld."=".$_POST['Hq'], $con);
  }
  else
  {
    $InsUp = mysql_query("insert into core_terr_mapping(".$fld.", ".$Bu.", ".$Zn.", ".$Rg.", ".$Tr.", ".$CrBy.", ".$CrDt.") values(".$_POST['Hq'].", '".$_POST['Bu']."', '".$_POST['Zone']."', '".$_POST['Region']."', '".$_POST['Terr']."', '".$_POST['uid']."', '".date("Y-m-d")."')", $con);
  }

  if($InsUp){ $result=1; }else{ $result=0; }
  echo '<input type="hidden" id="RstVal" value='.$result.' />';
  echo '<input type="hidden" id="TypeVal" value='.$_POST['t'].' />';
}



elseif(isset($_POST['Act']) && $_POST['Act']=="ProcessMapping")
{
  if($_POST['v']=='E')
  { 
    $Field='Employee_Masters';
    $sql=mysql_query("select * from core_ess_mapping where CompanyId=".$_POST['comid']." order by EmployeeID ASC",$con);
    $res=mysql_fetch_assoc($sql);
     if($res['DepartmentId']!=0 && $res['DesigId']!=0 && $res['GradeId']!=0 && $res['CostCenter']!=0 && $res['EmpFunction']!=0 && $res['EmpVertical']!=0)
     {
       $InsUp = mysql_query("update hrm_employee_general set DepartmentId='".$res['DepartmentId']."', DesigId='".$res['DesigId']."', GradeId='".$res['GradeId']."', CostCenter='".$res['CostCenter']."', HqId='".$res['HqId']."', SubLocation='".$res['SubLocation']."', SubDepartmentId='".$res['SubDepartmentId']."', EmpFunction='".$res['EmpFunction']."', EmpVertical='".$res['EmpVertical']."', EmpSection='".$res['EmpSection']."'  where EmployeeID=".$res['EmployeeID'], $con);
     }
  }
  else if($_POST['v']=='G')
  { 
    $Field='General_Location';
    $sql=mysql_query("select * from core_ess_mapping where CompanyId=".$_POST['comid']." order by EmployeeID ASC",$con);
    $res=mysql_fetch_assoc($sql);
     if($res['BUId']>0 || $res['ZoneId']>0 || $res['RegionId']>0 || $res['TerrId']>0)
     {
       $InsUp = mysql_query("update hrm_employee_general set BUId='".$res['BUId']."', ZoneId='".$res['ZoneId']."', RegionId='".$res['RegionId']."', TerrId='".$res['TerrId']."' where EmployeeID=".$res['EmployeeID'], $con);
     }
  }
  else if($_POST['v']=='B')
  { 
    $Field='Business_Location';
    //FC HQ
    $sqlf=mysql_query("select HqFC, New_HQFC from core_terr_mapping where HqFC>0 order by HqFC ASC",$con);
    $resf=mysql_fetch_assoc($sqlf);
     if($resf['HqFC']>0 || $resf['New_HQFC']>0)
     {
       $InsUp = mysql_query("update hrm_sales_dealer set Hq_fc='".$resf['New_HQFC']."' where Hq_fc=".$resf['HqFC'], $con);
     }

    //VC HQ
    $sqlv=mysql_query("select HqVC, New_HQVC from core_terr_mapping where HqVC>0 order by HqFC ASC",$con);
    $resv=mysql_fetch_assoc($sqlv);
     if($resv['HqVC']>0 || $resv['New_HQVC']>0)
     {
       $InsUp = mysql_query("update hrm_sales_dealer set Hq_vc='".$resv['New_HQVC']."' where Hq_vc=".$resv['HqVC'], $con);
     }
  }


  if($InsUp)
  { $result=1; 
    $sqlQup=mysql_query("update core_process set Status=1, CompanyId=".$_POST['comid'].", CreatedBy=".$_POST['uid'].", CreatedDate='".date("Y-m-d")."' where Process_Name='".$Field."'");
  }
  else{ $result=0; }
  echo '<input type="hidden" id="RstVal" value='.$result.' />';
  echo '<input type="hidden" id="PrsVal" value='.$_POST['v'].' />';
}



?> 