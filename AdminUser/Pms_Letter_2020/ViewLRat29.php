Your performance for the assessment period <b><?php echo $Ass2Year; ?></b> has been rated as <b>"<?php echo $ResR['RatingName']; ?>"</b> with "<b>Rating-2.9</b>".<?php /*?><b>"<?php echo $ResR['RatingName']; ?>"</b> with "<b>Rating-2.9</b>".<?php */?> <p> 

           We would like to extend you necessary support so that you can improve your performance. You are required to work out a systematic performance development plan in consultation with your manager and show the improved results. <p>

           <?php if($_REQUEST['C']==1 AND $ResPMS['HR_ProCorrCTC']>0)
		   { $IncVal=$ResPMS['HR_IncNetCTC']-$ResPMS['HR_ProCorrCTC']; $cmt='increment of'; }
		   else{ $IncVal=$ResPMS['HR_IncNetCTC']; $cmt='increase in your CTC by'; } ?>
		   
           Based on your performance, there is an <?php echo $cmt;?> <b>Rs. <?php echo floatval($IncVal); ?>/- </b>.<?php if($_REQUEST['C']==1 AND $ResE['DateJoining']>=$FD2.'-01-01' AND $ResE['DateJoining']<=$FD2.'-06-30') { ?> As your service is less than a year in the assessment cycle <?php echo $FD2; ?>, your increment is calculated on pro-rata basis as per the duration served during this period against the actual increment of <b><?php echo intval(($ResPMS['EmpCurrCtc']*$resMaxMin['IncDistriFrom'])/100); //floatval($ResPMS['HR_IncNetCTC']); ?>/-</b> as per your performance rating.<p><?php } ?><?php if($_REQUEST['C']==1 AND $ResE['DateJoining']>=$FD1.'-07-01' AND $ResE['DateJoining']<=$FD1.'-12-31') { ?> As your assessment tenure is more than a year (DOJ on or after 1st July <?php echo $FD1; ?>), your increment is calculated on pro-rata basis for the duration served since your joining against the actual annual increment for assessment cycle<?php //echo $AssYear; ?> that is <b><?php echo intval(($ResPMS['EmpCurrCtc']*$resMaxMin['IncDistriFrom'])/100); //floatval($ResPMS['HR_IncNetCTC']); ?>/-</b> as per your performance rating.<p><?php } ?>

		   <?php if($ResPMS['HR_ProCorrCTC']>0) { ?>Taking into consideration the industry salary benchmark, we are providing salary correction of <b>Rs. <?php echo floatval($ResPMS['HR_ProCorrCTC']); ?>/- </b> per annum. <?php } ?><p>

           Your CTC is therefore being revised from <b>Rs. <?php echo floatval($ResPMS['EmpCurrCtc']); ?>/- </b> to <b>Rs. <?php echo floatval($ResPMS['HR_Proposed_ActualCTC']); ?>/- </b> with effect from <?php echo $SeteD; ?>.<p>
		   
<?php 
if($GNew==''){$GG=$_REQUEST['G'];}else{$GG=$GNew;} 
if($DNew==''){$DD=$_REQUEST['D'];}else{$DD=$DNew;} 	  	 
?>		   
		   <?php  if($ResE['DepartmentId']==6 AND $ResE['EmpVertical']>0 AND $ResPMS['HR_CurrDesigId']==$DD AND $resGr2['GradeValue']==$GG){ ?>
           Based on the Sales Function restructuring you are designated as <b><?php echo $resD['DesigName'].' ('.$VerticalName.')';?></b>, HQ as <b><?php echo $rHq['HqName'];?></b> and reporting to <b><?php echo $NameR;?></b>. <p> 
<?php }  ?>

		   Please find your revised remuneration in Annexure A as an enclosure with this letter along with your Entitlements in Annexure-B. <p>				   

<?php /*
if($GNew==''){$GG=$_REQUEST['G'];}else{$GG=$GNew;} 
if($DNew==''){$DD=$_REQUEST['D'];}else{$DD=$DNew;} 	  */	 
?>		   
		   <?php if($ResPMS['HR_CurrDesigId']!=$DD OR $resGr2['GradeValue']!=$GG) { ?>
		   We also wish to inform you that to appreciate your improving performance and having belief in your competencies to handle higher responsibilities & to meet the up-coming challenges, we hereby promote you <?php if($ResPMS['HR_CurrDesigId']!=$DD) { echo 'as <b>'.$resD['DesigName'].'</b>'; } if($ResPMS['HR_CurrDesigId']!=$DD AND $resGr2['GradeValue']!=$GG) { echo ', '; } if($resGr2['GradeValue']!=$GG) {?>to Grade <?php echo '<b>'.$resG['GradeValue'].'</b>'; } if($ResPMS['HR_CurrDesigId']!=$DD OR $resGr2['GradeValue']!=$GG) { ?> w.e.f <?php echo $SeteD; ?>. <?php } } ?> <p> 

           We take this opportunity to compliment you and your family for your dedication and commitment to the organization. <p>