<?php include('config.php'); 
$query = "SELECT * FROM `hrm_employee` WHERE EmployeeID = ".$_GET['id'];  
  $q_res = mysql_query($query);
  
  $result = mysql_fetch_array($q_res);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>VNR Impact Feedback</title>
  </head>
  <body>
<div class="container">

  <div class="brand-logo">
    <img src="vnr.png" alt="" style="border-radius: 50%;width:100px;height:100px;">
  </div>
  <div class="brand-title">IMPACT</div>
  <div id="show_form">
  <p>Feedback</p>
  <p>Moving forward in the quest to connect you digitally, allow us to introduce VNR Impact Feedback - way to connect readers with the editors. We will share this form on every release so to know your experience of the magazine. It will help us to improve and present contents closer to your likings. Please spare a few minutes to fill this quick form. Rate us between 1 to 5 on the given sentences, with 1 being Poor to 5 being Excellent.</p>
    <form id = "form_reviews" class="impact_review" action="" method="POST">

  <div class="inputs">
    <label>NAME</label>
    <input id = "p_name" name = "r_name" type="text" placeholder="Full Name" value="<?php echo $result['Fname'].' '.$result['Sname'].' '.$result['Lname']; ?>" />
    <label>CODE</label>
    <input type="hidden" name="e_id" id="e_id" value="<?php echo $result['EmployeeID']; ?>" />
    <input id = "p_code" name = "r_ecode" type="text" placeholder="Employee Code" value ="<?php echo $result['EmpCode']; ?>" />
    <label>Stay Anonymous</label>
    <input id = "anonymous" type="checkbox" name ="anony" value="1" style="width:50px;" />
    <br />
    <hr>
    <div id = "q1">
    <label>1. The Magazine covers relevant VNR's activites across country.</label>
    <?php for($i = 0; $i < 5; $i++) {?>
      <i class="fa fa-star-o q1 <?php echo $i; ?>" style="font-size:24px;color:grey;fill:yellow;"></i>
    <?php } ?>
    </div>
    <hr>
    <div id = "q2">
    <label>2. It presents an opportunity to showcase our talent.</label>
    <?php for($i = 0; $i < 5; $i++) {?>
      <i class="fa fa-star-o q2 <?php echo $i; ?>" style="font-size:24px;color:grey;fill:yellow;"></i>
    <?php } ?>
    </div>
    <hr>
    <div id = "q3">
    <label>3. You find this magazine informative.</label>
    <?php for($i = 0; $i < 5; $i++) {?>
      <i class="fa fa-star-o q3 <?php echo $i; ?>" style="font-size:24px;color:grey;fill:yellow;"></i>
    <?php } ?>
    </div>
    <hr>
    <div id = "q4">
    <label>4. It is easy to understand the contents of this magazine.</label>
    <?php for($i = 0; $i < 5; $i++) {?>
      <i class="fa fa-star-o q4 <?php echo $i; ?>" style="font-size:24px;color:grey;fill:yellow;"></i>
    <?php } ?>
    </div>
    <hr>
    <div id = "q5">
    <label>5. It is easy to submit entries or participate in events and contests announced in the magazine.</label>
    <?php for($i = 0; $i < 5; $i++) {?>
      <i class="fa fa-star-o q5 <?php echo $i; ?>" style="font-size:24px;color:grey;fill:yellow;"></i>
    <?php } ?>
    </div>
    <hr />
    <label>What can we do to add more value to the magazine</label>
    <input name = "final_feedback" class="longarea" type="textarea" rows="5" placeholder="Your feedback here..." value="" />
    <input name = "scorekeeper" type = "hidden" />
    <button type="submit" name = "myreview" id="submit_btn">SUBMIT YOUR REVIEW</button>
  </div>

</form>
</div>
</div>

<script>

$(document).ready(function(){

$('#anonymous').click(function(){
  if($('#anonymous').is(':checked')){
    $('#p_name').val('unnamed').attr('disabled');
    $('#p_code').val('oooo').attr('disabled');
  } else {
    $('#p_name').val("<?php echo $result['Fname'].' '.$result['Sname'].' '.$result['Lname']; ?>");
    $('#p_code').val("<?php echo $result['EmpCode']; ?>");
  }
});


var f_score = [];
var score = [];

  $('.q1, .q2, .q3, .q4, .q5').click(function(event){
    var theNum = $(this).attr('class').split(' ');
    var caCls = [];
    $.each(theNum, function(id, va){
      if(va.length == 1){
        caCls.push(va);
      }
    });
    f_score = $.each(theNum, function(idx, vax){});
	
    score.push(f_score);
    var lastN = caCls[0];
    var daddy = $(this).parent().attr('id');
    $('i.fa.'+daddy).removeClass('fa-star').addClass('fa-star-o').css('color', 'grey');
    var cl_col = [];
    for(let num = 0; num <= lastN; num++){
      cl_col.push(num);
    }
    $.each(cl_col, function(idx, val){
      var pick = $('i.' + daddy + '.' + val);
      pick.removeClass('fa-star-o').addClass('fa-star').css('color', 'gold');
      $('input:hidden').val(score.toString());
    });

  });


$('#form_reviews').submit(function(event){
  event.preventDefault();
  var datPost = $(this).serialize();
  
  var theArrayScore = [];
  $.each(score, function(idx, val){
    if(val[val.length - 2] == "q1"){
      theArrayScore.push(val.pop());
    }
    if(val[val.length - 2] == "q2"){
      theArrayScore.push(val.pop());
    }
    if(val[val.length - 2] == "q3"){
      theArrayScore.push(val.pop());
    }
    if(val[val.length - 2] == "q4"){
      theArrayScore.push(val.pop());
    }
    if(val[val.length - 2] == "q5"){
      theArrayScore.push(val.pop());
    }
  });

    $.ajax({
      url: "catch.php?uid=<?php echo $result['EmployeeID']; ?>",
      type: "POST",
	  dataType: "json",
      data: datPost + '&score=' + theArrayScore.toString(),
      success: function(response){
		  console.log(response);
		  console.log(response['msg']);
		  console.log(response.status);
		  if(response.status == 200){
		      $('#show_form').html('<div class="alert alert-primary" role="alert">Thank you for your valuable feedback.</div>');
			  //alert(response.msg);
			  //$('#submit_btn').hide();
			  //location.reload();
		  } else {
			alert(response.msg);	
		  }
      }
    });
  });
});



</script>
  </body>
</html>
