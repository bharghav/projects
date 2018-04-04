<?php
class elearnClass
{ 
 // store category //
 function getAllCategoryList($where,$sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	if($where!="")
	$whr=" status='".$where."'";
	$query=$callConfig->selectQuery(TPREFIX.TBL_CATEGORY,'*',$whr,$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllCategoryListCount($where)
  {
	global $callConfig;
	if($where!="")
	$whr=" status='".$where."'";
	$query=$callConfig->selectQuery(TPREFIX.TBL_CATEGORY,'scid',$whr,'','','');
	return $callConfig->getCount($query);
  } 
  
  function getCategoryData($id)
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_CATEGORY,'*','scid='.$id,'','','');
	return $callConfig->getRow($query);
 }
 
	function insertCategory($post)
	{
	global $callConfig;
	$titleslug=$callConfig->remove_special_symbols($post['catetitle']);
	//$image = $callConfig->freeimageUploadcomncode("cat",'image',"../uploads/category/","../uploads/category/thumbs/",$post['hdn_image'],208,95);'image'=>$image,
	$fieldnames=array('catetitle'=>mysql_real_escape_string($post['catetitle']),'catetitle_slug'=>$titleslug,'bigtext'=>mysql_real_escape_string($post['bigtext']),'status'=>$post['status']);
	$res=$callConfig->insertRecord(TPREFIX.TBL_CATEGORY,$fieldnames);
	if($res!="")
	{
		sitesettingsClass::recentActivities('Category >> Category created successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_cat&err=Category >> Category created successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Category >> Category creation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_cat&ferr=Category >> Category creation failed");
	}
	}
	
	function updateCategory($post)
	{
	global $callConfig;
	$titleslug=$callConfig->remove_special_symbols($post['catetitle']);
	//$image = $callConfig->freeimageUploadcomncode("cat",'image',"../uploads/category/","../uploads/category/thumbs/",$post['hdn_image'],208,95);'image'=>$image,
	$fieldnames=array('catetitle'=>mysql_real_escape_string($post['catetitle']),'catetitle_slug'=>$titleslug,'bigtext'=>mysql_real_escape_string($post['bigtext']),'status'=>$post['status']);
	$res=$callConfig->updateRecord(TPREFIX.TBL_CATEGORY,$fieldnames,'scid',$post['hdn_id']);
	if($res==1)
	{
		sitesettingsClass::recentActivities('Category >> Category updated successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_cat&err=Category >> Category updated successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Category >> Category updation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_cat&ferr=Category >> Category updation failed");
	}
	}
	
	function categoryDelete($id)
	{
	global $callConfig;
	//$query=$callConfig->selectQuery(TPREFIX.TBL_CATEGORY,'image','scid='.$id,'','','');
	//$imageres = $callConfig->getRow($query);
	//$callConfig->imageCommonUnlink("../uploads/category/","../uploads/category/thumbs/",$imageres->image);
	$res=$callConfig->deleteRecord(TPREFIX.TBL_CATEGORY,'scid',$id);
	if($res==1)
	{
		$query=$callConfig->selectQuery(TPREFIX.TBL_SUBCATEGORY,'spid,image','scid='.$id,'','','');
		$productsres = $callConfig->getAllRows($query);
		$c=array();
		foreach($productsres as $res_prod){
		$c[]=$res_prod->spid;
		$callConfig->imageCommonUnlink("../uploads/subcategory/","../uploads/subcategory/thumbs/",$res_prod->image);
		}
		$callConfig->deleteRecord(TPREFIX.TBL_SUBCATEGORY,'spid',$c);
		sitesettingsClass::recentActivities('Category >> Category deleted successfully on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_cat&err=Category >> Category deleted successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Category >> Category deletion failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_cat&ferr=Category >> Category deletion failed");
	}
	}
// end store category //
// SubCategory //
function getAllsubCategoryList($sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$query=$callConfig->selectQuery(TPREFIX.TBL_SUBCATEGORY,'*','',$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllsubCategoryListCount()
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_SUBCATEGORY,'spid','','','','');
	 return $callConfig->getCount($query);
  } 
  
  function getsubCategoryData($id)
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_SUBCATEGORY,'*','spid='.$id,'','','');
	return $callConfig->getRow($query);
 }
 
	function insertsubCategory($post)
	{
	global $callConfig;
	//$prodimage = $callConfig->freeimageUploadcomncode('prod','image',"../uploads/subcategory/","../uploads/subcategory/thumbs/",$post['hdn_image'],179,146);'image'=>$prodimage,'offer'=>$post['offer'],'oldprice'=>$oldprice,'newprice'=>$newprice,
	/*if($post['offer']=="no"){
	$oldprice="";
	$newprice=$post['newprice'];
	} else {
	$oldprice=$post['oldprice'];
	$newprice=$post['newprice'];
	}*/
	$titleslug=$callConfig->remove_special_symbols($post['prodtitle']);
	$fieldnames=array('scid'=>$post['scid'],'prodtitle'=>mysql_real_escape_string($post['prodtitle']),'prodtitle_slug'=>$titleslug,'bigtext'=>mysql_real_escape_string($post['bigtext']),'status'=>$post['status']);
	$res=$callConfig->insertRecord(TPREFIX.TBL_SUBCATEGORY,$fieldnames);
	if($res!="")
	{
		sitesettingsClass::recentActivities('SubCategory >> subcategory created successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_subcat&err=SubCategory >> subcategory created successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('SubCategory >> subcategory creation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_subcat&ferr=SubCategory >> subcategory creation failed");
	}
	}
	
	function updatesubCategory($post)
	{
	global $callConfig;
	/*$prodimage = $callConfig->freeimageUploadcomncode('prod','image',"../uploads/subcategory/","../uploads/subcategory/thumbs/",$post['hdn_image'],179,146);'image'=>$prodimage,'offer'=>$post['offer'],'oldprice'=>$oldprice,'newprice'=>$newprice,
	if($post['offer']=="no"){
	$oldprice="";
	$newprice=$post['newprice'];
	} else {
	$oldprice=$post['oldprice'];
	$newprice=$post['newprice'];
	}*/
	$titleslug=$callConfig->remove_special_symbols($post['prodtitle']);
	$fieldnames=array('scid'=>$post['scid'],'prodtitle'=>mysql_real_escape_string($post['prodtitle']),'prodtitle_slug'=>$titleslug,'bigtext'=>mysql_real_escape_string($post['bigtext']),'status'=>$post['status']);
	$res=$callConfig->updateRecord(TPREFIX.TBL_SUBCATEGORY,$fieldnames,'spid',$post['hdn_id']);
	if($res==1)
	{
		sitesettingsClass::recentActivities('SubCategory >> subcategory updated successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_subcat&err=SubCategory >> subcategory updated successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('SubCategory >> subcategory updation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_subcat&ferr=SubCategory >> subcategory updation failed");
	}
	}
	
	function subCategoryDelete($id)
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_SUBCATEGORY,'image','spid='.$id,'','','');
	$imageres = $callConfig->getRow($query);
	//$callConfig->imageCommonUnlink("../uploads/subcategory/","../uploads/subcategory/thumbs/",$imageres->image);
	$res=$callConfig->deleteRecord(TPREFIX.TBL_SUBCATEGORY,'spid',$id);
	if($res==1)
	{
		sitesettingsClass::recentActivities('SubCategory >> subcategory deleted successfully on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_subcat&err=SubCategory >> subcategory deleted successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('SubCategory >> subcategory deletion failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_subcat&ferr=SubCategory >> subcategory deletion failed");
	}
	}



// end sub category //

//subjects //

// Product store //
 function getAllSubjectsList($sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$query=$callConfig->selectQuery(TPREFIX.TBL_SUBJECTS,'*','',$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllSubjectsListCount()
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_SUBJECTS,'spid','','','','');
	 return $callConfig->getCount($query);
  } 
  
  function getSubjectData($id)
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_SUBJECTS,'*','spid='.$id,'','','');
	return $callConfig->getRow($query);
 }
 
	function insertSubjects($post)
	{
	global $callConfig;
	//$prodimage = $callConfig->freeimageUploadcomncode('prod','image',"../uploads/subjects/","../uploads/subjects/thumbs/",$post['hdn_image'],179,146);
	/*if($post['offer']=="no"){
	$oldprice="";
	$newprice=$post['newprice'];
	} else {
	$oldprice=$post['oldprice'];
	$newprice=$post['newprice'];
	}*/
	$titleslug=$callConfig->remove_special_symbols($post['subjtitle']);
	$fieldnames=array('scid'=>$post['scid'],'cid'=>$post['category'],'scid'=>$post['subcategory'],'subjtitle'=>mysql_real_escape_string($post['subjtitle']),'subjtitle_slug'=>$titleslug,'bigtext'=>mysql_real_escape_string($post['bigtext']),'status'=>$post['status']);
	$res=$callConfig->insertRecord(TPREFIX.TBL_SUBJECTS,$fieldnames);
	if($res!="")
	{
		sitesettingsClass::recentActivities('Store >> Subjects created successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_subject&err=Store >> Subjects created successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Store >> Subjects creation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_subject&ferr=Store >> Subjects creation failed");
	}
	}
	
	function updateSubjects($post)
	{
	global $callConfig;
	/*$prodimage = $callConfig->freeimageUploadcomncode('prod','image',"../uploads/subjects/","../uploads/subjects/thumbs/",$post['hdn_image'],179,146);
	if($post['offer']=="no"){
	$oldprice="";
	$newprice=$post['newprice'];
	} else {
	$oldprice=$post['oldprice'];
	$newprice=$post['newprice'];
	}*/
	$titleslug=$callConfig->remove_special_symbols($post['subjtitle']);
	$fieldnames=array('scid'=>$post['scid'],'cid'=>$post['category'],'scid'=>$post['subcategory'],'subjtitle'=>mysql_real_escape_string($post['subjtitle']),'subjtitle_slug'=>$titleslug,'bigtext'=>mysql_real_escape_string($post['bigtext']),'status'=>$post['status']);
	$res=$callConfig->updateRecord(TPREFIX.TBL_SUBJECTS,$fieldnames,'spid',$post['hdn_id']);
	if($res==1)
	{
		sitesettingsClass::recentActivities('Store >> Product updated successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_subject&err=Store >> Product updated successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Store >> Subjects updation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_subject&ferr=Store >> Subjects updation failed");
	}
	}
	function subjectsDelete($id)
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_SUBJECTS,'image','spid='.$id,'','','');
	$imageres = $callConfig->getRow($query);
	$callConfig->imageCommonUnlink("../uploads/subjects/","../uploads/subjects/thumbs/",$imageres->image);
	$res=$callConfig->deleteRecord(TPREFIX.TBL_STOREPRODUCTS,'spid',$id);
	if($res==1)
	{
		sitesettingsClass::recentActivities('Store >> Subjects deleted successfully on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_subject&err=Store >> Subjects deleted successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Store >> Subjects deletion failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_subject&ferr=Store >> Subjects deletion failed");
	}
	}

//end of the subjects//

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