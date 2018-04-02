<?php 
ob_start();
session_start();
print_r($_SESSION);
include('includes/config.php');
include ('model/frontend.class.php');
include ('model/frontusers.class.php');
$exbitionObj= new frontendClass();
$cartdata=$exbitionObj->getallTempCart();
?>
<b>Thanks you for your order through MKL .We will process your order very soon.</b>
<?php

if($_REQUEST['st']=="Completed")
{
	//echo "dsgdsgds"; exit;
	  $var_temp_session= $_SESSION['CART_TEMP_RANDOM'];
	  $qq="Select * from tb_cart where temprandid='".$var_temp_session."'";
	 $query=mysql_query($qq);
	 
	$qq="select * from tb_registration where reg_id='".$_SESSION['log_userid']."'";
	$qq_res=mysql_query($qq);
	$qq_fetch=mysql_fetch_array($qq_res);
	$qq_fetch['u_name'];
	$Email=$qq_fetch['email'];
	 //query_res=mysql_fetch_array($query);
	 //print_r($query_res);
	// exit;
	$to=$Email;
					$subject = 'Order Confirmation';
					$message = "
					<html>
					<head>
					<title></title>
					<style>                 
					.textbold 
					{
					color:#000000;
					}
					</style>
					</head>
					<body>
					<table cellspacing='0' cellpadding='5'  align='center' width='100%' border='0' style='border:1px solid #CCCCCC; border-collapse:collapse'>
					<tr>
					  <td  colspan='2' align='left' valign='top'><img src='http://mklpop.com/images/MKL_Logo_01.png' ></td>
  </tr>
					<tr>
					<td  colspan='2' align='left' valign='top'>Dear<strong> ".$qq_fetch['u_name'].",</strong></td>
  </tr>
					<tr>
					<td valign='top' colspan='2' align='left'><strong>Your Confirmed Order Details are Placed Below</strong> </td>
					</tr>
					<tr>
								<td valign='top' colspan='2' align='left'>
								<strong>Order date:</strong> ".date("d/m/Y", strtotime($qq_fetch['posted_date']))." (DD/MM/YYYY) <br>
								<strong>Order number:</strong> ".$_REQUEST['tx']." <br><br>
								
								<strong>Billing Address:</strong><br>
								<strong>Address:</strong> ".$qq_fetch['address']."<br>
								<strong>City:</strong> ".$qq_fetch['city']."<br>
								<strong>State:</strong> ".$qq_fetch['state']."<br>
								<strong>Country:</strong> ".$qq_fetch['country']."<br>
								<strong>Zip Code:</strong> ".$qq_fetch['zip_code']."<br>
								<strong>Billing Phone:</strong> ".$qq_fetch['phone_no']."<br>
								<strong>Billing Email:</strong> ".$qq_fetch['email']."<br><br>
								
								<strong>Shipping Address:</strong><br>
								<strong>Address:</strong> ".$qq_fetch['sh_address']."<br>
								<strong>City:</strong> ".$qq_fetch['sh_city']."<br>
								<strong>State:</strong> ".$qq_fetch['sh_state']."<br>
								<strong>Country:</strong> ".$qq_fetch['sh_country']."<br>
								<strong>Zip Code:</strong> ".$qq_fetch['sh_zip_code']." <br></td>
					</tr>
					
					<tr>
					  <td valign='top' colspan='2' align='left'>&nbsp;</td>
  </tr>
					
					<tr>
					<td valign='top' colspan='2' align='center'><table width='95%' border='0' cellspacing='2' cellpadding='2'><tr><td colspan='5'><table width='95%' border='0' cellspacing='0' cellpadding='3' style='border:1px solid #999999'>
                      <tr style='background: #eee;'>
                        <td width='104'><strong>Product Image</strong></td>
                        <td width='185'><strong>Product Name</strong></td>
                        <td width='163'><strong>Image Type</strong></td>
                        <td width='163'><strong>Quantity</strong></td>
                        <td width='101'><strong>Price</strong></td>
                        <td width='107'><strong>Total</strong></td>
                      </tr>
					  ";
					  while($query_res1=mysql_fetch_array($query))
						{
						
						$qq_res=mysql_query("select * from tb_stores where str_id='".$query_res1['prod_id']."'");
						$qq_img=mysql_fetch_array($qq_res);
					  $message .="
							  <tr>
								<td><img src='http://mklpop.com/uploads/stores/".$qq_img['pro_image1']."' width='110' height='80' ></td>
								<td>".$query_res1['prod_name']."</td>
								<td>".$query_res1['img_type']."</td>
								<td>".$query_res1['quantity']."</td>
								<td>$".$query_res1['indiv_price']."</td>
								<td>$".$query_res1['total_price']."</td>
							  </tr>
							  ";
					  
					  $total+=$query_res1['total_price'];
				  	  $sh_amt+=$query_res1['ship_price']*$query_res1['quantity'];
					  }
					  
					  $message .="
							  <tr>
							   <td colspan='4' >&nbsp;</td>
								<td colspan='2' align='center'><strong>Sub Total:&nbsp;$".$sub_total=number_format($total,2,'.','')."</strong></td>
							  </tr>
							  ";
					  $message .="
							  <tr>
							   <td colspan='4' >&nbsp;</td>
								<td colspan='2' align='center'><strong>Shipping Total:&nbsp;$".$ship_1_amount=number_format($sh_amt,2,'.','');
												echo   $G_total=$sub_total+$ship_1_amount."</strong></td>
							  </tr>
							  ";
					  $shptot = $shpamt + $total;
					  $message .="
							  <tr>
							  <td colspan='4' >&nbsp;</td>                
							  <td colspan='2' align='center' ><strong>Grand Total:&nbsp;$".number_format($G_total,2,'.','')."</strong></td>
							  </tr>
							  ";
					  $message .="
					  </table></td>
					  </tr></table></td>
					  </tr>
										<tr>
										  <td valign='top' colspan='2' align='left'>&nbsp;</td>
					  </tr>
										<tr>
										  <td valign='top' colspan='2' align='left'>&nbsp;</td>
					  </tr>
										<tr>
										  <td valign='top' colspan='2' align='left'>&nbsp;</td>
					  </tr>
										<tr>
										  <td valign='top' colspan='2' align='left'><p>Thank You</p>
										  <p>MKL Team</p></td>
					  </tr>
									</table>
				</body>
				</html>
					";
					//echo $message;
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: MKL<info@mkl.com>' . "\r\n";
			mail($to, $subject, $message, $headers); 	
	
	$qq_admin="Select * from tb_cart where temprandid='".$var_temp_session."'";
	 $query_admin=mysql_query($qq_admin);
	
	$qq_user_det="select * from tb_registration where reg_id='".$_SESSION['log_userid']."'";
	$qq_res_det=mysql_query($qq_user_det);
	$qq_fetch_det=mysql_fetch_array($qq_res_det);
	
			$to2='misskisslovegallery@gmail.com';
			$subject2 = 'Customer Order Information';
			$message2 = "
						<html>
						<head>
						<title></title>
						<style>                 
						.textbold 
						{
						color:#000000;
						}
						</style>
						</head>
						<body>
						<table cellspacing='0' cellpadding='5'  align='center' width='100%' border='0' style='border:1px solid #CCCCCC; border-collapse:collapse'>
								<tr>
								  <td  colspan='2' align='left' valign='top'><img src='http://mklpop.com/images/MKL_Logo_01.png' ></td>
			  </tr>
								<tr>
							<td  colspan='2' align='left' valign='top'>Dear<strong> Admin,</strong></td>
			  </tr>
								<tr>
								<td valign='top' colspan='2' align='left'><strong>Your Confirmed Order Details are Placed Below</strong> </td>
								</tr>
								<tr>
								<td valign='top' colspan='2' align='left'>
								<strong>Order date:</strong> ".date("d/m/Y", strtotime($qq_fetch_det['posted_date']))." (DD/MM/YYYY) <br>
								<strong>Order number:</strong> ".$_REQUEST['tx']." <br><br>
								
								<strong>Billing Address:</strong><br>
								<strong>Address:</strong> ".$qq_fetch_det['address']."<br>
								<strong>City:</strong> ".$qq_fetch_det['city']."<br>
								<strong>State:</strong> ".$qq_fetch_det['state']."<br>
								<strong>Country:</strong> ".$qq_fetch_det['country']."<br>
								<strong>Zip Code:</strong> ".$qq_fetch_det['zip_code']."<br>
								<strong>Billing Phone:</strong> ".$qq_fetch_det['phone_no']."<br>
								<strong>Billing Email:</strong> ".$qq_fetch_det['email']."<br><br>
								
								<strong>Shipping Address:</strong><br>
								<strong>Address:</strong> ".$qq_fetch_det['sh_address']."<br>
								<strong>City:</strong> ".$qq_fetch_det['sh_city']."<br>
								<strong>State:</strong> ".$qq_fetch_det['sh_state']."<br>
								<strong>Country:</strong> ".$qq_fetch_det['sh_country']."<br>
								<strong>Zip Code:</strong> ".$qq_fetch_det['sh_zip_code']." <br></td>
								</tr>
								<tr>
								  <td valign='top' colspan='2' align='left'>&nbsp;</td>
			  </tr>
								
								<tr>
								<td valign='top' colspan='2' align='center'><table width='95%' border='0' cellspacing='2' cellpadding='2'><tr><td colspan='5'><table width='95%' border='0' cellspacing='0' cellpadding='3' style='border:1px solid #999999'>
								  <tr style='background: #eee;'>
									<td width='104'><strong>Product Image</strong></td>
									<td width='185'><strong>Product Name</strong></td>
									<td width='163'><strong>Image Type</strong></td>
									<td width='163'><strong>Quantity</strong></td>
									<td width='101'><strong>Price</strong></td>
									<td width='107'><strong>Total</strong></td>
								  </tr>
								  ";
			  while($query_res2=mysql_fetch_array($query_admin))
			  {
			  //print_r($query_res2);
			 $qq_res1=mysql_query("select * from tb_stores where str_id='".$query_res2['prod_id']."'");
			 $qq_img1=mysql_fetch_array($qq_res1);
			  $message2 .="
					  <tr>
						<td><img src='http://mklpop.com/uploads/stores/".$qq_img1['pro_image1']."' width='110' height='80' ></td>
						<td>".$query_res2['prod_name']."</td>
						<td>".$query_res2['img_type']."</td>
						<td>".$query_res2['quantity']."</td>
						<td>$".$query_res2['indiv_price']."</td>
						<td>$".$query_res2['total_price']."</td>
					  </tr>
					  ";
			  
				 $total1+=$query_res2['total_price'];
				$sh_amt1+=$query_res2['ship_price']*$query_res2['quantity'];
			  }
			  
			  $message2 .="
					  <tr>
					   <td colspan='4' >&nbsp;</td>
						<td colspan='2' align='center'><strong>Sub Total:&nbsp;$".$sub_total1=number_format($total1,2,'.','')."</strong></td>
					  </tr>
					  ";
			  $message2 .="
					  <tr>
					   <td colspan='4' >&nbsp;</td>
						<td colspan='2' align='center'><strong>Shipping Total:&nbsp;$".$ship_1_amount1=number_format($sh_amt1,2,'.','');
										  $G_total1=$sub_total1+$ship_1_amount1."</strong></td>
					  </tr>
					  ";
			  $shptot1 = $shpamt1 + $total1;
			  $message2 .="
						  <tr>
						  <td colspan='4' >&nbsp;</td>                
						  <td colspan='2' align='center' ><strong>Grand Total:&nbsp;$".number_format($G_total1,2,'.','')."</strong></td>
						  </tr>
						  ";
			  $message2 .="
						  </table></td>
						  </tr></table></td>
						  </tr>
											<tr>
											  <td valign='top' colspan='2' align='left'>&nbsp;</td>
						  </tr>
											<tr>
											  <td valign='top' colspan='2' align='left'>&nbsp;</td>
						  </tr>
											<tr>
											  <td valign='top' colspan='2' align='left'>&nbsp;</td>
						  </tr>
											<tr>
											  <td valign='top' colspan='2' align='left'><p>Thank You</p>
											  <p>MKL Team</p></td>
						  </tr>
										</table>
									";
	//echo $message2; 
			$headers2  = 'MIME-Version: 1.0' . "\r\n";
		
			$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers2 .= 'From: MKL <info@mkl.com>' . "\r\n";
			mail($to2, $subject2, $message2, $headers2);
		
		
		
		$qq_insert5="Select * from tb_cart where temprandid='".$var_temp_session."'";
	 	$query_insert5=mysql_query($qq_insert5);
		$query_res5=mysql_fetch_array($query_insert5);
		$query_checkout5="insert into tb_transcation(tx_no,reg_id,item_id,item,price,quantity,img_type,total_price,status,posted_date)values('".$_REQUEST['tx']."','".$_SESSION['log_userid']."','".$query_res5['prod_id']."','".$query_res5['prod_name']."','".$query_res5['indiv_price']."','".$query_res5['quantity']."','".$query_res5['img_type']."','".$_SESSION['$total_price']."','Pending',now())";
		$query_checkout_res5=mysql_query($query_checkout5);
		 $query_checkout_res5_id=mysql_insert_id();
		
		
		$qq_insert="Select * from tb_cart where temprandid='".$var_temp_session."'";
	 $query_insert=mysql_query($qq_insert);
			while($query_res3=mysql_fetch_array($query_insert))
			{
			//print_r($query_res3);exit;
				$query_checkout="insert into tb_orderdetails(reg_id,cart_cid,tx_id,transaction_id,prod_id,prod_name,quantity,img_type,inv_price,shipp_amt,total_price,status,posted_date)values('".$_SESSION['log_userid']."','".$query_res3['cart_id']."','".$query_checkout_res5_id."','".$_REQUEST['tx']."','".$query_res3['prod_id']."','".$query_res3['prod_name']."','".$query_res3['quantity']."','".$query_res3['img_type']."','".$query_res3['indiv_price']."','".$query_res3['ship_price']."','".$_SESSION['$total_price']."','Pending',now())";
				//$query_checkout_res=mysql_query($query_checkout);
				//echo $query_res3['img_type'];
				if($query_res3['img_type']=="duplicate")
				{
				//echo "enter";exit;
					$qq_quantity="Select * from tb_stores where str_id='".$query_res3['prod_id']."'";
	 				$query_quantity=mysql_query($qq_quantity);
					$query__fetch_quantity=mysql_fetch_array($query_quantity);
					$dup_count=$query__fetch_quantity['dup_quantity'];
					$dup=$dup_count-1;
					$product_upadte="update tb_stores SET dup_quantity='".$dup."' where str_id=".$query_res3['prod_id']."";
					$product_update_res=mysql_query($product_upadte);
				}
				else
				{
					$qq_quantity1="Select * from tb_stores where str_id='".$query_res3['prod_id']."'";
	 				$query_quantity1=mysql_query($qq_quantity1);
					$query__fetch_quantity1=mysql_fetch_array($query_quantity1);
					$dup_count1=$query__fetch_quantity1['dup_quantity'];
					$dup1=$dup_count1-1;
					$product_upadte1="update tb_stores SET original_quantity='".$dup1."'  where str_id=".$query_res3['prod_id']."";
					$product_update_res1=mysql_query($product_upadte1);
				}
			}
	//exit;
			header("location:thanku.php");	
}
else
{
			header("location:transaction_fail.php");
}
?>