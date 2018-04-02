<?php include("includes/headermeta.php");?>
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
			<table width="99%" border="0" align="left" cellpadding="2" cellspacing="1">
			<?php 
			$bannerindivdata=$contentpageObj->getBannersIndivData($_GET['hmbid']);
			list($width,$height)=getimagesize("uploads/baner_gallery/".$bannerindivdata->image);
			if($height>420)
			$height=420;
			else
			$height=$height;
			if($width>600)
			$width=645;
			else
			$width=$width;
			?>
			<tr>
			<td height="29" align="left" valign="top" class="boldtext"><?php echo strtoupper(stripslashes($bannerindivdata->title));?></td>
			</tr>
			<tr>
			<td align="left" valign="top" class="runningtext"><img src="uploads/baner_gallery/<?php echo $bannerindivdata->image;?>" width="<?=$width?>" height="<?=$height?>" ></td>
			</tr>
			<tr>
			<td align="left" valign="top" class="runningtext"><div align="justify"><?php echo stripslashes($bannerindivdata->img_desc);?></div></td>
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