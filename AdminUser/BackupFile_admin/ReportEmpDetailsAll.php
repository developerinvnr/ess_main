<?php session_start();
if ($_SESSION['login'] = true) {
    require_once 'config/config.php';
} else {
    $msg = 'Session Expiry...............';
}
include '../function.php';
if (check_user() == false) {
    header('Location:../index.php');
}
require_once 'logcheck.php';
if ($_SESSION['logCheckUser'] != $logadmin) {
    header('Location:../index.php');
}
if ($_SESSION['login'] = true) {
    require_once 'AdminMenuSession.php';
} else {
    $msg = 'Session Expiry...............';
}
//****************************************************************************************************************
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php include_once '../Title.php'; ?></title>

    <link type="text/css" href="css/body.css" rel="stylesheet" />
    <link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet" />
    <style>
        .font4 {
            color: #1FAD34;
            font-family: Georgia;
            font-size: 15px;
        }

        .All {
            font-size: 11px;
            height: 20px;
        }

        .All_80 {
            font-size: 11px;
            height: 20px;
            width: 80px;
        }

        .All_40 {
            font-size: 11px;
            height: 20px;
            width: 40px;
        }

        .All_50 {
            font-size: 11px;
            height: 20px;
            width: 50px;
        }

        .All_70 {
            font-size: 11px;
            height: 20px;
            width: 70px;
        }

        .All_80 {
            font-size: 11px;
            height: 20px;
            width: 80px;
        }

        .All_100 {
            font-size: 11px;
            height: 20px;
            width: 100px;
        }

        .All_120 {
            font-size: 11px;
            height: 20px;
            width: 120px;
        }

        .All_140 {
            font-size: 11px;
            height: 20px;
            width: 140px;
        }

        .All_60 {
            font-size: 11px;
            height: 20px;
            width: 60px;
        }

        .All_150 {
            font-size: 11px;
            height: 20px;
            width: 150px;
        }

        .All_170 {
            font-size: 11px;
            height: 20px;
            width: 170px;
        }

        .All_180 {
            font-size: 11px;
            height: 20px;
            width: 180px;
        }

        .All_190 {
            font-size: 11px;
            height: 20px;
            width: 190px;
        }

        .All_200 {
            font-size: 11px;
            height: 20px;
            width: 200px;
        }

        .All_450 {
            font-size: 11px;
            height: 20px;
            width: 450px;
        }

        .All_360 {
            font-size: 11px;
            height: 20px;
            width: 350px;
        }

        .All_540 {
            font-size: 11px;
            height: 20px;
            width: 540px;
        }

        .All_400 {
            font-size: 11px;
            height: 20px;
            width: 400px;
        }

        .All_600 {
            font-size: 11px;
            height: 20px;
            width: 600px;
        }

    </style>
    <script type="text/javascript" src="js/stuHover.js"></script>
    <script type="text/javascript" src="js/Prototype.js"></script>
    <link rel="stylesheet" type="text/css" href="src/css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="src/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="src/css/steel/steel.css" />
    <script type="text/javascript" src="src/js/jscal2.js"></script>
    <script type="text/javascript" src="src/js/lang/en.js"></script>
    <style>
        .CalenderButton {
            background-image: url(images/CalenderBtn.jpeg);
            width: 16px;
            height: 16px;
            background-color: #E0DBE3;
            border-color: #FFFFFF;
        }

    </style>
    <script type="text/javascript">
        window.history.forward(1);
    </script>
    <script type="text/javascript" language="javascript">
        function SelectDept(v) {
            var ComId = document.getElementById("ComId").value;
            var s = document.getElementById("Sts").value;
            window.location =
                'ReportEmpDetailsAll.php?action=DeptAll&act=resutreports&vcheck=true&yy=23%23%e&truekey=false&ComId=' +
                ComId + '&value=' + v + '&s=' + s + '&rightn=ee&rr=34&frf=34&yey=5';
        }

        function SelectSts(s) {
            var ComId = document.getElementById("ComId").value;
            var v = document.getElementById("Dept").value;
            window.location =
                'ReportEmpDetailsAll.php?action=DeptAll&act=resutreports&vcheck=true&yy=23%23%e&truekey=false&ComId=' +
                ComId + '&value=' + v + '&s=' + s + '&rightn=ee&rr=34&frf=34&yey=5';
        }

        function PrintDept(v, s) {
            var ComId = document.getElementById("ComId").value;
            var YId = document.getElementById("YId").value;
            var DeptValue = document.getElementById("DeptValue").value;
            window.open("PrintEmpDetailsAllReport.php?action=DeptAll&value=" + v + "&c=" + ComId + "&y=" + YId + "&value=" +
                DeptValue + "&s=" + s, "PrintForm",
                "menubar=yes,scrollbars=yes,resizable=no,directories=no,width=1250,height=650");
        }

        function CheckTR(v) {
            if (document.getElementById("CHTR_" + v).checked == true) {
                document.getElementById("TR_" + v).style.backgroundColor = "#0076EC";
            }
            if (document.getElementById("CHTR_" + v).checked == false) {
                document.getElementById("TR_" + v).style.backgroundColor = "#ffffff";
            }
        }

        function ExportReportAll(v, s) {
            var ComId = document.getElementById("ComId").value;
            var YId = document.getElementById("YId").value;
            window.open("ExportReportAllCSV.php?action=ExportReportAll&C=" + ComId + "&Y=" + YId + "&value=" + v + "&s=" +
                s, "PrintForm", "menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");
        }

        function ExportLabourWelfare(v, s) {
            var ComId = document.getElementById("ComId").value;
            var YId = document.getElementById("YId").value;
            window.open("ExportLabourWelfareCSV.php?action=ExportLabourWelfare&C=" + ComId + "&Y=" + YId + "&value=" + v +
                "&s=" +
                s, "PrintForm", "menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");
        }
    </script>
</head>

<body class="body">
    <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
    <input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
    <input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
    <input type="hidden" name="DeptValue" id="DeptValue" value="<?php echo $_REQUEST['value']; ?>" />
    <table class="table" border="0">
        <tr>
            <td>
                <table class="menutable">
                    <tr>
                        <td><?php if ($_SESSION['login'] = true) {
                            require_once 'AMenu.php';
                        } ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table width="100%" style="margin-top:0px;" border="0">
                    <tr>
                        <td valign="top"><?php if ($_SESSION['login'] = true) {
    require_once 'AWelcome.php';
} ?></td>
                    </tr>
                    <tr>
                        <td valign="top" align="center" width="100%" id="MainWindow">
                            <?php //********************************************************************
                            ?>
                            <?php //*************START*****START*****START******START******START*********************************
                            ?>
                            <?php //***************************************************************************************************
                            ?>
                            <table border="0" style="margin-top:0px; width:95%; height:400px;">
                                <tr>
                                    <?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
                                    <td align="" width="100%" valign="top">
                                        <table border="0">
                                            <tr>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <?php  if($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') { ?>
                                                            <td>
                                                                <table border="0">
                                                                    <tr>
                                                                        <td class="td1"
                                                                            style="width:600px; height:20px; font-size:15px; font-family:Times New Roman; color:#00274F; font-weight:bold;"
                                                                            align="">Department :&nbsp;&nbsp;<select
                                                                                style="font-size:11px; width:148px; height:18px; background-color:#DDFFBB;"
                                                                                name="Dept" id="Dept"
                                                                                onChange="SelectDept(this.value)">
                                                                                <?php if($_REQUEST['value']=='' OR $_REQUEST['value']==0){?><option value="0"
                                                                                    selected>Select Department</option>
                                                                                <?php }else{ $sqlD=mysql_query("select DepartmentCode from hrm_department where CompanyId=".$CompanyId." AND DepartmentId=".$_REQUEST['value'], $con); $resD=mysql_fetch_array($sqlD); ?><option
                                                                                    value="<?php echo $_REQUEST['value']; ?>"
                                                                                    selected><?php echo $resD['DepartmentCode']; ?>
                                                                                </option>
                                                                                <?php } ?><?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
                                                                                <option value="<?php echo $ResDept['DepartmentId']; ?>">
                                                                                    <?php echo '&nbsp;' . $ResDept['DepartmentCode']; ?></option>
                                                                                <?php } ?><option value="All">
                                                                                    All</option></select>
                                                                            &nbsp;&nbsp;
                                                                            <?php if ($_REQUEST['s'] == 'A') {
                                                                                $Sts = 'Active';
                                                                            } elseif ($_REQUEST['s'] == 'D') {
                                                                                $Sts = 'Deactive';
                                                                            } elseif ($_REQUEST['s'] == 'AD') {
                                                                                $Sts = 'All';
                                                                            } ?>
                                                                            Status:&nbsp;&nbsp;<select
                                                                                style="font-size:11px; width:100px; height:18px; background-color:#DDFFBB;"
                                                                                name="Sts" id="Sts"
                                                                                onChange="SelectSts(this.value)">
                                                                                <option value="<?php echo $_REQUEST['s']; ?>"
                                                                                    selected><?php echo $Sts; ?>
                                                                                </option>
                                                                                <?php if($_REQUEST['s']!='A'){?><option value="A">
                                                                                    Actives</option><?php } ?>
                                                                                <?php if($_REQUEST['s']!='D'){?><option value="D">
                                                                                    Deactives</option>
                                                                                <?php } ?>
                                                                                <?php if($_REQUEST['s']!='AD'){?><option value="AD">
                                                                                    &nbsp;All</option>
                                                                                <?php } ?>
                                                                            </select>
                                                                            &nbsp;&nbsp;(Reports All Details)
                                                                        </td>

                                                                        <td class="tdl"
                                                                            style="background-color:#FFFF6C;text-align:center;width:200px;font-size:12px;">
                                                                            Submission of Resignation</td>



                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <?php } ?>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <?php //--------------------------Display Record---------------------------------------------
                                            ?>



                                            <?php if($_REQUEST['action']=='DeptAll') { ?>
                                            <tr>
                                                <td>
                                                    <table border="1" width="10200">
                                                        <tr>
                                                            <?php if ($_REQUEST['value'] != 'All') {
                                                                $sqlA = mysql_query('select DepartmentName from hrm_department where DepartmentId=' . $_REQUEST['value'], $con);
                                                                $resA = mysql_fetch_assoc($sqlA);
                                                            } ?>
                                                            <td colspan="172" valign="top"
                                                                style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">
                                                                &nbsp;Employee All Details :
                                                                &nbsp;&nbsp;(&nbsp;Department -
                                                                <?php if ($_REQUEST['value'] != 'All') {
                                                                    echo $resA['DepartmentName'];
                                                                } else {
                                                                    echo 'All';
                                                                } ?>&nbsp;)&nbsp;&nbsp;&nbsp;


                                                                &nbsp;&nbsp;<a href="#"
                                                                    onClick="ExportReportAll('<?php echo $_REQUEST['value']; ?>','<?php echo $_REQUEST['s']; ?>')"
                                                                    style="color:#F9F900; font-size:12px;">Export
                                                                    Excel</a>&nbsp;&nbsp; &emsp; &emsp; &emsp; <a
                                                                    href="#"
                                                                    onClick="ExportLabourWelfare('<?php echo $_REQUEST['value']; ?>','<?php echo $_REQUEST['s']; ?>')"
                                                                    style="color:#F9F900; font-size:12px;">Export Labour
                                                                    Welfare</a>
                                                                <a href="#" onClick="PrintDept('<?php echo $_REQUEST['value']; ?>')"
                                                                    style="color:#F9F900; font-size:12px;"></a>
                                                                <a href="<?php echo $strFileName; ?>"
                                                                    style="color:#F9F900; font-size:12px;"><?php /*Dump Excel*/ ?></a>
                                                            </td>



                                                        </tr>
                                                        <tr bgcolor="#7a6189">
                                                            <td colspan="25" align="center"
                                                                style="color:#FFFFFF;font-size:11px;"
                                                                class="All_100"><b>General</b></td>
                                                            <td colspan="3" align="center"
                                                                style="color:#FFFFFF;font-size:11px;"
                                                                class="All_200"><b>Qualification</b></td>
                                                            <td colspan="10" align="center"
                                                                style="color:#FFFFFF;font-size:11px;"><b>Bank</b></td>
                                                            <td colspan="3" align="center"
                                                                style="color:#FFFFFF;font-size:11px;"><b></b></td>
                                                            <td colspan="4" align="center"
                                                                style="color:#FFFFFF;font-size:11px;"><b>Reporting</b>
                                                            </td>
                                                            <td colspan="22" align="center"
                                                                style="color:#FFFFFF;font-size:11px;"><b>Personal</b>
                                                            </td>
                                                            <td colspan="4" align="center"
                                                                style="color:#FFFFFF;font-size:11px;"><b>Current</b>
                                                            </td>
                                                            <td colspan="4" align="center"
                                                                style="color:#FFFFFF;font-size:11px;"><b>Parmanent</b>
                                                            </td>
                                                            <td colspan="4" align="center"
                                                                style="color:#FFFFFF;font-size:11px;"><b>Emergency</b>
                                                            </td>
                                                            <td colspan="4" align="center"
                                                                style="color:#FFFFFF;font-size:11px;">
                                                                <b>Referance(Personal)</b></td>
                                                            <td colspan="5" align="center"
                                                                style="color:#FFFFFF;font-size:11px;">
                                                                <b>Referance(Professional)</b></td>
                                                            <td colspan="37" align="center"
                                                                style="color:#FFFFFF;font-size:11px;"><b>Family</b></td>
                                                            <td colspan="23" align="center"
                                                                style="color:#FFFFFF;font-size:11px;"><b>Cost To
                                                                    Company</b></td>
                                                            <td colspan="15" align="center"
                                                                style="color:#FFFFFF;font-size:11px;"><b>Eligibility</b>
                                                            </td>
                                                            <td align="center" style="color:#FFFFFF;font-size:11px;">
                                                                <b>Rating</b></td>
                                                        </tr>
                                                        <tr bgcolor="#7a6189">
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_50">&nbsp;</td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_50"><b>SNo.</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_70"><b>EC</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_200"><b>Name</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Department</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Desig Code</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_200"><b>Designation</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_40"><b>Grade</b></td>

                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Bonus Category</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_100"><b>Vertical</b></td>

                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_60"><b>FileNo</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_70"><b>DOJ</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_70"><b>DOC</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_70"><b>DOB</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_70"><b>Age</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_50"><b>Status</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_70"><b>Resignation</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_70"><b>Sepration</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_100"><b>CostCenter</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_100"><b>HQ</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Mobile</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Email-ID</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>VNR Exp</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Pre Exp</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Total Exp</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_200"><b>Main</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_100"><b>Top</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_100"><b>Others</b></td>

                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Name</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>A/C No</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>IFSC</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Branch</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Address</b></td>

                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Name</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>A/C No</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>IFSC</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Branch</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Address</b></td>

                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_120"><b>Insu. No</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_120"><b>PF No</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_120"><b>PF UAN</b></td>

                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_120"><b>ESIC No</b></td>

                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Name </b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_120"><b>Designation</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>EmailID</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_100"><b>Contact</b></td>

                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_50"><b>Gender</b></td>

                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Aadhar No</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_50"><b>Cast</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Religion</b></td>

                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_50"><b>Blood Group</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_50"><b>Sr Citizen</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_50"><b>Metro City</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Mobile</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Email_ID</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_100"><b>PanCard</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Passport</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_70"><b>ValidTo</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_70"><b>ValidFrom</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Driving Lic</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_70"><b>ValidTo</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_70"><b>ValidFrom</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_50"><b>Marital Status</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_70"><b>Married Date</b></td>

                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_50"><b>Covid<br>Dose-1</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_50"><b>Certificate</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_50"><b>Covid<br>Dose-2</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_50"><b>Certificate</b></td>

                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Address</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>State</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>City</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_50"><b>PinNo</b></td>

                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Address</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>State</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>City</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_50"><b>PinNo</b></td>

                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_120"><b>Name</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_70"><b>Contact</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Relation</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>EmailId</b></td>

                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_120"><b>Name</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_70"><b>Contact</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Relation</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>EmailId</b></td>

                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_120"><b>Name</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_70"><b>Contact</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>EmailId</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Company</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_100"><b>Desig</b></td>

                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_250"><b>Father Name</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Qualification</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_70"><b>DOB</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Occupation</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_250"><b>Mother Name</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Qualification</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_70"><b>DOB</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Occupation</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_250"><b>Spouse Name</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Qualification</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_70"><b>DOB</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Occupation</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_200" bgcolor="#808000"><b>Name_1</b>
                                                            </td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Relation</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>DOB</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Qualification</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_100"><b>Occupation</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_200" bgcolor="#808000"><b>Name_2</b>
                                                            </td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Relation</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>DOB</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Qualification</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_100"><b>Occupation</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_200" bgcolor="#808000"><b>Name_3</b>
                                                            </td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Relation</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>DOB</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Qualification</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_100"><b>Occupation</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_200" bgcolor="#808000"><b>Name_4</b>
                                                            </td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Relation</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>DOB</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Qualification</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_100"><b>Occupation</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_200" bgcolor="#808000"><b>Name_5</b>
                                                            </td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Relation</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>DOB</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_150"><b>Qualification</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_100"><b>Occupation</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Basic</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Stipend</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Incentive</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>HRA</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Conveyance</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Bonus</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Special</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Gross Monthly</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Gross Monthly (PAC)</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>PF</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>ESIC</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Net Monthaly</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Medical Reim.</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>LTA</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>CEA</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Annual Gross</b></td>
                                                            <?php /*<td align="center" style="color:#FFFFFF;" class="All_80"><b>Bonus</b></td>*/ ?>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Gratuity</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>PF Contri</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>ESIC Contri</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>MPP</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>CTC</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>MIC</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Car Entit</b></td>

                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>CategoryA</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>CategoryB</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>CategoryC</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>DA OutsideHQ</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>DA @ HQ</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_50"><b>Travel (TW)</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_50"><b>Travel (FW)</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Travel Mode</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Travel Class</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Mobile Exp. Reim</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Mobile Hand. Elig</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Misc Expenses</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Health Insu</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Bonus</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_80"><b>Gratuity</b></td>
                                                            <td align="center" style="color:#FFFFFF;"
                                                                class="All_50"></td>

                                                        </tr>

                                                        <?php /*
if($_REQUEST['value']=='All')
{ 
 if($_REQUEST['s']=='AD')
 {
  $sql=mysql_query("select e.*,p.*,g.*,c.*,f.*,ct.*,el.* from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_contact c ON g.EmployeeID=c.EmployeeID INNER JOIN hrm_employee_family f ON g.EmployeeID=f.EmployeeID INNER JOIN hrm_employee_ctc ct ON g.EmployeeID=ct.EmployeeID INNER JOIN hrm_employee_eligibility el ON g.EmployeeID=el.EmployeeID where e.CompanyId=".$CompanyId." AND (e.EmpStatus='A' OR e.EmpStatus='D') AND ct.Status='A' AND el.Status='A' group by e.EmpCode order by e.EmpCode ASC", $con);
 }
 else
 {
  $sql=mysql_query("select e.*,p.*,g.*,c.*,f.*,ct.*,el.* from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_contact c ON g.EmployeeID=c.EmployeeID INNER JOIN hrm_employee_family f ON g.EmployeeID=f.EmployeeID INNER JOIN hrm_employee_ctc ct ON g.EmployeeID=ct.EmployeeID INNER JOIN hrm_employee_eligibility el ON g.EmployeeID=el.EmployeeID where e.CompanyId=".$CompanyId." AND e.EmpStatus='".$_REQUEST['s']."' AND ct.Status='A' AND el.Status='A' group by e.EmpCode order by e.EmpCode ASC", $con);
 } 
}
else 
{ 
*/
 if($_REQUEST['s']=='AD')
 {
  $sql=mysql_query("select e.*,p.*,g.*,c.*,f.*,ct.*,el.* from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_contact c ON g.EmployeeID=c.EmployeeID INNER JOIN hrm_employee_family f ON g.EmployeeID=f.EmployeeID INNER JOIN hrm_employee_ctc ct ON g.EmployeeID=ct.EmployeeID INNER JOIN hrm_employee_eligibility el ON g.EmployeeID=el.EmployeeID where g.DepartmentId=".$_REQUEST['value']." AND e.CompanyId=".$CompanyId." AND (e.EmpStatus='A' OR e.EmpStatus='D') AND ct.Status='A' AND el.Status='A' group by e.EmpCode order by e.EmpCode ASC", $con);
 }
 else
 {
  $sql=mysql_query("select e.*,p.*,g.*,c.*,f.*,ct.*,el.* from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_contact c ON g.EmployeeID=c.EmployeeID INNER JOIN hrm_employee_family f ON g.EmployeeID=f.EmployeeID INNER JOIN hrm_employee_ctc ct ON g.EmployeeID=ct.EmployeeID INNER JOIN hrm_employee_eligibility el ON g.EmployeeID=el.EmployeeID where g.DepartmentId=".$_REQUEST['value']." AND e.CompanyId=".$CompanyId." AND e.EmpStatus='".$_REQUEST['s']."' AND ct.Status='A' AND el.Status='A' group by e.EmpCode order by e.EmpCode ASC", $con);
 }
 
  
//} 

$Sno=1; while($res=mysql_fetch_array($sql)){ 
    
    $Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); 
$sqlDesig=mysql_query("select DesigCode,DesigName from hrm_designation where DesigId=".$res['DesigId'], $con); 
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); 
$sqlCC=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); 
$sqlHQ=mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'], $con); 
$resDept=mysql_fetch_assoc($sqlDept); $resDesig=mysql_fetch_assoc($sqlDesig); $resGrade=mysql_fetch_assoc($sqlGrade);
$resCC=mysql_fetch_assoc($sqlCC); $resHQ=mysql_fetch_assoc($sqlHQ);


$sqlch=mysql_query("select * from hrm_employee_separation where EmployeeID=".$res['EmployeeID']." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con); $rowch=mysql_num_rows($sqlch);


?>
                                                        <tr id="TR_<?php echo $Sno; ?>"
                                                            style="background-color:<?php if ($rowch > 0) {
                                                                echo '#FFFF6C';
                                                            } else {
                                                                echo '#FFFFFF';
                                                            } ?>;">
                                                            <td bgcolor="#0076EC"><input type="checkbox"
                                                                    id="CHTR_<?php echo $Sno; ?>"
                                                                    onClick="CheckTR(<?php echo $Sno; ?>)" /></td>
                                                            <td align="center" style="" class="All_50"
                                                                valign="top"><?php echo $Sno; ?></td>
                                                            <td align="center" class="All_70" valign="top">
                                                                <?php echo $res['EmpCode']; ?></td>
                                                            <td align="" class="All_200" valign="top">
                                                                <?php echo $Ename; ?></td>
                                                            <td align="" class="All_80" valign="top">
                                                                <?php echo $resDept['DepartmentCode']; ?></td>
                                                            <td align="" class="All_150" valign="top">
                                                                <?php echo $resDesig['DesigCode']; ?></td>
                                                            <td align="" style="" class="All_200" valign="top">
                                                                <?php echo $resDesig['DesigName']; ?></td>
                                                            <td align="center" class="All_40" valign="top">
                                                                <?php echo $resGrade['GradeValue']; ?></td>

                                                            <?php if ($res['BWageId'] == 0) {
                                                                $sB = mysql_query('select BWageId from hrm_employee_general where EmployeeID=' . $res['EmployeeID'], $con);
                                                                $rB = mysql_fetch_assoc($sB);
                                                                $sqlCat = mysql_query('select Category from hrm_bonus_wages where BWageId=' . $rB['BWageId'], $con);
                                                            } else {
                                                                $sqlCat = mysql_query('select Category from hrm_bonus_wages where BWageId=' . $res['BWageId'], $con);
                                                            }
                                                            $resCat = mysql_fetch_assoc($sqlCat); ?>
                                                            <td align="" style="background-color:#E8D2FB;"
                                                                class="All_200" valign="top">
                                                                <?php echo strtoupper($resCat['Category']); ?></td>

                                                            <?php $sqlVer = mysql_query('select VerticalName from hrm_department_vertical where VerticalId=' . $res['EmpVertical'], $con);
                                                            $resVer = mysql_fetch_assoc($sqlVer); ?>
                                                            <td align="" style="background-color:#E8D2FB;"
                                                                class="All_150" valign="top">
                                                                <?php echo strtoupper($resVer['VerticalName']); ?></td>

                                                            <td align="center" style="" class="All_60"
                                                                valign="top"><?php echo $res['FileNo']; ?></td>
                                                            <td align="center" class="All_70" valign="top">
                                                                <?php if ($res['RetiStatus'] == 'Y') {
                                                                    echo date('d-M-y', strtotime($res['RetiDate']));
                                                                } else {
                                                                    echo date('d-M-y', strtotime($res['DateJoining']));
                                                                } ?></td>
                                                            <td align="center" class="All_70" valign="top">

                                                                <?php if ($res['DateConfirmation'] != '1970-01-01' and $res['DateConfirmation'] != '0000-00-00' and $res['RetiStatus'] == 'N') {
                                                                    echo date('d-M-y', strtotime($res['DateConfirmation']));
                                                                } else {
                                                                    echo '&nbsp;';
                                                                } ?></td>
                                                            <td align="center" class="All_70" valign="top">
                                                                <?php echo date('d-M-y', strtotime($res['DOB'])); ?></td>
                                                            <?php //$timestamp_start = strtotime($res['DOB']);  $timestamp_end = strtotime(date("Y-m-d"));
                                                            //$difference = abs($timestamp_end - $timestamp_start);
                                                            //$days = floor($difference/(60*60*24)); $months = floor($difference/(60*60*24*30));
                                                            //$years2 = $difference/(60*60*24*365);
                                                            //$Y2=$years2*12; $M22=$months-$Y2;
                                                            //$AgeMain=number_format($years2, 1);
                                                            
                                                            $dos = date('d-m-Y', strtotime($res['DOB']));
                                                            $localtime = getdate();
                                                            $today = $localtime['mday'] . '-' . $localtime['mon'] . '-' . $localtime['year'];
                                                            $dob_a = explode('-', $dos);
                                                            $today_a = explode('-', $today);
                                                            $dob_d = $dob_a[0];
                                                            $dob_m = $dob_a[1];
                                                            $dob_y = $dob_a[2];
                                                            $today_d = $today_a[0];
                                                            $today_m = $today_a[1];
                                                            $today_y = $today_a[2];
                                                            $years = $today_y - $dob_y;
                                                            $months = $today_m - $dob_m;
                                                            if ($today_m . $today_d < $dob_m . $dob_d) {
                                                                $years--;
                                                                $months = 12 + $today_m - $dob_m;
                                                            }
                                                            if ($today_d < $dob_d) {
                                                                $months--;
                                                            }
                                                            $firstMonths = [1, 3, 5, 7, 8, 10, 12];
                                                            $secondMonths = [4, 6, 9, 11];
                                                            $thirdMonths = [2];
                                                            if ($today_m - $dob_m == 1) {
                                                                if (in_array($dob_m, $firstMonths)) {
                                                                    array_push($firstMonths, 0);
                                                                } elseif (in_array($dob_m, $secondMonths)) {
                                                                    array_push($secondMonths, 0);
                                                                } elseif (in_array($dob_m, $thirdMonths)) {
                                                                    array_push($thirdMonths, 0);
                                                                }
                                                            }
                                                            // $AgeMain=$years.'Y - '.$months.'M';
                                                            
                                                            $len2 = strlen($months); //if($len2==1){$months='0'.$months;}else{$months=$months;}
                                                            if ($months < 10) {
                                                                $mnt = '0.0' . $months;
                                                            } elseif ($months >= 10 && $months < 12) {
                                                                $mnt = '0.' . $months;
                                                            }
                                                            //if($months<12){ $mnt='0.'.$months; }
                                                            elseif ($months >= 12 and $months < 24) {
                                                                $m1 = $months - 12;
                                                                $l = strlen($m1);
                                                                if ($l == 1) {
                                                                    $mnt = '1.0' . $m1;
                                                                } else {
                                                                    $mnt = '1.' . $m1;
                                                                }
                                                            } elseif ($months >= 24 and $months < 36) {
                                                                $m1 = $months - 24;
                                                                $l = strlen($m1);
                                                                if ($l == 1) {
                                                                    $mnt = '2.0' . $m1;
                                                                } else {
                                                                    $mnt = '2.' . $m1;
                                                                }
                                                            } elseif ($months >= 36 and $months < 48) {
                                                                $m1 = $months - 36;
                                                                $l = strlen($m1);
                                                                if ($l == 1) {
                                                                    $mnt = '3.0' . $m1;
                                                                } else {
                                                                    $mnt = '3.' . $m1;
                                                                }
                                                            } elseif ($months >= 48 and $months < 60) {
                                                                $m1 = $months - 48;
                                                                $l = strlen($m1);
                                                                if ($l == 1) {
                                                                    $mnt = '4.0' . $m1;
                                                                } else {
                                                                    $mnt = '4.' . $m1;
                                                                }
                                                            } elseif ($months >= 60 and $months < 72) {
                                                                $m1 = $months - 60;
                                                                $l = strlen($m1);
                                                                if ($l == 1) {
                                                                    $mnt = '5.0' . $m1;
                                                                } else {
                                                                    $mnt = '5.' . $m1;
                                                                }
                                                            } elseif ($months >= 72 and $months < 84) {
                                                                $m1 = $months - 72;
                                                                $l = strlen($m1);
                                                                if ($l == 1) {
                                                                    $mnt = '6.0' . $m1;
                                                                } else {
                                                                    $mnt = '6.' . $m1;
                                                                }
                                                            } elseif ($months >= 84 and $months < 96) {
                                                                $m1 = $months - 84;
                                                                $l = strlen($m1);
                                                                if ($l == 1) {
                                                                    $mnt = '7.0' . $m1;
                                                                } else {
                                                                    $mnt = '7.' . $m1;
                                                                }
                                                            } elseif ($months >= 96 and $months < 108) {
                                                                $m1 = $months - 96;
                                                                $l = strlen($m1);
                                                                if ($l == 1) {
                                                                    $mnt = '8.0' . $m1;
                                                                } else {
                                                                    $mnt = '8.' . $m1;
                                                                }
                                                            }
                                                            $str_a = explode('.', $mnt);
                                                            $AgeMain = $years + $str_a[0] . '.' . $str_a[1];
                                                            
                                                            ?>
                                                            <td align="center" class="All_70" valign="top">
                                                                <?php echo $AgeMain; ?></td>
                                                            <td align="center" class="All_50" valign="top">
                                                                <?php echo $res['EmpStatus']; ?></td>
                                                            <td align="" style="" class="All_100" valign="top">
                                                                <?php if ($res['DateOfResignation'] != '0000-00-00' and $res['DateOfResignation'] != '1970-01-01') {
                                                                    echo date('d-M-y', strtotime($res['DateOfResignation']));
                                                                } ?></td>
                                                            <td align="" style="" class="All_100" valign="top">
                                                                <?php if ($res['DateOfSepration'] != '0000-00-00' and $res['DateOfSepration'] != '1970-01-01') {
                                                                    echo date('d-M-y', strtotime($res['DateOfSepration']));
                                                                } ?></td>

                                                            <td align="" style="" class="All_100" valign="top">
                                                                <?php echo $resCC['StateName']; ?></td>
                                                            <td align="" style="" class="All_100" valign="top">
                                                                <?php echo $resHQ['HqName']; ?></td>
                                                            <td align="" class="All_80" valign="top">
                                                                <?php echo $res['MobileNo_Vnr']; ?></td>
                                                            <td align="" class="All_150" valign="top">
                                                                <?php echo $res['EmailId_Vnr']; ?></td>

                                                            <?php //$timestamp_start = strtotime($res['DateJoining']);  $timestamp_end = strtotime(date("Y-m-d"));
                                                            //$difference = abs($timestamp_end - $timestamp_start);
                                                            //$days = floor($difference/(60*60*24)); $months = floor($difference/(60*60*24*30));
                                                            //$years = $difference/(60*60*24*365); /* $Y2=$years*12;  $M2=$months-$Y2; */
                                                            //$VNRExpMain=number_format($years, 1); $TotalExp=$VNRExpMain+$res['PreviousExpYear'];
                                                            
                                                            $dos = date('d-m-Y', strtotime($res['DateJoining']));
                                                            $localtime = getdate();
                                                            $today = $localtime['mday'] . '-' . $localtime['mon'] . '-' . $localtime['year'];
                                                            $dob_a = explode('-', $dos);
                                                            $today_a = explode('-', $today);
                                                            $dob_d = $dob_a[0];
                                                            $dob_m = $dob_a[1];
                                                            $dob_y = $dob_a[2];
                                                            $today_d = $today_a[0];
                                                            $today_m = $today_a[1];
                                                            $today_y = $today_a[2];
                                                            $years = $today_y - $dob_y;
                                                            $months = $today_m - $dob_m;
                                                            if ($today_m . $today_d < $dob_m . $dob_d) {
                                                                $years--;
                                                                $months = 12 + $today_m - $dob_m;
                                                            }
                                                            if ($today_d < $dob_d) {
                                                                $months--;
                                                            }
                                                            $firstMonths = [1, 3, 5, 7, 8, 10, 12];
                                                            $secondMonths = [4, 6, 9, 11];
                                                            $thirdMonths = [2];
                                                            if ($today_m - $dob_m == 1) {
                                                                if (in_array($dob_m, $firstMonths)) {
                                                                    array_push($firstMonths, 0);
                                                                } elseif (in_array($dob_m, $secondMonths)) {
                                                                    array_push($secondMonths, 0);
                                                                } elseif (in_array($dob_m, $thirdMonths)) {
                                                                    array_push($thirdMonths, 0);
                                                                }
                                                            }
                                                            // $VNRExpMain=$years.'Y - '.$months.'M';
                                                            
                                                            $len2 = strlen($months); //if($len2==1){$months='0'.$months;}else{$months=$months;}
                                                            if ($months < 10) {
                                                                $mnt = '0.0' . $months;
                                                            } elseif ($months >= 10 && $months < 12) {
                                                                $mnt = '0.' . $months;
                                                            }
                                                            //if($months<12){ $mnt='0.'.$months; }
                                                            elseif ($months >= 12 and $months < 24) {
                                                                $m1 = $months - 12;
                                                                $l = strlen($m1);
                                                                if ($l == 1) {
                                                                    $mnt = '1.0' . $m1;
                                                                } else {
                                                                    $mnt = '1.' . $m1;
                                                                }
                                                            } elseif ($months >= 24 and $months < 36) {
                                                                $m1 = $months - 24;
                                                                $l = strlen($m1);
                                                                if ($l == 1) {
                                                                    $mnt = '2.0' . $m1;
                                                                } else {
                                                                    $mnt = '2.' . $m1;
                                                                }
                                                            } elseif ($months >= 36 and $months < 48) {
                                                                $m1 = $months - 36;
                                                                $l = strlen($m1);
                                                                if ($l == 1) {
                                                                    $mnt = '3.0' . $m1;
                                                                } else {
                                                                    $mnt = '3.' . $m1;
                                                                }
                                                            } elseif ($months >= 48 and $months < 60) {
                                                                $m1 = $months - 48;
                                                                $l = strlen($m1);
                                                                if ($l == 1) {
                                                                    $mnt = '4.0' . $m1;
                                                                } else {
                                                                    $mnt = '4.' . $m1;
                                                                }
                                                            } elseif ($months >= 60 and $months < 72) {
                                                                $m1 = $months - 60;
                                                                $l = strlen($m1);
                                                                if ($l == 1) {
                                                                    $mnt = '5.0' . $m1;
                                                                } else {
                                                                    $mnt = '5.' . $m1;
                                                                }
                                                            } elseif ($months >= 72 and $months < 84) {
                                                                $m1 = $months - 72;
                                                                $l = strlen($m1);
                                                                if ($l == 1) {
                                                                    $mnt = '6.0' . $m1;
                                                                } else {
                                                                    $mnt = '6.' . $m1;
                                                                }
                                                            } elseif ($months >= 84 and $months < 96) {
                                                                $m1 = $months - 84;
                                                                $l = strlen($m1);
                                                                if ($l == 1) {
                                                                    $mnt = '7.0' . $m1;
                                                                } else {
                                                                    $mnt = '7.' . $m1;
                                                                }
                                                            } elseif ($months >= 96 and $months < 108) {
                                                                $m1 = $months - 96;
                                                                $l = strlen($m1);
                                                                if ($l == 1) {
                                                                    $mnt = '8.0' . $m1;
                                                                } else {
                                                                    $mnt = '8.' . $m1;
                                                                }
                                                            }
                                                            $str_a = explode('.', $mnt);
                                                            $VNRExpMain = $years + $str_a[0] . '.' . $str_a[1];
                                                            
                                                            ?>

                                                            <td align="center" style="" class="All_80"
                                                                valign="top"><?php echo $VNRExpMain; ?></td>
                                                            <td align="center" style="" class="All_80"
                                                                valign="top"><?php echo $res['PreviousExpYear']; ?></td>
                                                            <td align="center" style="" class="All_80"
                                                                valign="top"><?php echo $TotalExp; ?></td>

                                                            <?php $sqlQuali = mysql_query('select Qualification,Specialization,Institute from hrm_employee_qualification where EmployeeID=' . $res['EmployeeID'], $con);
                                                            $sqlQ1 = mysql_query("select Qualification,Specialization,Institute from hrm_employee_qualification where Qualification='10th' AND EmployeeID=" . $res['EmployeeID'], $con);
                                                            $sqlQ2 = mysql_query("select Qualification,Specialization,Institute from hrm_employee_qualification where Qualification='12th' AND EmployeeID=" . $res['EmployeeID'], $con);
                                                            $sqlQ3 = mysql_query("select Qualification,Specialization,Institute from hrm_employee_qualification where Qualification='Graduation' AND EmployeeID=" . $res['EmployeeID'], $con);
                                                            $sqlQ4 = mysql_query("select Qualification,Specialization,Institute from hrm_employee_qualification where Qualification='Post_Graduation' AND EmployeeID=" . $res['EmployeeID'], $con);
                                                            $rowQ1 = mysql_num_rows($sqlQ1);
                                                            $rowQ2 = mysql_num_rows($sqlQ2);
                                                            $rowQ3 = mysql_num_rows($sqlQ3);
                                                            $rowQ4 = mysql_num_rows($sqlQ4);
                                                            if ($rowQ1 > 0) {
                                                                $resQ1 = mysql_fetch_assoc($sqlQ1);
                                                            }
                                                            if ($rowQ2 > 0) {
                                                                $resQ2 = mysql_fetch_assoc($sqlQ2);
                                                            }
                                                            if ($rowQ3 > 0) {
                                                                $resQ3 = mysql_fetch_assoc($sqlQ3);
                                                            }
                                                            if ($rowQ4 > 0) {
                                                                $resQ4 = mysql_fetch_assoc($sqlQ4);
                                                            }
                                                            $sqlQQ = mysql_query("select Qualification,Specialization from hrm_employee_qualification where Qualification!='10th' AND Qualification!='12th' AND Qualification!='Graduation' AND Qualification!='Post_Graduation' AND EmployeeID=" . $res['EmployeeID'], $con);
                                                            $rowQQ = mysql_num_rows($sqlQQ);
                                                            ?>
                                                            <td style="background-color:#FFCEE7;"
                                                                class="All_200" valign="top">
                                                                <?php $no = 1;
                                                                while ($resQuali = mysql_fetch_array($sqlQuali)) {
                                                                    if ($no <= 2 and $resQuali['Institute'] != '') {
                                                                        echo $resQuali['Qualification'] . ', ';
                                                                    }
                                                                    if ($resQuali['Specialization'] != '') {
                                                                        if ($no == 3 or $no == 4) {
                                                                            echo $resQuali['Specialization'] . ', ';
                                                                        }
                                                                    }
                                                                    if ($no >= 5) {
                                                                        echo $resQuali['Qualification'] . '-' . $resQuali['Specialization'] . ', ';
                                                                    }
                                                                    $no++;
                                                                } ?></td>
                                                            <td style="background-color:#FFCEE7;"
                                                                class="All_100" valign="top">
                                                                <?php if ($resQ4['Specialization'] != '' and $resQ4['Institute'] != '') {
                                                                    echo $resQ4['Specialization'];
                                                                } elseif ($resQ3['Specialization'] != '' and $resQ3['Institute'] != '') {
                                                                    echo $resQ3['Specialization'];
                                                                } elseif ($resQ2['Institute'] != '') {
                                                                    echo '12th';
                                                                } elseif ($resQ1['Institute'] != '') {
                                                                    echo '10th';
                                                                } ?></td>
                                                            <td style="background-color:#FFCEE7;"
                                                                class="All_100" valign="top">
                                                                &nbsp;<?php if ($rowQQ > 0) {
                                                                    while ($resQQ = mysql_fetch_assoc($sqlQQ)) {
                                                                        echo $resQQ['Qualification'] . '-' . $resQQ['Specialization'] . ', ';
                                                                    }
                                                                } ?></td>

                                                            <td align="" style="background-color:#95CAFF"
                                                                class="All_150" valign="top">
                                                                <?php echo $res['BankName']; ?></td>
                                                            <td align="" style="background-color:#95CAFF"
                                                                class="All_150" valign="top">
                                                                <?php echo $res['AccountNo']; ?></td>
                                                            <td align="" style="background-color:#95CAFF"
                                                                class="All_150" valign="top">
                                                                <?php echo $res['BamkIfscCode']; ?></td>
                                                            <td align="" style="background-color:#95CAFF"
                                                                class="All_150" valign="top">
                                                                <?php echo $res['BranchName']; ?></td>
                                                            <td align="" style="background-color:#95CAFF"
                                                                class="All_150" valign="top">
                                                                <?php echo $res['BranchAdd']; ?></td>

                                                            <td align="" style="background-color:#95CAFF"
                                                                class="All_150" valign="top">
                                                                <?php echo $res['BankName2']; ?></td>
                                                            <td align="" style="background-color:#95CAFF"
                                                                class="All_150" valign="top">
                                                                <?php echo $res['AccountNo2']; ?></td>
                                                            <td align="" style="background-color:#95CAFF"
                                                                class="All_150" valign="top">
                                                                <?php echo $res['BamkIfscCode2']; ?></td>
                                                            <td align="" style="background-color:#95CAFF"
                                                                class="All_150" valign="top">
                                                                <?php echo $res['BranchName2']; ?></td>
                                                            <td align="" style="background-color:#95CAFF"
                                                                class="All_150" valign="top">
                                                                <?php echo $res['BranchAdd2']; ?></td>

                                                            <td align="" style="background-color:#C9FDB0;"
                                                                class="All_120" valign="top">
                                                                <?php echo $res['InsuCardNo']; ?></td>
                                                            <td align="" style="background-color:#C9FDB0;"
                                                                class="All_120" valign="top">
                                                                <?php echo $res['PfAccountNo']; ?></td>
                                                            <td align="" style="background-color:#C9FDB0;"
                                                                class="All_120" valign="top">
                                                                <?php echo $res['PF_UAN']; ?></td>
                                                            <td align="" style="background-color:#C9FDB0;"
                                                                class="All_120" valign="top">
                                                                <?php echo $res['EsicNo']; ?></td>
                                                            <td align="" style="background-color:#FCFAB1;"
                                                                class="All_150" valign="top">
                                                                <?php echo $res['ReportingName']; ?></td>
                                                            <?php if ($res['RepEmployeeID'] > 0) {
                                                                $sqlRn = mysql_query('select DesigId from hrm_employee_general where EmployeeID=' . $res['RepEmployeeID'], $con);
                                                                $resRn = mysql_fetch_assoc($sqlRn);
                                                                $sqlDesigR = mysql_query('select DesigCode from hrm_designation where DesigId=' . $resRn['DesigId'], $con);
                                                                $resDesigR = mysql_fetch_assoc($sqlDesigR);
                                                            } ?>
                                                            <td align="" style="background-color:#FCFAB1;"
                                                                class="All_120" valign="top">
                                                                <?php echo $resDesigR['DesigCode']; ?></td>
                                                            <td align="" style="background-color:#FCFAB1;"
                                                                class="All_150" valign="top">
                                                                <?php echo $res['ReportingEmailId']; ?></td>
                                                            <td align="" style="background-color:#FCFAB1;"
                                                                class="All_100" valign="top">
                                                                <?php echo $res['ReportingContactNo']; ?></td>
                                                            <td align="center" style="" class="All_50"
                                                                valign="top"><?php if ($res['Gender'] == 'M') {
                                                                    echo 'Male';
                                                                } else {
                                                                    echo 'Female';
                                                                } ?></td>
                                                            <td align="center" style="" class="All_80"
                                                                valign="top"><?php echo $res['AadharNo']; ?></td>
                                                            <td align="center" style="" class="All_50"
                                                                valign="top"><?php echo $res['Categoryy']; ?></td>
                                                            <td align="center" style="" class="All_80"
                                                                valign="top"><?php echo $res['Religion']; ?></td>


                                                            <td align="center" style="" class="All_50"
                                                                valign="top"><?php echo $res['BloodGroup']; ?></td>
                                                            <td align="center" style="" class="All_50"
                                                                valign="top"><?php if ($res['SeniorCitizen'] == 'Y') {
                                                                    echo 'YES';
                                                                } else {
                                                                    echo 'NO';
                                                                } ?></td>
                                                            <td align="center" style="" class="All_50"
                                                                valign="top"><?php if ($res['MetroCity'] == 'Y') {
                                                                    echo 'YES';
                                                                } else {
                                                                    echo 'NO';
                                                                } ?></td>
                                                            <td align="" style="background-color:#95CAFF;"
                                                                class="All_80" valign="top">
                                                                <?php echo $res['MobileNo']; ?></td>
                                                            <td align="" style="background-color:#95CAFF;"
                                                                class="All_150" valign="top">
                                                                <?php echo $res['EmailId_Self']; ?></td>
                                                            <td align="" style="background-color:#C9FDB0;"
                                                                class="All_100" valign="top">
                                                                <?php echo $res['PanNo']; ?></td>
                                                            <td align="" style="background-color:#C9FDB0;"
                                                                class="All_80" valign="top">
                                                                <?php echo $res['PassportNo']; ?></td>
                                                            <td align="center" style="background-color:#C9FDB0;"
                                                                class="All_70" valign="top">
                                                                <?php echo date('d-M-y', strtotime($res['Passport_ExpiryDateFrom'])); ?></td>
                                                            <td align="center" style="background-color:#C9FDB0;"
                                                                class="All_70" valign="top">
                                                                <?php echo date('d-M-y', strtotime($res['Passport_ExpiryDateTo'])); ?></td>
                                                            <td align="" style="background-color:#C9FDB0;"
                                                                class="All_80" valign="top">
                                                                <?php echo $res['DrivingLicNo']; ?></td>
                                                            <td align="center" style="background-color:#C9FDB0;"
                                                                class="All_70" valign="top">
                                                                <?php echo date('d-M-y', strtotime($res['Driv_ExpiryDateFrom'])); ?></td>
                                                            <td align="center" style="background-color:#C9FDB0;"
                                                                class="All_70" valign="top">
                                                                <?php echo date('d-M-y', strtotime($res['Driv_ExpiryDateTo'])); ?></td>
                                                            <td align="center" style="background-color:#FCFAB1;"
                                                                class="All_50" valign="top">
                                                                <?php if ($res['Married'] == 'Y') {
                                                                    echo 'Married';
                                                                } else {
                                                                    echo 'Single';
                                                                } ?></td>
                                                            <td align="center" style="background-color:#FCFAB1;"
                                                                class="All_70" valign="top">
                                                                <?php if ($res['Married'] == 'Y') {
                                                                    echo date('d-M', strtotime($res['MarriageDate']));
                                                                } else {
                                                                    echo '';
                                                                } ?></td>

                                                            <td align="center" class="All_50" valign="top">
                                                                <?php echo $res['Covid_Vaccin']; ?></td>
                                                            <td align="center" class="All_50" valign="top">
                                                                <?php if ($res['Covid_Vaccin_file'] != '') {
                                                                    echo '<a href="../Employee/CovidCert/' . $res['Covid_Vaccin_file'] . '" target="_blank">Uploaded</a>';
                                                                } ?></td>
                                                            <td align="center" class="All_50" valign="top">
                                                                <?php echo $res['Covid_Vaccin2']; ?></td>
                                                            <td align="center" class="All_50" valign="top">
                                                                <?php if ($res['Covid_Vaccin2_file'] != '') {
                                                                    echo '<a href="../Employee/CovidCert/' . $res['Covid_Vaccin2_file'] . '" target="_blank">Uploaded</a>';
                                                                } ?></td>

                                                            <td align="" style="" class="All_150" valign="top">
                                                                <?php echo $res['CurrAdd']; ?></td>
                                                            <?php $sqlS1 = mysql_query('select StateName from hrm_state where StateId=' . $res['CurrAdd_State'], $con);
                                                            $resS1 = mysql_fetch_assoc($sqlS1); ?>
                                                            <td align="" style="" class="All_80" valign="top">
                                                                <?php echo $resS1['StateName']; ?></td>
                                                            <?php $sqlC1 = mysql_query('select CityName from hrm_city where CityId=' . $res['CurrAdd_City'], $con);
                                                            $resC1 = mysql_fetch_assoc($sqlC1); ?>
                                                            <td align="" style="" class="All_80" valign="top">
                                                                <?php echo $resC1['CityName']; ?></td>
                                                            <td align="" style="" class="All_50" valign="top">
                                                                <?php echo $res['CurrAdd_PinNo']; ?></td>
                                                            <td align="" style="" class="All_150" valign="top">
                                                                <?php echo $res['ParAdd']; ?></td>
                                                            <?php $sqlS2 = mysql_query('select StateName from hrm_state where StateId=' . $res['ParAdd_State'], $con);
                                                            $resS2 = mysql_fetch_assoc($sqlS2); ?>
                                                            <td align="" style="" class="All_80" valign="top">
                                                                <?php echo $resS2['StateName']; ?></td>
                                                            <?php $sqlC2 = mysql_query('select CityName from hrm_city where CityId=' . $res['ParAdd_City'], $con);
                                                            $resC2 = mysql_fetch_assoc($sqlC2); ?>
                                                            <td align="" style="" class="All_80" valign="top">
                                                                <?php echo $resC2['CityName']; ?></td>
                                                            <td align="" style="" class="All_50" valign="top">
                                                                <?php echo $res['ParAdd_PinNo']; ?></td>

                                                            <td align="" style="background-color:#95CAFF;"
                                                                class="All_120" valign="top">
                                                                <?php echo $res['EmgName']; ?></td>
                                                            <td align="" style="background-color:#95CAFF;"
                                                                class="All_70" valign="top">
                                                                <?php echo $res['EmgContactNo']; ?></td>
                                                            <td align="" style="background-color:#95CAFF;"
                                                                class="All_80" valign="top">
                                                                <?php echo $res['EmgRelation']; ?></td>
                                                            <td align="" style="background-color:#95CAFF;"
                                                                class="All_150" valign="top">
                                                                <?php echo $res['EmgEmailId']; ?></td>

                                                            <td align="" style="background-color:#C9FDB0;"
                                                                class="All_120" valign="top">
                                                                <?php echo $res['Personal_RefName']; ?></td>
                                                            <td align="" style="background-color:#C9FDB0;"
                                                                class="All_70" valign="top">
                                                                <?php echo $res['Personal_RefContactNo']; ?></td>
                                                            <td align="" style="background-color:#C9FDB0;"
                                                                class="All_80" valign="top">
                                                                <?php echo $res['Personal_RefRelation']; ?></td>
                                                            <td align="" style="background-color:#C9FDB0;"
                                                                class="All_150" valign="top">
                                                                <?php echo $res['Personal_RefEmailId']; ?></td>

                                                            <td align="" style="background-color:#FCFAB1;"
                                                                class="All_120" valign="top">
                                                                <?php echo $res['Prof_RefName']; ?></td>
                                                            <td align="" style="background-color:#FCFAB1;"
                                                                class="All_70" valign="top">
                                                                <?php echo $res['Prof_RefContactNo']; ?></td>
                                                            <td align="" style="background-color:#FCFAB1;"
                                                                class="All_150" valign="top">
                                                                <?php echo $res['Prof_RefEmailId']; ?></td>
                                                            <td align="" style="background-color:#FCFAB1;"
                                                                class="All_150" valign="top">
                                                                <?php echo $res['Prof_RefCompany']; ?></td>
                                                            <td align="" style="background-color:#FCFAB1;"
                                                                class="All_100" valign="top">
                                                                <?php echo $res['Prof_RefDesig']; ?></td>

                                                            <td align="" style="" valign="top" class="All_250">
                                                                <?php echo $res['Fa_SN'] . '. ' . $res['FatherName']; ?></td>
                                                            <td align="" style="" valign="top" class="All_150">
                                                                <?php echo $res['FatherQuali']; ?></td>
                                                            <td align="center" style="" valign="top"
                                                                class="All_70"><?php if ($res['FatherDOB'] == '1970-01-01' or $res['FatherDOB'] == '0000-00-00') {
                                                                    echo '';
                                                                } else {
                                                                    echo date('d-M-y', strtotime($res['FatherDOB']));
                                                                } ?></td>
                                                            <td align="" style="" valign="top" class="All_150">
                                                                <?php echo $res['FatherOccupation']; ?></td>
                                                            <td align="" style="" valign="top" class="All_250">
                                                                <?php echo $res['Mo_SN'] . '. ' . $res['MotherName']; ?></td>
                                                            <td align="" style="" valign="top" class="All_150">
                                                                <?php echo $res['MotherQuali']; ?></td>
                                                            <td align="center" style="" valign="top"
                                                                class="All_70"><?php if ($res['MotherDOB'] == '1970-01-01' or $res['MotherDOB'] == '0000-00-00') {
                                                                    echo '';
                                                                } else {
                                                                    echo date('d-M-y', strtotime($res['MotherDOB']));
                                                                } ?></td>
                                                            <td align="" style="" valign="top" class="All_150">
                                                                <?php echo $res['MotherOccupation']; ?></td>
                                                            <td align="" style="" valign="top" class="All_250">
                                                                <?php echo $res['HW_SN'] . '. ' . $res['HusWifeName']; ?></td>
                                                            <td align="" style="" valign="top" class="All_150">
                                                                <?php echo $res['HusWifeQuali']; ?></td>
                                                            <td align="center" style="" valign="top"
                                                                class="All_70"><?php if ($res['HusWifeDOB'] == '1970-01-01' or $res['HusWifeDOB'] == '0000-00-00') {
                                                                    echo '';
                                                                } else {
                                                                    echo date('d-M-y', strtotime($res['HusWifeDOB']));
                                                                } ?></td>
                                                            <td align="" style="" valign="top" class="All_150">
                                                                <?php echo $res['HusWifeOccupation']; ?></td>
                                                            <?php $sqlF=mysql_query("select * from hrm_employee_family2 where EmployeeID=".$res['EmployeeID'], $con); $noF=1; while($resF=mysql_fetch_array($sqlF)) { if($noF<=5){?>
                                                            <td align="" style="" class="All_200"
                                                                bgcolor="#4AA5FF"><b><?php echo $resF['FamilyName']; ?></b></td>
                                                            <td align="" style="" class="All_80"
                                                                bgcolor="#4AA5FF"><?php echo $resF['FamilyRelation']; ?></td>
                                                            <td align="" style="" class="All_80"
                                                                bgcolor="#4AA5FF"><?php echo $resF['FamilyDOB']; ?></td>
                                                            <td align="" style="" class="All_150"
                                                                bgcolor="#4AA5FF"><?php echo $resF['FamilyQualification']; ?></td>
                                                            <td align="" style="" class="All_100"
                                                                bgcolor="#4AA5FF"><?php echo $resF['FamilyOccupation']; ?></td>
                                                            <?php $noF++;} } if($noF==1){ ?><td colspan="25">&nbsp;</td>
                                                            <?php } ?>
                                                            <?php if($noF==2){ ?><td colspan="20">&nbsp;</td>
                                                            <?php } ?>
                                                            <?php if($noF==3){ ?><td colspan="15">&nbsp;</td>
                                                            <?php } ?>
                                                            <?php if($noF==4){ ?><td colspan="10">&nbsp;</td>
                                                            <?php } ?>
                                                            <?php if($noF==5){ ?><td colspan="5">&nbsp;</td>
                                                            <?php } ?>
                                                            <?php if ($noF == 6) {
                                                                echo '';
                                                            } ?>






                                                            <td align="right" valign="top"
                                                                style="background-color:#FFFFBF;"
                                                                class="All_80"><?php echo $res['BAS_Value']; ?>&nbsp;</td>
                                                            <td align="right" valign="top"
                                                                style="background-color:#FFFFBF;"
                                                                class="All_80"><?php echo $res['STIPEND_Value']; ?>&nbsp;</td>
                                                            <td align="right" valign="top"
                                                                style="background-color:#FFFFBF;"
                                                                class="All_80"><?php echo $res['INCENTIVE_Value']; ?>&nbsp;</td>
                                                            <td align="right" valign="top"
                                                                style="background-color:#FFFFBF;"
                                                                class="All_80"><?php echo $res['HRA_Value']; ?>&nbsp;</td>
                                                            <td align="right" valign="top"
                                                                style="background-color:#FFFFBF;"
                                                                class="All_80"><?php echo $res['CONV_Value']; ?>&nbsp;</td>
                                                            <td align="right" valign="top"
                                                                style="background-color:#FFFFBF;"
                                                                class="All_80"><?php echo $res['Bonus_Month']; ?>&nbsp;</td>
                                                            <td align="right" valign="top"
                                                                style="background-color:#FFFFBF;"
                                                                class="All_80"><?php echo $res['SPECIAL_ALL_Value']; ?>&nbsp;</td>
                                                            <td align="right" valign="top"
                                                                style="background-color:#BFFF80;"
                                                                class="All_80"><?php echo $res['Tot_GrossMonth']; ?>&nbsp;</td>
                                                            <td align="right" valign="top"
                                                                style="background-color:#BFFF80;"
                                                                class="All_80"><?php echo $res['GrossSalary_PostAnualComponent_Value']; ?>&nbsp;</td>
                                                            <td align="right" valign="top"
                                                                style="background-color:#8CC6FF;"
                                                                class="All_80"><?php echo $res['PF_Employee_Contri_Value']; ?>&nbsp;</td>
                                                            <td align="right" valign="top"
                                                                style="background-color:#8CC6FF;"
                                                                class="All_80"><?php echo $res['ESCI']; ?>&nbsp;</td>
                                                            <td align="right" valign="top"
                                                                style="background-color:#8CC6FF;"
                                                                class="All_80"><?php echo $res['NetMonthSalary_Value']; ?>&nbsp;</td>
                                                            <td align="right" valign="top"
                                                                style="background-color:#8CC6FF;"
                                                                class="All_80"><?php echo $res['MED_REM_Value']; ?>&nbsp;</td>
                                                            <td align="right" valign="top"
                                                                style="background-color:#8CC6FF;"
                                                                class="All_80"><?php echo $res['LTA_Value']; ?>&nbsp;</td>
                                                            <td align="right" valign="top"
                                                                style="background-color:#8CC6FF;"
                                                                class="All_80"><?php echo $res['CHILD_EDU_ALL_Value']; ?>&nbsp;</td>
                                                            <td align="right" valign="top"
                                                                style="background-color:#BFFF80;"
                                                                class="All_80"><?php echo $res['Tot_Gross_Annual']; ?>&nbsp;</td>
                                                            <?php /*
                                                            <td align="right" valign="top" style="background-color:#FFD2D2;" class="All_80"><?php echo $res['BONUS_Value']; ?>
                                                            ?>&nbsp;
                                                </td> */ ?>
                                                <td align="right" valign="top" style="background-color:#FFD2D2;"
                                                    class="All_80"><?php echo $res['GRATUITY_Value']; ?>&nbsp;</td>
                                                <td align="right" valign="top" style="background-color:#FFD2D2;"
                                                    class="All_80"><?php echo $res['PF_Employer_Contri_Annul']; ?>&nbsp;</td>
                                                <td align="right" valign="top" style="background-color:#FFD2D2;"
                                                    class="All_80"><?php echo $res['AnnualESCI']; ?>&nbsp;</td>
                                                <td align="right" valign="top" style="background-color:#FFD2D2;"
                                                    class="All_80"><?php echo $res['Mediclaim_Policy']; ?>&nbsp;</td>
                                                <td align="right" valign="top" style="background-color:#F3D15C;"
                                                    class="All_80"><?php echo $res['Tot_CTC']; ?>&nbsp;</td>
                                                <td align="right" valign="top" style="" class="All_80">
                                                    <?php echo $res['EmpAddBenifit_MediInsu_value']; ?>&nbsp;</td>
                                                <td align="right" valign="top" style="" class="All_80">
                                                    <?php echo $res['Car_Entitlement']; ?>&nbsp;</td>

                                                <td align="center" valign="top" style="background-color:#BFFF80;"
                                                    class="All_80"><?php echo $res['Lodging_CategoryA']; ?></td>
                                                <td align="center" valign="top" style="background-color:#BFFF80;"
                                                    class="All_80"><?php echo $res['Lodging_CategoryB']; ?></td>
                                                <td align="center" valign="top" style="background-color:#BFFF80;"
                                                    class="All_80"><?php echo $res['Lodging_CategoryC']; ?></td>
                                                <td align="center" valign="top" style="background-color:#FFD2D2;"
                                                    class="All_80"><?php echo $res['DA_Outside_Hq']; ?></td>
                                                <td align="center" valign="top" style="background-color:#FFD2D2;"
                                                    class="All_80"><?php echo $res['DA_Inside_Hq']; ?></td>
                                                <td align="center" valign="top" style="" class="All_50">
                                                    <?php echo $res['Travel_TwoWeeKM']; ?></td>
                                                <td align="center" valign="top" style="" class="All_50">
                                                    <?php echo $res['Travel_FourWeeKM']; ?></td>
                                                <td align="" valign="top" style="" class="All_80">
                                                    <?php echo $res['Mode_Travel_Outside_Hq']; ?></td>
                                                <td align="" valign="top" style="" class="All_80">
                                                    <?php echo $res['TravelClass_Outside_Hq']; ?></td>
                                                <td align="center" valign="top" style="background-color:#8CC6FF;"
                                                    class="All_80"><?php echo $res['Mobile_Exp_Rem_Rs']; ?></td>
                                                <td align="center" valign="top" style="background-color:#8CC6FF;"
                                                    class="All_80"><?php echo $res['Mobile_Hand_Elig_Rs']; ?></td>
                                                <td align="center" valign="top" style="" class="All_80">
                                                    <?php echo $res['Misc_Expenses']; ?></td>
                                                <td align="center" valign="top" style="" class="All_80">
                                                    <?php echo $res['Health_Insurance']; ?></td>
                                                <td align="" valign="top" style="background-color:#FFFFBF;"
                                                    class="All_80"><?php echo 'As per law'; ?></td>
                                                <td align="" valign="top" style="background-color:#FFFFBF;"
                                                    class="All_80"><?php echo 'As per law'; ?></td>
                                                <?php $LY = $YearId - 1;
                                                
                                                $sqlRating = mysql_query('select HR_Rating from hrm_employee_pms where EmployeeID=' . $res['EmployeeID'] . ' AND HR_Rating>0 AND YearId=' . $YearId, $con);
                                                $rowRating = mysql_num_rows($sqlRating);
                                                if ($rowRating > 0) {
                                                    $resRating = mysql_fetch_array($sqlRating);
                                                } else {
                                                    $sqlRating = mysql_query('select HR_Rating from hrm_employee_pms where EmployeeID=' . $res['EmployeeID'] . ' AND YearId=' . $LY, $con);
                                                    $resRating = mysql_fetch_array($sqlRating);
                                                }
                                                
                                                //$sqlRating=mysql_query("select HR_Rating from hrm_employee_pms where EmployeeID=".$res['EmployeeID']." AND YearId=".$LY, $con);
                                                //$resRating=mysql_fetch_array($sqlRating);
                                                
                                                ?>
                                                <td align="center" valign="top" style="background-color:#FFFFBF;"
                                                    class="All_80"><?php echo $resRating['HR_Rating']; ?></td>
                                            </tr>
                                            <?php $Sno++; } ?>
                                        </table>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php //---------------------------------------Close Record-----------------------------------------------------------------
                                ?>

                            </table>
                    </tr>
                    <tr>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    </td>
    </tr>
    </table>
    </form>
    </td>
    <?php } ?>

    <?php //--------------------------------------------------------------------------------------------------------
    ?>
    <td align="left" width="20%">&nbsp;</td>
    </tr>
    </table>
    <?php //************************************************************************************************************************************************************
    ?>
    <?php //**********************************************END*****END*****END******END******END***************************************************************
    ?>
    <?php //************************************************************************************************************************************************************
    ?>
    </td>
    </tr>
    <tr>
        <td valign="top">
            <?php require_once '../footer.php'; ?>
        </td>
    </tr>
    </table>
    </td>
    </tr>
    </table>
</body>

</html>
