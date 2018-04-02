<?php 
include_once("includes/sessions.php");
include('dbconfig.php');
include('administrator/includes/dbconnection.php');
include ('model/contentpages.class.php');
$contentpageObj= new contentpagesClass();
$content=$contentpageObj->getContentPageData($_GET['pgid']);
?>
<link href="styles.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
<tr>
<td align="left" valign="top" colspan="3" height="5"></td>
</tr>
<tr>
<td width="1%" align="left" valign="top" class="boldtext">&nbsp;</td>
<td width="98%" align="left" valign="top" class="boldtext"><?php echo strtoupper(stripslashes($content->title)); ?></td>
<td width="1%" align="left" valign="top" class="boldtext">&nbsp;</td>
</tr>
<tr>
<td align="left" valign="top" class="runningtext">&nbsp;</td>
<td align="left" valign="top" class="runningtext"><?php echo stripslashes($content->content);?></td>
<td align="left" valign="top" class="runningtext">&nbsp;</td>
</tr>
<tr>
<td align="left" valign="top">&nbsp;</td>
<td align="left" valign="top">&nbsp;</td>
<td align="left" valign="top">&nbsp;</td>
</tr>
</table>

