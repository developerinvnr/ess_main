<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************
$_SESSION['EmployeeID']=$_REQUEST['ID'];
$EMPID=$_SESSION['EmployeeID'];
//**********************************
if(isset($_POST['AddLangProfiE']))
{  $sql=mysql_query("select * from hrm_employee_langproficiency where EmployeeID=".$EMPID, $con); $res=mysql_num_rows($sql);
  //****************************************** If($res>0) Open *********************************************
   if($res>0) 
   { //$sqlDelete=mysql_query("DELETE FROM hrm_employee_langproficiency WHERE EmployeeID=".$EMPID, $con);
      $SqlLP = mysql_query("update hrm_employee_langproficiency set Write_lang='".$_POST['Ewrite']."', Read_lang='".$_POST['Eread']."', Speak_lang='".$_POST['Espeak']."', LangProCreatedBy=".$UserId.", LangProCreatedDate='".date('Y-m-d')."', LangProYearId=".$YearId." where LangCheck='E' AND EmployeeID=".$EMPID, $con);
	  $SqlLP = mysql_query("update hrm_employee_langproficiency set Write_lang='".$_POST['Hwrite']."', Read_lang='".$_POST['Hread']."', Speak_lang='".$_POST['Hspeak']."', LangProCreatedBy=".$UserId.", LangProCreatedDate='".date('Y-m-d')."', LangProYearId=".$YearId." where LangCheck='H' AND EmployeeID=".$EMPID, $con);
   
   if($_POST['RowLCount']!=0)  
   { for($i=1; $i<=$_POST['RowLCount']; $i++)
	 { if($_POST['Local_Lang'.$i]!='Not') 
	   { $SqlInsRow = mysql_query("update hrm_employee_langproficiency set Language='".$_POST['Local_Lang'.$i]."', Write_lang='".$_POST['Locwrite'.$i]."', Read_lang='".$_POST['Locread'.$i]."', Speak_lang='".$_POST['Locspeak'.$i]."', LangProCreatedBy=".$UserId.", LangProCreatedDate='".date('Y-m-d')."', LangProYearId=".$YearId." where LangProficiencyId=".$_POST['Extra_Id'.$i], $con);
	   }
     }
   }
   if($_POST['RowFCount']!=0)  
   { for($i=1; $i<=$_POST['RowFCount']; $i++)
	 { if($_POST['For_Lang'.$i]!='Not') 
	   { $SqlInsRow = mysql_query("update hrm_employee_langproficiency set Language='".$_POST['For_Lang'.$i]."', Write_lang='".$_POST['Forwrite'.$i]."', Read_lang='".$_POST['Forread'.$i]."', Speak_lang='".$_POST['Forspeak'.$i]."', LangProCreatedBy=".$UserId.", LangProCreatedDate='".date('Y-m-d')."', LangProYearId=".$YearId." where LangProficiencyId=".$_POST['Extra_ForId'.$i], $con);
	   }
     }
   }
   
  for($i=1; $i<=5; $i++)
  { if($_POST['LocalLang'.$i]!='Not' AND $_POST['LocalLang'.$i]!='' OR ($_POST['Loc'.$i.'write']!='N' OR $_POST['Loc'.$i.'read']!='N' OR $_POST['Loc'.$i.'speak']!='N'))
    { $SqlInsLangProfi_Loc = mysql_query("INSERT INTO hrm_employee_langproficiency (EmployeeID, Language, LangCheck, Write_lang, Read_lang, Speak_lang, LangProCreatedBy, LangProCreatedDate, LangProYearId) VALUES (".$EMPID.", '".$_POST['LocalLang'.$i]."', '".$_POST['Lo_LC'.$i]."', '".$_POST['Loc'.$i.'write']."', '".$_POST['Loc'.$i.'read']."', '".$_POST['Loc'.$i.'speak']."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con);  
	 }}	
  for($i=1; $i<=5; $i++)
  { if($_POST['ForLang'.$i]!='Not' AND $_POST['ForLang'.$i]!='' OR ($_POST['For'.$i.'write']!='N' OR $_POST['For'.$i.'read']!='N' OR $_POST['For'.$i.'speak']!='N'))
    { $SqlInsLangProfi_For = mysql_query("INSERT INTO hrm_employee_langproficiency (EmployeeID, Language, LangCheck, Write_lang, Read_lang, Speak_lang, LangProCreatedBy, LangProCreatedDate, LangProYearId) VALUES (".$EMPID.", '".$_POST['ForLang'.$i]."', '".$_POST['Fo_LC'.$i]."', '".$_POST['For'.$i.'write']."', '".$_POST['For'.$i.'read']."', '".$_POST['For'.$i.'speak']."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con);  
	}}
   if($SqlLP){ $msg = "data has been Inserted successfully..."; }	
   }
  //****************************************** If($res>0) Close *********************************************   
  //****************************************** else Open *********************************************   
   else
   {
    $SqlInsLangProfi = mysql_query("INSERT INTO hrm_employee_langproficiency(EmployeeID, Language, LangCheck, Write_lang, Read_lang, Speak_lang, LangProCreatedBy, LangProCreatedDate, LangProYearId) VALUES (".$EMPID.", 'English', '".$_POST['E_LC']."', '".$_POST['Ewrite']."', '".$_POST['Eread']."', '".$_POST['Espeak']."', ".$UserId.",'".date('Y-m-d')."',".$YearId."),(".$EMPID.", 'Hindi', '".$_POST['H_LC']."', '".$_POST['Hwrite']."', '".$_POST['Hread']."', '".$_POST['Hspeak']."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con);
	   
    for($i=1; $i<=5; $i++)
    { if($_POST['LocalLang'.$i]!='Not' AND $_POST['LocalLang'.$i]!='' OR ($_POST['Loc'.$i.'write']!='N' OR $_POST['Loc'.$i.'read']!='N' OR $_POST['Loc'.$i.'speak']!='N'))
      { $SqlInsLangProfi_Loc = mysql_query("INSERT INTO hrm_employee_langproficiency (EmployeeID, Language, LangCheck, Write_lang, Read_lang, Speak_lang, LangProCreatedBy, LangProCreatedDate, LangProYearId) VALUES (".$EMPID.", '".$_POST['LocalLang'.$i]."', '".$_POST['Lo_LC'.$i]."', '".$_POST['Loc'.$i.'write']."', '".$_POST['Loc'.$i.'read']."', '".$_POST['Loc'.$i.'speak']."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con);  
	  }}	
    for($i=1; $i<=5; $i++)
    { if($_POST['ForLang'.$i]!='Not' AND $_POST['ForLang'.$i]!='' OR ($_POST['For'.$i.'write']!='N' OR $_POST['For'.$i.'read']!='N' OR $_POST['For'.$i.'speak']!='N'))
      { $SqlInsLangProfi_For = mysql_query("INSERT INTO hrm_employee_langproficiency (EmployeeID, Language, LangCheck, Write_lang, Read_lang, Speak_lang, LangProCreatedBy, LangProCreatedDate, LangProYearId) VALUES (".$EMPID.", '".$_POST['ForLang'.$i]."', '".$_POST['Fo_LC'.$i]."', '".$_POST['For'.$i.'write']."', '".$_POST['For'.$i.'read']."', '".$_POST['For'.$i.'speak']."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con);  
	  }}	
   if($SqlInsLangProfi){ $msg = "data has been Inserted successfully..."; }    
   } 
  //****************************************** else Close *********************************************      
}

if(isset($_POST['EditLangProfiE']))
{  $sql=mysql_query("select * from hrm_employee_langproficiency where EmployeeID=".$EMPID, $con); $res=mysql_num_rows($sql);
   //****************************************** If($res>0) Open *********************************************
   if($res>0) 
   { //$sqlDelete=mysql_query("DELETE FROM hrm_employee_langproficiency WHERE EmployeeID=".$EMPID, $con);
      $SqlLP = mysql_query("update hrm_employee_langproficiency set Write_lang='".$_POST['Ewrite']."', Read_lang='".$_POST['Eread']."', Speak_lang='".$_POST['Espeak']."', LangProCreatedBy=".$UserId.", LangProCreatedDate='".date('Y-m-d')."', LangProYearId=".$YearId." where LangCheck='E' AND EmployeeID=".$EMPID, $con);
	  $SqlLP = mysql_query("update hrm_employee_langproficiency set Write_lang='".$_POST['Hwrite']."', Read_lang='".$_POST['Hread']."', Speak_lang='".$_POST['Hspeak']."', LangProCreatedBy=".$UserId.", LangProCreatedDate='".date('Y-m-d')."', LangProYearId=".$YearId." where LangCheck='H' AND EmployeeID=".$EMPID, $con);
   
   if($_POST['RowLCount']!=0)  
   { for($i=1; $i<=$_POST['RowLCount']; $i++)
	 { if($_POST['Local_Lang'.$i]!='Not') 
	   { $SqlInsRow = mysql_query("update hrm_employee_langproficiency set Language='".$_POST['Local_Lang'.$i]."', Write_lang='".$_POST['Locwrite'.$i]."', Read_lang='".$_POST['Locread'.$i]."', Speak_lang='".$_POST['Locspeak'.$i]."', LangProCreatedBy=".$UserId.", LangProCreatedDate='".date('Y-m-d')."', LangProYearId=".$YearId." where LangProficiencyId=".$_POST['Extra_Id'.$i], $con);
	   }
     }
   }
   if($_POST['RowFCount']!=0)  
   { for($i=1; $i<=$_POST['RowFCount']; $i++)
	 { if($_POST['For_Lang'.$i]!='Not') 
	   { $SqlInsRow = mysql_query("update hrm_employee_langproficiency set Language='".$_POST['For_Lang'.$i]."', Write_lang='".$_POST['Forwrite'.$i]."', Read_lang='".$_POST['Forread'.$i]."', Speak_lang='".$_POST['Forspeak'.$i]."', LangProCreatedBy=".$UserId.", LangProCreatedDate='".date('Y-m-d')."', LangProYearId=".$YearId." where LangProficiencyId=".$_POST['Extra_ForId'.$i], $con);
	   }
     }
   }
   
  for($i=1; $i<=5; $i++)
  { if($_POST['LocalLang'.$i]!='Not' AND $_POST['LocalLang'.$i]!='' OR ($_POST['Loc'.$i.'write']!='N' OR $_POST['Loc'.$i.'read']!='N' OR $_POST['Loc'.$i.'speak']!='N'))
    { $SqlInsLangProfi_Loc = mysql_query("INSERT INTO hrm_employee_langproficiency (EmployeeID, Language, LangCheck, Write_lang, Read_lang, Speak_lang, LangProCreatedBy, LangProCreatedDate, LangProYearId) VALUES (".$EMPID.", '".$_POST['LocalLang'.$i]."', '".$_POST['Lo_LC'.$i]."', '".$_POST['Loc'.$i.'write']."', '".$_POST['Loc'.$i.'read']."', '".$_POST['Loc'.$i.'speak']."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con);  
	 }}	
  for($i=1; $i<=5; $i++)
  { if($_POST['ForLang'.$i]!='Not' AND $_POST['ForLang'.$i]!='' OR ($_POST['For'.$i.'write']!='N' OR $_POST['For'.$i.'read']!='N' OR $_POST['For'.$i.'speak']!='N'))
    { $SqlInsLangProfi_For = mysql_query("INSERT INTO hrm_employee_langproficiency (EmployeeID, Language, LangCheck, Write_lang, Read_lang, Speak_lang, LangProCreatedBy, LangProCreatedDate, LangProYearId) VALUES (".$EMPID.", '".$_POST['ForLang'.$i]."', '".$_POST['Fo_LC'.$i]."', '".$_POST['For'.$i.'write']."', '".$_POST['For'.$i.'read']."', '".$_POST['For'.$i.'speak']."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con);  
	}}
   if($SqlLP){ $msg = "data has been Inserted successfully..."; }	
   }
//****************************************** If($res>0) Close *********************************************   
//****************************************** else Open *********************************************   
   else
   {
    $SqlInsLangProfi = mysql_query("INSERT INTO hrm_employee_langproficiency(EmployeeID, Language, LangCheck, Write_lang, Read_lang, Speak_lang, LangProCreatedBy, LangProCreatedDate, LangProYearId) VALUES (".$EMPID.", 'English', '".$_POST['E_LC']."', '".$_POST['Ewrite']."', '".$_POST['Eread']."', '".$_POST['Espeak']."', ".$UserId.",'".date('Y-m-d')."',".$YearId."),(".$EMPID.", 'Hindi', '".$_POST['H_LC']."', '".$_POST['Hwrite']."', '".$_POST['Hread']."', '".$_POST['Hspeak']."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con);
	   
    for($i=1; $i<=5; $i++)
    { if($_POST['LocalLang'.$i]!='Not' AND $_POST['LocalLang'.$i]!='' OR ($_POST['Loc'.$i.'write']!='N' OR $_POST['Loc'.$i.'read']!='N' OR $_POST['Loc'.$i.'speak']!='N'))
      { $SqlInsLangProfi_Loc = mysql_query("INSERT INTO hrm_employee_langproficiency (EmployeeID, Language, LangCheck, Write_lang, Read_lang, Speak_lang, LangProCreatedBy, LangProCreatedDate, LangProYearId) VALUES (".$EMPID.", '".$_POST['LocalLang'.$i]."', '".$_POST['Lo_LC'.$i]."', '".$_POST['Loc'.$i.'write']."', '".$_POST['Loc'.$i.'read']."', '".$_POST['Loc'.$i.'speak']."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con);  
	  }}	
    for($i=1; $i<=5; $i++)
    { if($_POST['ForLang'.$i]!='Not' AND $_POST['ForLang'.$i]!='' OR ($_POST['For'.$i.'write']!='N' OR $_POST['For'.$i.'read']!='N' OR $_POST['For'.$i.'speak']!='N'))
      { $SqlInsLangProfi_For = mysql_query("INSERT INTO hrm_employee_langproficiency (EmployeeID, Language, LangCheck, Write_lang, Read_lang, Speak_lang, LangProCreatedBy, LangProCreatedDate, LangProYearId) VALUES (".$EMPID.", '".$_POST['ForLang'.$i]."', '".$_POST['Fo_LC'.$i]."', '".$_POST['For'.$i.'write']."', '".$_POST['For'.$i.'read']."', '".$_POST['For'.$i.'speak']."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con);  
	  }}	
   if($SqlInsLangProfi){ $msg = "data has been Inserted successfully..."; }    
   } 
//****************************************** else Close *********************************************      
}

if($_REQUEST['Action']=='Delete' AND $_REQUEST['Action']!='')
{ $Delete=mysql_query("DELETE FROM hrm_employee_langproficiency WHERE LangProficiencyId=".$_REQUEST['Value'], $con);
  if($Delete){ $msg = "data has been deleted successfully..."; }
}

?> 
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/EmpMasterAddNewAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script language="javascript">
function EditLangProfi()
{document.getElementById("EditLangProfiE").style.display = 'block'; document.getElementById("ChangeLangProfi").style.display = 'none';
 document.getElementById("Ewrite").disabled = false; document.getElementById("Eread").disabled = false; document.getElementById("Espeak").disabled = false;
 document.getElementById("Hwrite").disabled = false; document.getElementById("Hread").disabled = false; document.getElementById("Hspeak").disabled = false;
 document.getElementById("LocalLang1").readOnly = false; document.getElementById("Loc1write").disabled = false; document.getElementById("Loc1read").disabled = false; document.getElementById("Loc1speak").disabled = false; document.getElementById("LocalLang2").readOnly = false; document.getElementById("Loc2write").disabled = false; document.getElementById("Loc2read").disabled = false; document.getElementById("Loc2speak").disabled = false; document.getElementById("LocalLang3").readOnly = false; document.getElementById("Loc3write").disabled = false; document.getElementById("Loc3read").disabled = false; document.getElementById("Loc3speak").disabled = false; document.getElementById("LocalLang4").readOnly = false; document.getElementById("Loc4write").disabled = false; document.getElementById("Loc4read").disabled = false; document.getElementById("Loc4speak").disabled = false; document.getElementById("LocalLang5").readOnly = false; document.getElementById("Loc5write").disabled = false; document.getElementById("Loc5read").disabled = false; document.getElementById("Loc5speak").disabled = false; document.getElementById("ForLang1").readOnly = false; document.getElementById("For1write").disabled = false; document.getElementById("For1read").disabled = false; document.getElementById("For1speak").disabled = false; document.getElementById("ForLang2").readOnly = false; document.getElementById("For2write").disabled = false; document.getElementById("For2read").disabled = false; document.getElementById("For2speak").disabled = false; document.getElementById("ForLang3").readOnly = false; document.getElementById("For3write").disabled = false; document.getElementById("For3read").disabled = false; document.getElementById("For3speak").disabled = false; document.getElementById("ForLang4").readOnly = false; document.getElementById("For4write").disabled = false; document.getElementById("For4read").disabled = false; document.getElementById("For4speak").disabled = false; document.getElementById("ForLang5").readOnly = false; document.getElementById("For5write").disabled = false; document.getElementById("For5read").disabled = false; document.getElementById("For5speak").disabled = false;
var Num = document.getElementById("RowCount").value;
 if(Num!=0)
  { for (i=1; i<=Num; i++)
    {document.getElementById("Local_Lang"+i).readOnly = false; document.getElementById("Locwrite"+i).disabled = false; 
	 document.getElementById("Locread"+i).disabled = false; document.getElementById("Locspeak"+i).disabled = false; } 
  } 
}


function ShowLocRow2()
{ if(document.getElementById("LocalLang1").value=='Not' || document.getElementById("LocalLang1").value=='')
  { alert("Please enter other language!")}
  else { document.getElementById("LocRow2").style.display = 'block'; document.getElementById("Locimg2").style.display = 'block';  document.getElementById("LocaddImg1").style.display = 'none'; document.getElementById("LocaddImg2").style.display = 'block'; document.getElementById("LocminusImg1").style.display = 'block'; document.getElementById("LocalLang2").value = "Not"; }
}
function HideLocRow2()
{document.getElementById("LocRow2").style.display = 'none'; document.getElementById("Locimg2").style.display = 'none'; 
 document.getElementById("LocaddImg1").style.display = 'block'; document.getElementById("LocminusImg1").style.display = 'none';
 document.getElementById("LocalLang2").value = ""; document.getElementById("Loc2write").checked = false; document.getElementById("Loc2read").checked = false;
 document.getElementById("Loc2speak").checked = false;
}
function ShowLocRow3()
{ if(document.getElementById("LocalLang2").value=='Not' || document.getElementById("LocalLang2").value=='')
  { alert("Please enter other language!")}
  else { document.getElementById("LocminusImg1").style.display = 'none'; document.getElementById("LocRow3").style.display = 'block'; document.getElementById("Locimg3").style.display = 'block'; document.getElementById("LocaddImg3").style.display = 'block'; document.getElementById("LocaddImg2").style.display = 'none'; document.getElementById("LocminusImg2").style.display = 'block'; document.getElementById("LocalLang3").value = "Not"; }
}
function HideLocRow3()
{document.getElementById("LocminusImg1").style.display = 'block'; 
 document.getElementById("LocRow3").style.display = 'none'; document.getElementById("Locimg3").style.display = 'none'; 
 document.getElementById("LocaddImg2").style.display = 'block'; document.getElementById("LocminusImg2").style.display = 'none';
 document.getElementById("LocalLang3").value = ""; document.getElementById("Loc3write").checked = false; document.getElementById("Loc3read").checked = false;
 document.getElementById("Loc3speak").checked = false;
} 
function ShowLocRow4()
{if(document.getElementById("LocalLang3").value=='Not' || document.getElementById("LocalLang3").value=='')
  { alert("Please enter other language!")}
  else {document.getElementById("LocminusImg2").style.display = 'none'; document.getElementById("LocRow4").style.display = 'block'; document.getElementById("Locimg4").style.display = 'block'; document.getElementById("LocaddImg4").style.display = 'block'; document.getElementById("LocaddImg3").style.display = 'none'; document.getElementById("LocminusImg3").style.display = 'block'; document.getElementById("LocalLang4").value = "Not"; }
}
function HideLocRow4()
{document.getElementById("LocminusImg2").style.display = 'block'; 
 document.getElementById("LocRow4").style.display = 'none'; document.getElementById("Locimg4").style.display = 'none'; 
 document.getElementById("LocaddImg3").style.display = 'block'; document.getElementById("LocminusImg3").style.display = 'none';
 document.getElementById("LocalLang4").value = ""; document.getElementById("Loc4write").checked = false; document.getElementById("Loc4read").checked = false;
 document.getElementById("Loc4speak").checked = false;
} 
function ShowLocRow5()
{ if(document.getElementById("LocalLang4").value=='Not' || document.getElementById("LocalLang4").value=='')
  { alert("Please enter other language!")}
  else { document.getElementById("LocminusImg3").style.display = 'none'; document.getElementById("LocRow5").style.display = 'block';   document.getElementById("LocaddImg4").style.display = 'none'; document.getElementById("LocminusImg4").style.display = 'block'; document.getElementById("LocalLang5").value = "Not"; }
}
function HideLocRow5()
{document.getElementById("LocminusImg3").style.display = 'block'; 
 document.getElementById("LocRow5").style.display = 'none';  document.getElementById("LocaddImg4").style.display = 'block'; 
 document.getElementById("LocminusImg4").style.display = 'none';  document.getElementById("LocalLang5").value = ""; 
 document.getElementById("Loc5write").checked = false; document.getElementById("Loc5read").checked = false;
 document.getElementById("Loc5speak").checked = false;
} 

function ShowForRow2()
{ if(document.getElementById("ForLang1").value=='Not' || document.getElementById("ForLang1").value=='')
  { alert("Please enter Foreign language!")}
  else { document.getElementById("ForRow2").style.display = 'block'; document.getElementById("Forimg2").style.display = 'block';  document.getElementById("ForaddImg1").style.display = 'none'; document.getElementById("ForaddImg2").style.display = 'block'; document.getElementById("ForminusImg1").style.display = 'block'; document.getElementById("ForLang2").value = "Not"; }
}
function HideForRow2()
{document.getElementById("ForRow2").style.display = 'none'; document.getElementById("Forimg2").style.display = 'none'; 
 document.getElementById("ForaddImg1").style.display = 'block'; document.getElementById("ForminusImg1").style.display = 'none';
 document.getElementById("ForLang2").value = ""; document.getElementById("For2write").checked = false; document.getElementById("For2read").checked = false;
 document.getElementById("For2speak").checked = false;
}
function ShowForRow3()
{ if(document.getElementById("ForLang2").value=='Not' || document.getElementById("ForLang2").value=='')
  { alert("Please enter Foreign language!")}
  else {document.getElementById("ForminusImg1").style.display = 'none'; document.getElementById("ForRow3").style.display = 'block'; document.getElementById("Forimg3").style.display = 'block'; document.getElementById("ForaddImg3").style.display = 'block'; document.getElementById("ForaddImg2").style.display = 'none'; document.getElementById("ForminusImg2").style.display = 'block'; document.getElementById("ForLang3").value = "Not";}
}
function HideForRow3()
{document.getElementById("ForminusImg1").style.display = 'block'; 
 document.getElementById("ForRow3").style.display = 'none'; document.getElementById("Forimg3").style.display = 'none'; 
 document.getElementById("ForaddImg2").style.display = 'block'; document.getElementById("ForminusImg2").style.display = 'none';
 document.getElementById("ForLang3").value = ""; document.getElementById("For3write").checked = false; document.getElementById("For3read").checked = false;
 document.getElementById("For3speak").checked = false;
} 
function ShowForRow4()
{if(document.getElementById("ForLang3").value=='Not' || document.getElementById("ForLang3").value=='')
  { alert("Please enter Foreign language!")}
  else {document.getElementById("ForminusImg2").style.display = 'none'; document.getElementById("ForRow4").style.display = 'block'; document.getElementById("Forimg4").style.display = 'block'; document.getElementById("ForaddImg4").style.display = 'block'; document.getElementById("ForaddImg3").style.display = 'none'; document.getElementById("ForminusImg3").style.display = 'block'; document.getElementById("ForLang4").value = "Not";}
}
function HideForRow4()
{document.getElementById("ForminusImg2").style.display = 'block'; 
 document.getElementById("ForRow4").style.display = 'none'; document.getElementById("Forimg4").style.display = 'none'; 
 document.getElementById("ForaddImg3").style.display = 'block'; document.getElementById("ForminusImg3").style.display = 'none';
 document.getElementById("ForLang4").value = ""; document.getElementById("For4write").checked = false; document.getElementById("For4read").checked = false;
 document.getElementById("For4speak").checked = false;
} 
function ShowForRow5()
{if(document.getElementById("ForLang4").value=='Not' || document.getElementById("ForLang4").value=='')
  { alert("Please enter Foreign language!")}
  else {document.getElementById("ForminusImg3").style.display = 'none'; document.getElementById("ForRow5").style.display = 'block';   document.getElementById("ForaddImg4").style.display = 'none'; document.getElementById("ForminusImg4").style.display = 'block'; document.getElementById("ForLang5").value = "Not"; }
}
function HideForRow5()
{document.getElementById("ForminusImg3").style.display = 'block'; 
 document.getElementById("ForRow5").style.display = 'none';  document.getElementById("ForaddImg4").style.display = 'block'; 
 document.getElementById("ForminusImg4").style.display = 'none';  document.getElementById("ForLang5").value = ""; 
 document.getElementById("For5write").checked = false; document.getElementById("For5read").checked = false;
 document.getElementById("For5speak").checked = false;
} 

function RefLangProfi()
{
document.getElementById("LocalLang1").value='Not'; document.getElementById("LocalLang2").value='Not'; document.getElementById("LocalLang3").value='Not'; document.getElementById("LocalLang4").value='Not'; document.getElementById("LocalLang5").value='Not'; document.getElementById("LocRow5").style.display='none'; document.getElementById("LocminusImg4").style.display='none'; document.getElementById("LocaddImg4").style.display='none';document.getElementById("LocRow4").style.display='none'; document.getElementById("LocminusImg3").style.display='none'; document.getElementById("LocaddImg3").style.display='none';document.getElementById("LocRow3").style.display='none'; document.getElementById("LocminusImg2").style.display='none'; document.getElementById("LocaddImg2").style.display='none';document.getElementById("LocRow2").style.display='none'; document.getElementById("LocminusImg1").style.display='none'; document.getElementById("LocaddImg1").style.display='block';

document.getElementById("ForLang1").value='Not'; document.getElementById("ForLang2").value='Not'; document.getElementById("ForLang3").value='Not'; document.getElementById("ForLang4").value='Not'; document.getElementById("ForLang5").value='Not'; document.getElementById("ForRow5").style.display='none'; document.getElementById("ForminusImg4").style.display='none'; document.getElementById("ForaddImg4").style.display='none'; document.getElementById("ForRow4").style.display='none'; document.getElementById("ForminusImg3").style.display='none'; document.getElementById("ForaddImg3").style.display='none'; document.getElementById("ForRow3").style.display='none'; document.getElementById("ForminusImg2").style.display='none'; document.getElementById("ForaddImg2").style.display='none'; document.getElementById("ForRow2").style.display='none'; document.getElementById("ForminusImg1").style.display='none'; document.getElementById("ForaddImg1").style.display='block';
}



function validate(formElangProfi) 
{ var LocalLang5 = formElangProfi.LocalLang5.value; 
  if (LocalLang5=='') { alert("Please enter local language!");  return false; }
  var ForLang5 = formElangProfi.ForLang5.value;
  if (ForLang5=='') { alert("Please enter Foreign language!");  return false; }
}

function ADDDelLang(value,Id)
{ var agree=confirm("Are you sure you want to delete this record?"); 
  if (agree) {  var x = "EmplangProfi.php?ID="+Id+"&Value="+value+"&Action=Delete&Event=Add";  window.location=x; }
}

function DelLangAdd(value,Id)
{ var agree=confirm("Are you sure you want to delete this record?"); 
  if (agree) {  var x = "EmplangProfi.php?ID="+Id+"&Value="+value+"&Action=Delete&Event=Add";  window.location=x; }
}

function DelLang(value,Id)
{ var agree=confirm("Are you sure you want to delete this record?"); 
  if (agree) {  var x = "EmplangProfi.php?ID="+Id+"&Value="+value+"&Action=Delete&Event=Edit";  window.location=x; }
}
</script>
</head>
<body class="body">
<?php $SqlEmp = mysql_query("SELECT *,hrm_employee_general.*,hrm_employee_personal.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$EMPID, $con) or die(mysql_error());  $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
      if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
?>	  
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){require_once("AMenu.php"); } ?></td></tr></table></td></tr>
<tr><td valign="top">
      <table width="100%" style="margin-top:0px;" border="0">
	    <tr><td valign="top"><?php if($_SESSION['login'] = true){require_once("AWelcome.php"); } ?></td></tr>
	    <tr>
	        <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
  <table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="4">
   <table border="0">
    <tr>
	  <td align="right" width="350" class="heading">Language Proficiency</td>
	  <td>&nbsp;&nbsp;&nbsp;</td>
	  <td style="font-family:Times New Roman; font-size:16px; color:#287126; font-weight:bold;"><font color="#FF0000" size="4">*</font>  - Require Field</td>
	   <td><table><tr><td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><span id="msgspan">
	   <?php echo $msg; ?></span></b></td></tr></table></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:100px;" align="center" valign="top"><?php if($_REQUEST['Event']=='Edit') { include("EmpMasterMenu.php"); } ?></td>
 
<td style="width:50px;" align="center" valign="top"></td>
<?php //*********************************************************************************************************************************************************?>
<?php if($_REQUEST['Event']=='Add') {?>
<td align="left" id="ElangProfi" valign="top">
<form name="formElangProfi" method="post" onSubmit="return validate(this)">           
<table border="0">
<tr>
 <td>
  <table><tr>
 <td class="All_80">EmpCode :</td><td class="All_60"><input name="EmpCode" class="All_50" style="background-color:#E6EBC5;" value="<?php echo $EC; ?>" Readonly></td>
 <td class="All_50">Name :</td><td class="All_220"><input name="EmpName" style="width:210px; height:18px; font-size:11px;background-color:#E6EBC5;text-transform:uppercase;" value="<?php echo $Ename; ?>" Readonly></td>
  </tr></table>
 </td>
</tr>
<tr> 
<td align="left" valign="top">
<table border="0" width="650" id="TEmp" style="display:block;" cellpadding="0" cellspacing="0">
<tr bgcolor="#BCA9D3">
<td style="width:30px;background-color:#E0DBE3;" align="center"></td>
<td><table><tr>
  <td class="All_120" align="center"></td>
  <td class="All_200" align="center">Language</td>
  <td class="All_60" align="center">Write</td>
  <td class="All_60" align="center">Read</td>
  <td class="All_60" align="center">Speak</td>
</tr></table></td>
</tr>
<tr>
<td style="width:30px;" align="center"></td>
<?php $sqlHindi=mysql_query("select * from hrm_employee_langproficiency where EmployeeID=".$EMPID." AND Language='Hindi' AND LangCheck='H'", $con); $rowHindi=mysql_num_rows($sqlHindi); if($rowHindi>0) { $resHindi=mysql_fetch_assoc($sqlHindi);} ?>
<td><table border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120" align="center">&nbsp;<input type="hidden" name="H_LC" id="H_LC" value="H">
         <input type="hidden" name="H_Id" value="<?php echo $resHindi['LangProficiencyId']; ?>"></td>
  <td class="All_200">&nbsp;Hindi&nbsp;<font color="#FF0000">*</font></td>
  <td class="All_60" align="center"><select name="Hwrite" id="Hwrite" class="All_50">
  <option value="Y" <?php if($resHindi['Write_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resHindi['Write_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_60" align="center"><select name="Hread" id="Hread" class="All_50">
 <option value="Y" <?php if($resHindi['Read_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resHindi['Read_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_60" align="center"><select name="Hspeak" id="Hspeak" class="All_50">
  <option value="Y" <?php if($resHindi['Speak_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resHindi['Speak_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td>
</tr>
<tr>
<td style="width:30px;" align="center"></td>
<?php $sqlEng=mysql_query("select * from hrm_employee_langproficiency where EmployeeID=".$EMPID." AND Language='English' AND LangCheck='E'", $con); $rowEng=mysql_num_rows($sqlEng);
     if($rowEng>0) { $resEng=mysql_fetch_assoc($sqlEng);} ?>
<td><table border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120" align="center">&nbsp;<input type="hidden" name="E_LC" id="E_LC" value="E" class="All_120">
                         <input type="hidden" name="E_Id" value="<?php echo $resEng['LangProficiencyId']; ?>"></td>
  <td class="All_200">&nbsp;English &nbsp;</td>
  <td class="All_60" align="center"><select name="Ewrite" id="Ewrite" class="All_50">
  <option value="Y" <?php if($resEng['Write_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resEng['Write_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_60" align="center"><select name="Eread" id="Eread" class="All_50">
  <option value="Y" <?php if($resEng['Read_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resEng['Read_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_60" align="center"><select name="Espeak" id="Espeak" class="All_50">
  <option value="Y" <?php if($resEng['Speak_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resEng['Speak_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td>   
</tr>
<?php $sqlLExt=mysql_query("select * from hrm_employee_langproficiency where EmployeeID=".$EMPID." AND LangCheck='L' order by LangProficiencyId ASC", $con);
      $rowLExt=mysql_num_rows($sqlLExt); if($rowLExt>0) { $i=1; while($resLExt=mysql_fetch_assoc($sqlLExt)){ ?>
<tr>
<td style="width:30px;" align="center"></td>
<td><table id="LocRow1" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Extra_LC<?php echo $i;?>" id="Extra_LC<?php echo $i;?>" value="<?php echo $resLExt['LangCheck']; ?>">
  <input type="hidden" name="Extra_Id<?php echo $i;?>" value="<?php echo $resLExt['LangProficiencyId']; ?>" />
  &nbsp;<?php if($resLExt['LangCheck']=='L'){echo 'Other Language';} if($resLExt['LangCheck']=='F'){echo 'Foreign Language';} ?></td>
  <td class="All_200"><input name="Local_Lang<?php echo $i;?>" id="Local_Lang<?php echo $i;?>" class="All_200" value="<?php echo $resLExt['Language']; ?>"/></td>
  <td class="All_60" align="center"><select name="Locwrite<?php echo $i;?>" id="Locwrite<?php echo $i;?>" class="All_50">
  <option value="Y" <?php if($resLExt['Write_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resLExt['Write_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_60" align="center"><select name="Locread<?php echo $i;?>" id="Locread<?php echo $i;?>" class="All_50">
  <option value="Y" <?php if($resLExt['Read_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resLExt['Read_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_60" align="center"><select name="Locspeak<?php echo $i;?>" id="Locspeak<?php echo $i;?>" class="All_50">
  <option value="Y" <?php if($resLExt['Speak_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resLExt['Speak_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_50" align="center"><a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="DelLangAdd(<?php echo $resLExt['LangProficiencyId'].','.$EMPID; ?>)"></a></td>
</tr></table></td>
</tr>
<?php $i++; } }?><input type="hidden" name="RowLCount" id="RowLCount" value="<?php echo $rowLExt; ?>" />

<tr>
<td style="width:30px;" align="center"></td>
<td><table id="LocRow1" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Lo_LC1" id="Lo_LC1" value="L" class="All_120">&nbsp;Other Language</td>
  <td class="All_200"><input name="LocalLang1" id="LocalLang1" class="All_200" value="Not"/></td>
  <td class="All_60" align="center"><select name="Loc1write" id="Loc1write" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="Loc1read" id="Loc1read" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="Loc1speak" id="Loc1speak" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td>
</tr>
<tr>
<td style="width:30px;display:block;" id="Locimg1" align="center">
<img src="images/Addnew.png" border="0" id="LocaddImg1" onClick="ShowLocRow2()"/>
<img src="images/Minusnew.png" id="LocminusImg1" style="display:none;" border="0" onClick="HideLocRow2()"/></td>
<td><table style="display:none;" id="LocRow2" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Lo_LC2" id="Lo_LC2" value="L" class="All_120">&nbsp;Other Language</td>
  <td class="All_200"><input name="LocalLang2" id="LocalLang2" class="All_200" value="Not"/></td>
  <td class="All_60" align="center"><select name="Loc2write" id="Loc2write" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="Loc2read" id="Loc2read" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="Loc2speak" id="Loc2speak" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td>
</tr>
<tr>
<td style="width:30px;display:none;" id="Locimg2" align="center">
<img src="images/Addnew.png" border="0" id="LocaddImg2" onClick="ShowLocRow3()"/>
<img src="images/Minusnew.png" id="LocminusImg2" style="display:none;" border="0" onClick="HideLocRow3()"/></td>
<td><table style="display:none;" id="LocRow3" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Lo_LC3" id="Lo_LC3" value="L" class="All_120">&nbsp;Other Language</td>
  <td class="All_200"><input name="LocalLang3" id="LocalLang3" class="All_200" value="Not"/></td>
  <td class="All_60" align="center"><select name="Loc3write" id="Loc3write" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="Loc3read" id="Loc3read" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="Loc3speak" id="Loc3speak" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td>
</tr>
<tr>
<td style="width:30px;display:none;" id="Locimg3" align="center">
<img src="images/Addnew.png" border="0" id="LocaddImg3" onClick="ShowLocRow4()"/>
<img src="images/Minusnew.png" id="LocminusImg3" style="display:none;" border="0" onClick="HideLocRow4()"/></td>
<td><table style="display:none;" id="LocRow4" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Lo_LC4" id="Lo_LC4" value="L" class="All_120">&nbsp;Other Language</td>
  <td class="All_200"><input name="LocalLang4" id="LocalLang4" class="All_200" value="Not"/></td>
  <td class="All_60" align="center"><select name="Loc4write" id="Loc4write" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="Loc4read" id="Loc4read" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="Loc4speak" id="Loc4speak" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td>
</tr>
<tr>
<td style="width:30px;display:none;" id="Locimg4" align="center">
<img src="images/Addnew.png" border="0" id="LocaddImg4" onClick="ShowLocRow5()"/>
<img src="images/Minusnew.png" id="LocminusImg4" style="display:none;" border="0" onClick="HideLocRow5()"/></td>
<td><table style="display:none;" id="LocRow5" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Lo_LC5" id="Lo_LC5" value="L" class="All_120">&nbsp;Other Language</td>
  <td class="All_200"><input name="LocalLang5" id="LocalLang5" class="All_200" value="Not"></td>
  <td class="All_60" align="center"><select name="Loc5write" id="Loc5write" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="Loc5read" id="Loc5read" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="Loc5speak" id="Loc5speak" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td>
</tr>
<?php $sqlFExt=mysql_query("select * from hrm_employee_langproficiency where EmployeeID=".$EMPID." AND LangCheck='F' order by LangProficiencyId ASC", $con);
      $rowFExt=mysql_num_rows($sqlFExt); if($rowFExt>0) { $i=1; while($resFExt=mysql_fetch_assoc($sqlFExt)){ ?>
<tr>
<td style="width:30px;" align="center"></td>
<td><table id="LocRow1" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Extra_FC<?php echo $i;?>" id="Extra_FC<?php echo $i;?>" value="<?php echo $resFExt['LangCheck']; ?>">
  <input type="hidden" name="Extra_ForId<?php echo $i;?>" value="<?php echo $resFExt['LangProficiencyId']; ?>" />
  &nbsp;<?php if($resFExt['LangCheck']=='L'){echo 'Other Language';} if($resFExt['LangCheck']=='F'){echo 'Foreign Language';} ?></td>
  <td class="All_200"><input name="For_Lang<?php echo $i;?>" id="For_Lang<?php echo $i;?>" class="All_200" value="<?php echo $resFExt['Language']; ?>"/></td>
  <td class="All_60" align="center"><select name="Forwrite<?php echo $i;?>" id="Forwrite<?php echo $i;?>" class="All_50">
  <option value="Y" <?php if($resFExt['Write_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resFExt['Write_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_60" align="center"><select name="Forread<?php echo $i;?>" id="Forread<?php echo $i;?>" class="All_50">
  <option value="Y" <?php if($resFExt['Read_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resFExt['Read_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_60" align="center"><select name="Forspeak<?php echo $i;?>" id="Forspeak<?php echo $i;?>" class="All_50">
  <option value="Y" <?php if($resFExt['Speak_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resFExt['Speak_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_50" align="center"><a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="DelLangAdd(<?php echo $resFExt['LangProficiencyId'].','.$EMPID; ?>)"></a></td>
</tr></table></td>
</tr>
<?php $i++; } }?><input type="hidden" name="RowFCount" id="RowFCount" value="<?php echo $rowFExt; ?>" />
<tr>
<td style="width:30px;" align="center"></td>
<td><table id="ForRow1" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Fo_LC1" id="Fo_LC1" value="F" class="All_120">&nbsp;Foreign Language</td>
  <td class="All_200"><input name="ForLang1" id="ForLang1" class="All_200" value="Not"/></td>
  <td class="All_60" align="center"><select name="For1write" id="For1write" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="For1read" id="For1read" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="For1speak" id="For1speak" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td>
</tr>
<tr>
<td style="width:30px;display:block;" id="Forimg1" align="center">
<img src="images/Addnew.png" border="0" id="ForaddImg1" onClick="ShowForRow2()"/>
<img src="images/Minusnew.png" id="ForminusImg1" style="display:none;" border="0" onClick="HideForRow2()"/></td>
<td><table style="display:none;" id="ForRow2" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Fo_LC2" id="Fo_LC2" value="F" class="All_120">&nbsp;Foreign Language</td>
  <td class="All_200"><input name="ForLang2" id="ForLang2" class="All_200" value="Not"/></td>
  <td class="All_60" align="center"><select name="For2write" id="For2write" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="For2read" id="For2read" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="For2speak" id="For2speak" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td>
</tr>
<tr>
<td style="width:30px;display:none;" id="Forimg2" align="center">
<img src="images/Addnew.png" border="0" id="ForaddImg2" onClick="ShowForRow3()"/>
<img src="images/Minusnew.png" id="ForminusImg2" style="display:none;" border="0" onClick="HideForRow3()"/></td>
<td><table style="display:none;" id="ForRow3" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Fo_LC3" id="Fo_LC3" value="F" class="All_120">&nbsp;Foreign Language</td>
  <td class="All_200"><input name="ForLang3" id="ForLang3" class="All_200" value="Not"/></td>
  <td class="All_60" align="center"><select name="For3write" id="For3write" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="For3read" id="For3read" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="For3speak" id="For3speak" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td>
</tr>
<tr>
<td style="width:30px;display:none;" id="Forimg3" align="center">
<img src="images/Addnew.png" border="0" id="ForaddImg3" onClick="ShowForRow4()"/>
<img src="images/Minusnew.png" id="ForminusImg3" style="display:none;" border="0" onClick="HideForRow4()"/></td>
<td><table style="display:none;" id="ForRow4" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Fo_LC4" id="Fo_LC4" value="F" class="All_120">&nbsp;Foreign Language</td>
  <td class="All_200"><input name="ForLang4" id="ForLang4" class="All_200" value="Not"/></td>
  <td class="All_60" align="center"><select name="For4write" id="For4write" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="For4read" id="For4read" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="For4speak" id="For4speak" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td>
</tr>
<tr>
<td style="width:30px;display:none;" id="Forimg4" align="center">
<img src="images/Addnew.png" border="0" id="ForaddImg4" onClick="ShowForRow5()"/>
<img src="images/Minusnew.png" id="ForminusImg4" style="display:none;" border="0" onClick="HideForRow5()"/></td>
<td><table style="display:none;" id="ForRow5" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Fo_LC5" id="Fo_LC5" value="F" class="All_120">&nbsp;Foreign Language</td>
  <td class="All_200"><input name="ForLang5" id="ForLang5" class="All_200" value="Not"/></td>
  <td class="All_60" align="center"><select name="For5write" id="For5write" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="For5read" id="For5read" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="For5speak" id="For5speak" class="All_50"><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td>
</tr>
 <tr>
  <td align="Right" class="fontButton" colspan="6"><table border="0" align="right" class="fontButton">
	<tr>	 
	  <td align="right" style="width:90px;">
		<input type="submit" name="AddLangProfiE" id="AddLangProfiE" style="width:90px;" value="save"></td>
	  <td align="right" style="width:90px;"><input type="button" name="RefreshLangProfiE" id="RefreshLangProfiE" style="width:90px;" value="refresh" onClick="RefLangProfi()"/></td>
	</tr></table>
  </td>
</tr>
</table>
</td>
<?php include("EmpImg.php"); ?>
</tr>
</table>
</form>  
</td>
<?php } if($_REQUEST['Event']=='Edit') {?>
 <td align="left" id="ElangProfi" valign="top">             
 <form enctype="multipart/form-data" name="formElangProfi" method="post" onSubmit="return validate(this)">
<table border="0">
<tr>
 <td>
  <table><tr>
 <td class="All_80">EmpCode :</td><td class="All_60"><input name="EmpCode" id="EmpCode" class="All_50" style="background-color:#E6EBC5;" value="<?php echo $EC; ?>" readonly></td>
 <td class="All_50">Name :</td><td class="All_220"><input name="EmpName" id="EmpName" style="width:210px; height:18px; font-size:11px;background-color:#E6EBC5;text-transform:uppercase;" value="<?php echo $Ename; ?>" readonly></td>
  </tr></table>
 </td>
</tr>
<tr> 
<td align="left" valign="top">
<table border="0" width="650" id="TEmp" style="display:block;" cellpadding="0" cellspacing="0">
<tr bgcolor="#BCA9D3">
<td style="width:30px;background-color:#E0DBE3;" align="center"></td>
<td><table><tr>
  <td class="All_120" align="center"></td>
  <td class="All_200" align="center">Language</td>
  <td class="All_60" align="center">Write</td>
  <td class="All_60" align="center">Read</td>
  <td class="All_60" align="center">Speak</td>
  <td class="All_50" align="center"></td>
</tr></table></td>
</tr>
<tr>
<td style="width:30px;" align="center"></td>
<?php $sqlHindi=mysql_query("select * from hrm_employee_langproficiency where EmployeeID=".$EMPID." AND Language='Hindi'", $con); $rowHindi=mysql_num_rows($sqlHindi); if($rowHindi>0) { $resHindi=mysql_fetch_assoc($sqlHindi);} ?>
<td><table border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120" align="center">&nbsp;<input type="hidden" name="H_LC" id="H_LC" value="H" class="All_120">
                           <input type="hidden" name="H_Id" value="<?php echo $resEng['LangProficiencyId']; ?>"></td>
  <td class="All_200">&nbsp;Hindi&nbsp;<font color="#FF0000">*</font></td>
  <td class="All_60" align="center"><select name="Hwrite" id="Hwrite" class="All_50" disabled>
  <option value="Y" <?php if($resHindi['Write_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resHindi['Write_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_60" align="center"><select name="Hread" id="Hread" class="All_50" disabled>
 <option value="Y" <?php if($resHindi['Read_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resHindi['Read_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_60" align="center"><select name="Hspeak" id="Hspeak" class="All_50" disabled>
  <option value="Y" <?php if($resHindi['Speak_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resHindi['Speak_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td>
</tr>
<tr>
<td style="width:30px;" align="center"></td>
<?php $sqlEng=mysql_query("select * from hrm_employee_langproficiency where EmployeeID=".$EMPID." AND Language='English'", $con); $rowEng=mysql_num_rows($sqlEng);
     if($rowEng>0) { $resEng=mysql_fetch_assoc($sqlEng);} ?>
<td><table border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120" align="center">&nbsp;<input type="hidden" name="E_LC" id="E_LC" value="E" class="All_120">
                           <input type="hidden" name="E_Id" value="<?php echo $resEng['LangProficiencyId']; ?>"></td>
  <td class="All_200">&nbsp;English &nbsp;</td>
  <td class="All_60" align="center"><select name="Ewrite" id="Ewrite" class="All_50" disabled>
  <option value="Y" <?php if($resEng['Write_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resEng['Write_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_60" align="center"><select name="Eread" id="Eread" class="All_50" disabled>
  <option value="Y" <?php if($resEng['Read_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resEng['Read_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_60" align="center"><select name="Espeak" id="Espeak" class="All_50" disabled>
  <option value="Y" <?php if($resEng['Speak_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resEng['Speak_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td> 
<?php $sqlLExt=mysql_query("select * from hrm_employee_langproficiency where EmployeeID=".$EMPID." AND LangCheck='L' order by LangProficiencyId ASC", $con);
      $rowLExt=mysql_num_rows($sqlLExt); if($rowLExt>0) { $i=1; while($resLExt=mysql_fetch_assoc($sqlLExt)){ ?>
<tr>
<td style="width:30px;" align="center"></td>
<td><table id="LocRow1" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Extra_LC<?php echo $i;?>" id="Extra_LC<?php echo $i;?>" value="<?php echo $resLExt['LangCheck']; ?>">
  <input type="hidden" name="Extra_Id<?php echo $i;?>" value="<?php echo $resLExt['LangProficiencyId']; ?>" />
  &nbsp;<?php if($resLExt['LangCheck']=='L'){echo 'Other Language';} if($resLExt['LangCheck']=='F'){echo 'Foreign Language';} ?></td>
  <td class="All_200"><input name="Local_Lang<?php echo $i;?>" id="Local_Lang<?php echo $i;?>" class="All_200" value="<?php echo $resLExt['Language']; ?>"/></td>
  <td class="All_60" align="center"><select name="Locwrite<?php echo $i;?>" id="Locwrite<?php echo $i;?>" class="All_50">
  <option value="Y" <?php if($resLExt['Write_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resLExt['Write_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_60" align="center"><select name="Locread<?php echo $i;?>" id="Locread<?php echo $i;?>" class="All_50">
  <option value="Y" <?php if($resLExt['Read_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resLExt['Read_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_60" align="center"><select name="Locspeak<?php echo $i;?>" id="Locspeak<?php echo $i;?>" class="All_50">
  <option value="Y" <?php if($resLExt['Speak_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resLExt['Speak_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_50" align="center"><a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="DelLangAdd(<?php echo $resLExt['LangProficiencyId'].','.$EMPID; ?>)"></a></td>
</tr></table></td>
</tr>
<?php $i++; } }?><input type="hidden" name="RowLCount" id="RowLCount" value="<?php echo $rowLExt; ?>" />
<tr>
<td style="width:30px;" align="center"></td>
<td><table id="LocRow1" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Lo_LC1" id="Lo_LC1" value="L" class="All_120">&nbsp;Other Language</td>
  <td class="All_200"><input name="LocalLang1" id="LocalLang1" class="All_200" value="Not" readonly/></td>
  <td class="All_60" align="center"><select name="Loc1write" id="Loc1write" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="Loc1read" id="Loc1read" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="Loc1speak" id="Loc1speak" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td>
</tr>
<tr>
<td style="width:30px;display:block;" id="Locimg1" align="center">
<img src="images/Addnew.png" border="0" id="LocaddImg1" onClick="ShowLocRow2()"/>
<img src="images/Minusnew.png" id="LocminusImg1" style="display:none;" border="0" onClick="HideLocRow2()"/></td>
<td><table style="display:none;" id="LocRow2" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Lo_LC2" id="Lo_LC2" value="L" class="All_120">&nbsp;Other Language</td>
  <td class="All_200"><input name="LocalLang2" id="LocalLang2" class="All_200" value="Not" readonly/></td>
  <td class="All_60" align="center"><select name="Loc2write" id="Loc2write" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="Loc2read" id="Loc2read" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="Loc2speak" id="Loc2speak" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td>
</tr>
<tr>
<td style="width:30px;display:none;" id="Locimg2" align="center">
<img src="images/Addnew.png" border="0" id="LocaddImg2" onClick="ShowLocRow3()"/>
<img src="images/Minusnew.png" id="LocminusImg2" style="display:none;" border="0" onClick="HideLocRow3()"/></td>
<td><table style="display:none;" id="LocRow3" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Lo_LC3" id="Lo_LC3" value="L" class="All_120">&nbsp;Other Language</td>
  <td class="All_200"><input name="LocalLang3" id="LocalLang3" class="All_200" value="Not" readonly/></td>
  <td class="All_60" align="center"><select name="Loc3write" id="Loc3write" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="Loc3read" id="Loc3read" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="Loc3speak" id="Loc3speak" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td>
</tr>
<tr>
<td style="width:30px;display:none;" id="Locimg3" align="center">
<img src="images/Addnew.png" border="0" id="LocaddImg3" onClick="ShowLocRow4()"/>
<img src="images/Minusnew.png" id="LocminusImg3" style="display:none;" border="0" onClick="HideLocRow4()"/></td>
<td><table style="display:none;" id="LocRow4" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Lo_LC4" id="Lo_LC4" value="L" class="All_120">&nbsp;Other Language</td>
  <td class="All_200"><input name="LocalLang4" id="LocalLang4" class="All_200" value="Not" readonly=""/></td>
  <td class="All_60" align="center"><select name="Loc4write" id="Loc4write" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="Loc4read" id="Loc4read" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="Loc4speak" id="Loc4speak" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td>
</tr>
<tr>
<td style="width:30px;display:none;" id="Locimg4" align="center">
<img src="images/Addnew.png" border="0" id="LocaddImg4" onClick="ShowLocRow5()"/>
<img src="images/Minusnew.png" id="LocminusImg4" style="display:none;" border="0" onClick="HideLocRow5()"/></td>
<td><table style="display:none;" id="LocRow5" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Lo_LC5" id="Lo_LC5" value="L" class="All_120">&nbsp;Other Language</td>
  <td class="All_200"><input name="LocalLang5" id="LocalLang5" class="All_200" value="Not"/ readonly></td>
  <td class="All_60" align="center"><select name="Loc5write" id="Loc5write" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="Loc5read" id="Loc5read" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="Loc5speak" id="Loc5speak" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td>
</tr>
<?php $sqlFExt=mysql_query("select * from hrm_employee_langproficiency where EmployeeID=".$EMPID." AND LangCheck='F' order by LangProficiencyId ASC", $con);
      $rowFExt=mysql_num_rows($sqlFExt); if($rowFExt>0) { $i=1; while($resFExt=mysql_fetch_assoc($sqlFExt)){ ?>
<tr>
<td style="width:30px;" align="center"></td>
<td><table id="LocRow1" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Extra_FC<?php echo $i;?>" id="Extra_FC<?php echo $i;?>" value="<?php echo $resFExt['LangCheck']; ?>">
  <input type="hidden" name="Extra_ForId<?php echo $i;?>" value="<?php echo $resFExt['LangProficiencyId']; ?>" />
  &nbsp;<?php if($resFExt['LangCheck']=='L'){echo 'Other Language';} if($resFExt['LangCheck']=='F'){echo 'Foreign Language';} ?></td>
  <td class="All_200"><input name="For_Lang<?php echo $i;?>" id="For_Lang<?php echo $i;?>" class="All_200" value="<?php echo $resFExt['Language']; ?>"/></td>
  <td class="All_60" align="center"><select name="Forwrite<?php echo $i;?>" id="Forwrite<?php echo $i;?>" class="All_50">
  <option value="Y" <?php if($resFExt['Write_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resFExt['Write_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_60" align="center"><select name="Forread<?php echo $i;?>" id="Forread<?php echo $i;?>" class="All_50">
  <option value="Y" <?php if($resFExt['Read_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resFExt['Read_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_60" align="center"><select name="Forspeak<?php echo $i;?>" id="Forspeak<?php echo $i;?>" class="All_50">
  <option value="Y" <?php if($resFExt['Speak_lang']=='Y'){echo 'selected';} ?>>Y</option>
  <option value="N" <?php if($resFExt['Speak_lang']=='N'){echo 'selected';} ?>>N</option></select></td>
  <td class="All_50" align="center"><a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="DelLangAdd(<?php echo $resFExt['LangProficiencyId'].','.$EMPID; ?>)"></a></td>
</tr></table></td>
</tr>
<?php $i++; } }?><input type="hidden" name="RowFCount" id="RowFCount" value="<?php echo $rowFExt; ?>" />
<tr>
<td style="width:30px;" align="center"></td>
<td><table id="ForRow1" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Fo_LC1" id="Fo_LC1" value="F" class="All_120">&nbsp;Foreign Language</td>
  <td class="All_200"><input name="ForLang1" id="ForLang1" class="All_200" value="Not" readonly/></td>
  <td class="All_60" align="center"><select name="For1write" id="For1write" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="For1read" id="For1read" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="For1speak" id="For1speak" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td>
</tr>
<tr>
<td style="width:30px;display:block;" id="Forimg1" align="center">
<img src="images/Addnew.png" border="0" id="ForaddImg1" onClick="ShowForRow2()"/>
<img src="images/Minusnew.png" id="ForminusImg1" style="display:none;" border="0" onClick="HideForRow2()"/></td>
<td><table style="display:none;" id="ForRow2" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Fo_LC2" id="Fo_LC2" value="F" class="All_120">&nbsp;Foreign Language</td>
  <td class="All_200"><input name="ForLang2" id="ForLang2" class="All_200" value="Not" readonly/></td>
  <td class="All_60" align="center"><select name="For2write" id="For2write" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="For2read" id="For2read" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="For2speak" id="For2speak" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td>
</tr>
<tr>
<td style="width:30px;display:none;" id="Forimg2" align="center">
<img src="images/Addnew.png" border="0" id="ForaddImg2" onClick="ShowForRow3()"/>
<img src="images/Minusnew.png" id="ForminusImg2" style="display:none;" border="0" onClick="HideForRow3()"/></td>
<td><table style="display:none;" id="ForRow3" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Fo_LC3" id="Fo_LC3" value="F" class="All_120">&nbsp;Foreign Language</td>
  <td class="All_200"><input name="ForLang3" id="ForLang3" class="All_200" value="Not" readonly/></td>
  <td class="All_60" align="center"><select name="For3write" id="For3write" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="For3read" id="For3read" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="For3speak" id="For3speak" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td>
</tr>
<tr>
<td style="width:30px;display:none;" id="Forimg3" align="center">
<img src="images/Addnew.png" border="0" id="ForaddImg3" onClick="ShowForRow4()"/>
<img src="images/Minusnew.png" id="ForminusImg3" style="display:none;" border="0" onClick="HideForRow4()"/></td>
<td><table style="display:none;" id="ForRow4" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Fo_LC4" id="Fo_LC4" value="F" class="All_120">&nbsp;Foreign Language</td>
  <td class="All_200"><input name="ForLang4" id="ForLang4" class="All_200" value="Not" readonly/></td>
  <td class="All_60" align="center"><select name="For4write" id="For4write" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="For4read" id="For4read" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="For4speak" id="For4speak" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td>
</tr>
<tr>
<td style="width:30px;display:none;" id="Forimg4" align="center">
<img src="images/Addnew.png" border="0" id="ForaddImg4" onClick="ShowForRow5()"/>
<img src="images/Minusnew.png" id="ForminusImg4" style="display:none;" border="0" onClick="HideForRow5()"/></td>
<td><table style="display:none;" id="ForRow5" border="1" bgcolor="#FFFFFF"><tr>
  <td class="All_120"><input type="hidden" name="Fo_LC5" id="Fo_LC5" value="F" class="All_120">&nbsp;Foreign Language</td>
  <td class="All_200"><input name="ForLang5" id="ForLang5" class="All_200" value="Not" readonly/></td>
  <td class="All_60" align="center"><select name="For5write" id="For5write" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="For5read" id="For5read" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_60" align="center"><select name="For5speak" id="For5speak" class="All_50" disabled><option value="Y">Y</option><option value="N" selected>N</option></select></td>
  <td class="All_50" align="center"></td>
</tr></table></td>
</tr>
 <tr>
  <td align="Right" class="fontButton" colspan="6"><table border="0" align="right" class="fontButton">
	<tr>	 
<?php if($_SESSION['User_Permission']=='Edit'){?>
	  <td align="right" style="width:90px;"><input type="button" name="ChangeLangProfi" id="ChangeLangProfi" style="width:90px; display:block;" value="Edit" onClick="EditLangProfi()">
		<input type="submit" name="EditLangProfiE" id="EditLangProfiE" style="width:90px;display:none;" value="save"></td>
<?php } ?>
	  <td align="right" style="width:90px;"><input type="button" name="RefreshLangProfiE" id="RefreshLangProfiE" style="width:90px;" value="refresh"  onClick="javascript:window.location='EmplangProfi.php?ID=<?php echo $EMPID; ?>&Event=Edit'"/></td>
	</tr></table>
  </td>
</tr>
</table>
</td>
<?php include("EmpImg.php"); ?>
</tr>
</table>
</form>  
</td>
 <?php } ?>
<?php //*********************************************************************************************************************************************************?>
</tr>
<?php } ?> 
</table>
				
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
<?php //**********************************************END*****END*****END******END******END***************************************************************?>	
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

