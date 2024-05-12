<?php require_once('config/config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Note Details</title>
<style> /*background-color:#D9D9FF;  background-color:#EEEEEE; */
.tdf{font-family:Verdana;font-size:14px;height:22px;color:#000;}
.tdf2{background-color:#FFFFFF;font-family:Verdana;font-size:14px;height:22px;color:#000000;}
</style>
</head>
<script type="text/javascript" language="javascript">
function DetailNote(v)
{ window.open("DetailsNotePrint.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&actionact=addnewrecords&ID="+v,"Print","menubar=yes/no,scrollbars=no,resizable=no,directories=no,width=200,height=300");}
</script>
<body>
<table cellpadding="0" cellspacing="0">	
 <tr>
  <td>
  <table cellpadding="0" cellspacing="1" style="width:800px;background-color:#FFFFFF;" border="0">
   <tr><td colspan="2" style="height:30px;">&nbsp;<span style="cursor:pointer;color:#000099;" onClick="DetailNote(<?php echo $_REQUEST['ID']; ?>)"><u>Print</u></span></td></tr>
<?php $sN=mysql_query("SELECT * FROM hrm_sales_note where NoteId=".$_REQUEST['ID'],$con); $rN=mysql_fetch_assoc($sN);
$Lnght=strlen($rN['RefId']); if($Lnght==1){$RefId='000'.$rN['RefId'];} if($Lnght==2){$RefId='00'.$rN['RefId'];} if($Lnght==3){$RefId='0'.$rN['RefId'];} if($Lnght>=4){$RefId=$rN['RefId'];} 
$De=mysql_query("SELECT * FROM hrm_sales_dealer where DealerId=".$rN['DealerId'],$con); $rDe=mysql_fetch_assoc($De);
$St=mysql_query("SELECT StateName FROM hrm_headquater hq inner join hrm_state s on hq.StateId=s.StateId where hq.HqId=".$rDe['HqId'],$con); $rSt=mysql_fetch_assoc($St);
$Ns=mysql_query("SELECT * FROM hrm_sales_note_subject where NoteSubId=".$rN['NoteSubId'],$con);$rNs=mysql_fetch_assoc($Ns);
$sy=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$rN['YearId'],$con); $ry=mysql_fetch_assoc($sy); 
$fd=date("y",strtotime($ry['FromDate'])); $td=date("y",strtotime($ry['ToDate']));
?> 
	  
	     
   <tr><td>&nbsp;</td><td class="tdf"><?php echo 'Ref.&nbsp;&nbsp;&nbsp;VSPL/'.strtoupper($rNs['SubCode']).'/'.$rN['DealerId'].'/'.$fd.'-'.$td.'/'.$RefId; ?></td></tr>
   <tr><td colspan="2">&nbsp;</td></tr>
   <tr><td>&nbsp;</td><td class="tdf"><?php echo date("d F Y",strtotime($rN['NoteDate'])); ?></td></tr>
   <tr><td colspan="2">&nbsp;</td></tr> 
   <tr><td>&nbsp;</td><td class="tdf"><?php echo 'TO,<br>M/S '.ucfirst(strtolower($rDe['DealerName'])).', '.ucfirst(strtolower($rDe['DealerCity'])).'<br>'.ucfirst(strtolower($rDe['DealerAdd'])).'<br>'.ucfirst(strtolower($rDe['DealerCity'])).' - '.ucfirst(strtolower($rSt['StateName'])); if($rDe['DealerCont']>0 OR $rDe['DealerCont2']>0){ echo '<br> phone - '.$rDe['DealerCont']; if($rDe['DealerCont2']>0){ echo ', '.$rDe['DealerCont2']; } } ?></td></tr>
  <tr><td colspan="2">&nbsp;</td></tr> 
  <tr><td>&nbsp;</td><td class="tdf"><b><?php echo 'Subject: - '.ucfirst(strtolower($rNs['SubName'])); ?></b></td></tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr><td>&nbsp;</td><td class="tdf"><?php echo 'Dear Sir,<br><br>This is to inform you that we have received following qty at our warehouse as '.strtolower($rNs['SubCodeName']).' from your firm:-'; ?></td></tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  
  <tr>
   <td>&nbsp;</td>
   <td class="tdf" valign="top">
    <table border="1" cellpadding="0" cellspacing="0">
	 <tr>
	  <td class="tdf2" style="width:120px;" align="center">Crops</td>
	  <td class="tdf2" style="width:200px;" align="center">Variety</td>
	  <td class="tdf2" style="width:100px;" align="center">Pack Size</td>
	  <td class="tdf2" style="width:100px;" align="center">Qty as per the party challan <br />(in kg)</td>
	  <td class="tdf2" style="width:100px;" align="center">Received qty at godown <br />(in kg)</td>
	  <td class="tdf2" style="width:150px;" align="center">Difference in qty <br />(if any)</td>
	 </tr>
<?php $sqls=mysql_query("select * from hrm_sales_note_detail where NoteId=".$_REQUEST['ID']." order by NoteDetlId ASC",$con); while($ress=mysql_fetch_assoc($sqls)){ 
$crp2=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$ress['ItemId'],$con); $rcrp2=mysql_fetch_assoc($crp2); $prd2=mysql_query("select ProductName,TypeId from hrm_sales_seedsproduct where ProductId=".$ress['ProductId'],$con); $rprd2=mysql_fetch_assoc($prd2); $siz2=mysql_query("select SizeName from hrm_sales_itemsize where SizeId=".$ress['SizeId'],$con); $rsiz2=mysql_fetch_assoc($siz2); $sqlT=mysql_query("select TypeName from hrm_sales_seedtype where TypeId=".$rprd2['TypeId'], $con); $resT=mysql_fetch_assoc($sqlT); if($resT['TypeName']=='HYBRID'){$typ='F1';}else{$typ=$resT['TypeName'];} ?>
     <tr>
	  <td class="tdf"><?php echo $rcrp2['ItemName']; ?></td>
	  <td class="tdf"><?php echo $typ.' '.$rprd2['ProductName']; ?></td>
	  <td class="tdf" align="center"><?php echo $rsiz2['SizeName']; ?></td>
	  <td class="tdf" align="center"><?php echo floatval($ress['Qty_ChallanIn']); ?></td>
	  <td class="tdf" align="center"><?php echo floatval($ress['Qty_GodownIn']); ?></td>
	  <td class="tdf" align="center"><?php echo $ress['Qty_DiffIn']; ?></td>
	 </tr>
<?php } ?>
<?php $sum=mysql_query("select SUM(Qty_ChallanIn) as QtyC, SUM(Qty_GodownIn) as QtyG, SUM(Qty_DiffIn) as QtyD from hrm_sales_note_detail where NoteId=".$_REQUEST['ID'],$con); $rsum=mysql_fetch_assoc($sum);?>
     <tr>
	  <td colspan="3" class="tdf" align="right"><b>Total:</b>&nbsp;</td>
	  <td class="tdf" align="center"><b><?php echo floatval($rsum['QtyC']); ?></b></td>
	  <td class="tdf" align="center"><b><?php echo floatval($rsum['QtyG']); ?></b></td>
	  <td class="tdf" align="center"><b><?php //echo $rsum['QtyD']; ?></b></td>
	 </tr>
	</table>
   </td>
  </tr>
  
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr><td>&nbsp;</td><td class="tdf"><?php echo 'We are issuing a credit note of Rs <b>'.$rN['Amount'].'/-</b> against received material, do sign the acknowledgement copy and send it back to HO.<br><br>Thanking you & assuring you the best service<br><br>Your Faithfully<br>For, VNR Seeds Pvt Ltd.<br><br><br><br>Authorised Signature<br><br><br><br><br>Enclosed:-Credit note copy<br><br><br>'; ?></td></tr>
  </table>
  </td>
  </tr> 
</table>	       

</body>
</html>
