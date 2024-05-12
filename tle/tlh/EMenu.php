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
<span class="preload1"></span>
<span class="preload2"></span>
<?php $EmployeeId=$_SESSION['ID']; $CompanyId=1;

 $sqlE=mysql_query("select * from hrm_sales_tlemp where TLEId=".$EmployeeId,$con); $resE=mysql_fetch_assoc($sqlE); 
 if($resE['TLRepId']>0){$rpt=1;}else{$rpt=0;} $hq=$resE['TLHq'];
 if(date("m")==4 OR date("m")==5 OR date("m")==6){$qtr=1;}elseif(date("m")==7 OR date("m")==8 OR date("m")==9){$qtr=2;}
 elseif(date("m")==10 OR date("m")==11 OR date("m")==12){$qtr=3;}elseif(date("m")==1 OR date("m")==2 OR date("m")==3){$qtr=4;} 
 $sqlye=mysql_query("select YearId from hrm_sales_year where Company1='A'", $con); $resye=mysql_fetch_assoc($sqlye); ?>
<ul id="nav">
    <li class="top">&nbsp;&nbsp;</li>
	<li class="top"><a href="Index.php?EI=<?php echo $EmployeeId; ?>&Event=Edit&oo=we&p=g&ok=true&rslt=y&pp=qw_res##ius&ere=wer&yet=werwer&act=truedflase&we=1232123&rer%sas%" class="top_link"><span>HOME</span></a></li>
   
	<li class="top"><a href="SalesEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act=<?php echo $rpt; ?>&hq=0&y=<?php echo $resye['YearId']; ?>&q=<?php echo $qtr; ?>&ii=19&vc=1&fc=0&cc=0&di=<?php echo $SpPDept; ?>&gi=<?php echo $SpGradeP; ?>&EHq=<?php echo $EmployeeId; ?>&myh=0&myt=0" class="top_link">SALES PLAN <font color="#FFFF00">(ENTRY)</font></a></li>
	<li class="top"><a href="SalesDetails.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $resye['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0" class="top_link">MY SALES-PLAN <font color="#FFFF00">(OVERALL REPORTS)</font></a></li>
	<li class="top"><a href="SalesTReports.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi=<?php echo $resye['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&qtr=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1&HqWise=1&DisWise=0&SelHq=0&SelDis=0&rpt=<?php echo $rpt; ?>&crp=0&Bclick=0" class="top_link">REPORTS <font color="#FFFF00">(DETAILS)</font></a></li>
    <li class="top"><a href="Combsplan.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $resye['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5&eei=<?php echo $EmployeeId; ?>" class="top_link">EXPORT<font color="#FFFF00">(ACTUAL <u>TARGET/ SALES</u> - WITH DEALER)</font> </a></li>
    
<?php 
// RCP & MRP OPEN RCP & MRP OPEN //
// RCP & MRP OPEN RCP & MRP OPEN //

$cks=mysql_query("select * from erp_empassign_rcpmrp_tle where EmpId=".$EmployeeId." AND WorkName='RCP' AND Sts='A'",$con2); $ckr=mysql_num_rows($cks); 
$ck2s=mysql_query("select * from erp_empassign_rcpmrp_tle where EmpId=".$EmployeeId." AND WorkName='MRP' AND Sts='A'",$con2); $ck2r=mysql_num_rows($ck2s);

if($ckr>0){ echo '<li class="top"><a href="erprcp.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&m='.date("m").'&y='.$resye['YearId'].'&erne=4e&ernw=234&erney=110&s=0&hq=0&md=4&rsts=0&crop=1" class="top_link">RCP</a></li>'; } 

if($ck2r>0){ echo '<li class="top"><a href="erpmrp.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&m='.date("m").'&y='.$resye['YearId'].'&erne=4e&ernw=234&erney=111&s=0&hq=0&md=4&rsts=0&crop=1&branch=0" class="top_link">MRP</a></li>'; }

// RCP & MRP CLOSE RCP & MRP CLOSE //
// RCP & MRP CLOSE RCP & MRP CLOSE // 

?>

</ul> 

	 
