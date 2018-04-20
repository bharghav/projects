<?php /*?><table width="1004" border="0" cellspacing="0" cellpadding="0">
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
			$con="";
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
    </table><?php */?>

    		<div class="footer row align-center">
			<span class="icon-logo"></span>
			<div class="clear footer-menu">
				<a href="javascript:void(0)">Terms & Conditions</a> | <a href="javascript:void(0)">Contact Us</a> | <a href="javascript:void(0)">Pricing & Information</a>
			</div>
			<p>Copyright © 2018 zestquiz.com All Rights Reserved</p>
		</div>
		<div class="data-popup">
			<div class="popup-head"><h3 class="title">Popup-title</h3> <span class="icon-close">X</span></div>
			<div class="popup-content">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			</div>
		</div>
		<div class="signup-popup">
			<div class="popup-head"><h3 class="title">Sign Up</h3> <span class="icon-close">X</span></div>
			<div class="popup-content align-center">
				<div class="field">
					<label>Full Name</label>
					<input type="text" placeholder="First name & Last Name" class="textbox"/>
				</div>
				<br/>
				<div class="field">
					<label>Phone Number</label>
					<input type="number" placeholder="Mobile number" class="textbox"/>
				</div>
				<br/>
				<div class="field">
					<label>Email</label>
					<input type="email" placeholder="Your mail address" class="textbox"/>
				</div>
			</div>
			<div class="popup-footer align-center">
				<a href="" class="button primary">Create Account</a>
				<br/>
				<a href="" class="text-link">Cancel</a>
			</div>
		</div>
	</div>
	<script src="js/jquery-3.2.1.js" type="text/javascript"></script>
	<script src="js/common.js" type="text/javascript"></script>
</body>
</html>