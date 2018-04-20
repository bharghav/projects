<?php
class storeClass
{ 
	// store category //
	function getAllStoreCategoryList($parentid,$sortfield,$order,$start,$limit)
	{
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$whr=" status='Active'";
	if($parentid!="")
	$whr.=" and scid='".$parentid."'";
	$query=$callConfig->selectQuery(TPREFIX.TBL_CATALOGCATEGORY,'*',$whr,$order,$start,$limit);
	return $callConfig->getAllRows($query);
	} 
   // Featured and new arrival products
   function getAllSpcialProducts($whr,$start,$limit)
   {
	   	global $callConfig;
		$order = 'createdon DESC';
		if($whr != ""):
			$whr .= " && status = 'Active'";
		else:
			$whr = $whr;
		endif;
		$query = $callConfig->selectQuery(TPREFIX.TBL_STOREPRODUCTS,'*',$whr,$order,$start,$limit);
		return $callConfig->getAllRows($query);
		
   }
  
function addProductsToTempCart($post)
{
	//print_r($_POST);
	//echo $post['pro_type'];exit;
	global $callConfig;
	if($_SESSION['CART_TEMP_RANDOM'] == "") 
	{
		$_SESSION['CART_TEMP_RANDOM'] = rand(10, 10).sha1(crypt(time())).time();
	}
	if($post['pro_type']=="store")
	$queryprod=$callConfig->selectQuery(TPREFIX.TBL_CATALOGPRODUCTS,'scid,prodtitle',"spid='".$_POST['pro_id']."'",'','','');
	else
	$queryprod=$callConfig->selectQuery(TPREFIX.TBL_CATALOGPRODUCTS,'spid as scid,prodtitle',"spid='".$_POST['pro_id']."'",'','','');
	
	$proddata=$callConfig->getRow($queryprod);
	$query=$callConfig->selectQuery(TPREFIX.TBL_CART,'*',"prod_id='".$_POST['pro_id']."' and type='".$_POST['pro_type']."' and prod_size='".$_POST['pro_size']."' and temprandid ='".$_SESSION['CART_TEMP_RANDOM']."'",'','','');
	$res_cart=$callConfig->getRow($query);
	$res_cartcnt=$callConfig->getCount($query);
	
	$proqnty=$_POST['pro_quantity'];
	$actshpprice=$_POST['admin_shp_price'];
	/*if($_POST['shipadd']=='free')
	{
		$shipamt=($proqnty-1)*$actshpprice;
	}
	else
	{
		if($proqnty==1)
		$shipamt=35;
		if($proqnty>1)
		$shipamt=35;
		$proqntyafterone=($proqnty-1);
		$shipamt+=$proqntyafterone*$actshpprice;		
		
	}*/
	//echo $shipamt; exit;
	//echo $res_cartcnt;
	if($res_cartcnt>0)
	{
		$indivprodquantity=$res_cart->quantity; 
		$totalqua=$indivprodquantity+$post['pro_quantity'];
		$indivprodprice=$res_cart->indiv_price;
		$totalprice=$totalqua*$indivprodprice;
		//echo $post['pro_type'];exit;
		$fieldnames=array('quantity'=>$totalqua,'total_price'=>$totalprice,'temprandid'=>$_SESSION['CART_TEMP_RANDOM']); 
		$res=$callConfig->updateRecord(TPREFIX.TBL_CART,$fieldnames,'cart_id',$res_cart->cart_id);
	}
	else
	{
	    $totalprice=$post['pro_quantity']*$post['pro_price'];
		//echo $post['pro_type'];exit;
		$fieldnames=array('cart_cid'=>$proddata->scid,'prod_id'=>$post['pro_id'],'type'=>$post['pro_type'],'prod_name'=>$proddata->prodtitle,'prod_size'=>$post['pro_size'],'indiv_price'=>$post['pro_price'],'quantity'=>$post['pro_quantity'],'total_price'=>$totalprice,'shipadd'=>$shipamt,'shiptype'=>$post['shipadd'],'temprandid'=>$_SESSION['CART_TEMP_RANDOM']);
		$res=$callConfig->insertRecord(TPREFIX.TBL_CART,$fieldnames);
	}
	    if($res==1 || $res!="")
		{
			$callConfig->headerRedirect("onlinestorecart.php?err=s");
		}
		else
		{
			$callConfig->headerRedirect("onlinestorecart.php?ferr=f");
		}
		
} 


function getallTempCart($sortfield,$order,$start,$limit,$type)
{
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	/*if($type=='store')
	{
		echo $query=$callConfig->selectQuery_two(TPREFIX.TBL_CART.' c',TPREFIX.TBL_STOREPRODUCTS.' p','c.*','p.*',"c.temprandid='".$_SESSION['CART_TEMP_RANDOM']."' and c.type='".$type."' and p.spid=c.prod_id and c.quantity!=0",$order,$start,$limit);
		$result=$callConfig->getAllRows($query);
	}
	else
	{
		echo $query=$callConfig->selectQuery_two(TPREFIX.TBL_CART.' c',TPREFIX.TBL_STOREPRODUCTS.' p','c.*','p.*',"c.temprandid='".$_SESSION['CART_TEMP_RANDOM']."' and c.type='".$type."' and p.spid=c.prod_id and c.quantity!=0",$order,$start,$limit);
		$result=$callConfig->getAllRows($query);
	}*/
	
		$query=$callConfig->selectQuery_two(TPREFIX.TBL_CART.' c',TPREFIX.TBL_STOREPRODUCTS.' p','c.*','p.*',"c.temprandid='".$_SESSION['CART_TEMP_RANDOM']."' and c.type='store' and p.spid=c.prod_id and c.quantity!=0",$order,$start,$limit);
		$result=$callConfig->getAllRows($query);
	    $query2=$callConfig->selectQuery_two(TPREFIX.TBL_CART.' c',TPREFIX.TBL_CATALOGPRODUCTS.' p','c.*','p.*',"c.temprandid='".$_SESSION['CART_TEMP_RANDOM']."' and c.type='catalog' and p.spid=c.prod_id and c.quantity!=0",$order,$start,$limit);
		$result2=$callConfig->getAllRows($query2);
		
		$query3=$callConfig->selectQuery_two(TPREFIX.TBL_CART.' c',TPREFIX.TBL_OFFERPRODUCTS.' p','c.*','p.*',"c.temprandid='".$_SESSION['CART_TEMP_RANDOM']."' and c.type='offer' and p.spid=c.prod_id and c.quantity!=0",$order,$start,$limit);
		$result3=$callConfig->getAllRows($query3);
		
	return array_merge($result,$result2,$result3);
}

function getallTempCartGrandTotal()
{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_CART,'sum( `total_price` ) as totalsum'," temprandid='".$_SESSION['CART_TEMP_RANDOM']."' and quantity!=0",$order,$start,$limit);
	$res=$callConfig->getRow($query);
	return $res->totalsum;
}

function getallTempCartQuantityTotal()
{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_CART,'sum( `quantity` ) as totalsum'," temprandid='".$_SESSION['CART_TEMP_RANDOM']."' and quantity!=0",$order,$start,$limit);
	$res=$callConfig->getRow($query);
	return $res->totalsum;
}


function UpdateShipQuantity()
{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_CART,'sum( `shipadd` ) as totalsum'," temprandid='".$_SESSION['CART_TEMP_RANDOM']."' and quantity!=0",$order,$start,$limit);
	$res=$callConfig->getRow($query);
	return $res->totalsum;
}



function updateViewcartRecords()
{
	global $callConfig;
	
	$orgprice = $_POST['orgprice'];
	$currentquantity = $_POST['qua'];
	$shiptyp = $_POST['shiptyp'];
	$actshpprice = $_POST['admin_shp_price'];
	
	for($j = 0; $j < count($_POST['cartids']); $j++)
	{
			
		
		/*if($shiptyp[$j]=='free')
	    {
		 $shipamt=($currentquantity[$j]-1)*$actshpprice;
	    }
		else
		{
			if($currentquantity[$j]==1)
			$shipamt=35;
			if($currentquantity[$j]>1)
			$shipamt=35;
			$proqntyafterone=($currentquantity[$j]-1);
			$shipamt+=$proqntyafterone*$actshpprice;		
			
		}*/
		//echo $shipamt."<hr>"; 
		$totalprice = $currentquantity[$j] * $orgprice[$j];
		$fieldnames=array('total_price'=>$totalprice,'quantity'=>$currentquantity[$j],'shipadd'=>$shipamt);		
		$res=$callConfig->updateRecord(TPREFIX.TBL_CART,$fieldnames,'cart_id',$_POST['cartids'][$j]);
	}
}

function deleteCartRecords($cartid)
{
	global $callConfig;
	$res=$callConfig->deleteRecord(TPREFIX.TBL_CART,'cart_id',$cartid);
	/*if($res!="")
	{
		$callConfig->headerRedirect("mycart.php?msg=Items Deleted Successfully");
	}
	else
	{
		$callConfig->headerRedirect("mycart.php?msg=Items Deletion Failed");
	}*/
}

function deleteCartWasteSessionRecords()
{
	global $callConfig;
	$query="delete from ".TPREFIX.TBL_CART." where temprandid='".$_SESSION['CART_TEMP_RANDOM']."'";
	$str=$callConfig->executeQuery($query);
}

function finnalyDeleteAllcartdata()
{
	global $callConfig;
	$res=$callConfig->deleteRecord(TPREFIX.TBL_CART,'temprandid',$var_temp_session);
}


// Product store //
function getAllProductsList($searcword,$parentid,$offer,$sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$whr=" status='Active'";
	if($offer!="")
	$whr.=" and offer='".$offer."'";
	if($parentid!="")
	$whr.=" and scid='".$parentid."'";
	if($searcword!="")
	$whr.=" and ( prodtitle ".DB_LIKE." '%".$searcword."%' or bigtext ".DB_LIKE." '%".$searcword."%')";
	$query=$callConfig->selectQuery(TPREFIX.TBL_STOREPRODUCTS,'*',$whr,$order,$start,$limit);
	return $callConfig->getAllRows($query);
} 

function getAllProductsListCount($searcword,$parentid)
  {
	global $callConfig;
	$whr=" status='Active'";
	if($parentid!="")
	$whr.=" and scid='".$parentid."'";
	if($searcword!="")
	$whr.=" and ( prodtitle ".DB_LIKE." '%".$searcword."%' or bigtext ".DB_LIKE." '%".$searcword."%')";
	$query=$callConfig->selectQuery(TPREFIX.TBL_STOREPRODUCTS,'scid',$whr,'','','');    //echo $query; exit;
	return $callConfig->getCount($query);
} 
  
 
 function getAllBestSaleList($parentid,$offer,$sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$whr=" status='Active'";
	if($offer!="")
	$whr.=" and offer='".$offer."'";
	if($parentid!="")
	$whr.=" and scid='".$parentid."'";
	$whr.=" and bestsale='Yes'";
	 $query=$callConfig->selectQuery(TPREFIX.TBL_STOREPRODUCTS,'*',$whr,$order,$start,$limit);
	return $callConfig->getAllRows($query);
} 
 
  
/*  function getAll_Offer_ProductsList($sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$whr=" status='Active' and offer='yes'";
	$query=$callConfig->selectQuery(TPREFIX.TBL_STOREPRODUCTS,'*',$whr,$order,$start,$limit);
	return $callConfig->getAllRows($query);
  }*/
  
  
  
  function getAllCatalogProList($sortfield,$order,$start,$limit,$cid,$pid)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	if($pid!='')
	$whr="ccid=".$cid." and scid=".$pid;
	else
	$whr="";
	$query=$callConfig->selectQuery(TPREFIX.TBL_CATALOGPRODUCTS,'*',$whr." and status='Active'",$order,$start,$limit);
	echo $query; exit;
	return $callConfig->getAllRows($query);
  }
  function getAllCatalogProListCount($cid)
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_CATALOGPRODUCTS,'scid','','','','');
	return $callConfig->getCount($query);
  } 
  
  
   function getAllProductSizes($sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$query=$callConfig->selectQuery(TPREFIX.TBL_STORESIZES,'*','',$order,$start,$limit);
	return $callConfig->getAllRows($query);
  }
  
  // special case
	function getSingleProdIdProductData($parentid,$sortfield,$order,$start,$limit)
	{
		global $callConfig;
		if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
		$whr=" status='Active'";
		if($parentid!="")
		$whr.=" and scid='".$parentid."'";
		$query=$callConfig->selectQuery(TPREFIX.TBL_STOREPRODUCTS,'spid',$whr,$order,$start,$limit);
		$res=$callConfig->getRow($query);
		return $res->spid;
	}

 
	function getAllStoresubCategoryList($cat_id)
	{
	global $callConfig;
	if($cat_id != "")
		$whr="ccid=".$cat_id." && status='Active'";
	$order = 'catetitle ASC';
	$query=$callConfig->selectQuery(TPREFIX.TBL_CATALOGSUBCATEGORY,'*',$whr,$order,'','');
	return $callConfig->getAllRows($query);
	} 
	
	function getProducts_byCat($id,$type,$sortfield,$order,$start,$limit)
    {
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_CATALOGSUBCATEGORY,'*',"ccid=".$id,$order,$start,$limit);
		return $callConfig->getAllRows($query);
    }	
	 function getproducts_prodCount()
    {
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_CATALOGSUBCATEGORY,'*');
		return $callConfig->getCount($query);
    }
	
	
}	
	?>