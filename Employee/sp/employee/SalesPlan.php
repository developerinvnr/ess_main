<?php session_start();
if($_SESSION['login'] = true){require_once('../user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../../../index.php');}
$EmployeeId=$_SESSION['EmployeeID'];
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style>.font {color:#000; font-family:Georgia; font-size:15px; font-weight:bold;}  .font {color:#000; font-family:Times New Roman; font-size:12px;}
.Input{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;} .font1 { font-family:Georgia; font-size:11px; height:14px; } .font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }</style>
<Script type="text/javascript">window.history.forward(1);</Script>
</head>
<body class="body">   
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /><input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td>
 <table width="100%" style="margin-top:0px;">
 <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
 <tr>
  <td valign="top">
  <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
  <tr>
   <td valign="top"> 		      
   <table border="0" id="Activity">
   <tr>
	<td id="Anni" valign="top" style="width:5px;"></td>
	<td colspan="2" width="100%" valign="top">
    <table border="0">
<?php //*************************************************************** Start ******************************************************************************** ?>		
<?php $SpP=mysql_query("select GradeId,DepartmentId,HqId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resSpP=mysql_fetch_assoc($SpP); 
      $SpPDept=$resSpP['DepartmentId']; $SpGradeP=$resSpP['GradeId']; 
	  $sqlRpt=mysql_query("select hrm_employee_general.EmployeeID from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where DepartmentId=6 AND hrm_employee.EmpStatus='A' AND RepEmployeeID=".$EmployeeId, $con); 
	  $rowRpt=mysql_num_rows($sqlRpt); if($rowRpt>0){$rpt=1;}else{$rpt=0;} $hq=$resSpP['HqId'];
      if(date("m")==4 OR date("m")==5 OR date("m")==6){$qtr=1;}elseif(date("m")==7 OR date("m")==8 OR date("m")==9){$qtr=2;}
	  elseif(date("m")==10 OR date("m")==11 OR date("m")==12){$qtr=3;}elseif(date("m")==1 OR date("m")==2 OR date("m")==3){$qtr=4;} ?>	
<tr>
 <td colspan="5"> 	 
 <table border="0">
 <tr>
  <td>
  <table border="0">
   <tr>
   <td>
   <table border="0">
    <tr bgcolor="#FFFFFF">
<?php $sqlye=mysql_query("select YearId from hrm_sales_year where Company1='A'", $con); $resye=mysql_fetch_assoc($sqlye); ?>		 
<?php if($SpPDept==6 AND ($SpGradeP==61 OR $SpGradeP==62 OR $SpGradeP==63 OR $SpGradeP==64 OR $SpGradeP==65 OR $SpGradeP==66 OR $SpGradeP==67)){ ?>
	<td align="center"><a href="SalesEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act=<?php echo $rpt; ?>&hq=0&y=<?php echo $resye['YearId']; ?>&q=<?php echo $qtr; ?>&ii=19&vc=1&fc=0&cc=0&di=<?php echo $SpPDept; ?>&gi=<?php echo $SpGradeP; ?>&EHq=<?php echo $EmployeeId; ?>&myh=0&myt=0"><img src="images/Planner.png" border="0" style="height:30px;width:130px;"/></a></td>
<?php } elseif($SpPDept==6 AND ($SpGradeP==68 OR $SpGradeP==69 OR $SpGradeP==70 OR $SpGradeP==71)){ ?>
	<td align="center"><a href="SalesaEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act=<?php echo $rpt; ?>&hq=0&y=<?php echo $resye['YearId']; ?>&q=<?php echo $qtr; ?>&ii=19&vc=1&fc=0&cc=0&di=<?php echo $SpPDept; ?>&gi=<?php echo $SpGradeP; ?>&EHq=<?php echo $EmployeeId; ?>&SelTerr=0&myh=0&myt=0"><img src="images/PlannerA.png" border="0" style="height:30px;width:130px;"/></a></td>
<?php } elseif($SpPDept==6 AND ($SpGradeP==72 OR $SpGradeP==73 OR $SpGradeP==74 OR $SpGradeP==75)){ ?> 
    <td align="center"><a href="SalesrEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act=<?php echo $rpt; ?>&hq=0&y=<?php echo $resye['YearId']; ?>&q=<?php echo $qtr; ?>&ii=19&vc=1&fc=0&cc=0&di=<?php echo $SpPDept; ?>&gi=<?php echo $SpGradeP; ?>&EHq=<?php echo $EmployeeId; ?>&SelTerr=0&myh=0&myt=0"><img src="images/PlannerR.png" border="0" style="height:30px;width:130px;"/></a></td> 
<?php } elseif($SpPDept==6 AND ($SpGradeP==76 OR $SpGradeP==77)){ ?> 
    <td align="center"><a href="SaleshEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act=<?php echo $rpt; ?>&hq=0&y=<?php echo $resye['YearId']; ?>&q=<?php echo $qtr; ?>&ii=19&vc=1&fc=0&cc=0&di=<?php echo $SpPDept; ?>&gi=<?php echo $SpGradeP; ?>&EHq=<?php echo $EmployeeId; ?>&SelTerr=0&myh=0&myt=0"><img src="images/PlannerH.png" border="0" style="height:30px;width:130px;"/></a></td> 
<?php } ?>	
 		 
	    </tr>
		</table>
	   </td>
	  </tr>
	   <tr>
	    <td>
<?php $sql=mysql_query("select HqId,CostCenter,ReportingName,ReportingDesigId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $res=mysql_fetch_assoc($sql); 
      $sqlHQ=mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'], $con); $resHQ=mysql_fetch_assoc($sqlHQ);
	  $sqlCC=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resCC=mysql_fetch_assoc($sqlCC);
	  $sqlDesigR=mysql_query("select DesigName from hrm_designation where DesigId=".$res['ReportingDesigId'], $con); $resDesigR=mysql_fetch_assoc($sqlDesigR); 
?>	   
       <table border="0">
	    <tr>
		 <td style="font-family:Times New Roman;font-size:14px;color:#BFF3F7;width:1250px;">
         <b>HeadQuarter: <font color="#FFFFAA"><?php echo $resHQ['HqName']; ?></font><br>
		 State: <font color="#FFFFAA"><?php echo $resCC['StateName']; ?></font><br>
		 Reporting Name: <font color="#FFFFAA"><?php echo $res['ReportingName']; ?></font><br>
		 Reporting Designation: <font color="#FFFFAA"><?php echo strtoupper($resDesigR['DesigName']); ?>&nbsp;&nbsp;</font>
         </td>
		</tr>
	   </table>
	    </td>
	   </tr>
	 </table>
   </td>
  </tr>

<?php //*************************************************************** Close ******************************************************************************** ?>					
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
		</table>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

