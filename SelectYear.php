<?php
require_once('AdminUser/config/config.php');
if(isset($_POST['idA']) && $_POST['idA']!=""){ $Yid = $_POST['idA'];
if($Yid==1){$sql = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company1Status='A'", $con);}
elseif($Yid==2){$sql = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company2Status='A'", $con);}
elseif($Yid==3){$sql = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company3Status='A'", $con);}
elseif($Yid==4){$sql = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company4Status='A'", $con);}
elseif($Yid==5){$sql = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company5Status='A'", $con);}
elseif($Yid==6){$sql = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company6Status='A'", $con);}
elseif($Yid==7){$sql = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company7Status='A'", $con);}
elseif($Yid==8){$sql = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company8Status='A'", $con);}
elseif($Yid==9){$sql = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company9Status='A'", $con);}
elseif($Yid==10){$sql = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company10Status='A'", $con);}
if($Yid>0) {$res = mysql_fetch_assoc($sql); }
if($Yid>0) { echo date("Y",strtotime($res['FromDate'])).' to '.date("Y",strtotime($res['ToDate'])); } else {echo '';} 
} 

elseif(isset($_POST['idE']) && $_POST['idE']!=""){ $Yid = $_POST['idE'];
if($Yid==1){$sql = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company1Status='A'", $con);}
elseif($Yid==2){$sql = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company2Status='A'", $con);}
elseif($Yid==3){$sql = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company3Status='A'", $con);}
elseif($Yid==4){$sql = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company4Status='A'", $con);}
elseif($Yid==5){$sql = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company5Status='A'", $con);}
elseif($Yid==6){$sql = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company6Status='A'", $con);}
elseif($Yid==7){$sql = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company7Status='A'", $con);}
elseif($Yid==8){$sql = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company8Status='A'", $con);}
elseif($Yid==9){$sql = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company9Status='A'", $con);}
elseif($Yid==10){$sql = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company10Status='A'", $con);}
if($Yid>0) {$res = mysql_fetch_assoc($sql); }
if($Yid>0) { echo date("Y",strtotime($res['FromDate'])).' to '.date("Y",strtotime($res['ToDate'])); } else {echo '';} 
} 
?>
