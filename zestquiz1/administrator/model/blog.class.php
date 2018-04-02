<?php
class blogtopicClass
{ 

 // Product category //
 function getAllBlogTopicsList($parentid,$dispin,$sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	if($dispin!="")
	$where=" displayin='".$dispin."'";
	if($parentid!="" && $parentid!="all"){
	$where.=" and parentid='".$parentid."'";
	}
	$query=$callConfig->selectQuery(TPREFIX.TBL_BLOGPOST,'*',$where,$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllBlogTopicsListCount($parentid,$dispin)
  {
	global $callConfig;
	if($dispin!="")
	$where=" displayin='".$dispin."'";
	if($parentid!="" && $parentid!="all"){
	$where.=" and parentid='".$parentid."'";
	}
	$query=$callConfig->selectQuery(TPREFIX.TBL_BLOGPOST,'id',$where,'','','');
	return $callConfig->getCount($query);
  } 
  
  function getBlogTopicData($id)
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_BLOGPOST,'*','id='.$id,'','','');
	return $callConfig->getRow($query);
 }
 
	function insertBlogTopics($post)
	{
	global $callConfig;
	$image = $callConfig->freeimageUploadcomncode("blog",'image',"../uploads/blog/","../uploads/blog/thumbs/",$post['hdn_image'],204,107);
	$fieldnames=array('title'=>mysql_real_escape_string($post['title']),'smalltext'=>mysql_real_escape_string($post['smalltext']),'bigtext'=>mysql_real_escape_string($post['bigtext']),'image'=>$image,'status'=>$post['status']);
	$res=$callConfig->insertRecord(TPREFIX.TBL_BLOGPOST,$fieldnames);
	if($res!="")
	{
		sitesettingsClass::recentActivities('Blog >> Post created successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_blogpost&err=Blog >> Post created successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Blog >> Post creation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_blogpost&ferr=Blog >> Post creation failed");
	}
	}
	
	function updateBlogTopics($post)
	{
	global $callConfig;
	$image = $callConfig->freeimageUploadcomncode("blog",'image',"../uploads/blog/","../uploads/blog/thumbs/",$post['hdn_image'],204,107);
	if($_SESSION['roletype']=="senior")
	{
	$fieldnames=array('title'=>mysql_real_escape_string($post['title']),'smalltext'=>mysql_real_escape_string($post['smalltext']),'bigtext'=>mysql_real_escape_string($post['bigtext']),'image'=>$image,'displayin'=>$post['displayin'],'status'=>$post['status']);
	}
	else
	{
	$fieldnames=array('title'=>mysql_real_escape_string($post['title']),'smalltext'=>mysql_real_escape_string($post['smalltext']),'bigtext'=>mysql_real_escape_string($post['bigtext']),'image'=>$image,'displayin'=>$post['displayin']);
	}
	$res=$callConfig->updateRecord(TPREFIX.TBL_BLOGPOST,$fieldnames,'id',$post['hdn_id']);
	if($res==1)
	{
		sitesettingsClass::recentActivities('Blog >> Post updated successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_blogpost&err=Blog >> Post updated successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Blog >> Post updation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_blogpost&ferr=Blog >> Post updation failed");
	}
	}
	
	function BlogTopicDelete($id)
	{
	global $callConfig;
	$res=$callConfig->deleteRecord(TPREFIX.TBL_BLOGPOST,'id',$id);
	if($res==1)
	{
		$query=$callConfig->selectQuery(TPREFIX.TBL_BLOGCOMMENTS,'id','b_id='.$id,'','','');
		$commentsres = $callConfig->getAllRows($query);
		$c=array();
		foreach($commentsres as $res_comets){
		$c[]=$res_comets->id;
		}
		$callConfig->deleteRecord(TPREFIX.TBL_BLOGCOMMENTS,'id',$c);
		sitesettingsClass::recentActivities('Blog >> Post deleted successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_blogpost&err=Blog >> Post deleted successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Blog >> Post deletion failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_blogpost&ferr=Blog >> Post deletion failed");
	}
	}
	
	/// home articles //
	function insertHomeBlogTopics($post)
	{
	global $callConfig;
	$image = $callConfig->freeimageUploadcomncode("blog",'image',"../uploads/blog/","../uploads/blog/thumbs/",$post['hdn_image'],204,107);
	$fieldnames=array('parentid'=>$post['parentid'],'title'=>mysql_real_escape_string($post['title']),'smalltext'=>mysql_real_escape_string($post['smalltext']),'bigtext'=>mysql_real_escape_string($post['bigtext']),'image'=>$image,'displayin'=>'home','disp_order'=>$post['disp_order'],'status'=>$post['status']);
	$res=$callConfig->insertRecord(TPREFIX.TBL_BLOGPOST,$fieldnames);
	if($res!="")
	{
		sitesettingsClass::recentActivities('Home >> Article created successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_articlepost&err=Home >> Article created successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Home >> Article creation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_articlepost&ferr=Home >> Article creation failed");
	}
	}
	
	function updateHomeBlogTopics($post)
	{
	global $callConfig;
	$image = $callConfig->freeimageUploadcomncode("blog",'image',"../uploads/blog/","../uploads/blog/thumbs/",$post['hdn_image'],204,107);
	if($_SESSION['roletype']=="senior")
	{
		$fieldnames=array('parentid'=>$post['parentid'],'title'=>mysql_real_escape_string($post['title']),'smalltext'=>mysql_real_escape_string($post['smalltext']),'bigtext'=>mysql_real_escape_string($post['bigtext']),'image'=>$image,'displayin'=>'home','disp_order'=>$post['disp_order'],'status'=>$post['status']);
	}
	else
	{
		$fieldnames=array('parentid'=>$post['parentid'],'title'=>mysql_real_escape_string($post['title']),'smalltext'=>mysql_real_escape_string($post['smalltext']),'bigtext'=>mysql_real_escape_string($post['bigtext']),'image'=>$image,'displayin'=>'home','disp_order'=>$post['disp_order']);
	}
	$res=$callConfig->updateRecord(TPREFIX.TBL_BLOGPOST,$fieldnames,'id',$post['hdn_id']);
	if($res==1)
	{
		sitesettingsClass::recentActivities('Home >> Article updated successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_articlepost&err=Home >> Article updated successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Home >> Article updation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_articlepost&ferr=Home >> Article updation failed");
	}
	}
	
	function HomeBlogTopicDelete($id)
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_BLOGPOST,'image','id='.$id,'','','');
	$imageres = $callConfig->getRow($query);
	$callConfig->imageCommonUnlink("../uploads/blog/","../uploads/blog/thumbs/",$imageres->image);
	$res=$callConfig->deleteRecord(TPREFIX.TBL_BLOGPOST,'id',$id);
	if($res==1)
	{
		$query=$callConfig->selectQuery(TPREFIX.TBL_BLOGCOMMENTS,'id','b_id='.$id,'','','');
		$commentsres = $callConfig->getAllRows($query);
		$c=array();
		foreach($commentsres as $res_comets){
		$c[]=$res_comets->id;
		}
		$callConfig->deleteRecord(TPREFIX.TBL_BLOGCOMMENTS,'id',$c);
		sitesettingsClass::recentActivities('Home >> Article Post deleted successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_articlepost&err=Home >> Article Post deleted successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Blog Post deletion failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_articlepost&ferr=Home >> Article Post deletion failed");
	}
	}
	
	
	function HomeBlogTopicCommentsDelete($id)
	{
	global $callConfig;
	$res=$callConfig->deleteRecord(TPREFIX.TBL_BLOGCOMMENTS,'id',$id);
	if($res==1)
	{
		sitesettingsClass::recentActivities('Home >> Article Comment deleted successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_articlecommnets&err=Home >> Article Comment deleted successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Home >> Article Comment deletion failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_articlecommnets&ferr=Home >> Article Comment deletion failed");
	}
	}
	//  home artilces end ///
	
	
  function getAllBlogTopicsListDropDown($parent,$dispin,$sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	if($dispin!="")
	$where=" status='Active' and displayin='".$dispin."'";
	if($parent!="")
	$where.=" and parentid='".$parent."'";
	$query=$callConfig->selectQuery(TPREFIX.TBL_BLOGPOST,'*',$where,$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
	
  function getAllBlogCommentsList($dispin,$b_id,$sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$wher=" type='".$dispin."'";
	if($b_id!="" && $b_id!="all"){
	$wher.=" and b_id='".$b_id."'";
	}
	$query=$callConfig->selectQuery(TPREFIX.TBL_BLOGCOMMENTS,'*',$wher,$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllBlogCommentsListCount($dispin,$b_id)
  {
	global $callConfig;
	$wher=" type='".$dispin."'";
	if($b_id!="" && $b_id!="all"){
	$wher.=" and b_id='".$b_id."'";
	}
	$query=$callConfig->selectQuery(TPREFIX.TBL_BLOGCOMMENTS,'id',$wher,'','','');
	return $callConfig->getCount($query);
  } 
	function BlogCommentDelete($id)
	{
	global $callConfig;
	$res=$callConfig->deleteRecord(TPREFIX.TBL_BLOGCOMMENTS,'id',$id);
	if($res==1)
	{
		sitesettingsClass::recentActivities('Blog >> Comment deleted successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_blogcommnets&err=Blog >> Comment deleted successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Blog >> Comment deletion failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_blogcommnets&ferr=Blog >> Comment deletion failed");
	}
	}
	
	function BlogCommentStatusChanging($get){
	global $callConfig;
	if($get['st']=="Active")
	$statusbe='Inactive';
	else
	$statusbe='Active';
	$fieldnames=array('status'=>$statusbe);
	$res=$callConfig->updateRecord(TPREFIX.TBL_BLOGCOMMENTS,$fieldnames,'id',$get['id']);
	if($res==1)
	{
		sitesettingsClass::recentActivities('Blog >> Comment Status changed successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_blogcommnets&err=Blog >> Comment Status changed successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Blog >> Comment Status changing failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_blogcommnets&ferr=Blog >> Comment Status changing failed");
	}
	}
	
	function HomeBlogCommentStatusChanging($get){
	global $callConfig;
	if($get['st']=="Active")
	$statusbe='Inactive';
	else
	$statusbe='Active';
	$fieldnames=array('status'=>$statusbe);
	$res=$callConfig->updateRecord(TPREFIX.TBL_BLOGCOMMENTS,$fieldnames,'id',$get['id']);
	if($res==1)
	{
		sitesettingsClass::recentActivities('Home >> Article Comment Status changed successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_articlecommnets&err=Home >> Article Comment Status changed successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Home >> Article Comment Status changing failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_articlecommnets&ferr=Home >> Article Comment Status changing failed");
	}
	}
	
	
	
	function getAllRelationshipAdviceList($sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$query=$callConfig->selectQuery(TPREFIX.TBL_RELATIONSHIPADVICE,'*','',$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllRelationshipAdviceListCount()
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_RELATIONSHIPADVICE,'rid','','','','');
	return $callConfig->getCount($query);
  } 
  
  function getRelationshipAdviceData($id)
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_RELATIONSHIPADVICE,'*','rid='.$id,'','','');
	return $callConfig->getRow($query);
 }
	
	
	
	
    function insertRelationAdvice($post)
	{
	global $callConfig;
	$fieldnames=array('name'=>$_SESSION['us_name'],'email'=>$_SESSION['email'],'comments'=>mysql_real_escape_string($post['comments']),'answers'=>mysql_real_escape_string($post['answers']),'status'=>$post['status']);
	$res=$callConfig->insertRecord(TPREFIX.TBL_RELATIONSHIPADVICE,$fieldnames,'rid',$post['hdn_id']);
	if($res!="")
	{
		sitesettingsClass::recentActivities('Home >> Relationship Advice inserted successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_relationadvice&err=Home >> Relationship Advice inserted successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Home >> Relationship Advice insertion failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_relationadvice&ferr=Home >> Relationship Advice insertion failed");
	}
	}
	
    function updateRelationAdvice($post)
	{
	global $callConfig;
	
	$query=$callConfig->selectQuery(TPREFIX.TBL_RELATIONSHIPADVICE,'name,email','rid='.$post['hdn_id'],'','','');
	$ressec=$callConfig->getRow($query);
	if($_SESSION['roletype']=="senior")
	{
	$fieldnames=array('name'=>$ressec->name,'email'=>$ressec->email,'comments'=>mysql_real_escape_string($post['comments']),'answers'=>mysql_real_escape_string($post['answers']),'status'=>$post['status']);
     }
	 else
	 {
	  $fieldnames=array('name'=>$ressec->name,'email'=>$ressec->email,'comments'=>mysql_real_escape_string($post['comments']),'answers'=>mysql_real_escape_string($post['answers']));
	 }
	$res=$callConfig->updateRecord(TPREFIX.TBL_RELATIONSHIPADVICE,$fieldnames,'rid',$post['hdn_id']);
	if($res==1)
	{
		sitesettingsClass::recentActivities('Home >> Relationship Advice updated successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_relationadvice&err=Home >> Relationship Advice updated successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Home >> Relationship Advice updation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_relationadvice&ferr=Home >> Relationship Advice updation failed");
	}
	}
	
	function RelationAdviceDelete($id)
	{
	global $callConfig;
	$res=$callConfig->deleteRecord(TPREFIX.TBL_RELATIONSHIPADVICE,'rid',$id);
	if($res==1)
	{
		sitesettingsClass::recentActivities('Home >> Relationship Advice deleted successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_relationadvice&err=Home >> Relationship Advice deleted successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Home >> Relationship Advice deletion failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_relationadvice&ferr=Home >> Relationship Advice deletion failed");
	}
	}
	function getCategoryFullName($id)
   {
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_BLOGPOST,'title','id ='.$id,'','','');
		$res=$callConfig->getRow($query);
		return stripslashes($res->title);
   }
   
 // ip addresss ///
   function getAllIpsList($sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$query=$callConfig->selectQuery(TPREFIX.TBL_IPADDRESSTRACE,'*','',$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllIpsListCount()
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_IPADDRESSTRACE,'id','','','','');
	return $callConfig->getCount($query);
  } 
  function ipaddressStatusChanging($get){
	global $callConfig;
	if($get['st']=="Block")
	$statusbe='Unblock';
	else
	$statusbe='Block';
	$fieldnames=array('status'=>$statusbe);
	$res=$callConfig->updateRecord(TPREFIX.TBL_IPADDRESSTRACE,$fieldnames,'id',$get['id']);
	if($res==1)
	{
		sitesettingsClass::recentActivities('IP Address Status changed successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_iptrace&err=IP Address Status changed successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('IP Address Status changing failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_iptrace&ferr=IP Address Status changing failed");
	}
	}
	function ipaddressDelete($id)
	{
	global $callConfig;
	$res=$callConfig->deleteRecord(TPREFIX.TBL_IPADDRESSTRACE,'id',$id);
	if($res==1)
	{
		sitesettingsClass::recentActivities('IP Address deleted successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_iptrace&err=IP Address deleted successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('IP Address deletion failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_iptrace&ferr=IP Address deletion failed");
	}
	}
	
	function ipAddressPostingsandCommentsTracing($ipaddress){
	global $callConfig;
	$queryhome=$callConfig->selectQuery(TPREFIX.TBL_BLOGCOMMENTS,'ip_address',"type='home' and ip_address='".$ipaddress."'",'','','');
	$homeartcnt=$callConfig->getCount($queryhome);
	$queryblog=$callConfig->selectQuery(TPREFIX.TBL_BLOGCOMMENTS,'ip_address',"type='blog' and ip_address='".$ipaddress."'",'','','');
	$blogcnt=$callConfig->getCount($queryblog);
	$queryforumtopics=$callConfig->selectQuery(TPREFIX.TBL_FORUMTOPICS,'ip_address',"ip_address='".$ipaddress."'",'','','');
	$forumtopicscnt=$callConfig->getCount($queryforumtopics);
	$queryforumcmnts=$callConfig->selectQuery(TPREFIX.TBL_FORUMCOMMENTS,'ip_address',"ip_address='".$ipaddress."'",'','','');
	$forumcmntscnt=$callConfig->getCount($queryforumcmnts);
	$queryrelationadvice=$callConfig->selectQuery(TPREFIX.TBL_RELATIONSHIPADVICE,'ip_address',"ip_address='".$ipaddress."'",'','','');
	$relationadvicecnt=$callConfig->getCount($queryrelationadvice);
	return "Home Articles Comments &nbsp;&nbsp;- $homeartcnt<br />Blog Comments&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- $blogcnt<br />Forum Topics&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- $forumtopicscnt<br />Forum Posts/Replies&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- $forumcmntscnt<br />Relationship Advice&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- $relationadvicecnt";
	//return $homeartcnt+$blogcnt+$forumtopicscnt+$forumcmntscnt+$relationadvicecnt;
	}
	
}	
	?>