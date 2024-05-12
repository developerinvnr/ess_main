<script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
</script>
<span class="preload1"></span><span class="preload2"></span>
<?php if(($_SESSION['UserType']=="M" OR $_SESSION['UserType']=="S" OR $_SESSION['UserType']=="A" OR $_SESSION['UserType']=="U") AND $_SESSION['UserStatus']=="A"){ ?>
<ul id="nav">
<li class="top"><a href="Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>" class="top_link"><span>Home</span></a></li>
<?php if($UserId!=12 AND $UserId!=13) { ?>
<?php /************************************************************************ Master Open ***********************************************************/ ?>	 
  <li class="top"><a href="#" id="products" class="top_link"><span class="down">Master</span></a>
    <ul class="sub">
	  <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_ComMaster_Basic']==1 OR $_SESSION['Mas_ComMaster_Statutory']==1 OR $_SESSION['Mas_ComMaster_Vendors']==1){ ?>
	  <li><a href="#" class="fly">Company Masters</a>
        <ul> 
		  <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_ComMaster_Basic']==1){?><li><a href="CompanyDetails.php">Basic Details</a></li><?php } ?>
		  <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_ComMaster_Statutory']==1){?><li><a href="StatutoryDetails.php">Statutory Details</a></li><?php } ?>
		  <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_ComMaster_Vendors']==1){?><li><a href="VendorDetails.php">Vendors Details</a></li><?php } ?> 
		</ul>
	  </li>
	  <?php } ?>
	  <li><b>Detail</b></li>
	  <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_DetailMand_Dept']==1 OR $_SESSION['Mas_DetailMand_HQ']==1 OR $_SESSION['Mas_DetailMand_Grade']==1 OR $_SESSION['Mas_DetailMand_Desig']==1 OR $_SESSION['Mas_DetailMand_CityClass']==1 OR $_SESSION['Mas_DetailMand_CostCenter']==1){ ?>
	  <li><a href="#" class="fly">Mandatory</a>
       <ul> 
	     <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_DetailMand_Dept']==1){?><li><a href="Department.php">Department</a></li><?php } ?>
		 <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_DetailMand_HQ']==1){?><li><a href="HeadQuater.php">Head Quarter</a></li><?php } ?>
		 <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_DetailMand_Grade']==1){?><li><a href="Grade.php">Grade</a></li><?php } ?>
		 <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_DetailMand_Desig']==1){?><li><a href="Designation.php">Designation</a></li><?php } ?>
		 <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_DetailMand_DeptGradeDesig']==1){?><li><a href="DeptGradeDesig.php">Departmentt->Designation</a></li><?php } ?>
		 <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_DetailMand_DesigGrade']==1){?><li><a href="DesigGrade.php">Designation->Grade</a></li><?php } ?>
		 <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_DetailMand_CityClass']==1){?><li><a href="CityClassification.php">City Classification</a></li><?php } ?>
		 <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_DetailMand_CostCenter']==1){?><li><a href="CostCenter.php">Cost Center </a></li><?php } ?>   
		</ul>
	  </li> 
	  <?php } if($_SESSION['Master']==1 OR $_SESSION['Mas_DetailMice_CounStatCity']==1) { ?>
	  <li><a href="#" class="fly">Miscellaneous </a>
	   <ul>
	     <?php /* if($_SESSION['Master']==1 OR $_SESSION['Mas_DetailMice_Category']==1){?><li><a href="Category.php">Category</a></li><?php } ?>
		 <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_DetailMice_Section']==1){?><li><a href="Section.php">Section</a></li><?php } */ ?>
	     <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_DetailMice_CounStatCity']==1){?><li><a href="CountryStateCity.php">Country /State /City</a></li><?php } ?>
	   </ul>
	  </li>	
	  <?php } if($_SESSION['Master']==1 OR $_SESSION['Mas_DetailElig_LodEntitle']==1 OR $_SESSION['Mas_DetailElig_TravelEntitle']==1 OR $_SESSION['Mas_DetailElig_TravelElig']==1 OR $_SESSION['Mas_DetailElig_DailyAllow']==1 )	{ ?>
	  <li><a href="#" class="fly">Eligibility</a>
	    <ul>
	     <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_DetailElig_LodEntitle']==1 OR $_SESSION['Mas_DetailElig_TravelEntitle']==1 OR $_SESSION['Mas_DetailElig_TravelElig']==1 OR $_SESSION['Mas_DetailElig_DailyAllow']==1){?>     
	     <li><a href="EligComMaster.php?d=1&t=1">Common Masters</a></li>
		 <li><a href="EligPolicy.php?d=1&t=1">New Policy & Field</a></li>
		 <li><a href="EligPolicyTable.php?d=1&t=1">Vehicle Policy Table</a></li>
		 <?php } ?>    
	        
		 <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_DetailElig_LodEntitle']==1){?><li><a href="LodgingEn.php">Lodging Entitlement</a></li><?php } ?>
		 <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_DetailElig_TravelEntitle']==1){?><li><a href="TravelEn.php">Travel Entitlement</a></li><?php } ?>
		 <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_DetailElig_TravelElig']==1){?><li><a href="TravelElig.php">Travel Elig.(Per KM)</a></li><li><a href="VehicleLimPolicy.php">Vehicle Policy</a></li><?php } ?>
		 <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_DetailElig_DailyAllow']==1){?><li><a href="DailyAllowance.php">DA+MH+MRS+MRNS+MC</a></li><?php } ?>
		</ul>
	  </li>
	 <?php } ?> 
	 <?php if($_SESSION['Master']==1){?>
	   <li><a href="vertical.php?act=checkdept&d=23&rr=false&rr=98&ff=23&dd=3&d=4&ed=2">Department Vertical</a></li>  
	 <?php } ?>
	 
	  <li>&nbsp;<font color="#ff6">---------------------</font></li>
<?php if($CompanyId==1){$D=11;}if($CompanyId==2){$D=13;} if($CompanyId==3){$D=19;} ?>
	  <?php /* if($_SESSION['Master']==1 OR $_SESSION['Mas_PayCompo']==1){?><li><a href="PayComponent.php" id="b1">Pay Components</a></li><?php } */ ?>
	  <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_Leave']==1){?><li><a href="Leave.php">Leave</a></li><?php } ?>
	  <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_Holiday']==1){?><li><a href="Holiday.php?y=<?php echo date("Y"); ?>">Holiday</a></li><?php } ?>
	  <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_EmpMasters']==1){?><li><a href="EmpMaster.php?s=A">Employee Masters</a></li><?php } ?>
	  <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_SalaryMasters']==1){?><li><a href="PaySlipCompo.php">PaySlip Components</a></li><?php } ?>
	  <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_Thought']==1){?><li><a href="Thought.php">Thought for the Day</a></li>
	                                                                    <li><a href="SendThought.php">Send Today Event</a></li><?php } ?>
      <?php if(($_SESSION['UserType']=="S" OR $_SESSION['UserType']=="M") AND ($_SESSION['Master']==1 OR $_SESSION['Mas_NewCompany']==1)){?><li><a href="NewCompany.php">Create New Company</a></li><?php } ?>
      <?php if($_SESSION['Master']==1 OR $_SESSION['Mas_Restructuring']==1){?><li><a href="NewComRestr.php?ee=ere&pp=prp&d=<?php echo $D; ?>&y=<?php echo date("Y"); ?>">Restructuring</a></li><?php } //NewComRestr.php ?>

      <li><b>Training/ Conference</b></li>
      <?php if($_SESSION['Processing']==1 OR $_SESSION['Pro_Training']==1){?><li><a href="ComTraining.php?Y=<?php echo date("Y"); ?>&page=1">Training</a></li><?php } ?>
      <?php if($_SESSION['Processing']==1 OR $_SESSION['Pro_Conference']==1){?><li><a href="ComConference.php?Y=<?php echo date("Y"); ?>&page=1">Conference-Seminar</a></li><?php } ?>   

	  <?php if(($UserId==9 OR $UserId==10 OR $UserId==14  OR $UserId==41 OR $UserId==53) AND $_SESSION['UserType']=="S" AND $_SESSION['User_Permission']=='Edit') { ?>
	  <li>&nbsp;<font color="#ff6">---------------------</font></li>
<?php /*  <li><a href="TypeAssest.php">Type Of Assest</a></li>
	  <li><a href="EmpAsstMaster.php">Employee Assest</a></li> 
	  <li><a href="EmpAssBill.php">Assest Bill</a></li>
	  <li><a href="ImportAssExcel.php">Import Asst Bill</a></li>  */ ?>
	  <li><a href="ImportEmp.php">Import Emp Details</a></li>
	  <li><a href="AjayUpdatedDetails.php">Updated Details</a></li>
          <li><a href="RetiMailEscalate.php">Retirement Mail Escalated</a></li>
          <li><a href="UELogBook.php">LogBook</a></li>
	  <?php } ?>		 
	</ul>
  </li>
<?php /************************************************************************ Master Close ***********************************************************/ ?>	  
<?php } if($UserId!=12 AND $UserId!=13) { ?>
<?php /************************************************************************ Processing Open ***********************************************************/ ?>	 
   <li class="top"><a href="#" id="services" class="top_link"><span class="down">Processing</span></a>
	<ul class="sub">
	<?php if($_SESSION['Processing']==1 OR $_SESSION['Pro_AddAttLeave']==1 OR $_SESSION['Pro_ApprovedLeave']==1 OR $_SESSION['Pro_PendingLeave']==1 OR $_SESSION['Pro_AttReport']==1 OR $_SESSION['Pro_PaySlipReport']==1){?>

<li><a href="EmpSetTime.php?D=0&rr=false&ec=1&ec2=50">Set Time</a></li>
<li><a href="EmpSetTRep.php?ls=10&wer=123grtd&se=reew&w=ee102&m=<?php echo date("m"); ?>&Y=<?php echo date("Y"); ?>&ee=s1s&d=0&trt=1f&tt=345&dd=truevalu&fals=truefalse">Timing Reports</a></li>
<li><a href="EmpSetCountno.php?D=0&rr=false">Reason [No Count Time]</a></li>	
<li><a href="AttAuth.php?ls=10&wer=123grtd&se=reew&w=ee102&yl&Y=<?php echo date("Y"); ?>&m=<?php echo date("m"); ?>&a=0&ee=s1s&emp=0">Attendance Authorisation</a></li>

  
	  <li><b>Attendance</b></li>
<?php if($_SESSION['Processing']==1 OR $_SESSION['Pro_AddAttLeave']==1 OR $_SESSION['Pro_AttMorEve']==1){?><li><a href="AttMorEve.php?m=<?php echo date("m"); ?>&D=6&Y=<?php echo date("Y"); ?>&da=<?php echo date("d"); ?>&yy=4%rer&uu=true&rr=false">Entry(Morning Reports)</a></li><?php } ?>

<?php if($_SESSION['Processing']==1 OR $_SESSION['Pro_AddAttLeave']==1){?>	  
	  <li><a href="Attendance.php?ls=10&wer=123grtd&se=reew&w=ee102&m=<?php echo date("m"); ?>&Y=<?php echo date("Y"); ?>&ee=s1s&d=0&trt=1f&tt=345&dd=truevalu&fals=truefalse">Month Wise</a></li>
	  <li><a href="AttendanceBlank.php?ls=10&wer=123grtd&se=reew&w=ee102&m=<?php echo date("m"); ?>&Y=<?php echo date("Y"); ?>&ee=s1s&d=0&trt=1f&tt=345&dd=truevalu&fals=truefalse">Month Wise (Blank)</a></li>
	  
<?php if(date("d")>=1 AND date("d")<=8){$week=1;}elseif(date("d")>=9 AND date("d")<=16){$week=2;}elseif(date("d")>=17 AND date("d")<=24){$week=3;}elseif(date("d")>=25 AND date("d")<=31){$week=4;} ?>	  
	  <li><a href="AttendanceWeek.php?ls=10&wer=123grtd&se=reew&w=ee102&m=<?php echo date("m"); ?>&Y=<?php echo date("Y"); ?>&ee=s1s&d=0&trt=1f&tt=345&dd=truevalu&fals=truefalse&wk=<?php echo $week; ?>">Week Wise</a></li>
<?php } ?>	  
	  
	  <?php if(date("m")==1){$Am=11; $Ay=date("Y")-1;}elseif(date("m")==2){$Am=12; $Ay=date("Y")-1;}elseif(date("m")==2 OR date("m")==3 OR date("m")==4 OR date("m")==5 OR date("m")==6 OR date("m")==7 OR date("m")==8 OR date("m")==9 OR date("m")==10 OR date("m")==11 OR date("m")==12){$Am=date("m")-2; $Ay=date("Y");} ?>	
	  <?php if($_SESSION['Processing']==1 OR $_SESSION['Pro_AddAttLeave']==1 OR $_SESSION['Pro_RepAct']==1){?><li><?php echo '<a href="RepActMorEve.php?yy=4%rer&uu=true&rr=false&Da=66&yy=4%rer&uu=true&rr=false&Da=66&d='.date("d").'&m='.date("m").'&Y='.date("Y").'&d2='.date("d").'&m2='.date("m").'&Y2='.date("Y").'&d3='.date("d").'&m3='.date("m").'&Y3='.date("Y").'&d4='.date("d").'&m4='.date("m").'&Y4='.date("Y").'&d5='.date("d").'&m5='.date("m").'&Y5='.date("Y").'&d6='.date("d").'&m6='.date("m").'&Y6='.date("Y").'&D=6&D2=6&m7='.date("m").'&Y7='.date("Y").'&d8='.date("d").'&m8='.date("m").'&Y8='.date("Y").'">Import/ Export/ Delete</a>'; ?></li><?php } ?> 
	 <?php if($_SESSION['Processing']==1 OR $_SESSION['Pro_AddAttLeave']==1 OR $_SESSION['Pro_SetEmpMo']==1){?><li><a href="AttEmpMobile.php?m=<?php echo date("m"); ?>&D=6&Y=<?php echo date("Y"); ?>&da=<?php echo date("d"); ?>&yy=4%rer&uu=true&rr=false">Setting Mobile Number</a></li><?php } ?>

	  <li><b>Leave/&nbsp;Reports</b></li>
	  <?php if($_SESSION['Processing']==1 OR $_SESSION['Pro_ApprovedLeave']==1){?><li><a href="ApplyLeave.php?ls=10&wer=123grtd&se=reew&w=ee102&yly=<?php echo date("Y"); ?>&mlm=<?php echo date("m"); ?>&ee=s1s&rer=ert&ttt=trutright&rr=34%44%ee&actt=false">Apply Leave</a></li><?php } ?>
	  <?php if($_SESSION['Processing']==1 OR $_SESSION['Pro_AttReport']==1){?><li><a href="AttReport.php?m=<?php echo date("m"); ?>&D=<?php echo $D; ?>&Y=<?php echo date("Y"); ?>">Attendance Report</a></li><li><a href="RegisAttReport.php?m=<?php echo date("m"); ?>&D=<?php echo $D; ?>&Y=<?php echo date("Y"); ?>">Register Report</a></li><?php } ?>
       <?php if($_SESSION['Processing']==1 OR $_SESSION['Pro_AttReport']==1){?><li><a href="LeaveAttReports.php?m=<?php echo date("m"); ?>&D=<?php echo $D; ?>&Y=<?php echo date("Y"); ?>">Leave (Opening/ Closing)</a></li><?php } ?> 
       <?php if($_SESSION['Processing']==1 OR $_SESSION['Pro_AttReport']==1){?><li><a href="LeaveTotAvailed.php?m=<?php echo date("m"); ?>&D=<?php echo $D; ?>&Y=<?php echo date("Y"); ?>&st=A&cl=1&pl=0&fl=0&sl=0&el=0&tot=1">Leave (Availed)</a></li><?php } ?>  

	  <?php if($_SESSION['Processing']==1 OR $_SESSION['Pro_PaySlipReport']==1){?><li><a href="PaySlipReports.php?m=<?php echo date("m"); ?>&D=<?php echo $D; ?>&Y=<?php echo date("Y"); ?>">PaySlip Reports</a></li><li><a href="EmpTDSMaster.php?m=<?php echo date("m"); ?>&D=<?php echo $D; ?>&Y=<?php echo date("Y"); ?>">Salary Components</a></li><?php } ?> 
	<?php } ?>


	<li><b>Monthly</b></li>
	<?php /* if($_SESSION['Processing']==1 OR $_SESSION['Pro_Monthly_tranDay']==1 OR $_SESSION['Pro_Monthly_tranLumpsum']==1) { ?>
	<li><a href="#" class="fly">Transaction </a>
	 <ul>
	   <?php if($_SESSION['Processing']==1 OR $_SESSION['Pro_Monthly_tranDay']==1){?><li><a href="#">Day</a></li><?php } ?>
	   <?php if($_SESSION['Processing']==1 OR $_SESSION['Pro_Monthly_tranLumpsum']==1){?><li><a href="#">LumpSum Component </a></li><?php } ?>
	 </ul>
	</li>
    <?php } ?>
	<?php if($_SESSION['Processing']==1 OR $_SESSION['Pro_Monthly_Processing']==1){?><li><a href="#">Processing </a></li><?php } */ ?>
	<?php if($_SESSION['Processing']==1 OR $_SESSION['Pro_Monthly_ArrearsCalcu']==1){?><li><a href="BonusProcess.php?act=true&val=102&pefprm=bonus&activity=bomus&ss=34&re=66&ed=0&ey=<?php echo $YearId;?>&er=23&ee=33">Bonus</a></li><?php } ?>
	<?php if(($_SESSION['UserType']=="S" OR $_SESSION['UserType']=="M" OR $_SESSION['UserType']=="A" OR $_SESSION['UserType']=="U") AND ($_SESSION['Processing']==1 OR $_SESSION['Pro_Monthly_CloseMonth']==1)){?><li><a href="MonthlyProcess.php">Monthly Process</a></li><?php } ?>
	</ul>
  </li>		
<?php /************************************************************************ Processing Close ***********************************************************/ ?>	 
<?php } if($UserId!=12 AND $UserId!=13) { ?>
<?php /************************************************************************ Utility Open ***********************************************************/ ?>	 
  <li class="top"><a href="#" id="shop" class="top_link"><span class="down">Utility</span></a>
   <ul class="sub">
    <?php if(($_SESSION['UserType']=="S" OR $_SESSION['UserType']=="M") AND ($_SESSION['Utility']==1 OR $_SESSION['Util_MasterAdmin']==1)){?><li><a href="MasterAdmin.php">Master Admin</a></li><?php } ?>
	<?php if(($_SESSION['UserType']=="S" OR $_SESSION['UserType']=="M" OR $_SESSION['UserType']=="A") AND ($_SESSION['Utility']==1 OR $_SESSION['Util_UserRight']==1)){?><li><a href="MasterUser.php">Master User</a></li><?php } ?>
	<?php if($_SESSION['Utility']==1 OR $_SESSION['Util_ChangePwd']==1){?><li><a href="ChangePwd.php">Change Password </a></li><?php } ?>
	
	<li><a>HR Policy Manual</a></li>
	<?php if($_SESSION['Utility']==1 OR $_SESSION['Util_UpdateNotification']==1){?><li><a href="UpdateNotification.php">Update Notification </a></li><?php } ?>
    <?php if($_SESSION['Utility']==1 OR $_SESSION['Util_ImportEmpHIncrement']==1 OR $_SESSION['Util_CustomizePayslip']==1){ ?>
	 <li><a href="#" class="fly">Import Excel-Csv</a>
	  <ul>
	    <li><a href="ImportLeaveAtt.php">Salary Components</a></li>
	    <li><a href="ImportEmpData.php">Employee Data</a></li>
	  </ul>
	 </li>
	<?php } ?> 
	<li><a href="ReportsFamily.php?YI=<?php echo $YearId; ?>">Vaccination Status</a></li>
	
	<?php /*?>
	<?php if($_SESSION['Utility']==1 OR $_SESSION['Util_SendMail_PaySlip']==1 OR $_SESSION['Util_SendMail_ReimbPayslip']==1){?>
	<li><a href="#" class="fly">Sending Mail</a>
	 <ul>
	  <?php if($_SESSION['Utility']==1 OR $_SESSION['Util_SendMail_PaySlip']==1){?><li><a href="#">PaySlip</a></li><?php } ?>
	  <?php if($_SESSION['Utility']==1 OR $_SESSION['Util_SendMail_ReimbPayslip']==1){?><li><a href="#">Reimbursement PaySlip</a></li><?php } ?>
	 </ul>
    </li>
	<?php } ?>
	<?php if($_SESSION['Utility']==1 OR $_SESSION['Util_CustomizePayslip']==1){?><li><a href="#">Customization PaySlip</a></li><?php } ?> 
	
	*/ ?>
	
        <?php if($_SESSION['Utility']==1 OR $_SESSION['Util_EmpProfileStatus']==1){?>

	  <li><a href="#" class="fly">Profile</a>
	  <ul>
	    <?php if($_SESSION['UserType']=="S" OR $_SESSION['UserType']=="M" OR $_SESSION['UserType']=="A" OR $_SESSION['UserType']=="U"){ 
	    
	    if($_SESSION['UserType']=="S" OR $_SESSION['UserType']=="M" OR $_SESSION['UserType']=="A"){
	    ?>
	    <li><a href="ProfileSet.php?ls=10&wer=123&aa=grtd&er=er%re%tr%rr&trt=equalthen&sys=%tr%tr&se=reew&w=ee102&aa=grtd&er=er%re%tr%rr&trt=equalthen">Setting</a></li>
	    <?php } ?>
	    
		<li><a href="EmpProfileStatus.php?ls=10&wer=123&aa=grtd&er=er%re%tr%rr&trt=equalthen&dd=11&ee=s1s&aa=grtd&er=er%re%tr%rr&trt=equalthen">Status [OneTime]</a></li>
<?php $Maxp=mysql_query("select Max(PYmId) as MaxId from hrm_employee_procertify_ym where CompanyId=".$CompanyId, $con); $resMaxp=mysql_fetch_array($Maxp);?>		
		<li><a href="EmpProfileStatusTtT.php?ls=10&wer=123&aa=grtd&er=er%re%tr%rr&trt=equalthen&dd=11&ee=s1s&aa=grtd&er=er%re%tr%rr&trt=equalthen&mxid=<?php echo $resMaxp['MaxId']; ?>">Status [TimeToTime]</a></li>
           <?php } ?>  
           
          
	  </ul>
	  </li>


	  <li><a href="#" class="fly">Invest Declaration</a>
	  <ul>
	    <?php if($_SESSION['UserType']=="S" OR $_SESSION['UserType']=="M" OR $_SESSION['UserType']=="A"){ ?>
	    <li><a href="InvetDeclSet.php?ls=10&wer=123&aa=grtd&er=er%re%tr%rr&trt=equalthen&sys=%tr%tr&se=reew&w=ee102&aa=grtd&er=er%re%tr%rr&trt=equalthen">Setting</a></li>
		<?php } ?>
<?php $Max=mysql_query("select Max(YMId) as MaxId from hrm_investdecl_ym where CompanyId=".$CompanyId, $con); $resMax=mysql_fetch_array($Max);?>		
		<li><a href="EmpInvestDecl.php?ls=10&wer=123&aa=grtd&er=er%re%tr%rr&trt=equalthen&sys=%tr%tr&se=reew&w=ee102&mxid=<?php echo $resMax['MaxId']; ?>&dd=11&ee=s1s&aa=grtd&er=er%re%tr%rr&trt=equalthen">Invest. Decl. Status</a></li>

<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$YearId, $con); $resy=mysql_fetch_array($sqly);
	  $fsd=date("Y",strtotime($resy['FromDate'])); $tsd=date("Y",strtotime($resy['ToDate'])); $Prd=$fsd.'-'.$tsd; ?>		
		<li><a href="EmpInvestSub.php?ls=10&wer=123&aa=grtd&er=er%re%tr%rr&trt=equalthen&sys=%tr%tr&se=reew&w=ee102&prd=<?php echo $Prd; ?>&dd=11&ee=s1s&aa=grtd&er=er%re%tr%rr&trt=equalthen">Invest. Submiss<sup>n</sup> Status</a></li>


	  </ul>
	 </li>
	<?php } ?>   
	
	
	<?php //if($_SESSION['Utility']==1){ ?>
	<li><a href="#" class="fly">Upload Document</a>
	 <ul>
	  <?php //if($_SESSION['Utility']==1){?><li><a href="Up_VNRImpct.php">VNR Impact</a></li><?php //} ?>
	  <?php //if($_SESSION['Utility']==1){?><li><a href="Up_HealthID.php?d=0">HealthID Card</a></li><?php //} ?>
	  <?php //if($_SESSION['Utility']==1){?><li><a href="Up_ESICard.php?d=0">ESIC Card</a></li><?php //} ?>
	  <?php //if($_SESSION['Utility']==1){?><li><a href="Up_CovidInsu.php?d=0">Covid Insu. Paper</a></li><?php //} ?>
	 </ul>
    </li>
	<?php //} ?> 

	
	<?php if($_SESSION['Utility']==1 OR $_SESSION['Util_ConfLetter']==1){?>
	 <li><b>Confirmation</b></li>
	 <li><a href="EmpConfLetter.php">Confirmation Letter</a></li>
	 <li><a href="EmpConMonthly.php">Monthly Confirmation</a></li>
	<?php } ?>
	
	<li><b>Assign</b></li>
	<?php if($_SESSION['Utility']==1 OR $_SESSION['Util_AssignEmpState']==1){?><li><a href="AssignEmpState.php">Assign Employee State</a></li><?php } ?>
    <?php if($_SESSION['Utility']==1 OR $_SESSION['Util_AssignEmpPaySlip']==1){?><li><a href="AssignEmpPaySlip.php">Assign PaySlip/ Menu</a></li><?php } ?>
    
	<?php if($_SESSION['Utility']==1 OR $_SESSION['Util_ReportingLeaveQuery']==1 OR $_SESSION['Util_ReportingPmsKra']==1) { ?> 
	<li><a href="#" class="fly">Reporting</a>
	 <ul>
	  <?php if($_SESSION['Utility']==1 OR $_SESSION['Util_ReportingLeaveQuery']==1){?><li><a href="ReportingLeaveQuery.php">Leave/ Query Reporting</a></li><?php } ?>
	  <?php if($_SESSION['Utility']==1 OR $_SESSION['Util_ReportingPmsKra']==1){?><li><a href="ReportingPmskra.php">PMS/ KRA Reporting</a></li><?php } ?>
	 </ul>
    </li>
    <li><a href="WhishesChecker.php?m=<?=date("m")?>">Wishes Mail Checker</a></li>
	<?php } ?>
     <?php if($_SESSION['Utility']==1 OR $_SESSION['Util_Backup']==1){?><li><a href="UpdateBackUp.php">Backup-File</a></li><?php } ?>
     <?php if($_SESSION['UserType']=="S" OR $_SESSION['UserType']=="M"){?><li><a href="UELogBook.php">LogBook</a></li><?php } ?>	  
   </ul>
  </li> 
<?php /************************************************************************ Utility Close ***********************************************************/ ?>	
<?php } if($UserId!=12 AND $UserId!=13) { ?> 
<?php /************************************************************************ Query Open ***********************************************************/ ?>	 
  <li class="top"><a href="#" id="privacy" class="top_link"><span class="down">Query</span></a>
   <ul class="sub">
<?php  $sqlQ=mysql_query("select * from hrm_employee_queryemp INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_queryemp.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND (hrm_employee_queryemp.QStatus=0 OR hrm_employee_queryemp.QStatus=1) AND hrm_employee_queryemp.HRQStatus=0 AND hrm_employee.CompanyId=".$CompanyId." order by QueryDT DESC", $con); $rowQ=mysql_num_rows($sqlQ); ?>			    
     <?php if($_SESSION['Query']==1 OR $_SESSION['Query_Sub']==1){?><li><a href="SettingQSubject.php">Assign Query Subject</a></li><?php } ?> 	
     <?php if($_SESSION['Query']==1 OR $_SESSION['Query_Owner']==1){?><li><a href="AssignEmpQSubject.php">Assign Query Owner</a></li><?php } ?>  	
     <?php if($_SESSION['Query']==1 OR $_SESSION['Query_Assign']==1){?><li><a href="OpenQuery.php?page=1">Assign Query</a></li><?php } ?> 			  
     <?php if($_SESSION['Query']==1 OR $_SESSION['Query_Pending']==1){?><li><a href="EmpDraftQ.php?page=1">Pending Query&nbsp;&nbsp;<font style="font-weight:bold;color:#FF860D; font-size:12px;"><?php echo '('.$rowQ.')'; ?></font></a></li><?php } ?>
     <?php if($_SESSION['Query']==1 OR $_SESSION['Query_Answer']==1){?><li><a href="EmpReplyQ.php?page=1">Reply/ Answered Query</a></li><?php } ?> 
     <?php if($_SESSION['Query']==1 OR $_SESSION['Query_Closed']==1){?><li><a href="EmpCloseQ.php?page=1">Closed Query</a></li><?php } ?>
     <?php if($_SESSION['Query']==1 OR $_SESSION['Query_Report']==1){?><li><a href="QueryReport.php?page=1">Query Reports</a></li> <?php } ?>
     <?php if($_SESSION['Query']==1 OR $_SESSION['Query_Log']==1){?><li><a href="QueryLogReport.php?page=1">Query Log Reports</a></li> <?php } ?>
      <?php if(($_SESSION['UserType']=="S" OR $_SESSION['UserType']=="M") AND ($_SESSION['Query']==1 OR $_SESSION['Query_MailTo']==1)){?><li><a href="QueryMailTo.php?page=1">Assign Query Mail To</a></li> <?php } ?>
   </ul>
  </li> 	
<?php /************************************************************************ Query Close ***********************************************************/ ?>	 
<?php } if($UserId!=12 AND $UserId!=13) { ?> 
<?php /************************************************************************ PMS Open ***********************************************************/ ?>	 
  <li class="top"><a href="#" id="privacy" class="top_link"><span class="down">PMS</span></a>
   <ul class="sub">
   <?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_KRA']==1 OR $_SESSION['PMS_DeptKRA']==1 OR $_SESSION['PMS_WeightageForKRA']==1 OR $_SESSION['PMS_EditKRA']==1){?>
   <li><a href="#" class="fly">KRA</a>
    <ul> 
	<?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_KRA']==1){?><li><a href="KRA.php?YI=<?php echo $YearId; ?>">Departmental KRA</a></li><?php } ?>
    <?php /* if($_SESSION['PMS']==1 OR $_SESSION['PMS_DeptKRA']==1){?><li><a href="DesigKRA.php">Distribute Standard KRA</a></li><?php } */ ?>
    <?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_EditKRA']==1){?><li><a href="EditKRA.php">Employee KRA</a></li><?php } ?>
    <?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_KRAStatus']==1){?><li><a href="KRAStatus.php">KRA Status</a></li><?php } ?>
    <?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_EditKRA']==1){?><li><a href="PendKRASub.php">Pending KRA Submission</a></li><?php } ?>
    <?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_EditKRA']==1){?><li><a href="PeriodicKraEmp.php">Employee (Periodic KRA) </a></li><?php } ?>
    <?php /* if($_SESSION['PMS']==1 OR $_SESSION['PMS_WeightageForKRA']==1){?><li><a href="WeightageForKRA.php">Weightage for KRA</a></li><?php } */ ?>   
	</ul>
   </li>
  <?php } ?>
  <?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_FormB']==1 OR $_SESSION['PMS_GradeFormB']==1 OR $_SESSION['PMS_FeedBack']==1){ ?>
  <li><a href="#" class="fly">Form/ FeedBack</a>
    <ul> 
	<?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_FormB']==1){?><li><a href="FormB.php">Form_B</a></li><?php } ?>
    <?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_GradeFormB']==1){?><li><a href="GradeFormB.php">Grade Wise Form_B</a></li><?php } ?>
    <?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_FeedBack']==1){?><li><a href="FeedBack.php">Feedback</a></li><?php } ?>
	</ul>
   </li>
   <li><a href="FormABAchive.php?act=finddata&sel=valuetrue&recur=setvalue&y=<?php echo $YearId; ?>&a=form-A&b=0&c=22&d=0&e=0&rr=true&dd=false">Form A & B Achievement</a></li>
   <?php } ?>
   <?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_SelectAppRev']==1 OR $_SESSION['PMS_AssAppReviewer']==1){ ?>
   <li><b>App/ Rev/ HOD</b></li> 
   <?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_SelectAppRev']==1){?><li><a href="SelectAppRev.php">Select App/ Reviewer</a></li><?php } ?>
   <?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_AssAppReviewer']==1){?><li><a href="AssAppReviewer.php">Assign App/ Rev/ HOD</a></li><?php } ?> 
   <?php } ?>
   <li><b>Standards</b></li>
   <?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_Rating']==1 OR $_SESSION['PMS_NormalRatDistri']==1 OR $_SESSION['PMS_IncDistri']==1  OR $_SESSION['PMS_Percentage']==1 OR $_SESSION['PMS_Schedule']==1 OR $_SESSION['PMS_OpenCloseMenu']==1){ ?>
   <li><a href="#" class="fly">Setting</a>
    <ul> 
	<?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_Rating']==1){?><li><a href="Rating.php?ey=<?php echo $YearId; ?>">Rating</a></li><?php } ?>
	<?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_NormalRatDistri']==1){?><li><a href="NormalRatDistri.php?ey=<?php echo $YearId; ?>">Normal Rating Distribution</a></li><?php } ?>
	<?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_Percentage']==1){?><li><a href="Percentage.php?ey=<?php echo $YearId; ?>">Weightage Distribution</a></li><?php } ?>
        
        <?php $sqlKeey=mysql_query("select * from hrm_pms_key where Person='emp' AND CompanyId=".$CompanyId, $con); 
          $resKeey=mysql_fetch_assoc($sqlKeey);
		  if($resKeey['KRAForm']=='Y'){$sqlY=mysql_query("select CurrY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='KRA'", $con);}elseif($resKeey['MidPmsForm']=='Y'){$sqlY=mysql_query("select CurrY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='Mid_PMS'", $con);}elseif($resKeey['AppraisalForm']=='Y'){$sqlY=mysql_query("select CurrY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'", $con);}else{$sqlY=mysql_query("select CurrY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='KRA'", $con);} $resY=mysql_fetch_assoc($sqlY);
	?>
	<?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_Schedule']==1){?><li><a href="Schedule.php?ey=<?php echo $resY['CurrY']; ?>">Schedule</a></li><?php } ?>  
	
	   <li><b>COT</b></li>
	   <?php if($_SESSION['UserType']=='S' AND ($_SESSION['PMS']==1 OR $_SESSION['PMS_OpenCloseMenu']==1)){?>
	   <li><a href="MyTeamCost.php?YI=<?php echo $YearId; ?>&action=Over">Without Un assigned</a></li>
       <li><a href="MyTeam2Cost.php?YI=<?php echo $YearId; ?>&action=Over">With Un-assigned</a></li>
       
       <li><b>COT (Annual Basic)</b></li>
	   <li><a href="MyTeamCostPack.php?YI=<?php echo $YearId; ?>&action=Over">Without Un assigned</a></li>
       <li><a href="MyTeam2CostPack.php?YI=<?php echo $YearId; ?>&action=Over">With Un-assigned</a></li>
	   <?php } ?>
	
        <li><b></b></li>
	<?php if($_SESSION['UserType']=='S' AND  ($_SESSION['PMS']==1 OR $_SESSION['PMS_OpenCloseMenu']==1)){?>
        
        <?php if($UserId==9 OR $UserId==10 OR $UserId==14 OR $UserId==4 OR $UserId==11){ ?>
        <li><a href="SetKraPms.php">Setting KRA/PMS</a></li>
        
        <?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_IncDistri']==1){?>
         <li><a href="MinMaxVertical.php?act=checkdept&dr=23&rr=false&rr=98&ff=23&dd=3&d=4&ed=2">Setting Vertical (Min/Max)</a></li>
         <li><a href="IncDistriNew.php?ey=<?php echo $YearId; ?>&m=0&d=0&h=0&v=0&r=0&a=0">Increment Distribution.(New)</a></li>
         <li><a href="IncDistri.php?ey=<?php echo $YearId; ?>&h=0&d=0&r=0&h2=0&v=0">Increment Distribution (Old)</a></li>
        <?php } ?>
        
        <?php } ?>
        
        <?php /*<li><a href="PmsOpenClose.php?ey=<?php echo $YearId; ?>">Open/ Close Menu</a></li> */ ?>
        <li><a href="EditEmpForms.php?ey=<?php echo $YearId; ?>&h=0&d=0&r=0">Employee Forms</a></li>
        <li><a href="EditAdminPms.php?YI=<?php echo $YearId; ?>&hod=0&hr=0&app=1&rev=0">Edit Pms Form</a></li>
       <?php } ?>   
	</ul>
   </li>
   <?php } ?>
   <?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_StatusReportDept']==1 OR $_SESSION['PMS_StatusReportDept']==1 OR $_SESSION['PMS_StatusReportDept']==1 OR $_SESSION['PMS_EditHR']==1){ ?>
   <li><a href="#" class="fly">Appraisal</a>
    <ul> 
	<?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_StatusReportDept']==1){?><li><a href="AppsalPmsStts.php?YI=<?=$YearId;?>">PMS Status</a></li><?php } ?>
	<?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_StatusReportDept']==1){?><li><a href="AppsalPmsAllw.php">Allow PMS</a></li><?php } ?>
	<?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_StatusReportDept']==1){?><li><a href="AppsalPmsInc.php">Allow Increment</a></li><?php } ?>
	<?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_EditHR']==1){?>
	
	<li><a href="PmsEditHR.php">Edit Appraisal form</a></li>
	
	<?php if($UserId==4 OR $UserId==9 OR $UserId==10 OR $UserId==14){?>
	  <li><a href="MovePMStoESS.php">Move & View PMS Data</a></li>
	 <?php } ?>
	
	<?php } ?>
	
	
	<?php /*if($_SESSION['PMS']==1 OR $_SESSION['PMS_StatusReportDept']==1){?><li><a href="PmsReportDeptWise.php">PMS Status_Demo</a></li><?php } ?>
    <?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_StatusReportDept']==1){?><li><a href="PmsReportDeptWise.php">Department Wise</a></li><?php } ?>
    <?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_RatingGraph']==1){?><li><a href="#">Rating Graph</a></li><?php } //RatingGraph.php */ ?>  
	</ul>
   </li>
   <?php } ?>
   <?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1){?>
   <li><b>Reports</b></li>
   <?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1){?><li><a href="AppsalPmseARH.php?YI=<?php echo $YearId; ?>">App/ Rev/ HOD</a></li><?php } ?>
   <li><a href="#" class="fly">PMS Forms</a>
    <ul> 
	<?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1){?><li><a href="AppsalPmseFormKra.php?YI=<?php echo $YearId; ?>">KRA</a></li><?php } ?>
	<?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1){?><li><a href="AppsalPmseFormAch.php?YI=<?php echo $YearId; ?>">Achievement</a></li><?php } ?>
	<?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1){?><li><a href="AppsalPmseFormFdBck.php?YI=<?php echo $YearId; ?>">Feedback</a></li><?php } ?>
	<?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1){?><li><a href="AppsalPmseFormTraCfn.php?YI=<?php echo $YearId; ?>">Trainig</a></li><?php } ?>
	</ul>
   </li>
   <?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1){?><li><a href="AppsalPmseScrRatg.php?YI=<?php echo $YearId; ?>">Score-Grade-Desig</a></li><?php } ?>
   <li><a href="#" class="fly">HOD</a>
    <ul> 
	<?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1){?><li><a href="AppsalPmseHodInc.php?YI=<?php echo $YearId; ?>">Employee Increment</a></li><?php } ?>
	<?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1){?><li><a href="AppsalPmseHodIncDept.php?YI=<?php echo $YearId; ?>">Overall Increment</a></li><?php } ?>
	<?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1){?><li><a href="AppsalPmseHodStdInc.php?YI=<?php echo $YearId; ?>&act=d">Standard Increment</a></li><?php } ?>
	</ul>
   </li>
   <li><a href="#" class="fly">Full & Final (HR)</a>
    <ul> 
	<?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1){?><li><a href="AppsalPmseHRInc.php?YI=<?php echo $YearId; ?>">Employee Increment</a></li><?php } ?>
	<?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1){?><li><a href="AppsalPmseHRIncDept.php?YI=<?php echo $YearId; ?>">Overall Increment</a></li><?php } ?>
	</ul>
   </li>
   <?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1){?><li><a href="AppsalPmseCmptPrs.php?YI=<?php echo $YearId; ?>">Complete Process</a></li><?php } ?>
   <?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1){?><li><a href="AppsalPmseIncHis.php?YI=<?php echo $YearId; ?>">Increment History</a></li><?php } ?>
   <li><a href="#" class="fly">Rating Graph</a>
    <ul> 
<?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1){?><li><a href="AppsalRatGraphEmp.php?YI=<?php echo $YearId; ?>">Employee - Normal Dis<sup>n</sup></a></li><?php } ?>
<?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1){?><li><a href="AppsalRatGraphDept.php?YI=<?php echo $YearId; ?>">HOD - Normal Dis(Dept)<sup>n</sup></a></li><?php } ?>
<?php if($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1){?><li><a href="AppsalRatGraphHod.php?YI=<?php echo $YearId; ?>">HOD - Normal Dis<sup>n</sup></a></li><?php } ?>
	</ul>
   </li>
   <li><a href="PMSReports.php?YI=<?php echo $YearId; ?>">Reports-OLD</a></li>
   <?php } ?>
 </ul>
</li> 	
<?php /************************************************************************ PMS Close ***********************************************************/ ?>	  
<?php } if($UserId!=12 AND $UserId!=13) { ?> 
<?php /************************************************************************ Asset Open ***********************************************************/ ?>
<?php if($_SESSION['UserType']=='S' OR $UserId==5 OR $UserId==22 OR $UserId==23) { ?>
  <li class="top"><a href="#" id="privacy" class="top_link"><span class="down">Assets</span></a>
   <ul class="sub">
	  <li><a href="AssetType.php">Asset Type/Category</a></li>
	  <li><a href="AssetDpta.php">Department Access</a></li>
	  <li><a href="AssetName.php">Asset Name</a></li>
	  <li><a href="AssetNameGrade.php">Grade Wise Limit</a></li>
	  <li><a href="AssetEmpMaster.php">Employee Asset</a></li> 
	  <li><a href="AssetEmpReq.php?ls=10&wer=123grtd&se=reew&w=ee102&yly=<?php echo date("Y"); ?>&ee=s1s">Employee Asset Req</a></li>
          <li><a href="Assetreports.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&chk=<?php echo $UserId; ?>&allot=0&reqt=1&all=0&d=0&ast=0&yer=<?php echo $YearId; ?>&ss=89&f=0i&wer=true&c=<?php echo $CompanyId; ?>&chk2=<?php echo $UserId; ?>&chk3=<?php echo $UserId; ?>&chk4=<?php echo $UserId; ?>&Demp=0&app=1&dra=1&ove=1">Reports</a></li>
	  <li><b></b></li>
	  <li><a href="#">Asset Bill</a></li> <?php /* EmpAssBill.php */ ?>
	  <li><a href="#">Import Asset Bill</a></li> <?php /* ImportAssExcel.php */ ?>
   </ul>
  </li>	 
  <?php } ?>
<?php /************************************************************************ Asset Close ***********************************************************/ ?>
<?php } if($UserId!=12 AND $UserId!=13){ ?> 
<?php /************************************************************************ Separation Open ***********************************************************/ ?>
  <li class="top"><a href="#" id="privacy" class="top_link"><span class="down">Separation</span></a>
   <ul class="sub">
     <?php if($_SESSION['Separation']==1 OR $_SESSION['Separ_Resig_AwaitAct_PendingResig']==1 OR $_SESSION['Separ_Resig_AwaitAct_PendingClear']==1 OR $_SESSION['Separ_Resig_AwaitAct_FF_Settle']==1){?>
	  <?php if($_SESSION['Separation']==1 OR $_SESSION['Separ_Resig_AwaitAct_PendingResig']==1){?><li><a href="PendingResig.php">Pending Resignation </a></li><?php } ?>
			<?php if($_SESSION['Separation']==1){?>
			
			<?php $scnt=mysql_query("select * from hrm_employee_separation where HR_Approved='Y' AND ((Rep_Approved='Y' AND Rep_RelievingDate3!='0000-00-00' AND Rep_RelievingDate3!='1970-01-01' AND Rep_RelievingDate3!='' AND Rep_RelievingDate3!=HR_RelievingDate) OR (Rep_Approved='Y' AND Rep_RelievingDate2!='0000-00-00' AND Rep_RelievingDate2!='1970-01-01' AND Rep_RelievingDate2!='' AND Rep_RelievingDate2!=HR_RelievingDate) OR (Hod_Approved='Y' AND Hod_RelievingDate3!='0000-00-00' AND Hod_RelievingDate3!='1970-01-01' AND Hod_RelievingDate3!='' AND Hod_RelievingDate3!=HR_RelievingDate) OR (Hod_Approved='Y' AND Hod_RelievingDate2!='0000-00-00' AND Hod_RelievingDate2!='1970-01-01' AND Hod_RelievingDate2!='' AND Hod_RelievingDate2!=HR_RelievingDate))"); $rscnt=mysql_num_rows($scnt); ?>			 
			 <li><a href="PendReAppHR.php">Pending Re-Approval <font style="font-weight:bold;color:#FF6C6C;">(<?php echo $rscnt;?>)</font></a></li>
			
			<li><a href="ApprovedCanResig.php">Approved/Cancellation</a></li>
			<?php } ?>
			<?php if($_SESSION['Separation']==1 OR $_SESSION['Separ_Resig_AwaitAct_PendingClear']==1){?><li><a href="PendingClearance.php">Clearance Status</a></li><?php } ?> 
			<?php if($_SESSION['Separation']==1 OR $_SESSION['Separ_Resig_AwaitAct_FF_Settle']==1){?><li><a href="FullFinalSettle.php">Full & Final Settlement</a></li>
			<li><a href="EmpTGratuity.php">Gratuity Pay</a></li>
			<?php } ?>	
	 <?php } ?>
	 <li><b></b></li>
	 
    <?php if($_SESSION['Separation']==1 OR $_SESSION['Separ_Resig_AwaitAct_PendingResig']==1){?><li><a href="AdminReesignation.php">Post Resig/ Termi/ Retired</a></li><?php } ?>
	 <?php /*if($_SESSION['Separation']==1 OR $_SESSION['Separ_Termination']==1){?><li><a href="#">Post Termination</a></li><?php } //Absconding AdminTermtion.php */ ?>

	 <?php if($_SESSION['Separation']==1){?><li><a href="AssignResigNOCEmp.php">Assign NOC Owner</a></li><?php } ?>
	 <?php if(($_SESSION['Separation']==1 OR $_SESSION['Separ_Absconding']==1) AND ($_SESSION['UserType']=="S" OR $_SESSION['UserType']=="M" OR $_SESSION['UserType']=="A" OR $_SESSION['UserType']=="U")){?><li><a href="SepResigPermission.php">Control Panel</a></li><?php } ?>
   </ul>
  </li>	 
<?php /************************************************************************ Separation Close ***********************************************************/ ?>



<?php if($_SESSION['UserType']=="S" OR $_SESSION['UserType']=="A" OR $_SESSION['UserType']=="U"){ ?>
<li class="top"><a href="#" id="privacy" class="top_link"><span class="down">Ess Mobile</span></a>
   <ul class="sub">  
    <li><b>Permission</b></li>
	<li><a href="Apps_AppPerm.php?act=search&DpId=&s=A">Employee Access</a></li>
	<li><a href="Apps_PunPerm.php">Punch Department / InTime</a></li>
	<li><a href="Apps_ToolPerm.php">Tool Permission</a></li>
	
	<li><b>Setting</b></li>
	<li><a href="Apps_VerPunch.php">Version, Punch-Sink Time</a></li>
	<li><a href="Apps_support.php">Support Details</a></li>
	<li><a href="Apps_notification.php">Notification</a></li>
   
    <li><b>Reports</b></li>
	<li><a href="Apps_Loction.php?act=search&DpId=&s=A&e=">Location Tracking</a></li>
	<li><a href="Apps_Download.php?act=search&DpId=&s=D&e=">Download Details</a></li>
   </ul>
</li>	
<?php } ?>





<?php } if($UserId!=12 AND $UserId!=13) { ?> 
<?php /************************************************************************ Reports Open ***********************************************************/ ?>
   <li class="top"><a href="#" id="privacy" class="top_link"><span class="down">Report</span></a>
   <ul class="sub">

    <?php if($_SESSION['Report']==1 OR $_SESSION['Report_CTC']==1 OR $_SESSION['Report_EmpDetail_Elig']==1 OR $_SESSION['Report_AnnualSalary_Report']==1){ ?>
	<li><a href="#" class="fly">Salary</a>
	 <ul>
	 <?php if($_SESSION['Report']==1 OR $_SESSION['Report_CTC']==1){?><li><a href="ReportsCTC.php?YI=<?php echo $YearId; ?>">CTC</a></li><?php } ?>
	 <?php if($_SESSION['Report']==1 OR $_SESSION['Report_EmpDetail_Elig']==1){?><li><a href="ReportsElig.php?YI=<?php echo $YearId; ?>">Eligibility</a></li><?php } ?>
     <?php if($_SESSION['Report']==1 OR $_SESSION['Report_AnnualSalary_Report']==1){?><li><a href="ReportsAnnualsalary.php?YI=<?php echo $YearId; ?>">Annual Salary Report</a></li><?php } ?>
	 
      <li><a href="ReportsMonthlyVal.php?act=true&wew=e%e@er%rdd=012&y=<?php echo $YearId; ?>&d=0&yy=utu&mailto=promt">Paid Values</a></li>
	  <li><a href="ReportsMonthActualVal.php?act=true&wew=e%e@er%rdd=012&y=<?php echo $YearId; ?>&d=0&yy=utu&mailto=promt">Actual Values</a></li> 
	 
	 
	 </ul>
	</li>
    <?php } ?>


	<li>&nbsp;<font color="#ff6">---------------------</font></li>
	<?php if($_SESSION['Report']==1 OR $_SESSION['Report_EmpDetail_General']==1 OR $_SESSION['Report_EmpDetail_Personal']==1 OR $_SESSION['Report_EmpDetail_LangProf']==1 OR $_SESSION['Report_EmpDetail_Quali']==1 OR $_SESSION['Report_EmpDetail_Contact']==1 OR $_SESSION['Report_EmpDetail_History']==1 OR $_SESSION['Report_EmpDetail_Exp']==1 OR $_SESSION['Report_EmpDetail_Family']==1  OR $_SESSION['Report_EmpDetail_All']==1){ ?>
	<li><a href="#" class="fly">Employee Details</a>
	 <ul>
	  <?php if($_SESSION['Report']==1 OR $_SESSION['Report_EmpDetail_General']==1){?><li><a href="ReportsGeneral.php?YI=<?php echo $YearId; ?>">General</a></li><?php } ?>
	  <?php if($_SESSION['Report']==1 OR $_SESSION['Report_EmpDetail_Personal']==1){?><li><a href="ReportsPersonal.php?YI=<?php echo $YearId; ?>">Personal</a></li><?php } ?>
	  <?php if($_SESSION['Report']==1 OR $_SESSION['Report_EmpDetail_Contact']==1){?><li><a href="ReportsContact.php?YI=<?php echo $YearId; ?>">Contact</a></li><?php } ?>
	  <?php if($_SESSION['Report']==1 OR $_SESSION['Report_EmpDetail_LangProf']==1){?><li><a href="ReportsLangProfi.php?YI=<?php echo $YearId; ?>">Language Proficiency</a></li><?php }?>
	  <?php if($_SESSION['Report']==1 OR $_SESSION['Report_EmpDetail_Quali']==1){?><li><a href="ReportsQuali.php?YI=<?php echo $YearId; ?>">Qualification</a></li><?php } ?>
	  <?php /* if($_SESSION['Report']==1 OR $_SESSION['Report_EmpDetail_History']==1){?><li><a href="#">History</a></li><?php } */ ?>
	  <?php if($_SESSION['Report']==1 OR $_SESSION['Report_EmpDetail_Exp']==1){?><li><a href="ReportsExp.php?YI=<?php echo $YearId; ?>">Experience</a></li><?php } ?>
	  <?php if($_SESSION['Report']==1 OR $_SESSION['Report_EmpDetail_Family']==1){?><li><a href="ReportsFamily.php?YI=<?php echo $YearId; ?>">Family</a></li><?php } ?>
	  <?php if($_SESSION['Report']==1 OR $_SESSION['Report_EmpDetail_All']==1){?><li><a href="ReportEmpDetailsAll.php?act=resutreports&vcheck=true&yy=23%23%e&truekey=false&YI=<?php echo $YearId; ?>&s=A&rightn=ee&rr=34&frf=34&yey=5">All Details</a></li><?php } ?>
	 </ul>
	</li>
	<?php if($_SESSION['Report']==1){?>
	<li><a href="RsOpinion.php?act=resutreports&vcheck=true&yy=23%23%e&truekey=false&YI=<?php echo $YearId; ?>&s=A&rightn=ee&rr=34&frf=34&yey=5">Opinion</a></li>
	<li><a href="HealthIdCard.php?act=resutreports&vcheck=true&yy=23%23%e&truekey=false&YI=<?php echo $YearId; ?>&s=A&rightn=ee&rr=34&frf=34&yey=5&d=0">Health ID Card</a></li>
	<?php } ?>
	<li>&nbsp;<font color="#ff6">---------------------</font></li>	
	<?php if($_SESSION['Report']==1){?><li><a href="RsAttrition.php?y=<?php echo $YearId; ?>">Attrition</a></li><?php } ?>
	<?php if($_SESSION['Report']==1){?><li><a href="RsHCount.php?y=<?php echo $YearId; ?>">Head Count & Attrition</a></li><?php } ?>
	<?php if($_SESSION['Report']==1){?><li><a href="RsAgeing.php?y=<?php echo $YearId; ?>">Ageing (Exp Slab)</a></li><?php } ?>
	<?php if($_SESSION['Report']==1){?><li><a href="RsManPower.php?y=<?php echo $YearId; ?>">Ageing (Manpower Slab)</a></li><?php } ?>
	<?php if($_SESSION['Report']==1){?><li><a href="RsOnBoarding.php?y=<?php echo $YearId; ?>">On Boarding</a></li><?php } ?>
	<?php if($_SESSION['Report']==1){?><li><a href="RsLocDeptManPower.php?y=<?php echo $YearId; ?>">Manpower (Loc & Dept)</a></li><?php } ?>
	<?php if($_SESSION['Report']==1){?><li><a href="RsCopensation.php?y=<?php echo $YearId; ?>">Compensation</a></li><?php } ?>
	<li>&nbsp;<font color="#ff6">---------------------</font></li>
	<?php } ?>
    <?php if($_SESSION['Report']==1 OR $_SESSION['Report_AttLeave_MonthlyAtt']==1 OR $_SESSION['Report_AttLeave_YearlyAtt']==1 OR $_SESSION['Report_AttLeave_Leave']==1){ ?>
	<li><a href="#" class="fly">Attendance&nbsp;/&nbsp;Leave </a>
	 <ul>
	   <?php if($_SESSION['Report']==1 OR $_SESSION['Report_AttLeave_MonthlyAtt']==1){?><li><a href="RsAttReport.php?m=<?php echo date("m"); ?>&D=<?php echo $D; ?>&Y=<?php echo date("Y"); ?>&rpi=0&OldNew=Old">Monthly Attendance</a></li><?php } ?>
	   <?php /* if($_SESSION['Report']==1 OR $_SESSION['Report_AttLeave_YearlyAtt']==1){?><li><a href="#">Yearly Attendance</a></li><?php } */ ?>
	   <?php if($_SESSION['Report']==1 OR $_SESSION['Report_AttLeave_Leave']==1){?><li><a href="RsLeave.php?m=<?php echo date("m"); ?>&D=<?php echo $D; ?>&Y=<?php echo date("Y"); ?>">Leave</a></li><?php } ?>
	 </ul>
	</li>
	<?php } ?>
	<?php /* if($_SESSION['Report']==1 OR $_SESSION['Report_PF_Form3A'] OR $_SESSION['Report_PF_Form6A'] OR $_SESSION['Report_PF_Form12A']){?>
	 <li><a href="#" class="fly">PF </a>
	   <ul>
		 <?php if($_SESSION['Report']==1 OR $_SESSION['Report_PF_Form3A']==1){?><li><a href="#">Form 3A</a></li><?php } ?>
		 <?php if($_SESSION['Report']==1 OR $_SESSION['Report_PF_Form6A']==1){?><li><a href="#">Form 6A</a></li><?php } ?>
		 <?php if($_SESSION['Report']==1 OR $_SESSION['Report_PF_Form12A']==1){?><li><a href="#">Form 12A</a></li><?php } ?>
	   </ul>
	 </li>
	 <?php } */ ?>
	 <?php /* if($_SESSION['Report']==1 OR $_SESSION['Report_Mand_Dept']==1 OR $_SESSION['Report_Mand_HQ']==1 OR $_SESSION['Report_Mand_Grade']==1 OR $_SESSION['Report_Mand_Desig']==1 OR $_SESSION['Report_Mand_CityClass']==1 OR $_SESSION['Report_Mand_CostCenter']==1){ ?>
	<li><a href="#" class="fly">Mandatory </a>
	 <ul>
	   <?php if($_SESSION['Report']==1 OR $_SESSION['Report_Mand_Dept']==1){?><li><a href="#">Department</a></li><?php } ?>
	   <?php if($_SESSION['Report']==1 OR $_SESSION['Report_Mand_HQ']==1){?><li><a href="#">Head Quarter</a></li><?php } ?>
	   <?php if($_SESSION['Report']==1 OR $_SESSION['Report_Mand_Grade']==1){?><li><a href="#">Grade</a></li><?php } ?>
	   <?php if($_SESSION['Report']==1 OR $_SESSION['Report_Mand_Desig']==1){?><li><a href="#">Designation</a></li><?php } ?>
	   <?php if($_SESSION['Report']==1 OR $_SESSION['Report_Mand_CityClass']==1){?><li><a href="#">City Classification</a></li><?php } ?>
	   <?php if($_SESSION['Report']==1 OR $_SESSION['Report_Mand_CostCenter']==1){?><li><a href="#">Cost Center</a></li><?php } ?>
	 </ul>
	</li>
	<?php } */ ?>
	<?php /* if($_SESSION['Report']==1 OR $_SESSION['Report_Mice_Category']==1 OR $_SESSION['Report_Mice_Section']==1) { ?>
	<li><a href="#" class="fly">Micellaneous </a>
	 <ul>
	  <?php if($_SESSION['Report']==1 OR $_SESSION['Report_Mice_Category']==1){?><li><a href="Category.php">Category</a></li><?php } ?>
	  <?php if($_SESSION['Report']==1 OR $_SESSION['Report_Mice_Section']==1){?><li><a href="Section.php">Section</a></li><?php } ?>
	 </ul>
	</li>
	<li>&nbsp;<font color="#ff6">---------------------</font></li>
	<?php } */ ?>
	<?php /*if($_SESSION['Report']==1 OR $_SESSION['Report_Bonus']==1){?><li><a href="#">Bonus</a></li><?php }*/ ?>
	<?php /*if($_SESSION['Report']==1 OR $_SESSION['Report_Arrears']==1){?><li><a href="#">Arrears</a></li><?php } */ ?>
	<?php /*if($_SESSION['Report']==1 OR $_SESSION['Report_StatutoryPayment']==1){?><li><a href="#">Statutory Payment</a></li><?php }*/ ?>
	<?php /*if($_SESSION['Report']==1 OR $_SESSION['Report_FullFinal']==1){?><li><a href="#">Full & final</a></li><?php }*/ ?>
   </ul>
  </li>	 
<?php /************************************************************************ Reports Close ***********************************************************/ ?>
<?php } if($UserId!=12 AND $UserId!=13) { ?> 
<?php /************************************************************************ Recruitment Open *********************************************************** ?>
  <li class="top"><a href="#" id="privacy" class="top_link"><span class="down">Recruitment</span></a>
   <ul class="sub">
     <?php if($_SESSION['Recruitment']==1 OR $_SESSION['Recruit_aa']==1){?><li><a href="#">Raa</a></li><?php } ?>
	 <?php if($_SESSION['Recruitment']==1 OR $_SESSION['Recruit_bb']==1){?><li><a href="#">Rbb</a></li><?php } ?>
	 <?php if($_SESSION['Recruitment']==1 OR $_SESSION['Recruit_cc']==1){?><li><a href="#">Rcc</a></li><?php } ?>
	 <?php if($_SESSION['Recruitment']==1 OR $_SESSION['Recruit_dd']==1){?><li><a href="#">Rdd</a></li><?php } ?>
	 <?php if($_SESSION['Recruitment']==1 OR $_SESSION['Recruit_ee']==1){?><li><a href="#">Ree</a></li><?php } ?>
   </ul>
  </li>	 
<?php /************************************************************************ Recruitment Close ***********************************************************/ ?>

<?php } if($UserId!=12 AND $UserId!=13) { ?> 
<?php /************************************************************************ TDS Open *********************************************************** ?>
  <li class="top"><a href="#" id="privacy" class="top_link"><span class="down">TDS</span></a>
   <ul class="sub">  
    <?php if($_SESSION['TDS']==1 OR $_SESSION['TDS_aa']==1){?> <li><a href="#">Taa</a></li><?php } ?>
	<?php if($_SESSION['TDS']==1 OR $_SESSION['TDS_bb']==1){?><li><a href="#">Tbb</a></li><?php } ?>
	<?php if($_SESSION['TDS']==1 OR $_SESSION['TDS_cc']==1){?><li><a href="#">Tcc</a></li><?php } ?>
	<?php if($_SESSION['TDS']==1 OR $_SESSION['TDS_dd']==1){?><li><a href="#">Tdd</a></li><?php } ?>
	<?php if($_SESSION['TDS']==1 OR $_SESSION['TDS_ee']==1){?><li><a href="#">Tee</a></li><?php } ?>
   </ul>
  </li>	 
<?php /************************************************************************ TDS Close ***********************************************************/ ?>
<?php } ?>

</ul>
<?php } ?>


						   