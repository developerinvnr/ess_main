<?php require_once('config/config.php');
if($_POST['ProductId']!='' AND $_POST['SeasonId']!='')
{ 
 $m1= $_POST['m1'];$m2= $_POST['m2'];$m3= $_POST['m3'];$m4= $_POST['m4'];$m5= $_POST['m5'];$m6= $_POST['m6'];$m7= $_POST['m7'];$m8= $_POST['m8'];$m9= $_POST['m9'];$m10= $_POST['m10'];$m11= $_POST['m11'];$m12= $_POST['m12'];$m13= $_POST['m13'];$m14= $_POST['m14'];$m15= $_POST['m15'];$m16= $_POST['m16'];$m17= $_POST['m17'];$m18= $_POST['m18'];$act1= $_POST['a1'];$act2= $_POST['a2'];$act3= $_POST['a3'];$act4= $_POST['a4'];$act5= $_POST['a5'];$act6= $_POST['a6'];$act7= $_POST['a7'];$act8= $_POST['a8'];$act9= $_POST['a9'];$act10= $_POST['a10'];$act11= $_POST['a11'];$act12= $_POST['a12'];$act13= $_POST['a13'];$act14= $_POST['a14'];$act15= $_POST['a15'];$act16= $_POST['a16'];$act17= $_POST['a17'];$act18= $_POST['a18'];

 $num=mysql_fetch_array(mysql_query("select max(ActivityId) from hrm_sales_product_activity", $con));
 if($act1==$num['max(ActivityId)']){ echo '<script>alert("First Month it is not possible !!");</script>'; }
 else
 {
    if($act2==$num['max(ActivityId)']){ $LastM=$m2; $act3=0;$m3=0;$act4=0;$m4=0;$act5=0;$m5=0;$act6=0;$m6=0;$act7=0;$m7=0;$act8=0;$m8=0;$act9=0;$m9=0;$act10=0;$m10=0;$act11=0;$m11=0;$act12=0;$m12=0;$act13=0;$m13=0;$act14=0;$m14=0;$act15=0;$m15=0;$act16=0;$m16=0;$act17=0;$m17=0;$act18=0;$m18=0; } 
    elseif($act3==$num['max(ActivityId)']){ $LastM=$m3; $act4=0;$m4=0;$act5=0;$m5=0;$act6=0;$m6=0;$act7=0;$m7=0;$act8=0;$m8=0;$act9=0;$m9=0;$act10=0;$m10=0;$act11=0;$m11=0;$act12=0;$m12=0;$act13=0;$m13=0;$act14=0;$m14=0;$act15=0;$m15=0;$act16=0;$m16=0;$act17=0;$m17=0;$act18=0;$m18=0; }
    elseif($act4==$num['max(ActivityId)']){ $LastM=$m4; $act5=0;$m5=0;$act6=0;$m6=0;$act7=0;$m7=0;$act8=0;$m8=0;$act9=0;$m9=0;$act10=0;$m10=0;$act11=0;$m11=0;$act12=0;$m12=0;$act13=0;$m13=0;$act14=0;$m14=0;$act15=0;$m15=0;$act16=0;$m16=0;$act17=0;$m17=0;$act18=0;$m18=0; }
    elseif($act5==$num['max(ActivityId)']){ $LastM=$m5; $act6=0;$m6=0;$act7=0;$m7=0;$act8=0;$m8=0;$act9=0;$m9=0;$act10=0;$m10=0;$act11=0;$m11=0;$act12=0;$m12=0;$act13=0;$m13=0;$act14=0;$m14=0;$act15=0;$m15=0;$act16=0;$m16=0;$act17=0;$m17=0;$act18=0;$m18=0; }
    elseif($act6==$num['max(ActivityId)']){ $LastM=$m6; $act7=0;$m7=0;$act8=0;$m8=0;$act9=0;$m9=0;$act10=0;$m10=0;$act11=0;$m11=0;$act12=0;$m12=0;$act13=0;$m13=0;$act14=0;$m14=0;$act15=0;$m15=0;$act16=0;$m16=0;$act17=0;$m17=0;$act18=0;$m18=0; }
    elseif($act7==$num['max(ActivityId)']){ $LastM=$m7; $act8=0;$m8=0;$act9=0;$m9=0;$act10=0;$m10=0;$act11=0;$m11=0;$act12=0;$m12=0;$act13=0;$m13=0;$act14=0;$m14=0;$act15=0;$m15=0;$act16=0;$m16=0;$act17=0;$m17=0;$act18=0;$m18=0; }
    elseif($act8==$num['max(ActivityId)']){ $LastM=$m8; $act9=0;$m9=0;$act10=0;$m10=0;$act11=0;$m11=0;$act12=0;$m12=0;$act13=0;$m13=0;$act14=0;$m14=0;$act15=0;$m15=0;$act16=0;$m16=0;$act17=0;$m17=0;$act18=0;$m18=0; }
    elseif($act9==$num['max(ActivityId)']){ $LastM=$m9; $act10=0;$m10=0;$act11=0;$m11=0;$act12=0;$m12=0;$act13=0;$m13=0;$act14=0;$m14=0;$act15=0;$m15=0;$act16=0;$m16=0;$act17=0;$m17=0;$act18=0;$m18=0; }
    elseif($act10==$num['max(ActivityId)']){ $LastM=$m10; $act11=0;$m11=0;$act12=0;$m12=0;$act13=0;$m13=0;$act14=0;$m14=0;$act15=0;$m15=0;$act16=0;$m16=0;$act17=0;$m17=0;$act18=0;$m18=0; }
    elseif($act11==$num['max(ActivityId)']){ $LastM=$m11; $act12=0;$m12=0;$act13=0;$m13=0;$act14=0;$m14=0;$act15=0;$m15=0;$act16=0;$m16=0;$act17=0;$m17=0;$act18=0;$m18=0; }
    elseif($act12==$num['max(ActivityId)']){ $LastM=$m12; $act13=0;$m13=0;$act14=0;$m14=0;$act15=0;$m15=0;$act16=0;$m16=0;$act17=0;$m17=0;$act18=0;$m18=0; }
    elseif($act13==$num['max(ActivityId)']){ $LastM=$m13; $act14=0;$m14=0;$act15=0;$m15=0;$act16=0;$m16=0;$act17=0;$m17=0;$act18=0;$m18=0; }
    elseif($act14==$num['max(ActivityId)']){ $LastM=$m14; $act15=0;$m15=0;$act16=0;$m16=0;$act17=0;$m17=0;$act18=0;$m18=0; }
    elseif($act15==$num['max(ActivityId)']){ $LastM=$m15; $act16=0;$m16=0;$act17=0;$m17=0;$act18=0;$m18=0; }
    elseif($act16==$num['max(ActivityId)']){ $LastM=$m16; $act17=0;$m17=0;$act18=0;$m18=0; }
    elseif($act17==$num['max(ActivityId)']){ $LastM=$m17; $act18=0;$m18=0; }
	else{$LastM=0;}
	
  $sum1=0; 
  if($m1>$m2){ $sum1=$sum1+1;} if($m2!=0 && $m3!=0 && $m2>$m3){ $sum1=$sum1+1; } if($m3!=0 && $m4!=0 && $m3>$m4){ $sum1=$sum1+1; } 
  if($m4!=0 && $m5!=0 && $m4>$m5){ $sum1=$sum1+1; } if($m5!=0 && $m6!=0 && $m5>$m6){ $sum1=$sum1+1; } if($m6!=0 && $m7!=0 && $m6>$m7){ $sum1=$sum1+1; } 
  if($m7!=0 && $m8!=0 && $m7>$m8){ $sum1=$sum1+1; } if($m8!=0 && $m9!=0 && $m8>$m9){ $sum1=$sum1+1; } if($m9!=0 && $m10!=0 && $m9>$m10){ $sum1=$sum1+1; }
  if($m10!=0 && $m11!=0 && $m10>$m11){ $sum1=$sum1+1; } if($m11!=0 && $m12!=0 && $m11>$m12){ $sum1=$sum1+1; } if($m12!=0 && $m13!=0 && $m12>$m13){ $sum1=$sum1+1; }
  if($m13!=0 && $m14!=0 && $m13>$m14){ $sum1=$sum1+1; } if($m14!=0 && $m15!=0 && $m14>$m15){ $sum1=$sum1+1; } if($m15!=0 && $m16!=0 && $m15>$m16){ $sum1=$sum1+1; }
  if($m16!=0 && $m17!=0 && $m16>$m17){ $sum1=$sum1+1; } if($m17!=0 && $m18!=0 && $m17>$m18){ $sum1=$sum1+1; } $LastY=$sum1;

    $count=mysql_num_rows(mysql_query("select * from hrm_sales_product_month_activity where ProductId=".$_POST['ProductId']." AND SeasonId=".$_POST['SeasonId'], $con));
    if($count==1){ mysql_query("update hrm_sales_product_month_activity set m1=".$m1.",act1=".$act1.",m2=".$m2.",act2=".$act2.",m3=".$m3.",act3=".$act3.",m4=".$m4.",act4=".$act4.",m5=".$m5.",act5=".$act5.",m6=".$m6.",act6=".$act6.",m7=".$m7.",act7=".$act7.",m8=".$m8.",act8=".$act8.",m9=".$m9.",act9=".$act9.",m10=".$m10.",act10=".$act10.",m11=".$m11.",act11=".$act11.",m12=".$m12.",act12=".$act12.",m13=".$m13.",act13=".$act13.",m14=".$m14.",act14=".$act14.",m15=".$m15.",act15=".$act15.",m16=".$m16.",act16=".$act16.",m17=".$m17.",act17=".$act17.",m18=".$m18.",act18=".$act18.",LM=".$LastM.",LY=".$LastY." where ProductId=".$_POST['ProductId']." AND SeasonId=".$_POST['SeasonId'], $con); }
    elseif($count==0){ mysql_query("insert into hrm_sales_product_month_activity set ProductId=".$_POST['ProductId'].",SeasonId=".$_POST['SeasonId'].",m1=".$m1.",act1=".$act1.",m2=".$m2.",act2=".$act2.",m3=".$m3.",act3=".$act3.",m4=".$m4.",act4=".$act4.",m5=".$m5.",act5=".$act5.",m6=".$m6.",act6=".$act6.",m7=".$m7.",act7=".$act7.",m8=".$m8.",act8=".$act8.",m9=".$m9.",act9=".$act9.",m10=".$m10.",act10=".$act10.",m11=".$m11.",act11=".$act11.",m12=".$m12.",act12=".$act12.",m13=".$m13.",act13=".$act13.",m14=".$m14.",act14=".$act14.",m15=".$m15.",act15=".$act15.",m16=".$m16.",act16=".$act16.",m17=".$m17.",act17=".$act17.",m18=".$m18.",act18=".$act18.",LM=".$LastM.",LY=".$LastY, $con); }
 }

echo '<input type="hidden" id="pi" value="'.$_POST['ProductId'].'" /><input type="hidden" id="si" value="'.$_POST['s'].'" />';
}

?>
