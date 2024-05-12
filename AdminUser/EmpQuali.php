<?php session_start();

if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}

include("../function.php");

if(check_user()==false){header('Location:../index.php');}

require_once('logcheck.php');

if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}

if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

//**********************************

$_SESSION['EmpID']=$_REQUEST['ID'];

$EMPID=$_SESSION['EmpID'];

//**********************************

if(isset($_POST['AddQualificationE']))

{  

   $sql=mysql_query("select * from hrm_employee_qualification where EmployeeID=".$EMPID, $con); $res=mysql_num_rows($sql);

   //****************************************** If($res>0) Open *********************************************

   if($res>0) 

   { //$sqlDelete=mysql_query("DELETE FROM hrm_employee_qualification WHERE EmployeeID=".$EMPID, $con);

     $SqlInsQuali = mysql_query("update hrm_employee_qualification set MaxQuali='".$_POST['Max10Quali']."', Specialization='".$_POST['Spec_10th']."', Institute='".$_POST['InsU_10th']."', Subject='".$_POST['Subject_10th']."', PassOut='".$_POST['PassOut_10th']."', Grade_Per='".$_POST['Grade_10th']."', QuaCreatedBy=".$UserId.", QuaCreatedDate='".date('Y-m-d')."', QuaYearId=".$YearId." where EmployeeID=".$EMPID." AND QualificationId=".$_POST['10_Id'], $con);

	 $SqlInsQuali = mysql_query("update hrm_employee_qualification set MaxQuali='".$_POST['Max12Quali']."', Specialization='".$_POST['Spec_12th']."', Institute='".$_POST['InsU_12th']."', Subject='".$_POST['Subject_12th']."', PassOut='".$_POST['PassOut_12th']."', Grade_Per='".$_POST['Grade_12th']."', QuaCreatedBy=".$UserId.", QuaCreatedDate='".date('Y-m-d')."', QuaYearId=".$YearId." where EmployeeID=".$EMPID." AND QualificationId=".$_POST['12_Id'], $con);

	 $SqlInsQuali = mysql_query("update hrm_employee_qualification set MaxQuali='".$_POST['MaxGQuali']."', Specialization='".$_POST['Spec_Graduation']."', Institute='".$_POST['InsU_Graduation']."', Subject='".$_POST['Subject_Graduation']."', PassOut='".$_POST['PassOut_Graduation']."', Grade_Per='".$_POST['Grade_Graduation']."', QuaCreatedBy=".$UserId.", QuaCreatedDate='".date('Y-m-d')."', QuaYearId=".$YearId." where EmployeeID=".$EMPID." AND QualificationId=".$_POST['G_Id'], $con);

	 $SqlInsQuali = mysql_query("update hrm_employee_qualification set MaxQuali='".$_POST['MaxPGQuali']."', Specialization='".$_POST['Spec_PG']."', Institute='".$_POST['InsU_PG']."', Subject='".$_POST['Subject_PG']."', PassOut='".$_POST['PassOut_PG']."', Grade_Per='".$_POST['Grade_PG']."', QuaCreatedBy=".$UserId.", QuaCreatedDate='".date('Y-m-d')."', QuaYearId=".$YearId." where EmployeeID=".$EMPID." AND QualificationId=".$_POST['PG_Id'], $con);



    if($_POST['RowCountQuali']!=0)  

	{ for($i=1; $i<=$_POST['RowCountQuali']; $i++)

	  { if($_POST['Quali'.$i]!='Not' AND $_POST['Quali_'.$i]!='') 

	    { $SqlInsRow = mysql_query("update hrm_employee_qualification set MaxQuali='".$_POST['MaxQuali'.$i]."', Qualification='".$_POST['Quali'.$i]."', Specialization='".$_POST['Spec'.$i]."', Institute='".$_POST['InsU'.$i]."', Subject='".$_POST['Subject'.$i]."', PassOut='".$_POST['PassOut'.$i]."', Grade_Per='".$_POST['Grade'.$i]."', QuaCreatedBy=".$UserId.", QuaCreatedDate='".date('Y-m-d')."', QuaYearId=".$YearId." where EmployeeID=".$EMPID." AND QualificationId=".$_POST['Quali_Id'.$i], $con);  

		}

	  } 

	}

	   

    for($i=1; $i<=5; $i++)

	{ if($_POST['Quali_'.$i]!='Not' AND $_POST['Quali_'.$i]!='')

      { $SqlInsQuali = mysql_query("INSERT INTO hrm_employee_qualification(EmployeeID, MaxQuali, Qualification, Specialization, Institute, Subject, PassOut, Grade_Per, QuaCreatedBy, QuaCreatedDate, QuaYearId) VALUES (".$EMPID.", '".$_POST['MaxQuali_'.$i]."', '".$_POST['Quali_'.$i]."', '".$_POST['Spec_'.$i]."', '".$_POST['InsU_'.$i]."', '".$_POST['Subject_'.$i]."', '".$_POST['PassOut_'.$i]."', '".$_POST['Grade_'.$i]."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con);  
      
      echo "INSERT INTO hrm_employee_qualification(EmployeeID, MaxQuali, Qualification, Specialization, Institute, Subject, PassOut, Grade_Per, QuaCreatedBy, QuaCreatedDate, QuaYearId) VALUES (".$EMPID.", '".$_POST['MaxQuali_'.$i]."', '".$_POST['Quali_'.$i]."', '".$_POST['Spec_'.$i]."', '".$_POST['InsU_'.$i]."', '".$_POST['Subject_'.$i]."', '".$_POST['PassOut_'.$i]."', '".$_POST['Grade_'.$i]."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")";

	  }} 	

   if($SqlInsQuali){ $msg = "Qualification data has been Inserted successfully..."; }

   }

   //****************************************** If($res>0) close *********************************************

   //****************************************** else Open *********************************************

   else

   {

    $SqlInsQuali = mysql_query("INSERT INTO hrm_employee_qualification(EmployeeID, MaxQuali, Qualification, Specialization, Institute, Subject, PassOut, Grade_Per, QuaCreatedBy, QuaCreatedDate, QuaYearId) VALUES (".$EMPID.", '".$_POST['Max10Quali']."', '10th', '".$_POST['Spec_10th']."', '".$_POST['InsU_10th']."', '".$_POST['Subject_10th']."', '".$_POST['PassOut_10th']."', '".$_POST['Grade_10th']."', ".$UserId.",'".date('Y-m-d')."',".$YearId."), (".$EMPID.", '".$_POST['Max12Quali']."', '12th', '".$_POST['Spec_12th']."', '".$_POST['InsU_12th']."', '".$_POST['Subject_12th']."', '".$_POST['PassOut_12th']."', '".$_POST['Grade_12th']."', ".$UserId.",'".date('Y-m-d')."',".$YearId."), (".$EMPID.", '".$_POST['MaxGQuali']."', 'Graduation', '".$_POST['Spec_Graduation']."', '".$_POST['InsU_Graduation']."', '".$_POST['Subject_Graduation']."', '".$_POST['PassOut_Graduation']."', '".$_POST['Grade_Graduation']."', ".$UserId.",'".date('Y-m-d')."',".$YearId."), (".$EMPID.", '".$_POST['MaxPGQuali']."', 'Post_Graduation', '".$_POST['Spec_PG']."', '".$_POST['InsU_PG']."', '".$_POST['Subject_PG']."', '".$_POST['PassOut_PG']."', '".$_POST['Grade_PG']."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con); 



    if($_POST['RowCountQuali']!=0)  

	{ for($i=1; $i<=$_POST['RowCountQuali']; $i++)

	  { if($_POST['Quali'.$i]!='Not' AND $_POST['Quali_'.$i]!='') 

	    { $SqlInsRow = mysql_query("INSERT INTO hrm_employee_qualification (EmployeeID, MaxQuali, Qualification, Specialization, Institute, Subject, PassOut, Grade_Per, QuaCreatedBy, QuaCreatedDate, QuaYearId) VALUES (".$EMPID.", '".$_POST['MaxQuali'.$i]."', '".$_POST['Quali'.$i]."', '".$_POST['Spec'.$i]."', '".$_POST['InsU'.$i]."', '".$_POST['Subject'.$i]."', '".$_POST['PassOut'.$i]."', '".$_POST['Grade'.$i]."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con); 

		}

	  } 

	}

    for($i=1; $i<=5; $i++)

	{ if($_POST['Quali_'.$i]!='Not' AND $_POST['Quali_'.$i]!='')

      { $SqlInsQuali = mysql_query("INSERT INTO hrm_employee_qualification(EmployeeID, MaxQuali, Qualification, Specialization, Institute, Subject, PassOut, Grade_Per, QuaCreatedBy, QuaCreatedDate, QuaYearId) VALUES (".$EMPID.", '".$_POST['MaxQuali_'.$i]."', '".$_POST['Quali_'.$i]."', '".$_POST['Spec_'.$i]."', '".$_POST['InsU_'.$i]."', '".$_POST['Subject_'.$i]."', '".$_POST['PassOut_'.$i]."', '".$_POST['Grade_'.$i]."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con);  

	  }} 	

   if($SqlInsQuali){ $msg = "Qualification data has been Inserted successfully..."; }

   }

   //****************************************** else close *********************************************     

}

 

if(isset($_POST['EditQualificationE']))

{  

   $sql=mysql_query("select * from hrm_employee_qualification where EmployeeID=".$EMPID, $con); $res=mysql_num_rows($sql);

   //****************************************** If($res>0) Open *********************************************

   if($res>0) 

   { //$sqlDelete=mysql_query("DELETE FROM hrm_employee_qualification WHERE EmployeeID=".$EMPID, $con);

     $SqlInsQuali = mysql_query("update hrm_employee_qualification set MaxQuali='".$_POST['Max10Quali']."', Specialization='".$_POST['Spec_10th']."', Institute='".$_POST['InsU_10th']."', Subject='".$_POST['Subject_10th']."', PassOut='".$_POST['PassOut_10th']."', Grade_Per='".$_POST['Grade_10th']."', QuaCreatedBy=".$UserId.", QuaCreatedDate='".date('Y-m-d')."', QuaYearId=".$YearId." where EmployeeID=".$EMPID." AND QualificationId=".$_POST['10_Id'], $con);

	 $SqlInsQuali = mysql_query("update hrm_employee_qualification set MaxQuali='".$_POST['Max12Quali']."', Specialization='".$_POST['Spec_12th']."', Institute='".$_POST['InsU_12th']."', Subject='".$_POST['Subject_12th']."', PassOut='".$_POST['PassOut_12th']."', Grade_Per='".$_POST['Grade_12th']."', QuaCreatedBy=".$UserId.", QuaCreatedDate='".date('Y-m-d')."', QuaYearId=".$YearId." where EmployeeID=".$EMPID." AND QualificationId=".$_POST['12_Id'], $con);

	 $SqlInsQuali = mysql_query("update hrm_employee_qualification set MaxQuali='".$_POST['MaxGQuali']."', Specialization='".$_POST['Spec_Graduation']."', Institute='".$_POST['InsU_Graduation']."', Subject='".$_POST['Subject_Graduation']."', PassOut='".$_POST['PassOut_Graduation']."', Grade_Per='".$_POST['Grade_Graduation']."', QuaCreatedBy=".$UserId.", QuaCreatedDate='".date('Y-m-d')."', QuaYearId=".$YearId." where EmployeeID=".$EMPID." AND QualificationId=".$_POST['G_Id'], $con);

	 $SqlInsQuali = mysql_query("update hrm_employee_qualification set MaxQuali='".$_POST['MaxPGQuali']."', Specialization='".$_POST['Spec_PG']."', Institute='".$_POST['InsU_PG']."', Subject='".$_POST['Subject_PG']."', PassOut='".$_POST['PassOut_PG']."', Grade_Per='".$_POST['Grade_PG']."', QuaCreatedBy=".$UserId.", QuaCreatedDate='".date('Y-m-d')."', QuaYearId=".$YearId." where EmployeeID=".$EMPID." AND QualificationId=".$_POST['PG_Id'], $con);



    if($_POST['RowCountQuali']!=0)  

	{ for($i=1; $i<=$_POST['RowCountQuali']; $i++)

	  { if($_POST['Quali'.$i]!='Not' AND $_POST['Quali_'.$i]!='') 

	    { $SqlInsRow = mysql_query("update hrm_employee_qualification set MaxQuali='".$_POST['MaxQuali'.$i]."', Qualification='".$_POST['Quali'.$i]."', Specialization='".$_POST['Spec'.$i]."', Institute='".$_POST['InsU'.$i]."', Subject='".$_POST['Subject'.$i]."', PassOut='".$_POST['PassOut'.$i]."', Grade_Per='".$_POST['Grade'.$i]."', QuaCreatedBy=".$UserId.", QuaCreatedDate='".date('Y-m-d')."', QuaYearId=".$YearId." where EmployeeID=".$EMPID." AND QualificationId=".$_POST['Quali_Id'.$i], $con);  

		}

	  } 

	}

	   

    for($i=1; $i<=5; $i++)

	{ if($_POST['Quali_'.$i]!='Not' AND $_POST['Quali_'.$i]!='')

      { $SqlInsQuali = mysql_query("INSERT INTO hrm_employee_qualification(EmployeeID, MaxQuali, Qualification, Specialization, Institute, Subject, PassOut, Grade_Per, QuaCreatedBy, QuaCreatedDate, QuaYearId) VALUES (".$EMPID.", '".$_POST['MaxQuali_'.$i]."', '".$_POST['Quali_'.$i]."', '".$_POST['Spec_'.$i]."', '".$_POST['InsU_'.$i]."', '".$_POST['Subject_'.$i]."', '".$_POST['PassOut_'.$i]."', '".$_POST['Grade_'.$i]."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con);  

	  }} 	

   if($SqlInsQuali){ $msg = "Qualification data has been Inserted successfully..."; }

   }

   //****************************************** If($res>0) close *********************************************

   //****************************************** else Open *********************************************

   else

   {

    $SqlInsQuali = mysql_query("INSERT INTO hrm_employee_qualification(EmployeeID, MaxQuali, Qualification, Specialization, Institute, Subject, PassOut, Grade_Per, QuaCreatedBy, QuaCreatedDate, QuaYearId) VALUES (".$EMPID.", '".$_POST['Max10Quali']."', '10th', '".$_POST['Spec_10th']."', '".$_POST['InsU_10th']."', '".$_POST['Subject_10th']."', '".$_POST['PassOut_10th']."', '".$_POST['Grade_10th']."', ".$UserId.",'".date('Y-m-d')."',".$YearId."), (".$EMPID.", '".$_POST['Max12Quali']."', '12th', '".$_POST['Spec_12th']."', '".$_POST['InsU_12th']."', '".$_POST['Subject_12th']."', '".$_POST['PassOut_12th']."', '".$_POST['Grade_12th']."', ".$UserId.",'".date('Y-m-d')."',".$YearId."), (".$EMPID.", '".$_POST['MaxGQuali']."', 'Graduation', '".$_POST['Spec_Graduation']."', '".$_POST['InsU_Graduation']."', '".$_POST['Subject_Graduation']."', '".$_POST['PassOut_Graduation']."', '".$_POST['Grade_Graduation']."', ".$UserId.",'".date('Y-m-d')."',".$YearId."), (".$EMPID.", '".$_POST['MaxPGQuali']."', 'Post_Graduation', '".$_POST['Spec_PG']."', '".$_POST['InsU_PG']."', '".$_POST['Subject_PG']."', '".$_POST['PassOut_PG']."', '".$_POST['Grade_PG']."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con); 



    if($_POST['RowCountQuali']!=0)  

	{ for($i=1; $i<=$_POST['RowCountQuali']; $i++)

	  { if($_POST['Quali'.$i]!='Not' AND $_POST['Quali_'.$i]!='') 

	    { $SqlInsRow = mysql_query("INSERT INTO hrm_employee_qualification (EmployeeID, MaxQuali, Qualification, Specialization, Institute, Subject, PassOut, Grade_Per, QuaCreatedBy, QuaCreatedDate, QuaYearId) VALUES (".$EMPID.", '".$_POST['MaxQuali'.$i]."', '".$_POST['Quali'.$i]."', '".$_POST['Spec'.$i]."', '".$_POST['InsU'.$i]."', '".$_POST['Subject'.$i]."', '".$_POST['PassOut'.$i]."', '".$_POST['Grade'.$i]."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con); 

		}

	  } 

	}

    for($i=1; $i<=5; $i++)

	{ if($_POST['Quali_'.$i]!='Not' AND $_POST['Quali_'.$i]!='')

      { $SqlInsQuali = mysql_query("INSERT INTO hrm_employee_qualification(EmployeeID, MaxQuali, Qualification, Specialization, Institute, Subject, PassOut, Grade_Per, QuaCreatedBy, QuaCreatedDate, QuaYearId) VALUES (".$EMPID.", '".$_POST['MaxQuali_'.$i]."', '".$_POST['Quali_'.$i]."', '".$_POST['Spec_'.$i]."', '".$_POST['InsU_'.$i]."', '".$_POST['Subject_'.$i]."', '".$_POST['PassOut_'.$i]."', '".$_POST['Grade_'.$i]."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con);  

	  }} 	

   if($SqlInsQuali){ $msg = "Qualification data has been Inserted successfully..."; }

   }

   //****************************************** else close *********************************************     

} 

 

if($_REQUEST['Action']=='Delete' AND $_REQUEST['Action']!='')

{ $Delete=mysql_query("DELETE FROM hrm_employee_qualification WHERE QualificationId=".$_REQUEST['Value'], $con);

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

function EditQuali()

{document.getElementById("EditQualificationE").style.display = 'block'; document.getElementById("ChangeQuali").style.display = 'none';

 document.getElementById("Spec_10th").readOnly = false; document.getElementById("InsU_10th").readOnly = false;  document.getElementById("Subject_10th").readOnly = false; 

 document.getElementById("PassOut_10th").disabled = false;  document.getElementById("Grade_10th").readOnly = false; document.getElementById("Spec_12th").readOnly = false; 

 document.getElementById("InsU_12th").readOnly = false; document.getElementById("Subject_12th").readOnly = false; document.getElementById("PassOut_12th").disabled = false; 

 document.getElementById("Grade_12th").readOnly = false;  document.getElementById("Spec_Graduation").readOnly = false; document.getElementById("InsU_Graduation").readOnly = false; 

 document.getElementById("Subject_Graduation").readOnly = false; document.getElementById("PassOut_Graduation").disabled = false;  document.getElementById("Grade_Graduation").readOnly = false; document.getElementById("Spec_PG").readOnly = false; document.getElementById("InsU_PG").readOnly = false; document.getElementById("Subject_PG").readOnly = false; document.getElementById("PassOut_PG").disabled = false; document.getElementById("Grade_PG").readOnly = false; document.getElementById("Quali_1").readOnly = false; document.getElementById("Spec_1").readOnly = false; document.getElementById("InsU_1").readOnly = false; document.getElementById("Subject_1").readOnly = false;  document.getElementById("PassOut_1").disabled = false; document.getElementById("Grade_1").readOnly = false; document.getElementById("Quali_2").readOnly = false; document.getElementById("Spec_2").readOnly = false; document.getElementById("InsU_2").readOnly = false; document.getElementById("Subject_2").readOnly = false;  document.getElementById("PassOut_2").disabled = false; document.getElementById("Grade_2").readOnly = false; document.getElementById("Quali_3").readOnly = false; document.getElementById("Spec_3").readOnly = false; document.getElementById("InsU_3").readOnly = false; document.getElementById("Subject_3").readOnly = false;  document.getElementById("PassOut_3").disabled = false; document.getElementById("Grade_3").readOnly = false; document.getElementById("Quali_4").readOnly = false; document.getElementById("Spec_4").readOnly = false; document.getElementById("InsU_4").readOnly = false; document.getElementById("Subject_4").readOnly = false;  document.getElementById("PassOut_4").disabled = false; document.getElementById("Grade_4").readOnly = false; document.getElementById("Quali_5").readOnly = false; document.getElementById("Spec_5").readOnly = false; document.getElementById("InsU_5").readOnly = false; document.getElementById("Subject_5").readOnly = false;  document.getElementById("PassOut_5").disabled = false; document.getElementById("Grade_5").readOnly = false;



 var NumQuali = document.getElementById("RowCountQuali").value; 

 if(NumQuali!=0)

  { for (var i=1; i<=NumQuali; i++)

    {document.getElementById("Quali"+i).readOnly = false; document.getElementById("Spec"+i).readOnly = false; document.getElementById("InsU"+i).readOnly = false; 

	 document.getElementById("Subject"+i).readOnly = false; document.getElementById("PassOut"+i).disabled = false; document.getElementById("Grade"+i).readOnly = false; 

	 } 

  } 

  

}   





function RefQuali()

{ 

document.getElementById("Spec_10th").value=''; document.getElementById("InsU_10th").value=''; document.getElementById("Subject_10th").value=''; document.getElementById("PassOut_10th").value=''; document.getElementById("Grade_10th").value=''; document.getElementById("Spec_12th").value=''; document.getElementById("InsU_12th").value=''; document.getElementById("Subject_12th").value=''; document.getElementById("PassOut_12th").value=''; document.getElementById("Grade_12th").value=''; document.getElementById("Spec_Graduation").value=''; document.getElementById("InsU_Graduation").value=''; document.getElementById("Subject_Graduation").value=''; document.getElementById("PassOut_Graduation").value=''; document.getElementById("Grade_Graduation").value=''; document.getElementById("Spec_PG").value=''; document.getElementById("InsU_PG").value=''; document.getElementById("Subject_PG").value=''; document.getElementById("PassOut_PG").value=''; document.getElementById("Grade_PG").value=''; 

for(var i=1; i<=5; i++){document.getElementById("Spec_"+i).value=''; document.getElementById("InsU_"+i).value=''; document.getElementById("Subject_"+i).value=''; document.getElementById("PassOut_"+i).value=''; document.getElementById("Grade_"+i).value='';}



document.getElementById("Quali_1").value='Not'; document.getElementById("Quali_2").value='Not'; document.getElementById("Quali_3").value='Not'; document.getElementById("Quali_4").value='Not'; document.getElementById("Quali_5").value='Not';

document.getElementById("Row5").style.display='none'; document.getElementById("minusImg5").style.display='none'; document.getElementById("addImg5").style.display='none';

document.getElementById("Row4").style.display='none'; document.getElementById("minusImg4").style.display='none'; document.getElementById("addImg4").style.display='none';

document.getElementById("Row3").style.display='none'; document.getElementById("minusImg3").style.display='none'; document.getElementById("addImg3").style.display='none';

document.getElementById("Row2").style.display='none'; document.getElementById("minusImg2").style.display='none'; document.getElementById("addImg2").style.display='none';

document.getElementById("Row1").style.display='none'; document.getElementById("minusImg1").style.display='none'; document.getElementById("addImg1").style.display='block';

}



function ShowRowQuali()

{document.getElementById("addImg1").style.display = 'none'; document.getElementById("Row1").style.display = 'block'; document.getElementById("img2").style.display = 'block'; 

 document.getElementById("addImg2").style.display = 'block'; document.getElementById("minusImg1").style.display = 'block'; document.getElementById("Quali_1").value='Not';

}

function HideRowQuali()

{document.getElementById("addImg1").style.display = 'block';

 document.getElementById("Row1").style.display = 'none'; document.getElementById("img2").style.display = 'none'; 

 document.getElementById("addImg2").style.display = 'none'; document.getElementById("minusImg1").style.display = 'none';

 document.getElementById("Spec_1").value = ""; document.getElementById("Quali_1").value = ""; document.getElementById("InsU_1").value = ""; 

 document.getElementById("Subject_1").value = "";  document.getElementById("PassOut_1").value = ""; document.getElementById("Grade_1").value = "";

}

function ShowRowQuali2()

{if(document.getElementById("Quali_1").value=='Not' || document.getElementById("Quali_1").value=='') {alert("Please enter qualification!");}

 else if((document.getElementById("Quali_1").value!='Not' || document.getElementById("Quali_1").value!='') && (document.getElementById("Spec_1").value = '' || document.getElementById("InsU_1").value=='' || document.getElementById("Subject_1").value=='' || document.getElementById("PassOut_1").value=='' || document.getElementById("Grade_1").value=='')) {alert("Please enter previous row field!");}

else {document.getElementById("minusImg1").style.display = 'none'; document.getElementById("addImg2").style.display = 'none'; document.getElementById("Quali_2").value='Not'; document.getElementById("Row2").style.display = 'block'; document.getElementById("img3").style.display = 'block';  document.getElementById("addImg3").style.display = 'block'; document.getElementById("minusImg2").style.display = 'block'; }

}

function HideRowQuali2()

{document.getElementById("minusImg1").style.display = 'block'; document.getElementById("addImg2").style.display = 'block';

 document.getElementById("Row2").style.display = 'none'; document.getElementById("img3").style.display = 'none'; 

 document.getElementById("addImg3").style.display = 'none'; document.getElementById("minusImg2").style.display = 'none';

 document.getElementById("Spec_2").value = ""; document.getElementById("Quali_2").value = ""; document.getElementById("InsU_2").value = ""; 

 document.getElementById("Subject_2").value = ""; document.getElementById("PassOut_2").value = ""; document.getElementById("Grade_2").value = "";

}

function ShowRowQuali3()

{ if(document.getElementById("Quali_2").value=='Not' || document.getElementById("Quali_2").value=='')  {alert("Please enter qualification!");}

  else if((document.getElementById("Quali_2").value!='Not' || document.getElementById("Quali_2").value!='') && (document.getElementById("Spec_2").value = '' || document.getElementById("InsU_2").value=='' || document.getElementById("Subject_2").value=='' || document.getElementById("PassOut_2").value=='' || document.getElementById("Grade_2").value=='')) {alert("Please enter previous row field!");}

  else {document.getElementById("minusImg2").style.display = 'none'; document.getElementById("addImg3").style.display = 'none'; document.getElementById("Quali_3").value='Not';

 document.getElementById("Row3").style.display = 'block'; document.getElementById("img4").style.display = 'block'; 

 document.getElementById("addImg4").style.display = 'block'; document.getElementById("minusImg3").style.display = 'block'; }

}

function HideRowQuali3()

{document.getElementById("minusImg2").style.display = 'block'; document.getElementById("addImg3").style.display = 'block';

 document.getElementById("Row3").style.display = 'none'; document.getElementById("img4").style.display = 'none'; 

 document.getElementById("addImg4").style.display = 'none'; document.getElementById("minusImg3").style.display = 'none';

 document.getElementById("Spec_3").value = ""; document.getElementById("Quali_3").value = ""; document.getElementById("InsU_3").value = ""; 

 document.getElementById("Subject_3").value = ""; document.getElementById("PassOut_3").value = ""; document.getElementById("Grade_3").value = "";

}

function ShowRowQuali4()

{if(document.getElementById("Quali_3").value=='Not' || document.getElementById("Quali_3").value=='')  {alert("Please enter qualification!");}

else if((document.getElementById("Quali_3").value!='Not' || document.getElementById("Quali_3").value!='') && (document.getElementById("Spec_3").value = '' || document.getElementById("InsU_3").value=='' || document.getElementById("Subject_3").value=='' || document.getElementById("PassOut_3").value=='' || document.getElementById("Grade_3").value=='')) {alert("Please enter previous row field!");}

  else {document.getElementById("minusImg3").style.display = 'none'; document.getElementById("addImg4").style.display = 'none'; document.getElementById("Quali_4").value='Not';

 document.getElementById("Row4").style.display = 'block'; document.getElementById("img5").style.display = 'block'; 

 document.getElementById("addImg5").style.display = 'block'; document.getElementById("minusImg4").style.display = 'block';}

}

function HideRowQuali4()

{document.getElementById("minusImg3").style.display = 'block'; document.getElementById("addImg4").style.display = 'block';

 document.getElementById("Row4").style.display = 'none'; document.getElementById("img5").style.display = 'none'; 

 document.getElementById("addImg3").style.display = 'none'; document.getElementById("minusImg4").style.display = 'none';

 document.getElementById("Spec_4").value = ""; document.getElementById("Quali_4").value = ""; document.getElementById("InsU_4").value = ""; 

 document.getElementById("Subject_4").value = ""; document.getElementById("PassOut_4").value = ""; document.getElementById("Grade_4").value = "";

}

function ShowRowQuali5()

{if(document.getElementById("Quali_4").value=='Not' || document.getElementById("Quali_4").value=='')  {alert("Please enter qualification!");}

else if((document.getElementById("Quali_4").value!='Not' || document.getElementById("Quali_4").value!='') && (document.getElementById("Spec_4").value = "" || document.getElementById("InsU_4").value=='' || document.getElementById("Subject_4").value=='' || document.getElementById("PassOut_4").value=='' || document.getElementById("Grade_4").value=='')) {alert("Please enter previous row field!");}

  else {document.getElementById("minusImg4").style.display = 'none'; document.getElementById("addImg5").style.display = 'none'; document.getElementById("Quali_5").value='Not';

 document.getElementById("Row5").style.display = 'block'; document.getElementById("minusImg5").style.display = 'block'; }

}

function HideRowQuali5()

{document.getElementById("minusImg4").style.display = 'block'; document.getElementById("addImg5").style.display = 'block';

 document.getElementById("Row5").style.display = 'none'; document.getElementById("addImg4").style.display = 'none'; 

 document.getElementById("minusImg5").style.display = 'none'; document.getElementById("Spec_5").value = ""; document.getElementById("Quali_5").value = ""; 

 document.getElementById("InsU_5").value = ""; document.getElementById("Subject_5").value = ""; 

 document.getElementById("PassOut_5").value = ""; document.getElementById("Grade_5").value = "";

}







function validate(formEqualifi)

{

  var InsU_10th = formEqualifi.InsU_10th.value;  

  //if(InsU_10th!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(InsU_10th);

  //if(test_bool==false) { alert('Please Enter Only Alphabets in the 10th Institute/University Name Field');  return false; } }

  

  var Subject_10th = formEqualifi.Subject_10th.value;  

  //if(InsU_10th!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool2 = filter.test(Subject_10th);

  //if (Subject_10th.length ===0 ) { alert("Please select 10th subject name Field.");  return false; }

  //if(test_bool2==false) { alert('Please Enter Only Alphabets in the 10th Subject Name Field');  return false; } }

  //if(Subject_10th!=''){if (InsU_10th.length ===0 && Subject_10th.length >=0)  { alert("Please enter 10th Institute/University name Field.");  return false; } }

  

  var PassOut_10th = formEqualifi.PassOut_10th.value; 

  if(InsU_10th!=''){ if (PassOut_10th==0) { alert("Please select 10th PassOut name Field.");  return false; } }

  //if(PassOut_10th!=''){if (InsU_10th.length ===0 && PassOut_10th.length >=0)  { alert("Please enter 10th Institute/University name Field.");  return false; } }

  

  var Grade_10th = formEqualifi.Grade_10th.value; 

  if (InsU_10th!='')  { var Numfilter=/^[0-9A-Z ]+$/;  var test_numAlpha = Numfilter.test(Grade_10th)

  if(Grade_10th.length ===0 ) { alert("Please Enter 10th % / Grade Field.");  return false; } }

  //if(test_numAlpha==false) { alert('Please Enter Right Formate 10th % / Grade Field'); return false; }}

  //if(Grade_10th!=''){if (InsU_10th.length ===0 && Grade_10th.length >=0)  { alert("Please enter 10th Institute/University name Field.");  return false; }}

  

  var InsU_12th = formEqualifi.InsU_12th.value;  var Spec_12th = formEqualifi.Spec_12th.value;  

  //if(InsU_12th!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(InsU_12th);

  //if(test_bool==false) { alert('Please Enter Only Alphabets in the 12th Institute/University Name Field');  return false; } }

  

  var Subject_12th = formEqualifi.Subject_12th.value;  

  if(InsU_12th!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool2 = filter.test(Subject_12th);

  if (Subject_12th.length ===0 ) { alert("Please enter 12th subject name Field.");  return false; } }

  //if(test_bool2==false) { alert('Please Enter Only Alphabets in the 12th Subject Name Field');  return false; } }

  //if(Subject_12th!=''){ if (InsU_12th.length ===0 && Subject_12th.length >=0)  { alert("Please enter 12th Institute/University name Field.");  return false; }}

  

  var PassOut_12th = formEqualifi.PassOut_12th.value; 

  if(InsU_12th!=''){  if (PassOut_12th==0 ) { alert("Please select 12th PassOut name Field.");  return false; } }

  if(Spec_12th!=''){  if (PassOut_12th==0 ) { alert("Please select 12th PassOut name Field.");  return false; } }

  //if(PassOut_12th!=''){ if (InsU_12th.length ===0 && PassOut_12th.length >=0)  { alert("Please enter 12th Institute/University name Field.");  return false; }}



  var Grade_12th = formEqualifi.Grade_12th.value; 

  if (InsU_12th!='')  { var Numfilter=/^[0-9A-Z ]+$/;  var test_numAlpha = Numfilter.test(Grade_12th)

  if(Grade_12th.length ===0 ) { alert("Please Enter 12th % / Grade Field.");  return false; } }

  //if(test_numAlpha==false) { alert('Please Enter Right Formate 12th % / Grade Field'); return false; }}

  //if(Grade_12th!=''){ if (InsU_12th.length ===0 && Grade_12th.length >=0)  { alert("Please enter 12th Institute/University name Field.");  return false; }}

  

  var InsU_Graduation = formEqualifi.InsU_Graduation.value;  var Spec_Graduation = formEqualifi.Spec_Graduation.value; 

  //if(InsU_Graduation!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(InsU_Graduation);

  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Graduation Institute/University Name Field');  return false; } }

  

  var Subject_Graduation = formEqualifi.Subject_Graduation.value;  

  if(InsU_Graduation!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool2 = filter.test(Subject_Graduation);

  if (Subject_Graduation.length ===0 ) { alert("Please enter Graduation subject name Field.");  return false; } }

  //if(test_bool2==false) { alert('Please Enter Only Alphabets in the Graduation Subject Name Field');  return false; } }

  //if(Subject_Graduation!=''){ if (InsU_Graduation.length ===0 && Subject_Graduation.length >=0)  { alert("Please enter Graduation Institute/University name Field.");  return false; }}

  

  var PassOut_Graduation = formEqualifi.PassOut_Graduation.value; 

  if(InsU_Graduation!=''){  if (PassOut_Graduation==0 ) { alert("Please select Graduation PassOut name Field.");  return false; } }

  if(Spec_Graduation!=''){  if (PassOut_Graduation==0 ) { alert("Please select Graduation PassOut name Field.");  return false; } }

  //if(PassOut_Graduation!=''){ if (InsU_Graduation.length ===0 && PassOut_Graduation.length >=0)  { alert("Please enter Graduation Institute/University name Field.");  return false; }}



  var Grade_Graduation = formEqualifi.Grade_Graduation.value; 

  if (InsU_Graduation!='')  { var Numfilter=/^[0-9A-Z ]+$/;  var test_numAlpha = Numfilter.test(Grade_Graduation)

  if(Grade_Graduation.length ===0 ) { alert("Please Enter Graduation % / Grade Field.");  return false; } }

 // if(test_numAlpha==false) { alert('Please Enter Right Formate Graduation % / Grade Field'); return false; }}

  //if(Grade_Graduation!=''){ if (InsU_Graduation.length ===0 && Grade_Graduation.length >=0)  { alert("Please enter Graduation Institute/University name Field.");  return false; }}



  var InsU_PG= formEqualifi.InsU_PG.value;   var Spec_PG = formEqualifi.Spec_PG.value;

  //if(InsU_PG!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(InsU_PG);

  //if(test_bool==false) { alert('Please Enter Only Alphabets in the PG Institute/University Name Field');  return false; } }

  

  var Subject_PG= formEqualifi.Subject_PG.value;  

  if(InsU_PG!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool2 = filter.test(Subject_PG);

  if (Subject_PG.length ===0 ) { alert("Please enter PG subject name Field.");  return false; } }

  //if(test_bool2==false) { alert('Please Enter Only Alphabets in the PG Subject Name Field');  return false; } }

  //if(Subject_PG!=''){ if (InsU_PG.length ===0 && Subject_PG.length >=0)  { alert("Please enter PG Institute/University name Field.");  return false; }}

  

  var PassOut_PG= formEqualifi.PassOut_PG.value; 

  if(InsU_PG!=''){  if (PassOut_PG==0 ) { alert("Please select PG PassOut name Field.");  return false; } }

  if(Spec_PG!=''){  if (PassOut_PG==0 ) { alert("Please select PG PassOut name Field.");  return false; } }

  //if(PassOut_PG!=''){ if (InsU_PG.length ===0 && PassOut_PG.length >=0)  { alert("Please enter PG Institute/University name Field.");  return false; }}



  var Grade_PG= formEqualifi.Grade_PG.value; 

  if (InsU_PG!='')  { var Numfilter=/^[0-9A-Z ]+$/;  var test_numAlpha = Numfilter.test(Grade_PG)

  if(Grade_PG.length ===0 ) { alert("Please Enter PG % / Grade Field.");  return false; } }

  //if(test_numAlpha==false) { alert('Please Enter Right Formate PG % / Grade Field'); return false; }}

  //if(Grade_PG!=''){ if (InsU_PG.length ===0 && Grade_PG.length >=0)  { alert("Please enter PG Institute/University name Field.");  return false; }}



}



function FunMaxChk(v)

{

if(document.getElementById("Max"+v).checked==true)

{

 //document.getElementById("Max10Quali").value='N'; document.getElementById("Max12Quali").value='N';

 //document.getElementById("MaxGQuali").value='N'; document.getElementById("MaxPGQuali").value='N';

 document.getElementById("Max"+v+"Quali").value='Y';

}

else{document.getElementById("Max"+v+"Quali").value='N';}

}



function FunMax2Chk(v)

{

if(document.getElementById("Max"+v).checked==true)

{

 //document.getElementById("MaxQuali1").value='N'; document.getElementById("MaxQuali2").value='N';

 //document.getElementById("MaxQuali3").value='N'; document.getElementById("MaxQuali4").value='N';

 //document.getElementById("MaxQuali5").value='N';

 document.getElementById("MaxQuali"+v).value='Y';

}

else{document.getElementById("MaxQuali"+v).value='N';}

}



function FunMax22Chk(v)

{

if(document.getElementById("Max_"+v).checked==true)

{

 //document.getElementById("MaxQuali_1").value='N'; document.getElementById("MaxQuali_2").value='N';

 //document.getElementById("MaxQuali_3").value='N'; document.getElementById("MaxQuali_4").value='N';

 //document.getElementById("MaxQuali_5").value='N';

 document.getElementById("MaxQuali_"+v).value='Y';

}

else{document.getElementById("MaxQuali_"+v).value='N';}

}





function DelQualiAdd(value,Id)

{ var agree=confirm("Are you sure you want to delete this record?"); 

  if (agree) {  var x = "EmpQuali.php?ID="+Id+"&Value="+value+"&Action=Delete&Event=Add";  window.location=x; }

}



function DelQuali(value,Id)

{ var agree=confirm("Are you sure you want to delete this record?"); 

  if (agree) {  var x = "EmpQuali.php?ID="+Id+"&Value="+value+"&Action=Delete&Event=Edit";  window.location=x; }

}

</script>

</head>

<body class="body">

<?php 

$SqlEmp = mysql_query("SELECT *,hrm_employee_general.*,hrm_employee_personal.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$EMPID, $con) or die(mysql_error());  $ResEmp=mysql_fetch_assoc($SqlEmp);

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

	  <td align="right" width="280" class="heading">Qualification</td>

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

<td align="left" id="Equalifi" valign="top">             

<form enctype="multipart/form-data" name="formEqualifi" method="post" onSubmit="return validate(this)">

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

<table border="0" width="800" id="TEmp" style="display:block;" cellpadding="0" cellspacing="0">

<tr bgcolor="#BCA9D3">

<td style="width:30px;background-color:#E0DBE3;" align="center"></td>

<td><table><tr>

  <td class="All_120" align="center">Qualification</td>

  <td class="All_120" align="center">Degree</td>

  <td class="All_200" align="center">Ins./University</td>

  <td class="All_150" align="center">Specialization</td>

  <td class="All_60" align="center">PassOut</td>

  <td class="All_50" align="center">%/Grade</td>

</tr></table></td>

</tr>

<tr>

<td style="width:30px;background-color:#E0DBE3;" align="center"></td>

<?php $sql2=mysql_query("select * from hrm_employee_qualification where EmployeeID=".$EMPID." AND Qualification='10th' ", $con); $row2=mysql_num_rows($sql2);

     if($row2>0) { $res2=mysql_fetch_assoc($sql2);} ?>

<td><table bgcolor="#FFFFFF" border="1"><tr>

  <td class="All_120" align="left">&nbsp;10th&nbsp;</td>

  <td class="All_120" align="left"><input type="hidden" name="10_Id" value="<?php echo $res2['QualificationId']; ?>">

  <input name="Spec_10th" id="Spec_10th" class="All_120" value="<?php echo $res2['Specialization']; ?>" style=" "/></td>

  <td class="All_200" align="left">

  <input name="InsU_10th" id="InsU_10th" class="All_200" value="<?php echo $res2['Institute']; ?>"/></td>

  <td class="All_150" align="left">

  <input name="Subject_10th" id="Subject_10th" class="All_150" value="<?php echo $res2['Subject']; ?>"/></td>

  <td class="All_60" align="left">  <select name="PassOut_10th" id="PassOut_10th" class="All_60"/>

<?php if($res2['PassOut']==0 OR $res2['PassOut']=='') { ?><option value="0">Select</option><?php } ?>

<?php if($res2['PassOut']>1000) { ?> <option value="<?php echo $res2['PassOut']; ?>"><?php echo $res2['PassOut']; ?></option>

<option style="background-color:#51A8FF;" value="0">Select</option><?php } ?>

  <?php for($i=1950; $i<=date("Y"); $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td> 

  <td class="All_50" align="left"><input name="Grade_10th" id="Grade_10th" class="All_50" value="<?php echo $res2['Grade_Per']; ?>"/></td>

  <td class="All_50" align="center" style="background-color:<?php if($res2['MaxQuali']=='Y'){echo '#65CA00';}else{echo '#FFFFFF';} ?>;"><input type="checkbox" onClick="FunMaxChk('10')" id="Max10" <?php if($res2['MaxQuali']=='Y'){echo 'checked';} ?> />

  <input type="hidden" id="Max10Quali" name="Max10Quali" value="<?php echo $res2['MaxQuali']; ?>" /></td>

</tr></table></td>

</tr>

<tr>

<td style="width:30px;background-color:#E0DBE3;" align="center"></td>

<?php $sql3=mysql_query("select * from hrm_employee_qualification where EmployeeID=".$EMPID." AND Qualification='12th' ", $con); $row3=mysql_num_rows($sql3);

     if($row3>0) { $res3=mysql_fetch_assoc($sql3);} ?>

<td><table bgcolor="#FFFFFF" border="1"><tr>

  <td class="All_120" align="left">&nbsp;12th&nbsp;</td>

  <td class="All_120" align="left"><input type="hidden" name="12_Id" value="<?php echo $res3['QualificationId']; ?>">

  <input name="Spec_12th" id="Spec_12th" class="All_120" value="<?php echo $res3['Specialization']; ?>"/></td>

  <td class="All_200" align="left">

  <input name="InsU_12th" id="InsU_12th" class="All_200" value="<?php echo $res3['Institute']; ?>"/></td>

  <td class="All_150" align="left">

  <input name="Subject_12th" id="Subject_12th" class="All_150" value="<?php echo $res3['Subject']; ?>"/></td>

  <td class="All_60" align="left"><select name="PassOut_12th" id="PassOut_12th" class="All_60"/>

<?php if($res3['PassOut']==0 OR $res2['PassOut']=='') { ?><option value="0">Select</option><?php } ?>

<?php if($res3['PassOut']>1000) { ?> <option value="<?php echo $res3['PassOut']; ?>"><?php echo $res3['PassOut']; ?></option>

<option style="background-color:#51A8FF;" value="0">Select</option><?php } ?>  

  <?php for($i=1950; $i<=date("Y"); $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td>

  <td class="All_50" align="left"><input name="Grade_12th" id="Grade_12th" class="All_50" value="<?php echo $res3['Grade_Per']; ?>"/></td>

  <td class="All_50" align="center" style="background-color:<?php if($res3['MaxQuali']=='Y'){echo '#65CA00';}else{echo '#FFFFFF';} ?>;"><input type="checkbox" onClick="FunMaxChk('12')" id="Max12" <?php if($res3['MaxQuali']=='Y'){echo 'checked';} ?> />

  <input type="hidden" id="Max12Quali" name="Max12Quali" value="<?php echo $res3['MaxQuali']; ?>" /></td>

</tr></table></td>

</tr>

<tr>

<td style="width:30px;background-color:#E0DBE3;" align="center"></td>

<?php $sql4=mysql_query("select * from hrm_employee_qualification where EmployeeID=".$EMPID." AND Qualification='Graduation' ", $con); $row4=mysql_num_rows($sql4);

      if($row4>0) { $res4=mysql_fetch_assoc($sql4);} ?>

<td><table bgcolor="#FFFFFF" border="1"><tr>

  <td class="All_120" align="left">&nbsp;Graduation&nbsp;</td>

  <td class="All_120" align="left"><input type="hidden" name="G_Id" value="<?php echo $res4['QualificationId']; ?>">

  <input name="Spec_Graduation" id="Spec_Graduation" class="All_120" value="<?php echo $res4['Specialization']; ?>"/></td>

  <td class="All_200" align="left">

  <input name="InsU_Graduation" id="InsU_Graduation" value="<?php echo $res4['Institute']; ?>" class="All_200"/></td>

  <td class="All_150" align="left">

  <input name="Subject_Graduation" id="Subject_Graduation" value="<?php echo $res4['Subject']; ?>" class="All_150"/></td>

  <td class="All_60" align="left"><select name="PassOut_Graduation" id="PassOut_Graduation" class="All_60"/>

<?php if($res4['PassOut']==0 OR $res2['PassOut']=='') { ?><option value="0">Select</option><?php } ?>

<?php if($res4['PassOut']>1000) { ?> <option value="<?php echo $res4['PassOut']; ?>"><?php echo $res4['PassOut']; ?></option>

<option style="background-color:#51A8FF;" value="0">Select</option><?php } ?>

  <?php for($i=1950; $i<=date("Y"); $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td>

  <td class="All_50" align="left"><input name="Grade_Graduation" id="Grade_Graduation" class="All_50" value="<?php echo $res4['Grade_Per']; ?>"/></td>

  <td class="All_50" align="center" style="background-color:<?php if($res4['MaxQuali']=='Y'){echo '#65CA00';}else{echo '#FFFFFF';} ?>;"><input type="checkbox" onClick="FunMaxChk('G')" id="MaxG" <?php if($res4['MaxQuali']=='Y'){echo 'checked';} ?>  />

  <input type="hidden" id="MaxGQuali" name="MaxGQuali" value="<?php echo $res4['MaxQuali']; ?>" /></td>

</tr></table></td>

</tr>

<tr>

<td style="width:30px;background-color:#E0DBE3;" align="center"></td>

<?php $sql5=mysql_query("select * from hrm_employee_qualification where EmployeeID=".$EMPID." AND Qualification='Post_Graduation' ", $con); $row5=mysql_num_rows($sql5);

      if($row5>0) { $res5=mysql_fetch_assoc($sql5);} ?>

<td><table bgcolor="#FFFFFF" border="1"><tr>

  <td class="All_120" align="left">&nbsp;Post Graduation&nbsp;</td>

  <td class="All_120" align="left"><input type="hidden" name="PG_Id" value="<?php echo $res5['QualificationId']; ?>">

  <input name="Spec_PG" id="Spec_PG" class="All_120" value="<?php echo $res5['Specialization']; ?>"/></td>

  <td class="All_200" align="left">

  <input name="InsU_PG" id="InsU_PG" class="All_200" value="<?php echo $res5['Institute']; ?>"/></td>

  <td class="All_150" align="left">

  <input name="Subject_PG" id="Subject_PG" class="All_150" value="<?php echo $res5['Subject']; ?>"/></td>

  <td class="All_60" align="left"><select name="PassOut_PG" id="PassOut_PG" class="All_60"/>

<?php if($res5['PassOut']==0 OR $res5['PassOut']=='') { ?><option value="0">Select</option><?php } ?>

<?php if($res5['PassOut']>1000) { ?> <option value="<?php echo $res5['PassOut']; ?>"><?php echo $res5['PassOut']; ?></option>

<option style="background-color:#51A8FF;" value="0">Select</option><?php } ?>

  <?php for($i=1950; $i<=date("Y"); $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td>

  <td class="All_50" align="left"><input name="Grade_PG" id="Grade_PG" class="All_50" value="<?php echo $res5['Grade_Per']; ?>"/></td>

  <td class="All_50" align="center" style="background-color:<?php if($res5['MaxQuali']=='Y'){echo '#65CA00';}else{echo '#FFFFFF';} ?>;"><input type="checkbox" onClick="FunMaxChk('PG')" id="MaxPG" <?php if($res5['MaxQuali']=='Y'){echo 'checked';} ?> />

  <input type="hidden" id="MaxPGQuali" name="MaxPGQuali" value="<?php echo $res5['MaxQuali']; ?>" /></td>

</tr></table></td>

</tr>



<?php $sqlExtQ=mysql_query("select * from hrm_employee_qualification where EmployeeID=".$EMPID." AND (Qualification!='10th' AND Qualification!='12th' AND Qualification!='Graduation' AND Qualification!='Post_Graduation')", $con); $rowExtQ=mysql_num_rows($sqlExtQ); if($rowExtQ>0) { $i=1; while($resExtQ=mysql_fetch_assoc($sqlExtQ)){ ?>

<tr>

<td align="center"></td>

<td><table bgcolor="#FFFFFF" border="1"><tr>

  <td class="All_120" align="left"><input type="hidden" name="Quali_Id<?php echo $i;?>" value="<?php echo $resExtQ['QualificationId']; ?>">

  <input name="Quali<?php echo $i;?>" id="Quali<?php echo $i;?>" value="<?php echo $resExtQ['Qualification']; ?>" class="All_120" value="Not"/></td>

  <td class="All_120" align="left">

  <input name="Spec<?php echo $i;?>" id="Spec<?php echo $i;?>" value="<?php echo $resExtQ['Specialization']; ?>" class="All_120"/></td>

  <td class="All_200" align="left">

  <input name="InsU<?php echo $i;?>" id="InsU<?php echo $i;?>" value="<?php echo $resExtQ['Institute']; ?>" class="All_200"/></td>

  <td class="All_150" align="left">

  <input name="Subject<?php echo $i;?>" id="Subject<?php echo $i;?>" value="<?php echo $resExtQ['Subject']; ?>" class="All_150"/></td>

  <td class="All_60" align="left"><select name="PassOut<?php echo $i;?>" id="PassOut<?php echo $i;?>" class="All_60"/>

 <?php if($resExtQ['PassOut']==0 OR $resExtQ['PassOut']=='') { ?><option value="0">Select</option><?php } ?>

 <?php if($resExtQ['PassOut']>1000) { ?> <option value="<?php echo $resExtQ['PassOut']; ?>"><?php echo $resExtQ['PassOut']; ?></option>

 <option style="background-color:#51A8FF;" value="0">Select</option><?php } ?>

  <?php for($k=1950; $k<=date("Y"); $k++) { ?><option value="<?php echo $k; ?>"><?php echo $k; ?></option><?php } ?></select></td>

  <td class="All_50" align="left"><input name="Grade<?php echo $i;?>" id="Grade<?php echo $i;?>" value="<?php echo $resExtQ['Grade_Per']; ?>" class="All_50"/></td>

  <td class="All_50" align="center"><a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="DelQualiAdd(<?php echo $resExtQ['QualificationId'].','.$EMPID; ?>)"></a></td>

  <td class="All_50" align="center" style="background-color:<?php if($resExtQ['MaxQuali']=='Y'){echo '#65CA00';}else{echo '#FFFFFF';} ?>;"><input type="checkbox" onClick="FunMax2Chk(<?php echo $i;?>)" id="Max<?php echo $i;?>" <?php if($resExtQ['MaxQuali']=='Y'){echo 'checked';} ?> />

  <input type="hidden" id="MaxQuali<?php echo $i;?>" name="MaxQuali<?php echo $i;?>" value="<?php echo $resExtQ['MaxQuali']; ?>" /></td>

</tr></table></td>

</tr>

<?php $i++; } }?><input type="hidden" name="RowCountQuali" id="RowCountQuali" value="<?php echo $rowExtQ; ?>" />



<tr>

<td style="width:30px;display:block;" id="img1" align="center">

<img src="images/Addnew.png" border="0" id="addImg1" onClick="ShowRowQuali()"/>

<img src="images/Minusnew.png" id="minusImg1" style="display:none;" border="0" onClick="HideRowQuali()"/></td>

<td><table style="display:none;" id="Row1" bgcolor="#FFFFFF" border="1"><tr>

  <td class="All_120" align="left"><input style="" name="Quali_1" id="Quali_1" class="All_120" value="Not"/></td>

  <td class="All_120" align="left"><input name="Spec_1" id="Spec_1" class="All_120"/></td>

  <td class="All_200" align="left"><input name="InsU_1" id="InsU_1" class="All_200" /></td>

  <td class="All_150" align="left"><input name="Subject_1" id="Subject_1" class="All_150" /></td>

  <td class="All_60" align="left"><select name="PassOut_1" id="PassOut_1" class="All_60"/>

  <option value="0">Select</option><?php for($i=1950; $i<=date("Y"); $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td>

  <td class="All_50" align="left"><input name="Grade_1" id="Grade_1" class="All_50" maxlength="25"/></td>

  <td class="All_50" align="center"><input type="checkbox" onClick="FunMax22Chk(1)" id="Max_1" /><input type="hidden" id="MaxQuali_1" name="MaxQuali_1" /></td>

</tr></table></td>

</tr>

<tr>

<td style="width:30px;display:block;" id="img2" align="center">

<img src="images/Addnew.png" border="0" style="display:none;" id="addImg2" onClick="ShowRowQuali2()"/>

<img src="images/Minusnew.png" id="minusImg2" style="display:none;" border="0" onClick="HideRowQuali2()"/></td>

<td><table style="display:none;" id="Row2" bgcolor="#FFFFFF" border="1"><tr>

 <td class="All_120" align="left"><input style="" name="Quali_2" id="Quali_2" class="All_120" value="Not"/></td>

 <td class="All_120" align="left"><input name="Spec_2" id="Spec_2" class="All_120"/></td>

  <td class="All_200" align="left"><input name="InsU_2" id="InsU_2" class="All_200" /></td>

  <td class="All_150" align="left"><input name="Subject_2" id="Subject_2" class="All_150" /></td>

  <td class="All_60" align="left"><select name="PassOut_2" id="PassOut_2" class="All_60"/>

  <option value="0">Select</option><?php for($i=1950; $i<=date("Y"); $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td>

  <td class="All_50" align="left"><input name="Grade_2" id="Grade_2" class="All_50" maxlength="25"/></td>

  <td class="All_50" align="center"><input type="checkbox" onClick="FunMax22Chk(2)" id="Max_2" /><input type="hidden" id="MaxQuali_2" name="MaxQuali_2" /></td>

</tr></table></td>

</tr>

<tr>

<td style="width:30px;display:block;" id="img3" align="center">

<img src="images/Addnew.png" border="0" style="display:none;" id="addImg3" onClick="ShowRowQuali3()"/>

<img src="images/Minusnew.png" id="minusImg3" style="display:none;" border="0" onClick="HideRowQuali3()"/></td>

<td><table style="display:none;" id="Row3" bgcolor="#FFFFFF" border="1"><tr>

  <td class="All_120" align="left"><input style="" name="Quali_3" id="Quali_3" class="All_120" value="Not"/></td>

  <td class="All_120" align="left"><input name="Spec_3" id="Spec_3" class="All_120"/></td>

  <td class="All_200" align="left"><input name="InsU_3" id="InsU_3" class="All_200" /></td>

  <td class="All_150" align="left"><input name="Subject_3" id="Subject_3" class="All_150" /></td>

  <td class="All_60" align="left"><select name="PassOut_3" id="PassOut_3" class="All_60"/>

  <option value="0">Select</option><?php for($i=1950; $i<=date("Y"); $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td>

  <td class="All_50" align="left"><input name="Grade_3" id="Grade_3" class="All_50" maxlength="25"/></td>

  <td class="All_50" align="center"><input type="checkbox" onClick="FunMax22Chk(3)" id="Max_3" /><input type="hidden" id="MaxQuali_3" name="MaxQuali_3" /></td>

</tr></table></td>

</tr>

<tr>

<td style="width:30px;display:block;" id="img4" align="center">

<img src="images/Addnew.png" border="0" style="display:none;" id="addImg4" onClick="ShowRowQuali4()"/>

<img src="images/Minusnew.png" id="minusImg4" style="display:none;" border="0" onClick="HideRowQuali4()"/></td>

<td><table style="display:none;" id="Row4" bgcolor="#FFFFFF" border="1"><tr>

  <td class="All_120" align="left"><input style="" name="Quali_4" id="Quali_4" class="All_120" value="Not"/></td>

  <td class="All_120" align="left"><input name="Spec_4" id="Spec_4" class="All_120"/></td>

  <td class="All_200" align="left"><input name="InsU_4" id="InsU_4" class="All_200" /></td>

  <td class="All_150" align="left"><input name="Subject_4" id="Subject_4" class="All_150" /></td>

  <td class="All_60" align="left"><select name="PassOut_4" id="PassOut_4" class="All_60"/>

  <option value="0">Select</option><?php for($i=1950; $i<=date("Y"); $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td>

  <td class="All_50" align="left"><input name="Grade_4" id="Grade_4" class="All_50" maxlength="25"/></td>

  <td class="All_50" align="center"><input type="checkbox" onClick="FunMax22Chk(4)" id="Max_4" /><input type="hidden" id="MaxQuali_4" name="MaxQuali_4" /></td>

</tr></table></td>

</tr>

<tr>

<td style="width:30px;display:block;" id="img5" align="center">

<img src="images/Addnew.png" border="0" style="display:none;" id="addImg5" onClick="ShowRowQuali5()"/>

<img src="images/Minusnew.png" id="minusImg5" style="display:none;" border="0" onClick="HideRowQuali5()"/></td>

<td><table style="display:none;" id="Row5" bgcolor="#FFFFFF" border="1"><tr>

  <td class="All_120" align="left"><input style="" name="Quali_5" id="Quali_5" class="All_120" value="Not"/></td>

  <td class="All_120" align="left"><input name="Spec_5" id="Spec_5" class="All_120"/></td>

  <td class="All_200" align="left"><input name="InsU_5" id="InsU_5" class="All_200" /></td>

  <td class="All_150" align="left"><input name="Subject_5" id="Subject_5" class="All_150" /></td>

  <td class="All_60" align="left"><select name="PassOut_5" id="PassOut_5" class="All_60"/>

  <option value="0">Select</option><?php for($i=1950; $i<=date("Y"); $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td>

  <td class="All_50" align="left"><input name="Grade_5" id="Grade_5" class="All_50" maxlength="25"/></td>

  <td class="All_50" align="center"><input type="checkbox" onClick="FunMax22Chk(5)" id="Max_5" /><input type="hidden" id="MaxQuali_5" name="MaxQuali_5" /></td>

</tr></table></td>

</tr>

 <tr>

  <td align="Right" class="fontButton" colspan="6"><table border="0" align="right" class="fontButton">

	<tr>	 

	  <td align="right" style="width:90px;">

		<input type="submit" name="AddQualificationE" id="AddQualificationE" style="width:90px;" value="save"></td>

	  <td align="right" style="width:90px;"><input type="button" name="RefreshQualiE" id="RefreshQualiE" style="width:90px;" value="refresh" onClick="RefQuali()"/></td>

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

 <td align="left" id="Equalifi" valign="top">             

<form enctype="multipart/form-data" name="formEqualifi" method="post" onSubmit="return validate(this)">

<table border="0">

<tr>

 <td>

  <table><tr>

 <td class="All_80">EmpCode :</td><td class="All_60"><input name="EmpCode" id="EmpCode" class="All_50" style="background-color:#E6EBC5;" value="<?php echo $EC; ?>" Readonly></td>

 <td class="All_50">Name :</td><td class="All_220"><input name="EmpName" id="EmpName" style="width:210px; height:18px; font-size:11px;background-color:#E6EBC5;text-transform:uppercase;" value="<?php echo $Ename; ?>" Readonly></td>

  </tr></table>

 </td>

</tr>

<tr> 

<td align="left" valign="top">

<table border="0" width="850" id="TEmp" style="display:block;" cellpadding="0" cellspacing="0">

<tr bgcolor="#BCA9D3">

<td style="width:30px;background-color:#E0DBE3;" align="center"></td>

<td><table><tr>

  <td class="All_120" align="center">Qualification</td>

  <td class="All_120" align="center">Degree</td>

  <td class="All_200" align="center">Ins./University</td>

  <td class="All_150" style="width:170px;" align="center">Specialization</td>

  <td class="All_60" align="center">PassOut</td>

  <td class="All_50" align="center">%/Grade</td>

  <td class="All_50" align="center">Max Quali</td>

</tr></table></td>

</tr>

<?php $sql2=mysql_query("select * from hrm_employee_qualification where EmployeeID=".$EMPID." AND Qualification='10th' ", $con); $row2=mysql_num_rows($sql2);

     if($row2>0) { $res2=mysql_fetch_assoc($sql2);} ?>

<tr>

<td style="width:30px;background-color:#E0DBE3;" align="center"></td>

<td><table bgcolor="#FFFFFF" border="1"><tr>

  <td class="All_120" align="left">&nbsp;10th&nbsp;</td>

  <td class="All_120" align="left"><input type="hidden" name="10_Id" value="<?php echo $res2['QualificationId']; ?>">

  <input name="Spec_10th" id="Spec_10th" class="All_120" value="<?php echo $res2['Specialization']; ?>" readOnly/></td>

  <td class="All_200" align="left">

  <input name="InsU_10th" id="InsU_10th" class="All_200" value="<?php echo $res2['Institute']; ?>" readOnly/></td>

  <td class="All_150" style="width:160px;" align="left">

  <input name="Subject_10th" id="Subject_10th" class="All_150" value="<?php echo $res2['Subject']; ?>" readOnly/></td>

  <td class="All_60" align="left"><select name="PassOut_10th" id="PassOut_10th" class="All_60" disabled>

 <?php if($res2['PassOut']==0 OR $res2['PassOut']=='') { ?><option value="0">Select</option><?php } ?>

 <?php if($res2['PassOut']>1000) { ?> <option value="<?php echo $res2['PassOut']; ?>"><?php echo $res2['PassOut']; ?></option>

 <option style="background-color:#51A8FF;" value="0">Select</option><?php } ?>

  <?php for($i=1950; $i<=date("Y"); $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td>

  <td class="All_50" align="left"><input name="Grade_10th" id="Grade_10th" class="All_50" value="<?php echo $res2['Grade_Per']; ?>" maxlength="25" readOnly/></td>

  

  <td class="All_50" align="center" style="background-color:<?php if($res2['MaxQuali']=='Y'){echo '#65CA00';}else{echo '#FFFFFF';} ?>;"><input type="checkbox" onClick="FunMaxChk('10')" id="Max10" <?php if($res2['MaxQuali']=='Y'){echo 'checked';} ?> />

  <input type="hidden" id="Max10Quali" name="Max10Quali" value="<?php echo $res2['MaxQuali']; ?>" /></td>

</tr></table></td>

</tr>

<?php $sql3=mysql_query("select * from hrm_employee_qualification where EmployeeID=".$EMPID." AND Qualification='12th' ", $con); $row3=mysql_num_rows($sql3);

     if($row3>0) { $res3=mysql_fetch_assoc($sql3);} ?>

<tr>

<td style="width:30px;background-color:#E0DBE3;" align="center"></td>

<td><table bgcolor="#FFFFFF" border="1"><tr>

  <td class="All_120" align="left">&nbsp;12th &nbsp;</td>

  <td class="All_120" align="left"><input type="hidden" name="12_Id" value="<?php echo $res3['QualificationId']; ?>">

  <input name="Spec_12th" id="Spec_12th" class="All_120" value="<?php echo $res3['Specialization']; ?>" readOnly/></td>

  <td class="All_200" align="left">

  <input name="InsU_12th" id="InsU_12th" class="All_200" value="<?php echo $res3['Institute']; ?>" readOnly/></td>

  <td class="All_150" style="width:160px;" align="left">

  <input name="Subject_12th" id="Subject_12th" class="All_150" value="<?php echo $res3['Subject']; ?>" readOnly/></td>

  <td class="All_60" align="left"><select name="PassOut_12th" id="PassOut_12th" class="All_60" disabled>

  <?php if($res3['PassOut']==0 OR $res3['PassOut']=='') { ?><option value="0">Select</option><?php } ?>

  <?php if($res3['PassOut']>1000) { ?> <option value="<?php echo $res3['PassOut']; ?>"><?php echo $res3['PassOut']; ?></option>

  <option style="background-color:#51A8FF;" value="0">Select</option><?php } ?>

  <?php for($i=1950; $i<=date("Y"); $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td>

  <td class="All_50" align="left"><input name="Grade_12th" id="Grade_12th" class="All_50" value="<?php echo $res3['Grade_Per']; ?>" maxlength="25" readOnly/></td>

  <td class="All_50" align="center" style="background-color:<?php if($res3['MaxQuali']=='Y'){echo '#65CA00';}else{echo '#FFFFFF';} ?>;"><input type="checkbox" onClick="FunMaxChk('12')" id="Max12" <?php if($res3['MaxQuali']=='Y'){echo 'checked';} ?> />

  <input type="hidden" id="Max12Quali" name="Max12Quali" value="<?php echo $res3['MaxQuali']; ?>" /></td>

</tr></table></td>

</tr>

<?php $sql4=mysql_query("select * from hrm_employee_qualification where EmployeeID=".$EMPID." AND Qualification='Graduation' ", $con); $row4=mysql_num_rows($sql4);

      if($row4>0) { $res4=mysql_fetch_assoc($sql4);} ?>

<tr>

<td style="width:30px;background-color:#E0DBE3;" align="center"></td>

<td><table bgcolor="#FFFFFF" border="1"><tr>

  <td class="All_120" align="left">&nbsp;Graduation&nbsp;</td>

  <td class="All_120" align="left"><input type="hidden" name="G_Id" value="<?php echo $res4['QualificationId']; ?>">

  <input name="Spec_Graduation" id="Spec_Graduation" class="All_120" value="<?php echo $res4['Specialization']; ?>" readOnly/></td>

  <td class="All_200" align="left">

  <input name="InsU_Graduation" id="InsU_Graduation" value="<?php echo $res4['Institute']; ?>" class="All_200" readOnly/></td>

  <td class="All_150" style="width:160px;" align="left">

  <input name="Subject_Graduation" id="Subject_Graduation" value="<?php echo $res4['Subject']; ?>" class="All_150" readOnly/></td>

  <td class="All_60" align="left"><select name="PassOut_Graduation" id="PassOut_Graduation" class="All_60" disabled>

  <?php if($res4['PassOut']==0 OR $res4['PassOut']=='') { ?><option value="0">Select</option><?php } ?>

  <?php if($res4['PassOut']>1000) { ?> <option value="<?php echo $res4['PassOut']; ?>"><?php echo $res4['PassOut']; ?></option>

  <option style="background-color:#51A8FF;" value="0">Select</option><?php } ?>

  <?php for($i=1950; $i<=date("Y"); $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td>

  <td class="All_50" align="left"><input name="Grade_Graduation" id="Grade_Graduation" class="All_50" value="<?php echo $res4['Grade_Per']; ?>" maxlength="25" readOnly/></td>

  <td class="All_50" align="center" style="background-color:<?php if($res4['MaxQuali']=='Y'){echo '#65CA00';}else{echo '#FFFFFF';} ?>;"><input type="checkbox" onClick="FunMaxChk('G')" id="MaxG" <?php if($res4['MaxQuali']=='Y'){echo 'checked';} ?>  />

  <input type="hidden" id="MaxGQuali" name="MaxGQuali" value="<?php echo $res4['MaxQuali']; ?>" /></td>

</tr></table></td>

</tr>

<?php $sql5=mysql_query("select * from hrm_employee_qualification where EmployeeID=".$EMPID." AND Qualification='Post_Graduation' ", $con); $row5=mysql_num_rows($sql5);

      if($row5>0) { $res5=mysql_fetch_assoc($sql5);} ?>

<tr>

<td style="width:30px;background-color:#E0DBE3;" align="center"></td>

<td><table bgcolor="#FFFFFF" border="1"><tr>

  <td class="All_120" align="left">&nbsp;Post Graduation&nbsp;</td>

  <td class="All_120" align="left"><input type="hidden" name="PG_Id" value="<?php echo $res5['QualificationId']; ?>">

  <input name="Spec_PG" id="Spec_PG" class="All_120" value="<?php echo $res5['Specialization']; ?>" readOnly/></td>

  <td class="All_200" align="left">

  <input name="InsU_PG" id="InsU_PG" class="All_200" value="<?php echo $res5['Institute']; ?>" readOnly/></td>

  <td class="All_150" style="width:160px;" align="left">

  <input name="Subject_PG" id="Subject_PG" class="All_150" value="<?php echo $res5['Subject']; ?>" readOnly/></td>

  <td class="All_60" align="left"><select name="PassOut_PG" id="PassOut_PG" class="All_60" disabled>

  <?php if($res5['PassOut']==0 OR $res5['PassOut']=='') { ?><option value="0">Select</option><?php } ?>

  <?php if($res5['PassOut']>1000) { ?> <option value="<?php echo $res5['PassOut']; ?>"><?php echo $res5['PassOut']; ?></option>

  <option style="background-color:#51A8FF;" value="0">Select</option><?php } ?>

  <?php for($i=1950; $i<=date("Y"); $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td>

  <td class="All_50" align="left"><input name="Grade_PG" id="Grade_PG" class="All_50" value="<?php echo $res5['Grade_Per']; ?>" maxlength="25" readOnly/></td>

  <td class="All_50" align="center" style="background-color:<?php if($res5['MaxQuali']=='Y'){echo '#65CA00';}else{echo '#FFFFFF';} ?>;"><input type="checkbox" onClick="FunMaxChk('PG')" id="MaxPG" <?php if($res5['MaxQuali']=='Y'){echo 'checked';} ?> />

  <input type="hidden" id="MaxPGQuali" name="MaxPGQuali" value="<?php echo $res5['MaxQuali']; ?>" /></td>

</tr></table></td>

</tr>

<?php $sqlExtQ=mysql_query("select * from hrm_employee_qualification where EmployeeID=".$EMPID." AND (Qualification!='10th' AND Qualification!='12th' AND Qualification!='Graduation' AND Qualification!='Post_Graduation')", $con); $rowExtQ=mysql_num_rows($sqlExtQ); if($rowExtQ>0) { $i=1; while($resExtQ=mysql_fetch_assoc($sqlExtQ)){ ?>

<tr>

<td align="center"></td>

<td><table bgcolor="#FFFFFF" border="1"><tr>

  <td class="All_120" align="left"><input type="hidden" name="Quali_Id<?php echo $i;?>" value="<?php echo $resExtQ['QualificationId']; ?>">

  <input style="" name="Quali<?php echo $i;?>" id="Quali<?php echo $i;?>" value="<?php echo $resExtQ['Qualification']; ?>" class="All_120" value="Not" readOnly/></td>

  <td class="All_120" align="left">

  <input name="Spec<?php echo $i;?>" id="Spec<?php echo $i;?>" value="<?php echo $resExtQ['Specialization']; ?>" class="All_120" readOnly/></td>

  <td class="All_200" align="left">

  <input name="InsU<?php echo $i;?>" id="InsU<?php echo $i;?>" value="<?php echo $resExtQ['Institute']; ?>" class="All_200" readOnly/></td>

  <td class="All_150" style="width:160px;" align="left">

  <input name="Subject<?php echo $i;?>" id="Subject<?php echo $i;?>" value="<?php echo $resExtQ['Subject']; ?>" class="All_150" readOnly/></td>

 <td class="All_60" align="left"><select name="PassOut<?php echo $i;?>" id="PassOut<?php echo $i;?>" class="All_60" disabled>

 <?php if($resExtQ['PassOut']==0 OR $resExtQ['PassOut']=='') { ?><option value="0">Select</option><?php } ?>

 <?php if($resExtQ['PassOut']>1000) { ?> <option value="<?php echo $resExtQ['PassOut']; ?>"><?php echo $resExtQ['PassOut']; ?></option>

 <option style="background-color:#51A8FF;" value="0">Select</option><?php } ?>

  <?php for($k=1950; $k<=date("Y"); $k++) { ?><option value="<?php echo $k; ?>"><?php echo $k; ?></option><?php } ?></select></td>

  <td class="All_50" align="left">

  <input name="Grade<?php echo $i; ?>" id="Grade<?php echo $i; ?>" value="<?php echo $resExtQ['Grade_Per']; ?>" maxlength="25" class="All_50" readOnly/></td>

  <td class="All_50" align="center"><a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="DelQuali(<?php echo $resExtQ['QualificationId'].','.$EMPID; ?>)"></a></td>

  <td class="All_50" align="center" style="background-color:<?php if($resExtQ['MaxQuali']=='Y'){echo '#65CA00';}else{echo '#FFFFFF';} ?>;"><input type="checkbox" onClick="FunMax2Chk(<?php echo $i;?>)" id="Max<?php echo $i;?>" <?php if($resExtQ['MaxQuali']=='Y'){echo 'checked';} ?> />

  <input type="hidden" id="MaxQuali<?php echo $i;?>" name="MaxQuali<?php echo $i;?>" value="<?php echo $resExtQ['MaxQuali']; ?>" /></td>

</tr></table></td>

</tr>

<?php $i++; } }?><input type="hidden" name="RowCountQuali" id="RowCountQuali" value="<?php echo $rowExtQ; ?>" />

<tr>

<td style="width:30px;display:block;" id="img1" align="center">

<img src="images/Addnew.png" border="0" id="addImg1" onClick="ShowRowQuali()"/>

<img src="images/Minusnew.png" id="minusImg1" style="display:none;" border="0" onClick="HideRowQuali()"/></td>

<td><table style="display:none;" id="Row1" bgcolor="#FFFFFF" border="1"><tr>

  <td class="All_120" align="left"><input style="" name="Quali_1" id="Quali_1" class="All_120" value="Not" readOnly/></td>

   <td class="All_120" align="left"><input name="Spec_1" id="Spec_1" class="All_120" readOnly/></td>

  <td class="All_200" align="left"><input name="InsU_1" id="InsU_1" class="All_200" readOnly/></td>

  <td class="All_150" style="width:160px;" align="left"><input name="Subject_1" id="Subject_1" class="All_150" readOnly/></td>

  <td class="All_60" align="left"><select name="PassOut_1" id="PassOut_1" class="All_60" disabled>

  <option value="0">Select</option><?php for($i=1950; $i<=date("Y"); $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td>

  <td class="All_50" align="left"><input name="Grade_1" id="Grade_1" class="All_50" maxlength="25" readOnly/></td>

  <td class="All_50" align="center"><input type="checkbox" onClick="FunMax22Chk(1)" id="Max_1" /><input type="hidden" id="MaxQuali_1" name="MaxQuali_1" /></td>

</tr></table></td>

</tr>

<tr>

<td style="width:30px;display:block;" id="img2" align="center">

<img src="images/Addnew.png" border="0" style="display:none;" id="addImg2" onClick="ShowRowQuali2()"/>

<img src="images/Minusnew.png" id="minusImg2" style="display:none;" border="0" onClick="HideRowQuali2()"/></td>

<td><table style="display:none;" id="Row2" bgcolor="#FFFFFF" border="1"><tr>

 <td class="All_120" align="left"><input style="t" name="Quali_2" id="Quali_2" class="All_120" value="Not" readOnly/></td>

  <td class="All_120" align="left"><input name="Spec_2" id="Spec_2" class="All_120" readOnly/></td>

  <td class="All_200" align="left"><input name="InsU_2" id="InsU_2" class="All_200" readOnly/></td>

  <td class="All_150" style="width:160px;" align="left"><input name="Subject_2" id="Subject_2" class="All_150" readOnly/></td>

 <td class="All_60" align="left"><select name="PassOut_2" id="PassOut_2" class="All_60" disabled>

  <option value="0">Select</option><?php for($i=1950; $i<=date("Y"); $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td>

  <td class="All_50" align="left"><input name="Grade_2" id="Grade_2" class="All_50" maxlength="25" readOnly/></td>

  <td class="All_50" align="center"><input type="checkbox" onClick="FunMax22Chk(2)" id="Max_2" /><input type="hidden" id="MaxQuali_2" name="MaxQuali_2" /></td>

</tr></table></td>

</tr>

<tr>

<td style="width:30px;display:block;" id="img3" align="center">

<img src="images/Addnew.png" border="0" style="display:none;" id="addImg3" onClick="ShowRowQuali3()"/>

<img src="images/Minusnew.png" id="minusImg3" style="display:none;" border="0" onClick="HideRowQuali3()"/></td>

<td><table style="display:none;" id="Row3" bgcolor="#FFFFFF" border="1"><tr>

  <td class="All_120" align="left"><input style="" name="Quali_3" id="Quali_3" class="All_120" value="Not" readOnly/></td>

   <td class="All_120" align="left"><input name="Spec_3" id="Spec_3" class="All_120" readOnly/></td>

  <td class="All_200" align="left"><input name="InsU_3" id="InsU_3" class="All_200" readOnly/></td>

  <td class="All_150" style="width:160px;" align="left"><input name="Subject_3" id="Subject_3" class="All_150" readOnly/></td>

  <td class="All_60" align="left"><select name="PassOut_3" id="PassOut_3" class="All_60" disabled>

  <option value="0">Select</option><?php for($i=1950; $i<=date("Y"); $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td>

  <td class="All_50" align="left"><input name="Grade_3" id="Grade_3" class="All_50" maxlength="25" readOnly/></td>

  <td class="All_50" align="center"><input type="checkbox" onClick="FunMax22Chk(3)" id="Max_3" /><input type="hidden" id="MaxQuali_3" name="MaxQuali_3" /></td>

</tr></table></td>

</tr>

<tr>

<td style="width:30px;display:block;" id="img4" align="center">

<img src="images/Addnew.png" border="0" style="display:none;" id="addImg4" onClick="ShowRowQuali4()"/>

<img src="images/Minusnew.png" id="minusImg4" style="display:none;" border="0" onClick="HideRowQuali4()"/></td>

<td><table style="display:none;" id="Row4" bgcolor="#FFFFFF" border="1"><tr>

  <td class="All_120" align="left"><input style="" name="Quali_4" id="Quali_4" class="All_120" value="Not" readOnly/></td>

   <td class="All_120" align="left"><input name="Spec_4" id="Spec_4" class="All_120" readOnly/></td>

  <td class="All_200" align="left"><input name="InsU_4" id="InsU_4" class="All_200" readOnly/></td>

  <td class="All_150" style="width:160px;" align="left"><input name="Subject_4" id="Subject_4" class="All_150" readOnly/></td>

  <td class="All_60" align="left"><select name="PassOut_4" id="PassOut_4" class="All_60" disabled>

  <option value="0">Select</option><?php for($i=1950; $i<=date("Y"); $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td>

  <td class="All_50" align="left"><input name="Grade_4" id="Grade_4" class="All_50" maxlength="25" readOnly/></td>

  <td class="All_50" align="center"><input type="checkbox" onClick="FunMax22Chk(4)" id="Max_4" /><input type="hidden" id="MaxQuali_4" name="MaxQuali_4" /></td>

</tr></table></td>

</tr>

<tr>

<td style="width:30px;display:block;" id="img5" align="center">

<img src="images/Addnew.png" border="0" style="display:none;" id="addImg5" onClick="ShowRowQuali5()"/>

<img src="images/Minusnew.png" id="minusImg5" style="display:none;" border="0" onClick="HideRowQuali5()"/></td>

<td><table style="display:none;" id="Row5" bgcolor="#FFFFFF" border="1"><tr>

  <td class="All_120" align="left"><input style="" name="Quali_5" id="Quali_5" class="All_120" value="Not" readOnly/></td>

   <td class="All_120" align="left"><input name="Spec_5" id="Spec_5" class="All_120" readOnly/></td>

  <td class="All_200" align="left"><input name="InsU_5" id="InsU_5" class="All_200" readOnly/></td>

  <td class="All_150" style="width:160px;" align="left"><input name="Subject_5" id="Subject_5" class="All_150" readOnly/></td>

  <td class="All_60" align="left"><select name="PassOut_5" id="PassOut_5" class="All_60" disabled>

  <option value="0">Select</option><?php for($i=1950; $i<=date("Y"); $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td>

  <td class="All_50" align="left"><input name="Grade_5" id="Grade_5" class="All_50" maxlength="25" readOnly/></td>

  <td class="All_50" align="center"><input type="checkbox" onClick="FunMax22Chk(5)" id="Max_5" /><input type="hidden" id="MaxQuali_5" name="MaxQuali_5" /></td>

</tr></table></td>

</tr>

 <tr>

  <td align="Right" class="fontButton" colspan="6"><table border="0" align="right" class="fontButton">

	<tr>	

<?php if($_SESSION['User_Permission']=='Edit'){ ?> 

	  <td align="right" style="width:90px;"><input type="button" name="ChangeQuali" id="ChangeQuali" style="width:90px; display:block;" value="Edit" onClick="EditQuali()">

		<input type="submit" name="EditQualificationE" id="EditQualificationE" style="width:90px;display:none;" value="save"></td>

<?php } ?>

	  <td align="right" style="width:90px;"><input type="button" name="RefreshQualiE" id="RefreshQualiE" style="width:90px;" value="refresh" onClick="javascript:window.location='EmpQuali.php?ID=<?php echo $EMPID; ?>&Event=Edit'"/></td>

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



