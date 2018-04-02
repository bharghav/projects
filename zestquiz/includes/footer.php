<table width="1004" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top"><img src="images/grey-bg_143.jpg" width="1004" height="16" /></td>
      </tr>
      <tr>
        <td align="center" valign="top">
		<p class="footertext">
		<div style="width:850px;" class="footertext">
			<?php 
			$homebloglist=$frontUserBlogObj->getAllBlogTopicsList('0','home','disp_order','ASC',0,12);
			$fib=1;
			foreach($homebloglist as $homeblog_list)
			{
			$makehomecaturl="homeindivtopic.php?btid=".$homeblog_list->id;
			if($homeblog_list->id==4)
			$makehomecaturl="relationshipadvice.php?btid=".$homeblog_list->id;
			if($homeblog_list->id==9)
			$makehomecaturl="onlinestore.php";
			/*if($fib!=sizeof($homebloglist))
			$con="&nbsp;&nbsp;|&nbsp;&nbsp;";
			if($fib==sizeof($homebloglist) || $fib==(sizeof($homebloglist)-2))
			$con="";*/
			if($fib!=sizeof($homebloglist))
			$con="&nbsp;&nbsp;|&nbsp;&nbsp;";
			else
			$con="";
			?>
			<a href="<?=$makehomecaturl?>" class="footerlinks"><?php echo stripslashes($homeblog_list->title);?></a><?=$con?>
			<?php
			$fib++;
			}
			?>
			</div>
			</p>
			<p class="footertext"><a  href="<?=$termsstroreURL?>"  class="footerlinks">Terms & Conditions</a> | 
			<a  href="<?=$returnURL?>"  class="footerlinks">Refund Policy</a></p>
			<p class="footertext"><?php echo stripslashes($sitedata->footer_txt);?></p>
			<p class="footertext">Powered by <a href="http://themedia3.com"  class="footerlinks"  target="_blank">The Media3</p>
			</td>
      </tr>
    </table>