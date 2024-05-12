<?php
if ($_POST['For'] == 'RecuitToEss' && $_POST['sn'] != '' && $_POST['ecode'] != '' && $_POST['comid'] != '' && $_POST['ncode'] != '' && $_POST['uid'] != '') {
    $ec = $_POST['ecode'];
    $com = $_POST['comid'];
    $con2 = mysql_connect('localhost', 'vnrseed2_recruit_user', 'recruit@192');
    $db2 = mysql_select_db('vnrseed2_recruit_to_ess', $con2);
    $sql = mysql_query("select * from employee_general where DataMove='N' and EmpCode=" . $_POST['ecode'] . " and CompanyId=" . $_POST['comid'] . " ", $con2);
    $row = mysql_num_rows($sql);

    if ($row > 0) {
        $res = mysql_fetch_assoc($sql);
        $spf = mysql_query("select * from employee_pf where EmpCode=" . $ec . " AND CompanyId=" . $com, $con2);
        $sad = mysql_query("select * from employee_address where EmpCode=" . $ec . " AND CompanyId=" . $com, $con2);
        $sctc = mysql_query("select * from employee_ctc where EmpCode=" . $ec . " AND CompanyId=" . $com, $con2);
        $selg = mysql_query("select * from employee_elg where EmpCode=" . $ec . " AND CompanyId=" . $com, $con2);
        $rpf = mysql_fetch_assoc($spf);
        $rad = mysql_fetch_assoc($sad);
        $rctc = mysql_fetch_assoc($sctc);
        $relg = mysql_fetch_assoc($selg);
        $sRf = mysql_query("select * from employee_preref where EmpCode=" . $ec . " AND CompanyId=" . $com, $con2);
        $sRf2 = mysql_query("select * from employee_vnrref where EmpCode=" . $ec . " AND CompanyId=" . $com, $con2);
        $sL = mysql_query("select * from employee_language where EmpCode=" . $ec . " AND CompanyId=" . $com, $con2);
        $sEd = mysql_query("select * from employee_education where EmpCode=" . $ec . " AND CompanyId=" . $com, $con2);
        $sEx = mysql_query("select * from employee_workexp where EmpCode=" . $ec . " AND CompanyId=" . $com, $con2);
        $sFm = mysql_query("select * from employee_family where Relation!='Father' AND Relation!='Mother' AND Relation!='Spouse' AND EmpCode=" . $ec . " AND CompanyId=" . $com, $con2);
        $rRf = mysql_fetch_assoc($sRf);
        $rRf2 = mysql_fetch_assoc($sRf2);
        $rowL = mysql_num_rows($sL);
        $rowEd = mysql_num_rows($sEd);
        $rowEx = mysql_num_rows($sEx);
        $rowFm = mysql_num_rows($sFm);

        $sFmF = mysql_query("select * from employee_family where Relation='Father' AND EmpCode=" . $ec . " AND CompanyId=" . $com, $con2);
        $sFmM = mysql_query("select * from employee_family where Relation='Mother' AND EmpCode=" . $ec . " AND CompanyId=" . $com, $con2);
        $sFmS = mysql_query("select * from employee_family where Relation='Spouse' AND EmpCode=" . $ec . " AND CompanyId=" . $com, $con2);
        $rFmF = mysql_fetch_assoc($sFmF);
        $rFmM = mysql_fetch_assoc($sFmM);
        $rFmS = mysql_fetch_assoc($sFmS);

        $con = mysql_connect('localhost', 'vnrseed2_hr', 'vnrhrims321');
        $db = mysql_select_db('vnrseed2_hrims', $con);
        $sR = mysql_query("select Fname,Sname,Lname,DesigId,MobileNo_Vnr,EmailId_Vnr from hrm_employee e inner join hrm_employee_general g on e.EmployeeId=g.EmployeeID where e.EmployeeID=" . $res['A_ReportingManager'], $con);
        $rR = mysql_fetch_assoc($sR);
        $Rname = $rR['Fname'] . ' ' . $rR['Sname'] . ' ' . $rR['Lname'];

        $sEmpIDChk = mysql_query("SELECT EmployeeID FROM hrm_employee where EmpCode=" . $_POST['ncode'] . " AND EmpStatus!='De' AND CompanyId=" . $_POST['comid'], $con);
        $rowEmpIDchk = mysql_num_rows($sEmpIDChk);
        if ($rowEmpIDchk == 0) {

            $InsE = mysql_query("insert into hrm_employee(EmpCode, CandidateId, EmpType, EmpStatus, Fname, Sname, Lname, CompanyId, CreatedBy, CreatedDate, YearId)values(" . $_POST['ncode'] . ", " . $res['CandidateId'] . ", '" . $res['EmpType'] . "', '" . $res['EmpStatus'] . "', '" . $res['FName'] . "', '" . $res['MName'] . "', '" . $res['LName'] . "',  " . $_POST['comid'] . ", " . $_POST['uid'] . ", '" . date("Y-m-d") . "', " . $_POST['uid'] . ")", $con);
            if ($InsE) {
                $sEmpID = mysql_query("SELECT EmployeeID FROM hrm_employee where EmpCode=" . $_POST['ncode'] . " AND EmpStatus!='De' AND CompanyId=" . $_POST['comid'], $con);
                $rEmpID = mysql_fetch_assoc($sEmpID);
                if ($res['T_StateHq'] > 0) {
                    $state = $res['T_StateHq'];
                } else {
                    $state = $res['F_StateHq'];
                }
                if ($res['T_LocationHq'] > 0) {
                    $hq = $res['T_LocationHq'];
                } else {
                    $hq = $res['F_LocationHq'];
                }
                if ($rpf['esic_no'] != '') {
                    $esicallow = 'Y';
                } else {
                    $esicallow = 'N';
                }
                if ($res['DrivingLicense'] != '') {
                    $dl = 'Y';
                } else {
                    $dl = 'N';
                }
                if ($res['MaritalStatus'] == 'Married') {
                    $MrS = 'Y';
                } else {
                    $MrS = 'N';
                }
                if ($res['NameTitle'] == 'Dr.') {
                    $DR = 'Y';
                } else {
                    $DR = 'N';
                }
                if ($res['ServiceBond'] == 'Yes') {
                    $Sbod = 'Y';
                } else {
                    $Sbod = 'N';
                }

                $CurrAdd = $rad['pre_address'] . " - " . $rad['pre_city'] . " - " . $rad['pre_dist'] . " (" . $rad['pre_state'] . ")";
                $ParAdd = $rad['perm_address'] . " - " . $rad['perm_city'] . " - " . $rad['perm_dist'] . " (" . $rad['perm_state'] . ")";

                $InsG = mysql_query("insert into hrm_employee_general(EmployeeID, EC, FileNo, DateJoining, DOB, DOB_dm, GradeId, CostCenter, HqId, DepartmentId, DesigId, PositionCode,PosSeq,PosVR, MobileNo_Vnr, MobileNo2_Vnr, Apply_Bond, Bond_Year, BankName,BranchName,AccountNo,BankIfscCode,PfAccountNo, PF_UAN, EsicAllow, EsicNo, RepEmployeeID, ReportingName, ReportingDesigId, ReportingContactNo, ReportingEmailId, CreatedBy, CreatedDate, SysDate) values('" . $rEmpID['EmployeeID'] . "', " . $_POST['ncode'] . ", '" . $_POST['ncode'] . "', '" . $res['JoinOnDt'] . "', '" . $res['DOB'] . "', '" . date("0000-m-d", strtotime($res['DOB'])) . "', '" . $res['Grade'] . "', '" . $state . "', '" . $hq . "', '" . $res['DepartmentId'] . "', '" . $res['DesigId'] . "', '" . $res['PositionCode'] . "','" . $res['PosSeq'] . "', '" . $res['PosVR'] . "', '" . $res['Contact1'] . "', '" . $res['Contact2'] . "','" . $Sbod . "', '" . $res['ServiceBondYears'] . "','" . $rpf['bank_name'] . "','" . $rpf['branch_name'] . "','" . $rpf['acc_number'] . "','" . $rpf['ifsc_code'] . "', '" . $rpf['pf_acc_no'] . "', '" . $rpf['UAN'] . "', '" . $esicallow . "', '" . $rpf['esic_no'] . "', '" . $res['A_ReportingManager'] . "', '" . $Rname . "', '" . $rR['DesigId'] . "', '" . $rR['MobileNo_Vnr'] . "', '" . $rR['EmailId_Vnr'] . "',  " . $_POST['uid'] . ", '" . date("Y-m-d") . "', '" . date("Y-m-d") . "')", $con);

                if ($res['A_ReportingManager'] != 0 && $res['A_ReportingManager'] != '') {
                    $SqlUpRe = mysql_query("UPDATE hrm_employee_reporting SET AppraiserId=" . $res['A_ReportingManager'] . " WHERE EmployeeID=" . $rEmpID['EmployeeID'], $con);
                }


                $InsP = mysql_query("insert into hrm_employee_personal(EmployeeID, EC, Gender, Religion, AadharNo,PanNo,PassportNo, DR, MobileNo, EmailId_Self, Categoryy, DrivingLicNo, DrivingLicNo_YN, Driv_ExpiryDateFrom, Driv_ExpiryDateTo, Married, MarriageDate, MarriageDate_dm, CreatedBy, CreatedDate)values('" . $rEmpID['EmployeeID'] . "', " . $_POST['ncode'] . ", '" . $res['Gender'] . "', '" . $res['Religion'] . "', '" . $res['Aadhar'] . "','".$rpf['pan']."','".$rpf['passport']."', '" . $DR . "', '" . $res['Contact1'] . "', '" . $res['Email1'] . "', '" . $res['Caste'] . "', '" . $res['DrivingLicense'] . "', '" . $dl . "', '" . date("Y-m-d") . "', '" . $res['LValidity'] . "', '" . $MrS . "', '" . $res['marriage_dt'] . "', '" . date("0000-m-d", strtotime($res['marriage_dt'])) . "', " . $_POST['uid'] . ", '" . date("Y-m-d") . "')", $con);

                $InsC = mysql_query("insert into hrm_employee_contact(EmployeeID, EC, Curradd, CurrAdd_PinNo, ParAdd, ParAdd_PinNo, EmgContactNo, EmgRelation, EmgName, Emg_Contact1, Emg_Person1, Emp_Relation1, Emg_Contact2, Emg_Person2, Emp_Relation2, Personal_RefName, Personal_RefContactNo, Personal_RefDesig, Personal_RefEmailId, Personal_RefRelation, Personal_RefCompany, Personal_RefAdd, Prof_RefName, Prof_RefContactNo, Prof_RefDesig, Prof_RefEmailId, Prof_RefCompany, CreatedBy, CreatedDate, YearId) values('" . $rEmpID['EmployeeID'] . "', " . $_POST['ncode'] . ", '" . addslashes($CurrAdd) . "', '" . $rad['pre_pin'] . "', '" . addslashes($ParAdd) . "', '" . $rad['perm_pin'] . "', '" . $res['EmgContPhone_One'] . "', '" . $res['EmgContRelation_One'] . "', '" . $res['EmgContName_One'] . "', '" . $res['EmgContPhone_One'] . "', '" . $res['EmgContName_One'] . "', '" . $res['EmgContRelation_One'] . "', '" . $res['EmgContPhone_Two'] . "', '" . $res['EmgContName_Two'] . "', '" . $res['EmgContRelation_Two'] . "', '" . $rRf2['name'] . "', '" . $rRf2['contact'] . "', '" . $rRf2['designation'] . "', '" . $rRf2['email'] . "', '" . $rRf2['rel_with_person'] . "', '" . $rRf2['company'] . "', '', '" . $rRf['name'] . "', '" . $rRf['contact'] . "','" . $rRf['designation'] . "','" . $rRf['email'] . "','" . $rRf['company'] . "', '" . $_POST['uid'] . "', '" . date("Y-m-d") . "', '" . $_POST['yid'] . "')", $con);

                $IncCtc = mysql_query("insert into hrm_employee_ctc(EmployeeID, EC, CHILD_EDU_ALL_Value, LTA_Value, BAS_Value, HRA_Value, Bonus_Month, SPECIAL_ALL_Value, NetMonthSalary_Value, GrossSalary_PostAnualComponent_Value, GRATUITY_Value, Tot_GrossMonth, Tot_Gross_Annual, PF_Employee_Contri_Value, PF_Employee_Contri_Annul, PF_Employer_Contri_Value, PF_Employer_Contri_Annul, Mediclaim_Policy, Tot_CTC, ESCI, AnnualESCI, Status, CtcCreatedBy, CtcCreatedDate, CtcYearId, SalChangeDate, SystDate)values(" . $rEmpID['EmployeeID'] . ", " . $ec . ", '" . $rctc['childedu'] . "', '" . $rctc['lta'] . "', '" . $rctc['basic'] . "', '" . $rctc['hra'] . "', '" . $rctc['bonus'] . "', '" . $rctc['special_alw'] . "', '" . $rctc['netMonth'] . "', '" . $rctc['grsM_salary'] . "', '" . $rctc['gratuity'] . "', '" . $rctc['grsM_salary'] . "', '" . $rctc['anualgrs'] . "', '" . $rctc['emplyPF'] . "', '" . $rctc['emplyerPF'] . "', '" . $rctc['emplyPF'] . "', '" . $rctc['emplyerPF'] . "', '" . $rctc['medical'] . "', '" . $rctc['total_ctc'] . "', '" . $rctc['emplyESIC'] . "', '" . $rctc['emplyerESIC'] . "', 'A', '" . $_POST['uid'] . "', '" . date("Y-m-d", strtotime($res['JoinOnDt'])) . "', '" . $_POST['yid'] . "', '" . date("Y-m-d", strtotime($res['JoinOnDt'])) . "', '" . date("Y-m-d") . "')", $con);


                if ($relg['MExpense'] > 0) {
                    $MExpYN = 'Y';
                } else {
                    $MExpYN = 'N';
                }
                if ($relg['Mobile'] > 0) {
                    $MobYN = 'Y';
                } else {
                    $MobYN = 'N';
                }
                $InsElg = mysql_query("insert into hrm_employee_eligibility(EmployeeID, EC, Lodging_CategoryA, Lodging_CategoryB, Lodging_CategoryC, DA_Outside_Hq, DA_Inside_Hq, Travel_TwoWeeKM, Travel_FourWeeKM, Mode_Travel_Outside_Hq, TravelClass_Outside_Hq, Mobile_Exp_Rem, Mobile_Exp_Rem_Rs, Prd, Mobile_Company_Hand, Mobile_Hand_Elig, GPSSet, Mobile_Hand_Elig_Rs, Health_Insurance, Status, EligCreatedBy, EligCreatedDate, EligYearId, SysDate) values(" . $rEmpID['EmployeeID'] . ", " . $ec . ", '" . $relg['LoadCityA'] . "', '" . $relg['LoadCityB'] . "', '" . $relg['LoadCityC'] . "', '" . $relg['DAOut'] . "', '" . $relg['DAHq'] . "', '" . $relg['TwoWheel'] . "', '" . $relg['FourWheel'] . "', '" . $relg['TravelMode'] . "', '" . $relg['TravelClass'] . "', '" . $MExpYN . "', '" . $relg['MExpense'] . "', '" . $relg['MTerm'] . "', 'N', '" . $MobYN . "', '" . $relg['GPRS'] . "', '" . $relg['Mobile'] . "', '" . $relg['HealthIns'] . "', 'A', " . $_POST['uid'] . ", '" . date("Y-m-d") . "', " . $_POST['yid'] . ", '" . date("Y-m-d") . "')", $con);


                if ($res['Gender'] == 'M') {
                    $HW = 'Ms';
                } elseif ($res['Gender'] == 'F') {
                    $HW = 'Mr';
                }
                $InsFM = mysql_query("insert into hrm_employee_family(EmployeeID,EC, Fa_SN, FatherName, FatherDOB, FatherOccupation, FatherQuali, Mo_SN, MotherName, MotherDOB, MotherOccupation, MotherQuali, HW_SN, HusWifeName, HusWifeDOB, HusWifeOccupation, HusWifeQuali, CreatedBy, CreatedDate, YearId)values(" . $rEmpID['EmployeeID'] . ", " . $_POST['ecode'] . ", 'Mr', '" . $rFmF['Name'] . "', '" . date("Y-m-d", strtotime($rFmF['Dob'])) . "', '" . $rFmF['Occupation'] . "', '" . $rFmF['Qualification'] . "', 'Ms', '" . $rFmM['Name'] . "', '" . date("Y-m-d", strtotime($rFmM['Dob'])) . "', '" . $rFmM['Occupation'] . "', '" . $rFmM['Qualification'] . "', '" . $HW . "', '" . $rFmS['Name'] . "', '" . date("Y-m-d", strtotime($rFmS['Dob'])) . "', '" . $rFmS['Occupation'] . "', '" . $rFmS['Qualification'] . "', " . $_POST['uid'] . ", '" . date("Y-m-d") . "', " . $_POST['yid'] . ")", $con);

                /****************** Language ********************/
                /****************** Language ********************/
                if ($rowL > 0) {

                    $schk = mysql_query("select * from hrm_employee_langproficiency where EmployeeID=" . $rEmpID['EmployeeID'], $con);
                    $rowchk = mysql_num_rows($schk);
                    if ($rowchk == 0) {
                        while ($rL = mysql_fetch_assoc($sL)) {
                            if ($rL['language'] == 'English') {
                                $LngChk = 'E';
                            } elseif ($rL['language'] == 'Hindi') {
                                $LngChk = 'H';
                            } else {
                                $LngChk = 'L';
                            }
                            if ($rL['read'] == 1) {
                                $Red = 'Y';
                            } else {
                                $Red = 'N';
                            }
                            if ($rL['write'] == 1) {
                                $Wed = 'Y';
                            } else {
                                $Wed = 'N';
                            }
                            if ($rL['speak'] == 1) {
                                $Sed = 'Y';
                            } else {
                                $Sed = 'N';
                            }
                            $InsL = mysql_query("INSERT INTO hrm_employee_langproficiency(EmployeeID, Language, LangCheck, Write_lang, Read_lang, Speak_lang, LangProCreatedBy, LangProCreatedDate, LangProYearId) VALUES (" . $rEmpID['EmployeeID'] . ", '" . $rL['language'] . "', '" . $LngChk . "', '" . $Wed . "', '" . $Red . "', '" . $Sed . "', " . $_POST['uid'] . ",'" . date('Y-m-d') . "'," . $_POST['yid'] . ")", $con);
                        }
                    } //if($rowchk==0)
                }
                /*else{ $InsL = mysql_query("INSERT INTO hrm_employee_langproficiency(EmployeeID, LangProCreatedBy, LangProCreatedDate, LangProYearId) VALUES (".$rEmpID['EmployeeID'].", ".$_POST['uid'].", '".date('Y-m-d')."', ".$_POST['yid'].")", $con); }*/

                /****************** Education ********************/
                /****************** Education ********************/
                if ($rowEd > 0) {
                    $schk2 = mysql_query("select * from hrm_employee_qualification where EmployeeID=" . $rEmpID['EmployeeID'], $con);
                    $rowchk2 = mysql_num_rows($schk2);
                    if ($rowchk2 == 0) {
                        while ($rEd = mysql_fetch_assoc($sEd)) {
                            $InsEd = mysql_query("INSERT INTO hrm_employee_qualification(EmployeeID, Qualification, Specialization, Institute, Subject, PassOut, Grade_Per, QuaCreatedBy, QuaCreatedDate, QuaYearId) VALUES (" . $rEmpID['EmployeeID'] . ", '" . $rEd['Qualification'] . "', '" . $rEd['Specialization'] . "', '" . $rEd['Institute'] . "', '" . $rEd['Course'] . "', '" . $rEd['YearOfPassing'] . "', '" . $rEd['CGPA'] . "', " . $_POST['uid'] . ",'" . date('Y-m-d') . "'," . $_POST['yid'] . ")", $con);
                        }
                    } //if($rowchk2==0)
                }
                /*else{ $InsEd = mysql_query("INSERT INTO hrm_employee_qualification(EmployeeID, QuaCreatedBy, QuaCreatedDate, QuaYearId) VALUES (".$rEmpID['EmployeeID'].", ".$_POST['uid'].", '".date('Y-m-d')."', ".$_POST['yid'].")", $con); }*/

                /*Check Qualification 10th, 12th, Graduation, Post_Graduation*/
                $sQ1 = mysql_query("select * from hrm_employee_qualification where Qualification='10th' AND EmployeeID=" . $rEmpID['EmployeeID'], $con);
                $rQ1 = mysql_num_rows($sQ1);
                if ($rQ1 == 0) {
                    $sQI1 = mysql_query("INSERT INTO hrm_employee_qualification(EmployeeID, MaxQuali, Qualification, QuaCreatedBy, QuaCreatedDate, QuaYearId) VALUES (" . $rEmpID['EmployeeID'] . ", 'N', '10th', " . $_POST['uid'] . ",'" . date('Y-m-d') . "'," . $_POST['yid'] . ")", $con);
                }

                $sQ2 = mysql_query("select * from hrm_employee_qualification where Qualification='12th' AND EmployeeID=" . $rEmpID['EmployeeID'], $con);
                $rQ2 = mysql_num_rows($sQ2);
                if ($rQ2 == 0) {
                    $sQI2 = mysql_query("INSERT INTO hrm_employee_qualification(EmployeeID, MaxQuali, Qualification, QuaCreatedBy, QuaCreatedDate, QuaYearId) VALUES (" . $rEmpID['EmployeeID'] . ", 'N', '12th', " . $_POST['uid'] . ",'" . date('Y-m-d') . "'," . $_POST['yid'] . ")", $con);
                }

                $sQ3 = mysql_query("select * from hrm_employee_qualification where Qualification='Graduation' AND EmployeeID=" . $rEmpID['EmployeeID'], $con);
                $rQ3 = mysql_num_rows($sQ3);
                if ($rQ3 == 0) {
                    $sQI3 = mysql_query("INSERT INTO hrm_employee_qualification(EmployeeID, MaxQuali, Qualification, QuaCreatedBy, QuaCreatedDate, QuaYearId) VALUES (" . $rEmpID['EmployeeID'] . ", 'N', 'Graduation', " . $_POST['uid'] . ",'" . date('Y-m-d') . "'," . $_POST['yid'] . ")", $con);
                }

                $sQ4 = mysql_query("select * from hrm_employee_qualification where Qualification='Post_Graduation' AND EmployeeID=" . $rEmpID['EmployeeID'], $con);
                $rQ4 = mysql_num_rows($sQ4);
                if ($rQ4 == 0) {
                    $sQI4 = mysql_query("INSERT INTO hrm_employee_qualification(EmployeeID, MaxQuali, Qualification, QuaCreatedBy, QuaCreatedDate, QuaYearId) VALUES (" . $rEmpID['EmployeeID'] . ", 'N', 'Post_Graduation', " . $_POST['uid'] . ",'" . date('Y-m-d') . "'," . $_POST['yid'] . ")", $con);
                }
                /*Check Qualification 10th, 12th, Graduation, Post_Graduation*/




                /****************** Experiance ********************/
                /****************** Experiance ********************/
                if ($rowEx > 0) {

                    $schk3 = mysql_query("select * from hrm_employee_experience where EmployeeID=" . $rEmpID['EmployeeID'], $con);
                    $rowchk3 = mysql_num_rows($schk3);
                    if ($rowchk3 == 0) {

                        while ($rEx = mysql_fetch_assoc($sEx)) {
                            /*------------------------------------------------------------------*/
                            /*------------------------------------------------------------------*/
                            $dos = date("d-m-Y", strtotime($rEx['job_start']));
                            $today = date("d-m-Y", strtotime($rEx['job_end']));
                            $localtime = getdate();
                            $dob_a = explode("-", $dos);
                            $today_a = explode("-", $today);
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
                            $firstMonths = array(1, 3, 5, 7, 8, 10, 12);
                            $secondMonths = array(4, 6, 9, 11);
                            $thirdMonths = array(2);
                            if ($today_m - $dob_m == 1) {
                                if (in_array($dob_m, $firstMonths)) {
                                    array_push($firstMonths, 0);
                                } elseif (in_array($dob_m, $secondMonths)) {
                                    array_push($secondMonths, 0);
                                } elseif (in_array($dob_m, $thirdMonths)) {
                                    array_push($thirdMonths, 0);
                                }
                            }

                            $len = strlen($months);
                            if ($len == 1) {
                                $mnt = '0' . $months;
                            } else {
                                $mnt = $months;
                            }
                            $ExpMain = $years . '.' . $mnt;
                            /*------------------------------------------------------------------*/
                            /*------------------------------------------------------------------*/

                            $InsEx = mysql_query("INSERT INTO hrm_employee_experience(EmployeeID, EC, ExpComName, ExpDesignation, ExpFromDate, ExpToDate, ExpTotalYear, ExpGrossSalary, ExpCreatedBy, ExpCreatedDate, ExpYearId) VALUES (" . $rEmpID['EmployeeID'] . ", " . $_POST['ecode'] . ", '" . $rEx['company'] . "', '" . $rEx['desgination'] . "', '" . $rEx['job_start'] . "', '" . $rEx['job_end'] . "', '" . $ExpMain . "', '" . $rEx['gross_mon_sal'] . "', " . $_POST['uid'] . ", '" . date('Y-m-d') . "', " . $_POST['yid'] . ")", $con);
                        }
                    } //if($rowchk3==0)
                } else {
                    $InsEx = mysql_query("INSERT INTO hrm_employee_experience(EmployeeID, EC, ExpCreatedBy, ExpCreatedDate, ExpYearId) VALUES (" . $rEmpID['EmployeeID'] . ", " . $_POST['ecode'] . ", " . $_POST['uid'] . ", '" . date('Y-m-d') . "', " . $_POST['yid'] . ")", $con);
                }

                /****************** Family ********************/
                /****************** Family ********************/
                if ($rowFm > 0) {
                    $schk4 = mysql_query("select * from hrm_employee_family2 where EmployeeID=" . $rEmpID['EmployeeID'], $con);
                    $rowchk4 = mysql_num_rows($schk4);
                    if ($rowchk4 == 0) {
                        while ($rFm = mysql_fetch_assoc($sFm)) {
                            $InsFm = mysql_query("INSERT INTO hrm_employee_family2(EmployeeID, FamilyRelation, FamilyName, FamilyDOB, FamilyQualification, FamilyOccupation, CreatedBy, CreatedDate, YearId) VALUES (" . $rEmpID['EmployeeID'] . ", '" . $rFm['Relation'] . "', '" . $rFm['Name'] . "', '" . date("Y-m-d", strtotime($rFm['Dob'])) . "', '" . $rFm['Qualification'] . "', '" . $rFm['Occupation'] . "', " . $_POST['uid'] . ", '" . date('Y-m-d') . "', " . $_POST['yid'] . ")", $con);
                        }
                    }
                }
                //else{ $InsFm = mysql_query("INSERT INTO hrm_employee_family2(EmployeeID, CreatedBy, CreatedDate, YearId) VALUES (".$rEmpID['EmployeeID'].", ".$_POST['uid'].", '".date('Y-m-d')."', ".$_POST['yid'].")", $con); }

                $ei = $rEmpID['EmployeeID'];
                $ec = $_POST['ecode'];
                $sqlSY = mysql_query("select CurrY from hrm_pms_setting where CompanyId=" . $com . " AND Process='KRA'", $con);
                $resSY = mysql_fetch_array($sqlSY);
                /*-----------------------------------------------------------------------------------*/
                /*-----------------------------------------------------------------------------------*/
                $I1 = mysql_query("insert into hrm_employee_photo(EmployeeID,EC)values(" . $ei . "," . $ec . ")", $con);
                //$I2 = mysql_query("insert into hrm_employee_eligibility(EmployeeID,EC)values(".$ei.",".$ec.")", $con);  
                $I4 = mysql_query("insert into hrm_employee_reporting(EmployeeID)values(" . $ei . ")", $con);
                $I5 = mysql_query("insert into hrm_employee_checklist(EmployeeID,EC)values(" . $ei . "," . $ec . ")", $con);
                $I6 = mysql_query("insert into hrm_employee_reporting_pmskra(EmployeeID)values(" . $ei . ")", $con);
                $I7 = mysql_query("insert into hrm_employee_pms(AssessmentYear,CompanyId,EmployeeID,HR_Curr_DepartmentId,YearId) values(" . $resSY['CurrY'] . ", " . $com . ", " . $ei . ", " . $res['DepartmentId'] . ", " . $resSY['CurrY'] . ")", $con);
                $I8 = mysql_query("insert into hrm_employee_monthlyleave_balance(EmployeeID,EC,Month,Year)values(" . $ei . "," . $ec . ",'" . date("m", strtotime($res['JoinOnDt'])) . "','" . date("Y", strtotime($res['JoinOnDt'])) . "')", $con);
                /*-----------------------------------------------------------------------------------*/
                /*-----------------------------------------------------------------------------------*/

                if ($InsG && $InsP) {
                    $con2 = mysql_connect('localhost', 'vnrseed2_recruit_user', 'recruit@192');
                    $db2 = mysql_select_db('vnrseed2_recruit_to_ess', $con2);
                    $Up = mysql_query("update employee_general set DataMove='Y' where EmpCode=" . $_POST['ecode'] . " and CompanyId=" . $_POST['comid'] . "", $con2);
                    if ($Up) {
                        echo '<input type="hidden" id="ChkV" value="1"  /><input type="hidden" id="ChkV_ErrCode" value="0" />';
                    } else {
                        echo '<input type="hidden" id="ChkV" value="0"  /><input type="hidden" id="ChkV_ErrCode" value="0" />';
                    }
                }
            } //if($InsE)

        } //if($rowEmpIDchk==0)
        else {
            echo '<input type="hidden" id="ChkV" value="0" />';
            echo '<input type="hidden" id="ChkV_ErrCode" value="1" />';
        }
    } //if($row>0)


    echo '<input type="hidden"  id="sn_i" value=' . $_POST['sn'] . ' />';
    echo '<input type="hidden"  id="ecode_i" value=' . $_POST['ecode'] . ' />';
    echo '<input type="hidden"  id="comid_i" value=' . $_POST['comid'] . ' />';
}
