<?php
class testimonialsClass
{ 

 // Product category //
 function getAllTestimonialsList($sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$query=$callConfig->selectQuery(TPREFIX.TBL_TESTIMONIALS,'*','',$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllTestimonialsListCount()
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_TESTIMONIALS,'id','','','','');
	 return $callConfig->getCount($query);
  } 
  
  function getTestimonialData($id)
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_TESTIMONIALS,'*','id='.$id,'','','');
	return $callConfig->getRow($query);
 }
 
	function insertTestimonials($post)
	{
	global $callConfig;
	$fieldnames=array('title'=>mysql_real_escape_string($post['title']),'big_text'=>mysql_real_escape_string($post['big_text']),'status'=>$post['status']);
	$res=$callConfig->insertRecord(TPREFIX.TBL_TESTIMONIALS,$fieldnames);
	if($res!="")
	{
		sitesettingsClass::recentActivities('Testimonial created successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_testimonialslist&err=Testimonial created successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Testimonial creation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_testimonialslist&ferr=Testimonial creation failed");
	}
	}
	
	function updateTestimonials($post)
	{
	global $callConfig;
	$fieldnames=array('title'=>mysql_real_escape_string($post['title']),'big_text'=>mysql_real_escape_string($post['big_text']),'status'=>$post['status']);
	$res=$callConfig->updateRecord(TPREFIX.TBL_TESTIMONIALS,$fieldnames,'id',$post['hdn_id']);
	if($res!="")
	{
		sitesettingsClass::recentActivities('Testimonial updated successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_testimonialslist&err=Testimonial updated successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Testimonial updation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_testimonialslist&ferr=Testimonial updation failed");
	}
	}
	function testimonialsDelete($id)
	{
	global $callConfig;
	$res=$callConfig->deleteRecord(TPREFIX.TBL_TESTIMONIALS,'id',$id);
	if($res!="")
	{
		sitesettingsClass::recentActivities('Testimonial deleted successfully on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_testimonialslist&err=Testimonial deleted successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Testimonial deletion failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_testimonialslist&ferr=Testimonial deletion failed");
	}
	}
	
	/// Product category  
}	
	?>