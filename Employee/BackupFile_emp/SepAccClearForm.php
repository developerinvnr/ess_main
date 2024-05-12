<?php require_once('../AdminUser/config/config.php'); 

if(isset($_POST['saveAccNoc']))
{ 
  $search =  '!"#$%&/\'-:_' ; $search = str_split($search);
  $AccECP_R=str_replace($search, "", $_POST['AccECP_Remark']); $AccIPS_R=str_replace($search, "", $_POST['AccIPS_Remark']);
  $AccAMS_R=str_replace($search, "", $_POST['AccAMS_Remark']); $AccSAR_R=str_replace($search, "", $_POST['AccSAR_Remark']);
  $AccWGR_R=str_replace($search, "", $_POST['AccWGR_Remark']); $AccSB_R=str_replace($search, "", $_POST['AccSB_Remark']);
  $AccTDSA_R=str_replace($search, "", $_POST['AccTDSA_Remark']); 
  $AOTxt8=''; $AOTxt9=''; $AOTxt10=''; $AOTxt11=''; $AOTxt12=''; $AOTxt13=''; $AOTxt14=''; $AOTxt15=''; 
  $AOR8=''; $AOR9=''; $AOR10=''; $AOR11=''; $AOR12=''; $AOR13=''; $AOR14=''; $AOR15=''; 
  
  if($_POST['AccAO_Txt8']!=''){$AOTxt8=str_replace($search, "", $_POST['AccAO_Txt8']);}
  if($_POST['AccAO_Txt9']!=''){$AOTxt9=str_replace($search, "", $_POST['AccAO_Txt9']);}
  if($_POST['AccAO_Txt10']!=''){$AOTxt10=str_replace($search, "", $_POST['AccAO_Txt10']);}
  if($_POST['AccAO_Txt11']!=''){$AOTxt11=str_replace($search, "", $_POST['AccAO_Txt11']);}
  if($_POST['AccAO_Txt12']!=''){$AOTxt12=str_replace($search, "", $_POST['AccAO_Txt12']);}
  if($_POST['AccAO_Txt13']!=''){$AOTxt13=str_replace($search, "", $_POST['AccAO_Txt13']);}
  if($_POST['AccAO_Txt14']!=''){$AOTxt14=str_replace($search, "", $_POST['AccAO_Txt14']);}
  if($_POST['AccAO_Txt15']!=''){$AOTxt15=str_replace($search, "", $_POST['AccAO_Txt15']);}
  if($_POST['AccAO_Remark8']!=''){$AOR8=str_replace($search, "", $_POST['AccAO_Remark8']);}
  if($_POST['AccAO_Remark9']!=''){$AOR9=str_replace($search, "", $_POST['AccAO_Remark9']);}
  if($_POST['AccAO_Remark10']!=''){$AOR10=str_replace($search, "", $_POST['AccAO_Remark10']);}
  if($_POST['AccAO_Remark11']!=''){$AOR11=str_replace($search, "", $_POST['AccAO_Remark11']);}
  if($_POST['AccAO_Remark12']!=''){$AOR12=str_replace($search, "", $_POST['AccAO_Remark12']);}
  if($_POST['AccAO_Remark13']!=''){$AOR13=str_replace($search, "", $_POST['AccAO_Remark13']);}
  if($_POST['AccAO_Remark14']!=''){$AOR14=str_replace($search, "", $_POST['AccAO_Remark14']);}
  if($_POST['AccAO_Remark15']!=''){$AOR15=str_replace($search, "", $_POST['AccAO_Remark15']);}
  $AccROth=''; if($_POST['AccOth_Remark']!=''){$AccROth=str_replace($search, "", $_POST['AccOth_Remark']);}
 
  $sqlNoc=mysql_query("select NocAccId from hrm_employee_separation_nocacc where EmpSepId=".$_POST['si'], $con); $rowNoc=mysql_num_rows($sqlNoc); 
  if($rowNoc>0) 
  { $sqlIns=mysql_query("update hrm_employee_separation_nocacc set NocSubmAccDate='".date("Y-m-d")."', AccECP='".$_POST['AccECP_YN']."', AccECP_Amt='".$_POST['AccECP_Amt']."', AccECP_Amt2='".$_POST['AccECP_Amt2']."', AccECP_Remark='".$AccECP_R."', AccIPS='".$_POST['AccIPS_YN']."', AccIPS_Amt='".$_POST['AccIPS_Amt']."', AccIPS_Amt2='".$_POST['AccIPS_Amt2']."', AccIPS_Remark='".$AccIPS_R."', AccAMS='".$_POST['AccAMS_YN']."', AccAMS_Amt='".$_POST['AccAMS_Amt']."', AccAMS_Amt2='".$_POST['AccAMS_Amt2']."', AccAMS_Remark='".$AccAMS_R."', AccSAR='".$_POST['AccSAR_YN']."', AccSAR_Amt='".$_POST['AccSAR_Amt']."', AccSAR_Amt2='".$_POST['AccSAR_Amt2']."', AccSAR_Remark='".$AccSAR_R."', AccWGR='".$_POST['AccWGR_YN']."', AccWGR_Amt='".$_POST['AccWGR_Amt']."', AccWGR_Amt2='".$_POST['AccWGR_Amt2']."', AccWGR_Remark='".$AccWGR_R."', AccSB='".$_POST['AccSB_YN']."', AccSB_Amt='".$_POST['AccSB_Amt']."', AccSB_Amt2='".$_POST['AccSB_Amt2']."', AccSB_Remark='".$AccSB_R."', AccTDSA='".$_POST['AccTDSA_YN']."', AccTDSA_Amt='".$_POST['AccTDSA_Amt']."', AccTDSA_Amt2='".$_POST['AccTDSA_Amt2']."', AccTDSA_Remark='".$AccTDSA_R."', AccAO8='".$_POST['AccAO_YN8']."', AccAO_Txt8='".$AOTxt8."', AccAO_Amt8='".$_POST['AccAO_Amt8']."', AccAO2_Amt8='".$_POST['AccAO2_Amt8']."', AccAO_Remark8='".$AOR8."', AccAO9='".$_POST['AccAO_YN9']."', AccAO_Txt9='".$AOTxt9."', AccAO_Amt9='".$_POST['AccAO_Amt9']."', AccAO2_Amt9='".$_POST['AccAO2_Amt9']."', AccAO_Remark9='".$AOR9."', AccAO10='".$_POST['AccAO_YN10']."', AccAO_Txt10='".$AOTxt10."', AccAO_Amt10='".$_POST['AccAO_Amt10']."', AccAO2_Amt10='".$_POST['AccAO2_Amt10']."', AccAO_Remark10='".$AOR10."', AccAO11='".$_POST['AccAO_YN11']."', AccAO_Txt11='".$AOTxt11."', AccAO_Amt11='".$_POST['AccAO_Amt11']."', AccAO2_Amt11='".$_POST['AccAO2_Amt11']."', AccAO_Remark11='".$AOR11."', AccAO12='".$_POST['AccAO_YN12']."', AccAO_Txt12='".$AOTxt12."', AccAO_Amt12='".$_POST['AccAO_Amt12']."', AccAO2_Amt12='".$_POST['AccAO2_Amt12']."', AccAO_Remark12='".$AOR12."', AccAO13='".$_POST['AccAO_YN13']."', AccAO_Txt13='".$AOTxt13."', AccAO_Amt13='".$_POST['AccAO_Amt13']."', AccAO2_Amt13='".$_POST['AccAO2_Amt13']."', AccAO_Remark13='".$AOR13."', AccAO14='".$_POST['AccAO_YN14']."', AccAO_Txt14='".$AOTxt14."', AccAO_Amt14='".$_POST['AccAO_Amt14']."', AccAO2_Amt14='".$_POST['AccAO2_Amt14']."', AccAO_Remark14='".$AOR14."', AccAO15='".$_POST['AccAO_YN15']."', AccAO_Txt15='".$AOTxt15."', AccAO_Amt15='".$_POST['AccAO_Amt15']."', AccAO2_Amt15='".$_POST['AccAO2_Amt15']."', AccAO_Remark15='".$AOR15."', TotAmt='".$_POST['TotAmt']."', TotAmt2='".$_POST['TotAmt2']."', TotAccAmt='".$_POST['TotAccAmt']."', AccId=".$_POST['ei'].", AccOth_Remark='".$AccROth."' where EmpSepId=".$_POST['si'], $con); }
  else
  { $sqlIns=mysql_query("insert into hrm_employee_separation_nocacc(EmpSepId, NocSubmAccDate, AccECP, AccECP_Amt, AccECP_Amt2, AccECP_Remark, AccIPS, AccIPS_Amt, AccIPS_Amt2, AccIPS_Remark, AccAMS, AccAMS_Amt, AccAMS_Amt2, AccAMS_Remark, AccSAR, AccSAR_Amt, AccSAR_Amt2, AccSAR_Remark, AccWGR, AccWGR_Amt, AccWGR_Amt2, AccWGR_Remark, AccSB, AccSB_Amt, AccSB_Amt2, AccSB_Remark, AccTDSA, AccTDSA_Amt, AccTDSA_Amt2, AccTDSA_Remark, AccAO8, AccAO_Txt8, AccAO_Amt8, AccAO2_Amt8, AccAO_Remark8, AccAO9, AccAO_Txt9, AccAO_Amt9, AccAO2_Amt9, AccAO_Remark9, AccAO10, AccAO_Txt10, AccAO_Amt10, AccAO2_Amt10, AccAO_Remark10, AccAO11, AccAO_Txt11, AccAO_Amt11, AccAO2_Amt11, AccAO_Remark11, AccAO12, AccAO_Txt12, AccAO_Amt12, AccAO2_Amt12, AccAO_Remark12, AccAO13, AccAO_Txt13, AccAO_Amt13, AccAO2_Amt13, AccAO_Remark13, AccAO14, AccAO_Txt14, AccAO_Amt14, AccAO2_Amt14, AccAO_Remark14, AccAO15, AccAO_Txt15, AccAO_Amt15, AccAO2_Amt15, AccAO_Remark15, TotAmt, TotAmt2, TotAccAmt, AccId, AccOth_Remark) values(".$_POST['si'].", '".date("Y-m-d")."', '".$_POST['AccECP_YN']."', '".$_POST['AccECP_Amt']."', '".$_POST['AccECP_Amt2']."', '".$AccECP_R."', '".$_POST['AccIPS_YN']."', '".$_POST['AccIPS_Amt']."', '".$_POST['AccIPS_Amt2']."', '".$AccIPS_R."', '".$_POST['AccAMS_YN']."', '".$_POST['AccAMS_Amt']."', '".$_POST['AccAMS_Amt2']."', '".$AccAMS_R."', '".$_POST['AccSAR_YN']."', '".$_POST['AccSAR_Amt']."', '".$_POST['AccSAR_Amt2']."', '".$AccSAR_R."', '".$_POST['AccWGR_YN']."', '".$_POST['AccWGR_Amt']."', '".$_POST['AccWGR_Amt2']."', '".$AccWGR_R."', '".$_POST['AccSB_YN']."', '".$_POST['AccSB_Amt']."', '".$_POST['AccSB_Amt2']."', '".$AccSB_R."', '".$_POST['AccTDSA_YN']."', '".$_POST['AccTDSA_Amt']."', '".$_POST['AccTDSA_Amt2']."', '".$AccTDSA_R."', '".$_POST['AccAO_YN8']."', '".$AOTxt8."', '".$_POST['AccAO_Amt8']."', '".$_POST['AccAO2_Amt8']."', '".$AOR8."', '".$_POST['AccAO_YN9']."', '".$AOTxt9."', '".$_POST['AccAO_Amt9']."', '".$_POST['AccAO2_Amt9']."', '".$AOR9."', '".$_POST['AccAO_YN10']."', '".$AOTxt10."', '".$_POST['AccAO_Amt10']."', '".$_POST['AccAO2_Amt10']."', '".$AOR10."', '".$_POST['AccAO_YN11']."', '".$AOTxt11."', '".$_POST['AccAO_Amt11']."', '".$_POST['AccAO2_Amt11']."', '".$AOR11."', '".$_POST['AccAO_YN12']."', '".$AOTxt12."', '".$_POST['AccAO_Amt12']."', '".$_POST['AccAO2_Amt12']."', '".$AOR12."', '".$_POST['AccAO_YN13']."', '".$AOTxt13."', '".$_POST['AccAO_Amt13']."', '".$_POST['AccAO2_Amt13']."', '".$AOR13."', '".$_POST['AccAO_YN14']."', '".$AOTxt14."', '".$_POST['AccAO_Amt14']."', '".$_POST['AccAO2_Amt14']."', '".$AOR14."', '".$_POST['AccAO_YN15']."', '".$AOTxt15."', '".$_POST['AccAO_Amt15']."', '".$_POST['AccAO2_Amt15']."', '".$AOR15."', '".$_POST['TotAmt']."', '".$_POST['TotAmt2']."', '".$_POST['TotAccAmt']."', ".$_POST['ei'].", '".$AccROth."')", $con); }
  
  if($sqlIns)
  { $sqlUp=mysql_query("update hrm_employee_separation set Acc_Earn=".$_POST['TotAmt'].", Acc_Deduct=".$_POST['TotAmt2']." where EmpSepId=".$_POST['si'], $con);
    $msgAcc='<b>data saved successfully.</b>';
  } 
}  

if(isset($_POST['submitAccNoc']))
{ 
  $search =  '!"#$%&/\'-:_' ; $search = str_split($search);
  $AccECP_R=str_replace($search, "", $_POST['AccECP_Remark']); $AccIPS_R=str_replace($search, "", $_POST['AccIPS_Remark']);
  $AccAMS_R=str_replace($search, "", $_POST['AccAMS_Remark']); $AccSAR_R=str_replace($search, "", $_POST['AccSAR_Remark']);
  $AccWGR_R=str_replace($search, "", $_POST['AccWGR_Remark']); $AccSB_R=str_replace($search, "", $_POST['AccSB_Remark']);
  $AccTDSA_R=str_replace($search, "", $_POST['AccTDSA_Remark']); 
  $AOTxt8=''; $AOTxt9=''; $AOTxt10=''; $AOTxt11=''; $AOTxt12=''; $AOTxt13=''; $AOTxt14=''; $AOTxt15=''; 
  $AOR8=''; $AOR9=''; $AOR10=''; $AOR11=''; $AOR12=''; $AOR13=''; $AOR14=''; $AOR15=''; 
  
  if($_POST['AccAO_Txt8']!=''){$AOTxt8=str_replace($search, "", $_POST['AccAO_Txt8']);}
  if($_POST['AccAO_Txt9']!=''){$AOTxt9=str_replace($search, "", $_POST['AccAO_Txt9']);}
  if($_POST['AccAO_Txt10']!=''){$AOTxt10=str_replace($search, "", $_POST['AccAO_Txt10']);}
  if($_POST['AccAO_Txt11']!=''){$AOTxt11=str_replace($search, "", $_POST['AccAO_Txt11']);}
  if($_POST['AccAO_Txt12']!=''){$AOTxt12=str_replace($search, "", $_POST['AccAO_Txt12']);}
  if($_POST['AccAO_Txt13']!=''){$AOTxt13=str_replace($search, "", $_POST['AccAO_Txt13']);}
  if($_POST['AccAO_Txt14']!=''){$AOTxt14=str_replace($search, "", $_POST['AccAO_Txt14']);}
  if($_POST['AccAO_Txt15']!=''){$AOTxt15=str_replace($search, "", $_POST['AccAO_Txt15']);}
  if($_POST['AccAO_Remark8']!=''){$AOR8=str_replace($search, "", $_POST['AccAO_Remark8']);}
  if($_POST['AccAO_Remark9']!=''){$AOR9=str_replace($search, "", $_POST['AccAO_Remark9']);}
  if($_POST['AccAO_Remark10']!=''){$AOR10=str_replace($search, "", $_POST['AccAO_Remark10']);}
  if($_POST['AccAO_Remark11']!=''){$AOR11=str_replace($search, "", $_POST['AccAO_Remark11']);}
  if($_POST['AccAO_Remark12']!=''){$AOR12=str_replace($search, "", $_POST['AccAO_Remark12']);}
  if($_POST['AccAO_Remark13']!=''){$AOR13=str_replace($search, "", $_POST['AccAO_Remark13']);}
  if($_POST['AccAO_Remark14']!=''){$AOR14=str_replace($search, "", $_POST['AccAO_Remark14']);}
  if($_POST['AccAO_Remark15']!=''){$AOR15=str_replace($search, "", $_POST['AccAO_Remark15']);}
  $AccROth=''; if($_POST['AccOth_Remark']!=''){$AccROth=str_replace($search, "", $_POST['AccOth_Remark']);}
 
  $sqlNoc=mysql_query("select NocAccId from hrm_employee_separation_nocacc where EmpSepId=".$_POST['si'], $con); $rowNoc=mysql_num_rows($sqlNoc); 
  if($rowNoc>0) 
  { $sqlIns=mysql_query("update hrm_employee_separation_nocacc set NocSubmAccDate='".date("Y-m-d")."', AccECP='".$_POST['AccECP_YN']."', AccECP_Amt='".$_POST['AccECP_Amt']."', AccECP_Amt2='".$_POST['AccECP_Amt2']."', AccECP_Remark='".$AccECP_R."', AccIPS='".$_POST['AccIPS_YN']."', AccIPS_Amt='".$_POST['AccIPS_Amt']."', AccIPS_Amt2='".$_POST['AccIPS_Amt2']."', AccIPS_Remark='".$AccIPS_R."', AccAMS='".$_POST['AccAMS_YN']."', AccAMS_Amt='".$_POST['AccAMS_Amt']."', AccAMS_Amt2='".$_POST['AccAMS_Amt2']."', AccAMS_Remark='".$AccAMS_R."', AccSAR='".$_POST['AccSAR_YN']."', AccSAR_Amt='".$_POST['AccSAR_Amt']."', AccSAR_Amt2='".$_POST['AccSAR_Amt2']."', AccSAR_Remark='".$AccSAR_R."', AccWGR='".$_POST['AccWGR_YN']."', AccWGR_Amt='".$_POST['AccWGR_Amt']."', AccWGR_Amt2='".$_POST['AccWGR_Amt2']."', AccWGR_Remark='".$AccWGR_R."', AccSB='".$_POST['AccSB_YN']."', AccSB_Amt='".$_POST['AccSB_Amt']."', AccSB_Amt2='".$_POST['AccSB_Amt2']."', AccSB_Remark='".$AccSB_R."', AccTDSA='".$_POST['AccTDSA_YN']."', AccTDSA_Amt='".$_POST['AccTDSA_Amt']."', AccTDSA_Amt2='".$_POST['AccTDSA_Amt2']."', AccTDSA_Remark='".$AccTDSA_R."', AccAO8='".$_POST['AccAO_YN8']."', AccAO_Txt8='".$AOTxt8."', AccAO_Amt8='".$_POST['AccAO_Amt8']."', AccAO2_Amt8='".$_POST['AccAO2_Amt8']."', AccAO_Remark8='".$AOR8."', AccAO9='".$_POST['AccAO_YN9']."', AccAO_Txt9='".$AOTxt9."', AccAO_Amt9='".$_POST['AccAO_Amt9']."', AccAO2_Amt9='".$_POST['AccAO2_Amt9']."', AccAO_Remark9='".$AOR9."', AccAO10='".$_POST['AccAO_YN10']."', AccAO_Txt10='".$AOTxt10."', AccAO_Amt10='".$_POST['AccAO_Amt10']."', AccAO2_Amt10='".$_POST['AccAO2_Amt10']."', AccAO_Remark10='".$AOR10."', AccAO11='".$_POST['AccAO_YN11']."', AccAO_Txt11='".$AOTxt11."', AccAO_Amt11='".$_POST['AccAO_Amt11']."', AccAO2_Amt11='".$_POST['AccAO2_Amt11']."', AccAO_Remark11='".$AOR11."', AccAO12='".$_POST['AccAO_YN12']."', AccAO_Txt12='".$AOTxt12."', AccAO_Amt12='".$_POST['AccAO_Amt12']."', AccAO2_Amt12='".$_POST['AccAO2_Amt12']."', AccAO_Remark12='".$AOR12."', AccAO13='".$_POST['AccAO_YN13']."', AccAO_Txt13='".$AOTxt13."', AccAO_Amt13='".$_POST['AccAO_Amt13']."', AccAO2_Amt13='".$_POST['AccAO2_Amt13']."', AccAO_Remark13='".$AOR13."', AccAO14='".$_POST['AccAO_YN14']."', AccAO_Txt14='".$AOTxt14."', AccAO_Amt14='".$_POST['AccAO_Amt14']."', AccAO2_Amt14='".$_POST['AccAO2_Amt14']."', AccAO_Remark14='".$AOR14."', AccAO15='".$_POST['AccAO_YN15']."', AccAO_Txt15='".$AOTxt15."', AccAO_Amt15='".$_POST['AccAO_Amt15']."', AccAO2_Amt15='".$_POST['AccAO2_Amt15']."', AccAO_Remark15='".$AOR15."', TotAmt='".$_POST['TotAmt']."', TotAmt2='".$_POST['TotAmt2']."', TotAccAmt='".$_POST['TotAccAmt']."', AccId=".$_POST['ei'].", AccOth_Remark='".$AccROth."' where EmpSepId=".$_POST['si'], $con); }
  else
  { $sqlIns=mysql_query("insert into hrm_employee_separation_nocacc(EmpSepId, NocSubmAccDate, AccECP, AccECP_Amt, AccECP_Amt2, AccECP_Remark, AccIPS, AccIPS_Amt, AccIPS_Amt2, AccIPS_Remark, AccAMS, AccAMS_Amt, AccAMS_Amt2, AccAMS_Remark, AccSAR, AccSAR_Amt, AccSAR_Amt2, AccSAR_Remark, AccWGR, AccWGR_Amt, AccWGR_Amt2, AccWGR_Remark, AccSB, AccSB_Amt, AccSB_Amt2, AccSB_Remark, AccTDSA, AccTDSA_Amt, AccTDSA_Amt2, AccTDSA_Remark, AccAO8, AccAO_Txt8, AccAO_Amt8, AccAO2_Amt8, AccAO_Remark8, AccAO9, AccAO_Txt9, AccAO_Amt9, AccAO2_Amt9, AccAO_Remark9, AccAO10, AccAO_Txt10, AccAO_Amt10, AccAO2_Amt10, AccAO_Remark10, AccAO11, AccAO_Txt11, AccAO_Amt11, AccAO2_Amt11, AccAO_Remark11, AccAO12, AccAO_Txt12, AccAO_Amt12, AccAO2_Amt12, AccAO_Remark12, AccAO13, AccAO_Txt13, AccAO_Amt13, AccAO2_Amt13, AccAO_Remark13, AccAO14, AccAO_Txt14, AccAO_Amt14, AccAO2_Amt14, AccAO_Remark14, AccAO15, AccAO_Txt15, AccAO_Amt15, AccAO2_Amt15, AccAO_Remark15, TotAmt, TotAmt2, TotAccAmt, AccId, AccOth_Remark) values(".$_POST['si'].", '".date("Y-m-d")."', '".$_POST['AccECP_YN']."', '".$_POST['AccECP_Amt']."', '".$_POST['AccECP_Amt2']."', '".$AccECP_R."', '".$_POST['AccIPS_YN']."', '".$_POST['AccIPS_Amt']."', '".$_POST['AccIPS_Amt2']."', '".$AccIPS_R."', '".$_POST['AccAMS_YN']."', '".$_POST['AccAMS_Amt']."', '".$_POST['AccAMS_Amt2']."', '".$AccAMS_R."', '".$_POST['AccSAR_YN']."', '".$_POST['AccSAR_Amt']."', '".$_POST['AccSAR_Amt2']."', '".$AccSAR_R."', '".$_POST['AccWGR_YN']."', '".$_POST['AccWGR_Amt']."', '".$_POST['AccWGR_Amt2']."', '".$AccWGR_R."', '".$_POST['AccSB_YN']."', '".$_POST['AccSB_Amt']."', '".$_POST['AccSB_Amt2']."', '".$AccSB_R."', '".$_POST['AccTDSA_YN']."', '".$_POST['AccTDSA_Amt']."', '".$_POST['AccTDSA_Amt2']."', '".$AccTDSA_R."', '".$_POST['AccAO_YN8']."', '".$AOTxt8."', '".$_POST['AccAO_Amt8']."', '".$_POST['AccAO2_Amt8']."', '".$AOR8."', '".$_POST['AccAO_YN9']."', '".$AOTxt9."', '".$_POST['AccAO_Amt9']."', '".$_POST['AccAO2_Amt9']."', '".$AOR9."', '".$_POST['AccAO_YN10']."', '".$AOTxt10."', '".$_POST['AccAO_Amt10']."', '".$_POST['AccAO2_Amt10']."', '".$AOR10."', '".$_POST['AccAO_YN11']."', '".$AOTxt11."', '".$_POST['AccAO_Amt11']."', '".$_POST['AccAO2_Amt11']."', '".$AOR11."', '".$_POST['AccAO_YN12']."', '".$AOTxt12."', '".$_POST['AccAO_Amt12']."', '".$_POST['AccAO2_Amt12']."', '".$AOR12."', '".$_POST['AccAO_YN13']."', '".$AOTxt13."', '".$_POST['AccAO_Amt13']."', '".$_POST['AccAO2_Amt13']."', '".$AOR13."', '".$_POST['AccAO_YN14']."', '".$AOTxt14."', '".$_POST['AccAO_Amt14']."', '".$_POST['AccAO2_Amt14']."', '".$AOR14."', '".$_POST['AccAO_YN15']."', '".$AOTxt15."', '".$_POST['AccAO_Amt15']."', '".$_POST['AccAO2_Amt15']."', '".$AOR15."', '".$_POST['TotAmt']."', '".$_POST['TotAmt2']."', '".$_POST['TotAccAmt']."', ".$_POST['ei'].", '".$AccROth."')", $con); }
  
  if($sqlIns){$sqlUp=mysql_query("update hrm_employee_separation set Acc_NOC='Y', Acc_Earn=".$_POST['TotAmt'].", Acc_Deduct=".$_POST['TotAmt2']." where EmpSepId=".$_POST['si'], $con);}
  if($sqlUp)
  {
   $sqlChk=mysql_query("select EmpSepId from hrm_employee_separation where Acc_NOC='Y' AND IT_NOC='Y' AND Rep_NOC='Y' AND Log_NOC='Y' AND EmpSepId=".$_POST['si'], $con); $rowChk=mysql_num_rows($sqlChk);
   if($rowChk>0){$sqlUp2=mysql_query("update hrm_employee_separation set Department_NOC='Y' where EmpSepId=".$_POST['si'], $con); }
   if($sqlUp2>0)
   {
    /************************************************ HR ***********************************************/ 
    $email_to = 'vspl.hr@vnrseeds.com';
    $email_from = 'admin@vnrseeds.co.in';
    $email_subject = "Account NOC Clearance Submission";
	$email_txt = "Account NOC Clearance Submission";
	$headers = "From: ".$email_from."\r\n";
	$semi_rand = md5(time()); 
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$email_message .="Finance has submitted the accounts statement for ".$_POST['Ename'].". Log on to ESS for further details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
	$email_message .="Thanks & Regards\n";
    $email_message .="HR\n\n";
	$ok = @mail($email_to, $email_subject, $email_message, $headers);
   }
   
   //$sqlHod=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$_POST['HodId'], $con); $resHod=mysql_fetch_assoc($sqlHod); $Hname=$resHod['Fname'].' '.$resHod['Sname'].' '.$resHod['Lname'];
	/************************************************ HOD ***********************************************/ 
/*	  
     if($resHod['EmailId_Vnr']!='')
     {
	 $email_to6 = $resHod['EmailId_Vnr'];
	 $email_from = 'admin@vnrseeds.co.in';
	 $email_subject6 = "";
	 $email_txt = "";
	 $headers = "From: ".$email_from."\r\n";
	 $semi_rand = md5(time()); 
	 $headers .= "MIME-Version: 1.0\r\n";
	 $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	 $email_message6 .= "<b>".$_POST['Ename']."</b> account clearance approve by account department. \n\n";
	 $email_message6 .="Thanks & Regards\n";
     $email_message6 .="HR\n\n";
	 //$ok = @mail($email_to6, $email_subject6, $email_message6, $headers);
	 }
*/	  
	 
   $msgAcc='<b>data submitted successfully.</b>';
  }
}  

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>ESS</title>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style> .Text {font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;} .DIT{width:50px;background-color:#FFFFFF;text-align:center; height:14px;}
.Text2 {font-family:Geneva, Arial, Helvetica, sans-serif;font-size:15px;} .AIT{width:70px;background-color:#FFFFFF;text-align:right; height:14px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.fontButton {background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}</style>
</head>
<body bgcolor="#E0DBE3"><center>
<?php $sqlSE=mysql_query("select * from hrm_employee_separation where EmpSepId=".$_REQUEST['si'], $con); $resSE=mysql_fetch_assoc($sqlSE);
$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resSE['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
?>
<?php if($_REQUEST['act']!='')  { ?>	
<table border="0" style="width:1280px; vertical-align:top;" align="center">
<tr><td class="Text" style="">&nbsp;<b>EC :&nbsp;<?php echo $resE['EmpCode']; ?>/&nbsp;&nbsp;Name :&nbsp;<?php echo $NameE; ?></b></td></tr>
<tr><td style="width:1280px;" valign="top" align="center" valign="top">
<table style="width:1280px;" border="0">
<tr>
<?php /********************* TD-01 ***************************/ ?>
<?php $sqlhr=mysql_query("select * from hrm_employee_separation_nochr where EmpSepId=".$_REQUEST['si'], $con); $hr=mysql_fetch_assoc($sqlhr); 
$SqlCtc = mysql_query("SELECT * FROM hrm_employee_ctc WHERE EmployeeID=".$resSE['EmployeeID']." AND Status='A'", $con);  $ResCtc=mysql_fetch_assoc($SqlCtc);
?> 
<input type="hidden" id="TotHrAmt" name="TotHrAmt" value="<?php echo $hr['TotHRAmt']; ?>" />
<script type="text/javascript" language="javascript">
function FunOkHR(si)
{ var agree=confirm("Are you sure, HR clearance form is ok");
  if(agree)
  { var url = 'SepCheckAcc.php'; var pars = 'act=HrOk&si='+si; var myAjax = new Ajax.Request(
	url, { method: 'post', parameters: pars, onComplete: show_HrResult }); 
  } 
}
function show_HrResult(originalRequest)
{ document.getElementById('HrSpan').innerHTML = originalRequest.responseText; 
  document.getElementById("OkHR").style.display='none'; document.getElementById("ResendHR").style.display='none'; document.getElementById("RefrashHR").style.display='none';}

function FunResendHR(si,ei,ci)
{ var agree=confirm("Are you sure, you want resend form to HR.");
  if(agree)
  { var win=window.open("SepCheckAcc.php?act=HrResend&si="+si,"Form","menubar=no,scrollbars=yes,resizable=no,directories=no,width=400,height=130");
    var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="SepAccClearForm.php?act=act&v=v&ss=vty&cc=Acc@~t~1212&p=value&a=app&true=false&si="+si+"&ei="+ei+"&ci="+ci; } }, 1000);
  }
}
</script>	       	 
<td style="width:640px;" valign="top" align="center">
 <table border="0">
  <tr>
   <td>
    <table border="0">
	<?php ///***///?>
  <tr>
   <td colspan="2" align="right" bgcolor="">
   <table border="0">
   <tr>
   <td colspan="2" style="font-family:Times New Roman;size:14px;color:#008200;" valign="top" align="right">
<b><span id="HrSpan"><?php if($resSE['Acc_HrNOC']=='Y'){echo 'HR clearance ok';}elseif($resSE['Acc_HrNOC']=='R'){echo 'Clearance form send it back to HR';} ?></span></b></td>
   <td>&nbsp;</td>
<?php if($resSE['HR_NOC']=='Y' AND $resSE['Acc_HrNOC']=='N'){ ?> 
   <td><input type="button" id="OkHR" value="ok" style="background-color:#FFCAFF;display:block;width:60px;" onClick="FunOkHR(<?php echo $_REQUEST['si']; ?>)"/></td>
   <td><input type="button" id="ResendHR" value="send back" style="background-color:#FFCAFF;display:block;width:80px;" onClick="FunResendHR(<?php echo $_REQUEST['si'].', '.$_REQUEST['ei'].', '.$_REQUEST['ci']; ?>)"/></td>
   <td><input type="button" name="RefrashHR" id="RefrashHR" value="refresh" style="background-color:#FFCAFF;" onClick="javascript:window.location='SepAccClearForm.php?act=act&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&si=<?php echo $_REQUEST['si']; ?>&ei=<?php echo $_REQUEST['ei']; ?>&ci=<?php echo $_REQUEST['ci']; ?>'"/></td>
<?php } ?>   
  </tr>
  </table>
  </td>
 </tr>	
  <tr>
    <td colspan="2">
     <table border="1"><tr><td class="Text" colspan="2" style="color:#006200;background-color:#DFFFDF;width:640px;" align="center"><b>HR CLEARANCE FORM</b></td></tr></table>
    </td>
  </tr>
  <tr bgcolor="#FFFFDD">
  <td valign="top"><?php //01-Open// ?>
   <table border="1">
    <tr><td colspan="3" class="Text" style="width:360px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Earnings(Rs.)</b></td></tr>
    <tr bgcolor="#7a6189">
	 <td class="Text" style="width:220px;color:#FFFFFF;" align="center"><b>Components</b></td>
	 <td class="Text" style="width:70px;color:#FFFFFF;" align="center"><b>Rate</b></td>
	 <td class="Text" style="width:70px;color:#FFFFFF;" align="center"><b>Amount</b></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Basic</td>
	 <td class="Text" align="center"><input class="AIT" id="BasicRate" name="BasicRate" value="<?php if($ResCtc['BAS']=='Y' AND $ResCtc['STIPEND']=='N') { echo intval($ResCtc['BAS_Value']); } if($ResCtc['BAS']=='N' AND $ResCtc['STIPEND']=='Y') { echo intval($ResCtc['STIPEND_Value']); }?>" readonly/></td>
	 <td class="Text" align="center"><input class="AIT" id="Basic" name="Basic" value="<?php if($hr['Basic']>0){echo intval($hr['Basic']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;HRA</td>
	 <td class="Text" align="center"><input class="AIT" id="HRARate" name="HRARate" value="<?php echo intval($ResCtc['HRA_Value']); ?>" readonly/></td>
	 <td class="Text" align="center"><input class="AIT" id="HRA" name="HRA" value="<?php if($hr['HRA']>0){echo intval($hr['HRA']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Car Allowance</td>
	 <td class="Text" align="center"><input class="AIT" id="CarRate" name="CarRate" value="<?php echo intval($ResCtc['CAR_ALL_Value']); ?>" readonly/></td>
	 <td class="Text" align="center"><input class="AIT" id="Car" name="Car" value="<?php if($hr['CarAllow']>0){echo intval($hr['CarAllow']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	
	<?php if($hr['CONV_Value']!=0){ ?>
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Conveyance Allow.</td>
	 <td class="Text" align="center"><input class="AIT" id="CARate" name="CARate" value="<?php echo intval($ResCtc['CONV_Value']); ?>" readonly/></td>
	 <td class="Text" align="center"><input class="AIT" id="CA" name="CA" value="<?php if($hr['CA']>0){echo intval($hr['CA']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<?php } ?>
	
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Bonus</td>
	 <td class="Text" align="center"><input class="AIT" id="Bonus_MonthRate" name="Bonus_MonthRate" value="<?php echo intval($ResCtc['Bonus_Month']); ?>" readonly/></td>
	 <td class="Text" align="center"><input class="AIT" id="Bonus_Month" name="Bonus_Month" value="<?php if($hr['Bonus_Month']>0){echo intval($hr['Bonus_Month']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Special Allow.</td>
	 <td class="Text" align="center"><input class="AIT" id="SARate" name="SARate" value="<?php echo intval($ResCtc['SPECIAL_ALL_Value']); ?>" readonly/></td>
	 <td class="Text" align="center"><input class="AIT" id="SA" name="SA" value="<?php if($hr['SA']>0){echo intval($hr['SA']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<?php if($hr['DA']!=0){?>
	<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;Daily Allow.</td>
	 <td class="Text" align="center"><input class="AIT" id="DA" name="DA" onChange="funDA()" onBlur="funDA()" value="<?php if($hr['DA']>0){echo intval($hr['DA']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<?php } if($hr['Arrear']!=0){?>
	<tr bgcolor="#FFFFFF"> 
	 <td colspan="2" class="Text">&nbsp;Arrear</td>
	 <td class="Text" align="center"><input class="AIT" id="Arrear" name="Arrear" onChange="funArrear()" onBlur="funArrear()" value="<?php if($hr['Arrear']>0){echo intval($hr['Arrear']);}else{echo 0;} ?>"readonly/></td>
	</tr>
	<?php } if($hr['Incen']!=0){?>
	<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;Incentive</b></td>
	 <td class="Text" align="center"><input class="AIT" id="Incen" name="Incen" onChange="funIncen()" onBlur="funIncen()" value="<?php if($hr['Incen']>0){echo intval($hr['Incen']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<?php } if($hr['PP']!=0){ ?>
        <tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;Performance Pay</td>
         <td class="Text" align="center"><input class="AIT" id="PP" name="PP" value="<?php if($hr['PP']>0){echo intval($hr['PP']);}else{echo 0;} ?>" onChange="funPP()" readonly/></td>
	</tr>
	<?php } if($hr['VA']!=0){ ?>
<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;Variable Adjustment</td>
	 <td class="Text" align="center"><input class="AIT" id="VA" name="VA" value="<?php if($hr['VA']>0){echo intval($hr['VA']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<?php } if($hr['TA']!=0){?>
	<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;Transport Allowance</td>
	 <td class="Text" align="center"><input class="AIT" id="TA" name="TA" value="<?php if($hr['TA']>0){echo intval($hr['TA']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<?php } if($hr['CCA']!=0){?>
	<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;City Compensatory Allow.</td>
	 <td class="Text" align="center"><input class="AIT" id="CCC" name="CCA" value="<?php if($hr['CCA']>0){echo intval($hr['CCA']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<?php } if($hr['RA']!=0){?>
	<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;Relocation Allow.</td>
	 <td class="Text" align="center"><input class="AIT" id="RA" name="RA" value="<?php if($hr['RA']>0){echo intval($hr['RA']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<?php } ?>
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;<b>Monthly Gross :</b></td>
	 <td class="Text" align="center"><input class="AIT" id="GrossRate" name="GrossRate" style="font-weight:bold;" value="<?php echo intval($ResCtc['GrossSalary_PostAnualComponent_Value']); ?>" readonly/></td>
	 <td class="Text" align="center"><input class="AIT" id="Gross" name="Gross" style="font-weight:bold;" value="<?php if($hr['Gross']>0){echo intval($hr['Gross']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;LTA</td>
	 <td class="Text" align="center"><input class="AIT" id="LTA_R" name="LTA_R" value="<?php echo round($ResCtc['LTA_Value']/12); ?>" readonly/></td>
	 <td class="Text" align="center"><input class="AIT" id="LTA" name="LTA" value="<?php if($hr['LTA']>0){echo intval($hr['LTA']);}else{echo 0;} ?>" onChange="funLta()" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Medical Allow.</td>
	 <td class="Text" align="center"><input class="AIT" id="MA_R" name="MA_R" value="<?php echo round($ResCtc['MED_REM_Value']/12); ?>" readonly/></td>
	 <td class="Text" align="center"><input class="AIT" id="MA" name="MA" value="<?php if($hr['MA']>0){echo intval($hr['MA']);}else{echo 0;} ?>" onChange="funMa()" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Child Edu. Allow.</td>
	 <td class="Text" align="center"><input class="AIT" id="CEA_R" name="CEA_R" value="<?php echo round($ResCtc['CHILD_EDU_ALL_Value']/12); ?>" /></td>
	 <td class="Text" align="center"><input class="AIT" id="CEA" name="CEA" value="<?php if($hr['CEA']>0){echo intval($hr['CEA']);}else{echo 0;} ?>" onChange="funCea()" readonly/></td>
	</tr>
	<tr bgcolor="#DDDDFF"><td colspan="3" class="Text">&nbsp;<b>Annual Components </b></b></td></tr>
	<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;Leave Encashment</td>
	 <td class="Text" align="center"><input class="AIT" id="LE" name="LE" value="<?php if($hr['LE']>0){echo intval($hr['LE']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	
	<tr bgcolor="#FFFFFF"> 
	 <td colspan="2" class="Text">&nbsp;Bonus Annual</td>
	 <td class="Text" align="center"><input class="AIT" id="Bonus" name="Bonus" value="<?php if($hr['Bonus']>0){echo intval($hr['Bonus']);}else{echo 0;} ?>" onChange="funBonus()" onBlur="funBonus()" readonly/></td>
	</tr>
	
	<tr bgcolor="#FFFFFF"> 
	 <td colspan="2" class="Text">&nbsp;Bonus Adjustment</td>
	 <td class="Text" align="center"><input class="AIT" id="Bonus_Adjustment" name="Bonus_Adjustment" value="<?php if($hr['Bonus_Adjustment']>0){echo intval($hr['Bonus_Adjustment']);}else{echo 0;} ?>" onChange="funBonusAdj()" onBlur="funBonusAdj()" readonly/></td>
	</tr>
	
	<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;Gratuity</td>
	 <td class="Text" align="center"><input class="AIT" id="Gratuity" name="Gratuity" value="<?php if($hr['Gratuity']>0){echo intval($hr['Gratuity']);}else{echo 0;} ?>" onChange="funGratuity()" onBlur="funGratuity()" readonly/></td>
	</tr>
        <tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;Mediclaim Expense</td>
	 <td class="Text" align="center"><input class="AIT" id="Mediclaim" name="Mediclaim" value="<?php if($hr['Mediclaim']>0){echo intval($hr['Mediclaim']);}else{echo 0;} ?>" onChange="funMediclaim()" onBlur="funMediclaim()" readonly/></td>
	</tr> 
	
	<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;Exgretia</td>
	 <td class="Text" align="center"><input class="AIT" id="Exgredia" name="Exgredia" value="<?php if($hr['Exgredia']>0){echo intval($hr['Exgredia']);}else{echo 0;} ?>" onChange="funExgredia()" onBlur="funExgredia()" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;Notice Pay</td>
	 <td class="Text" align="center"><input class="AIT" id="NoticePay" name="NoticePay" value="<?php if($hr['NoticePay']>0){echo intval($hr['NoticePay']);}else{echo 0;} ?>" onKeyDown="funNoticePay()" onChange="funNoticePay()" onBlur="funNoticePay()" readonly/></td>
	</tr>
	
	<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;<b>Total Earning:</b></b></td>
	 <td class="Text" align="center"><input class="AIT" id="TotEar" name="TotEar" style="font-weight:bold;background-color:#0079F2;color:#FFFFFF;" value="<?php if($hr['TotEar']>0){echo intval($hr['TotEar']);}else{echo 0;} ?>" readonly/></td>
	</tr>
   </table>
  </td><?php //01-Close// ?>
  <td valign="top"><?php //02-Open// ?>
  
   <table border="1" bgcolor="#FFFFFF">
<tr>
<td class="Text" style="width:245px;" align="">&nbsp;Total Salaried Days &nbsp;:</td>
<td style="width:50px;" align="center"><input class="DIT" id="TotWorkDay" name="TotWorkDay" value="<?php if($hr['TotWorkDay']>0){echo $hr['TotWorkDay'];}else{echo 0;} ?>" style="font-weight:bold;" maxlength="2" readonly/></td>
</tr>
<tr>
<td class="Text" style="width:245px;" align="">&nbsp;Actual Notice Period (Days)</td>
<td style="width:50px;" align="center"><input class="DIT" id="NoticeDay" name="NoticeDay" value="26" onChange="FunNoticeDay()" onClick="FunNoticeDay()" maxlength="2" readonly/></td>
</tr>
<tr bgcolor="">
<td class="Text" style="width:245px;" align="">&nbsp;Served Notice Period(Days)</td>
<td style="width:50px;" align="center"><input class="DIT" id="ServedDay" name="ServedDay" onChange="FunServedDay()" onBlur="FunServedDay()" onClick="FunServedDay()" value="<?php if($hr['ServedDay']>0){echo $hr['ServedDay'];}else{echo 0;} ?>" maxlength="2" readonly/></td>
</tr>
<tr>
<td class="Text" style="width:245px;" align="">&nbsp;Recoverable Notice Period(Days)</td>
<td style="width:50px;" align="center"><input class="DIT" id="RecoveryDay" name="RecoveryDay" onChange="FunRecovery()" value="<?php if($hr['RecoveryDay']>0){echo $hr['RecoveryDay'];}else{echo 0;} ?>" maxlength="2" readonly/></td>
</tr>
<tr bgcolor="">
<td class="Text" style="width:245px;" align="">&nbsp;Available EL(Days)</td>
<td style="width:50px;" align="center"><input class="DIT" id="TotEL" name="TotEL" onChange="FunTotEL()" value="<?php if($hr['TotEL']>0){echo $hr['TotEL'];}else{echo 0;} ?>" maxlength="2" readonly/></td>
</tr>
<tr>
<td class="Text" style="width:245px;" align="">&nbsp;Encashable EL(Days)</td>
<td style="width:50px;" align="center"><input class="DIT" id="EnCashEL" name="EnCashEL" onChange="FunEnCash()" onBlur="FunEnCash()" onClick="FunEnCash()" value="<?php if($hr['EnCashEL']>0){echo $hr['EnCashEL'];}else{echo 0;} ?>" maxlength="2" readonly/></td>
</tr>
   </table> 
   <table><tr><td style="height:100px;">&nbsp;</td></tr></table>
   <table border="1">
    <tr><td colspan="2" class="Text" style="width:360px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Deduction(Rs.)</b></td></tr>
    <tr bgcolor="#7a6189">
	 <td class="Text" style="width:225px;color:#FFFFFF;" align="center"><b>Components</b></td>
	 <td class="Text" style="width:70px;color:#FFFFFF;" align="center"><b>Amounts</b></td>
	</tr>
	 <tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;PF</td>
	 <td class="Text" align="center"><input class="AIT" id="PF" name="PF" value="<?php if($hr['PF']>0){echo intval($hr['PF']);}else{echo 0;} ?>" readonly/></td>
	</tr>
        <tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;ESIC</td>
	 <td class="Text" align="center"><input class="AIT" id="ESIC" name="ESIC" value="<?php if($hr['ESIC']>0){echo intval($hr['ESIC']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	 <tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Arrear For ESIC</td>
	 <td class="Text" align="center"><input class="AIT" id="ARRESIC" name="ARRESIC" value="<?php if($hr['ARR_ESIC']>0){echo intval($hr['ARR_ESIC']);}else{echo 0;} ?>" readonly/> </td>
	</tr>
	
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Recovery Towards Service Bond</td>
	 <td class="Text" align="center"><input class="AIT" id="RTSB" name="RTSB" value="<?php if($hr['RTSB']>0){echo intval($hr['RTSB']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<?php if($hr['NPR']!=0){ ?>
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Notice Period Recovery</td>
	 <td class="Text" align="center"><input class="AIT" id="NPR" name="NPR" value="<?php if($hr['NPR']>0){echo intval($hr['NPR']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<?php } if($hr['VolC']!=0){ ?>
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Voluntary Contribution</td>
	 <td class="Text" align="center"><input class="AIT" id="VolC" name="VolC" value="<?php if($hr['VolC']>0){echo intval($hr['VolC']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<?php } if($hr['RA_allow']!=0){ ?>
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Relocation Allowance</td>
	 <td class="Text" align="center"><input class="AIT" id="RA_allow" name="RA_allow" value="<?php if($hr['RA_allow']>0){echo intval($hr['RA_allow']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<?php } if($hr['AdminIC_Amt']!=0){ ?>
       <tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;ID Card Submitted</td>
	 <td class="Text" align="center"><input class="AIT" id="NPR" name="NPR" value="<?php if($hr['AdminIC_Amt']>0){echo intval($hr['AdminIC_Amt']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<?php } if($hr['AdminVC_Amt']!=0){ ?>
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Visiting Cards Submitted</td>
	 <td class="Text" align="center"><input class="AIT" id="NPR" name="NPR" value="<?php if($hr['AdminVC_Amt']>0){echo intval($hr['AdminVC_Amt']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<?php } if($hr['CV_Amt']!=0){ ?>
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Company Vehicle</td>
	 <td class="Text" align="center"><input class="AIT" id="NPR" name="NPR" value="<?php if($hr['CV_Amt']>0){echo intval($hr['CV_Amt']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<?php } ?>
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;<b>Total Deduction:</b></b></td>
	 <td class="Text" align="center"><input class="AIT" id="TotDeduct" name="TotDeduct" style="font-weight:bold;background-color:#0079F2;color:#FFFFFF;" value="<?php echo $hr['PF']+$hr['ESIC']+$hr['ARR_ESIC']+$hr['RTSB']+$hr['NPR']+$hr['VolC']+$hr['RA_allow']+$hr['AdminIC_Amt']+$hr['AdminVC_Amt']+$hr['CV_Amt']; ?>" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	  <td colspan="2" valign="top">
	   <table border="0">
	    <tr>
		 <td class="Text" valign="top" style="width:120px;">&nbsp;HR Remark :</td><td class="Text" valign="top" style="width:170px;" align="right"><textarea name="HrRemark" id="HrRemark" cols="16" rows="2" style="background-color:#E4E4E4;" disabled><?php echo $hr['HrRemark']; ?></textarea></td>
		</tr>
	   </table>
	  </td>
	</tr>
   </table>
  </td><?php //02-Close// ?>
  
   <?php ///***///?>
   </table>
   </td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
   <td>
    <table border="0">
	  <?php ///***IT Open ///?>
<script type="text/javascript" language="javascript">
function EditIt()
{ document.getElementById("EditBtnIt").style.display='none'; document.getElementById("SaveIt").style.display='block'; document.getElementById("ResendIt").style.display='block'; 
  if(document.getElementById("ItSS_YN").value=='N'){document.getElementById("ItSS_Amt").readOnly=false; document.getElementById("ItSS_Amt").style.background='#FFFFFF'; document.getElementById("ItSS_Amt").value=0;}if(document.getElementById("ItCHS_YN").value=='N'){document.getElementById("ItCHS_Amt").readOnly=false; document.getElementById("ItCHS_Amt").style.background='#FFFFFF'; document.getElementById("ItCHS_Amt").value=0;}if(document.getElementById("ItLDH_YN").value=='N'){document.getElementById("ItLDH_Amt").readOnly=false; document.getElementById("ItLDH_Amt").style.background='#FFFFFF'; document.getElementById("ItLDH_Amt").value=0;}if(document.getElementById("ItCS_YN").value=='N'){document.getElementById("ItCS_Amt").readOnly=false; document.getElementById("ItCS_Amt").style.background='#FFFFFF'; document.getElementById("ItCS_Amt").value=0;}if(document.getElementById("ItDC_YN").value=='N'){document.getElementById("ItDC_Amt").readOnly=false; document.getElementById("ItDC_Amt").style.background='#FFFFFF'; document.getElementById("ItDC_Amt").value=0;}if(document.getElementById("ItEAB_YN").value=='N'){document.getElementById("ItEAB_Amt").readOnly=false; document.getElementById("ItEAB_Amt").style.background='#FFFFFF'; document.getElementById("ItEAB_Amt").value=0;}if(document.getElementById("ItMND_YN").value=='N'){document.getElementById("ItMND_Amt").readOnly=false; document.getElementById("ItMND_Amt").style.background='#FFFFFF'; document.getElementById("ItMND_Amt").value=0;}
  
  var a=document.getElementById("ItRow").value; 
  if(a>=0) 
  { 
   for(var i=8; i<=a; i++)
   {  
   if(document.getElementById("ItAO_YN"+i).value=='N')
   {document.getElementById("ItAO_Amt"+i).readOnly=false; document.getElementById("ItAO_Amt"+i).style.background='#FFFFFF'; document.getElementById("ItAO_Amt"+i).value=0;} } 
  } 
}

function FunItAmt(v)
{ var OthAmt=document.getElementById("ItOth_Amt"+v).value=document.getElementById("ItAO_Amt"+v).value;
  var SS = document.getElementById("ItSS_Amt").value; var CHS = document.getElementById("ItCHS_Amt").value; var LDH = document.getElementById("ItLDH_Amt").value; var CS = document.getElementById("ItCS_Amt").value; var DC = document.getElementById("ItDC_Amt").value; var EAB = document.getElementById("ItEAB_Amt").value; var MND = document.getElementById("ItMND_Amt").value; 
 if(SS==''){var AmtSS=0;}else{var AmtSS=SS;}if(CHS==''){var AmtCHS=0;}else{var AmtCHS=CHS;}if(LDH==''){var AmtLDH=0;}else{var AmtLDH=LDH;}if(CS==''){var AmtCS=0;}else{var AmtCS=CS;}if(DC==''){var AmtDC=0;}else{var AmtDC=DC;}if(EAB==''){var AmtEAB=0;}else{var AmtEAB=EAB;}if(MND==''){var AmtMND=0;}else{var AmtMND=MND;} 
var AmtSS2=parseFloat(AmtSS); var AmtCHS2=parseFloat(AmtCHS); var AmtLDH2=parseFloat(AmtLDH); var AmtCS2=parseFloat(AmtCS); 
var AmtDC2=parseFloat(AmtDC); var AmtEAB2=parseFloat(AmtEAB); var AmtMND2=parseFloat(AmtMND);
 var AO_8 = parseFloat(document.getElementById("ItOth_Amt8").value); var AO_9 = parseFloat(document.getElementById("ItOth_Amt9").value); var AO_10 = parseFloat(document.getElementById("ItOth_Amt10").value); var AO_11 = parseFloat(document.getElementById("ItOth_Amt11").value); var AO_12 = parseFloat(document.getElementById("ItOth_Amt12").value); var AO_13 = parseFloat(document.getElementById("ItOth_Amt13").value); var AO_14 = parseFloat(document.getElementById("ItOth_Amt14").value); var AO_15 = parseFloat(document.getElementById("ItOth_Amt15").value); 
 var TotItAmt = document.getElementById("TotItAmt").value=Math.round((AmtSS2+AmtCHS2+AmtLDH2+AmtCS2+AmtDC2+AmtEAB2+AmtMND2+AO_8+AO_9+AO_10+AO_11+AO_12+AO_13+AO_14+AO_15)*100)/100;
 var ItDeduct = document.getElementById("IT_Deduct").value=document.getElementById("TotItAmt").value;
 
 var HR_Earn = parseFloat(document.getElementById("HR_Earn").value); var HR_Deduct = parseFloat(document.getElementById("HR_Deduct").value);
 var IT_Earn = parseFloat(document.getElementById("IT_Earn").value); var IT_Deduct = parseFloat(document.getElementById("IT_Deduct").value);
 var Admin_Earn = parseFloat(document.getElementById("Admin_Earn").value); var Admin_Deduct = parseFloat(document.getElementById("Admin_Deduct").value);
 var Rep_Earn = parseFloat(document.getElementById("Rep_Earn").value); var Rep_Deduct = parseFloat(document.getElementById("Rep_Deduct").value);
 var Acc_Earn = parseFloat(document.getElementById("Acc_Earn").value); var Acc_Deduct = parseFloat(document.getElementById("Acc_Deduct").value);
 
 var TotEarnAmt = document.getElementById("Total_Earn").value=Math.round((HR_Earn+IT_Earn+Admin_Earn+Rep_Earn+Acc_Earn)*100)/100;
 var TotDeductAmt = document.getElementById("Total_Deduct").value=Math.round((HR_Deduct+IT_Deduct+Admin_Deduct+Rep_Deduct+Acc_Deduct)*100)/100;
} 

function ItAmtFun()
{ 
  var SS = document.getElementById("ItSS_Amt").value; var CHS = document.getElementById("ItCHS_Amt").value; var LDH = document.getElementById("ItLDH_Amt").value; var CS = document.getElementById("ItCS_Amt").value; var DC = document.getElementById("ItDC_Amt").value; var EAB = document.getElementById("ItEAB_Amt").value; var MND = document.getElementById("ItMND_Amt").value; 
 if(SS==''){var AmtSS=0;}else{var AmtSS=SS;}if(CHS==''){var AmtCHS=0;}else{var AmtCHS=CHS;}if(LDH==''){var AmtLDH=0;}else{var AmtLDH=LDH;}if(CS==''){var AmtCS=0;}else{var AmtCS=CS;}if(DC==''){var AmtDC=0;}else{var AmtDC=DC;}if(EAB==''){var AmtEAB=0;}else{var AmtEAB=EAB;}if(MND==''){var AmtMND=0;}else{var AmtMND=MND;} 
var AmtSS2=parseFloat(AmtSS); var AmtCHS2=parseFloat(AmtCHS); var AmtLDH2=parseFloat(AmtLDH); var AmtCS2=parseFloat(AmtCS); 
var AmtDC2=parseFloat(AmtDC); var AmtEAB2=parseFloat(AmtEAB); var AmtMND2=parseFloat(AmtMND);
 var AO_8 = parseFloat(document.getElementById("ItOth_Amt8").value); var AO_9 = parseFloat(document.getElementById("ItOth_Amt9").value); var AO_10 = parseFloat(document.getElementById("ItOth_Amt10").value); var AO_11 = parseFloat(document.getElementById("ItOth_Amt11").value); var AO_12 = parseFloat(document.getElementById("ItOth_Amt12").value); var AO_13 = parseFloat(document.getElementById("ItOth_Amt13").value); var AO_14 = parseFloat(document.getElementById("ItOth_Amt14").value); var AO_15 = parseFloat(document.getElementById("ItOth_Amt15").value); 
 var TotItAmt = document.getElementById("TotItAmt").value=Math.round((AmtSS2+AmtCHS2+AmtLDH2+AmtCS2+AmtDC2+AmtEAB2+AmtMND2+AO_8+AO_9+AO_10+AO_11+AO_12+AO_13+AO_14+AO_15)*100)/100;
 var ItDeduct = document.getElementById("IT_Deduct").value=document.getElementById("TotItAmt").value;
 
 var HR_Earn = parseFloat(document.getElementById("HR_Earn").value); var HR_Deduct = parseFloat(document.getElementById("HR_Deduct").value);
 var IT_Earn = parseFloat(document.getElementById("IT_Earn").value); var IT_Deduct = parseFloat(document.getElementById("IT_Deduct").value);
 var Rep_Earn = parseFloat(document.getElementById("Rep_Earn").value); var Rep_Deduct = parseFloat(document.getElementById("Rep_Deduct").value);
 var Acc_Earn = parseFloat(document.getElementById("Acc_Earn").value); var Acc_Deduct = parseFloat(document.getElementById("Acc_Deduct").value);
 
 var TotEarnAmt = document.getElementById("Total_Earn").value=Math.round((HR_Earn+IT_Earn+Rep_Earn+Acc_Earn)*100)/100;
 var TotDeductAmt = document.getElementById("Total_Deduct").value=Math.round((HR_Deduct+IT_Deduct+Rep_Deduct+Acc_Deduct)*100)/100;
} 

function FunOkIT(si)
{ 
  var agree=confirm("Are you sure, IT clearance form is ok");
  if(agree)
  { 
   var SS = document.getElementById("ItSS_Amt").value; var CHS = document.getElementById("ItCHS_Amt").value; var LDH = document.getElementById("ItLDH_Amt").value; 
   var CS = document.getElementById("ItCS_Amt").value; var DC = document.getElementById("ItDC_Amt").value; var EAB = document.getElementById("ItEAB_Amt").value; 
   var MND = document.getElementById("ItMND_Amt").value; var A8 =document.getElementById("ItOth_Amt8").value; var A9 = document.getElementById("ItOth_Amt9").value; 
   var A10 = document.getElementById("ItOth_Amt10").value; var A11 = document.getElementById("ItOth_Amt11").value; var A12 = document.getElementById("ItOth_Amt12").value; 
   var A13 = document.getElementById("ItOth_Amt13").value; var A14 = document.getElementById("ItOth_Amt14").value; var A15 = document.getElementById("ItOth_Amt15").value; 
   var TotItAmt = document.getElementById("TotItAmt").value; 
   if(SS==''){var AmtSS=0;}else{var AmtSS=SS;}if(CHS==''){var AmtCHS=0;}else{var AmtCHS=CHS;}if(LDH==''){var AmtLDH=0;}else{var AmtLDH=LDH;}if(CS==''){var AmtCS=0;}else{var AmtCS=CS;}if(DC==''){var AmtDC=0;}else{var AmtDC=DC;}if(EAB==''){var AmtEAB=0;}else{var AmtEAB=EAB;}if(MND==''){var AmtMND=0;}else{var AmtMND=MND;}
   
   var url = 'SepCheckAcc.php'; var pars = 'act=ItOk&si='+si+'&ss='+AmtSS+'&chs='+AmtCHS+'&ldh='+AmtLDH+'&cs='+AmtCS+'&dc='+AmtDC+'&eab='+AmtEAB+'&mnd='+AmtMND+'&a8='+A8+'&a9='+A9+'&a10='+A10+'&a11='+A11+'&a12='+A12+'&a13='+A13+'&a14='+A14+'&a15='+A15+'&totamt='+TotItAmt; var myAjax = new Ajax.Request(
	url, { method: 'post', parameters: pars, onComplete: show_ItResult }); 
  } 
}
function show_ItResult(originalRequest)
{ document.getElementById('ItSpan').innerHTML = originalRequest.responseText; 
  document.getElementById("EditBtnIt").style.display='none'; document.getElementById("SaveIt").style.display='none'; document.getElementById("ResendIt").style.display='none'; }

function FunResendIT(si,ei,ci)
{ var agree=confirm("Are you sure, you want resend form to IT.");
  if(agree)
  { var win=window.open("SepCheckAcc.php?act=ItResend&si="+si,"Form","menubar=no,scrollbars=yes,resizable=no,directories=no,width=400,height=130");
    var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="SepAccClearForm.php?act=act&v=v&ss=vty&cc=Acc@~t~1212&p=value&a=app&true=false&si="+si+"&ei="+ei+"&ci="+ci; } }, 1000);
  }
}
</script>	
    <tr>
     <td colspan="5" align="right" bgcolor="">
     <table border="0">
     <tr>
     <td colspan="2" style="font-family:Times New Roman;size:14px;color:#008200;" valign="top" align="right">
<b><span id="ItSpan"><?php if($resSE['Acc_ItNOC']=='Y'){echo 'IT clearance ok';}elseif($resSE['Acc_ItNOC']=='R'){echo 'Clearance form send it back to IT';} ?></span></b></td>
     <td>&nbsp;</td>
<?php if($resSE['IT_NOC']=='Y' AND $resSE['Acc_ItNOC']=='N'){ ?> 
     <td><input type="button" id="SaveIt" name="SaveIt" value="submit/ok" style="background-color:#FFCAFF;display:none;" onClick="FunOkIT(<?php echo $_REQUEST['si']; ?>)"/></td>
	 <td><input type="button" id="ResendIt" name="ResendIt" value="send back" style="background-color:#FFCAFF;display:none;" onClick="FunResendIT(<?php echo $_REQUEST['si'].', '.$_REQUEST['ei'].', '.$_REQUEST['ci']; ?>)"/></td>
	 <td><input type="button" id="EditBtnIt" name="EditBtnIt" value="edit" style="background-color:#FFCAFF;display:block;" onClick="EditIt()"/></td>
	 <td><input type="button" name="Refrash" value="refresh" style="background-color:#FFCAFF;" onClick="javascript:window.location='SepAccClearForm.php?act=act&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&si=<?php echo $_REQUEST['si']; ?>&ei=<?php echo $_REQUEST['ei']; ?>&ci=<?php echo $_REQUEST['ci']; ?>'"/></td>
<?php } ?>   
    </tr>
    </table>
    </td>
    </tr> 
	<tr>
	 <td bgcolor="#FFFFDD">
	  <table border="1">
    <tr><td colspan="5" class="Text" style="color:#006200;background-color:#DFFFDF;" align="center"><b>IT CLEARANCE FORM</b></td></tr> 
	<tr bgcolor="#7a6189">
       <td class="Text" style="width:30px;color:#FFFFFF;" align="center"><b>Sn</b></td>
       <td class="Text" style="width:230px;color:#FFFFFF;" align="center"><b>Particular</b></td>
	   <td class="Text" style="width:100px;color:#FFFFFF;" align="center"><b>NA /Yes /No</b></td>
	   <td class="Text" style="width:70px;color:#FFFFFF;" align="center" valign="top"><b>Recovery Amount</b></td>
	   <td class="Text" style="width:130px;color:#FFFFFF;" align="center"><b>Remark</b></td>
    </tr>
<?php $sqlit=mysql_query("select * from hrm_employee_separation_nocit where EmpSepId=".$_REQUEST['si'], $con); $it=mysql_fetch_assoc($sqlit);?>
	  <tr bgcolor="#FFFFFF">
       <td class="Text" style="width:30px;" align="center">1</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Sim Submitted</td>
	   <td class="Text" style="width:150px;" align="center">
	   NA<?php if($it['ItSS']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($it['ItSS']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($it['ItSS']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="ItSS_YN" name="ItSS_YN" value="<?php echo $it['ItSS']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="ItSS_Amt" name="ItSS_Amt" value="<?php if($it['ItSS_Amt']!=0){echo $it['ItSS_Amt'];} ?>" readonly maxlength="8" onChange="ItAmtFun()" onBlur="ItAmtFun()"/></td>
	   <td class="Text" style="width:130px;" align="center" valign="top"><input id="ItSS_Remark" name="ItSS_Remark" style="width:128px;" value="<?php echo $it['ItSS_Remark'] ?>" readonly/></td>
     </tr> 
	 <tr bgcolor="#FFFFFF">
       <td class="Text" style="width:30px;" align="center">2</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Company Handset Submitted</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($it['ItCHS']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($it['ItCHS']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($it['ItCHS']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="ItCHS_YN" name="ItCHS_YN" value="<?php echo $it['ItCHS']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="ItCHS_Amt" name="ItCHS_Amt" value="<?php if($it['ItCHS_Amt']!=0){echo $it['ItCHS_Amt'];} ?>" readonly maxlength="8" onChange="ItAmtFun()" onBlur="ItAmtFun()"/></td>
	   <td class="Text" style="width:130px;" align="center" valign="top"><input id="ItCHS_Remark" name="ItCHS_Remark" style="width:128px;" value="<?php echo $it['ItCHS_Remark'] ?>" readonly/></td>
     </tr>
	 <tr bgcolor="#FFFFFF">
       <td class="Text" style="width:30px;" align="center">3</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Laptop/ Desktop Handover</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($it['ItLDH']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($it['ItLDH']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($it['ItLDH']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="ItLDH_YN" name="ItLDH_YN" value="<?php echo $it['ItLDH']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="ItLDH_Amt" name="ItLDH_Amt" value="<?php if($it['ItLDH_Amt']!=0){echo $it['ItLDH_Amt'];} ?>" readonly maxlength="8" onChange="ItAmtFun()" onBlur="ItAmtFun()"/></td>
	   <td class="Text" style="width:130px;" align="center" valign="top"><input id="ItLDH_Remark" name="ItLDH_Remark" style="width:128px;" value="<?php echo $it['ItLDH_Remark'] ?>" readonly/></td>
     </tr> 
	 <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">4</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Camera Submitted</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($it['ItCS']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($it['ItCS']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($it['ItCS']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="ItCS_YN" name="ItCS_YN" value="<?php echo $it['ItCS']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="ItCS_Amt" name="ItCS_Amt" value="<?php if($it['ItCS_Amt']!=0){echo $it['ItCS_Amt'];} ?>" readonly maxlength="8" onChange="ItAmtFun()" onBlur="ItAmtFun()"/></td>
	   <td class="Text" style="width:130px;" align="center" valign="top"><input id="ItCS_Remark" name="ItCS_Remark" style="width:128px;" value="<?php echo $it['ItCS_Remark'] ?>" readonly/></td>
     </tr>
	  <tr bgcolor="#FFFFFF">
       <td class="Text" style="width:30px;" align="center">5</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Datacard Submitted</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($it['ItDC']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($it['ItDC']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($it['ItDC']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="ItDC_YN" name="ItDC_YN" value="<?php echo $it['ItDC']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="ItDC_Amt" name="ItDC_Amt" value="<?php if($it['ItDC_Amt']!=0){echo $it['ItDC_Amt'];} ?>" readonly maxlength="8" onChange="ItAmtFun()" onBlur="ItAmtFun()"/></td>
	   <td class="Text" style="width:130px;" align="center" valign="top"><input id="ItDC_Remark" name="ItDC_Remark" style="width:128px;" value="<?php echo $it['ItDC_Remark'] ?>" readonly/></td>
     </tr>
	  <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">6</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Email Account Blocked</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($it['ItEAB']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($it['ItEAB']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($it['ItEAB']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="ItEAB_YN" name="ItEAB_YN" value="<?php echo $it['ItEAB']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="ItEAB_Amt" name="ItEAB_Amt" value="<?php if($it['ItEAB_Amt']!=0){echo $it['ItEAB_Amt'];} ?>" readonly maxlength="8" onChange="ItAmtFun()" onBlur="ItAmtFun()"/></td>
	   <td class="Text" style="width:130px;" align="center" valign="top"><input id="ItEAB_Remark" name="ItEAB_Remark" style="width:128px;" value="<?php echo $it['ItEAB_Remark'] ?>" readonly/></td>
     </tr> 
	  <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">7</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Mob. No. Disabled/ Transfered</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($it['ItMND']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($it['ItMND']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($it['ItMND']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="ItMND_YN" name="ItMND_YN" value="<?php echo $it['ItMND']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="ItMND_Amt" name="ItMND_Amt" value="<?php if($it['ItMND_Amt']!=0){echo $it['ItMND_Amt'];} ?>" readonly maxlength="8" onChange="ItAmtFun()" onBlur="ItAmtFun()"/></td>
	   <td class="Text" style="width:130px;" align="center" valign="top"><input id="ItMND_Remark" name="ItMND_Remark" style="width:128px;" value="<?php echo $it['ItMND_Remark'] ?>" readonly/></td>
     </tr>
<?php for($i=8; $i<=15; $i++) { if($it['ItAO_Txt'.$i]!=''){ ?>   	 
	  <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center"><?php echo $i; ?></td>
       <td class="Text" style="width:230px;" valign="top">&nbsp;<?php echo $it['ItAO_Txt'.$i]; ?><input type="hidden" id="ItAO_Txt<?php echo $i; ?>" name="ItAO_Txt<?php echo $i; ?>" value="<?php echo $it['ItAO_Txt'.$i]; ?>"/></td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<?php if($it['ItAO'.$i]=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($it['ItAO'.$i]=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($it['ItAO'.$i]=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="ItAO_YN<?php echo $i; ?>" name="ItAO_YN<?php echo $i; ?>" value="<?php echo $it['ItAO'.$i]; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="ItAO_Amt<?php echo $i; ?>" name="ItAO_Amt<?php echo $i; ?>" value="<?php if($it['ItAO_Amt'.$i]!=0){ echo $it['ItAO_Amt'.$i]; } ?>" readonly maxlength="8" onChange="FunItAmt(<?php echo $i; ?>)" onBlur="FunItAmt(<?php echo $i; ?>)"/></td>
	   <td class="Text" style="width:130px;" align="center" valign="top"><input id="ItAO_Remark<?php echo $i; ?>" name="ItAO_Remark<?php echo $i; ?>" style="width:128px;" value="<?php echo $it['ItAO_Remark'.$i] ?>" readonly/></td>
     </tr>
<?php } if($it['ItAO_Txt'.$i]!=''){$c=$i+1;} } ?><input type="hidden" id="ItRow" value="<?php echo $c-1; ?>" />
     <tr>
	  <td colspan="3" align="right" class="Text"><b>Total IT Recovery Amount :</b>&nbsp;</td>
	  <td align="center"><input style="font-weight:bold;background-color:#0079F2;color:#FFFFFF;width:68px;text-align:right;" id="TotItAmt" name="TotItAmt" value="<?php if($it['TotItAmt']>0){ echo $it['TotItAmt']; }else{echo 0;} ?>" readonly maxlength="8"/></td>
	  <td>
	   <?php for($j=8; $j<=15; $j++) { ?>
	   <input type="hidden" id="ItOth_Amt<?php echo $j; ?>" name="ItOth_Amt<?php echo $j; ?>" value="<?php if($it['ItAO_Amt'.$j]>0){echo $it['ItAO_Amt'.$j];}else{echo 0;} ?>"/>
	   <?php } ?>
	  </td>
	 </tr>
	 <?php ///***IT Close ///?>	  
	  </table>
	 </td>
	</tr>	 
	</table>
   </td>
  </tr>
 </table>
</td>
<?php /********************* TD-02 ***************************/ ?> 
<td style="width:640px;" valign="top">
  <table border="0">
	 <tr><td colspan="5"></td></tr>
     <?php ///***Reporting Open ///?>
<script type="text/javascript" language="javascript">
function FunEditRep()
{ document.getElementById("EditRep").style.display='none'; document.getElementById("SaveRep").style.display='block'; document.getElementById("ResendRep").style.display='block'; 
  if(document.getElementById("DDH_YN").value=='N'){document.getElementById("DDH_Amt").readOnly=false; document.getElementById("DDH_Amt").style.background='#FFFFFF'; document.getElementById("DDH_Amt").value=0;}if(document.getElementById("TID_YN").value=='N'){document.getElementById("TID_Amt").readOnly=false; document.getElementById("TID_Amt").style.background='#FFFFFF'; document.getElementById("TID_Amt").value=0;}if(document.getElementById("APTC_YN").value=='N'){document.getElementById("APTC_Amt").readOnly=false; document.getElementById("APTC_Amt").style.background='#FFFFFF'; document.getElementById("APTC_Amt").value=0;}if(document.getElementById("HOAS_YN").value=='N'){document.getElementById("HOAS_Amt").readOnly=false; document.getElementById("HOAS_Amt").style.background='#FFFFFF'; document.getElementById("HOAS_Amt").value=0;} 
  var a=document.getElementById("RepRow").value; 
  if(a>=0) 
  {
   for(var i=1; i<=a; i++)
   {  
   if(document.getElementById("Prtis_YN"+i).value=='N')
   {document.getElementById("Prtis_Amt"+i).readOnly=false; document.getElementById("Prtis_Amt"+i).style.background='#FFFFFF';
    if(document.getElementById("Prtis_Amt"+i).value==''){document.getElementById("Prtis_Amt"+i).value=0;} 
   } 
   } 
  }
}

function FunRepAmt(v)
{ var OthAmt=document.getElementById("RepOth_Amt"+v).value=document.getElementById("Prtis_Amt"+v).value;
  var HOAS = document.getElementById("HOAS_Amt").value; var APTC = document.getElementById("APTC_Amt").value; var TID = document.getElementById("TID_Amt").value; var DDH = document.getElementById("DDH_Amt").value;
  if(HOAS==''){var AmtHOAS=0;}else{var AmtHOAS=HOAS;}if(APTC==''){var AmtAPTC=0;}else{var AmtAPTC=APTC;} if(TID==''){var AmtTID=0;}else{var AmtTID=TID;}if(DDH==''){var AmtDDH=0;}else{var AmtDDH=DDH;}
  var AmtHOAS2=parseFloat(AmtHOAS); var AmtAPTC2=parseFloat(AmtAPTC); var AmtTID2=parseFloat(AmtTID); var AmtDDH2=parseFloat(AmtDDH);
  var AO_1 = parseFloat(document.getElementById("RepOth_Amt1").value); var AO_2 = parseFloat(document.getElementById("RepOth_Amt2").value); var AO_3 = parseFloat(document.getElementById("RepOth_Amt3").value); var AO_4 = parseFloat(document.getElementById("RepOth_Amt4").value); var AO_5 = parseFloat(document.getElementById("RepOth_Amt5").value); var AO_6 = parseFloat(document.getElementById("RepOth_Amt6").value); var AO_7 = parseFloat(document.getElementById("RepOth_Amt7").value);  var AO_8 = parseFloat(document.getElementById("RepOth_Amt8").value); var AO_9 = parseFloat(document.getElementById("RepOth_Amt9").value); var AO_10 = parseFloat(document.getElementById("RepOth_Amt10").value); 
  var TotRepAmt = document.getElementById("TotRepAmt").value=Math.round((AmtHOAS2+AmtAPTC2+AmtTID2+AmtDDH2+AO_1+AO_2+AO_3+AO_4+AO_5+AO_6+AO_7+AO_8+AO_9+AO_10)*100)/100;
  var RepDeduct = document.getElementById("Rep_Deduct").value=document.getElementById("TotRepAmt").value;
 
  var HR_Earn = parseFloat(document.getElementById("HR_Earn").value); var HR_Deduct = parseFloat(document.getElementById("HR_Deduct").value);
  var IT_Earn = parseFloat(document.getElementById("IT_Earn").value); var IT_Deduct = parseFloat(document.getElementById("IT_Deduct").value);
  var Admin_Earn = parseFloat(document.getElementById("Admin_Earn").value); var Admin_Deduct = parseFloat(document.getElementById("Admin_Deduct").value);
  var Rep_Earn = parseFloat(document.getElementById("Rep_Earn").value); var Rep_Deduct = parseFloat(document.getElementById("Rep_Deduct").value);
  var Acc_Earn = parseFloat(document.getElementById("Acc_Earn").value); var Acc_Deduct = parseFloat(document.getElementById("Acc_Deduct").value);
 
  var TotEarnAmt = document.getElementById("Total_Earn").value=Math.round((HR_Earn+IT_Earn+Admin_Earn+Rep_Earn+Acc_Earn)*100)/100;
  var TotDeductAmt = document.getElementById("Total_Deduct").value=Math.round((HR_Deduct+IT_Deduct+Admin_Deduct+Rep_Deduct+Acc_Deduct)*100)/100;
} 

function RepAmtFun()
{ 
  var HOAS = document.getElementById("HOAS_Amt").value; var APTC = document.getElementById("APTC_Amt").value; var TID = document.getElementById("TID_Amt").value; var DDH = document.getElementById("DDH_Amt").value;
  if(HOAS==''){var AmtHOAS=0;}else{var AmtHOAS=HOAS;}if(APTC==''){var AmtAPTC=0;}else{var AmtAPTC=APTC;} if(TID==''){var AmtTID=0;}else{var AmtTID=TID;}if(DDH==''){var AmtDDH=0;}else{var AmtDDH=DDH;}
  var AmtHOAS2=parseFloat(AmtHOAS); var AmtAPTC2=parseFloat(AmtAPTC); var AmtTID2=parseFloat(AmtTID); var AmtDDH2=parseFloat(AmtDDH);
  var AO_1 = parseFloat(document.getElementById("RepOth_Amt1").value); var AO_2 = parseFloat(document.getElementById("RepOth_Amt2").value); var AO_3 = parseFloat(document.getElementById("RepOth_Amt3").value); var AO_4 = parseFloat(document.getElementById("RepOth_Amt4").value); var AO_5 = parseFloat(document.getElementById("RepOth_Amt5").value); var AO_6 = parseFloat(document.getElementById("RepOth_Amt6").value); var AO_7 = parseFloat(document.getElementById("RepOth_Amt7").value);  var AO_8 = parseFloat(document.getElementById("RepOth_Amt8").value); var AO_9 = parseFloat(document.getElementById("RepOth_Amt9").value); var AO_10 = parseFloat(document.getElementById("RepOth_Amt10").value); 
  var TotRepAmt = document.getElementById("TotRepAmt").value=Math.round((AmtHOAS2+AmtAPTC2+AmtTID2+AmtDDH2+AO_1+AO_2+AO_3+AO_4+AO_5+AO_6+AO_7+AO_8+AO_9+AO_10)*100)/100;
  var RepDeduct = document.getElementById("Rep_Deduct").value=document.getElementById("TotRepAmt").value;
 
  var HR_Earn = parseFloat(document.getElementById("HR_Earn").value); var HR_Deduct = parseFloat(document.getElementById("HR_Deduct").value);
  var IT_Earn = parseFloat(document.getElementById("IT_Earn").value); var IT_Deduct = parseFloat(document.getElementById("IT_Deduct").value);
  var Rep_Earn = parseFloat(document.getElementById("Rep_Earn").value); var Rep_Deduct = parseFloat(document.getElementById("Rep_Deduct").value);
  var Acc_Earn = parseFloat(document.getElementById("Acc_Earn").value); var Acc_Deduct = parseFloat(document.getElementById("Acc_Deduct").value);
 
  var TotEarnAmt = document.getElementById("Total_Earn").value=Math.round((HR_Earn+IT_Earn+Rep_Earn+Acc_Earn)*100)/100;
  var TotDeductAmt = document.getElementById("Total_Deduct").value=Math.round((HR_Deduct+IT_Deduct+Rep_Deduct+Acc_Deduct)*100)/100;
} 


function FunOkRep(si)
{ 
  var agree=confirm("Are you sure, reporting manager clearance form is ok"); 
  if(agree)
  { 
   var HOAS = document.getElementById("HOAS_Amt").value; var APTC = document.getElementById("APTC_Amt").value; var TID = document.getElementById("TID_Amt").value; 
   var DDH = document.getElementById("DDH_Amt").value; var A1 = document.getElementById("RepOth_Amt1").value; var A2 = document.getElementById("RepOth_Amt2").value; 
   var A3 = document.getElementById("RepOth_Amt3").value; var A4 = document.getElementById("RepOth_Amt4").value; var A5 = document.getElementById("RepOth_Amt5").value; 
   var A6 = document.getElementById("RepOth_Amt6").value; var A7 = document.getElementById("RepOth_Amt7").value; var A8 = document.getElementById("RepOth_Amt8").value; 
   var A9 = document.getElementById("RepOth_Amt9").value; var A10 = document.getElementById("RepOth_Amt10").value; var TotRepAmt = document.getElementById("TotRepAmt").value; 
   if(HOAS==''){var AmtHOAS=0;}else{var AmtHOAS=HOAS;}if(APTC==''){var AmtAPTC=0;}else{var AmtAPTC=APTC;} if(TID==''){var AmtTID=0;}else{var AmtTID=TID;}if(DDH==''){var AmtDDH=0;}else{var AmtDDH=DDH;}
   var url = 'SepCheckAcc.php'; var pars = 'act=RepOk&si='+si+'&hoas='+AmtHOAS+'&aptc='+AmtAPTC+'&tid='+AmtTID+'&ddh='+AmtDDH+'&a1='+A1+'&a2='+A2+'&a3='+A3+'&a4='+A4+'&a5='+A5+'&a6='+A6+'&a7='+A7+'&a8='+A8+'&a9='+A9+'&a10='+A10+'&totamt='+TotRepAmt;  var myAjax = new Ajax.Request(
   url, { method: 'post', parameters: pars, onComplete: show_RepResult }); 
  } 
}
function show_RepResult(originalRequest)
{ document.getElementById('RepSpan').innerHTML = originalRequest.responseText; 
  document.getElementById("EditRep").style.display='none'; document.getElementById("SaveRep").style.display='none'; document.getElementById("ResendRep").style.display='none'; 
}

function FunResendRep(si,ei,ci)
{ var agree=confirm("Are you sure, you want resend form to reporting manager.");
  if(agree)
  { var win=window.open("SepCheckAcc.php?act=RepResend&si="+si,"Form","menubar=no,scrollbars=yes,resizable=no,directories=no,width=400,height=130");
    var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="SepAccClearForm.php?act=act&v=v&ss=vty&cc=Acc@~t~1212&p=value&a=app&true=false&si="+si+"&ei="+ei+"&ci="+ci; } }, 1000);
  }
}


</script>
     <tr>
       <td colspan="5" align="right" bgcolor="">
       <table border="0">
       <tr>
       <td colspan="2" style="font-family:Times New Roman;size:14px;color:#008200;" valign="top" align="right">
<b><span id="RepSpan"><?php if($resSE['Acc_RepNOC']=='Y'){echo 'Reporting clearance ok';}elseif($resSE['Acc_RepNOC']=='R'){echo 'Clearance form send it back to reporting';} ?></span></b></td>
       <td>&nbsp;</td>
  <?php if($resSE['Rep_NOC']=='Y' AND $resSE['Acc_RepNOC']=='N'){ ?>
       <td><input type="button" id="SaveRep" name="SaveRep" value="submit/ok" style="background-color:#FFCAFF;display:none;" onClick="FunOkRep(<?php echo $_REQUEST['si']; ?>)"/></td>
	   <td><input type="button" id="ResendRep" name="ResendRep" value="send back" style="background-color:#FFCAFF;display:none;" onClick="FunResendRep(<?php echo $_REQUEST['si'].', '.$_REQUEST['ei'].', '.$_REQUEST['ci']; ?>)"/></td>
	   <td><input type="button" id="EditRep" name="EditRep" value="edit" style="background-color:#FFCAFF;display:block;" onClick="FunEditRep()"/></td>
	   <td><input type="button" name="Refrash" value="refresh" style="background-color:#FFCAFF;" onClick="javascript:window.location='SepAccClearForm.php?act=act&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&si=<?php echo $_REQUEST['si']; ?>&ei=<?php echo $_REQUEST['ei']; ?>&ci=<?php echo $_REQUEST['ci']; ?>'"/></td>
<?php } ?>   
      </tr>
      </table>  
      </td>
      </tr> 
	  <tr>
	   <td bgcolor="#FFFFDD">
	    <table border="1">
		 <tr><td colspan="5" class="Text" style="color:#006200;background-color:#DFFFDF;" align="center"><b>DEPARTMENTAL CLEARANCE FORM</b></td></tr>
<?php $sqlRep=mysql_query("select * from hrm_employee_separation_nocrep where EmpSepId=".$_REQUEST['si'], $con); $rep=mysql_fetch_assoc($sqlRep); ?>
     <tr bgcolor="#FFFFFF">
       <td class="Text" style="width:30px;" align="center">1<input type="hidden" id="si" name="si" value="<?php echo $_REQUEST['si']; ?>" />
       <input type="hidden" id="ei" name="ei" value="<?php echo $_REQUEST['ei']; ?>" />
	   <input type="hidden" name="Ename" id="Ename" value="<?php echo $NameE; ?>" /></td>
       <td class="Text" style="width:230px;" align="">&nbsp;Handover Of Data Document etc</td>
	   <td class="Text" style="width:140px;" align="center" valign="top">
	   NA<?php if($rep['DDH']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($rep['DDH']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($rep['DDH']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="DDH_YN" name="DDH_YN" value="<?php echo $rep['DDH']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="DDH_Amt" name="DDH_Amt" value="<?php if($rep['DDH_Amt']!=0){echo $rep['DDH_Amt'];} ?>" maxlength="10" readonly maxlength="8" onChange="RepAmtFun()" onBlur="RepAmtFun()"/></td>
	   <td class="Text" style="width:180px;" align="center" valign="top"><input id="DDH_Remark" name="DDH_Remark" style="width:180px;" value="<?php echo $rep['DDH_Remark']; ?>" maxlength="90" readonly/></td>
     </tr>
	  <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">2</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Handover Of ID Card</td>
	   <td class="Text" style="width:140px;" align="center" valign="top">
	   NA<?php if($rep['TID']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($rep['TID']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($rep['TID']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="TID_YN" name="TID_YN" value="<?php echo $rep['TID']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="TID_Amt" name="TID_Amt" value="<?php if($rep['TID_Amt']!=0){echo $rep['TID_Amt'];} ?>" maxlength="10" readonly maxlength="8" onChange="RepAmtFun()" onBlur="RepAmtFun()"/></td>
	   <td class="Text" style="width:180px;" align="center" valign="top"><input id="TID_Remark" name="TID_Remark" style="width:180px;" value="<?php echo $rep['TID_Remark']; ?>" maxlength="90" readonly/></td>
     </tr>
	 <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">3</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Complete Of Pending Task</td>
	   <td class="Text" style="width:140px;" align="center" valign="top">
	   NA<?php if($rep['APTC']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($rep['APTC']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($rep['APTC']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="APTC_YN" name="APTC_YN" value="<?php echo $rep['APTC']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="APTC_Amt" name="APTC_Amt" value="<?php if($rep['APTC_Amt']!=0){echo $rep['APTC_Amt'];} ?>" maxlength="10" readonly maxlength="8" onChange="RepAmtFun()" onBlur="RepAmtFun()"/></td>
	   <td class="Text" style="width:180px;" align="center" valign="top"><input id="APTC_Remark" name="APTC_Remark" style="width:180px;" value="<?php echo $rep['APTC_Remark']; ?>" maxlength="90" readonly/></td>
     </tr>
	 <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">4</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Handover Of Health Card</td>
	   <td class="Text" style="width:140px;" align="center" valign="top">
	   NA<?php if($rep['HOAS']=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($rep['HOAS']=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($rep['HOAS']=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="HOAS_YN" name="HOAS_YN" value="<?php echo $rep['HOAS']; ?>" /> </td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="HOAS_Amt" name="HOAS_Amt" value="<?php if($rep['HOAS_Amt']!=0){echo $rep['HOAS_Amt'];} ?>" maxlength="10" readonly maxlength="8" onChange="RepAmtFun()" onBlur="RepAmtFun()"/></td>
	   <td class="Text" style="width:180px;" align="center" valign="top"><input id="HOAS_Remark" name="HOAS_Remark" style="width:180px;" value="<?php echo $rep['HOAS_Remark']; ?>" maxlength="90" readonly/></td>
     </tr>
	 <tr><td colspan="5" class="Text" style="background-color:#FFFFFF;" align="">&nbsp;<b>Parties Clearance</b></td></tr>
<?php for($i=1; $i<=12; $i++) { if($rep['Prtis'.$i]!=''){ ?>    	 
	  <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center"><?php echo $i; ?></td>
       <td class="Text" style="width:230px;" valign="top">&nbsp;<?php echo $rep['Prtis'.$i]; ?><input type="hidden" id="Prtis<?php echo $i; ?>" name="Prtis<?php echo $i; ?>" value="<?php echo $rep['Prtis'.$i]; ?>" maxlength="45"/></td>
	   <td class="Text" style="width:140px;" align="center" valign="top">
	   NA<?php if($rep['Prtis_'.$i]=='A'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   Yes<?php if($rep['Prtis_'.$i]=='Y'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   No<?php if($rep['Prtis_'.$i]=='N'){echo '<img src="images/checkbox_UnCheck.png" border="0"/>';}else{echo '<img src="images/checkbox.png" border="0"/>';}?>
	   <input type="hidden" id="Prtis_YN<?php echo $i; ?>" name="Prtis_YN<?php echo $i; ?>" value="<?php echo $rep['Prtis_'.$i]; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top"><input style="width:68px;background-color:#EAEAEA;text-align:right;" id="Prtis_Amt<?php echo $i; ?>" name="Prtis_Amt<?php echo $i; ?>" value="<?php if($rep['Prtis_'.$i.'Amt']!=0){echo $rep['Prtis_'.$i.'Amt'];} ?>" maxlength="10" readonly maxlength="8" onChange="FunRepAmt(<?php echo $i; ?>)" onBlur="FunRepAmt(<?php echo $i; ?>)"/></td>
	   <td class="Text" style="width:180px;" align="center" valign="top"><input id="Prtis_Remark<?php echo $i; ?>" name="Prtis_Remark<?php echo $i; ?>" style="width:180px;" value="<?php echo $rep['Prtis_'.$i.'Remark']; ?>" maxlength="90" readonly /></td>
     </tr>
<?php } if($rep['Prtis'.$i]!=''){$a=$i+1;} } ?><input type="hidden" id="RepRow" value="<?php echo $a-1; ?>" />
      <tr>
	  <td colspan="3" align="right" class="Text"><b>Total Departmental Recovery Amount :</b>&nbsp;</td>
	  <td align="center"><input style="font-weight:bold;background-color:#0079F2;color:#FFFFFF;width:68px;text-align:right;" id="TotRepAmt" name="TotRepAmt" value="<?php if($rep['TotRepAmt']>0){ echo $rep['TotRepAmt']; }else{echo 0;} ?>" readonly maxlength="8"/></td>
	  <td>
	   <?php for($j=1; $j<=12; $j++) { ?>
<input type="hidden" id="RepOth_Amt<?php echo $j; ?>" name="RepOth_Amt<?php echo $j; ?>" value="<?php if($rep['Prtis_'.$j.'Amt']!=0){echo $rep['Prtis_'.$j.'Amt'];} else {echo 0;} ?>"/>
	   <?php } ?>
	  </td>
	 </tr>
     <?php ///***Reporting Close ///?>
		</table>
	   </td>
	  </tr>
	  <tr><td colspan="5">&nbsp;</td></tr>
     
	 
<?php /**************** Acoount Open Acoount Open Acoount Open Acoount Open Acoount Open Acoount Open Acoount Open Acoount Open Acoount Open *************************/ ?> 
<script type="text/jscript" language="javascript">
function ClickEditAcc(v)
{ document.getElementById("saveAccNoc").style.display='block'; document.getElementById("editAccNoc").style.display='none';
  if(v>0){document.getElementById("submitAccNoc").style.display='block';}
}

function FunECP(v)
{ if(v=='Y'){document.getElementById("AccECP_Y").checked = true;document.getElementById("AccECP_N").checked=false;document.getElementById("AccECP_YN").value='Y'; 
  document.getElementById("AccECP_Amt").readOnly=false; document.getElementById("AccECP_Amt").style.background='#FFFFFF'; document.getElementById("AccECP_A").checked = false;
  document.getElementById("AccECP_Amt2").readOnly=false; document.getElementById("AccECP_Amt2").style.background='#FFFFFF';
  document.getElementById("AccECP_Amt").value=0;}
  else if(v=='N'){document.getElementById("AccECP_Y").checked=false; document.getElementById("AccECP_N").checked = true; document.getElementById("AccECP_YN").value='N'; 
  document.getElementById("AccECP_Amt").readOnly=true;  document.getElementById("AccECP_Amt").style.background='#EAEAEA'; document.getElementById("AccECP_A").checked = false;
  document.getElementById("AccECP_Amt2").readOnly=true;  document.getElementById("AccECP_Amt2").style.background='#EAEAEA';}
  else if(v=='A'){document.getElementById("AccECP_Y").checked=false; document.getElementById("AccECP_N").checked = false; document.getElementById("AccECP_YN").value='A'; 
  document.getElementById("AccECP_Amt").readOnly=true;  document.getElementById("AccECP_Amt").style.background='#EAEAEA'; document.getElementById("AccECP_A").checked = true;
  document.getElementById("AccECP_Amt2").readOnly=true;  document.getElementById("AccECP_Amt2").style.background='#EAEAEA';}
}
function FunIPS(v)
{ if(v=='Y'){document.getElementById("AccIPS_Y").checked = true;document.getElementById("AccIPS_N").checked=false;document.getElementById("AccIPS_YN").value='Y';
  document.getElementById("AccIPS_Amt").readOnly=false; document.getElementById("AccIPS_Amt").style.background='#FFFFFF'; document.getElementById("AccIPS_A").checked=false;
  document.getElementById("AccIPS_Amt2").readOnly=false; document.getElementById("AccIPS_Amt2").style.background='#FFFFFF';
  document.getElementById("AccIPS_Amt").value=0;}
  else if(v=='N'){document.getElementById("AccIPS_N").checked = true;document.getElementById("AccIPS_Y").checked=false;document.getElementById("AccIPS_YN").value='N';
  document.getElementById("AccIPS_Amt").readOnly=true; document.getElementById("AccIPS_Amt").style.background='#EAEAEA'; document.getElementById("AccIPS_A").checked=false;
  document.getElementById("AccIPS_Amt2").readOnly=true; document.getElementById("AccIPS_Amt2").style.background='#EAEAEA';}
  else if(v=='A'){document.getElementById("AccIPS_Y").checked=false; document.getElementById("AccIPS_N").checked = false; document.getElementById("AccIPS_YN").value='A'; 
  document.getElementById("AccIPS_Amt").readOnly=true;  document.getElementById("AccIPS_Amt").style.background='#EAEAEA'; document.getElementById("AccIPS_A").checked = true;
  document.getElementById("AccIPS_Amt2").readOnly=true;  document.getElementById("AccIPS_Amt2").style.background='#EAEAEA';}
}
function FunAMS(v)
{ if(v=='Y'){document.getElementById("AccAMS_Y").checked = true;document.getElementById("AccAMS_N").checked=false;document.getElementById("AccAMS_YN").value='Y';
  document.getElementById("AccAMS_Amt").readOnly=false; document.getElementById("AccAMS_Amt").style.background='#FFFFFF'; document.getElementById("AccAMS_A").checked=false;
  document.getElementById("AccAMS_Amt2").readOnly=false; document.getElementById("AccAMS_Amt2").style.background='#FFFFFF';
  document.getElementById("AccAMS_Amt").value=0;}
  else if(v=='N'){document.getElementById("AccAMS_Y").checked=false; document.getElementById("AccAMS_N").checked = true;document.getElementById("AccAMS_YN").value='N';
  document.getElementById("AccAMS_Amt").readOnly=true; document.getElementById("AccAMS_Amt").style.background='#EAEAEA'; document.getElementById("AccAMS_A").checked=false;
  document.getElementById("AccAMS_Amt2").readOnly=true; document.getElementById("AccAMS_Amt2").style.background='#EAEAEA';}
  else if(v=='A'){document.getElementById("AccAMS_Y").checked=false; document.getElementById("AccAMS_N").checked = false; document.getElementById("AccAMS_YN").value='A';
  document.getElementById("AccAMS_Amt").readOnly=true; document.getElementById("AccAMS_Amt").style.background='#EAEAEA'; document.getElementById("AccAMS_A").checked=true;
  document.getElementById("AccAMS_Amt2").readOnly=true; document.getElementById("AccAMS_Amt2").style.background='#EAEAEA';}
}
function FunSAR(v)
{ if(v=='Y'){document.getElementById("AccSAR_Y").checked = true;document.getElementById("AccSAR_N").checked=false;document.getElementById("AccSAR_YN").value='Y';
  document.getElementById("AccSAR_Amt").readOnly=false; document.getElementById("AccSAR_Amt").style.background='#FFFFFF'; document.getElementById("AccSAR_A").checked=false;
  document.getElementById("AccSAR_Amt2").readOnly=false; document.getElementById("AccSAR_Amt2").style.background='#FFFFFF';
  document.getElementById("AccSAR_Amt").value=0;}
  else if(v=='N'){document.getElementById("AccSAR_Y").checked=false; document.getElementById("AccSAR_N").checked = true;document.getElementById("AccSAR_YN").value='N';
  document.getElementById("AccSAR_Amt").readOnly=true; document.getElementById("AccSAR_Amt").style.background='#EAEAEA'; document.getElementById("AccSAR_A").checked=false;
  document.getElementById("AccSAR_Amt2").readOnly=true; document.getElementById("AccSAR_Amt2").style.background='#EAEAEA';}
  else if(v=='A'){document.getElementById("AccSAR_Y").checked=false; document.getElementById("AccSAR_N").checked = false; document.getElementById("AccSAR_YN").value='A';
  document.getElementById("AccSAR_Amt").readOnly=true; document.getElementById("AccSAR_Amt").style.background='#EAEAEA'; document.getElementById("AccSAR_A").checked=true;
  document.getElementById("AccSAR_Amt2").readOnly=true; document.getElementById("AccSAR_Amt2").style.background='#EAEAEA';}
}
function FunWGR(v)
{ if(v=='Y'){document.getElementById("AccWGR_Y").checked = true;document.getElementById("AccWGR_N").checked=false;document.getElementById("AccWGR_YN").value='Y';
  document.getElementById("AccWGR_Amt").readOnly=false; document.getElementById("AccWGR_Amt").style.background='#FFFFFF'; document.getElementById("AccWGR_A").checked=false;
  document.getElementById("AccWGR_Amt2").readOnly=false; document.getElementById("AccWGR_Amt2").style.background='#FFFFFF';
  document.getElementById("AccWGR_Amt").value=0;}
  else if(v=='N'){document.getElementById("AccWGR_Y").checked=false; document.getElementById("AccWGR_N").checked = true;document.getElementById("AccWGR_YN").value='N';
  document.getElementById("AccWGR_Amt").readOnly=true; document.getElementById("AccWGR_Amt").style.background='#EAEAEA'; document.getElementById("AccWGR_A").checked=false;
  document.getElementById("AccWGR_Amt2").readOnly=true; document.getElementById("AccWGR_Amt2").style.background='#EAEAEA';}
  else if(v=='A'){document.getElementById("AccWGR_Y").checked=false; document.getElementById("AccWGR_N").checked = false; document.getElementById("AccWGR_YN").value='A';
  document.getElementById("AccWGR_Amt").readOnly=true; document.getElementById("AccWGR_Amt").style.background='#EAEAEA'; document.getElementById("AccWGR_A").checked=true;
  document.getElementById("AccWGR_Amt2").readOnly=true; document.getElementById("AccWGR_Amt2").style.background='#EAEAEA';}
}
function FunSB(v)
{ if(v=='Y'){document.getElementById("AccSB_Y").checked = true;document.getElementById("AccSB_N").checked=false;document.getElementById("AccSB_YN").value='Y';
  document.getElementById("AccSB_Amt").readOnly=false; document.getElementById("AccSB_Amt").style.background='#FFFFFF'; document.getElementById("AccSB_A").checked=false;
  document.getElementById("AccSB_Amt2").readOnly=false; document.getElementById("AccSB_Amt2").style.background='#FFFFFF';
  document.getElementById("AccSB_Amt").value=0;}
  else if(v=='N'){document.getElementById("AccSB_Y").checked=false; document.getElementById("AccSB_N").checked = true;document.getElementById("AccSB_YN").value='N';
  document.getElementById("AccSB_Amt").readOnly=true; document.getElementById("AccSB_Amt").style.background='#EAEAEA'; document.getElementById("AccSB_A").checked=false;
  document.getElementById("AccSB_Amt2").readOnly=true; document.getElementById("AccSB_Amt2").style.background='#EAEAEA';}
  else if(v=='A'){document.getElementById("AccSB_Y").checked=false; document.getElementById("AccSB_N").checked = false; document.getElementById("AccSB_YN").value='A';
  document.getElementById("AccSB_Amt").readOnly=true; document.getElementById("AccSB_Amt").style.background='#EAEAEA'; document.getElementById("AccSB_A").checked=true;
  document.getElementById("AccSB_Amt2").readOnly=true; document.getElementById("AccSB_Amt2").style.background='#EAEAEA';}
}
function FunTDSA(v)
{ if(v=='Y'){document.getElementById("AccTDSA_Y").checked = true;document.getElementById("AccTDSA_N").checked=false;document.getElementById("AccTDSA_YN").value='Y';
  document.getElementById("AccTDSA_Amt").readOnly=false; document.getElementById("AccTDSA_Amt").style.background='#FFFFFF'; document.getElementById("AccTDSA_A").checked=false;
  document.getElementById("AccTDSA_Amt2").readOnly=false; document.getElementById("AccTDSA_Amt2").style.background='#FFFFFF';
  document.getElementById("AccTDSA_Amt").value=0;}
  else if(v=='N'){document.getElementById("AccTDSA_Y").checked=false; document.getElementById("AccTDSA_N").checked = true;document.getElementById("AccTDSA_YN").value='N';
  document.getElementById("AccTDSA_Amt").readOnly=true; document.getElementById("AccTDSA_Amt").style.background='#EAEAEA'; document.getElementById("AccTDSA_A").checked=false;
  document.getElementById("AccTDSA_Amt2").readOnly=true; document.getElementById("AccTDSA_Amt2").style.background='#EAEAEA';}
  else if(v=='A'){document.getElementById("AccTDSA_Y").checked=false; document.getElementById("AccTDSA_N").checked = false; document.getElementById("AccTDSA_YN").value='A';
  document.getElementById("AccTDSA_Amt").readOnly=true; document.getElementById("AccTDSA_Amt").style.background='#EAEAEA'; document.getElementById("AccTDSA_A").checked=true;
  document.getElementById("AccTDSA_Amt2").readOnly=true; document.getElementById("AccTDSA_Amt2").style.background='#EAEAEA';}
}

function FunAccAO(i,v)
{ if(v=='Y'){document.getElementById("AccAO_Y"+i).checked = true;document.getElementById("AccAO_N"+i).checked=false;document.getElementById("AccAO_YN"+i).value='Y';
  document.getElementById("AccAO_Amt"+i).readOnly=false; document.getElementById("AccAO_Amt"+i).style.background='#FFFFFF'; document.getElementById("AccAO_A"+i).checked=false;
  document.getElementById("AccAO2_Amt"+i).readOnly=false; document.getElementById("AccAO2_Amt"+i).style.background='#FFFFFF';
  document.getElementById("AccAO_Amt"+i).value=0;}
  else if(v=='N'){document.getElementById("AccAO_N"+i).checked = true;document.getElementById("AccAO_Y"+i).checked=false;document.getElementById("AccAO_YN"+i).value='N';
  document.getElementById("AccAO_Amt"+i).readOnly=true; document.getElementById("AccAO_Amt"+i).style.background='#EAEAEA'; document.getElementById("AccAO_A"+i).checked=false;
  document.getElementById("AccAO2_Amt"+i).readOnly=true; document.getElementById("AccAO2_Amt"+i).style.background='#EAEAEA';}
  else if(v=='A'){document.getElementById("AccAO_N"+i).checked = false;document.getElementById("AccAO_Y"+i).checked=false;document.getElementById("AccAO_YN"+i).value='A';
  document.getElementById("AccAO_Amt"+i).readOnly=true; document.getElementById("AccAO_Amt"+i).style.background='#EAEAEA'; document.getElementById("AccAO_A"+i).checked=true;
  document.getElementById("AccAO2_Amt"+i).readOnly=true; document.getElementById("AccAO2_Amt"+i).style.background='#EAEAEA';}
}

function ShowRowAcc(v)
{ if(v==8){var a=v+1; var m=v}
  else if(v>8 && v<15){var a=v+1; var m=v-1;}
  else if(v==15){var a=v; var m=v-1;}
  document.getElementById("addImg"+v).style.display = 'none'; document.getElementById("minusImg"+v).style.display = 'block'; document.getElementById("Row"+v).style.display = 'block';  document.getElementById("img"+a).style.display = 'block'; 
  if(v>8){document.getElementById("minusImg"+m).style.display = 'none';} 
  if(v<15){document.getElementById("addImg"+a).style.display = 'block';}
}

function HideRowAcc(v)
{ if(v==8){var a=v+1; var m=v}
  else if(v>8 && v<15){var a=v+1; var m=v-1;}
  else if(v==15){var a=v; var m=v-1;}
  document.getElementById("addImg"+v).style.display = 'block'; document.getElementById("minusImg"+v).style.display = 'none'; document.getElementById("Row"+v).style.display = 'none';
  if(v>8){document.getElementById("minusImg"+m).style.display = 'block';} 
  if(v<15){document.getElementById("addImg"+a).style.display = 'none';}
  document.getElementById("AccAO_Txt"+v).value = ""; document.getElementById("AccAO_Y"+v).checked = false; document.getElementById("AccAO_N"+v).checked = false; 
  document.getElementById("AccAO_A"+v).checked = false; 
  document.getElementById("AccAO_YN"+v).value = "";  document.getElementById("AccAO_Amt"+v).value = ""; document.getElementById("AccAO_Remark"+v).value = "";
}

function validate(formname)
{ 
 var Numfilter=/^[0-9. ]+$/;
 var AccECP_YN = formname.AccECP_YN.value; var AccECP_Amt = formname.AccECP_Amt.value; var AccECP_Amt2 = formname.AccECP_Amt2.value; 
 var AccECP_Remark = formname.AccECP_Remark.value; var test_num = Numfilter.test(AccECP_Amt); var test_num22 = Numfilter.test(AccECP_Amt2);
 if(AccECP_YN==''){alert("Please select option(yes/no) in expenses claim pending clearance.");  return false; }
 //if(AccECP_YN!='' && AccECP_YN=='N' && AccECP_Amt=='' && AccECP_Remark==''){alert("please enter expenses claim pending recovery amount & remark"); return false;}
 //if(AccECP_YN!='' && AccECP_YN=='N' && AccECP_Amt==''){alert("please enter expenses claim pending recovery amount"); return false;}
 if(AccECP_YN=='Y' && test_num==false){alert('Please enter only number in expenses claim pending amount field'); return false; }
 if(AccECP_YN=='Y' && test_num22==false){alert('Please enter only number in expenses claim pending amount field'); return false; }	
 if(AccECP_YN!='' && AccECP_YN=='N' && AccECP_Remark==''){alert("please enter expenses claim pending remark"); return false;}
 
 var AccIPS_YN = formname.AccIPS_YN.value; var AccIPS_Amt = formname.AccIPS_Amt.value; var AccIPS_Amt2 = formname.AccIPS_Amt2.value; 
 var AccIPS_Remark = formname.AccIPS_Remark.value; var test_num2 = Numfilter.test(AccIPS_Amt); var test_num33 = Numfilter.test(AccIPS_Amt2);
 if(AccIPS_YN==''){alert("Please select option(yes/no) in investment proofs submited clearance.");  return false; }
 //if(AccIPS_YN!='' && AccIPS_YN=='N' && AccIPS_Amt=='' && AccIPS_Remark==''){alert("please enter investment proofs submited recovery amount & remark"); return false;}
 //if(AccIPS_YN!='' && AccIPS_YN=='N' && AccIPS_Amt==''){alert("please enter investment proofs submited recovery amount"); return false;}
 if(AccIPS_YN=='Y' && test_num2==false){alert('Please enter only number in investment proofs submited amount field'); return false; }	
 if(AccIPS_YN=='Y' && test_num33==false){alert('Please enter only number in investment proofs submited amount field'); return false; }	
 if(AccIPS_YN!='' && AccIPS_YN=='N' && AccIPS_Remark==''){alert("please enter investment proofs submited remark"); return false;}
 
 var AccAMS_YN = formname.AccAMS_YN.value; var AccAMS_Amt = formname.AccAMS_Amt.value; var AccAMS_Amt2 = formname.AccAMS_Amt2.value; 
 var AccAMS_Remark = formname.AccAMS_Remark.value; var test_num2 = Numfilter.test(AccAMS_Amt); var test_num44 = Numfilter.test(AccAMS_Amt2);
 if(AccAMS_YN==''){alert("Please select option(yes/no) in advance amount settled clearance.");  return false; }
 //if(AccAMS_YN!='' && AccAMS_YN=='N' && AccAMS_Amt=='' && AccAMS_Remark==''){alert("please enter advance amount settled recovery amount & remark"); return false;}
 //if(AccAMS_YN!='' && AccAMS_YN=='N' && AccAMS_Amt==''){alert("please enter advance amount settled recovery amount"); return false;}
 if(AccAMS_YN=='Y' && test_num2==false){alert('Please enter only number in advance amount settled amount field'); return false; }	
 if(AccAMS_YN=='Y' && test_num44==false){alert('Please enter only number in advance amount settled amount field'); return false; }
 if(AccAMS_YN!='' && AccAMS_YN=='N' && AccAMS_Remark==''){alert("please enter advance amount settled remark"); return false;}
 
 var AccSAR_YN = formname.AccSAR_YN.value; var AccSAR_Amt = formname.AccSAR_Amt.value; var AccSAR_Amt2 = formname.AccSAR_Amt2.value; 
 var AccSAR_Remark = formname.AccSAR_Remark.value; var test_num2 = Numfilter.test(AccSAR_Amt); var test_num55 = Numfilter.test(AccSAR_Amt2);
 if(AccSAR_YN==''){alert("Please select option(yes/no) in salary advance recovery clearance.");  return false; }
 //if(AccSAR_YN!='' && AccSAR_YN=='N' && AccSAR_Amt=='' && AccSAR_Remark==''){alert("please enter salary advance recovery recovery amount & remark"); return false;}
 //if(AccSAR_YN!='' && AccSAR_YN=='N' && AccSAR_Amt==''){alert("please enter salary advance recovery recovery amount"); return false;}
 if(AccSAR_YN=='Y' && test_num2==false){alert('Please enter only number in salary advance recovery amount field'); return false; }	
 if(AccSAR_YN=='Y' && test_num55==false){alert('Please enter only number in salary advance recovery amount field'); return false; }	
 if(AccSAR_YN!='' && AccSAR_YN=='N' && AccSAR_Remark==''){alert("please enter salary advance recovery remark"); return false;}
 
 var AccWGR_YN = formname.AccWGR_YN.value; var AccWGR_Amt = formname.AccWGR_Amt.value; var AccWGR_Amt2 = formname.AccWGR_Amt2.value; 
 var AccWGR_Remark = formname.AccWGR_Remark.value; var test_num2 = Numfilter.test(AccWGR_Amt); var test_num66 = Numfilter.test(AccWGR_Amt2);
 if(AccWGR_YN==''){alert("Please select option(yes/no) in white goods recovery clearance.");  return false; }
 //if(AccWGR_YN!='' && AccWGR_YN=='N' && AccWGR_Amt=='' && AccWGR_Remark==''){alert("please enter white goods recovery recovery amount & remark"); return false;}
 //if(AccWGR_YN!='' && AccWGR_YN=='N' && AccWGR_Amt==''){alert("please enter white goods recovery recovery amount"); return false;}
 if(AccWGR_YN=='Y' && test_num2==false){alert('Please enter only number in white goods recovery amount field'); return false; }	
 if(AccWGR_YN=='Y' && test_num66==false){alert('Please enter only number in white goods recovery amount field'); return false; }
 if(AccWGR_YN!='' && AccWGR_YN=='N' && AccWGR_Remark==''){alert("please enter white goods recovery remark"); return false;}
 
 var AccSB_YN = formname.AccSB_YN.value; var AccSB_Amt = formname.AccSB_Amt.value; var AccSB_Amt2 = formname.AccSB_Amt2.value; 
 var AccSB_Remark = formname.AccSB_Remark.value; var test_num2 = Numfilter.test(AccSB_Amt); var test_num77 = Numfilter.test(AccSB_Amt2);
 if(AccSB_YN==''){alert("Please select option(yes/no) in service bond clearance.");  return false; }
 //if(AccSB_YN!='' && AccSB_YN=='N' && AccSB_Amt=='' && AccSB_Remark==''){alert("please enter service bond recovery amount & remark"); return false;}
 //if(AccSB_YN!='' && AccSB_YN=='N' && AccSB_Amt==''){alert("please enter service bond recovery amount"); return false;}
 if(AccSB_YN=='Y' && test_num2==false){alert('Please enter only number in service bond amount field'); return false; }	
 if(AccSB_YN=='Y' && test_num77==false){alert('Please enter only number in service bond amount field'); return false; }
 if(AccSB_YN!='' && AccSB_YN=='N' && AccSB_Remark==''){alert("please enter service bond remark"); return false;}
 
 var AccTDSA_YN = formname.AccTDSA_YN.value; var AccTDSA_Amt = formname.AccTDSA_Amt.value; var AccTDSA_Amt2 = formname.AccTDSA_Amt2.value; 
 var AccTDSA_Remark = formname.AccTDSA_Remark.value; var test_num2 = Numfilter.test(AccTDSA_Amt); var test_num88 = Numfilter.test(AccTDSA_Amt2);
 if(AccTDSA_YN==''){alert("Please select option(yes/no) in TDS adjustment clearance.");  return false; }
 //if(AccTDSA_YN!='' && AccTDSA_YN=='N' && AccTDSA_Amt=='' && AccTDSA_Remark==''){alert("please enter TDS adjustment recovery amount & remark"); return false;}
 //if(AccTDSA_YN!='' && AccTDSA_YN=='N' && AccTDSA_Amt==''){alert("please enter TDS adjustment recovery amount"); return false;}
 if(AccTDSA_YN=='Y' && test_num2==false){alert('Please enter only number in TDS adjustment amount field'); return false; }	
 if(AccTDSA_YN=='Y' && test_num88==false){alert('Please enter only number in TDS adjustment amount field'); return false; }
 if(AccTDSA_YN!='' && AccTDSA_YN=='N' && AccTDSA_Remark==''){alert("please enter TDS adjustment remark"); return false;}
 
 var AccAO_Txt8 = formname.AccAO_Txt8.value; var AccAO_YN8 = formname.AccAO_YN8.value; var AccAO_Amt8 = formname.AccAO_Amt8.value; var AccAO2_Amt8 = formname.AccAO2_Amt8.value; 
 var AccAO_Remark8 = formname.AccAO_Remark8.value; var AccAO_num8 = Numfilter.test(AccAO_Amt8); var AccAO2_num8 = Numfilter.test(AccAO2_Amt8);
 if(AccAO_Txt8!='' || AccAO_YN8!='')
 {
  if(AccAO_Txt8==''){alert("Please enter particular 8 name.");  return false; }
  if(AccAO_YN8==''){alert("Please select option(yes/no) in particular 8 clearance.");  return false; }
  //if(AccAO_YN8!='' && AccAO_YN8=='N' && AccAO_Amt8=='' && AccAO_Remark8==''){alert("please enter particular 8 recovery amount & remark"); return false;}
  //if(AccAO_YN8!='' && AccAO_YN8=='N' && AccAO_Amt8==''){alert("please enter particular 8 recovery amount"); return false;}
  if(AccAO_YN8=='Y' && AccAO_num8==false){alert('Please enter only number in particular 8 amount field'); return false; }	
  if(AccAO_YN8=='Y' && AccAO2_num8==false){alert('Please enter only number in particular 8 amount field'); return false; }
  if(AccAO_YN8!='' && AccAO_YN8=='N' && AccAO_Remark8==''){alert("please enter particular 8 remark"); return false;}
 }
 
 var AccAO_Txt9 = formname.AccAO_Txt9.value; var AccAO_YN9 = formname.AccAO_YN9.value; var AccAO_Amt9 = formname.AccAO_Amt9.value; var AccAO2_Amt9 = formname.AccAO2_Amt9.value;
 var AccAO_Remark9 = formname.AccAO_Remark9.value; var AccAO_num9 = Numfilter.test(AccAO_Amt9); var AccAO2_num9 = Numfilter.test(AccAO2_Amt9);
 if(AccAO_Txt9!='' || AccAO_YN9!='')
 {
  if(AccAO_Txt9==''){alert("Please enter particular 9 name.");  return false; }
  if(AccAO_YN9==''){alert("Please select option(yes/no) in particular 9 clearance.");  return false; }
  //if(AccAO_YN9!='' && AccAO_YN9=='N' && AccAO_Amt9=='' && AccAO_Remark9==''){alert("please enter particular 9 recovery amount & remark"); return false;}
  //if(AccAO_YN9!='' && AccAO_YN9=='N' && AccAO_Amt9==''){alert("please enter particular 9 recovery amount"); return false;}
  if(AccAO_YN9=='Y' && AccAO_num9==false){alert('Please enter only number in particular 9 amount field'); return false; }	
  if(AccAO_YN9=='Y' && AccAO2_num9==false){alert('Please enter only number in particular 9 amount field'); return false; }
  if(AccAO_YN9!='' && AccAO_YN9=='N' && AccAO_Remark9==''){alert("please enter particular 9 remark"); return false;}
 }
 
 var AccAO_Txt10 = formname.AccAO_Txt10.value; var AccAO_YN10 = formname.AccAO_YN10.value; var AccAO_Amt10 = formname.AccAO_Amt10.value;  var AccAO2_Amt10 = formname.AccAO2_Amt10.value;
 var AccAO_Remark10 = formname.AccAO_Remark10.value; var AccAO_num10 = Numfilter.test(AccAO_Amt10); var AccAO2_num10 = Numfilter.test(AccAO2_Amt10);
 if(AccAO_Txt10!='' || AccAO_YN10!='')
 {
  if(AccAO_Txt10==''){alert("Please enter particular 10 name.");  return false; }
  if(AccAO_YN10==''){alert("Please select option(yes/no) in particular 10 clearance.");  return false; }
  //if(AccAO_YN10!='' && AccAO_YN10=='N' && AccAO_Amt10=='' && AccAO_Remark10==''){alert("please enter particular 10 recovery amount & remark"); return false;}
  //if(AccAO_YN10!='' && AccAO_YN10=='N' && AccAO_Amt10==''){alert("please enter particular 10 recovery amount"); return false;}
  if(AccAO_YN10=='Y' && AccAO_num10==false){alert('Please enter only number in particular 10 amount field'); return false; }	
  if(AccAO_YN10=='Y' && AccAO2_num10==false){alert('Please enter only number in particular 10 amount field'); return false; }	
  if(AccAO_YN10!='' && AccAO_YN10=='N' && AccAO_Remark10==''){alert("please enter particular 10 remark"); return false;}
 }
 
  var AccAO_Txt11 = formname.AccAO_Txt11.value; var AccAO_YN11 = formname.AccAO_YN11.value; var AccAO_Amt11 = formname.AccAO_Amt11.value; var AccAO2_Amt11 = formname.AccAO2_Amt11.value;  var AccAO_Remark11 = formname.AccAO_Remark11.value; var AccAO_num11 = Numfilter.test(AccAO_Amt11); var AccAO2_num11 = Numfilter.test(AccAO2_Amt11);
 if(AccAO_Txt11!='' || AccAO_YN11!='')
 {
  if(AccAO_Txt11==''){alert("Please enter particular 11 name.");  return false; }
  if(AccAO_YN11==''){alert("Please select option(yes/no) in particular 11 clearance.");  return false; }
  //if(AccAO_YN11!='' && AccAO_YN11=='N' && AccAO_Amt11=='' && AccAO_Remark11==''){alert("please enter particular 11 recovery amount & remark"); return false;}
  //if(AccAO_YN11!='' && AccAO_YN11=='N' && AccAO_Amt11==''){alert("please enter particular 11 recovery amount"); return false;}
  if(AccAO_YN11=='Y' && AccAO_num11==false){alert('Please enter only number in particular 11 amount field'); return false; }	
  if(AccAO_YN11=='Y' && AccAO2_num11==false){alert('Please enter only number in particular 11 amount field'); return false; }	
  if(AccAO_YN11!='' && AccAO_YN11=='N' && AccAO_Remark11==''){alert("please enter particular 11 remark"); return false;}
 }
 
 var AccAO_Txt12 = formname.AccAO_Txt12.value; var AccAO_YN12 = formname.AccAO_YN12.value; var AccAO_Amt12 = formname.AccAO_Amt12.value; var AccAO2_Amt12 = formname.AccAO2_Amt12.value;
 var AccAO_Remark12 = formname.AccAO_Remark12.value; var AccAO_num12 = Numfilter.test(AccAO_Amt12); var AccAO2_num12 = Numfilter.test(AccAO2_Amt12);
 if(AccAO_Txt12!='' || AccAO_YN12!='')
 {
  if(AccAO_Txt12==''){alert("Please enter particular 12 name.");  return false; }
  if(AccAO_YN12==''){alert("Please select option(yes/no) in particular 12 clearance.");  return false; }
  //if(AccAO_YN12!='' && AccAO_YN12=='N' && AccAO_Amt12=='' && AccAO_Remark12==''){alert("please enter particular 12 recovery amount & remark"); return false;}
  //if(AccAO_YN12!='' && AccAO_YN12=='N' && AccAO_Amt12==''){alert("please enter particular 12 recovery amount"); return false;}
  if(AccAO_YN12=='Y' && AccAO_num12==false){alert('Please enter only number in particular 12 amount field'); return false; }	
  if(AccAO_YN12=='Y' && AccAO2_num12==false){alert('Please enter only number in particular 12 amount field'); return false; }
  if(AccAO_YN12!='' && AccAO_YN12=='N' && AccAO_Remark12==''){alert("please enter particular 12 remark"); return false;}
 }
 
 var AccAO_Txt13 = formname.AccAO_Txt13.value; var AccAO_YN13 = formname.AccAO_YN13.value; var AccAO_Amt13 = formname.AccAO_Amt13.value; var AccAO2_Amt13 = formname.AccAO2_Amt13.value; 
 var AccAO_Remark13 = formname.AccAO_Remark13.value; var AccAO_num13 = Numfilter.test(AccAO_Amt13); var AccAO2_num13 = Numfilter.test(AccAO2_Amt13);
 if(AccAO_Txt13!='' || AccAO_YN13!='')
 {
  if(AccAO_Txt13==''){alert("Please enter particular 13 name.");  return false; }
  if(AccAO_YN13==''){alert("Please select option(yes/no) in particular 13 clearance.");  return false; }
  //if(AccAO_YN13!='' && AccAO_YN13=='N' && AccAO_Amt13=='' && AccAO_Remark13==''){alert("please enter particular 13 recovery amount & remark"); return false;}
  //if(AccAO_YN13!='' && AccAO_YN13=='N' && AccAO_Amt13==''){alert("please enter particular 13 recovery amount"); return false;}
  if(AccAO_YN13=='Y' && AccAO_num13==false){alert('Please enter only number in particular 13 amount field'); return false; }	
  if(AccAO_YN13=='Y' && AccAO2_num13==false){alert('Please enter only number in particular 13 amount field'); return false; }
  if(AccAO_YN13!='' && AccAO_YN13=='N' && AccAO_Remark13==''){alert("please enter particular 13 remark"); return false;}
 }
 
 var AccAO_Txt14 = formname.AccAO_Txt14.value; var AccAO_YN14 = formname.AccAO_YN14.value; var AccAO_Amt14 = formname.AccAO_Amt14.value; var AccAO2_Amt14 = formname.AccAO2_Amt14.value;
 var AccAO_Remark14 = formname.AccAO_Remark14.value; var AccAO_num14 = Numfilter.test(AccAO_Amt14); var AccAO2_num14 = Numfilter.test(AccAO2_Amt14);
 if(AccAO_Txt14!='' || AccAO_YN14!='')
 {
  if(AccAO_Txt14==''){alert("Please enter particular 14 name.");  return false; }
  if(AccAO_YN14==''){alert("Please select option(yes/no) in particular 14 clearance.");  return false; }
  //if(AccAO_YN14!='' && AccAO_YN14=='N' && AccAO_Amt14=='' && AccAO_Remark14==''){alert("please enter particular 14 recovery amount & remark"); return false;}
  //if(AccAO_YN14!='' && AccAO_YN14=='N' && AccAO_Amt14==''){alert("please enter particular 14 recovery amount"); return false;}
  if(AccAO_YN14=='Y' && AccAO_num14==false){alert('Please enter only number in particular 14 amount field'); return false; }	
  if(AccAO_YN14=='Y' && AccAO2_num14==false){alert('Please enter only number in particular 14 amount field'); return false; }	
  if(AccAO_YN14!='' && AccAO_YN14=='N' && AccAO_Remark14==''){alert("please enter particular 14 remark"); return false;}
 }
 
 var AccAO_Txt15 = formname.AccAO_Txt15.value; var AccAO_YN15 = formname.AccAO_YN15.value; var AccAO_Amt15 = formname.AccAO_Amt15.value; var AccAO2_Amt15 = formname.AccAO2_Amt15.value; 
 var AccAO_Remark15 = formname.AccAO_Remark15.value; var AccAO_num15 = Numfilter.test(AccAO_Amt15); var AccAO2_num15 = Numfilter.test(AccAO2_Amt15);
 if(AccAO_Txt15!='' || AccAO_YN15!='')
 {
  if(AccAO_Txt15==''){alert("Please enter particular 15 name.");  return false; }
  if(AccAO_YN15==''){alert("Please select option(yes/no) in particular 15 clearance.");  return false; }
  //if(AccAO_YN15!='' && AccAO_YN15=='N' && AccAO_Amt15=='' && AccAO_Remark15==''){alert("please enter particular 15 recovery amount & remark"); return false;}
  //if(AccAO_YN15!='' && AccAO_YN15=='N' && AccAO_Amt15==''){alert("please enter particular 15 recovery amount"); return false;}
  if(AccAO_YN15=='Y' && AccAO_num15==false){alert('Please enter only number in particular 15 amount field'); return false; }	
  if(AccAO_YN15=='Y' && AccAO2_num15==false){alert('Please enter only number in particular 15 amount field'); return false; }
  if(AccAO_YN15!='' && AccAO_YN15=='N' && AccAO_Remark15==''){alert("please enter particular 15 remark"); return false;}
 }
 
 var AccECP_t = parseFloat(document.getElementById("AccECP_Amt").value); var AccIPS_t = parseFloat(document.getElementById("AccIPS_Amt").value);
 var AccAMS_t = parseFloat(document.getElementById("AccAMS_Amt").value); var AccSAR_t = parseFloat(document.getElementById("AccSAR_Amt").value);
 var AccWGR_t = parseFloat(document.getElementById("AccWGR_Amt").value); var AccSB_t = parseFloat(document.getElementById("AccSB_Amt").value);
 var AccTDSA_t = parseFloat(document.getElementById("AccTDSA_Amt").value);
 var AccAO_8t = parseFloat(document.getElementById("AccAO_Amt8").value); var AccAO_9t = parseFloat(document.getElementById("AccAO_Amt9").value);
 var AccAO_10t = parseFloat(document.getElementById("AccAO_Amt10").value); var AccAO_11t = parseFloat(document.getElementById("AccAO_Amt11").value);
 var AccAO_12t = parseFloat(document.getElementById("AccAO_Amt12").value); var AccAO_13t = parseFloat(document.getElementById("AccAO_Amt13").value);
 var AccAO_14t = parseFloat(document.getElementById("AccAO_Amt14").value); var AccAO_15t = parseFloat(document.getElementById("AccAO_Amt15").value);
 
 var AccECP_t2 = parseFloat(document.getElementById("AccECP_Amt2").value); var AccIPS_t2 = parseFloat(document.getElementById("AccIPS_Amt2").value);
 var AccAMS_t2 = parseFloat(document.getElementById("AccAMS_Amt2").value); var AccSAR_t2 = parseFloat(document.getElementById("AccSAR_Amt2").value);
 var AccWGR_t2 = parseFloat(document.getElementById("AccWGR_Amt2").value); var AccSB_t2 = parseFloat(document.getElementById("AccSB_Amt2").value);
 var AccTDSA_t2 = parseFloat(document.getElementById("AccTDSA_Amt2").value);
 var AccAO2_8t = parseFloat(document.getElementById("AccAO2_Amt8").value); var AccAO2_9t = parseFloat(document.getElementById("AccAO2_Amt9").value);
 var AccAO2_10t = parseFloat(document.getElementById("AccAO2_Amt10").value); var AccAO2_11t = parseFloat(document.getElementById("AccAO2_Amt11").value);
 var AccAO2_12t = parseFloat(document.getElementById("AccAO2_Amt12").value); var AccAO2_13t = parseFloat(document.getElementById("AccAO2_Amt13").value);
 var AccAO2_14t = parseFloat(document.getElementById("AccAO2_Amt14").value); var AccAO2_15t = parseFloat(document.getElementById("AccAO2_Amt15").value);
 
 var TotAmt = document.getElementById("TotAmt").value=Math.round((AccECP_t+AccIPS_t+AccAMS_t+AccSAR_t+AccWGR_t+AccSB_t+AccTDSA_t+AccAO_8t+AccAO_9t+AccAO_10t+AccAO_11t+AccAO_12t+AccAO_13t+AccAO_14t+AccAO_15t)*100)/100; 
 
 var TotAmt2 = document.getElementById("TotAmt2").value=Math.round((AccECP_t2+AccIPS_t2+AccAMS_t2+AccSAR_t2+AccWGR_t2+AccSB_t2+AccTDSA_t2+AccAO2_8t+AccAO2_9t+AccAO2_10t+AccAO2_11t+AccAO2_12t+AccAO2_13t+AccAO2_14t+AccAO2_15t)*100)/100; 
 
 var TotAccAmt= document.getElementById("TotAccAmt").value=Math.round((TotAmt+TotAmt2)*100)/100; 
 
 var agree=confirm("Are you sure..?");
 if(agree){ return true; }else{ return false; }
 
} 
</script>
<tr>
<?php /********************* TD-03 ***************************/ ?>
<form enctype="multipart/form-data" name="formname" method="post" onSubmit="return validate(this)">
<input type="hidden" name="HodId" id="HodId" value="<?php echo $resSE['Hod_EmployeeID']; ?>" /> 
<input type="hidden" id="si" name="si" value="<?php echo $_REQUEST['si']; ?>" /><input type="hidden" id="ei" name="ei" value="<?php echo $_REQUEST['ei']; ?>" />
<input type="hidden" id="ci" name="ci" value="<?php echo $_REQUEST['ci']; ?>" /><input type="hidden" name="Ename" id="Ename" value="<?php echo $NameE; ?>" />  
<td colspan="5" style="width:640px;" valign="top" align="center">
 <table border="0">
<?php $sqlAcc=mysql_query("select * from hrm_employee_separation_nocacc where EmpSepId=".$_REQUEST['si'], $con); 
      $rowAcc=mysql_num_rows($sqlAcc); if($rowAcc>0){$acc=mysql_fetch_assoc($sqlAcc);} ?>     
  <tr>
   <td>
    <table border="0" style="width:640px;">
	<?php ///***///?>
  <tr>
  <td colspan="2" align="Right">
   <table>
    <tr>
	 <td><font size="3" color="#007900"><?php echo $msgAcc.'&nbsp;'; if($resSE['Acc_NOC']=='Y'){ echo '<b>Account clearance ok</b> &nbsp;'; }?></font></td>
	 <?php if($resSE['Acc_NOC']=='N') { // AND date("Y-m-d")<$resSE['HR_Date'] ?>
	 <td>
      <?php if($rowAcc>0){ ?><input type="submit" id="submitAccNoc" name="submitAccNoc" value="submit" style="background-color:#FFCAFF;display:none;"/><?php } ?>
      <td><input type="submit" id="saveAccNoc" name="saveAccNoc" value="save" style="background-color:#FFCAFF;display:none;"/></td>
	 </td>
	 <td><input type="button" id="editAccNoc" name="editAccNoc" value="edit" style="background-color:#FFCAFF;display:block;" onClick="ClickEditAcc(<?php echo $rowAcc; ?>)"/></td>
	 <td><input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='SepAccClearForm.php?act=act&v=v&ss=vty&cc=Acc@~t~1212&p=value&a=app&true=false&si=<?php echo $_REQUEST['si']; ?>&ei=<?php echo $_REQUEST['ei']; ?>&ci=<?php echo $_REQUEST['ci']; ?>'" style="background-color:#FFCAFF;"/></td>
	 <?php } ?>
	</tr>
   </table>
   
  </td>
 </tr> 	
 <tr bgcolor="#FFFFDD">
  <td colspan="2">
  <table border="1"><tr><td colspan="2" class="Text" style="width:650px;color:#006200;background-color:#DFFFDF;" align="center"><b>ACCOUNT CLEARANCE FORM</b></td></tr></table>
  </td>
 </tr>
  <tr>	
  <td style="width:20px;"></td>
  <td style="width:650px;">
    <table border="1" style="width:650px;" bgcolor="#FFFFDD">
	  <tr bgcolor="#7a6189">
       <td class="Text" style="width:30px;color:#FFFFFF;" align="center"><b>Sn</b></td>
       <td class="Text" style="width:230px;color:#FFFFFF;" align="center"><b>Particular</b></td>
	   <td class="Text" style="width:150px;color:#FFFFFF;" align="center"><b>NA /Yes /No</b></td>
	   <td class="Text" style="width:70px;color:#FFFFFF;" align="center" valign="top"><b>Earning</b></td>
	   <td class="Text" style="width:70px;color:#FFFFFF;" align="center" valign="top"><b>Deduct</b></td>
	   <td class="Text" style="width:110px;color:#FFFFFF;" align="center"><b>Remark</b></td>
     </tr>	 
	<tr bgcolor="#FFFFFF">
       <td class="Text" style="width:30px;" align="center">1<input type="hidden" id="TotAmt" name="TotAmt" value="<?php echo $acc['TotAmt']; ?>" /><input type="hidden" id="TotAmt2" name="TotAmt2" value="<?php echo $acc['TotAmt2']; ?>" /><input type="hidden" id="TotAccAmt" name="TotAccAmt" value="<?php echo $acc['TotAccAmt']; ?>" /></td>
       <td class="Text" style="width:230px;" align="">&nbsp;Expenses Claim Pending</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<input type="checkbox" id="AccECP_A" onClick="FunECP('A')" <?php if($acc['AccECP']=='A'){echo 'Checked';} ?>/>
	   Yes<input type="checkbox" id="AccECP_Y" onClick="FunECP('Y')" <?php if($acc['AccECP']=='Y'){echo 'Checked';} ?>/>
	   No<input type="checkbox" id="AccECP_N" onClick="FunECP('N')" <?php if($acc['AccECP']=='N'){echo 'Checked';} ?>/>
	   <input type="hidden" id="AccECP_YN" name="AccECP_YN" value="<?php echo $acc['AccECP']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccECP']=='N' OR $acc['AccECP']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccECP_Amt" name="AccECP_Amt" value="<?php if($acc['AccECP_Amt']>0){echo intval($acc['AccECP_Amt']);}else{echo 0;} ?>" <?php if($acc['AccECP']=='N' OR $acc['AccECP']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccECP']=='N' OR $acc['AccECP']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccECP_Amt2" name="AccECP_Amt2" value="<?php if($acc['AccECP_Amt2']>0){echo intval($acc['AccECP_Amt2']);}else{echo 0;} ?>" <?php if($acc['AccECP']=='N' OR $acc['AccECP']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:110px;" align="center" valign="top">
	    <input id="AccECP_Remark" name="AccECP_Remark" style="width:100px;" value="<?php echo $acc['AccECP_Remark'] ?>" />
	   </td>
     </tr>
	 <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">2</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Investment Proofs Submited</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<input type="checkbox" id="AccIPS_A" onClick="FunIPS('A')" <?php if($acc['AccIPS']=='A'){echo 'Checked';} ?>/>
	   Yes<input type="checkbox" id="AccIPS_Y" onClick="FunIPS('Y')" <?php if($acc['AccIPS']=='Y'){echo 'Checked';} ?>/>
	   No<input type="checkbox" id="AccIPS_N" onClick="FunIPS('N')" <?php if($acc['AccIPS']=='N'){echo 'Checked';} ?>/>
	   <input type="hidden" id="AccIPS_YN" name="AccIPS_YN" value="<?php echo $acc['AccIPS']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccIPS']=='N' OR $acc['AccIPS']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccIPS_Amt" name="AccIPS_Amt" value="<?php if($acc['AccIPS_Amt']>0){echo intval($acc['AccIPS_Amt']);}else{echo 0;} ?>" <?php if($acc['AccIPS']=='N' OR $acc['AccIPS']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccIPS']=='N' OR $acc['AccIPS']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccIPS_Amt2" name="AccIPS_Amt2" value="<?php if($acc['AccIPS_Amt2']>0){echo intval($acc['AccIPS_Amt2']);}else{echo 0;} ?>" <?php if($acc['AccIPS']=='N' OR $acc['AccIPS']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:110px;" align="center" valign="top">
	    <input id="AccIPS_Remark" name="AccIPS_Remark" style="width:100px;" value="<?php echo $acc['AccIPS_Remark'] ?>" />
	   </td>
     </tr>
	 <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">3</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Advance Amount Recovery</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<input type="checkbox" id="AccAMS_A" onClick="FunAMS('A')" <?php if($acc['AccAMS']=='A'){echo 'Checked';} ?>/>
	   Yes<input type="checkbox" id="AccAMS_Y" onClick="FunAMS('Y')" <?php if($acc['AccAMS']=='Y'){echo 'Checked';} ?>/>
	   No<input type="checkbox" id="AccAMS_N" onClick="FunAMS('N')" <?php if($acc['AccAMS']=='N'){echo 'Checked';} ?>/>
	   <input type="hidden" id="AccAMS_YN" name="AccAMS_YN" value="<?php echo $acc['AccAMS']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccAMS']=='N' OR $acc['AccAMS']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccAMS_Amt" name="AccAMS_Amt" value="<?php if($acc['AccAMS_Amt']>0){echo intval($acc['AccAMS_Amt']);}else{echo 0;} ?>" <?php if($acc['AccAMS']=='N' OR $acc['AccAMS']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccAMS']=='N' OR $acc['AccAMS']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccAMS_Amt2" name="AccAMS_Amt2" value="<?php if($acc['AccAMS_Amt2']>0){echo intval($acc['AccAMS_Amt2']);}else{echo 0;} ?>" <?php if($acc['AccAMS']=='N' OR $acc['AccAMS']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:110px;" align="center" valign="top">
	    <input id="AccAMS_Remark" name="AccAMS_Remark" style="width:100px;" value="<?php echo $acc['AccAMS_Remark'] ?>" />
	   </td>
     </tr> 
	  <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">4</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Salary Advance Recovery</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<input type="checkbox" id="AccSAR_A" onClick="FunSAR('A')" <?php if($acc['AccSAR']=='A'){echo 'Checked';} ?>/>
	   Yes<input type="checkbox" id="AccSAR_Y" onClick="FunSAR('Y')" <?php if($acc['AccSAR']=='Y'){echo 'Checked';} ?>/>
	   No<input type="checkbox" id="AccSAR_N" onClick="FunSAR('N')" <?php if($acc['AccSAR']=='N'){echo 'Checked';} ?>/>
	   <input type="hidden" id="AccSAR_YN" name="AccSAR_YN" value="<?php echo $acc['AccSAR']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccSAR']=='N' OR $acc['AccSAR']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccSAR_Amt" name="AccSAR_Amt" value="<?php if($acc['AccSAR_Amt']>0){echo intval($acc['AccSAR_Amt']);}else{echo 0;} ?>" <?php if($acc['AccSAR']=='N' OR $acc['AccSAR']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccSAR']=='N' OR $acc['AccSAR']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccSAR_Amt2" name="AccSAR_Amt2" value="<?php if($acc['AccSAR_Amt2']>0){echo intval($acc['AccSAR_Amt2']);}else{echo 0;} ?>" <?php if($acc['AccSAR']=='N' OR $acc['AccSAR']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:110px;" align="center" valign="top">
	    <input id="AccSAR_Remark" name="AccSAR_Remark" style="width:100px;" value="<?php echo $acc['AccSAR_Remark'] ?>" />
	   </td>
     </tr> 
	 <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">5</td>
       <td class="Text" style="width:230px;" align="">&nbsp;White Goods Recovery</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<input type="checkbox" id="AccWGR_A" onClick="FunWGR('A')" <?php if($acc['AccWGR']=='A'){echo 'Checked';} ?>/>
	   Yes<input type="checkbox" id="AccWGR_Y" onClick="FunWGR('Y')" <?php if($acc['AccWGR']=='Y'){echo 'Checked';} ?>/>
	   No<input type="checkbox" id="AccWGR_N" onClick="FunWGR('N')" <?php if($acc['AccWGR']=='N'){echo 'Checked';} ?>/>
	   <input type="hidden" id="AccWGR_YN" name="AccWGR_YN" value="<?php echo $acc['AccWGR']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccWGR']=='N' OR $acc['AccWGR']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccWGR_Amt" name="AccWGR_Amt" value="<?php if($acc['AccWGR_Amt']>0){echo intval($acc['AccWGR_Amt']);}else{echo 0;} ?>" <?php if($acc['AccWGR']=='N' OR $acc['AccWGR']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccWGR']=='N' OR $acc['AccWGR']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccWGR_Amt2" name="AccWGR_Amt2" value="<?php if($acc['AccWGR_Amt2']>0){echo intval($acc['AccWGR_Amt2']);}else{echo 0;} ?>" <?php if($acc['AccWGR']=='N' OR $acc['AccWGR']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:110px;" align="center" valign="top">
	    <input id="AccWGR_Remark" name="AccWGR_Remark" style="width:100px;" value="<?php echo $acc['AccWGR_Remark'] ?>" />
	   </td>
     </tr> 
	 <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">6</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Service Bond</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<input type="checkbox" id="AccSB_A" onClick="FunSB('A')" <?php if($acc['AccSB']=='A'){echo 'Checked';} ?>/>
	   Yes<input type="checkbox" id="AccSB_Y" onClick="FunSB('Y')" <?php if($acc['AccSB']=='Y'){echo 'Checked';} ?>/>
	   No<input type="checkbox" id="AccSB_N" onClick="FunSB('N')" <?php if($acc['AccSB']=='N'){echo 'Checked';} ?>/>
	   <input type="hidden" id="AccSB_YN" name="AccSB_YN" value="<?php echo $acc['AccSB']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccSB']=='N' OR $acc['AccSB']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccSB_Amt" name="AccSB_Amt" value="<?php if($acc['AccSB_Amt']>0){echo intval($acc['AccSB_Amt']);}else{echo 0;} ?>" <?php if($acc['AccSB']=='N' OR $acc['AccSB']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccSB']=='N' OR $acc['AccSB']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccSB_Amt2" name="AccSB_Amt2" value="<?php if($acc['AccSB_Amt2']>0){echo intval($acc['AccSB_Amt2']);}else{echo 0;} ?>" <?php if($acc['AccSB']=='N' OR $acc['AccSB']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:110px;" align="center" valign="top">
	    <input id="AccSB_Remark" name="AccSB_Remark" style="width:100px;" value="<?php echo $acc['AccSB_Remark'] ?>" />
	   </td>
     </tr> 
	 <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">7</td>
       <td class="Text" style="width:230px;" align="">&nbsp;TDS Adjustment</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<input type="checkbox" id="AccTDSA_A" onClick="FunTDSA('A')" <?php if($acc['AccTDSA']=='A'){echo 'Checked';} ?>/>
	   Yes<input type="checkbox" id="AccTDSA_Y" onClick="FunTDSA('Y')" <?php if($acc['AccTDSA']=='Y'){echo 'Checked';} ?>/>
	   No<input type="checkbox" id="AccTDSA_N" onClick="FunTDSA('N')" <?php if($acc['AccTDSA']=='N'){echo 'Checked';} ?>/>
	   <input type="hidden" id="AccTDSA_YN" name="AccTDSA_YN" value="<?php echo $acc['AccTDSA']; ?>" /></td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccTDSA']=='N' OR $acc['AccTDSA']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccTDSA_Amt" name="AccTDSA_Amt" value="<?php if($acc['AccTDSA_Amt']>0){echo intval($acc['AccTDSA_Amt']);}else{echo 0;} ?>" <?php if($acc['AccTDSA']=='N' OR $acc['AccTDSA']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:70px;" align="center" valign="top">
	    <input style="width:68px;background-color:<?php if($acc['AccTDSA']=='N' OR $acc['AccTDSA']==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccTDSA_Amt2" name="AccTDSA_Amt2" value="<?php if($acc['AccTDSA_Amt2']>0){echo intval($acc['AccTDSA_Amt2']);}else{echo 0;} ?>" <?php if($acc['AccTDSA']=='N' OR $acc['AccTDSA']==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:110px;" align="center" valign="top">
	    <input id="AccTDSA_Remark" name="AccTDSA_Remark" style="width:100px;" value="<?php echo $acc['AccTDSA_Remark'] ?>" />
	   </td>
     </tr> 
	 <tr><td colspan="6" class="Text" style="background-color:#DDDDFF;" align="">&nbsp;<b>Any Other Clearance</b></td></tr>
	</table>
   </td>
   </tr> 
<?php if($resSE['Acc_NOC']=='N') { ?>
<?php for($i=8; $i<=15; $i++) { ?>  
  <tr>
   <td style="width:20px;display:<?php if($i==8){echo 'block';}else{echo 'none';}?>;" id="img<?php echo $i; ?>" align="center" align="center">
   <img src="images/Addnew.png" border="0" id="addImg<?php echo $i; ?>" style="display:<?php if($i==8){echo 'block';}else{echo 'none';}?>;" id="img<?php echo $i; ?>" onClick="ShowRowAcc(<?php echo $i; ?>)"/>
   <img src="images/Minusnew.png" id="minusImg<?php echo $i; ?>" style="display:none;" border="0" onClick="HideRowAcc(<?php echo $i; ?>)"/>
   </td>
   <td>
    <table style="width:650px;display:none;" id="Row<?php echo $i; ?>" border="1" cellspacing="0" bgcolor="#FFFFDD">
	  <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:38px;" align="center"><?php echo $i; ?></td>
       <td class="Text" style="width:190px;" align="" valign="top">
	   <input style="width:180px;" id="AccAO_Txt<?php echo $i; ?>" name="AccAO_Txt<?php echo $i; ?>" value="<?php echo $acc['AccAO_Txt'.$i]; ?>"/>
	   </td>
	   <td class="Text" style="width:165px;" align="center" valign="top">
	   NA<input type="checkbox" id="AccAO_A<?php echo $i; ?>" onClick="FunAccAO(<?php echo $i; ?>,'A')" <?php if($acc['AccAO'.$i]=='A'){echo 'Checked';} ?>/>
	   Yes<input type="checkbox" id="AccAO_Y<?php echo $i; ?>" onClick="FunAccAO(<?php echo $i; ?>,'Y')" <?php if($acc['AccAO'.$i]=='Y'){echo 'Checked';} ?>/>
	   No<input type="checkbox" id="AccAO_N<?php echo $i; ?>" onClick="FunAccAO(<?php echo $i; ?>,'N')" <?php if($acc['AccAO'.$i]=='N'){echo 'Checked';} ?>/>
	   <input type="hidden" id="AccAO_YN<?php echo $i; ?>" name="AccAO_YN<?php echo $i; ?>" value="<?php echo $acc['AccAO'.$i]; ?>" /></td>
	   <td class="Text" style="width:72px;" align="center" valign="top">
	    <input style="width:70px;background-color:<?php if($acc['AccAO'.$i]=='N' OR $acc['AccAO'.$i]==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccAO_Amt<?php echo $i; ?>" name="AccAO_Amt<?php echo $i; ?>" value="<?php if($acc['AccAO_Amt'.$i]>0){echo intval($acc['AccAO_Amt'.$i]);}else{echo 0;} ?>" <?php if($acc['AccAO'.$i]=='N' OR $acc['AccAO'.$i]==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:72px;" align="center" valign="top">
	    <input style="width:70px;background-color:<?php if($acc['AccAO'.$i]=='N' OR $acc['AccAO'.$i]==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccAO2_Amt<?php echo $i; ?>" name="AccAO2_Amt<?php echo $i; ?>" value="<?php if($acc['AccAO2_Amt'.$i]>0){echo intval($acc['AccAO2_Amt'.$i]);}else{echo 0;} ?>" <?php if($acc['AccAO'.$i]=='N' OR $acc['AccAO'.$i]==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:110px;" align="center" valign="top">
	    <input id="AccAO_Remark<?php echo $i; ?>" name="AccAO_Remark<?php echo $i; ?>" style="width:100px;" value="<?php echo $acc['AccAO_Remark'.$i] ?>" />
	   </td>
     </tr>
	</table>
   </td>
  </tr>
<?php } ?> 
<?php } elseif($resSE['Acc_NOC']=='Y') { ?>
<?php for($i=8; $i<=15; $i++) { if($acc['AccAO_Txt'.$i]!=''){ ?>  
  <tr>
   <td style="width:20px;block;" id="img<?php echo $i; ?>" align="center" align="center">&nbsp;</td>
   <td>
    <table style="width:650px;display:block;" id="Row<?php echo $i; ?>" border="1" cellspacing="0" bgcolor="#FFFFDD">
	  <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:38px;" align="center"><?php echo $i; ?></td>
       <td class="Text" style="width:190px;" align="" valign="top">
	   <input style="width:180px;" id="AccAO_Txt<?php echo $i; ?>" name="AccAO_Txt<?php echo $i; ?>" value="<?php echo $acc['AccAO_Txt'.$i]; ?>"/>
	   </td>
	   <td class="Text" style="width:165px;" align="center" valign="top">
	   NA<input type="checkbox" id="AccAO_A<?php echo $i; ?>" onClick="FunAccAO(<?php echo $i; ?>,'A')" <?php if($acc['AccAO'.$i]=='A'){echo 'Checked';} ?>/>
	   Yes<input type="checkbox" id="AccAO_Y<?php echo $i; ?>" onClick="FunAccAO(<?php echo $i; ?>,'Y')" <?php if($acc['AccAO'.$i]=='Y'){echo 'Checked';} ?>/>
	   No<input type="checkbox" id="AccAO_N<?php echo $i; ?>" onClick="FunAccAO(<?php echo $i; ?>,'N')" <?php if($acc['AccAO'.$i]=='N'){echo 'Checked';} ?>/>
	   <input type="hidden" id="AccAO_YN<?php echo $i; ?>" name="AccAO_YN<?php echo $i; ?>" value="<?php echo $acc['AccAO'.$i]; ?>" /></td>
	   <td class="Text" style="width:72px;" align="center" valign="top">
	    <input style="width:70px;background-color:<?php if($acc['AccAO'.$i]=='N' OR $acc['AccAO'.$i]==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccAO_Amt<?php echo $i; ?>" name="AccAO_Amt<?php echo $i; ?>" value="<?php if($acc['AccAO_Amt'.$i]>0){echo intval($acc['AccAO_Amt'.$i]);}else{echo 0;} ?>" <?php if($acc['AccAO'.$i]=='N' OR $acc['AccAO'.$i]==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:72px;" align="center" valign="top">
	    <input style="width:70px;background-color:<?php if($acc['AccAO'.$i]=='N' OR $acc['AccAO'.$i]==''){echo '#EAEAEA';}else{echo '#FFFFFF';} ?>;text-align:right;" id="AccAO2_Amt<?php echo $i; ?>" name="AccAO2_Amt<?php echo $i; ?>" value="<?php if($acc['AccAO2_Amt'.$i]>0){echo intval($acc['AccAO2_Amt'.$i]);}else{echo 0;} ?>" <?php if($acc['AccAO'.$i]=='N' OR $acc['AccAO'.$i]==''){echo 'readonly';} ?>/>
	   </td>
	   <td class="Text" style="width:110px;" align="center" valign="top">
	    <input id="AccAO_Remark<?php echo $i; ?>" name="AccAO_Remark<?php echo $i; ?>" style="width:100px;" value="<?php echo $acc['AccAO_Remark'.$i] ?>" />
	   </td>
     </tr>
	</table>
   </td>
  </tr>
<?php } } ?> 

<?php } ?>
  <tr>
   <td style="width:20px;" align="center" align="center"></td>
   <td>
    <table style="width:650px;" border="1" cellspacing="0" bgcolor="#FFFFDD">
	  <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:260px;">&nbsp;<b>Any Other Remark</b></td>
	   <td class="Text" style="width:400px;" align="center" valign="top">
	    <input id="AccOth_Remark" name="AccOth_Remark" style="width:400px;" value="<?php echo $res['AccOth_Remark']; ?>" maxlength="190" />
	   </td> 
     </tr>
	</table>
   </td>
  </tr>
   <?php ///***///?>
   </table>
   </td>
  </tr>
  <tr><td>&nbsp;</td></tr>
<?php /*********** Overall Caculation Open *************/ ?>  
  <tr>
   <td>
      <table border="1" bgcolor="#FFFFFF">
<tr bgcolor="#7a6189"><td colspan="3" class="Text" align="center" style="width:360px;color:#FFFFFF;"><b>Overall Caculation</b></td></tr>	  
<tr bgcolor="#7a6189">
  <td class="Text" align="center" style="width:200px;color:#FFFFFF;"><b>Total Clearance</b></td>
  <td class="Text" align="center" style="width:80px;color:#FFFFFF;"><b>Earning</b></td>
  <td class="Text" align="center" style="width:80px;color:#FFFFFF;"><b>Deduction</b></td>
</tr>	
<tr>
  <td class="Text" style="width:200px;">&nbsp;HR</td>
  <td class="Text" align="center" style="width:80px;"><input style="width:80px;text-align:right;background-color:#FFFFFF;" id="HR_Earn" name="HR_Earn" value="<?php if($resSE['HR_Earn']>0){echo intval($resSE['HR_Earn']);}else{echo 0;} ?>" readonly/></td>
  <td class="Text" align="center" style="width:80px;"><input style="width:80px;text-align:right;background-color:#FFFFFF;" id="HR_Deduct" name="HR_Deduct" value="<?php if($resSE['HR_Deduct']>0){echo intval($resSE['HR_Deduct']);}else{echo 0;} ?>" readonly/></td>
</tr>	
<tr>
  <td class="Text" style="width:200px;">&nbsp;IT</td>
  <td class="Text" align="center" style="width:80px;"><input style="width:80px;text-align:right;background-color:#FFFFFF;" id="IT_Earn" name="IT_Earn" value="<?php if($resSE['IT_Earn']>0){echo intval($resSE['IT_Earn']);}else{echo 0;} ?>" readonly/></td>
  <td class="Text" align="center" style="width:80px;"><input style="width:80px;text-align:right;background-color:#FFFFFF;" id="IT_Deduct" name="IT_Deduct" value="<?php if($resSE['IT_Deduct']>0){echo intval($resSE['IT_Deduct']);}else{echo 0;} ?>" readonly/></td>
</tr>	
<tr>
  <td class="Text" style="width:200px;">&nbsp;Reporting Manager</td>
  <td class="Text" align="center" style="width:80px;"><input style="width:80px;text-align:right;background-color:#FFFFFF;" id="Rep_Earn" name="Rep_Earn" value="<?php if($resSE['Rep_Earn']>0){echo intval($resSE['Rep_Earn']);}else{echo 0;} ?>" readonly/></td>
  <td class="Text" align="center" style="width:80px;"><input style="width:80px;text-align:right;background-color:#FFFFFF;" id="Rep_Deduct" name="Rep_Deduct" value="<?php if($resSE['Rep_Deduct']>0){echo intval($resSE['Rep_Deduct']);}else{echo 0;} ?>" readonly/></td>
</tr>	
<tr>
  <td class="Text" style="width:200px;">&nbsp;Account</td>
  <td class="Text" align="center" style="width:80px;"><input style="width:80px;text-align:right;background-color:#FFFFFF;" id="Acc_Earn" name="Acc_Earn" value="<?php if($resSE['Acc_Earn']>0){echo intval($resSE['Acc_Earn']);}else{echo 0;} ?>" readonly/></td>
  <td class="Text" align="center" style="width:80px;"><input style="width:80px;text-align:right;background-color:#FFFFFF;" id="Acc_Deduct" name="Acc_Deduct" value="<?php if($resSE['Acc_Deduct']>0){echo intval($resSE['Acc_Deduct']);}else{echo 0;} ?>" readonly/></td>
</tr>	
<?php 
$TotalEarn=$resSE['HR_Earn']+$resSE['IT_Earn']+$resSE['Rep_Earn']+$resSE['Acc_Earn']; 
$TotalDeduct=$resSE['HR_Deduct']+$resSE['IT_Deduct']+$resSE['Rep_Deduct']+$resSE['Acc_Deduct'];
?>
<tr bgcolor="#0079F2">
  <td class="Text" style="width:200px;color:#FFFFFF;" align="right"><b>Total Amount :</b>&nbsp;</td>
  <td class="Text" align="center" style="width:80px;"><input style="width:80px;text-align:right;background-color:#0079F2;color:#FFFFFF;font-weight:bold;" id="Total_Earn" name="Total_Earn" value="<?php if($TotalEarn!=''){echo intval($TotalEarn);}else{echo 0;} ?>" readonly/></td>
  <td class="Text" align="center" style="width:80px;"><input style="width:80px;text-align:right;background-color:#0079F2;color:#FFFFFF;font-weight:bold;" id="Total_Deduct" name="Total_Deduct" value="<?php if($TotalDeduct!=''){echo intval($TotalDeduct);}else{echo 0;} ?>" readonly/></td>
</tr>	
   </table> 
   </td>
  </tr>
<?php /*********** Overall Caculation Colse *************/ ?>  
 </table>
</td>
</form>
</tr>
<?php /**************** Acoount Close Acoount CloseAcoount CloseAcoount CloseAcoount CloseAcoount CloseAcoount CloseAcoount CloseAcoount Close *************************/ ?>	 
	 
	 
	 
	 
	 
	 
	</table>
   </td>
  </tr>
   </table>
   </td>
  </tr>
 </table>
</td>
</tr>
</table>  
</td></tr>
</table>
<?php } ?>	
</center></body>
</html>
