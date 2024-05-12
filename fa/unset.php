<?php 
if($_REQUEST['logout']==true)
{ $_SESSION['login'] = false;
unset($_SESSION['login']);
unset($_SESSION['ID']);
unset($_SESSION['TLUname']);
session_destroy();
echo "<div id='LogOutMsg' style='position:absolute; top:270px; left:470px;'><hi><font color=#FFFFFF style='font-family:Georgia;' size=4>You have SuccessFully <img src='../images/LogOut.png' border='0' /></font></hi>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='../images/LogOut1.png' border='0' />";
echo "</div>";
}
?>
