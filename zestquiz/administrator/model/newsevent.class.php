<?php
class newseventsClass
{ 
 // Product category //
  function getAllNeweventsList($sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$query=$callConfig->selectQuery(TPREFIX.TBL_NEWSEVENTS,'*','',$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllNeweventsListCount()
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_NEWSEVENTS,'id','','','','');
	 return $callConfig->getCount($query);
  } 
  
  function getNeweventData($id)
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_NEWSEVENTS,'*','id='.$id,'','','');
	return $callConfig->getRow($query);
  }
 
	function insertNewevents($post)
	{
	global $callConfig;
	$fieldnames=array('title'=>mysql_real_escape_string($post['title']),'bigtext'=>mysql_real_escape_string($post['bigtext']),'status'=>$post['status']);
	$res=$callConfig->insertRecord(TPREFIX.TBL_NEWSEVENTS,$fieldnames);
	if($res!="")
	{
		sitesettingsClass::recentActivities('News created successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_newseventslist&err=News created successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('News creation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_newseventslist&ferr=News creation failed");
	}
	}
	
	function updateNewevents($post)
	{
	global $callConfig;
	$fieldnames=array('title'=>mysql_real_escape_string($post['title']),'bigtext'=>mysql_real_escape_string($post['bigtext']),'status'=>$post['status']);
	$res=$callConfig->updateRecord(TPREFIX.TBL_NEWSEVENTS,$fieldnames,'id',$post['hdn_id']);
	if($res==1)
	{
		sitesettingsClass::recentActivities('News updated successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_newseventslist&err=News updated successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('News updation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_newseventslist&ferr=News updation failed");
	}
	}
	function neweventsDelete($id)
	{
	global $callConfig;
	$res=$callConfig->deleteRecord(TPREFIX.TBL_NEWSEVENTS,'id',$id);
	if($res==1)
	{
		sitesettingsClass::recentActivities('News deleted successfully on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_newseventslist&err=News deleted successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('News deletion failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_newseventslist&ferr=News deletion failed");
	}
	}
	
	/// Product category  
}	
	?>