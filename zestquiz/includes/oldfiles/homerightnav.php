<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><?php include("includes/homelogin.php");?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" style="padding-bottom:10px; padding-top:5px"><img src="images/side-images_61.gif" width="268" height="1" /></td>
                  </tr>
				<?php 
				$cartdatagrandtotal=$frontUserOnlineStoreObj->getallTempCartGrandTotal();
				$noitemstotal=$frontUserOnlineStoreObj->getallTempCartQuantityTotal();
				if($noitemstotal=="")
				$noitemstotal=0;
				else
				$noitemstotal=$noitemstotal;
				if($noitemstotal!=0){
				?>
				<tr>
				<td align="left" valign="top" colspan="2"><?php include("includes/mycart.php");?></td>
				</tr>
				
				<tr>
                    <td align="left" valign="top" style="padding-bottom:10px; padding-top:5px"><img src="images/side-images_61.gif" width="268" height="1" /></td>
                  </tr>
				  <?php }?>
                  <tr>
                    <td align="left" valign="top"><?php include("includes/homenews.php");?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" style="padding-bottom:10px; padding-top:5px"><img src="images/side-images_61.gif" width="268" height="1" /></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" style="padding-left:5px"><?php include("includes/offers.php");?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" style="padding-bottom:10px; padding-top:10px"><img src="images/side-images_61.gif" width="268" height="1" /></td>

                  </tr>
                  <tr>
                    <td align="left" valign="top"><table width="95%" border="0" cellspacing="0" cellpadding="0">
					<tr>
                        <td align="left" valign="top" height="10"></td>
                      </tr>
                      <!--<tr>
                        <td align="left" valign="top"><img src="images/side-images_122.gif" width="89" height="13" /></td>
                      </tr>-->
						<tr>
						<td align="left" valign="middle"><strong class="boldtext">F0LLOW US</strong></td>
						</tr>
						<tr>
						<td align="left" valign="middle" ><hr class="boldtext_hr"/></td>
						</tr>
						<tr>
                        <td align="left" valign="top" height="5"></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top">
						<?php 
						$contenfollowus=$contentpageObj->getContentPageData('15');
						echo stripslashes($contenfollowus->content);?>
						</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" style="padding-bottom:10px; padding-top:5px"><img src="images/side-images_61.gif" width="268" height="1" /></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><?php include("includes/homenewsletter.php");?></td>
                  </tr>
                </table>