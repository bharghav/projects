<?php

class commonClass
{

	
	
	function getcontentpages($id){      /*-----get content pages with title_slug-----*/
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_CONTENTPAGES,'*',"title_slug='".$id."' and status='Active'",$order,$start,$limit);
		return $callConfig->getRow($query);
	}
	
	
	function getcontentpagesid($id){      /*-----get content pages with id-----*/
	global $callConfig;
	 $query=$callConfig->selectQuery(TPREFIX.TBL_CONTENTPAGES,'*',"page_id='".$id."' and status='Active'",$order,$start,$limit);
	return $callConfig->getRow($query);
	}

	function getAllcontentpages($id){      /*-----get content pages with id-----*/
	global $callConfig;
	 $query=$callConfig->selectQuery(TPREFIX.TBL_CONTENTPAGES,'*'," status='Active'",$order,$start,$limit);
	return $callConfig->getAllRows($query);
	}

	function getlimitCategory($limit,$order){      /*-----get content pages with id-----*/
	global $callConfig;

	 $query=$callConfig->selectQuery(TPREFIX.TBL_CATEGORY,'*'," status='Active'",$order,$start,$limit);
	return $callConfig->getAllRows($query);
	}

	function getCelCategoryID($cid,$limit,$order){      /*-----get content pages with id-----*/
	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTS,'*'," cat_id ='".$cid."' and status='Active'",$order,$start,$limit);
	return $callConfig->getAllRows($query);
	}

	function getlatestProviders($limit,$order){      /*-----get content pages with id-----*/
	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_PROVIDERS,'*'," status='Active'",$order,$start,$limit);
	return $callConfig->getAllRows($query);
	}

	function insertProviders($post) {
	
	global $callConfig;
	//print_r($post);
	$string = rtrim(implode(',', $post['location']), ',');
	$Insstring = rtrim(implode(',', $post['insurance']), ',');
 	//echo $string;exit;
	$fieldnames=array('name'=>$post['username'],
				  'Email'=> $post['email'],
			      'Phone'=> $post['phone'],
			      'website'=> $post['website'],
			      'location'=> $string,
			      'speciality'=> $post['speciality'],
			      'provider_cat'=> $post['pcategory'],
			      'service_locations'=> $post['slocation'],
			      'ages_served'=> $post['ageserved'],
			      'languages'=> $post['language'],
			      'insurance_accepted'=> $Insstring,
			      'regional_fund'=> $post['rfunding'],
			      'fb_URL'=> $post['fbUrl'],
			      'link_URL'=> $post['liUrl'],
			      'google_URL'=> $post['googlePUrl'],
			      'Inst_URL'=> $post['igUrl'],
			      'description'=> $post['address']);
	$res1=$callConfig->insertRecord(TPREFIX.TBL_PROVIDERS,$fieldnames);
	if($res1>0)
	header("location:index.php?msg=success");
	else
	header("location:index.php?msg=failed");
	}


	function getSeacrhData($name,$loc,$ser){      /*-----get content pages with id-----*/
	global $callConfig;
	if(!empty($name) && isset($name))
	{
		$res = "name LIKE '%".$name."%'";
	}
	elseif(!empty($loc) && isset($loc))
	{
		$res = "location LIKE '%".$loc."%'";
	}
	elseif(!empty($ser) && isset($ser))
	{
		$res = "service_locations LIKE '%".$ser."%'";
	}
	$query=$callConfig->selectQuery(TPREFIX.TBL_PROVIDERS,'*',"$res and status='Active'",$order,$start,$limit);
	return $callConfig->getAllRows($query);
	}

	function getProvider($id){      /*-----get content pages with id-----*/
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_PROVIDERS,'*'," id ='".$id."' and status='Active'",$order,$start,$limit);
	return $callConfig->getAllRows($query);
	}










	function getProdData($pid){      /*-----get content pages with id-----*/
	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTS,'*'," id ='".$pid."' and status='Active'",$order,$start,$limit);
	return $callConfig->getRow($query);
	}

	function getsimlarProducts($pid,$caid){      /*-----get content pages with id-----*/
	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTS,'*',"cat_id ='".$caid."' and id !='".$pid."' and status='Active'",$order,$start,$limit);
	return $callConfig->getAllRows($query);
	}





	function insertaddress($post)
	{
		global $callConfig;
	  
		if($post['check']=='different')
		{
			$filednames1=array(
			'userid'=>$_SESSION['cspuser_id'],
			'tempid'=>$_SESSION['CART_TEMP_RANDOM'],
			'bfirst'=>$post['bfirst'],
			'blast'=>$post['blast'],
			'bcompany'=>$post['bcname'],
			'badd1'=>$post['badd1'],
			'badd2'=>$post['badd2'],
			'bcity'=>$post['bcity'],
			'bstate'=>$post['bstate'],
			'bzip'=>$post['bzip'],
			'bcountry'=>$post['delivery_country'],
			'bphone'=>$post['bphone'],
			'bemail'=>$post['bemail'],
			'sfirst'=>$post['sfirst'],
			'slast'=>$post['slast'],
			'scompany'=>$post['scname'],
			'sadd1'=>$post['sadd1'],
			'sadd2'=>$post['sadd2'],
			'scity'=>$post['scity'],
			'sstate'=>$post['sstate'],
			'szip'=>$post['szip'],
			'scountry'=>$post['delivery_country1'],
			'sphone'=>$post['sphone'],
			'semail'=>$post['semail']
			);
		}
		else
		{	
			$filednames1=array(
			'userid'=>$_SESSION['cspuser_id'],
			'tempid'=>$_SESSION['CART_TEMP_RANDOM'],
			'bfirst'=>$post['bfirst'],
			'blast'=>$post['blast'],
			'bcompany'=>$post['bcname'],
			'badd1'=>$post['badd1'],
			'badd2'=>$post['badd2'],
			'bcity'=>$post['bcity'],
			'bstate'=>$post['bstate'],
			'bzip'=>$post['bzip'],
			'bcountry'=>$post['delivery_country'],
			'bphone'=>$post['bphone'],
			'bemail'=>$post['bemail'],
			'sfirst'=>$post['bfirst'],
			'slast'=>$post['blast'],
			'scompany'=>$post['bcname'],
			'sadd1'=>$post['badd1'],
			'sadd2'=>$post['badd2'],
			'scity'=>$post['bcity'],
			'sstate'=>$post['bstate'],
			'szip'=>$post['bzip'],
			'scountry'=>$post['delivery_country1'],
			'sphone'=>$post['bphone'],
			'semail'=>$post['bemail']
			);
		}
		
		$_SESSION['firstname']=$filednames1['sfirst'];
		$_SESSION['lastname']=$filednames1['slast'];
		
		//print_r($filednames1);exit;
		
		$res1=$callConfig->insertRecord(TPREFIX.TBL_CHECKOUT,$filednames1);
		
		$_SESSION['checkout_id']=$res1;
		//echo $res1;exit;
		
		header("location:cardpayment.php");
	}
	function getAddress($id)
	{
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_CHECKOUT,'*',"tempid='".$id."'",'id Desc','','');		
		return $callConfig->getAllRows($query);
	}
	
	function getwishlist($id)
	{
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_CART,'*',"userid='".$id."' and addwhislist!=' '",'id Desc','','');		
		return $callConfig->getAllRows($query);
	}
	
	function deletewishlist($id)
	{
		global $callConfig;
		$fieldnames3=array('userid'=>'','addwhislist'=>'');
		$callConfig->updateRecord(TPREFIX.TBL_CART,$fieldnames3,'id',$id);
		header("location:wishlist.php?msg=sucess");
	}


	
	
	function insercarddetails($post) {
	
	global $callConfig;
	
	$var_temp_session= $_SESSION['CART_TEMP_RANDOM'];

	$query=$callConfig->selectQuery(TPREFIX.TBL_CART,'*',"temprandid='".$var_temp_session."'",'','','');

	$resitems=$callConfig->getAllRows($query);
	
	$lastdata="SELECT * FROM tb_orders ORDER BY id DESC LIMIT 1 ";
	$reata=mysql_query($lastdata);
	$k=100000;	
	
	$row = mysql_fetch_assoc($reata);
	
	$final=$row['orderid']+1;
	
	foreach($resitems as $items) {
	
	$fieldnames=array('pro_name'=>$items->productname,'orderid'=>$final,'skuid'=>$items->prductskuid,'prdctimage'=>$items->prdctimage,'qtypills'=>$items->qtypills,'quantygrams'=>$items->quantygrams,'transactionid'=>$_SESSION['CART_TEMP_RANDOM'],'pillquantity'=>$items->quantity,'dateon'=>date('Y-m-d'),'distype'=>$items->distype,'discount'=>$items->discount,'totalprice'=>$post['finalprice'],'eachpill'=>$items->eachpill,'price'=>$items->eachpacket,'status'=>'Newordered','cust_id'=>$_SESSION['firstname'].' '.$_SESSION['lastname'],'checkout_id'=>$_SESSION['checkout_id'],'customerid'=>$_SESSION['cspuser_id']);
	//print_r($fieldnames);
	$res1=$callConfig->insertRecord(TPREFIX.TBL_ORDERS,$fieldnames);
	
	$k++;
	} 
	
	
	$fieldnames=array('cardname'=>$post['cardname'],'card_type'=>$post['card_type'],'cardnumber'=>$post['cardnumber'],'exp_month'=>$post['exp_month'],'exp_year'=>$post['exp_year'],'cvvnumber'=>$post['cvvnumber'],'temprand'=>$post['temprand'],'discount_type'=>$post['discount_type'],'couponamount'=>$post['couponamount'],'finalprice'=>$post['finalprice']);
	
	$res1=$callConfig->insertRecord(TPREFIX.TBL_CARDUSERS,$fieldnames);
	header("location:thankyou.php?msg=sucess");
	
	}

	function inserauctiondetails($post) {
	
	global $callConfig;
	
	/*$var_temp_session= $_SESSION['CART_TEMP_RANDOM'];

	$query=$callConfig->selectQuery(TPREFIX.TBL_CART,'*',"temprandid='".$var_temp_session."'",'','','');

	$resitems=$callConfig->getAllRows($query);*/
	
	/*$lastdata="SELECT * FROM tb_orders ORDER BY id DESC LIMIT 1 ";
	$reata=mysql_query($lastdata);
	$k=100000;	
	
	$row = mysql_fetch_assoc($reata);
	
	$final=$row['orderid']+1;*/
	
	//foreach($resitems as $items) {
	$randomno = mt_rand();
	$date_tody = date("Y-m-d");
	$ordered_id = date("Ymd");
	$ord_id = $ordered_id+$randomno;
	$priceval = number_format($post['bid'],2);
	
	$fieldnames=array('productname'=>$post['name'],'productskuid'=>$post['SKUid'],'price'=>$post['price'],'quantity'=>$post['multipleofbid'],'status'=>'Success','payment_status'=>'New Order','prdct_id'=>$post['prdct_id'],'userid'=>$post['user_id'],'ordered_date'=>$date_tody,'orderid'=>$ord_id,'totalprice'=>$priceval);
	$res1=$callConfig->insertRecord(TPREFIX.TBL_ORDERS,$fieldnames);

	header("location:".SITEURL."/../pratyusha/productview/".$post['prdct_id']."&success");
	
	}

	function insertAuctionBidRegistration($post) {
	
	global $callConfig;
	
	$randomno = mt_rand();
	$date_tody = date("Y-m-d");
	$ordered_id = date("Ymd");
	$ord_id = $ordered_id+$randomno;
	//$priceval = number_format($post['bid'],2);
	
	$fieldnames=array('firstname'=>$post['name'],'email'=>$post['email'],'password'=>$callConfig->passwordEncrypt($post['password']),'createdon'=>$date_tody,'status'=>'Active','registerID'=>$ord_id);


	$res1=$callConfig->insertRecord(TPREFIX.TBL_USERS,$fieldnames);

	header("location:".SITEURL."/../pratyusha/productview/".$post['pid']."&regsuccess");
	
	}

function checkUserLogin()
 {
    global $callConfig;
$where="username='".$_POST['uname']."' and password='".$callConfig->passwordEncrypt($_POST['key'])."' and status='Active'";
 echo $query=$callConfig->selectQuery(TPREFIX.TBL_USERS,'*',$where,'','',''); 
	$row=$callConfig->getRow($query);
	
	if($row->id!="")
	{
	$_SESSION['userid']=$row->id;
	$_SESSION['user_name']=$row->username;
	//print_r($_SESSION);exit;
	//sitesettingsClass::recentActivities($_SESSION['fuser_name'].' > login sucessfully on > '.DATE_TIME_FORMAT.'','g');
	header("location:index.php?loginsuccess");
	}
	else
	{
	header("location:login.php?loginfail");
	exit;
	}
 } 

 	function deleteProviderlist($id)
	{
		global $callConfig;
		$res=$callConfig->deleteRecord(TPREFIX.TBL_PROVIDERS,'id',$id);
		header("location:index.php?delmsg=success");
	}

    function updatedReviewComment($pid)
	{
	global $callConfig;
	$date_now=date('Y-m-d h:m:s');
	
	$rating_review_val=$_POST['rating_popup'.$_POST['pr_id']];

	$fieldnames=array('rating'=>$rating_review_val,'review_comment'=>$_POST['review_comment']);
	
	$fieldnames_review=array('rev_comment'=>$_POST['review_comment'],'rev_rating'=>$rating_review_val,'pr_id'=>$_POST['pr_id'],'us_id'=>$_POST['us_id'],'log'=>$date_now);
	$res=$callConfig->updateRecord(TPREFIX.TBL_PROVIDERS,$fieldnames,'id',$pid);
	$res_logs=$callConfig->insertRecord(TPREFIX.TBL_REVIEW_LOGS,$fieldnames_review);
	if($res!="")
	{
		//sitesettingsClass::recentActivities('Register user created successfully on > '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?rewmsg=review updated successfully");
	}
	else
	{
		//sitesettingsClass::recentActivities('Admin User creation failed on > '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("login.php?rewmsg=review updated creation failed");
	}
	}

	function getreviewlogslist($id,$pr_id)
	{
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_REVIEW_LOGS,'*',"us_id='".$id."' and pr_id='".$pr_id."'",'rid Desc','','');		
		return $callConfig->getAllRows($query);
	}


	function forgotpassword($post)
    {
	//print_r($post); exit;
	global $callConfig;
	//if($_POST['forgot_email']!="" )
	//{
		
		$where="email='".$post['email']."' ";
		$query=$callConfig->selectQuery(TPREFIX.TBL_USERS,'*',$where,'','','');
		//echo $query; exit;
		$row=$callConfig->getRow($query);
		$pwd=$callConfig->passwordDecrypt($row->password);
		//echo $pwd;
		if($row)
		{
			$to=$_POST['email'];
			$subject="We4Austism | Forgot password Info";
			$message="<table cellspacing='0' cellpadding='5'  align='center' width='100%' border='0' style='border:1px solid #CCCCCC; border-collapse:collapse; 	font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;'>
			  <tr>
			  <td colspan='2' align='left' valign='top' style='background-color:#230b03'>WE 4 Autism</td>
		
			  </tr>
						  <td width='15%' height='23' align='left' valign='middle' colspan=2 ><strong>User Details</strong></td>
						</tr>
						<tr>
						  <td width='15%' height='23' align='left' valign='middle'><strong> Email:</strong></td>
						  <td width='32%' height='23' align='left' valign='middle'>".$post['email']."</td>
						</tr>
						
						<tr>
						  <td width='15%' height='23' align='left' valign='middle'><strong> Password:</strong></td>
						  <td width='32%' height='23' align='left' valign='middle'>".$pwd."</td>
						</tr>
									
						</table></td>
				  </tr>
				  <tr>
					<td valign='top' colspan='2' align='left'>&nbsp;</td>
				  </tr>
				  <tr>
					<td valign='top' colspan='2' align='left'>&nbsp;</td>
				  </tr>
				 
				  <tr>
					<td valign='top' colspan='2' align='left'>Thank You<br />
					</tr>
					<tr>
					<td valign='top' colspan='2' align='left'>We4Austism</td>
				  </tr>
				</table>";
		//echo $message; exit;
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers.= 'From:We4Austism <info@we4autism.com>' . "\r\n";	
	
			$ok = mail($to, $subject, $message, $headers);
			if($ok)
			{
				$callConfig->headerRedirect("forgotpassword.php?forgmsg=Forgotpassword Sent successfully");
			}
			else
			{
				$callConfig->headerRedirect("forgotpassword.php?forfmsg=Forgotpassword Sent failed");
			}
		}
	
	}

   function insertUsers($post)
	{
	global $callConfig;
	$fieldnames=array('username'=>$post['uname'],'email'=>$post['email'],'`password`'=>$callConfig->passwordEncrypt($post['password']),
		'zip_code'=>$post['zip_code'],'nochild'=>$post['nochild'],'agegroup'=>$post['agegroup'],'viaemail'=>$post['viaemail'],'listzip'=>$post['listzip'],'status'=>"Active");
	
	$res=$callConfig->insertRecord(TPREFIX.TBL_USERS,$fieldnames);
	if($res!="")
	{
		$to=$_POST['email'];
		$subject="We4Austism | Registration Details";
		$message="<table cellspacing='0' cellpadding='5'  align='center' width='100%' border='0' style='border:1px solid #CCCCCC; border-collapse:collapse; 	font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;'>
			  <tr>
			  <td colspan='2' align='left' valign='top' style='background-color:#230b03'>WE 4 Autism</td>
		
			  </tr>
						  <td width='15%' height='23' align='left' valign='middle' colspan=2 ><strong>Login Details</strong></td>
						</tr>
						<tr>
						  <td width='15%' height='23' align='left' valign='middle'><strong> Email:</strong></td>
						  <td width='32%' height='23' align='left' valign='middle'>".$post['email']."</td>
						</tr>
						
						<tr>
						  <td width='15%' height='23' align='left' valign='middle'><strong> Password:</strong></td>
						  <td width='32%' height='23' align='left' valign='middle'>".$post['password']."</td>
						</tr>
									
						</table></td>
				  </tr>
				  <tr>
					<td valign='top' colspan='2' align='left'>&nbsp;</td>
				  </tr>
				  <tr>
					<td valign='top' colspan='2' align='left'>&nbsp;</td>
				  </tr>
				 
				  <tr>
					<td valign='top' colspan='2' align='left'>Thank You<br />
					</tr>
					<tr>
					<td valign='top' colspan='2' align='left'>We4Austism</td>
				  </tr>
				</table>";
		//echo $message; exit;
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers.= 'From:We4Austism <info@we4autism.com>' . "\r\n";	
	
		mail($to, $subject, $message, $headers);
		//sitesettingsClass::recentActivities('Register user created successfully on > '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("login.php?regmsg=Register user created successfully");
	}
	else
	{
		//sitesettingsClass::recentActivities('Admin User creation failed on > '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("login.php?regmsg=Register user creation failed");
	}
	}

  function highestauctionbid($post)   /*-----User Register Function with mail also-----*/
  {
	global $callConfig;
	
	echo "ffff";exit;
	/*$fieldnames=array('email_address'=>$post['email']);
	$query=$callConfig->selectQuery(TPREFIX.TBL_CUSTOMERS,'email_address',"email_address='".$post['email']."'",'','',''); 
	$resscnt=$callConfig->getCount($query);
	
	if($resscnt>0)
	{		
	$callConfig->headerRedirect("newregister.php?err=User with this Email-id Already Registered");
	
	}
	else 
	{
	
	$userimage = $callConfig->freeimageUploadcomncode("user",'image',"uploads/user/","uploads/user/thumbs/",$post['hdn_image'],'','');
	
	$filednames1=array('customername'=>$post['firstname'],'lastname'=>$post['lastname'],'email_address'=>$post['email'],'password'=>$callConfig->passwordEncrypt($post['password']),'city'=>$post['city'],'state'=>$post['state'],'country'=>$post['country'],'address'=>$post['address'],'company'=>$post['company'],'zipcode'=>$post['zip'],'phone'=>$post['phone'],'status'=>'Active');
	//echo "<pre>";
	//print_r($filednames1);
	
	$res1=$callConfig->insertRecord(TPREFIX.TBL_CUSTOMERS,$filednames1);	//exit;
	if($res1!='') 
	{*/	  
		$to=$_POST['email'];
		$subject="Cheap Sleeping Pills | Registration Details";
		$message="<table cellspacing='0' cellpadding='5'  align='center' width='100%' border='0' style='border:1px solid #CCCCCC; border-collapse:collapse; 	font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;'>
			  <tr>
			  <td colspan='2' align='left' valign='top' style='background-color:#230b03'><img src='".SITEURL."/images/site_log_15.png' width='180' height='55'/></td>
		
			  </tr>
						  <td width='15%' height='23' align='left' valign='middle' colspan=2 ><strong>Login Details</strong></td>
						</tr>
						<tr>
						  <td width='15%' height='23' align='left' valign='middle'><strong> Email:</strong></td>
						  <td width='32%' height='23' align='left' valign='middle'>".$post['email']."</td>
						</tr>
						
						<tr>
						  <td width='15%' height='23' align='left' valign='middle'><strong> Password:</strong></td>
						  <td width='32%' height='23' align='left' valign='middle'>".$post['password']."</td>
						</tr>
						
						<tr>
						  <td width='15%' height='23' align='left' valign='middle'><strong> Address:</strong></td>
						  <td width='32%' height='23' align='left' valign='middle'>".$post['address']."</td>
						</tr>
						
						<tr>
						  <td width='15%' height='23' align='left' valign='middle'><strong> Phone:</strong></td>
						  <td width='32%' height='23' align='left' valign='middle'>".$post['phone']."</td>
						</tr>
						
												
						</table></td>
					  
				  </tr>
				  <tr>
					<td valign='top' colspan='2' align='left'>&nbsp;</td>
				  </tr>
				  <tr>
					<td valign='top' colspan='2' align='left'>&nbsp;</td>
				  </tr>
				 
				  <tr>
					<td valign='top' colspan='2' align='left'>Thank You<br />
					</tr>
					<tr>
					<td valign='top' colspan='2' align='left'>CheapSleepingPills</td>
				  </tr>
				</table>";
	//echo $message; exit;
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers.= 'From:Cheapsleepingpills <info@cheapsleepingpills.com>' . "\r\n";	
	
	if(mail($to, $subject, $message, $headers))
	{
			
			/*if($_SESSION['frm']!='')
			{
				commonClass::checklogin($post);					
			?>	
				<script>
				window.location="<?php echo $passval?>.php";
				</script>
            <?php    
			}
			else
			{ ?>
				<script>
				window.location="index.php";
				</script>
			<?php
            }
		} 
		else 
		{ 
		?>
			<script>
            window.location="newregister.php?reg=failed";
            </script>			
		<?php	
		}	 */
  	}
 // }
	}
	
}
?>