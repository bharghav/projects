<?php
class fourmClass
{ 
 // fourm category //
 function getAllForumCategoryList($whr,$sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	if($whr!="") $where=" status='Active' and parentid=".$whr;
	$query=$callConfig->selectQuery(TPREFIX.TBL_FORUMCATEGORY,'*',$where,$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllForumCategoryListCount()
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_FORUMCATEGORY,'fcid','','','','');
	 return $callConfig->getCount($query);
  } 
  
  function getForumCategoryData($id)
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_FORUMCATEGORY,'*','fcid='.$id,'','','');
	return $callConfig->getRow($query);
 }
 
	function insertForumCategory($post)
	{
	global $callConfig;
	$fieldnames=array('parentid'=>$post['parentid'],'title'=>mysql_real_escape_string($post['title']),'bigtext'=>mysql_real_escape_string($post['bigtext']),'status'=>$post['status']);
	$res=$callConfig->insertRecord(TPREFIX.TBL_FORUMCATEGORY,$fieldnames);
	if($res!="")
	{
		sitesettingsClass::recentActivities('Forum >> Category created successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_forumcat&err=Forum >> Category created successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Forum >> Category creation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_forumcat&ferr=Forum >> Category creation failed");
	}
	}
	
	function updateForumCategory($post)
	{
	global $callConfig;
	$fieldnames=array('parentid'=>$post['parentid'],'title'=>mysql_real_escape_string($post['title']),'bigtext'=>mysql_real_escape_string($post['bigtext']),'status'=>$post['status']);
	$res=$callConfig->updateRecord(TPREFIX.TBL_FORUMCATEGORY,$fieldnames,'fcid',$post['hdn_id']);
	if($res==1)
	{
		sitesettingsClass::recentActivities('Forum >> Category updated successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_forumcat&err=Forum >> Category updated successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Forum >> Category updation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_forumcat&ferr=Forum >> Category updation failed");
	}
	}
	function forumCategoryDelete($id,$prntid)
	{
	global $callConfig;
	$res=$callConfig->deleteRecord(TPREFIX.TBL_FORUMCATEGORY,'fcid',$id);
	if($res==1)
	{
	    $callConfig->deleteRecord(TPREFIX.TBL_FORUMCATEGORY,'parentid',$id);
	    if($prntid==0)
		$whr='fcid='.$id;
		else
		$whr='fscid='.$id;
		$query=$callConfig->selectQuery(TPREFIX.TBL_FORUMTOPICS,'ftid',$whr,'','','');
		$topicsres = $callConfig->getAllRows($query);
		$c=array();
		foreach($topicsres as $topics_res){
			$c[]=$topics_res->ftid;
			$callConfig->deleteRecord(TPREFIX.TBL_FORUMCOMMENTS,'ftid',$topics_res->ftid);
		}
		$callConfig->deleteRecord(TPREFIX.TBL_FORUMTOPICS,'ftid',$c);
		sitesettingsClass::recentActivities('Forum >> Category deleted successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_forumcat&err=Forum >> Category deleted successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Forum >> Category deletion failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_forumcat&ferr=Forum >> Category deletion failed");
	}
	}
	 // end fourm category //
	 
 // fourm topic //
 function getAllForumTopicList($sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$query=$callConfig->selectQuery(TPREFIX.TBL_FORUMTOPICS,'*','',$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllForumTopicListCount()
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_FORUMTOPICS,'ftid','','','','');
	 return $callConfig->getCount($query);
  } 
  
  function getForumTopicData($id)
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_FORUMTOPICS,'*','ftid='.$id,'','','');
	return $callConfig->getRow($query);
 }
 
	function insertForumTopic($post)
	{
	global $callConfig;
	$fieldnames=array('fcid'=>$post['fcid'],'fscid'=>$post['fscid'],'title'=>mysql_real_escape_string($post['title']),'bigtext'=>mysql_real_escape_string($post['bigtext']),'status'=>$post['status'],'createdby'=>$_SESSION['us_name'],'memberjoinedon'=>$_SESSION['adminmemberjoinedon']);
	$res=$callConfig->insertRecord(TPREFIX.TBL_FORUMTOPICS,$fieldnames);
	if($res!="")
	{
		sitesettingsClass::recentActivities('Forum >> Topic created successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_forumtopics&err=Forum >> Topic created successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Forum >> Topic creation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_forumtopics&ferr=Forum >> Topic creation failed");
	}
	}
	
	function updateForumTopic($post)
	{
	global $callConfig;
	if($_SESSION['roletype']=="senior")
	{
	$fieldnames=array('fcid'=>$post['fcid'],'fscid'=>$post['fscid'],'title'=>mysql_real_escape_string($post['title']),'bigtext'=>mysql_real_escape_string($post['bigtext']),'status'=>$post['status'],'modifyon'=>DATE_TIME,'modifyby'=>$_SESSION['us_name']);
	}
	else
	{
	 $fieldnames=array('fcid'=>$post['fcid'],'fscid'=>$post['fscid'],'title'=>mysql_real_escape_string($post['title']),'bigtext'=>mysql_real_escape_string($post['bigtext']),'modifyon'=>DATE_TIME,'modifyby'=>$_SESSION['us_name']);
	}
	$res=$callConfig->updateRecord(TPREFIX.TBL_FORUMTOPICS,$fieldnames,'ftid',$post['hdn_id']);
	if($res==1)
	{
		sitesettingsClass::recentActivities('Forum >> Topic updated successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_forumtopics&err=Forum >> Topic updated successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Forum >> Topic updation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_forumtopics&ferr=Forum >> Topic updation failed");
	}
	}
	function forumTopicDelete($id)
	{
	global $callConfig;
	$res=$callConfig->deleteRecord(TPREFIX.TBL_FORUMTOPICS,'ftid',$id);
	if($res==1)
	{
		$query=$callConfig->selectQuery(TPREFIX.TBL_FORUMCOMMENTS,'frid','ftid='.$id,'','','');
		$commentsres = $callConfig->getAllRows($query);
		$c=array();
		foreach($commentsres as $res_comets){
		$c[]=$res_comets->frid;
		}
		$callConfig->deleteRecord(TPREFIX.TBL_FORUMCOMMENTS,'frid',$c);
		sitesettingsClass::recentActivities('Forum >> Topic deleted successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_forumtopics&err=Forum >> Topic deleted successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Forum >> Topic deletion failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_forumtopics&ferr=Forum >> Topic deletion failed");
	}
	}
	 // end fourm category //
	 
	 	 
// get forum posts or comemnts
 function getAllForumTopicsListDropDown($sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$whr=" status='Active'";
	$query=$callConfig->selectQuery(TPREFIX.TBL_FORUMTOPICS,'*',$whr,$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 



  function getAllForumPostCommentsList($ftcid,$sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	if($ftcid!="" && $ftcid!="all"){
	$wher=" ftip='".$ftcid."'";
	}
	$query=$callConfig->selectQuery(TPREFIX.TBL_FORUMCOMMENTS,'*',$wher,$order,$start,$limit);
	
	return $callConfig->getAllRows($query);
  } 
  function getAllForumPostCommentsListCount($ftcid)
  {
	global $callConfig;
	if($ftcid!="" && $ftcid!="all"){
	$wher=" ftip='".$ftcid."'";
	}
	$query=$callConfig->selectQuery(TPREFIX.TBL_FORUMCOMMENTS,'ftip',$wher,'','','');
	 return $callConfig->getCount($query);
  } 
	function BlogCommentDelete($id)
	{
	global $callConfig;
	$res=$callConfig->deleteRecord(TPREFIX.TBL_FORUMCOMMENTS,'frid',$id);
	if($res==1)
	{
		sitesettingsClass::recentActivities('Forum >> Post deleted successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_forumcommnets&err=Forum >> Post deleted successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Forum >> Post deletion failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_forumcommnets&ferr=Forum >> Post deletion failed");
	}
	}
	
	function ForumCommentStatusChanging($get){
	global $callConfig;
	if($get['st']=="Active")
	$statusbe='Inactive';
	else
	$statusbe='Active';
	$fieldnames=array('status'=>$statusbe);
	$res=$callConfig->updateRecord(TPREFIX.TBL_FORUMCOMMENTS,$fieldnames,'frid',$get['id']);
	if($res==1)
	{
		sitesettingsClass::recentActivities('Forum >> Post Status changed successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_forumcommnets&err=Forum >> Post Status changed successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Forum >> Post Status changing failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_forumcommnets&ferr=Forum >> Post Status changing failed");
	}
	}
	// get forum posts or comemnts
	
}	
	?>