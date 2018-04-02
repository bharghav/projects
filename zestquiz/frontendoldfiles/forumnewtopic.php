<?php include("includes/headermeta.php");
/*include ('model/forum.class.php');
$forumObj= new fourmClass();*/
if($_POST['ftopic']=="Insert"){
$ipcnt=$frontUserBlogObj->ipCheckingExistornot($_SERVER['REMOTE_ADDR'],'status');
	if($ipcnt>0){
	    $callConfig->headerRedirect("forumtopics.php?fscid=".$_POST['fscid']."&iperr=ipblocked");
	} else {
		$forumObj->insertForumTopic($_POST);
	}
}
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
function validateuserforumtopic(){
 var nameperi=trim(document.newforumform.name.value);
			if(nameperi.length<1)
			{
				alert("Please Enter Your Name");
				document.newforumform.name.focus();
				document.newforumform.name.value="";
				return false;
		    }
		   var title=trim(document.newforumform.title.value);
			if(title.length<1)
			{
				alert("Please Enter Title");
				document.newforumform.title.focus();
				return false;
		    }
			if(trim(document.newforumform.bigtext.value)=="")
			{
				alert("Please Enter Content");
				document.newforumform.bigtext.value="";
				document.newforumform.bigtext.focus();
				return false;
		    }
			if(document.newforumform.agree.checked==false)
			{
				alert("Please select Checkbox");
				document.newforumform.agree.focus();
				return false;
		    }
		return true;	
}
</script>

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
                    <td align="left" valign="top" height="25"><a href="forumhome.php" class="morelinks"><strong>Home</strong></a>&nbsp;&nbsp;<strong>/</strong>&nbsp;&nbsp;<a href="forumtopics.php?fscid=<?=$_GET['fscid'];?>" class="morelinks"><strong>Topics</strong></a></td>
					</tr>
				<tr>
				<td align="left" valign="top" style="background-color:#1087b2; padding:5px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
				<td  align="left" valign="top" ><table width="100%" border="0" align="left" cellpadding="1" cellspacing="1">
				<tr>
				<td width="659" height="25" align="left" valign="middle" style="padding-left:5px;" class="forumheading">Post A New Topic</td>
				</tr>
				<tr style="background:#FEFFED;">
				<td  align="left" valign="top"  style="padding-left:5px;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"> 
					<form method="post" name="newforumform" action="" onsubmit="return validateuserforumtopic();">
					<table width="100%" border="0" align="left" cellpadding="2" cellspacing="2">
                      <tr>
                        <td colspan="3"  align="left" valign="top" height="5"></td>
                        </tr>
                        <tr>
                        <td width="1%"  align="left" valign="top" >&nbsp;</td>
                        <td width="13%"  align="left" valign="top" ><strong>Name: </strong></td>
                        <td width="86%"  align="left" valign="top" ><input type="text" name="name" value=""  class="text_large" ></td>
                      </tr>
                      <tr>
                        <td width="1%"  align="left" valign="top" >&nbsp;</td>
                        <td width="13%"  align="left" valign="top" ><strong>Subject / Title : </strong></td>
                        <td width="86%"  align="left" valign="top" ><input type="text" name="title" value=""  class="text_large" style="width:700px;"></td>
                      </tr>
                      <tr>
                        <td  align="left" valign="top" >&nbsp;</td>
                        <td  align="left" valign="top" ><strong>Content : </strong></td>
                        <td  align="left" valign="top" ><textarea name="bigtext" class="textarea_install" style="height:350px;"></textarea></td>
                      </tr>
					  <tr>
                        <td  align="left" valign="top" >&nbsp;</td>
                        <td  align="left" valign="top" >&nbsp;</td>
                        <td  align="left" valign="top" ><input type="checkbox" name="agree" id="agree">&nbsp;&nbsp;I have read the terms and conditions and agree to abide by them.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 <a href="contentpage_popup.php?pgid=17" rel="fancyvideo" class="morelinks">Click here for Terms & Conditions</a></td>
                      </tr>
					  <tr>
                        <td  align="left" valign="top" >&nbsp;</td>
                        <td  align="left" valign="top" >&nbsp;</td>
                        <td  align="left" valign="top" ><input type="hidden" name="fscid" value="<?=$_GET['fscid'];?>"><input type="hidden" name="ftopic" value="Insert"><input type="image" src="images/submit_51.png" name="submit" alt="Submit" value="">&nbsp;&nbsp;&nbsp;<a href="forumtopics.php?fscid=<?=$_GET['fscid'];?>"><img src="images/cancel_51.png"  border="0"/></a></td>
                      </tr>
                    </table>
					</form>
					</td>
                  </tr>
				  <tr>
                    <td align="left" valign="top" style="padding:2px;"></td></tr>
                </table></td>
				</tr>
				</table></td>
				</tr>
				</table></td>
				</tr>
				<tr>
				<td align="left" valign="top" style="padding:2px;"></td>
				</tr>
				 
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