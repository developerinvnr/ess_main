<script type="text/javascript">
    function preventBack() {
        window.history.forward();
    }
    setTimeout("preventBack()", 0);
    window.onunload = function() {
        null
    };
</script>

<script language="javascript" type="text/javascript">
    stuHover = function() {
        var cssRule;
        var newSelector;
        for (var i = 0; i < document.styleSheets.length; i++)
            for (var x = 0; x < document.styleSheets[i].rules.length; x++) {
                cssRule = document.styleSheets[i].rules[x];
                if (cssRule.selectorText.indexOf("LI:hover") != -1) {
                    newSelector = cssRule.selectorText.replace(/LI:hover/gi, "LI.iehover");
                    document.styleSheets[i].addRule(newSelector, cssRule.style.cssText);
                }
            }
        var getElm = document.getElementById("nav").getElementsByTagName("LI");
        for (var i = 0; i < getElm.length; i++) {
            getElm[i].onmouseover = function() {
                this.className += " iehover";
            }
            getElm[i].onmouseout = function() {
                this.className = this.className.replace(new RegExp(" iehover\\b"), "");
            }
        }
    }
    if (window.attachEvent) window.attachEvent("onload", stuHover);
</script>
<span class="preload1"></span><span class="preload2"></span>
<?php
$SqlCom = mysql_query("select CompanyName from hrm_company_basic where CompanyId=" . $CompanyId . "", $con);
$resCom = mysql_fetch_assoc($SqlCom);
$sqlReti = mysql_query("select RetiStatus,RetiDate from hrm_employee where EmployeeID=" . $EmployeeId, $con);
$resReti = mysql_fetch_assoc($sqlReti);
$sqlMK = mysql_query("select * from hrm_employee_key where CompanyId=" . $CompanyId, $con);
$SNo = 1;
$resMK = mysql_fetch_assoc($sqlMK);
$sqlCer = mysql_query("select * from hrm_employee where EmployeeId=" . $EmployeeId, $con);
$resCer = mysql_fetch_assoc($sqlCer);
$Dept = mysql_query("select DepartmentId,Req_DrivLic,KRAUnBlock from hrm_employee_general where EmployeeId=" . $EmployeeId, $con);
$resDept = mysql_fetch_assoc($Dept);
$DepartmentId = $resDept['DepartmentId'];
$sqlApp = mysql_query("select * from hrm_employee_reporting where AppraiserId=" . $EmployeeId, $con);
$rowApp = mysql_num_rows($sqlApp);
$sqlRev = mysql_query("select * from hrm_employee_reporting where ReviewerId=" . $EmployeeId, $con);
$rowRev = mysql_num_rows($sqlRev);
$sqlHod = mysql_query("select * from hrm_employee_reporting where HodId=" . $EmployeeId, $con);
$rowHod = mysql_num_rows($sqlHod);

if ($EmployeeId == 263) {
    $sqlResig = mysql_query("select EmpSepId from hrm_employee_separation where EmployeeID=" . $EmployeeId, $con);
    $rowResig = mysql_num_rows($sqlResig);
} else {
    $sqlResig = mysql_query("select EmpSepId from hrm_employee_separation where EmployeeID=" . $EmployeeId . " AND HR_Approved='Y'", $con);
    $rowResig = mysql_num_rows($sqlResig);
}


$sqlContt = mysql_query("select Emg_Contact1 from hrm_employee_contact where EmployeeID=" . $EmployeeId, $con);
$resContt = mysql_fetch_assoc($sqlContt);
$sqlInvSb = mysql_query("select OpenYN from hrm_investdecl_setting_submission where CompanyId=" . $CompanyId, $con);
$resInvSb = mysql_fetch_assoc($sqlInvSb);

$sqlps2 = mysql_query("select * from hrm_employee_procertify_setting where CompanyId=" . $CompanyId, $con);
$resps2 = mysql_fetch_array($sqlps2);
if ($resps2['Open'] == 'Y') {
    $sqlpse = mysql_query("select * from hrm_employee_procertify_noc where EmployeeID=" . $EmployeeId . " AND Month=" . $resps2['Month'] . " AND Year=" . $resps2['Year'], $con);
    $rowpse = mysql_num_rows($sqlpse);
    $respse = mysql_fetch_array($sqlpse);
}

/*New Joining New Joining*/
$Qyeark = mysql_query("select * from hrm_pms_setting where CompanyId=" . $CompanyId . " AND Process='KRA'", $con);
$Yeark = mysql_fetch_assoc($Qyeark);


$sKSch = mysql_query("select * from hrm_pms_kradate where AssessmentYear=" . $Yeark['CurrY'] . " AND CompanyId=" . $CompanyId, $con);
$KSch = mysql_fetch_assoc($sKSch);

$sqlkk2 = mysql_query("select * from hrm_pms_kra where YearId=" . $Yeark['CurrY'] . " AND CompanyId=" . $CompanyId . " AND EmployeeID=" . $EmployeeId . " AND (KRAStatus='R' OR KRAStatus='A') AND (UseKRA='A' OR UseKRA='R' OR UseKRA='H')", $con);
$rowkk2 = mysql_num_rows($sqlkk2);


/*
$sKSch = mysql_query("select * from hrm_pms_kradate where AssessmentYear=" . $Yeark['NewY'] . " AND CompanyId=" . $CompanyId, $con);
$KSch = mysql_fetch_assoc($sKSch);

$sqlkk2 = mysql_query("select * from hrm_pms_kra where YearId=" . $Yeark['NewY'] . " AND CompanyId=" . $CompanyId . " AND EmployeeID=" . $EmployeeId . " AND (KRAStatus='R' OR KRAStatus='A') AND (UseKRA='A' OR UseKRA='R' OR UseKRA='H')", $con);
$rowkk2 = mysql_num_rows($sqlkk2);
*/

$SD = mysql_query("select DateJoining,Covid_Vaccin,Covid_Vaccin2,Covid_Vaccin_file,Covid_Vaccin2_file from hrm_employee_general where EmployeeID=" . $EmployeeId, $con);
$RD = mysql_fetch_assoc($SD);
$After31DayDoJ = date("Y-m-d", strtotime($RD['DateJoining'] . '+31 day'));
/*New Joining New Joining*/

//echo 'aa='.$_SESSION['EmpType'].'- '.$_SESSION['EmpStatus'];

if (($_SESSION['EmpType'] == 'E' or $_SESSION['EmpType'] == 'M') and $_SESSION['EmpStatus'] == 'A') { ?>
  <ul id="nav">
    <li class="top">
     <?php if ($_SESSION['login'] = true) { echo '<img src="../images/VNR_ico.png" style="height:33px;width:30px;" border="0">'; } ?>
    </li>
    <li class="top">
     <a href="Index.php?log=<?php echo $_SESSION['logCheckEmp']; ?>" class="top_link"><span>Home</span></a>
    </li>
    
    <li class="top"><a href="Indexpms.php?ee=1&aa=1&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1" class="top_link"><span>PMS</span></a></li>
    
    <!------------------------------------>
    <?php if ($EmployeeId == 169 or $EmployeeId == 1084 or $EmployeeId == 1312 or $EmployeeId == 161 or $EmployeeId == 1501) { ?>
    <li class="top"><a href="#nogo22" class="top_link"><span class="down">Others</span></a>
    <ul class="sub">
        
    <?php if ($EmployeeId == 169 or $EmployeeId == 1084 or $EmployeeId == 1312){ ?>    
    <li style="text-align:center;"><b>Emp Decl<sup>n</sup>/Subm<sup>n</sup></b></li>
    <?php $Max = mysql_query("select Max(YMId) as MaxId from hrm_investdecl_ym where CompanyId=" . $CompanyId, $con);
    $resMax = mysql_fetch_array($Max); ?>
    <li><a href="EmpInvestDecl.php?ls=10&wer=123&aa=grtd&er=er%re%tr%rr&trt=equalthen&sys=%tr%tr&se=reew&w=ee102&mxid=<?php echo $resMax['MaxId']; ?>&dd=11&ee=s1s&aa=grtd&er=er%re%tr%rr&trt=equalthen">Invest. Decl. Status</a></li>

    <?php $sqly = mysql_query("select FromDate,ToDate from hrm_year where YearId=" . $YearId, $con);
    $resy = mysql_fetch_array($sqly);
    $fsd = date("Y", strtotime($resy['FromDate']));
    $tsd = date("Y", strtotime($resy['ToDate']));
    $Prd = $fsd . '-' . $tsd; ?>
    <li><a href="EmpInvestSub.php?ls=10&wer=123&aa=grtd&er=er%re%tr%rr&trt=equalthen&sys=%tr%tr&se=reew&w=ee102&prd=<?php echo $Prd; ?>&dd=11&ee=s1s&aa=grtd&er=er%re%tr%rr&trt=equalthen">Invest. Submiss<sup>n</sup> Status</a></li>

    <li><a href="EmpLTASub.php?ls=10&wer=123&aa=grtd&er=er%re%tr%rr&trt=equalthen&sys=%tr%tr&se=reew&w=ee102&prd=2018&dd=11&ee=s1s&aa=grtd&er=er%re%tr%rr&trt=equalthen">LTA Decl<sup>n</sup>/Subm<sup>n</sup></a></li>
    <?php } ?>
    
    
    <?php if ($EmployeeId == 169 or $EmployeeId == 1084 or $EmployeeId == 161 or $EmployeeId == 1501) { ?>
        <li style="text-align:center;"><b>------------------</b></li>
        <li><a href="EmpElig.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&value=0&page=1">Emp Eligibility</a></li><?php } ?>
     </ul>
    </li>
    <?php } ?>
    <!------------------------------------>
    
    <?php /* TFC */ ?>
    <?php if($EmployeeId==169 OR $EmployeeId==1084 OR $EmployeeId==1772){ ?>
        <li class="top"><a href="#nogo22" class="top_link"><span class="down">TFC</span></a>
          <ul class="sub">
            <li><a href="#" onclick="OpenSUserPlan(<?php echo $EmployeeId; ?>)">User</a></li>
            <li><a href="#" onclick="OpenSEmpPlan(<?php echo $EmployeeId; ?>)">Employee</a></li>
          </ul>
       </li>
        <script language="javascript" type="text/javascript">
        function OpenSEmpPlan(ei) {
            window.open("sp/employee/Index.php?oo=we&p=g&ok=true&rslt=y&pp=qw_res##ius&log=true&&oo=we&p=g&ok=true&rslt=y&pp=qw_res##ius&log=true&ei=" + ei + "&Event=Edit&oo=we&p=g&ok=true&rslt=y&pp=qw_res##ius&log=true", '_blank');
            window.focus();
        }

        function OpenSUserPlan(ei) {
            window.open("sp/user/Index.php?oo=we&p=g&ok=true&rslt=y&pp=qw_res##ius&log=true&&oo=we&p=g&ok=true&rslt=y&pp=qw_res##ius&log=true&ei=" + ei + "&Event=Edit&oo=we&p=g&ok=true&rslt=y&pp=qw_res##ius&log=true", '_blank');
            window.focus();
        }
     </script>  
     <?php } ?>
     <?php /* TFC */ ?>
    
  </ul>

<?php } ?>