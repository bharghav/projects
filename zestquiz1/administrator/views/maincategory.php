<?php 
include('includes/session.php');
include("model/contentpages.class.php");
$contentpageObj=new contentpagesClass();
if($_GET['action']=="delete"){
   $contentpageObj->MainmenuDelete($_GET['id']);
}
if($_POST['admininsert']=="Submit"){
   $contentpageObj->insertMainmenu($_POST);
}
if($_POST['admininsert']=="Update"){
   $contentpageObj->updateMainmenu($_POST);
}
if(isset($_GET['id']) && $_GET['id']!=""){
   $hdn_value="Update";
   $indivdata=$contentpageObj->getMainmenuData($_GET['id']); 
   $hdn_in_up='class="button button_save"';
} else { 
  $hdn_value="Submit";
  $hdn_in_up='class="button button_add"';
}
$start=0;
if($_GET['start']!="")
$start=$_GET['start'];
if($site_settings_disp->noofrecords!="0")
$limit=$site_settings_disp->noofrecords;
else
$limit=1;
if($_GET['fld']!="")
$fldname=$_GET['fld'];
else
$fldname="disp_order";
if($_GET['ord']!="")
$orderby=$_GET['ord'];
else
$orderby="ASC";
$allmainmenus=$contentpageObj->getAllMainmenuList($fldname,$orderby,$start,$limit);
$total=$contentpageObj->getAllMainmenuListCount();

if($option!="com_mainmenulist_insert"){
?>
<div class="box">
<div class="heading">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="middle"><h1><img src="allfiles/map.jpeg" alt=""> Main Menu</h1></td>
<td align="right" valign="bottom"><input class="button button_add" value="" type="button" onclick="window.location.href='index.php?option=com_mainmenulist_insert';"></td>
</tr>
</table>
</div>
<div class="content">
	 <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list">
          <thead>
            <tr height="25">
              <td width="20" align="center" valign="middle">sno</td>
			   <td width="290" align="left" valign="middle" >title</td>
              <td width="808" align="left" valign="middle" class="sort">
					<div >
					<a href="index.php?option=com_mainmenulist&ord=ASC&fld=title" class="up" title="up"></a>
					<a href="index.php?option=com_mainmenulist&ord=DESC&fld=title" class="down" title="down"></a>
					</div>
</td>
<td width="290" align="left" valign="middle" >Display Order</td>
              <td width="808" align="left" valign="middle" class="sort">
					<div >
					<a href="index.php?option=com_mainmenulist&ord=ASC&fld=disp_order" class="up" title="up"></a>
					<a href="index.php?option=com_mainmenulist&ord=DESC&fld=disp_order" class="down" title="down"></a>
					</div>
</td>

			 
              <td width="35" align="center" valign="middle" >Edit</td>
			  <td width="35" align="center" valign="middle" >Delete</td>
            </tr>
          </thead>
			<tbody>
			<?php
			if(sizeof($allmainmenus)>0){
					$ii=0;
					foreach($allmainmenus as $all_mainmenus){
					?>
			<tr height="22">
			<td align="center" valign="middle"><?=($ii+1);?></td>
			<td colspan="2" align="left" valign="middle"><?php echo $all_mainmenus->title;?></td>
			<td colspan="2" align="left" valign="middle"><?php echo $all_mainmenus->disp_order;?></td>
			<td align="center" valign="middle"x><a title="edit" href="index.php?option=com_mainmenulist_insert&id=<?php echo $all_mainmenus->id;?>"><img src="allfiles/icon_edit.png" alt="Edit" border="0"></a></td>
			<td align="center" valign="middle">
						<a title="delete" href="#" onClick="var q = confirm('Are you sure you want to delete selected record?'); if (q) { window.location = 'index.php?option=com_mainmenulist&action=delete&id=<?php echo $all_mainmenus->id;?>'; return false;}"><img src="allfiles/icon_delete.png"  alt="Delete" border="0"/></a>
						</td>
			</tr>
			<?php
				$ii++; } } else{
			?>
							<tr><td colspan="9" align="center" height="100">No Records..</td></tr>
			<?php 
			}
			?>
			</tbody>
						<tr><td colspan="10" align="left">
						<?php if($total>$limit)
			{
			?>
			<ul class="paginator" style="float:right; margin-left:-25px;">
			<?php 
			$param="";
			if($_GET['ord']!="")
			$param.="&ord=".$_GET['ord'];
			if($_GET['ord']!="")
			$param.="&fld=".$_GET['fld'];
			$callConfig->paginavigation($start, $limit, $total, 'index.php?option=com_mainmenulist', $param);
			?>
			</ul>
			<?php 
			}
			?></td></tr>		

      </table>
	
	</div>
  </div>
 <?php } else {?>
<script type="text/javascript">
function trim(stringToTrim)
{
return stringToTrim.replace(/^\s+|\s+$/g,"");
}
function validate()
{
	if(trim(document.frmCreatestate.title.value)=="")
	{ 
		alert("Please enter Page Title");
		document.frmCreatestate.title.value='';
		document.frmCreatestate.title.focus();
		return false;
	}
	if(document.getElementById('div_error').innerHTML!=null && document.getElementById('div_error').innerHTML!="")
	{
	document.getElementById('div_error').innerHTML='State name exist, please change';
	document.frmCreatestate.title.focus();
	document.frmCreatestate.title.select;
	return false;
	}
	if(trim(document.frmCreatestate.disp_order.value)=="")
	{ 
		alert("Please enter Display Order");
		document.frmCreatestate.disp_order.value='';
		document.frmCreatestate.disp_order.focus();	
		return false;
	}
document.frmCreatestate.submit();
return true;
}
function checkingStateUnique(title,currentid)
{
	jQuery.ajax({
		type: "POST",
		url: "ajax_city_state.php",
		data: "title="+title+"&type=statecheck&currentid="+currentid,
		success: function(msg){
		jQuery("#div_error").html(msg);		
		}
	});
}
</script>
 <div class="box">
<div class="heading">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="middle"> <h1><img src="allfiles/map.jpeg" alt=""> Add Main Menu &nbsp;&nbsp;/&nbsp;&nbsp; Edit Main Menu</h1></td>
<td align="right" valign="bottom">&nbsp;</td>
</tr>
</table>
</div>
<div class="content">
<form action="index.php?option=com_mainmenulist_insert" method="post" id="frmCreatestate" name="frmCreatestate" class="middle_form">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
                <td width="6%" align="left" class="caption-field"><label class="title">Title:</label></td>
                <td width="94%" align="left" valign="middle"><input name="title" id="title" class="text_medium required" type="text" value="<?php echo  $indivdata->title;?>" onchange="checkingStateUnique(this.value,'<?php echo $indivdata->id;?>');" autocomplete="off"/>
				<div id="div_error" class="rederror"></div>
				</td>
			  </tr>
			   <tr><td colspan="2" height="7"></td></tr>
			   <tr>
                <td width="6%" align="left" class="caption-field"><label class="title">Display Order:</label></td>
                <td width="94%" align="left" valign="middle"><input name="disp_order" id="disp_order" class="text_medium required" type="text" value="<?php echo  $indivdata->disp_order;?>" />
				<div id="div_error" class="rederror"></div>
				</td>
			  </tr>
			   <tr><td colspan="2" height="7"></td></tr>
	<tr>
	<td align="left" valign="middle" colspan="2"><input name="hdn_id" type="hidden" value="<?php echo $indivdata->id?>"><input value="<?php echo $hdn_value;?>" class="button button_add" type="hidden" name="admininsert"><?php /*?><input <?php echo $hdn_in_up;?> type="submit" value=""><?php */?><input <?php echo $hdn_in_up;?> type="button" value="" onclick="validate();">
	</td>
	</tr>
        </table>
		</form>	
	</div>
  </div>
 <?php }?>
 
 