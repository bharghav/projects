<?php

class priceClass

{ 



 function updateprice($post)

{

//( [type] => increase [category] => 5 [subcat] => 4 [price] => 10 [admininsert] => Update )	

	//print_r($post);exit;

	global $callConfig;

	

		if($post['category']!="" && $post['subcat']=="")

		{

		$whr="price!=0 and cat_id='".$post['category']."'";

		}

		elseif($post['subcat']!=""){

		$whr="price!=0 and sub_cat='".$post['subcat']."'";

		}

		else {

		$whr="price!=0";

		} 

	

	 $query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTS,'*',$whr,'','','');

	$table1=$callConfig->getAllRows($query);



	

	 $re = $_POST['price']; 

		 

	if($_POST['type']=='increase'){ 

	

	    //PRODUCT

		foreach($table1 as $table_1)

		{

	    $pp = $table_1->price;  

		$res = ($pp/100)*$re;

		$finl = $pp+$res;

		$fieldnames=array(

		'price'=>number_format($finl,2)

		);

		

		

		$res=$callConfig->updateRecord(TPREFIX.TBL_PRODUCTS,$fieldnames,'id',$table_1->id);  //All products update 	

		

				  

		  }

		sitesettingsClass::recentActivities("Updation Price successfully on >>".DATE_TIME_FORMAT.'','g');

		$callConfig->headerRedirect("index.php?option=com_price&ferr=Price updated successfully");

		

	

	}

	else

	{

		 //PRODUCT

		foreach($table1 as $table_1)

		{

	    $pp = $table_1->price;  

		$res = ($pp/100)*$re;

		$finl = $pp-$res;

		$fieldnames=array(

		'price'=>$finl,

		);

		$res=$callConfig->updateRecord(TPREFIX.TBL_PRODUCTS,$fieldnames,'id',$table_1->id); 

		}

		

		sitesettingsClass::recentActivities("Updation Price successfully on >>".DATE_TIME_FORMAT.'','g');

		$callConfig->headerRedirect("index.php?option=com_price&ferr=Price updated successfully");

	}

  

}



	

	



}	

	?>