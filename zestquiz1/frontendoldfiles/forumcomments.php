<?php include("includes/headermeta.php");
//include ('model/forum.class.php');
//$forumObj= new fourmClass();
$forumObj->noofForumTopicViewsUpdate($_GET['ftid']);
$start=0;
if($_GET['start']!="")$start=$_GET['start'];
$limit=50;
$allforumcomments=$forumObj->getAllForumPostCommentsList($_GET['ftid'],'frid','DESC',$start,$limit);
$total=$forumObj->getAllForumPostCommentsListCount($_GET['ftid']);
$allforumtopicdata=$forumObj->getForumTopicData($_GET['ftid']);
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
				<?php if($_GET['err']!="" ){?>
				<tr>
                    <td align="left" valign="top" height="25" class="red_errormessage">Forum >> Comment posted successfully.</td>
					</tr>
					<?php 
					}
					?>
                    <?php if($_GET['iperr']=="ipblocked" ){?>
				<tr>
                    <td align="left" valign="top" height="25" class="red_errormessage">Your IP Address has been blocked by Administrator. Please contact administrator for further information.</td>
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
                    <td align="left" valign="top" height="25"><a href="forumhome.php" class="morelinks"><strong>Home</strong></a>&nbsp;&nbsp;<strong>/</strong>&nbsp;&nbsp;<a href="forumtopics.php?fscid=<?=$_GET['fscid'];?>" class="morelinks"><strong>Topics</strong></a>&nbsp;&nbsp;<strong>/</strong>&nbsp;&nbsp;<a href="forumcomments.php?fscid=<?php echo $_GET['fscid']?>&ftid=<?php echo $_GET['ftid']?>" class="morelinks"><strong><?=stripslashes($allforumtopicdata->title);?></strong></a></td>
					</tr>
				<?php /*?><?php 
				if($_SESSION['frnt_mid']!="")
				{
				?><?php */?>
				<tr>
				<td align="left" valign="top" height="25"><a href="forumaddcomments.php?fscid=<?=$_GET['fscid']?>&ftid=<?=$_GET['ftid']?>" class="morelinks"><img src="images/post-reply_51.png" border="0" /></a></td></tr>
				<tr>
				<?php /*?><?php 
				}
				?><?php */?>
				<td align="left" valign="top" style="background-color:#1087b2; padding:5px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
				<td  align="left" valign="top" ><table width="100%" border="0" align="left" cellpadding="1" cellspacing="1">
				<?php /*?><tr>
				<td width="659" height="25" align="left" valign="middle" style="padding-left:5px;" class="forumheading">Post A New Topic</td>
				</tr><?php */?>
				<tr style="background:#E1EFF7;">
				<td  align="left" valign="top"  style="padding-left:5px;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td width="80%" height="30"><a href="forumcomments.php?fscid=<?php echo $_GET['fscid']?>&ftid=<?php echo $_GET['ftid']?>" class="BigForumboldheadingtext"><?=stripslashes($allforumtopicdata->title);?></a></td>
    <td width="1%" rowspan="4" align="left" valign="top">&nbsp;</td>
    <td width="19%" rowspan="4" align="left" valign="top"><table width="100%" border="0" align="left" cellpadding="2" cellspacing="1">
      <tr>
        <td align="left" valign="middle"><strong><?=stripslashes($allforumtopicdata->createdby);?></strong></td>
      </tr>
     <!-- <tr>
        <td align="left" valign="middle">Posts: 0 </td>
      </tr>-->
      <?php 
	  if($allforumtopicdata->createdby!="Guest User" && $allforumtopicdata->memberjoinedon!='0000-00-00 00:00:00')
	  {
	  ?>
      <tr>
        <td align="left" valign="middle">Joined: <?php echo date("F dS, Y", strtotime($allforumtopicdata->memberjoinedon)); ?></td>
      </tr>
      <?php
	  }
	  ?>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><img src="images/icon_post_target.gif">by <strong><?=stripslashes($allforumtopicdata->createdby);?></strong> &raquo; <?php echo date("F dS, Y", strtotime($allforumtopicdata->createdon)); ?></td>
    </tr>
  <tr>
    <td align="left" valign="top"><?=stripslashes($allforumtopicdata->bigtext);?></td>
    </tr>
  
</table>
					</td>
                  </tr>
                </table></td>
				</tr>				
				</table></td>
				</tr>
				</table></td>
				</tr>
				
				
				
				<tr>
				<td align="left" valign="top" height="5"></td></tr>
				
				
				
				
				<?php if(sizeof($allforumcomments)>0){?>
				<tr>
				<td align="left" valign="top" style="background-color:#1087b2; padding:5px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
				<td  align="left" valign="top" ><table width="100%" border="0" align="left" cellpadding="0" cellspacing="1">
				<tr style="background:#FEFFED;">
				<td  align="left" valign="top"  style="padding-left:5px;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				<td  align="left" valign="top">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
						
						<?php 
						$flns=1;
						foreach($allforumcomments as $all_forumcomments)
						{
						if($flns%2==0)
						$trs="style=background:#fff3ed";
						else
						$trs="style=background:#FEFFED";
						?>
						<tr <?=$trs?>>
						<td height="40" align="left" valign="middle"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="1">
  <tr>
    <td width="80%" height="30"><a href="#" class="BigForumboldheadingtext">Re: &nbsp;<?=stripslashes($allforumtopicdata->title);?></a></td>
    <td width="1%" rowspan="4" align="left" valign="top">&nbsp;</td>
    <td width="19%" rowspan="4" align="left" valign="top"><table width="100%" border="0" align="left" cellpadding="2" cellspacing="1">
      <tr>
        <td align="left" valign="middle"><strong><?=$all_forumcomments->commentedby?></strong></td>
      </tr>
      <!--<tr>
        <td align="left" valign="middle">Posts: 0 </td>
      </tr>-->
      <?php 
	  if($all_forumcomments->createdby!="Guest User" && $all_forumcomments->memberjoinedon!='0000-00-00 00:00:00')
	  {
	  ?>
      <tr>
        <td align="left" valign="middle">Joined: <?php echo date("F dS, Y", strtotime($all_forumcomments->memberjoinedon)); ?></td>
      </tr>
      <?php
	  }
	  ?>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><img src="images/icon_post_target.gif">by <strong><?=$all_forumcomments->commentedby?></strong> &raquo; <?php echo date("F dS, Y", strtotime($all_forumcomments->commentedon)); ?></td>
    </tr>
  <tr>
    <td align="left" valign="top" class="runningtext"><?=stripslashes($all_forumcomments->comment_text);?></td>
    </tr>
  
</table>
</td>
						</tr>
						<?php if($flns!=sizeof($allforumcomments)){?>
			<tr>
			<td align="left" valign="top" style="background:url(images/side-images_61.gif); background-repeat:repeat-x; height:1px;"></td>
			</tr>
			<?php 
			}
			?>

						<tr>
						<td height="5" align="left" valign="middle">
						</td></tr>
						<?php
						$flns++;
						}
						?>
                        </table></td>
                      </tr>
				  <tr>
                    <td align="left" valign="top" style="padding:2px;"></td></tr>
                </table></td>
				</tr>
				</table></td>
				</tr>
				</table></td>
				</tr>
				<?php 
				}else{
				?>
				<tr>
				<td align="left" valign="top" style="background-color:#1087b2; padding:5px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
				<td  align="left" valign="top" ><table width="100%" border="0" align="left" cellpadding="0" cellspacing="1">
				<tr style="background:#FEFFED;">
				<td  align="left" valign="top"  style="padding-left:5px;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
				<td  align="center" valign="middle" height="80">No Posts / Replies..</td>
				</tr>
				</table>
				</td>
				</tr>
				</table></td>
				</tr>
				</table></td>
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
					if($_GET['fscid']!="")
					$param.="&fscid=".$_GET['fscid'];
					if($_GET['ftid']!="")
					$param.="&ftid=".$_GET['ftid'];
					$callConfig->paginavigation_FrontEnd($start, $limit, $total, 'forumcomments.php', $param);
					?>
					</ul>
					</td>
					</tr>
					<?php 
					}
					?>
				
				<tr>
				<td align="left" valign="top" style="padding:2px;"></td>
				</tr>
				<?php /*?> <?php 
				if($_SESSION['frnt_mid']!="")
				{
				?><?php */?>
				<tr>
				<td align="left" valign="middle" height="25"><a href="forumaddcomments.php?fscid=<?=$_GET['fscid']?>&ftid=<?=$_GET['ftid']?>" class="morelinks"><img src="images/post-reply_51.png" border="0" /></a></td></tr>
				<tr>
				<?php /*?><?php 
				}
				?><?php */?>

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