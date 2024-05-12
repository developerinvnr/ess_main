<?php session_start();
error_reporting(E_ALL);
if ($_SESSION['login'] = true) {
    require_once('config/config.php');
} else {
    $msg = "Session Expiry...............";
}
include("../function.php");
if (check_user() == false) {
    header('Location:../index.php');
}
require_once('logcheck.php');
if ($_SESSION['logCheckUser'] != $logadmin) {
    header('Location:../index.php');
}
if ($_SESSION['login'] = true) {
    require_once('AdminMenuSession.php');
} else {
    $msg = "Session Expiry...............";
}
//**********************************

?>
<html>

<head>
    <title><?php include_once('../Title.php'); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <link type="text/css" href="css/body.css" rel="stylesheet" />
    <link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet" />
    <script type="text/javascript" src="js/stuHover.js"></script>
    <script type="text/javascript" src="js/Prototype.js"></script>
    <script language="javascript">
        function OpenF(sn) {
            document.getElementById("TD" + sn).style.display = 'block';
            document.getElementById("ADown" + sn).style.display = 'none';
            document.getElementById("AUp" + sn).style.display = 'block';
        }

        function CloseF(sn) {
            document.getElementById("TD" + sn).style.display = 'none';
            document.getElementById("ADown" + sn).style.display = 'block';
            document.getElementById("AUp" + sn).style.display = 'none';
        }

        function MoveF(sn, Code, Com, Uid, Yid) {
            var Ncode = document.getElementById("Ncode" + sn).value;
            if (Ncode == '') {
                alert("Employee Code Required!");
                return false;
            } else {

                var agree = confirm("Are you sure? you want to move employee date from recruitment database to ess database with EmpCode = " + Ncode + ".");
                if (agree) {
                    var agree2 = confirm("Confirmation-2, Are you sure? move data with EmpCode = " + Ncode + ".");
                    if (agree2) {
                        document.getElementById("LoaderSection" + sn).style.display = 'block';
                        document.getElementById("MoveBtn" + sn).disabled = 'none';
                        document.getElementById("TD2" + sn).style.background = '#D8D8D8';
                        var url = 'MoveEmpFromRecruitAct.php';
                        var pars = 'For=RecuitToEss&sn=' + sn + '&ecode=' + Code + '&comid=' + Com + '&ncode=' + Ncode + '&uid=' + Uid + '&yid=' + Yid;
                        var myAjax = new Ajax.Request(url, {
                            method: 'post',
                            parameters: pars,
                            onComplete: show_result
                        });

                    } //if(agree2)
                }

            } //else 
        }

        function show_result(originalRequest) {
            document.getElementById('SpnaChkMove').innerHTML = originalRequest.responseText;
            var e = document.getElementById('ecode_i').value;
            var sn = document.getElementById('sn_i').value;
            if (document.getElementById('ChkV').value == 1) {
                alert("Data moved successfully!");
                document.getElementById("LoaderSection" + sn).style.display = 'none';
                window.location = "MoveEmpFromRecruit.php";
            } else if (document.getElementById('ChkV').value == 0 && document.getElementById('ChkV_ErrCode').value == 1) {
                alert("Error.. Duplicate EmpCode!");
            } else if (document.getElementById('ChkV').value == 0 && document.getElementById('ChkV_ErrCode').value == 0) {
                alert("Error!");
            }

        }
    </script>
    <style>
        .th {
            font-family: Times New Roman;
            font-size: 12px;
            font-weight: bold;
            text-align: center;
            background-color: #7a6189;
            color: #FFFFFF;
        }

        .sth {
            font-family: Times New Roman;
            font-size: 14px;
            width: 30%;
            text-align: center;
            background-color: #FFFF80;
            color: #000000;
        }

        .sth2 {
            font-family: Times New Roman;
            font-size: 14px;
            width: 35%;
            text-align: center;
            background-color: #FFFF80;
            color: #000000;
        }

        .tdc {
            font-family: Times New Roman;
            font-size: 12px;
            text-align: center;
            background-color: #FFFFFF;
            color: #000000;
        }

        .tdl {
            font-family: Times New Roman;
            font-size: 12px;
            text-align: left;
            background-color: #FFFFFF;
            color: #000000;
            padding-left: 3px;
        }

        .tdr {
            font-family: Times New Roman;
            font-size: 12px;
            text-align: right;
            background-color: #FFFFFF;
            color: #000000;
        }

        .stdl {
            font-family: Times New Roman;
            font-size: 12px;
            text-align: left;
            background-color: #C6FF8C;
            color: #000000;
            width: 100px;
            font-weight: bold;
            padding-left: 3px;
        }

        .tdli {
            font-family: Times New Roman;
            font-size: 12px;
            text-align: left;
            background-color: #FFFFFF;
            color: #000000;
        }

        /* Center the loader */
        #loader {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            width: 120px;
            height: 120px;
            margin: -76px 0 0 -76px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Add animation to "page content" */
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }

        @-webkit-keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0px;
                opacity: 1
            }
        }

        @keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0;
                opacity: 1
            }
        }

        #myDiv {
            display: none;
            text-align: center;
        }
    </style>
</head>

<body class="body">
    <span id="SpnaChkMove"></span>
    <table class="table">
        <tr>
            <td>
                <table class="menutable">
                    <tr>
                        <td><?php if ($_SESSION['login'] = true) {
                                require_once("AMenu.php");
                            } ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <table width="100%" style="margin-top:0px;" border="0">
                    <tr>
                        <td valign="top"><?php if ($_SESSION['login'] = true) {
                                                require_once("AWelcome.php");
                                            } ?></td>
                    </tr>
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td width="50">&nbsp;</td>
                                    <td style="width:250px; font-family:Times New Roman; font-size:16px; color:#287126; font-weight:bold;"><span id="msgspan"><?php echo $msg; ?></span></b></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" align="center" width="100%" id="MainWindow" style="vertical-align:top;">

                            <?php //************START*****START*****START******START******START********************************************
                            ?>
                            <table border="0" style="margin-top:0px;width:100%;vertical-align:top;">
                                <tr>
                                    <td width="10" bgcolor="">&nbsp;</td>
                                    <td style="vertical-align:top;">
                                        <table border="0" style="vertical-align:top;">
                                            <tr>
                                                <td width="400" class="heading"><i>Move Employee From Recruitment Table</i></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="color:#FF0000;font-size:14px;"><b><?php if ($_REQUEST['action'] == 'false') {
                                                                                                                echo 'This employee code allready exist..';
                                                                                                            } ?></b> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <?php if (($_SESSION['UserType'] == 'M' or $_SESSION['UserType'] == 'S' or $_SESSION['UserType'] == 'A' or $_SESSION['UserType'] == 'U') and $_SESSION['login'] = true) { ?>
                                    <tr>
                                        <td width="10">&nbsp;<span id="EditTEmp"></span></td>
                                        <td align="left" style="display:block;vertical-align:top;">
                                            <form name="formEgeneral" method="post" onSubmit="return validate(this)">
                                                <input type="hidden" name="CompanyId" id="CompanyId" value="<?php echo $CompanyId; ?>">
                                                <input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>">
                                                <input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>">
                                                <table border="0" style="vertical-align:top;width:100%;">
                                                    <tr>
                                                        <td align="left" style="vertical-align:top;width:100%;">
                                                            <table border="1" style="width:95%;" cellspacing="1">
                                                                <tr>
                                                                    <td class="th" style="width:4%;">Sn</td>
                                                                    <td class="th" style="width:5%;">Code</td>
                                                                    <td class="th" style="width:20%">Name</td>
                                                                    <td class="th" style="width:11%;">Department</td>
                                                                    <td class="th" style="width:20%;">Designation</td>
                                                                    <td class="th" style="width:8%;">Position Code</td>
                                                                    <td class="th" style="width:8%;">Vertical</td>
                                                                    <td class="th" style="width:5%;">Grade</td>
                                                                    <td class="th" style="width:8%;">Contact</td>
                                                                    <td class="th" style="width:17%;">Email</td>
                                                                    <td class="th" style="width:10%;">View/Edit/Move</td>
                                                                </tr>
                                                                <?php

                                                                $con2 = mysql_connect('localhost', 'hrims_user', 'hrims@192');
                                                                $db2 = mysql_select_db('recruitment_to_ess', $con2);
                                                                $sql = mysql_query("select * from `employee_general` where DataMove='N' order by EmpCode ASC", $con2);
                                                                $sn = 1;
                                                                while ($res = mysql_fetch_assoc($sql)) {

                                                                    $spf = mysql_query("select * from employee_pf where EmpCode=" . $res['EmpCode'] . " AND CompanyId=" . $res['CompanyId'], $con2);
                                                                    $rpf = mysql_fetch_assoc($spf);
                                                                    $sad = mysql_query("select * from employee_address where EmpCode=" . $res['EmpCode'] . " AND CompanyId=" . $res['CompanyId'], $con2);
                                                                    $rad = mysql_fetch_assoc($sad);
                                                                ?>
                                                                    <tr style="height:26px;">
                                                                        <td class="tdc" style="width:4%;"><?= $sn ?></td>
                                                                        <td class="tdc" style="width:5%;"><?= $res['EmpCode'] ?></td>
                                                                        <td class="tdl" style="width:20%"><?= $res['FName'] . ' ' . $res['MName'] . ' ' . $res['LName'] ?></td>

                                                                        <?php $con = mysql_connect('localhost', 'hrims_user', 'hrims@192');
                                                                        $db = mysql_select_db('hrims', $con);
                                                                        $sD = mysql_query("select DepartmentCode from hrm_department where DepartmentId=" . $res['DepartmentId'], $con);
                                                                        $sDe = mysql_query("select DesigName from hrm_designation where DesigId=" . $res['DesigId'], $con);
                                                                        $sG = mysql_query("select GradeValue from hrm_grade where GradeId=" . $res['Grade'], $con);
                                                                        $sS = mysql_query("select StateName from hrm_state where StateId=" . $res['T_StateHq'], $con);
                                                                        $sHq = mysql_query("select HqName from hrm_headquater where HqId=" . $res['T_LocationHq'], $con);
                                                                        $sSF = mysql_query("select StateName from hrm_state where StateId=" . $res['F_StateHq'], $con);
                                                                        $sHqF = mysql_query("select HqName from hrm_headquater where HqId=" . $res['F_LocationHq'], $con);
                                                                        $rD = mysql_fetch_assoc($sD);
                                                                        $rDe = mysql_fetch_assoc($sDe);
                                                                        $rG = mysql_fetch_assoc($sG);
                                                                        $rS = mysql_fetch_assoc($sS);
                                                                        $rHq = mysql_fetch_assoc($sHq);
                                                                        $rSF = mysql_fetch_assoc($sSF);
                                                                        $rHqF = mysql_fetch_assoc($sHqF); ?>
                                                                        <td class="tdl" style="width:11%;"><?= $rD['DepartmentCode'] ?></td>
                                                                        <td class="tdl" style="width:20%;"><?= $rDe['DesigName'] ?></td>
                                                                        <td class="tdl" style="width:8%;"><?= $res['PositionCode'] ?></td>
                                                                        <td class="tdl" style="width:8%;"><?= $res['PosVR'] ?></td>
                                                                        <td class="tdc" style="width:5%;"><?= $rG['GradeValue'] ?></td>
                                                                        <td class="tdc" style="width:8%;"><?= $res['Contact1'] ?></td>
                                                                        <td class="tdl" style="width:17%;"><?= $res['Email1'] ?></td>
                                                                        <td style="width:5%;cursor:pointer;background-color:#FFFFFF;" align="center">
                                                                            <span onClick="OpenF(<?= $sn ?>)"><img src="images/ADown.png" id="ADown<?= $sn ?>" /></span>
                                                                            <span onClick="CloseF(<?= $sn ?>)"><img src="images/AUp.png" id="AUp<?= $sn ?>" style="display:none;" /></span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align:top;width:100%;" colspan="10">
                                                                            <div id="TD<?= $sn ?>" style="vertical-align:top;display:none;width:100%;">
                                                                                <table style="width:100%;" id="TD2<?= $sn ?>" border="0" cellspacing="1">
                                                                                    <tr style="width:24px;">
                                                                                        <td class="sth"><b>Basic Details</b></td>
                                                                                        <td class="sth2"><b>Family, Address, Reference & Language</b></td>
                                                                                        <td class="sth2"><b>Education, Experiance, CTC & Eligibility</b></td>
                                                                                    </tr>

                                                                                    <tr style="width:24px;">
                                                                                        <td style="vertical-align:top;">
                                                                                            <table style="width:100%;" border="1" cellspacing="1">
                                                                                                <tr>
                                                                                                    <td class="stdl">EmpCode <font color="#FF0000">*</font>
                                                                                                    </td>
                                                                                                    <td class="tdl"><input class="tdli" id="Ncode<?= $sn ?>" value="<?= $res['EmpCode'] ?>" style="width:100px;" required /> &nbsp;&nbsp;<font style="font-size:15px;color:#FF0000;">Editable</font>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="stdl">Name</td>
                                                                                                    <td class="tdl"><?= $res['FName'] . ' ' . $res['MName'] . ' ' . $res['LName'] ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="stdl">Department</td>
                                                                                                    <td class="tdl"><?= $rD['DepartmentCode'] ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="stdl">Designaion</td>
                                                                                                    <td class="tdl"><?= $rDe['DesigName'] ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="stdl">Grade</td>
                                                                                                    <td class="tdl"><?= $rG['GradeValue'] ?></td>
                                                                                                </tr>

                                                                                                <?php if ($res['T_StateHq'] > 0) {
                                                                                                    $state = $rS['StateName'];
                                                                                                } else {
                                                                                                    $state = $rSF['StateName'];
                                                                                                } ?>
                                                                                                <?php if ($res['T_LocationHq'] > 0) {
                                                                                                    $hq = $rHq['HqName'];
                                                                                                } else {
                                                                                                    $hq = $rHqF['HqName'];
                                                                                                } ?>
                                                                                                <tr>
                                                                                                    <td class="stdl">CostCentre</td>
                                                                                                    <td class="tdl"><?= $state ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="stdl">HQ</td>
                                                                                                    <td class="tdl"><?= $hq ?></td>
                                                                                                </tr>

                                                                                                <tr>
                                                                                                    <td class="stdl">DOJ</td>
                                                                                                    <td class="tdl"><?= date("d-m-Y", strtotime($res['JoinOnDt'])) ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="stdl">DOB</td>
                                                                                                    <td class="tdl"><?= date("d-m-Y", strtotime($res['DOB'])) ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="stdl">Contact</td>
                                                                                                    <td class="tdl"><?php echo $res['Contact1'];
                                                                                                                    if ($res['Contact2'] > 0) {
                                                                                                                        echo ', ' . $res['Contact2'];
                                                                                                                    } ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="stdl">Email</td>
                                                                                                    <td class="tdl"><?= $res['Email1'] ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="stdl">Gender</td>
                                                                                                    <td class="tdl"><?= $res['Gender'] ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="stdl">Aadhar</td>
                                                                                                    <td class="tdl"><?= $res['Aadhar'] ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="stdl">Bank</td>
                                                                                                    <td class="tdl"><?= $rpf['bank_name'] ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="stdl">Branch</td>
                                                                                                    <td class="tdl"><?= $rpf['branch_name'] ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="stdl">A/C No</td>
                                                                                                    <td class="tdl"><?= $rpf['acc_number'] ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="stdl">IFSC Code</td>
                                                                                                    <td class="tdl"><?= $rpf['ifsc_code'] ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="stdl">PAN</td>
                                                                                                    <td class="tdl"><?= $rpf['pan'] ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="stdl">UAN</td>
                                                                                                    <td class="tdl"><?= $rpf['UAN'] ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="stdl">PF A/c No.</td>
                                                                                                    <td class="tdl"><?= $rpf['pf_acc_no'] ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="stdl">ESIC No.</td>
                                                                                                    <td class="tdl"><?= $rpf['esic_no'] ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="stdl">Passport</td>
                                                                                                    <td class="tdl"><?= $rpf['passport'] ?></td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>

                                                                                        <td style="vertical-align:top;">
                                                                                            <table style="width:100%;" border="1" cellspacing="1">
                                                                                                <tr>
                                                                                                    <td class="stdl">Current Address</td>
                                                                                                    <td class="tdl"><?= $rad['pre_address'] . ', ' . $rad['pre_city'] . ', ' . $rad['pre_dist'] . ', (' . $rad['pre_state'] . '), Pin No-' . $rad['pre_pin'] ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="stdl">Parmanent Address</td>
                                                                                                    <td class="tdl"><?= $rad['perm_address'] . ', ' . $rad['perm_city'] . ', ' . $rad['perm_dist'] . ', (' . $rad['perm_state'] . '), Pin No-' . $rad['perm_pin'] ?></td>
                                                                                                </tr>

                                                                                                <?php $con2 = mysql_connect('localhost', 'hrims_user', 'hrims@192');
                                                                                                $db2 = mysql_select_db('recruitment_to_ess', $con2);
                                                                                                $sFm = mysql_query("select * from employee_family where EmpCode=" . $res['EmpCode'] . " AND CompanyId=" . $res['CompanyId'], $con2);
                                                                                                $rowFm = mysql_num_rows($sFm);
                                                                                                $n = 1;
                                                                                                while ($rFm = mysql_fetch_assoc($sFm)) { ?>
                                                                                                    <tr>
                                                                                                        <?php if ($n == 1) { ?><td rowspan="<?= $rowFm ?>" class="stdl">Family</td><?php } ?>
                                                                                                        <td class="tdl"><?= '<b>' . $rFm['Relation'] . ':</b> ' . $rFm['Name'] . ', <b>DOB-</b>' . $rFm['Dob'] . ', <b>Quali.-</b>' . $rFm['Qualification'] . ', <b>Occup.-</b>' . $rFm['Occupation'] ?></td>
                                                                                                    </tr>
                                                                                    </tr>
                                                                                <?php $n++;
                                                                                                } ?>

                                                                                <?php $sRf = mysql_query("select * from employee_preref where EmpCode=" . $res['EmpCode'] . " AND CompanyId=" . $res['CompanyId'], $con2);
                                                                                $rowRf = mysql_num_rows($sRf);
                                                                                $q = 1;
                                                                                while ($rRf = mysql_fetch_assoc($sRf)) { ?>
                                                                                    <tr>
                                                                                        <?php if ($q == 1) { ?><td rowspan="<?= $rowRf ?>" class="stdl">Reference (Other)</td><?php } ?>
                                                                                        <td class="tdl"><?= '<b>' . $rRf['name'] . ':</b> <b>Company-</b>' . $rRf['company'] . ', <b>Post-</b>' . $rRf['designation'] . ', <b>Email-</b>' . $rRf['email'] . ', <b>Contact-</b>' . $rRf['contact'] ?></td>
                                                                                    </tr>
                                                                    </tr>
                                                                <?php $q++;
                                                                                } ?>

                                                                <?php $sRf2 = mysql_query("select * from employee_vnrref where EmpCode=" . $res['EmpCode'] . " AND CompanyId=" . $res['CompanyId'], $con2);
                                                                    $rowRf2 = mysql_num_rows($sRf2);
                                                                    $r = 1;
                                                                    while ($rRf2 = mysql_fetch_assoc($sRf2)) { ?>
                                                                    <tr>
                                                                        <?php if ($r == 1) { ?><td rowspan="<?= $rowRf2 ?>" class="stdl">Reference (VNR)</td><?php } ?>
                                                                        <td class="tdl"><?= '<b>' . $rRf2['name'] . ':</b> <b>Company-</b>' . $rRf2['company'] . ', <b>Post-</b>' . $rRf2['designation'] . ', <b>Email-</b>' . $rRf2['email'] . ', <b>Contact-</b>' . $rRf2['contact'] . ', <b>Relation-</b>' . $rRf2['rel_with_person'] ?></td>
                                                                    </tr>
                                                    </tr>
                                                <?php $r++;
                                                                    } ?>

                                                <?php $sL = mysql_query("select * from employee_language where EmpCode=" . $res['EmpCode'] . " AND CompanyId=" . $res['CompanyId'], $con2);
                                                                    $rowL = mysql_num_rows($sL);
                                                                    $s = 1;
                                                                    while ($rL = mysql_fetch_assoc($sL)) { ?>
                                                    <tr>
                                                        <?php if ($s == 1) { ?><td rowspan="<?= $rowL ?>" class="stdl">Language</td><?php } ?>
                                                        <td class="tdl"><?php echo '<b>' . $rL['language'] . ':</b> <b>Read-</b>';
                                                                        if ($rL['read'] == 1) {
                                                                            echo 'Y';
                                                                        } else {
                                                                            echo 'N';
                                                                        }
                                                                        echo ', <b>Write-</b>';
                                                                        if ($rL['write'] == 1) {
                                                                            echo 'Y';
                                                                        } else {
                                                                            echo 'N';
                                                                        }
                                                                        echo ', <b>Speak-</b>';
                                                                        if ($rL['speak'] == 1) {
                                                                            echo 'Y';
                                                                        } else {
                                                                            echo 'N';
                                                                        } ?></td>
                                                    </tr>
                                    </tr>
                                <?php $s++;
                                                                    } ?>

                            </table>
                            <br>
                            <center>
                                <div id="LoaderSection<?= $sn ?>" style="display:none;">
                                    <div id="loader" style="display:block;">
                                        <div style="display:block;font-family:Times New Roman;font-size:20px;" id="myDiv" class="animate-bottom">
                                            <h2>Please Wait!</h2>
                                            <!--<p>Task under process..</p>-->
                                        </div>
                                    </div>
                                </div>

                                <table style="width:80%; background-color:#1188FF;">
                                    <tr>
                                        <td align="center">
                                            <input type="button" id="MoveBtn<?= $sn ?>" style="width:200px;height:30px;cursor:pointer;" value="Move" onClick="MoveF(<?= $sn . ',' . $res['EmpCode'] . ',' . $res['CompanyId'] . ',' . $UserId . ',' . $YearId ?>)" />
                                        </td>
                                    </tr>
                                </table>
                            </center>
                        </td>


                        <td style="vertical-align:top;">
                            <table style="width:100%;" border="1" cellspacing="1">
                                <?php $sEd = mysql_query("select * from employee_education where EmpCode=" . $res['EmpCode'] . " AND CompanyId=" . $res['CompanyId'], $con2);
                                                                    $rowEd = mysql_num_rows($sEd);
                                                                    $m = 1;
                                                                    while ($rEd = mysql_fetch_assoc($sEd)) { ?>
                                    <tr>
                                        <?php if ($m == 1) { ?><td rowspan="<?= $rowEd ?>" class="stdl">Education</td><?php } ?>
                                        <td class="tdl"><?= '<b>' . $rEd['Qualification'] . ':</b> <b>Course-</b>' . $rEd['Course'] . ', <b>Spec.-</b>' . $rEd['Specialization'] . ', <b>Inst.-</b>' . $rEd['Institute'] . ', <b>YOP-</b>' . $rEd['YearOfPassing'] . ', <b>Mark(%)-</b>' . $rEd['CGPA'] ?></td>
                                    </tr>
                    </tr>
                <?php $m++;
                                                                    } ?>

                <?php $sEx = mysql_query("select * from employee_workexp where EmpCode=" . $res['EmpCode'] . " AND CompanyId=" . $res['CompanyId'], $con2);
                                                                    $rowEx = mysql_num_rows($sEx);
                                                                    $p = 1;
                                                                    while ($rEx = mysql_fetch_assoc($sEx)) { ?>
                    <tr>
                        <?php if ($p == 1) { ?><td rowspan="<?= $rowEx ?>" class="stdl">Experiance</td><?php } ?>
                        <td class="tdl"><?= '<b>' . $rEx['company'] . ':</b> <b>Post-</b>' . $rEx['desgination'] . ', <b>From-</b>' . $rEx['job_start'] . ', <b>To-</b>' . $rEx['job_end'] . ', <b>Gross-</b>' . $rEx['gross_mon_sal'] . ', <b>CTC-</b>' . $rEx['annual_ctc'] ?></td>
                    </tr>
        </tr>
    <?php $p++;
                                                                    } ?>


    <?php $sCtc = mysql_query("select * from employee_ctc where EmpCode=" . $res['EmpCode'] . " AND CompanyId=" . $res['CompanyId'], $con2);
                                                                    $rCtc = mysql_fetch_assoc($sCtc);
                                                                    if ($rCtc['basic'] > 0) { ?>
        <tr>
            <td class="stdl">CTC</td>
            <td class="tdl"><?= '<font color="#FF0000">Basic:</font>' . $rCtc['basic'] . ', <font color="#FF0000">HRA:</font>' . $rCtc['hra'] . ', <font color="#FF0000">Bonus:</font>' . $rCtc['bonus'] . ', <font color="#FF0000">Special:</font>' . $rCtc['special_alw'] . ', <font color="#FF0000">Gross:</font>' . $rCtc['grsM_salary'] . ', <font color="#FF0000">PF:</font>' . $rCtc['emplyPF'] . ', <font color="#FF0000">ESIC:</font>' . $rCtc['emplyESIC'] . ', <font color="#FF0000">Net:</font>' . $rCtc['netMonth'] . ', <font color="#FF0000">CEA:</font>' . $rCtc['childedu'] . ', <font color="#FF0000">LTA:</font>' . $rCtc['lta'] . ', <font color="#FF0000">AnnualGorss:</font>' . $rCtc['anualgrs'] . ', <font color="#FF0000">Gratuity:</font>' . $rCtc['gratuity'] . ', <font color="#FF0000">ComPF:</font>' . $rCtc['emplyerPF'] . ', <font color="#FF0000">ComESIC:</font>' . $rCtc['emplyerESIC'] . ', <font color="#FF0000">Mediclaim:</font>' . $rCtc['medical'] . ', <font color="#FF0000">CTC:</font>' . $rCtc['total_ctc']; ?></td>
        </tr>
        </tr>
    <?php } ?>

    <?php $sElg = mysql_query("select * from employee_elg where EmpCode=" . $res['EmpCode'] . " AND CompanyId=" . $res['CompanyId'], $con2);
                                                                    $rElg = mysql_fetch_assoc($sElg);
                                                                    if ($rElg['LoadCityA'] > 0) { ?>
        <tr>
            <td class="stdl">Eligibility</td>
            <td class="tdl"><?= '<font color="#FF0000">LodgingA:</font>' . $rElg['LoadCityA'] . ', <font color="#FF0000">LodgingB:</font>' . $rElg['LoadCityB'] . ', <font color="#FF0000">LodgingC:</font>' . $rElg['LoadCityC'] . ', <font color="#FF0000">DHOutsite:</font>' . $rElg['DAOut'] . ', <font color="#FF0000">DH@Hq:</font>' . $rElg['DAHq'] . ', <font color="#FF0000">TwoWheeler:</font>' . $rElg['TwoWheel'] . ', <font color="#FF0000">FourWheeler:</font>' . $rElg['FourWheel'] . ', <font color="#FF0000">TravelMode:</font>' . $rElg['TravelMode'] . ', <font color="#FF0000">TravelClass:</font>' . $rElg['TravelClass'] . ', <font color="#FF0000">MobileHandset:</font>' . $rElg['Mobile'] . ', <font color="#FF0000">MobileRemb:</font>' . $rElg['MExpense'] . ', <font color="#FF0000">RembTerm:</font>' . $rElg['MTerm'] . ', <font color="#FF0000">GPRS:</font>' . $rElg['GPRS'] . ', <font color="#FF0000">Laptop:</font>' . $rElg['Laptop'] . ', <font color="#FF0000">HealthIns:</font>' . $rElg['HealthIns']; ?></td>
        </tr>
        </tr>
    <?php } ?>


    </table>
    </td>

    </tr>



    </table>
    </div>
    </td>
    </tr>
<?php $sn++;
                                                                } ?>
</table>
</td>
</tr>
</table>
</form>
</td>

</tr>
<?php } ?>
</table>
<?php //**********************************************END*****END*****END******END******END***************************************************************
?>
</td>
</tr>

<tr>
    <td valign="top" align="center">
        <table border="0" style="margin-top:0px;">
            <tr>
                <td align="center"><img src="images/home1.png"></td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td valign="top">
        <?php require_once("../footer.php"); ?>
    </td>
</tr>
</table>
</td>
</tr>
</table>
</body>

</html>