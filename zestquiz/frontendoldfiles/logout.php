<?php
session_start();
if (isset($_SESSION['frnt_mid'])){
unset($_SESSION['frnt_mid']);
unset($_SESSION['frnt_musername']);
unset($_SESSION['frnt_memail']);
unset($_SESSION['frnt_lastlogin']);
unset($_SESSION['frontlast_activity']);
/*include('dbconfig.php');
include('administrator/includes/dbconnection.php');
include ('model/store.class.php');
storeClass::deleteCartWasteSessionRecords();*/
unset($_SESSION['CART_TEMP_RANDOM']);
}
if($_SESSION['frnt_mid']=="")
{
	header("Location:index.php?errmsg=You are successfully logged out from the account.");
	//header("Location:index.php");
	exit();
}
?>