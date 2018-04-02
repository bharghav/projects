<script type="text/javascript">
function trim(stringToTrim)
{
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}
function validateloginform()
{
	if(document.loginform.txt_username.value==" User Name")
	{
		alert("Please Enter User Name");
		document.loginform.txt_username.value="";
		document.loginform.txt_username.focus();
		return false;
	}
	if(document.loginform.txt_pwd.value==" Password")
	{
		alert("Please Enter Password");
		document.loginform.txt_pwd.value="";
		document.loginform.txt_pwd.focus();
		return false;
	}
return true;
}
</script>
<a name="lg"></a><?php 
if($_POST['login']=="check"){
$frontuserObj->checkMemberLogin();
}
?>
<?php
if($_SESSION['frnt_mid']==""){?>
<form method="post" action="" name="loginform" onsubmit="return validateloginform();">
<table width="95%" border="0" cellspacing="0" cellpadding="0">
<!--<tr>
<td align="left" valign="top"><img src="images/login_42.gif" width="246" height="17" /></td>
</tr>-->
<tr>
<td align="left" valign="middle"><strong class="boldtext">LOGIN</strong></td>
</tr>
<tr>
<td align="left" valign="middle" ><hr class="boldtext_hr"/></td>
</tr>
<?php if($_GET['errmsg']!=""){?>
<tr>
<td height="30" align="left" valign="top" class="red_errormessage"><?php echo $_GET['errmsg'];?></td>
</tr>
<?php } ?>
<tr>
<td height="33" align="left" valign="middle"><input type="text" onblur="if(this.value==''){value=' User Name'}" onfocus="if(this.value==' User Name'){value=''}" value=" User Name" alt=" User Name" name="txt_username" id="txt_username" autocomplete="off" class="form"></td>
</tr>
<tr>
<td height="33" align="left" valign="middle"><input onblur="if(this.value==''){value=' Password'; type='text'}" onfocus="if(this.value==' Password'){value=''; type='password'}" value=" Password" alt=" password"  name="txt_pwd" autocomplete="off" id="txt_pwd" class="form"></td>
</tr>
<tr>
<td height="33" align="right" valign="middle"><input type="hidden" name="login" value="check"><input type="image" src="images/side-images_57.gif" width="51" height="21" border="0" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
<td align="right" valign="top"><table width="50%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="17%" align="center" valign="top"><a href="<?php echo $helpURL;?>" class="morelink">Help</a></td>
<td width="83%" align="center" valign="top"><a href="registeration.php" class="morelink">New User</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
</table></td>
</tr>
</table>
</form>
<?php } else {?>
<table width="95%" border="0" cellspacing="0" cellpadding="0">
<!--<tr>
<td align="left" valign="top"><img src="images/login_42.gif" width="246" height="17" /></td>
</tr>-->
<tr>
<td align="left" valign="middle"><strong class="boldtext">LOGIN</strong></td>
</tr>
<tr>
<td align="left" valign="middle" ><hr class="boldtext_hr"/></td>
</tr>
<tr>
<td align="left" valign="top" height="5"></td>
</tr>
<tr>
<td height="25" align="left" valign="top"><a href="userprofile.php" class="morelinks" title="My Profile"><img src="images/myaccount_07.png" width="88" height="10" border="0"  alt="My Profile"/></a></td>
</tr>
<tr>
<td height="25" align="left" valign="top"><a href="userchangepassword.php" class="morelinks" title="Logout"><img src="images/Change-Password_13.png" border="0" alt="Change Password" /></a></td>
</tr>
<tr>
<td height="25" align="left" valign="top"><a href="logout.php" class="morelinks" title="Logout"><img src="images/myaccount_09.png" width="56" height="10" border="0" alt="Logout" /></a></td>
</tr>
</table>
<?php }?>