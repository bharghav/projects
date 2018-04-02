<?php 
include('includes/session.php'); ?>
<script type="text/javascript">
function checkall()
{
	if(document.getElementById('chckall').checked==true)
	{
		void(d=document);
		void(el=d.getElementById('tablenames'));
		for(i=0;i<el.length;i++)
		void(el[i].selected=1)
	} else {
		void(d2=document);
		void(e2=d2.getElementById('tablenames'));
		for(i=0;i<el.length;i++)
		void(el[i].selected=0)
	}
}
</script>

<div class="box">
    <div class="heading">
      <h1><img src="allfiles/category.png" alt="">Database Backup</h1>
    </div>
    <div class="content">
      <form action="dbdownload.php" method="post" id="frmgetDB" name="frmgetDB" class="middle_form" onsubmit="return validate();">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td width="14%" align="left" valign="top"><p><label class="title">Tables: </label></p></td>
	<td width="86%" align="left" valign="middle">
	<select name="tablenames[]" id="tablenames" class="select_large required" multiple="multiple" style="height:200px;">
	<?php
	$result=sitesettingsClass::getTotalDatabaseTables();
	$dbname="Tables_in_".DBNAME;
		foreach($result as $alltables)
		{
		?>
		<option value="<?=$alltables->$dbname?>"><?=$alltables->$dbname?></option>
		<?php
		}
	?>
	</select>
		<input type="checkbox" onClick="checkall()" value="Select All" id="chckall">Select All / Unselect All
</td>
	</tr>
	<tr>
	<td height="10" colspan="2" align="left" valign="middle"></td>
	</tr>
	<tr>
	<td align="left" valign="middle"><p><label class="title">&nbsp;</label><input value="sitedatabase" type="hidden"  name="submit"><input value="" class="button button_save" type="submit"  name="submitbutton"><!--&nbsp;&nbsp;&nbsp;Select atleast one table name--></p></td>
	<td align="left" valign="middle">&nbsp;</td>
	</tr>
	</table>
</form>
    </div>
  </div>