<?php require_once('../AdminUser/config/config.php');
if(isset($_POST['action']) && $_POST['action']=='resultopn')
{ 
  $sql=mysql_query("select * from hrm_opinion where EmployeeID=".$_POST['ei']." AND OpenionName='mig_ctc'",$con);
  $row=mysql_num_rows($sql);
  if($row>0){ $up=mysql_query("update hrm_opinion set Openion='".$_POST['v']."' where EmployeeID=".$_POST['ei']." AND OpenionName='mig_ctc'",$con); }else{ $up=mysql_query("insert into hrm_opinion(EmployeeID, Openion, OpenionName, OpenionDate) values(".$_POST['ei'].", '".$_POST['v']."', 'mig_ctc', '".date("Y-m-d")."')",$con); }
  if($up){ echo '<input type="hidden" id="opnreslt" value="1" />'; }
  else{ echo '<input type="hidden" id="opnreslt" value="0" />'; }
}


elseif(isset($_POST['action']) && $_POST['action']=='resultopnjsy')
{ 
  $sql=mysql_query("select * from hrm_opinion where EmployeeID=".$_POST['ei']." AND OpenionName='jsy'",$con);
  $row=mysql_num_rows($sql);
  if($row>0){ $up=mysql_query("update hrm_opinion set Cast='".$_POST['cast']."', CastOther='".$_POST['iother']."', Scheme1='".$_POST['sche1']."', Scheme2='".$_POST['sche2']."', Scheme3='".$_POST['sche3']."', Scheme4='".$_POST['sche4']."' where EmployeeID=".$_POST['ei']." AND OpenionName='jsy'",$con); }else{ $up=mysql_query("insert into hrm_opinion(EmployeeID, Cast, CastOther, Scheme1, Scheme2, Scheme3, Scheme4, OpenionName, OpenionDate) values(".$_POST['ei'].", '".$_POST['cast']."', '".$_POST['iother']."', '".$_POST['sche1']."', '".$_POST['sche2']."', '".$_POST['sche3']."', '".$_POST['sche4']."', 'jsy', '".date("Y-m-d")."')",$con); }
  if($up){ echo '<input type="hidden" id="opnreslt" value="1" />'; }
  else{ echo '<input type="hidden" id="opnreslt" value="0" />'; }
}

elseif(isset($_POST['action']) && $_POST['action']=='result22opnjsy')
{ 
  $sql=mysql_query("select * from hrm_opinion where EmployeeID=".$_POST['ei']." AND OpenionName='jsy'",$con);
  $row=mysql_num_rows($sql);
  if($row>0){ $up=mysql_query("update hrm_opinion set Scheme1='".$_POST['sche1']."', Scheme2='".$_POST['sche2']."', Scheme3='".$_POST['sche3']."', Scheme4='".$_POST['sche4']."', CrDate='".date("Y-m-d")."' where EmployeeID=".$_POST['ei']." AND OpenionName='jsy'",$con); }
  if($up){ echo '<input type="hidden" id="opnreslt2" value="1" />'; }
  else{ echo '<input type="hidden" id="opnreslt2" value="0" />'; }
}


?>


<!--CREATE TABLE IF NOT EXISTS `hrm_opinion` (
 `OpninId` int(10) NOT NULL AUTO_INCREMENT,
 `EmployeeID` int(5) NOT NULL,
 `Openion` char(1) NOT NULL,
 `OpenionName` varchar(30) NOT NULL,
 `OpenionDate` date NOT NULL,
  PRIMARY KEY (`OpninId`),
  KEY `OpninId` (`OpninId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;-->