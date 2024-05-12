<script language="javascript" type="text/javascript"> 
stuHover = function(){ var cssRule; var newSelector;
 for (var i = 0; i < document.styleSheets.length; i++)
 for (var x = 0; x < document.styleSheets[i].rules.length ; x++)
 { cssRule = document.styleSheets[i].rules[x]; 
   if (cssRule.selectorText.indexOf("LI:hover") != -1) { newSelector = cssRule.selectorText.replace(/LI:hover/gi, "LI.iehover");
	                                                     document.styleSheets[i].addRule(newSelector , cssRule.style.cssText); }
 }
 var getElm = document.getElementById("nav").getElementsByTagName("LI");
 for (var i=0; i<getElm.length; i++) 
 { getElm[i].onmouseover=function() { this.className+=" iehover"; }
   getElm[i].onmouseout=function() { this.className=this.className.replace(new RegExp(" iehover\\b"), ""); }
 }
} if (window.attachEvent) window.attachEvent("onload", stuHover);
</script>
<?php if($UserType=='S' OR $UserType=='A' OR $UserType=='U') { ?>
<span class="preload1"></span><span class="preload2"></span>
<ul id="nav">
<li class="top"><a href="Index.php?act=441&ee=421&d=true2&c=false&d=dreefoultValue&u=UsuuerI&tt=valuased&desgn=Trern&main=FTrue%False" class="top_link"><span>HOME</span></a></li>
 <?php if($resSp['CropDetails']=='Y'){ ?>
 <li class="top"><a href="#" id="privacy" class="top_link"><span class="down">MASTERS</span></a> 
  <ul class="sub">  
	 <li><b style="color:#8000FF; font-size:14px;font-family:Times New Roman;font-weight:bold;">Crop Masters</b></li>
     <li><a href="SalesSeedsItem.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%F1&tt=valuased&desgn=Trern&main=FTrue%False">Crop Name</a></li>
     <li><a href="SalesSeedsProduct.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&tt=valuased&desgn=Trern&main=FTrue%False">Product Name</a></li>	
	 <li><a href="SalesSeedsSize.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&tt=valuased&desgn=Trern&main=FTrue%False">Packing Size</a></li>
	 <li><a href="SalesSeedsUnit.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&tt=valuased&desgn=Trern&main=FTrue%False">Packing Unit/Type</a></li>
	 <li><a href="SalesSeedsPacking.php?ac=2441&ee=2421&der=true2&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False">Product Packing</a></li>	    
	<li><b style="color:#8000FF; font-size:14px;font-family:Times New Roman;font-weight:bold;">Sales Masters</b></li>
	<li><a href="SalesTeam.php?act=441&ee=421&d=true2&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False">Sales Team</a></li>
    <li><a href="SHeadQuater.php?act=441&ee=421&d=true2&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False">Head Quarter</a></li>
	<li><a href="SalesDealerName.php?ac=4441&ee=4421&der=t3&c=false&d=dreefoultValue&u=UsuuerIo&trht=FTF%%FT&tt=valuased&desgn=Trern&main=FTrue%False">Distributors Details</a></li>
	<li><a href="ArrengeDealer.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&nw=234&erney=1122344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&y2=<?php echo $YearId; ?>&y3=<?php echo $YearId; ?>&yAchQ=<?php echo $YearId; ?>">Arrange Distributors</a></li>
	<li><a href="AssignHqTeam.php?ac=4441&ee=4421&der=t3&c=false&d=drtValue&u=UsuuerIo&trht=FTF%%FT1&tt=valuased&desgn=Trern&main=FTrue%False&c=0&s=0">Assign HQ Territory</a></li>
	 <li><b style="color:#8000FF; font-size:14px;font-family:Times New Roman;font-weight:bold;">User Masters</b></li>
	 <li><a href="UserMaster.php?ern1=r114&ernS=eewwqq&c=1&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&ta=1&tb=1">User</a></li>
	 <li><a href="SEbillSt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=1&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&ta=1&tb=1">User State</a></li>
  </ul>
 </li>	
  
  
    <?php } if($resSp['DealerDetails']=='Y' OR $resSp['Achive']=='Y'){ ?> 
  <li class="top"><a href="#" id="privacy" class="top_link"><span class="down">LOGISTICS</span></a>
   <ul class="sub">  
    <?php if($resSp['DealerDetails']=='Y') { ?>
	<li><a href="Achive.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0">Achivement</a></li>
	<li><a href="SalesTtgR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=1&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&ta=1&tb=1">Testing</a></li> 
	<?php } ?>
   </ul>
  </li>	
  <?php } if($resSp['ProdDetails']=='Y'){ ?>
   <li class="top"><a href="#" id="privacy" class="top_link"><span class="down">PRODUCTION</span></a>  <?php //Prod<sup>t</sup> ?> 
   <ul class="sub">  
      <li><a href="SalesSeedsSeason.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&tt=valuased&desgn=Trern&main=FTrue%False">Season</a></li>	
	  <li><a href="SalesSeedsAreaLoc.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&tt=valuased&desgn=Trern&main=FTrue%False">Area/ Location</a></li>
	  <li><a href="SalesSeedsFarmer.php?ac=2441&ee=2421&der=true2&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False">Farmer Details</a></li>
	  <li><a href="ProductActivity.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&tt=valuased&desgn=Trern&main=FTrue%False">Activity</a></li>
	  <li><a href="ProArea.php?grp=0&ac=2441&ee=2421&der=true2&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False&c=1">Area</a></li>
	  <li><a href="ProdMActivity.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0">Month Activity</a></li>
	  <li><a href="ProdAllot.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0">Allotment</a></li>
	  <li><a href="ProReq.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0">Requirement</a></li> 
	  <li><a href="#" class="fly">Stock</a>
	   <ul>
	     <li><a href="SalesProdStock.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0">Actual</a></li>
	     <li><a href="SalesProdEstbStock.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0&c=1">Estimate (Before-Plan)</a></li>
		 <li><a href="SalesProdEstaStock.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0&c=1">Estimate (After-Plan)</a></li>
	   </ul>
	  </li>
	  <li><a href="ProdPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0&c=1">Production Plan</a></li>
	  
	  
	  
	  
	  
	  
	 
	  
	  
	  <?php /*
	  <li><a href="SalesSeedsMonth.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&tt=valuased&desgn=Trern&main=FTrue%False">Season Month</a></li>
	  
	  <li><a href="SalesProdCycle.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&tt=valuased&desgn=Trern&main=FTrue%False">Production Cycle</a></li>
	  
	  
	  <li><a href="#"><?php /* SalesSeasonMonth.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; *//* ?>&ii=0 ?>Season Month_2</a></li>
	  <li><a href="#"><?php //SalesProductSeason.php?ac=2441&ee=2421&der=true2&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False ?>Product Season</a></li>
	  <li><a href="#"><?php //SalesProductAea.php?ac=2441&ee=2421&der=true2&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False ?>Product Area</a></li>
	  
	  <li><a href="SalesProductDetails.php?ac=2441&ee=2421&der=true2&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False">Product Season/Area</a></li>
	  <li><a href="ProPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0">Plan</a></li>
	  <li><a href="AltPro.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0">Farmer Allotment</a></li>
	  <li><a href="AchPro.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0">Actual Production</a></li>
	  
	  */ ?>
   </ul>
  </li>	
  <?php } ?>  
<?php /************************************************************************ Sales Plan Close ***********************************************************/ ?>
<?php /************************************************************************ Sales Plan Open ***********************************************************/ ?>
  <?php if($resSp['Reports_sp']=='Y' OR $resSp['Reports_pd']=='Y') { ?>
  <li class="top"><a href="#" id="privacy" class="top_link"><span class="down">REPORTS</span></a>
   <ul class="sub">  
      <?php if($resSp['Reports_pd']=='Y') { ?>
	  <li><a href="#">Product Details</a></li>
	  <li><a href="#">Product Area</a></li>	
	  <li><a href="#">Farmer Details</a></li>
	  <?php } if($resSp['Reports_sp']=='Y') {?>
	  
	  <li><a href="SalesDealerR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0">Distributors List</a></li>
	  <li><a href="#" class="fly">Sales Plan</a>
	  <ul>
	  <li><a href="#">Employee Wise</a></li>
	  <li><a href="SalesPlanR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0">Dealer Wise</a></li>
	  <li><a href="SalesPlanRhq.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0">Head Quarter Wise</a></li>
	  <li><a href="SalesPlanRst.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0">State Wise</a></li>
	  <li><a href="SalesPlanRco.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0">Country Wise</a></li>
	  </ul>
	  </li>
	  <?php } ?>
   </ul>
  </li>
  <?php } ?>
  <?php if($UserType=="S" AND $resSp['UserKey_Import']=='Y'){?>
   <li class="top"><a href="#" id="privacy" class="top_link"><span class="down">IMPORT</span></a>
    <ul class="sub">  
     <li><a href="SetPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&y2=<?php echo $YearId; ?>&y3=<?php echo $YearId; ?>&yAchQ=<?php echo $YearId; ?>">One By One</a></li>
     <li><a href="Set2Plan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&y2=<?php echo $YearId; ?>&y3=<?php echo $YearId; ?>&yAchQ=<?php echo $YearId; ?>">Sales Overall</a></li>
	 <li><a href="Set2YPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&y2=<?php echo $YearId; ?>&y3=<?php echo $YearId; ?>&yAchQ=<?php echo $YearId; ?>">Sales Year Wise</a></li>	
   </ul>
  </li>	
  <?php } ?>	 
</ul>
<?php } ?>