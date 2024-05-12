<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<Script type="text/javascript">window.history.forward(1);</Script>
</head>
<body class="body"> 
<?php $sqlE=mysql_query("select Gender,DOB,Married,MarriageDate,HusWifeName,ProfileCertify from hrm_employee_general INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_family ON hrm_employee_general.EmployeeID=hrm_employee_family.EmployeeID INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$EmployeeId, $con); $resE=mysql_fetch_assoc($sqlE); 
?> 
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
<td>
<table style="margin-top:0px;">
<tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
<tr>
 <td valign="top" align="center">
 <table border="0" style="width:1200px; height:350px; float:none;" cellpadding="0">
 <tr>
  <td valign="top"> 	   
<?php //***************************************************** Main Body ********************************************************************************************** ?>	   
<table border="0" id="Activity">
<tr>
 <td valign="top">
  <table border="0">
  <tr>
	<td valign="top">			   
     <table border="0">
	 <tr>
	   <td align="left" valign="top" style="width:180px;height:280px;">
	     <table border="0">
		   <tr><td colspan="2" align="left" valign="top" style="width:180px;">
<?php include("EmpImgEmp.php"); ?>
<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\" border=2>\n";?></tr>
		   <tr><td align="center" style='font-family:Times New Roman;font-size:18px;color:#FFFFFF;width:180px;'>&nbsp;</td></tr>
	       <tr><td align="center">&nbsp;</td></tr>
		</table>
	   </td>
	   <td valign="top" style="width:1000px;">

<table border="0" style="margin-top:10px;">
<?php /********************* VNR IMPACT OPEN */ ?>
<script type="text/javascript" language="javascript">
function FUnImpact(N)
{
 if(N==24){ window.open("https://drive.google.com/file/d/12lix9BRZabdCMefp2FOJYhIjlBFUv7v3/view?usp=sharing", '_blank'); window.focus(); }
 else{window.open("VnrImpact.php?e=4e&w=234&y=10234&a=hod&e=4e2&e=4e&w=234&y=110022311&retd=ee&rr=09drfGe&act=show&v="+N+"&valut=false", '_blank'); window.focus();}
}
</script>   
 <td valign="top" align="center" style="width:550px;">
   <table border="0" align="center">
     <tr>
	  <td style="font-size:18px;" align="center">
	   <font style="color:#00509F;"><b>VNR Impact [All Volume]
	  </td>
	 </tr>
     <tr> 
	 
	 <tr>
	   <td style='font-family:Times New Roman;font-size:16px;color:#00509F;font-weight:bold;background-image:url(../AdminUser/VnrImpact/shelf_wood.png);max-height:400px; overflow:scroll;' valign="top">
	    <table border="0" style="width:900px;max-height:400px; overflow:scroll;">
<?php 
$x=24; $w=23; $v=22; $u=21; $t=20; $s=19; $r=18; $q=17; $p=16; $o=15; $n=14; $m=13; $l=12; $k=11; $j=10; $i=9; $h=8; $g=7; $f=6; $e=5; $d=4; $c=3; $b=2; $a=1; 

$xx=24; $ww=23; $vv=22; $uu=21; $tt=20; $ss=19; $rr=18; $qq=17; $pp=16; $oo=15; $nn=14; 
$mm=13; $ll=12; $kk=11; $jj=10; $ii='09'; $hh='08'; $gg='07'; $ff='06'; $ee='05'; $dd='04'; $cc='03'; $bb='02'; $aa='01'; 
?>		
         <?php /************* 1111 ************/ ?>
		 <tr>
		  
		  <td align="center" style="height:120px;" valign="middle"><?php if($xx>0){ ?><a href="#" onClick="FUnImpact(<?php echo $x; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $x; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td>
		  <td align="center" style="height:120px;" valign="middle"><?php if($ww>0){ ?><a href="#" onClick="FUnImpact(<?php echo $w; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $w; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td>
		  <td align="center" style="height:120px;" valign="middle"><?php if($vv>0){ ?><a href="#" onClick="FUnImpact(<?php echo $v; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $v; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td>
		  <td align="center" style="height:120px;" valign="middle"><?php if($uu>0){ ?><a href="#" onClick="FUnImpact(<?php echo $u; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $u; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td>   
		  <td align="center" style="height:120px;" valign="middle"><?php if($tt>0){ ?><a href="#" onClick="FUnImpact(<?php echo $t; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $t; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td>   
		  <td align="center" style="height:120px;" valign="middle"><?php if($ss>0){ ?><a href="#" onClick="FUnImpact(<?php echo $s; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $s; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td>    
		     
		  
		 </tr>
		  <tr>
		  <td valign="top" align="center"><?php if($x>0){ ?><a href="#" onClick="FUnImpact(<?php echo $x; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $xx; ?></b></a><?php } ?></td>
		  <td valign="top" align="center"><?php if($w>0){ ?><a href="#" onClick="FUnImpact(<?php echo $w; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $ww; ?></b></a><?php } ?></td>
		  <td valign="top" align="center"><?php if($v>0){ ?><a href="#" onClick="FUnImpact(<?php echo $v; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $vv; ?></b></a><?php } ?></td>
		  <td valign="top" align="center"><?php if($u>0){ ?><a href="#" onClick="FUnImpact(<?php echo $u; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $uu; ?></b></a><?php } ?></td>
		  <td valign="top" align="center"><?php if($t>0){ ?><a href="#" onClick="FUnImpact(<?php echo $t; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $tt; ?></b></a><?php } ?></td>     
		  <td valign="top" align="center"><?php if($s>0){ ?><a href="#" onClick="FUnImpact(<?php echo $s; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $ss; ?></b></a><?php } ?></td> 
		   
		  
		 </tr>
		 
		 <tr><td>&nbsp;</td></tr>
		 
		 <?php /************* 2222 ************/ ?>
		 <tr>
		  <td align="center" style="height:120px;" valign="middle"><?php if($rr>0){ ?><a href="#" onClick="FUnImpact(<?php echo $r; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $r; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td>   
		  <td align="center" style="height:120px;" valign="middle"><?php if($qq>0){ ?><a href="#" onClick="FUnImpact(<?php echo $q; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $q; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td>   
		  <td align="center" style="height:120px;" valign="middle"><?php if($pp>0){ ?><a href="#" onClick="FUnImpact(<?php echo $p; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $p; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td>    
		  <td align="center" style="height:120px;" valign="middle"><?php if($oo>0){ ?><a href="#" onClick="FUnImpact(<?php echo $o; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $o; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td>   
		  <td align="center" style="height:120px;" valign="middle"><?php if($n>0){ ?><a href="#" onClick="FUnImpact(<?php echo $n; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $n; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td>   
		  <td align="center" style="height:120px;" valign="middle"><?php if($m>0){ ?><a href="#" onClick="FUnImpact(<?php echo $m; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $m; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td> 
		     
		     
		 </tr>
		  <tr>
		  <td valign="top" align="center"><?php if($r>0){ ?><a href="#" onClick="FUnImpact(<?php echo $r; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $rr; ?></b></a><?php } ?></td>    
		  <td valign="top" align="center"><?php if($q>0){ ?><a href="#" onClick="FUnImpact(<?php echo $q; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $qq; ?></b></a><?php } ?></td>    
		  <td valign="top" align="center"><?php if($p>0){ ?><a href="#" onClick="FUnImpact(<?php echo $p; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $pp; ?></b></a><?php } ?></td>    
		  <td valign="top" align="center"><?php if($o>0){ ?><a href="#" onClick="FUnImpact(<?php echo $o; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $oo; ?></b></a><?php } ?></td>    
		  <td valign="top" align="center"><?php if($n>0){ ?><a href="#" onClick="FUnImpact(<?php echo $n; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $nn; ?></b></a><?php } ?></td>
		  <td valign="top" align="center"><?php if($m>0){ ?><a href="#" onClick="FUnImpact(<?php echo $m; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $mm; ?></b></a><?php } ?></td>
		  
		     
		 </tr>
		 
		 <tr><td>&nbsp;</td></tr>
		 
		 <?php /************* 3333 ************/ ?>
		 <tr>
		   <td align="center" style="height:120px;" valign="middle"><?php if($l>0){ ?><a href="#" onClick="FUnImpact(<?php echo $l; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $l; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td>  
		   <td align="center" style="height:120px;" valign="middle"><?php if($k>0){ ?><a href="#" onClick="FUnImpact(<?php echo $k; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $k; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td>  
		   <td align="center" style="height:120px;" valign="middle"><?php if($j>0){ ?><a href="#" onClick="FUnImpact(<?php echo $j; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $j; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td>   
		   <td align="center" style="height:120px;" valign="middle"><?php if($i>0){ ?><a href="#" onClick="FUnImpact(<?php echo $i; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $i; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td>  
		   <td align="center" style="height:120px;" valign="middle"><?php if($h>0){ ?><a href="#" onClick="FUnImpact(<?php echo $h; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $h; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td>  
		   <td align="center" style="height:120px;" valign="middle"><?php if($g>0){ ?><a href="#" onClick="FUnImpact(<?php echo $g; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $g; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td>  
		    
		     
		 </tr>
		  <tr>
		      
		  <td valign="top" align="center"><?php if($l>0){ ?><a href="#" onClick="FUnImpact(<?php echo $l; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $ll; ?></b></a><?php } ?></td>    
		  <td valign="top" align="center"><?php if($k>0){ ?><a href="#" onClick="FUnImpact(<?php echo $k; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $kk; ?></b></a><?php } ?></td>    
		  <td valign="top" align="center"><?php if($j>0){ ?><a href="#" onClick="FUnImpact(<?php echo $j; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $jj; ?></b></a><?php } ?></td>     
		  <td valign="top" align="center"><?php if($i>0){ ?><a href="#" onClick="FUnImpact(<?php echo $i; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $ii; ?></b></a><?php } ?></td>     
		  <td valign="top" align="center"><?php if($h>0){ ?><a href="#" onClick="FUnImpact(<?php echo $h; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $hh; ?></b></a><?php } ?></td>    
		  <td valign="top" align="center"><?php if($g>0){ ?><a href="#" onClick="FUnImpact(<?php echo $g; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $gg; ?></b></a><?php } ?></td>
		    
		    
		 </tr>
		 
		 <tr><td>&nbsp;</td></tr>
		 <?php /************* 4444 ************/ ?> 
		 <tr>
		     
		   <td align="center" style="height:120px;" valign="middle"><?php if($f>0){ ?><a href="#" onClick="FUnImpact(<?php echo $f; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $f; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td>   
		   <td align="center" style="height:120px;" valign="middle"><?php if($e>0){ ?><a href="#" onClick="FUnImpact(<?php echo $e; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $e; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td>  
		   <td align="center" style="height:120px;" valign="middle"><?php if($d>0){ ?><a href="#" onClick="FUnImpact(<?php echo $d; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $d; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td>  
		   <td align="center" style="height:120px;" valign="middle"><?php if($c>0){ ?><a href="#" onClick="FUnImpact(<?php echo $c; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $c; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td>  
		   <td align="center" style="height:120px;" valign="middle"><?php if($b>0){ ?><a href="#" onClick="FUnImpact(<?php echo $b; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $b; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td>  
		   <td align="center" style="height:120px;" valign="middle"><?php if($a>0){ ?><a href="#" onClick="FUnImpact(<?php echo $a; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $a; ?>.png" style="width:100px;height:120px;"/></b></a><?php } ?></td>
		 </tr>
		  <tr>
		      
		    <td valign="top" align="center"><?php if($f>0){ ?><a href="#" onClick="FUnImpact(<?php echo $f; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $ff; ?></b></a><?php } ?></td>     
		    <td valign="top" align="center"><?php if($e>0){ ?><a href="#" onClick="FUnImpact(<?php echo $e; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $ee; ?></b></a><?php } ?></td>    
		    <td valign="top" align="center"><?php if($d>0){ ?><a href="#" onClick="FUnImpact(<?php echo $d; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $dd; ?></b></a><?php } ?></td>    
		    <td valign="top" align="center"><?php if($c>0){ ?><a href="#" onClick="FUnImpact(<?php echo $c; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $cc; ?></b></a><?php } ?></td>    
		    <td valign="top" align="center"><?php if($b>0){ ?><a href="#" onClick="FUnImpact(<?php echo $b; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $bb; ?></b></a><?php } ?></td>     
		    <td valign="top" align="center"><?php if($a>0){ ?><a href="#" onClick="FUnImpact(<?php echo $a; ?>)" style="color:#FFFFFF;text-decoration:none;font-size:11px;"><b>Volume-<?php echo $aa; ?></b></a><?php } ?></td>
		 </tr>
		 

		</table>
	   </td>
	 </tr>
   </table>
 </td>
</tr>    
<?php /******************* VNR IMPACT CLOSE */ ?>
</table>
	   </td>
	 </tr>
	 
   </table>
  </td>
  <td rowspan="2" valign="top" align="">
  </td>
 </tr>

</table>
</td>
</tr>
</table>	
         </td>
	  </tr>			 
	</table>
<?php //*************************************************************************************************************************************************** ?>
          
		  </td>  
		 </tr>
		 <tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr>  	
	     <tr><?php if($_SESSION['login'] = true){ ?><td valign="top" style=""><?php require_once("../footer.php"); ?></td><?php } ?></tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

