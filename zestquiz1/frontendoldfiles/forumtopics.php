<?php include("includes/headermeta.php");
//include ('model/forum.class.php');
//$forumObj= new fourmClass();
$start=0;
if($_GET['start']!="")$start=$_GET['start'];
$limit=50;
$allforumtopics=$forumObj->getAllForumTopicList($_GET['fscid'],'ftid','DESC',$start,$limit);
$total=$forumObj->getAllForumTopicListCount($_GET['fscid']);
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
                <td width="697" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top" style="padding-left:25px; padding-bottom:10px; padding-right:25px; padding-top:15px"><!--<p class="boldtext">Forum
                </p>-->
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<?php if($_GET['err']!="" ){?>
				<tr>
                    <td align="left" valign="top" height="25" class="red_errormessage">Forum >> Topic created successfully.</td>
					</tr>
					<?php 
					}
					?>
                    <?php if($_GET['iperr']=="ipblocked" ){?>
				<tr>
                    <td align="left" valign="top" height="25" class="red_errormessage">Your IP Address has been blocked by Administrator. Please contact administrator for further information..</td>
					</tr>
					<?php 
					}
					?>
					<?php if($_GET['ferr']!=""){?>
				<tr>
                    <td align="left" valign="top" height="25" class="red_errormessage"><?=$_GET['ferr']?></td>
					</tr>
					<?php 
					}
					?>
				<tr>
                    <td align="left" valign="top" height="25"><a href="forumhome.php" class="morelinks"><strong>Home</strong></a>&nbsp;&nbsp;<strong>/</strong>&nbsp;&nbsp;<a href="forumtopics.php?fscid=<?=$_GET['fscid'];?>" class="morelinks"><strong>Topics</strong></a></td>
					</tr>
				<?php /*?><?php 
						if($_SESSION['frnt_mid']!="")
						{
						?><?php */?>
				 <tr>
                    <td align="left" valign="top" height="25"><a href="forumnewtopic.php?fscid=<?=$_GET['fscid']?>" class="morelinks"><img src="images/new-topic_51.png" border="0" alt="New Topic" /></a></td></tr>
					<?php /*?><?php }?><?php */?>
                  <tr>
                    <td align="left" valign="top" style="background-color:#1087b2; padding:5px;">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <td  align="left" valign="top" >
						<table width="100%" border="0" align="left" cellpadding="1" cellspacing="1">
                          <tr>
                            <td width="659" height="25" align="left" valign="middle" style="padding-left:5px;" class="forumheading">Topics</td>
                            <td width="45" align="center" valign="middle"  class="forumheading">Posts</td>
                            <td width="43" align="center" valign="middle"  class="forumheading">Views</td>
                            <td width="186" align="left" valign="middle"  style="padding-left:5px;" class="forumheading">Last Post</td>
                            </tr>
							<?php 
							$fhome=0;
							if(sizeof($allforumtopics)>0)
							{
							foreach($allforumtopics as $all_forumtopics)
							{
							if($fhome%2==0)
							$trs="style=background:#fff3ed";
							else
							$trs="style=background:#FEFFED";
							$postscnt=$forumObj->getCount_Topics_Posts(TPREFIX.TBL_FORUMCOMMENTS,'ftid'," status='Active' and ftid='".$all_forumtopics->ftid."'");
							$latest_one_forumposts=$forumObj->getAllForumPostComments_Latest($_GET['fscid'],$all_forumtopics->ftid,'frid','DESC','0','1');
							?>
<tr <?=$trs?>>
<td height="40" align="left" valign="middle"  style="padding-left:5px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="25" align="left" valign="middle"><a href="forumcomments.php?fscid=<?=$_GET['fscid']?>&ftid=<?=$all_forumtopics->ftid?>" class="morelinks"><strong><?php echo ucfirst(stripslashes($all_forumtopics->title));?></strong></a></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><?php echo date("F dS, Y H:i", strtotime($all_forumtopics->createdon)); ?><!--Mon Dec 22, 2003 5:57 pm--></td>
  </tr>
</table></td>
<td height="40" align="center" valign="middle"   ><?php echo $postscnt;?></td>
<td height="40" align="center" valign="middle" ><?php echo $all_forumtopics->noofviews; ?></td>
<td height="40" align="left" valign="middle"   style="padding-left:5px;">
<?php if($postscnt!=0){?>
by <strong><?=$latest_one_forumposts->commentedby?></strong><br /><?php echo date("F dS, Y", strtotime($latest_one_forumposts->commentedon)); ?>
<?php } else { echo "------"; }?></td>
</tr>
							 <?php
							 $fhome++;
				  }
				  } else {
				  ?>
				<tr style="background:#FEFFED;">
				<td colspan="5" align="center" class="red_errormessage" valign="middle" style="padding-left:5px; height:100px;">No Topics..</td>
				</tr>
				  <?php 
				  }
				  ?>
                        </table>
						
						
						
						</td>
                      </tr>
                    </table></td>
                  </tr>
				   <?php if($total>$limit)
						{
						?>
						<tr><td align="left">
						<ul class="paginator" style="float:right; margin-left:-25px;">
						<?php 
						$param="";
						if($_GET['fscid']!="")
						$param.="&fscid=".$_GET['fscid'];
						$callConfig->paginavigation_FrontEnd($start, $limit, $total, 'forumtopics.php', $param);
						?>
						</ul>
						</td>
						</tr>
						<?php 
						}
						?>
				  <tr>
                    <td align="left" valign="top" style="padding:2px;"></td></tr>
				 
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