<?php 
include("includes/headermeta.php");
$start=0;
if($_GET['start']!="")$start=$_GET['start'];
$limit=20;
$all_cmnts=$frontUserBlogObj->getAllBlogTopicsList('','blog','id','DESC',$start,$limit);
$total=$frontUserBlogObj->getAllBlogTopicsListCount('','blog');
?>
<style type="text/css">
<!--
body {
	background-image: url(images/Background2.jpg);
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
                    <td align="left" valign="top" style="padding-left:20px; padding-top:15px">
					<table width="677" border="0" cellspacing="0" cellpadding="0">
<tr>
<?php 
$hb=0;
foreach($all_cmnts as $homeblog_list)
{
if($hb%2==0)
echo "<tr>";
$makehomecaturl="blogindivtopic.php?btid=".$homeblog_list->id;
if($homeblog_list->id==4)
$makehomecaturl="relationshipadvice.php?btid=".$homeblog_list->id;
if($homeblog_list->id==9)
$makehomecaturl="onlinestore.php";
$cmntcnt=$frontUserBlogObj->getCmntCount_Posts(TPREFIX.TBL_BLOGCOMMENTS,'b_id',"b_id='".$homeblog_list->id."'");
if($cmntcnt>0)
$cmntdisp=$cmntcnt." Comments";
else
$cmntdisp="No Comments";
?>
<td align="center" valign="top">
<table width="316" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="52" align="left" valign="middle" class="blacktext" style="background-image:url(images/blog-bgs_86.gif); background-repeat:no-repeat;padding-left:10px"><span><?php echo stripslashes($homeblog_list->title);?></span></td>
                          </tr>
                          <tr>
                            <td align="center" valign="top" style="height:107px;"><a href="<?=$makehomecaturl?>">
<?php if($homeblog_list->image!=""){?><img src="uploads/blog/<?=$homeblog_list->image;?>" alt="<?=stripslashes($homeblog_list->title);?>" width="316" height="200" border="0" /><?php } else {?><img src="images/nopreview.jpg" width="316" height="200" border="0"/><?php }?></a></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" class="runningtext" style="padding-left:15px; padding-right:15px; padding-top:5px; padding-bottom:10px;height:60px;"><a href="<?=$makehomecaturl?>" class="morelink"><?=stripslashes(substr($homeblog_list->smalltext,0,80));?></a></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" style="padding-right:15px; padding-bottom:5px"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="18%" align="left" valign="middle"><img src="images/comntbox.jpg" height="30" width="30" /></td>
    <td width="69%" align="left" valign="middle"><a href="blogcomments.php?btid=<?php echo $homeblog_list->id;?>" class="morelinks"><?php echo $cmntdisp;?></a></td>
    <td width="13%" align="right" valign="middle"><a href="<?=$makehomecaturl?>" class="morelink">++More</a></td>
  </tr>
</table></td>
                          </tr>
                          <tr>
                            <td align="center" valign="top"><img src="images/blog-bgs_96.gif" width="316" height="13" /></td>
                          </tr>
                        </table>
</td>
<?php
$hb++;
}
?>	
</tr>
		<?php if($total>$limit)
		{
		?>
		<tr><td align="left">
		<ul class="paginator" style="float:right; margin-left:-25px;">
		<?php 
		$param="";
		$callConfig->paginavigation_FrontEnd($start, $limit, $total, 'blogtopics.php', $param);
		?>
		</ul>
		</td>
		</tr>
		<?php 
		}
		?>
			</table>
</td>
                  </tr>
                </table></td>
                <td width="2" align="left" valign="top"><img src="images/line_35.gif" width="2" height="902" /></td>
                <td align="left" valign="top" style="padding-top:15px; padding-left:10px; padding-right:10px"><?php include("includes/rghtnav_blog.php");?></td>
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