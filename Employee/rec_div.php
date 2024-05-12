<?php  if(($EmployeeId==169 || $EmployeeId==759 || $EmployeeId==142 || $EmployeeId==182 || $EmployeeId==1084) && $CompanyId==1){ ?>
  
<?php /*********************************** Open Recruitment Section ******************************/ ?>
<?php /*********************************** Open Recruitment Section ******************************/ ?>

<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<?php 
$json = file_get_contents('https://recruitment.vnress.in/API_jobPosted.php');
$data = json_decode($json);

?>

<tr>    
 <td valign="top" align="center" style="width:100%; padding-left:7px;padding-right:7px; padding-top:0px; padding-bottom:3px;">
   <table border="0" style="background-color:#D7CCE3;width:100%;" align="center">
	 <tr>
	   <td style='font-family:Times New Roman;font-size:16px;color:#00509F;width:100%;font-weight:bold;'>
	    <table border="1" style="width:100%; background-image:url(../AdminUser/images/AnnBoard.png);" cellpadding="1" cellspacing="1">

  <thead>
  <tr>
  <th colspan="3">Vacancies <img src="images/new_blink.gif" border="0"></th>
  <th rowspan="2" style="width:15%;">For Details<br>Apply_or_Refer</th>
  </tr>
  <tr>
    <th style="width:5%;">Sn</th>
    <th style="width:30%;">Job Code </th>
    <th style="width:50%;">Vacancy</th>
  </tr>
  </thead>
  <tbody>
  <?php
  $i=1;
  foreach($data->jobposted as $key =>$value){
  ?>
  <tr>
    <td style="width: 20px !important; text-align:center;"><?=$i?></td>
    <td style=" font-size:14px; vertical-align:middle; padding:4px;"><?=$value->JobCode?></td> 
    <td style=" font-size:14px; vertical-align:middle;padding:4px;"><?=$value->Title?></td>
    <td style="text-align:center;"><a href="javascript:void(0);" onClick="jobApply('<?=$value->JPId?>')">Click here</a></td> 
  </tr>
  <?php
  $i++;
  }
  ?>  
  
  <tr>
    <td colspan="4" style=" text-align:center; border-top:hidden; vertical-align:middle; height:50px;">
	 <form id="jaform" method="POST" action="https://recruitment.vnress.in/jobApply.php" target="_blank">
	<input type="hidden" name="jid" id="jid" value="">
	<input type="hidden" name="eid" id="eid" value="<?=$EC?>"> 
   <!----- here input name="eid" value will be the Employee Code of person applying, just for example I have given value "123" ------------->
   </form>
   
    <b style="font-size:16px;">With Out Vacancy :</b> &nbsp;&nbsp;&nbsp; 
   <a href="javascript:void(0);" onClick="referCand()" class="btn btn-sm btn-primary">To Refer Candidate Click</a>
  <form id="referform" method="POST" action="https://recruitment.vnress.in/referCandidate.php" target="_blank">
	<input type="hidden" name="eid" id="eid" value="<?=$EC?>">
	<!----- here input name="eid" value will be the Employee Code of person applying, just for example I have given value "123" ------------->
   </form>
<script type="text/javascript">
	function jobApply(id){
		$('#jid').val(id);
		$('#jaform').submit();
	}
	function referCand(id){
		$('#referform').submit();		
	}
</script>   
   
  
	</td> 
  </tr>
  
  </tbody>
</table>



      </td>
	 </tr>
   </table>
 </td>
</tr>   

<?php /*********************************** Close Recruitment Section ******************************/ ?>
<?php /*********************************** Close Recruitment Section ******************************/ ?> 
   
<?php } ?>