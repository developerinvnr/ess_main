<?php require_once('../AdminUser/config/config.php'); ?>
<?php $sqlSE=mysql_query("select * from hrm_employee_separation where EmpSepId=".$_REQUEST['si'], $con); $resSE=mysql_fetch_assoc($sqlSE); ?>
<?php 

if(isset($_POST['SubmitExitInt']))
{ 
  $search =  '!"#$%&/\'-:_' ; $search = str_split($search);
  $Q11=str_replace($search, "", $_POST['Q1_1']); $Q12=str_replace($search, "", $_POST['Q1_2']);
  $Q21=str_replace($search, "", $_POST['Q2_1']); $Q22=str_replace($search, "", $_POST['Q2_2']);
  $Q31=str_replace($search, "", $_POST['Q3_1']); $Q32=str_replace($search, "", $_POST['Q3_2']);
  $Q41=str_replace($search, "", $_POST['Q4_1']); $Q42=str_replace($search, "", $_POST['Q4_2']);
  $Q51=str_replace($search, "", $_POST['Q5_1']); $Q52=str_replace($search, "", $_POST['Q5_2']);
  $ComName=str_replace($search, "", $_POST['ComName']); $Location=str_replace($search, "", $_POST['Location']); $Designation=str_replace($search, "", $_POST['Designation']);
  $hike=str_replace($search, "", $_POST['hike']); $OthBefit=str_replace($search, "", $_POST['OthBefit']);
  
  $sql22=mysql_query("select EmpSepId from hrm_employee_separation where EmployeeID=".$resSE['EmployeeID']." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con); $res22=mysql_fetch_assoc($sql22);
 $sql=mysql_query("select ExitIntId from hrm_employee_separation_exitint INNER JOIN hrm_employee_separation ON hrm_employee_separation_exitint.EmpSepId=hrm_employee_separation.EmpSepId where hrm_employee_separation.EmployeeID=".$resSE['EmployeeID']." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con); $row=mysql_num_rows($sql);
  if($row==0)
  { $sqlIns=mysql_query("insert into hrm_employee_separation_exitint(EmpSepId, FormSubmitDate, FRI, HP, OB, PGR, LOC, LPO, JANM, BJBP, HS, LOCOP, IAU, LOCOM, DIDM, UTP, US, HJ, WH, JITM, NFOC, IPI, IIAB, AR, NCIR, OTH, Q1_1, Q1_2, Q2_1, Q2_2, Q3_1, Q3_2, Q4_1, Q4_2, Q5_1, Q5_2, Q6, Q7, ComName, Location, Designation, hike, OthBefit) values(".$res22['EmpSepId'].", '".date("Y-m-d")."', ".$_POST['FRI'].", ".$_POST['HP'].", ".$_POST['OB'].", ".$_POST['PGR'].", ".$_POST['LOC'].", ".$_POST['LPO'].", ".$_POST['JANM'].", ".$_POST['BJBP'].", ".$_POST['HS'].", ".$_POST['LOCOP'].", ".$_POST['IAU'].", ".$_POST['LOCOM'].", ".$_POST['DIDM'].", ".$_POST['UTP'].", ".$_POST['US'].", ".$_POST['HJ'].", ".$_POST['WH'].", ".$_POST['JITM'].", ".$_POST['NFOC'].", ".$_POST['IPI'].", ".$_POST['IIAB'].", ".$_POST['AR'].", ".$_POST['NCIR'].", ".$_POST['OTH'].", '".$Q11."', '".$Q12."', '".$Q21."', '".$Q22."', '".$Q31."', '".$Q32."', '".$Q41."', '".$Q42."', '".$Q51."', '".$Q52."', '".$_POST['Q6_Ans']."', '".$_POST['Q7_Ans']."', '".$ComName."', '".$Location."', '".$Designation."', '".$hike."', '".$OthBefit."')", $con); }
  elseif($row>0)
  { $sqlIns=mysql_query("update hrm_employee_separation_exitint set FormSubmitDate='".date("Y-m-d")."', FRI=".$_POST['FRI'].", HP=".$_POST['HP'].", OB=".$_POST['OB'].", PGR=".$_POST['PGR'].", LOC=".$_POST['LOC'].", LPO=".$_POST['LPO'].", JANM=".$_POST['JANM'].", BJBP=".$_POST['BJBP'].", HS=".$_POST['HS'].", LOCOP=".$_POST['LOCOP'].", IAU=".$_POST['IAU'].", LOCOM=".$_POST['LOCOM'].", DIDM=".$_POST['DIDM'].", UTP=".$_POST['UTP'].", US=".$_POST['US'].", HJ=".$_POST['HJ'].", WH=".$_POST['WH'].", JITM=".$_POST['JITM'].", NFOC=".$_POST['NFOC'].", IPI=".$_POST['IPI'].", IIAB=".$_POST['IIAB'].", AR=".$_POST['AR'].", NCIR=".$_POST['NCIR'].", OTH=".$_POST['OTH'].", Q1_1='".$Q11."', Q1_2='".$Q12."', Q2_1='".$Q21."', Q2_2='".$Q22."', Q3_1='".$Q31."', Q3_2='".$Q32."', Q4_1='".$Q41."', Q4_2='".$Q42."', Q5_1='".$Q51."', Q5_2='".$Q52."', Q6='".$_POST['Q6_Ans']."', Q7='".$_POST['Q7_Ans']."', ComName='".$ComName."', Location='".$Location."', Designation='".$Designation."', hike='".$hike."', OthBefit='".$OthBefit."' where EmpSepId=".$res22['EmpSepId'], $con);}
  
  if($sqlIns){$sqlUp2=mysql_query("update hrm_employee_separation set Emp_ExitInt='Y' where EmployeeID=".$resSE['EmployeeID']." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con);}
 
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?php include_once('../Title.php'); ?>t</title>
<style> .font { color:#ffffff; font-family:Georgia; font-size:12px;} .font5 { color:#000066; font-family:Georgia; font-size:16px;}
.font2 { color:#thrthr; font-family:Georgia; font-size:13px;}.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.input { background-color:#F9F2FF; width:90px;text-align:center;height:20px;vertical-align:middle;}
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}.All{font-size:11px; height:20px;} .All_30{font-size:14px;height:20px;width:30px;font-family:Times New Roman;}.All_40{font-size:14px;height:20px;width:40px;font-family:Times New Roman;} .All_60{font-size:14px;height:20px;width:50px;font-family:Times New Roman;} .All_50{font-size:14px;height:20px;width:70px;font-family:Times New Roman;} .All_500{font-size:15px;height:20px;width:500px;font-family:Times New Roman;}</style>
<script type="text/javascript" language="javascript">
function FunFRI(v)
{ if(v==1)
  { if(document.getElementById("FRI_1").checked==true){document.getElementById("FRI").value=1; document.getElementById("FRI_2").checked=false; 
    document.getElementById("FRI_3").checked=false; document.getElementById("FRI_4").checked=false;}else{document.getElementById("FRI").value=0;} }
  else if(v==2)
  { if(document.getElementById("FRI_2").checked==true){document.getElementById("FRI").value=2; document.getElementById("FRI_3").checked=false; 
    document.getElementById("FRI_4").checked=false; document.getElementById("FRI_1").checked=false;}else{document.getElementById("FRI").value=0;} }	
  else if(v==3)
  { if(document.getElementById("FRI_3").checked==true){document.getElementById("FRI").value=3; document.getElementById("FRI_4").checked=false; 
    document.getElementById("FRI_1").checked=false; document.getElementById("FRI_2").checked=false;}else{document.getElementById("FRI").value=0;} }
  else if(v==4)
  { if(document.getElementById("FRI_4").checked==true){document.getElementById("FRI").value=4; document.getElementById("FRI_1").checked=false; 
    document.getElementById("FRI_2").checked=false; document.getElementById("FRI_3").checked=false;}else{document.getElementById("FRI").value=0;} }
}
function FunHP(v)
{ if(v==1)
  { if(document.getElementById("HP_1").checked==true){document.getElementById("HP").value=1; document.getElementById("HP_2").checked=false; 
    document.getElementById("HP_3").checked=false; document.getElementById("HP_4").checked=false;}else{document.getElementById("HP").value=0;} }
  else if(v==2)
  { if(document.getElementById("HP_2").checked==true){document.getElementById("HP").value=2; document.getElementById("HP_3").checked=false; 
    document.getElementById("HP_4").checked=false; document.getElementById("HP_1").checked=false;}else{document.getElementById("HP").value=0;} }	
  else if(v==3)
  { if(document.getElementById("HP_3").checked==true){document.getElementById("HP").value=3; document.getElementById("HP_4").checked=false; 
    document.getElementById("HP_1").checked=false; document.getElementById("HP_2").checked=false;}else{document.getElementById("HP").value=0;} }
  else if(v==4)
  { if(document.getElementById("HP_4").checked==true){document.getElementById("HP").value=4; document.getElementById("HP_1").checked=false; 
    document.getElementById("HP_2").checked=false; document.getElementById("HP_3").checked=false;}else{document.getElementById("HP").value=0;} }
}
function FunOB(v)
{ if(v==1)
  { if(document.getElementById("OB_1").checked==true){document.getElementById("OB").value=1; document.getElementById("OB_2").checked=false; 
    document.getElementById("OB_3").checked=false; document.getElementById("OB_4").checked=false;}else{document.getElementById("OB").value=0;} }
  else if(v==2)
  { if(document.getElementById("OB_2").checked==true){document.getElementById("OB").value=2; document.getElementById("OB_3").checked=false; 
    document.getElementById("OB_4").checked=false; document.getElementById("OB_1").checked=false;}else{document.getElementById("OB").value=0;} }	
  else if(v==3)
  { if(document.getElementById("OB_3").checked==true){document.getElementById("OB").value=3; document.getElementById("OB_4").checked=false; 
    document.getElementById("OB_1").checked=false; document.getElementById("OB_2").checked=false;}else{document.getElementById("OB").value=0;} }
  else if(v==4)
  { if(document.getElementById("OB_4").checked==true){document.getElementById("OB").value=4; document.getElementById("OB_1").checked=false; 
    document.getElementById("OB_2").checked=false; document.getElementById("OB_3").checked=false;}else{document.getElementById("OB").value=0;} }
}

function FunPGR(v)
{ if(v==1)
  { if(document.getElementById("PGR_1").checked==true){document.getElementById("PGR").value=1; document.getElementById("PGR_2").checked=false; 
    document.getElementById("PGR_3").checked=false; document.getElementById("PGR_4").checked=false;}else{document.getElementById("PGR").value=0;} }
  else if(v==2)
  { if(document.getElementById("PGR_2").checked==true){document.getElementById("PGR").value=2; document.getElementById("PGR_3").checked=false; 
    document.getElementById("PGR_4").checked=false; document.getElementById("PGR_1").checked=false;}else{document.getElementById("PGR").value=0;} }	
  else if(v==3)
  { if(document.getElementById("PGR_3").checked==true){document.getElementById("PGR").value=3; document.getElementById("PGR_4").checked=false; 
    document.getElementById("PGR_1").checked=false; document.getElementById("PGR_2").checked=false;}else{document.getElementById("PGR").value=0;} }
  else if(v==4)
  { if(document.getElementById("PGR_4").checked==true){document.getElementById("PGR").value=4; document.getElementById("PGR_1").checked=false; 
    document.getElementById("PGR_2").checked=false; document.getElementById("PGR_3").checked=false;}else{document.getElementById("PGR").value=0;} }
}
function FunLOC(v)
{ if(v==1)
  { if(document.getElementById("LOC_1").checked==true){document.getElementById("LOC").value=1; document.getElementById("LOC_2").checked=false; 
    document.getElementById("LOC_3").checked=false; document.getElementById("LOC_4").checked=false;}else{document.getElementById("LOC").value=0;} }
  else if(v==2)
  { if(document.getElementById("LOC_2").checked==true){document.getElementById("LOC").value=2; document.getElementById("LOC_3").checked=false; 
    document.getElementById("LOC_4").checked=false; document.getElementById("LOC_1").checked=false;}else{document.getElementById("LOC").value=0;} }	
  else if(v==3)
  { if(document.getElementById("LOC_3").checked==true){document.getElementById("LOC").value=3; document.getElementById("LOC_4").checked=false; 
    document.getElementById("LOC_1").checked=false; document.getElementById("LOC_2").checked=false;}else{document.getElementById("LOC").value=0;} }
  else if(v==4)
  { if(document.getElementById("LOC_4").checked==true){document.getElementById("LOC").value=4; document.getElementById("LOC_1").checked=false; 
    document.getElementById("LOC_2").checked=false; document.getElementById("LOC_3").checked=false;}else{document.getElementById("LOC").value=0;} }
}
function FunLPO(v)
{ if(v==1)
  { if(document.getElementById("LPO_1").checked==true){document.getElementById("LPO").value=1; document.getElementById("LPO_2").checked=false; 
    document.getElementById("LPO_3").checked=false; document.getElementById("LPO_4").checked=false;}else{document.getElementById("LPO").value=0;} }
  else if(v==2)
  { if(document.getElementById("LPO_2").checked==true){document.getElementById("LPO").value=2; document.getElementById("LPO_3").checked=false; 
    document.getElementById("LPO_4").checked=false; document.getElementById("LPO_1").checked=false;}else{document.getElementById("LPO").value=0;} }	
  else if(v==3)
  { if(document.getElementById("LPO_3").checked==true){document.getElementById("LPO").value=3; document.getElementById("LPO_4").checked=false; 
    document.getElementById("LPO_1").checked=false; document.getElementById("LPO_2").checked=false;}else{document.getElementById("LPO").value=0;} }
  else if(v==4)
  { if(document.getElementById("LPO_4").checked==true){document.getElementById("LPO").value=4; document.getElementById("LPO_1").checked=false; 
    document.getElementById("LPO_2").checked=false; document.getElementById("LPO_3").checked=false;}else{document.getElementById("LPO").value=0;} }
}
function FunJANM(v)
{ if(v==1)
  { if(document.getElementById("JANM_1").checked==true){document.getElementById("JANM").value=1; document.getElementById("JANM_2").checked=false; 
    document.getElementById("JANM_3").checked=false; document.getElementById("JANM_4").checked=false;}else{document.getElementById("JANM").value=0;} }
  else if(v==2)
  { if(document.getElementById("JANM_2").checked==true){document.getElementById("JANM").value=2; document.getElementById("JANM_3").checked=false; 
    document.getElementById("JANM_4").checked=false; document.getElementById("JANM_1").checked=false;}else{document.getElementById("JANM").value=0;} }	
  else if(v==3)
  { if(document.getElementById("JANM_3").checked==true){document.getElementById("JANM").value=3; document.getElementById("JANM_4").checked=false; 
    document.getElementById("JANM_1").checked=false; document.getElementById("JANM_2").checked=false;}else{document.getElementById("JANM").value=0;} }
  else if(v==4)
  { if(document.getElementById("JANM_4").checked==true){document.getElementById("JANM").value=4; document.getElementById("JANM_1").checked=false; 
    document.getElementById("JANM_2").checked=false; document.getElementById("JANM_3").checked=false;}else{document.getElementById("JANM").value=0;} }
}
function FunBJBP(v)
{ if(v==1)
  { if(document.getElementById("BJBP_1").checked==true){document.getElementById("BJBP").value=1; document.getElementById("BJBP_2").checked=false; 
    document.getElementById("BJBP_3").checked=false; document.getElementById("BJBP_4").checked=false;}else{document.getElementById("BJBP").value=0;} }
  else if(v==2)
  { if(document.getElementById("BJBP_2").checked==true){document.getElementById("BJBP").value=2; document.getElementById("BJBP_3").checked=false; 
    document.getElementById("BJBP_4").checked=false; document.getElementById("BJBP_1").checked=false;}else{document.getElementById("BJBP").value=0;} }	
  else if(v==3)
  { if(document.getElementById("BJBP_3").checked==true){document.getElementById("BJBP").value=3; document.getElementById("BJBP_4").checked=false; 
    document.getElementById("BJBP_1").checked=false; document.getElementById("BJBP_2").checked=false;}else{document.getElementById("BJBP").value=0;} }
  else if(v==4)
  { if(document.getElementById("BJBP_4").checked==true){document.getElementById("BJBP").value=4; document.getElementById("BJBP_1").checked=false; 
    document.getElementById("BJBP_2").checked=false; document.getElementById("BJBP_3").checked=false;}else{document.getElementById("BJBP").value=0;} }
}
function FunHS(v)
{ if(v==1)
  { if(document.getElementById("HS_1").checked==true){document.getElementById("HS").value=1; document.getElementById("HS_2").checked=false; 
    document.getElementById("HS_3").checked=false; document.getElementById("HS_4").checked=false;}else{document.getElementById("HS").value=0;} }
  else if(v==2)
  { if(document.getElementById("HS_2").checked==true){document.getElementById("HS").value=2; document.getElementById("HS_3").checked=false; 
    document.getElementById("HS_4").checked=false; document.getElementById("HS_1").checked=false;}else{document.getElementById("HS").value=0;} }	
  else if(v==3)
  { if(document.getElementById("HS_3").checked==true){document.getElementById("HS").value=3; document.getElementById("HS_4").checked=false; 
    document.getElementById("HS_1").checked=false; document.getElementById("HS_2").checked=false;}else{document.getElementById("HS").value=0;} }
  else if(v==4)
  { if(document.getElementById("HS_4").checked==true){document.getElementById("HS").value=4; document.getElementById("HS_1").checked=false; 
    document.getElementById("HS_2").checked=false; document.getElementById("HS_3").checked=false;}else{document.getElementById("HS").value=0;} }
}

function FunLOCOP(v)
{ if(v==1)
  { if(document.getElementById("LOCOP_1").checked==true){document.getElementById("LOCOP").value=1; document.getElementById("LOCOP_2").checked=false; 
    document.getElementById("LOCOP_3").checked=false; document.getElementById("LOCOP_4").checked=false;}else{document.getElementById("LOCOP").value=0;} }
  else if(v==2)
  { if(document.getElementById("LOCOP_2").checked==true){document.getElementById("LOCOP").value=2; document.getElementById("LOCOP_3").checked=false; 
    document.getElementById("LOCOP_4").checked=false; document.getElementById("LOCOP_1").checked=false;}else{document.getElementById("LOCOP").value=0;} }	
  else if(v==3)
  { if(document.getElementById("LOCOP_3").checked==true){document.getElementById("LOCOP").value=3; document.getElementById("LOCOP_4").checked=false; 
    document.getElementById("LOCOP_1").checked=false; document.getElementById("LOCOP_2").checked=false;}else{document.getElementById("LOCOP").value=0;} }
  else if(v==4)
  { if(document.getElementById("LOCOP_4").checked==true){document.getElementById("LOCOP").value=4; document.getElementById("LOCOP_1").checked=false; 
    document.getElementById("LOCOP_2").checked=false; document.getElementById("LOCOP_3").checked=false;}else{document.getElementById("LOCOP").value=0;} }
}
function FunIAU(v)
{ if(v==1)
  { if(document.getElementById("IAU_1").checked==true){document.getElementById("IAU").value=1; document.getElementById("IAU_2").checked=false; 
    document.getElementById("IAU_3").checked=false; document.getElementById("IAU_4").checked=false;}else{document.getElementById("IAU").value=0;} }
  else if(v==2)
  { if(document.getElementById("IAU_2").checked==true){document.getElementById("IAU").value=2; document.getElementById("IAU_3").checked=false; 
    document.getElementById("IAU_4").checked=false; document.getElementById("IAU_1").checked=false;}else{document.getElementById("IAU").value=0;} }	
  else if(v==3)
  { if(document.getElementById("IAU_3").checked==true){document.getElementById("IAU").value=3; document.getElementById("IAU_4").checked=false; 
    document.getElementById("IAU_1").checked=false; document.getElementById("IAU_2").checked=false;}else{document.getElementById("IAU").value=0;} }
  else if(v==4)
  { if(document.getElementById("IAU_4").checked==true){document.getElementById("IAU").value=4; document.getElementById("IAU_1").checked=false; 
    document.getElementById("IAU_2").checked=false; document.getElementById("IAU_3").checked=false;}else{document.getElementById("IAU").value=0;} }
}
function FunLOCOM(v)
{ if(v==1)
  { if(document.getElementById("LOCOM_1").checked==true){document.getElementById("LOCOM").value=1; document.getElementById("LOCOM_2").checked=false; 
    document.getElementById("LOCOM_3").checked=false; document.getElementById("LOCOM_4").checked=false;}else{document.getElementById("LOCOM").value=0;} }
  else if(v==2)
  { if(document.getElementById("LOCOM_2").checked==true){document.getElementById("LOCOM").value=2; document.getElementById("LOCOM_3").checked=false; 
    document.getElementById("LOCOM_4").checked=false; document.getElementById("LOCOM_1").checked=false;}else{document.getElementById("LOCOM").value=0;} }	
  else if(v==3)
  { if(document.getElementById("LOCOM_3").checked==true){document.getElementById("LOCOM").value=3; document.getElementById("LOCOM_4").checked=false; 
    document.getElementById("LOCOM_1").checked=false; document.getElementById("LOCOM_2").checked=false;}else{document.getElementById("LOCOM").value=0;} }
  else if(v==4)
  { if(document.getElementById("LOCOM_4").checked==true){document.getElementById("LOCOM").value=4; document.getElementById("LOCOM_1").checked=false; 
    document.getElementById("LOCOM_2").checked=false; document.getElementById("LOCOM_3").checked=false;}else{document.getElementById("LOCOM").value=0;} }
}
function FunDIDM(v)
{ if(v==1)
  { if(document.getElementById("DIDM_1").checked==true){document.getElementById("DIDM").value=1; document.getElementById("DIDM_2").checked=false; 
    document.getElementById("DIDM_3").checked=false; document.getElementById("DIDM_4").checked=false;}else{document.getElementById("DIDM").value=0;} }
  else if(v==2)
  { if(document.getElementById("DIDM_2").checked==true){document.getElementById("DIDM").value=2; document.getElementById("DIDM_3").checked=false; 
    document.getElementById("DIDM_4").checked=false; document.getElementById("DIDM_1").checked=false;}else{document.getElementById("DIDM").value=0;} }	
  else if(v==3)
  { if(document.getElementById("DIDM_3").checked==true){document.getElementById("DIDM").value=3; document.getElementById("DIDM_4").checked=false; 
    document.getElementById("DIDM_1").checked=false; document.getElementById("DIDM_2").checked=false;}else{document.getElementById("DIDM").value=0;} }
  else if(v==4)
  { if(document.getElementById("DIDM_4").checked==true){document.getElementById("DIDM").value=4; document.getElementById("DIDM_1").checked=false; 
    document.getElementById("DIDM_2").checked=false; document.getElementById("DIDM_3").checked=false;}else{document.getElementById("DIDM").value=0;} }
}
function FunUTP(v)
{ if(v==1)
  { if(document.getElementById("UTP_1").checked==true){document.getElementById("UTP").value=1; document.getElementById("UTP_2").checked=false; 
    document.getElementById("UTP_3").checked=false; document.getElementById("UTP_4").checked=false;}else{document.getElementById("UTP").value=0;} }
  else if(v==2)
  { if(document.getElementById("UTP_2").checked==true){document.getElementById("UTP").value=2; document.getElementById("UTP_3").checked=false; 
    document.getElementById("UTP_4").checked=false; document.getElementById("UTP_1").checked=false;}else{document.getElementById("UTP").value=0;} }	
  else if(v==3)
  { if(document.getElementById("UTP_3").checked==true){document.getElementById("UTP").value=3; document.getElementById("UTP_4").checked=false; 
    document.getElementById("UTP_1").checked=false; document.getElementById("UTP_2").checked=false;}else{document.getElementById("UTP").value=0;} }
  else if(v==4)
  { if(document.getElementById("UTP_4").checked==true){document.getElementById("UTP").value=4; document.getElementById("UTP_1").checked=false; 
    document.getElementById("UTP_2").checked=false; document.getElementById("UTP_3").checked=false;}else{document.getElementById("UTP").value=0;} }
}

function FunUS(v)
{ if(v==1)
  { if(document.getElementById("US_1").checked==true){document.getElementById("US").value=1; document.getElementById("US_2").checked=false; 
    document.getElementById("US_3").checked=false; document.getElementById("US_4").checked=false;}else{document.getElementById("US").value=0;} }
  else if(v==2)
  { if(document.getElementById("US_2").checked==true){document.getElementById("US").value=2; document.getElementById("US_3").checked=false; 
    document.getElementById("US_4").checked=false; document.getElementById("US_1").checked=false;}else{document.getElementById("US").value=0;} }	
  else if(v==3)
  { if(document.getElementById("US_3").checked==true){document.getElementById("US").value=3; document.getElementById("US_4").checked=false; 
    document.getElementById("US_1").checked=false; document.getElementById("US_2").checked=false;}else{document.getElementById("US").value=0;} }
  else if(v==4)
  { if(document.getElementById("US_4").checked==true){document.getElementById("US").value=4; document.getElementById("US_1").checked=false; 
    document.getElementById("US_2").checked=false; document.getElementById("US_3").checked=false;}else{document.getElementById("US").value=0;} }
}
function FunHJ(v)
{ if(v==1)
  { if(document.getElementById("HJ_1").checked==true){document.getElementById("HJ").value=1; document.getElementById("HJ_2").checked=false; 
    document.getElementById("HJ_3").checked=false; document.getElementById("HJ_4").checked=false;}else{document.getElementById("HJ").value=0;} }
  else if(v==2)
  { if(document.getElementById("HJ_2").checked==true){document.getElementById("HJ").value=2; document.getElementById("HJ_3").checked=false; 
    document.getElementById("HJ_4").checked=false; document.getElementById("HJ_1").checked=false;}else{document.getElementById("HJ").value=0;} }	
  else if(v==3)
  { if(document.getElementById("HJ_3").checked==true){document.getElementById("HJ").value=3; document.getElementById("HJ_4").checked=false; 
    document.getElementById("HJ_1").checked=false; document.getElementById("HJ_2").checked=false;}else{document.getElementById("HJ").value=0;} }
  else if(v==4)
  { if(document.getElementById("HJ_4").checked==true){document.getElementById("HJ").value=4; document.getElementById("HJ_1").checked=false; 
    document.getElementById("HJ_2").checked=false; document.getElementById("HJ_3").checked=false;}else{document.getElementById("HJ").value=0;} }
}
function FunWH(v)
{ if(v==1)
  { if(document.getElementById("WH_1").checked==true){document.getElementById("WH").value=1; document.getElementById("WH_2").checked=false; 
    document.getElementById("WH_3").checked=false; document.getElementById("WH_4").checked=false;}else{document.getElementById("WH").value=0;} }
  else if(v==2)
  { if(document.getElementById("WH_2").checked==true){document.getElementById("WH").value=2; document.getElementById("WH_3").checked=false; 
    document.getElementById("WH_4").checked=false; document.getElementById("WH_1").checked=false;}else{document.getElementById("WH").value=0;} }	
  else if(v==3)
  { if(document.getElementById("WH_3").checked==true){document.getElementById("WH").value=3; document.getElementById("WH_4").checked=false; 
    document.getElementById("WH_1").checked=false; document.getElementById("WH_2").checked=false;}else{document.getElementById("WH").value=0;} }
  else if(v==4)
  { if(document.getElementById("WH_4").checked==true){document.getElementById("WH").value=4; document.getElementById("WH_1").checked=false; 
    document.getElementById("WH_2").checked=false; document.getElementById("WH_3").checked=false;}else{document.getElementById("WH").value=0;} }
}
function FunJITM(v)
{ if(v==1)
  { if(document.getElementById("JITM_1").checked==true){document.getElementById("JITM").value=1; document.getElementById("JITM_2").checked=false; 
    document.getElementById("JITM_3").checked=false; document.getElementById("JITM_4").checked=false;}else{document.getElementById("JITM").value=0;} }
  else if(v==2)
  { if(document.getElementById("JITM_2").checked==true){document.getElementById("JITM").value=2; document.getElementById("JITM_3").checked=false; 
    document.getElementById("JITM_4").checked=false; document.getElementById("JITM_1").checked=false;}else{document.getElementById("JITM").value=0;} }	
  else if(v==3)
  { if(document.getElementById("JITM_3").checked==true){document.getElementById("JITM").value=3; document.getElementById("JITM_4").checked=false; 
    document.getElementById("JITM_1").checked=false; document.getElementById("JITM_2").checked=false;}else{document.getElementById("JITM").value=0;} }
  else if(v==4)
  { if(document.getElementById("JITM_4").checked==true){document.getElementById("JITM").value=4; document.getElementById("JITM_1").checked=false; 
    document.getElementById("JITM_2").checked=false; document.getElementById("JITM_3").checked=false;}else{document.getElementById("JITM").value=0;} }
}
function FunNFOC(v)
{ if(v==1)
  { if(document.getElementById("NFOC_1").checked==true){document.getElementById("NFOC").value=1; document.getElementById("NFOC_2").checked=false; 
    document.getElementById("NFOC_3").checked=false; document.getElementById("NFOC_4").checked=false;}else{document.getElementById("NFOC").value=0;} }
  else if(v==2)
  { if(document.getElementById("NFOC_2").checked==true){document.getElementById("NFOC").value=2; document.getElementById("NFOC_3").checked=false; 
    document.getElementById("NFOC_4").checked=false; document.getElementById("NFOC_1").checked=false;}else{document.getElementById("NFOC").value=0;} }	
  else if(v==3)
  { if(document.getElementById("NFOC_3").checked==true){document.getElementById("NFOC").value=3; document.getElementById("NFOC_4").checked=false; 
    document.getElementById("NFOC_1").checked=false; document.getElementById("NFOC_2").checked=false;}else{document.getElementById("NFOC").value=0;} }
  else if(v==4)
  { if(document.getElementById("NFOC_4").checked==true){document.getElementById("NFOC").value=4; document.getElementById("NFOC_1").checked=false; 
    document.getElementById("NFOC_2").checked=false; document.getElementById("NFOC_3").checked=false;}else{document.getElementById("NFOC").value=0;} }
}

function FunIPI(v)
{ if(v==1)
  { if(document.getElementById("IPI_1").checked==true){document.getElementById("IPI").value=1; document.getElementById("IPI_2").checked=false; 
    document.getElementById("IPI_3").checked=false; document.getElementById("IPI_4").checked=false;}else{document.getElementById("IPI").value=0;} }
  else if(v==2)
  { if(document.getElementById("IPI_2").checked==true){document.getElementById("IPI").value=2; document.getElementById("IPI_3").checked=false; 
    document.getElementById("IPI_4").checked=false; document.getElementById("IPI_1").checked=false;}else{document.getElementById("IPI").value=0;} }	
  else if(v==3)
  { if(document.getElementById("IPI_3").checked==true){document.getElementById("IPI").value=3; document.getElementById("IPI_4").checked=false; 
    document.getElementById("IPI_1").checked=false; document.getElementById("IPI_2").checked=false;}else{document.getElementById("IPI").value=0;} }
  else if(v==4)
  { if(document.getElementById("IPI_4").checked==true){document.getElementById("IPI").value=4; document.getElementById("IPI_1").checked=false; 
    document.getElementById("IPI_2").checked=false; document.getElementById("IPI_3").checked=false;}else{document.getElementById("IPI").value=0;} }
}
function FunIIAB(v)
{ if(v==1)
  { if(document.getElementById("IIAB_1").checked==true){document.getElementById("IIAB").value=1; document.getElementById("IIAB_2").checked=false; 
    document.getElementById("IIAB_3").checked=false; document.getElementById("IIAB_4").checked=false;}else{document.getElementById("IIAB").value=0;} }
  else if(v==2)
  { if(document.getElementById("IIAB_2").checked==true){document.getElementById("IIAB").value=2; document.getElementById("IIAB_3").checked=false; 
    document.getElementById("IIAB_4").checked=false; document.getElementById("IIAB_1").checked=false;}else{document.getElementById("IIAB").value=0;} }	
  else if(v==3)
  { if(document.getElementById("IIAB_3").checked==true){document.getElementById("IIAB").value=3; document.getElementById("IIAB_4").checked=false; 
    document.getElementById("IIAB_1").checked=false; document.getElementById("IIAB_2").checked=false;}else{document.getElementById("IIAB").value=0;} }
  else if(v==4)
  { if(document.getElementById("IIAB_4").checked==true){document.getElementById("IIAB").value=4; document.getElementById("IIAB_1").checked=false; 
    document.getElementById("IIAB_2").checked=false; document.getElementById("IIAB_3").checked=false;}else{document.getElementById("IIAB").value=0;} }
}

function FunAR(v)
{ if(v==1)
  { if(document.getElementById("AR_1").checked==true){document.getElementById("AR").value=1; document.getElementById("AR_2").checked=false; 
    document.getElementById("AR_3").checked=false; document.getElementById("AR_4").checked=false;}else{document.getElementById("AR").value=0;} }
  else if(v==2)
  { if(document.getElementById("AR_2").checked==true){document.getElementById("AR").value=2; document.getElementById("AR_3").checked=false; 
    document.getElementById("AR_4").checked=false; document.getElementById("AR_1").checked=false;}else{document.getElementById("AR").value=0;} }	
  else if(v==3)
  { if(document.getElementById("AR_3").checked==true){document.getElementById("AR").value=3; document.getElementById("AR_4").checked=false; 
    document.getElementById("AR_1").checked=false; document.getElementById("AR_2").checked=false;}else{document.getElementById("AR").value=0;} }
  else if(v==4)
  { if(document.getElementById("AR_4").checked==true){document.getElementById("AR").value=4; document.getElementById("AR_1").checked=false; 
    document.getElementById("AR_2").checked=false; document.getElementById("AR_3").checked=false;}else{document.getElementById("AR").value=0;} }
}
function FunNCIR(v)
{ if(v==1)
  { if(document.getElementById("NCIR_1").checked==true){document.getElementById("NCIR").value=1; document.getElementById("NCIR_2").checked=false; 
    document.getElementById("NCIR_3").checked=false; document.getElementById("NCIR_4").checked=false;}else{document.getElementById("NCIR").value=0;} }
  else if(v==2)
  { if(document.getElementById("NCIR_2").checked==true){document.getElementById("NCIR").value=2; document.getElementById("NCIR_3").checked=false; 
    document.getElementById("NCIR_4").checked=false; document.getElementById("NCIR_1").checked=false;}else{document.getElementById("NCIR").value=0;} }	
  else if(v==3)
  { if(document.getElementById("NCIR_3").checked==true){document.getElementById("NCIR").value=3; document.getElementById("NCIR_4").checked=false; 
    document.getElementById("NCIR_1").checked=false; document.getElementById("NCIR_2").checked=false;}else{document.getElementById("NCIR").value=0;} }
  else if(v==4)
  { if(document.getElementById("NCIR_4").checked==true){document.getElementById("NCIR").value=4; document.getElementById("NCIR_1").checked=false; 
    document.getElementById("NCIR_2").checked=false; document.getElementById("NCIR_3").checked=false;}else{document.getElementById("NCIR").value=0;} }
}

function FunOTH(v)
{ if(v==1)
  { if(document.getElementById("OTH_1").checked==true){document.getElementById("OTH").value=1; document.getElementById("OTH_2").checked=false; 
    document.getElementById("OTH_3").checked=false; document.getElementById("OTH_4").checked=false;}else{document.getElementById("OTH").value=0;} }
  else if(v==2)
  { if(document.getElementById("OTH_2").checked==true){document.getElementById("OTH").value=2; document.getElementById("OTH_3").checked=false; 
    document.getElementById("OTH_4").checked=false; document.getElementById("OTH_1").checked=false;}else{document.getElementById("OTH").value=0;} }	
  else if(v==3)
  { if(document.getElementById("OTH_3").checked==true){document.getElementById("OTH").value=3; document.getElementById("OTH_4").checked=false; 
    document.getElementById("OTH_1").checked=false; document.getElementById("OTH_2").checked=false;}else{document.getElementById("OTH").value=0;} }
  else if(v==4)
  { if(document.getElementById("OTH_4").checked==true){document.getElementById("OTH").value=4; document.getElementById("OTH_1").checked=false; 
    document.getElementById("OTH_2").checked=false; document.getElementById("OTH_3").checked=false;}else{document.getElementById("OTH").value=0;} }
}

function funyn6(v)
{ 
 if(v=='Y')
 { if(document.getElementById("Yes_6").checked==true)
   {document.getElementById("No_6").checked=false; document.getElementById("Q6_Ans").value='Y';}
   else{document.getElementById("Q6_Ans").value='';}
 }
 else if(v=='N')
 { if(document.getElementById("No_6").checked==true)
   {document.getElementById("Yes_6").checked=false; document.getElementById("Q6_Ans").value='N';}
   else{document.getElementById("Q6_Ans").value='';}
 }
}
function funyn7(v)
{ 
 if(v=='Y')
 { if(document.getElementById("Yes_7").checked==true)
   {document.getElementById("No_7").checked=false; document.getElementById("Q7_Ans").value='Y';}
   else{document.getElementById("Q7_Ans").value='';}
 }
 else if(v=='N')
 { if(document.getElementById("No_7").checked==true)
   {document.getElementById("Yes_7").checked=false; document.getElementById("Q7_Ans").value='N';}
   else{document.getElementById("Q7_Ans").value='';}
 }
}

function validate2(form2name)
{ 
  var FRI = form2name.FRI.value; var HP = form2name.HP.value; var OB = form2name.OB.value; var PGR = form2name.PGR.value; var LOC = form2name.LOC.value;
  var LPO = form2name.LPO.value; var JANM = form2name.JANM.value; var BJBP = form2name.BJBP.value; var HS = form2name.HS.value; var LOCOP = form2name.LOCOP.value;
  var IAU = form2name.IAU.value; var LOCOM = form2name.LOCOM.value; var DIDM = form2name.DIDM.value; var UTP = form2name.UTP.value; var US = form2name.US.value;
  var HJ = form2name.HJ.value; var WH = form2name.WH.value; var JITM = form2name.JITM.value; var NFOC = form2name.NFOC.value; var IPI = form2name.IPI.value;
  var IIAB = form2name.IIAB.value; var AR = form2name.AR.value; var NCIR = form2name.NCIR.value; 
  if(FRI==0){ alert("Please assign number for reason Rank I(a)."); return false;} if(HP==0){ alert("Please assign number for reason Rank I(b)."); return false; } if(OB==0){ alert("Please assign number for reason Rank I(c)."); return false; } if(PGR==0){ alert("Please assign number for reason Rank II(a)."); return false;} if(LOC==0){ alert("Please assign number for reason Rank II(b)."); return false;} if(LPO==0){ alert("Please assign number for reason Rank II(c)."); return false;} if(JANM==0){ alert("Please assign number for reason Rank II(d)."); return false;} if(BJBP==0){ alert("Please assign number for reason Rank II(e)."); return false;} if(HS==0){ alert("Please assign number for reason Rank II(f)."); return false;} if(LOCOP==0){ alert("Please assign number for reason Rank III(a)."); return false;} if(IAU==0){ alert("Please assign number for reason Rank III(b)."); return false;} if(LOCOM==0){ alert("Please assign number for reason Rank III(c)."); return false;} if(DIDM==0){ alert("Please assign number for reason Rank III(d)."); return false;} if(UTP==0){ alert("Please assign number for reason Rank III(e)."); return false;} if(US==0){ alert("Please assign number for reason Rank IV(a)."); return false;} if(HJ==0){ alert("Please assign number for reason Rank IV(b)."); return false;} if(WH==0){ alert("Please assign number for reason Rank IV(c)."); return false;} if(JITM==0){ alert("Please assign number for reason Rank IV(d)."); return false;} if(NFOC==0){ alert("Please assign number for reason Rank IV(e)."); return false;} if(IPI==0){ alert("Please assign number for reason Rank V(a)."); return false;} if(IIAB==0){ alert("Please assign number for reason Rank V(b)."); return false;} if(AR==0){ alert("Please assign number for reason Rank VI(a)."); return false;} if(NCIR==0){ alert("Please assign number for reason Rank VI(b)."); return false;}

  var Q1_1 = form2name.Q1_1.value;  var Q1_2 = form2name.Q1_2.value; var Q2_1 = form2name.Q2_1.value;  var Q2_2 = form2name.Q2_2.value;
  var Q3_1 = form2name.Q3_1.value;  var Q3_2 = form2name.Q3_2.value; var Q4_1 = form2name.Q4_1.value;  var Q4_2 = form2name.Q4_2.value;
  var Q5_1 = form2name.Q5_1.value;  var Q5_2 = form2name.Q5_2.value; var Q6 = form2name.Q6_Ans.value; var Q7 = form2name.Q7_Ans.value;
  if(Q1_1.length === 0 && Q1_2.length === 0){ alert("Please type answer in Q1.");  return false; }
  if(Q2_1.length === 0 && Q2_2.length === 0){ alert("Please type answer in Q2.");  return false; }
  if(Q3_1.length === 0 && Q3_2.length === 0){ alert("Please type answer in Q3.");  return false; }
  if(Q4_1.length === 0 && Q4_2.length === 0){ alert("Please type answer in Q4.");  return false; }
  if(Q5_1.length === 0 && Q5_2.length === 0){ alert("Please type answer in Q5.");  return false; }
  if(Q6==''){ alert("Please select option in Q6.");  return false; }
  if(Q7==''){ alert("Please select option in Q7.");  return false; }
  
  var ComName = form2name.ComName.value; var Location = form2name.Location.value; var Designation = form2name.Designation.value; 
  var hike = form2name.hike.value; var OthBefit = form2name.OthBefit.value; 
  
  if(ComName.length === 0){ alert("Please type company name.");  return false; }
  if(Location.length === 0){ alert("Please type location name.");  return false; }  

  if(Designation.length === 0){ alert("Please type designation name.");  return false; }
  if(hike.length === 0){ alert("Please type hike in compensation .");  return false; }  
  //if(OthBefit.length === 0){ alert("Please type other benifit.");  return false; }  

  var agree=confirm("Are you sure you ?");
  if(agree){ return true; }else{ return false; }
  
}

function printp(si){ window.location="SepExitIntFormprint.php?act=act&si="+si; }
</script>
</head>
<body bgcolor="#E0DBE3">
<a href="#" onClick="printp(<?php echo $_REQUEST['si']; ?>)" style="font-size:14px;font-family:Times New Roman;">print</a>
<?php 
$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resSE['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];
?>
<table>
<tr>
<td>
<td>
<form enctype="multipart/form-data" name="form2name" method="post" onSubmit="return validate2(this)">
 <table>
  <tr><td class="Text" style="">&nbsp;<b>EC :&nbsp;<?php echo $resE['EmpCode']; ?>/&nbsp;&nbsp;Name :&nbsp;<?php echo $NameE; ?></b></td></tr>
  <tr><td class="Text2" style="color:#006200;" align="center"><b>EXIT INTERVIEW FORM</b></td></tr>
 <tr>
  <td>
   <table border="1">
    <tr bgcolor="#7a6189">
      <td align="center" style="color:#FFFFFF;" class="All_30"><b>Rank</b></td>
	  <td align="center" style="color:#FFFFFF;" class="All_500"><b>Reason</b></td>
	  <td align="center" style="color:#FFFFFF;" class="All_40"><b>4</b></td>
	  <td align="center" style="color:#FFFFFF;" class="All_40"><b>3</b></td>
	  <td align="center" style="color:#FFFFFF;" class="All_40"><b>2</b></td>	
	  <td align="center" style="color:#FFFFFF;" class="All_40"><b>1</b></td>	
    </tr>
<?php $sql=mysql_query("select hrm_employee_separation_exitint.*, Emp_ExitInt from hrm_employee_separation_exitint INNER JOIN hrm_employee_separation ON hrm_employee_separation_exitint.EmpSepId=hrm_employee_separation.EmpSepId where hrm_employee_separation.EmpSepId=".$_REQUEST['si'], $con); 
$row=mysql_num_rows($sql); if($row>0){$res=mysql_fetch_assoc($sql);} ?>	
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30" bgcolor="#FFFFD7"><b>I</b></td>
	  <td colspan="6" align="" style="font-size:14px;height:20px;width:660px;font-family:Times New Roman;" bgcolor="#FFFFD7">&nbsp;<b>PERSONAL&nbsp;<font color="#FF0000">*</font></b></td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;a)&nbsp;Family related issues<input type="hidden" name="FRI" id="FRI" value="<?php if($row>0){echo $res['FRI'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="FRI_4" onClick="FunFRI(4)" <?php if($res['FRI']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="FRI_3" onClick="FunFRI(3)" <?php if($res['FRI']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="FRI_2" onClick="FunFRI(2)" <?php if($res['FRI']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="FRI_1" onClick="FunFRI(1)" <?php if($res['FRI']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;b)&nbsp;Health problems<input type="hidden" name="HP" id="HP" value="<?php if($row>0){echo $res['HP'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="HP_4" onClick="FunHP(4)" <?php if($res['HP']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="HP_3" onClick="FunHP(3)" <?php if($res['HP']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="HP_2" onClick="FunHP(2)" <?php if($res['HP']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="HP_1" onClick="FunHP(1)" <?php if($res['HP']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;c)&nbsp;Own business<input type="hidden" name="OB" id="OB" value="<?php if($row>0){echo $res['OB'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="OB_4" onClick="FunOB(4)" <?php if($res['OB']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="OB_3" onClick="FunOB(3)" <?php if($res['OB']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="OB_2" onClick="FunOB(2)" <?php if($res['OB']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="OB_1" onClick="FunOB(1)" <?php if($res['OB']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30" bgcolor="#FFFFD7"><b>II</b></td>
	  <td colspan="6" align="" style="font-size:14px;height:20px;width:660px;font-family:Times New Roman;" bgcolor="#FFFFD7">&nbsp;<b>PROFESSIONAL GROWTH RELATED&nbsp;<font color="#FF0000">*</font></b></td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;a)&nbsp;Inadequate training and development activities.<input type="hidden" name="PGR" id="PGR" value="<?php if($row>0){echo $res['PGR'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="PGR_4" onClick="FunPGR(4)" <?php if($res['PGR']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="PGR_3" onClick="FunPGR(3)" <?php if($res['PGR']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="PGR_2" onClick="FunPGR(2)" <?php if($res['PGR']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="PGR_1" onClick="FunPGR(1)" <?php if($res['PGR']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;b)&nbsp;Lack of challenge in the work.<input type="hidden" name="LOC" id="LOC" value="<?php if($row>0){echo $res['LOC'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="LOC_4" onClick="FunLOC(4)" <?php if($res['LOC']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LOC_3" onClick="FunLOC(3)" <?php if($res['LOC']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LOC_2" onClick="FunLOC(2)" <?php if($res['LOC']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="LOC_1" onClick="FunLOC(1)" <?php if($res['LOC']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;c)&nbsp;Low Promotional opportunities.<input type="hidden" name="LPO" id="LPO" value="<?php if($row>0){echo $res['LPO'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="LPO_4" onClick="FunLPO(4)" <?php if($res['LPO']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LPO_3" onClick="FunLPO(3)" <?php if($res['LPO']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LPO_2" onClick="FunLPO(2)" <?php if($res['LPO']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="LPO_1" onClick="FunLPO(1)" <?php if($res['LPO']==1){echo 'checked';} ?>/></td>		
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;d)&nbsp;Job allotted not matching with job aspirations.<input type="hidden" name="JANM" id="JANM" value="<?php if($row>0){echo $res['JANM'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="JANM_4" onClick="FunJANM(4)" <?php if($res['JANM']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="JANM_3" onClick="FunJANM(3)" <?php if($res['JANM']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="JANM_2" onClick="FunJANM(2)" <?php if($res['JANM']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="JANM_1" onClick="FunJANM(1)" <?php if($res['JANM']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;e)&nbsp;Better job/ better prospects<input type="hidden" name="BJBP" id="BJBP" value="<?php if($row>0){echo $res['BJBP'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="BJBP_4" onClick="FunBJBP(4)" <?php if($res['BJBP']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="BJBP_3" onClick="FunBJBP(3)" <?php if($res['BJBP']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="BJBP_2" onClick="FunBJBP(2)" <?php if($res['BJBP']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="BJBP_1" onClick="FunBJBP(1)" <?php if($res['BJBP']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;f)&nbsp;Higher studies<input type="hidden" name="HS" id="HS" value="<?php if($row>0){echo $res['HS'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="HS_4" onClick="FunHS(4)" <?php if($res['HS']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="HS_3" onClick="FunHS(3)" <?php if($res['HS']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="HS_2" onClick="FunHS(2)" <?php if($res['HS']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="HS_1" onClick="FunHS(1)" <?php if($res['HS']==1){echo 'checked';} ?>/></td>		
    </tr>	
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30" bgcolor="#FFFFD7"><b>III</b></td>
	  <td colspan="6" align="" style="font-size:14px;height:20px;width:660px;font-family:Times New Roman;" bgcolor="#FFFFD7">&nbsp;<b>PROFESSIONAL ATMOSPHERE CONDITIONS&nbsp;<font color="#FF0000">*</font></b></td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;a)&nbsp;Lack of clarity on policies<input type="hidden" name="LOCOP" id="LOCOP" value="<?php if($row>0){echo $res['LOCOP'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="LOCOP_4" onClick="FunLOCOP(4)" <?php if($res['LOCOP']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LOCOP_3" onClick="FunLOCOP(3)" <?php if($res['LOCOP']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LOCOP_2" onClick="FunLOCOP(2)" <?php if($res['LOCOP']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="LOCOP_1" onClick="FunLOCOP(1)" <?php if($res['LOCOP']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;b)&nbsp;Insecurity and uncertainty in day-to-day working<input type="hidden" name="IAU" id="IAU" value="<?php if($row>0){echo $res['IAU'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="IAU_4" onClick="FunIAU(4)" <?php if($res['IAU']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="IAU_3" onClick="FunIAU(3)" <?php if($res['IAU']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="IAU_2" onClick="FunIAU(2)" <?php if($res['IAU']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="IAU_1" onClick="FunIAU(1)" <?php if($res['IAU']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;c)&nbsp;Lack of communication<input type="hidden" name="LOCOM" id="LOCOM" value="<?php if($row>0){echo $res['LOCOM'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="LOCOM_4" onClick="FunLOCOM(4)" <?php if($res['LOCOM']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LOCOM_3" onClick="FunLOCOM(3)" <?php if($res['LOCOM']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LOCOM_2" onClick="FunLOCOM(2)" <?php if($res['LOCOM']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="LOCOM_1" onClick="FunLOCOM(1)" <?php if($res['LOCOM']==1){echo 'checked';} ?>/></td>		
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;d)&nbsp;Delays in decision-making<input type="hidden" name="DIDM" id="DIDM" value="<?php if($row>0){echo $res['DIDM'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="DIDM_4" onClick="FunDIDM(4)" <?php if($res['DIDM']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="DIDM_3" onClick="FunDIDM(3)" <?php if($res['DIDM']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="DIDM_2" onClick="FunDIDM(2)" <?php if($res['DIDM']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="DIDM_1" onClick="FunDIDM(1)" <?php if($res['DIDM']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;e)&nbsp;Unfair treatment, partiality<input type="hidden" name="UTP" id="UTP" value="<?php if($row>0){echo $res['UTP'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="UTP_4" onClick="FunUTP(4)" <?php if($res['UTP']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="UTP_3" onClick="FunUTP(3)" <?php if($res['UTP']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="UTP_2" onClick="FunUTP(2)" <?php if($res['UTP']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="UTP_1" onClick="FunUTP(1)" <?php if($res['UTP']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30" bgcolor="#FFFFD7"><b>IV</b></td>
	  <td colspan="6" align="" style="font-size:14px;height:20px;width:660px;font-family:Times New Roman;" bgcolor="#FFFFD7">&nbsp;<b>PROFESSIONAL WORKING CONDITIONS&nbsp;<font color="#FF0000">*</font></b></td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;a)&nbsp;Unclean Surroundings<input type="hidden" name="US" id="US" value="<?php if($row>0){echo $res['US'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="US_4" onClick="FunUS(4)" <?php if($res['US']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="US_3" onClick="FunUS(3)" <?php if($res['US']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="US_2" onClick="FunUS(2)" <?php if($res['US']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="US_1" onClick="FunUS(1)" <?php if($res['US']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;b)&nbsp;Hardship/ Job is too stressful<input type="hidden" name="HJ" id="HJ" value="<?php if($row>0){echo $res['HJ'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="HJ_4" onClick="FunHJ(4)" <?php if($res['HJ']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="HJ_3" onClick="FunHJ(3)" <?php if($res['HJ']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="HJ_2" onClick="FunHJ(2)" <?php if($res['HJ']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="HJ_1" onClick="FunHJ(1)" <?php if($res['HJ']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;c)&nbsp;Working hours<input type="hidden" name="WH" id="WH" value="<?php if($row>0){echo $res['WH'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="WH_4" onClick="FunWH(4)" <?php if($res['WH']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="WH_3" onClick="FunWH(3)" <?php if($res['WH']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="WH_2" onClick="FunWH(2)" <?php if($res['WH']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="WH_1" onClick="FunWH(1)" <?php if($res['WH']==1){echo 'checked';} ?>/></td>		
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;d)&nbsp;Job involves too much of travel<input type="hidden" name="JITM" id="JITM" value="<?php if($row>0){echo $res['JITM'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="JITM_4" onClick="FunJITM(4)" <?php if($res['JITM']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="JITM_3" onClick="FunJITM(3)" <?php if($res['JITM']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="JITM_2" onClick="FunJITM(2)" <?php if($res['JITM']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="JITM_1" onClick="FunJITM(1)" <?php if($res['JITM']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;e)&nbsp;Non Fulfillment of commitments by the company<input type="hidden" name="NFOC" id="NFOC" value="<?php if($row>0){echo $res['NFOC'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="NFOC_4" onClick="FunNFOC(4)" <?php if($res['NFOC']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="NFOC_3" onClick="FunNFOC(3)" <?php if($res['NFOC']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="NFOC_2" onClick="FunNFOC(2)" <?php if($res['NFOC']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="NFOC_1" onClick="FunNFOC(1)" <?php if($res['NFOC']==1){echo 'checked';} ?>/></td>	
    </tr>	
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30" bgcolor="#FFFFD7"><b>V</b></td>
	  <td colspan="6" align="" style="font-size:14px;height:20px;width:660px;font-family:Times New Roman;" bgcolor="#FFFFD7">&nbsp;<b>PROFESSIONAL COMPENSATION RELATED&nbsp;<font color="#FF0000">*</font></b></td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;a)&nbsp;Inadequate pay & Increments in relation to the industry<input type="hidden" name="IPI" id="IPI" value="<?php if($row>0){echo $res['IPI'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="IPI_4" onClick="FunIPI(4)" <?php if($res['IPI']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="IPI_3" onClick="FunIPI(3)" <?php if($res['IPI']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="IPI_2" onClick="FunIPI(2)" <?php if($res['IPI']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="IPI_1" onClick="FunIPI(1)" <?php if($res['IPI']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;b)&nbsp;Inadequate incentives and bonus<input type="hidden" name="IIAB" id="IIAB" value="<?php if($row>0){echo $res['IIAB'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="IIAB_4" onClick="FunIIAB(4)" <?php if($res['IIAB']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="IIAB_3" onClick="FunIIAB(3)" <?php if($res['IIAB']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="IIAB_2" onClick="FunIIAB(2)" <?php if($res['IIAB']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="IIAB_1" onClick="FunIIAB(1)" <?php if($res['IIAB']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30" bgcolor="#FFFFD7"><b>VI</b></td>
	  <td colspan="6" align="" style="font-size:14px;height:20px;width:660px;font-family:Times New Roman;" bgcolor="#FFFFD7">&nbsp;<b>PROFESSIONAL ROLE RELATED&nbsp;<font color="#FF0000">*</font></b></td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;a)&nbsp;Ambiguous role<input type="hidden" name="AR" id="AR" value="<?php if($row>0){echo $res['AR'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="AR_4" onClick="FunAR(4)" <?php if($res['AR']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="AR_3" onClick="FunAR(3)" <?php if($res['AR']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="AR_2" onClick="FunAR(2)" <?php if($res['AR']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="AR_1" onClick="FunAR(1)" <?php if($res['AR']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;b)&nbsp;No clarity in reporting relations<input type="hidden" name="NCIR" id="NCIR" value="<?php if($row>0){echo $res['NCIR'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="NCIR_4" onClick="FunNCIR(4)" <?php if($res['NCIR']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="NCIR_3" onClick="FunNCIR(3)" <?php if($res['NCIR']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="NCIR_2" onClick="FunNCIR(2)" <?php if($res['NCIR']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="NCIR_1" onClick="FunNCIR(1)" <?php if($res['NCIR']==1){echo 'checked';} ?>/></td>	
    </tr>	
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30" bgcolor="#FFFFD7"><b>VII</b></td>
	  <td align="" style="" class="All_500" bgcolor="#FFFFD7">&nbsp;<b>OTHERS</b>&nbsp;{state reason not covered above}<input type="hidden" name="OTH" id="OTH" value="<?php if($row>0){echo $res['OTH'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="OTH_4" onClick="FunOTH(4)" <?php if($res['OTH']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="OTH_3" onClick="FunOTH(3)" <?php if($res['OTH']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="OTH_2" onClick="FunOTH(2)" <?php if($res['OTH']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="OTH_1" onClick="FunOTH(1)" <?php if($res['OTH']==1){echo 'checked';} ?>/></td>	
    </tr>
   </table>
  </td>
 </tr>
 <tr><td style="height:20px;">&nbsp;</td></tr>
 <tr><td style="width:690px;font-family:Times New Roman;font-size:16px;" align="center"><b>Kindly fill in the given questions</b></td></tr>
 <tr bgcolor="#FFFFFF">
   <td style="width:690px;">
    <table style="width:690px;" border="1">
	 <tr><td colspan="2" style="font-size:14px;font-family:Times New Roman;width:690px;" bgcolor="#FFFFD7"><b>1.</b> What are your primary reasons for leaving?&nbsp;<font color="#FF0000">*</font></td></tr> 
	 <tr>
	   <td rowspan="2" style="" class="All_30" bgcolor="#FFFFFF" valign="top"><b>Ans.</b></td>
	   <td style="" bgcolor="#FFFFFF"><input name="Q1_1" style="width:660px; border-style:hidden;" value="<?php echo $res['Q1_1']; ?>" maxlength="250"/></td>
	 </tr>
	 <tr><td style="" bgcolor="#FFFFFF"><input name="Q1_2" style="width:660px; border-style:hidden;" value="<?php echo $res['Q1_2']; ?>" maxlength="250"/></td></tr>
	 <tr><td colspan="2" style="font-size:14px;font-family:Times New Roman;width:690px;" bgcolor="#FFFFD7"><b>2.</b> What did you find most satisfying about your job?&nbsp;<font color="#FF0000">*</font></td></tr> 
	 <tr>
	   <td rowspan="2" style="" class="All_30" bgcolor="#FFFFFF" valign="top"><b>Ans.</b></td>
	   <td style="" bgcolor="#FFFFFF"><input name="Q2_1" style="width:660px; border-style:hidden;" value="<?php echo $res['Q2_1']; ?>" maxlength="250"/></td>
	 </tr>
	 <tr><td style="" bgcolor="#FFFFFF"><input name="Q2_2" style="width:660px; border-style:hidden;" value="<?php echo $res['Q2_2']; ?>" maxlength="250"/></td></tr>
	 <tr><td colspan="2" style="font-size:14px;font-family:Times New Roman;width:690px;" bgcolor="#FFFFD7"><b>3.</b> What did you find most dissatisfying regarding your job?&nbsp;<font color="#FF0000">*</font></td></tr> 
	 <tr>
	   <td rowspan="2" style="" class="All_30" bgcolor="#FFFFFF" valign="top"><b>Ans.</b></td>
	   <td style="" bgcolor="#FFFFFF"><input name="Q3_1" style="width:660px; border-style:hidden;" value="<?php echo $res['Q3_1']; ?>" maxlength="250"/></td>
	 </tr>
	 <tr><td style="" bgcolor="#FFFFFF"><input name="Q3_2" style="width:660px; border-style:hidden;" value="<?php echo $res['Q3_2']; ?>" maxlength="250"/></td></tr>
	 <tr><td colspan="2" style="font-size:14px;font-family:Times New Roman;width:690px;" bgcolor="#FFFFD7"><b>4.</b> Were there any company policies or procedures that made your work more difficult?&nbsp;<font color="#FF0000">*</font></td></tr> 
	 <tr>
	   <td rowspan="2" style="" class="All_30" bgcolor="#FFFFFF" valign="top"><b>Ans.</b></td>
	   <td style="" bgcolor="#FFFFFF"><input name="Q4_1" style="width:660px; border-style:hidden;" value="<?php echo $res['Q4_1']; ?>" maxlength="250"/></td>
	 </tr>
	 <tr><td style="" bgcolor="#FFFFFF"><input name="Q4_2" style="width:660px; border-style:hidden;" value="<?php echo $res['Q4_2']; ?>" maxlength="250"/></td></tr>
	 <tr><td colspan="2" style="font-size:14px;font-family:Times New Roman;width:690px;" bgcolor="#FFFFD7"><b>5.</b> Is there anything the company could have done to prevent you from leaving?&nbsp;<font color="#FF0000">*</font></td></tr> 
	 <tr>
	   <td rowspan="2" style="" class="All_30" bgcolor="#FFFFFF" valign="top"><b>Ans.</b></td>
	   <td style="" bgcolor="#FFFFFF"><input name="Q5_1" style="width:660px; border-style:hidden;" value="<?php echo $res['Q5_1']; ?>" maxlength="250"/></td>
	 </tr>
	 <tr><td style="" bgcolor="#FFFFFF"><input name="Q5_2" style="width:660px; border-style:hidden;" value="<?php echo $res['Q5_2']; ?>" maxlength="250"/></td></tr>
     <tr><td colspan="2" style="font-size:14px;font-family:Times New Roman;width:690px;" bgcolor="#FFFFD7"><b>6.</b> Would you recommend this company to a friend as a good place to work?&nbsp;<font color="#FF0000">*</font></td></tr>  	 
	 <tr>
	   <td style="" class="All_30" bgcolor="#FFFFFF" valign="top"><b>Ans.</b></td>
	   <td style="" bgcolor="#FFFFFF" class="All_500">
	   &nbsp;Yes&nbsp;<input type="checkbox" id="Yes_6" onClick="funyn6('Y')" <?php if($res['Q6']=='Y'){echo 'checked';} ?>/>&nbsp;&nbsp;
	   No&nbsp;<input type="checkbox" id="No_6" onClick="funyn6('N')" <?php if($res['Q6']=='N'){echo 'checked';} ?>/>
	   <input type="hidden" id="Q6_Ans" name="Q6_Ans" value="<?php echo $res['Q6']; ?>" />
	   </td>
	 </tr>
	 <tr><td colspan="2" style="font-size:14px;font-family:Times New Roman;width:690px;" bgcolor="#FFFFD7"><b>7.</b> Would you consider returning to this company in the future?&nbsp;<font color="#FF0000">*</font></td></tr> 
	 <tr>
	   <td style="" class="All_30" bgcolor="#FFFFFF" valign="top"><b>Ans.</b></td>
	   <td style="" bgcolor="#FFFFFF" class="All_500">
	   &nbsp;Yes&nbsp;<input type="checkbox" id="Yes_7" onClick="funyn7('Y')" <?php if($res['Q7']=='Y'){echo 'checked';} ?>/>&nbsp;&nbsp;
	   No&nbsp;<input type="checkbox" id="No_7" onClick="funyn7('N')" <?php if($res['Q7']=='N'){echo 'checked';} ?>/>
	   <input type="hidden" id="Q7_Ans" name="Q7_Ans" value="<?php echo $res['Q7']; ?>" />
	   </td>
	 </tr>
	</table>
   </td>
 </tr>

 <tr><td style="height:20px;">&nbsp;</td></tr>
 <tr><td style="width:690px;font-family:Times New Roman;font-size:16px;" align="">&nbsp;<b>About your new job</b></td></tr>
 <tr>
   <td style="width:690px;">
    <table style="width:690px;" border="0">
	 <tr>
	   <td style="width:100px;">&nbsp;</td>
	   <td style="font-size:14px;font-family:Times New Roman;width:200px;">Name of the company&nbsp;<font color="#FF0000">*</font> :</td>
	   <td style="width:390px;"><input name="ComName" style="width:390px;border-style:hidden;border-bottom-style:solid;border-bottom-color:#000000;background-color:#E0DBE3;" value="<?php echo $res['ComName']; ?>" maxlength="50"/>
	   </td>
	 </tr> 
	 <tr>
	   <td style="width:100px;">&nbsp;</td>
	   <td style="font-size:14px;font-family:Times New Roman;width:200px;">Location&nbsp;<font color="#FF0000">*</font> :</td>
	   <td style="width:390px;"><input name="Location" style="width:390px;border-style:hidden;border-bottom-style:solid;border-bottom-color:#000000;background-color:#E0DBE3;" value="<?php echo $res['Location']; ?>" maxlength="100"/>
	   </td>
	 </tr>
	 <tr>
	   <td style="width:100px;">&nbsp;</td>
	   <td style="font-size:14px;font-family:Times New Roman;width:200px;">Designation&nbsp;<font color="#FF0000">*</font> :</td>
	   <td style="width:390px;"><input name="Designation" style="width:390px;border-style:hidden;border-bottom-style:solid;border-bottom-color:#000000;background-color:#E0DBE3;" value="<?php echo $res['Designation']; ?>" maxlength="50"/>
	   </td>
	 </tr> 
	 <tr>
	   <td style="width:100px;">&nbsp;</td>
	   <td style="font-size:14px;font-family:Times New Roman;width:200px;">% hike in compensation&nbsp;<font color="#FF0000">*</font> :</td>
	   <td style="width:390px;"><input name="hike" style="width:390px;border-style:hidden;border-bottom-style:solid;border-bottom-color:#000000;background-color:#E0DBE3;" value="<?php echo $res['hike']; ?>" maxlength="50"/>
	   </td>
	 </tr> 
	 <tr>
	   <td style="width:100px;">&nbsp;</td>
	   <td style="font-size:14px;font-family:Times New Roman;width:200px;">Other benefits :</td>
	   <td style="width:390px;"><input name="OthBefit" style="width:390px;border-style:hidden;border-bottom-style:solid;border-bottom-color:#000000;background-color:#E0DBE3;" value="<?php echo $res['OthBefit']; ?>" maxlength="200"/>
	   </td>
	 </tr>   
	 
	</table>
   </td>
  </tr> 
  
<?php $sql2=mysql_query("select Emp_ExitInt from hrm_employee_separation where EmployeeID=".$resSE['EmployeeID'], $con); $res2=mysql_fetch_assoc($sql2); ?>  
 <tr>
  <td colspan="7" align="Right" class="fontButton">
   
   <?php if($row>0){ ?>
   <font color="#FFFFA6">Save Date:</font>&nbsp;
   <font style="color:#FFF;"><?=date("d-m-Y",strtotime($res['FormSubmitDate']));?></font><?php } ?>
   &nbsp;&nbsp;      
      
   <input type="submit" id="SubmitExitInt" name="SubmitExitInt" value="save"/>
  </td>
 </tr>  
  	 
   </table>
  </td>
 </tr>
</table>
</form>
</td>
</tr>
</table>
</body>
</html>

