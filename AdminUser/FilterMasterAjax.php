<?php
require_once('config/config.php'); 
if(isset($_POST['Act']) && $_POST['Act']=="FilerDataShow")
{ 
    //var pars = 'Act=FilerDataShow&v='+v+'&Filed='+Filed+'&EmpFiled='+EmpFiled+'&TargetName='+TargetName+'&TargetSpan='+TargetSpan; 
    $TargetNameNxt=$_POST['TargetNameNxt'];
    $TargetSpanNxt=$_POST['TargetSpanNxt'];

    $target=$_POST['TargetName'];
    if($target=='Ver')
    {
      $FieldNxt='Dept'; $EmpFieldNxt='EmpDept'; $TargetName2Nxt='SubDept'; $TargetSpan2Nxt='SubDeptSpan';  
      $qry="select v.id,v.vertical_name as value from core_verticals v left join core_vertical_function_mapping vf on v.id=vf.vertical_id where vf.org_function_id=".$_POST['v']." group by v.vertical_name order by vertical_name ASC";
    }
    elseif($target=='Dept')
    {
        $FieldNxt='SubDept'; $EmpFieldNxt='EmpSubDept'; $TargetName2Nxt='Sec'; $TargetSpan2Nxt='SecSpan';  
      $qry="select d.id,d.department_name as value FROM core_functions cf 
       left join core_vertical_function_mapping cvfm on cvfm.org_function_id = cf.id 
       left join core_verticals v on v.id = cvfm.vertical_id and cvfm.org_function_id = cf.id 
       left join core_vertical_department_mapping cvdm on cvdm.function_vertical_id = cvfm.id 
       left join core_departments d on d.id = cvdm.department_id 
       where cf.id=".$_POST['fun']." and v.id=".$_POST['v']." group by d.department_name order by d.department_name ASC";
    }
    elseif($target=='SubDept')
    { 
      $TargetNameNxt='0'; $TargetSpanNxt='0';  
      $FieldNxt='Sec'; $EmpFieldNxt='EmpSec'; $TargetName2Nxt='0'; $TargetSpan2Nxt='0';  
      $qry="select subd.id,sub_department_name as value from core_sub_department_master subd left join core_sub_department_mapping subdm on subd.id=subdm.sub_department_id left join core_vertical_department_mapping vd on subdm.fun_vertical_dept_id=vd.id where vd.department_id=".$_POST['v']." group by subd.sub_department_name order by sub_department_name";
    }
    elseif($target=='Sec') 
    {  
      $FieldNxt='0'; $EmpFieldNxt='0'; $TargetName2Nxt='0'; $TargetSpan2Nxt='0';  
      $qry="select sec.id,sec.section_name as value from core_section sec left join core_department_section ds on sec.id=ds.section_id where sec.is_active=1 and ds.department_id=".$_POST['v']." group by sec.section_name order by sec.section_name";
    }
    elseif($target=='Desig')
    {
      $FieldNxt='Grade'; $EmpFieldNxt='EmpGrade'; $TargetName2Nxt='0'; $TargetSpan2Nxt='0';  
      $qry="select de.id,designation_name as value from core_designation de left join core_designation_department_mapping dde on de.id=dde.designation_id where dde.department_id=".$_POST['v']." group by de.designation_name order by de.designation_name";
    }
    elseif($target=='Grade')
    {
      $FieldNxt='0'; $EmpFieldNxt='0'; $TargetName2Nxt='0'; $TargetSpan2Nxt='0';  
      $Sgrd=mysql_query("select * from hrm_deptgradedesig where DepartmentId=".$_POST['dept']." AND DesigId=".$_POST['v']."",$con);
      $Rgrd=mysql_fetch_assoc($Sgrd);
      if($Rgrd['GradeId']>0 || $Rgrd['GradeId_2']>0 || $Rgrd['GradeId_3']>0 || $Rgrd['GradeId_4']>0 || $Rgrd['GradeId_5']>0)
      { 
       $GradeIn = $Rgrd['GradeId'].",".$Rgrd['GradeId_2'].",".$Rgrd['GradeId_3'].",".$Rgrd['GradeId_4'].",".$Rgrd['GradeId_5'];
       $qry="select gr.id,grade_name as value from core_grades gr where id in (".$GradeIn.") and gr.is_active=1 and gr.company_id=".$_POST['comid']." group by gr.grade_name order by gr.id";
      }
      else
      {
        $qry="select id,grade_name as value from core_grades gr where gr.is_active=1 and gr.company_id=".$_POST['comid']." group by gr.grade_name order by gr.id";
      }
    }
    elseif($target=='City')
    {
      $FieldNxt='0'; $EmpFieldNxt='0'; $TargetName2Nxt='0'; $TargetSpan2Nxt='0';  
      $qry="select id,city_village_name as value from core_city_village_by_state WHERE is_active=1 and state_id=".$_POST['v']." group by city_village_name order by city_village_name";
    }    
    elseif($target=='Zone')
    {
      $FieldNxt='Region'; $EmpFieldNxt='EmpRegion'; $TargetName2Nxt='Terr'; $TargetSpan2Nxt='TerrSpan';  
      $qry="select z.id,z.zone_name  as value from core_zones z left join core_bu_zone_mapping bz on z.id=bz.zone_id where is_active=1 and bz.business_unit_id=".$_POST['v']." group by zone_name order by zone_name";
    }
    elseif($target=='Region')
    {
      $FieldNxt='Terr'; $EmpFieldNxt='EmpTerr'; $TargetName2Nxt='0'; $TargetSpan2Nxt='0';    
      $qry="select r.id,r.region_name as value from core_regions r left join core_zone_region_mapping zr on r.id = zr.region_id where is_active=1 and zr.zone_id=".$_POST['v']." group by region_name order by region_name";
    }
    elseif($target=='Terr')
    {
      $FieldNxt='0'; $EmpFieldNxt='0'; $TargetName2Nxt='0'; $TargetSpan2Nxt='0';  
      $qry="select t.id,t.territory_name as value from core_territory t left join core_region_territory rt on t.id = rt.territory_id where is_active=1 and rt.region_id=".$_POST['v']." group by territory_name order by territory_name";
    }
    //echo $qry;
    //echo $idnm.'-'.$target=;
    
    ?>
      <select class="All_120" name="<?=$_POST['TargetName']?>" id="<?=$_POST['TargetName']?>" onChange="ApplyFilter(this.value,'<?=$_POST['FieldNxt']?>','<?=$_POST['EmpFieldNxt']?>','<?=$TargetNameNxt?>','<?=$TargetSpanNxt?>','<?=$FieldNxt?>','<?=$EmpFieldNxt?>','<?=$TargetName2Nxt?>','<?=$TargetSpan2Nxt?>')" class="tdll">
	    <option style="background-color:#DBD3E2;" value="0">Select</option>
      <?php $sql = mysql_query($qry, $con); while($res = mysql_fetch_array($sql)){ ?>
	     <option value="<?php echo $res['id']; ?>"><?=$res['value']?></option><?php } ?>
      </select> 
	  
<?php } 

?> 