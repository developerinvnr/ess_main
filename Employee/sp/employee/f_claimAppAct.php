<?php require_once('../user/config/config.php');

if($_POST['Act']=='AppCalim' && $_POST['fid']!='' && $_POST['m']!='' && $_POST['y']!='')
{
 $Up=mysql_query("update fa_salary set Rep_AppSts=".$_POST['v'].", Rep_AppDate='".date("Y-m-d")."' where SalId=".$_POST['sid']." and FaId=".$_POST['fid']."",$con);  
 if($Up){ echo '<input type="hidden" id="Rstval" value="1" />'; }
 else{ echo '<input type="hidden" id="Rstval" value="0" />'; }
 echo '<input type="hidden" id="RstPval" value="'.$_POST['v'].'" />';
 echo '<input type="hidden" id="sno" value='.$_POST['sn'].'/>';
}


elseif($_POST['Act']=='AppRemoval' && $_POST['fid']!='')
{
  if($_POST['v']==2)
  {
   if($_POST['lvl']==0 OR $_POST['lvl']==1){ $msg='forward'; } 
   else{ $msg='approved'; }  
  }
  elseif($_POST['v']==3){ $msg='rejected'; }
 
  if($_POST['lvl']==0)
  { 
   if($_POST['rep']==$_POST['rev'] && $_POST['rep']!=$_POST['hod'])
   {
    $UpQ="Remove_Reporting_AppSts=".$_POST['v'].", Remove_Reporting_AppDate='".date("Y-m-d")."', Remove_Rev_AppSts=".$_POST['v'].", Remove_Rev_AppDate='".date("Y-m-d")."'"; $lvl=2; $RepId=$_POST['hod'];
   }
   elseif($_POST['rep']==$_POST['rev'] && $_POST['rep']==$_POST['hod'])
   {
    $UpQ="Remove_Reporting_AppSts=".$_POST['v'].", Remove_Reporting_AppDate='".date("Y-m-d")."', Remove_Rev_AppSts=".$_POST['v'].", Remove_Rev_AppDate='".date("Y-m-d")."', Remove_Hod_AppSts=".$_POST['v'].", Remove_Hod_AppDate='".date("Y-m-d")."'"; $lvl=3; $RepId=0;
   }
   else{ $UpQ="Remove_Reporting_AppSts=".$_POST['v'].", Remove_Reporting_AppDate='".date("Y-m-d")."'"; 
         $lvl=1; $RepId=$_POST['rev']; } 
  }
  elseif($_POST['lvl']==1)
  { 
   if($_POST['rep']==$_POST['hod'])
   {
    $UpQ="Remove_Rev_AppSts=".$_POST['v'].", Remove_Rev_AppDate='".date("Y-m-d")."', Remove_Hod_AppSts=".$_POST['v'].", Remove_Hod_AppDate='".date("Y-m-d")."'"; $lvl=3; $RepId=0;
   }
   else{ $UpQ="Remove_Rev_AppSts=".$_POST['v'].", Remove_Rev_AppDate='".date("Y-m-d")."'"; $lvl=2; $RepId=$_POST['hod']; } 
  }
  elseif($_POST['lvl']==2){ $UpQ="Remove_Hod_AppSts=".$_POST['v'].", Remove_Hod_AppDate='".date("Y-m-d")."'"; $lvl=3; $RepId=0; }

  if($lvl==3){ if($_POST['v']==2){$Remove_Sts=2; $RemoveSts=3;}else{$Remove_Sts=3; $RemoveSts=4;} }
  else{ $Remove_Sts=1; $RemoveSts=2; }
 
  $Up=mysql_query("update fa_details set ".$UpQ.", Remove_lvl=".$lvl.", RemoveSts=".$RemoveSts.", Remove_Sts=".$Remove_Sts." where FaId=".$_POST['fid']."",$con);  



//var pars = 'Act=AppRemoval&v='+v+'&sn='+sn+'&fid='+fid+'&m='+m+'&y='+y+'&eid='+eid+"&rep="+rep+"&rev="+rev+"&hod="+hod+"&by="+by;

 if($Up)
 { echo '<input type="hidden" id="Rstval" value="1" />'; 
 
     if($_POST['lvl']==2)
	 {
	  
	  if($_POST['rep']>0)
	  {
	   $srep=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where g.EmployeeID=".$_POST['rep'],$con); $rrep=mysql_fetch_assoc($srep);
	   if($rrep['EmailId_Vnr']!='')
	   {
	    $to2   = $rrep['EmailId_Vnr'];
        $from2 = 'admin@vnrseeds.co.in';
        $sub2  = "FA Removal Request ".$msg;
        $head2 = "From: ".$from2."\r\n";  
        $head2.= "MIME-Version: 1.0\r\n";
        $head2.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $msg2 .= "<html><head></head><body>";
        $msg2 .= "Dear <b>Sir/Mam</b> <br><br>\n\n\n";
        $msg2 .= $remp['Fname']." ".$remp['Sname']." ".$remp['Lname']." FA removal request is ".$msg.".<br>\n\n";
        $msg2 .= "From <br><b>ADMIN ESS</b><br>";
        $msg2 .= "</body></html>";
        $ok   = @mail($to2,$sub2,$msg2,$head2);
	   }
	  } //if($_REQUEST['rep']>0)
	  
	  if($_POST['rev']>0)
	  {
	   $srev=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where g.EmployeeID=".$_POST['rev'],$con); $rrev=mysql_fetch_assoc($srev);
	   if($rrev['EmailId_Vnr']!='')
	   {
	    $to3   = $rrev['EmailId_Vnr'];
        $from3 = 'admin@vnrseeds.co.in';
        $sub3  = "FA Removal Request ".$msg;
        $head3 = "From: ".$from3."\r\n";  
        $head3.= "MIME-Version: 1.0\r\n";
        $head3.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $msg3 .= "<html><head></head><body>";
        $msg3 .= "Dear <b>Sir/Mam</b> <br><br>\n\n\n";
        $msg3 .= $remp['Fname']." ".$remp['Sname']." ".$remp['Lname']." FA removal request is ".$msg.".<br>\n\n";
        $msg3 .= "From <br><b>ADMIN ESS</b><br>";
        $msg3 .= "</body></html>";
        $ok   = @mail($to3,$sub3,$msg3,$head3);
	   }
	  } //if($_REQUEST['rep']>0)
	  
	  if($_POST['by']>0)
	  {
	   if($remp['EmailId_Vnr']!='')
	   {
	    $to4   = $remp['EmailId_Vnr'];
        $from4 = 'admin@vnrseeds.co.in';
        $sub4  = "FA Removal Request ".$msg;
        $head4 = "From: ".$from4."\r\n";  
        $head4.= "MIME-Version: 1.0\r\n";
        $head4.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $msg4 .= "<html><head></head><body>";
        $msg4 .= "Dear <b>".$remp['Fname']." ".$remp['Sname']." ".$remp['Lname']."</b> <br><br>\n\n\n";
        $msg4 .= "Your team member FA removal request is ".$msg.".<br>\n\n";
        $msg4 .= "From <br><b>ADMIN ESS</b><br>";
        $msg4 .= "</body></html>";
        $ok   = @mail($to4,$sub4,$msg4,$head4);
	   }
	  } //if($_REQUEST['rep']>0)
	  
	}//if($_REQUEST['lvl']==2)
 
 }
 else{ echo '<input type="hidden" id="Rstval" value="0" />'; }
 echo '<input type="hidden" id="RstPval" value="'.$_POST['v'].'" />';
 echo '<input type="hidden" id="sno" value='.$_POST['sn'].'/>';
}



elseif($_POST['Act']=='AppModeChange' && $_POST['fid']!='')
{ 

  if($_POST['v']==2)
  {
   if($_POST['lvl']==0 OR $_POST['lvl']==1){ $msg='forward'; } 
   else{ $msg='approved'; }  
  }
  elseif($_POST['v']==3){ $msg='rejected'; }
  
  if($_POST['lvl']==0)
  { 
   if($_POST['rep']==$_POST['rev'] && $_POST['rep']!=$_POST['hod'])
   {
    $UpQ="MdChng_Reporting_AppSts=".$_POST['v'].", MdChng_Reporting_AppDate='".date("Y-m-d")."', MdChng_Rev_AppSts=".$_POST['v'].", MdChng_Rev_AppDate='".date("Y-m-d")."'"; $lvl=2; $RepId=$_POST['hod'];
   }
   elseif($_POST['rep']==$_POST['rev'] && $_POST['rep']==$_POST['hod'])
   {
    $UpQ="MdChng_Reporting_AppSts=".$_POST['v'].", MdChng_Reporting_AppDate='".date("Y-m-d")."', MdChng_Rev_AppSts=".$_POST['v'].", MdChng_Rev_AppDate='".date("Y-m-d")."', MdChng_Hod_AppSts=".$_POST['v'].", MdChng_Hod_AppDate='".date("Y-m-d")."'"; $lvl=3; $RepId=0;
   }
   else{ $UpQ="MdChng_Reporting_AppSts=".$_POST['v'].", MdChng_Reporting_AppDate='".date("Y-m-d")."'"; 
         $lvl=1; $RepId=$_POST['rev']; } 
  }
  elseif($_POST['lvl']==1)
  { 
   if($_POST['rep']==$_POST['hod'])
   {
    $UpQ="MdChng_Rev_AppSts=".$_POST['v'].", MdChng_Rev_AppDate='".date("Y-m-d")."', MdChng_Hod_AppSts=".$_POST['v'].", MdChng_Hod_AppDate='".date("Y-m-d")."'"; $lvl=3; $RepId=0;
   }
   else{ $UpQ="MdChng_Rev_AppSts=".$_POST['v'].", MdChng_Rev_AppDate='".date("Y-m-d")."'"; $lvl=2; $RepId=$_POST['hod']; } 
  }
  elseif($_POST['lvl']==2){ $UpQ="MdChng_Hod_AppSts=".$_POST['v'].", MdChng_Hod_AppDate='".date("Y-m-d")."'"; $lvl=3; $RepId=0; }

  if($lvl==3){ if($_POST['v']==2){$MdChng_Sts=2; $MdChngSts=3;}else{$MdChng_Sts=3; $MdChngSts=4;} }
  else{ $MdChng_Sts=1; $MdChngSts=2; }


 $Up=mysql_query("update fa_details set ".$UpQ.", MdChng_lvl=".$lvl.", MdChngSts=".$MdChngSts.", MdChng_Sts=".$MdChng_Sts." where FaId=".$_POST['fid']."",$con); 
 
 //$Up=mysql_query("update fa_details set MdChng_Reporting_AppSts=".$_POST['v'].", MdChng_Reporting_AppDate='".date("Y-m-d")."' where FaId=".$_POST['fid']."",$con); 
  
 if($Up)
 { echo '<input type="hidden" id="Rstval" value="1" />'; 
   
   if($_POST['lvl']==2)
   {  
	 if($_POST['rep']>0)
	 {
	   $srep=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where g.EmployeeID=".$_POST['rep'],$con); $rrep=mysql_fetch_assoc($srep);
	   if($rrep['EmailId_Vnr']!='')
	   {
	    $to2   = $rrep['EmailId_Vnr'];
        $from2 = 'admin@vnrseeds.co.in';
        $sub2  = "FA Mode Change Request ".$msg;
        $head2 = "From: ".$from2."\r\n";  
        $head2.= "MIME-Version: 1.0\r\n";
        $head2.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $msg2 .= "<html><head></head><body>";
        $msg2 .= "Dear <b>Sir/Mam</b> <br><br>\n\n\n";
        $msg2 .= $remp['Fname']." ".$remp['Sname']." ".$remp['Lname']." FA mode change request is ".$msg.".<br>\n\n";
        $msg2 .= "From <br><b>ADMIN ESS</b><br>";
        $msg2 .= "</body></html>";
        $ok   = @mail($to2,$sub2,$msg2,$head2);
	   }
	  } //if($_REQUEST['rep']>0)
	  
	  if($_POST['rev']>0)
	  {
	   $srev=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where g.EmployeeID=".$_POST['rev'],$con); $rrev=mysql_fetch_assoc($srev);
	   if($rrev['EmailId_Vnr']!='')
	   {
	    $to3   = $rrev['EmailId_Vnr'];
        $from3 = 'admin@vnrseeds.co.in';
        $sub3  = "FA Mode Change Request ".$msg;
        $head3 = "From: ".$from3."\r\n";  
        $head3.= "MIME-Version: 1.0\r\n";
        $head3.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $msg3 .= "<html><head></head><body>";
        $msg3 .= "Dear <b>Sir/Mam</b> <br><br>\n\n\n";
        $msg3 .= $remp['Fname']." ".$remp['Sname']." ".$remp['Lname']." FA mode change request is ".$msg.".<br>\n\n";
        $msg3 .= "From <br><b>ADMIN ESS</b><br>";
        $msg3 .= "</body></html>";
        $ok   = @mail($to3,$sub3,$msg3,$head3);
	   }
	  } //if($_REQUEST['rep']>0)
	  
	  if($_POST['by']>0)
	  {
	   if($remp['EmailId_Vnr']!='')
	   {
	    $to4   = $remp['EmailId_Vnr'];
        $from4 = 'admin@vnrseeds.co.in';
        $sub4  = "FA Mode Change Request ".$msg;
        $head4 = "From: ".$from4."\r\n";  
        $head4.= "MIME-Version: 1.0\r\n";
        $head4.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $msg4 .= "<html><head></head><body>";
        $msg4 .= "Dear <b>".$remp['Fname']." ".$remp['Sname']." ".$remp['Lname']."</b> <br><br>\n\n\n";
        $msg4 .= "Your team member FA mode change request is ".$msg.".<br>\n\n";
        $msg4 .= "From <br><b>ADMIN ESS</b><br>";
        $msg4 .= "</body></html>";
        $ok   = @mail($to4,$sub4,$msg4,$head4);
	   }
	  } //if($_REQUEST['rep']>0)
	  
	}//if($_REQUEST['lvl']==2)
 }
 else{ echo '<input type="hidden" id="Rstval" value="0" />'; }
 echo '<input type="hidden" id="RstPval" value="'.$_POST['v'].'" />';
 echo '<input type="hidden" id="sno" value='.$_POST['sn'].'/>';
}
?>
