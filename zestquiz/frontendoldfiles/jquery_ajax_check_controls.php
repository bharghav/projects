<?php 
include_once("includes/sessions.php");
include('dbconfig.php');
include('administrator/includes/dbconnection.php');
include ('model/user.class.php');
$frontuserObj= new userClass();
global $callConfig;
$operation=$_REQUEST['type'];
$title=$_REQUEST['title'];
$currentid=$_REQUEST['currentid'];
	if($operation=="uname")
	{
		$str="select * from ".TPREFIX.TBL_ADMIN." where us_name='".$title."'";
		if($currentid!="")
		$str.=" and us_name!='".$currentid."'";
		$cnt=$callConfig->getCount($str);
		if($cnt>0)
		echo "User Name exist, please change";
		else
		echo "";
	}
	if($operation=="email")
	{
		$str="select * from ".TPREFIX.TBL_ADMIN." where email='".$title."'";
		if($currentid!="")
		$str.=" and email!='".$currentid."'";
		$cnt=$callConfig->getCount($str);
		if($cnt>0)
		echo "Email Id exist, please change";
		else
		echo "";
	}
	
?>
