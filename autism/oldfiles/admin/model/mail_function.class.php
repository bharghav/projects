<?php

class mailClass
{ 

  function getAllContentPagesList($sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	 $query=$callConfig->selectQuery(TPREFIX.TBL_MAILFUNCTIONS,'*','','id ASC',$start,$limit); 

	return $callConfig->getAllRows($query);
  } 

	function getAllContentPagesListCount()
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_MAILFUNCTIONS,'id','','','','');
	return $callConfig->getCount($query);
	} 

	function getContentPageData($id)
	{	
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_MAILFUNCTIONS,'*','id='.$id,'','','');
		return $callConfig->getRow($query);
	}
	
	function getmailTemplate($id)
	{	
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_MAIL_TEMPLATE,'*','','','','');
		return $callConfig->getAllRows($query);
	}
	

 	function insertcontentPage($post)
	{
		global $callConfig;
		
		
		$fieldnames=array(
		'title'=>mysql_real_escape_string($post['title']),
		'templateid'=>mysql_real_escape_string($post['template']),
		'description'=>mysql_real_escape_string($post['description']),
		'status'=>mysql_real_escape_string($post['status'])
		);
		
		//print_r($fieldnames); exit;
		$res=$callConfig->insertRecord(TPREFIX.TBL_MAILFUNCTIONS,$fieldnames);
		if($res!="")
		{
			sitesettingsClass::recentActivities('Mail Function added successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_mail_functions&err=Mail Function Added successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Mail Function failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_mail_functions_functions&ferr=Mail Function Adding failed");
		}
	}
	
	function updatecontentPage($post)
	{
		global $callConfig;
			print_r($post);	
		$fieldnames=array(
		'title'=>mysql_real_escape_string($post['title']),
		'templateid'=>mysql_real_escape_string($post['template']),
		'description'=>mysql_real_escape_string($post['description']),
		'status'=>mysql_real_escape_string($post['status'])
		);
		
		//print_r($fieldnames); exit;
		$res=$callConfig->updateRecord(TPREFIX.TBL_MAILFUNCTIONS,$fieldnames,'id',$post['hdn_page_id']);
		//echo $res; exit;
		if($res!="")
		{
			sitesettingsClass::recentActivities('Mail Function updated successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_mail_functions&err=Mail Function updated successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Mail Function updattion failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_mail_functions&ferr=Mail Function updattion failed");
		}
	}

	function contentpageDelete($id)

	{
	//echo "syam";exit;
	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_MAILFUNCTIONS,'id',$id);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Page deleted successfully on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_mail_functions&err=Page deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Page deletion failed on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_mail_functions&ferr=Page deletion failed");

	}

	}

}

?>