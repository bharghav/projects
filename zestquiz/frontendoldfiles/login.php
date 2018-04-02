<?php 
include("includes/headermeta.php");
if($_POST['action']=="loginhere" && $_POST['txt_username']!="" && $_POST['txt_pwd']!=""){
$frontuserObj->checkMemberLogin();
}
?>
<style type="text/css">
<!--
body {
	background-image: url(images/mainBg.jpg);
	background-repeat: no-repeat;
	background-position:center top;
}
-->
</style>
<script type="text/javascript">
function trim(stringToTrim)
{
return stringToTrim.replace(/^\s+|\s+$/g,"");
}
function loginfrom_validate()
{
	if(trim(document.regform.txt_username.value)=="")
	{ 
		alert("Please enter User Name");
		document.regform.txt_username.value='';
		document.regform.txt_username.focus();
		return false;
	}
	if(trim(document.regform.txt_pwd.value)=="")
	{ 
		alert("Please enter Password");
		document.regform.txt_pwd.value='';
		document.regform.txt_pwd.focus();
		return false;
	}
return true;
}
</script>
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
                    <td align="left" valign="top" style="padding-left:20px; padding-top:15px"><table width="100%" border="0" align="left">
                                  <tr>
                                    <td align="left" valign="top" class="boldtext">LOGIN</td></tr>
                                  <tr>
								  <?php if($_GET['err']!="" || $_GET['ferr']!=""){?>
								  <tr>
                                    <td align="left" valign="top" class="red_errormessage"><?=$_GET['err']?><?=$_GET['ferr']?></td></tr>
                                  <tr>
								  <?php }?>
                                    <td align="left" valign="top">
									<form method="post" action="" name="regform" onSubmit="return loginfrom_validate();">
									<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                                      <tr>

                                        <td width="24%" height="28" align="left" valign="middle" >User Name :</td>
                                        <td width="76%" height="28" align="left" valign="middle"><input type="text"  name="txt_username" value="" class="text_large required" style="width:240px;" onChange="checkingUserUnique(this.value);" autocomplete="off">
										<span id="msgdiv_username" class="red_errormessage" style="width:300px;"></span>										</td>
                                      </tr>
                                      <tr>
                                        <td height="28" align="left" valign="middle" >Password :</td>
                                        <td height="28" align="left" valign="middle"><input type="password" name="txt_pwd" value="" class="text_large required" style="width:240px;"></td>
                                      </tr>
									 
  <tr>
<td align="left" valign="middle" colspan="2" height="10"></td>
</tr>                                    
<tr>
<td height="28" align="left" valign="middle"></td>
<td height="28" align="left" valign="middle"><input type="hidden" name="red" value="<?=$_GET['red'];?>"><input type="hidden" name="action" value="loginhere"><input type="image" src="images/submit_51.png" value="Register"></td>
</tr>
<tr>
<td height="28" align="left" valign="middle"></td>
<td height="28" align="left" valign="middle"><a href="registeration.php" class="morelink">New User ?</a>&nbsp;&nbsp;<a href="forgotpassword.php" class="morelink">Forgot Password ?</a></td>
</tr>

  </table>
									</form></td>
                                  </tr>
                                </table>
</td>
                  </tr>
                </table></td>
                <td width="2" align="left" valign="top"><img src="images/line_35.gif" width="2" height="902" /></td>
                <td align="left" valign="top" style="padding-top:15px; padding-left:10px; padding-right:10px"><?php include("includes/homerightnav.php");?></td>
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