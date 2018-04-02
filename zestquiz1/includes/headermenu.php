
<?php 
if($pg_id==1)
$mainmneuURL="index.php";
$AboutURL=$contentpageObj->getContentPageSlugnameBasedOnPageId(2).".html";
$ourvisionURL=$contentpageObj->getContentPageSlugnameBasedOnPageId(3).".html";
$contactURL=$contentpageObj->getContentPageSlugnameBasedOnPageId(5).".html";
$helpURL=$contentpageObj->getContentPageSlugnameBasedOnPageId(16).".html";
$termsstroreURL=$contentpageObj->getContentPageSlugnameBasedOnPageId(19).".html";
$returnURL=$contentpageObj->getContentPageSlugnameBasedOnPageId(20).".html";
?>
<table width="699" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="middle"><a href="index.php" class="buttons" title="The Superteens Home">HOME</a></td>
    <td align="center" valign="middle"><img src="images/buttons-bg_27.jpg" width="2" height="36" /></td>
    <td align="center" valign="middle"><a href="<?php echo $AboutURL;?>" class="buttons" title="The Superteens About Us">ABOUT US</a></td>
    <td align="center" valign="middle"><img src="images/buttons-bg_27.jpg" width="2" height="36" /></td>
    <td align="center" valign="middle"><a href="<?php echo $ourvisionURL;?>" class="buttons" title="The Superteens Our Vision">OUR VISION</a></td>
    <td align="center" valign="middle"><img src="images/buttons-bg_27.jpg" width="2" height="36" /></td>
    <td align="center" valign="middle"><a href="onlinestore.php" class="buttons" title="The Superteens Online Store">ONLINE STORE</a></td>
    <td align="center" valign="middle"><img src="images/buttons-bg_27.jpg" width="2" height="36" /></td>
    <td align="center" valign="middle"><a href="<?php echo $contactURL;?>" class="buttons" title="The Superteens Contact">CONTACT</a></td>
  </tr>
</table>