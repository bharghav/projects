<?php 
ini_set("display_errors",0);
/*define(HOSTNAME,"localhost");
define(USERNAME,"desdomai_dcs");
define(PASSWORD,"Media3123");
define(DBNAME,"desdomai_gisolartech");
*/
define(HOSTNAME,"localhost");
define(USERNAME,"root");
define(PASSWORD,"");
define(DBNAME,"care4autism");

/*define(HOSTNAME, "localhost");
define(USERNAME, "rajeshch_apnabaz");
define(PASSWORD, "&~bPK[GrqD;N");
define(DBNAME, "rajeshch_apnabazar");*/

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



define('TBL_PROVIDERS','providers');
define('TBL_USERS','users');
define('TBL_REVIEW_LOGS','review_logs');

//$timezone = "Asia/Calcutta";
//if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
define('ADMINROOT','admin');
define('STR_TO_TIME',strtotime(date("Y-m-d H:i:s")));
define('ONLY_DATE',date("m-d-Y"));
define('DATE_TIME',date("m-d-Y H:i:s"));
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
define('DB_LIKE',' LIKE ');

###################################################################
######### Physical Path Constants 
###################################################################
//define(SITEROOT, 				$_SERVER['DOCUMENT_ROOT']."/~rajeshch/Apnabazar");

define(SITEROOT, 				$_SERVER['DOCUMENT_ROOT']."/autism");

//define(SITEROOT, 				$_SERVER['DOCUMENT_ROOT']."");
//define(SITEROOT, 				$_SERVER['DOCUMENT_ROOT']);
/*define(LISTINGIMAGESROOT, 		SITEROOT."/images/listings");
define(UPLOADSROOT, 			SITEROOT."/uploads/");
define(USER_IMAGE_ROOT,	        SITEROOT."/images/");
*/
###################################################################
######### Url Constants 
###################################################################
//define(SITEURL, 				"http://".$_SERVER['HTTP_HOST']);
//define(SITEURL, 				"http://".$_SERVER['HTTP_HOST']."");
//define(SITEURL, 				"http://".$_SERVER['HTTP_HOST']."/~rajeshch/Apnabazar");

define(SITEURL, 				"http://".$_SERVER['HTTP_HOST']."/autism");

//define(SITEPATH_URL,'http://'.$_SERVER['HTTP_HOST']);
?>