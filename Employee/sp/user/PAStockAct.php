<?php session_start(); if($_SESSION['login'] = true){require_once('config/config.php');}

if($_POST['action']=='ActualStack' AND $_POST['y']!='' AND $_POST['p']!='' AND $_POST['c']!='')
{ 
 if($_POST['Apr']==''){$Apr=0;}else{$Apr=$_POST['Apr'];} if($_POST['May']==''){$May=0;}else{$May=$_POST['May'];} if($_POST['Jun']==''){$Jun=0;}else{$Jun=$_POST['Jun'];}
 if($_POST['Jul']==''){$Jul=0;}else{$Jul=$_POST['Jul'];} if($_POST['Aug']==''){$Aug=0;}else{$Aug=$_POST['Aug'];} if($_POST['Sep']==''){$Sep=0;}else{$Sep=$_POST['Sep'];}
 if($_POST['Oct']==''){$Oct=0;}else{$Oct=$_POST['Oct'];} if($_POST['Nov']==''){$Nov=0;}else{$Nov=$_POST['Nov'];} if($_POST['Dec']==''){$Dec=0;}else{$Dec=$_POST['Dec'];}
 if($_POST['Jan']==''){$Jan=0;}else{$Jan=$_POST['Jan'];} if($_POST['Feb']==''){$Feb=0;}else{$Feb=$_POST['Feb'];} if($_POST['Mar']==''){$Mar=0;}else{$Mar=$_POST['Mar'];}

 $res=mysql_query("select * from hrm_sales_product_stock_actual where StckLocId=".$_POST['l']." AND ProductId=".$_POST['p']." AND YearId=".$_POST['y']." AND CompanyId=".$_POST['c'], $con);
 $row=mysql_num_rows($res);
 if($row==0)
 { $sqlUp=mysql_query("insert into hrm_sales_product_stock_actual(StckLocId,ProductId, YearId, CompanyId, Apr, May, Jun, Jul, Aug, Sep, Oct, Nov, Dece, Jan, Feb, Mar) values(".$_POST['l'].", ".$_POST['p'].", ".$_POST['y'].", ".$_POST['c'].", ".$Apr.", ".$May.", ".$Jun.", ".$Jul.", ".$Aug.", ".$Sep.", ".$Oct.", ".$Nov.", ".$Dec.", ".$Jan.", ".$Feb.", ".$Mar.")", $con);
 }
 elseif($row>0)
 { $sqlUp=mysql_query("update hrm_sales_product_stock_actual set Apr=".$Apr.", May=".$May.", Jun=".$Jun.", Jul=".$Jul.", Aug=".$Aug.", Sep=".$Sep.", Oct=".$Oct.", Nov=".$Nov.", Dece=".$Dec.", Jan=".$Jan.", Feb=".$Feb.", Mar=".$Mar." where StckLocId=".$_POST['l']." AND ProductId=".$_POST['p']." AND YearId=".$_POST['y']." AND CompanyId=".$_POST['c'], $con);
 }
 
 if($sqlUp){ echo '<input type="hidden" id="StckSNo" value="'.$_POST['s'].'" />' ; }
}
