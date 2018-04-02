<?php 
include("includes/headermeta.php");
if($_POST['action']=="Updatecart"){
$frontUserOnlineStoreObj->updateViewcartRecords();
}
if($_GET['cid']!=""){
$frontUserOnlineStoreObj->deleteCartRecords($_GET['cid']);
}
$cartdata=$frontUserOnlineStoreObj->getallTempCart("cart_id","DESC",'','');
$cartdatagrandtotal=$frontUserOnlineStoreObj->getallTempCartGrandTotal();

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
                                    <td height="30" align="left" valign="top" class="boldtext">MY CART</td>
                                  </tr>
                                  <tr>
								  
					      <tr>
                                    <td align="left" valign="top">
				<form action="onlinestorecart.php" name="f1" method="post">
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
					<td height="25" align="left" valign="middle" ><img src="uploads/shop/products/thumbs/<?php echo $allcartdata->image;?>" width="70" height="60" /></td>
					<td height="25" align="left" valign="middle" ><?php echo $allcartdata->prod_name;?>&nbsp;&nbsp;<?php echo $size;?></td>
					<td height="25" align="left" valign="middle" ><?php echo $allcartdata->indiv_price;?></td>
					<td height="25" align="left" valign="middle" >
					<input name="cartids[]" type="hidden"  value="<?php echo $allcartdata->cart_id;?>" />
					<input name="orgprice[]" type="hidden"  value="<?php echo $allcartdata->indiv_price;?>" />
					<input name="qua[]" type="text"  value="<?php echo $allcartdata->quantity;?>" size="2"/>&nbsp;
                    <input type="image" src="images/tick.jpg" alt="edit" title="Update"  />&nbsp;
                    <a href="cart.php?cid=<?php echo $allcartdata->cart_id;?>"><img src="images/del.jpg" border="0"  alt="delete" title="Delete" /></a></td>
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
                      <td width="17%" height="25" align="left" valign="middle" >Shipping Rate:</td>
                      <td width="14%" height="25" align="left" valign="middle" class="sideheadingboldText">$<?=$totalshipping;?></td>
                    </tr>
					<tr>
                      <td width="12%" height="25" align="left" valign="middle" >&nbsp;</td>
                      <td width="45%" height="25" align="left" valign="middle" >&nbsp;</td>
                      <td width="12%" height="25" align="left" valign="middle" >&nbsp;</td>
                      <td width="17%" height="25" align="left" valign="middle" >Grand Total:</td>
                      <td width="14%" height="25" align="left" valign="middle" class="sideheadingboldText">$<?=($totalshipping+$cartdatagrandtotal);?></td>
                    </tr>
					<tr>
                      <td height="5" colspan="5" align="left" valign="middle"><hr style="border:1px solid #d2d2d2;" /></td>
                    </tr>
					<tr>
					  <td height="25" colspan="5" align="right" valign="middle" ><table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="186" align="right" valign="middle"><img src="images/continue-shopping_57.png" border="0"  onclick="window.location.href='onlinestore.php'" /></td>
    <td width="100" align="right" valign="middle"><input  type="hidden" name="action" value="Updatecart" /><input  type="image"  src="images/update-cart_57.png"  alt="Update Cart" /></td>
    <td width="114" align="right" valign="middle">
<?php 
if($_SESSION['frnt_mid']!="")
{
?>
<a href="onlinestoreconfirm.php?check=address"><img src="images/confirm-update_57.png" alt="Confirm" border="0" /></a>
<?php } else {?>
<a href="login.php?red=confirm"><img src="images/confirm-update_57.png" alt="Confirm" border="0" /></a>
<?php }?>
	</td>
  </tr>
</table>
</td>
					  </tr>
					<tr>
					  <td height="25" align="left" valign="middle" >&nbsp;</td>
					  <td height="25" align="left" valign="middle" >&nbsp;</td>
					  <td height="25" align="left" valign="middle" >&nbsp;</td>
					  <td height="25" align="left" valign="middle" >&nbsp;</td>
					  <td height="25" align="left" valign="middle" class="sideheadingboldText">&nbsp;</td>
					  </tr>
                  </table>
				  <?php } else {?>
				  <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="12%" height="26" align="center" valign="middle" class="red_errormessage">Your shopping cart is empty</td>
                    </tr>
					<tr>
                      <td width="12%" height="26" align="center" valign="middle"><a href="onlinestore.php" class="morelinks">Continue Shopping </a></td>
                    </tr>
                  </table>
				  <?php }?>
                </form>	
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