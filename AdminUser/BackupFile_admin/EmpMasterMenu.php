<?php $sqlEm=mysql_query("select * from hrm_user_menu_master where AXAUESRUser_Id=".$UserId, $con); $resEm=mysql_fetch_array($sqlEm);  ?>
<table border="0" cellpadding="0px;" align="center">
<?php if($resEm['mas_gene']==1) { ?>
<tr>
  <td align="center">
  <?php if($_REQUEST['p']=='g'){?><img id="Img_general" src="images/Egeneral.png" border="0"/><?php } else { ?>
  <a href="EmpGeneral.php?ID=<?php echo $EMPID; ?>&Event=Edit&p=g&ok=true&rslt=y&pp=qw_res##ius"><img id="Img_general1" src="images/Egeneral1.png" border="0"/></a><?php } ?>
  </td>
</tr>
<?php } if($resEm['mas_phot']==1) { ?>											
<tr>
  <td align="center">
  <?php if($_REQUEST['p']=='ph'){?><img src="images/Ephoto.png" id="Img_photo" border="0"/><?php } else { ?>
  <a href="EmpPhoto.php?ID=<?php echo $EMPID; ?>&Event=Edit&p=ph&ok=true&rslt=y&pp=qw_res##ius"><img id="Img_photo1" src="images/Ephoto1.png" border="0"/></a><?php } ?>	   
  </td>
</tr>								
<?php } if($resEm['mas_pers']==1) { ?>					
<tr>
  <td align="center">
  <?php if($_REQUEST['p']=='p'){?><img src="images/Epersonal.png" id="Img_personal" border="0"/><?php } else { ?>
  <a href="EmpPersonal.php?ID=<?php echo $EMPID; ?>&Event=Edit&p=p&ok=true&rslt=y&pp=qw_res##ius"><img id="Img_personal1" src="images/Epersonal1.png" border="0"/></a><?php } ?>
  </td>
</tr>	
<?php } if($resEm['mas_cont']==1) { ?>
<tr>
  <td align="center">
  <?php if($_REQUEST['p']=='c'){?><img src="images/Econtact.png" id="Img_contact" border="0" /><?php } else { ?>
  <a href="EmpContact.php?ID=<?php echo $EMPID; ?>&Event=Edit&p=c&ok=true&rslt=y&pp=qw_res##ius"><img id="Img_contact1" src="images/Econtact1.png" border="0"/></a><?php } ?>
  </td>
</tr> 
<?php } if($resEm['mas_lang']==1) { ?>
<tr>
  <td align="center">
  <?php if($_REQUEST['p']=='l'){?><img src="images/ElangProfi.png" id="Img_langProfi" border="0" /><?php } else { ?>
  <a href="EmplangProfi.php?ID=<?php echo $EMPID; ?>&Event=Edit&p=l&ok=true&rslt=y&pp=qw_res##ius"><img id="Img_langProfi1" src="images/ElangProfi1.png" border="0"/></a><?php } ?>
  </td>
</tr>	
<?php } if($resEm['mas_qual']==1) { ?>
<tr>
  <td align="center">
  <?php if($_REQUEST['p']=='q'){?><img src="images/Equalifi.png" border="0" id="Img_qualifi"/><?php } else { ?>
  <a href="EmpQuali.php?ID=<?php echo $EMPID; ?>&Event=Edit&p=q&ok=true&rslt=y&pp=qw_res##ius"><img id="Img_qualifi1" src="images/Equalifi1.png" border="0"/></a><?php } ?>
  </td>
</tr> 					   
<?php } if($resEm['mas_expe']==1) { ?>
<tr>
   <td align="center">
   <?php if($_REQUEST['p']=='e'){?><img src="images/Eexp.png" border="0" id="Img_exp"/><?php } else { ?>
   <a href="EmpExp.php?ID=<?php echo $EMPID; ?>&Event=Edit&p=e&ok=true&rslt=y&pp=qw_res##ius"><img id="Img_exp1" src="images/Eexp1.png" border="0"/></a><?php } ?>   
   </td>
</tr>  
<?php } if($resEm['mas_fami']==1) { ?>
<tr>
  <td align="center">
  <?php if($_REQUEST['p']=='f'){?><img src="images/Efamily.png" border="0" id="Img_family"/><?php } else { ?>
  <a href="EmpFamily.php?ID=<?php echo $EMPID; ?>&Event=Edit&p=f&ok=true&rslt=y&pp=qw_res##ius"><img id="Img_family1" src="images/Efamily1.png" border="0"/></a><?php } ?>   
  </td>
</tr>	
<?php } if($resEm['mas_leav']==1) { ?>
<tr>
  <td align="center">
  <?php if($_REQUEST['p']=='le'){ ?><img src="images/Eleave.png" border="0" id="Img_leave"/><?php } else { ?>
<a href="EmpLeave.php?ID=<?php echo $EMPID;?>&Event=Edit&p=le&m=<?php echo date("m"); ?>&y=<?php echo date("Y"); ?>&ok=true&rslt=y&pp=qw_res##ius"><img id="Img_leave1" src="images/Eleave1.png" border="0"/></a><?php } ?>
  </td>
</tr>	
<?php } if($resEm['mas_elig']==1) { ?>
<tr>
  <td align="center">
  <?php if($_REQUEST['p']=='el'){?><img src="images/Eelig.png" border="0" id="Img_elig"/><?php } else { ?>
  <a href="EmpElig.php?ID=<?php echo $EMPID; ?>&Event=Edit&p=el&ok=true&rslt=y&pp=qw_res##ius"><img id="Img_elig1" src="images/Eelig1.png" border="0"/></a><?php } ?>   
  </td>
</tr>	
<?php } if($resEm['mas_ctc']==1) { ?>
<tr>
  <td align="center">
  <?php if($_REQUEST['p']=='ct'){?><img src="images/Ectc.png" border="0" id="Img_ctc"/><?php } else { ?>
  <a href="EmpCtc.php?ID=<?php echo $EMPID; ?>&Event=Edit&p=ct&ok=true&rslt=y&pp=qw_res##ius"><img id="Img_ctc1" src="images/Ectc1.png" border="0"/></a><?php } ?>   
  </td>
</tr> 
<?php } if($resEm['mas_chec']==1) { ?>					   
<tr>
  <td align="center">
  <?php if($_REQUEST['p']=='ch'){?><img src="images/CheckList.png" border="0" id="Img_CkeckList"/><?php } else { ?>
  <a href="EmpCheckList.php?ID=<?php echo $EMPID; ?>&Event=Edit&p=ch&ok=true&rslt=y&pp=qw_res##ius"><img id="Img_CkeckList1" src="images/CheckList1.png" border="0"/></a><?php } ?>   
  </td>
</tr>	
<?php /* } if($resEm['mas_asse']==1) { ?>					   
<tr>
  <td align="center">
  <?php if($_REQUEST['p']=='as'){?><img src="images/Assest.png" border="0" id="Img_Assest"/><?php } else { ?>
   <a href="AssestEmp.php?ID=<?php echo $EMPID; ?>&Event=Edit&p=as&ok=true&rslt=y&pp=qw_res##ius"><img id="Img_Assest1" src="images/Assest1.png" border="0"/></a><?php } ?>   
  </td>
</tr>	
<?php */ } if($resEm['mas_trai']==1) { ?>					   
<tr>
  <td align="center">
  <?php if($_REQUEST['p']=='tr'){?><img src="images/training.png" border="0" id="Img_Training"/><?php } else { ?>
  <a href="EmpTrainig.php?ID=<?php echo $EMPID; ?>&Event=Edit&p=tr&ok=true&rslt=y&pp=qw_res##ius"><img id="Img_Training1" src="images/training1.png" border="0"/></a><?php } ?>   
  </td>
</tr>
<?php } if($resEm['mas_conf']==1) { ?>					   
<tr>
  <td align="center">
  <?php if($_REQUEST['p']=='co'){?><img src="images/conference.png" border="0" id="Img_Conference"/><?php } else { ?>
  <a href="EmpConference.php?ID=<?php echo $EMPID; ?>&Event=Edit&p=co&ok=true&rslt=y&pp=qw_res##ius"><img id="Img_Conference1" src="images/conference1.png" border="0"/></a><?php } ?>   
  </td>
</tr>						   						   					   					   
<?php } ?>
<tr>
  <td align="center">
   <a href="#"><img src="images/backS1.png" border="0" onClick="javascript:window.location='EmpMaster.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/></a>
  </td>
</tr> 
</table>

