<?php
if($_POST['emailid']!="")
{
$frontuserObj->subscriberInsert($_POST);
}
?>
<script type="text/javascript">
function trim(stringToTrim)
{
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}
function subscribevalidate()
{
			
			if(trim(document.subscribeform.emailid.value)=="" || document.subscribeform.emailid.value=="Email Address")
			{
				alert("Please enter email address");
				document.subscribeform.emailid.focus();
				return false;
			}	
			
			var emailreg=/^[a-zA-Z0-9\.\_]+@[a-zA-Z0-9\.\_]+\.[a-zA-Z0-9\.]+$/		
			if(document.subscribeform.emailid.value.search(emailreg) == -1){
				alert("Please enter valid email address");
				document.subscribeform.emailid.focus();
				return false;
			}

}

</script>
<form method="post" name="subscribeform" action="" onSubmit="return subscribevalidate();">
<table width="95%" border="0" cellspacing="0" cellpadding="0">
                     <!-- <tr>
                        <td align="left" valign="top"><img src="images/side-images_132.gif" width="206" height="10" /></td>
                      </tr>-->
					  <tr>
<td align="left" valign="middle"><strong class="boldtext">NEWSLETTER SUBSCRIBE</strong></td>
</tr>
<tr>
<td align="left" valign="middle" ><hr class="boldtext_hr"/></td>
</tr>
					  <a name="ltr"></a>
					    <?php 
						if($_GET['snwserr']!="")
						{
						?>
						<tr>
                        <td align="left" valign="top" class="red_errormessage">User Subscribed successfully</td>
                      </tr>
						<?php 
						}
						?>
						<?php 
						if($_GET['fnwserr']!="")
						{
						?>
						<tr>
                        <td align="left" valign="top" class="red_errormessage">User Subscription failed</td>
                      </tr>
						<?php 
						}
						?>
						<tr>
                        <td align="left" valign="top" height="5"></td></tr>
                      <tr>
                        <td align="left" valign="top" style="padding-bottom:15px">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="180" height="37" align="center" valign="middle" style="background-image:url(images/form2_136.gif); background-repeat:no-repeat"><input name="emailid" type="text" class="form2" id="emailid" onblur="if(this.value==''){value='Email Address'}" onfocus="if(this.value=='Email Address'){value=''}" value="Email Address"/></td>
                            <td align="left" valign="top"><input type="image" src="images/form2_137.gif" width="85" height="37" /></td>
                          </tr>
                        </table>
						</td>
                      </tr>
                    </table>
</form>					