<?php 
include("includes/headermeta.php");
$start=0;
if($_GET['start']!="")$start=$_GET['start'];
$limit=20;
$latestnews=$contentpageObj->getAllNeweventsList("id","DESC",$start,$limit);
$total=$contentpageObj->getAllNeweventsListCount();
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
			<table width="99%" border="0" align="left" cellpadding="2" cellspacing="1">
			<tr>
			<td height="29" align="left" valign="top" class="boldtext">NEWS</td>
			</tr>
			<?php 			
			if(sizeof($latestnews)>0)
			{
			$flns=1;
			foreach($latestnews as $latest_news)
			{
			?>
			<tr>
			<td align="left" valign="top" class="runningtext"><strong><?php echo date("d M Y", strtotime($latest_news->date)); ?></strong></td>
			</tr>
			<tr>
			<td align="left" valign="top" class="runningtext"><?php echo stripslashes($latest_news->bigtext);?></td>
			</tr>
			<?php if($flns!=sizeof($latestnews)){?>
			<tr>
			<td align="left" valign="top" style="background:url(images/side-images_61.gif); background-repeat:repeat-x; height:1px;"></td>
			</tr>
			<?php 
			}
			$flns++;
			}
			}
			?>
			<?php if($total>$limit)
			{
			?>
			<tr><td align="left">
			<ul class="paginator" style="float:right; margin-left:-25px;">
			<?php 
			$param="";
			$callConfig->paginavigation_FrontEnd($start, $limit, $total, 'allnews.php', $param);
			?>
			</ul>
			</td>
			</tr>
			<?php 
			}
			?>
			
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