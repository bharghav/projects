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
	$query=$callConfig->selectQuery(TPREFIX.TBL_CATEGORY,'cid',$whr,'','','');
	return $callConfig->getCount($query);
  } 
  
  function getCategoryData($id)
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_CATEGORY,'*','cid='.$id,'','','');
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
	$res=$callConfig->updateRecord(TPREFIX.TBL_CATEGORY,$fieldnames,'cid',$post['hdn_id']);
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
	$res=$callConfig->deleteRecord(TPREFIX.TBL_CATEGORY,'cid',$id);
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
	$query=$callConfig->selectQuery(TPREFIX.TBL_SUBCATEGORY,'scatid','','','','');
	 return $callConfig->getCount($query);
  } 
  
  function getsubCategoryData($id)
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_SUBCATEGORY,'*','scatid='.$id,'','','');
	return $callConfig->getRow($query);
  }

  function getsubCategoryAllData($id)
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_SUBCATEGORY,'*','cid='.$id,'','','');
	return $callConfig->getAllRows($query);
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
	$titleslug=$callConfig->remove_special_symbols($post['subcattitle']);
	$fieldnames=array('cid'=>$post['cid'],'subcattitle'=>mysql_real_escape_string($post['subcattitle']),'subcattitle_slug'=>$titleslug,'bigtext'=>mysql_real_escape_string($post['bigtext']),'status'=>$post['status']);
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
	$titleslug=$callConfig->remove_special_symbols($post['subcattitle']);
	$fieldnames=array('cid'=>$post['cid'],'subcattitle'=>mysql_real_escape_string($post['subcattitle']),'subcattitle_slug'=>$titleslug,'bigtext'=>mysql_real_escape_string($post['bigtext']),'status'=>$post['status']);
	$res=$callConfig->updateRecord(TPREFIX.TBL_SUBCATEGORY,$fieldnames,'scatid',$post['hdn_id']);
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
	$query=$callConfig->selectQuery(TPREFIX.TBL_SUBCATEGORY,'image','scatid='.$id,'','','');
	$imageres = $callConfig->getRow($query);
	//$callConfig->imageCommonUnlink("../uploads/subcategory/","../uploads/subcategory/thumbs/",$imageres->image);
	$res=$callConfig->deleteRecord(TPREFIX.TBL_SUBCATEGORY,'scatid',$id);
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
	//$query=$callConfig->selectQuery(TPREFIX.TBL_SUBJECTS,'image','spid='.$id,'','','');
	//$imageres = $callConfig->getRow($query);
	//$callConfig->imageCommonUnlink("../uploads/subjects/","../uploads/subjects/thumbs/",$imageres->image);
	$res=$callConfig->deleteRecord(TPREFIX.TBL_SUBJECTS,'spid',$id);
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

// questions //
 function getAllQuestionsList($where,$sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	if($where!="")
	$whr=" status='".$where."'";
	$query=$callConfig->selectQuery(TPREFIX.TBL_QUESTION,'*',$whr,$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllQuestionsListCount($where)
  {
	global $callConfig;
	if($where!="")
	$whr=" status='".$where."'";
	$query=$callConfig->selectQuery(TPREFIX.TBL_QUESTION,'qid',$whr,'','','');
	return $callConfig->getCount($query);
  } 
  
  function getQuestionData($id)
  {
	global $callConfig;
	//$query=$callConfig->selectQuery(TPREFIX.TBL_QUESTION,'*','qid='.$id,'','','');
	$query=$callConfig->selectQuery_two(TPREFIX.TBL_QUESTION.' q',TPREFIX.TBL_QUESTIONOPTIONS.' qop','q.*','qop.*','q.qid='.$id.' and q.qid = qop.qid','','','');
	return $callConfig->getRow($query);
 }
 
	function insertQuestions($post)
	{
	global $callConfig;
	/*echo "<pre>";
	print_r($post);
	$post['multiple_correctans'];*/
	$multpleArray = implode(',',$post['multiple_correctans']);
	/*print_r($multple);
	exit;*/
	$titleslug=$callConfig->remove_special_symbols($post['questitle']);
	//$image = $callConfig->freeimageUploadcomncode("cat",'image',"../uploads/category/","../uploads/category/thumbs/",$post['hdn_image'],208,95);'image'=>$image,
	$fieldnames=array('questitle'=>mysql_real_escape_string($post['questitle']),'questitle_slug'=>$titleslug,'question'=>mysql_real_escape_string($post['question']),'questionType'=>mysql_real_escape_string($post['questype']),'questionMarks'=>mysql_real_escape_string($post['quesmarks']),'status'=>$post['status']);
	$res=$callConfig->insertRecord(TPREFIX.TBL_QUESTION,$fieldnames);
	if($res!="")
	{
		if($post['questype'] == 'Single'){
			$fieldnamesOptions=array('qid'=>$res,'optionValue'=>$post['single_correctans'],'option1'=>mysql_real_escape_string($post['option1']),'option2'=>mysql_real_escape_string($post['option2']),'option3'=>mysql_real_escape_string($post['option3']),'option4'=>mysql_real_escape_string($post['option4']));
			$resOptions=$callConfig->insertRecord(TPREFIX.TBL_QUESTIONOPTIONS,$fieldnamesOptions);
		}else{
			$fieldnamesOptions=array('qid'=>$res,'optionValue'=>$multpleArray,'option1'=>mysql_real_escape_string($post['option5']),'option2'=>mysql_real_escape_string($post['option6']),'option3'=>mysql_real_escape_string($post['option7']),'option4'=>mysql_real_escape_string($post['option8']));
			$resOptions=$callConfig->insertRecord(TPREFIX.TBL_QUESTIONOPTIONS,$fieldnamesOptions);
		}
		sitesettingsClass::recentActivities('Question >> Question created successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_question&err=Question >> Question created successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Question >> Question creation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_question&ferr=Question >> Question creation failed");
	}
	}
	
	function updateQuestion($post)
	{
	global $callConfig;
	/*echo "<pre>";
	print_r($post);exit;*/
	$titleslug=$callConfig->remove_special_symbols($post['questitle']);
	$multpleArray = implode(',',$post['multiple_correctans']);
	//$image = $callConfig->freeimageUploadcomncode("cat",'image',"../uploads/category/","../uploads/category/thumbs/",$post['hdn_image'],208,95);'image'=>$image,
	$fieldnames=array('questitle'=>mysql_real_escape_string($post['questitle']),'questitle_slug'=>$titleslug,'question'=>mysql_real_escape_string($post['question']),'questionType'=>mysql_real_escape_string($post['questype']),'questionMarks'=>mysql_real_escape_string($post['quesmarks']),'status'=>$post['status']);
	$res=$callConfig->updateRecord(TPREFIX.TBL_QUESTION,$fieldnames,'qid',$post['hdn_id']);
	if($res==1)
	{
		if($post['questype'] == 'Single'){
			$fieldnamesOptions=array('id'=>$post['hdn_opid'],'qid'=>$post['hdn_id'],'optionValue'=>$post['single_correctans'],'option1'=>mysql_real_escape_string($post['option1']),'option2'=>mysql_real_escape_string($post['option2']),'option3'=>mysql_real_escape_string($post['option3']),'option4'=>mysql_real_escape_string($post['option4']));
			$resOptions=$callConfig->updateRecord(TPREFIX.TBL_QUESTIONOPTIONS,$fieldnamesOptions,'qid',$post['hdn_id']);
		}else{
			$fieldnamesOptions=array('id'=>$post['hdn_opid'],'qid'=>$post['hdn_id'],'optionValue'=>$multpleArray,'option1'=>mysql_real_escape_string($post['option5']),'option2'=>mysql_real_escape_string($post['option6']),'option3'=>mysql_real_escape_string($post['option7']),'option4'=>mysql_real_escape_string($post['option8']));
			$resOptions=$callConfig->updateRecord(TPREFIX.TBL_QUESTIONOPTIONS,$fieldnamesOptions,'qid',$post['hdn_id']);
		}

		sitesettingsClass::recentActivities('Question >> Question updated successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_question&err=Question >> Question updated successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Question >> Question updation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_question&ferr=Question >> Question updation failed");
	}
	}
	
	function questionDelete($id)
	{
	global $callConfig;
	//$query=$callConfig->selectQuery(TPREFIX.TBL_CATEGORY,'image','scid='.$id,'','','');
	//$imageres = $callConfig->getRow($query);
	//$callConfig->imageCommonUnlink("../uploads/category/","../uploads/category/thumbs/",$imageres->image);
	$res=$callConfig->deleteRecord(TPREFIX.TBL_QUESTION,'cid',$id);
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
		sitesettingsClass::recentActivities('Question >> Question deleted successfully on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_question&err=Question >> Question deleted successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Question >> Question deletion failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_question&ferr=Question >> Question deletion failed");
	}
	}
// end questions //



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