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
<?php $EmployeeId=$_SESSION['EmployeeID']; $CompanyId=1;
 $sqlERev=mysql_query("select * from hrm_sales_revised_employee where EmployeeID=".$EmployeeId." AND Status='A'",$con); $rowERev=mysql_num_rows($sqlERev);
 $SpP=mysql_query("select GradeId,DepartmentId,HqId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resSpP=mysql_fetch_assoc($SpP); 
 $SpPDept=$resSpP['DepartmentId']; $SpGradeP=$resSpP['GradeId']; 
 $sqlRpt=mysql_query("select hrm_employee_general.EmployeeID from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where DepartmentId=6 AND hrm_employee.EmpStatus='A' AND RepEmployeeID=".$EmployeeId, $con); 
 $rowRpt=mysql_num_rows($sqlRpt); if($rowRpt>0){$rpt=1;}else{$rpt=0;} $hq=$resSpP['HqId'];
 if(date("m")==4 OR date("m")==5 OR date("m")==6){$qtr=1;}elseif(date("m")==7 OR date("m")==8 OR date("m")==9){$qtr=2;}
 elseif(date("m")==10 OR date("m")==11 OR date("m")==12){$qtr=3;}elseif(date("m")==1 OR date("m")==2 OR date("m")==3){$qtr=4;} 
 $Sp=mysql_query("select DepartmentId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resSp=mysql_fetch_assoc($Sp);
 $sqlye=mysql_query("select YearId from hrm_sales_year where Company1='A'", $con); $resye=mysql_fetch_assoc($sqlye);
 if(($_SESSION['EmpType']=='E' OR $_SESSION['EmpType']=='M') AND $_SESSION['EmpStatus']=='A' AND $resSp['DepartmentId']==6){ ?>
<ul id="nav">
    <li class="top">&nbsp;&nbsp;</li>
	<li class="top"><a href="Index.php?EI=<?php echo $EmployeeId; ?>&Event=Edit&oo=we&p=g&ok=true&rslt=y&pp=qw_res##ius&ere=wer&yet=werwer&act=truedflase&we=1232123&rer%sas%" class="top_link"><span>HOME</span></a></li>
    
	<?php if($SpPDept==6 AND ($SpGradeP==61 OR $SpGradeP==62 OR $SpGradeP==63 OR $SpGradeP==64 OR $SpGradeP==65 OR $SpGradeP==66 OR $SpGradeP==67)){ ?>
	<li class="top"><a href="SalesEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act=<?php echo $rpt; ?>&hq=0&y=<?php echo $resye['YearId']; ?>&q=<?php echo $qtr; ?>&ii=19&vc=1&fc=0&cc=0&di=<?php echo $SpPDept; ?>&gi=<?php echo $SpGradeP; ?>&EHq=<?php echo $EmployeeId; ?>&myh=0&myt=0" class="top_link">SALES PLAN <font color="#FFFF00">(ENTRY)</font></a></li>
	<li class="top"><a href="SalesDetails.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $resye['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0" class="top_link">MY SALES-PLAN <font color="#FFFF00">(OVERALL REPORTS)</font></a></li>
	<li class="top"><a href="SalesTReports.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi=<?php echo $resye['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&qtr=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1&HqWise=1&DisWise=0&SelHq=0&SelDis=0&rpt=<?php echo $rpt; ?>&crp=0&Bclick=0" class="top_link">REPORTS <font color="#FFFF00">(DETAILS)</font></a></li>
	<?php if($rowERev>0){ ?>	
	<li class="top"><a href="SalesRevise.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $resye['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0" class="top_link">SALES PLAN <font color="#FFFF00">(REVISED)</font></a></li>
	<?php } ?>
	
<?php } elseif($SpPDept==6 AND ($SpGradeP==68 OR $SpGradeP==69 OR $SpGradeP==70 OR $SpGradeP==71)){ ?>
	<li class="top"><a href="SalesaEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act=<?php echo $rpt; ?>&hq=0&y=<?php echo $resye['YearId']; ?>&q=<?php echo $qtr; ?>&ii=19&vc=1&fc=0&cc=0&di=<?php echo $SpPDept; ?>&gi=<?php echo $SpGradeP; ?>&EHq=<?php echo $EmployeeId; ?>&SelTerr=0&myh=0&myt=0" class="top_link">SALES PLAN <font color="#FFFF00">(ENTRY)</font></a></li>
	<li class="top"><a href="SalesaDetails.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $resye['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0" class="top_link">MY SALES-PLAN <font color="#FFFF00">(OVERALL REPORTS)</font></a></li>
	<li class="top"><a href="SalesTaReports.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi=<?php echo $resye['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&qtr=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1&HqWise=0&DisWise=0&SelHq=0&SelDis=0&rpt=<?php echo $rpt; ?>&crp=0&Bclick=0&SelName=0&NameWise=1" class="top_link">REPORTS <font color="#FFFF00">(DETAILS)</font></a></li>
	<?php if($rowERev>0){ ?>
	<li class="top"><a href="SalesaRevise.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $resye['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0" class="top_link">SALES PLAN <font color="#FFFF00">(REVISED)</font></a></li>
	<?php } ?>
	
<?php } elseif($SpPDept==6 AND ($SpGradeP==72 OR $SpGradeP==73 OR $SpGradeP==74 OR $SpGradeP==75)){ ?> 
    <li class="top"><a href="SalesrEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act=<?php echo $rpt; ?>&hq=0&y=<?php echo $resye['YearId']; ?>&q=<?php echo $qtr; ?>&ii=19&vc=1&fc=0&cc=0&di=<?php echo $SpPDept; ?>&gi=<?php echo $SpGradeP; ?>&EHq=<?php echo $EmployeeId; ?>&SelTerr=0&myh=0&myt=0" class="top_link">SALES PLAN <font color="#FFFF00">(ENTRY)</font></a></li> 
	<li class="top"><a href="SalesrDetails.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $resye['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0" class="top_link">MY SALES-PLAN <font color="#FFFF00">(OVERALL REPORTS)</font></a></li>
	<li class="top"><a href="SalesTrReports.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi=<?php echo $resye['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&qtr=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1&HqWise=0&DisWise=0&SelHq=0&SelDis=0&rpt=<?php echo $rpt; ?>&crp=0&Bclick=0&SelName=0&NameWise=0&SelZone=0&ZoneWise=1" class="top_link">REPORTS <font color="#FFFF00">(DETAILS)</font></a></li>
	<?php if($rowERev>0){ ?>
	<li class="top"><a href="SalesrRevise.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $resye['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0" class="top_link">SALES PLAN <font color="#FFFF00">(REVISED)</font></a></li>
	<?php } ?>
	
<?php } elseif($SpPDept==6 AND ($SpGradeP==76 OR $SpGradeP==77)){ ?> 
    <li class="top"><a href="SaleshEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act=<?php echo $rpt; ?>&hq=0&y=<?php echo $resye['YearId']; ?>&q=<?php echo $qtr; ?>&ii=19&vc=1&fc=0&cc=0&di=<?php echo $SpPDept; ?>&gi=<?php echo $SpGradeP; ?>&EHq=<?php echo $EmployeeId; ?>&SelTerr=0&myh=0&myt=0" class="top_link">SALES PLAN <font color="#FFFF00">(ENTRY)</font></a></li>
	<li class="top"><a href="SalesThReports.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi=<?php echo $resye['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&qtr=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1&HqWise=0&DisWise=0&SelHq=0&SelDis=0&rpt=<?php echo $rpt; ?>&crp=0&Bclick=0&SelName=0&NameWise=0&SelZone=0&ZoneWise=0&SelCon=0&ConWise=1" class="top_link">REPORTS <font color="#FFFF00">(DETAILS)</font></a></li>
<?php } ?>	


<li class="top"><a href="Combsplan.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $resye['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5&eei=<?php echo $EmployeeId; ?>" class="top_link">EXPORT<font color="#FFFF00">(ACTUAL <u>TARGET/ SALES</u> - WITH DEALER)</font> </a></li>


<?php //if($EmployeeId==308 OR $EmployeeId==140 OR $EmployeeId==331){ ?>
<?php /******************** FA OPEN ******************************/?>
<?php /******************** FA OPEN ******************************/?>
<?php $Eq=mysql_query("select * from fa_request_employee where EmployeeID=".$EmployeeId." AND Request='Y'",$con); 
      $sgm=mysql_query("select GradeId from hrm_employee_general where EmployeeID=".$EmployeeId,$con); 
      $sgm2=mysql_query("select * from fa_approvalgm where Id=2 AND (Gm1=".$EmployeeId." OR Gm2=".$EmployeeId.")",$con); 
      $rowEq=mysql_num_rows($Eq); $rgm=mysql_fetch_assoc($sgm); $rowgm2=mysql_num_rows($sgm2); 
	  $sPnd=mysql_query("select * from fa_request where gm=".$EmployeeId." AND Status=1",$con);$rowPnd=mysql_num_rows($sPnd);
?>
	
<?php /* if($SpPDept==6 AND ($SpGradeP==61 OR $SpGradeP==62 OR $SpGradeP==63 OR $SpGradeP==64 OR $SpGradeP==65 OR $SpGradeP==66 OR $SpGradeP==67)){ ?>	
<?php /** FA *o1 ?>
<li class="top"><a href="#" id="privacy" class="top_link"><span class="down">FIELD ASSISTANT<font color="#FFFF00">(FA)</font></span></a>
 <ul class="sub">
  <li style="text-align:center;font-family:Times New Roman;"><b style="color:#8000FF;font-size:14px;">My Team Reports</b></li>
  <li><a href="f_efile.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m"); ?>&y=<?php echo date("Y"); ?>&filter=zero&s=0&hq=0&dis=0&rsts=0&md=4">FA Profile</a></li>
  <li><a href="f_eatt.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m"); ?>&y=<?php echo date("Y"); ?>&filter=zero&s=0&hq=0&dis=0">FA Attendance</a></li>
  <li><a href="f_esal.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m");?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4">FA Expense</a></li>
</ul>
</li>
<?php /** FA *c1 ?>

<?php } else */


if($SpPDept==6 AND ($SpGradeP==67 OR $SpGradeP==68 OR $SpGradeP==69 OR $SpGradeP==70 OR $SpGradeP==71)){ ?>	
<?php /** FA *o2*/ ?>
<li class="top"><a href="#" id="privacy" class="top_link"><span class="down">FIELD ASSISTANT<font color="#FFFF00">(FA)</font></span></a>
 <ul class="sub">
  <li style="text-align:center;font-family:Times New Roman;"><b style="color:#8000FF;font-size:14px;">Process</b></li>
<?php if($rowEq>0){ ?>  
  <li><a href="f_request.php?ern1=r114&ern2w=234&ern3y=10234&a=1&b=1&c=1&d=1&e=1&f=1&s=0">FA Request</a></li>
  <li><a href="f_claim.php?ern1=r114&ern2w=234&ern3y=10234&m=<?php echo date("m", strtotime("-1 months", strtotime(date("Y-m-d"))));?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=0">Expense Claim</a></li>
  <li><a href="f_removel.php?eew=234&m=<?php echo date("m");?>&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=All&rsts=0">FA Removel</a></li>
  <li><a href="f_chngmode.php?eew=234&m=<?php echo date("m");?>&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=All&rsts=0">Change FA Mode</a></li>
<?php } ?>  
  <li style="text-align:center;font-family:Times New Roman;"><b style="color:#8000FF;font-size:14px;">Reports</b></li>
  <li><a href="f_profile.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m"); ?>&y=<?php echo date("Y"); ?>&filter=zero&s=0&hq=0&dis=0&rsts=0&md=4">FA Profile</a></li>
  <li><a href="f_rattd.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m"); ?>&y=<?php echo date("Y"); ?>&filter=zero&s=0&hq=0&dis=0">Attendance</a></li>
  <li><a href="f_rsalary.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m");?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4">FA Expense</a></li>
</ul>
</li>
<?php /** FA *c2*/ ?>

<?php } elseif($SpPDept==6 AND ($SpGradeP==72 OR $SpGradeP==73 OR $SpGradeP==74 OR $SpGradeP==75)){ ?> 
<?php /** FA *o3*/ ?>
<li class="top"><a href="#" id="privacy" class="top_link"><span class="down">FIELD ASSISTANT<font color="#FFFF00">(FA)</font></span></a>
 <ul class="sub">
  <li style="text-align:center;font-family:Times New Roman;"><b style="color:#8000FF;font-size:14px;">Process</b></li>
<?php if($rowEq>0){ ?>  
  <li><a href="f_request.php?ern1=r114&ern2w=234&ern3y=10234&a=1&b=1&c=1&d=1&e=1&f=1&s=0">FA Request</a></li>
  <li><a href="f_claim.php?ern1=r114&ern2w=234&ern3y=10234&m=<?php echo date("m", strtotime("-1 months", strtotime(date("Y-m-d"))));?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=0">Expense Claim</a></li>
  <li><a href="f_removel.php?eew=234&m=<?php echo date("m");?>&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=All&rsts=0">FA Removel</a></li>
  <li><a href="f_chngmode.php?eew=234&m=<?php echo date("m");?>&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=All&rsts=0">Change FA Mode</a></li>
  
<?php } if($rgm['GradeId']==74 OR $rgm['GradeId']==75){ ?><li><a href="f_requestgm.php?ern1=r114&ern2w=234&ern3y=10234&a=0&b=1&c=0&d=0&e=0&f=0&s=0">FA Req. Approval<font color="#0080FF"><?php echo ' ('.$rowPnd.')'; ?></font></a></li><li><a href="f_chngmodegm.php?eew=234&m=<?php echo date("m");?>&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=All&rsts=0">Change FA Mode</a></li><?php } ?>

<?php if($rowgm2>0){ ?>
<li style="text-align:center;font-family:Times New Roman;"><b style="color:#8000FF;font-size:14px;">Marketing</b></li>
<li><a href="f_requestmkt.php?ern1=r114&ern2w=234&ern3y=10234&a=0&b=0&c=1&d=0&e=0&f=0&s=0">FA Req. Approval(Mkt)</a></li>
<li><a href="f_chngmodemkt.php?eew=234&m=<?php echo date("m");?>&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=All&rsts=0">Change FA Mode(Mkt)</a></li>
<?php } ?>


  <li style="text-align:center;font-family:Times New Roman;"><b style="color:#8000FF;font-size:14px;">Reports</b></li>
  <li><a href="f_profile.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m"); ?>&y=<?php echo date("Y"); ?>&filter=zero&s=0&hq=0&dis=0&rsts=0&md=4">FA Profile</a></li>
  <li><a href="f_rsalarym.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m");?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4">FA Expense</a></li>
  <li><a href="f_rattd.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m"); ?>&y=<?php echo date("Y"); ?>&filter=zero&s=0&hq=0&dis=0">Attendance</a></li>
</ul>
</li>
<?php /** FA *c3*/ ?>

<?php } elseif($SpPDept==6 AND ($SpGradeP==76 OR $SpGradeP==77)){ ?> 
<?php /** FA *o4*/ ?>
<li class="top"><a href="#" id="privacy" class="top_link"><span class="down">FIELD ASSISTANT<font color="#FFFF00">(FA)</font></span></a>
 <ul class="sub">
  <li style="text-align:center;font-family:Times New Roman;"><b style="color:#8000FF;font-size:14px;">Reports</b></li>
  <li><a href="f_profilea.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m"); ?>&y=<?php echo date("Y"); ?>&filter=zero&s=0&hq=0&dis=0">FA Profile</a></li>
 <li><a href="f_rsalarya.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m");?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4">FA Expense</a></li>
 <li><a href="f_rattda.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m");?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4">FA Attendance</a></li>
</ul>
</li>
<?php /** FA *c4*/ ?>
<?php } ?>
	
<?php /******************** FA CLOSE ******************************/	?>
<?php /******************** FA CLOSE ******************************/	?>
<?php //} ?>


<?php 
// RCP & MRP OPEN RCP & MRP OPEN //
// RCP & MRP OPEN RCP & MRP OPEN // 

/*
$cks=mysql_query("select * from erp_empassign_rcpmrp where EmpId=".$EmployeeId." AND WorkName='RCP' AND Sts='A'",$con2); $ckr=mysql_num_rows($cks); 
$ck2s=mysql_query("select * from erp_empassign_rcpmrp where EmpId=".$EmployeeId." AND WorkName='MRP' AND Sts='A'",$con2); $ck2r=mysql_num_rows($ck2s);

if($ckr>0){ echo '<li class="top"><a href="erprcp.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&m='.date("m").'&y='.$resye['YearId'].'&erne=4e&ernw=234&erney=110&s=0&hq=0&md=4&rsts=0&crop=1" class="top_link">RCP</a></li>'; } 

if($ck2r>0){ echo '<li class="top"><a href="erpmrp.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&m='.date("m").'&y='.$resye['YearId'].'&erne=4e&ernw=234&erney=111&s=0&hq=0&md=4&rsts=0&crop=1&branch=0" class="top_link">MRP</a></li>'; }
*/
// RCP & MRP CLOSE RCP & MRP CLOSE //
// RCP & MRP CLOSE RCP & MRP CLOSE //  
?>


<?php /*<li class="top"><a href="SalesPlan.php?e=$4e&w=234&y=10234&e=4e2&e=4e&w=234&y=110022344&retd=ee&rr=09drfGe&S=eewwqq&wwrew=t%T@sed818&d=101&va=1234" class="top_link">SALES PLAN</a> </li> <li class="top"><a href="#" class="top_link">DETAILS</a> </li> */ ?> 
</ul> 
<?php } ?> 
	 
