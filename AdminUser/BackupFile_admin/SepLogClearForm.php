<?php require_once('../AdminUser/config/config.php'); 

if(isset($_POST['submitRepNoc']))

{ 

  $search =  '!"#$%&/\'-:_' ; $search = str_split($search);

  $DDH_R=str_replace($search, "", $_POST['DDH_Remark']); $TID_R=str_replace($search, "", $_POST['TID_Remark']);

  $APTC_R=str_replace($search, "", $_POST['APTC_Remark']); $HOAS_R=str_replace($search, "", $_POST['HOAS_Remark']);

  $Oth_R=str_replace($search, "", $_POST['Oth_Remark']);

  $Prtis1=''; $Prtis2=''; $Prtis3=''; $Prtis4=''; $Prtis5=''; $Prtis6=''; $Prtis7=''; $Prtis8=''; $Prtis9=''; $Prtis10=''; 

  $Prtis11=''; $Prtis12=''; $Prtis13=''; $Prtis14=''; $Prtis15=''; $Prtis16=''; $Prtis17=''; $Prtis18=''; $Prtis19=''; $Prtis20='';

  $Prtis21=''; $Prtis22=''; $Prtis23=''; $Prtis24=''; $Prtis25=''; $Prtis26=''; $Prtis27=''; $Prtis28=''; $Prtis29=''; $Prtis30='';

  $Prtis31=''; $Prtis32=''; $Prtis33=''; $Prtis34=''; $Prtis35=''; $Prtis36=''; $Prtis37=''; $Prtis38=''; $Prtis39=''; $Prtis40='';

  $PrtisR1=''; $PrtisR2=''; $PrtisR3=''; $PrtisR4=''; $PrtisR5=''; $PrtisR6=''; $PrtisR7=''; $PrtisR8=''; $PrtisR9=''; $PrtisR10=''; $PrtisROth=''; 

  $PrtisR11=''; $PrtisR12=''; $PrtisR13=''; $PrtisR14=''; $PrtisR15=''; $PrtisR16=''; $PrtisR17=''; $PrtisR18=''; $PrtisR19=''; $PrtisR20='';  

  $PrtisR21=''; $PrtisR22=''; $PrtisR23=''; $PrtisR24=''; $PrtisR25=''; $PrtisR26=''; $PrtisR27=''; $PrtisR28=''; $PrtisR29=''; $PrtisR30='';  

  $PrtisR31=''; $PrtisR32=''; $PrtisR33=''; $PrtisR34=''; $PrtisR35=''; $PrtisR36=''; $PrtisR37=''; $PrtisR38=''; $PrtisR39=''; $PrtisR40=''; 



  if($_POST['Prtis1']!=''){$Prtis1=str_replace($search, "", $_POST['Prtis1']);}if($_POST['Prtis_Remark1']!=''){$PrtisR1=str_replace($search, "", $_POST['Prtis_Remark1']);}

  if($_POST['Prtis2']!=''){$Prtis2=str_replace($search, "", $_POST['Prtis2']);}if($_POST['Prtis_Remark2']!=''){$PrtisR2=str_replace($search, "", $_POST['Prtis_Remark2']);}

  if($_POST['Prtis3']!=''){$Prtis3=str_replace($search, "", $_POST['Prtis3']);}if($_POST['Prtis_Remark3']!=''){$PrtisR3=str_replace($search, "", $_POST['Prtis_Remark3']);}

  if($_POST['Prtis4']!=''){$Prtis4=str_replace($search, "", $_POST['Prtis4']);}if($_POST['Prtis_Remark4']!=''){$PrtisR4=str_replace($search, "", $_POST['Prtis_Remark4']);}

  if($_POST['Prtis5']!=''){$Prtis5=str_replace($search, "", $_POST['Prtis5']);}if($_POST['Prtis_Remark5']!=''){$PrtisR5=str_replace($search, "", $_POST['Prtis_Remark5']);}

  if($_POST['Prtis6']!=''){$Prtis6=str_replace($search, "", $_POST['Prtis6']);}if($_POST['Prtis_Remark6']!=''){$PrtisR6=str_replace($search, "", $_POST['Prtis_Remark6']);}

  if($_POST['Prtis7']!=''){$Prtis7=str_replace($search, "", $_POST['Prtis7']);}if($_POST['Prtis_Remark7']!=''){$PrtisR7=str_replace($search, "", $_POST['Prtis_Remark7']);}

  if($_POST['Prtis8']!=''){$Prtis8=str_replace($search, "", $_POST['Prtis8']);}if($_POST['Prtis_Remark8']!=''){$PrtisR8=str_replace($search, "", $_POST['Prtis_Remark8']);}

  if($_POST['Prtis9']!=''){$Prtis9=str_replace($search, "", $_POST['Prtis9']);}if($_POST['Prtis_Remark9']!=''){$PrtisR9=str_replace($search, "", $_POST['Prtis_Remark9']);}

  if($_POST['Prtis10']!=''){$Prtis10=str_replace($search, "", $_POST['Prtis10']);}if($_POST['Prtis_Remark10']!=''){$PrtisR10=str_replace($search, "", $_POST['Prtis_Remark10']);}

  

  if($_POST['Prtis11']!=''){$Prtis11=str_replace($search, "", $_POST['Prtis11']);}if($_POST['Prtis_Remark11']!=''){$PrtisR11=str_replace($search, "", $_POST['Prtis_Remark11']);}

  if($_POST['Prtis12']!=''){$Prtis12=str_replace($search, "", $_POST['Prtis12']);}if($_POST['Prtis_Remark12']!=''){$PrtisR12=str_replace($search, "", $_POST['Prtis_Remark12']);}

  if($_POST['Prtis13']!=''){$Prtis13=str_replace($search, "", $_POST['Prtis13']);}if($_POST['Prtis_Remark13']!=''){$PrtisR13=str_replace($search, "", $_POST['Prtis_Remark13']);}

  if($_POST['Prtis14']!=''){$Prtis14=str_replace($search, "", $_POST['Prtis14']);}if($_POST['Prtis_Remark14']!=''){$PrtisR14=str_replace($search, "", $_POST['Prtis_Remark14']);}

  if($_POST['Prtis15']!=''){$Prtis15=str_replace($search, "", $_POST['Prtis15']);}if($_POST['Prtis_Remark15']!=''){$PrtisR15=str_replace($search, "", $_POST['Prtis_Remark15']);}

  if($_POST['Prtis16']!=''){$Prtis16=str_replace($search, "", $_POST['Prtis16']);}if($_POST['Prtis_Remark16']!=''){$PrtisR16=str_replace($search, "", $_POST['Prtis_Remark16']);}

  if($_POST['Prtis17']!=''){$Prtis17=str_replace($search, "", $_POST['Prtis17']);}if($_POST['Prtis_Remark17']!=''){$PrtisR17=str_replace($search, "", $_POST['Prtis_Remark17']);}

  if($_POST['Prtis18']!=''){$Prtis18=str_replace($search, "", $_POST['Prtis18']);}if($_POST['Prtis_Remark18']!=''){$PrtisR18=str_replace($search, "", $_POST['Prtis_Remark18']);}

  if($_POST['Prtis19']!=''){$Prtis19=str_replace($search, "", $_POST['Prtis19']);}if($_POST['Prtis_Remark19']!=''){$PrtisR19=str_replace($search, "", $_POST['Prtis_Remark19']);}

  if($_POST['Prtis20']!=''){$Prtis20=str_replace($search, "", $_POST['Prtis20']);}if($_POST['Prtis_Remark20']!=''){$PrtisR20=str_replace($search, "", $_POST['Prtis_Remark20']);}

  if($_POST['Prtis21']!=''){$Prtis21=str_replace($search, "", $_POST['Prtis21']);}if($_POST['Prtis_Remark21']!=''){$PrtisR21=str_replace($search, "", $_POST['Prtis_Remark21']);}

  if($_POST['Prtis22']!=''){$Prtis22=str_replace($search, "", $_POST['Prtis22']);}if($_POST['Prtis_Remark22']!=''){$PrtisR22=str_replace($search, "", $_POST['Prtis_Remark22']);}

  if($_POST['Prtis23']!=''){$Prtis23=str_replace($search, "", $_POST['Prtis23']);}if($_POST['Prtis_Remark23']!=''){$PrtisR23=str_replace($search, "", $_POST['Prtis_Remark23']);}

  if($_POST['Prtis24']!=''){$Prtis24=str_replace($search, "", $_POST['Prtis24']);}if($_POST['Prtis_Remark24']!=''){$PrtisR24=str_replace($search, "", $_POST['Prtis_Remark24']);}

  if($_POST['Prtis25']!=''){$Prtis25=str_replace($search, "", $_POST['Prtis25']);}if($_POST['Prtis_Remark25']!=''){$PrtisR25=str_replace($search, "", $_POST['Prtis_Remark25']);}

  if($_POST['Prtis26']!=''){$Prtis26=str_replace($search, "", $_POST['Prtis26']);}if($_POST['Prtis_Remark26']!=''){$PrtisR26=str_replace($search, "", $_POST['Prtis_Remark26']);}

  if($_POST['Prtis27']!=''){$Prtis27=str_replace($search, "", $_POST['Prtis27']);}if($_POST['Prtis_Remark27']!=''){$PrtisR27=str_replace($search, "", $_POST['Prtis_Remark27']);}

  if($_POST['Prtis28']!=''){$Prtis28=str_replace($search, "", $_POST['Prtis28']);}if($_POST['Prtis_Remark28']!=''){$PrtisR28=str_replace($search, "", $_POST['Prtis_Remark28']);}

  if($_POST['Prtis29']!=''){$Prtis29=str_replace($search, "", $_POST['Prtis29']);}if($_POST['Prtis_Remark29']!=''){$PrtisR29=str_replace($search, "", $_POST['Prtis_Remark29']);}

  if($_POST['Prtis30']!=''){$Prtis30=str_replace($search, "", $_POST['Prtis30']);}if($_POST['Prtis_Remark30']!=''){$PrtisR30=str_replace($search, "", $_POST['Prtis_Remark30']);}

  if($_POST['Prtis31']!=''){$Prtis31=str_replace($search, "", $_POST['Prtis31']);}if($_POST['Prtis_Remark31']!=''){$PrtisR31=str_replace($search, "", $_POST['Prtis_Remark31']);}

  if($_POST['Prtis32']!=''){$Prtis32=str_replace($search, "", $_POST['Prtis32']);}if($_POST['Prtis_Remark32']!=''){$PrtisR32=str_replace($search, "", $_POST['Prtis_Remark32']);}

  if($_POST['Prtis33']!=''){$Prtis33=str_replace($search, "", $_POST['Prtis33']);}if($_POST['Prtis_Remark33']!=''){$PrtisR33=str_replace($search, "", $_POST['Prtis_Remark33']);}

  if($_POST['Prtis34']!=''){$Prtis34=str_replace($search, "", $_POST['Prtis34']);}if($_POST['Prtis_Remark34']!=''){$PrtisR34=str_replace($search, "", $_POST['Prtis_Remark34']);}

  if($_POST['Prtis35']!=''){$Prtis35=str_replace($search, "", $_POST['Prtis35']);}if($_POST['Prtis_Remark35']!=''){$PrtisR35=str_replace($search, "", $_POST['Prtis_Remark35']);}

  if($_POST['Prtis36']!=''){$Prtis36=str_replace($search, "", $_POST['Prtis36']);}if($_POST['Prtis_Remark36']!=''){$PrtisR36=str_replace($search, "", $_POST['Prtis_Remark36']);}

  if($_POST['Prtis37']!=''){$Prtis37=str_replace($search, "", $_POST['Prtis37']);}if($_POST['Prtis_Remark37']!=''){$PrtisR37=str_replace($search, "", $_POST['Prtis_Remark37']);}

  if($_POST['Prtis38']!=''){$Prtis38=str_replace($search, "", $_POST['Prtis38']);}if($_POST['Prtis_Remark38']!=''){$PrtisR38=str_replace($search, "", $_POST['Prtis_Remark38']);}

  if($_POST['Prtis39']!=''){$Prtis39=str_replace($search, "", $_POST['Prtis39']);}if($_POST['Prtis_Remark39']!=''){$PrtisR39=str_replace($search, "", $_POST['Prtis_Remark39']);}

  if($_POST['Prtis40']!=''){$Prtis40=str_replace($search, "", $_POST['Prtis40']);}if($_POST['Prtis_Remark40']!=''){$PrtisR40=str_replace($search, "", $_POST['Prtis_Remark40']);}


 $TotRepAmt=$_POST['Prtis_Amt1']+$_POST['Prtis_Amt2']+$_POST['Prtis_Amt3']+$_POST['Prtis_Amt4']+$_POST['Prtis_Amt5']+$_POST['Prtis_Amt6']+$_POST['Prtis_Amt7']+$_POST['Prtis_Amt8']+$_POST['Prtis_Amt9']+$_POST['Prtis_Amt10']+$_POST['Prtis_Amt11']+$_POST['Prtis_Amt12']+$_POST['Prtis_Amt13']+$_POST['Prtis_Amt14']+$_POST['Prtis_Amt15']+$_POST['Prtis_Amt16']+$_POST['Prtis_Amt17']+$_POST['Prtis_Amt18']+$_POST['Prtis_Amt19']+$_POST['Prtis_Amt20']+$_POST['Prtis_Amt21']+$_POST['Prtis_Amt22']+$_POST['Prtis_Amt23']+$_POST['Prtis_Amt24']+$_POST['Prtis_Amt25']+$_POST['Prtis_Amt26']+$_POST['Prtis_Amt27']+$_POST['Prtis_Amt28']+$_POST['Prtis_Amt29']+$_POST['Prtis_Amt30']+$_POST['Prtis_Amt31']+$_POST['Prtis_Amt32']+$_POST['Prtis_Amt33']+$_POST['Prtis_Amt34']+$_POST['Prtis_Amt35']+$_POST['Prtis_Amt36']+$_POST['Prtis_Amt37']+$_POST['Prtis_Amt38']+$_POST['Prtis_Amt39']+$_POST['Prtis_Amt40'];

  

  $PrtisROth=''; {$PrtisROth=str_replace($search, "", $_POST['Oth_Remark']);}

  $sqlNoc=mysql_query("select NocRepId from hrm_employee_separation_nocrep where EmpSepId=".$_POST['si'], $con); $rowNoc=mysql_num_rows($sqlNoc); 

  if($rowNoc>0)

  { $sqlIns=mysql_query("update hrm_employee_separation_nocrep set NocSubmitDate='".date("Y-m-d")."', DDH='".$_POST['DDH_YN']."', DDH_Amt='".$_POST['DDH_Amt']."', DDH_Remark='".$DDH_R."', TID='".$_POST['TID_YN']."', TID_Amt='".$_POST['TID_Amt']."', TID_Remark='".$TID_R."', APTC='".$_POST['APTC_YN']."', APTC_Amt='".$_POST['APTC_Amt']."', APTC_Remark='".$APTC_R."', HOAS='".$_POST['HOAS_YN']."', HOAS_Amt='".$_POST['HOAS_Amt']."', HOAS_Remark='".$HOAS_R."', Prtis1='".$Prtis1."', Prtis_1='".$_POST['Prtis_YN1']."', Prtis_1Amt='".$_POST['Prtis_Amt1']."', Prtis_1Remark='".$PrtisR1."', Prtis2='".$Prtis2."', Prtis_2='".$_POST['Prtis_YN2']."', Prtis_2Amt='".$_POST['Prtis_Amt2']."', Prtis_2Remark='".$PrtisR2."', Prtis3='".$Prtis3."', Prtis_3='".$_POST['Prtis_YN3']."', Prtis_3Amt='".$_POST['Prtis_Amt3']."', Prtis_3Remark='".$PrtisR3."', Prtis4='".$Prtis4."', Prtis_4='".$_POST['Prtis_YN4']."', Prtis_4Amt='".$_POST['Prtis_Amt4']."', Prtis_4Remark='".$PrtisR4."', Prtis5='".$Prtis5."', Prtis_5='".$_POST['Prtis_YN5']."', Prtis_5Amt='".$_POST['Prtis_Amt5']."', Prtis_5Remark='".$PrtisR5."', Prtis6='".$Prtis6."', Prtis_6='".$_POST['Prtis_YN6']."', Prtis_6Amt='".$_POST['Prtis_Amt6']."', Prtis_6Remark='".$PrtisR6."', Prtis7='".$Prtis7."', Prtis_7='".$_POST['Prtis_YN7']."', Prtis_7Amt='".$_POST['Prtis_Amt7']."', Prtis_7Remark='".$PrtisR7."', Prtis8='".$Prtis8."', Prtis_8='".$_POST['Prtis_YN8']."', Prtis_8Amt='".$_POST['Prtis_Amt8']."', Prtis_8Remark='".$PrtisR8."', Prtis9='".$Prtis9."', Prtis_9='".$_POST['Prtis_YN9']."', Prtis_9Amt='".$_POST['Prtis_Amt9']."', Prtis_9Remark='".$PrtisR9."', Prtis10='".$Prtis10."', Prtis_10='".$_POST['Prtis_YN10']."', Prtis_10Amt='".$_POST['Prtis_Amt10']."', Prtis_10Remark='".$PrtisR10."', Prtis11='".$Prtis11."', Prtis_11='".$_POST['Prtis_YN11']."', Prtis_11Amt='".$_POST['Prtis_Amt11']."', Prtis_11Remark='".$PrtisR11."', Prtis12='".$Prtis12."', Prtis_12='".$_POST['Prtis_YN12']."', Prtis_12Amt='".$_POST['Prtis_Amt12']."', Prtis_12Remark='".$PrtisR12."', Prtis13='".$Prtis13."', Prtis_13='".$_POST['Prtis_YN13']."', Prtis_13Amt='".$_POST['Prtis_Amt13']."', Prtis_13Remark='".$PrtisR13."', Prtis14='".$Prtis14."', Prtis_14='".$_POST['Prtis_YN14']."', Prtis_14Amt='".$_POST['Prtis_Amt14']."', Prtis_14Remark='".$PrtisR14."', Prtis15='".$Prtis15."', Prtis_15='".$_POST['Prtis_YN15']."', Prtis_15Amt='".$_POST['Prtis_Amt15']."', Prtis_15Remark='".$PrtisR15."', Prtis16='".$Prtis16."', Prtis_16='".$_POST['Prtis_YN16']."', Prtis_16Amt='".$_POST['Prtis_Amt16']."', Prtis_16Remark='".$PrtisR16."', Prtis17='".$Prtis17."', Prtis_17='".$_POST['Prtis_YN17']."', Prtis_17Amt='".$_POST['Prtis_Amt17']."', Prtis_17Remark='".$PrtisR17."', Prtis18='".$Prtis18."', Prtis_18='".$_POST['Prtis_YN18']."', Prtis_18Amt='".$_POST['Prtis_Amt18']."', Prtis_18Remark='".$PrtisR18."', Prtis19='".$Prtis19."', Prtis_19='".$_POST['Prtis_YN19']."', Prtis_19Amt='".$_POST['Prtis_Amt19']."', Prtis_19Remark='".$PrtisR19."', Prtis20='".$Prtis20."', Prtis_20='".$_POST['Prtis_YN20']."', Prtis_20Amt='".$_POST['Prtis_Amt20']."', Prtis_20Remark='".$PrtisR20."', Prtis21='".$Prtis21."', Prtis_21='".$_POST['Prtis_YN21']."', Prtis_21Amt='".$_POST['Prtis_Amt21']."', Prtis_21Remark='".$PrtisR21."', Prtis22='".$Prtis22."', Prtis_22='".$_POST['Prtis_YN22']."', Prtis_22Amt='".$_POST['Prtis_Amt22']."', Prtis_22Remark='".$PrtisR22."', Prtis23='".$Prtis23."', Prtis_23='".$_POST['Prtis_YN23']."', Prtis_23Amt='".$_POST['Prtis_Amt23']."', Prtis_23Remark='".$PrtisR23."', Prtis24='".$Prtis24."', Prtis_24='".$_POST['Prtis_YN24']."', Prtis_24Amt='".$_POST['Prtis_Amt24']."', Prtis_24Remark='".$PrtisR24."', Prtis25='".$Prtis25."', Prtis_25='".$_POST['Prtis_YN25']."', Prtis_25Amt='".$_POST['Prtis_Amt25']."', Prtis_25Remark='".$PrtisR25."', Prtis26='".$Prtis26."', Prtis_26='".$_POST['Prtis_YN26']."', Prtis_26Amt='".$_POST['Prtis_Amt26']."', Prtis_26Remark='".$PrtisR26."', Prtis27='".$Prtis27."', Prtis_27='".$_POST['Prtis_YN27']."', Prtis_27Amt='".$_POST['Prtis_Amt27']."', Prtis_27Remark='".$PrtisR27."', Prtis28='".$Prtis28."', Prtis_28='".$_POST['Prtis_YN28']."', Prtis_28Amt='".$_POST['Prtis_Amt28']."', Prtis_28Remark='".$PrtisR28."', Prtis29='".$Prtis29."', Prtis_29='".$_POST['Prtis_YN29']."', Prtis_29Amt='".$_POST['Prtis_Amt29']."', Prtis_29Remark='".$PrtisR29."', Prtis30='".$Prtis30."', Prtis_30='".$_POST['Prtis_YN30']."', Prtis_30Amt='".$_POST['Prtis_Amt30']."', Prtis_30Remark='".$PrtisR30."', Prtis31='".$Prtis31."', Prtis_31='".$_POST['Prtis_YN31']."', Prtis_31Amt='".$_POST['Prtis_Amt31']."', Prtis_31Remark='".$PrtisR31."', Prtis32='".$Prtis32."', Prtis_32='".$_POST['Prtis_YN32']."', Prtis_32Amt='".$_POST['Prtis_Amt32']."', Prtis_32Remark='".$PrtisR32."', Prtis33='".$Prtis33."', Prtis_33='".$_POST['Prtis_YN33']."', Prtis_33Amt='".$_POST['Prtis_Amt33']."', Prtis_33Remark='".$PrtisR33."', Prtis34='".$Prtis34."', Prtis_34='".$_POST['Prtis_YN34']."', Prtis_34Amt='".$_POST['Prtis_Amt34']."', Prtis_34Remark='".$PrtisR34."', Prtis35='".$Prtis35."', Prtis_35='".$_POST['Prtis_YN35']."', Prtis_35Amt='".$_POST['Prtis_Amt35']."', Prtis_35Remark='".$PrtisR35."', Prtis36='".$Prtis36."', Prtis_36='".$_POST['Prtis_YN36']."', Prtis_36Amt='".$_POST['Prtis_Amt36']."', Prtis_36Remark='".$PrtisR36."', Prtis37='".$Prtis37."', Prtis_37='".$_POST['Prtis_YN37']."', Prtis_37Amt='".$_POST['Prtis_Amt37']."', Prtis_37Remark='".$PrtisR37."', Prtis38='".$Prtis38."', Prtis_38='".$_POST['Prtis_YN38']."', Prtis_38Amt='".$_POST['Prtis_Amt38']."', Prtis_38Remark='".$PrtisR38."', Prtis39='".$Prtis39."', Prtis_39='".$_POST['Prtis_YN39']."', Prtis_39Amt='".$_POST['Prtis_Amt39']."', Prtis_39Remark='".$PrtisR39."', Prtis40='".$Prtis40."', Prtis_40='".$_POST['Prtis_YN40']."', Prtis_40Amt='".$_POST['Prtis_Amt40']."', Prtis_40Remark='".$PrtisR40."', TotRepAmt='".$TotRepAmt."', RepId=".$_POST['ei'].", Oth_Remark='".$PrtisROth."' where EmpSepId=".$_POST['si'], $con);}
//$_POST['TotAmt']

  else

  { $sqlIns=mysql_query("insert into hrm_employee_separation_nocrep(EmpSepId, NocSubmitDate, DDH, DDH_Amt, DDH_Remark, TID, TID_Amt, TID_Remark, APTC, APTC_Amt, APTC_Remark, HOAS, HOAS_Amt, HOAS_Remark, Prtis1, Prtis_1, Prtis_1Amt, Prtis_1Remark, Prtis2, Prtis_2, Prtis_2Amt, Prtis_2Remark, Prtis3, Prtis_3, Prtis_3Amt, Prtis_3Remark, Prtis4, Prtis_4, Prtis_4Amt, Prtis_4Remark, Prtis5, Prtis_5, Prtis_5Amt, Prtis_5Remark, Prtis6, Prtis_6, Prtis_6Amt, Prtis_6Remark, Prtis7, Prtis_7, Prtis_7Amt, Prtis_7Remark, Prtis8, Prtis_8, Prtis_8Amt, Prtis_8Remark, Prtis9, Prtis_9, Prtis_9Amt, Prtis_9Remark, Prtis10, Prtis_10, Prtis_10Amt, Prtis_10Remark, Prtis11, Prtis_11, Prtis_11Amt, Prtis_11Remark, Prtis12, Prtis_12, Prtis_12Amt, Prtis_12Remark, Prtis13, Prtis_13, Prtis_13Amt, Prtis_13Remark, Prtis14, Prtis_14, Prtis_14Amt, Prtis_14Remark, Prtis15, Prtis_15, Prtis_15Amt, Prtis_15Remark, Prtis16, Prtis_16, Prtis_16Amt, Prtis_16Remark, Prtis17, Prtis_17, Prtis_17Amt, Prtis_17Remark, Prtis18, Prtis_18, Prtis_18Amt, Prtis_18Remark, Prtis19, Prtis_19, Prtis_19Amt, Prtis_19Remark, Prtis20, Prtis_20, Prtis_20Amt, Prtis_20Remark, Prtis21, Prtis_21, Prtis_21Amt, Prtis_21Remark, Prtis22, Prtis_22, Prtis_22Amt, Prtis_22Remark, Prtis23, Prtis_23, Prtis_23Amt, Prtis_23Remark, Prtis24, Prtis_24, Prtis_24Amt, Prtis_24Remark, Prtis25, Prtis_25, Prtis_25Amt, Prtis_25Remark, Prtis26, Prtis_26, Prtis_26Amt, Prtis_26Remark, Prtis27, Prtis_27, Prtis_27Amt, Prtis_27Remark, Prtis28, Prtis_28, Prtis_28Amt, Prtis_28Remark, Prtis29, Prtis_29, Prtis_29Amt, Prtis_29Remark, Prtis30, Prtis_30, Prtis_30Amt, Prtis_30Remark, Prtis31, Prtis_31, Prtis_31Amt, Prtis_31Remark, Prtis32, Prtis_32, Prtis_32Amt, Prtis_32Remark, Prtis33, Prtis_33, Prtis_33Amt, Prtis_33Remark, Prtis34, Prtis_34, Prtis_34Amt, Prtis_34Remark, Prtis35, Prtis_35, Prtis_35Amt, Prtis_35Remark, Prtis36, Prtis_36, Prtis_36Amt, Prtis_36Remark, Prtis37, Prtis_37, Prtis_37Amt, Prtis_37Remark, Prtis38, Prtis_38, Prtis_38Amt, Prtis_38Remark, Prtis39, Prtis_39, Prtis_39Amt, Prtis_39Remark, Prtis40, Prtis_40, Prtis_40Amt, Prtis_40Remark, TotRepAmt, RepId, Oth_Remark) values(".$_POST['si'].", '".date("Y-m-d")."', '".$_POST['DDH_YN']."', '".$_POST['DDH_Amt']."', '".$DDH_R."', '".$_POST['TID_YN']."', '".$_POST['TID_Amt']."', '".$TID_R."', '".$_POST['APTC_YN']."', '".$_POST['APTC_Amt']."', '".$APTC_R."', '".$_POST['HOAS_YN']."', '".$_POST['HOAS_Amt']."', '".$HOAS_R."', '".$Prtis1."', '".$_POST['Prtis_YN1']."', '".$_POST['Prtis_Amt1']."', '".$PrtisR1."', '".$Prtis2."', '".$_POST['Prtis_YN2']."', '".$_POST['Prtis_Amt2']."', '".$PrtisR2."', '".$Prtis3."', '".$_POST['Prtis_YN3']."', '".$_POST['Prtis_Amt3']."', '".$PrtisR3."', '".$Prtis4."', '".$_POST['Prtis_YN4']."', '".$_POST['Prtis_Amt4']."', '".$PrtisR4."', '".$Prtis5."', '".$_POST['Prtis_YN5']."', '".$_POST['Prtis_Amt5']."', '".$PrtisR5."', '".$Prtis6."', '".$_POST['Prtis_YN6']."', '".$_POST['Prtis_Amt6']."', '".$PrtisR6."', '".$Prtis7."', '".$_POST['Prtis_YN7']."', '".$_POST['Prtis_Amt7']."', '".$PrtisR7."', '".$Prtis8."', '".$_POST['Prtis_YN8']."', '".$_POST['Prtis_Amt8']."', '".$PrtisR8."', '".$Prtis9."', '".$_POST['Prtis_YN9']."', '".$_POST['Prtis_Amt9']."', '".$PrtisR9."', '".$Prtis10."', '".$_POST['Prtis_YN10']."', '".$_POST['Prtis_Amt10']."', '".$PrtisR10."', '".$Prtis11."', '".$_POST['Prtis_YN11']."', '".$_POST['Prtis_Amt11']."', '".$PrtisR11."', '".$Prtis12."', '".$_POST['Prtis_YN12']."', '".$_POST['Prtis_Amt12']."', '".$PrtisR12."', '".$Prtis13."', '".$_POST['Prtis_YN13']."', '".$_POST['Prtis_Amt13']."', '".$PrtisR13."', '".$Prtis14."', '".$_POST['Prtis_YN14']."', '".$_POST['Prtis_Amt14']."', '".$PrtisR14."', '".$Prtis15."', '".$_POST['Prtis_YN15']."', '".$_POST['Prtis_Amt15']."', '".$PrtisR15."', '".$Prtis16."', '".$_POST['Prtis_YN16']."', '".$_POST['Prtis_Amt16']."', '".$PrtisR16."', '".$Prtis17."', '".$_POST['Prtis_YN17']."', '".$_POST['Prtis_Amt17']."', '".$PrtisR17."', '".$Prtis18."', '".$_POST['Prtis_YN18']."', '".$_POST['Prtis_Amt18']."', '".$PrtisR18."', '".$Prtis19."', '".$_POST['Prtis_YN19']."', '".$_POST['Prtis_Amt19']."', '".$PrtisR19."', '".$Prtis20."', '".$_POST['Prtis_YN20']."', '".$_POST['Prtis_Amt20']."', '".$PrtisR20."', '".$Prtis21."', '".$_POST['Prtis_YN21']."', '".$_POST['Prtis_Amt21']."', '".$PrtisR21."', '".$Prtis22."', '".$_POST['Prtis_YN22']."', '".$_POST['Prtis_Amt22']."', '".$PrtisR22."', '".$Prtis23."', '".$_POST['Prtis_YN23']."', '".$_POST['Prtis_Amt23']."', '".$PrtisR23."', '".$Prtis24."', '".$_POST['Prtis_YN24']."', '".$_POST['Prtis_Amt24']."', '".$PrtisR24."', '".$Prtis25."', '".$_POST['Prtis_YN25']."', '".$_POST['Prtis_Amt25']."', '".$PrtisR25."', '".$Prtis26."', '".$_POST['Prtis_YN26']."', '".$_POST['Prtis_Amt26']."', '".$PrtisR26."', '".$Prtis27."', '".$_POST['Prtis_YN27']."', '".$_POST['Prtis_Amt27']."', '".$PrtisR27."', '".$Prtis28."', '".$_POST['Prtis_YN28']."', '".$_POST['Prtis_Amt28']."', '".$PrtisR28."', '".$Prtis29."', '".$_POST['Prtis_YN29']."', '".$_POST['Prtis_Amt29']."', '".$PrtisR29."', '".$Prtis30."', '".$_POST['Prtis_YN30']."', '".$_POST['Prtis_Amt30']."', '".$PrtisR30."', '".$Prtis31."', '".$_POST['Prtis_YN31']."', '".$_POST['Prtis_Amt31']."', '".$PrtisR31."', '".$Prtis32."', '".$_POST['Prtis_YN32']."', '".$_POST['Prtis_Amt32']."', '".$PrtisR32."', '".$Prtis33."', '".$_POST['Prtis_YN33']."', '".$_POST['Prtis_Amt33']."', '".$PrtisR33."', '".$Prtis34."', '".$_POST['Prtis_YN34']."', '".$_POST['Prtis_Amt34']."', '".$PrtisR34."', '".$Prtis35."', '".$_POST['Prtis_YN35']."', '".$_POST['Prtis_Amt35']."', '".$PrtisR35."', '".$Prtis36."', '".$_POST['Prtis_YN36']."', '".$_POST['Prtis_Amt36']."', '".$PrtisR36."', '".$Prtis37."', '".$_POST['Prtis_YN37']."', '".$_POST['Prtis_Amt37']."', '".$PrtisR37."', '".$Prtis38."', '".$_POST['Prtis_YN38']."', '".$_POST['Prtis_Amt38']."', '".$PrtisR38."', '".$Prtis39."', '".$_POST['Prtis_YN39']."', '".$_POST['Prtis_Amt39']."', '".$PrtisR39."', '".$Prtis40."', '".$_POST['Prtis_YN40']."', '".$_POST['Prtis_Amt40']."', '".$PrtisR40."', '".$TotRepAmt."', ".$_POST['ei'].", '".$PrtisROth."')", $con); }
//$_POST['TotAmt']





  if($sqlIns){$sqlUp=mysql_query("update hrm_employee_separation set Log_NOC='Y' where EmpSepId=".$_POST['si'], $con); }

  if($sqlUp)

  {



    /************************************************ HR ***********************************************/ 

    $email_to = 'vspl.hr@vnrseeds.com';

    $email_from = 'admin@vnrseeds.co.in';

    $email_subject = "NOC Clearance";

	$email_txt = "NOC Clearance";

	$headers = "From: ".$email_from."\r\n";

	$semi_rand = md5(time()); 

	$headers .= "MIME-Version: 1.0\r\n";

	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$email_message .="The clearance form of ".$_POST['Ename']." has been provided by Logistics department. Log on to ESS for approval and further details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";

	$email_message .="Thanks & Regards\n";

    $email_message .="HR\n\n";

	$ok = @mail($email_to, $email_subject, $email_message, $headers);



	$sqlRep=mysql_query("select Rep_EmployeeID from hrm_employee_separation where EmpSepId=".$_POST['si'], $con); $resRep=mysql_fetch_assoc($sqlRep);

	$sqlRMail=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$resRep['Rep_EmployeeID'], $con); $resRMail=mysql_fetch_assoc($sqlRMail);

	/************************************************ Reporting ***********************************************/   

if($resRMail['EmailId_Vnr']!='')

{

$email_to2 = $resRMail['EmailId_Vnr'];

$email_from2 = 'admin@vnrseeds.co.in';

$email_subject2 = "NOC Clearance";

$email_txt = "NOC Clearance";

$headers = "From: ".$email_from2."\r\n"; 

$semi_rand = md5(time()); 

$headers .= "MIME-Version: 1.0\r\n";

$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$email_message2 .="The department clearance of ".$Ename." has been verified by logistics department. Log on to ESS for further details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";

$email_message2 .="Thanks & Regards\n";

$email_message2 .="HR\n\n";

$ok = @mail($email_to2, $email_subject2, $email_message2, $headers);

} 



   $sqlHod=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$_POST['HodId'], $con); $resHod=mysql_fetch_assoc($sqlHod); $Hname=$resHod['Fname'].' '.$resHod['Sname'].' '.$resHod['Lname'];



	/************************************************ HOD ***********************************************/   



     if($resHod['EmailId_Vnr']!='')

     {

	 $email_to6 = $resHod['EmailId_Vnr'];

	 $email_from = 'admin@vnrseeds.co.in';

	 $email_subject6 = "Department clearance approve in reporting manager";

	 $email_txt = "Department clearance approve in reporting manager";

	 $headers = "From: ".$email_from."\r\n";

	 $semi_rand = md5(time()); 

	 $headers .= "MIME-Version: 1.0\r\n";

	 $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	 $email_message6 .= "You can view the departmental clearance form of ".$_POST['Ename']." in ESS. The other departmental clearances are in process. \n\n";

	 $email_message6 .="Thanks & Regards\n";

     $email_message6 .="HR\n\n";

	 $ok = @mail($email_to6, $email_subject6, $email_message6, $headers);

	 } 

   $msg='<b>NOC confirmation approved successfully.</b>';

  }

}  







if(isset($_POST['saveRepNoc']))

{ 

  $search =  '!"#$%&/\'-:_' ; $search = str_split($search);

  $DDH_R=str_replace($search, "", $_POST['DDH_Remark']); $TID_R=str_replace($search, "", $_POST['TID_Remark']);

  $APTC_R=str_replace($search, "", $_POST['APTC_Remark']); $HOAS_R=str_replace($search, "", $_POST['HOAS_Remark']);

  $Oth_R=str_replace($search, "", $_POST['Oth_Remark']);

  $Prtis1=''; $Prtis2=''; $Prtis3=''; $Prtis4=''; $Prtis5=''; $Prtis6=''; $Prtis7=''; $Prtis8=''; $Prtis9=''; $Prtis10=''; 

  $Prtis11=''; $Prtis12=''; $Prtis13=''; $Prtis14=''; $Prtis15=''; $Prtis16=''; $Prtis17=''; $Prtis18=''; $Prtis19=''; $Prtis20='';

  $Prtis21=''; $Prtis22=''; $Prtis23=''; $Prtis24=''; $Prtis25=''; $Prtis26=''; $Prtis27=''; $Prtis28=''; $Prtis29=''; $Prtis30='';

  $Prtis31=''; $Prtis32=''; $Prtis33=''; $Prtis34=''; $Prtis35=''; $Prtis36=''; $Prtis37=''; $Prtis38=''; $Prtis39=''; $Prtis40='';

  $PrtisR1=''; $PrtisR2=''; $PrtisR3=''; $PrtisR4=''; $PrtisR5=''; $PrtisR6=''; $PrtisR7=''; $PrtisR8=''; $PrtisR9=''; $PrtisR10=''; $PrtisROth=''; 

  $PrtisR11=''; $PrtisR12=''; $PrtisR13=''; $PrtisR14=''; $PrtisR15=''; $PrtisR16=''; $PrtisR17=''; $PrtisR18=''; $PrtisR19=''; $PrtisR20='';  

  $PrtisR21=''; $PrtisR22=''; $PrtisR23=''; $PrtisR24=''; $PrtisR25=''; $PrtisR26=''; $PrtisR27=''; $PrtisR28=''; $PrtisR29=''; $PrtisR30='';  

  $PrtisR31=''; $PrtisR32=''; $PrtisR33=''; $PrtisR34=''; $PrtisR35=''; $PrtisR36=''; $PrtisR37=''; $PrtisR38=''; $PrtisR39=''; $PrtisR40=''; 



  if($_POST['Prtis1']!=''){$Prtis1=str_replace($search, "", $_POST['Prtis1']);}if($_POST['Prtis_Remark1']!=''){$PrtisR1=str_replace($search, "", $_POST['Prtis_Remark1']);}

  if($_POST['Prtis2']!=''){$Prtis2=str_replace($search, "", $_POST['Prtis2']);}if($_POST['Prtis_Remark2']!=''){$PrtisR2=str_replace($search, "", $_POST['Prtis_Remark2']);}

  if($_POST['Prtis3']!=''){$Prtis3=str_replace($search, "", $_POST['Prtis3']);}if($_POST['Prtis_Remark3']!=''){$PrtisR3=str_replace($search, "", $_POST['Prtis_Remark3']);}

  if($_POST['Prtis4']!=''){$Prtis4=str_replace($search, "", $_POST['Prtis4']);}if($_POST['Prtis_Remark4']!=''){$PrtisR4=str_replace($search, "", $_POST['Prtis_Remark4']);}

  if($_POST['Prtis5']!=''){$Prtis5=str_replace($search, "", $_POST['Prtis5']);}if($_POST['Prtis_Remark5']!=''){$PrtisR5=str_replace($search, "", $_POST['Prtis_Remark5']);}

  if($_POST['Prtis6']!=''){$Prtis6=str_replace($search, "", $_POST['Prtis6']);}if($_POST['Prtis_Remark6']!=''){$PrtisR6=str_replace($search, "", $_POST['Prtis_Remark6']);}

  if($_POST['Prtis7']!=''){$Prtis7=str_replace($search, "", $_POST['Prtis7']);}if($_POST['Prtis_Remark7']!=''){$PrtisR7=str_replace($search, "", $_POST['Prtis_Remark7']);}

  if($_POST['Prtis8']!=''){$Prtis8=str_replace($search, "", $_POST['Prtis8']);}if($_POST['Prtis_Remark8']!=''){$PrtisR8=str_replace($search, "", $_POST['Prtis_Remark8']);}

  if($_POST['Prtis9']!=''){$Prtis9=str_replace($search, "", $_POST['Prtis9']);}if($_POST['Prtis_Remark9']!=''){$PrtisR9=str_replace($search, "", $_POST['Prtis_Remark9']);}

  if($_POST['Prtis10']!=''){$Prtis10=str_replace($search, "", $_POST['Prtis10']);}if($_POST['Prtis_Remark10']!=''){$PrtisR10=str_replace($search, "", $_POST['Prtis_Remark10']);}

  if($_POST['Prtis11']!=''){$Prtis11=str_replace($search, "", $_POST['Prtis11']);}if($_POST['Prtis_Remark11']!=''){$PrtisR11=str_replace($search, "", $_POST['Prtis_Remark11']);}

  if($_POST['Prtis12']!=''){$Prtis12=str_replace($search, "", $_POST['Prtis12']);}if($_POST['Prtis_Remark12']!=''){$PrtisR12=str_replace($search, "", $_POST['Prtis_Remark12']);}

  if($_POST['Prtis13']!=''){$Prtis13=str_replace($search, "", $_POST['Prtis13']);}if($_POST['Prtis_Remark13']!=''){$PrtisR13=str_replace($search, "", $_POST['Prtis_Remark13']);}

  if($_POST['Prtis14']!=''){$Prtis14=str_replace($search, "", $_POST['Prtis14']);}if($_POST['Prtis_Remark14']!=''){$PrtisR14=str_replace($search, "", $_POST['Prtis_Remark14']);}

  if($_POST['Prtis15']!=''){$Prtis15=str_replace($search, "", $_POST['Prtis15']);}if($_POST['Prtis_Remark15']!=''){$PrtisR15=str_replace($search, "", $_POST['Prtis_Remark15']);}

  if($_POST['Prtis16']!=''){$Prtis16=str_replace($search, "", $_POST['Prtis16']);}if($_POST['Prtis_Remark16']!=''){$PrtisR16=str_replace($search, "", $_POST['Prtis_Remark16']);}

  if($_POST['Prtis17']!=''){$Prtis17=str_replace($search, "", $_POST['Prtis17']);}if($_POST['Prtis_Remark17']!=''){$PrtisR17=str_replace($search, "", $_POST['Prtis_Remark17']);}

  if($_POST['Prtis18']!=''){$Prtis18=str_replace($search, "", $_POST['Prtis18']);}if($_POST['Prtis_Remark18']!=''){$PrtisR18=str_replace($search, "", $_POST['Prtis_Remark18']);}

  if($_POST['Prtis19']!=''){$Prtis19=str_replace($search, "", $_POST['Prtis19']);}if($_POST['Prtis_Remark19']!=''){$PrtisR19=str_replace($search, "", $_POST['Prtis_Remark19']);}

  if($_POST['Prtis20']!=''){$Prtis20=str_replace($search, "", $_POST['Prtis20']);}if($_POST['Prtis_Remark20']!=''){$PrtisR20=str_replace($search, "", $_POST['Prtis_Remark20']);}

  if($_POST['Prtis21']!=''){$Prtis21=str_replace($search, "", $_POST['Prtis21']);}if($_POST['Prtis_Remark21']!=''){$PrtisR21=str_replace($search, "", $_POST['Prtis_Remark21']);}

  if($_POST['Prtis22']!=''){$Prtis22=str_replace($search, "", $_POST['Prtis22']);}if($_POST['Prtis_Remark22']!=''){$PrtisR22=str_replace($search, "", $_POST['Prtis_Remark22']);}

  if($_POST['Prtis23']!=''){$Prtis23=str_replace($search, "", $_POST['Prtis23']);}if($_POST['Prtis_Remark23']!=''){$PrtisR23=str_replace($search, "", $_POST['Prtis_Remark23']);}

  if($_POST['Prtis24']!=''){$Prtis24=str_replace($search, "", $_POST['Prtis24']);}if($_POST['Prtis_Remark24']!=''){$PrtisR24=str_replace($search, "", $_POST['Prtis_Remark24']);}

  if($_POST['Prtis25']!=''){$Prtis25=str_replace($search, "", $_POST['Prtis25']);}if($_POST['Prtis_Remark25']!=''){$PrtisR25=str_replace($search, "", $_POST['Prtis_Remark25']);}

  if($_POST['Prtis26']!=''){$Prtis26=str_replace($search, "", $_POST['Prtis26']);}if($_POST['Prtis_Remark26']!=''){$PrtisR26=str_replace($search, "", $_POST['Prtis_Remark26']);}

  if($_POST['Prtis27']!=''){$Prtis27=str_replace($search, "", $_POST['Prtis27']);}if($_POST['Prtis_Remark27']!=''){$PrtisR27=str_replace($search, "", $_POST['Prtis_Remark27']);}

  if($_POST['Prtis28']!=''){$Prtis28=str_replace($search, "", $_POST['Prtis28']);}if($_POST['Prtis_Remark28']!=''){$PrtisR28=str_replace($search, "", $_POST['Prtis_Remark28']);}

  if($_POST['Prtis29']!=''){$Prtis29=str_replace($search, "", $_POST['Prtis29']);}if($_POST['Prtis_Remark29']!=''){$PrtisR29=str_replace($search, "", $_POST['Prtis_Remark29']);}

  if($_POST['Prtis30']!=''){$Prtis30=str_replace($search, "", $_POST['Prtis30']);}if($_POST['Prtis_Remark30']!=''){$PrtisR30=str_replace($search, "", $_POST['Prtis_Remark30']);}

  if($_POST['Prtis31']!=''){$Prtis31=str_replace($search, "", $_POST['Prtis31']);}if($_POST['Prtis_Remark31']!=''){$PrtisR31=str_replace($search, "", $_POST['Prtis_Remark31']);}

  if($_POST['Prtis32']!=''){$Prtis32=str_replace($search, "", $_POST['Prtis32']);}if($_POST['Prtis_Remark32']!=''){$PrtisR32=str_replace($search, "", $_POST['Prtis_Remark32']);}

  if($_POST['Prtis33']!=''){$Prtis33=str_replace($search, "", $_POST['Prtis33']);}if($_POST['Prtis_Remark33']!=''){$PrtisR33=str_replace($search, "", $_POST['Prtis_Remark33']);}

  if($_POST['Prtis34']!=''){$Prtis34=str_replace($search, "", $_POST['Prtis34']);}if($_POST['Prtis_Remark34']!=''){$PrtisR34=str_replace($search, "", $_POST['Prtis_Remark34']);}

  if($_POST['Prtis35']!=''){$Prtis35=str_replace($search, "", $_POST['Prtis35']);}if($_POST['Prtis_Remark35']!=''){$PrtisR35=str_replace($search, "", $_POST['Prtis_Remark35']);}

  if($_POST['Prtis36']!=''){$Prtis36=str_replace($search, "", $_POST['Prtis36']);}if($_POST['Prtis_Remark36']!=''){$PrtisR36=str_replace($search, "", $_POST['Prtis_Remark36']);}

  if($_POST['Prtis37']!=''){$Prtis37=str_replace($search, "", $_POST['Prtis37']);}if($_POST['Prtis_Remark37']!=''){$PrtisR37=str_replace($search, "", $_POST['Prtis_Remark37']);}

  if($_POST['Prtis38']!=''){$Prtis38=str_replace($search, "", $_POST['Prtis38']);}if($_POST['Prtis_Remark38']!=''){$PrtisR38=str_replace($search, "", $_POST['Prtis_Remark38']);}

  if($_POST['Prtis39']!=''){$Prtis39=str_replace($search, "", $_POST['Prtis39']);}if($_POST['Prtis_Remark39']!=''){$PrtisR39=str_replace($search, "", $_POST['Prtis_Remark39']);}

  if($_POST['Prtis40']!=''){$Prtis40=str_replace($search, "", $_POST['Prtis40']);}if($_POST['Prtis_Remark40']!=''){$PrtisR40=str_replace($search, "", $_POST['Prtis_Remark40']);}

  $TotRepAmt=$_POST['Prtis_Amt1']+$_POST['Prtis_Amt2']+$_POST['Prtis_Amt3']+$_POST['Prtis_Amt4']+$_POST['Prtis_Amt5']+$_POST['Prtis_Amt6']+$_POST['Prtis_Amt7']+$_POST['Prtis_Amt8']+$_POST['Prtis_Amt9']+$_POST['Prtis_Amt10']+$_POST['Prtis_Amt11']+$_POST['Prtis_Amt12']+$_POST['Prtis_Amt13']+$_POST['Prtis_Amt14']+$_POST['Prtis_Amt15']+$_POST['Prtis_Amt16']+$_POST['Prtis_Amt17']+$_POST['Prtis_Amt18']+$_POST['Prtis_Amt19']+$_POST['Prtis_Amt20']+$_POST['Prtis_Amt21']+$_POST['Prtis_Amt22']+$_POST['Prtis_Amt23']+$_POST['Prtis_Amt24']+$_POST['Prtis_Amt25']+$_POST['Prtis_Amt26']+$_POST['Prtis_Amt27']+$_POST['Prtis_Amt28']+$_POST['Prtis_Amt29']+$_POST['Prtis_Amt30']+$_POST['Prtis_Amt31']+$_POST['Prtis_Amt32']+$_POST['Prtis_Amt33']+$_POST['Prtis_Amt34']+$_POST['Prtis_Amt35']+$_POST['Prtis_Amt36']+$_POST['Prtis_Amt37']+$_POST['Prtis_Amt38']+$_POST['Prtis_Amt39']+$_POST['Prtis_Amt40'];  

  $PrtisROth=''; {$PrtisROth=str_replace($search, "", $_POST['Oth_Remark']);}

  $sqlNoc=mysql_query("select NocRepId from hrm_employee_separation_nocrep where EmpSepId=".$_POST['si'], $con); $rowNoc=mysql_num_rows($sqlNoc); 

  if($rowNoc>0)

  { $sqlIns=mysql_query("update hrm_employee_separation_nocrep set NocSubmitDate='".date("Y-m-d")."', DDH='".$_POST['DDH_YN']."', DDH_Amt='".$_POST['DDH_Amt']."', DDH_Remark='".$DDH_R."', TID='".$_POST['TID_YN']."', TID_Amt='".$_POST['TID_Amt']."', TID_Remark='".$TID_R."', APTC='".$_POST['APTC_YN']."', APTC_Amt='".$_POST['APTC_Amt']."', APTC_Remark='".$APTC_R."', HOAS='".$_POST['HOAS_YN']."', HOAS_Amt='".$_POST['HOAS_Amt']."', HOAS_Remark='".$HOAS_R."', Prtis1='".$Prtis1."', Prtis_1='".$_POST['Prtis_YN1']."', Prtis_1Amt='".$_POST['Prtis_Amt1']."', Prtis_1Remark='".$PrtisR1."', Prtis2='".$Prtis2."', Prtis_2='".$_POST['Prtis_YN2']."', Prtis_2Amt='".$_POST['Prtis_Amt2']."', Prtis_2Remark='".$PrtisR2."', Prtis3='".$Prtis3."', Prtis_3='".$_POST['Prtis_YN3']."', Prtis_3Amt='".$_POST['Prtis_Amt3']."', Prtis_3Remark='".$PrtisR3."', Prtis4='".$Prtis4."', Prtis_4='".$_POST['Prtis_YN4']."', Prtis_4Amt='".$_POST['Prtis_Amt4']."', Prtis_4Remark='".$PrtisR4."', Prtis5='".$Prtis5."', Prtis_5='".$_POST['Prtis_YN5']."', Prtis_5Amt='".$_POST['Prtis_Amt5']."', Prtis_5Remark='".$PrtisR5."', Prtis6='".$Prtis6."', Prtis_6='".$_POST['Prtis_YN6']."', Prtis_6Amt='".$_POST['Prtis_Amt6']."', Prtis_6Remark='".$PrtisR6."', Prtis7='".$Prtis7."', Prtis_7='".$_POST['Prtis_YN7']."', Prtis_7Amt='".$_POST['Prtis_Amt7']."', Prtis_7Remark='".$PrtisR7."', Prtis8='".$Prtis8."', Prtis_8='".$_POST['Prtis_YN8']."', Prtis_8Amt='".$_POST['Prtis_Amt8']."', Prtis_8Remark='".$PrtisR8."', Prtis9='".$Prtis9."', Prtis_9='".$_POST['Prtis_YN9']."', Prtis_9Amt='".$_POST['Prtis_Amt9']."', Prtis_9Remark='".$PrtisR9."', Prtis10='".$Prtis10."', Prtis_10='".$_POST['Prtis_YN10']."', Prtis_10Amt='".$_POST['Prtis_Amt10']."', Prtis_10Remark='".$PrtisR10."', Prtis11='".$Prtis11."', Prtis_11='".$_POST['Prtis_YN11']."', Prtis_11Amt='".$_POST['Prtis_Amt11']."', Prtis_11Remark='".$PrtisR11."', Prtis12='".$Prtis12."', Prtis_12='".$_POST['Prtis_YN12']."', Prtis_12Amt='".$_POST['Prtis_Amt12']."', Prtis_12Remark='".$PrtisR12."', Prtis13='".$Prtis13."', Prtis_13='".$_POST['Prtis_YN13']."', Prtis_13Amt='".$_POST['Prtis_Amt13']."', Prtis_13Remark='".$PrtisR13."', Prtis14='".$Prtis14."', Prtis_14='".$_POST['Prtis_YN14']."', Prtis_14Amt='".$_POST['Prtis_Amt14']."', Prtis_14Remark='".$PrtisR14."', Prtis15='".$Prtis15."', Prtis_15='".$_POST['Prtis_YN15']."', Prtis_15Amt='".$_POST['Prtis_Amt15']."', Prtis_15Remark='".$PrtisR15."', Prtis16='".$Prtis16."', Prtis_16='".$_POST['Prtis_YN16']."', Prtis_16Amt='".$_POST['Prtis_Amt16']."', Prtis_16Remark='".$PrtisR16."', Prtis17='".$Prtis17."', Prtis_17='".$_POST['Prtis_YN17']."', Prtis_17Amt='".$_POST['Prtis_Amt17']."', Prtis_17Remark='".$PrtisR17."', Prtis18='".$Prtis18."', Prtis_18='".$_POST['Prtis_YN18']."', Prtis_18Amt='".$_POST['Prtis_Amt18']."', Prtis_18Remark='".$PrtisR18."', Prtis19='".$Prtis19."', Prtis_19='".$_POST['Prtis_YN19']."', Prtis_19Amt='".$_POST['Prtis_Amt19']."', Prtis_19Remark='".$PrtisR19."', Prtis20='".$Prtis20."', Prtis_20='".$_POST['Prtis_YN20']."', Prtis_20Amt='".$_POST['Prtis_Amt20']."', Prtis_20Remark='".$PrtisR20."', Prtis21='".$Prtis21."', Prtis_21='".$_POST['Prtis_YN21']."', Prtis_21Amt='".$_POST['Prtis_Amt21']."', Prtis_21Remark='".$PrtisR21."', Prtis22='".$Prtis22."', Prtis_22='".$_POST['Prtis_YN22']."', Prtis_22Amt='".$_POST['Prtis_Amt22']."', Prtis_22Remark='".$PrtisR22."', Prtis23='".$Prtis23."', Prtis_23='".$_POST['Prtis_YN23']."', Prtis_23Amt='".$_POST['Prtis_Amt23']."', Prtis_23Remark='".$PrtisR23."', Prtis24='".$Prtis24."', Prtis_24='".$_POST['Prtis_YN24']."', Prtis_24Amt='".$_POST['Prtis_Amt24']."', Prtis_24Remark='".$PrtisR24."', Prtis25='".$Prtis25."', Prtis_25='".$_POST['Prtis_YN25']."', Prtis_25Amt='".$_POST['Prtis_Amt25']."', Prtis_25Remark='".$PrtisR25."', Prtis26='".$Prtis26."', Prtis_26='".$_POST['Prtis_YN26']."', Prtis_26Amt='".$_POST['Prtis_Amt26']."', Prtis_26Remark='".$PrtisR26."', Prtis27='".$Prtis27."', Prtis_27='".$_POST['Prtis_YN27']."', Prtis_27Amt='".$_POST['Prtis_Amt27']."', Prtis_27Remark='".$PrtisR27."', Prtis28='".$Prtis28."', Prtis_28='".$_POST['Prtis_YN28']."', Prtis_28Amt='".$_POST['Prtis_Amt28']."', Prtis_28Remark='".$PrtisR28."', Prtis29='".$Prtis29."', Prtis_29='".$_POST['Prtis_YN29']."', Prtis_29Amt='".$_POST['Prtis_Amt29']."', Prtis_29Remark='".$PrtisR29."', Prtis30='".$Prtis30."', Prtis_30='".$_POST['Prtis_YN30']."', Prtis_30Amt='".$_POST['Prtis_Amt30']."', Prtis_30Remark='".$PrtisR30."', Prtis31='".$Prtis31."', Prtis_31='".$_POST['Prtis_YN31']."', Prtis_31Amt='".$_POST['Prtis_Amt31']."', Prtis_31Remark='".$PrtisR31."', Prtis32='".$Prtis32."', Prtis_32='".$_POST['Prtis_YN32']."', Prtis_32Amt='".$_POST['Prtis_Amt32']."', Prtis_32Remark='".$PrtisR32."', Prtis33='".$Prtis33."', Prtis_33='".$_POST['Prtis_YN33']."', Prtis_33Amt='".$_POST['Prtis_Amt33']."', Prtis_33Remark='".$PrtisR33."', Prtis34='".$Prtis34."', Prtis_34='".$_POST['Prtis_YN34']."', Prtis_34Amt='".$_POST['Prtis_Amt34']."', Prtis_34Remark='".$PrtisR34."', Prtis35='".$Prtis35."', Prtis_35='".$_POST['Prtis_YN35']."', Prtis_35Amt='".$_POST['Prtis_Amt35']."', Prtis_35Remark='".$PrtisR35."', Prtis36='".$Prtis36."', Prtis_36='".$_POST['Prtis_YN36']."', Prtis_36Amt='".$_POST['Prtis_Amt36']."', Prtis_36Remark='".$PrtisR36."', Prtis37='".$Prtis37."', Prtis_37='".$_POST['Prtis_YN37']."', Prtis_37Amt='".$_POST['Prtis_Amt37']."', Prtis_37Remark='".$PrtisR37."', Prtis38='".$Prtis38."', Prtis_38='".$_POST['Prtis_YN38']."', Prtis_38Amt='".$_POST['Prtis_Amt38']."', Prtis_38Remark='".$PrtisR38."', Prtis39='".$Prtis39."', Prtis_39='".$_POST['Prtis_YN39']."', Prtis_39Amt='".$_POST['Prtis_Amt39']."', Prtis_39Remark='".$PrtisR39."', Prtis40='".$Prtis40."', Prtis_40='".$_POST['Prtis_YN40']."', Prtis_40Amt='".$_POST['Prtis_Amt40']."', Prtis_40Remark='".$PrtisR40."', TotRepAmt='".$TotRepAmt."', Oth_Remark='".$PrtisROth."' where EmpSepId=".$_POST['si'], $con);}  //RepId=".$_POST['ei'].",

  else

  { $sqlIns=mysql_query("insert into hrm_employee_separation_nocrep(EmpSepId, NocSubmitDate, DDH, DDH_Amt, DDH_Remark, TID, TID_Amt, TID_Remark, APTC, APTC_Amt, APTC_Remark, HOAS, HOAS_Amt, HOAS_Remark, Prtis1, Prtis_1, Prtis_1Amt, Prtis_1Remark, Prtis2, Prtis_2, Prtis_2Amt, Prtis_2Remark, Prtis3, Prtis_3, Prtis_3Amt, Prtis_3Remark, Prtis4, Prtis_4, Prtis_4Amt, Prtis_4Remark, Prtis5, Prtis_5, Prtis_5Amt, Prtis_5Remark, Prtis6, Prtis_6, Prtis_6Amt, Prtis_6Remark, Prtis7, Prtis_7, Prtis_7Amt, Prtis_7Remark, Prtis8, Prtis_8, Prtis_8Amt, Prtis_8Remark, Prtis9, Prtis_9, Prtis_9Amt, Prtis_9Remark, Prtis10, Prtis_10, Prtis_10Amt, Prtis_10Remark, Prtis11, Prtis_11, Prtis_11Amt, Prtis_11Remark, Prtis12, Prtis_12, Prtis_12Amt, Prtis_12Remark, Prtis13, Prtis_13, Prtis_13Amt, Prtis_13Remark, Prtis14, Prtis_14, Prtis_14Amt, Prtis_14Remark, Prtis15, Prtis_15, Prtis_15Amt, Prtis_15Remark, Prtis16, Prtis_16, Prtis_16Amt, Prtis_16Remark, Prtis17, Prtis_17, Prtis_17Amt, Prtis_17Remark, Prtis18, Prtis_18, Prtis_18Amt, Prtis_18Remark, Prtis19, Prtis_19, Prtis_19Amt, Prtis_19Remark, Prtis20, Prtis_20, Prtis_20Amt, Prtis_20Remark, Prtis21, Prtis_21, Prtis_21Amt, Prtis_21Remark, Prtis22, Prtis_22, Prtis_22Amt, Prtis_22Remark, Prtis23, Prtis_23, Prtis_23Amt, Prtis_23Remark, Prtis24, Prtis_24, Prtis_24Amt, Prtis_24Remark, Prtis25, Prtis_25, Prtis_25Amt, Prtis_25Remark, Prtis26, Prtis_26, Prtis_26Amt, Prtis_26Remark, Prtis27, Prtis_27, Prtis_27Amt, Prtis_27Remark, Prtis28, Prtis_28, Prtis_28Amt, Prtis_28Remark, Prtis29, Prtis_29, Prtis_29Amt, Prtis_29Remark, Prtis30, Prtis_30, Prtis_30Amt, Prtis_30Remark, Prtis31, Prtis_31, Prtis_31Amt, Prtis_31Remark, Prtis32, Prtis_32, Prtis_32Amt, Prtis_32Remark, Prtis33, Prtis_33, Prtis_33Amt, Prtis_33Remark, Prtis34, Prtis_34, Prtis_34Amt, Prtis_34Remark, Prtis35, Prtis_35, Prtis_35Amt, Prtis_35Remark, Prtis36, Prtis_36, Prtis_36Amt, Prtis_36Remark, Prtis37, Prtis_37, Prtis_37Amt, Prtis_37Remark, Prtis38, Prtis_38, Prtis_38Amt, Prtis_38Remark, Prtis39, Prtis_39, Prtis_39Amt, Prtis_39Remark, Prtis40, Prtis_40, Prtis_40Amt, Prtis_40Remark, TotRepAmt, Oth_Remark) values(".$_POST['si'].", '".date("Y-m-d")."', '".$_POST['DDH_YN']."', '".$_POST['DDH_Amt']."', '".$DDH_R."', '".$_POST['TID_YN']."', '".$_POST['TID_Amt']."', '".$TID_R."', '".$_POST['APTC_YN']."', '".$_POST['APTC_Amt']."', '".$APTC_R."', '".$_POST['HOAS_YN']."', '".$_POST['HOAS_Amt']."', '".$HOAS_R."', '".$Prtis1."', '".$_POST['Prtis_YN1']."', '".$_POST['Prtis_Amt1']."', '".$PrtisR1."', '".$Prtis2."', '".$_POST['Prtis_YN2']."', '".$_POST['Prtis_Amt2']."', '".$PrtisR2."', '".$Prtis3."', '".$_POST['Prtis_YN3']."', '".$_POST['Prtis_Amt3']."', '".$PrtisR3."', '".$Prtis4."', '".$_POST['Prtis_YN4']."', '".$_POST['Prtis_Amt4']."', '".$PrtisR4."', '".$Prtis5."', '".$_POST['Prtis_YN5']."', '".$_POST['Prtis_Amt5']."', '".$PrtisR5."', '".$Prtis6."', '".$_POST['Prtis_YN6']."', '".$_POST['Prtis_Amt6']."', '".$PrtisR6."', '".$Prtis7."', '".$_POST['Prtis_YN7']."', '".$_POST['Prtis_Amt7']."', '".$PrtisR7."', '".$Prtis8."', '".$_POST['Prtis_YN8']."', '".$_POST['Prtis_Amt8']."', '".$PrtisR8."', '".$Prtis9."', '".$_POST['Prtis_YN9']."', '".$_POST['Prtis_Amt9']."', '".$PrtisR9."', '".$Prtis10."', '".$_POST['Prtis_YN10']."', '".$_POST['Prtis_Amt10']."', '".$PrtisR10."', '".$Prtis11."', '".$_POST['Prtis_YN11']."', '".$_POST['Prtis_Amt11']."', '".$PrtisR11."', '".$Prtis12."', '".$_POST['Prtis_YN12']."', '".$_POST['Prtis_Amt12']."', '".$PrtisR12."', '".$Prtis13."', '".$_POST['Prtis_YN13']."', '".$_POST['Prtis_Amt13']."', '".$PrtisR13."', '".$Prtis14."', '".$_POST['Prtis_YN14']."', '".$_POST['Prtis_Amt14']."', '".$PrtisR14."', '".$Prtis15."', '".$_POST['Prtis_YN15']."', '".$_POST['Prtis_Amt15']."', '".$PrtisR15."', '".$Prtis16."', '".$_POST['Prtis_YN16']."', '".$_POST['Prtis_Amt16']."', '".$PrtisR16."', '".$Prtis17."', '".$_POST['Prtis_YN17']."', '".$_POST['Prtis_Amt17']."', '".$PrtisR17."', '".$Prtis18."', '".$_POST['Prtis_YN18']."', '".$_POST['Prtis_Amt18']."', '".$PrtisR18."', '".$Prtis19."', '".$_POST['Prtis_YN19']."', '".$_POST['Prtis_Amt19']."', '".$PrtisR19."', '".$Prtis20."', '".$_POST['Prtis_YN20']."', '".$_POST['Prtis_Amt20']."', '".$PrtisR20."', '".$Prtis21."', '".$_POST['Prtis_YN21']."', '".$_POST['Prtis_Amt21']."', '".$PrtisR21."', '".$Prtis22."', '".$_POST['Prtis_YN22']."', '".$_POST['Prtis_Amt22']."', '".$PrtisR22."', '".$Prtis23."', '".$_POST['Prtis_YN23']."', '".$_POST['Prtis_Amt23']."', '".$PrtisR23."', '".$Prtis24."', '".$_POST['Prtis_YN24']."', '".$_POST['Prtis_Amt24']."', '".$PrtisR24."', '".$Prtis25."', '".$_POST['Prtis_YN25']."', '".$_POST['Prtis_Amt25']."', '".$PrtisR25."', '".$Prtis26."', '".$_POST['Prtis_YN26']."', '".$_POST['Prtis_Amt26']."', '".$PrtisR26."', '".$Prtis27."', '".$_POST['Prtis_YN27']."', '".$_POST['Prtis_Amt27']."', '".$PrtisR27."', '".$Prtis28."', '".$_POST['Prtis_YN28']."', '".$_POST['Prtis_Amt28']."', '".$PrtisR28."', '".$Prtis29."', '".$_POST['Prtis_YN29']."', '".$_POST['Prtis_Amt29']."', '".$PrtisR29."', '".$Prtis30."', '".$_POST['Prtis_YN30']."', '".$_POST['Prtis_Amt30']."', '".$PrtisR30."', '".$Prtis31."', '".$_POST['Prtis_YN31']."', '".$_POST['Prtis_Amt31']."', '".$PrtisR31."', '".$Prtis32."', '".$_POST['Prtis_YN32']."', '".$_POST['Prtis_Amt32']."', '".$PrtisR32."', '".$Prtis33."', '".$_POST['Prtis_YN33']."', '".$_POST['Prtis_Amt33']."', '".$PrtisR33."', '".$Prtis34."', '".$_POST['Prtis_YN34']."', '".$_POST['Prtis_Amt34']."', '".$PrtisR34."', '".$Prtis35."', '".$_POST['Prtis_YN35']."', '".$_POST['Prtis_Amt35']."', '".$PrtisR35."', '".$Prtis36."', '".$_POST['Prtis_YN36']."', '".$_POST['Prtis_Amt36']."', '".$PrtisR36."', '".$Prtis37."', '".$_POST['Prtis_YN37']."', '".$_POST['Prtis_Amt37']."', '".$PrtisR37."', '".$Prtis38."', '".$_POST['Prtis_YN38']."', '".$_POST['Prtis_Amt38']."', '".$PrtisR38."', '".$Prtis39."', '".$_POST['Prtis_YN39']."', '".$_POST['Prtis_Amt39']."', '".$PrtisR39."', '".$Prtis40."', '".$_POST['Prtis_YN40']."', '".$_POST['Prtis_Amt40']."', '".$PrtisR40."', '".$TotRepAmt."', '".$PrtisROth."')", $con); }  //RepId, ".$_POST['ei'].",



  //if($sqlIns){$sqlUp=mysql_query("update hrm_employee_separation set Log_NOC='Y' where EmpSepId=".$_POST['si'], $con); }

  if($sqlUp)

  {



    /************************************************ HR ***********************************************/ 

    $email_to = 'vspl.hr@vnrseeds.com';

    $email_from = 'admin@vnrseeds.co.in';

    $email_subject = "NOC Clearance";

	$email_txt = "NOC Clearance";

	$headers = "From: ".$email_from."\r\n";

	$semi_rand = md5(time()); 

	$headers .= "MIME-Version: 1.0\r\n";

	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$email_message .="The clearance form of ".$_POST['Ename']." has been provided by Logistics department. Log on to ESS for approval and further details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";

	$email_message .="Thanks & Regards\n";

    $email_message .="HR\n\n";

	$ok = @mail($email_to, $email_subject, $email_message, $headers);



	$sqlRep=mysql_query("select Rep_EmployeeID from hrm_employee_separation where EmpSepId=".$_POST['si'], $con); $resRep=mysql_fetch_assoc($sqlRep);

	$sqlRMail=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$resRep['Rep_EmployeeID'], $con); $resRMail=mysql_fetch_assoc($sqlRMail);

	/************************************************ Reporting ***********************************************/   

if($resRMail['EmailId_Vnr']!='')

{

$email_to2 = $resRMail['EmailId_Vnr'];

$email_from2 = 'admin@vnrseeds.co.in';

$email_subject2 = "NOC Clearance";

$email_txt = "NOC Clearance";

$headers = "From: ".$email_from2."\r\n"; 

$semi_rand = md5(time()); 

$headers .= "MIME-Version: 1.0\r\n";

$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$email_message2 .="The department clearance of ".$Ename." has been verified by logistics department. Log on to ESS for further details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";

$email_message2 .="Thanks & Regards\n";

$email_message2 .="HR\n\n";

$ok = @mail($email_to2, $email_subject2, $email_message2, $headers);

} 



   $sqlHod=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$_POST['HodId'], $con); $resHod=mysql_fetch_assoc($sqlHod); $Hname=$resHod['Fname'].' '.$resHod['Sname'].' '.$resHod['Lname'];



	/************************************************ HOD ***********************************************/   



     if($resHod['EmailId_Vnr']!='')

     {

	 $email_to6 = $resHod['EmailId_Vnr'];

	 $email_from = 'admin@vnrseeds.co.in';

	 $email_subject6 = "Department clearance approve in reporting manager";

	 $email_txt = "Department clearance approve in reporting manager";

	 $headers = "From: ".$email_from."\r\n";

	 $semi_rand = md5(time()); 

	 $headers .= "MIME-Version: 1.0\r\n";

	 $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	 $email_message6 .= "You can view the departmental clearance form of ".$_POST['Ename']." in ESS. The other departmental clearances are in process. \n\n";

	 $email_message6 .="Thanks & Regards\n";

     $email_message6 .="HR\n\n";

	 $ok = @mail($email_to6, $email_subject6, $email_message6, $headers);

	 } 

   $msg='<b>NOC confirmation approved successfully.</b>';

  }

} 





if($_REQUEST['action']=='RepResend')

{ 

  $sql=mysql_query("update hrm_employee_separation set Log_NOC='N' where EmpSepId=".$_REQUEST['si'], $con); 

  $msg='Clearance form send it back to reporting successfully';

}



if($_REQUEST['action']=='RepApproved')

{ 

  $sql=mysql_query("update hrm_employee_separation set HR_LogNocConf='Y' where EmpSepId=".$_REQUEST['si'], $con); 

  $msg='Clearance form approved successfully';

}





?> 	







<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">



<html>



<head>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>Action for Resignation</title>

<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>

<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>

<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>

<script type="text/javascript" src="src/js/jscal2.js"></script>

<script type="text/javascript" src="src/js/lang/en.js"></script>

<style> .Text {font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;}

.Text2 {font-family:Geneva, Arial, Helvetica, sans-serif;font-size:15px;}

.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}

.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}</style>

<script language="javascript" type="text/javascript">

function FunDDH(v)

{ if(v=='Y'){document.getElementById("DDH_Y").checked=true;document.getElementById("DDH_N").checked=false; document.getElementById("DDH_A").checked=false;

  document.getElementById("DDH_YN").value='Y'; document.getElementById("DDH_Amt").readOnly=true; document.getElementById("DDH_Amt").style.background='#EAEAEA';

  document.getElementById("DDH_Amt").value=0;}

  else if(v=='N'){document.getElementById("DDH_N").checked=true;document.getElementById("DDH_Y").checked=false; document.getElementById("DDH_A").checked=false;

  document.getElementById("DDH_YN").value='N'; document.getElementById("DDH_Amt").readOnly=false; document.getElementById("DDH_Amt").style.background='#FFFFFF';}

  else if(v=='A'){document.getElementById("DDH_A").checked=true;document.getElementById("DDH_Y").checked=false; document.getElementById("DDH_N").checked=false;

  document.getElementById("DDH_YN").value='A'; document.getElementById("DDH_Amt").readOnly=true; document.getElementById("DDH_Amt").style.background='#EAEAEA';}

}



function FunTID(v)

{ if(v=='Y'){document.getElementById("TID_Y").checked=true;document.getElementById("TID_N").checked=false; document.getElementById("TID_A").checked=false;

  document.getElementById("TID_YN").value='Y'; document.getElementById("TID_Amt").readOnly=true; document.getElementById("TID_Amt").style.background='#EAEAEA';

  document.getElementById("TID_Amt").value=0;}

  else if(v=='N'){document.getElementById("TID_N").checked=true;document.getElementById("TID_Y").checked=false; document.getElementById("TID_A").checked=false;

  document.getElementById("TID_YN").value='N'; document.getElementById("TID_Amt").readOnly=false; document.getElementById("TID_Amt").style.background='#FFFFFF';}

  else if(v=='A'){document.getElementById("TID_A").checked=true;document.getElementById("TID_Y").checked=false; document.getElementById("TID_N").checked=false;

  document.getElementById("TID_YN").value='A'; document.getElementById("TID_Amt").readOnly=true; document.getElementById("TID_Amt").style.background='#EAEAEA';}

}



function FunAPTC(v)

{ if(v=='Y'){document.getElementById("APTC_Y").checked=true;document.getElementById("APTC_N").checked=false; document.getElementById("APTC_A").checked=false;

document.getElementById("APTC_YN").value='Y'; document.getElementById("APTC_Amt").readOnly=true; document.getElementById("APTC_Amt").style.background='#EAEAEA';

  document.getElementById("APTC_Amt").value=0;}

  else if(v=='N'){document.getElementById("APTC_N").checked=true;document.getElementById("APTC_Y").checked=false; document.getElementById("APTC_A").checked=false;

  document.getElementById("APTC_YN").value='N'; document.getElementById("APTC_Amt").readOnly=false; document.getElementById("APTC_Amt").style.background='#FFFFFF';}

  else if(v=='A'){document.getElementById("APTC_A").checked=true;document.getElementById("APTC_Y").checked=false; document.getElementById("APTC_N").checked=false;

  document.getElementById("APTC_YN").value='A'; document.getElementById("APTC_Amt").readOnly=true; document.getElementById("APTC_Amt").style.background='#EAEAEA';}

}





function FunHOAS(v)

{ if(v=='Y'){document.getElementById("HOAS_Y").checked=true;document.getElementById("HOAS_N").checked=false; document.getElementById("HOAS_A").checked=false;

document.getElementById("HOAS_YN").value='Y'; document.getElementById("HOAS_Amt").readOnly=true; document.getElementById("HOAS_Amt").style.background='#EAEAEA';

  document.getElementById("HOAS_Amt").value=0;}

  else if(v=='N'){document.getElementById("HOAS_N").checked=true;document.getElementById("HOAS_Y").checked=false; document.getElementById("HOAS_A").checked=false;

  document.getElementById("HOAS_YN").value='N'; document.getElementById("HOAS_Amt").readOnly=false; document.getElementById("HOAS_Amt").style.background='#FFFFFF';}

  else if(v=='A'){document.getElementById("HOAS_A").checked=true;document.getElementById("HOAS_Y").checked=false; document.getElementById("HOAS_N").checked=false;

  document.getElementById("HOAS_YN").value='A'; document.getElementById("HOAS_Amt").readOnly=true; document.getElementById("HOAS_Amt").style.background='#EAEAEA';}

}





function FunPrtis(i,v)

{ if(v=='Y'){document.getElementById("Prtis_Y"+i).checked=true;document.getElementById("Prtis_N"+i).checked=false; document.getElementById("Prtis_A"+i).checked=false;

  document.getElementById("Prtis_YN"+i).value='Y'; document.getElementById("Prtis_Amt"+i).readOnly=true; document.getElementById("Prtis_Amt"+i).style.background='#EAEAEA';

  document.getElementById("Prtis_Amt"+i).value=0;}

  else if(v=='N'){document.getElementById("Prtis_N"+i).checked=true;document.getElementById("Prtis_Y"+i).checked=false; document.getElementById("Prtis_A"+i).checked=false;

  document.getElementById("Prtis_YN"+i).value='N'; document.getElementById("Prtis_Amt"+i).readOnly=false; document.getElementById("Prtis_Amt"+i).style.background='#FFFFFF';}

  else if(v=='A'){document.getElementById("Prtis_A"+i).checked=true;document.getElementById("Prtis_Y"+i).checked=false; document.getElementById("Prtis_N"+i).checked=false;

  document.getElementById("Prtis_YN"+i).value='A'; document.getElementById("Prtis_Amt"+i).readOnly=true; document.getElementById("Prtis_Amt"+i).style.background='#EAEAEA';}

}



function ShowRowPrtis(v)

{ if(v==1){var a=v+1; var m=v}

  else if(v>1 && v<40){var a=v+1; var m=v-1;}

  else if(v==40){var a=v; var m=v-1;}

  document.getElementById("addImg"+v).style.display = 'none'; document.getElementById("minusImg"+v).style.display = 'block'; document.getElementById("Row"+v).style.display = 'block';  document.getElementById("img"+a).style.display = 'block'; 

  if(v>1){document.getElementById("minusImg"+m).style.display = 'none';} 

  if(v<40){document.getElementById("addImg"+a).style.display = 'block';}

}

function HideRowPrtis(v)

{ if(v==1){var a=v+1; var m=v}

  else if(v>1 && v<40){var a=v+1; var m=v-1;}

  else if(v==40){var a=v; var m=v-1;}

  document.getElementById("addImg"+v).style.display = 'block'; document.getElementById("minusImg"+v).style.display = 'none'; document.getElementById("Row"+v).style.display = 'none';

  if(v>1){document.getElementById("minusImg"+m).style.display = 'block';} 

  if(v<40){document.getElementById("addImg"+a).style.display = 'none';}

  document.getElementById("Prtis"+v).value = ""; 

  document.getElementById("Prtis_Y"+v).checked = false; document.getElementById("Prtis_N"+v).checked = false; document.getElementById("Prtis_A"+v).checked = false;

  document.getElementById("Prtis_YN"+v).value = "";  document.getElementById("Prtis_Amt"+v).value = ""; document.getElementById("Prtis_Remark"+v).value = "";

}



function validate(formname)

{ 

 var Numfilter=/^[0-9. ]+$/;

 var DDH_YN = formname.DDH_YN.value; var DDH_Amt = formname.DDH_Amt.value; var DDH_Remark = formname.DDH_Remark.value; var test_num = Numfilter.test(DDH_Amt);

 if(DDH_YN==''){alert("Please select option(yes/no) in document data handour clearance.");  return false; }

 if(DDH_YN!='' && DDH_YN=='N' && DDH_Amt=='' && DDH_Remark==''){alert("please enter document data handour recovery amount & remark"); return false;}

 if(DDH_YN!='' && DDH_YN=='N' && DDH_Amt==''){alert("please enter document data handour recovery amount"); return false;}

 if(DDH_YN=='N' && test_num==false){alert('Please enter only number in document data handour amount field'); return false; }	

 if(DDH_YN!='' && DDH_YN=='N' && DDH_Remark==''){alert("please enter document data handour remark"); return false;}

 

 var TID_YN = formname.TID_YN.value; var TID_Amt = formname.TID_Amt.value; var TID_Remark = formname.TID_Remark.value; var test_num2 = Numfilter.test(TID_Amt);

 if(TID_YN==''){alert("Please select option(yes/no) in handover Of ID card clearance.");  return false; }

 if(TID_YN!='' && TID_YN=='N' && TID_Amt=='' && TID_Remark==''){alert("please enter handover Of ID card recovery amount & remark"); return false;}

 if(TID_YN!='' && TID_YN=='N' && TID_Amt==''){alert("please enter handover Of ID card recovery amount"); return false;}

 if(TID_YN=='N' && test_num2==false){alert('Please enter only number in handover Of ID card amount field'); return false; }	

 if(TID_YN!='' && TID_YN=='N' && TID_Remark==''){alert("please enter handover Of ID card remark"); return false;}



 var APTC_YN = formname.APTC_YN.value; var APTC_Amt = formname.APTC_Amt.value; var APTC_Remark = formname.APTC_Remark.value; var test_num3 = Numfilter.test(APTC_Amt);

 if(APTC_YN==''){alert("Please select option(yes/no) in complition of pending task clearance.");  return false; }

 if(APTC_YN!='' && APTC_YN=='N' && APTC_Amt=='' && APTC_Remark==''){alert("please enter complition of pending task recovery amount & remark"); return false;}

 if(APTC_YN!='' && APTC_YN=='N' && APTC_Amt==''){alert("please enter complition of pending task recovery amount"); return false;}

 if(APTC_YN=='N' && test_num3==false){alert('Please enter only number in complition of pending task amount field'); return false; }	

 if(APTC_YN!='' && APTC_YN=='N' && APTC_Remark==''){alert("please enter complition of pending task remark"); return false;} 



 var HOAS_YN = formname.HOAS_YN.value; var HOAS_Amt = formname.HOAS_Amt.value; var HOAS_Remark = formname.HOAS_Remark.value; var test_num4 = Numfilter.test(HOAS_Amt);

 if(HOAS_YN==''){alert("Please select option(yes/no) in handover of health card data clearance.");  return false; }

 if(HOAS_YN!='' && HOAS_YN=='N' && HOAS_Amt=='' && HOAS_Remark==''){alert("please enter handover of health card recovery amount & remark"); return false;}

 if(HOAS_YN!='' && HOAS_YN=='N' && HOAS_Amt==''){alert("please enter handover of health card recovery amount"); return false;}

 if(HOAS_YN=='N' && test_num4==false){alert('Please enter only number in handover of health card amount field'); return false; }	

 if(HOAS_YN!='' && HOAS_YN=='N' && HOAS_Remark==''){alert("please enter handover of health card data remark"); return false;}



 var Prtis1 = formname.Prtis1.value; var Prtis_YN1 = formname.Prtis_YN1.value; var Prtis_Amt1 = formname.Prtis_Amt1.value; 

 var Prtis_Remark1 = formname.Prtis_Remark1.value; var Prtis_num1 = Numfilter.test(Prtis_Amt1);

 if(Prtis1!='' || Prtis_YN1!='')

 {

  if(Prtis1==''){alert("Please enter parties 1 name.");  return false; }

  if(Prtis_YN1==''){alert("Please select option(yes/no) in parties 1 clearance.");  return false; }

  if(Prtis_YN1!='' && Prtis_YN1=='N' && Prtis_Amt1=='' && Prtis_Remark1==''){alert("please enter parties 1 recovery amount & remark"); return false;}

  if(Prtis_YN1!='' && Prtis_YN1=='N' && Prtis_Amt1==''){alert("please enter parties 1 recovery amount"); return false;}

  if(Prtis_YN1=='N' && Prtis_num1==false){alert('Please enter only number in parties 1 amount field'); return false; }	

  if(Prtis_YN1!='' && Prtis_YN1=='N' && Prtis_Remark1==''){alert("please enter parties 1 remark"); return false;}

 }

 var Prtis2 = formname.Prtis2.value; var Prtis_YN2 = formname.Prtis_YN2.value; var Prtis_Amt2 = formname.Prtis_Amt2.value; 

 var Prtis_Remark2 = formname.Prtis_Remark2.value; var Prtis_num2 = Numfilter.test(Prtis_Amt2);

 if(Prtis2!='' || Prtis_YN2!='')

 {

  if(Prtis2==''){alert("Please enter parties 2 name.");  return false; }

  if(Prtis_YN2==''){alert("Please select option(yes/no) in parties 2 clearance.");  return false; }

  if(Prtis_YN2!='' && Prtis_YN2=='N' && Prtis_Amt2=='' && Prtis_Remark2==''){alert("please enter parties 2 recovery amount & remark"); return false;}

  if(Prtis_YN2!='' && Prtis_YN2=='N' && Prtis_Amt2==''){alert("please enter parties 2 recovery amount"); return false;}

  if(Prtis_YN2=='N' && Prtis_num2==false){alert('Please enter only number in parties 2 amount field'); return false; }	

  if(Prtis_YN2!='' && Prtis_YN2=='N' && Prtis_Remark2==''){alert("please enter parties 2 remark"); return false;}

 }

 var Prtis3 = formname.Prtis3.value; var Prtis_YN3 = formname.Prtis_YN3.value; var Prtis_Amt3 = formname.Prtis_Amt3.value; 

 var Prtis_Remark3 = formname.Prtis_Remark3.value; var Prtis_num3 = Numfilter.test(Prtis_Amt3);

 if(Prtis3!='' || Prtis_YN3!='')

 {

  if(Prtis3==''){alert("Please enter parties 3 name.");  return false; }

  if(Prtis_YN3==''){alert("Please select option(yes/no) in parties 3 clearance.");  return false; }

  if(Prtis_YN3!='' && Prtis_YN3=='N' && Prtis_Amt3=='' && Prtis_Remark3==''){alert("please enter parties 3 recovery amount & remark"); return false;}

  if(Prtis_YN3!='' && Prtis_YN3=='N' && Prtis_Amt3==''){alert("please enter parties 3 recovery amount"); return false;}

  if(Prtis_YN3=='N' && Prtis_num3==false){alert('Please enter only number in parties 3 amount field'); return false; }	

  if(Prtis_YN3!='' && Prtis_YN3=='N' && Prtis_Remark3==''){alert("please enter parties 3 remark"); return false;}

 }

 var Prtis4 = formname.Prtis4.value; var Prtis_YN4 = formname.Prtis_YN4.value; var Prtis_Amt4 = formname.Prtis_Amt4.value; 

 var Prtis_Remark4 = formname.Prtis_Remark4.value; var Prtis_num4 = Numfilter.test(Prtis_Amt4);

 if(Prtis4!='' || Prtis_YN4!='')

 {

  if(Prtis4==''){alert("Please enter parties 4 name.");  return false; }

  if(Prtis_YN4==''){alert("Please select option(yes/no) in parties 4 clearance.");  return false; }

  if(Prtis_YN4!='' && Prtis_YN4=='N' && Prtis_Amt4=='' && Prtis_Remark4==''){alert("please enter parties 4 recovery amount & remark"); return false;}

  if(Prtis_YN4!='' && Prtis_YN4=='N' && Prtis_Amt4==''){alert("please enter parties 4 recovery amount"); return false;}

  if(Prtis_YN4=='N' && Prtis_num4==false){alert('Please enter only number in parties 4 amount field'); return false; }	

  if(Prtis_YN4!='' && Prtis_YN4=='N' && Prtis_Remark4==''){alert("please enter parties 4 remark"); return false;}

 }

 var Prtis5 = formname.Prtis5.value; var Prtis_YN5 = formname.Prtis_YN5.value; var Prtis_Amt5 = formname.Prtis_Amt5.value; 

 var Prtis_Remark5 = formname.Prtis_Remark5.value; var Prtis_num5 = Numfilter.test(Prtis_Amt5);

 if(Prtis5!='' || Prtis_YN5!='')

 {

  if(Prtis5==''){alert("Please enter parties 5 name.");  return false; }

  if(Prtis_YN5==''){alert("Please select option(yes/no) in parties 5 clearance.");  return false; }

  if(Prtis_YN5!='' && Prtis_YN5=='N' && Prtis_Amt5=='' && Prtis_Remark5==''){alert("please enter parties 5 recovery amount & remark"); return false;}

  if(Prtis_YN5!='' && Prtis_YN5=='N' && Prtis_Amt5==''){alert("please enter parties 5 recovery amount"); return false;}

  if(Prtis_YN5=='N' && Prtis_num5==false){alert('Please enter only number in parties 5 amount field'); return false; }	

  if(Prtis_YN5!='' && Prtis_YN5=='N' && Prtis_Remark5==''){alert("please enter parties 5 remark"); return false;}

 }

 var Prtis6 = formname.Prtis6.value; var Prtis_YN6 = formname.Prtis_YN6.value; var Prtis_Amt6 = formname.Prtis_Amt6.value; 

 var Prtis_Remark6 = formname.Prtis_Remark6.value; var Prtis_num6 = Numfilter.test(Prtis_Amt6);

 if(Prtis6!='' || Prtis_YN6!='')

 {

  if(Prtis6==''){alert("Please enter parties 6 name.");  return false; }

  if(Prtis_YN6==''){alert("Please select option(yes/no) in parties 6 clearance.");  return false; }

  if(Prtis_YN6!='' && Prtis_YN6=='N' && Prtis_Amt6=='' && Prtis_Remark6==''){alert("please enter parties 6 recovery amount & remark"); return false;}

  if(Prtis_YN6!='' && Prtis_YN6=='N' && Prtis_Amt6==''){alert("please enter parties 6 recovery amount"); return false;}

  if(Prtis_YN6=='N' && Prtis_num6==false){alert('Please enter only number in parties 6 amount field'); return false; }	

  if(Prtis_YN6!='' && Prtis_YN6=='N' && Prtis_Remark6==''){alert("please enter parties 6 remark"); return false;}

 }

 var Prtis7 = formname.Prtis7.value; var Prtis_YN7 = formname.Prtis_YN7.value; var Prtis_Amt7 = formname.Prtis_Amt7.value; 

 var Prtis_Remark7 = formname.Prtis_Remark7.value; var Prtis_num7 = Numfilter.test(Prtis_Amt7);

 if(Prtis7!='' || Prtis_YN7!='')

 {

  if(Prtis7==''){alert("Please enter parties 7 name.");  return false; }

  if(Prtis_YN7==''){alert("Please select option(yes/no) in parties 7 clearance.");  return false; }

  if(Prtis_YN7!='' && Prtis_YN7=='N' && Prtis_Amt7=='' && Prtis_Remark7==''){alert("please enter parties 7 recovery amount & remark"); return false;}

  if(Prtis_YN7!='' && Prtis_YN7=='N' && Prtis_Amt7==''){alert("please enter parties 7 recovery amount"); return false;}

  if(Prtis_YN7=='N' && Prtis_num7==false){alert('Please enter only number in parties 7 amount field'); return false; }	

  if(Prtis_YN7!='' && Prtis_YN7=='N' && Prtis_Remark7==''){alert("please enter parties 7 remark"); return false;}

 }

 var Prtis8 = formname.Prtis8.value; var Prtis_YN8 = formname.Prtis_YN8.value; var Prtis_Amt8 = formname.Prtis_Amt8.value; 

 var Prtis_Remark8 = formname.Prtis_Remark8.value; var Prtis_num8 = Numfilter.test(Prtis_Amt8);

 if(Prtis8!='' || Prtis_YN8!='')

 {

  if(Prtis8==''){alert("Please enter parties 8 name.");  return false; }

  if(Prtis_YN8==''){alert("Please select option(yes/no) in parties 8 clearance.");  return false; }

  if(Prtis_YN8!='' && Prtis_YN8=='N' && Prtis_Amt8=='' && Prtis_Remark8==''){alert("please enter parties 8 recovery amount & remark"); return false;}

  if(Prtis_YN8!='' && Prtis_YN8=='N' && Prtis_Amt8==''){alert("please enter parties 8 recovery amount"); return false;}

  if(Prtis_YN8=='N' && Prtis_num8==false){alert('Please enter only number in parties 8 amount field'); return false; }

  if(Prtis_YN8!='' && Prtis_YN8=='N' && Prtis_Remark8==''){alert("please enter parties 8 remark"); return false;}

 }

 var Prtis9 = formname.Prtis9.value; var Prtis_YN9 = formname.Prtis_YN9.value; var Prtis_Amt9 = formname.Prtis_Amt9.value; 

 var Prtis_Remark9 = formname.Prtis_Remark9.value; var Prtis_num9 = Numfilter.test(Prtis_Amt9);

 if(Prtis9!='' || Prtis_YN9!='')

 {

  if(Prtis9==''){alert("Please enter parties 9 name.");  return false; }

  if(Prtis_YN9==''){alert("Please select option(yes/no) in parties 9 clearance.");  return false; }

  if(Prtis_YN9!='' && Prtis_YN9=='N' && Prtis_Amt9=='' && Prtis_Remark9==''){alert("please enter parties 9 recovery amount & remark"); return false;}

  if(Prtis_YN9!='' && Prtis_YN9=='N' && Prtis_Amt9==''){alert("please enter parties 9 recovery amount"); return false;}

  if(Prtis_YN9=='N' && Prtis_num9==false){alert('Please enter only number in parties 9 amount field'); return false; }	

  if(Prtis_YN9!='' && Prtis_YN9=='N' && Prtis_Remark9==''){alert("please enter parties 9 remark"); return false;}

 }

 var Prtis10 = formname.Prtis10.value; var Prtis_YN10 = formname.Prtis_YN10.value; var Prtis_Amt10 = formname.Prtis_Amt10.value; 

 var Prtis_Remark10 = formname.Prtis_Remark10.value; var Prtis_num10 = Numfilter.test(Prtis_Amt10);

 if(Prtis10!='' || Prtis_YN10!='')

 {

  if(Prtis10==''){alert("Please enter parties 10 name.");  return false; }

  if(Prtis_YN10==''){alert("Please select option(yes/no) in parties 10 clearance.");  return false; }

  if(Prtis_YN10!='' && Prtis_YN10=='N' && Prtis_Amt10=='' && Prtis_Remark10==''){alert("please enter parties 10 recovery amount & remark"); return false;}

  if(Prtis_YN10!='' && Prtis_YN10=='N' && Prtis_Amt10==''){alert("please enter parties 10 recovery amount"); return false;}

  if(Prtis_YN10=='N' && Prtis_num10==false){alert('Please enter only number in parties 10 amount field'); return false; }	

  if(Prtis_YN10!='' && Prtis_YN10=='N' && Prtis_Remark10==''){alert("please enter parties 10 remark"); return false;}

 }

 

 var Prtis11 = formname.Prtis11.value; var Prtis_YN11 = formname.Prtis_YN11.value; var Prtis_Amt11 = formname.Prtis_Amt11.value; 

 var Prtis_Remark11 = formname.Prtis_Remark11.value; var Prtis_num11 = Numfilter.test(Prtis_Amt11);

 if(Prtis11!='' || Prtis_YN11!='')

 {

  if(Prtis11==''){alert("Please enter parties 11 name.");  return false; }

  if(Prtis_YN11==''){alert("Please select option(yes/no) in parties 11 clearance.");  return false; }

  if(Prtis_YN11!='' && Prtis_YN11=='N' && Prtis_Amt11=='' && Prtis_Remark11==''){alert("please enter parties 11 recovery amount & remark"); return false;}

  if(Prtis_YN11!='' && Prtis_YN11=='N' && Prtis_Amt11==''){alert("please enter parties 11 recovery amount"); return false;}

  if(Prtis_YN11=='N' && Prtis_num11==false){alert('Please enter only number in parties 11 amount field'); return false; }	

  if(Prtis_YN11!='' && Prtis_YN11=='N' && Prtis_Remark11==''){alert("please enter parties 11 remark"); return false;}

 }

 var Prtis12 = formname.Prtis12.value; var Prtis_YN12 = formname.Prtis_YN12.value; var Prtis_Amt12 = formname.Prtis_Amt12.value; 

 var Prtis_Remark12 = formname.Prtis_Remark12.value; var Prtis_num12 = Numfilter.test(Prtis_Amt12);

 if(Prtis12!='' || Prtis_YN12!='')

 {

  if(Prtis12==''){alert("Please enter parties 12 name.");  return false; }

  if(Prtis_YN12==''){alert("Please select option(yes/no) in parties 12 clearance.");  return false; }

  if(Prtis_YN12!='' && Prtis_YN12=='N' && Prtis_Amt12=='' && Prtis_Remark12==''){alert("please enter parties 12 recovery amount & remark"); return false;}

  if(Prtis_YN12!='' && Prtis_YN12=='N' && Prtis_Amt12==''){alert("please enter parties 12 recovery amount"); return false;}

  if(Prtis_YN12=='N' && Prtis_num12==false){alert('Please enter only number in parties 12 amount field'); return false; }	

  if(Prtis_YN12!='' && Prtis_YN12=='N' && Prtis_Remark12==''){alert("please enter parties 12 remark"); return false;}

 }

 var Prtis13 = formname.Prtis13.value; var Prtis_YN13 = formname.Prtis_YN13.value; var Prtis_Amt13 = formname.Prtis_Amt13.value; 

 var Prtis_Remark13 = formname.Prtis_Remark13.value; var Prtis_num13 = Numfilter.test(Prtis_Amt13);

 if(Prtis13!='' || Prtis_YN13!='')

 {

  if(Prtis13==''){alert("Please enter parties 13 name.");  return false; }

  if(Prtis_YN13==''){alert("Please select option(yes/no) in parties 13 clearance.");  return false; }

  if(Prtis_YN13!='' && Prtis_YN13=='N' && Prtis_Amt13=='' && Prtis_Remark13==''){alert("please enter parties 13 recovery amount & remark"); return false;}

  if(Prtis_YN13!='' && Prtis_YN13=='N' && Prtis_Amt13==''){alert("please enter parties 13 recovery amount"); return false;}

  if(Prtis_YN13=='N' && Prtis_num13==false){alert('Please enter only number in parties 13 amount field'); return false; }	

  if(Prtis_YN13!='' && Prtis_YN13=='N' && Prtis_Remark13==''){alert("please enter parties 13 remark"); return false;}

 }

 var Prtis14 = formname.Prtis14.value; var Prtis_YN14 = formname.Prtis_YN14.value; var Prtis_Amt14 = formname.Prtis_Amt14.value; 

 var Prtis_Remark14 = formname.Prtis_Remark14.value; var Prtis_num14 = Numfilter.test(Prtis_Amt14);

 if(Prtis14!='' || Prtis_YN14!='')

 {

  if(Prtis14==''){alert("Please enter parties 14 name.");  return false; }

  if(Prtis_YN14==''){alert("Please select option(yes/no) in parties 14 clearance.");  return false; }

  if(Prtis_YN14!='' && Prtis_YN14=='N' && Prtis_Amt14=='' && Prtis_Remark14==''){alert("please enter parties 14 recovery amount & remark"); return false;}

  if(Prtis_YN14!='' && Prtis_YN14=='N' && Prtis_Amt14==''){alert("please enter parties 14 recovery amount"); return false;}

  if(Prtis_YN14=='N' && Prtis_num14==false){alert('Please enter only number in parties 14 amount field'); return false; }	

  if(Prtis_YN14!='' && Prtis_YN14=='N' && Prtis_Remark14==''){alert("please enter parties 14 remark"); return false;}

 }

 var Prtis15 = formname.Prtis15.value; var Prtis_YN15 = formname.Prtis_YN15.value; var Prtis_Amt15 = formname.Prtis_Amt15.value; 

 var Prtis_Remark15 = formname.Prtis_Remark15.value; var Prtis_num15 = Numfilter.test(Prtis_Amt15);

 if(Prtis15!='' || Prtis_YN15!='')

 {

  if(Prtis15==''){alert("Please enter parties 15 name.");  return false; }

  if(Prtis_YN15==''){alert("Please select option(yes/no) in parties 15 clearance.");  return false; }

  if(Prtis_YN15!='' && Prtis_YN15=='N' && Prtis_Amt15=='' && Prtis_Remark15==''){alert("please enter parties 15 recovery amount & remark"); return false;}

  if(Prtis_YN15!='' && Prtis_YN15=='N' && Prtis_Amt15==''){alert("please enter parties 15 recovery amount"); return false;}

  if(Prtis_YN15=='N' && Prtis_num15==false){alert('Please enter only number in parties 15 amount field'); return false; }	

  if(Prtis_YN15!='' && Prtis_YN15=='N' && Prtis_Remark15==''){alert("please enter parties 15 remark"); return false;}

 }

 var Prtis16 = formname.Prtis16.value; var Prtis_YN16 = formname.Prtis_YN16.value; var Prtis_Amt16 = formname.Prtis_Amt16.value; 

 var Prtis_Remark16 = formname.Prtis_Remark16.value; var Prtis_num16 = Numfilter.test(Prtis_Amt16);

 if(Prtis16!='' || Prtis_YN16!='')

 {

  if(Prtis16==''){alert("Please enter parties 16 name.");  return false; }

  if(Prtis_YN16==''){alert("Please select option(yes/no) in parties 16 clearance.");  return false; }

  if(Prtis_YN16!='' && Prtis_YN16=='N' && Prtis_Amt16=='' && Prtis_Remark16==''){alert("please enter parties 16 recovery amount & remark"); return false;}

  if(Prtis_YN16!='' && Prtis_YN16=='N' && Prtis_Amt16==''){alert("please enter parties 16 recovery amount"); return false;}

  if(Prtis_YN16=='N' && Prtis_num16==false){alert('Please enter only number in parties 16 amount field'); return false; }	

  if(Prtis_YN16!='' && Prtis_YN16=='N' && Prtis_Remark16==''){alert("please enter parties 16 remark"); return false;}

 }

 var Prtis17 = formname.Prtis17.value; var Prtis_YN17 = formname.Prtis_YN17.value; var Prtis_Amt17 = formname.Prtis_Amt17.value; 

 var Prtis_Remark17 = formname.Prtis_Remark17.value; var Prtis_num17 = Numfilter.test(Prtis_Amt17);

 if(Prtis17!='' || Prtis_YN17!='')

 {

  if(Prtis17==''){alert("Please enter parties 17 name.");  return false; }

  if(Prtis_YN17==''){alert("Please select option(yes/no) in parties 17 clearance.");  return false; }

  if(Prtis_YN17!='' && Prtis_YN17=='N' && Prtis_Amt17=='' && Prtis_Remark17==''){alert("please enter parties 17 recovery amount & remark"); return false;}

  if(Prtis_YN17!='' && Prtis_YN17=='N' && Prtis_Amt17==''){alert("please enter parties 17 recovery amount"); return false;}

  if(Prtis_YN17=='N' && Prtis_num17==false){alert('Please enter only number in parties 17 amount field'); return false; }	

  if(Prtis_YN17!='' && Prtis_YN17=='N' && Prtis_Remark17==''){alert("please enter parties 17 remark"); return false;}

 }

 var Prtis18 = formname.Prtis18.value; var Prtis_YN18 = formname.Prtis_YN18.value; var Prtis_Amt18 = formname.Prtis_Amt18.value; 

 var Prtis_Remark18 = formname.Prtis_Remark18.value; var Prtis_num18 = Numfilter.test(Prtis_Amt18);

 if(Prtis18!='' || Prtis_YN18!='')

 {

  if(Prtis18==''){alert("Please enter parties 18 name.");  return false; }

  if(Prtis_YN18==''){alert("Please select option(yes/no) in parties 18 clearance.");  return false; }

  if(Prtis_YN18!='' && Prtis_YN18=='N' && Prtis_Amt18=='' && Prtis_Remark18==''){alert("please enter parties 18 recovery amount & remark"); return false;}

  if(Prtis_YN18!='' && Prtis_YN18=='N' && Prtis_Amt18==''){alert("please enter parties 18 recovery amount"); return false;}

  if(Prtis_YN18=='N' && Prtis_num18==false){alert('Please enter only number in parties 18 amount field'); return false; }	

  if(Prtis_YN18!='' && Prtis_YN18=='N' && Prtis_Remark18==''){alert("please enter parties 18 remark"); return false;}

 }

 var Prtis19 = formname.Prtis19.value; var Prtis_YN19 = formname.Prtis_YN19.value; var Prtis_Amt19 = formname.Prtis_Amt19.value; 

 var Prtis_Remark19 = formname.Prtis_Remark19.value; var Prtis_num19 = Numfilter.test(Prtis_Amt19);

 if(Prtis19!='' || Prtis_YN19!='')

 {

  if(Prtis19==''){alert("Please enter parties 19 name.");  return false; }

  if(Prtis_YN19==''){alert("Please select option(yes/no) in parties 19 clearance.");  return false; }

  if(Prtis_YN19!='' && Prtis_YN19=='N' && Prtis_Amt19=='' && Prtis_Remark19==''){alert("please enter parties 19 recovery amount & remark"); return false;}

  if(Prtis_YN19!='' && Prtis_YN19=='N' && Prtis_Amt19==''){alert("please enter parties 19 recovery amount"); return false;}

  if(Prtis_YN19=='N' && Prtis_num19==false){alert('Please enter only number in parties 19 amount field'); return false; }	

  if(Prtis_YN19!='' && Prtis_YN19=='N' && Prtis_Remark19==''){alert("please enter parties 19 remark"); return false;}

 }

 var Prtis20 = formname.Prtis20.value; var Prtis_YN20 = formname.Prtis_YN20.value; var Prtis_Amt20 = formname.Prtis_Amt20.value; 

 var Prtis_Remark20 = formname.Prtis_Remark20.value; var Prtis_num20 = Numfilter.test(Prtis_Amt20);

 if(Prtis20!='' || Prtis_YN20!='')

 {

  if(Prtis20==''){alert("Please enter parties 20 name.");  return false; }

  if(Prtis_YN20==''){alert("Please select option(yes/no) in parties 20 clearance.");  return false; }

  if(Prtis_YN20!='' && Prtis_YN20=='N' && Prtis_Amt20=='' && Prtis_Remark20==''){alert("please enter parties 20 recovery amount & remark"); return false;}

  if(Prtis_YN20!='' && Prtis_YN20=='N' && Prtis_Amt20==''){alert("please enter parties 20 recovery amount"); return false;}

  if(Prtis_YN20=='N' && Prtis_num20==false){alert('Please enter only number in parties 20 amount field'); return false; }	

  if(Prtis_YN20!='' && Prtis_YN20=='N' && Prtis_Remark20==''){alert("please enter parties 20 remark"); return false;}

 }

 

 var Prtis21 = formname.Prtis21.value; var Prtis_YN21 = formname.Prtis_YN21.value; var Prtis_Amt21 = formname.Prtis_Amt21.value; 

 var Prtis_Remark21 = formname.Prtis_Remark21.value; var Prtis_num21 = Numfilter.test(Prtis_Amt21);

 if(Prtis21!='' || Prtis_YN21!='')

 {

  if(Prtis21==''){alert("Please enter parties 21 name.");  return false; }

  if(Prtis_YN21==''){alert("Please select option(yes/no) in parties 21 clearance.");  return false; }

  if(Prtis_YN21!='' && Prtis_YN21=='N' && Prtis_Amt21=='' && Prtis_Remark21==''){alert("please enter parties 21 recovery amount & remark"); return false;}

  if(Prtis_YN21!='' && Prtis_YN21=='N' && Prtis_Amt21==''){alert("please enter parties 21 recovery amount"); return false;}

  if(Prtis_YN21=='N' && Prtis_num21==false){alert('Please enter only number in parties 21 amount field'); return false; }	

  if(Prtis_YN21!='' && Prtis_YN21=='N' && Prtis_Remark21==''){alert("please enter parties 21 remark"); return false;}

 }

 var Prtis22 = formname.Prtis22.value; var Prtis_YN22 = formname.Prtis_YN22.value; var Prtis_Amt22 = formname.Prtis_Amt22.value; 

 var Prtis_Remark22 = formname.Prtis_Remark22.value; var Prtis_num22 = Numfilter.test(Prtis_Amt22);

 if(Prtis22!='' || Prtis_YN22!='')

 {

  if(Prtis22==''){alert("Please enter parties 22 name.");  return false; }

  if(Prtis_YN22==''){alert("Please select option(yes/no) in parties 22 clearance.");  return false; }

  if(Prtis_YN22!='' && Prtis_YN22=='N' && Prtis_Amt22=='' && Prtis_Remark22==''){alert("please enter parties 22 recovery amount & remark"); return false;}

  if(Prtis_YN22!='' && Prtis_YN22=='N' && Prtis_Amt22==''){alert("please enter parties 22 recovery amount"); return false;}

  if(Prtis_YN22=='N' && Prtis_num22==false){alert('Please enter only number in parties 22 amount field'); return false; }	

  if(Prtis_YN22!='' && Prtis_YN22=='N' && Prtis_Remark22==''){alert("please enter parties 22 remark"); return false;}

 }

 var Prtis23 = formname.Prtis23.value; var Prtis_YN23 = formname.Prtis_YN23.value; var Prtis_Amt23 = formname.Prtis_Amt23.value; 

 var Prtis_Remark23 = formname.Prtis_Remark23.value; var Prtis_num23 = Numfilter.test(Prtis_Amt23);

 if(Prtis23!='' || Prtis_YN23!='')

 {

  if(Prtis23==''){alert("Please enter parties 23 name.");  return false; }

  if(Prtis_YN23==''){alert("Please select option(yes/no) in parties 23 clearance.");  return false; }

  if(Prtis_YN23!='' && Prtis_YN23=='N' && Prtis_Amt23=='' && Prtis_Remark23==''){alert("please enter parties 23 recovery amount & remark"); return false;}

  if(Prtis_YN23!='' && Prtis_YN23=='N' && Prtis_Amt23==''){alert("please enter parties 23 recovery amount"); return false;}

  if(Prtis_YN23=='N' && Prtis_num23==false){alert('Please enter only number in parties 23 amount field'); return false; }	

  if(Prtis_YN23!='' && Prtis_YN23=='N' && Prtis_Remark23==''){alert("please enter parties 23 remark"); return false;}

 }

 var Prtis24 = formname.Prtis24.value; var Prtis_YN24 = formname.Prtis_YN24.value; var Prtis_Amt24 = formname.Prtis_Amt24.value; 

 var Prtis_Remark24 = formname.Prtis_Remark24.value; var Prtis_num24 = Numfilter.test(Prtis_Amt24);

 if(Prtis24!='' || Prtis_YN24!='')

 {

  if(Prtis24==''){alert("Please enter parties 24 name.");  return false; }

  if(Prtis_YN24==''){alert("Please select option(yes/no) in parties 24 clearance.");  return false; }

  if(Prtis_YN24!='' && Prtis_YN24=='N' && Prtis_Amt24=='' && Prtis_Remark24==''){alert("please enter parties 24 recovery amount & remark"); return false;}

  if(Prtis_YN24!='' && Prtis_YN24=='N' && Prtis_Amt24==''){alert("please enter parties 24 recovery amount"); return false;}

  if(Prtis_YN24=='N' && Prtis_num24==false){alert('Please enter only number in parties 24 amount field'); return false; }	

  if(Prtis_YN24!='' && Prtis_YN24=='N' && Prtis_Remark24==''){alert("please enter parties 24 remark"); return false;}

 }

 var Prtis25 = formname.Prtis25.value; var Prtis_YN25 = formname.Prtis_YN25.value; var Prtis_Amt25 = formname.Prtis_Amt25.value; 

 var Prtis_Remark25 = formname.Prtis_Remark25.value; var Prtis_num25 = Numfilter.test(Prtis_Amt25);

 if(Prtis25!='' || Prtis_YN25!='')

 {

  if(Prtis25==''){alert("Please enter parties 25 name.");  return false; }

  if(Prtis_YN25==''){alert("Please select option(yes/no) in parties 25 clearance.");  return false; }

  if(Prtis_YN25!='' && Prtis_YN25=='N' && Prtis_Amt25=='' && Prtis_Remark25==''){alert("please enter parties 25 recovery amount & remark"); return false;}

  if(Prtis_YN25!='' && Prtis_YN25=='N' && Prtis_Amt25==''){alert("please enter parties 25 recovery amount"); return false;}

  if(Prtis_YN25=='N' && Prtis_num25==false){alert('Please enter only number in parties 25 amount field'); return false; }	

  if(Prtis_YN25!='' && Prtis_YN25=='N' && Prtis_Remark25==''){alert("please enter parties 25 remark"); return false;}

 }

 var Prtis26 = formname.Prtis26.value; var Prtis_YN26 = formname.Prtis_YN26.value; var Prtis_Amt26 = formname.Prtis_Amt26.value; 

 var Prtis_Remark26 = formname.Prtis_Remark26.value; var Prtis_num26 = Numfilter.test(Prtis_Amt26);

 if(Prtis26!='' || Prtis_YN26!='')

 {

  if(Prtis26==''){alert("Please enter parties 26 name.");  return false; }

  if(Prtis_YN26==''){alert("Please select option(yes/no) in parties 26 clearance.");  return false; }

  if(Prtis_YN26!='' && Prtis_YN26=='N' && Prtis_Amt26=='' && Prtis_Remark26==''){alert("please enter parties 26 recovery amount & remark"); return false;}

  if(Prtis_YN26!='' && Prtis_YN26=='N' && Prtis_Amt26==''){alert("please enter parties 26 recovery amount"); return false;}

  if(Prtis_YN26=='N' && Prtis_num26==false){alert('Please enter only number in parties 26 amount field'); return false; }	

  if(Prtis_YN26!='' && Prtis_YN26=='N' && Prtis_Remark26==''){alert("please enter parties 26 remark"); return false;}

 }

 var Prtis27 = formname.Prtis27.value; var Prtis_YN27 = formname.Prtis_YN27.value; var Prtis_Amt27 = formname.Prtis_Amt27.value; 

 var Prtis_Remark27 = formname.Prtis_Remark27.value; var Prtis_num27 = Numfilter.test(Prtis_Amt27);

 if(Prtis27!='' || Prtis_YN27!='')

 {

  if(Prtis27==''){alert("Please enter parties 27 name.");  return false; }

  if(Prtis_YN27==''){alert("Please select option(yes/no) in parties 27 clearance.");  return false; }

  if(Prtis_YN27!='' && Prtis_YN27=='N' && Prtis_Amt27=='' && Prtis_Remark27==''){alert("please enter parties 27 recovery amount & remark"); return false;}

  if(Prtis_YN27!='' && Prtis_YN27=='N' && Prtis_Amt27==''){alert("please enter parties 27 recovery amount"); return false;}

  if(Prtis_YN27=='N' && Prtis_num27==false){alert('Please enter only number in parties 27 amount field'); return false; }	

  if(Prtis_YN27!='' && Prtis_YN27=='N' && Prtis_Remark27==''){alert("please enter parties 27 remark"); return false;}

 }

 var Prtis28 = formname.Prtis28.value; var Prtis_YN28 = formname.Prtis_YN28.value; var Prtis_Amt28 = formname.Prtis_Amt28.value; 

 var Prtis_Remark28 = formname.Prtis_Remark28.value; var Prtis_num28 = Numfilter.test(Prtis_Amt28);

 if(Prtis28!='' || Prtis_YN28!='')

 {

  if(Prtis28==''){alert("Please enter parties 28 name.");  return false; }

  if(Prtis_YN28==''){alert("Please select option(yes/no) in parties 28 clearance.");  return false; }

  if(Prtis_YN28!='' && Prtis_YN28=='N' && Prtis_Amt28=='' && Prtis_Remark28==''){alert("please enter parties 28 recovery amount & remark"); return false;}

  if(Prtis_YN28!='' && Prtis_YN28=='N' && Prtis_Amt28==''){alert("please enter parties 28 recovery amount"); return false;}

  if(Prtis_YN28=='N' && Prtis_num28==false){alert('Please enter only number in parties 28 amount field'); return false; }	

  if(Prtis_YN28!='' && Prtis_YN28=='N' && Prtis_Remark28==''){alert("please enter parties 28 remark"); return false;}

 }

 var Prtis29 = formname.Prtis29.value; var Prtis_YN29 = formname.Prtis_YN29.value; var Prtis_Amt29 = formname.Prtis_Amt29.value; 

 var Prtis_Remark29 = formname.Prtis_Remark29.value; var Prtis_num29 = Numfilter.test(Prtis_Amt29);

 if(Prtis29!='' || Prtis_YN29!='')

 {

  if(Prtis29==''){alert("Please enter parties 29 name.");  return false; }

  if(Prtis_YN29==''){alert("Please select option(yes/no) in parties 29 clearance.");  return false; }

  if(Prtis_YN29!='' && Prtis_YN29=='N' && Prtis_Amt29=='' && Prtis_Remark29==''){alert("please enter parties 29 recovery amount & remark"); return false;}

  if(Prtis_YN29!='' && Prtis_YN29=='N' && Prtis_Amt29==''){alert("please enter parties 29 recovery amount"); return false;}

  if(Prtis_YN29=='N' && Prtis_num29==false){alert('Please enter only number in parties 29 amount field'); return false; }	

  if(Prtis_YN29!='' && Prtis_YN29=='N' && Prtis_Remark29==''){alert("please enter parties 29 remark"); return false;}

 }

 var Prtis30 = formname.Prtis30.value; var Prtis_YN30 = formname.Prtis_YN30.value; var Prtis_Amt30 = formname.Prtis_Amt30.value; 

 var Prtis_Remark30 = formname.Prtis_Remark30.value; var Prtis_num30 = Numfilter.test(Prtis_Amt30);

 if(Prtis30!='' || Prtis_YN30!='')

 {

  if(Prtis30==''){alert("Please enter parties 30 name.");  return false; }

  if(Prtis_YN30==''){alert("Please select option(yes/no) in parties 30 clearance.");  return false; }

  if(Prtis_YN30!='' && Prtis_YN30=='N' && Prtis_Amt30=='' && Prtis_Remark30==''){alert("please enter parties 30 recovery amount & remark"); return false;}

  if(Prtis_YN30!='' && Prtis_YN30=='N' && Prtis_Amt30==''){alert("please enter parties 30 recovery amount"); return false;}

  if(Prtis_YN30=='N' && Prtis_num30==false){alert('Please enter only number in parties 30 amount field'); return false; }	

  if(Prtis_YN30!='' && Prtis_YN30=='N' && Prtis_Remark30==''){alert("please enter parties 30 remark"); return false;}

 }

 

 var Prtis31 = formname.Prtis31.value; var Prtis_YN31 = formname.Prtis_YN31.value; var Prtis_Amt31 = formname.Prtis_Amt31.value; 

 var Prtis_Remark31 = formname.Prtis_Remark31.value; var Prtis_num31 = Numfilter.test(Prtis_Amt31);

 if(Prtis31!='' || Prtis_YN31!='')

 {

  if(Prtis31==''){alert("Please enter parties 31 name.");  return false; }

  if(Prtis_YN31==''){alert("Please select option(yes/no) in parties 31 clearance.");  return false; }

  if(Prtis_YN31!='' && Prtis_YN31=='N' && Prtis_Amt31=='' && Prtis_Remark31==''){alert("please enter parties 31 recovery amount & remark"); return false;}

  if(Prtis_YN31!='' && Prtis_YN31=='N' && Prtis_Amt31==''){alert("please enter parties 31 recovery amount"); return false;}

  if(Prtis_YN31=='N' && Prtis_num31==false){alert('Please enter only number in parties 31 amount field'); return false; }	

  if(Prtis_YN31!='' && Prtis_YN31=='N' && Prtis_Remark31==''){alert("please enter parties 31 remark"); return false;}

 }

 var Prtis32 = formname.Prtis32.value; var Prtis_YN32 = formname.Prtis_YN32.value; var Prtis_Amt32 = formname.Prtis_Amt32.value; 

 var Prtis_Remark32 = formname.Prtis_Remark32.value; var Prtis_num32 = Numfilter.test(Prtis_Amt32);

 if(Prtis32!='' || Prtis_YN32!='')

 {

  if(Prtis32==''){alert("Please enter parties 32 name.");  return false; }

  if(Prtis_YN32==''){alert("Please select option(yes/no) in parties 32 clearance.");  return false; }

  if(Prtis_YN32!='' && Prtis_YN32=='N' && Prtis_Amt32=='' && Prtis_Remark32==''){alert("please enter parties 32 recovery amount & remark"); return false;}

  if(Prtis_YN32!='' && Prtis_YN32=='N' && Prtis_Amt32==''){alert("please enter parties 32 recovery amount"); return false;}

  if(Prtis_YN32=='N' && Prtis_num32==false){alert('Please enter only number in parties 32 amount field'); return false; }	

  if(Prtis_YN32!='' && Prtis_YN32=='N' && Prtis_Remark32==''){alert("please enter parties 32 remark"); return false;}

 }

 var Prtis33 = formname.Prtis33.value; var Prtis_YN33 = formname.Prtis_YN33.value; var Prtis_Amt33 = formname.Prtis_Amt33.value; 

 var Prtis_Remark33 = formname.Prtis_Remark33.value; var Prtis_num33 = Numfilter.test(Prtis_Amt33);

 if(Prtis33!='' || Prtis_YN33!='')

 {

  if(Prtis33==''){alert("Please enter parties 33 name.");  return false; }

  if(Prtis_YN33==''){alert("Please select option(yes/no) in parties 33 clearance.");  return false; }

  if(Prtis_YN33!='' && Prtis_YN33=='N' && Prtis_Amt33=='' && Prtis_Remark33==''){alert("please enter parties 33 recovery amount & remark"); return false;}

  if(Prtis_YN33!='' && Prtis_YN33=='N' && Prtis_Amt33==''){alert("please enter parties 33 recovery amount"); return false;}

  if(Prtis_YN33=='N' && Prtis_num33==false){alert('Please enter only number in parties 33 amount field'); return false; }	

  if(Prtis_YN33!='' && Prtis_YN33=='N' && Prtis_Remark33==''){alert("please enter parties 33 remark"); return false;}

 }

 var Prtis34 = formname.Prtis34.value; var Prtis_YN34 = formname.Prtis_YN34.value; var Prtis_Amt34 = formname.Prtis_Amt34.value; 

 var Prtis_Remark34 = formname.Prtis_Remark34.value; var Prtis_num34 = Numfilter.test(Prtis_Amt34);

 if(Prtis34!='' || Prtis_YN34!='')

 {

  if(Prtis34==''){alert("Please enter parties 34 name.");  return false; }

  if(Prtis_YN34==''){alert("Please select option(yes/no) in parties 34 clearance.");  return false; }

  if(Prtis_YN34!='' && Prtis_YN34=='N' && Prtis_Amt34=='' && Prtis_Remark34==''){alert("please enter parties 34 recovery amount & remark"); return false;}

  if(Prtis_YN34!='' && Prtis_YN34=='N' && Prtis_Amt34==''){alert("please enter parties 34 recovery amount"); return false;}

  if(Prtis_YN34=='N' && Prtis_num34==false){alert('Please enter only number in parties 34 amount field'); return false; }	

  if(Prtis_YN34!='' && Prtis_YN34=='N' && Prtis_Remark34==''){alert("please enter parties 34 remark"); return false;}

 }

 var Prtis35 = formname.Prtis35.value; var Prtis_YN35 = formname.Prtis_YN35.value; var Prtis_Amt35 = formname.Prtis_Amt35.value; 

 var Prtis_Remark35 = formname.Prtis_Remark35.value; var Prtis_num35 = Numfilter.test(Prtis_Amt35);

 if(Prtis35!='' || Prtis_YN35!='')

 {

  if(Prtis35==''){alert("Please enter parties 35 name.");  return false; }

  if(Prtis_YN35==''){alert("Please select option(yes/no) in parties 35 clearance.");  return false; }

  if(Prtis_YN35!='' && Prtis_YN35=='N' && Prtis_Amt35=='' && Prtis_Remark35==''){alert("please enter parties 35 recovery amount & remark"); return false;}

  if(Prtis_YN35!='' && Prtis_YN35=='N' && Prtis_Amt35==''){alert("please enter parties 35 recovery amount"); return false;}

  if(Prtis_YN35=='N' && Prtis_num35==false){alert('Please enter only number in parties 35 amount field'); return false; }	

  if(Prtis_YN35!='' && Prtis_YN35=='N' && Prtis_Remark35==''){alert("please enter parties 35 remark"); return false;}

 }

 var Prtis36 = formname.Prtis36.value; var Prtis_YN36 = formname.Prtis_YN36.value; var Prtis_Amt36 = formname.Prtis_Amt36.value; 

 var Prtis_Remark36 = formname.Prtis_Remark36.value; var Prtis_num36 = Numfilter.test(Prtis_Amt36);

 if(Prtis36!='' || Prtis_YN36!='')

 {

  if(Prtis36==''){alert("Please enter parties 36 name.");  return false; }

  if(Prtis_YN36==''){alert("Please select option(yes/no) in parties 36 clearance.");  return false; }

  if(Prtis_YN36!='' && Prtis_YN36=='N' && Prtis_Amt36=='' && Prtis_Remark36==''){alert("please enter parties 36 recovery amount & remark"); return false;}

  if(Prtis_YN36!='' && Prtis_YN36=='N' && Prtis_Amt36==''){alert("please enter parties 36 recovery amount"); return false;}

  if(Prtis_YN36=='N' && Prtis_num36==false){alert('Please enter only number in parties 36 amount field'); return false; }	

  if(Prtis_YN36!='' && Prtis_YN36=='N' && Prtis_Remark36==''){alert("please enter parties 36 remark"); return false;}

 }

 var Prtis37 = formname.Prtis37.value; var Prtis_YN37 = formname.Prtis_YN37.value; var Prtis_Amt37 = formname.Prtis_Amt37.value; 

 var Prtis_Remark37 = formname.Prtis_Remark37.value; var Prtis_num37 = Numfilter.test(Prtis_Amt37);

 if(Prtis37!='' || Prtis_YN37!='')

 {

  if(Prtis37==''){alert("Please enter parties 37 name.");  return false; }

  if(Prtis_YN37==''){alert("Please select option(yes/no) in parties 37 clearance.");  return false; }

  if(Prtis_YN37!='' && Prtis_YN37=='N' && Prtis_Amt37=='' && Prtis_Remark37==''){alert("please enter parties 37 recovery amount & remark"); return false;}

  if(Prtis_YN37!='' && Prtis_YN37=='N' && Prtis_Amt37==''){alert("please enter parties 37 recovery amount"); return false;}

  if(Prtis_YN37=='N' && Prtis_num37==false){alert('Please enter only number in parties 37 amount field'); return false; }	

  if(Prtis_YN37!='' && Prtis_YN37=='N' && Prtis_Remark37==''){alert("please enter parties 37 remark"); return false;}

 }

 var Prtis38 = formname.Prtis38.value; var Prtis_YN38 = formname.Prtis_YN38.value; var Prtis_Amt38 = formname.Prtis_Amt38.value; 

 var Prtis_Remark38 = formname.Prtis_Remark38.value; var Prtis_num38 = Numfilter.test(Prtis_Amt38);

 if(Prtis38!='' || Prtis_YN38!='')

 {

  if(Prtis38==''){alert("Please enter parties 38 name.");  return false; }

  if(Prtis_YN38==''){alert("Please select option(yes/no) in parties 38 clearance.");  return false; }

  if(Prtis_YN38!='' && Prtis_YN38=='N' && Prtis_Amt38=='' && Prtis_Remark38==''){alert("please enter parties 38 recovery amount & remark"); return false;}

  if(Prtis_YN38!='' && Prtis_YN38=='N' && Prtis_Amt38==''){alert("please enter parties 38 recovery amount"); return false;}

  if(Prtis_YN38=='N' && Prtis_num38==false){alert('Please enter only number in parties 38 amount field'); return false; }	

  if(Prtis_YN38!='' && Prtis_YN38=='N' && Prtis_Remark38==''){alert("please enter parties 38 remark"); return false;}

 }

 var Prtis39 = formname.Prtis39.value; var Prtis_YN39 = formname.Prtis_YN39.value; var Prtis_Amt39 = formname.Prtis_Amt39.value; 

 var Prtis_Remark39 = formname.Prtis_Remark39.value; var Prtis_num39 = Numfilter.test(Prtis_Amt39);

 if(Prtis39!='' || Prtis_YN39!='')

 {

  if(Prtis39==''){alert("Please enter parties 39 name.");  return false; }

  if(Prtis_YN39==''){alert("Please select option(yes/no) in parties 39 clearance.");  return false; }

  if(Prtis_YN39!='' && Prtis_YN39=='N' && Prtis_Amt39=='' && Prtis_Remark39==''){alert("please enter parties 39 recovery amount & remark"); return false;}

  if(Prtis_YN39!='' && Prtis_YN39=='N' && Prtis_Amt39==''){alert("please enter parties 39 recovery amount"); return false;}

  if(Prtis_YN39=='N' && Prtis_num39==false){alert('Please enter only number in parties 39 amount field'); return false; }	

  if(Prtis_YN39!='' && Prtis_YN39=='N' && Prtis_Remark39==''){alert("please enter parties 39 remark"); return false;}

 }

 var Prtis40 = formname.Prtis40.value; var Prtis_YN40 = formname.Prtis_YN40.value; var Prtis_Amt40 = formname.Prtis_Amt40.value; 

 var Prtis_Remark40 = formname.Prtis_Remark40.value; var Prtis_num40 = Numfilter.test(Prtis_Amt40);

 if(Prtis40!='' || Prtis_YN40!='')

 {

  if(Prtis40==''){alert("Please enter parties 40 name.");  return false; }

  if(Prtis_YN40==''){alert("Please select option(yes/no) in parties 40 clearance.");  return false; }

  if(Prtis_YN40!='' && Prtis_YN40=='N' && Prtis_Amt40=='' && Prtis_Remark40==''){alert("please enter parties 40 recovery amount & remark"); return false;}

  if(Prtis_YN40!='' && Prtis_YN40=='N' && Prtis_Amt40==''){alert("please enter parties 40 recovery amount"); return false;}

  if(Prtis_YN40=='N' && Prtis_num40==false){alert('Please enter only number in parties 40 amount field'); return false; }	

  if(Prtis_YN40!='' && Prtis_YN40=='N' && Prtis_Remark40==''){alert("please enter parties 40 remark"); return false;}

 }

 

 



 var DDH_t = parseFloat(document.getElementById("DDH_Amt").value); var TID_t = parseFloat(document.getElementById("TID_Amt").value);

 var APTC_t = parseFloat(document.getElementById("APTC_Amt").value); var HOAS_t = parseFloat(document.getElementById("HOAS_Amt").value);

 var Prtis_1t = parseFloat(document.getElementById("Prtis_Amt1").value); var Prtis_2t = parseFloat(document.getElementById("Prtis_Amt2").value);

 var Prtis_3t = parseFloat(document.getElementById("Prtis_Amt3").value); var Prtis_4t = parseFloat(document.getElementById("Prtis_Amt4").value);

 var Prtis_5t = parseFloat(document.getElementById("Prtis_Amt5").value); var Prtis_6t = parseFloat(document.getElementById("Prtis_Amt6").value);

 var Prtis_7t = parseFloat(document.getElementById("Prtis_Amt7").value); var Prtis_8t = parseFloat(document.getElementById("Prtis_Amt8").value);

 var Prtis_9t = parseFloat(document.getElementById("Prtis_Amt9").value); var Prtis_10t = parseFloat(document.getElementById("Prtis_Amt10").value);

 var Prtis_11t = parseFloat(document.getElementById("Prtis_Amt11").value); var Prtis_12t = parseFloat(document.getElementById("Prtis_Amt12").value);

 var Prtis_13t = parseFloat(document.getElementById("Prtis_Amt13").value); var Prtis_14t = parseFloat(document.getElementById("Prtis_Amt14").value);

 var Prtis_15t = parseFloat(document.getElementById("Prtis_Amt15").value); var Prtis_16t = parseFloat(document.getElementById("Prtis_Amt16").value);

 var Prtis_17t = parseFloat(document.getElementById("Prtis_Amt17").value); var Prtis_18t = parseFloat(document.getElementById("Prtis_Amt18").value);

 var Prtis_19t = parseFloat(document.getElementById("Prtis_Amt19").value); var Prtis_20t = parseFloat(document.getElementById("Prtis_Amt20").value);

 var Prtis_21t = parseFloat(document.getElementById("Prtis_Amt21").value); var Prtis_22t = parseFloat(document.getElementById("Prtis_Amt22").value);

 var Prtis_23t = parseFloat(document.getElementById("Prtis_Amt23").value); var Prtis_24t = parseFloat(document.getElementById("Prtis_Amt24").value);

 var Prtis_25t = parseFloat(document.getElementById("Prtis_Amt25").value); var Prtis_26t = parseFloat(document.getElementById("Prtis_Amt26").value);

 var Prtis_27t = parseFloat(document.getElementById("Prtis_Amt27").value); var Prtis_28t = parseFloat(document.getElementById("Prtis_Amt28").value);

 var Prtis_29t = parseFloat(document.getElementById("Prtis_Amt29").value); var Prtis_30t = parseFloat(document.getElementById("Prtis_Amt30").value);

 var Prtis_31t = parseFloat(document.getElementById("Prtis_Amt31").value); var Prtis_32t = parseFloat(document.getElementById("Prtis_Amt32").value);

 var Prtis_33t = parseFloat(document.getElementById("Prtis_Amt33").value); var Prtis_34t = parseFloat(document.getElementById("Prtis_Amt34").value);

 var Prtis_35t = parseFloat(document.getElementById("Prtis_Amt35").value); var Prtis_36t = parseFloat(document.getElementById("Prtis_Amt36").value);

 var Prtis_37t = parseFloat(document.getElementById("Prtis_Amt37").value); var Prtis_38t = parseFloat(document.getElementById("Prtis_Amt38").value);

 var Prtis_39t = parseFloat(document.getElementById("Prtis_Amt39").value); var Prtis_40t = parseFloat(document.getElementById("Prtis_Amt40").value);

 



 var TotAmt = document.getElementById("TotAmt").value=Math.round((DDH_t +TID_t+APTC_t+HOAS_t+Prtis_1t+Prtis_2t+Prtis_3t+Prtis_4t+Prtis_5t+Prtis_6t+Prtis_7t+Prtis_8t+Prtis_9t+Prtis_10t+Prtis_11t+Prtis_12t+Prtis_13t+Prtis_14t+Prtis_15t+Prtis_16t+Prtis_17t+Prtis_18t+Prtis_19t+Prtis_20t+Prtis_21t+Prtis_22t+Prtis_23t+Prtis_24t+Prtis_25t+Prtis_26t+Prtis_27t+Prtis_28t+Prtis_29t+Prtis_30t+Prtis_31t+Prtis_32t+Prtis_33t+Prtis_34t+Prtis_35t+Prtis_36t+Prtis_37t+Prtis_38t+Prtis_39t+Prtis_40t)*100)/100; 



  var agree=confirm("Are you sure..?");

  if(agree){ return true; }else{ return false; }

}



function FunResendRep(si)

{ var Ename=document.getElementById("Ename").value; var DeptId=document.getElementById("DeptId").value; 

  var agree=confirm("Are you sure, you want resend NOC form to logistics."); 

  if(agree)

  { window.location="SepLogClearForm.php?act=act&action=RepResend&v=v&ss=vty&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&si="+si+"&En="+Ename+"&Di="+DeptId;  }

}



function FunApprovedRep(si)

{ var Ename=document.getElementById("Ename").value; var agree=confirm("Are you sure, you want approve NOC form to logistics.");

  if(agree) 

  { window.location="SepLogClearForm.php?act=act&action=RepApproved&v=v&ss=vty&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&si="+si+"&En="+Ename;  }

}



</script>  

</head>

<body bgcolor="#E0DBE3">

<center>

<table border="0" style="width:790px;" align="center">

<tr>

  <td style="width:790px;" valign="top" align="center">

<?php if($_REQUEST['act']!='')  { ?>	

<?php $sqlSE=mysql_query("select * from hrm_employee_separation where EmpSepId=".$_REQUEST['si'], $con); $resSE=mysql_fetch_assoc($sqlSE);

$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resSE['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 

$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);

if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];

 $sqlNoc=mysql_query("select * from hrm_employee_separation_nocrep where EmpSepId=".$_REQUEST['si'], $con); 

 $rowNoc=mysql_num_rows($sqlNoc); if($rowNoc>0){$res=mysql_fetch_assoc($sqlNoc);}
 
?>	

<form enctype="multipart/form-data" name="formname" method="post" onSubmit="return validate(this)">

<input type="hidden" name="HodId" id="HodId" value="<?php echo $resSE['Hod_EmployeeID']; ?>" /> 

<table border="0">

 <tr>

<?php /*************************************** Reporting *****************************************************/ ?>   

<td style="width:790px;"> 

 <table border="0" cellpadding="0">

  <tr><td>&nbsp;</td><td class="Text" style="">&nbsp;<b>EC :&nbsp;<?php echo $resE['EmpCode']; ?>/&nbsp;&nbsp;Name :&nbsp;<?php echo $NameE; ?></b></td></tr>

  <tr><td>&nbsp;</td><td class="Text2" style="color:#006200;" align="center"><b>DEPARTMENTAL NOC CLEARANCE FORM(LOGISTICS)</b></td></tr>

  <tr>

   <td style="width:30px;">&nbsp;</td>

   <td>

    <table border="1" style="width:810px; ">

	  <tr bgcolor="#7a6189">

       <td class="Text" style="width:30px;color:#FFFFFF;" align="center"><b>Sn</b></td>

       <td class="Text" style="width:230px;color:#FFFFFF;" align="center"><b>Particular</b></td>

	    <td class="Text" style="width:150px;color:#FFFFFF;" align="center"><b>NA /Yes /No</b></td>

	   <td class="Text" style="width:80px;color:#FFFFFF;" align="center" valign="top"><b>Recovery Amount</b></td>

	   <td class="Text" style="width:320px;color:#FFFFFF;" align="center"><b>Remark</b></td>

     </tr>

	 <tr><td colspan="5" class="Text" style="width:235px;background-color:#FFFFFF;" align="">&nbsp;<b>Department Clearance&nbsp;<font color="#D70000">*</font></b></td></tr>

  </tr>

	 <tr bgcolor="#FFFFFF">

       <td class="Text" style="width:30px;" align="center">1<input type="hidden" id="si" name="si" value="<?php echo $_REQUEST['si']; ?>" />

       <input type="hidden" id="ei" name="ei" value="<?php echo $resSE['Rep_EmployeeID']; ?>" /><input type="hidden" id="TotAmt" name="TotAmt" value="<?php echo $res['TotRepAmt']; ?>" />

	   <input type="hidden" name="Ename" id="Ename" value="<?php echo $NameE; ?>" /><input type="hidden" name="DeptId" id="DeptId" value="<?php echo $resE['DepartmentId']; ?>" />

	   <input type="hidden" name="Rname" id="Rname" value="<?php echo $NameR; ?>" /></td>

       <td class="Text" style="width:230px;" align="">&nbsp;Handover Of Data Document etc</td>

	   <td class="Text" style="width:150px;" align="center" valign="top">

	    NA<input type="checkbox" id="DDH_A" onClick="FunDDH('A')" <?php if($res['DDH']=='A'){echo 'checked';} ?>/>

	    Yes<input type="checkbox" id="DDH_Y" onClick="FunDDH('Y')" <?php if($res['DDH']=='Y'){echo 'checked';} ?>/>

		No<input type="checkbox" id="DDH_N" onClick="FunDDH('N')" <?php if($res['DDH']=='N'){echo 'checked';} ?>/>

		<input type="hidden" id="DDH_YN" name="DDH_YN" value="<?php echo $res['DDH']; ?>" />

	   </td>

	   <td class="Text" style="width:80px;" align="center" valign="top">

	    <input style="width:78px;background-color:#EAEAEA;text-align:right;" id="DDH_Amt" name="DDH_Amt" value="<?php if($res['DDH_Amt']>0){echo intval($res['DDH_Amt']);}else{echo 0;} ?>" maxlength="10" readonly/>

	   </td>

	   <td class="Text" style="width:320px;" align="center" valign="top">

	    <input id="DDH_Remark" name="DDH_Remark" style="width:318px;" value="<?php echo $res['DDH_Remark']; ?>" maxlength="90" />

	   </td>

     </tr>

	  <tr bgcolor="#FFFFFF"> 

       <td class="Text" style="width:30px;" align="center">2</td>

       <td class="Text" style="width:230px;" align="">&nbsp;Handover Of ID Card</td>

	   <td class="Text" style="width:150px;" align="center" valign="top">

	    NA<input type="checkbox" id="TID_A" onClick="FunTID('A')" <?php if($res['TID']=='A'){echo 'checked';} ?>/>

	    Yes<input type="checkbox" id="TID_Y" onClick="FunTID('Y')" <?php if($res['TID']=='Y'){echo 'checked';} ?>/>

		No<input type="checkbox" id="TID_N" onClick="FunTID('N')" <?php if($res['TID']=='N'){echo 'checked';} ?>/>

		<input type="hidden" id="TID_YN" name="TID_YN" value="<?php echo $res['TID']; ?>" />

	   </td>

	   <td class="Text" style="width:80px;" align="center" valign="top">

	    <input style="width:78px;background-color:#EAEAEA;text-align:right;" id="TID_Amt" name="TID_Amt" value="<?php if($res['TID_Amt']>0){echo intval($res['TID_Amt']);}else{echo 0;} ?>" maxlength="10" readonly/>

	   </td>

	   <td class="Text" style="width:320px;" align="center" valign="top">

	    <input id="TID_Remark" name="TID_Remark" style="width:318px;" value="<?php echo $res['TID_Remark']; ?>" maxlength="90" />

	   </td>

     </tr>



	 <tr bgcolor="#FFFFFF"> 

       <td class="Text" style="width:30px;" align="center">3</td>

       <td class="Text" style="width:230px;" align="">&nbsp;Complete Of Pending Task</td>

	   <td class="Text" style="width:150px;" align="center" valign="top">

	    NA<input type="checkbox" id="APTC_A" onClick="FunAPTC('A')" <?php if($res['APTC']=='A'){echo 'checked';} ?>/>

	    Yes<input type="checkbox" id="APTC_Y" onClick="FunAPTC('Y')" <?php if($res['APTC']=='Y'){echo 'checked';} ?>/>

		No<input type="checkbox" id="APTC_N" onClick="FunAPTC('N')" <?php if($res['APTC']=='N'){echo 'checked';} ?>/>

		<input type="hidden" id="APTC_YN" name="APTC_YN" value="<?php echo $res['APTC']; ?>" />

	   </td>

	   <td class="Text" style="width:80px;" align="center" valign="top">

	    <input style="width:78px;background-color:#EAEAEA;text-align:right;" id="APTC_Amt" name="APTC_Amt" value="<?php if($res['APTC_Amt']>0){echo intval($res['APTC_Amt']);}else{echo 0;} ?>" maxlength="10" readonly/>

	   </td>



	   <td class="Text" style="width:320px;" align="center" valign="top">

	    <input id="APTC_Remark" name="APTC_Remark" style="width:318px;" value="<?php echo $res['APTC_Remark']; ?>" maxlength="90" />

	   </td>

     </tr>

	 <tr bgcolor="#FFFFFF"> 

       <td class="Text" style="width:30px;" align="center">4</td>

       <td class="Text" style="width:230px;" align="">&nbsp;Handover Of Health Card</td>

	   <td class="Text" style="width:150px;" align="center" valign="top">

	    NA<input type="checkbox" id="HOAS_A" onClick="FunHOAS('A')" <?php if($res['HOAS']=='A'){echo 'checked';} ?>/>

	    Yes<input type="checkbox" id="HOAS_Y" onClick="FunHOAS('Y')" <?php if($res['HOAS']=='Y'){echo 'checked';} ?>/>

		No<input type="checkbox" id="HOAS_N" onClick="FunHOAS('N')" <?php if($res['HOAS']=='N'){echo 'checked';} ?>/>

		<input type="hidden" id="HOAS_YN" name="HOAS_YN" value="<?php echo $res['HOAS']; ?>" />

	   </td>

	   <td class="Text" style="width:80px;" align="center" valign="top">

	    <input style="width:78px;background-color:#EAEAEA;text-align:right;" id="HOAS_Amt" name="HOAS_Amt" value="<?php if($res['HOAS_Amt']>0){echo intval($res['HOAS_Amt']);}else{echo 0;} ?>" maxlength="10" readonly/>

	   </td>

	   <td class="Text" style="width:320px;" align="center" valign="top">

	    <input id="HOAS_Remark" name="HOAS_Remark" style="width:318px;" value="<?php echo $res['HOAS_Remark']; ?>" maxlength="90" />

	   </td>

     </tr>

	</table>

   </td>

  </tr>

   <tr>

   <td style="width:30px;">&nbsp;</td>

   <td style="width:700px;"><table border="1">

        <tr><td class="Text" style="width:810px;background-color:#FFFFFF;" align="">&nbsp;<b>Parties Clearance</b></td></tr>

	   </table>

   </td>

  </tr>

 <tr>

   <td style="width:30px;" align="center" align="center">&nbsp;</td>

   <td>

    <table style="width:810px;" id="Row<?php echo $i; ?>" border="1" cellspacing="0">

	  <tr bgcolor="#7a6189"> 

       <td class="Text" style="width:35px;color:#FFFFFF;" align="center"><b>Sn</b></td>

       <td class="Text" style="width:208px;color:#FFFFFF;" align="center" valign="top"><b>Name</b></td>

	   <td class="Text" style="width:145px;color:#FFFFFF;" align="center" valign="top"><b>NA /Yes /No</b></td>

	   <td class="Text" style="width:85px;color:#FFFFFF;" align="center" valign="top"><b>Amount</b></td>

	   <td class="Text" style="width:330px;color:#FFFFFF;" align="center" valign="top"><b>Remark</b></td>

     </tr>

	</table>

   </td>

  </tr>
<?php if($_REQUEST['st']=='N'){ ?>  
<?php for($i=1; $i<=40; $i++){ ?>  
  <tr>
   <td style="width:30px;display:<?php if($i==1){echo 'block';}else{echo 'none';}?>;" id="img<?php echo $i; ?>" align="center" align="center">
   <img src="images/Addnew.png" border="0" id="addImg<?php echo $i; ?>" style="display:<?php if($i==1){echo 'block';}else{echo 'none';}?>;" id="img<?php echo $i; ?>" onClick="ShowRowPrtis(<?php echo $i; ?>)"/>

   <img src="images/Minusnew.png" id="minusImg<?php echo $i; ?>" style="display:none;" border="0" onClick="HideRowPrtis(<?php echo $i; ?>)"/>

   </td>

   <td>

    <table style="width:810px;display:none;" id="Row<?php echo $i; ?>" border="1" cellspacing="0">

	  <tr bgcolor="#FFFFFF"> 

       <td class="Text" style="width:45px;" align="center"><?php echo $i; ?></td>

       <td class="Text" style="width:200px;" align="" valign="top">

	   <input style="width:195px;" id="Prtis<?php echo $i; ?>" name="Prtis<?php echo $i; ?>" value="<?php echo $res['Prtis'.$i]; ?>" maxlength="45"/>

	   </td>

	   <td class="Text" style="width:170px;" align="center" valign="top">

	    NA<input type="checkbox" id="Prtis_A<?php echo $i; ?>" onClick="FunPrtis(<?php echo $i; ?>,'A')" <?php if($res['Prtis_'.$i]=='A'){echo 'checked';} ?>/>

	    Yes<input type="checkbox" id="Prtis_Y<?php echo $i; ?>" onClick="FunPrtis(<?php echo $i; ?>,'Y')" <?php if($res['Prtis_'.$i]=='Y'){echo 'checked';} ?>/>

		No<input type="checkbox" id="Prtis_N<?php echo $i; ?>" onClick="FunPrtis(<?php echo $i; ?>,'N')" <?php if($res['Prtis_'.$i]=='N'){echo 'checked';} ?>/>

		<input type="hidden" id="Prtis_YN<?php echo $i; ?>" name="Prtis_YN<?php echo $i; ?>" value="<?php echo $res['Prtis_'.$i]; ?>" />

	   </td>

	   <td class="Text" style="width:80px;" align="center" valign="top">

	    <input style="width:80px;background-color:#EAEAEA;text-align:right;" id="Prtis_Amt<?php echo $i; ?>" name="Prtis_Amt<?php echo $i; ?>" value="<?php if($res['Prtis_'.$i.'Amt']>0){echo intval($res['Prtis_'.$i.'Amt']);}else{echo 0;} ?>" maxlength="10" readonly/>

	   </td>

	   <td class="Text" style="width:323px;" align="center" valign="top">

	    <input id="Prtis_Remark<?php echo $i; ?>" name="Prtis_Remark<?php echo $i; ?>" style="width:319px;" value="<?php echo $res['Prtis_'.$i.'Remark']; ?>" maxlength="90" />

	   </td>

     </tr>

	</table>

   </td>

  </tr>

<?php } ?>

<?php } elseif($_REQUEST['st']=='Y'){ ?>  
<?php for($i=1; $i<=40; $i++) { ?>  

  <tr>

   <td style="width:30px;display:<?php if($res['Prtis_'.$i]!=''){echo 'block';}else{echo 'none';}?>;" id="img<?php echo $i; ?>" align="center" align="center">

   <img src="images/Addnew.png" border="0" id="addImg<?php echo $i; ?>" style="display:<?php if($res['Prtis_'.$i]!=''){echo 'none';}else{echo 'block';}?>;" id="img<?php echo $i; ?>" onClick="ShowRowPrtis(<?php echo $i; ?>)"/>

   <img src="images/Minusnew.png" id="minusImg<?php echo $i; ?>" style="display:none;" border="0" onClick="HideRowPrtis(<?php echo $i; ?>)"/>

   </td>

   <td>

    <table style="width:810px;display:<?php if($res['Prtis_'.$i]!=''){echo 'block';}else{echo 'none';}?>;" id="Row<?php echo $i; ?>" border="1" cellspacing="0">

	  <tr bgcolor="#FFFFFF"> 

       <td class="Text" style="width:45px;" align="center"><?php echo $i; ?></td>

       <td class="Text" style="width:200px;" align="" valign="top">

	   <input style="width:200px;" id="Prtis<?php echo $i; ?>" name="Prtis<?php echo $i; ?>" value="<?php echo $res['Prtis'.$i]; ?>" maxlength="45"/>

	   </td>

	   <td class="Text" style="width:170px;" align="center" valign="top">

	     NA<input type="checkbox" id="Prtis_A<?php echo $i; ?>" onClick="FunPrtis(<?php echo $i; ?>,'A')" <?php if($res['Prtis_'.$i]=='A'){echo 'checked';} ?>/>

	    Yes<input type="checkbox" id="Prtis_Y<?php echo $i; ?>" onClick="FunPrtis(<?php echo $i; ?>,'Y')" <?php if($res['Prtis_'.$i]=='Y'){echo 'checked';} ?>/>

		No<input type="checkbox" id="Prtis_N<?php echo $i; ?>" onClick="FunPrtis(<?php echo $i; ?>,'N')" <?php if($res['Prtis_'.$i]=='N'){echo 'checked';} ?>/>

		<input type="hidden" id="Prtis_YN<?php echo $i; ?>" name="Prtis_YN<?php echo $i; ?>" value="<?php echo $res['Prtis_'.$i]; ?>" />

	   </td>

	   <td class="Text" style="width:80px;" align="center" valign="top">

	    <input style="width:80px;background-color:#EAEAEA;text-align:right;" id="Prtis_Amt<?php echo $i; ?>" name="Prtis_Amt<?php echo $i; ?>" value="<?php echo $res['Prtis_'.$i.'Amt']; ?>" maxlength="10" readonly/>

	   </td>

	   <td class="Text" style="width:323px;" align="center" valign="top">

	    <input id="Prtis_Remark<?php echo $i; ?>" name="Prtis_Remark<?php echo $i; ?>" style="width:319px;" value="<?php echo $res['Prtis_'.$i.'Remark']; ?>" maxlength="90" />

	   </td>

     </tr>

	</table>

   </td>

  </tr>

<?php } ?>  
<?php } ?>
  <tr>

   <td style="width:30px;" align="center" align="center"></td>

   <td>

    <table style="width:810px;" border="1" cellspacing="0">

	  <tr bgcolor="#FFFFFF"> 

       <td colspan="2" class="Text" style="width:247px;">&nbsp;<b>Any Other Remark</b></td>

	   <td colspan="3" class="Text" style="width:518px;" align="center" valign="top">

	    <input id="Oth_Remark" name="Oth_Remark" style="width:534px;" value="<?php echo $res['Oth_Remark']; ?>" maxlength="190" />

	   </td> 

     </tr>

	</table>

   </td>

  </tr>

  <tr>

  <td>&nbsp;</td>

 <td colspan="5" align="Right" class="fontButton">

 <table>

    <tr>

	  <td><font size="3" color="#D7FFD7"><b><?php echo $msg.'&nbsp;'; ?></b></font>&nbsp;
	  
	  <?php if($rowNoc>0){ ?>
      <font color="#FFFFA6">Save Date:</font>&nbsp;
      <font style="color:#FFF;"><?=date("d-m-Y",strtotime($res['NocSubmitDate']));?></font><?php } ?>
      &nbsp;&nbsp;
	  
	  </td>

	  <td><font size="3" color="#D7FFD7"><?php if($resSE['HR_LogNocConf']=='Y'){ echo "HR Approved"; } ?>&nbsp;</td>

      <td><?php if($resSE['Log_NOC']=='N') { // AND date("Y-m-d")>=$resSE['HR_Date'] ?>

	  <input type="submit" id="submitRepNoc" name="submitRepNoc" value="save" style="background-color:#FFCAFF;display:block;width:80px;"/><?php } ?></td>

	  <?php if($resE['DepartmentId']==6 AND $resSE['Log_NOC']=='Y' AND $resSE['HR_LogNocConf']=='N'){ ?>

      <td><input type="button" id="ResendRep" value="send back" style="background-color:#FFCAFF;display:block;width:80px;" onClick="FunResendRep(<?php echo $_REQUEST['si']; ?>)"/></td>

	<td><input type="button" id="ApproveRep" value="approved" style="background-color:#FFCAFF;display:block;width:80px;" onClick="FunApprovedRep(<?php echo $_REQUEST['si']; ?>)"/></td>

	  <?php } ?>

     <td><input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='SepLogClearForm.php?act=act&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&si=<?php echo $_REQUEST['si']; ?>&st=<?php echo $_REQUEST['st']; ?>'"/></td>

	</tr>

  </table>

 </td>

 </tr> 

 </table>

</td>

 </tr>

</table>

</form>

<?php } ?>	  

  </td>

</tr>

</table>

</center>

</body>

</html>



