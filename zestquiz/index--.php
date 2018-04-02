<?php include("includes/headermeta.php");?>
<style type="text/css">
<!--
body {
	background-image: url(images/mainBg.jpg);
	background-repeat: no-repeat;
	background-position:center top;
}
-->
</style>
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
                    <td align="left" valign="top" style="padding-left:20px; padding-top:15px"><?php /*?><?php include("includes/homeslider.php");?><?php */?>
                    
 <!------------------------------HOME BANNER STARTS------------------------------------------------- -->                 
<?php
$banner_slides=$contentpageObj->getAllBannersList("id","DESC","","");
?> 
<div style="width:642px;height:242px;border:0px solid black;margin-left:8px;">
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
                           <a href="homebannerspage.php?hmbid=<?php echo $banners->id;?>" class="morelink"><img src="uploads/baner_gallery/<?php echo $banners->image;?>" width="347" height="193" border="0" /></a></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top"><img src="images/image-bgs_41.gif" width="366" height="6" /></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top"><!--<img src="images/image-bgs_43.gif" width="43" height="8" />--></td>
                          </tr>
                        </table></td>
                        <td align="left" valign="top" style="padding-left:30px; padding-top:20px"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="left" valign="top" class="boldtext"><?php echo stripslashes($banners->title);?></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" style="padding-top:10px" class="runningtext">
							<a href="homebannerspage.php?hmbid=<?php echo $banners->id;?>" class="morelink"><?php echo substr(stripslashes($banners->img_desc),0,1500);?> </a>
							<?php /*?>
							<table width="100%" border="0" cellspacing="0" cellpadding="3">
                             <tr>
                                <td align="left" valign="middle"><img src="images/arrow_45.gif" width="7" height="6" /></td>
                                <td align="left" valign="top"><?php echo $banners->img_desc;?></td>
                              </tr>
                              <tr>
                                <td align="left" valign="middle"><img src="images/arrow_45.gif" width="7" height="6" /></td>
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
                                <td align="left" valign="top">Maecenas eget est eu neque cursus</td>
                              </tr>
                            </table>
							<?php */?>
							</td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" style="padding-top:30px"><table width="50%" border="0" cellspacing="0" cellpadding="3">
                              <tr>
                                <td align="left" valign="top"><img src="images/dot-line_49.gif" width="76" height="1" /></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top"><a href="homebannerspage.php?hmbid=<?php echo $banners->id;?>" class="morelink">++Know More</a></td>
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
 <!------------------------------HOME BANNER ENDS------------------------------------------------- -->      

                    </td>
                  </tr>
                  <tr>
                    <td align="center" valign="top" style="padding-top:10px"><img src="images/dot-lines_62.gif" width="673" height="1" /></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" style="padding-left:20px; padding-top:15px">
<table width="677" border="0" cellspacing="0" cellpadding="0">
<tr>
<?php 
$homebloglist=$frontUserBlogObj->getAllBlogTopicsList('0','home','disp_order','ASC',0,100);
$hb=0;
foreach($homebloglist as $homeblog_list)
{
if($hb%3==0)
echo "<tr>";
$makehomecaturl="homeindivtopic.php?btid=".$homeblog_list->id;
if($homeblog_list->id==4)
$makehomecaturl="relationshipadvice.php?btid=".$homeblog_list->id;
if($homeblog_list->id==9)
$makehomecaturl="onlinestore.php";

?>
<td align="center" valign="top"><table width="204" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="52" align="left" valign="middle" class="blacktext" style="background-image:url(images/superteens-bg_86.jpg); background-repeat:no-repeat; padding-left:10px"><a href="<?=$makehomecaturl?>" class="blacktext"><span><?php echo stripslashes($homeblog_list->title);?></span></a></td>
</tr>
<?php 
$homebloglist_sub=$frontUserBlogObj->getAllBlogTopicsList($homeblog_list->id,'home','id','DESC','','');
if(sizeof($homebloglist_sub)>0)
{
$makehomecaturl_sub="homeindivtopic.php?bcid=".$homeblog_list->id."&btid=".$homebloglist_sub[0]->id;
/*if($homebloglist_sub->id==4)
$makehomecaturl_sub="relationshipadvice.php?btid=".$homebloglist_sub->id;
if($homebloglist_sub->id==9)
$makehomecaturl_sub="onlinestore.php";*/
?>
<tr>
<td align="center" valign="middle" style="height:107px;"><a href="<?=$makehomecaturl_sub?>"><img src="uploads/blog/<?=$homebloglist_sub[0]->image;?>" alt="<?=stripslashes($homebloglist_sub[0]->title);?>" width="202" height="107" border="0" /></a></td>
</tr>
<tr>
<td align="left" valign="top" class="runningtext" style="padding-left:15px; padding-right:15px; padding-top:5px; padding-bottom:10px;height:60px;"><a href="<?=$makehomecaturl_sub?>" class="morelink"><?=stripslashes(substr($homebloglist_sub[0]->smalltext,0,80));?></a></td>
</tr>
<tr>
<td align="right" valign="top" style="padding-right:15px; padding-bottom:5px"><a href="<?=$makehomecaturl_sub?>" class="morelink">++More</a></td>
</tr>
<?php } else {?>
<tr>
<td align="center" valign="middle" style="height:107px;"><a href="<?=$makehomecaturl?>"><img src="uploads/blog/<?=$homeblog_list->image;?>" alt="<?=stripslashes($homeblog_list->title);?>" width="202" height="107" border="0" /></a></td>
</tr>
<tr>
<td align="left" valign="top" class="runningtext" style="padding-left:15px; padding-right:15px; padding-top:5px; padding-bottom:10px;height:60px;"><a href="<?=$makehomecaturl?>" class="morelink"><?=stripslashes(substr($homeblog_list->smalltext,0,80));?></a></td>
</tr>
<tr>
<td align="right" valign="top" style="padding-right:15px; padding-bottom:5px"><a href="<?=$makehomecaturl?>" class="morelink">++More</a></td>
</tr>
<?php }?>
<tr>
<td align="left" valign="top"><img src="images/products_78.gif" width="204" height="12" /></td>
</tr>
<tr>
<td align="left" valign="top" height="10"></td>
</tr>
</table>
</td>
<?php
$hb++;
}
?>	
</tr>
</table>
					</td>
                  </tr>
                </table></td>
                <td width="2" align="left" valign="top"><img src="images/line_35.gif" width="2" height="902" /></td>
                <td align="left" valign="top" style="padding-top:15px; padding-left:10px; padding-right:10px"><?php include("includes/homerightnav.php");?></td>
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