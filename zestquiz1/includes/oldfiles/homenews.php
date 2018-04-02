<?php 
$latestnews=$contentpageObj->getAllNeweventsList("id","DESC","0","3");
?>
<table width="95%" border="0" cellspacing="0" cellpadding="0">
<!--<tr>
<td align="left" valign="top"><img src="images/side-images_65.gif" width="244" height="17" /></td>
</tr>-->
<tr>
<td align="left" valign="middle"><strong class="boldtext">NEWS</strong></td>
</tr>
<tr>
<td align="left" valign="middle" ><hr class="boldtext_hr"/></td>
</tr>
<?php foreach($latestnews as $latest_news)
{
?>
<tr>
<td align="left" valign="top" class="runningtext"><strong><?php echo date("d M Y", strtotime($latest_news->date)); ?></strong><br /><a href="indivnews.php?newsid=<?=$latest_news->id?>" class="morelink"><?php echo substr($latest_news->bigtext,0,88);?></a></td>
</tr>
<tr>
<td align="left" valign="top" height="10"></td>
</tr>
<?php 
}
?>
<tr>
<td align="right" valign="top"><a href="allnews.php" class="morelink">++More</a></td>
</tr>
</table>