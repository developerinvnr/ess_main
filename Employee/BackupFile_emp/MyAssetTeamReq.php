<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}

if($_REQUEST['Action']=='RequestSt' AND $_REQUEST['RId']!='' AND $_REQUEST['EId']!='')
{
 $sqlUp=mysql_query("update hrm_asset_employee_request set HODApprovalStatus='".$_REQUEST['v']."', HODRemark='".$_REQUEST['HRmk']."', HODSubDate='".date("Y-m-d")."', ApprovalStatus=1 where AssetEmpReqId=".$_REQUEST['RId']." AND EmployeeID=".$_REQUEST['EId'], $con); 
 if($_REQUEST['v']==2){$EMsg='approved';}elseif($_REQUEST['v']==3){$EMsg='rejected';}
 
 if($sqlUp)
 {
  if($_REQUEST['v']==2 OR $_REQUEST['v']==3)
  {
   $SqlEmp = mysql_query("SELECT Fname,Sname,Lname from hrm_employee WHERE EmployeeID=".$_REQUEST['EId'], $con); $ResEmp=mysql_fetch_assoc($SqlEmp);
   $Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; 
   $email_to = 'vspl.hr@vnrseeds.com';
   $email_from='admin@vnrseeds.co.in';
   $email_subject = $Ename." asset request ".$EMsg." by HOD";
   $email_txt = $Ename." asset request ".$EMsg." by HOD";
   $headers = "From: ".$email_from."\r\n"; 
   $semi_rand = md5(time()); 
   $headers .= "MIME-Version: 1.0\r\n";
   $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $email_message .="<html><head></head><body>";
   $email_message .=$Ename." asset request ".$EMsg." by HOD, kindly details log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br><br>\n\n";
   $email_message .= "From <br><b>ADMIN ESS</b><br>";
   $email_message .="</body></html>";	      
   $ok = @mail($email_to, $email_subject, $email_message, $headers); 
   
   $sqlIT=mysql_query("select EmployeeID from hrm_asset_dept_access where DepartmentId=9", $con); $resIT=mysql_fetch_assoc($sqlIT);
   $sqlItEmp=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr,RepEmployeeID from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resIT['EmployeeID'], $con); $resItEmp=mysql_fetch_assoc($sqlItEmp); if($resItEmp['DR']=='Y'){$MMIT='Dr.';} elseif($resItEmp['Gender']=='M'){$MMIT='Mr.';} elseif($resItEmp['Gender']=='F' AND $resItEmp['Married']=='Y'){$MMIT='Mrs.';} elseif($resItEmp['Gender']=='F' AND $resItEmp['Married']=='N'){$MMIT='Miss.';} $ITEmpName=$MMIT.' '.$resItEmp['Fname'].' '.$resItEmp['Sname'].' '.$resItEmp['Lname'];
   
	 if($resItEmp['EmailId_Vnr']!='')
	 {
	  $email_to22 = $resItEmp['EmailId_Vnr'];
      $email_from22='admin@vnrseeds.co.in';
      $email_subject22 = $Ename." asset request ".$EMsg." by HOD";
      $email_txt22 = $Ename." asset request ".$EMsg." by HOD"; 
      $headers22 = "From: ".$email_from22."\r\n"; 
      $semi_rand22 = md5(time()); 
      $headers22 .= "MIME-Version: 1.0\r\n";
      $headers22 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $email_message22 .="<html><head></head><body>";
	  $email_message22 .= "Dear <b>".$ITEmpName."</b> <br><br>\n\n\n";
      $email_message22 .=$Ename." asset request ".$EMsg." by HOD, kindly details & your approval next level, log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br><br>\n\n";
	  $email_message22 .= "From <br><b>ADMIN ESS</b><br>";
      $email_message22 .="</body></html>";	      
	  $ok2 = @mail($email_to22, $email_subject22, $email_message22, $headers22);
	 } 
   
  }
  echo '<script>alert("request status updated successfully")</script>';
 }
}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>

<style>.font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function FunClickAssetReq(Aeri,ID)
{ window.open("MyAssetEmpAnyFieldReq.php?CheckAct=ExtraReqField&ID="+ID+"&Aeri="+Aeri,"AForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=600,height=400"); }

function FunClickHistoryReq(ID)
{ window.open("MyAssetEmpCHistoryReq.php?CheckAct=ExtraReqField&ID="+ID,"AForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=800,height=400"); }

function ChangeStatus(v,RId,EId,empid,i)
{ 
  var HodRemark=document.getElementById("HodRemark"+i).value; var FHodRemark=HodRemark.replace(/[^a-zA-Z 0-9.,]+/g,''); 
  if(v==1)
  { var agree=confirm("Are you sure you want to pending this request status?"); 
    if(agree){ var x="MyAssetTeamReq.php?act=true&mm=sas&mm=er4e&wew=e%e@er%rdd=012&Action=RequestSt&v="+v+"&RId="+RId+"&EId="+EId+"&HRmk="+FHodRemark; window.location=x; }
  }
  if(v==2)
  { 
    if(HodRemark.length===0){ alert("Please enter HOD comment field.."); document.getElementById("ActionReply"+i).value=0; return false; }	
    var agree=confirm("Are you sure you want to approved this request status?"); 
    if(agree){ var x="MyAssetTeamReq.php?act=true&mm=sas&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&Action=RequestSt&v="+v+"&RId="+RId+"&EId="+EId+"&HRmk="+FHodRemark; window.location=x; }
  }
  if(v==3)
  { 
    if(HodRemark.length===0){ alert("Please enter HOD comment field.."); document.getElementById("ActionReply"+i).value=0; return false; }
    var agree=confirm("Are you sure you want to reject this request status?"); 
    if(agree){ var x="MyAssetTeamReq.php?act=true&ask=false&rigt=checkessue&mailto=promt&Action=RequestSt&v="+v+"&RId="+RId+"&EId="+EId+"&HRmk="+FHodRemark; window.location=x; }
  }
  if(v==4)
  { 
    //if(HodRemark.length===0){ alert("Please enter HOD comment field.."); document.getElementById("ActionReply"+i).value=0; return false; }
	var pg=document.getElementById("pagev").value; 
    var agree=confirm("Are you sure you want to delegate this request status?"); 
    if(agree)
	{ var win=window.open("MyAssetRequestFwdFile.php?Action=RequestStFwd&v="+v+"&RId="+RId+"&EId="+EId+"&empid="+empid, "af", "menubar=no,resizable=no,directories=no,width=550,height=300"); 
      var timer=setInterval(function(){ if(win.closed){ clearInterval(timer); window.location="MyAssetTeamReq.php?act=true&mm=sas&ask=false&ww=rightProtect&page="+pg;}},1000); 
	}
  }	   
}



</script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table style="margin-top:0px;">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top">
	     <table border="0" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //*************************************************************************************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top">
				    <table border="0">
						  <tr height="20">
						    <td align="left" valign="top">
<?php /* include("EmpImgEmp.php"); */ ?>
<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>
						  </tr>
					 </table>
				 </td>
				  <td align="left" valign="top">
	     <table border="0">
		    <tr>
			 <td colspan="10"><table border="0"><tr>
			 <td>&nbsp;</td>
			 <td width="800" class="TableHead">
			   <font color="#106809" style='font-family:Times New Roman;' size="4"><i><b>My Team Asset Request </b></i></font>
			   &nbsp;&nbsp;&nbsp;&nbsp;
			   <font color="#FB0000" style='font-family:Times New Roman;' size="4"><i><b><?php echo $msg; ?></b></i></font>
			 </td>
			 </tr></table></td>
			</tr>
			<tr>
			 <td>
<?php $sqlHod=mysql_query("select * from hrm_employee_reporting where HodId=".$EmployeeId, $con); $rowHod=mysql_num_rows($sqlHod); ?>			 
			   <table border="1">
	  <tr bgcolor="#7a6189" style="height:22px;">
  <td rowspan="2" style="width:40px;color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>SNo.</b></td>
  <td rowspan="2" style="width:50px;color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>EC</b></td>
  <td rowspan="2" style="width:200px;color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>Name</b></td>
  <td rowspan="2" style="width:80px;color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>Contact No</b></td>
  <td rowspan="2" style="width:150px;color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>Name Of Asset</b></td>
  <td colspan="3" style="color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>Amount</b></td>
  <td colspan="3" style="width:80px;color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>Request</b></td>
  <td rowspan="2" colspan="2" style="color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>Copy</b></td>
  <td rowspan="2" style="width:100px;color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>Status</b></td>
<?php if($rowHod>0){ ?>
  <td rowspan="2" style="width:200px;color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>HOD Comment</b></td>
  <td rowspan="2" style="color:#ffffff;font-family:Times New Roman;font-size:12px;width:90px;" align="center"><b>Action</b></td>
<?php } ?>
	  </tr>		   
	  <tr bgcolor="#7a6189" style="height:22px;">
  <td style="width:60px;color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>Balance</b></td>
  <td style="width:60px;color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>Request</b></td>
 <td style="width:60px;color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>Approval</b></td>
  <td style="width:80px;color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>Date</b></td>
  <td style="width:60px;color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>History</b></td>
  <td style="width:60px;color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>Details</b></td>
	  </tr>
<?php $sql_statement = mysql_query("select * from hrm_asset_employee_request where (ReportingId=".$EmployeeId." OR HodId=".$EmployeeId.") AND Status=1 order by ReqDate DESC", $con);
$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page'])) $page = $_GET['page']; else $page = 1;  
$offset = 10; 
if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0;}
$sql_statement = mysql_query("select * from hrm_asset_employee_request where (ReportingId=".$EmployeeId." OR HodId=".$EmployeeId.") AND Status=1 order by ReqDate DESC LIMIT " . $from . "," . $offset, $con);
$rowCheck=mysql_num_rows($sql_statement); if($rowCheck>0){ 
if($_REQUEST['page']==1){$sno=1;} elseif($_REQUEST['page']==2){$sno=11;} elseif($_REQUEST['page']==3){$sno=21;}
elseif($_REQUEST['page']==4){$sno=31;} elseif($_REQUEST['page']==5){$sno=41;} elseif($_REQUEST['page']==6){$sno=51;} 
elseif($_REQUEST['page']==7){$sno=61;} elseif($_REQUEST['page']==8){$sno=71;} elseif($_REQUEST['page']==9){$sno=81;} 
elseif($_REQUEST['page']==10){$sno=91;} else{$sno=1;} while($res=mysql_fetch_array($sql_statement)){	  
$SqlEmp = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DepartmentId,MobileNo_Vnr,MobileNo from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$res['EmployeeID'], $con); $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
$sDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResEmp['DepartmentId'], $con); $rDept=mysql_fetch_assoc($sDept); ?>								  					
<tr bgcolor="#FFFFFF">
<td align="center" style="font-size:12px; font-family:Times New Roman;"><?php echo $sno; ?></td>
<td style="font-size:12px;font-family:Times New Roman;" align="center"><?php if($res['AssetNId']!=''){ echo $EC; } else {echo '';} ?></td>
<td style="font-size:12px;font-family:Times New Roman;">&nbsp;<?php if($res['AssetNId']!=''){ echo $Ename; } else {echo '';} ?></td>
<td style="font-size:12px;font-family:Times New Roman;" align="center"><?php if($ResEmp['MobileNo_Vnr']>0){echo $ResEmp['MobileNo_Vnr'];}else{echo $ResEmp['MobileNo'];} ?></td>
<td style="font-size:12px; font-family:Times New Roman;">&nbsp;<?php if($res['AssetNId']!=''){ $sqlAn=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$res['AssetNId']); $resAn=mysql_fetch_array($sqlAn); echo $resAn['AssetName']; } else {echo '';} ?></td>

<td align="right" style="font-size:12px; font-family:Times New Roman;"><?php echo intval($res['MaxLimitAmt']); ?>&nbsp;</td>
<td align="right" style="font-size:12px; font-family:Times New Roman;"><?php echo intval($res['ReqAmt']); ?>&nbsp;</td>
<td align="right" style="font-size:12px; font-family:Times New Roman;"><?php echo intval($res['ApprovalAmt']); ?>&nbsp;</td>
<td align="center" style="font-size:12px;font-family:Times New Roman;"><?php if($res['ReqDate']=='0000-00-00' OR $res['ReqDate']=='1970-01-01'){echo '';} else {echo date("d My",strtotime($res['ReqDate']));} ?></td>
<td style="font-size:12px;font-family:Times New Roman;" align="center"><a href="#" onClick="FunClickHistoryReq(<?php echo $res['EmployeeID']; ?>)">Click</a></td>
<td style="font-size:12px;font-family:Times New Roman;" align="center"><a href="#" onClick="FunClickAssetReq(<?php echo $res['AssetEmpReqId'].','.$res['EmployeeID']; ?>)">Click</a></td>


  
  <td style="font-family:Times New Roman;font-size:13px;width:60px;" align="center"><?php if($res['ReqBillImgExtName']!=''){ ?><a href="#" onClick="javascript:window.open('MyAssetCopy.php?Img=Bill&value=<?php echo $res['ReqBillImgExtName']; ?>','ImgF','width=600,height=500')">Bill</a><?php } ?></td>
  <td style="font-family:Times New Roman;font-size:13px;width:60px;" align="center"><?php if($res['ReqAssestImgExtName']!=''){ ?><a href="#" onClick="javascript:window.open('MyAssetCopy.php?Img=Asset&value=<?php echo $res['ReqAssestImgExtName']; ?>','ImgF','width=600,height=500')">Asset</a><?php } ?></td>
  
<td align="center" style="font-size:12px; font-family:Times New Roman;color:<?php if($res['HODApprovalStatus']==1){echo '#FF8C1A';}elseif($res['HODApprovalStatus']==2 OR $res['HODApprovalStatus']==4){echo '#008200';}elseif($res['HODApprovalStatus']==3){echo '#FF0000';} ?>;"><?php if($res['HODApprovalStatus']==0){echo 'Draft';}elseif($res['HODApprovalStatus']==1){echo 'Pending';}elseif($res['HODApprovalStatus']==2){echo 'Approved';}elseif($res['HODApprovalStatus']==3){echo 'Rejected';}elseif($res['HODApprovalStatus']==4){ ?><a href="#" onClick="javascript:window.open('MyAssetRequestFwdDtails.php?Action=RequestStFwd&RId=<?php echo $res['AssetEmpReqId']; ?>&EId=<?php echo $res['EmployeeID']; ?>&empid=<?php echo $EmployeeId?>','ImgF','width=500,height=300')">Delegate</a><?php } ?></td>

<?php if($rowHod>0){ ?>

  <td align="center">
   <input style="font-size:12px;font-family:Times New Roman;width:200px;" name="HodRemark<?php echo $sno; ?>" id="HodRemark<?php echo $sno; ?>" value="<?php echo $res['HODRemark']; ?>" maxlength="200" />
  </td>
		   <td width="100" class="TableHead1" align="center" style="font-size:12px;font-family:Times New Roman;"> 
<?php //echo $res['AssetEmpReqId']; 
if($res['HodId']==$EmployeeId){ ?>		   
<?php if($res['HODApprovalStatus']!=2 AND $res['HODApprovalStatus']!=3 AND $res['HODApprovalStatus']!=4){ ?>		   
<select name="ActionReply<?php echo $sno; ?>" id="ActionReply<?php echo $sno; ?>" style="font-family:Times New Roman;height:20px;width:90px;color:#000000;font-size:13px;" onChange="ChangeStatus(this.value,<?php echo $res['AssetEmpReqId'].','.$res['EmployeeID'].','.$EmployeeId.','.$sno; ?>)">
<option value="0">Select</option><?php if($res['HODApprovalStatus']!=1){ ?><option value="1" style="background-color:#FFFFFF;">PENDING</option><?php } ?>
<option value="2" style="background-color:#FFFFFF;">APPROVAL</option> 
<option value="3" style="background-color:#FFFFFF;">REJECT</option>
<?php if($res['ReqAmt']<=$res['MaxLimitAmt']){ ?><option value="4" style="background-color:#FFFFFF;">DELEGATE</option><?php } ?>   
</select><?php } } ?>
</td>
<?php } ?>
		  </tr>  
<?php $sno++; } } ?>					   
	
              </table>
			 </td>
			</tr>
<tr>
<td align="center" style="font-family:Times New Roman; font-size:15px; font-weight:bold; ">
<input type="hidden" id="pagev" value="<?php echo $_REQUEST['page']; ?>" />
<?PHP doPages($offset, 'MyAssetTeamReq.php', '', $total_records); ?>
</td>
</tr>			
		 </table>
	           </td>
    </tr>
</table>

			
<?php //*************************************************************************************************************************************************** ?>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;">
		    <tr><td align="center" valign="top" width="100">&nbsp;</td></tr>
	        </table>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;"><tr><td align="center" valign="top">&nbsp;&nbsp;</td></tr></table>
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>
	
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
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
$index_limit = 4;
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
echo '<a href="'.$thepage.'?page='.$i.$query.'" class="prn" rel="nofollow" title="go to page '.$i.'">&lt; Previous</a>&nbsp;';
echo '<span class="prn">...</span>&nbsp;';
}
if($start > 1) {
$i = 1;
echo '<a href="'.$thepage.'?page='.$i.$query.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
for ($i = $start; $i <= $end && $i <= $total_pages; $i++){
if($i==$current) {
echo '<span>'.$i.'</span>&nbsp;';
} else {
echo '<a href="'.$thepage.'?page='.$i.$query.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
}
if($total_pages > $end){
$i = $total_pages;
echo '<a href="'.$thepage.'?page='.$i.$query.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
if($current < $total_pages) {
$i = $current+1;
echo '<span class="prn">...</span>&nbsp;';
echo '<a href="'.$thepage.'?page='.$i.$query.'" class="prn" rel="nofollow" title="go to page '.$i.'">Next &gt;</a>&nbsp;';
} else {
echo '<span class="prn">Next &gt;</span>&nbsp;';
}
if ($total != 0){
//prints the total result count just below the paging
echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ee4545"<h4>(Total '.$total.' Records)</h4></font></div>';
}
}
?>
