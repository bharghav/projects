<?php

class subcategoryClass
{ 

  function getAllContentPagesList($sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	 $query=$callConfig->selectQuery(TPREFIX.TBL_SUBCATEGORY,'*','',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 
  
  
  
  function getAllpillslist($id)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	$query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTPILLS,'*','prd_id="'.$id.'"',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 


 function getAllSearchname($search,$sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	  $query=$callConfig->selectQuery(TPREFIX.TBL_SUBCATEGORY,'*','title LIKE "%'.$search.'%"',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 
  
  function getAllSearchnamecount($search,$sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	  $query=$callConfig->selectQuery(TPREFIX.TBL_SUBCATEGORY,'*','title LIKE "%'.$search.'%"',$order,$start,$limit); 

	return $callConfig->getCount($query);
  } 





	function getAllContentPagesListCount()
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_SUBCATEGORY,'id','','','','');
	return $callConfig->getCount($query);
	} 

	function getContentPageData($id)
	{	
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_SUBCATEGORY,'*','id='.$id,'','','');
		return $callConfig->getRow($query);
	}
	
	
	
	

 	function insertcontentPage($post)
	{
		//print_r($post);exit;
		global $callConfig;
		
		
		
	$bannerimage = $callConfig->freeimageUploadcomncode('subcategory','image',"../uploads/subcategory/","../uploads/subcategory/thumbs/",$post['hdn_image'],'','');
//$flatimage = $callConfig->freeimageUploadcomncode('products','flatimage',"../uploads/Products/","../uploads/Products/flat/",$post['hdnflat_image'],'81','27');
		
		$fieldnames=array(
		'cat_id'=>$_POST['category'],
		'title'=>$_POST['title'],
		'pdescription'=>$_POST['pdescription'],
		'image'=>$bannerimage,
		'status'=>$_POST['status']
		);
		
		//print_r($fieldnames);exit;
		 $res=$callConfig->insertRecord(TPREFIX.TBL_SUBCATEGORY,$fieldnames); 
			// print_r($res);exit;
		if($res!="")
		{
		
			sitesettingsClass::recentActivities('Category Added successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_subcategory&err=Category Added successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Category Adding failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_subcategory&ferr=Category Adding failed");
		}
	}
	  
	function updatecontentPage($post)
	{
		
		
		//print_r($fieldnames);exit;
		global $callConfig;
		
		
		
		$bannerimage = $callConfig->freeimageUploadcomncode('subcategory','image',"../uploads/subcategory/","../uploads/subcategory/thumbs/",$post['hdn_image'],'','');
		//$flatimage = $callConfig->freeimageUploadcomncode('products','flatimage',"../uploads/Category/flat/","../uploads/Category/flat/thumbs",$post['hdnflat_image'],'81','27');
		
		$fieldnames=array(
		'cat_id'=>$_POST['category'],
		'title'=>$_POST['title'],
		'pdescription'=>$_POST['pdescription'],
		'image'=>$bannerimage,
		'status'=>$_POST['status']	
		);
		
		//print_r($fieldnames); exit;
		$res=$callConfig->updateRecord(TPREFIX.TBL_SUBCATEGORY,$fieldnames,'id',$post['hdn_page_id']);
		//echo $res; exit;
		if($res!="")
		{
			sitesettingsClass::recentActivities('subcategory updated successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_subcategory&err=subcategory updated successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('subcategory updattion failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_subcategory&ferr=subcategory updattion failed");
		}
	}

	function contentpageDelete($id)

	{
	//echo "syam";exit;
	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_SUBCATEGORY,'id',$id);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Category deleted successfully on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_subcategory&err=Category deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Category deletion failed on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_products&ferr=Category deletion failed");

	}

	}
	
	
	 function deleteGallryImage($prod_id)

	{

			global $callConfig;

			$whr="id=".$prod_id;

			$query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTPILLS,'*',$whr,'','','');

			$result=$callConfig->getRow($query);

			$callConfig->imageCommonUnlink("../uploads/Products/","../uploads/TBL_PRODUCTPILLS/thumbs/",$result->pro_image);

			$del_query=$callConfig->deleteRecord(TPREFIX.TBL_PRODUCTPILLS,'id',$prod_id);

			$callConfig->headerRedirect("index.php?option=com_subcategory_insert&head=b&id=".$prod_id);

	}
	
	function get_categorydata($id)
	{
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_CATEGORY,'*','id='.$id.'','','','');
		return $callConfig->getRow($query);
	}
	
	function get_subcategory()
	{
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_CATEGORY,'*','','','','');
		return $callConfig->getAllRows($query);
	}
   
	

}

?>