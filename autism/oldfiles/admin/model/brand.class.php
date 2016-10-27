<?php

class brandClass
{ 

  function getAllfaqList($sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	 $query=$callConfig->selectQuery(TPREFIX.TBL_BRAND,'*','',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 

	function getAllfaqListCount()
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_BRAND,'id','','','','');
	return $callConfig->getCount($query);
	} 

	function getfaqData($id)
	{	
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_BRAND,'*','id='.$id,'','','');
		return $callConfig->getRow($query);
	}
	
	function getcategory()
	{	
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_CATEGORY,'*','','','','');
		return $callConfig->getAllRows($query);
	}
	function getallsubcat($id)
	{	
		global $callConfig;
		$whr="cat_id='".$id."'";
		 $query=$callConfig->selectQuery(TPREFIX.TBL_SUBCATEGORY,'*',$whr,'','',''); 
		return $callConfig->getAllRows($query);
	}
	
    function getcatname($id)
	{	
		global $callConfig;
		$whr="id='".$id."'";
		 $query=$callConfig->selectQuery(TPREFIX.TBL_CATEGORY,'*',$whr,'','',''); 
		return $callConfig->getRow($query);
	}



 	function insertbrands($post)
	{
		global $callConfig;
		
		if($post['brand']!="")
		$titleslug=$callConfig->remove_special_symbols($post['brand']);
		else
		$titleslug=$callConfig->remove_special_symbols($post['brand']);
//$contentimage = $callConfig->freeimageUploadcomncode('content','image',"../uploads/contents/","../uploads/contents/thumbs/",$post['hdn_image'],'87','45');
		
		$fieldnames=array(
		'cat_id'=>$post['category'],
		'subcat_id'=>$post['subcat'],
		'brand'=>mysql_real_escape_string($post['brand']),
		'titlesluge'=>$titleslug,
		'status'=>$post['status']);
		$res=$callConfig->insertRecord(TPREFIX.TBL_BRAND,$fieldnames);
		if($res!="")
		{
		sitesettingsClass::recentActivities('Brand Added successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_barnd&err=Brand Added successfully");
		}
		else
		{
		sitesettingsClass::recentActivities('Brand Adding failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_barnd&ferr=Brand Adding failed");
		}
	}
	
	
	
	
	
	function updatebarnd($post)
	{
		global $callConfig;
//$contentimage = $callConfig->freeimageUploadcomncode('content','image',"../uploads/contents/","../uploads/contents/thumbs/",$post['hdn_image'],'87','45');
		if($post['brand']!="")
		$titleslug=$callConfig->remove_special_symbols($post['brand']);
		else
		$titleslug=$callConfig->remove_special_symbols($post['brand']);
		$fieldnames=array(
		'cat_id'=>$post['category'],
		'subcat_id'=>$post['subcat'],
		'brand'=>mysql_real_escape_string($post['brand']),
		'titlesluge'=>$titleslug,
		'status'=>$post['status']);		
		//print_r($fieldnames); exit;
		$res=$callConfig->updateRecord(TPREFIX.TBL_BRAND,$fieldnames,'id',$post['hdn_page_id']);
		//echo $res; exit;
		if($res!="")
		{
			sitesettingsClass::recentActivities('Brand updated successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_barnd&err=Brand updated successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Brand updattion failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_barnd&ferr=Brand updattion failed");
		}
	}

	function contentpageDelete($id)

	{
	//echo "syam";exit;
	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_BRAND,'id',$id);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Page deleted successfully on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_barnd&err=Page deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Page deletion failed on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_barnd&ferr=Page deletion failed");

	}

	}

}

?>