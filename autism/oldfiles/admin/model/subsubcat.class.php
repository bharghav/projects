<?php

class subsubcategoryClass
{ 

  function getAllContentPagesList($sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	 $query=$callConfig->selectQuery(TPREFIX.TBL_SUBSUBCATEGORY,'*','',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 
  
  
  
 /* function getAllpillslist($id)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	$query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTPILLS,'*','prd_id="'.$id.'"',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } */


 function getAllSearchname($search,$sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	  $query=$callConfig->selectQuery(TPREFIX.TBL_SUBSUBCATEGORY,'*','title LIKE "%'.$search.'%"',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 
  
  function getAllSearchnamecount($search,$sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	  $query=$callConfig->selectQuery(TPREFIX.TBL_SUBSUBCATEGORY,'*','title LIKE "%'.$search.'%"',$order,$start,$limit); 

	return $callConfig->getCount($query);
  } 





	function getAllContentPagesListCount()
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_SUBSUBCATEGORY,'id','','','','');
	return $callConfig->getCount($query);
	} 

	function getContentPageData($id)
	{	
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_SUBSUBCATEGORY,'*','id='.$id,'','','');
		return $callConfig->getRow($query);
	}
	
	
	
	
	
	
	

 	function insertcontentPage($post)
	{
		global $callConfig;
		
		if($post['title']!="")
		$titleslug=$callConfig->remove_special_symbols($post['title']);
		else
		$titleslug=$callConfig->remove_special_symbols($post['title']);
	$bannerimage = $callConfig->freeimageUploadcomncode('category','image',"../uploads/Category/","../uploads/Category/thumbs/",$post['hdn_image'],'87','45');
//$flatimage = $callConfig->freeimageUploadcomncode('products','flatimage',"../uploads/Products/","../uploads/Products/flat/",$post['hdnflat_image'],'81','27');
		
		$fieldnames=array(
		'title'=>mysql_real_escape_string($post['title']),
		'titleslug'=>$titleslug,
		'pdescription'=>mysql_real_escape_string($post['descr']),
		'image'=>$bannerimage,
		'status'=>$post['status']
		);
		
		
		$res=$callConfig->insertRecord(TPREFIX.TBL_SUBSUBCATEGORY,$fieldnames);
		if($res!="")
		{
			sitesettingsClass::recentActivities('Product Added successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_subsubcategory&err=Product Added successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Product Adding failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_subsubcategory&ferr=Product Adding failed");
		}
	}
	
	function updatecontentPage($post)
	{
		global $callConfig;
		
		if($post['title']!="")
		$titleslug=$callConfig->remove_special_symbols($post['title']);
		else
		$titleslug=$callConfig->remove_special_symbols($post['title']);
		
		$bannerimage = $callConfig->freeimageUploadcomncode('category','image',"../uploads/Category/","../uploads/Category/thumbs/",$post['hdn_image'],'87','45');
		//$flatimage = $callConfig->freeimageUploadcomncode('products','flatimage',"../uploads/Category/flat/","../uploads/Category/flat/thumbs",$post['hdnflat_image'],'81','27');
		
		$fieldnames=array(
		'title'=>mysql_real_escape_string($post['title']),
		'titleslug'=>$titleslug,
		'pdescription'=>mysql_real_escape_string($post['descr']),
		'image'=>$bannerimage,
		'status'=>$post['status']		
		);
		
		//print_r($fieldnames); exit;
		$res=$callConfig->updateRecord(TPREFIX.TBL_SUBSUBCATEGORY,$fieldnames,'id',$post['hdn_page_id']);
		//echo $res; exit;
		if($res!="")
		{
			sitesettingsClass::recentActivities('Category updated successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_subsubcategory&err=Category updated successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Category updattion failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_subsubcategory&ferr=Category updattion failed");
		}
	}

	function contentpageDelete($id)

	{
	//echo "syam";exit;
	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_SUBSUBCATEGORY,'id',$id);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Page deleted successfully on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_subsubcategory&err=Property deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Page deletion failed on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_products&ferr=Product deletion failed");

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

			$callConfig->headerRedirect("index.php?option=com_subsubcategory_insert&head=b&id=".$prod_id);

	}
   
	

}

?>