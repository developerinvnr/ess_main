We are extremely concerned that your performance for the assessment period <b><?php echo $Ass2Year; ?></b> has been rated as <b>"<?php echo $ResR['RatingName']; ?>"</b> with "<b>Rating-2</b>".<?php /*?><b>"<?php echo $ResR['RatingName']; ?>"</b> with "<b>Rating-2</b>".<?php */?> <p> 

           Your performance is below exceedingly expectation and you are being given a last chance to improve your performance. You shall be administered a <b>"Performance Improvement Plan"</b> (PIP) through which your performance shall be monitored against the objectives set by your manager for next 90 days. Your continuity in the organization post PIP completion shall be guided by the PIP policy. <p>
           
		   <?php if($_REQUEST['C']==1 AND $ResPMS['HR_ProCorrCTC']>0)
		   { $IncVal=$ResPMS['HR_IncNetCTC']-$ResPMS['HR_ProCorrCTC']; $cmt='increment of'; }
		   else{ $IncVal=$ResPMS['HR_IncNetCTC']; $cmt='increase in your CTC by'; } ?>
		   
           There is an <?php echo $cmt;?> <b>Rs. <?php echo floatval($IncVal); ?>/- </b>.<?php if($_REQUEST['C']==1 AND $ResE['DateJoining']>=$FD2.'-01-01' AND $ResE['DateJoining']<=$FD2.'-06-30') { ?> As your service is less than a year in the assessment cycle <?php echo $FD2; ?>, your increment is calculated on pro-rata basis as per the duration served during this period against the actual increment of <b><?php echo intval(($ResPMS['EmpCurrCtc']*$resMaxMin['IncDistriFrom'])/100); //floatval($ResPMS['HR_IncNetCTC']); ?>/-</b> as per your performance rating.<p><?php } ?><?php if($_REQUEST['C']==1 AND $ResE['DateJoining']>=$FD1.'-07-01' AND $ResE['DateJoining']<=$FD1.'-12-31') { ?> As your assessment tenure is more than a year (DOJ on or after 1st July <?php echo $FD1; ?>), your increment is calculated on pro-rata basis for the duration served since your joining against the actual annual increment for assessment cycle<?php //echo $AssYear; ?> that is <b><?php echo intval(($ResPMS['EmpCurrCtc']*$resMaxMin['IncDistriFrom'])/100); //floatval($ResPMS['HR_IncNetCTC']); ?>/-</b> as per your performance rating.<p><?php } ?>
               

		   <?php if($ResPMS['HR_ProCorrCTC']>0) { ?>Taking into consideration the industry salary benchmark, we are providing salary correction of <b>Rs. <?php echo floatval($ResPMS['HR_ProCorrCTC']); ?>/- </b> per annum. <?php } ?><p>

           Your CTC is therefore being revised from <b>Rs. <?php echo floatval($ResPMS['EmpCurrCtc']); ?>/- </b> to <b>Rs. <?php echo floatval($ResPMS['HR_Proposed_ActualCTC']); ?>/- </b> with effect from <?php echo $SeteD; ?>.<p>   

<?php if($ResE['DepartmentId']==3 AND $resGr2['GradeValue']!='S1' AND $resGr2['GradeValue']!='S2' AND $resGr2['GradeValue']!='J1'){ ?>Due to restructuring, your designation is revised to <b><?php echo $resD['DesigName']; ?></b> at same grade. <p> 
<?php } ?>

		   Please find your revised remuneration in Annexure A as an enclosure with this letter along with your Entitlements in Annexure-B.<p>
