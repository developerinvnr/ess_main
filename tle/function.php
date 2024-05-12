<?php
function check_user()
{
	if(!$_SESSION['login']){
		unset($_SESSION['login']);
		unset($_SESSION['userid']);
        unset($_SESSION['username']);
        unset($_SESSION['userstatus']);
		return false;
	} else {
		return true;
	}
}
?>