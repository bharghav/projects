<?php include("includes/headermeta.php");
$blogindiv=$frontUserBlogObj->getBlogTopicData($_GET['btid']);
$cmntcnt=$frontUserBlogObj->getCmntCount_Posts(TPREFIX.TBL_BLOGCOMMENTS,'b_id'," status='Active' and b_id='".$_GET['btid']."'");
if($cmntcnt>0)
$cmntdisp=$cmntcnt." Comments";
else
$cmntdisp="No Comments";
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
					<a href="blogtopics.php" class="morelinks"><strong>Home</strong></a><strong>&nbsp;&nbsp;/&nbsp;&nbsp;</strong> <a href="blogindivtopic.php?btid=<?php echo $_GET['btid'];?>" class="morelinks"><strong><?php echo stripslashes($blogindiv->title);?></strong></a><p></p>
					<table width="660" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="1" align="left" valign="top"><img src="images/blog-bgs_03.gif" width="660" height="1" /></td>
                  </tr>
                  <tr>
                    <td height="500" align="left" valign="top" style="background-image:url(images/blog-bgs_06.gif); background-repeat:repeat-y"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="left" valign="top" style="padding:10px"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            
                            <td width="91%" align="left" valign="top" ><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td width="87%" height="23" align="left" valign="top" class="BigBlogboldheadingtext"><?php echo stripslashes($blogindiv->title);?></td>
  </tr>
  <tr>
    <td width="87%" height="23" align="left" valign="top">by ADMIN on <?php echo strtoupper(date("F dS, Y", strtotime($blogindiv->date))); ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="blogcomments.php?btid=<?php echo $blogindiv->id;?>" class="morelinks"><?php echo $cmntdisp;?></a>
	</td>
  </tr>
  <tr>
    <td align="left" valign="middle" class="runningtext"><?php echo stripslashes($blogindiv->bigtext);?></td>
    </tr>
   <!--<tr>
    <td valign="middle" align="left"><a href="#" class="morelinks">Read more &raquo;</a></td>
  </tr>-->
</table>
                             </td>
                          </tr>
						  <tr>
                        <td align="left" valign="top" style="padding-left:10px">
						<?php /*?><?php 
						if($_SESSION['frnt_mid']==""){?>
						Please login <a href="index.php" class="morelinks">here</a> to Leave a Comment 
						<?php } else {?>
						<a href="blogcomments.php?btid=<?php echo $_GET['btid'];?>" class="morelinks">Leave a Comment / Read All Comments</a>
						<?php }?><?php */?>
                        <a href="blogcomments.php?btid=<?php echo $_GET['btid'];?>" class="morelinks">Leave a Comment / Read All Comments</a>
						</td>
                      </tr>
                        </table></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><img src="images/blog-bgs_03.gif" width="660" height="1" /></td>
                  </tr>
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