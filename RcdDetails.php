<?php
require_once "AdminUser/config/config.php";

if ($_REQUEST["action"] == "Details") {
    //Employee Employee
    if ($_REQUEST["val"] == "Employee") {
        $sqle = mysql_query(
            "select e.EmployeeID, EmpCode, EmpStatus, Fname, Sname, Lname, CompanyId, GradeId, DepartmentId, DesigId, PositionCode, PosSeq, PosVR, g.RepEmployeeID, DateJoining, DateOfSepration, 
            MobileNo_Vnr as Contact, EmailId_Vnr as Email, Gender, Married,DR,HqId,Tot_CTC,
                CASE
                WHEN DR ='Y' THEN 'Dr.'
                WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
                WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
                ELSE 'Mr.'
                END as Title

                from hrm_employee e left join hrm_employee_general g on e.EmployeeID=g.EmployeeID left join hrm_employee_personal p on e.EmployeeID=p.EmployeeID
                left join hrm_employee_ctc c on c.EmployeeID = e.EmployeeID
                where (EmpStatus='A' OR EmpStatus='D') AND c.Status='A'  AND g.DepartmentId !=0 order by CompanyId ASC, e.EmployeeID ASC",
            $con
        );
        while ($rese = mysql_fetch_assoc($sqle)) {
            $Emplist[] = $rese;
        }
        echo json_encode(["employee_list" => $Emplist]);
    }

    //Employee Reporting
    if ($_REQUEST["val"] == "Reporting") {
        $sqle = mysql_query(
            "select * from hrm_employee_reporting r inner join hrm_employee e on r.EmployeeID=e.EmployeeID where (EmpStatus='A' OR EmpStatus='D')",
            $con
        );
        while ($rese = mysql_fetch_assoc($sqle)) {
            $Emplist[] = $rese;
        }
        echo json_encode(["reporting_list" => $Emplist]);
    }

    //Company Company
    if ($_REQUEST["val"] == "Company") {
        $sqlc = mysql_query(
            "select CompanyId, CompanyName, AdminOffice_Address as address, AdminOffice as Location, PhoneNo1 as Phone, Status from hrm_company_basic where Status='A' order by CompanyId ASC",
            $con
        );
        while ($resc = mysql_fetch_assoc($sqlc)) {
            $Comlist[] = $resc;
        }
        echo json_encode(["company_list" => $Comlist]);
    }

    //Department Department
    if ($_REQUEST["val"] == "Department") {
        $sqld = mysql_query(
            "select DepartmentId, DepartmentName, DepartmentCode,ShortCode, CompanyId, DeptStatus,FunName from hrm_department where (DeptStatus='A' OR DeptStatus='D') order by CompanyId ASC,DepartmentId ASC",
            $con
        );
        while ($resd = mysql_fetch_assoc($sqld)) {
            $Deptlist[] = $resd;
        }
        echo json_encode(["department_list" => $Deptlist]);
    }

    //Grade Grade
    if ($_REQUEST["val"] == "Grade") {
        $sqlg = mysql_query(
            "select GradeId, GradeValue, CompanyId, GradeStatus from hrm_grade where (GradeStatus='A' OR GradeStatus='D') order by CompanyId ASC,GradeId ASC",
            $con
        );
        while ($resg = mysql_fetch_assoc($sqlg)) {
            $Gradelist[] = $resg;
        }
        echo json_encode(["grade_list" => $Gradelist]);
    }

    //Designation Designation
    if ($_REQUEST["val"] == "Designation") {
        $sqlde = mysql_query(
            "select DesigId, DesigName, DesigCode, Desig_ShortCode, CompanyId, DesigStatus from hrm_designation where DesigStatus='A' order by CompanyId ASC,DesigId ASC",
            $con
        );
        while ($resde = mysql_fetch_assoc($sqlde)) {
            $Desiglist[] = $resde;
        }
        echo json_encode(["Designation_list" => $Desiglist]);
    }

    //Country Country
    if ($_REQUEST["val"] == "Country") {
        $sqlcn = mysql_query(
            "select CountryId, CountryName as Country, CountryStatus as Status from hrm_country where CountryStatus='A' order by CountryId ASC,CountryName ASC",
            $con
        );
        while ($rescn = mysql_fetch_assoc($sqlcn)) {
            $Countrylist[] = $rescn;
        }
        echo json_encode(["Country_list" => $Countrylist]);
    }

    //State State
    if ($_REQUEST["val"] == "State") {
        $sqls = mysql_query(
            "select StateId, StateName as State, StateCode, CountryId, StateStatus as Status from hrm_state where StateStatus='A' order by StateId ASC,StateName ASC",
            $con
        );
        while ($ress = mysql_fetch_assoc($sqls)) {
            $Statelist[] = $ress;
        }
        echo json_encode(["State_list" => $Statelist]);
    }

    //Headquarter Headquarter
    if ($_REQUEST["val"] == "Headquarter") {
        $sqlhq = mysql_query(
            "select HqId, HqName, StateId,CompanyId from hrm_headquater where HQStatus='A' order by HqId ASC,HqName ASC",
            $con
        );
        while ($reshq = mysql_fetch_assoc($sqlhq)) {
            $Hqlist[] = $reshq;
        }
        echo json_encode(["Headquarter_list" => $Hqlist]);
    }

    //Department - Designation
    if ($_REQUEST["val"] == "DeptDesig") {
        $sqldd = mysql_query(
            "select DepartmentId, DesigId, CompanyId from hrm_deptgradedesig where DepartmentId!=0 AND DGDStatus='A' order by DepartmentId ASC,DesigId ASC",
            $con
        );
        while ($resdd = mysql_fetch_assoc($sqldd)) {
            $DDlist[] = $resdd;
        }
        echo json_encode(["Department_Designation_list" => $DDlist]);
    }

    //Position Code
    if ($_REQUEST["val"] == "getPositionCode") {
        $sqlpos = mysql_query(
            "select e.EmployeeID, EmpCode, CompanyId, DepartmentId,DesigId,GradeId,PosVR, PosSeq, PositionCode 
            from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on e.EmployeeID=p.EmployeeID
            inner join hrm_employee_ctc c on c.EmployeeID = e.EmployeeID
             where (EmpStatus='A' OR EmpStatus='D') AND c.Status='A' AND g.DepartmentId !=0 AND g.GradeId !=0 order by CompanyId ASC, EmpCode ASC",
            $con
        );

        while ($respos = mysql_fetch_assoc($sqlpos)) {
            $PosList[] = $respos;
        }
        echo json_encode(["PositionCode_List" => $PosList]);
    }

    //Demo Employee Employee
    if ($_REQUEST["val"] == "DemoEmployee") {
        $sqle = mysql_query(
            "select * from hrm_employee_demo order by CompanyId ASC, EmpCode ASC",
            $con
        );
        while ($rese = mysql_fetch_assoc($sqle)) {
            $DemoEmplist[] = $rese;
        }
        echo json_encode(["demo_employee_list" => $DemoEmplist]);
    }

    //Department Vertical
    if ($_REQUEST["val"] == "Vertical") {
        $sqlv = mysql_query(
            "select VerticalId, VerticalName, ComId, DeptId from hrm_department_vertical",
            $con
        );
        while ($resv = mysql_fetch_assoc($sqlv)) {
            $VerticalList[] = $resv;
        }
        echo json_encode(["vertical_list" => $VerticalList]);
    }

    //Master Eligibility
    if ($_REQUEST["val"] == "elg") {
        $sqle = mysql_query("select * from hrm_master_eligibility", $con);
        while ($rese = mysql_fetch_assoc($sqle)) {
            $ElgList[] = $rese;
        }
        
        $sql_policy = mysql_query("select p.CompanyId,pd.DeptId, pd.PolicyId,PolicyName from hrm_master_eligibility_policy_dept pd 
            inner join hrm_master_eligibility_policy p on pd.PolicyId=p.PolicyId WHERE pd.Sts=1");

            while($res_policy = mysql_fetch_assoc($sql_policy)){
                $PolicyList[] = $res_policy;
            }
            
        echo json_encode(["eligibility_list" => $ElgList,"policy_list"=>$PolicyList]);
    }

    //Grade Wise Designation
    if ($_REQUEST["val"] == "grade_desig") {
        $sql = mysql_query(
            "SELECT  `DepartmentId`, `DesigId`, `GradeId`, `GradeId_2`, `GradeId_3`, `GradeId_4`, `GradeId_5`, `CompanyId`, `DGDStatus`,`MW` FROM hrm_deptgradedesig",
            $con
        );
        while ($resDepDesig = mysql_fetch_assoc($sql)) {
            $grade_designation_list[] = $resDepDesig;
        }
        echo json_encode(["grade_designation_list" => $grade_designation_list]);
    }

    //Zone List
    if ($_REQUEST["val"] == 'zone') {
        $sql = mysql_query("SELECT * FROM `hrm_sales_zone`", $con);
        while ($res = mysql_fetch_assoc($sql)) {
            $zone_list[] = $res;
        }
        echo json_encode(["zone_list" => $zone_list]);
    }

    //Region List
    if ($_REQUEST["val"] == 'region') {
        $sql = mysql_query("SELECT * FROM `hrm_sales_region`", $con);
        while ($res = mysql_fetch_assoc($sql)) {
            $region_list[] = $res;
        }
        echo json_encode(["region_list" => $region_list]);
    }

    //Headquarter wise region List
    if ($_REQUEST["val"] == 'hq_region') {
        $sql = mysql_query("SELECT * FROM `hrm_sales_verhq`", $con);
        while ($res = mysql_fetch_assoc($sql)) {
            $region_list[] = $res;
        }
        echo json_encode(["region_list" => $region_list]);
    }

    //Employee List for Budget Automation
    if ($_REQUEST["val"] == "BudgetEmployee") {
        $sqle = mysql_query(
            "select e.EmployeeID, EmpCode, EmpStatus, Fname, Sname, Lname, d.CompanyId, g.GradeId, d.DepartmentId, de.DesigId, g.RepEmployeeID,d.DepartmentName,d.DepartmentCode,de.DesigName,de.DesigCode,c.CompanyName,g.EmpVertical,v.VerticalName,g.EmailId_Vnr,g.MobileNo_Vnr,
                CASE
                WHEN DR ='Y' THEN 'Dr.'
                WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
                WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
                ELSE 'Mr.'
                END as Title
                from hrm_employee e 
                left join hrm_employee_general g on e.EmployeeID=g.EmployeeID 
                left JOIN hrm_department d ON d.DepartmentId = g.DepartmentId
                left JOIN hrm_designation de on de.DesigId = g.DesigId
                left JOIN hrm_company_basic c ON c.CompanyId = e.CompanyId
                left JOIN hrm_department_vertical v on v.VerticalId = g.EmpVertical
                LEFT join hrm_employee_personal p on e.EmployeeID=p.EmployeeID
                where (EmpStatus='A' OR EmpStatus='D') AND d.CompanyId=1",
            $con
        );
        
        
        while ($rese = mysql_fetch_assoc($sqle)) {
            $Emplist[] = $rese;
        }

        $sqlrep = mysql_query("SELECT * FROM hrm_employee_reporting_pmskra", $con);
        while ($resrep = mysql_fetch_assoc($sqlrep)) {
            $RepList[] = $resrep;
        }
        echo json_encode(["employee_list" => $Emplist, "reporting_list" => $RepList]);
    }

    //Minimum Wage for Bonus Caclculation
    if ($_REQUEST["val"] == "minimum_wage") {
        $sql = mysql_query(
            "SELECT  * FROM hrm_bonus_wages",
            $con
        );
        while ($resQuery = mysql_fetch_assoc($sql)) {
            $list[] = $resQuery;
        }
        echo json_encode(["minimum_wage_list" => $list]);
    }

    //PMS Hierarchy for MRF processing
    if($_REQUEST['val']== 'pms_hierarchy'){
        $year_sql = mysql_query("SELECT YearId FROM `hrm_year` WHERE Company1Status='A'",$con);
        $year = mysql_fetch_assoc($year_sql);
        $year =$year['YearId'];
        $sql = mysql_query("SELECT `CompanyId` as `Company`,`DepartmentId` as `Department`,`hrm_employee_pms`.`EmployeeID` as `Employee`,`Appraiser_EmployeeID` as `Reporting`,
        CASE
        WHEN `hrm_employee_pms`.`Rev2_EmployeeID` <> 0 THEN `hrm_employee_pms`.`Rev2_EmployeeID`
        ELSE `hrm_employee_pms`.`Reviewer_EmployeeID`
        END AS HOD,
        `HOD_EmployeeID` as `Management` FROM `hrm_employee_pms` LEFT JOIN hrm_employee_general ON hrm_employee_general.EmployeeID = hrm_employee_pms.EmployeeID WHERE AssessmentYear = $year",$con);
        while($resQuery = mysql_fetch_assoc($sql)){
            $list[] = $resQuery;
        }

        echo json_encode(['pms_hierarchy'=>$list]);
    }
    
        //Employee List for Baithak Application
    if ($_REQUEST["val"] == "EmployeeForBaithak") {
        $sqle = mysql_query(
            "select e.EmployeeID, EmpCode, EmpStatus, Fname, Sname, Lname, d.DepartmentName,d.DepartmentCode,de.DesigName,de.DesigCode,c.CompanyName,g.EmailId_Vnr,g.MobileNo_Vnr,
                CASE
                WHEN DR ='Y' THEN 'Dr.'
                WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
                WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
                ELSE 'Mr.'
                END as Title
                from hrm_employee e 
                left join hrm_employee_general g on e.EmployeeID=g.EmployeeID 
                left JOIN hrm_department d ON d.DepartmentId = g.DepartmentId
                left JOIN hrm_designation de on de.DesigId = g.DesigId
                left JOIN hrm_company_basic c ON c.CompanyId = e.CompanyId
                LEFT join hrm_employee_personal p on e.EmployeeID=p.EmployeeID
                where (EmpStatus='A' OR EmpStatus='D') AND d.CompanyId=1",
            $con
        );
        
        
        while ($rese = mysql_fetch_assoc($sqle)) {
            $Emplist[] = $rese;
        }

        $sqlrep = mysql_query("SELECT * FROM hrm_employee_reporting_pmskra", $con);
        while ($resrep = mysql_fetch_assoc($sqlrep)) {
            $RepList[] = $resrep;
        }
        echo json_encode(["employee_list" => $Emplist, "reporting_list" => $RepList]);
    }
} else {
    echo json_encode(["msg" => "Parameter missing!"]);
}
