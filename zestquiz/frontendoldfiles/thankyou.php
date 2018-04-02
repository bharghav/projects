<?php include("includes/headermeta.php");?>
<?php 

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
                    <td align="left" valign="top" style="padding-left:20px; padding-top:15px">
					<?php if($_GET['msg']=="success") {?>
					<table width="100%" border="0" align="left">
                                  <tr>
                                    <td align="left" valign="top" class="boldtext"><?php echo strtoupper("thank you"); ?></td>                                  </tr>
                                  <tr>
                                    <td align="center" valign="middle" height="166" class="red_errormessage">Thank you. Your message sent successfully, we will respond you soon.. </td>
                                  </tr>
                                </table>
								<?php } if($_GET['msg']=="fail") {?>
								<table width="100%" border="0" align="left">
                                  <tr>
                                    <td align="left" valign="top" class="boldtext"><?php echo strtoupper("Failed"); ?></td>                                  </tr>
                                  <tr>
                                    <td align="center" valign="middle" height="166" class="red_errormessage">Your message sending failed,Please try again..</td>
                                  </tr>
                                </table>
								<?php } if($_GET['msg']=="unsign") {?>
								<table width="100%" border="0" align="left">
                                  <tr>
                                    <td align="left" valign="top" class="boldtext"><?php echo strtoupper("Captcha Code Error"); ?></td>                                  </tr>
                                  <tr>
                                    <td align="center" valign="middle" height="166" class="red_errormessage">Captcha Code Error. Please Enter Exact Characters.</td>
                                  </tr>
                                </table>
								<?php } ?>
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