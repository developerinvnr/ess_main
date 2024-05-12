<?php 

if(isset($_POST['SavePF']))

{ if($_POST['con_for_arrCalcu']=='') { $_POST['con_for_arrCalcu']=0;} else { $_POST['con_for_arrCalcu']=1;}
  $SqlQuery=mysql_query("Select * from hrm_company_statutory_pf WHERE CompanyId=".$_POST['CompanyId'], $con); $ResultRow=mysql_num_rows($SqlQuery); 
  if($ResultRow==0)
   { 
    $SqlInseart = mysql_query("INSERT INTO hrm_company_statutory_pf(CompanyId, Pf_PfStatusCode, Pf_Prifix, Pf_EstablishmentCode, Pf_MaxSalPf, Pf_MaxSalEps, Pf_MaxSalDli, Pf_PfDeducRate, Pf_EpsContriRate, Pf_PfContriRate, Pf_DliContribution, Pf_PfAdminCharge, Pf_DliAdminCharge, Pf_Consider_for_Arrears,CreatedBy,CreatedDate,YearId) VALUES('".$_POST['CompanyId']."', '".$_POST['Pf_StatusCode']."', '".$_POST['Prifix']."', '".$_POST['EstacodeNo']."', '".$_POST['MaxSalPF']."', '".$_POST['MaxSalEPS']."', '".$_POST['MaxSalDLI']."', '".$_POST['PFDeduct']."', '".$_POST['EPSContribute']."', '".$_POST['PFContribute']."', '".$_POST['EDLIContribute']."', '".$_POST['PFAdminCharge']."', '".$_POST['EDLIAdminCharge']."', '".$_POST['con_for_arrCalcu']."','".$UserId."','".date('Y-m-d')."','".$YearId."')", $con); 
     if($SqlInseart){ $msg = "Data has been Updated successfully..."; }
   }
   else   
    { 
     $Sql2=mysql_query("Select * from hrm_company_statutory_pf WHERE PfID='".$_POST['PfId']."' AND CompanyId=".$_POST['CompanyId'], $con); $Result2 = mysql_fetch_assoc($Sql2); 
     $SqlInseart2 = mysql_query("INSERT INTO hrm_company_statutory_pf_event(PfID, CompanyId, Pf_PfStatusCode, Pf_Prifix, Pf_EstablishmentCode, Pf_MaxSalPf, Pf_MaxSalEps, Pf_MaxSalDli, Pf_PfDeducRate, Pf_EpsContriRate, Pf_PfContriRate, Pf_DliContribution, Pf_PfAdminCharge, Pf_DliAdminCharge, Pf_Consider_for_Arrears,Status,CreatedBy,CreatedDate,YearId) VALUES('".$Result2['PfID']."', '".$Result2['CompanyId']."', '".$Result2['Pf_PfStatusCode']."', '".$Result2['Pf_Prifix']."', '".$Result2['Pf_EstablishmentCode']."', '".$Result2['Pf_MaxSalPf']."', '".$Result2['Pf_MaxSalEps']."', '".$Result2['Pf_MaxSalDli']."', '".$Result2['Pf_PfDeducRate']."', '".$Result2['Pf_EpsContriRate']."', '".$Result2['Pf_PfContriRate']."', '".$Result2['Pf_DliContribution']."', '".$Result2['Pf_PfAdminCharge']."', '".$Result2['Pf_DliAdminCharge']."', '".$Result2['Pf_Consider_for_Arrears']."','".$Result2['Status']."',".$Result2['CreatedBy'].",'".$Result2['CreatedDate']."',".$Result2['YearId'].")"); 
     if($SqlInseart2)
	 {
	   $SqlUpdate = mysql_query("UPDATE hrm_company_statutory_pf SET Pf_PfStatusCode='".$_POST['Pf_StatusCode']."', Pf_Prifix='".$_POST['Prifix']."', Pf_EstablishmentCode='".$_POST['EstacodeNo']."', Pf_MaxSalPf='".$_POST['MaxSalPF']."', Pf_MaxSalEps='".$_POST['MaxSalEPS']."', Pf_MaxSalDli='".$_POST['MaxSalDLI']."', Pf_PfDeducRate='".$_POST['PFDeduct']."', Pf_EpsContriRate='".$_POST['EPSContribute']."', Pf_PfContriRate='".$_POST['PFContribute']."', Pf_DliContribution='".$_POST['EDLIContribute']."', Pf_PfAdminCharge='".$_POST['PFAdminCharge']."', Pf_DliAdminCharge='".$_POST['EDLIAdminCharge']."', Pf_Consider_for_Arrears='".$_POST['con_for_arrCalcu']."', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."', YearId=".$YearId." WHERE PfID='".$_POST['PfId']."'", $con) or die(mysql_error());
	   if($SqlUpdate){ $msg = "Data has been updated successfully..."; }
	 }
   }  
}



if(isset($_POST['SaveESIC']))

{ 

  $SqlQuery=mysql_query("Select * from hrm_company_statutory_esic WHERE CompanyId=".$_POST['CompanyId'], $con); $ResultRow=mysql_num_rows($SqlQuery); 

  if($ResultRow==0)

   { 

    $SqlInseart = mysql_query("INSERT INTO hrm_company_statutory_esic(CompanyId, Esic_EmployerCode, Esic_MaxSalEsic, Esic_DeducRate, Esic_ContriRate, CreatedBy, CreatedDate, YearId) VALUES('".$_POST['CompanyId']."', '".$_POST['EmployerCodeNo']."', '".$_POST['MaxSalESIC']."', '".$_POST['ESICDeduction']."', '".$_POST['ESICContribute']."', '".$UserId."', '".date('Y-m-d')."', '".$YearId."')", $con); 

     if($SqlInseart){ $msg = "Data has been Updated successfully..."; }

   }

   else   

    { 

     $Sql2=mysql_query("Select * from hrm_company_statutory_esic WHERE EsicID='".$_POST['EsicId']."' AND CompanyId=".$_POST['CompanyId']); $Result2 = mysql_fetch_assoc($Sql2); 

     $SqlInseart2 = mysql_query("INSERT INTO hrm_company_statutory_esic_event(EsicID, CompanyId, Esic_EmployerCode, Esic_MaxSalEsic, Esic_DeducRate, Esic_ContriRate, Status, CreatedBy, CreatedDate, YearId) VALUES('".$Result2['EsicID']."', '".$Result2['CompanyId']."', '".$Result2['Esic_EmployerCode']."', '".$Result2['Esic_MaxSalEsic']."', '".$Result2['Esic_DeducRate']."', '".$Result2['Esic_ContriRate']."', '".$Result2['Status']."',".$Result2['CreatedBy'].",'".$Result2['CreatedDate']."',".$Result2['YearId'].")", $con); 

     if($SqlInseart2)

	 {

	   $SqlUpdate = mysql_query("UPDATE hrm_company_statutory_esic SET Esic_EmployerCode='".$_POST['EmployerCodeNo']."', Esic_MaxSalEsic='".$_POST['MaxSalESIC']."', Esic_DeducRate='".$_POST['ESICDeduction']."', Esic_ContriRate='".$_POST['ESICContribute']."', CreatedBy='".$UserId."', CreatedDate='".date('Y-m-d')."' WHERE EsicID='".$_POST['EsicId']."'", $con) or die(mysql_error());

	   if($SqlUpdate){ $msg = "Data has been updated successfully..."; }

	 }

   }  

}

if(isset($_POST['SaveTDS']))
{ 
  $SqlQuery=mysql_query("Select * from hrm_company_statutory_tds WHERE CompanyId=".$_POST['CompanyId'], $con); $ResultRow=mysql_num_rows($SqlQuery); 
  if($ResultRow==0)
   { 
    $SqlInseart = mysql_query("INSERT INTO hrm_company_statutory_tds(CompanyId, Tds_Pan, Tds_Tan, Tds_Person, Tds_Designation, Tds_TdsCircle, Tds_SonOFDoOF, Tds_DeFaultHraCalculation, ProTax, OtherEduCess, TDSMax80C, MaxIncHomeProperty, Rebate, RebateRs86, RebateRs89, RebateRs90, RebateRs90A, RebateRs91, RebateRsIncomeUp, Surcharge, SurchargeTaxIncome, CreatedBy, CreatedDate, YearId) VALUES('".$_POST['CompanyId']."', '".$_POST['PAN']."', '".$_POST['TAN']."', '".$_POST['TDSPerson']."', '".$_POST['TDSDesignation']."', '".$_POST['TDSCircle']."', '".$_POST['TDSDoSo']."', '".$_POST['DefaulHRACal']."', '".$_POST['PTax']."', ".$_POST['OtherEduCess'].", '".$_POST['TDSMax80C']."', '".$_POST['IncHouseProperty']."', '".$_POST['Rebate']."', '".$_POST['Rebate86']."', '".$_POST['Rebate89']."', '".$_POST['Rebate90']."', '".$_POST['Rebate90A']."', '".$_POST['Rebate91']."', '".$_POST['RebateRsInComeUp']."', '".$_POST['Surcharge']."', '".$_POST['SurchargeTaxIncome']."', '".$UserId."', '".date('Y-m-d')."', '".$YearId."')", $con); 
     if($SqlInseart){ $msg = "Data has been Updated successfully..."; } 
   }
   else   
    { 
     $Sql2=mysql_query("Select * from hrm_company_statutory_tds WHERE TdsID='".$_POST['TdsId']."' AND CompanyId=".$_POST['CompanyId']); $Result2 = mysql_fetch_assoc($Sql2);     $SqlInseart2 = mysql_query("INSERT INTO hrm_company_statutory_tds_event(TdsID, CompanyId, Tds_Pan, Tds_Tan, Tds_Person, Tds_Designation, Tds_TdsCircle, Tds_SonOFDoOF, Tds_DeFaultHraCalculation, ProTax, OtherEduCess, TDSMax80C, MaxIncHomeProperty, Rebate, RebateRs86, RebateRs89, RebateRs90, RebateRs90A, RebateRs91, RebateRsIncomeUp, Surcharge, SurchargeTaxIncome, Status, CreatedBy, CreatedDate, YearId) VALUES('".$Result2['TdsID']."', '".$Result2['CompanyId']."', '".$Result2['Tds_Pan']."', '".$Result2['Tds_Tan']."', '".$Result2['Tds_Person']."', '".$Result2['Tds_Designation']."', '".$Result2['Tds_TdsCircle']."', '".$Result2['Tds_SonOFDoOF']."', '".$Result2['Tds_DeFaultHraCalculation']."', '".$Result2['ProTax']."', '".$Result2['OtherEduCess']."', '".$Result2['TDSMax80C']."', '".$Result2['MaxIncHomeProperty']."', '".$Result2['Rebate']."', '".$Result2['RebateRs86']."', '".$Result2['RebateRs89']."', '".$Result2['RebateRs90']."', '".$Result2['RebateRs90A']."', '".$Result2['RebateRs91']."', '".$Result2['RebateRsIncomeUp']."', '".$Result2['Surcharge']."', '".$Result2['SurchargeTaxIncome']."', '".$Result2['Status']."',".$Result2['CreatedBy'].",'".$Result2['CreatedDate']."',".$Result2['YearId'].")", $con); 
     if($SqlInseart2)
	 { $SqlUpdate = mysql_query("UPDATE hrm_company_statutory_tds SET Tds_Pan='".$_POST['PAN']."', Tds_Tan='".$_POST['TAN']."', Tds_Person='".$_POST['TDSPerson']."', Tds_Designation='".$_POST['TDSDesignation']."', Tds_TdsCircle='".$_POST['TDSCircle']."', Tds_SonOFDoOF='".$_POST['TDSDoSo']."', Tds_DeFaultHraCalculation='".$_POST['DefaulHRACal']."', ProTax='".$_POST['PTax']."', OtherEduCess=".$_POST['OtherEduCess'].", TDSMax80C='".$_POST['TDSMax80C']."', MaxIncHomeProperty='".$_POST['IncHouseProperty']."', Rebate='".$_POST['Rebate']."', RebateRs86='".$_POST['Rebate86']."', RebateRs89='".$_POST['Rebate89']."', RebateRs90='".$_POST['Rebate90']."', RebateRs90A='".$_POST['Rebate90A']."', RebateRs91='".$_POST['Rebate91']."', RebateRsIncomeUp='".$_POST['RebateRsInComeUp']."', Surcharge='".$_POST['Surcharge']."', SurchargeTaxIncome='".$_POST['SurchargeTaxIncome']."', CreatedBy='".$UserId."', CreatedDate='".date('Y-m-d')."' WHERE TdsID='".$_POST['TdsId']."'", $con) or die(mysql_error());
	   if($SqlUpdate){ $msg = "Data has been updated successfully..."; }
	 }
   }  
   
  //$SqlCheck=mysql_query("Select * from hrm_company_tds_slab WHERE CompanyId=".$_POST['CompanyId'], $con); $ResultRow=mysql_num_rows($SqlQuery); 
  for($i=1; $i<=$_POST['TaxRowNo']; $i++)
  { $sqlUpSlab=mysql_query("update hrm_company_tds_slab_general set ValueFrom=".$_POST['VFrom_'.$i].", ValueTo=".$_POST['VTo_'.$i].", TaxValue=".$_POST['TaxV_'.$i].", Status='".$_POST['VStatus_'.$i]."' where SlabId=".$i, $con); }   
  for($j=1; $j<=$_POST['Wo_TaxRowNo']; $j++)
  { $sqlUpSlab=mysql_query("update hrm_company_tds_slab_women set ValueFrom=".$_POST['Wo_VFrom_'.$j].", ValueTo=".$_POST['Wo_VTo_'.$j].", TaxValue=".$_POST['Wo_TaxV_'.$j].", Status='".$_POST['Wo_VStatus_'.$j]."' where SlabId=".$j, $con); } 
   for($k=1; $k<=$_POST['A60B80_TaxRowNo']; $k++)
  { $sqlUpSlab=mysql_query("update hrm_company_tds_slab_a60b80 set ValueFrom=".$_POST['A60B80_VFrom_'.$k].", ValueTo=".$_POST['A60B80_VTo_'.$k].", TaxValue=".$_POST['A60B80_TaxV_'.$k].", Status='".$_POST['A60B80_VStatus_'.$k]."' where SlabId=".$k, $con); } 
   for($l=1; $l<=$_POST['A80_TaxRowNo']; $l++)
  { $sqlUpSlab=mysql_query("update hrm_company_tds_slab_a80 set ValueFrom=".$_POST['A80_VFrom_'.$l].", ValueTo=".$_POST['A80_VTo_'.$l].", TaxValue=".$_POST['A80_TaxV_'.$l].", Status='".$_POST['A80_VStatus_'.$l]."' where SlabId=".$l, $con); } 
}



if(isset($_POST['SaveLumpsum']))

{ 

  $SqlQuery=mysql_query("Select * from hrm_company_statutory_lumpsum WHERE CompanyId=".$_POST['CompanyId'], $con); $ResultRow=mysql_num_rows($SqlQuery); 

  if($ResultRow==0)

   { 

    $SqlInseart = mysql_query("INSERT INTO hrm_company_statutory_lumpsum(CompanyId, Lumpsum_MaxBonus, Lumpsum_BonusContribute, Lumpsum_BonusMonth, Lumpsum_MaxGratuity, Lumpsum_GratuityDay, CreatedBy, CreatedDate, YearId) VALUES('".$_POST['CompanyId']."', '".$_POST['MaxBonus']."', '".$_POST['BonusContribute']."', '".$_POST['BonusMonth']."', '".$_POST['MaxGratuity']."', '".$_POST['GratuityDay']."', '".$UserId."', '".date('Y-m-d')."', '".$YearId."')", $con); 

     if($SqlInseart){ $msg = "Data has been Updated successfully..."; }

   }

   else   

    { 

     $Sql2=mysql_query("Select * from hrm_company_statutory_lumpsum WHERE LumpsumID='".$_POST['LumpsumId']."' AND CompanyId=".$_POST['CompanyId'], $con); $Result2 = mysql_fetch_assoc($Sql2);     $SqlInseart2 = mysql_query("INSERT INTO hrm_company_statutory_lumpsum_event(LumpsumID, CompanyId, Lumpsum_MaxBonus, Lumpsum_BonusContribute, Lumpsum_BonusMonth, Lumpsum_MaxGratuity, Lumpsum_GratuityDay, Status, CreatedBy, CreatedDate, YearId) VALUES('".$Result2['LumpsumID']."', '".$Result2['CompanyId']."', '".$Result2['Lumpsum_MaxBonus']."', '".$Result2['Lumpsum_BonusContribute']."', '".$Result2['Lumpsum_BonusMonth']."', '".$Result2['Lumpsum_MaxGratuity']."', '".$Result2['Lumpsum_GratuityDay']."', '".$Result2['Status']."',".$Result2['CreatedBy'].",'".$Result2['CreatedDate']."',".$Result2['YearId'].")", $con); 

     if($SqlInseart2)

	 {

	   $SqlUpdate = mysql_query("UPDATE hrm_company_statutory_lumpsum SET Lumpsum_MaxBonus='".$_POST['MaxBonus']."', Lumpsum_BonusContribute='".$_POST['BonusContribute']."', Lumpsum_BonusMonth='".$_POST['BonusMonth']."', Lumpsum_MaxGratuity='".$_POST['MaxGratuity']."', Lumpsum_GratuityDay='".$_POST['GratuityDay']."', CreatedBy='".$UserId."', CreatedDate='".date('Y-m-d')."' WHERE LumpsumID='".$_POST['LumpsumId']."'", $con) or die(mysql_error());

	   if($SqlUpdate){ $msg = "Data has been updated successfully..."; }

	 }

   }  

}





if(isset($_POST['SaveTaxSaving']))

{ 

  $SqlQuery=mysql_query("Select * from hrm_company_statutory_taxsaving WHERE CompanyId=".$_POST['CompanyId'], $con); $ResultRow=mysql_num_rows($SqlQuery); 

  if($ResultRow==0)

   { 

    $SqlInseart = mysql_query("INSERT INTO hrm_company_statutory_taxsaving(CompanyId, ConvanceAllow, MR_PerMonth, LTA_BasicInto, CEA_PerChildMonth, CEA_MaxChild, MedicalPolicyPremium, MedicalPolicyPremium_ESIC, CreatedBy, CreatedDate, YearId) VALUES('".$_POST['CompanyId']."', '".$_POST['ConAllow']."', '".$_POST['MediReim']."', '".$_POST['LtaBasicInto']."', '".$_POST['ChildEduAllowMonth']."', '".$_POST['ChildEdu_Maxchild']."', '".$_POST['MPP']."', '".$_POST['MPP_ESIC']."', '".$UserId."', '".date('Y-m-d')."', '".$YearId."')", $con); 

     if($SqlInseart){ $msg = "Data has been Updated successfully..."; }

   }

   else   

    {

     $Sql2=mysql_query("Select * from hrm_company_statutory_taxsaving WHERE TaxSavingID='".$_POST['TaxSavingID']."' AND CompanyId=".$_POST['CompanyId'], $con); $Result2 = mysql_fetch_assoc($Sql2);  $SqlInseart2 = mysql_query("INSERT INTO hrm_company_statutory_taxsaving_event(TaxSavingID, CompanyId, ConvanceAllow, MR_PerMonth, LTA_BasicInto, CEA_PerChildMonth, CEA_MaxChild, MedicalPolicyPremium, Status, CreatedBy, CreatedDate, YearId) VALUES('".$Result2['TaxSavingID']."', '".$Result2['CompanyId']."', '".$Result2['ConvanceAllow']."', '".$Result2['MR_PerMonth']."', '".$Result2['LTA_BasicInto']."', '".$Result2['CEA_PerChildMonth']."', '".$Result2['CEA_MaxChild']."', '".$Result2['MPP_Annual']."', '".$Result2['Status']."', ".$Result2['CreatedBy'].", '".$Result2['CreatedDate']."', ".$Result2['YearId'].")", $con); 

     if($SqlInseart2)

	 { 

	   $SqlUpdate = mysql_query("UPDATE hrm_company_statutory_taxsaving SET ConvanceAllow='".$_POST['ConAllow']."', MR_PerMonth='".$_POST['MediReim']."', LTA_BasicInto='".$_POST['LtaBasicInto']."', CEA_PerChildMonth='".$_POST['ChildEduAllowMonth']."', CEA_MaxChild='".$_POST['ChildEdu_Maxchild']."', MedicalPolicyPremium='".$_POST['MPP']."', MedicalPolicyPremium_ESIC='".$_POST['MPP_ESIC']."', CreatedBy='".$UserId."', CreatedDate='".date('Y-m-d')."' WHERE TaxSavingID='".$_POST['TaxSavingID']."'", $con) or die(mysql_error());

	   if($SqlUpdate){ $msg = "Data has been updated successfully..."; }

	 }

   }  

}



?>

