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
if(window.attachEvent) window.attachEvent("onload", stuHover);
</script>
<span class="preload1"></span>
<span class="preload2"></span>
<?php 
$EmployeeId=$_SESSION['EmployeeID']; $CompanyId=$_SESSION['CompanyId']; $YearId=$_SESSION['YearId'];
$EntP=$_SESSION['EntryPlan']; $RslP=$_SESSION['ResultPlan']; $rowRpt=$_SESSION['rowRpt']; $rtl=$_SESSION['rtl'];
$EmpState=$_SESSION['StateId'];

if($EmpState==1 OR $EmpState==2 OR $EmpState==3){ $pageVlu='SalesEntry.php'; }
elseif($EmpState==4 ){ $pageVlu='Sales22Entry.php'; }
elseif($EmpState==5){ $pageVlu='Sales3Entry.php'; }
elseif($EmpState==6 OR $EmpState==7 OR $EmpState==8 OR $EmpState==9){ $pageVlu='Sales4Entry.php'; }
elseif($EmpState==10 OR $EmpState==11 OR $EmpState==12){ $pageVlu='Sales55Entry.php'; }
elseif($EmpState==13 OR $EmpState==14){ $pageVlu='Sales66Entry.php'; }
elseif($EmpState==15){ $pageVlu='Sales7Entry.php'; }
elseif($EmpState==16){ $pageVlu='Sales88Entry.php'; }
elseif($EmpState==17 OR $EmpState==18 OR $EmpState==19 OR $EmpState==20 OR $EmpState==21){ $pageVlu='Sales99Entry.php'; }
elseif($EmpState==22){ $pageVlu='Sales1010Entry.php'; }
elseif($EmpState==23){ $pageVlu='Sales1111Entry.php'; }
elseif($EmpState==24 OR $EmpState==25){ $pageVlu='Sales1212Entry.php'; }
elseif($EmpState==26 OR $EmpState==27 OR $EmpState==28){ $pageVlu='Sales1313Entry.php'; }
elseif($EmpState==29 OR $EmpState==30 OR $EmpState==31){ $pageVlu='Sales1414Entry.php'; }
elseif($EmpState==32 OR $EmpState==33){ $pageVlu='Sales1515Entry.php'; }
elseif($EmpState==34 OR $EmpState==35 OR $EmpState==36){ $pageVlu='Sales16Entry.php'; }
elseif($EmpState==37 OR $EmpState==38){ $pageVlu='Sales1717Entry.php'; }
else{ $pageVlu='Sales1818Entry.php'; }

if($_SESSION['rowRpt']>0){$rpt=1;}else{$rpt=0;} $hq=$_SESSION['HqId'];
if(date("m")==4 OR date("m")==5 OR date("m")==6){$qtr=1;}elseif(date("m")==7 OR date("m")==8 OR date("m")==9){$qtr=2;}
elseif(date("m")==10 OR date("m")==11 OR date("m")==12){$qtr=3;}
elseif(date("m")==1 OR date("m")==2 OR date("m")==3){$qtr=4;} 

if($_SESSION['EmpStatus']=='A' AND ($_SESSION['DepartmentId']==6 OR $_SESSION['DepartmentId']==17 OR $_SESSION['DepartmentId']==18 OR $_SESSION['DepartmentId']==23 OR $EmployeeId==1772)){  ?>

<ul id="nav">
 <li class="top">&nbsp;&nbsp;</li>
 <li class="top"><a href="Index.php?EI=<?php echo $EmployeeId; ?>&Event=Edit&oo=we&p=g&ok=true&rslt=y&pp=qw_res##ius&ere=wer&yet=werwer&act=truedflase&we=1232123&rer%sas%" class="top_link"><span>Home</span></a></li>
    
<?php if($_SESSION['DepartmentId']==6 AND ($_SESSION['GradeId']==61 OR $_SESSION['GradeId']==62 OR $_SESSION['GradeId']==63 OR $_SESSION['GradeId']==64 OR $_SESSION['GradeId']==65 OR $_SESSION['GradeId']==66 OR $_SESSION['GradeId']==67))
{ ?>

 <li class="top"><a href="<?php echo $pageVlu;?>?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act=<?php echo $rpt; ?>&hq=0&y=<?php echo $_SESSION['YearId']; ?>&q=<?php echo $qtr; ?>&ii=0&vc=1&fc=0&cc=0&di=<?php echo $_SESSION['DepartmentId']; ?>&gi=<?php echo $_SESSION['GradeId']; ?>&EHq=<?php echo $EmployeeId; ?>&myh=0&myt=0" class="top_link">Sales Plan <font color="#FFFFFF">(Entry)</font></a></li>
 <li class="top"><a href="SalesDetails.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $_SESSION['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0" class="top_link">Sales Plan  <font color="#FFFFFF">(Overall)</font></a></li>
 <li class="top"><a href="SalesTReports.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi=<?php echo $_SESSION['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&qtr=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1&HqWise=1&DisWise=0&SelHq=0&SelDis=0&rpt=<?php echo $rpt; ?>&crp=0&Bclick=0" class="top_link">Reports <font color="#FFFFFF">(Details)</font></a></li>
  <?php if($_SESSION['rowERev']>0){ ?><li class="top"><a href="SalesRevise.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $_SESSION['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0" class="top_link">SSales Plan  <font color="#FFFFFF">(Revised)</font></a></li><?php } ?>
	
<?php } elseif($_SESSION['DepartmentId']==6 AND ($_SESSION['GradeId']==68 OR $_SESSION['GradeId']==69 OR $_SESSION['GradeId']==70 OR $_SESSION['GradeId']==71))
{ ?>

 <li class="top"><a href="SalesaEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act=<?php echo $rpt; ?>&hq=0&y=<?php echo $_SESSION['YearId']; ?>&q=<?php echo $qtr; ?>&ii=0&vc=1&fc=0&cc=0&di=<?php echo $_SESSION['DepartmentId']; ?>&gi=<?php echo $_SESSION['GradeId']; ?>&EHq=<?php echo $EmployeeId; ?>&SelTerr=0&myh=0&myt=0" class="top_link">Sales Plan <font color="#FFFFFF">(Entry)</font></a></li>
 <li class="top"><a href="SalesaDetails.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $_SESSION['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0" class="top_link">Sales Plan  <font color="#FFFFFF">(Overall)</font></a></li>
 <li class="top"><a href="SalesTaReports.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi=<?php echo $_SESSION['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&qtr=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1&HqWise=0&DisWise=0&SelHq=0&SelDis=0&rpt=<?php echo $rpt; ?>&crp=0&Bclick=0&SelName=0&NameWise=1" class="top_link">Reports <font color="#FFFFFF">(Details)</font></a></li>
 <?php if($_SESSION['rowERev']>0){ ?><li class="top"><a href="SalesaRevise.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $_SESSION['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0" class="top_link">Sales Plan <font color="#FFFFFF">(Revised)</font></a></li><?php } ?>
	
<?php } elseif($_SESSION['DepartmentId']==6 AND ($_SESSION['GradeId']==72 OR $_SESSION['GradeId']==73 OR $_SESSION['GradeId']==74 OR $_SESSION['GradeId']==75))
{ ?> 

 <li class="top"><a href="SalesrEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act=<?php echo $rpt; ?>&hq=0&y=<?php echo $_SESSION['YearId']; ?>&q=<?php echo $qtr; ?>&ii=0&vc=1&fc=0&cc=0&di=<?php echo $_SESSION['DepartmentId']; ?>&gi=<?php echo $_SESSION['GradeId']; ?>&EHq=<?php echo $EmployeeId; ?>&SelTerr=0&myh=0&myt=0" class="top_link">Sales Plan  <font color="#FFFFFF">(Entry)</font></a></li> 
 <li class="top"><a href="SalesrDetails.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $_SESSION['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0" class="top_link">Sales Plan  <font color="#FFFFFF">(Overall)</font></a></li>
 <li class="top"><a href="SalesTrReports.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi=<?php echo $_SESSION['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&qtr=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1&HqWise=0&DisWise=0&SelHq=0&SelDis=0&rpt=<?php echo $rpt; ?>&crp=0&Bclick=0&SelName=0&NameWise=0&SelZone=0&ZoneWise=1" class="top_link">Reports <font color="#FFFFFF">(Details)</font></a></li>
 <?php if($_SESSION['rowERev']>0){ ?><li class="top"><a href="SalesrRevise.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $_SESSION['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0" class="top_link">Sales Plan  <font color="#FFFFFF">(Revised)</font></a></li><?php } ?>
	
<?php } elseif($_SESSION['DepartmentId']==6 AND ($_SESSION['GradeId']==76 OR $_SESSION['GradeId']==77))
{ ?> 
    
 <li class="top"><a href="SaleshEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act=<?php echo $rpt; ?>&hq=0&y=<?php echo $_SESSION['YearId']; ?>&q=<?php echo $qtr; ?>&ii=0&vc=1&fc=0&cc=0&di=<?php echo $_SESSION['DepartmentId']; ?>&gi=<?php echo $_SESSION['GradeId']; ?>&EHq=<?php echo $EmployeeId; ?>&SelTerr=0&myh=0&myt=0" class="top_link">Sales Plan  <font color="#FFFFFF">(Entry)</font></a></li>
 <li class="top"><a href="SalesThReports.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi=<?php echo $_SESSION['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&qtr=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1&HqWise=0&DisWise=0&SelHq=0&SelDis=0&rpt=<?php echo $rpt; ?>&crp=0&Bclick=0&SelName=0&NameWise=0&SelZone=0&ZoneWise=0&SelCon=0&ConWise=1" class="top_link">Reports <font color="#FFFFFF">(Details)</font></a></li>

<?php } ?>	

 <?php if($_SESSION['EmpStatus']=='A' AND ($_SESSION['DepartmentId']==6 OR $_SESSION['DepartmentId']==17 OR $_SESSION['DepartmentId']==18 OR $_SESSION['DepartmentId']==23)){ ?>
 
 <li class="top"><a href="Combsplan.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $_SESSION['YearId']; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5&eei=<?php echo $EmployeeId; ?>" class="top_link">Export </a></li>
 <?php } ?>

<?php /******************** FA OPEN FA OPEN FA OPEN FA OPEN FA OPEN ******************************/?>
<?php /******************** FA OPEN FA OPEN FA OPEN FA OPEN FA OPEN ******************************/?>

<li class="top"><a href="#" id="privacy" class="top_link"><span class="down">Field Assistant<font color="#FFFFFF">(FA)</font></span></a>
 <ul class="sub">
 <?php if($_SESSION['rowEq']>0 OR $EmployeeId==1772)
 { ?>  
  <li style="text-align:center;font-family:Times New Roman;"><b style="color:#8000FF;font-size:14px;">Process</b></li>
  <li><a href="f_request.php?ern1=r114&ern2w=234&ern3y=10234&a=1&b=1&c=1&d=1&e=1&f=1&s=0">FA Request</a></li>
  <li><a href="f_removel.php?eew=234&m=<?php echo date("m");?>&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=All&rsts=0">FA Removel</a></li>
  <li><a href="f_chngmode.php?eew=234&m=<?php echo date("m");?>&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=All&rsts=0">Change FA Mode</a></li>
  <li><a href="f_claim.php?ern1=r114&ern2w=234&ern3y=10234&m=<?php echo date("m", strtotime("-1 months", strtotime(date("Y-m-d"))));?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=0">Expense Claim</a></li>
 <?php } //if($_SESSION['rowEq']>0)?>
  
 <?php $sqlEr=mysql_query("select * from hrm_employee_reporting where (AppraiserId=".$EmployeeId." OR ReviewerId=".$EmployeeId." OR HodId=".$EmployeeId.")",$con); $rowRr=mysql_num_rows($sqlEr); ?>
 
 <?php if($rowRr>0 OR $EmployeeId==1772)
 { ?>
  <li style="text-align:center;font-family:Times New Roman;"><b style="color:#8000FF;font-size:14px;">Approval</b></li>
  <li><a href="f_request_approval.php?ern1=r114&ern2w=234&ern3y=10234&p=0&a=0&r=0">New-FA Request App.</a></li>
  <li><a href="f_removal_approval.php??eew=234&m=<?php echo date("m");?>&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=All&rsts=0">Removal App.</a></li>
  <li><a href="f_chngmode_approval.php?eew=234&m=<?php echo date("m");?>&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=All&rsts=0">Mode-Change App.</a></li>
  
  <li><a href="f_claimApp.php?ern1=r114&ern2w=234&ern3y=10234&m=<?php echo date("m", strtotime("-1 months", strtotime(date("Y-m-d"))));?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=0">FA Expense</a></li>
  
  <?php /*?><li><a href="f_attd.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m"); ?>&y=<?php echo date("Y"); ?>&filter=zero&s=0&hq=0&dis=0&rbm=0&abm=0">Attendance</a></li><?*/?>
  
  <?php /*?><li><a href="f_removelApp.php?eew=234&m=<?php echo date("m");?>&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=All&rsts=0">FA Removel</a></li>
  <li><a href="f_chngmodeApp.php?eew=234&m=<?php echo date("m");?>&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=All&rsts=0">FA Mode-Change</a></li><?php */?>
 <?php } //if($rowRr>0) ?>
 
 
 <?php if($_SESSION['rowEq']>0 OR $rowRr>0 OR $_SESSION['GradeId']==76 OR $_SESSION['GradeId']==77 OR $EmployeeId==1772)
 { ?> 
  <li style="text-align:center;font-family:Times New Roman;"><b style="color:#8000FF;font-size:14px;">Reports</b></li>
  <li><a href="f_profile.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m"); ?>&y=<?php echo date("Y"); ?>&filter=zero&s=0&hq=0&dis=0&rsts=0&md=4">FA Profile</a></li>
  <li><a href="f_rattd.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m"); ?>&y=<?php echo date("Y"); ?>&filter=zero&s=0&hq=0&dis=0">Attendance</a></li>
  <li><a href="f_rsalary.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m");?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4">FA Expense</a></li>
 <?php } ?>
 
 </ul>
</li>
 <!--<li class="top"><a href="sales_policy/vnr_sales_and_distribution_policy.pdf" download class="top_link">Sales Policy </a> </li>-->
 <!--<li class="top"><a href="#" id="privacy" class="top_link"><span class="down">Downloads</a>-->
 <!--<ul class="sub">-->
 <!--    <li><a href="downloads/Distributor Proposal Format-FC.xlsx" download>Customer Proposal-FC</a></li>-->
 <!--    <li><a href="downloads/Distributor Proposal Format-VC.xlsx" download>Customer Proposal-VC</a></li>-->
 <!--    <li><a href="downloads/FC-Distributorship Appointment Form.pdf" download>Appointment Kit-FC</a></li>-->
 <!--    <li><a href="downloads/VC-Distributorship Appointment Form.pdf" download>Appointment Kit-VC</a></li>-->
 <!--    <li><a href="downloads/Gift Acknowledgement Copy.pdf" download>Gift Receiving</a></li>-->
 <!--    <li><a href="downloads/Product Complaint-Form-C.pdf" download>Form-C</a></li>-->
 <!--    <li><a href="downloads/Utkarsh 2022-23 (English).pdf" download>Utkarsh Scheme</a></li>-->
 <!--</ul>-->
 <!--</li>-->
<?php /******************** FA CLOSE FA CLOSE FA CLOSE FA CLOSE ******************************/	?>
<?php /******************** FA CLOSE FA CLOSE FA CLOSE FA CLOSE ******************************/	?>




<?php /******************** FA OPEN FA OPEN FA OPEN FA OPEN FA OPEN ******************************/?>
<?php /******************** FA OPEN FA OPEN FA OPEN FA OPEN FA OPEN ******************************?>
<?php 
$sqlEr=mysql_query("select RepEmployeeID from hrm_employee_general where EmployeeID=".$EmployeeId,$con);
$rowRr=mysql_num_rows($sqlEr);

if($_SESSION['DepartmentId']==6 AND ($_SESSION['GradeId']==63 OR $_SESSION['GradeId']==64 OR $_SESSION['GradeId']==65 OR $_SESSION['GradeId']==66 OR $_SESSION['GradeId']==67 OR $_SESSION['GradeId']==68 OR $_SESSION['GradeId']==69 OR $_SESSION['GradeId']==70 OR $_SESSION['GradeId']==71)){ ?>
	
<?php /** FA *o1* ?>
<li class="top"><a href="#" id="privacy" class="top_link"><span class="down">FIELD ASSISTANT<font color="#FFFFFF">(FA)</font></span></a>
 <ul class="sub">
 <?php if($_SESSION['rowEq']>0){ ?>  
  <li style="text-align:center;font-family:Times New Roman;"><b style="color:#8000FF;font-size:14px;">Process</b></li>
  <li><a href="f_request.php?ern1=r114&ern2w=234&ern3y=10234&a=1&b=1&c=1&d=1&e=1&f=1&s=0">FA Request</a></li>
  <li><a href="f_claim.php?ern1=r114&ern2w=234&ern3y=10234&m=<?php echo date("m", strtotime("-1 months", strtotime(date("Y-m-d"))));?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=0">Expense Claim</a></li>
  <li><a href="f_removel.php?eew=234&m=<?php echo date("m");?>&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=All&rsts=0">FA Removel</a></li>
  <li><a href="f_chngmode.php?eew=234&m=<?php echo date("m");?>&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=All&rsts=0">Change FA Mode</a></li>
  
  
  <?php if($rowRr>0){ ?>
  <li style="text-align:center;font-family:Times New Roman;"><b style="color:#8000FF;font-size:14px;">Approval</b></li>
  <li><a href="f_claimApp.php?ern1=r114&ern2w=234&ern3y=10234&m=<?php echo date("m", strtotime("-1 months", strtotime(date("Y-m-d"))));?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=0">FA Expense</a></li>
  <li><a href="f_removelApp.php?eew=234&m=<?php echo date("m");?>&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=All&rsts=0">FA Removel</a></li>
  <li><a href="f_chngmodeApp.php?eew=234&m=<?php echo date("m");?>&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=All&rsts=0">FA Mode-Change</a></li>
  <?php } ?>
  
  
 <?php } ?>  
  <li style="text-align:center;font-family:Times New Roman;"><b style="color:#8000FF;font-size:14px;">Reports</b></li>
  <li><a href="f_profile.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m"); ?>&y=<?php echo date("Y"); ?>&filter=zero&s=0&hq=0&dis=0&rsts=0&md=4">FA Profile</a></li>
  <li><a href="f_rattd.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m"); ?>&y=<?php echo date("Y"); ?>&filter=zero&s=0&hq=0&dis=0">Attendance</a></li>
  <li><a href="f_rsalary.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m");?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4">FA Expense</a></li>
 </ul>
</li>
<?php /** FA *c1* ?>

<?php } elseif($_SESSION['DepartmentId']==6 AND ($_SESSION['GradeId']==72 OR $_SESSION['GradeId']==73 OR $_SESSION['GradeId']==74 OR $_SESSION['GradeId']==75)){ ?> 

<?php /** FA *o2* ?>
<li class="top"><a href="#" id="privacy" class="top_link"><span class="down">FIELD ASSISTANT<font color="#FFFFFF">(FA)</font></span></a>
 <ul class="sub">
 <?php if($_SESSION['rowEq']>0){ ?> 
  <li style="text-align:center;font-family:Times New Roman;"><b style="color:#8000FF;font-size:14px;">Process</b></li>
  <li><a href="f_request.php?ern1=r114&ern2w=234&ern3y=10234&a=1&b=1&c=1&d=1&e=1&f=1&s=0">FA Request</a></li>
  <li><a href="f_claim.php?ern1=r114&ern2w=234&ern3y=10234&m=<?php echo date("m", strtotime("-1 months", strtotime(date("Y-m-d"))));?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=0">Expense Claim</a></li>
  <li><a href="f_removel.php?eew=234&m=<?php echo date("m");?>&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=All&rsts=0">FA Removel</a></li>
  <li><a href="f_chngmode.php?eew=234&m=<?php echo date("m");?>&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=All&rsts=0">Change FA Mode</a></li>
  
 <?php } ?> 
 
   <?php if($rowRr>0){ ?>
  <li style="text-align:center;font-family:Times New Roman;"><b style="color:#8000FF;font-size:14px;">Approval</b></li>
  <li><a href="f_claimApp.php?ern1=r114&ern2w=234&ern3y=10234&m=<?php echo date("m", strtotime("-1 months", strtotime(date("Y-m-d"))));?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=0">FA Expense</a></li>
  <li><a href="f_removelApp.php?eew=234&m=<?php echo date("m");?>&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=All&rsts=0">FA Removel</a></li>
  <li><a href="f_chngmodeApp.php?eew=234&m=<?php echo date("m");?>&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=All&rsts=0">FA Mode-Change</a></li>
  <?php } ?>
 
 
 <?php if($_SESSION['GradeId']==74 OR $_SESSION['GradeId']==75){ ?><li><a href="f_requestgm.php?ern1=r114&ern2w=234&ern3y=10234&a=0&b=1&c=0&d=0&e=0&f=0&s=0">FA Req. Approval<font color="#0080FF"><?php echo ' ('.$_SESSION['rowPnd'].')'; ?></font></a></li><li><a href="f_chngmodegm.php?eew=234&m=<?php echo date("m");?>&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=All&rsts=0">Change FA Mode</a></li><?php } ?>

 <?php if($_SESSION['rowgm2']>0){ ?>
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
<?php /** FA *c2* ?>

<?php } elseif($_SESSION['DepartmentId']==6 AND ($_SESSION['GradeId']==76 OR $_SESSION['GradeId']==77)){ ?> 

<?php /** FA *o3* ?>
<li class="top"><a href="#" id="privacy" class="top_link"><span class="down">FIELD ASSISTANT<font color="#FFFFFF">(FA)</font></span></a>
 <ul class="sub">
  <li style="text-align:center;font-family:Times New Roman;"><b style="color:#8000FF;font-size:14px;">Reports</b></li>
  <li><a href="f_profilea.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m"); ?>&y=<?php echo date("Y"); ?>&filter=zero&s=0&hq=0&dis=0">FA Profile</a></li>
  <li><a href="f_rsalarya.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m");?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4">FA Expense</a></li>
  <li><a href="f_rattda.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m");?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4">FA Attendance</a></li>
 </ul>
</li>
<?php /** FA *c3* ?>

<?php } ?>
	
<?php /******************** FA CLOSE FA CLOSE FA CLOSE FA CLOSE ******************************/	?>
<?php /******************** FA CLOSE FA CLOSE FA CLOSE FA CLOSE ******************************/	?>


<?php /*
// RCP & MRP OPEN RCP & MRP OPEN RCP & MRP OPEN RCP & MRP OPEN RCP & MRP OPEN RCP & MRP OPEN //
// RCP & MRP OPEN RCP & MRP OPEN RCP & MRP OPEN RCP & MRP OPEN RCP & MRP OPEN RCP & MRP OPEN // 

$cks=mysql_query("select * from erp_empassign_rcpmrp where EmpId=".$EmployeeId." AND WorkName='RCP' AND Sts='A'",$con2);  
$ck2s=mysql_query("select * from erp_empassign_rcpmrp where EmpId=".$EmployeeId." AND WorkName='MRP' AND Sts='A'",$con2); $ckr=mysql_num_rows($cks); $ck2r=mysql_num_rows($ck2s);
if($ckr>0){ echo '<li class="top"><a href="erprcp.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&m='.date("m").'&y='.$_SESSION['YearId'].'&erne=4e&ernw=234&erney=110&s=0&hq=0&md=4&rsts=0&crop=1" class="top_link">RCP</a></li>'; } 
if($ck2r>0){ echo '<li class="top"><a href="erpmrp.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&m='.date("m").'&y='.$_SESSION['YearId'].'&erne=4e&ernw=234&erney=111&s=0&hq=0&md=4&rsts=0&crop=1&branch=0" class="top_link">MRP</a></li>'; }

// RCP & MRP CLOSE RCP & MRP CLOSE  RCP & MRP CLOSE  RCP & MRP CLOSE  RCP & MRP CLOSE  RCP & MRP CLOSE //
// RCP & MRP CLOSE RCP & MRP CLOSE  RCP & MRP CLOSE  RCP & MRP CLOSE  RCP & MRP CLOSE  RCP & MRP CLOSE //  
*/ ?>

<?php /*<li class="top"><a href="SalesPlan.php?e=$4e&w=234&y=10234&e=4e2&e=4e&w=234&y=110022344&retd=ee&rr=09drfGe&S=eewwqq&wwrew=t%T@sed818&d=101&va=1234" class="top_link">SALES PLAN</a> </li> <li class="top"><a href="#" class="top_link">DETAILS</a> </li> */ ?> 

</ul> 

<?php } //if($_SESSION['EmpStatus']=='A' AND $_SESSION['DepartmentId']==6) ?> 
	 
