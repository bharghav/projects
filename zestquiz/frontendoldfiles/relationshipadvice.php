<?php include("includes/headermeta.php");
if($_POST['submitcmt']=="Submit" && $_POST['hdn_btid']!="")
{
    $ipcnt=$frontUserBlogObj->ipCheckingExistornot($_SERVER['REMOTE_ADDR'],'status');
    if($ipcnt>0){
		$callConfig->headerRedirect("relationshipadvice.php?btid=".$_POST['hdn_btid']."&iperr=ipblocked");
		exit;
	} else {
    if($_SESSION['security_code']==$_POST['security_code'] && !empty($_SESSION['security_code']))
	{
 		$frontUserBlogObj->insertelationshipAdviceComments($_POST);
		unset($_SESSION['security_code']);
	}
	else
	{
	  $callConfig->headerRedirect("relationshipadvice.php?btid=".$_POST['hdn_btid']."&msg=unsign");
	  exit;
	}    
	}
}
$start=0;
if($_GET['start']!="")$start=$_GET['start'];
$limit=25;
$relationshipadvicenews=$frontUserBlogObj->getAllRelationshipAdviceList("rid","DESC",$start,$limit);
$total=$frontUserBlogObj->getAllRelationshipAdviceListCount();
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
function relationvalidate()
{
		    var name=trim(document.comm.name.value);
			if(name.length<1)
			{
				alert("Please Enter Your Name");
				document.comm.name.value="";
				document.comm.name.focus();
				return false;
		    }
		
			/*var mail=trim(document.comm.mail.value);
			if(mail.length<1)
			{
				alert("Please Enter Email");
				document.comm.mail.value="";
				document.comm.mail.focus();
				return false;
			}	
			
			var mailreg=/^[a-zA-Z0-9\.\_]+@[a-zA-Z0-9\.\_]+\.[a-zA-Z0-9\.]+$/		
			if(document.comm.mail.value.search(mailreg) == -1){
				alert("Please Enter Valid Email");
				document.comm.mail.value="";
				document.comm.mail.focus();
				return false;
			}*/
			var comment_text=trim(document.comm.comment_text.value);
			if(comment_text.length<1)
			{
				alert("Please Enter Your Request / Suggestion");
				document.comm.comment_text.value="";
				document.comm.comment_text.focus();
				return false;
		    }
			var security_code_text=trim(document.comm.security_code.value);
			if(security_code_text.length<1)
			{
				alert("Please Enter Captcha Code");
				document.comm.security_code.value="";
				document.comm.security_code.focus();
				return false;
		    }
			if(document.comm.agree.checked==false)
			{
				alert("Please select Checkbox");
				document.comm.agree.focus();
				return false;
		    }
			return true;
}

</script>
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
                <td width="697" align="left" valign="top">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td align="left" valign="top" style="padding-left:20px; padding-top:15px">
	<table width="99%" border="0" align="left" cellpadding="2" cellspacing="1">
	<tr>
	<td height="29" align="left" valign="top" class="boldtext">RELATIONSHIP ADVICE</td>
	</tr>
	<?php if($_GET['serr']!=""){?>
	<tr>
	<td align="left" valign="top" class="red_errormessage"><?=$_GET['serr']?></td>
	</tr>
	<?php }?>
    <?php if($_GET['iperr']!=""){?>
	<tr>
	<td align="left" valign="top" class="red_errormessage">Your IP Address has been blocked by Administrator. Please contact administrator for further information.</td>
	</tr>
	<?php }?>
	<?php if ($_GET['msg']=="unsign"){?>
	<tr>
	<td align="left" valign="top" class="red_errormessage">Captcha Code Error. Please Enter Exact Characters.</td>
	</tr>
    <?php }?>
					
	<?php /*?><?php if($_SESSION['frnt_mid']!=""){?><?php */?>
	<tr>
	<td height="29" align="left" valign="top">
	<form action="" method="post" name="comm" id="comm" onsubmit="return relationvalidate();">
	<table width="100%" border="0" align="left" cellpadding="2" cellspacing="0" style="padding-left:3px;">
	<?php /*?><tr>
	<td width="123" height="30" align="left" valign="middle" >Name:</td>
	<td width="533" height="30" align="left" valign="middle"><input name="name" type="text" <?php if($_SESSION['frnt_mid']==""){?>value=""<?php } else  {?>value="<?php echo $_SESSION['frnt_musername']?>" readonly=""<?php }?>  class="text_large required" style="width:270px;"/></td>
	</tr>
	<tr>
	<td height="30" align="left" valign="middle" >Email:</td>
	<td height="30" align="left" valign="middle"><input name="mail" type="text"  <?php if($_SESSION['frnt_mid']==""){?>value=""<?php } else  {?>value="<?php echo $_SESSION['frnt_memail']?>" readonly=""<?php }?> class="text_large required" style="width:270px;"/></td>
	</tr><?php */?>
    <tr>
    <td align="left" valign="middle">Name:</td>
    <td align="left" valign="middle"><input type="text" name="name" value="" /></td>
						</tr>
	<tr>
	<td width="21%" height="30" align="left" valign="top" >Request / Suggestion:</td>
	<td width="79%" height="30" align="left" valign="middle"><textarea name="comment_text" class="text_medium required" style="width:270px; height:120px;"></textarea></td>
	</tr>
	
	<tr>
	<td height="30" align="left" valign="middle" >Captcha:</td>
	<td height="30" align="left" valign="middle"><img src="captcha/CaptchaSecurityImages.php?width=100&amp;height=30&amp;characters=5" /></td>
	</tr>
	<tr>
	<td height="30" align="left" valign="middle" >Captcha Code:</td>
	<td height="30" align="left" valign="middle"><input type="text" name="security_code" id="security_code"  class="text_small required"></td>
	</tr>
	<tr>
	<td height="30" align="left" valign="middle" >&nbsp;</td>
	<td height="50" align="left" valign="middle"><input type="checkbox" name="agree" id="agree">&nbsp;&nbsp;I have read the terms and conditions and agree to abide by them.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 <a href="contentpage_popup.php?pgid=18" rel="fancyvideo" class="morelinks">Click here for Terms & Conditions</a></td>
	</tr>
	<tr>
	<td height="30" align="center" valign="middle">&nbsp;</td>
	<td height="30" align="left" valign="middle"><input type="hidden" name="hdn_btid" value="<?php echo $_GET['btid']?>" ><input type="hidden" name="submitcmt" value="Submit" ><input type="image" src="images/submit_51.png" alt="Submit" >&nbsp;&nbsp;<a href="index.php"><img src="images/cancel_51.png" alt="Reset" border="0"></a>
	</td> 
	</table>
	</form></td>
	</tr>
	
	<?php /*?><?php } else {?>
	<tr>
	<td height="50" align="left" valign="middle">Please login <a href="login.php" class="morelinks">here</a> to send a request</td>
	</tr>
	<?php }?><?php */?>
	</table>
	</td>
	</tr>
	
<tr>
<td align="left" valign="top" style="padding-left:20px; padding-top:15px">
<table width="99%" border="0" align="left" cellpadding="2" cellspacing="1">
			<tr>
			  <td height="29" colspan="2" align="left" valign="top" class="boldtext">Questions & Answers</td>
			</tr>
			<?php 
			$flns=1;
			foreach($relationshipadvicenews as $relationship_advices)
			{
			?>
			<tr class="blue_normaltext">
			  <td align="left" valign="top" ><strong>Q.</strong></td>
			<td align="left" valign="top" ><div align="justify"><?php echo stripslashes($relationship_advices->comments);?></div></td>
			</tr>
				<tr>
				  <td align="left" valign="top" ><strong>A.</strong></td>
			<td align="left" valign="top" class="runningtext"><div align="justify"><?php echo stripslashes($relationship_advices->answers);?></div></td>
			</tr>
			<tr>
    <td align="left" colspan="2" valign="top" class="runningtext" style="text-align:right;">Requested by <strong><?=ucfirst($relationship_advices->name);?></strong> &raquo; <?php echo date("D M d, Y H:i a", strtotime($relationship_advices->postedon)); ?></td>
  </tr>
			<?php if($flns!=sizeof($relationshipadvicenews)){?>
			<tr>
			  <td align="left" valign="top" style="background:url(images/side-images_61.gif); background-repeat:repeat-x; height:1px;"></td>
			<td align="left" valign="top" style="background:url(images/side-images_61.gif); background-repeat:repeat-x; height:1px;"></td>
			</tr>
			<?php 
			}
			$flns++;
			}
			?>
			<?php if($total>$limit)
			{
			?>
			<tr><td align="left" colspan="2">
						<ul class="paginator" style="float:right; margin-left:-25px;">
						<?php 
						$param="";
						if($_GET['btid']!="")
						$param.="&btid=".$_GET['btid'];
						$callConfig->paginavigation_FrontEnd($start, $limit, $total, 'relationshipadvice.php', $param);
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
	
	
	</table>

				</td>
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