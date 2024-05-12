<?php require_once('../AdminUser/config/config.php');
if(isset($_POST['action']) && $_POST['action']=='ChangeDesig')
{ 

//echo "select * from hrm_deptgradedesig where DesigId=".$_POST['DesigId22']." AND DGDStatus='A' AND CompanyId=".$_POST['ComId'];
?>
<select style="width:48px;height:22px;background-color:#9FCFFF;font-size:12px;border:hidden;font-family:Times New Roman;" id="GradeId_<?php echo $_POST['no']; ?>" onChange="FunGrade(this.value)">
<?php $sql=mysql_query("select * from hrm_deptgradedesig where DesigId=".$_POST['DesigId22']." AND DGDStatus='A' AND CompanyId=".$_POST['ComId'], $con); $res=mysql_fetch_assoc($sql);
if($res['GradeId']>0 AND $res['GradeId']>=61)
{ $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId']." AND CompanyId=".$_POST['ComId'], $con); $resG=mysql_fetch_assoc($sqlG);
  echo '<option style="background-color:#FFFFFF;" value="'.$res['GradeId'].'">'.$resG['GradeValue'].'</option>'; 
}
if($res['GradeId_2']>0 AND $res['GradeId_2']>=61)
{ $sqlG2=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId_2']." AND CompanyId=".$_POST['ComId'], $con); $resG2=mysql_fetch_assoc($sqlG2);
  echo '<option style="background-color:#FFFFFF;" value="'.$res['GradeId_2'].'">'.$resG2['GradeValue'].'</option>'; 
}
if($res['GradeId_3']>0 AND $res['GradeId_3']>=61)
{ $sqlG3=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId_3']." AND CompanyId=".$_POST['ComId'], $con); $resG3=mysql_fetch_assoc($sqlG3);
  echo '<option style="background-color:#FFFFFF;" value="'.$res['GradeId_3'].'">'.$resG3['GradeValue'].'</option>'; 
}  
if($res['GradeId_4']>0 AND $res['GradeId_4']>=61)
{ $sqlG4=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId_4']." AND CompanyId=".$_POST['ComId'], $con); $resG4=mysql_fetch_assoc($sqlG4);
  echo '<option style="background-color:#FFFFFF;" value="'.$res['GradeId_4'].'">'.$resG4['GradeValue'].'</option>'; 
}
if($res['GradeId_5']>0 AND $res['GradeId_5']>=61)
{ $sqlG5=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId_5']." AND CompanyId=".$_POST['ComId'], $con); $resG5=mysql_fetch_assoc($sqlG5);
  echo '<option style="background-color:#FFFFFF;" value="'.$res['GradeId_5'].'">'.$resG5['GradeValue'].'</option>';
}  
  
} ?>
