<?php
//header('Refresh:60; url=logout.php');
session_start();
// store the current time
$nowfront = time();
// get the time the session should have expired
$limit = $nowfront - 60 * 30;
// check the time of the last activity
if (isset ($_SESSION['frontlast_activity']) && $_SESSION['frontlast_activity'] < $limit) {
  // if too old, clear the session array and redirect
  $_SESSION = array();
  header('Location:index.php?errmsg=Previous Session Expired, please Login Again To Acess The Pages');
  exit;
} else {
  // otherwise, set the value to the current time
  $_SESSION['frontlast_activity'] = $nowfront;
}
if($_SESSION['frnt_mid']=="")
{
	header("Location:login.php");
	exit();
}
?>