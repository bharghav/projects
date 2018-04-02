<?php
class storeClass
{ 
 // store category //
 function getAllStoreCategoryList($where,$sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	if($where!="")
	$whr=" status='".$where."'";
	$query=$callConfig->selectQuery(TPREFIX.TBL_STORECATEGORY,'*',$whr,$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllStoreCategoryListCount($where)
  {
	global $callConfig;
	if($where!="")
	$whr=" status='".$where."'";
	$query=$callConfig->selectQuery(TPREFIX.TBL_STORECATEGORY,'scid',$whr,'','','');
	return $callConfig->getCount($query);
  } 
  
  function getStoreCategoryData($id)
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_STORECATEGORY,'*','scid='.$id,'','','');
	return $callConfig->getRow($query);
 }
 
	function insertStoreCategory($post)
	{
	global $callConfig;
	$titleslug=$callConfig->remove_special_symbols($post['catetitle']);
	$image = $callConfig->freeimageUploadcomncode("cat",'image',"../uploads/store/category/","../uploads/store/category/thumbs/",$post['hdn_image'],208,95);
	$fieldnames=array('catetitle'=>mysql_real_escape_string($post['catetitle']),'catetitle_slug'=>$titleslug,'bigtext'=>mysql_real_escape_string($post['bigtext']),'image'=>$image,'status'=>$post['status']);
	$res=$callConfig->insertRecord(TPREFIX.TBL_STORECATEGORY,$fieldnames);
	if($res!="")
	{
		sitesettingsClass::recentActivities('Store >> Category created successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_storecat&err=Store >> Category created successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Store >> Category creation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_storecat&ferr=Store >> Category creation failed");
	}
	}
	
	function updateStoreCategory($post)
	{
	global $callConfig;
	$titleslug=$callConfig->remove_special_symbols($post['catetitle']);
	$image = $callConfig->freeimageUploadcomncode("cat",'image',"../uploads/store/category/","../uploads/store/category/thumbs/",$post['hdn_image'],208,95);
	$fieldnames=array('catetitle'=>mysql_real_escape_string($post['catetitle']),'catetitle_slug'=>$titleslug,'bigtext'=>mysql_real_escape_string($post['bigtext']),'image'=>$image,'status'=>$post['status']);
	$res=$callConfig->updateRecord(TPREFIX.TBL_STORECATEGORY,$fieldnames,'scid',$post['hdn_id']);
	if($res==1)
	{
		sitesettingsClass::recentActivities('Store >> Category updated successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_storecat&err=Store >> Category updated successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Store >> Category updation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_storecat&ferr=Store >> Category updation failed");
	}
	}
	function storeCategoryDelete($id)
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_STORECATEGORY,'image','scid='.$id,'','','');
	$imageres = $callConfig->getRow($query);
	$callConfig->imageCommonUnlink("../uploads/store/category/","../uploads/store/category/thumbs/",$imageres->image);
	$res=$callConfig->deleteRecord(TPREFIX.TBL_STORECATEGORY,'scid',$id);
	if($res==1)
	{
		$query=$callConfig->selectQuery(TPREFIX.TBL_STOREPRODUCTS,'spid,image','scid='.$id,'','','');
		$productsres = $callConfig->getAllRows($query);
		$c=array();
		foreach($productsres as $res_prod){
		$c[]=$res_prod->spid;
		$callConfig->imageCommonUnlink("../uploads/store/products/","../uploads/store/products/thumbs/",$res_prod->image);
		}
		$callConfig->deleteRecord(TPREFIX.TBL_STOREPRODUCTS,'spid',$c);
		sitesettingsClass::recentActivities('Store >> Category deleted successfully on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_storecat&err=Store >> Category deleted successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Store >> Category deletion failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_storecat&ferr=Store >> Category deletion failed");
	}
	}
// end store category //

 // Product store //
 function getAllProductsList($sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$query=$callConfig->selectQuery(TPREFIX.TBL_STOREPRODUCTS,'*','',$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllProductsListCount()
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_STOREPRODUCTS,'spid','','','','');
	 return $callConfig->getCount($query);
  } 
  
  function getProductData($id)
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_STOREPRODUCTS,'*','spid='.$id,'','','');
	return $callConfig->getRow($query);
 }
 
	function insertProducts($post)
	{
	global $callConfig;
	$prodimage = $callConfig->freeimageUploadcomncode('prod','image',"../uploads/store/products/","../uploads/store/products/thumbs/",$post['hdn_image'],179,146);
	if($post['offer']=="no"){
	$oldprice="";
	$newprice=$post['newprice'];
	} else {
	$oldprice=$post['oldprice'];
	$newprice=$post['newprice'];
	}
	$titleslug=$callConfig->remove_special_symbols($post['prodtitle']);
	$fieldnames=array('scid'=>$post['scid'],'prodtitle'=>mysql_real_escape_string($post['prodtitle']),'prodtitle_slug'=>$titleslug,'bigtext'=>mysql_real_escape_string($post['bigtext']),'image'=>$prodimage,'offer'=>$post['offer'],'oldprice'=>$oldprice,'newprice'=>$newprice,'status'=>$post['status']);
	$res=$callConfig->insertRecord(TPREFIX.TBL_STOREPRODUCTS,$fieldnames);
	if($res!="")
	{
		sitesettingsClass::recentActivities('Store >> Product created successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_storeproducts&err=Store >> Product created successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Store >> Product creation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_storeproducts&ferr=Store >> Product creation failed");
	}
	}
	
	function updateProducts($post)
	{
	global $callConfig;
	$prodimage = $callConfig->freeimageUploadcomncode('prod','image',"../uploads/store/products/","../uploads/store/products/thumbs/",$post['hdn_image'],179,146);
	if($post['offer']=="no"){
	$oldprice="";
	$newprice=$post['newprice'];
	} else {
	$oldprice=$post['oldprice'];
	$newprice=$post['newprice'];
	}
	$titleslug=$callConfig->remove_special_symbols($post['prodtitle']);
	$fieldnames=array('scid'=>$post['scid'],'prodtitle'=>mysql_real_escape_string($post['prodtitle']),'prodtitle_slug'=>$titleslug,'bigtext'=>mysql_real_escape_string($post['bigtext']),'image'=>$prodimage,'offer'=>$post['offer'],'oldprice'=>$oldprice,'newprice'=>$newprice,'status'=>$post['status']);
	$res=$callConfig->updateRecord(TPREFIX.TBL_STOREPRODUCTS,$fieldnames,'spid',$post['hdn_id']);
	if($res==1)
	{
		sitesettingsClass::recentActivities('Store >> Product updated successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_storeproducts&err=Store >> Product updated successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Store >> Product updation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_storeproducts&ferr=Store >> Product updation failed");
	}
	}
	function productsDelete($id)
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_STOREPRODUCTS,'image','spid='.$id,'','','');
	$imageres = $callConfig->getRow($query);
	$callConfig->imageCommonUnlink("../uploads/store/products/","../uploads/store/products/thumbs/",$imageres->image);
	$res=$callConfig->deleteRecord(TPREFIX.TBL_STOREPRODUCTS,'spid',$id);
	if($res==1)
	{
		sitesettingsClass::recentActivities('Store >> Product deleted successfully on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_storeproducts&err=Store >> Product deleted successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Store >> Product deletion failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_storeproducts&ferr=Store >> Product deletion failed");
	}
	}
	
	
	// store //
	function getAllOrdersList($sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$query=$callConfig->selectQuery(TPREFIX.TBL_CART_TRANSACTION,'*','',$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllOrdersListCount()
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_CART_TRANSACTION,'tx_id','','','','');
	 return $callConfig->getCount($query);
  } 
  
  function OrderStatusChanging($get){
	global $callConfig;
	if($get['st']=="Pending")
	$statusbe='Delivered';
	$fieldnames=array('status'=>$statusbe);
	$res=$callConfig->updateRecord(TPREFIX.TBL_CART_TRANSACTION,$fieldnames,'tx_id',$get['id']);
	if($res==1)
	{
		sitesettingsClass::recentActivities('Order Status changed successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_orderlist&err=Order Status changed successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Order Status changing failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_orderlist&ferr=Order Status changing failed");
	}
	}
	
	function OrderDelete($id)
	{
	global $callConfig;
	$res=$callConfig->deleteRecord(TPREFIX.TBL_CART_TRANSACTION,'tx_no',$id);
	if($res==1)
	{
	    $callConfig->deleteRecord(TPREFIX.TBL_CART_ORDER,'tx_no',$id);
		sitesettingsClass::recentActivities('Order deleted successfully on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_orderlist&err=Order deleted successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Order deletion failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_orderlist&ferr=Order deletion failed");
	}
	}
	
  
  // end store //
}	
	?>