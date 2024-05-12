<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
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
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.th{ color:#FFFFFF;font-family:Times New Roman;font-size:12px;text-align:center; font-weight:bold; }
.td{ color:#000000;font-family:Times New Roman;font-size:12px; }
.tdc{ color:#000000;font-family:Times New Roman;font-size:12px;text-align:center; }
.tdr{ color:#000000;font-family:Times New Roman;font-size:12px;text-align:right; }
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function FunClickAssetReq(Aeri,ID)
{ window.open("MyAssetEmpAnyFieldReqAc.php?CheckAct=ExtraReqField&ID="+ID+"&Aeri="+Aeri,"AForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=600,height=500"); }

function FunClickHistoryReq(ID)
{ window.open("MyAssetEmpCHistoryitReq.php?CheckAct=ExtraReqField&ID="+ID,"AForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=500"); }


</script>
</head>
<body class="body">
<table class="table" style="width:100%;">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td style="width:100%;">
  <table style="margin-top:0px;width:100%;">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" style="width:100%;">
	     <table border="0" cellpadding="0" style="width:100%;">
		  <tr>
		   <td valign="top" style="width:100%;"> 
		   
<?php //************************************************************************************ ?>
<?php //if($_REQUEST['chk']==$EmployeeId) { ?> 	   
		     <table border="0" id="Activity" style="width:100%;">
			  <tr>
				  <td align="left" valign="top" style="width:100%;">
	     <table border="0" style="width:100%;">
		    <tr>
			 <td colspan="10"><table border="0"><tr>
			 <td class="TableHead"><font color="#106809" style='font-family:Times New Roman;' size="4"><i><b>Approved-Rejected Asset Request</b></i></font>&nbsp;&nbsp;&nbsp;&nbsp;
<script type="text/javascript">
function FunSearch(v)
{ 
 if(v=='S'){ var n=document.getElementById("vname").value; var c=document.getElementById("vcode").value; window.location="MyAssetNextacLevelAct.php?MyAssetNextacLevelAct.php?act=true&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&chk=352&chk2=109&try=S&nm="+n+"&cd="+c; }
 else{ window.location="MyAssetNextacLevelAct.php?MyAssetNextacLevelAct.php?act=true&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&chk=352&chk2=109"; }
}</script>
			   <input type="text" id="vname" placeholder="Type Name" class="td" style="width:200px; height:24px;" />
			   <input type="text" id="vcode" placeholder="Type Code" class="td" style="width:100px; height:24px;" />
			   <input type="button" value="Search" style="width:80px;height:26px;" onClick="FunSearch('S')"/>
			   <input type="button" value="Clear" style="width:80px;height:26px;" onClick="FunSearch('C')" />
			 </td>
			 </tr></table></td>
			</tr>
			<tr>
			 <td style="width:100%;">			 
			   
<table border="1" cellspacing="0" style="width:100%;">
 <tr bgcolor="#7a6189" style="height:22px;">
  <td rowspan="2" style="width:3%;" class="th">Sn</td>
  <td rowspan="2" style="width:3%;" class="th">EC</td>
  <td rowspan="2" style="width:15%;" class="th">Name</td>
  <!--<td rowspan="2" style="width:6%;" class="th">Contact</td>-->
  <td rowspan="2" style="width:8%;" class="th">Name Of Asset</td>
  <td colspan="3" class="th">Amount</td>
  <td colspan="2" class="th">Request</td>
  <td rowspan="2" style="width:3%;" class="th">His</td>
  <td rowspan="2" colspan="2" style="width:6%;" class="th">Copy</td>
  <td rowspan="2" style="width:6%;" class="th">First<br>Level</td>
  <td rowspan="2" style="width:6%;" class="th">IT</td>
  <td rowspan="2" style="width:6%;" class="th">A/C</td>
  <td rowspan="2" style="width:4%;" class="th">Paid<br>Amount</td>
  <td rowspan="2" style="width:5%;" class="th">Paid<br>Date</td>
  <td rowspan="2" style="width:15%;" class="th">Comment</td>
 </tr>		   
 <tr bgcolor="#7a6189" style="height:22px;">
  <td style="width:3%;" class="th">Bal</td>
  <td style="width:3%;" class="th">Req</td>
  <td style="width:3%;" class="th">App</td>
  <td style="width:5%;" class="th">Date</td>
  <td style="width:3%;" class="th">Detail</td>
 </tr>
<?php if($_REQUEST['try']=='S')
{ 
 if($_REQUEST['nm']!=''){ $sql_statement = mysql_query("select r.* from hrm_asset_employee_request r inner join hrm_employee e on r.EmployeeID=e.EmployeeID where (e.Fname like '%".$_REQUEST['nm']."%' OR e.Sname like '%".$_REQUEST['nm']."%' OR e.Lname like '%".$_REQUEST['nm']."%') AND ITApprovalStatus=2 AND (AccPayStatus=2 OR AccPayStatus=3) order by ReqDate DESC", $con); }elseif($_REQUEST['cd']>0){ $sql_statement = mysql_query("select r.* from hrm_asset_employee_request r inner join hrm_employee e on r.EmployeeID=e.EmployeeID where e.EmpCode=".$_REQUEST['cd']." AND ITApprovalStatus=2 AND (AccPayStatus=2 OR AccPayStatus=3) order by ReqDate DESC", $con); }
}
else{ $sql_statement = mysql_query("select * from hrm_asset_employee_request where ITApprovalStatus=2 AND (AccPayStatus=2 OR AccPayStatus=3) order by ReqDate DESC", $con); }
 
$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page'])) $page = $_GET['page']; else $page = 1;  
$offset = 20; 
if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0;}
if($_REQUEST['try']=='S')
{ 
 if($_REQUEST['nm']!=''){ $sql_statement = mysql_query("select r.* from hrm_asset_employee_request r inner join hrm_employee e on r.EmployeeID=e.EmployeeID where (e.Fname like '%".$_REQUEST['nm']."%' OR e.Sname like '%".$_REQUEST['nm']."%' OR e.Lname like '%".$_REQUEST['nm']."%') AND ITApprovalStatus=2 AND (AccPayStatus=2 OR AccPayStatus=3) order by ReqDate DESC LIMIT " . $from . "," . $offset, $con); }elseif($_REQUEST['cd']>0){ $sql_statement = mysql_query("select r.* from hrm_asset_employee_request r inner join hrm_employee e on r.EmployeeID=e.EmployeeID where e.EmpCode=".$_REQUEST['cd']." AND ITApprovalStatus=2 AND (AccPayStatus=2 OR AccPayStatus=3) order by ReqDate DESC LIMIT " . $from . "," . $offset, $con); } 
}
else{ $sql_statement = mysql_query("select * from hrm_asset_employee_request where ITApprovalStatus=2 AND (AccPayStatus=2 OR AccPayStatus=3) order by ReqDate DESC LIMIT " . $from . "," . $offset, $con); }
 
$rowCheck=mysql_num_rows($sql_statement); 
if($rowCheck>0)
{ 
if($_REQUEST['page']==1){$sno=1;}else{$sno=(20*($_REQUEST['page']-1))+1;} 

while($res=mysql_fetch_array($sql_statement)){	  
$SqlEmp = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DepartmentId,MobileNo_Vnr,MobileNo from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID WHERE e.EmployeeID=".$res['EmployeeID'], $con); $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
$sDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResEmp['DepartmentId'], $con); $rDept=mysql_fetch_assoc($sDept); ?>								  					
<tr bgcolor="#FFFFFF">
 <td class="tdc"><?php echo $sno; ?></td>
 <td class="tdc"><?php if($res['AssetNId']!=''){ echo $EC; } else {echo '';} ?></td>
 <td class="td">&nbsp;<?php if($res['AssetNId']!=''){ echo $Ename; } else {echo '';} ?></td>
 <?php /*?><td class="tdc"><?php if($ResEmp['MobileNo_Vnr']>0){echo $ResEmp['MobileNo_Vnr'];}else{echo $ResEmp['MobileNo'];} ?></td><?php */?>
 <td class="td">&nbsp;<?php if($res['AssetNId']!=''){ $sqlAn=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$res['AssetNId']); $resAn=mysql_fetch_array($sqlAn); echo $resAn['AssetName']; } else {echo '';} ?></td>

 <td class="tdr"><?php echo intval($res['MaxLimitAmt']); ?>&nbsp;</td>
 <td class="tdr"><?php echo intval($res['ReqAmt']); ?>&nbsp;</td>
 <td class="tdr"><?php echo intval($res['ApprovalAmt']); ?>&nbsp;</td>
 <td class="tdc"><?php if($res['ReqDate']=='0000-00-00' OR $res['ReqDate']=='1970-01-01'){echo '';} else {echo date("d My",strtotime($res['ReqDate']));} ?></td>
 <td class="tdc"><a href="#" onClick="FunClickAssetReq(<?php echo $res['AssetEmpReqId'].','.$res['EmployeeID']; ?>)">Click</a></td>
 <td class="tdc"><a href="#" onClick="FunClickHistoryReq(<?php echo $res['EmployeeID']; ?>)">Click</a></td>
 <td class="tdc"><?php if($res['ReqBillImgExtName']!=''){ ?><a href="#" onClick="javascript:window.open('MyAssetCopy.php?Img=Bill&value=<?php echo $res['ReqBillImgExtName']; ?>','ImgF','width=600,height=500')">Bill</a><?php } ?></td>
 <td class="tdc"><?php if($res['ReqAssestImgExtName']!=''){ ?><a href="#" onClick="javascript:window.open('MyAssetCopy.php?Img=Asset&value=<?php echo $res['ReqAssestImgExtName']; ?>','ImgF','width=600,height=500')">Asset</a><?php } ?></td>
 
 <td class="tdc" style="color:<?php if($res['HODApprovalStatus']==1){echo '#FF8C1A';}elseif($res['HODApprovalStatus']==2){echo '#008200';}elseif($res['HODApprovalStatus']==3){echo '#FF0000';} ?>;"><?php if($res['HODApprovalStatus']==0){echo 'Draft';}elseif($res['HODApprovalStatus']==1){echo 'Pend';}elseif($res['HODApprovalStatus']==2){echo 'App';}elseif($res['HODApprovalStatus']==3){echo 'Rej';} if($res['HODSubDate']!='1970-01-01' && $res['HODSubDate']!='0000-00-00'){echo '&nbsp;<font color="#006FDD">'.date("d-My",strtotime($res['HODSubDate'])).'</font>'; } ?></td>
 
 <td class="tdc" style="color:<?php if($res['ITApprovalStatus']==1){echo '#FF8C1A';}elseif($res['ITApprovalStatus']==2){echo '#008200';}elseif($res['ITApprovalStatus']==3){echo '#FF0000';} ?>;"><?php if($res['ITApprovalStatus']==0){echo 'Draft';}elseif($res['ITApprovalStatus']==1){echo 'Pend';}elseif($res['ITApprovalStatus']==2){echo 'App';}elseif($res['ITApprovalStatus']==3){echo 'Rej';} if($res['ITSubDate']!='1970-01-01' && $res['ITSubDate']!='0000-00-00'){echo '&nbsp;<font color="#006FDD">'.date("d-My",strtotime($res['ITSubDate'])).'</font>'; } ?></td>
 
 <td class="tdc" style="color:<?php if($res['AccPayStatus']==1){echo '#FF8C1A';}elseif($res['AccPayStatus']==2){echo '#008200';}elseif($res['AccPayStatus']==3){echo '#FF0000';} ?>;"><?php if($res['AccPayStatus']==0){echo 'Draft';}elseif($res['AccPayStatus']==1){echo 'Pend';}elseif($res['AccPayStatus']==2){echo 'Paid';}elseif($res['AccPayStatus']==3){echo 'Rej';} if($res['AccPayDate']!='1970-01-01' && $res['AccPayDate']!='0000-00-00'){echo '&nbsp;<font color="#006FDD">'.date("d-My",strtotime($res['AccPayDate'])).'</font>'; } ?></td>
 
 <td class="tdr"><?php echo floatval($res['AccPayAmt']); ?>&nbsp;</td>
 <td class="tdc" style="color:#006FDD;"><?php if($res['AccPayDate']!='1970-01-01' AND $res['AccPayDate']!='0000-00-00'){ echo date("d My",strtotime($res['AccPayDate']));} ?></td>
 <td class="td"><?php echo $res['AccRemark']; ?></td>
</tr>  
<?php $sno++; } } ?>					   
	
              </table>
			 </td>
			</tr>
<tr>
<td align="center" style="font-family:Times New Roman; font-size:15px; font-weight:bold; ">
<input type="hidden" id="pagev" value="<?php echo $_REQUEST['page']; ?>" />
<?PHP doPages($offset, 'MyAssetNextacLevelAct.php', '', $total_records); ?>
</td>
</tr>			
		 </table>
	           </td>
    </tr>
</table>

<?php //} ?>			
<?php //**************************************************************************** ?>
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
