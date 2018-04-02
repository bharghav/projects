<?php 
ob_start();
session_start();
include('dbconfig.php');
include('administrator/includes/dbconnection.php');

include ('model/store.class.php');
$frontUserOnlineStoreObj= new storeClass();

include ('model/contentpages.class.php');
$contentpageObj= new contentpagesClass();

$sitedata=$contentpageObj->getsitesettings();

/*print_r($_REQUEST);
print_r($_SESSION); exit;*/
?>
<?php /*?><b>Thanks you for your order through The Superteens .We will process your order very soon.</b><?php */?>
<?php
//$_REQUEST['tx']
//if($_REQUEST['st']=="Completed")
if($_REQUEST['txn_id']!="")
{
	$var_temp_session= $_SESSION['CART_TEMP_RANDOM'];
	
	$G_total=$frontUserOnlineStoreObj->getallTempCartGrandTotal();
	$totalitemscnt=$frontUserOnlineStoreObj->getallTempCartQuantityTotal();
	
	$query=$callConfig->selectQuery(TPREFIX.TBL_CART,'*',"temprandid='".$var_temp_session."'",'','','');
	$resitems=$callConfig->getAllRows($query);
	
	

	
	
	
	$query=$callConfig->selectQuery(TPREFIX.TBL_ADMIN,'*',"user_id='".$_SESSION['frnt_mid']."'",'','','');
	$userdata=$callConfig->getRow($query);
	
	$query_info=$callConfig->selectQuery(TPREFIX.TBL_ADMINSINFO,'*',"userid='".$_SESSION['frnt_mid']."'",'','','');
	$userdata_info=$callConfig->getRow($query_info);
	
	$username=$userdata->us_name;
	$to=$userdata->email; 
	
	$noitemstotal=$frontUserOnlineStoreObj->getallTempCartQuantityTotal(); 	
	$totalshiping=$noitemstotal*$sitedata->shippingamount;
	
	
	

		
	foreach($resitems as $res_cart)
	{
	$fieldnames=array('p_cid'=>$res_cart->cart_cid,'prod_id'=>$res_cart->prod_id,'prod_name'=>$res_cart->prod_name,'prod_size'=>$res_cart->prod_size,'indiv_price'=>$res_cart->indiv_price,'quantity'=>$res_cart->quantity,'total_price'=>$res_cart->total_price,'temprandid'=>$var_temp_session,'session_userid'=>$_SESSION['frnt_mid'],'tx_no'=>$_REQUEST['txn_id']);
	$res=$callConfig->insertRecord(TPREFIX.TBL_CART_ORDER,$fieldnames);
	}
	
	$fieldnames=array('tx_no'=>$_REQUEST['txn_id'],'reg_id'=>$_SESSION['frnt_mid'],'item'=>$totalitemscnt,'shiptotal'=>$totalshiping,'total_price'=>($totalshiping+$G_total),'rand_id'=>$var_temp_session,'status'=>'Arrived','s_firstname'=>$userdata_info->s_firstname, 's_lastname'=>$userdata_info->s_lastname, 's_country'=>$userdata_info->s_country, 's_state'=>$userdata_info->s_state, 's_address'=>$userdata_info->s_address, 's_city'=>$userdata_info->s_city, 's_zipcode'=>$userdata_info->s_zipcode, 's_fax'=>$userdata_info->s_fax, 's_phoneno'=>$userdata_info->s_phoneno);
	$res=$callConfig->insertRecord(TPREFIX.TBL_CART_TRANSACTION,$fieldnames);
	
		$query=$callConfig->selectQuery(TPREFIX.TBL_CART_TRANSACTION,'*',"tx_no='".$_REQUEST['txn_id']."'",'','','');
	$trasactiondetails=$callConfig->getRow($query);
	$subject = 'Order Confirmation';
$message="<table cellspacing='0' cellpadding='5'  align='center' width='100%' border='0' style='border:1px solid #CCCCCC; border-collapse:collapse; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;'>
  <tr>
    <td  colspan='2' align='left' valign='top'><img src='".SITEURL."/images/logo_03.png' width='284' height='140' ></td>
  </tr>
  <tr>
    <td  colspan='2' align='left' valign='top'>Dear<strong> ".$username.",</strong></td>
  </tr>
  <tr>
    <td valign='top' colspan='2' align='left'><strong>Your Confirmed Order Details are Placed Below</strong> </td>
  </tr>
  <tr>
    <td valign='top' colspan='2' align='left'><strong>Order date:</strong> ".date('d/m/Y')." (DD/MM/YYYY) </td>
  </tr>
  <tr>
    <td valign='top' colspan='2' align='left'><strong>Transaction ID:</strong> ".$_REQUEST['txn_id']." </td>
  </tr>
  <tr>
    <td valign='top' colspan='2' align='left'><table width='100%' border='1' cellspacing='0' cellpadding='0' style='border:1px solid #eeeeee; border-collapse:collapse;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;'>
        <tr>
          <td width='15%' height='25' align='left' valign='middle' bgcolor='#eeeeee'><strong>Billing Address:</strong></td>
          <td width='32%' height='25' align='left' valign='middle' bgcolor='#eeeeee'>&nbsp;</td>
          <td width='15%' height='25' align='left' valign='middle' bgcolor='#eeeeee'><strong>Shipping Address:</strong></td>
          <td width='38%' height='25' align='left' valign='middle' bgcolor='#eeeeee'>&nbsp;</td>
        </tr>
        <tr>
          <td height='23' align='left' valign='middle'><strong>Address:</strong></td>
          <td height='23' align='left' valign='middle'>$userdata_info->b_address</td>
          <td height='23' align='left' valign='middle'><strong>Address:</strong></td>
          <td height='23' align='left' valign='middle'>$trasactiondetails->s_address</td>
        </tr>
        <tr>
          <td height='23' align='left' valign='middle'><strong>City:</strong></td>
          <td height='23' align='left' valign='middle'>$userdata_info->b_city</td>
          <td height='23' align='left' valign='middle'><strong>City:</strong></td>
          <td height='23' align='left' valign='middle'>$trasactiondetails->s_city</td>
        </tr>
        <tr>
          <td height='23' align='left' valign='middle'><strong>State:</strong></td>
          <td height='23' align='left' valign='middle'>$userdata_info->b_state</td>
          <td height='23' align='left' valign='middle'><strong>State:</strong></td>
          <td height='23' align='left' valign='middle'>$trasactiondetails->s_state</td>
        </tr>
        <tr>
          <td height='23' align='left' valign='middle'><strong>Country:</strong></td>
          <td height='23' align='left' valign='middle'>$userdata_info->b_country</td>
          <td height='23' align='left' valign='middle'><strong>Country:</strong></td>
          <td height='23' align='left' valign='middle'>$trasactiondetails->s_country</td>
        </tr>
        <tr>
          <td height='23' align='left' valign='middle'><strong>Zip Code:</strong></td>
          <td height='23' align='left' valign='middle'>$userdata_info->b_zipcode</td>
          <td height='23' align='left' valign='middle'><strong>Zip Code:</strong></td>
          <td height='23' align='left' valign='middle'>$trasactiondetails->s_zipcode</td>
        </tr>
        <tr>
          <td height='23' align='left' valign='middle'><strong>Phone:</strong></td>
          <td height='23' align='left' valign='middle'>$userdata_info->b_phoneno</td>
          <td height='23' align='left' valign='middle'><strong>Phone:</strong></td>
          <td height='23' align='left' valign='middle'>$trasactiondetails->s_phoneno</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td valign='top' colspan='2' align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top' colspan='2' align='left'><table width='100%' border='1' cellspacing='0' cellpadding='3' style='border:1px solid #eeeeee; border-collapse:collapse;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;'>
        <tr>
          <td width='396' align='left' valign='middle'><strong>Product Name </strong></td>
          <td width='239' align='left' valign='middle'><strong>Quantity</strong></td>
          <td width='238' align='left' valign='middle'><strong>Price</strong></td>
          <td width='312' align='left' valign='middle'><strong>Total</strong></td>
        </tr>";
        foreach($resitems as $itemlist)
        {
        $message .="
        <tr>
          <td align='left' valign='middle'>".$itemlist->prod_name." (".$itemlist->prod_size.")</td>
          <td align='left' valign='middle'>".$itemlist->quantity."</td>
          <td align='left' valign='middle'>$".$itemlist->indiv_price."</td>
          <td align='left' valign='middle'>$".$itemlist->total_price."</td>
        </tr>";
        }
        $message .="
		 <tr>
          <td colspan='3' align='right' valign='middle' >&nbsp;</td>
          <td  align='left' valign='middle' ><strong>Shipping Rate :&nbsp;$".($totalshiping)."</strong></td>
        </tr>
        <tr>
          <td colspan='3' align='right' valign='middle' >&nbsp;</td>
          <td  align='left' valign='middle' ><strong>Grand Total:&nbsp;$".($totalshiping+$G_total)."</strong></td>
        </tr>
        ";
        $message .="
      </table></td>
  </tr>
  <tr>
    <td valign='top' colspan='2' align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top' colspan='2' align='left'>Thank You,<br />
      Support Team, The Superteens</td>
  </tr>
</table>";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: The Superteens<info@themedia3.com>' . "\r\n";
mail($to, $subject, $message, $headers);

//$to2="sirisha@themedia3.com";
$to2="sales@thesuperteens.com";
$subject2 = 'Customer Order Information';
$message2="<table cellspacing='0' cellpadding='5'  align='center' width='100%' border='0' style='border:1px solid #CCCCCC; border-collapse:collapse; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;'>
  <tr>
    <td  colspan='2' align='left' valign='top'><img src='".SITEURL."/images/logo_03.png' width='284' height='140' ></td>
  </tr>
  <tr>
    <td  colspan='2' align='left' valign='top'>Dear<strong> Administrator,</strong></td>
  </tr>
  <tr>
    <td valign='top' colspan='2' align='left'><strong>".$username." Confirmed Order Details are Placed Below</strong> </td>
  </tr>
  <tr>
    <td valign='top' colspan='2' align='left'><strong>Order date:</strong> ".date('d/m/Y')." (DD/MM/YYYY) </td>
  </tr>
  <tr>
    <td valign='top' colspan='2' align='left'><strong>Transaction ID:</strong> ".$_REQUEST['txn_id']." </td>
  </tr>
  <tr>
    <td valign='top' colspan='2' align='left'><table width='100%' border='1' cellspacing='0' cellpadding='0' style='border:1px solid #eeeeee; border-collapse:collapse;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;'>
        <tr>
          <td width='15%' height='25' align='left' valign='middle' bgcolor='#eeeeee'><strong>Billing Address:</strong></td>
          <td width='32%' height='25' align='left' valign='middle' bgcolor='#eeeeee'>&nbsp;</td>
          <td width='15%' height='25' align='left' valign='middle' bgcolor='#eeeeee'><strong>Shipping Address:</strong></td>
          <td width='38%' height='25' align='left' valign='middle' bgcolor='#eeeeee'>&nbsp;</td>
        </tr>
        <tr>
          <td height='23' align='left' valign='middle'><strong>Address:</strong></td>
          <td height='23' align='left' valign='middle'>$userdata_info->b_address</td>
          <td height='23' align='left' valign='middle'><strong>Address:</strong></td>
          <td height='23' align='left' valign='middle'>$trasactiondetails->s_address</td>
        </tr>
        <tr>
          <td height='23' align='left' valign='middle'><strong>City:</strong></td>
          <td height='23' align='left' valign='middle'>$userdata_info->b_city</td>
          <td height='23' align='left' valign='middle'><strong>City:</strong></td>
          <td height='23' align='left' valign='middle'>$trasactiondetails->s_city</td>
        </tr>
        <tr>
          <td height='23' align='left' valign='middle'><strong>State:</strong></td>
          <td height='23' align='left' valign='middle'>$userdata_info->b_state</td>
          <td height='23' align='left' valign='middle'><strong>State:</strong></td>
          <td height='23' align='left' valign='middle'>$trasactiondetails->s_state</td>
        </tr>
        <tr>
          <td height='23' align='left' valign='middle'><strong>Country:</strong></td>
          <td height='23' align='left' valign='middle'>$userdata_info->b_country</td>
          <td height='23' align='left' valign='middle'><strong>Country:</strong></td>
          <td height='23' align='left' valign='middle'>$trasactiondetails->s_country</td>
        </tr>
        <tr>
          <td height='23' align='left' valign='middle'><strong>Zip Code:</strong></td>
          <td height='23' align='left' valign='middle'>$userdata_info->b_zipcode</td>
          <td height='23' align='left' valign='middle'><strong>Zip Code:</strong></td>
          <td height='23' align='left' valign='middle'>$trasactiondetails->s_zipcode</td>
        </tr>
        <tr>
          <td height='23' align='left' valign='middle'><strong>Phone:</strong></td>
          <td height='23' align='left' valign='middle'>$userdata_info->b_phoneno</td>
          <td height='23' align='left' valign='middle'><strong>Phone:</strong></td>
          <td height='23' align='left' valign='middle'>$trasactiondetails->s_phoneno</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td valign='top' colspan='2' align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top' colspan='2' align='left'><table width='100%' border='1' cellspacing='0' cellpadding='3' style='border:1px solid #eeeeee; border-collapse:collapse;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;'>
        <tr>
          <td width='396' align='left' valign='middle'><strong>Product Name </strong></td>
          <td width='239' align='left' valign='middle'><strong>Quantity</strong></td>
          <td width='238' align='left' valign='middle'><strong>Price</strong></td>
          <td width='312' align='left' valign='middle'><strong>Total</strong></td>
        </tr>";
        foreach($resitems as $itemlist)
        {
        $message2 .="
        <tr>
          <td align='left' valign='middle'>".$itemlist->prod_name." (".$itemlist->prod_size.")</td>
          <td align='left' valign='middle'>".$itemlist->quantity."</td>
          <td align='left' valign='middle'>$".$itemlist->indiv_price."</td>
          <td align='left' valign='middle'>$".$itemlist->total_price."</td>
        </tr>";
        }
        $message2 .="
		<tr>
          <td colspan='3' align='right' valign='middle' >&nbsp;</td>
          <td  align='left' valign='middle' ><strong>Shipping Rate :&nbsp;$".($totalshiping)."</strong></td>
        </tr>
        <tr>
          <td colspan='3' align='right' valign='middle' >&nbsp;</td>
          <td  align='left' valign='middle' ><strong>Grand Total:&nbsp;$".($totalshiping+$G_total)."</strong></td>
        </tr>
        ";
        $message2 .="
      </table></td>
  </tr>
  <tr>
    <td valign='top' colspan='2' align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td valign='top' colspan='2' align='left'>Thank You,<br />
      Support Team, The Superteens</td>
  </tr>
</table>";
$headers2  = 'MIME-Version: 1.0' . "\r\n";
$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers2 .= 'From: The Superteens<info@themedia3.com>' . "\r\n";
mail($to2, $subject2, $message2, $headers2);
	
	
	
	$callConfig->deleteRecord(TPREFIX.TBL_CART,'temprandid',$var_temp_session);
	header("location:storethankyou.php");
	exit;	
	}
else
{
header("location:transactionfailed.php");
exit;		
}
?>