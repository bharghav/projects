<?php 
include("includes/headermeta.php");

if(!empty($_SESSION['frnt_mid']))
{
	$var_temp_session= $_SESSION['CART_TEMP_RANDOM'];
	$query=$callConfig->selectQuery(TPREFIX.TBL_ADMIN,'*',"user_id='".$_SESSION['frnt_mid']."'",'','','');
	$userdata=$callConfig->getRow($query);
	$subject = "The Superteens Payment Transaction Mail";
	$from='info@themedia3.com';
	$headers = "From: The Super Teens " . strip_tags($from) . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$message = "<table cellspacing='0' cellpadding='5'  align='center' width='100%' border='0' style='border:1px solid #CCCCCC; border-collapse:collapse; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;'>
	<tr>
	<td  colspan='2' align='left' valign='top'><img src='".SITEURL."/images/logo_03.png' width='284' height='140' ></td>
	</tr>
	<tr>
	<td  colspan='2' align='left' valign='top'><strong>The Superteens Payment Transaction Mail </strong></td>
	</tr>
	<tr>
	<td valign='top' colspan='2' align='left'>Hello <strong>".$email->us_name.",</strong> </td>
	</tr>
	<tr>
	<td valign='top' colspan='2' align='left'>Payment has accepted by the paypal,</td>
	</tr>
	<tr>
	<td valign='top' colspan='2' align='left'>You will get the product in five Business Days.</td>
	</tr>
	<tr>
	<td valign='top' colspan='2' align='left'>Thank You for Purchasing our Product.</td>
	</tr>
	<tr>
	<td valign='top' colspan='2' align='left' height='10'></td>
	</tr>
	<tr>
	<td valign='top' colspan='2' align='left'>Thank You,<br />Support Team, The Superteens</td>
	</tr>
	</table>";
	$ok=mail($userdata->email,$subject,$message,$headers);
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
                                    <td align="left" valign="top" class="boldtext"><?php echo strtoupper("thank you"); ?></td>                                  </tr>
                                  <tr>
                                    <td align="center" valign="middle" height="166" class="red_errormessage">Thanking  you for purchasing The Superteens products...<br />
		we will contact u soon..<br />
		To Continue the Shopping Please <a href="onlinestore.php">Click Here</a> .<br />
		
		</td>
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