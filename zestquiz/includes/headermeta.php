<?php 
include_once("includes/sessions.php");
include('dbconfig.php');
include('administrator/includes/dbconnection.php');
include ('model/contentpages.class.php');
$contentpageObj= new contentpagesClass();
if($_GET['pgid']!="" || $_GET['btid']!=""){
$pg_id=$_GET['pgid'];
} else {
$pg_id=$contentpageObj->getContentPageSlugnameBasedOnPageId('1');
}
$content=$contentpageObj->getContentPageData($pg_id);
$sitedata=$contentpageObj->getsitesettings();
include ('model/user.class.php');
$frontuserObj= new userClass();

include ('model/blog.class.php');
$frontUserBlogObj= new blogtopicClass();
$whichblogMETA=$contentpageObj->checkHomeORBlogPostsForRightNav($_GET['btid']); 

include ('model/store.class.php');
$frontUserOnlineStoreObj= new storeClass();

include ('model/forum.class.php');
$forumObj= new fourmClass();
$allforumtopicdata=$forumObj->getForumTopicData($_GET['ftid']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php 
if($content->page_title!="" && $_GET['bt']=="" &&  $_GET['fh']=="" &&  $_GET['fscid']=="" &&  $_GET['ftid']=="")echo stripslashes($content->page_title);
if($_GET['bt'] && $_GET['fscid']=="") echo "The Super Teens - Blog ";
if($_GET['fh'] && $_GET['fscid']=="") echo "The Super Teens - Forum ";
if($_GET['fscid']!="" && $_GET['ftid']=="") echo "The Super Teens - Forum - Topics"; 
if($_GET['ftid']!="") echo "The Super Teens - Forum - Topics - ".$allforumtopicdata->title;
if($content->page_title=="" && $whichblogMETA->title=="")echo "The Super Teens";
if($whichblogMETA->title!="")echo "The Super Teens - Blog ".stripslashes($whichblogMETA->title); 
?>
</title>
<meta name="description" content="<?php if($content->meta_desc!="")echo stripslashes($content->meta_desc); else echo "The Super Teens";?>">
<meta name="keywords" content="<?php if($content->meta_keyword!="")echo stripslashes($content->meta_keyword); else echo "The Super Teens";?>">
<meta name="language" content="EN">
<META NAME="author" CONTENT="The Super Teens">
<meta name="revisit-after" content="2 days">
<meta name="document-classification" content="The Super Teens">
<meta name="document-type" content="Public">
<meta name="document-rating" content="Safe for Kids">
<meta name="document-distribution" content="Global">
<link rel="shortcut icon" href="favicon.ico">
<link rel="icon" type="image/gif" href="animated_favicon1.gif">
<link href="styles.css" rel="stylesheet" type="text/css" />
<?php echo stripslashes($sitedata->googleanalytics);?>
<?php /*?><style type="text/css">
<!--
body {
	background-image: url(images/bg6.jpg);
	background-repeat: no-repeat;
	background-position:center top;
}
-->
</style><?php */?>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="196" align="center" valign="top" style="background-image:url(images/header-bg_02.jpg); background-repeat:no-repeat; background-position:center"><table width="1004" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top"><a href="index.php" title="The Superteens Logo"><img src="images/logo_03.png" width="284" height="196" border="0" alt="The Superteens Logo" /></a></td>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="45" align="right" valign="middle" ><table width="37%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" valign="middle"><a href="blogtopics.php?bt=1"><img src="images/header-buttons_07.png" width="38" height="10" border="0" /></a></td>
                <td align="center" valign="middle"><img src="images/header-buttons_09.png" width="3" height="13" /></td>
                <td align="center" valign="middle"><a href="forumhome.php?fh=1"><img src="images/header-buttons_11.png" width="49" height="10" border="0" /></a></td>
                <td align="center" valign="middle"><img src="images/header-buttons_09.png" width="3" height="13" /></td>
               <?php 
				if($_SESSION['frnt_mid']==""){?>
			    <td align="center" valign="middle">
				<a href="registeration.php"><img src="images/header-buttons_13.png" width="68" height="10" border="0" /></a>
				</td>
                <td align="center" valign="middle"><img src="images/header-buttons_09.png" width="3" height="13" /></td>
                <td align="center" valign="middle"><a href="login.php"><img src="images/header-buttons_15.png" width="52" height="10" border="0" /></a></td>
				<?php } else {?>
				<td align="center" valign="middle">
				<a href="userprofile.php"><img src="images/myaccount_07.png" width="88" height="10" border="0" /></a>
				</td>
                <td align="center" valign="middle"><img src="images/header-buttons_09.png" width="3" height="13" /></td>
                <td align="center" valign="middle"><a href="logout.php"><img src="images/signout_07.png"width="56" height="10" border="0" /></a></td>
				<?php }?>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td align="left" valign="top"><a href="index.php" title="The Superteens Slogan"><img src="images/logo-caption_06.png" width="720" height="151" alt="The Superteens Slogan" /></a></td>
        </tr>
      </table></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td align="center" valign="top">