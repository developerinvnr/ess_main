<span class="preload1"></span>
<span class="preload2"></span>

<ul id="nav">
    <?php if($_SESSION['EmpType']=="E" AND $_SESSION['EmpStatus']=="A"){ ?>
	<li class="top"><a href="Index.php?log=<?php echo $_SESSION['logCheckEmp']; ?>" class="top_link"><span>Home</span></a></li>
	<li class="top"><a href="Profile.php" class="top_link">Profile</a></li>
	<li class="top"><a href="#nogo22" class="top_link"><span class="down">Attendance&nbsp;/&nbsp;Leave</span></a>
		<ul class="sub">
			<li><a href="#">My Attendance</a></li>
			<li>&nbsp;<font color="#ff6">---------------------</font></li>
			<li><a href="ApplyLeave.php">Apply Leave</a></li>
			<li>&nbsp;<font color="#ff6">---------------------</font></li>
			<li><a href="PaidHoliday.php">Paid Holiday</a></li>
		</ul>
	</li>
	<li class="top"><a href="#nogo27" id="contacts" class="top_link"><span class="down">Report Details</span></a>
		<ul class="sub">
			<li><a href="#">Payslip</a></li>
			<li>&nbsp;<font color="#ff6">---------------------</font></li>
			<li><a href="#">CTC</a></li>
			<li>&nbsp;<font color="#ff6">---------------------</font></li>
			<li><a href="#">Eligibility</a></li>
		</ul>
	</li>
	<li class="top"><a href="#" class="top_link"><span class="down">Services</span></a>
		<ul class="sub">
			<li><a href="ChangePwd.php">Change Password</a></li>
			<li>&nbsp;<font color="#ff6">---------------------</font></li>
			<li><a href="#">Reimbursement</a></li>
			<li>&nbsp;<font color="#ff6">---------------------</font></li>
			<li><a href="#" class="fly">Query </a>
					<ul>
						<li><a href="AskQuery.php">Ask</a></li>
						<li>&nbsp;<font color="#ff6">---------------------</font></li>
						<li><a href="AskQueryStatus.php">Status</a></li>
						<?php if($row['DesigId']==4 OR $row['DesigId2']==4) {?>
						<li>&nbsp;<font color="#ff6">---------------------</font></li>
						<li><a href="ReplyToQuery.php">Reply To Query</a></li>
						<?php } ?>
					</ul>
			</li>
		</ul>
	</li>
	<li class="top"><a href="Pms.php" class="top_link"><span class="">PMS</span></a></li>
	<li class="top"><a href="tds.php" id="shop" class="top_link"><span class="down">Separation</span></a>
		<ul class="sub">
		    <li><a href="#">Resignation Form </a></li>
		    <li>&nbsp;<font color="#ff6">---------------------</font></li>
		    <li><a href="#" class="fly">My Request</a>
					<ul>
						<li><a href="#"><font color="#D3EBF5">Resignation Status  </font></a></li>
				   </ul>
			</li>
			<li>&nbsp;<font color="#ff6">---------------------</font></li>
		      <li><a href="#" class="fly">Awaiting Action</a>
					<ul>
						<li><a href="#"><font color="#D3EBF5">Pending Resignation </font></a></li>
						<li><a href="#"><font color="#D3EBF5">Pending Clearance   </font></a></li>
				   </ul>
			</li>
		</ul>
	</li>
    <?php } ?>
</ul>