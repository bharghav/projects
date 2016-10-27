<?php

class mailClass
{ 

  function getAllContentPagesList($sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	 $query=$callConfig->selectQuery(TPREFIX.TBL_MAIL_TEMPLATE,'*','','id ASC',$start,$limit); 

	return $callConfig->getAllRows($query);
  } 

	function getAllContentPagesListCount()
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_MAIL_TEMPLATE,'id','','','','');
	return $callConfig->getCount($query);
	} 

	function getContentPageData($id)
	{	
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_MAIL_TEMPLATE,'*','id='.$id,'','','');
		return $callConfig->getRow($query);
	}

 	function insertcontentPage($post)
	{
		global $callConfig;
		
		
		$fieldnames=array(
		'title'=>mysql_real_escape_string($post['title']),
		'header1'=>mysql_real_escape_string($post['header1']),
		'footer'=>mysql_real_escape_string($post['footer']),
		'status'=>mysql_real_escape_string($post['status'])
		);
		
		//print_r($fieldnames); exit;
		$res=$callConfig->insertRecord(TPREFIX.TBL_MAIL_TEMPLATE,$fieldnames);
		if($res!="")
		{
			sitesettingsClass::recentActivities('Page Added successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_mail&err=Page Added successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Page Adding failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_mail&ferr=Page Adding failed");
		}
	}
	
	function updatecontentPage($post)
	{
		global $callConfig;
			print_r($post);	
		$fieldnames=array(
		'title'=>mysql_real_escape_string($post['title']),
		'header1'=>mysql_real_escape_string($post['header1']),
		'footer'=>mysql_real_escape_string($post['footer']),
		'status'=>mysql_real_escape_string($post['status'])
		);
		
		//print_r($fieldnames); exit;
		$res=$callConfig->updateRecord(TPREFIX.TBL_MAIL_TEMPLATE,$fieldnames,'id',$post['hdn_page_id']);
		//echo $res; exit;
		if($res!="")
		{
			sitesettingsClass::recentActivities('Page updated successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_mail&err=Page updated successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Page updattion failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_mail&ferr=Page updattion failed");
		}
	}

	function contentpageDelete($id)

	{
	//echo "syam";exit;
	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_MAIL_TEMPLATE,'id',$id);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Page deleted successfully on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_mail&err=Page deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Page deletion failed on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_mail&ferr=Page deletion failed");

	}

	}

}

?>