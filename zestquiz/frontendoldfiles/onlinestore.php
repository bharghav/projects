<?php 
include("includes/headermeta.php");
$start=0;
if($_GET['start']!="")$start=$_GET['start'];
$limit=21;
$totalproducts=$frontUserOnlineStoreObj->getAllProductsList($_GET['scid'],"spid","DESC",$start,$limit);

$total=$frontUserOnlineStoreObj->getAllProductsListCount($_GET['scid']);
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
                <td width="697" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top" style="padding-left:20px; padding-top:15px"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td align="left" valign="top" class="boldtext" >&nbsp;&nbsp;ONLINE STORE</td></tr>
                                  <tr>
								  
								   <tr>
                                    <td align="left" valign="top">
									<table width="100%" border="0" cellspacing="0" cellpadding="10" align="left">
						<?php if($total>$limit)
						{
						?>
						<tr><td align="right" colspan="3">
						<ul class="paginator" style="float:right; margin-left:-25px;">
						<?php 
						$param="";
					/*	if($_GET['btid']!="")
						$param.="&btid=".$_GET['btid'];*/
						$callConfig->paginavigation_FrontEnd($start, $limit, $total, 'onlinestore.php', $param);
						?>
						</ul>
						</td>
						</tr>
						<?php 
						}
						?>
					<?php 
					if(sizeof($totalproducts)>0)
					{
					?>
                    <tr>
					<?php 
					$pp=0;
					foreach($totalproducts as $total_products)
					{
					if($pp%3==0)
					echo "<tr>";
					if($total_products->offer=="yes"){
					$price="<s>$".$total_products->oldprice."</s>&nbsp;&nbsp;&nbsp;&nbsp;<span class='redtext'>$".$total_products->newprice."</span>";
					} else {
					$price="<span class='redtext'>$".$total_products->newprice."</span>";
					}
					?>
                      <td align="left" valign="top"><table width="191" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="227" align="left" valign="top" style="background-image:url(images/store-border_03.gif); background-repeat:no-repeat; padding:6px"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td height="146" align="center" valign="middle" bgcolor="#FFFFFF"><a href="onlinestoreproductdisp.php?spid=<?=$total_products->spid?>" ><img src="uploads/store/products/thumbs/<?=$total_products->image;?>" width="179" height="146" alt="<?=stripslashes($total_products->prodtitle);?>" border="0" /></a></td>
                            </tr>
                            <tr>
                              <td align="left" valign="top" bgcolor="#FFFFFF"><img src="images/line_06.gif" width="179" height="1" /></td>
                            </tr>
                            <tr>
                              <td height="66" align="left" valign="top" bgcolor="#FFFFFF" style="padding-left:5px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td height="22" colspan="2" align="left" valign="middle" class="runningtext"><strong><?=ucfirst(stripslashes($total_products->prodtitle));?></strong></td>
                                </tr>
                                <tr>
<td height="22" colspan="2" align="left" valign="middle" class="runningtext">Price:&nbsp;&nbsp;<?=$price?></span></span>                                    </td>
                                  </tr>
                                <tr>
                                  <td height="22" align="right" valign="middle" colspan="2"><a href="onlinestoreproductdisp.php?spid=<?=$total_products->spid?>" class="redlinks">++ Full Details</a></td>
								 <!-- <td height="22"  align="center" valign="middle"><img src="images/cart_11.gif" width="33" height="17" /></td>-->
                                  </tr>
                              </table></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
					  <?php 
					  $pp++;
					  }
					  ?>
					  <?php
					  } else {
					  ?>
					  <tr><td align="center" valign="middle" height="50">No Products available..</td></tr>
					   <?php 
					  }
					  ?>
					  <?php if($total>$limit)
						{
						?>
						<tr><td align="right" colspan="3">
						<ul class="paginator" style="float:right; margin-left:-25px;">
						<?php 
						$param="";
					/*	if($_GET['btid']!="")
						$param.="&btid=".$_GET['btid'];*/
						$callConfig->paginavigation_FrontEnd($start, $limit, $total, 'onlinestore.php', $param);
						?>
						</ul>
						</td>
						</tr>
						<?php 
						}
						?>
                  </table>
									
									</td></tr>
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