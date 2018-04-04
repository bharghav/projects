<?php 
ob_start();
session_start();
include('../dbconfig.php');
include('includes/dbconnection.php');
include("model/user.class.php");
$userObj=new userClass();
include('model/sitesettings.class.php');
$site_settings_disp=sitesettingsClass::getsitesettings();
include("includes/controller.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en" xml:lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?=$site_settings_disp->title;?></title>
<link type="text/css" rel="stylesheet" href="allfiles/layout_<?=$site_settings_disp->theme_selection;?>.css">
<script type="text/javascript" src="allfiles/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="allfiles/superfish.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<style type="text/css">
	.alert-message
{
    margin: 10px 0;
    padding: 10px;
    border-left: 3px solid #eee;
}
.alert-message h4
{
    margin-top: 0;
    margin-bottom: 5px;
}
.alert-message p:last-child
{
    margin-bottom: 0;
}
.alert-message code
{
    background-color: #fff;
    border-radius: 3px;
}
.alert-message-success
{
    background-color: #F4FDF0;
    border-color: #3C763D;
}
.alert-message-success h4
{
    color: #3C763D;
}
.alert-message-danger
{
    background-color: #fdf7f7;
    border-color: #d9534f;
}
.alert-message-danger h4
{
    color: #d9534f;
}
.alert-message-warning
{
    background-color: #fcf8f2;
    border-color: #f0ad4e;
}
.alert-message-warning h4
{
    color: #f0ad4e;
}
.alert-message-info
{
    background-color: #f4f8fa;
    border-color: #5bc0de;
}
.alert-message-info h4
{
    color: #5bc0de;
}
.alert-message-default
{
    background-color: #EEE;
    border-color: #B4B4B4;
}
.alert-message-default h4
{
    color: #000;
}
.alert-message-notice
{
    background-color: #FCFCDD;
    border-color: #BDBD89;
}
.alert-message-notice h4
{
    color: #444;
}



.rtable {
  display: inline-block;
  vertical-align: top;
  max-width: 100%;
  overflow-x: auto;
  white-space: nowrap;
  border-collapse: collapse;
  border-spacing: 0;
}

.rtable,
.rtable--flip tbody {
  -webkit-overflow-scrolling: touch;
  background: -webkit-radial-gradient(left ellipse, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0) 75%) 0 center, -webkit-radial-gradient(right ellipse, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0) 75%) 100% center;
  background: radial-gradient(ellipse at left, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0) 75%) 0 center, radial-gradient(ellipse at right, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0) 75%) 100% center;
  background-size: 10px 100%, 10px 100%;
  background-attachment: scroll, scroll;
  background-repeat: no-repeat;
}

.rtable td:first-child,
.rtable--flip tbody tr:first-child {
  background-image: -webkit-linear-gradient(left, white 50%, rgba(255, 255, 255, 0) 100%);
  background-image: linear-gradient(to right, white 50%, rgba(255, 255, 255, 0) 100%);
  background-repeat: no-repeat;
  background-size: 20px 100%;
}

.rtable td:last-child,
.rtable--flip tbody tr:last-child {
  background-image: -webkit-linear-gradient(right, white 50%, rgba(255, 255, 255, 0) 100%);
  background-image: linear-gradient(to left, white 50%, rgba(255, 255, 255, 0) 100%);
  background-repeat: no-repeat;
  background-position: 100% 0;
  background-size: 20px 100%;
}

.rtable th {
  font-size: 11px;
  text-align: left;
  text-transform: uppercase;
  background: #f2f0e6;
}

.rtable th,
.rtable td {
  padding: 6px 12px;
  border: 1px solid #d9d7ce;
}

.rtable--flip {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  overflow: hidden;
  background: none;
}

.rtable--flip thead {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-shrink: 0;
      -ms-flex-negative: 0;
          flex-shrink: 0;
  min-width: -webkit-min-content;
  min-width: -moz-min-content;
  min-width: min-content;
}

.rtable--flip tbody {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  position: relative;
  overflow-x: auto;
  overflow-y: hidden;
}

.rtable--flip tr {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column;
  min-width: -webkit-min-content;
  min-width: -moz-min-content;
  min-width: min-content;
  -webkit-flex-shrink: 0;
      -ms-flex-negative: 0;
          flex-shrink: 0;
}

.rtable--flip td,
.rtable--flip th {
  display: block;
}

.rtable--flip td {
  background-image: none !important;
  border-left: 0;
}

.rtable--flip th:not(:last-child),
.rtable--flip td:not(:last-child) {
  border-bottom: 0;
}



</style>
</head>
<body>
<div id="container">
<?php
include('includes/headermenu.php'); 
?> 
<div id="content">
<!--<div class="breadcrumb"><a href="allfiles/Dashboard.htm">Home</a></div>-->
<?php 
if(isset($_GET['err']) && $_GET['err']!=""){
?>
<div class="alert-message alert-message-success">
                <p>Success: <?=$_GET['ferr']?></p>
</div>
<?php /* ?><div class="success">Success: <?=$_GET['err']?>!</div><?php */?>

<?php } if(isset($_GET['ferr']) && $_GET['ferr']!=""){?>

<div class="alert-message alert-message-danger">
                <p>Fail: <?=$_GET['ferr']?></p>
</div>

<?php /*?><div class="warning">Fail: <?=$_GET['ferr']?>.</div><?php */?>

<?php }?>
<?php include($disptemp); ?> 
</div>
</div>
<?php include('includes/footer.php'); ?> 
</body></html>