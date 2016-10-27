<?php

class contentpagesClass
{ 

  function getAllContentPagesList($sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="id Desc";
	 
	 $query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTS,'*','',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 
  
  
  
  function getAllpillslist($id)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	$query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTPILLS,'*','prd_id="'.$id.'"',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 


 function getAllSearchname($search,$sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	  $query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTS,'*','pname LIKE "%'.$search.'%"',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 
  
  function getAllSearchnamecount($search,$sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	  $query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTS,'*','pname LIKE "%'.$search.'%"',$order,$start,$limit); 

	return $callConfig->getCount($query);
  } 





	function getAllContentPagesListCount()
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTS,'page_id','','','','');
	return $callConfig->getCount($query);
	} 

	function getContentPageData($id)
	{	
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTS,'*','id='.$id,'','','');
		return $callConfig->getRow($query);
	}
	
	function getallbarndsforcat($id)
	{	
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_BRAND,'*','cat_id="'.$id.'"','','',''); 
		return $callConfig->getAllRows($query);
	}

function getallbarndssubcat($id)
	{	
		global $callConfig;
		 $query=$callConfig->selectQuery(TPREFIX.TBL_BRAND,'*','subcat_id="'.$id.'"','','',''); 
		return $callConfig->getAllRows($query);
	}
	
	function getviewbrand($id,$subcat)
	{	
		global $callConfig;
		
		if($subcat==0)
		$whr='cat_id="'.$id.'"';
		else 
		$whr='cat_id="'.$id.'" and  subcat_id="'.$subcat.'"';
		 $query=$callConfig->selectQuery(TPREFIX.TBL_BRAND,'*',$whr,'','',''); 
		return $callConfig->getAllRows($query);
	}

 	function insertcontentPage($post)
	{
		global $callConfig;
		
		if($post['productname']!="")
		$titleslug=$callConfig->remove_special_symbols($post['productname']);
		else
		$titleslug=$callConfig->remove_special_symbols($post['productname']);
		//Image creating//
		
		//echo "<pre>";
		//print_r($_POST);
		//echo "<pre>";exit;
		$sdate=$post['start_date'];
		$spacedate = explode(' ',$sdate); print_r($spacedate);
		$dashdate = explode('/',$spacedate[0]); print_r($dashdate);
		$timedate = explode(':',$spacedate[1]); print_r($timedate);
		$final_sdate = $dashdate[2]."-".$dashdate[0]."-".$dashdate[1]." ".$timedate[0].":".$timedate[1].":".$timedate[2];

		$edate=$post['end_date'];
		$spaceedate = explode(' ',$edate); print_r($spaceedate);
		$dashedate = explode('/',$spaceedate[0]); print_r($dashedate);
		$timeedate = explode(':',$spacedate[1]); print_r($timedate);
		$final_edate = $dashedate[2]."-".$dashedate[0]."-".$dashedate[1]." ".$timeedate[0].":".$timeedate[1].":".$timeedate[2];
		
		$bannerimage = $callConfig->freeimageUploadcomncode('products','productimage',"../uploads/Products/","../uploads/Products/thumbs/",$post['hdn_image'],'100','100');
		$proimage1 = $callConfig->freeimageUploadcomncode('products','proimage1',"../uploads/Products/","../uploads/Products/thumbs",$post['hdnpro_image1'],'100','100');
		$proimage2 = $callConfig->freeimageUploadcomncode('products','proimage2',"../uploads/Products/","../uploads/Products/thumbs",$post['hdnpro_image2'],'100','100');
		$proimage3 = $callConfig->freeimageUploadcomncode('products','proimage3',"../uploads/Products/","../uploads/Products/thumbs",$post['hdnpro_image3'],'100','100');
		
		
		$fieldnames=array(
		'cat_id'=>$post['category'],
		'sub_cat'=>$post['subcat'],
		'prod_type'=>$post['prod_type'],
		'pname'=>mysql_real_escape_string($post['productname']),
		'prdttitle_slug'=>$titleslug,
		'SKUid'=>mysql_real_escape_string($post['productskuid']),
		'multipleofbid'=>mysql_real_escape_string($post['multipleofbid']),
		'quantity'=>mysql_real_escape_string($post['quantity']),
		'price'=>number_format($post['price'],2),
		'pdescription'=>mysql_real_escape_string($post['descr']),
		'instructions'=>mysql_real_escape_string($post['instructions']),
		'shipping_details'=>mysql_real_escape_string($post['shdetails']),
		'featured'=>$post['featured'],
		'start_date'=>$final_sdate,
		'end_date'=>$final_edate,
		'pimage'=>$bannerimage,
		'pimage1'=>$proimage1,
		'pimage2'=>$proimage2,
		'pimage3'=>$proimage3	
		);
		
		
		$res=$callConfig->insertRecord(TPREFIX.TBL_PRODUCTS,$fieldnames);
		if($res!="")
		{
		 $pills_count=sizeof($_POST['qtyproducts']);
		 
		 for($i=0;$i<$pills_count;$i++)

				{ if($_POST['qtyproducts'][$i]!="")

				{
				$fieldnames2=array('prd_id'=>$res,'quantity'=>$post['qtyproducts'][$i],'eachpill'=>$post['perpill'][$i],'totalprice'=>$post['totalcost'][$i]);
				
				//print_r($fieldnames2);exit;

				$res1=$callConfig->insertRecord(TPREFIX.TBL_PRODUCTPILLS,$fieldnames2);
				
				}
				
				}
		
		
		
			sitesettingsClass::recentActivities('Product Added successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_productslist&err=Product Added successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Product Adding failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_productslist&ferr=Product Adding failed");
		}
	}
	
	function updatecontentPage($post)
	{
		global $callConfig;
		
		if($post['productname']!="")
		$titleslug=$callConfig->remove_special_symbols($post['productname']);
		else
		$titleslug=$callConfig->remove_special_symbols($post['productname']);
		
		/*echo "<pre>";
		print_r($_POST);
		echo "<pre>";exit;*/
		$sdate=$post['start_date'];
		$spacedate = explode(' ',$sdate); print_r($spacedate);
		$dashdate = explode('/',$spacedate[0]); print_r($dashdate);
		$timedate = explode(':',$spacedate[1]); print_r($timedate);
		$final_sdate = $dashdate[2]."-".$dashdate[0]."-".$dashdate[1]." ".$timedate[0].":".$timedate[1].":".$timedate[2];

		$edate=$post['end_date'];
		$spaceedate = explode(' ',$edate); print_r($spaceedate);
		$dashedate = explode('/',$spaceedate[0]); print_r($dashedate);
		$timeedate = explode(':',$spaceedate[1]); print_r($timeedate);
		$final_edate = $dashedate[2]."-".$dashedate[0]."-".$dashedate[1]." ".$timeedate[0].":".$timeedate[1].":".$timeedate[2];
		


		$bannerimage = $callConfig->freeimageUploadcomncode('products','productimage',"../uploads/Products/","../uploads/Products/thumbs/",$post['hdn_image'],'100','100');
		$proimage1 = $callConfig->freeimageUploadcomncode('products','proimage1',"../uploads/Products/","../uploads/Products/thumbs",$post['hdnpro_image1'],'100','100');
		$proimage2 = $callConfig->freeimageUploadcomncode('products','proimage2',"../uploads/Products/","../uploads/Products/thumbs",$post['hdnpro_image2'],'100','100');
		$proimage3 = $callConfig->freeimageUploadcomncode('products','proimage3',"../uploads/Products/","../uploads/Products/thumbs",$post['hdnpro_image3'],'100','100');
		
		$fieldnames=array(
		'cat_id'=>$post['category'],
		'sub_cat'=>$post['subcat'],
		'prod_type'=>$post['prod_type'],
		'pname'=>mysql_real_escape_string($post['productname']),
		'prdttitle_slug'=>$titleslug,
		'SKUid'=>mysql_real_escape_string($post['productskuid']),
		'multipleofbid'=>mysql_real_escape_string($post['multipleofbid']),
		'quantity'=>mysql_real_escape_string($post['quantity']),
		'price'=>number_format($post['price'],2),
		'pdescription'=>mysql_real_escape_string($post['descr']),
		'instructions'=>mysql_real_escape_string($post['instructions']),
		'shipping_details'=>mysql_real_escape_string($post['shdetails']),
		'featured'=>$post['featured'],
		'start_date'=>$final_sdate,
		'end_date'=>$final_edate,
		'pimage'=>$bannerimage,
		'pimage1'=>$proimage1,
		'pimage2'=>$proimage2,
		'pimage3'=>$proimage3		
		);
		
		//print_r($fieldnames); exit;
		$res=$callConfig->updateRecord(TPREFIX.TBL_PRODUCTS,$fieldnames,'id',$post['hdn_page_id']);
		//echo $res; exit;
		if($res!="")
		{
		
		$pills_count=sizeof($_POST['qtyproducts']);
		//echo $pills_count; exit;
		 
		 for($i=0;$i<$pills_count;$i++)

				{ 
				//print_r($_POST['gal_hdnp_id'][$i]); exit;
				
               if(!isset($_POST['gal_hdn_pid'][$i]) && $_POST['gal_hdn_pid'][$i]=="")
			   {
				if($_POST['qtyproducts'][$i]!="")

				{
				$fieldnames2=array('prd_id'=>$post['hdn_page_id'],'quantity'=>$post['qtyproducts'][$i],'eachpill'=>$post['perpill'][$i],'totalprice'=>$post['totalcost'][$i]);
				
				//print_r($fieldnames2);exit;

				$res1=$callConfig->insertRecord(TPREFIX.TBL_PRODUCTPILLS,$fieldnames2);
				
				} } else {
				
				$fieldnames2=array('prd_id'=>$post['gal_hdnp_pid'][$i],'quantity'=>$post['qtyproducts'][$i],'eachpill'=>$post['perpill'][$i],'totalprice'=>$post['totalcost'][$i]);
				
				//print_r($fieldnames2);exit;

				$res1=$callConfig->updateRecord(TPREFIX.TBL_PRODUCTPILLS,$fieldnames2,'id',$post['gal_hdnp_id'][$i]);
				
				}
				
				}
		
		
		
		
			sitesettingsClass::recentActivities('Product updated successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_productslist&err=products updated successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Product updattion failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_productslist&ferr=products updattion failed");
		}
	}

	function contentpageDelete($id)

	{
	//echo "syam";exit;
	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_PRODUCTS,'id',$id);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Page deleted successfully on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_productslist&err=Property deleted successfully");

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

			$callConfig->headerRedirect("index.php?option=com_productslist_insert&head=b&id=".$prod_id);

	}
   
	

}

?>