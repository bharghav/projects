<?php
class fourmClass
{ 
 // fourm category //
 function getAllForumCategoryList($whr,$sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$where=" status='Active'";
	if($whr!="")$where.=" and parentid=".$whr;
	$query=$callConfig->selectQuery(TPREFIX.TBL_FORUMCATEGORY,'*',$where,$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllForumCategoryListCount($whr)
  {
	global $callConfig;
	$where=" status='Active'";
	if($whr!="")$where.=" and parentid=".$whr;
	$query=$callConfig->selectQuery(TPREFIX.TBL_FORUMCATEGORY,'fcid',$where,'','','');
	return $callConfig->getCount($query);
  } 
  
   function getCount_Topics_Posts($tablename,$com,$where)
   {
	global $callConfig;
	$query=$callConfig->selectQuery($tablename,$com,$where,'','','');
	return $callConfig->getCount($query);
  } 
 
 
  function getAllForumTopicList($fscid,$sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$where=" status='Active'";
	if($fscid!="")
	$where.=" and fscid='".$fscid."'";
	$query=$callConfig->selectQuery(TPREFIX.TBL_FORUMTOPICS,'*',$where,$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllForumTopicListCount($fscid)
  {
	global $callConfig;
	$where=" status='Active'";
	if($fscid!="")
	$where.=" and fscid='".$fscid."'";
	$query=$callConfig->selectQuery(TPREFIX.TBL_FORUMTOPICS,'ftid',$where,'','','');
	 return $callConfig->getCount($query);
  } 
  function getForumTopicData($ftid)
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_FORUMTOPICS,'*','ftid='.$ftid,'','','');
	return $callConfig->getRow($query);
 }
 
    function insertForumTopic($post)
	{
	global $callConfig;
	$subcategory=$post['fscid'];
	$query=$callConfig->selectQuery(TPREFIX.TBL_FORUMCATEGORY,'parentid','fcid='.$subcategory,'','','');
	$ressec=$callConfig->getRow($query);
	if($_SESSION['frnt_musername']!="")
	$name=$_SESSION['frnt_musername'];
	else
	$name=$post['name'];
	if($_SESSION['memberjoinedon']!="")
	$memberjoinedon=$_SESSION['memberjoinedon'];
	else
	$memberjoinedon="";
	$fieldnames=array('fcid'=>$ressec->parentid,'fscid'=>$subcategory,'title'=>mysql_real_escape_string($post['title']),'bigtext'=>mysql_real_escape_string($post['bigtext']),'createdby'=>$name,'memberjoinedon'=>$memberjoinedon,'status'=>'Active','ip_address'=>$_SERVER['REMOTE_ADDR']);
	$res=$callConfig->insertRecord(TPREFIX.TBL_FORUMTOPICS,$fieldnames);
	if($res!="")
	{
	    $cnt=blogtopicClass::ipCheckingExistornot($_SERVER['REMOTE_ADDR'],'');
		if($cnt<=0){
	       	$fieldnames_ip=array('ip_address'=>$_SERVER['REMOTE_ADDR'],'status'=>'Unblock');
		    $callConfig->insertRecord(TPREFIX.TBL_IPADDRESSTRACE,$fieldnames_ip); 		  
		}
		contentpagesClass::recentActivities($name.' >> Forum >> Topic created successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("forumtopics.php?fscid=".$subcategory."&err=Forum >> Topic created successfully");
	}
	else
	{
	//contentpagesClass::recentActivities('Forum >> Topic creation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("forumtopics.php?fscid=".$subcategory."&ferr=Forum >> Topic creation failed");
	}
	}
	
	function noofForumTopicViewsUpdate($tpid)
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_FORUMTOPICS,'ftid,noofviews','ftid='.$tpid,'','','');
	$ressec=$callConfig->getRow($query);
	$noofviews=$ressec->noofviews+1;
	$fieldnames=array('noofviews'=>$noofviews);
	$res=$callConfig->updateRecord(TPREFIX.TBL_FORUMTOPICS,$fieldnames,'ftid',$tpid);
	}
  
    function insertForumTopicComments($post)
	{
	global $callConfig;
	$subcategory=$post['fscid'];
	$query=$callConfig->selectQuery(TPREFIX.TBL_FORUMCATEGORY,'parentid','fcid='.$subcategory,'','','');
	$ressec=$callConfig->getRow($query);
	if($_SESSION['frnt_musername']!="")
	$name=$_SESSION['frnt_musername'];
	else
	$name=$post['name'];
	if($_SESSION['memberjoinedon']!="")
	$memberjoinedon=$_SESSION['memberjoinedon'];
	else
	$memberjoinedon="";
	$fieldnames=array('fcid'=>$ressec->parentid,'fscid'=>$subcategory,'ftid'=>$post['ftid'],'comment_text'=>mysql_real_escape_string($post['bigtext']),'commentedby'=>$name,'memberjoinedon'=>$memberjoinedon,'status'=>'Active','ip_address'=>$_SERVER['REMOTE_ADDR']);
	$res=$callConfig->insertRecord(TPREFIX.TBL_FORUMCOMMENTS,$fieldnames);
	if($res!="")
	{
	    $cnt=blogtopicClass::ipCheckingExistornot($_SERVER['REMOTE_ADDR'],'');
		if($cnt<=0){
	       	$fieldnames_ip=array('ip_address'=>$_SERVER['REMOTE_ADDR'],'status'=>'Unblock');
		    $callConfig->insertRecord(TPREFIX.TBL_IPADDRESSTRACE,$fieldnames_ip); 		  
		}
		contentpagesClass::recentActivities($name.' >> Forum >> Comment sent successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("forumcomments.php?fscid=".$subcategory."&ftid=".$post['ftid']."&err=Forum >> Comment sent successfully");
	}
	else
	{
		$callConfig->headerRedirect("forumcomments.php?fscid=".$subcategory."&ftid=".$post['ftid']."&ferr=Forum >> Comment sending failed");
	}
	}

  function getAllForumPostComments_Latest($fscid,$ftid,$sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$where=" status='Active'";
	if($fscid!="")
	$where.=" and fscid='".$fscid."'";
	if($ftid!="")
	$where.=" and ftid='".$ftid."'";
	$query=$callConfig->selectQuery(TPREFIX.TBL_FORUMCOMMENTS,'*',$where,$order,$start,$limit);
	return $callConfig->getRow($query);
  } 
  
  function getAllForumPostCommentsList($ftid,$sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$where=" status='Active'";
	if($ftid!="")
	$where.=" and ftid='".$ftid."'";
	$query=$callConfig->selectQuery(TPREFIX.TBL_FORUMCOMMENTS,'*',$where,$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllForumPostCommentsListCount($ftid)
  {
	global $callConfig;
	$where=" status='Active'";
	if($ftid!="")
	$where.=" and ftid='".$ftid."'";
	$query=$callConfig->selectQuery(TPREFIX.TBL_FORUMCOMMENTS,'ftid',$where,'','','');
	 return $callConfig->getCount($query);
  } 
}	
?>