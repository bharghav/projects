<?php 
include("includes/headermeta.php");
include("includes/page_redirection.php");
if($_POST['action']=="changehere" && $_POST['txt_username']!=""){
$frontuserObj->userPasswordChanging($_POST);
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
function userpwdform_validate()
{
	if(trim(document.regform.txt_username.value)=="")
	{ 
		alert("Please enter User Name");
		document.regform.txt_username.value='';
		document.regform.txt_username.focus();
		return false;
	}
	if(trim(document.regform.txt_oldpwd.value)=="")
	{ 
		alert("Please enter Old Password");
		document.regform.txt_oldpwd.value='';
		document.regform.txt_oldpwd.focus();
		return false;
	}
	if(trim(document.regform.txt_newpwd.value)=="")
	{ 
		alert("Please enter New Password");
		document.regform.txt_newpwd.value='';
		document.regform.txt_newpwd.focus();
		return false;
	}
	if(trim(document.regform.txt_cnfnewpwd.value)=="")
	{ 
		alert("Please enter Confirm Password");
		document.regform.txt_cnfnewpwd.value='';
		document.regform.txt_cnfnewpwd.focus();
		return false;
	}
	if(trim(document.regform.txt_cnfnewpwd.value)!=trim(document.regform.txt_newpwd.value))
	{ 
		alert("Please enter Password and Confirm Password Same");
		document.regform.txt_cnfnewpwd.value='';
		document.regform.txt_cnfnewpwd.focus();
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
								  <?php if($_GET['ferr']!=""){?>
								  <tr>
                                    <td align="left" valign="top" class="red_errormessage"><?=$_GET['ferr']?></td></tr>
                                  <tr>
								  <?php }?>
                                    <td align="left" valign="top">
									<form method="post" action="" name="regform" onSubmit="return userpwdform_validate();">
									<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                                      <tr>

                                        <td width="24%" height="28" align="left" valign="middle" >User Name :</td>
                                        <td width="76%" height="28" align="left" valign="middle"><input type="text"  name="txt_username" value="" class="text_large required" style="width:240px;" >
										</td>
                                      </tr>
									   <tr>

                                        <td width="24%" height="28" align="left" valign="middle" >Old Password:</td>
                                        <td width="76%" height="28" align="left" valign="middle"><input type="password"  name="txt_oldpwd" value="" class="text_large required" style="width:240px;" >
										</td>
                                      </tr>
									   <tr>

                                        <td width="24%" height="28" align="left" valign="middle" >New Password:</td>
                                        <td width="76%" height="28" align="left" valign="middle"><input type="password"  name="txt_newpwd" value="" class="text_large required" style="width:240px;">
										</td>
                                      </tr>
									   <tr>

                                        <td width="24%" height="28" align="left" valign="middle" >Confirm New Password:</td>
                                        <td width="76%" height="28" align="left" valign="middle"><input type="password"  name="txt_cnfnewpwd" value="" class="text_large required" style="width:240px;">
										</td>
                                      </tr>
									 
  <tr>
<td align="left" valign="middle" colspan="2" height="10"></td>
</tr>                                    
<tr>
<td height="28" align="left" valign="middle"></td>
<td height="28" align="left" valign="middle"><input type="hidden" name="action" value="changehere"><input type="image" src="images/submit_51.png" value="Register"></td>
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