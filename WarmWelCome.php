<?php session_start();
define('HOST', 'localhost'); //localhost  //1_144.76.110.39  //2_148.251.83.156  //159.69.73.26
define('USER', 'vnrseed2_hrims');
define('PASS', '5Az*hcHimJkE');
define('DATABASE1', 'hrims');


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <title><?php include_once('Title.php'); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <link type="text/css" href="AdminUser/css/body.css" rel="stylesheet" />
    <link type="text/css" href="AdminUser/css/pro_dropdown_3.css" rel="stylesheet" />
    <style>
        .font {
            color: #ffffff;
            font-family: Georgia;
            font-size: 11px;
            width: 120px;
        }

        .font1 {
            font-family: "Times New Roman", Times, serif;
            font-size: 11px;
            width: 120px;
        }

        .font2 {
            font-size: 11px;
            width: 260px;
            height: 18px;
        }

        .font4 {
            color: #1FAD34;
            font-family: Georgia;
            font-size: 15px;
        }

        .span {
            display: none;
            font-family: Courier New;
            font-size: 14px;
        }

        .span1 {
            display: block;
            font-family: Courier New;
            font-size: 14px;
        }

        .fontButton {
            background-color: #7a6189;
            color: #009393;
            font-family: Georgia;
            font-size: 13px;
        }

        .SaveButton {
            background-image: url(images/save.gif);
            width: 20px;
            height: 20px;
            background-repeat: no-repeat;
            background-color: #FFFFFF;
            border-color: #FFFFFF;
            border-bottom: inherit;
        }

        .TextInput {
            font-family: "Times New Roman", Times, serif;
            font-size: 11px;
            width: 100px;
            height: 18px;
        }

        .redius {
            -webkit-box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);
            box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);
        }

        .redius2 {
            -webkit-box-shadow: 3px 3px 5px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 3px 3px 5px 0px rgba(0, 0, 0, 0.75);
            box-shadow: 3px 3px 5px 0px rgba(0, 0, 0, 0.75);
        }
    </style>
    <style>
        .head {
            font-family: Times New Roman;
            font-size: 14px;
            font-weight: bold;
        }

        .data {
            font-family: Times New Roman;
            font-size: 14px;
        }
    </style>
    <script language="javascript" type="text/javascript">
        function EditOth() {
            document.getElementById("EditOthE").style.display = 'block';
            document.getElementById("ChangeOth").style.display = 'none';
            document.getElementById("Warm_WelC_Oth").disabled = false;
        }
    </script>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#E0DBE3">
    <input type="hidden" name="EI" id="EI" value="<?php echo $_REQUEST['EI']; ?>" />
    <?php
    // Database connection
    $con = mysqli_connect("localhost", USER, PASS, DATABASE1);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>

    <table style="vertical-align:top;width:900px;" align="center" border="0">
        <tr>
            <td>
                <table border="0" style="width:100%;font-family:Georgia;color:#000000;">
                    <?php /*?> <tr><td style="width:100%;font-size:15px;" valign="top" align="right"><b>Employee Code:&nbsp;<?php echo $EC; ?></b>&nbsp;&nbsp;</td></tr><?php */ ?>

                    <!-- Start Start Start Start Start Start -->
                    <!-- Start Start Start Start Start Start -->

                    <?php
                    // Database connection


                    // Check Warm Welcome flag
                    $sqlMK = mysqli_query($con, "SELECT WarmWelCome FROM hrm_employee_key WHERE CompanyId=1");
                    $resMK = mysqli_fetch_assoc($sqlMK);

                    if ($resMK['WarmWelCome'] == 'Y') {
                    ?>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="width:100%;text-align:center;">
                                <center>
                                    <table style="width:90%;text-align:center;" border="0">
                                        <?php
                                        // Determine previous month and year
                                        if (date("m") >= 2 && date("m") <= 12) {
                                            $PrevMnt = date("m") - 1;
                                            $PrevYer = date("Y");
                                        } else {
                                            $PrevMnt = 12;
                                            $PrevYer = date("Y") - 1;
                                        }

                                        $mkdate = mktime(0, 0, 0, $PrevMnt, 1, $PrevYer);
                                        $days = date('t', $mkdate);

                                        if (strlen($PrevMnt) == 1) {
                                            $PrevMnt = '0' . $PrevMnt;
                                        }

                                        $sqlEmp = mysqli_query($con, "SELECT e.EmployeeID, EmpCode, Fname, Sname, Lname, d.department_name, g.DepartmentId, EmpVertical, designation_name, state_name, Gender, DR, Married, DateJoining, DOB, RepEmployeeID, g.TerrId, g.HqId, city_village_name, territory_name, Warm_WelC_Oth, e.CompanyId 
                                        FROM hrm_employee e
                                        LEFT JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID
                                        LEFT JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID
                                        LEFT JOIN core_designation de ON g.DesigId=de.id
                                        LEFT JOIN core_departments d ON g.DepartmentId=d.id
                                        left join core_city_village_by_state vlg on g.HqId=vlg.id
                                        LEFT JOIN core_states s ON g.CostCenter=s.id
                                        left join core_territory Tr on g.TerrId=Tr.id
                                        WHERE g.DateJoining BETWEEN '" . $PrevYer . "-" . $PrevMnt . "-01' AND '" . $PrevYer . "-" . $PrevMnt . "-" . $days . "'
                                        AND e.EmpStatus='A' AND e.CompanyId=1
                                        ORDER BY e.EmpCode ASC");

                                        while ($ResEmp = mysqli_fetch_assoc($sqlEmp)) {
                                            $EmpId = $ResEmp['EmployeeID'];

                                            // Determine prefix (Dr./Mr./Mrs./Ms.)
                                            if ($ResEmp['DR'] == 'Y') {
                                                $M = 'Dr.';
                                            } elseif ($ResEmp['Gender'] == 'M') {
                                                $M = 'Mr.';
                                            } elseif ($ResEmp['Gender'] == 'F' && $ResEmp['Married'] == 'Y') {
                                                $M = 'Mrs.';
                                            } else {
                                                $M = 'Ms.';
                                            }

                                            // Format employee name
                                            $Ename = ucwords(strtolower($M . ' ' . $ResEmp['Fname'] . ' ' . ($ResEmp['Sname'] ? $ResEmp['Sname'] . ' ' : '') . $ResEmp['Lname']));

                                            // Fetch vertical name
                                            $VerticalName = '';
                                            if ($ResEmp['EmpVertical'] > 0) {
                                                $sVert = mysqli_query($con, "SELECT vertical_name FROM core_verticals WHERE id=" . $ResEmp['EmpVertical']);
                                                $rVrt = mysqli_fetch_assoc($sVert);
                                                $VerticalName = $rVrt['vertical_name'];
                                            }

                                            // Fetch qualifications
                                            $sqlExtQ = mysqli_query($con, "SELECT * FROM hrm_employee_qualification WHERE EmployeeID = $EmpId AND Specialization != '' AND Institute != '' AND MaxQuali = 'Y' ORDER BY QualificationId DESC");
                                            $rowExtQ = mysqli_num_rows($sqlExtQ);


                                            $sqlQ = mysqli_query($con, "select Fname,Sname,Lname,designation_name,DR,Gender,Married,g.DepartmentId, 
EmpVertical from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID 
LEFT join hrm_employee_personal p on g.EmployeeID=p.EmployeeID 
left join core_designation de on g.DesigId=de.id where g.EmployeeID=" . $ResEmp['RepEmployeeID']);
                                            $resQ = mysqli_fetch_assoc($sqlQ);

                                            $VerticalNameR = '';
                                            if ($resQ['EmpVertical'] > 0) {
                                                $sVertR = mysqli_query($con, "SELECT vertical_name FROM core_verticals WHERE id=" . $resQ['EmpVertical']);
                                                $rVrtR = mysqli_fetch_assoc($sVertR);
                                                $VerticalNameR = $rVrtR['vertical_name'];
                                            }

                                            if ($resQ['DR'] == 'Y') {
                                                $MS2 = 'Dr.';
                                            } elseif ($resQ['Gender'] == 'M') {
                                                $MS2 = 'Mr.';
                                            } elseif ($resQ['Gender'] == 'F' && $resQ['Married'] == 'Y') {
                                                $MS2 = 'Mrs.';
                                            } else {
                                                $MS2 = 'Ms.';
                                            }


                                            $Rname = ucwords(strtolower($MS2 . ' ' . $resQ['Fname'] . ' ' . ($resQ['Sname'] ? $resQ['Sname'] . ' ' : '') . $resQ['Lname']));

                                            // Family Details
                                            $sqlF = mysqli_query($con, "SELECT HW_SN, HusWifeName FROM hrm_employee_family WHERE EmployeeID = $EmpId AND HusWifeName != ''");
                                            $rowF = mysqli_num_rows($sqlF);

                                            $familyDetails = [];
                                            if ($rowF > 0) {
                                                while ($resF = mysqli_fetch_assoc($sqlF)) {
                                                    $familyDetails[] = $resF['HW_SN'] . ' ' . $resF['HusWifeName'];
                                                }
                                            }

                                            // Education details output
                                        ?>
                                            <?php $Hq = '';
                                            if ($ResEmp['TerrId'] > 0) {
                                                $Hq = $ResEmp['territory_name'];
                                            } else {
                                                $Hq = $ResEmp['city_village_name'];
                                            } ?>
                                            <tr>
                                                <td style="width:100%;text-align:center;background-color:#119c83;">
                                                    <table style="width:100%;font-family:Georgia;" border="0" class="redius">
                                                        <tr>
                                                            <td style="width:10%;text-align:center;"><img src="images/LogoNew.png" style="width:55px; height:65px;" /></td>
                                                            <td style="text-align:center;font-size:25px; color:#FFFFC1;">Warm Welcome <u><?php echo date("F Y", strtotime($ResEmp['DateJoining'])); ?></u></td>
                                                            <td style="width:10%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" style="text-align:center;font-size:16px;font-weight:bold;color:#FFF;"><?php echo $Ename; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" style="text-align:center;">
                                                                <?php echo '<img border="0" style="border-radius:10%;width:105px;height:125px;" src="AdminUser/EmpImg' . $ResEmp['CompanyId'] . 'Emp/' . $ResEmp['EmpCode'] . '.jpg" class="redius2"/>'; ?>
                                                            </td>
                                                        </tr>
                                                        <?php if ($ResEmp['DepartmentId'] == 15 and ($ResEmp['EmpVertical'] == 1 || $ResEmp['EmpVertical'] == 2)) { ?>
                                                            <tr>
                                                                <td colspan="3" style="text-align:center;font-size:15px;">
                                                                    <b><?php echo $MS . ' ' . $Ename; ?></b> has joined us on <b><?php echo date("d-M-Y", strtotime($ResEmp['DateJoining'])); ?></b> as a <b><?php echo $ResEmp['designation_name'] . ' ( ' . $VerticalName . ' ) - ' . ucwords(strtolower($ResEmp['department_name'])); ?>.</b>
                                                                </td>
                                                            </tr>
                                                        <?php } else { ?>
                                                            <tr>
                                                                <td colspan="3" style="text-align:center;font-size:15px;">
                                                                    <b><?php echo $MS . ' ' . $Ename; ?></b> has joined us on <b><?php echo date("d-M-Y", strtotime($ResEmp['DateJoining'])); ?></b> as a <b><?php echo $ResEmp['designation_name'] . ' (' . ucwords(strtolower($ResEmp['department_name'])) . ')'; ?>.</b>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>

                                                        <tr>
                                                            <td colspan="3" style="height:15px;border:hidden;"></td>
                                                        </tr>

                                                        <?php if ($ResQ['DepartmentId'] == 15 and ($ResQ['EmpVertical'] == 1 || $ResQ['EmpVertical'] == 2)) { ?>
                                                            <tr>
                                                                <td colspan="3" style="text-align:center;font-size:15px;"><b><?php echo $Ename; ?></b> will report to <?php echo ucwords(strtolower($Rname)) . ' -' . $resQ['designation_name'] . ' ( ' . $VerticalNameR . ' )'; ?> and shall operate from <?php echo '<b>' . ucwords(strtolower($Hq)) . ' (' . ucwords(strtolower($ResEmp['state_name'])) . ')</b>'; ?>.</td>
                                                            </tr>
                                                        <?php } else { ?>
                                                            <tr>
                                                                <td colspan="3" style="text-align:center;font-size:15px;"><b><?php echo $Ename; ?></b> will report to <?php echo ucwords(strtolower($Rname)) . ' (' . $resQ['designation_name'] . ') '; ?> and shall operate from <?php echo '<b>' . ucwords(strtolower($Hq)) . ' (' . ucwords(strtolower($ResEmp['state_name'])) . ')</b>'; ?>.</td>
                                                            </tr>
                                                        <?php } ?>


                                                        <?php if ($rowExtQ > 0) { ?>
                                                            <tr>
                                                                <td colspan="3" style="text-align:center;font-size:15px;">
                                                                    <?php if ($ResEmp['Gender'] == 'F') {
                                                                        echo 'She';
                                                                    } else {
                                                                        echo 'He';
                                                                    } ?> is <?php $nn = 1;
                                                                                                                                        while ($resExtQ = mysqli_fetch_assoc($sqlExtQ)) {
                                                                                                                                            echo '<b>';
                                                                                                                                            if ($resExtQ['Qualification'] != '' && $resExtQ['Qualification'] != 'Other' && $resExtQ['Qualification'] != 'Post_Graduation' && $resExtQ['Qualification'] != 'Graduation' && $resExtQ['Qualification'] != '10th' && $resExtQ['Qualification'] != '12th') {
                                                                                                                                                echo $resExtQ['Qualification'] . '(' . $resExtQ['Specialization'] . ')';
                                                                                                                                            } else {
                                                                                                                                                echo $resExtQ['Specialization'];
                                                                                                                                            }
                                                                                                                                            echo '</b>';
                                                                                                                                            if ($resExtQ['Subject'] != '') {
                                                                                                                                                echo ' in <b>' . $resExtQ['Subject'];
                                                                                                                                            }
                                                                                                                                            echo  '</b> from <b>' . $resExtQ['Institute'] . '</b>';
                                                                                                                                            $rowExpQ2 = $rowExtQ - 1;
                                                                                                                                            if ($nn < $rowExpQ2) {
                                                                                                                                                echo ', ';
                                                                                                                                            } elseif ($nn == $rowExpQ2) {
                                                                                                                                                echo ' & ';
                                                                                                                                            }
                                                                                                                                            $nn++;
                                                                                                                                        } ?>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>


                                                        <?php $sqlExp = mysqli_query($con, "select * from hrm_employee_experience where EmployeeID=" . $EmpId . " AND ExpComName!='' order by ExperienceId desc ");
                                                        $rowExp = mysqli_num_rows($sqlExp); ?>

                                                        <?php if ($rowExp > 0) { ?>
                                                            <tr>
                                                                <td colspan="3" style="height:15px;border:hidden;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" style="text-align:center;font-size:15px;">
                                                                    <?php if ($ResEmp['Gender'] == 'F') {
                                                                        echo 'She';
                                                                    } else {
                                                                        echo 'He';
                                                                    } ?> has earlier worked with <?php $j = 1;
                                                                                                                                                            while ($resExp = mysqli_fetch_assoc($sqlExp)) {
                                                                                                                                                                echo $resExp['ExpComName'];
                                                                                                                                                                $rowExp2 = $rowExp - 1;
                                                                                                                                                                if ($j < $rowExp2) {
                                                                                                                                                                    echo ', ';
                                                                                                                                                                } elseif ($j == $rowExp2) {
                                                                                                                                                                    echo ' & ';
                                                                                                                                                                }
                                                                                                                                                                $j++;
                                                                                                                                                            } ?>.</td>
                                                            </tr>
                                                        <?php } ?>

                                                        <?php if ($ResEmp['Warm_WelC_Oth'] != '') { ?>

                                                            <tr>
                                                                <td colspan="3" style="height:15px;border:hidden;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                                <td style="text-align:center;"><?php echo $ResEmp['Warm_WelC_Oth']; ?></td>
                                                                <td>&nbsp;</td>
                                                            </tr>
                                                        <?php } ?>


                                                        <?php if ($ResEmp['Married'] == 'Y') {
                                                            $sqlF = mysqli_query($con, "select HW_SN,HusWifeName from hrm_employee_family where EmployeeID=" . $EmpId . " AND HusWifeName!='' ");
                                                            $rowF = mysqli_num_rows($sqlF);
                                                            if ($rowF > 0) {
                                                                $sqlF2 = mysqli_query($con, "select * from hrm_employee_family2 where EmployeeID=" . $EmpId . " AND FamilyRelation='SON' order by Family2Id desc ");
                                                                $rowF2 = mysqli_num_rows($sqlF2);
                                                                $sqlF3 = mysqli_query($con, "select * from hrm_employee_family2 where EmployeeID=" . $EmpId . " AND FamilyRelation='DAUGHTER' order by Family2Id desc ");
                                                                $rowF3 = mysqli_num_rows($sqlF3);
                                                                $sqlF4 = mysqli_query($con, "select * from hrm_employee_family2 where EmployeeID=" . $EmpId . " AND FamilyRelation='CHILD' order by Family2Id desc ");
                                                                $rowF4 = mysqli_num_rows($sqlF4);
                                                        ?>
                                                                <tr>
                                                                    <td colspan="3" style="height:15px;border:hidden;"></td>
                                                                </tr>
                                                                <tr>
                                                                    <?php if ($ResEmp['Gender'] == 'F') {
                                                                        $Sirn1 = 'her';
                                                                        $Sirn2 = 'her';
                                                                    } else {
                                                                        $Sirn1 = 'him';
                                                                        $Sirn2 = 'his';
                                                                    } ?>

                                                                    <td colspan="3" style="text-align:center;font-size:15px;"><b>We welcome <?= $Sirn1 ?><?php if ($rowF2 > 0 || $rowF3 > 0 || $rowF4 > 0) {
                                                                                                                                                            echo ', ';
                                                                                                                                                        } else {
                                                                                                                                                            echo ' & ';
                                                                                                                                                        } ?><?= $Sirn2 ?> spouse - <?php $resF = mysqli_fetch_assoc($sqlF);
                                                                                                                                                                                                                                                        echo ucwords(strtolower($resF['HW_SN'])) . '. ' . $resF['HusWifeName']; ?>

                                                                            <?php $cnt = $rowF3 + $rowF4;
                                                                            if ($rowF2 > 0) {
                                                                                if ($rowF3 > 0 || $rowF4 > 0 || $rowF2 >= 2) {
                                                                                    echo ', ';
                                                                                } else {
                                                                                    echo ' & ';
                                                                                }

                                                                                $k = 1;
                                                                                if ($rowF2 >= 2) {
                                                                                    echo 'Sons - ';
                                                                                } else {
                                                                                    echo 'Son - ';
                                                                                }
                                                                                while ($resF2 = mysqli_fetch_assoc($sqlF2)) {
                                                                                    echo $resF2['FamilyName'];
                                                                                    if ($k < $rowF2 && $rowF3 == 0 && $rowF4 == 0) {
                                                                                        echo ' & ';
                                                                                    } elseif ($rowF3 > 0 && $rowF4 > 0) {
                                                                                        echo ', ';
                                                                                    }
                                                                                    $k++;
                                                                                }
                                                                            }
                                                                            if ($rowF3 > 0) {
                                                                                if ($rowF4 > 0 || $rowF3 > 1) {
                                                                                    echo ', ';
                                                                                } else {
                                                                                    echo ' & ';
                                                                                }
                                                                                $l = 1;
                                                                                if ($rowF3 >= 2) {
                                                                                    echo 'Daughters - ';
                                                                                } else {
                                                                                    echo 'Daughter - ';
                                                                                }
                                                                                while ($resF3 = mysqli_fetch_assoc($sqlF3)) {
                                                                                    echo $resF3['FamilyName'];
                                                                                    if ($l < $rowF3 && $rowF4 == 0) {
                                                                                        echo ' & ';
                                                                                    } elseif ($rowF4 > 0) {
                                                                                        echo ', ';
                                                                                    }
                                                                                    $l++;
                                                                                }
                                                                            }
                                                                            if ($rowF4 > 0) {
                                                                                if ($rowF4 > 1) {
                                                                                    echo ', ';
                                                                                } else {
                                                                                    echo ' & ';
                                                                                }
                                                                                $m = 1;
                                                                                if ($rowF4 >= 2) {
                                                                                    echo 'Childs - ';
                                                                                } else {
                                                                                    echo 'Child - ';
                                                                                }
                                                                                while ($resF4 = mysqli_fetch_assoc($sqlF4)) {
                                                                                    echo $resF4['FamilyName'];
                                                                                    if ($m < $rowF4) {
                                                                                        echo ' & ';
                                                                                    }
                                                                                    $m++;
                                                                                }
                                                                            }
                                                                            ?>.</b></td>

                                                                    <?php /* if($rowF2>0){ if($rowF3>0 || $rowF4>0){echo ', ';}else{echo ' & ';} $k=1; echo 'Son - '; while($resF2=mysql_fetch_assoc($sqlF2)){ echo $resF2['FamilyName']; if($k<$rowF2 && $rowF3==0 && $rowF4==0){echo ' & ';}elseif($rowF3>0){echo ', ';} $k++;} } ?><?php if($rowF3>0){ if($rowF4>0){echo ', ';}else{echo ' ';} $l=1; echo 'Daughter - '; while($resF3=mysql_fetch_assoc($sqlF3)){ echo $resF3['FamilyName']; if($l<$rowF3 && $rowF4==0){echo ' & ';}elseif($rowF4>0){echo ', ';} $l++;} } ?><?php if($rowF4>0){ if($rowF4>1){echo ', ';}else{echo ' & ';} $m=1; echo 'Child - '; while($resF4=mysql_fetch_assoc($sqlF4)){ echo $resF4['FamilyName']; if($m<$rowF4){echo ' & ';} $m++;} } */ ?>
                                                                </tr>
                                                        <?php }
                                                        } ?>
                                                        <tr>
                                                            <td colspan="3" style="height:15px;border:hidden;"></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        <?php
                                        } // End while for employees
                                        ?>
                                    </table>
                                </center>
                            </td>
                        </tr>
                    <?php
                    } // End if Warm Welcome
                    ?>

            </td>
        </tr>
    </table>
    </td>
    </tr>
    </table>

    <?php
    // Close database connection
    mysqli_close($con);
    ?>

</body>

</html>