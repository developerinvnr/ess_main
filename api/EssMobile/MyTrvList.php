<?php 
//require_once('../../AdminUser/config/config.php');

/******************/	
//$con = mysqli_connect("localhost","vnrseed2_demo","vnrseed2_demo","vnrseed2_demo");

$con=mysqli_connect('localhost','hrims_user','hrims@192');
if(!$con) die("Failed to connect to database!");
$db=mysqli_select_db( $con, 'hrims');
if(!$db) die("Failed to select database!");
/******************/
date_default_timezone_set('asia/calcutta');  
date_default_timezone_set('Asia/Calcutta');


if($_REQUEST['empid'] >0){
$run_qry=mysqli_query($con,"select * from hrm_employee where EmployeeID =".$_REQUEST['empid']." AND EmpStatus = 'A'");
$num=mysqli_num_rows($run_qry); 
if($num == 0){
    echo json_encode(array("Code" => "404") ); 
    die;
}}


if($_REQUEST['empid']!='' && $_REQUEST['Tdate']!='' && $_REQUEST['value'] == 'InsMyTrv')
{
  //EmpId, date, description, purpose, remark, value=InsMyTrv
 
  if($_REQUEST['Tdate']!='')
  {
   $d=date("d",strtotime($_REQUEST['Tdate'])); $d=intval($d); 
   $m=date("m",strtotime($_REQUEST['Tdate'])); $m=intval($m);
   $y=date("Y",strtotime($_REQUEST['Tdate']));
   $sql=mysqli_query($con, "select * from hrm_api_tourplan where EmpId=".$_REQUEST['empid']." AND Date='".date("Y-m-d",strtotime($_REQUEST['Tdate']))."'");
   $row=mysqli_num_rows($sql);
   
   if($_REQUEST['Location']=='null'){ $loc=''; $loc2=''; $loc3=''; }else{ $loc='Location,'; $loc2="'".addslashes($_REQUEST['Location'])."',"; $loc3="Location='".addslashes($_REQUEST['Location'])."',";  }
   if($_REQUEST['Plan_Purpose']=='null'){ $pl=''; $pl2=''; $pl3=''; }else{ $pl='Plan_Purpose,'; $pl2="'".addslashes($_REQUEST['Plan_Purpose'])."',";  $pl3="Plan_Purpose='".addslashes($_REQUEST['Plan_Purpose'])."',"; }
   if($_REQUEST['NightHalt']=='null'){ $Ni=''; $Ni2=''; $Ni3=''; }else{ $Ni='NeightHalt,'; $Ni2="'".$_REQUEST['NightHalt']."',"; $Ni3="NeightHalt='".$_REQUEST['NightHalt']."',";  }
   if($_REQUEST['RevisedPlan']=='null'){ $Re=''; $Re2=''; $Re3=''; }else{ $Re='RevisedPlan,'; $Re2="'".addslashes($_REQUEST['RevisedPlan'])."',";  $Re3="RevisedPlan='".addslashes($_REQUEST['RevisedPlan'])."',"; }
   if($_REQUEST['NightHaltRevised']=='null'){ $NR=''; $NR2=''; $NR3=''; }else{ $NR='NeightHalt_RevisedPlan'; $NR2="'".$_REQUEST['NightHaltRevised']."'";  $NR3="NeightHalt_RevisedPlan='".$_REQUEST['NightHaltRevised']."'"; }
   
  
  $u1=$loc.''.$pl.''.$Ni.''.$Re.''.$NR; 
  $u2=$loc2.''.$pl2.''.$Ni2.''.$Re2.''.$NR2; 
  $v1=rtrim($u1, ','); $v2=rtrim($u2, ',');
  
  $v3=$loc3.' '.$pl3.''.$Ni3.''.$Re3.''.$NR3; $u3=$v3;
  $v3=rtrim($u3,',');
  
  //echo $v1.' ---- '.$v2.' ---- '.$v3;
  

   
   if($row==0){ 
       
       //if($_REQUEST['empid']==1305){echo "insert into hrm_api_tourplan(EmpId, Month, Year, Date, ".$v1.") values(".$_REQUEST['empid'].", ".$m.", ".$y.", '".date("Y-m-d",strtotime($_REQUEST['Tdate']))."', ".$v2.")";}
       
       $sInsUp=mysqli_query($con, "insert into hrm_api_tourplan(EmpId, Month, Year, Date, ".$v1.") values(".$_REQUEST['empid'].", ".$m.", ".$y.", '".date("Y-m-d",strtotime($_REQUEST['Tdate']))."', ".$v2.")"); 
       
       
   }
   else
   { 
     $res=mysqli_fetch_assoc($sql);
     if($res['Location']!=$_REQUEST['Location'] || $res['Plan_Purpose']!=$_REQUEST['Plan_Purpose'] || $res['NeightHalt']!=$_REQUEST['NightHalt'] || $res['RevisedPlan']!=$_REQUEST['RevisedPlan'] || $res['NeightHalt_RevisedPlan']!=$_REQUEST['NightHaltRevised'])
	 {
	  $sIns=mysqli_query($con, "insert into hrm_api_tourplan_ext(EmpId, Date, Location, Plan_Purpose, NeightHalt, RevisedPlan, NeightHalt_RevisedPlan, SysDate) values(".$res['EmpId'].", '".date("Y-m-d",strtotime($res['Date']))."', '".addslashes($res['Location'])."', '".addslashes($res['Plan_Purpose'])."', '".$res['NeightHalt']."', '".addslashes($res['RevisedPlan'])."', '".$res['NeightHalt_RevisedPlan']."', '".date("Y-m-d")."')"); 
	 }
	 
	   //if($_REQUEST['empid']==1305){echo "update hrm_api_tourplan set ".$v3." where EmpId=".$_REQUEST['empid']." AND Date='".date("Y-m-d",strtotime($_REQUEST['Tdate']))."'";}
	   
       $sInsUp=mysqli_query($con, "update hrm_api_tourplan set ".$v3." where EmpId=".$_REQUEST['empid']." AND Date='".date("Y-m-d",strtotime($_REQUEST['Tdate']))."'"); 
       
   }
   
   if($sInsUp){ echo json_encode(array("code"=>"300", "return"=>"success") ); }
  }
  else
  {
   echo json_encode(array("code" => 100, "return"=>"date missing") );
  }
  
}




elseif($_REQUEST['empid']!='' && $_REQUEST['month']>0 && $_REQUEST['year']>0 && $_REQUEST['value'] == 'MyTrvList')
{
  //EmpId, month, year, value=MyTrvList
  if($_REQUEST['month']>0 AND $_REQUEST['year']>0)
  {
    $m=intval($_REQUEST['month']);  
    $y=$_REQUEST['year'];
    $mm=intval(date("m"));
    
    /*if($mm==$m){ $y=$_REQUEST['year']; }
    elseif(($mm==1 AND $m>=2 AND $m<=12) OR ($mm>=1 AND $mm<=2 AND $m>=3 AND $m<=12) OR ($mm>=1 AND $mm<=3 AND $m>=4 AND $m<=12) OR ($mm>=1 AND $mm<=4 AND $m>=5 AND $m<=12) OR ($mm>=1 AND $mm<=5 AND $m>=6 AND $m<=12) OR ($mm>=1 AND $mm<=6 AND $m>=7 AND $m<=12) OR ($mm>=1 AND $mm<=8 AND $m>=9 AND $m<=12) OR ($mm>=1 AND $mm<=9 AND $m>=10 AND $m<=12) OR ($mm>=1 AND $mm<=10 AND $m>=11 AND $m<=12) OR ($mm>=1 AND $mm<=11 AND $m<=12)){ $y=$y-1; }
    elseif($mm==12 AND $m>=1 AND $m<=12){ $y=$y; }
    */  
   $sql=mysqli_query($con, "select * from hrm_api_tourplan where EmpId=".$_REQUEST['empid']." AND Month=".$m." AND Year=".$y.""); $row=mysqli_num_rows($sql); $Tarray = array();
   if($row>0)
   {
     while($res=mysqli_fetch_assoc($sql)){ $Tarray[]=$res; }
	 echo json_encode(array("code" => 300, "MyTour_list" => $Tarray) ); 
   }
   else
   {
    echo json_encode(array("code" => 100,"return"=>"no data found") );
   }
  }
  
}




elseif($_REQUEST['empid']!='' && $_REQUEST['Tdate']!='' && $_REQUEST['value'] == 'His_MyTrvList')
{
 
   $sql=mysqli_query($con, "select Location,Plan_Purpose,NeightHalt,RevisedPlan,NeightHalt_RevisedPlan,SysDate from hrm_api_tourplan_ext where EmpId=".$_REQUEST['empid']." AND Date='".date("Y-m-d",strtotime($_REQUEST['Tdate']))."' "); $row=mysqli_num_rows($sql); $Tarray = array();
   if($row>0)
   {
     while($res=mysqli_fetch_assoc($sql)){ $Tarray[]=$res; }
	 echo json_encode(array( "code" => 300,"His_MyTour_list" => $Tarray) ); 
   }
   else
   {
    echo json_encode(array("code" => 100,"return"=>"no data found") );
   }
  
}





elseif($_REQUEST['empid']!='' && $_REQUEST['value'] == 'MyTeam')
{
 
  $sqlu=mysqli_query($con, "select r.EmployeeID, EmpCode,
  
  CASE
WHEN DR ='Y' THEN 'Dr.'
WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
ELSE 'Mr.'
END as Title,
  
  Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue FROM hrm_employee_reporting r INNER JOIN hrm_employee e ON r.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON r.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON r.EmployeeID=p.EmployeeID INNER JOIN hrm_designation de on g.DesigId=de.DesigId INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_grade gr ON g.GradeId=gr.GradeId WHERE r.AppraiserId=".$_REQUEST['empid']." AND e.EmpStatus='A' order by e.EmpCode ASC"); 
  
  $Uarray = array(); $rowu=mysqli_num_rows($sqlu);
  if($rowu>0)
  {
   while($resu=mysqli_fetch_assoc($sqlu)){ $Uarray[]=$resu; }
   echo json_encode(array( "code" => 300,"MyTeam_list" => $Uarray) );
  }
  else
  {
   echo json_encode(array("code" => 100,"return"=>"no data found") );
  }
  
}






elseif($_REQUEST['empid']!='' && $_REQUEST['teamid']!='' && $_REQUEST['month']>0 && $_REQUEST['year']>0 && $_REQUEST['value'] == 'MyTeamTrvList')
{
 //EmpId, TeamId, month, year, value=MyTeamTrvList
 if($_REQUEST['month']>0 AND $_REQUEST['year']>0)
 {
  $sql=mysqli_query($con, "select * from hrm_api_tourplan where EmpId=".$_REQUEST['teamid']." AND Month=".$_REQUEST['month']." AND Year=".$_REQUEST['year'].""); $row=mysqli_num_rows($sql); $Tarray = array();
  if($row>0)
  {
    while($res=mysqli_fetch_assoc($sql)){ $Tarray[]=$res; }
	echo json_encode(array( "code" => 300,"MyTeamTour_list" => $Tarray) ); 
  }
  else
  {
   echo json_encode(array("code" => 100,"return"=>"no data found") );
  }
 }
 
}
else
{
 echo json_encode(array("return"=>"value missing") );
}

?>
