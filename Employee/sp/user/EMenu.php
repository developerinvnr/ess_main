<script language="javascript" type="text/javascript"> 
stuHover = function(){ var cssRule; var newSelector;
 for (var i = 0; i < document.styleSheets.length; i++) for (var x = 0; x < document.styleSheets[i].rules.length ; x++)
 { cssRule = document.styleSheets[i].rules[x]; 
   if (cssRule.selectorText.indexOf("LI:hover") != -1) { newSelector = cssRule.selectorText.replace(/LI:hover/gi, "LI.iehover");
	                                                     document.styleSheets[i].addRule(newSelector , cssRule.style.cssText); } }
 var getElm = document.getElementById("nav").getElementsByTagName("LI");
 for (var i=0; i<getElm.length; i++) { getElm[i].onmouseover=function() { this.className+=" iehover"; }
   getElm[i].onmouseout=function() { this.className=this.className.replace(new RegExp(" iehover\\b"), ""); } }
} if (window.attachEvent) window.attachEvent("onload", stuHover);
</script>
<?php if(($UserType=='S' OR $UserType=='A' OR $UserType=='U') AND $Sts=='A') { ?>
<?php if(date("m")==4 OR date("m")==5 OR date("m")==6){$qtr=1;}elseif(date("m")==7 OR date("m")==8 OR date("m")==9){$qtr=2;}
 elseif(date("m")==10 OR date("m")==11 OR date("m")==12){$qtr=3;}elseif(date("m")==1 OR date("m")==2 OR date("m")==3){$qtr=4;} ?>
<span class="preload1"></span><span class="preload2"></span>
<ul id="nav">
<li class="top"><a href="Index.php?act=441&ee=421&d=true2&c=false&d=dreefoultValue&u=UsuuerI&tt=valuased&desgn=Trern&main=FTrue%False" class="top_link"><span>Home</span></a></li>
<?php /************************************************************************ MASTERS ***********************************************************/ ?> 					
					
<?php if($resSp['Master']=='Y'){ ?>					
<li class="top"><a href="#" id="privacy" class="top_link"><span class="down">Masters</span></a> 
 <ul class="sub">  
  <?php if($resSp['CMaster']=='Y'){ ?> 
  <li><b style="color:#8000FF; font-size:14px;font-family:Times New Roman;font-weight:bold;">Crop Mast</b></li>
  <li><a href="SalesSeedsItem.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%F1&tt=valuased&desgn=Trern&main=FTrue%False">Crop Name</a></li>
  <li><a href="SalesSeedsProduct.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&tt=valuased&desgn=Trern&main=FTrue%False">Product Name</a></li>	
  <li><a href="SalesSeedsSize.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&tt=valuased&desgn=Trern&main=FTrue%False">Packing Size</a></li>
  <li><a href="SalesSeedsUnit.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&tt=valuased&desgn=Trern&main=FTrue%False">Packing Unit/Type</a></li>
  <li><a href="SalesSeedsPacking.php?ac=2441&ee=2421&der=true2&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False">Product Packing</a></li>
  <?php } if($resSp['SMaster']=='Y'){ ?>	    
  <li><b style="color:#8000FF; font-size:14px;font-family:Times New Roman;font-weight:bold;">Sales Mast</b></li>
  <?php /*
  <li><a href="SalesTeam.php?act=441&ee=421&d=true2&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False">Sales Team</a></li> */ ?>
  <li><a href="SHeadQuater.php?act=441&ee=421&d=true2&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False">Head Quarter</a></li>
  <li><a href="TLEmp.php?ac=4441&ccc=false&d=dreefoultVlue&tt=valuased&desgn=Trern&c=1&s=0&hq=0">Add TL Emp</a></li>
  
  <li><a href="f_emp.php?ac=4441&ccc=false&d=dreefoultVlue&tt=valuased&desgn=Trern&c=1&s=0&hq=0">Add FA Emp</a></li>

  <li><a href="ArrengeHq.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&nw=234&erney=1122344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&y2=<?php echo $YearId; ?>&y3=<?php echo $YearId; ?>&yAchQ=<?php echo $YearId; ?>">Arrange HQ</a></li>
  <li><a href="ArrengeProd.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1">Arrange Product</a></li>

  <li><a href="SHeadZone.php?act=441&ee=421&d=true2&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False">Zone</a></li>
  <li><a href="SHeadZoneState.php?act=441&ee=421&d=true2&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False">Zone-State</a></li>
  
  <li><a href="SalesDistriName.php?ac=4441&ee=4421&der=t3&ccc=false&d=dreefoultVlue&u=UsuuerIo&trht=FTF%%FT&tt=valuased&desgn=Trern&c=0&s=0&hq=0&z=0">Distributors Details</a></li>
  <?php /*
  <li><a href="SalesDealerName.php?ac=4441&ee=4421&der=t3&c=false&d=dreefoultValue&u=UsuuerIo&trht=FTF%%FT&tt=valuased&desgn=Trern&main=FTrue%False">Distributors Details</a></li>
  */ ?>
  <li><a href="ArrengeDealer.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&nw=234&erney=1122344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&y2=<?php echo $YearId; ?>&y3=<?php echo $YearId; ?>&yAchQ=<?php echo $YearId; ?>">Arrange Distributors</a></li>
  <li><a href="AssignHqTeam.php?ac=4441&ee=4421&der=t3&c=false&d=drtValue&u=UsuuerIo&trht=FTF%%FT1&tt=valuased&desgn=Trern&main=FTrue%False&c=0&s=0">Assign HQ Territory</a></li>
  <li><a href="AssignStateTeam.php?ac=4441&ee=4421&der=t3&c=false&d=drtValue&u=UsuuerIo&trht=FTF%%FT1&tt=valuased&desgn=Trern&main=FTrue%False&c=0&s=0">Assign State Emp</a></li>

  <?php } if($resSp['UMaster']=='Y'){ ?>
  <li><b style="color:#8000FF; font-size:14px;font-family:Times New Roman;font-weight:bold;">User Mast</b></li>
  <li><a href="UserMaster.php?ern1=r114&ernS=eewwqq&c=1&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&ta=1&tb=1">User</a></li>
  <li><a href="SEbillSt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=1&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&ta=1&tb=1">User State</a></li>
  <?php } ?>
 </ul>
</li>

<?php /************************************************************************ IMPORTS ***********************************************************/ ?>   	
<?php } if($resSp['Import']=='Y'){ ?>  	
<?php if(date("m")!=1){$em=date("m")-1;}elseif(date("m")==1){$em=12;} ?>
<li class="top"><a href="#" id="privacy" class="top_link"><span class="down">Key</span></a>
 <ul class="sub"> 
  <li><a href="SetPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&y2=<?php echo $YearId; ?>&y3=<?php echo $YearId; ?>&yAchQ=<?php echo $YearId; ?>">Setting Year</a></li>
  <li><a href="Import_SetPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&y2=<?php echo $YearId; ?>&y3=<?php echo $YearId; ?>&yAchQ=<?php echo $YearId; ?>&mAchQ=<?php echo $em; ?>&yAchQ33=<?php echo $YearId; ?>&mAchQ33=<?php echo $em; ?>">Import Monthly Sales</a></li>

  <li><a href="DupValue.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&y2=<?php echo $YearId; ?>&y3=<?php echo $YearId; ?>&yAchQ=<?php echo $YearId; ?>&mAchQ=<?php echo $em; ?>">Duplicate Value</a></li>

  <li><a href="PlanHideShow.php?ac=4441&ee=4421&der=t3&c=false&d=drtValue&u=UsuuerIo&trht=FTF%%FT1&tt=valuased&desgn=Trern&main=FTrue%False&c=0&s=0">Plan Hide/Show</a></li>
  <li><a href="#" class="fly">Revised</a>
  <ul>
   <li><a href="PlanRevisedMonth.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq">Setting Month</a></li>
   <li><a href="PlanRevisedEmp.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=0&m=0&qtr=0&ymq=0">Setting Employee</a></li> 
  </ul>
  </li>
 </ul>
<?php /*
 <ul class="sub">  
  <li><a href="SetPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&y2=<?php echo $YearId; ?>&y3=<?php echo $YearId; ?>&yAchQ=<?php echo $YearId; ?>">One By One</a></li>
  
  <li><a href="SetPlanO.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&y2=<?php echo $YearId; ?>&y3=<?php echo $YearId; ?>&yAchQ=<?php echo $YearId; ?>">All Year</a></li>
  
  <li><a href="Set2Plan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&y2=<?php echo $YearId; ?>&y3=<?php echo $YearId; ?>&yAchQ=<?php echo $YearId; ?>">Sales Overall</a></li>
  <li><a href="Set2YPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&y2=<?php echo $YearId; ?>&y3=<?php echo $YearId; ?>&yAchQ=<?php echo $YearId; ?>">Sales Year Wise</a></li>	
 </ul>
 */ ?>
</li> 



<?php /************************************************************************ IMPORTS Extra ***********************************************************/ ?>   	
<?php } if($resSp['ImportExt']=='Y'){ ?>  	
<?php if(date("m")!=1){$em=date("m")-1;}elseif(date("m")==1){$em=12;} ?>
<li class="top"><a href="#" id="privacy" class="top_link"><span class="down">Import</span></a>
 <ul class="sub"> 
  <li><a href="Import_SetPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&y2=<?php echo $YearId; ?>&y3=<?php echo $YearId; ?>&yAchQ=<?php echo $YearId; ?>&mAchQ=<?php echo $em; ?>&yAchQ33=<?php echo $YearId; ?>&mAchQ33=<?php echo $em; ?>">Import Monthly Sales</a></li>
 </ul>
</li>
 


  
<?php /************************************************** LOGISTICS ***********************/ ?>  
<?php } if($resSp['Logistic']=='Y'){ ?> 
<li class="top"><a href="#" id="privacy" class="top_link"><span class="down">Logistics</span></a>
 <ul class="sub"> 
  <?php if($resSp['LogAchi']=='Y'){ ?> 
  <li><a href="Achive.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0">Achivement</a></li>
<?php } if($resSp['FwdNote']=='Y'){ ?>
  <li><a href="ForwdNote.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=1&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0">Forwarding(Fwd) note</a></li>
  <li><a href="ForwardrlNote.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0">Fwd Note Reports</a></li>
  <li><a href="SalesLogRep.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=1&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&ta=0&tb=1&tc=0">Export-Reports</a></li>

  <?php } if($resSp['LogTest']=='Y'){ ?>
  <li><a href="SalesTtgR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=1&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&ta=0&tb=1&tc=0">Testing</a></li>
  <?php } ?> 
 </ul>
</li>
<?php /************************************************************************ PRODUCTION ***********************************************************/ ?>  
<?php } if($resSp['Production']=='Y'){ ?> 
<li class="top"><a href="#" id="privacy" class="top_link"><span class="down">Production</span></a>  <?php //Prod<sup>t</sup> ?> 
 <ul class="sub">  
  <?php if($resSp['PMaster']=='Y'){ ?>  
  <li><b style="color:#8000FF; font-size:14px;font-family:Times New Roman;font-weight:bold;">Production Mast</b></li>
  <li><a href="SalesSeedsSeason.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&tt=valuased&desgn=Trern&main=FTrue%False">Season</a></li>	
  <li><a href="SalesSeedsAreaLoc.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&tt=valuased&desgn=Trern&main=FTrue%False">Dist/ Area/ Village</a></li>
  <li><a href="SalesSeedsFarmer.php?ac=2441&ee=2421&der=true2&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False">Farmer Details</a></li>
  <li><a href="ProdStockLoc.php?grp=0&ac=2441&ee=2421&der=true2&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False&c=1">Stock Location</a></li>
  <li><a href="ProductActivity.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&tt=valuased&desgn=Trern&main=FTrue%False">Prod<sup>n</sup> Activity</a></li>
  <li><a href="VProCode.php?grp=0&ac=2441&ee=2421&der=true2&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False&c=1">Product Prod<sup>n</sup> Code</a></li>
  <li><a href="ProArea.php?grp=0&ac=2441&ee=2421&der=true2&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False&c=1">Product Area</a></li>
  <li><a href="StdProd.php?grp=0&ac=2441&ee=2421&der=true2&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False&c=1">Standard<sup>n</sup> Product</a></li>
  <?php } ?>

  <li><b style="color:#8000FF; font-size:14px;font-family:Times New Roman;font-weight:bold;">Process</b></li>
  <li><a href="ProdMActivity.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0">Month Activity</a></li>
  <li><a href="ProdPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0&c=1">Production Plan</a></li>
  <?php /*
  <li><a href="ProdAllot22.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0">Allotment22</a></li> */ ?>
  
  <li><a href="ProdAllot.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0">Allotment</a></li>
  <li><a href="ProdArivalAllot.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0&c=1">Arrival-Manual</a></li>

  
  <li><a href="ProReqNew.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0">Production Target</a></li> 
  <?php if($resSp['ProdStock']=='Y'){ ?>
  <li><b style="color:#8000FF; font-size:14px;font-family:Times New Roman;font-weight:bold;">Stock</b></li>
  <li><a href="SalesProdStock.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0&stcloc=0">Actual</a></li>
   <li><a href="SalesProdEstbStock.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0&c=1">Estmt (Before-Plan)</a></li>
   <li><a href="SalesProdEstaStock.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0&c=1">Estmt (After-Plan)</a></li>
   <li><a href="SalesProdEstManualStock.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0&c=1">Estmt Manual</a></li>

  <?php } ?>
 </ul>
</li>	
   
<?php /************************************************************************ Reports ***********************************************************/ ?>
<?php } if($resSp['Reports']=='Y'){ ?> 
<li class="top"><a href="#" id="privacy" class="top_link"><span class="down">Reports</span></a>
 <ul class="sub">  
  <?php if($resSp['ProdRep']=='Y'){ ?>
  <li><b style="color:#8000FF; font-size:14px;font-family:Times New Roman;font-weight:bold;">Prod<sup>n</sup> Reports</b></li>
  <li><a href="RptProdDtl.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1">Product Details</a></li>
  <li><a href="RptProdAreaDtl.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1">Product Area</a></li>	
  <li><a href="RptFarmerDtl.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1">Farmer Details</a></li>
  <li><a href="ProReq.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0">Requirement</a></li>
  <li><a href="Prostckwsales.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0&va=0&cr=1&m=<?php echo date("m"); ?>&diff=0">Stock with Sales</a></li>
  
  <?php } if($resSp['SalesRep']=='Y'){ ?>
  <li><b style="color:#8000FF; font-size:14px;font-family:Times New Roman;font-weight:bold;">Sales Reports</b></li>
  <li><a href="SalesDealerR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1">Distributors List</a></li>
  <li><a href="#" class="fly">Sales Plan</a>
  <ul>
  <?php /* <li><a href="SalesPlanRemp.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0">Employee Wise</a></li> */ ?>
   <li><a href="SalesPlanR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1">Dealer Wise</a></li>
   <li><a href="SalesPlanRhq.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1">Head Quarter Wise</a></li>
   <li><a href="SalesPlanRst.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1">State Wise</a></li>
   <li><a href="SalesPlanRstMlt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=2&q=<?php echo $qtr; ?>&ii=0&<?php for($no=1; $no<=35; $no++){ echo '&s'.$no.'=0'; } ?>&Qq1=1&Qq2=1&Qq3=1&Qq4=1">Multi State Wise</a></li>
   <li><a href="SalesPlanRzone.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&z=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1">Zone Wise</a></li>
   <li><a href="SalesPlanRco.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1">Country Wise</a></li>
   <li><a href="SalesPlanRemp.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0">Employee Wise</a></li>

  </ul>
  </li>
  <li><a href="Combsplan.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5">Only Target/Sales</a></li>

  <li><a href="DiffpRpt.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=1&z=0&s=0&hq=0&dil=0&e=0&grp=2&q=<?php echo $qtr; ?>&ii=0&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5">Deviation Reports</a></li>
  <li><a href="CollpRpt.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=1&z=0&s=0&hq=0&dil=0&e=0&grp=2&q=<?php echo $qtr; ?>&ii=0&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5">Collection Reports</a></li>
  <li><a href="ForwardrNote.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0">Forwarding Note</a></li>
 <?php } ?>
 </ul>
</li>
<?php } ?>


<?php /**************** FA OPEN ***********************/ ?>
<?php if($resSp['FaEdit']=='Y'){ ?>					
<li class="top"><a href="#" id="privacy" class="top_link"><span class="down">FA</span></a> 
 <ul class="sub">  
  <li><b style="color:#8000FF;font-size:14px;font-family:Times New Roman;font-weight:bold;">Master</b></li>
  <li><a href="f_assignreq.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased">Assign Request Emp</a></li>
  <li><a href="f_assigngm.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased">Assign Approval</a></li>  
  <li><a href="f_cmdate.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased">Set Claim Date</a></li>
  <li><a href="f_addfa.php?ac=2441&ee=2421&der=true2&c=false7result=true&are=2347&rt=45&tt=7&uu=%%yy&trht=FTF%%F1&tt&opt=0">Add FA</a></li>
  <li><a href="f_addfareplev.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m", strtotime("-1 months", strtotime(date("Y-m-d"))));?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rbm=0&abm=0">FA Reporting Level</a></li>

  <li><b style="color:#8000FF;font-size:14px;font-family:Times New Roman;font-weight:bold;">Process/ Request</b></li>
  <li><a href="f_attd.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m"); ?>&y=<?php echo date("Y"); ?>&filter=zero&s=0&hq=0&dis=0&rbm=0&abm=0">Attendance</a></li>
  <li><a href="f_claim.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m", strtotime("-1 months", strtotime(date("Y-m-d"))));?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rbm=0&abm=0">Claim</a></li>

<li><a href="f_courierdetails.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m", strtotime("-1 months", strtotime(date("Y-m-d"))));?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rbm=0&abm=0">Courier Details</a></li>

  <li><a href="f_removel.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m");?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=1&rbm=0&abm=0">FA Removal</a></li>
  <li><a href="f_chngmode.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m");?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rsts=1&rbm=0&abm=0">FA Mode Change</a></li>
<?php } if($resSp['FaReports']=='Y'){ ?>  
  <li><b style="color:#8000FF;font-size:14px;font-family:Times New Roman;font-weight:bold;">Reports</b></li>
 <li><a href="f_requestst.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&a=1&b=1&c=1&d=0&e=0&f=0&s=0&rbm=0&abm=0">FA Request</a></li>
 
 <li><a href="f_profile.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m"); ?>&y=<?php echo date("Y"); ?>&filter=zero&s=0&hq=0&md=4&dis=0&sts=A&rbm=0&abm=0">FA Profile</a></li>
 
 <li><a href="f_rsalary.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m");?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rbm=0&abm=0&m1=0&m2=0&m3=0&m4=0&m5=0&m6=0&m7=0&m8=0&m9=0&m10=0&m11=0&m12=0">FA Expenses</a></li>
 <li><a href="f_rattd.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=<?php echo date("m");?>&ernretd=ee&y=<?php echo date("Y");?>&s=0&hq=0&md=4&rbm=0&abm=0">FA Attendance</a></li>
 
 </ul>
</li>  
<?php } ?> 
<?php /**************** FA CLOSE ***********************/ ?> 

</li>
<?php  $EmployeeId = $_SESSION['EmployeeID'];
if($EmployeeId == 1084 || $EmployeeId==169 || $EmployeeId==28) {
?>
 <li class="top"><a href="../employee/sales_policy/vnr_sales_and_distribution_policy.pdf" download class="top_link">Sales Policy </a> </li>
 <li class="top"><a href="#" id="privacy" class="top_link"><span class="down">Downloads</a>
 <ul class="sub">
     <li><a href="../employee/downloads/Distributor Proposal Format-FC.xlsx" download>Customer Proposal-FC</a></li>
     <li><a href="../employee/downloads/Distributor Proposal Format-VC.xlsx" download>Customer Proposal-VC</a></li>
     <li><a href="../employee/downloads/FC-Distributorship Appointment Form.pdf" download>Appointment Kit-FC</a></li>
     <li><a href="../employee/downloads/VC-Distributorship Appointment Form.pdf" download>Appointment Kit-VC</a></li>
     <li><a href="../employee/downloads/Gift Acknowledgement Copy.pdf" download>Gift Receiving</a></li>
     <li><a href="../employee/downloads/Product Complaint-Form-C.pdf" download>Form-C</a></li>
     <li><a href="../employee/downloads/Utkarsh 2022-23 (English).pdf" download>Utkarsh Scheme</a></li>
 </ul>
 </li>
 <?php }  ?>
</ul>
<?php } ?>