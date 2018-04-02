<?php 
include("includes/headermeta.php");
$blogindiv=$frontUserBlogObj->getBlogTopicData($_GET['btid']);
if($_POST['postcmnt']=="Submit Comment"){
    $ipcnt=$frontUserBlogObj->ipCheckingExistornot($_SERVER['REMOTE_ADDR'],'status');
	if($ipcnt>0){
			$callConfig->headerRedirect("homeindivtopic.php?bcid=".$_POST['hdn_bcid']."&btid=".$_POST['hdn_btip']."&iperr=ipblocked");
	} else {
		$frontUserBlogObj->insertUserHomeBlogComments($_POST);
	}
}
$start=0;
if($_GET['start']!="")$start=$_GET['start'];
$limit=25;
$blogcommentsall=$frontUserBlogObj->getAllBlogCommentsList($_GET['btid'],"id","DESC",$start,$limit);
$total=$frontUserBlogObj->getAllBlogCommentsListCount($_GET['btid']);
if($total>0)
$cmntdisp=$total." Comments";
else
$cmntdisp="No Comments";
?>
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
<script type="text/javascript">
function trim(stringToTrim)
{
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}

function homeblogcmntvalidate()
{

            var firstname=trim(document.cmntform.name.value);
			if(firstname.length<1)
			{
				alert("Please Enter Your Name");
				document.cmntform.name.value="";
				document.cmntform.name.focus();
				return false;
		    }
		    var name=trim(document.cmntform.cmnt.value);
			if(name.length<1)
			{
				alert("Please Enter Your Comment");
				document.cmntform.cmnt.value="";
				document.cmntform.cmnt.focus();
				return false;
		    }
			if(document.cmntform.agree.checked==false)
			{
				alert("Please select Checkbox");
				document.cmntform.agree.focus();
				return false;
		    }
			return true;
}

</script>
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
                    <td align="left" valign="top" style="padding-left:20px; padding-top:15px"><a href="index.php" class="morelinks"><strong>Home</strong></a><p></p><table width="660" border="0" cellspacing="0" cellpadding="0">
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
    <td width="87%" height="23" align="left" valign="top">&nbsp;by Admin on <?php echo strtoupper(date("F dS, Y", strtotime($blogindiv->date))); ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="homeindivtopic.php?btid=<?php echo $blogindiv->id;?>#cd" class="morelinks"><?php echo $cmntdisp;?></a>
	</td>
  </tr>
  <tr>
    <td align="left" valign="middle" class="runningtext" ><?php echo stripslashes($blogindiv->bigtext);?></td>
    </tr>
</table>
                             </td>
                          </tr>
                        </table></td>
                      </tr>
					  
					  <tr><td align="left" valign="top" style="padding:10px">
					  <table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
                       <td align="left" valign="top" style="padding:5px" class="BigBlogboldheadingtext">
					  <?php echo $total;?> Responses to "<?php echo stripslashes($blogindiv->title);?>"
					  </td>
					  </tr>
					  <a name="cd"></a>
					<?php 
					$bal=0;
					if(sizeof($blogcommentsall)>0)
					{
					foreach($blogcommentsall as $allcmnts)
					{
					?>
					  <tr>
                        <td align="left" valign="top" style="padding:5px">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="11%" rowspan="4" align="left" valign="top"><img src="images/nouser.jpg" width="50" height="50" /></td>
    <td width="89%" align="left" valign="top" class="runningtext"><strong><?=ucfirst($allcmnts->name);?></strong> Says:</td>
  </tr>
  <tr>
    <td height="20" align="left" valign="top" class="runningtext"><small><?php echo date("D M d, Y H:i a", strtotime($allcmnts->commentedon)); ?></small></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="runningtext"><?php echo stripslashes($allcmnts->comment_text);?></td>
  </tr>
  <tr>
    <td align="left" valign="bottom" height="25"><a href="homeindivtopic.php?btid=<?php echo $_GET['btid'];?>#cmnt" class="morelinks"><strong>REPLY</strong></a></td>
  </tr>
</table>
						</td>
                      </tr>
					  <tr>
					<td align="left" valign="top" height="10"></td>
					</tr>
					<?php if($bal!=(sizeof($blogcommentsall)-1)){?>
					<tr>
					<td align="left" valign="top" style="background:url(images/side-images_61.gif); background-repeat:repeat-x; height:1px;"></td>
					</tr>
					<?php 
					}
					?>
					 <tr>
					<td align="left" valign="top" height="10"></td>
					</tr>
					  <?php 
					  $bal++;
					  }
					  } else
					  {
					  ?>
					  <tr>
					<td align="center" valign="middle" height="100">No Comments..</td>
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
						if($_GET['btid']!="")
						$param.="&btid=".$_GET['btid'];
						$callConfig->paginavigation_FrontEnd($start, $limit, $total, 'homeindivtopic.php', $param);
						?>
						</ul>
						</td>
						</tr>
						<?php 
						}
						?>
                        <?php /*?><?php 
						if($_SESSION['frnt_mid']==""){?>
					   <tr>
                        <td align="left" valign="top" style="padding-left:10px">Please login <a href="index.php" class="morelinks">here</a> to Leave a Reply / Comment
						</td>
                      </tr>
					  <?php 
						}
						?><?php */?>
						<?php /*?><?php 
						if($_SESSION['frnt_mid']!="")
						{
						?><?php */?>
						<a name="cmnt"></a>
						<tr>
						<td align="left" valign="middle" style="padding-left:10px;">
						<form method="post" name="cmntform" action="" onsubmit="return homeblogcmntvalidate();">
						<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
						<tr>
						<td align="left" valign="middle" height="30"><strong>Leave a Reply / Comment</strong></td>
						</tr>
						<?php if($_GET['cmntmsg']!="")
						{?>
						<tr>
						<td align="left" valign="middle" height="30" class="red_errormessage">Comment posted successfully</td>
						</tr>
						<?php 
						}
						?>
                        <?php if($_GET['iperr']=="ipblocked")
						{?>
						<tr>
						<td align="left" valign="middle" height="30" class="red_errormessage">Your IP Address has been blocked by Administrator. Please contact administrator for further information.</td>
						</tr>
						<?php 
						}
						?>
                        <tr>
						<td align="left" valign="middle">Name:&nbsp;&nbsp;<input type="text" name="name" value="" /></td>
						</tr>
                        <tr>
						<td align="left" valign="middle" height="5"></td>
						</tr>
						<tr>
						<td align="left" valign="middle"><textarea rows="5" cols="75" name="cmnt"></textarea></td>
						</tr>
						<tr>
						<td align="left" valign="middle"><input type="checkbox" name="agree" id="agree">&nbsp;&nbsp;I have read the terms and conditions and agree to abide by them.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 <a href="contentpage_popup.php?pgid=17" rel="fancyvideo" class="morelinks">Click here for Terms & Conditions</a></td>
						</tr>
						<tr>
						<td align="left" valign="middle" height="30"><input type="hidden" name="hdn_urlredirect" value="homeindivtopic.php" /><input type="hidden" name="hdn_bcid" value="<?php echo $_GET['bcid'];?>" /><input type="hidden" name="hdn_btip" value="<?php echo $_GET['btid'];?>" /><input type="submit" name="postcmnt" value="Submit Comment" /></td>
						</tr>
						</table>
						</form>
						</td>
						</tr>
						<tr>
						<td align="left" valign="top"></td>
						</tr>
						<?php /*?><?php 
						}
						?><?php */?>
                    </table></td></tr>
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