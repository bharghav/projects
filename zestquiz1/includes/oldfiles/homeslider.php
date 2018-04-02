<link type="text/css" rel="stylesheet" href="test/styles.css" />
<!--venki slider-->
<script type="text/javascript" language="javascript" src="test/js/vslider/jquery.js"></script>
<script type="text/javascript" language="javascript" src="test/js/vslider/jquery.carouFredSel-5.4.1-packed.js"></script>
<script type="text/javascript" language="javascript">
			$(function() {
				$('#foo0').carouFredSel();
				$(window).resize();
			});
		</script>
<?php
$banner_slides=$frontUserOnlineBannerObj->getAllBannersList("id","DESC","","");
?> 
<div style="width:626px;height:242px;border:0px solid black;margin-left:8px;">
                        <div class="list_carousel">
                          <ul id="foo0">
                            <?php
                                   foreach($banner_slides as $banners)
                                    {
                                    ?>
                            <li style="border:0px solid blue;">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="366" align="left" valign="top"><table width="366" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="left" valign="top"><img src="images/image-bgs_38.gif" width="366" height="6" /></td>
                          </tr>
                          <tr>
                            <td width="366" height="212" align="center" valign="middle" style="background-image:url(images/image-bgs_40.gif); background-repeat:no-repeat">
                           <img src="uploads/baner_gallery/<?php echo $banners->image;?>" width="347" height="193" /></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top"><img src="images/image-bgs_41.gif" width="366" height="6" /></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top"><img src="images/image-bgs_43.gif" width="43" height="8" /></td>
                          </tr>
                        </table></td>
                        <td align="left" valign="top" style="padding-left:30px; padding-top:20px"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="left" valign="top" class="boldtext">Slide Title</td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" style="padding-top:10px"><table width="100%" border="0" cellspacing="0" cellpadding="3">
                              <tr>
                                <td align="left" valign="middle"><img src="images/arrow_45.gif" width="7" height="6" /></td>
                                <td align="left" valign="top"><?php echo $banners->img_desc;?> </td>
                              </tr>
                              <tr>
                                <!--<td align="left" valign="middle"><img src="images/arrow_45.gif" width="7" height="6" /></td>
                                <td align="left" valign="top">Vestibulum vehicula eros nec ipsum</td>
                              </tr>
                              <tr>
                                <td align="left" valign="middle"><img src="images/arrow_45.gif" width="7" height="6" /></td>
                                <td align="left" valign="top">Suspendisse blandit orci ut quam pulvinar</td>
                              </tr>
                              <tr>
                                <td align="left" valign="middle"><img src="images/arrow_45.gif" width="7" height="6" /></td>
                                <td align="left" valign="top">Aenean aliquam mauris sit amet felis</td>
                              </tr>
                              <tr>
                                <td align="left" valign="middle"><img src="images/arrow_45.gif" width="7" height="6" /></td>
                                <td align="left" valign="top">Maecenas eget est eu neque cursus</td>-->
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" style="padding-top:30px"><table width="50%" border="0" cellspacing="0" cellpadding="3">
                              <tr>
                                <td align="left" valign="top"><img src="images/dot-line_49.gif" width="76" height="1" /></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top"><a href="#" class="morelink">++Know More</a></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top"><img src="images/dot-line_49.gif" width="76" height="1" /></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table>
                            </li>
                            <?php 
					}
					?>
                          </ul>
                        </div>
                      </div>

