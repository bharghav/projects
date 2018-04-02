<?php
class blogtopicClass
{ 
 // Product category //
  function getAllBlogTopicsList($parentid,$dispin,$sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$where=" status='Active' ";
	if($dispin!="")
	$where.=" and displayin='".$dispin."'";
	if($parentid!="")
	$where.=" and parentid='".$parentid."'";
	$query=$callConfig->selectQuery(TPREFIX.TBL_BLOGPOST,'*',$where,$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllBlogTopicsListCount($parentid,$dispin)
  {
	global $callConfig;
	$where=" status='Active' ";
	if($dispin!="")
	$where.=" and displayin='".$dispin."'";
	if($parentid!="")
	$where.=" and parentid='".$parentid."'";
	$query=$callConfig->selectQuery(TPREFIX.TBL_BLOGPOST,'id',$where,'','','');
	return $callConfig->getCount($query);
  } 
  
  function getBlogTopicData($id)
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_BLOGPOST,'*','id='.$id,'','','');
	return $callConfig->getRow($query);
 }
 
   
   
   
   function getAllRelationshipAdviceList($sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$where="answers!='' and status='Active'";
	$query=$callConfig->selectQuery(TPREFIX.TBL_RELATIONSHIPADVICE,'*',$where,$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllRelationshipAdviceListCount()
  {
	global $callConfig;
	$where="answers!='' and status='Active'";
	$query=$callConfig->selectQuery(TPREFIX.TBL_RELATIONSHIPADVICE,'rid',$where,'','','');
	return $callConfig->getCount($query);
  } 
   
	function insertelationshipAdviceComments($post)
	{
		global $callConfig;
		if($_SESSION['frnt_musername']!="")
		$name=$_SESSION['frnt_musername'];
		else
		$name=$post['name'];
		if($_SESSION['frnt_memail']!="")
		$emailid=$_SESSION['frnt_memail'];
		else
		$emailid="";
		$fieldnames=array('name'=>$name,'email'=>$emailid,'comments'=>mysql_real_escape_string($post['comment_text']),'ip_address'=>$_SERVER['REMOTE_ADDR']);
		$res=$callConfig->insertRecord(TPREFIX.TBL_RELATIONSHIPADVICE,$fieldnames);
		if($res!="")
		{
		    $cnt=blogtopicClass::ipCheckingExistornot($_SERVER['REMOTE_ADDR'],'');
		    if($cnt<=0){
	         	$fieldnames_ip=array('ip_address'=>$_SERVER['REMOTE_ADDR'],'status'=>'Unblock');
		        $callConfig->insertRecord(TPREFIX.TBL_IPADDRESSTRACE,$fieldnames_ip); 		  
			}
			contentpagesClass::recentActivities($name.' >> request has been submitted on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("relationshipadvice.php?btid=".$_POST['hdn_btid']."&serr=Your request has been submitted");
		}
		else
		{
			//sitesettingsClass::recentActivities('Home >> Article creation failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("relationshipadvice.php?btid=".$_POST['hdn_btid']."&serr=Your Advice sending failed");
		}
	}
 
 
 function insertUserHomeBlogComments($post)
 {
 global $callConfig;
        $ressec=contentpagesClass::checkHomeORBlogPostsForRightNav($post['hdn_btip']);
		if($_SESSION['frnt_musername']!="")
		$name=$_SESSION['frnt_musername'];
		else
		$name=$post['name'];
		if($_SESSION['frnt_memail']!="")
		$email=$_SESSION['frnt_memail'];
		else
		$email="";
        $fieldnames=array('b_id'=>$post['hdn_btip'],'name'=>$name,'mail'=>$email,'comment_text'=>mysql_real_escape_string($post['cmnt']),'type'=>$ressec->displayin,'status'=>'Active','ip_address'=>$_SERVER['REMOTE_ADDR']);
		$res=$callConfig->insertRecord(TPREFIX.TBL_BLOGCOMMENTS,$fieldnames);
		if($res!="")
		{
		    $cnt=blogtopicClass::ipCheckingExistornot($_SERVER['REMOTE_ADDR'],'');
		    if($cnt<=0){
	         	$fieldnames_ip=array('ip_address'=>$_SERVER['REMOTE_ADDR'],'status'=>'Unblock');
		        $callConfig->insertRecord(TPREFIX.TBL_IPADDRESSTRACE,$fieldnames_ip); 		  
			}
			contentpagesClass::recentActivities($name.' >> comment posted successfully on >> '.DATE_TIME_FORMAT.'','g');
			if($post['hdn_bcid']!="")
			$reurl="homeindivtopic.php?bcid=".$post['hdn_bcid']."&btid=".$post['hdn_btip']."&cmntmsg=Comment posted successfully";
			else
			$reurl=$post['hdn_urlredirect']."?btid=".$post['hdn_btip']."&cmntmsg=Comment posted successfully";
			$callConfig->headerRedirect($reurl);
		}
		else
		{ 
		    if($post['hdn_bcid']!="")
			$reurl="homeindivtopic.php?bcid=".$post['hdn_bcid']."&btid=".$post['hdn_btip']."&cmntmsg=Comment posting failed";
			else
			$reurl=$post['hdn_urlredirect']."?btid=".$post['hdn_btip']."&cmntmsg=Comment posting failed";
			$callConfig->headerRedirect($reurl);
		}
 }
 
  function getAllBlogCommentsList($b_id,$sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$wher=" status='Active'";
	if($b_id!="" && $b_id!="all"){
	$wher.=" and b_id='".$b_id."'";
	}
	$query=$callConfig->selectQuery(TPREFIX.TBL_BLOGCOMMENTS,'*',$wher,$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllBlogCommentsListCount($b_id)
  {
	global $callConfig;
	$wher=" status='Active'";
	if($b_id!="" && $b_id!="all"){
	$wher.=" and b_id='".$b_id."'";
	}
	$query=$callConfig->selectQuery(TPREFIX.TBL_BLOGCOMMENTS,'id',$wher,'','','');
	return $callConfig->getCount($query);
  } 
  
  function getFullBlogName($b_id)
    {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_BLOGPOST,'title',"id='".$b_id."'",'','','');
	$res=$callConfig->getRow($query);
	return $res->title;
  }
  
  function getCmntCount_Posts($tablename,$com,$where)
   {
	global $callConfig;
	$query=$callConfig->selectQuery($tablename,$com,$where,'','','');
	return $callConfig->getCount($query);
  } 
  // ip checking
  public function ipCheckingExistornot($ipadress,$status)
  {
    global $callConfig;
	$whr="ip_address='".$ipadress."'";
	if($status!="")
	$whr.=" and status='Block'";
   	$query=$callConfig->selectQuery(TPREFIX.TBL_IPADDRESSTRACE,'ip_address',$whr,'','','');
	return $callConfig->getCount($query);
  }

}	
?>