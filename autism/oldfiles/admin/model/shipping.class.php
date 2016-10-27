<?php

class shippingClass
{ 

  function getAllContentPagesList($sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	 $query=$callConfig->selectQuery(TPREFIX.TBL_SHIPPING,'*','',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 
  
  
  


 function getAllSearchname($search,$sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	  $query=$callConfig->selectQuery(TPREFIX.TBL_SHIPPING,'*','title LIKE "%'.$search.'%"',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 
  
  function getAllSearchnamecount($search,$sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	  $query=$callConfig->selectQuery(TPREFIX.TBL_SHIPPING,'*','title LIKE "%'.$search.'%"',$order,$start,$limit); 

	return $callConfig->getCount($query);
  } 





	function getAllContentPagesListCount()
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_SHIPPING,'id','','','','');
	return $callConfig->getCount($query);
	} 

	function getContentPageData($id)
	{	
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_SHIPPING,'*','id='.$id,'','','');
		return $callConfig->getRow($query);
	}
	
	
	
	

 	function insertcontentPage($post)
	{
		global $callConfig;
		
		
		$fieldnames=array(
		'title'=>mysql_real_escape_string($post['title']),
		'price'=>$post['price'],
		'status'=>$post['status']
		);
		
		
		$res=$callConfig->insertRecord(TPREFIX.TBL_SHIPPING,$fieldnames);
		if($res!="")
		{
			sitesettingsClass::recentActivities('Shipping Added successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_shipping&err=Shipping Added successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Shipping Adding failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_shipping&ferr=Shipping Adding failed");
		}
	}
	
	function updatecontentPage($post)
	{
		global $callConfig;
		
		
		$fieldnames=array(
		'title'=>mysql_real_escape_string($post['title']),
		'price'=>$post['price'],
		'status'=>$post['status']		
		);
		
		//print_r($fieldnames); exit;
		$res=$callConfig->updateRecord(TPREFIX.TBL_SHIPPING,$fieldnames,'id',$post['hdn_page_id']);
		//echo $res; exit;
		if($res!="")
		{
			sitesettingsClass::recentActivities('Shipping updated successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_shipping&err=Shipping updated successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Shipping updattion failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_shipping&ferr=Shipping updattion failed");
		}
	}

	function contentpageDelete($id)

	{
	//echo "syam";exit;
	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_SHIPPING,'id',$id);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Shipping deleted successfully on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_shipping&err=Shipping deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Page deletion failed on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_products&ferr=Product deletion failed");

	}

	}
	
	

	

}

?>