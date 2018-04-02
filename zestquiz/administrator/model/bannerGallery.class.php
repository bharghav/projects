<?php
class bannerGalleryClass
{ 
 // Image category //
 function getAllBannersList($sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$query=$callConfig->selectQuery(TPREFIX.TBL_BANNERS,'*','',$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllBannersListCount()
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_BANNERS,'id','','','','');
	 return $callConfig->getCount($query);
  } 
  
  function getBannerData($id)
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_BANNERS,'*','id='.$id,'','','');
	return $callConfig->getRow($query);
 }
 
	function insertBanner($post)
	{
	global $callConfig;
	$bannerimage = $callConfig->freeimageUploadcomncode("banner",'image',"../uploads/baner_gallery/","../uploads/baner_gallery/thumbs/",$post['hdn_image'],150,150);
	$fieldnames=array('title'=>mysql_real_escape_string($post['title']),'image'=>$bannerimage,'img_desc'=>mysql_real_escape_string($post['img_desc']),'status'=>$post['status'],'type'=>$post['type']);
	$res=$callConfig->insertRecord(TPREFIX.TBL_BANNERS,$fieldnames);
	if($res!="")
	{
		sitesettingsClass::recentActivities('Image created successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_bannerslist&err=Image created successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Image creation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_bannerslist&ferr=Image creation failed");
	}
	}
	
	function updateBanner($post)
	{
	global $callConfig;
	$bannerimage = $callConfig->freeimageUploadcomncode("banner",'image',"../uploads/baner_gallery/","../uploads/baner_gallery/thumbs/",$post['hdn_image'],150,150);
	$fieldnames=array('title'=>mysql_real_escape_string($post['title']),'image'=>$bannerimage,'img_desc'=>mysql_real_escape_string($post['img_desc']),'status'=>$post['status'],'type'=>$post['type']);
	$res=$callConfig->updateRecord(TPREFIX.TBL_BANNERS,$fieldnames,'id',$post['hdn_id']);
	if($res==1)
	{
		sitesettingsClass::recentActivities('Image updated successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_bannerslist&err=Image updated successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Image updation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_bannerslist&ferr=Image updation failed");
	}
	}
	function bannersDelete($id)
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_BANNERS,'image','id='.$id,'','','');
	$imageres = $callConfig->getRow($query);
	$callConfig->imageCommonUnlink("../uploads/baner_gallery/","../uploads/baner_gallery/thumbs/",$imageres->image);
	$res=$callConfig->deleteRecord(TPREFIX.TBL_BANNERS,'id',$id);
	if($res==1)
	{
		sitesettingsClass::recentActivities('Image deleted successfully on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_bannerslist&err=Image deleted successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Image deletion failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_bannerslist&ferr=Image deletion failed");
	}
	}
	/// Image category  
}	
	?>