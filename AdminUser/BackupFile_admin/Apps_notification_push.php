<?php require_once('config/config.php');

if(isset($_POST['NotiMsgSend']))
{
 
$serverKey = "AAAAM2Omfpk:APA91bF7xuwVbmJKmyObP4VbBL0QKyAB1XtoOZBdUzj4Yc8BwH5tyEmVvtlzOs8PWi6lYstd5BViG8NhHAXtH4uTtNOD2KCO6katfNXbuDd2B2eFtPxGWtSwcLuzHahiZA-H7LpSCFi4";

$id = $_POST['noti_id'];
$title = $_POST['noti_title'];
$body = $_POST['noti_msg'];
$url = "https://fcm.googleapis.com/fcm/send";
//$link = 'https://github.com/kreait/firebase-php';
$notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1', 'click_action' => 'DashBoardActivity','page' => 'VNR_IMPACT');
if($id == 1)
{
    $data = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1', 'click_action' => 'DashBoardActivity','page' => 'VNR_IMPACT','path'=>'');
} else {
    $data = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1', 'click_action' => 'DashBoardActivity','page' => 'VNR_IMPACT','path'=>'https://vnrseeds.co.in/hrims/Feedback/');
}


 $sEmp=mysql_query("select tokenid from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where g.DepartmentId=9 AND e.EmpStatus='A' AND (e.EmployeeID=169 OR e.EmployeeID=1305)",$con);  
 while($rEmp=mysql_fetch_assoc($sEmp))
 { 
  $to = $rEmp['tokenid'];
  if($to!='')
  {
      
   $arrayToSend = array('to' => $to, 'notification' => $notification, 'priority'=>'high', 'data' =>$data,'content_available' => true);
   $json = json_encode($arrayToSend);
   $headers = array();
   $headers[] = 'Content-Type: application/json';
   $headers[] = 'Authorization: key='.$serverKey;
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
   curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
   curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
   $response = curl_exec($ch);
   if($response === FALSE){ die('FCM Send Error: ' . curl_error($ch)); }
   curl_close($ch);
  }
 } //while
 
 echo '<script>alert("Notification Sent Successfully"); window.close(); </script>';
 
}


?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.th{font-family:Times New Roman;font-size:18px;font-weight:bold;text-align:center;color:#FFFFFF; background-color:#376A9D;height:26px;} 
.thh{font-family:Times New Roman;font-size:18px;font-weight:bold;height:25px;} 
.tdd{font-family:Times New Roman;font-size:18px;height:25px; color:#0066CC;} 
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
</head>

<body class="body">
<?php if($_REQUEST['act']=='SentNoti' && $_REQUEST['id']>0){ ?>
<table class="table" style="width:100%;">
<tr><td style="height:40px;">&nbsp;</td></tr>
<tr>
 <td>
  <table style="width:100%; font-size:18px;">
   <tr>
    <td style="width:10%;">&nbsp;</td>
    <td class="th" style="width:80%;">Send Notification to Apps User</td>
	<td style="width:10%;">&nbsp;</td>
   </tr>
  </table>
 </td>
</tr>
<tr><td>&nbsp;</td></tr>
<?php $sql=mysql_query("select * from hrm_api_notification_push where Nid=".$_REQUEST['id'], $con);
	  $res=mysql_fetch_assoc($sql); ?>
<tr>
 <td>
  <table style="width:100%;background-color:#FFFFFF;" cellpadding="5" border="1" cellspacing="1">
   <tr><td class="thh" style="width:100px;">Title :</td><td class="tdd"><?=$res['Noti_Title']?></td></tr>
   <tr><td class="thh">Message :</td><td class="tdd"><?=$res['Noti_Msg']?></td></tr>
  </table>
 </td>
</tr>
<tr><td>&nbsp;</td></tr>

<div style="position:absolute;top:300px;left:200px;">
<span id="wait_tip" style="display:none;"><img src="images/loader.gif" id="loading_img"/> Please wait...</span>
</div>

<tr>
 <td>
  <table style="width:100%;">
   <tr>
    <td class="thh" style="width:100px;text-align:center;">
<script type="text/javascript">
function PostConfirm(FrmName)
{
 var agree = confirm("Are you Sure?");
 if(agree){ getId("wait_tip").style.display=""; return true; }
 else { return false; }
}

function getId(id)
{ return document.getElementById(id); }
</script> 	
<form name="FrmName" method="post" onsubmit="PostConfirm(this)">	
 <input type="hidden" name="noti_title" value="<?=$res['Noti_Title']?>" />
 <input type="hidden" name="noti_msg" value="<?=$res['Noti_Msg']?>" />
 <input type="hidden" name="noti_id" value="<?=$_REQUEST['id']?>" />
 
 <input type="submit" name="NotiMsgSend" value="Send" style="width:100px;" />
</form>
	</td>
   </tr>
  </table>
 </td>
</tr>

</table>

<?php } ?>
</body>
</html>
