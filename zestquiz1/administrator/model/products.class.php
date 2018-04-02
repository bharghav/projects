<?php
class productsClass
{ 

 // Product category //
 function getAllProductsList($sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTS,'*','',$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllProductsListCount()
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTS,'id','','','','');
	 return $callConfig->getCount($query);
  } 
  
  function getProductData($id)
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTS,'*','id='.$id,'','','');
	return $callConfig->getRow($query);
 }
 
	function insertProducts($post)
	{
	global $callConfig;
	$prodimage = $callConfig->freeimageUploadcomncode('prod','image',"../uploads/products/",$post['hdn_image']);
	if($post['offer']=="no"){
	$oldprice="";
	$newprice="";
	} else {
	$oldprice=$post['oldprice'];
	$newprice=$post['newprice'];
	}
	$fieldnames=array('title'=>mysql_real_escape_string($post['title']),'image'=>$prodimage,'type'=>$post['type'],'offer'=>$post['offer'],'oldprice'=>$oldprice,'newprice'=>$newprice);
	$res=$callConfig->insertRecord(TPREFIX.TBL_PRODUCTS,$fieldnames);
	if($res!="")
	{
		sitesettingsClass::recentActivities('Product created successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_productslist&err=Product created successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Product creation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_productslist&ferr=Product creation failed");
	}
	}
	
	function updateProducts($post)
	{
	global $callConfig;
	$prodimage = $callConfig->freeimageUploadcomncode('prod','image',"../uploads/products/",$post['hdn_image']);
	if($post['offer']=="no"){
	$oldprice="";
	$newprice="";
	} else {
	$oldprice=$post['oldprice'];
	$newprice=$post['newprice'];
	}
	$fieldnames=array('title'=>mysql_real_escape_string($post['title']),'image'=>$prodimage,'type'=>$post['type'],'offer'=>$post['offer'],'oldprice'=>$oldprice,'newprice'=>$newprice);
	$res=$callConfig->updateRecord(TPREFIX.TBL_PRODUCTS,$fieldnames,'id',$post['hdn_id']);
	if($res!="")
	{
		sitesettingsClass::recentActivities('Product updated successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_productslist&err=Product updated successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Product updation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_productslist&ferr=Product updation failed");
	}
	}
	function productsDelete($id)
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTS,'image','id='.$id,'','','');
	$imageres = $callConfig->getRow($query);
	$callConfig->imageCommonUnlink("../uploads/products/",$imageres->image);
	$res=$callConfig->deleteRecord(TPREFIX.TBL_PRODUCTS,'id',$id);
	if($res!="")
	{
		sitesettingsClass::recentActivities('Product deleted successfully on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_productslist&err=Product deleted successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Product deletion failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_productslist&ferr=Product deletion failed");
	}
	}
	
	/// Product category  
}	
	?>