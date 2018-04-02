<?php 
include("includes/headermeta.php");
if($_POST['action']=="mycart"){
	$frontUserOnlineStoreObj->addProductsToTempCart($_POST);
}
$indivproducts=$frontUserOnlineStoreObj->getProductData($_GET['spid']);
if($indivproducts->offer=="yes"){
$price="<s><strong>$".$indivproducts->oldprice."</strong></s>&nbsp;&nbsp;&nbsp;&nbsp;<span class='redtext'><strong>$".$indivproducts->newprice."</strong></span>";
} else {
$price="<span class='redtext'><strong>$".$indivproducts->newprice."</strong></span>";
}
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
<script type='text/javascript'>
function isNumeric(elem, helperMsg){
	var numericExpression = /^[0-9]+$/;
	if(elem.value.match(numericExpression) && elem.value>0){
		//return true;
		document.formcart.submit();
	}else{
		alert(helperMsg);
		elem.value="";
		elem.focus();
		return false;
	}

}
</script>
<script type="text/javascript" src="lightbox/jquery-1.js"></script>
<script type="text/javascript" src="lightbox/jquery_002.js"></script>
<script type="text/javascript" src="lightbox/jquery.js"></script>
<script type="text/javascript" src="lightbox/swfobject.js"></script>
<link rel="stylesheet" type="text/css" href="lightbox/fancy.css">
<script type="text/javascript">
$(document).ready(function() {
$("a[@rel*=fancyvideo]").fancybox({
overlayShow: true,
frameWidth:800,
frameHeight:600
});
});
</script>
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
                    <td align="left" valign="top" style="padding-left:20px;padding-top:15px;"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td height="30" align="left" valign="top" class="boldtext">&nbsp;&nbsp;ONLINE STORE</td>
                                  </tr>
                                  <tr>
								  
					      <tr>
                                    <td align="left" valign="top">
									<form method="post" action="" name="formcart" >
									<table width="100%" border="0" align="left" cellpadding="5" cellspacing="0">
                    <tr>
                      <td width="305" align="left" valign="top"><table width="305" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="272" align="center" valign="middle" style="background-image:url(images/grey-bg_03.gif); background-repeat:no-repeat;"><img src="uploads/store/products/<?php echo $indivproducts->image;?>"  width="293" height="258" /></td>
                        </tr>
                        
                      </table></td>
                      <td align="left" valign="top"><span class="blacktext"><?php echo stripslashes($indivproducts->prodtitle);?></span>
                        <p class="runningtext">Price: <?php echo $price?></p>
                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                          <tr>
                            <td width="19%" align="left" valign="middle">Quantity:</td>
                            <td width="81%"><label>
                              <input type="text" name="pro_quantity" id="pro_quantity" class="text_small required" style="width:40px;" value="1" />
                            </label></td>
                          </tr>
						  <tr>
                            <td width="19%" align="left" valign="middle">Size:</td>
                            <td width="81%"><label><select name="pro_size" id="pro_size" class="select_small required"  style="width:100px;">
							<option value="">--Select--</option>
							<option value="small">Small</option>
							<option value="medium">Medium</option>
							<option value="large">Large</option>
							<option value="extra large">Extra Large</option>
							</select>
							</label></td>
                          </tr>
                        </table>                        
                        <p><input type="hidden" name="pro_id" value="<?=$_GET['spid'];?>" />
						<input type="hidden" name="pro_price" value="<?=$indivproducts->newprice;?>" />
						<input type="hidden" name="action" value="mycart" />
						<img src="images/add-to-cart_11.png" onclick="isNumeric(document.getElementById('pro_quantity'), 'Please Enter Numbers Only like 1 2 3')" width="78" height="21" border="0" alt="Add To Cart" /></p><br />
						<p><a  href="contentpage_popup.php?pgid=19" rel="fancyvideo" class="morelinks">Terms & Conditions</a><br />
						<a  href="contentpage_popup.php?pgid=20" rel="fancyvideo" class="morelinks">Check this RefundPolicy before Shop</a></p>
						 </td>
                      </tr>
                    <tr>
                      <td colspan="2" align="left" valign="top" class="runningtext"><?=stripslashes($indivproducts->bigtext);?></td>
                      </tr>
                  </table>
									</form></td></tr>
                                  <tr>
                                  
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