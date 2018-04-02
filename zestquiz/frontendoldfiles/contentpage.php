<?php include("includes/headermeta.php");?>
<?php 
if($_POST['action']=='Send')
{   
    if($_SESSION['security_code']==$_POST['security_code'] && !empty($_SESSION['security_code']))
	{
	$to='info@thesuperteens.com';
	//$to='sastri@themedia3.com';
	$subject = 'Contact form';
	$message = "
	<html>
	<head>
	<title></title>
	<style>                 
	.textbold 
	{
	color:#000000;
	}
	</style>
	</head>
	<body>
	<table cellspacing='0' cellpadding='5'  align='center' width='800' border='1' style='border:1px solid #CCCCCC; border-collapse:collapse'>
	
	<tr>
	<td valign='top' align='right'><strong>Name</strong></td>
	<td valign='top' align='left'>".$_POST['name']."</td>
	</tr>
	
	<tr>
	<td width='28%' align='right' valign='top'><strong>Email</strong></td>
	<td width='72%' align='left' valign='top'>".$_POST['email']."</td>
	</tr>
	<tr>
	<td valign='top' align='right'><strong>Phone Number</strong></td>
	<td valign='top' align='left'>".$_POST['phone']."</td>
	</tr>
	<tr>
	<td valign='top' align='right'><strong>Address </strong></td>
	<td valign='top' align='left'>".$_POST['address']."</td>
	</tr>
	<tr>
	<td valign='top' align='right'><strong>Comments</strong></td>
	<td valign='top' align='left'>".$_POST['comments']."</td>
	</tr>
	<tr>
	<td valign='top' align='right'><strong>IP Address</strong></td>
	<td valign='top' align='left'>".$_SERVER['REMOTE_ADDR']."</td>
	</tr>
	</table>
	</body>
	</html>";
	//echo $message; exit;
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Additional headers
	//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
	$headers .= 'From: The Superteens <info@themedia3.com>' . "\r\n";
	//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
	//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
	if(mail($to, $subject, $message, $headers))
	{
		header("location:thankyou.php?msg=success");
	    exit;
	}
	else
	{
	    header("location:thankyou.php?msg=fail");
		//header("location:".$_POST['hdn_slug'].".html");
		exit;
	}
	}
	else
	{
	  	header("location:thankyou.php?msg=unsign");
	  	exit;
	} 
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
function validatecontactuss(){
		   var title=trim(document.contactform.name.value);
			if(title.length<1)
			{
				alert("Please Enter Name");
				document.contactform.name.focus();
				return false;
		    }
			var email=trim(document.contactform.email.value);
			if(email.length<1)
			{
				alert("Please Enter Email");
				document.contactform.email.focus();
				return false;
		    }
			var comments=trim(document.contactform.comments.value);
			if(comments.length<1)
			{
				alert("Please Enter Comments");
				document.contactform.comments.focus();
				return false;
		    }
			var security_codeerror=trim(document.contactform.security_code.value);
			if(security_codeerror.length<1)
			{
				alert("Please Enter Captcha Code");
				document.contactform.security_code.focus();
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
                                    <td align="left" valign="top" class="boldtext"><?php echo strtoupper(stripslashes($content->title)); ?></td>                                  </tr>
                                  <tr>
                                    <td align="left" valign="top"><span class="runningtext"><?php echo stripslashes($content->content); ?></span><br />
<?php 
if($_GET['pgid']==$contentpageObj->getContentPageSlugnameBasedOnPageId(5))
{
echo $_GET['msg'];
?>
<form action="" name="contactform" method="post" onsubmit="return validatecontactuss();">
<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
<tr>
<td width="55%"><table width="100%" border="0" align="left" cellpadding="2" cellspacing="2">
<tr>
<td width="163" align="left" valign="middle" class="contectText" >Name:</td>
<td width="494" align="left" valign="middle"><input name="name" type="text" id="name" style="width:250px; height:20px;" /></td>
</tr>
<tr>
<td align="left" valign="middle" class="contectText">Email:</td>
<td align="left" valign="middle"><input name="email" type="text" id="email" style="width:250px; height:20px;" /></td>
</tr>
<tr>
<td align="left" valign="middle" class="contectText">Phone Number:</td>
<td align="left" valign="middle"><input name="phone" type="text" id="phone" style="width:250px; height:20px;" /></td>
</tr>
<tr>
<td align="left" valign="top" class="contectText">Address:</td>
<td align="left" valign="middle"><textarea name="address" id="address" style="width:250px; height:100px;"></textarea></td>
</tr>
<tr>
<td align="left" valign="middle" class="contectText">Comments:</td>
<td align="left" valign="middle"><textarea name="comments" id="comments" style="width:250px; height:100px;"></textarea></td>
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
<td align="left" valign="middle">&nbsp;</td>
<td align="left" valign="middle"><input type="hidden" name="hdn_slug" value="<?php echo $_GET['pgid'];?>"  />
<input type="hidden" name="action" value="Send"  /><input type="image" src="images/submit_51.png" alt="Submit" /></td>
</tr>
</table></td>
<?php /*?><td width="1%" align="center" valign="top"><img src="images/Inner-Body-Line_08.png" width="3" height="211" /></td>
<td width="44%" align="left" valign="top"><?php	echo stripslashes($content->content); ?></td><?php */?>
</tr>
</table>
</form>
<?php
									}
									?>
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