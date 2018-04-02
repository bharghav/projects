<?php include("includes/headermeta.php");
/*include ('model/forum.class.php');
$forumObj= new fourmClass();*/
$start=0;
if($_GET['start']!="")$start=$_GET['start'];
$limit=25;
$allcategorysub=$forumObj->getAllForumCategoryList('0','fcid','DESC',$start,$limit);
$total=$forumObj->getAllForumCategoryListCount('0');
?>
<style type="text/css">
<!--
body {
	background-image: url(images/Background3.jpg);
	background-repeat: no-repeat;
	background-position:center top;
}
-->
</style>
<table width="1060" border="0" cellspacing="0" cellpadding="0" >
      <tr>
        <td width="28" align="left" valign="top"><img src="images/side-panel_25.png" width="28" height="698" /></td>
        <td align="left" valign="top" style="background:#FFFFFF;"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
          <tr>
       <td align="left" valign="top" style="background-image:url(images/buttons-bg_29.jpg); background-repeat:repeat-x"><?php include("includes/headermenu.php");?></td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td  align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top" style="padding-left:25px; padding-bottom:10px; padding-right:25px; padding-top:15px"><!--<p class="boldtext">Forum
                </p>-->
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
                    <td align="left" valign="top" height="25"><a href="forumhome.php" class="morelinks"><strong>Forum Home</strong></a></td>
					</tr>
				<?php 
				if(sizeof($allcategorysub)>0)
				{
				foreach($allcategorysub as $allcatesub)
				{
				?>
                  <tr>
                    <td align="left" valign="top" style="background-color:#1087b2; padding:5px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td  align="left" valign="top" ><table width="100%" border="0" align="left" cellpadding="1" cellspacing="1">
                          <tr>
                            <td width="659" height="25" align="left" valign="middle" style="padding-left:5px;" class="forumheading"><?php echo ucfirst(stripslashes($allcatesub->title));?></td>
                            <td width="45" align="center" valign="middle"  class="forumheading">Topics</td>
                            <td width="43" align="center" valign="middle"  class="forumheading">Posts</td>
                            <td width="186" align="left" valign="middle"  style="padding-left:5px;" class="forumheading">Last Post</td>
                            </tr>
							<?php 
							$allsub=$forumObj->getAllForumCategoryList($allcatesub->fcid,'fcid','DESC','','');
							$fhome=0;
							if(sizeof($allsub)>0)
							{
							foreach($allsub as $all_sub)
							{
							if($fhome%2==0)
							$trs="style=background:#fff3ed";
							else
							$trs="style=background:#FEFFED";
							$cnttopics=$forumObj->getCount_Topics_Posts(TPREFIX.TBL_FORUMTOPICS,'fcid'," status='Active' and fscid='".$all_sub->fcid."'");
							$cntposts=$forumObj->getCount_Topics_Posts(TPREFIX.TBL_FORUMCOMMENTS,'fcid'," status='Active' and fscid='".$all_sub->fcid."'");
							$latest_one_forumposts=$forumObj->getAllForumPostComments_Latest($all_sub->fcid,'','frid','DESC','0','1');
							?>
<tr <?=$trs?>>
<td  align="left" valign="top"  style="padding-left:5px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="25" align="left" valign="middle"><a href="forumtopics.php?fscid=<?=$all_sub->fcid?>" class="morelinks"><strong><?php echo ucfirst(stripslashes($all_sub->title));?> </strong></a></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><span class="runningtext"><?php echo substr(stripslashes($all_sub->bigtext),0,100);?></span></td>
  </tr>
</table>
</td>
<td height="40" align="center" valign="middle"><?php echo $cnttopics;?></td>
<td height="40" align="center" valign="middle"><?php echo $cntposts;?></td>
<td height="40" align="left" valign="middle"   style="padding-left:5px;">
<?php if($cntposts!=0){?>
by <strong><?=$latest_one_forumposts->commentedby?></strong><br /><?php echo date("F dS, Y", strtotime($latest_one_forumposts->commentedon)); ?>
<?php } else { echo "------"; }?>
</td>
</tr>
							 <?php
							 $fhome++;
				  }
				  } 
				  else
				  { 
				  ?>
				   <tr style="background:#FEFFED;">
				   <td  colspan="5" align="left" valign="middle"  style="padding-left:5px; height:20px;" class="red_errormessage">No Sub Categories.</td>
				   </tr>    
				  <?php
				   }
				  ?>
                        </table></td>
                      </tr>
                    </table></td>
                  </tr>
				  <tr>
                    <td align="left" valign="top" style="padding:2px;"></td></tr>
				  <?php
				  } 
				  } else
				  {
				  ?>
				  <tr>
                    <td align="left" valign="top" style="background-color:#1087b2; padding:5px;">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr style="background:#FEFFED;">
				   <td  colspan="5" align="center" valign="middle"  style="padding-left:5px; height:50px;" class="red_errormessage">No Categories..</td>
				   </tr>
				   </table>
				   </td>
				   </tr>
				   <?php
				  }
				  ?>
				  <?php if($total>$limit)
						{
						?>
						<tr><td align="left">
						<ul class="paginator" style="float:right; margin-left:-25px;">
						<?php 
						$param="";
						$callConfig->paginavigation_FrontEnd($start, $limit, $total, 'forumhome.php', $param);
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