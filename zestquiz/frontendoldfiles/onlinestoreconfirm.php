<?php 
include("includes/headermeta.php");
if($_GET['check']=="address"){
$cntfilledornot=userClass::checkShippingBillingaddresFilleed();
if($cntfilledornot==0)
$callConfig->headerRedirect("userprofile.php?ferr=Please fill all required fields");
else
$callConfig->headerRedirect("onlinestoreconfirm.php");
}
if($_POST['action']=="Updatecart"){
$frontUserOnlineStoreObj->updateViewcartRecords();
}
if($_GET['cid']!=""){
$frontUserOnlineStoreObj->deleteCartRecords($_GET['cid']);
}
$cartdata=$frontUserOnlineStoreObj->getallTempCart("cart_id","DESC",'','');
$cartdatagrandtotal=$frontUserOnlineStoreObj->getallTempCartGrandTotal();
$frontuserObj->cartitemsUpdatedToUserAccount();
//$frontuserObj->checkShippingBillingaddresFilleed();
$noitemstotal=$frontUserOnlineStoreObj->getallTempCartQuantityTotal();
?>

<style type="text/css">
<!--
body {
	background-image: url(images/mainBg.jpg);
	background-repeat: no-repeat;
	background-position:center top;
}
-->
</style>
<table width="1060" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="28" align="left" valign="top"><img src="images/side-panel_25.png" width="28" height="698" /></td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
       <td align="left" valign="top" style="background-image:url(images/buttons-bg_29.jpg); background-repeat:repeat-x"><?php include("includes/headermenu.php");?></td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;">
              <tr>
                <td width="697" align="left" valign="top"><table width="99%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top" style="padding-left:20px; padding-top:15px"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td height="30" align="left" valign="top" class="boldtext">ORDER CONFIRMATION</td>
                                  </tr>
								  
					      <tr>
                                    <td align="left" valign="top">
				<?php if(sizeof($cartdata)>0) {?>
                  <table width="100%" border="0" align="left" cellpadding="2" cellspacing="1"  style="border-width:thin; border-style:solid; border-color:#d2d2d2">
                    <tr>
                      <td width="12%" height="26" align="left" valign="middle" class="sideheadingboldText">IMAGE</td>
                      <td width="45%" height="26" align="left" valign="middle" class="sideheadingboldText">NAME</td>
                      <td width="12%" height="26" align="left" valign="middle" class="sideheadingboldText">UNIT PRICE</td>
                      <td width="17%" height="26" align="left" valign="middle" class="sideheadingboldText">QUANTITY</td>
                      <td width="14%" height="26" align="left" valign="middle" class="sideheadingboldText">TOTAL</td>
                    </tr>
					<tr>
                      <td height="5" colspan="5" align="left" valign="middle"><hr style="border:1px solid #d2d2d2;" /></td>
                    </tr>
					<?php
					foreach($cartdata as $allcartdata)
					{
					if($allcartdata->prod_size!="")
					$size="( ".$allcartdata->prod_size." )";
					
					$totalshipping=$noitemstotal*$sitedata->shippingamount;
					?>
					<tr>
					<td height="25" align="left" valign="middle" ><img src="uploads/store/products/thumbs/<?php echo $allcartdata->image;?>" width="70" height="60" /></td>
					<td height="25" align="left" valign="middle" ><?php echo $allcartdata->prod_name;?>	&nbsp;&nbsp;<?php echo $size;?></td>
					<td height="25" align="left" valign="middle" >$<?php echo $allcartdata->indiv_price;?></td>
					<td height="25" align="left" valign="middle"><?php echo $allcartdata->quantity;?></td>
					<td height="25" align="left" valign="middle" >$<?php echo $allcartdata->total_price;?> </td>
					</tr>
					<?php 
					}
					?>
					<tr>
                      <td height="5" colspan="5" align="left" valign="middle"><hr style="border:1px solid #d2d2d2;" /></td>
                    </tr>
					<tr>
                      <td width="12%" height="25" align="left" valign="middle" >&nbsp;</td>
                      <td width="45%" height="25" align="left" valign="middle" >&nbsp;</td>
                      <td width="12%" height="25" align="left" valign="middle" >&nbsp;</td>
                      <td width="17%" height="25" align="left" valign="middle" class="sideheadingboldText">Shipping Rate: </td>
                      <td width="14%" height="25" align="left" valign="middle" class="sideheadingboldText">$<?php echo $totalshipping;?></td>
                    </tr>
					<tr>
                      <td width="12%" height="25" align="left" valign="middle" >&nbsp;</td>
                      <td width="45%" height="25" align="left" valign="middle" >&nbsp;</td>
                      <td width="12%" height="25" align="left" valign="middle" >&nbsp;</td>
                      <td width="17%" height="25" align="left" valign="middle" class="sideheadingboldText">Grand Total:</td>
                      <td width="14%" height="25" align="left" valign="middle" class="sideheadingboldText">$<?=($totalshipping+$cartdatagrandtotal);?></td>
                    </tr>
					<!--<tr>
					  <td height="25" align="left" valign="middle" >&nbsp;</td>
					  <td height="25" align="left" valign="middle" >&nbsp;</td>
					  <td height="25" align="left" valign="middle" >&nbsp;</td>
					  <td height="25" align="left" valign="middle" >&nbsp;</td>
					  <td height="25" align="left" valign="middle" class="sideheadingboldText">&nbsp;</td>
					  </tr>-->
					  <tr>
                      <td height="5" colspan="5" align="left" valign="middle"><hr style="border:1px solid #d2d2d2;" /></td>
                    </tr>
					<?php 
					$query_info=$callConfig->selectQuery(TPREFIX.TBL_ADMINSINFO,'*',"userid='".$_SESSION['frnt_mid']."'",'','','');
					$userdata_info=$callConfig->getRow($query_info);
					?>
<tr>
<td  colspan="2" height="30" align="left" valign="middle" class="boldtext">SHIPPING ADDRESS CONFIRMATION</td><td colspan="3" align="right" valign="middle" class="boldtext"><a href="userprofile.php" class="boldtext">EDIT SHIPPING ADDRESS</a></td>
</tr>
 <tr>
                      <td height="5" colspan="5" align="left" valign="middle"><hr style="border:1px solid #d2d2d2;" /></td>
                    </tr>
	<tr>
	<td  colspan="5"  align="left" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td width="17%" align="left" class="sideheadingboldText">First Name : </td>
    <td width="83%" align="left"><?php echo $userdata_info->s_firstname;?></td>
  </tr>
  <tr>
    <td align="left" class="sideheadingboldText">Last Name : </td>
    <td align="left"><?php echo $userdata_info->s_lastname;?></td>
  </tr>
  <tr>
    <td align="left" class="sideheadingboldText">Country : </td>
    <td align="left"><?php echo $userdata_info->s_country;?></td>
  </tr>
  <tr>
    <td align="left" class="sideheadingboldText">State : </td>
    <td align="left"><?php echo $userdata_info->s_state;?></td>
  </tr>
  <tr>
    <td align="left" class="sideheadingboldText">Address : </td>
    <td align="left"><?php echo $userdata_info->s_address;?></td>
  </tr>
  <tr>
    <td align="left" class="sideheadingboldText">City : </td>
    <td align="left"><?php echo $userdata_info->s_city;?></td>
  </tr>
  <tr>
    <td align="left" class="sideheadingboldText">Zip Code : </td>
    <td align="left"><?php echo $userdata_info->s_zipcode;?></td>
  </tr>
  <tr>
    <td align="left" class="sideheadingboldText">Fax : </td>
    <td align="left"><?php echo $userdata_info->s_fax;?></td>
  </tr>
  <tr>
    <td align="left" class="sideheadingboldText">Phone Number : </td>
    <td align="left"><?php echo $userdata_info->s_phoneno;?></td>
  </tr>
</table>
</td>
	</tr>
	
 <tr>
                      <td height="5" colspan="5" align="left" valign="middle"><hr style="border:1px solid #d2d2d2;" /></td>
                    </tr>
					<tr>
					  <td height="25" colspan="5" align="right" valign="middle" >
					 <form action="https://www.paypal.com/cgi-bin/webscr" name="cart_form"  method="post"   target="_self">
					   <?php /*?><form action="https://www.paypal.com/cgi-bin/webscr" name="cart_form"  method="post"   target="_self">
					   <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" name="cart_form"  method="post"   target="_self"><?php */?>
                        <input type="hidden" name="rm" value="2"/>
                        <input type="hidden" name="cmd" value="_cart"/>
					  <input type="hidden" name="business" value="sales@thesuperteens.com"/>
					     <?php /*?><input type="hidden" name="business" value="tester_1312443882_biz@gmail.com"/><?php */?>
                        <input type="hidden" name="return" value="<?=SITEURL?>/success.php"/>
                        <input type="hidden" name="cancel_return" value="<?=SITEURL?>/cancel.php"/>
                        <input type="hidden" name="notify_url" value="<?=SITEURL?>/ipn"/>
                        <input type="hidden" name="upload" value="1"/>
                       		 <?php 
								$j=1;
							   foreach($cartdata as $allcartdata)
							   {
							   	
							   ?>
                        <input type="hidden" name="item_name_<?php echo $j;?>" value="<?=$allcartdata->prod_name;?>"/>
                        <input type="hidden" name="amount_<?php echo $j;?>" value="<?=$allcartdata->indiv_price;?>"/>
                        <input type="hidden" name="quantity_<?php echo $j;?>" value="<?php echo $allcartdata->quantity;?>"/>
                        <input type="hidden" name="currency_code_<?php echo $j;?>" value="USD"/>
                        <input type="hidden" name="weight_<?php echo $j;?>" value="0"/>
                        <input type="hidden" name="shipping_<?php echo $j;?>" value="<?=$totalshipping?>"/>
                        	<?php  $j++;
								}
								?>
                        <br />
						 <br />
						 <input type="hidden" name="submit" value="ProceedtoCheckout"/>
                        <input type="image" src="images/paypal_checkout.png" alt="ProceedtoCheckout" />
						
                      </form>
					  </td>
					  </tr>
					
                  </table>
				  <?php 
				  } 
				  else 
				  {?>
				  <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="12%" height="26" align="center" valign="middle" class="red_errormessage">Your shopping cart is empty</td>
                    </tr>
					<tr>
                      <td width="12%" height="26" align="center" valign="middle"><a href="onlinestore.php" class="morelinks">Continue Shopping </a></td>
                    </tr>
                  </table>
				  <?php }?>
				</td></tr>
                                  </table>
</td>
                  </tr>
                </table></td>
                <td width="2" align="left" valign="top"><img src="images/line_35.gif" width="2" height="902" /></td>
                <td align="left" valign="top" style="padding-top:15px; padding-left:10px; padding-right:10px"><?php include("includes/rghtnav_store.php");?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="28" align="left" valign="top"><img src="images/sides_31.png" width="28" height="698" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="224" align="center" valign="top" style="background-image:url(images/grey-bg_141.jpg); background-repeat:repeat-x"><?php include("includes/footer.php");?></td>
  </tr>
</table>
</body>
</html>