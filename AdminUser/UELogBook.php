<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//****************************************************************************************************************
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_600{font-size:11px; height:20px; width:600px;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style>.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</script>
<Script type="text/javascript" language="javascript">
function SelectAE(v){ window.location='UELogBook.php?action=Login&value='+v;}
function PrintAE(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; var DeptValue=document.getElementById("DeptValue").value;  
  window.open("PrintFamilyReport.php?action=DeptFamily&value="+v+"&c="+ComId+"&y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=850,height=650");}
</Script>  
</head>
<body class="body">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="DeptValue" id="DeptValue" value="<?php echo $_REQUEST['value']; ?>" />
<table class="table" border="0">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center" width="100%" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<table border="0" style="margin-top:0px; width:95%; height:400px;">
	<tr>
		<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
		<td align="" width="100%" valign="top">
		   <table border="0">
			 <tr><td>
			       <table>
				     <tr>
<?php  if($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') { ?>
				   <td>
				    <table border="0">						
                    <tr>
				<td class="td1" style="width:600px; height:20px; font-size:15px; font-family:Times New Roman; color:#00274F; font-weight:bold;" align="">Admin/User & Employee :
					 &nbsp;&nbsp;
                       <select style="font-size:11px; width:100px; height:18px; background-color:#DDFFBB;" name="AE" id="AE" onChange="SelectAE(this.value)">                       <option value="" style="margin-left:0px;" selected>&nbsp;Select</option>
                       <option value="u">&nbsp;ADMIN</option>
					   <option value="e">&nbsp;EMPLOYEE</option></select>
					   &nbsp;&nbsp;(Login Reports) &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
					   <?php if($_REQUEST['action']=='Login') { ?>
					   <font style=" width:700px;font-size:18px; color:#550055; font-family:Times New Roman; font-weight:bold;">
					   <u><?php if($_REQUEST['value']=='e') {echo 'Employee'; } else {echo 'Admin/User';} ?></u>
					   </font>
					   <?php /* <a href="#" onClick="PrintAE('<?php echo $_REQUEST['value']; ?>')" style="font-size:12px;">Print</a> */ ?>
					   </td>
					   <?php } ?>
                     </tr>
				   </table>					
				   </td> 
<?php } ?>
		           </tr>
                  </table>
				</td>
			 </tr>
<?php //---------------------------------------Display Record----------------------------------------------------------------- ?>
<?php if($_REQUEST['action']=='Login') { ?>
 <tr>
 <td>
   <table border="1" width="600">
<?php if($_REQUEST['value']=='e') {?>   
 <tr bgcolor="#7a6189">
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Sno</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>EC</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Department</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Login DateTime</b></td>
 </tr>
 <?php 
$sql_statement = mysql_query("select * from hrm_logbook_emp where CompanyId=".$CompanyId." order by ELogId DESC", $con); 
//$num_Array = mysql_query($sql_statement);
$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page']))
$page = $_GET['page'];
else
$page = 1;
$offset = 15;
if ($page){
$from = ($page * $offset) - $offset;
}else{
$from = 0;
}
$sql_statement = mysql_query("select * from hrm_logbook_emp where CompanyId=".$CompanyId." order by ELogId DESC LIMIT ".$from.",".$offset, $con); 
      $Sno=1; while($resE=mysql_fetch_array($sql_statement)) { 
      $sql=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentId,Married,Gender,DR from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resE['EmployeeID'], $con); $res=mysql_fetch_assoc($sql); $Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
	
	  if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$Ename; 
      $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
?> 	
 <tr bgcolor="<?php if($Sno%2){echo '#C0FF82';} else { echo '#FFFFFF'; } ?>">
	<td align="center" style="" class="All_50"><?php echo $Sno; ?></td>
	<td align="center" style="" class="All_50"><?php echo $res['EmpCode']; ?></td>	
	<td align="" style="" class="All_200"><?php echo $NameE; ?></td>	
	<td align="" style="" class="All_200"><?php echo $resDept['DepartmentCode']; ?></td>
	<td align="center" style="" class="All_150"><?php echo date("d-M-y h:i:s",strtotime($resE['EDateTime'])); ?></td>		
 </tr>
<?php $Sno++; } } else { ?> 
   
 <tr bgcolor="#7a6189">
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Sno</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>UserId</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>Type</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Login DateTime</b></td>
 </tr>
<?php 
$sql_statement = mysql_query("select * from hrm_logbook_user where CompanyId=".$CompanyId." order by ULogId DESC", $con); 
//$num_Array = mysql_query($sql_statement);
$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page']))
$page = $_GET['page'];
else
$page = 1;
$offset = 15;
if ($page){
$from = ($page * $offset) - $offset;
}else{
$from = 0;
}
$sql_statement = mysql_query("select * from hrm_logbook_user where CompanyId=".$CompanyId." order by ULogId DESC LIMIT ".$from.",".$offset, $con); 
      $Sno=1; while($resU=mysql_fetch_array($sql_statement)) { 
      $sql=mysql_query("select * from hrm_user where AXAUESRUser_Id=".$resU['UserId'], $con); $res=mysql_fetch_array($sql); 
	  $EnameU=$res['User_MrMrsMiss'].' '.$res['User_FirstName'].' '.$res['User_SecondName'].' '.$res['User_LastName']; 
?> 	
 <tr bgcolor="<?php if($Sno%2){echo '#C0FF82';} else { echo '#FFFFFF'; } ?>">
	<td align="center" style="" class="All_50"><?php echo $Sno; ?></td>
	<td align="center" style="" class="All_50"><?php echo $resU['UserId']; ?></td>	
	<td align="" style="" class="All_200"><?php echo $EnameU; ?></td>	
	<td align="center" style="" class="All_100"><?php if($resU['UserId']==9 OR $resU['UserId']==10 OR $resU['UserId']==10){echo 'Admin';} else { if($res['User_type']=='M'){echo 'Management';} if($res['User_type']=='S'){echo 'SuperAdmin';} if($res['User_type']=='A'){echo 'Admin';} if($res['User_type']=='U'){echo 'User';} }?></td>
	<td align="center" style="" class="All_150"><?php echo date("d-M-y h:i:s",strtotime($resU['UDateTime'])); ?></td>
 </tr>
<?php $Sno++; } } ?>
   </table>
  </td>
 </tr>
 <tr>
   <td align="center" colspan="13" style="font-family:Times New Roman; font-size:15px; font-weight:bold;">
   <?PHP doPages($offset, 'UELogBook.php', '', $total_records); ?>
   </td>
 </tr>
<?php } ?>  
<?php //---------------------------------------Close Record----------------------------------------------------------------- ?>

	   </table>
     </tr>
	 <tr>
 </tr> 
</table>
		 </td> 
	   </tr>
	 </table>
   </td>
 </tr>
 		   </table>
		    </form>  		
		</td>
        <?php } ?>

		<?php //-------------------------------------------------------------------------------------------------------- ?>
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>
<?php
function check_integer($which) {
if(isset($_REQUEST[$which])){
if (intval($_REQUEST[$which])>0) {
return intval($_REQUEST[$which]);
} else {
return false;
}
}
return false;
}
function get_current_page() {
if(($var=check_integer('page'))) {
return $var;
} else {
//return 1, if it wasnt set before, page=1
return 1;
}
}
function doPages($page_size, $thepage, $query_string, $total=0) {
$index_limit = 5;
$query='';
if(strlen($query_string)>0){
$query = "&amp;".$query_string;
}
$current = get_current_page();
$total_pages=ceil($total/$page_size);
$start=max($current-intval($index_limit/2), 1);
$end=$start+$index_limit-1;
echo '<div class="paging">';
if($current==1) {
echo '<span class="prn">&lt; Previous</span>&nbsp;';
} else {
$i = $current-1;
echo '<a href="'.$thepage.'?page='.$i.$query.'&action=Login&value='.$_REQUEST['value'].'" class="prn" rel="nofollow" title="go to page '.$i.'">&lt; Previous</a>&nbsp;';
echo '<span class="prn">...</span>&nbsp;';
}
if($start > 1) {
$i = 1;
echo '<a href="'.$thepage.'?page='.$i.$query.'&action=Login&value='.$_REQUEST['value'].'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
for ($i = $start; $i <= $end && $i <= $total_pages; $i++){
if($i==$current) {
echo '<span>'.$i.'</span>&nbsp;';
} else {
echo '<a href="'.$thepage.'?page='.$i.$query.'&action=Login&value='.$_REQUEST['value'].'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
}
if($total_pages > $end){
$i = $total_pages;
echo '<a href="'.$thepage.'?page='.$i.$query.'&action=Login&value='.$_REQUEST['value'].'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
if($current < $total_pages) {
$i = $current+1;
echo '<span class="prn">...</span>&nbsp;';
echo '<a href="'.$thepage.'?page='.$i.$query.'&action=Login&value='.$_REQUEST['value'].'" class="prn" rel="nofollow" title="go to page '.$i.'">Next &gt;</a>&nbsp;';
} else {
echo '<span class="prn">Next &gt;</span>&nbsp;';
}
if ($total != 0){
//prints the total result count just below the paging
echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ee4545"<h4>(Total '.$total.' Records)</h></div>';
}
}
?>       