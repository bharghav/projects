<?php
class newsletterClass
{ 
  function getAllSubscibersList($sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$query=$callConfig->selectQuery(TPREFIX.TBL_SUBSCRIBERS,'*','',$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllSubscibersListCount()
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_SUBSCRIBERS,'id','','','','');
	 return $callConfig->getCount($query);
  } 
	function subsciberDelete($id)
	{
	global $callConfig;
	$res=$callConfig->deleteRecord(TPREFIX.TBL_SUBSCRIBERS,'id',$id);
	if($res==1)
	{
		sitesettingsClass::recentActivities('Subscriber deleted successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_subscribers&err=Subscriber deleted successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Subscriber deletion failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_subscribers&ferr=Subscriber deletion failed");
	}
	}
	
	function subsciberStatusChanging($get){
	global $callConfig;
	if($get['st']=="Active")
	$statusbe='Inactive';
	else
	$statusbe='Active';
	$fieldnames=array('status'=>$statusbe);
	$res=$callConfig->updateRecord(TPREFIX.TBL_SUBSCRIBERS,$fieldnames,'id',$get['id']);
	if($res==1)
	{
		sitesettingsClass::recentActivities('Subscriber Status changed successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_subscribers&err=Subscriber Status changed successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Subscriber Status changing failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_subscribers&ferr=Subscriber Status changing failed");
	}
	}
	
	
	function getNewsletterContent()
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_NEWSCONTENT,'*','','','','');
	return $callConfig->getRow($query);
  } 
  function mailSubjectConetentSave($post)
  {
	global $callConfig;
	$fieldnames=array('mailsubject '=>mysql_real_escape_string($post['mailsubject']),'mailcontent '=>mysql_real_escape_string($post['mailcontent']));
	$res=$callConfig->updateRecord(TPREFIX.TBL_NEWSCONTENT,$fieldnames,'','');
	if($res==1)
	{
		sitesettingsClass::recentActivities('Newsletter updated successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_newslettercontent&err=Newsletter updated successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Newsletter updation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_newslettercontent&ferr=Newsletter updation failed");
	}
  }
	
	// mail sending
 function massMailSending($post)
 	{
	  global $callConfig;
	  $query=$callConfig->selectQuery(TPREFIX.TBL_NEWSCONTENT,'*','','','','');
	  $res=$callConfig->getRow($query);
	  foreach($post['list'] as $to)
  	     {
		$subject = stripslashes($res->mailsubject);
		$message = "<html><head><title></title><style>.textbold{color:#000000;}</style></head><body>";
		$message.=stripslashes($res->mailcontent);
		$message.="</body></html>";
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: The Superteens <info@themedia3.com>' . "\r\n";
		if(mail($to, $subject, $message, $headers))
		{	
		    sitesettingsClass::recentActivities('Mail sent successfully on >> '.DATE_TIME_FORMAT.'','g');
			header("location:index.php?option=com_subscribers&err=Mail sent successfully");
		}
		else
		{
		    sitesettingsClass::recentActivities('Mail sending failed on >> '.DATE_TIME_FORMAT.'','e');
			header("location:index.php?option=com_subscribers&ferr=Mail sending Failed");
		}
	 }
	}


	
}	
	?>