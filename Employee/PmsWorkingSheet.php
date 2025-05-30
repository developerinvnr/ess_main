<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}else{header('Location:../index.php');}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.tdl{ font-family:Arial;font-size:12px;text-align:left; }
.tdc{ font-family:Arial;font-size:12px;text-align:center; }
.tdr{ font-family:Arial;font-size:12px;text-align:right; }
.rinput{font-family:Arial;font-weight:bold;color:#9F0000;font-size:15px;text-align:center;height:21px;}
.tdll{ font-family:Arial;font-size:12px;text-align:left; }
.tdcc{ font-family:Arial;font-size:12px;text-align:center;border-style:hidden;border:0;width:100%; }
.tdcci{ font-family:Arial;font-size:12px;text-align:center;border-style:hidden;border:0;background-color:#FFFFAE;;width:100%; }
.tdccT{ font-family:Arial;font-size:12px;text-align:center;border-style:hidden;border:0;background-color:#B5FF6A;width:100%; }
.tdrr{ font-family:Arial;font-size:12px;text-align:right; }
.tdcinp{ font-family:Arial;font-size:12px;text-align:left;border-style:hidden;border:0;width:100%; }
.inner_table{height:550px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link type="text/css" href="css/mycss.css" rel="stylesheet"/>
<script src="../AdminUser/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../AdminUser/js/jquery.freezeheader.js"></script>
<script>$(document).ready(function () { $("#table1").freezeHeader({ 'height':'500px' }); })</script>
<script type="text/javascript" language="javascript">
function isNumberKey(evt)
{
 var charCode = (evt.which) ? evt.which : event.keyCode
 //if (charCode > 31 && (charCode < 48 || charCode > 57))
 if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))  /* For floating*/
	return false;

 return true;
}

function SelectFun(v,t,ei,yi)
{
 if(t=='D')
 { 
   var DeE=v; var TeE='All'; var TrE='All'; var StE=document.getElementById('StE').value;  
 }
 else if(t=='T')
 { 
   var DeE='All'; var TeE=v; var TrE='All'; var StE=document.getElementById('StE').value;
 }
 else if(t=='R')
 { 
   var DeE='All'; var TeE='All'; var TrE=v; var StE=document.getElementById('StE').value;
 }
 else if(t=='G')
 { 
   var DeE=document.getElementById('DeE').value; 
   var TeE=document.getElementById('TeE').value; 
   var TrE=document.getElementById('TrE').value; 
   var StE=v;
 }
 
 window.location= 'PmsWorkingSheet.php?FilD='+DeE+'&TeE='+TeE+'&TrE='+TrE+'&FilS='+StE+'&ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=0&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1';
}

function funShort(typ,ord)
{  
   //alert(typ+"-"+ord);
   var DeE=document.getElementById('DeE').value; 
   var TeE=document.getElementById('TeE').value; 
   var TrE=document.getElementById('TrE').value; 
   var StE=document.getElementById('StE').value;
   window.location= 'PmsWorkingSheet.php?FilD='+DeE+'&TeE='+TeE+'&TrE='+TrE+'&FilS='+StE+'&ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=0&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1&typ='+typ+"&Ord="+ord;
}


function FCalBodyLoad(v)
{
  var v = parseFloat(v); 
  var OnePer=0; var IncVV=0; var IncV=0; var Per_IncV=0; var PropV=0; var CorrV=0; var TotIncV=0; var Per_TotInc=0; 
  var PerOneM=0; var PerOneD=0; var TotPerM=0; var TotPerD=0; var MSal=0; var DSal=0; var ProRIncV=0; var Per_ProRIncV=0;
  //var no=document.getElementById("TtnRw").value;
  //for(var k=1; k<=no; k++){ document.getElementById("PerAssign"+k).value=0; } 
  
  var rows=document.getElementById("TotRow").value;
  
  for(var i=1; i<=rows; i++)
  { 
      if(document.getElementById("Per_Actual"+i).value==0)
	  {
	   document.getElementById("Per_Actual"+i).value=v;
       var PreCtc = parseFloat(document.getElementById("oldctc_"+i).value);
	   var ProR = parseFloat(document.getElementById("prorata_"+i).value);
	   var Lgc = parseFloat(document.getElementById("lgc_"+i).value);
	   var Yy = parseFloat(document.getElementById("yy_"+i).value);
	   var Mm = parseFloat(document.getElementById("mm_"+i).value);
	   var Dd = parseFloat(document.getElementById("dd_"+i).value);
	   var OnePer = Math.round(((PreCtc*1)/100)*100)/100;   
	  
	   document.getElementById("Per_Prorata"+i).value=v;
	   var IncV = Math.round(OnePer*v); 
	   var PropV = document.getElementById("Ctc_"+i).value=Math.round(PreCtc+IncV); 
	   var TotIncV = document.getElementById("Inc"+i).value=IncV;
	   var TotCtcV = document.getElementById("TotCtc"+i).value=PropV;
	   var Per_TotInc =  document.getElementById("Per_TotCtc"+i).value=v; 
	   var CorrV = parseFloat(document.getElementById("Corr_"+i).value);
	   if(CorrV>0)
	   {
	    var TotIncV = document.getElementById("Inc"+i).value=Math.round((IncV+CorrV)*100)/100;
	    var TotCtcV = document.getElementById("TotCtc"+i).value=Math.round((PreCtc+TotIncV)*100)/100;
	    var Per_Corr = parseFloat(document.getElementById("Per_Corr"+i).value);
	    document.getElementById("Per_TotCtc"+i).value=Math.round((Per_TotInc+Per_Corr)*100)/100;
	   } 
	  } //If 
  }	//For     
  FunTotVal(rows);
}

 
function FCalAllRw(v,rt)
{ 
  var no=document.getElementById("TtnRw").value;
  for(var k=1; k<=no; k++){ document.getElementById("PerAssign"+k).disabled=true; }
    
  var v = parseFloat(v); 
  var OnePer=0; var IncVV=0; var IncV=0; var Per_IncV=0; var PropV=0; var CorrV=0; var TotIncV=0; var Per_TotInc=0; 
  var PerOneM=0; var PerOneD=0; var TotPerM=0; var TotPerD=0; var MSal=0; var DSal=0; var ProRIncV=0; var Per_ProRIncV=0;
  var rows=document.getElementById("TotRow").value;
  for(var i=1; i<=rows; i++)
  { 
 
    if(parseFloat(document.getElementById("rating_"+i).value)==rt)
	{
	
	  document.getElementById("TR"+i).style.background='#FFFFFF'; document.getElementById("TRa"+i).style.background='#FFFFFF'; document.getElementById("TRb"+i).style.background='#FFFFFF'; document.getElementById("TRc"+i).style.background='#FFFFFF'; document.getElementById("TRd"+i).style.background='#FFFFFF'; document.getElementById("Per_Prorata"+i).style.background='#FFFFFF'; 
	
	  document.getElementById("Per_Actual"+i).value=v;
	  var PreCtc = parseFloat(document.getElementById("oldctc_"+i).value);
	  var OldBasicAnnual = parseFloat(document.getElementById("OldBasicAnnual_"+i).value);
	  var MaxVCtc = parseFloat(document.getElementById("MaxVCtc_"+i).value); 
      
	  var ProR = parseFloat(document.getElementById("prorata_"+i).value);
	  var Lgc = parseFloat(document.getElementById("lgc_"+i).value);
	  var Yy = parseFloat(document.getElementById("yy_"+i).value);
	  var Mm = parseFloat(document.getElementById("mm_"+i).value);
	  var Dd = parseFloat(document.getElementById("dd_"+i).value);
	  var OnePer = Math.round(((PreCtc*1)/100)*100)/100;  
	  
	  if(Lgc==1)
	  { 
	    document.getElementById("Per_Prorata"+i).value=v;
	    var IncV = Math.round(OnePer*v); 
	    var PropV = document.getElementById("Ctc_"+i).value=Math.round(PreCtc+IncV);
		var Per_TotInc =  document.getElementById("Per_TotCtc"+i).value=v;
		
		/***** Basic Wise Calculation Basic Wise Calculation Basic Wise Calculation*******/
		if(MaxVCtc>0 && PropV>MaxVCtc)
		{ 
		  document.getElementById("TDMsg").style.background='#000000';
		  document.getElementById("TDMsg").style.color='#8CE8FB';
          document.getElementById("TR"+i).style.background='#8CE8FB'; document.getElementById("TRa"+i).style.background='#8CE8FB'; document.getElementById("TRb"+i).style.background='#8CE8FB'; document.getElementById("TRc"+i).style.background='#8CE8FB'; document.getElementById("TRd"+i).style.background='#8CE8FB'; document.getElementById("Per_Prorata"+i).style.background='#8CE8FB'; document.getElementById("Per_Actual"+i).style.background='#8CE8FB'; document.getElementById("Ctc_"+i).style.background='#8CE8FB'; document.getElementById("Corr_"+i).style.background='#8CE8FB'; document.getElementById("Per_Corr"+i).style.background='#8CE8FB'; document.getElementById("Inc"+i).style.background='#8CE8FB'; document.getElementById("TotCtc"+i).style.background='#8CE8FB'; document.getElementById("Per_TotCtc"+i).style.background='#8CE8FB';
		  
		  var BOnePer = Math.round(((OldBasicAnnual*1)/100)*100)/100;
		  var IncV = Math.round(BOnePer*v);
		  var PropV = document.getElementById("Ctc_"+i).value=Math.round(PreCtc+IncV);
		  var Per_TotInc =  document.getElementById("Per_TotCtc"+i).value=Math.round((IncV/OnePer)*100)/100;
		}
		/***** Basic Wise Calculation Basic Wise Calculation Basic Wise Calculation*******/
		 
		var TotIncV = document.getElementById("Inc"+i).value=IncV;
		var TotCtcV = document.getElementById("TotCtc"+i).value=PropV;
		var CorrV = parseFloat(document.getElementById("Corr_"+i).value);
	    if(CorrV>0)
	    {
	     var TotIncV = document.getElementById("Inc"+i).value=Math.round((IncV+CorrV)*100)/100;
		 var TotCtcV = document.getElementById("TotCtc"+i).value=Math.round((PreCtc+TotIncV)*100)/100;
		 var Per_Corr = parseFloat(document.getElementById("Per_Corr"+i).value);
		 document.getElementById("Per_TotCtc"+i).value=Math.round((Per_TotInc+Per_Corr)*100)/100;
	    }  
	  }
	  else if(Lgc==12)
	  {  
	    /*** Month & Day Calculation Open ***/
	    var PerOneM = Math.round((v/12)*100)/100; var PerOneD = Math.round((PerOneM/30)*100)/100; 
	    var TotPerM = Math.round((PerOneM*Mm)*100)/100; var TotPerD = Math.round((PerOneD*Dd)*100)/100;
	    var Per_ProRIncV = Math.round((TotPerM+TotPerD)*100)/100; 
	    var MSal = Math.round((OnePer*TotPerM)*100)/100; var DSal = Math.round((OnePer*TotPerD)*100)/100;
	    var ProRIncV =  Math.round(MSal+DSal); 
	    /*** Month & Day Calculation Close ***/
	  
	    document.getElementById("Per_Prorata"+i).value=Math.round((v+Per_ProRIncV)*100)/100;
	    var IncVV = Math.round(OnePer*v);
		var IncV = Math.round((IncVV+ProRIncV)*100)/100; var Per_IncV = Math.round(v+Per_ProRIncV);
	    var PropV = document.getElementById("Ctc_"+i).value=Math.round(PreCtc+IncV);
		var Per_TotInc =  document.getElementById("Per_TotCtc"+i).value=Per_IncV;
		
		/***** Basic Wise Calculation Basic Wise Calculation Basic Wise Calculation*******/
		if(MaxVCtc>0 && PropV>MaxVCtc)
		{ 
		  document.getElementById("TR"+i).style.background='#8CE8FB'; document.getElementById("TRa"+i).style.background='#8CE8FB'; document.getElementById("TRb"+i).style.background='#8CE8FB'; document.getElementById("TRc"+i).style.background='#8CE8FB'; document.getElementById("TRd"+i).style.background='#8CE8FB'; document.getElementById("Per_Prorata"+i).style.background='#8CE8FB'; document.getElementById("Per_Actual"+i).style.background='#8CE8FB'; document.getElementById("Ctc_"+i).style.background='#8CE8FB'; document.getElementById("Corr_"+i).style.background='#8CE8FB'; document.getElementById("Per_Corr"+i).style.background='#8CE8FB'; document.getElementById("Inc"+i).style.background='#8CE8FB'; document.getElementById("TotCtc"+i).style.background='#8CE8FB'; document.getElementById("Per_TotCtc"+i).style.background='#8CE8FB';
		
		  var BOnePer = Math.round(((OldBasicAnnual*1)/100)*100)/100;
		  /*** Month & Day Calculation Open ***/ 
	      var MSal = Math.round((BOnePer*TotPerM)*100)/100; var DSal = Math.round((BOnePer*TotPerD)*100)/100;
	      var ProRIncV =  Math.round(MSal+DSal); 
		  
		  var IncVV = Math.round(BOnePer*v);
		  var IncV = Math.round((IncVV+ProRIncV)*100)/100; 
		  var PropV = document.getElementById("Ctc_"+i).value=Math.round(PreCtc+IncV);
		  var Per_TotInc =  document.getElementById("Per_TotCtc"+i).value=Math.round((IncV/OnePer)*100)/100;
		}
		/***** Basic Wise Calculation Basic Wise Calculation Basic Wise Calculation*******/
		
		
	    var TotIncV = document.getElementById("Inc"+i).value=IncV;
		var TotCtcV = document.getElementById("TotCtc"+i).value=PropV;
		var CorrV = parseFloat(document.getElementById("Corr_"+i).value); 
	    if(CorrV>0)
	    {
	     var TotIncV = document.getElementById("Inc"+i).value=Math.round((IncV+CorrV)*100)/100;
		 var TotCtcV = document.getElementById("TotCtc"+i).value=Math.round((PreCtc+TotIncV)*100)/100;
		 var Per_Corr = parseFloat(document.getElementById("Per_Corr"+i).value);
		 document.getElementById("Per_TotCtc"+i).value=Math.round((Per_TotInc+Per_Corr)*100)/100;
	    }  
	  }
	  else if(Lgc==2)
	  {
	    /*** Month & Day Calculation Open ***/
	    var PerOneM = Math.round((v/12)*100)/100; var PerOneD = Math.round((PerOneM/30)*100)/100;
	    var TotPerM = Math.round((PerOneM*Mm)*100)/100; var TotPerD = Math.round((PerOneD*Dd)*100)/100;
	    var Per_ProRIncV = Math.round(TotPerM+TotPerD);
	    var MSal = Math.round((OnePer*TotPerM)*100)/100; var DSal = Math.round((OnePer*TotPerD)*100)/100;
	    var ProRIncV =  Math.round(MSal+DSal);
	    /*** Month & Day Calculation Close ***/
	  
	    document.getElementById("Per_Prorata"+i).value=Per_ProRIncV;
		var IncV = ProRIncV; var Per_IncV = Per_ProRIncV;
	    var PropV = document.getElementById("Ctc_"+i).value=Math.round((PreCtc+IncV)*100)/100;
		var Per_TotInc =  document.getElementById("Per_TotCtc"+i).value=Per_ProRIncV;
		
		/***** Basic Wise Calculation Basic Wise Calculation Basic Wise Calculation*******/
		if(MaxVCtc>0 && PropV>MaxVCtc)
		{ 
		  document.getElementById("TR"+i).style.background='#8CE8FB'; document.getElementById("TRa"+i).style.background='#8CE8FB'; document.getElementById("TRb"+i).style.background='#8CE8FB'; document.getElementById("TRc"+i).style.background='#8CE8FB'; document.getElementById("TRd"+i).style.background='#8CE8FB'; document.getElementById("Per_Prorata"+i).style.background='#8CE8FB'; document.getElementById("Per_Actual"+i).style.background='#8CE8FB'; document.getElementById("Ctc_"+i).style.background='#8CE8FB'; document.getElementById("Corr_"+i).style.background='#8CE8FB'; document.getElementById("Per_Corr"+i).style.background='#8CE8FB'; document.getElementById("Inc"+i).style.background='#8CE8FB'; document.getElementById("TotCtc"+i).style.background='#8CE8FB'; document.getElementById("Per_TotCtc"+i).style.background='#8CE8FB';
		  
		  var BOnePer = Math.round(((OldBasicAnnual*1)/100)*100)/100;
		  /*** Month & Day Calculation Open ***/ 
	      var MSal = Math.round((BOnePer*TotPerM)*100)/100; var DSal = Math.round((BOnePer*TotPerD)*100)/100;
	      var ProRIncV =  Math.round(MSal+DSal); 
		  
		  var IncV = ProRIncV; 
		  var PropV = document.getElementById("Ctc_"+i).value=Math.round(PreCtc+IncV);
		  var Per_TotInc =  document.getElementById("Per_TotCtc"+i).value=Math.round((IncV/OnePer)*100)/100;
		}
		/***** Basic Wise Calculation Basic Wise Calculation Basic Wise Calculation*******/
		
		
	    var TotIncV = document.getElementById("Inc"+i).value=IncV;
		var TotCtcV = document.getElementById("TotCtc"+i).value=PropV;
		var CorrV = parseFloat(document.getElementById("Corr_"+i).value); 
	    if(CorrV>0)
	    {
	     var TotIncV = document.getElementById("Inc"+i).value=Math.round((IncV+CorrV)*100)/100;
		 var TotCtcV = document.getElementById("TotCtc"+i).value=Math.round((PreCtc+TotIncV)*100)/100;
		 var Per_Corr = parseFloat(document.getElementById("Per_Corr"+i).value);
		 document.getElementById("Per_TotCtc"+i).value=Math.round((Per_TotInc+Per_Corr)*100)/100;
	    }   
	  }
	  
    }
  }
  FunTotVal(rows);
}


//Single Actual Percent
function EmpCalRw(v,no,rt,ProR,Lgc,Yy,Mm,Dd,PreCtc)
{ 
  var i = parseFloat(no); var v = parseFloat(v);
  var PreCtc = parseFloat(PreCtc); var ProR = parseFloat(ProR); var Lgc = parseFloat(Lgc);
  var Yy = parseFloat(Yy);  var Mm = parseFloat(Mm); var Dd = parseFloat(Dd);
  var OnePer = Math.round(((PreCtc*1)/100)*100)/100; 
  var OldBasicAnnual = parseFloat(document.getElementById("OldBasicAnnual_"+i).value);
  var MaxVCtc = parseFloat(document.getElementById("MaxVCtc_"+i).value); 
  
  
  document.getElementById("TR"+i).style.background='#FFFFFF'; document.getElementById("TRa"+i).style.background='#FFFFFF'; document.getElementById("TRb"+i).style.background='#FFFFFF'; document.getElementById("TRc"+i).style.background='#FFFFFF'; document.getElementById("TRd"+i).style.background='#FFFFFF'; document.getElementById("Per_Prorata"+i).style.background='#FFFFFF';
  
  /********************/
  /********************/
  document.getElementById("Per_Actual"+i).value=v;
  var PreCtc = parseFloat(document.getElementById("oldctc_"+i).value);
  var ProR = parseFloat(document.getElementById("prorata_"+i).value);
  var Lgc = parseFloat(document.getElementById("lgc_"+i).value);
  var Yy = parseFloat(document.getElementById("yy_"+i).value);
  var Mm = parseFloat(document.getElementById("mm_"+i).value);
  var Dd = parseFloat(document.getElementById("dd_"+i).value);
  var OnePer = Math.round(((PreCtc*1)/100)*100)/100;   
  
  if(Lgc==1)
  { 
	document.getElementById("Per_Prorata"+i).value=v;
	var IncV = Math.round(OnePer*v); 
	var PropV = document.getElementById("Ctc_"+i).value=Math.round(PreCtc+IncV); 
	var Per_TotInc =  document.getElementById("Per_TotCtc"+i).value=v; 
	
	    /***** Basic Wise Calculation Basic Wise Calculation Basic Wise Calculation*******/
		if(MaxVCtc>0 && PropV>MaxVCtc)
		{ 
		  document.getElementById("TR"+i).style.background='#8CE8FB'; document.getElementById("TRa"+i).style.background='#8CE8FB'; document.getElementById("TRb"+i).style.background='#8CE8FB'; document.getElementById("TRc"+i).style.background='#8CE8FB'; document.getElementById("TRd"+i).style.background='#8CE8FB'; document.getElementById("Per_Prorata"+i).style.background='#8CE8FB'; document.getElementById("Per_Actual"+i).style.background='#8CE8FB'; document.getElementById("Ctc_"+i).style.background='#8CE8FB'; document.getElementById("Corr_"+i).style.background='#8CE8FB'; document.getElementById("Per_Corr"+i).style.background='#8CE8FB'; document.getElementById("Inc"+i).style.background='#8CE8FB'; document.getElementById("TotCtc"+i).style.background='#8CE8FB'; document.getElementById("Per_TotCtc"+i).style.background='#8CE8FB';
		
		  var BOnePer = Math.round(((OldBasicAnnual*1)/100)*100)/100;
		  var IncV = Math.round(BOnePer*v);
		  var PropV = document.getElementById("Ctc_"+i).value=Math.round(PreCtc+IncV);
		  var Per_TotInc =  document.getElementById("Per_TotCtc"+i).value=Math.round((IncV/OnePer)*100)/100;
		}
		/***** Basic Wise Calculation Basic Wise Calculation Basic Wise Calculation*******/
	
	var TotIncV = document.getElementById("Inc"+i).value=IncV;
	var TotCtcV = document.getElementById("TotCtc"+i).value=PropV;
	var CorrV = parseFloat(document.getElementById("Corr_"+i).value);
	if(CorrV>0)
	{
	 var TotIncV = document.getElementById("Inc"+i).value=Math.round((IncV+CorrV)*100)/100;
	 var TotCtcV = document.getElementById("TotCtc"+i).value=Math.round((PreCtc+TotIncV)*100)/100;
	 var Per_Corr = parseFloat(document.getElementById("Per_Corr"+i).value);
	 document.getElementById("Per_TotCtc"+i).value=Math.round((Per_TotInc+Per_Corr)*100)/100;
	}  
  }
  else if(Lgc==12)
  {  
	/*** Month & Day Calculation Open ***/
	var PerOneM = Math.round((v/12)*100)/100; var PerOneD = Math.round((PerOneM/30)*100)/100; 
	var TotPerM = Math.round((PerOneM*Mm)*100)/100; var TotPerD = Math.round((PerOneD*Dd)*100)/100;
	var Per_ProRIncV = Math.round((TotPerM+TotPerD)*100)/100; 
	var MSal = Math.round((OnePer*TotPerM)*100)/100; var DSal = Math.round((OnePer*TotPerD)*100)/100;
	var ProRIncV =  Math.round(MSal+DSal); 
	/*** Month & Day Calculation Close ***/
  
	document.getElementById("Per_Prorata"+i).value=Math.round((v+Per_ProRIncV)*100)/100;
	var IncVV = Math.round(OnePer*v);
	var IncV = Math.round((IncVV+ProRIncV)*100)/100; var Per_IncV = Math.round(v+Per_ProRIncV);
	var PropV = document.getElementById("Ctc_"+i).value=Math.round(PreCtc+IncV);
	var Per_TotInc =  document.getElementById("Per_TotCtc"+i).value=Per_IncV;
	
	    /***** Basic Wise Calculation Basic Wise Calculation Basic Wise Calculation*******/
		if(MaxVCtc>0 && PropV>MaxVCtc)
		{ 
		  document.getElementById("TR"+i).style.background='#8CE8FB'; document.getElementById("TRa"+i).style.background='#8CE8FB'; document.getElementById("TRb"+i).style.background='#8CE8FB'; document.getElementById("TRc"+i).style.background='#8CE8FB'; document.getElementById("TRd"+i).style.background='#8CE8FB'; document.getElementById("Per_Prorata"+i).style.background='#8CE8FB'; document.getElementById("Per_Actual"+i).style.background='#8CE8FB'; document.getElementById("Ctc_"+i).style.background='#8CE8FB'; document.getElementById("Corr_"+i).style.background='#8CE8FB'; document.getElementById("Per_Corr"+i).style.background='#8CE8FB'; document.getElementById("Inc"+i).style.background='#8CE8FB'; document.getElementById("TotCtc"+i).style.background='#8CE8FB'; document.getElementById("Per_TotCtc"+i).style.background='#8CE8FB';
		  
		  var BOnePer = Math.round(((OldBasicAnnual*1)/100)*100)/100;
		  /*** Month & Day Calculation Open ***/ 
	      var MSal = Math.round((BOnePer*TotPerM)*100)/100; var DSal = Math.round((BOnePer*TotPerD)*100)/100;
	      var ProRIncV =  Math.round(MSal+DSal); 
		  
		  var IncVV = Math.round(BOnePer*v);
		  var IncV = Math.round((IncVV+ProRIncV)*100)/100; 
		  var PropV = document.getElementById("Ctc_"+i).value=Math.round(PreCtc+IncV);
		  var Per_TotInc =  document.getElementById("Per_TotCtc"+i).value=Math.round((IncV/OnePer)*100)/100;
		}
		/***** Basic Wise Calculation Basic Wise Calculation Basic Wise Calculation*******/
	
	var TotIncV = document.getElementById("Inc"+i).value=IncV;
	var TotCtcV = document.getElementById("TotCtc"+i).value=PropV;
	var CorrV = parseFloat(document.getElementById("Corr_"+i).value); 
	if(CorrV>0)
	{
	 var TotIncV = document.getElementById("Inc"+i).value=Math.round((IncV+CorrV)*100)/100;
	 var TotCtcV = document.getElementById("TotCtc"+i).value=Math.round((PreCtc+TotIncV)*100)/100;
	 var Per_Corr = parseFloat(document.getElementById("Per_Corr"+i).value);
	 document.getElementById("Per_TotCtc"+i).value=Math.round((Per_TotInc+Per_Corr)*100)/100;
	}  
  }
  else if(Lgc==2)
  {
	/*** Month & Day Calculation Open ***/
	var PerOneM = Math.round((v/12)*100)/100; var PerOneD = Math.round((PerOneM/30)*100)/100;
	var TotPerM = Math.round((PerOneM*Mm)*100)/100; var TotPerD = Math.round((PerOneD*Dd)*100)/100;
	var Per_ProRIncV = Math.round(TotPerM+TotPerD);
	var MSal = Math.round((OnePer*TotPerM)*100)/100; var DSal = Math.round((OnePer*TotPerD)*100)/100;
	var ProRIncV =  Math.round(MSal+DSal);
	/*** Month & Day Calculation Close ***/
  
	document.getElementById("Per_Prorata"+i).value=Per_ProRIncV;
	var IncV = ProRIncV; var Per_IncV = Per_ProRIncV;
	var PropV = document.getElementById("Ctc_"+i).value=Math.round((PreCtc+IncV)*100)/100;
	var Per_TotInc =  document.getElementById("Per_TotCtc"+i).value=Per_ProRIncV;
	
	    /***** Basic Wise Calculation Basic Wise Calculation Basic Wise Calculation*******/
		if(MaxVCtc>0 && PropV>MaxVCtc)
		{ 
		  document.getElementById("TR"+i).style.background='#8CE8FB'; document.getElementById("TRa"+i).style.background='#8CE8FB'; document.getElementById("TRb"+i).style.background='#8CE8FB'; document.getElementById("TRc"+i).style.background='#8CE8FB'; document.getElementById("TRd"+i).style.background='#8CE8FB'; document.getElementById("Per_Prorata"+i).style.background='#8CE8FB'; document.getElementById("Per_Actual"+i).style.background='#8CE8FB'; document.getElementById("Ctc_"+i).style.background='#8CE8FB'; document.getElementById("Corr_"+i).style.background='#8CE8FB'; document.getElementById("Per_Corr"+i).style.background='#8CE8FB'; document.getElementById("Inc"+i).style.background='#8CE8FB'; document.getElementById("TotCtc"+i).style.background='#8CE8FB'; document.getElementById("Per_TotCtc"+i).style.background='#8CE8FB';
		
		  var BOnePer = Math.round(((OldBasicAnnual*1)/100)*100)/100;
		  /*** Month & Day Calculation Open ***/ 
	      var MSal = Math.round((BOnePer*TotPerM)*100)/100; var DSal = Math.round((BOnePer*TotPerD)*100)/100;
	      var ProRIncV =  Math.round(MSal+DSal); 
		  
		  var IncV = ProRIncV; 
		  var PropV = document.getElementById("Ctc_"+i).value=Math.round(PreCtc+IncV);
		  var Per_TotInc =  document.getElementById("Per_TotCtc"+i).value=Math.round((IncV/OnePer)*100)/100;
		}
		/***** Basic Wise Calculation Basic Wise Calculation Basic Wise Calculation*******/
	
	var TotIncV = document.getElementById("Inc"+i).value=IncV;
	var TotCtcV = document.getElementById("TotCtc"+i).value=PropV;
	var CorrV = parseFloat(document.getElementById("Corr_"+i).value); 
	if(CorrV>0)
	{
	 var TotIncV = document.getElementById("Inc"+i).value=Math.round((IncV+CorrV)*100)/100;
	 var TotCtcV = document.getElementById("TotCtc"+i).value=Math.round((PreCtc+TotIncV)*100)/100;
	 var Per_Corr = parseFloat(document.getElementById("Per_Corr"+i).value);
	 document.getElementById("Per_TotCtc"+i).value=Math.round((Per_TotInc+Per_Corr)*100)/100;
	}   
  }
  /********************/
  /********************/
  var rows=document.getElementById("TotRow").value;
  FunTotVal(rows);	 
	  
}


//Correction 
function FunCorr(v,sno,PreCtc)
{
  if(v>0)
  {
    var CorrV = parseFloat(v);
	var PreCtc = parseFloat(PreCtc);	
	var OnePerAmt = Math.round(((PreCtc*1)/100)*100)/100;
	var OldBasicAnnual = parseFloat(document.getElementById("OldBasicAnnual_"+sno).value);
    var MaxVCtc = parseFloat(document.getElementById("MaxVCtc_"+sno).value); 
    var ProCtc = parseFloat(document.getElementById("Ctc_"+sno).value);
	
    var CorrPer = 0;
    var CorrPer = document.getElementById("Per_Corr"+sno).value = Math.round((v/OnePerAmt)*100)/100;
	var Per_Actual = parseFloat(document.getElementById("Per_Actual"+sno).value);
	
	if(Per_Actual>0)
	{
	 var Ctc = parseFloat(document.getElementById("Ctc_"+sno).value); 
	 var IncV = Math.round((Ctc-PreCtc)*100)/100; 
	  /***** Basic Wise Calculation Basic Wise Calculation Basic Wise Calculation*******/
	  var Per_Actual = Math.round((IncV/OnePerAmt)*100)/100;
	  /***** Basic Wise Calculation Basic Wise Calculation Basic Wise Calculation*******/
	 
	 var TotIncV = document.getElementById("Inc"+sno).value = Math.round((IncV+CorrV)*100)/100; 
	 var TotCtcV = document.getElementById("TotCtc"+sno).value = Math.round((PreCtc+TotIncV)*100)/100;
		
	 document.getElementById("Per_TotCtc"+sno).value = Math.round((Per_Actual+CorrPer)*100)/100; 
	}
	else
	{
	 var TotIncV = document.getElementById("Inc"+sno).value=CorrV;
	 var TotCtcV = document.getElementById("TotCtc"+sno).value=Math.round((PreCtc+TotIncV)*100)/100;
	 document.getElementById("Per_TotCtc"+sno).value = CorrPer;
	}
  }
  var rows=document.getElementById("TotRow").value;
  FunTotVal(rows);
  
}


function FunTotVal(rows)
{  
  document.getElementById("Ctc").value=0; document.getElementById("Corr").value=0; 
  document.getElementById("Inc").value=0; document.getElementById("TotCtc").value=0; 
  document.getElementById("PerProRata").value=0;
  for(var j=1; j<=rows; j++)
  {
    var Ctc = parseFloat(document.getElementById("Ctc").value);
	var CtcJ = parseFloat(document.getElementById("Ctc_"+j).value);
	document.getElementById("Ctc").value=Math.round((Ctc+CtcJ)*100)/100;
	
	var Corr = parseFloat(document.getElementById("Corr").value);
	var CorrJ = parseFloat(document.getElementById("Corr_"+j).value);
	document.getElementById("Corr").value=Math.round((Corr+CorrJ)*100)/100;
	
	var Inc = parseFloat(document.getElementById("Inc").value);
	var IncJ = parseFloat(document.getElementById("Inc"+j).value);
	document.getElementById("Inc").value=Math.round((Inc+IncJ)*100)/100;
	
	var TotCtc = parseFloat(document.getElementById("TotCtc").value);
	var TotCtcJ = parseFloat(document.getElementById("TotCtc"+j).value);
	document.getElementById("TotCtc").value=Math.round((TotCtc+TotCtcJ)*100)/100;
	
	var PerProRata = parseFloat(document.getElementById("PerProRata").value);
	var Per_Prorata = parseFloat(document.getElementById("Per_Prorata"+j).value);
	document.getElementById("PerProRata").value=Math.round((PerProRata+Per_Prorata)*100)/100;
	
  }
    
  var PerPR=parseFloat(document.getElementById("PerProRata").value);
  document.getElementById("Per_Prorata").value = Math.round((PerPR/rows)*100)/100; 
  
  var PreCtc = parseFloat(document.getElementById("PreCtc").value); 
  var OnePerAmt = Math.round(((PreCtc*1)/100)*100)/100;
  var Ctc = parseFloat(document.getElementById("Ctc").value); 
  var TotInc = Math.round((Ctc-PreCtc)*100)/100; 
  var ActPer = 0;
  var ActPer = document.getElementById("Per_Actual").value = Math.round((TotInc/OnePerAmt)*100)/100;
  var Corr = parseFloat(document.getElementById("Corr").value);
  var CorrPer = 0;
  if(Corr>0){ var CorrPer = document.getElementById("Per_Corr").value = Math.round((Corr/OnePerAmt)*100)/100; }
  document.getElementById("Per_TotCtc").value = Math.round((ActPer+CorrPer)*100)/100;
  
  var no=document.getElementById("TtnRw").value;
  for(var k=1; k<=no; k++){ document.getElementById("PerAssign"+k).disabled=false; }
  
}


function FunDataSave(Ei,Yi)
{
  var Dp=document.getElementById('DeE').value; 
  var Te=document.getElementById('TeE').value; 
  var Gr=document.getElementById('StE').value;
  var agree=confirm("Are you sure you want to save data?"); 
  if(agree)
  { 
   document.getElementById('loaderDiv').style.display='block'; 
   
   /****************************************/ //HodRating
   var no=document.getElementById("TtnRw").value;
   for(var k=1; k<=no; k++)
   { 
    var score = document.getElementById("PerAssign"+k).value; 
	var rating = document.getElementById("HodRating"+k).value;
	var url = 'PmsWorkingSheet_Ajax.php'; var pars = 'Action=workingSheet&ei='+Ei+'&Dp='+Dp+'&Te='+Te+'&Gr='+Gr+'&Yi='+Yi+'&type=numscore&score='+score+'&rating='+rating; 
	var myAjax = new Ajax.Request( url, { 	method: 'post', parameters: pars }); 
   }
   /****************************************/
   
   
   /****************************************/
    var url = 'PmsWorkingSheet_Ajax.php'; var pars = 'Action=workingSheet&ei='+Ei+'&Dp='+Dp+'&Te='+Te+'&Gr='+Gr+'&Yi='+Yi+'&type=main&PreCtc='+document.getElementById("PreCtc").value+'&Per_Prorata='+document.getElementById("Per_Prorata").value+'&Per_Actual='+document.getElementById("Per_Actual").value+'&Ctc='+document.getElementById("Ctc").value+'&Corr='+document.getElementById("Corr").value+'&Per_Corr='+document.getElementById("Per_Corr").value+'&Inc='+document.getElementById("Inc").value+'&TotCtc='+document.getElementById("TotCtc").value+'&Per_TotCtc='+document.getElementById("Per_TotCtc").value;
	var myAjax = new Ajax.Request(
    url, { 	method: 'post', parameters: pars });  
   /****************************************/
  
   /****************************************/
   var rows=document.getElementById("TotRow").value;
   for(var i=1; i<=rows; i++)
   {
    var url = 'PmsWorkingSheet_Ajax.php'; var pars = 'Action=workingSheet&ei='+Ei+'&Dp='+Dp+'&Te='+Te+'&Gr='+Gr+'&Yi='+Yi+'&type=emp&empid='+document.getElementById("empid_"+i).value+'&Rating='+document.getElementById("rating_"+i).value+'&PreCtc='+document.getElementById("oldctc_"+i).value+'&Per_Prorata='+document.getElementById("Per_Prorata"+i).value+'&Per_Actual='+document.getElementById("Per_Actual"+i).value+'&Ctc='+document.getElementById("Ctc_"+i).value+'&Corr='+document.getElementById("Corr_"+i).value+'&Per_Corr='+document.getElementById("Per_Corr"+i).value+'&Inc='+document.getElementById("Inc"+i).value+'&TotCtc='+document.getElementById("TotCtc"+i).value+'&Per_TotCtc='+document.getElementById("Per_TotCtc"+i).value+'&Rows='+rows+'&i='+i;  
    var myAjax = new Ajax.Request(
    url, { 	method: 'post', parameters: pars, onComplete: show_rst });
   }
   /*****************************************/
  } 
  else{ return false; }
}


function show_rst(originalRequest)
{ 
  document.getElementById("actionspan").innerHTML = originalRequest.responseText; 
  if(document.getElementById("RstVal").value==1)
  { alert("Data save successfully!");  document.getElementById("ExportBtn").disabled=false; 
    document.getElementById("PushBtn").disabled=false;
  }
  else{ alert("Error..., please check!"); }
  document.getElementById('loaderDiv').style.display='none';
}


function FunExpFormat(yi,ei,ci,di,ti,tr,gi)
{ 
  var agree=confirm("Are you sure for export? Please ensure that the current working sheet data is saved or not"); 
  if(agree)
  {
   window.open("PmsWorkingSheet_Exp.php?valuee=dataexport&yi="+yi+"&ei="+ei+"&ci="+ci+"&di="+di+"&ti="+ti+"&tr="+tr+"&gi="+gi, "expform", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=50,height=50"); 
  }
  else {return false; }
}

/*
function FunExpAllFormat(yi,ei,ci,di,ti,tr,gi)
{
  var agree=confirm("Are you sure for export?"); 
  if(agree)
  {
   window.open("PmsWorkingSheet_Exp.php?valuee=DataAllExport&yi="+yi+"&ei="+ei+"&ci="+ci+"&di="+di+"&ti="+ti+"&tr="+tr+"&gi="+gi+"&PreCtc="+document.getElementById('PreCtc').value+"&Per_Prorata="+document.getElementById('Per_Prorata').value+"&Per_Actual="+document.getElementById('Per_Actual').value+"&Ctc="+document.getElementById('Ctc').value+"&Corr="+document.getElementById('Corr').value+"&Per_Corr="+document.getElementById('Per_Corr').value+"&Inc="+document.getElementById('Inc').value+"&TotCtc="+document.getElementById('TotCtc').value+"&Per_TotCtc="+document.getElementById('Per_TotCtc').value, "expallform", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=50,height=50"); 
  }
  else {return false; }
}
*/



function FunExpBlankData(yi,ei,ci,di,ti,tr,gi)
{
   window.open("PmsWorkingSheet_Exp.php?valuee=DataBlankWith&yi="+yi+"&ei="+ei+"&ci="+ci+"&di="+di+"&ti="+ti+"&tr="+tr+"&gi="+gi+"&PreCtc="+document.getElementById('PreCtc').value+"&Per_Prorata="+document.getElementById('Per_Prorata').value+"&Per_Actual="+document.getElementById('Per_Actual').value+"&Ctc="+document.getElementById('Ctc').value+"&Corr="+document.getElementById('Corr').value+"&Per_Corr="+document.getElementById('Per_Corr').value+"&Inc="+document.getElementById('Inc').value+"&TotCtc="+document.getElementById('TotCtc').value+"&Per_TotCtc="+document.getElementById('Per_TotCtc').value, "expallform", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=50,height=50"); 
}


/*********************************************************/
/*********************************************************/
function FunPushData(yi,ei,ci,di,ti,tr,gi)
{
  var agree=confirm("Are you sure for data push in increment sheet? Please ensure that the current working sheet data is correct or not."); 
  if(agree)
  {
    document.getElementById('loaderDiv').style.display='block';
    var url = 'PmsWorkingSheet_Move.php'; var pars = "Action=workingSheet&type=SaveIncData&act=SaveInc&yi="+yi+"&ei="+ei+"&ci="+ci+"&di="+di+"&ti="+ti+"&tr="+tr+"&gi="+gi;  
    var myAjax = new Ajax.Request(
    url, { 	method: 'post', parameters: pars, onComplete: show_Pushrst });
  }
  else {return false; }
}

function show_Pushrst(originalRequest)
{ 
  document.getElementById("actionspan").innerHTML = originalRequest.responseText; 
  if(document.getElementById("RstVal").value==1)
  { alert("Data Push successfully! for details & view please visit increment sheet");  
    document.getElementById("ExportBtn").disabled=false; 
    document.getElementById("PushBtn").disabled=false;
  }
  else{ alert("Error..., please check!"); }
  document.getElementById('loaderDiv').style.display='none';
}

/*********************************************************/
/*********************************************************/

</script>
</head>
<?php 
 $Dpp=0; $Dp=0; $Tee=0; $Te=0; $Trr=0; $Tr=0; $Grr=0; $Gr=0;  $RckArr=array();
 if(isset($_REQUEST['FilD'])){ $Dpp=1; $Dp=$_REQUEST['FilD']; } 
 if(isset($_REQUEST['TeE'])){  $Tee=1; $Te=$_REQUEST['TeE']; }
 if(isset($_REQUEST['TrE'])){  $Trr=1; $Tr=$_REQUEST['TrE']; }
 if(isset($_REQUEST['FilS'])){ $Grr=1; $Gr=$_REQUEST['FilS']; }
 $row=0; 
 if($Dp>0 OR $Te>0) // OR $Tr>0
 { 
   if($Dp>0){ $qsub='deptid='.$Dp; }elseif($Te>0){ $qsub='Rep1='.$Te; } //elseif($Tr>0){ $qsub='Rep2='.$Tr; } 
   $sqlRcd=mysql_query("select * from hrm_pms_workingsheet where hodid=".$EmployeeId." AND ".$qsub." AND yearid=".$_SESSION['PmsYId']." AND typeid='main'",$con); $row=mysql_num_rows($sqlRcd); $rRcd=mysql_fetch_assoc($sqlRcd); 
 }  
?>

<body class="body" <?php if($row==0){ ?>onLoad="FCalBodyLoad(0)"<?php } ?>>

<div id="loaderDiv" style="background-color: rgba(0,0,0,0.8);width: 100%;height: 100%;position: fixed;top:0px;left: 0px;font-size: 12px; display:none; text-align:center;"><span style="color:white;top: 50%;left:38%;position: absolute;">Please Wait, Submission in Progress...<img src="images/loading.gif"></span></div>

<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td>
 <table width="100%" style="margin-top:0px;">
  <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
  <tr>
   <td valign="top" style="width:100%;">
   <table border="0" style="width:100%;height:500px;float:none;" cellpadding="0">
   <tr>
    <td valign="top" style="width:100%;">      
    <table border="0" id="Activity" style="width:100%;">
	<tr>
     <td style="width:100%;" valign="top">
	 <table border="0" style="width:100%;">
<?php //*************************************** Start ********************************************* ?>	
<?php //*************************************** Start ********************************************* ?>
<?php
$SqlStat=mysql_query("select MedicalPolicyPremium from hrm_company_statutory_taxsaving where CompanyId=".$CompanyId,$con); $ResStat=mysql_fetch_assoc($SqlStat);
?>
<input type="hidden" id="EMediPP" value="<?php echo $ResStat['MedicalPolicyPremium'];?>" readonly/>
					
<tr>
 <td>	 
 <table style="width:100%;">
<!--  Head Parts Open Open Open  --> 
<!--  Head Parts Open Open Open  --> 
<?php /*
 <tr>
  <td>
   <table>
    <tr>
<?php if($_SESSION['EmpType']=='E'){ ?>
<td align="center" valign="top"><a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>&ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&rr2=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=0&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_emp1" style="display:<?php if($_REQUEST['ee']==1){echo 'block';}else{echo 'none';} ?>;" src="images/emp1.png" border="0"/></a></td>

<?php } if($_SESSION['BtnApp']>0) { ?>
<td align="center" valign="top"><a href="ManagerPms.php?ee=1&aa=0&rr=1&rr2=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_manager1" style="display:<?php if($_REQUEST['aa']==1){echo 'block';}else{echo 'none';} ?>;" src="images/manager1.png" border="0"/></a></td></td>
		   
<?php } if($_SESSION['BtnRev']>0) { ?>
<td align="center" valign="top"><a href="HodPms.php?ee=1&aa=1&rr2=1&rr=0&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/hod1.png" border="0"/></a></td>

<?php } if($_SESSION['BtnRev2']>0) { ?>
<td align="center" valign="top"><a href="Rev2HodPms.php?ee=1&rr2=0&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/RevHod1.png" border="0"/></a></td>	
		   
<?php } if($_SESSION['BtnHod']>0) { ?>
<td align="center" valign="top"><img id="Img_hod1" src="images/m.png" border="0"/></td><?php } ?>

<?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg OPEN************/ ?>
<?php /*if($_SESSION['eMsg']=='Y'){ ?>
 <td>
 <?php $CuDate=date("Y-m-d"); if(($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y') AND $CuDate>=$_SESSION['hFrom'] AND $CuDate<=$_SESSION['hTo'] AND $_SESSION['hSts']=='A'){ $LastDate=$_SESSION['hTo']; $CurrentDate=date("Y-m-d");
		 $diff = abs(strtotime($LastDate) - strtotime($CurrentDate));
         $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/(60*60*24)); ?>
 <font class="msg_r"><font color="#00366C">&nbsp;&nbsp;PMS :</font><span class="blink_me"> <?php echo $days;?> Days Remaining! Last date : <?php echo date("d-F",strtotime($_SESSION['hTo'])); ?> </span></font>
 <?php } ?>
 </td>
<?php }*/ ?>
<?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg CLOSE************ ?>
 
	</tr>
   </table>
  </td>
 </tr>
*/ ?> 
 <tr><td style="vertical-align:top;width:100%;"><?php //include("SetKraPmsmh.php"); ?></td></tr>
<!--  Head Parts Close Close Close  --> 
<!--  Head Parts Close Close Close  --> 
 
  <tr>
    <td style="width:100%;">
	  <table border="0" style="width:100%;">
	    <tr>
        <?php /****************************************** Form Start **************************/ ?>
		<?php /****************************************** Form Start **************************/ ?>
		
<?php /***************** Submitted **************************/ ?>		 
<?php /*onChange="SelectDeptEmp(this.value,<?php echo $EmployeeId.','.$_SESSION['PmsYId']; ?>)"*/?>

 		  <td id="TeamDetails" style="display:block;width:100%;">
		  <table border="0" style="width:100%;">
<span id="actionspan"></span>		  
<tr>
 <td style="width:100%;">
  <table border="0" style="width:100%;" cellspacing="0">
   <tr>
    <td class="formh" style="width:200px;">(<i>PMS Working Sheet</i>) :&nbsp;</td>
	<?php if($_SESSION['hStatus']=='Y'){ ?>
	<td class="tdd" style="width:80px;text-align:right;"><b>Department:</b></td>
    <td class="td1" style="width:120px;"><select class="tdsel" name="DeE" id="DeE" onChange="SelectFun(this.value,'D',<?php echo $EmployeeId.','.$_SESSION['PmsYId']; ?>)"><?php if($_REQUEST['FilD']>0){ $sqlde=mysql_query("select department_name as DepartmentCode from core_departments where id=".$_REQUEST['FilD'],$con); $resde=mysql_fetch_assoc($sqlde); ?><option value="<?php echo $_REQUEST['FilD']; ?>" selected><?php echo $resde['DepartmentCode']; ?></option><?php }else{ ?><option value="All" selected>All</option><?php } $SqlDept=mysql_query("select HR_Curr_DepartmentId,department_name as DepartmentName, department_code as DepartmentCode from hrm_employee_pms pms inner join core_departments d on pms.HR_Curr_DepartmentId=d.id where AssessmentYear=".$_SESSION['PmsYId']." AND pms.CompanyId=".$CompanyId." AND HOD_EmployeeID=".$EmployeeId." group by HR_Curr_DepartmentId order by d.department_name ASC"); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['HR_Curr_DepartmentId']; ?>"><?php echo $ResDept['DepartmentCode'];?></option><?php } ?><option value="All">All</option></select></td>
	
	<?php if($EmployeeId==51){ ?>
	<td class="tdd" style="width:50px;text-align:right;"><b>HOD:</b></td>
    <td class="td1" style="width:150px;"><select class="tdsel" name="TeE" id="TeE" onChange="SelectFun(this.value,'T',<?php echo $EmployeeId.','.$_SESSION['PmsYId']; ?>)"><?php if($_REQUEST['TeE']>0){ $sT=mysql_query("select concat(Fname, ' ', Sname, ' ', Lname) as FullName from hrm_employee where EmployeeID=".$_REQUEST['TeE'],$con); $rT=mysql_fetch_assoc($sT); ?><option value="<?php echo $_REQUEST['TeE']; ?>" selected><?php echo $rT['FullName']; ?></option><?php }else{ ?><option value="All" selected>All</option><?php } $SqlRev2=mysql_query("SELECT Rev2_EmployeeID, concat(Fname, ' ', Sname, ' ', Lname) as FullName from hrm_employee_pms p INNER JOIN hrm_employee e ON p.Rev2_EmployeeID=e.EmployeeID WHERE p.HOD_EmployeeID=".$EmployeeId." AND p.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND e.EmpStatus='A' GROUP BY p.Rev2_EmployeeID", $con); while($ResRev2=mysql_fetch_array($SqlRev2)){ ?><option value="<?php echo $ResRev2['Rev2_EmployeeID']; ?>"><?php echo $ResRev2['FullName']; ?></option>
	<?php } ?><option value="All">All</option></select></td>
	
	<td class="tdd" style="width:50px;text-align:right;"><b>REV:</b></td>
    <td class="td1" style="width:150px;"><select class="tdsel" name="TrE" id="TrE" onChange="SelectFun(this.value,'R',<?php echo $EmployeeId.','.$_SESSION['PmsYId']; ?>)"><?php if($_REQUEST['TrE']>0){ $sTr=mysql_query("select concat(Fname, ' ', Sname, ' ', Lname) as FullName from hrm_employee where EmployeeID=".$_REQUEST['TrE'],$con); $rTr=mysql_fetch_assoc($sTr); ?><option value="<?php echo $_REQUEST['TrE']; ?>" selected><?php echo $rTr['FullName']; ?></option><?php }else{ ?><option value="All" selected>All</option><?php } $SqlRev=mysql_query("SELECT Reviewer_EmployeeID, concat(Fname, ' ', Sname, ' ', Lname) as FullName from hrm_employee_pms p INNER JOIN hrm_employee e ON p.Reviewer_EmployeeID=e.EmployeeID WHERE p.HOD_EmployeeID=".$EmployeeId." AND p.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND e.EmpStatus='A' GROUP BY p.Reviewer_EmployeeID", $con); while($ResRev=mysql_fetch_array($SqlRev)){ ?><option value="<?php echo $ResRev['Reviewer_EmployeeID']; ?>"><?php echo $ResRev['FullName']; ?></option>
	<?php } ?><option value="All">All</option></select></td>
	
	<?php }else	{ echo '<input type="hidden" name="TeE" id="TeE" value="0" />';
	              echo '<input type="hidden" name="TrE" id="TrE" value="0" />'; } ?>
	
	<?php 
	 if($_REQUEST['FilD']>0){ $DCond="pms.HR_Curr_DepartmentId=".$_REQUEST['FilD']; }
	 elseif($_REQUEST['TeE']>0){ $DCond="pms.Rev2_EmployeeID=".$_REQUEST['TeE']; }
	 elseif($_REQUEST['TrE']>0){ $DCond="pms.Reviewer_EmployeeID=".$_REQUEST['TrE']; }
	 else{ $DCond='1=1'; } 
	?>
	<td class="tddr" style="width:60px;text-align:right;"><b>Grade:</b></td>
	<td class="td1" style="width:80px;"><select class="tdsel" name="StE" id="StE" onChange="SelectFun(this.value,'G',<?php echo $EmployeeId.','.$_SESSION['PmsYId']; ?>)"><?php if($_REQUEST['FilS']>0){ $sqlSe=mysql_query("select grade_name as GradeValue from core_grades where id=".$_REQUEST['FilS'],$con); $resSe=mysql_fetch_assoc($sqlSe); ?><option value="<?php echo $_REQUEST['FilS']; ?>" selected><?php echo $resSe['GradeValue']; ?></option><?php }else{ ?><option value="All" selected>All</option><?php } $SqlSt=mysql_query("select st.* from core_grades st inner join hrm_employee_pms pms on st.id=pms.HR_CurrGradeId where pms.HOD_EmployeeID=".$EmployeeId." AND AssessmentYear=".$_SESSION['PmsYId']." AND ".$DCond." group by pms.HR_CurrGradeId order by st.id ASC"); while($ResSt=mysql_fetch_array($SqlSt)) { ?><option value="<?php echo $ResSt['GradeId']; ?>"><?php echo $ResSt['GradeValue'];?></option><?php } ?><option value="All">All</option></select></td>
	
	<input type="hidden" id="HQE" name="HQE" value="0"/>
	<?php } ?>
	
	<td style="width:1px;">&nbsp;</td>
	<td class="tdc" style="width:90px;"><a href="PmsWorkingSheet.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&FilD=All&FilS=All&TeE=All&org=0&wst=1"><input type="button" style="width:90px;" value="Refresh" /></a></td>
	<td style="width:1px;">&nbsp;</td>
	<td style="width:230px;color:#E0DBE3;background-color:#E0DBE3;font-size:18px; font-family:Times New Roman; text-align:center;" id="TDMsg">CTC Capping Employee</td>
	<td style="width:50px;"></td>
	
   </tr>
  </table>
 </td>
</tr>


<input type="hidden" id="EmployeeId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
<input type="hidden" id="FormMin5" value="0" /><input type="hidden" id="FormMax5" value="0" />	
<input type="hidden" id="PerValue" /><input type="hidden" id="OnePerPre" value="<?php echo $OnePerPre; ?>"/> 

<tr>
 <td style="width:105%;">
 
  <table border="0" style="width:100%;">
   <tr style="background-color:#FFFFAE;">
   
    <?php if(($_REQUEST['FilD']>0 OR $_REQUEST['TeE']>0) AND $_REQUEST['FilS']=='All'){ // OR $_REQUEST['TrE']>0 ?>
    <td class="tdc" style="width:100%;vertical-align:bottom;font-size:15px;">
	 <table style="width:100%;">
	  <tr>
	   <td>&nbsp;</td><!--".$_SESSION['PmsYId']."-->
	   <?php 
	   $DCond='1=1'; $HCond='1=1'; $RCond='1=1'; $GCond='1=1';
	   if($_REQUEST['FilD']>0){ $DCond="pms.HR_Curr_DepartmentId=".$_REQUEST['FilD']; }
	   if($_REQUEST['TeE']>0){  $HCond="pms.Rev2_EmployeeID=".$_REQUEST['TeE']; }
	   if($_REQUEST['TrE']>0){  $RCond="pms.Reviewer_EmployeeID=".$_REQUEST['TrE']; } 
	   if($_REQUEST['FilS']>0){ $GCond="pms.HR_CurrGradeId=".$_REQUEST['FilS']; } 
	   $SqlRt=mysql_query("select Hod_TotalFinalRating from hrm_employee_pms pms where HOD_EmployeeID=".$EmployeeId." AND AssessmentYear=".$_SESSION['PmsYId']." AND ".$DCond." AND ".$HCond." AND ".$RCond." AND ".$GCond." and Hod_TotalFinalRating!=0 group by Hod_TotalFinalRating order by Hod_TotalFinalRating ASC"); 
	   $no=1; while($ResRt=mysql_fetch_array($SqlRt))
	   { 
	   if(strlen(floatval($ResRt['Hod_TotalFinalRating']))==1){ $ratr=floatval($ResRt['Hod_TotalFinalRating']); }
	   else{ $ratr=floatval($ResRt['Hod_TotalFinalRating']*10); } ?>
	   <input type="hidden" id="HodRating<?=$no?>" value="<?=$ratr?>"	/>
	   
	   <?php 
       $ratFrt=0; 
	   if($Dp>0 OR $Te>0) // OR $Tr>0
	   { 
	    if($Dp>0){ $qsub='deptid='.$Dp; }elseif($Te>0){ $qsub='Rep1='.$Te; } //elseif($Tr>0){ $qsub='Rep2='.$Tr; }
	    $sqlFrt=mysql_query("select * from hrm_pms_workingsheet_inc where hodid=".$EmployeeId." AND ".$qsub." and yearid=".$_SESSION['PmsYId']."",$con); $rowFrt=mysql_num_rows($sqlFrt); 
        if($rowFrt>0){ $resFrt=mysql_fetch_assoc($sqlFrt); $ratFrt = $resFrt['rat_'.$ratr]; } 
	   }
	   ?>
	   <td style="width:100px;text-align:center;"><i><?=floatval($ResRt['Hod_TotalFinalRating'])?></i>
	   <br><input class="tdc" id="PerAssign<?=$no?>" value="<?=$ratFrt?>" style="width:50px;" onKeyPress="return isNumberKey(event)" onChange="FCalAllRw(this.value,<?=floatval($ResRt['Hod_TotalFinalRating'])?>)" />
	  
	   </td>
	   <?php $no++; } $TtnRw=$no-1; ?><input type="hidden" id="TtnRw" name="TtnRw" value="<?=$TtnRw?>"	/>
	   <td>&nbsp;</td>
	  </tr>
	 </table>
	</td>
	<?php } //if($_REQUEST['FilD']>0 AND $_REQUEST['FilS']=='All') ?>
	
   </tr>
      
   <tr>
    <td style="width:100%;">   
     <table border="0" style="width:100%;">
     <tr>
     <?php //************************************************ Start ******************************// ?>
	 <?php //************************************************ Start ******************************// ?>
	 <td style="width:100%;" id="EmpAppInc">
     <span id="MyTeamIncSpan"></span>
	 <span id="MyTeamInc">
	 <table border="0" style="width:100%;">	     
  <tr>
   <td style="width:100%; text-align:left;">
   <table border="0" style="width:100%;" cellspacing="1">
    <tr style="height:25px;">
	 <td colspan="<?php if($TotInEM>0){ ?>17<?php }else{ ?>15<?php } ?>" class="td1l" valign="top">
	  <table width="100%" border="1" cellspacing="0"><!--id="table1"-->

<?php 
$ordby='order by e.ECode ASC'; $Ord=1;
if($_REQUEST['typ']=='D')
{ 
 if($_REQUEST['Ord']==1){ $ordby='order by d.department_name ASC'; $Ord=0; }
 else{ $ordby='order by d.department_name DESC'; $Ord=1; } 
}
elseif($_REQUEST['typ']=='De')
{ 
 if($_REQUEST['Ord']==1){ $ordby='order by de.designation_name ASC'; $Ord=0; }
 else{ $ordby='order by de.designation_name DESC'; $Ord=1; } 
}
elseif($_REQUEST['typ']=='Gr')
{ 
 if($_REQUEST['Ord']==1){ $ordby='order by gr.id ASC'; $Ord=0; }
 else{ $ordby='order by gr.GradeId DESC'; $Ord=1; } 
}
?>
<div class="thead">
<thead>	  
<tr>
 <td rowspan="2" class="th" style="width:2%;"><b>Sn</b></td>
 <td rowspan="2" class="th" style="width:3%;"><b>EC</b></td>
 <td rowspan="2" class="th" style="width:12%;"><b>Name</b></td>
 <td rowspan="2" class="th" style="width:4%;"><b>DOJ</b></td>
 
 <td rowspan="2" class="th" style="width:6%;">
  <a onClick="funShort('D',<?=$Ord?>)" style="cursor:pointer;"><b><u>Department</u></b></a>
 </td>
 <td rowspan="2" class="th" style="width:8%;">
  <a onClick="funShort('De',<?=$Ord?>)" style="cursor:pointer;"><b><u>Designation</u></b></a>
 </td>
 <td rowspan="2" class="th" style="width:3%;">
  <a onClick="funShort('Gr',<?=$Ord?>)" style="cursor:pointer;"><b><u>Garde</u></b></a>
 </td>
 <td rowspan="2" class="th" style="width:4%;"><b>&nbsp;Grade&nbsp;<br>Change<br>Year</b></td>
 <td colspan="2" class="th" style="width:6%;"><b>Last Correction</b></td>
 
 
 <td rowspan="2" class="th" style="width:6%;"><b>Previous<br>CTC</b></td>
 <td colspan="8" class="th"><b>Proposed</b></td>
 <td colspan="3" class="th"><b>Total Proposed</b></td>
</tr>
<tr>
 <td class="th" style="width:3%;">&nbsp;<b>%</b>&nbsp;</td>
 <td class="th" style="width:3%;">&nbsp;<b>Year</b>&nbsp;</td>
 
 <?php /*<td class="th" style="width:3%;">&nbsp;<b>Score</b>&nbsp;</td>*/?>
 <td class="th" style="width:3%;">&nbsp;<b>Rating</b>&nbsp;</td>
 <td class="th" style="width:8%;"><b>Designation</b></td>
 <td class="th" style="width:3%;">&nbsp;<b>Garde</b>&nbsp;</td>

 <td class="th" style="width:3%;"><b>Pro-rata<br>(%)</b></td>
 <td class="th" style="width:3%;"><b>&nbsp;Actual&nbsp;<br>(%)</b></td>
 <td class="th" style="width:6%;"><b>&nbsp;CTC&nbsp;</b></td>
 <td class="th" style="width:5%;"><b>&nbsp;Corr.&nbsp;</b></td>
 <td class="th" style="width:3%;"><b>&nbsp;Corr.&nbsp;<br>(%)</b></td>

 <td class="th" style="width:5%;"><b>&nbsp;&nbsp;Inc&nbsp;&nbsp;</b></td>
 <td class="th" style="width:7%;"><b>&nbsp;&nbsp;CTC&nbsp;&nbsp;</b></td>
 <td class="th" style="width:5%;"><b>&nbsp;&nbsp;Final&nbsp;&nbsp;<br>(%)</b></td>
</tr>
<?php
if($Dp>0)
{
 if($Te>0)
 {
  if($Te>0 && $Gr>0){ $qry='(p.Rev2_EmployeeID='.$Te.' OR p.EmployeeID='.$Te.') AND p.HR_CurrGradeId='.$Gr; }
  elseif($Te>0 && $Gr=='All'){ $qry='(p.Rev2_EmployeeID='.$Te.' OR p.Rev2_EmployeeID='.$Te.')'; }
 }
 elseif($Tr>0)
 {
  if($Tr>0 && $Gr>0){ $qry='p.Reviewer_EmployeeID='.$Tr.' AND p.HR_CurrGradeId='.$Gr; }
  elseif($Tr>0 && $Gr=='All'){ $qry='p.Reviewer_EmployeeID='.$Tr; }
 }
 elseif($Dp>0 && $Gr>0){ $qry='g.DepartmentId='.$Dp.' AND p.HR_CurrGradeId='.$Gr; }
 elseif($Dp>0 && $Gr=='All'){ $qry='p.HR_Curr_DepartmentId='.$Dp; }
}
elseif($Dp=='All')
{
 if($Te>0)
 {
  if($Te>0 && $Gr>0){ $qry='(p.Rev2_EmployeeID='.$Te.' OR p.EmployeeID='.$Te.') AND p.HR_CurrGradeId='.$Gr; }
  elseif($Te>0 && $Gr=='All'){ $qry='(p.Rev2_EmployeeID='.$Te.' OR p.EmployeeID='.$Te.')'; }
 }
 elseif($Tr>0)
 {
  if($Tr>0 && $Gr>0){ $qry='p.Reviewer_EmployeeID='.$Tr.' AND p.HR_CurrGradeId='.$Gr; }
  elseif($Tr>0 && $Gr=='All'){ $qry='p.Reviewer_EmployeeID='.$Tr; }
 }
 elseif($Dp=='All' && $Gr>0){ $qry='p.HR_CurrGradeId='.$Gr; }
 elseif($Dp=='All' && $Gr=='All'){ $qry='1=1'; } 
}
else{ $qry='1=1'; }

$sTPrCtc=mysql_query("select sum(EmpCurrCtc) as TotPreCtc from hrm_employee_pms p inner join hrm_employee e on p.EmployeeID=e.EmployeeID inner join hrm_employee_general g on p.EmployeeID=g.EmployeeID where e.EmpStatus='A' AND g.DateJoining<='".$_SESSION['AllowDoj']."' AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.HOD_EmployeeID=".$EmployeeId." AND ".$qry."", $con); $rTPrCtc=mysql_fetch_assoc($sTPrCtc);

$Mprodata=0; $Mactual=0; $Mctc=0; $Mcorr=0; $Mcorr_per=0; $Minc=0; $Mtotctc=0; $Mtotctc_per=0;
if($row>0)
{
  if($rRcd['typeid']=='main')
  {
   $Mprodata=$rRcd['per_prorata']; $Mactual=$rRcd['per_actual']; $Mctc=$rRcd['ctc']; $Mcorr=$rRcd['corr'];
   $Mcorr_per=$rRcd['per_corr'];  $Minc=$rRcd['inc'];  $Mtotctc=$rRcd['tot_ctc']; $Mtotctc_per=$rRcd['per_totctc'];
  }  
}
 

?>
<tr style="background-color:#CBFF97;height:30px;">
 <td class="tdl" colspan="9" style="border-right:hidden;">
  
  <?php /*     
     
    &nbsp;&nbsp;
	<a href="#" onClick="FunExpBlankData(<?=$_SESSION['PmsYId'].','.$EmployeeId.','.$CompanyId?>,'<?=$_REQUEST['FilD']?>','<?=$_REQUEST['TeE']?>','<?=$_REQUEST['TrE']?>','<?=$_REQUEST['FilS']?>')"><input type="button" id="PushBtn" style="width:140px;background-color:#F7B52D; cursor:pointer;" value="Export With Blank"/></a>
    &nbsp;
	<?php if(($_REQUEST['FilD']>0 OR $_REQUEST['TeE']>0) AND $_REQUEST['FilS']=='All'){ ?>
	<input type="button" style="width:90px;background-color:#F7B52D;" onClick="FunDataSave(<?=$EmployeeId.','.$_SESSION['PmsYId']?>)" value="Save" />
	
	<a href="#" onClick="FunExpFormat(<?=$_SESSION['PmsYId'].','.$EmployeeId.','.$CompanyId?>,'<?=$_REQUEST['FilD']?>','<?=$_REQUEST['TeE']?>','<?=$_REQUEST['TrE']?>','<?=$_REQUEST['FilS']?>')"><input type="button" id="ExportBtn" style="width:140px;background-color:#F7B52D;" value="Export With Data" <?php if($row==0){echo 'disabled';}?>/></a>
	&nbsp;&nbsp;
	<a href="#" onClick="FunPushData(<?=$_SESSION['PmsYId'].','.$EmployeeId.','.$CompanyId?>,'<?=$_REQUEST['FilD']?>','<?=$_REQUEST['TeE']?>','<?=$_REQUEST['TrE']?>','<?=$_REQUEST['FilS']?>')"><input type="button" id="PushBtn" style="width:200px;background-color:#F7B52D;display:none;" value="Push Data in Increment Sheet" <?php if($row==0){echo 'disabled';}else{echo 'disabled';}?>/></a>
	
	<?php }elseif($_REQUEST['FilD']=='All' AND $_REQUEST['TeE']=='All' AND $_REQUEST['FilS']=='All'){ ?> 
	<?php $sql2Rcd=mysql_query("select * from hrm_pms_workingsheet where hodid=".$EmployeeId." AND yearid=".$_SESSION['PmsYId']." AND typeid='emp'",$con); $roow=mysql_num_rows($sql2Rcd); ?>
	<a href="#" onClick="FunExpAllFormat(<?=$_SESSION['PmsYId'].','.$EmployeeId.','.$CompanyId?>,'<?=$_REQUEST['FilD']?>','<?=$_REQUEST['TeE']?>','<?=$_REQUEST['TrE']?>','<?=$_REQUEST['FilS']?>')"><input type="button" id="ExportBtn" style="width:140px;background-color:#F7B52D;" value="Export With Data" <?php if($roow==0){echo 'disabled';}?>/></a>
	&nbsp;&nbsp;
	<?php $scHk=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$_SESSION['PmsYId']." AND HOD_EmployeeID=".$EmployeeId." AND HodSubmit_IncStatus=1", $con); 
	      $rowcHk=mysql_num_rows($scHk); ?>
	<a href="#" onClick="FunPushData(<?=$_SESSION['PmsYId'].','.$EmployeeId.','.$CompanyId?>,'<?=$_REQUEST['FilD']?>','<?=$_REQUEST['TeE']?>','<?=$_REQUEST['TrE']?>','<?=$_REQUEST['FilS']?>')"><input type="button" id="PushBtn" style="width:200px;background-color:#F7B52D;" value="Push Data in Increment Sheet" <?php if($roow==0 OR ($roow>0 AND $rowcHk==0)){echo 'disabled';}?>/></a>
	<?php } ?>
 */ ?>
 </td>
 
 <td class="tdr" style="border-left:hidden;"><b>Total:</b>&nbsp;</td>
 <td class="tdc" style="background-color:#B5FF6A;"><input class="tdccT" id="PreCtc" value="<?=floatval($rTPrCtc['TotPreCtc'])?>" readOnly style="font-size:12px;font-weight:bold;text-align:right;padding-right:2px;"/></td>
 
 <td class="tdr" colspan="3">&nbsp;</td>
 <td class="tdc" style="background-color:#B5FF6A;"><input class="tdccT" id="Per_Prorata" value="<?=$Mprodata?>" readOnly style="font-size:12px;font-weight:bold;"/><input type="hidden" class="tdccT" id="PerProRata" value="0" readOnly/></td>
 <td class="tdc" style="background-color:#B5FF6A;"><input class="tdccT" id="Per_Actual" value="<?=$Mactual?>" readOnly style="font-size:12px;font-weight:bold;"/></td>
 <td class="tdc" style="background-color:#B5FF6A;"><input class="tdccT" id="Ctc" value="<?=$Mctc?>" readOnly style="font-size:12px;font-weight:bold;text-align:right;padding-right:2px;"/></td>
 <td class="tdc" style="background-color:#B5FF6A;"><input class="tdccT" id="Corr" value="<?=$Mcorr?>" readOnly style="font-size:12px;font-weight:bold;text-align:right;padding-right:2px;"/></td>
 <td class="tdc" style="background-color:#B5FF6A;"><input class="tdccT" id="Per_Corr" value="<?=$Mcorr_per?>" readOnly style="font-size:12px;font-weight:bold;"/></td>
 <td class="tdc" style="background-color:#B5FF6A;"><input class="tdccT" id="Inc" value="<?=$Minc?>" readOnly style="font-size:12px;font-weight:bold;text-align:right;padding-right:2px;"/></td>
 <td class="tdc" style="background-color:#B5FF6A;"><input class="tdccT" id="TotCtc" value="<?=$Mtotctc?>" readOnly style="font-size:12px;font-weight:bold;text-align:right;padding-right:2px;"/></td>
 <td class="tdc" style="background-color:#B5FF6A;"><input class="tdccT" id="Per_TotCtc" value="<?=$Mtotctc_per?>" readOnly style="font-size:12px;font-weight:bold;"/></td>
</tr>
</thead>
</div>

<?php 
$prorata=0; $lgc=1; $yy=0; $mm=0; $dd=0;
$Prev_From_EffDate=date("Y-m-d",strtotime('-1 day', strtotime($_SESSION['EffDate'])));
$EffDM=date("m-d",strtotime($_SESSION['EffDate']));                             // $_SESSION['EffDate']=2021-01-01  
$MinMD=date("m-d",strtotime($Prev_From_EffDate));                    // $Prev_From_EffDate=2019-12-31, $MinMD=12-31 
$ExtraOneD=date("Y-m-d",strtotime('+1 day', strtotime($_SESSION['AllowDoj'])));  // $_SESSION['AllowDoj']=2020-06-30
$ExtraOneMD=date("m-d",strtotime($ExtraOneD));                                   //07-01
$PrvY=date("Y",strtotime($_SESSION['AllowDoj']));                                //2020
$PrvMD=date("m-d",strtotime($_SESSION['AllowDoj']));                             //06-30
$cY=$PrvY; 
$pY=$PrvY-1;

$sql=mysql_query("select e.EmployeeID, EmpCode, concat(Fname, ' ', Sname, ' ', Lname) as FullName, DateJoining, g.EmpVertical, g.EmpSection, department_code as DepartmentCode, designation_name as DesigName, designation_code as DesigCode, grade_name as GradeValue, EmpCurrGrossPM, EmpCurrCtc, EmpCurrAnnualBasic, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, HR_CurrGradeId, HR_Curr_DepartmentId from hrm_employee_pms p left join hrm_employee e on p.EmployeeID=e.EmployeeID left join hrm_employee_general g on p.EmployeeID=g.EmployeeID left join core_departments d on g.DepartmentId=d.id left join core_designation de on p.HR_CurrDesigId=de.id left join core_grades gr on p.HR_CurrGradeId=gr.id left join hrm_headquater hq on g.HqId=hq.HqId where e.EmpStatus='A' AND g.DateJoining<='".$_SESSION['AllowDoj']."' AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.HOD_EmployeeID=".$EmployeeId." AND ".$qry." ".$ordby, $con);


//p.AssessmentYear=".$_SESSION['PmsYId']."
$sno=1; while($res=mysql_fetch_array($sql)){

 $sDeH=mysql_query("select designation_name as DesigName, designation_code as DesigCode from core_designation where id=".$res['Hod_EmpDesignation'], $con); 
 $sGrH=mysql_query("select grade_name as GradeValue from core_grades where id=".$res['Hod_EmpGrade'], $con);
 $rDe=mysql_fetch_assoc($sDeH); $rGr=mysql_fetch_assoc($sGrH);
  //$lgc=1 -> Only One year
  //$lgc=12 -> One year & some month
  //$lgc=2 -> One some month
 
 
 //Joining<=2022-06-30
 if($res['DateJoining']<=$pY.'-'.$PrvMD){ $prorata=0; $lgc=1; }
 
 //Joining>=2022-07-01 AND Joining<=2023-06-30	 
 elseif($res['DateJoining']>=$pY.'-'.$ExtraOneMD AND $res['DateJoining']<=$cY.'-'.$PrvMD)
 { 
   $prorata=1;
   //Joining>=2022-07-01 AND Joining<=2022-12-31 -->New
   if($res['DateJoining']>=$pY.'-'.$ExtraOneMD AND $res['DateJoining']<=$pY.'-'.$MinMD)
   {
     $lgc=12; 
	 $date11 = new DateTime($res['DateJoining']); $date22 = new DateTime($pY.'-'.$MinMD);
     $interval = date_diff($date22, $date11);
     $yy=$interval->format('%y');  $mm=$interval->format('%m');  $dd=$interval->format('%d');
   }
   
   //Joining>=2023-01-01 AND Dj<=2023-06-30 -->New
   elseif($res['DateJoining']>=$cY.'-'.$EffDM AND $res['DateJoining']<=$cY.'-'.$PrvMD)
   {
     $lgc=2; 
	 $date1 = new DateTime($res['DateJoining']); $date2 = new DateTime($cY."-".$MinMD); //$PrvMD
     $interval = date_diff($date2, $date1);
     $yy=$interval->format('%y');  $mm=$interval->format('%m');  $dd=$interval->format('%d');
   }
   
 }
 
 
 /*******************************************************************/
 if($res['EmpSection']>0)
 { 
  if($res['Hod_EmpGrade']>0){ $nxtGrade=$res['Hod_EmpGrade']; }else{ $nxtGrade=$res['HR_CurrGradeId']; }
  //$sqVer=mysql_query("select Min_Ctc,Max_Ctc from hrm_pms_vertical_increment where DepId=".$res['HR_Curr_DepartmentId']." AND VerticalId=".$res['EmpVertical']." AND ".$nxtGrade.">=Min_GradeId AND ".$nxtGrade."<=Max_GradeId",$con);
  $sqVer=mysql_query("select Min_Ctc,Max_Ctc from hrm_pms_vertical_increment where DepId=".$res['HR_Curr_DepartmentId']." AND SectionId=".$res['EmpSection']." AND ".$nxtGrade.">=Min_GradeId AND ".$nxtGrade."<=Max_GradeId",$con); 
  
  $rowVer=mysql_num_rows($sqVer); $resVer=mysql_fetch_assoc($sqVer);
  if($rowVer>0 AND $resVer['Max_Ctc']>0){ $MaxVCtc=$resVer['Max_Ctc'];}
  else{ $MaxVCtc=0; }
 }
 else
 {
  $MaxVCtc=0; 
 }
 
 /*******************************************************************/ 
 
 
 $Eprodata=0; $Eactual=0; $Ectc=0; $Ecorr=0; $Ecorr_per=0; $Einc=0; $Etotctc=0; $Etotctc_per=0; 
 if($_REQUEST['FilD']>0){ $qsub='deptid='.$_REQUEST['FilD']; }
 elseif($_REQUEST['TeE']>0){ $qsub='Rep1='.$_REQUEST['TeE']; }
 else{ $qsub='1=1'; }
 
  $sE=mysql_query("select * from hrm_pms_workingsheet where hodid=".$EmployeeId." AND yearid=".$_SESSION['PmsYId']." AND empid=".$res['EmployeeID']." AND ".$qsub." AND typeid='emp'",$con); $rEd=mysql_num_rows($sE); 
  /*
  if($rEd>0)
  { 
   $rEd=mysql_fetch_assoc($sE); 
   $Eprodata=$rEd['per_prorata']; $Eactual=$rEd['per_actual']; $Ectc=$rEd['ctc']; $Ecorr=$rEd['corr']; 
   $Ecorr_per=$rEd['per_corr'];  $Einc=$rEd['inc'];  $Etotctc=$rEd['tot_ctc']; $Etotctc_per=$rEd['per_totctc'];
  }
  */
  
  if($rEd==1)
  { 
   $rEd=mysql_fetch_assoc($sE); 
   $Eprodata=$rEd['per_prorata']; $Eactual=$rEd['per_actual']; $Ectc=$rEd['ctc']; $Ecorr=$rEd['corr']; 
   $Ecorr_per=$rEd['per_corr'];  $Einc=$rEd['inc'];  $Etotctc=$rEd['tot_ctc']; $Etotctc_per=$rEd['per_totctc'];
  }
  else if($rEd>=2)
  { 
   $s2E=mysql_query("select * from hrm_pms_workingsheet where hodid=".$EmployeeId." AND yearid=".$_SESSION['PmsYId']." AND Rep1>0 AND empid=".$res['EmployeeID']." AND typeid='emp'",$con); $r2Ed=mysql_num_rows($s2E);
   if($r2Ed>0)
   {
     $r2Ed=mysql_fetch_assoc($s2E); 
     $Eprodata=$r2Ed['per_prorata']; $Eactual=$r2Ed['per_actual']; $Ectc=$r2Ed['ctc']; $Ecorr=$r2Ed['corr']; 
     $Ecorr_per=$r2Ed['per_corr'];  $Einc=$r2Ed['inc'];  $Etotctc=$r2Ed['tot_ctc']; $Etotctc_per=$r2Ed['per_totctc'];
   }
   else
   {
     $s3E=mysql_query("select * from hrm_pms_workingsheet where hodid=".$EmployeeId." AND yearid=".$_SESSION['PmsYId']." AND deptid>0 AND empid=".$res['EmployeeID']." AND typeid='emp'",$con); $r3Ed=mysql_num_rows($s3E);
	 $r3Ed=mysql_fetch_assoc($s3E); 
     $Eprodata=$r3Ed['per_prorata']; $Eactual=$r3Ed['per_actual']; $Ectc=$r3Ed['ctc']; $Ecorr=$r3Ed['corr']; 
     $Ecorr_per=$r3Ed['per_corr'];  $Einc=$r3Ed['inc'];  $Etotctc=$r3Ed['tot_ctc']; $Etotctc_per=$r3Ed['per_totctc'];
   } 
   
  } //else if($rEd>=2)
 
 
?> 	    
<div class="tbody">  
<tbody> 
<tr id="TR<?=$sno?>" style="background-color:<?php if($Eactual==0){echo '#E5E5E5';}else{echo '#FFFFFF';}?>">
 <input type="hidden" id="empid_<?=$sno?>" value="<?=$res['EmployeeID']?>" />
 <input type="hidden" id="oldctc_<?=$sno?>" value="<?=intval($res['EmpCurrCtc'])?>"/>
 <input type="hidden" id="rating_<?=$sno?>" value="<?=floatval($res['Hod_TotalFinalRating'])?>"/>
 <input type="hidden" id="prorata_<?=$sno?>" value="<?=$prorata?>" />
 <input type="hidden" id="lgc_<?=$sno?>" value="<?=$lgc?>" />
 <input type="hidden" id="yy_<?=$sno?>" value="<?=$yy?>" />
 <input type="hidden" id="mm_<?=$sno?>" value="<?=$mm?>" />
 <input type="hidden" id="dd_<?=$sno?>" value="<?=$dd?>" />
 
 <input type="hidden" id="OldBasicAnnual_<?=$sno?>" value="<?=intval($res['EmpCurrAnnualBasic'])?>"/>
 <input type="hidden" id="MaxVCtc_<?=$sno?>" value="<?=floatval($MaxVCtc)?>"/>
 

 <td class="tdc"><?=$sno?></td>
 <td class="tdc"><?=$res['EmpCode']?></td>
 <td class="tdl"><input class="tdcinp" value="<?=$res['FullName']?>" id="TRa<?=$sno?>" readOnly style="background-color:<?php if($Eactual==0){echo '#E5E5E5';}else{echo '#FFFFFF';}?>"/></td>
 <td class="tdc"><?=date("M-y",strtotime($res['DateJoining']))?></td>
 
 
 <td class="tdl"><input class="tdcinp" value="<?=$res['DepartmentCode']?>" id="TRb<?=$sno?>" readOnly style="background-color:<?php if($Eactual==0){echo '#E5E5E5';}else{echo '#FFFFFF';}?>"/></td>
 <td class="tdl"><input class="tdcinp" value="<?=$res['DesigCode']?>" id="TRc<?=$sno?>" readOnly style="background-color:<?php if($Eactual==0){echo '#E5E5E5';}else{echo '#FFFFFF';}?>"/></td>
 <td class="tdc"><?=$res['GradeValue']?></td>
 
 <?php $MxGrDate=''; 
 $MxGrde=mysql_query("SELECT `SalaryChange_Date` FROM `hrm_pms_appraisal_history` WHERE `AppHistoryId`=(select MAX(`AppHistoryId`) as MaxId from hrm_pms_appraisal_history where `Current_Grade`!='".$res['GradeValue']."' and EmpCode='".$res['EmpCode']."' AND CompanyId=".$CompanyId.")"); $MxRowG=mysql_num_rows($MxGrde);
 if($MxRowG>0){ $rMxGr=mysql_fetch_assoc($MxGrde); $MxGrDate=date("M-y",strtotime($rMxGr['SalaryChange_Date'])); }
 ?>
 <td class="tdc" style="background-color:<?php if(date("Y",strtotime($rMxGr['SalaryChange_Date']))>=(date("Y")-1) AND $MxGrDate!=''){echo '#FFAEFF';}?>;"><?=$MxGrDate?></td>
 
 <?php $MxCrDate=''; $MxCrPer='';
 $MxCorr=mysql_query("SELECT SalaryChange_Date, ProCorrCTC, `Percent_ProCorrCTC` FROM `hrm_pms_appraisal_history` WHERE `AppHistoryId`=(select MAX(`AppHistoryId`) as MaxId from hrm_pms_appraisal_history where `Percent_ProCorrCTC`>0 and EmpCode='".$res['EmpCode']."' AND CompanyId=".$CompanyId.")"); $MxRowCorr=mysql_num_rows($MxCorr); 
 if($MxRowCorr>0)
 { $rMxCor=mysql_fetch_assoc($MxCorr); 
   $MxCrDate=date("M-y",strtotime($rMxCor['SalaryChange_Date'])); 
   $MxCrPer=$rMxCor['Percent_ProCorrCTC'];
 }
 else
 {
  $MxCorr=mysql_query("SELECT SalaryChange_Date, PropSalary_Correction, Previous_GrossSalaryPM FROM `hrm_pms_appraisal_history` WHERE `AppHistoryId`=(select MAX(`AppHistoryId`) as MaxId from hrm_pms_appraisal_history where `PropSalary_Correction`>0 and EmpCode='".$res['EmpCode']."' AND CompanyId=".$CompanyId.")"); 
  $MxRowCorr=mysql_num_rows($MxCorr); 
  if($MxRowCorr>0)
  { $rMxCor=mysql_fetch_assoc($MxCorr);  
    $MxCrDate=date("M-y",strtotime($rMxCor['SalaryChange_Date'])); 
	$MxCrPer=round(($rMxCor['PropSalary_Correction']/(($rMxCor['Previous_GrossSalaryPM']*1)/100)),2);
  }
 }
 ?>
 <td class="tdc"><?=$MxCrPer?></td>
 <td class="tdc">&nbsp;<?=$MxCrDate?>&nbsp;</td>
 
 <td class="tdr"><b><?=intval($res['EmpCurrCtc'])?></b>&nbsp;</td>
 <?php /*<td class="tdc"><?=$res['Hod_TotalFinalScore']?></td>*/?>
 <td class="tdc"><b><?=floatval($res['Hod_TotalFinalRating'])?></b></td>
 <td class="tdl"><input class="tdcinp" value="<?=$rDe['DesigCode']?>" id="TRd<?=$sno?>" readOnly style="background-color:<?php if($Eactual==0){echo '#E5E5E5';}else{echo '#FFFFFF';}?>"/>
 <?php //echo 'Prorata->'.$prorata.' (0-No, 1-Yes), Logic->'.$lgc.' (If=1->One Year, 12->One year and month, 2->Only Month and day), Year->'.$yy.', Month->'.$mm.', Day->'.$dd; ?></td>
 <td class="tdc"><?=$rGr['GradeValue']?></td>

 <td class="tdc"><input class="tdcc" id="Per_Prorata<?=$sno?>" style="font-size:12px;background-color:<?php if($Eactual==0){echo '#E5E5E5';}else{echo '#FFFFFF';}?>" value="<?=$Eprodata?>" maxlength="3" readOnly/></td>
 
 <td class="tdc"><input class="tdcci" id="Per_Actual<?=$sno?>" value="<?=$Eactual?>" maxlength="12" onKeyPress="return isNumberKey(event)" onChange="EmpCalRw(this.value,<?=$sno.','.floatval($res['Hod_TotalFinalRating'].','.$prorata.','.$lgc.','.$yy.','.$mm.','.$dd.','.intval($res['EmpCurrCtc']))?>)" onKeyUp="EmpCalRw(this.value,<?=$sno.','.floatval($res['Hod_TotalFinalRating'].','.$prorata.','.$lgc.','.$yy.','.$mm.','.$dd.','.intval($res['EmpCurrCtc']))?>)" onKeyDown="EmpCalRw(this.value,<?=$sno.','.floatval($res['Hod_TotalFinalRating'].','.$prorata.','.$lgc.','.$yy.','.$mm.','.$dd.','.intval($res['EmpCurrCtc']))?>)" style="font-size:12px;"/>
 </td>
 
 <td class="tdc"><input class="tdcc" id="Ctc_<?=$sno?>" value="<?=$Ectc?>" readOnly style="font-size:12px;text-align:right;padding-right:2px;"/></td>
 <td class="tdc"><input class="tdcci" id="Corr_<?=$sno?>" value="<?=$Ecorr?>" maxlength="10" onKeyPress="return isNumberKey(event)" onChange="FunCorr(this.value,<?=$sno.','.intval($res['EmpCurrCtc'])?>)" onKeyUp="FunCorr(this.value,<?=$sno.','.intval($res['EmpCurrCtc'])?>)" onKeyDown="FunCorr(this.value,<?=$sno.','.intval($res['EmpCurrCtc'])?>)" style="font-size:12px;text-align:right;padding-right:2px;"/></td>
 
 <td class="tdc"><input class="tdcc" id="Per_Corr<?=$sno?>" value="<?=$Ecorr_per?>" readOnly style="font-size:12px;"/></td>
 <td class="tdc"><input class="tdcc" id="Inc<?=$sno?>" value="<?=$Einc?>" readOnly style="font-size:12px;text-align:right;padding-right:2px;"/></td>
 <td class="tdc"><input class="tdcc" id="TotCtc<?=$sno?>" value="<?=$Etotctc?>" readOnly style="font-size:12px;text-align:right;padding-right:2px;"/></td>
 <td class="tdc"><input class="tdcc" id="Per_TotCtc<?=$sno?>" value="<?=$Etotctc_per?>" readOnly style="font-size:12px; font-weight:bold;background-color:#B5FF6A;"/></td>
 
</tr>
</tbody>
</div>
<?php $sno++; } $TotRow=$sno-1; //while close ?>
<input type="hidden" id="TotRow" name="TotRow" value="<?=$TotRow?>"	/>	   
		   
			 </table>
			</td>
			
		  </tr>			
		  
	     </td>
	    </tr>
	   </table>
	   </span>		
	   </td>
       <?php //************************************************ Close ******************************// ?>
	   <?php //************************************************ Close ******************************// ?>	  	   
	  </tr>
     </table>
     </td>
    </tr>
   </table>
   </td>
<?php /****************************************** Form Close **************************/ ?>		   
  </tr>
 </table>
 </td>
</tr>
<?php //******************************************** ?>    
  </table>
 </td>
</tr>					
<?php //************************************ Close ************************************* ?>					
				  </table>
				 </td>
			  </tr>
			</table>
           </td>
			  </tr>
	        </table>
<?php //******************************************************************************* ?>
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php //require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>