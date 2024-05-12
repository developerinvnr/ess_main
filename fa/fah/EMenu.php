<script language="javascript" type="text/javascript"> 
stuHover = function() 
{ 
 var cssRule; var newSelector;
 for (var i = 0; i < document.styleSheets.length; i++)
 for (var x = 0; x < document.styleSheets[i].rules.length ; x++)
 { cssRule = document.styleSheets[i].rules[x];
   if (cssRule.selectorText.indexOf("LI:hover") != -1)
   { newSelector = cssRule.selectorText.replace(/LI:hover/gi, "LI.iehover");
	 document.styleSheets[i].addRule(newSelector , cssRule.style.cssText);
   }
 }
 var getElm = document.getElementById("nav").getElementsByTagName("LI");
 for (var i=0; i<getElm.length; i++) 
 { getElm[i].onmouseover=function() { this.className+=" iehover"; }
   getElm[i].onmouseout=function() { this.className=this.className.replace(new RegExp(" iehover\\b"), ""); }
 }
}
if (window.attachEvent) window.attachEvent("onload", stuHover);
</script>
<style>
.heading{ font-family:Times New Roman;font-size:18px; color:#FFFFFF; font-weight:bold;}
</style>
<span class="preload1"></span>
<span class="preload2"></span>
<?php $EmployeeId=$_SESSION['ID']; $CompanyId=1;

 $sqlE=mysql_query("select * from hrm_sales_tlemp where TLEId=".$EmployeeId,$con); $resE=mysql_fetch_assoc($sqlE); 
 
 $sqlye=mysql_query("select YearId from hrm_sales_year where Company1='A'", $con); $resye=mysql_fetch_assoc($sqlye); ?>
<ul id="nav">
    <li class="top">&nbsp;&nbsp;</li>
	<li class="top"><a href="Index.php?EI=<?php echo $EmployeeId; ?>&Event=Edit&oo=we&p=g&ok=true&rslt=y&pp=qw_res##ius&ere=wer&yet=werwer&act=truedflase&we=1232123&rer%sas%" class="top_link"><span>HOME</span></a></li>
	
	<?php /**************** FA OPEN ***********************/ ?>
<li class="top"><a href="#" id="privacy" class="top_link"><span class="down">FA</span></a> 
 <ul class="sub">  
  <li><b style="color:#8000FF;font-size:14px;font-family:Times New Roman;font-weight:bold;">Master</b></li>
  <li><a href="f_addfa.php?ac=2441&ee=2421&der=true2&c=false7result=true&are=2347&rt=45&tt=7&uu=%%yy&trht=FTF%%F1&tt&opt=0">Add FA</a></li>

  <li><b style="color:#8000FF;font-size:14px;font-family:Times New Roman;font-weight:bold;">Process/ Request</b></li>
  <li><a href="f_attd.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m"); ?>&y=<?php echo date("Y"); ?>&filter=zero&s=0&hq=0&dis=0&rbm=0&abm=0">Attendance</a></li>
  <li><a href="f_claim.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m", strtotime("-1 months", strtotime(date("Y-m-d"))));?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rbm=0&abm=0">Claim</a></li>

<li><a href="f_courierdetails.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m", strtotime("-1 months", strtotime(date("Y-m-d"))));?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rbm=0&abm=0">Courier Details</a></li>

  <li><b style="color:#8000FF;font-size:14px;font-family:Times New Roman;font-weight:bold;">Reports</b></li>
 
 <li><a href="f_profile.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m"); ?>&y=<?php echo date("Y"); ?>&filter=zero&s=0&hq=0&md=4&dis=0&sts=A&rbm=0&abm=0">FA Profile</a></li>
 
 <li><a href="f_rsalary.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m");?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rbm=0&abm=0&m1=0&m2=0&m3=0&m4=0&m5=0&m6=0&m7=0&m8=0&m9=0&m10=0&m11=0&m12=0">FA Expenses</a></li>
 <li><a href="f_rattd.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m");?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rbm=0&abm=0">FA Attendance</a></li>
 
 </ul>
</li>  
<?php /**************** FA CLOSE ***********************/ ?> 

</ul> 

	 
