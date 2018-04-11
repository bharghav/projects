<?php
error_reporting(1); 
define(HOSTNAME,"localhost");
define(USERNAME,"root");
define(PASSWORD,"");
define(DBNAME,  "zestquiz");

/*define(HOSTNAME,"supremecenter12.co.uk");
define(USERNAME,"rchukkala_teens");
define(PASSWORD,"Media3123");
define(DBNAME,"rchukkala_teens");

define(HOSTNAME,"216.227.216.46");
define(USERNAME,"thesu34_steens");
define(PASSWORD,"Media3123");
define(DBNAME,"thesu34_superteens");*/

###################################################################
######### TABLE CONSTANTS 
###################################################################

/********* Table Prefix *********/
define('TPREFIX', 'tb_'); 

/********* Table Names *********/
define('TBL_ADMIN','admin');
define('TBL_ADMINSINFO','admin_info');
define('TBL_SITESETTINGS','sitesettings');
define('TBL_RECENTACTIVITIES','recentactivities');
define('TBL_CONTENTPAGES','contentpages');
define('TBL_BANNERS','banners');
define('TBL_BLOGPOST','blog');
define('TBL_BLOGCOMMENTS','blog_comments');
define('TBL_FORUMCATEGORY','forum_category');
define('TBL_FORUMTOPICS','forum_topics');
define('TBL_FORUMCOMMENTS','forum_comments');
define('TBL_CATEGORY','category');
define('TBL_SUBCATEGORY','subcategory');
define('TBL_SUBJECTS','subjects');
define('TBL_QUESTION','questions');
define('TBL_QUESTIONOPTIONS','questionoptions');

define('TBL_STORECATEGORY','store_category');
define('TBL_STOREPRODUCTS','store_products');
define('TBL_SUBSCRIBERS','newsletter_subscribers');
define('TBL_NEWSCONTENT','newsletter_content');
define('TBL_NEWSEVENTS','newsevents');
define('TBL_RELATIONSHIPADVICE','relationshipadvice');
define('TBL_CART','cart');
define('TBL_CART_ORDER','cart_order');
define('TBL_CART_TRANSACTION','cart_transcation');
define('TBL_IPADDRESSTRACE','ipaddresstrace');


define('ADMINROOT','administrator');
define('STR_TO_TIME',strtotime(date("Y-m-d H:i:s")));
define('ONLY_DATE',date("Y-m-d"));
define('DATE_TIME',date("Y-m-d H:i:s"));
define('DATE_TIME_FORMAT',date("l dS F Y, H:i:s A", STR_TO_TIME));
define('DATETIMEFORMAT',date("l-dS-F-Y-H-i-s-A", STR_TO_TIME));
define('DBIN','INSERT INTO ');
define('DBUP','UPDATE ');
define('DBWHR',' WHERE ');
define('DBDEL','DELETE ');
define('DBFROM',' FROM ');
define('DBSELECT',' SELECT ');
define('DBSET',' SET ');
define('HEAD_LTN','location:');
define('DB_LMT',' LIMIT ');
define('DB_ORDER',' ORDER BY ');

###################################################################
######### Physical Path Constants 
###################################################################
define(SITEROOT, 				$_SERVER['DOCUMENT_ROOT']."");
define(LISTINGIMAGESROOT, 		SITEROOT."/images/listings");
define(UPLOADSROOT, 			SITEROOT."/uploads/");
define(USER_IMAGE_ROOT,	        SITEROOT."/images/");

###################################################################
######### Url Constants 
###################################################################
define(SITEURL, 				"http://".$_SERVER['HTTP_HOST']."");

define(SITEPATH_URL,'http://'.$_SERVER['HTTP_HOST']);
?>