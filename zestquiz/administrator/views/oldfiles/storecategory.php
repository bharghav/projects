<?php 
include('includes/session.php');
include("model/store.class.php");
$storeObj=new storeClass();
if($_GET['action']=="delete"){
   $storeObj->storeCategoryDelete($_GET['id']);
}
if($_POST['admininsert']=="Submit"){
   $storeObj->insertStoreCategory($_POST);
}
if($_POST['admininsert']=="Update"){
   $storeObj->updateStoreCategory($_POST);
}
if(isset($_GET['id']) && $_GET['id']!=""){
   $hdn_value="Update";
   $indivdata=$storeObj->getStoreCategoryData($_GET['id']); 
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
$limit=25;
if($_GET['fld']!="")
$fldname=$_GET['fld'];
else
$fldname="scid";
if($_GET['ord']!="")
$orderby=$_GET['ord'];
else
$orderby="DESC";
$allforumlist=$storeObj->getAllStoreCategoryList('',$fldname,$orderby,$start,$limit);
$total=$storeObj->getAllStoreCategoryListCount('');

if($option!="com_storecat_insert"){
?>
<div class="box">
<div class="heading">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="middle"><h1><img src="allfiles/map.jpeg" alt="">Store &nbsp;&nbsp;>>&nbsp;&nbsp;Category</h1></td>
<td align="right" valign="bottom"><input class="button button_add" value="" type="button" onclick="window.location.href='index.php?option=com_storecat_insert';"></td>
</tr>
</table>
</div>
<div class="content">
	 <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list">
          <thead>
            <tr height="25">
              <td width="20" align="center" valign="middle">sno</td>
			   <td width="227" align="left" valign="middle" >title</td>
              <td width="750" align="left" valign="middle" class="sort">
					<div >
					<a href="index.php?option=com_storecat&ord=ASC&fld=catetitle" class="up" title="up"></a>
					<a href="index.php?option=com_storecat&ord=DESC&fld=catetitle" class="down" title="down"></a>
					</div>
</td>
 <td width="116" align="center" valign="middle" >Image</td>
			  <td width="45" align="center" valign="middle" >Status</td>
              <td width="33" align="center" valign="middle" >Edit</td>
			  <td width="40" align="center" valign="middle" >Delete</td>
            </tr>
          </thead>
			<tbody>
			<?php
			if(sizeof($allforumlist)>0){
					$ii=0;
					foreach($allforumlist as $allforum_list){
					?>
			<tr height="22">
			<td align="center" valign="middle"><?=($ii+1);?></td>
			<td colspan="2" align="left" valign="middle"><?php echo stripslashes($allforum_list->catetitle);?></td>
			<td align="center" valign="middle"><img src="../uploads/store/category/thumbs/<?php echo $allforum_list->image;?>" width="50" height="50" /></td>
			<td align="center" valign="middle"><?php echo $allforum_list->status;?></td>
			<td align="center" valign="middle"x><a title="edit" href="index.php?option=com_storecat_insert&id=<?php echo $allforum_list->scid;?>"><img src="allfiles/icon_edit.png" alt="Edit" border="0"></a></td>
			<td align="center" valign="middle">
						<a title="delete" href="#" onClick="var q = confirm('Are you sure you want to delete selected record?'); if (q) { window.location = 'index.php?option=com_storecat&action=delete&id=<?php echo $allforum_list->scid;?>'; return false;}"><img src="allfiles/icon_delete.png"  alt="Delete" border="0"/></a>
			  </td>
			</tr>
			<?php
				$ii++; } } else{
			?>
							<tr><td colspan="8" align="center" height="100">No Records..</td></tr>
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
			$callConfig->paginavigation($start, $limit, $total, 'index.php?option=com_storecat', $param);
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
function validate(fld)
{
	if(trim(document.frmCreatestate.catetitle.value)=="")
	{ 
		alert("Please enter Category title");
		document.frmCreatestate.catetitle.value='';
		document.frmCreatestate.catetitle.focus();
		return false;
	}
		if(trim(document.frmCreatestate.bigtext.value)=="")
	{ 
		alert("Please enter Description");
		document.frmCreatestate.bigtext.value='';
		document.frmCreatestate.bigtext.focus();
		return false;
	}

	
	var imagehdnval="<?=$indivdata->image?>";
	if(imagehdnval=="")
	{
		if(trim(document.frmCreatestate.image.value)=="")
		{ 
		alert("Please Upload Image");
		document.frmCreatestate.image.value='';
		document.frmCreatestate.image.focus();
		return false;
		}
		if(!/(\.bmp|\.gif|\.jpg|\.jpeg|\.png)$/i.test(fld.value))
		{
		alert("Please Upload Valid image/file type");
		fld.value='';
		fld.focus();
		return false;
		}
	}
	
return true;
}
</script>
 <div class="box">
<div class="heading">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="middle"> <h1><img src="allfiles/map.jpeg" alt=""> Store &nbsp;&nbsp;>>&nbsp;&nbsp; Add Category &nbsp;&nbsp;/&nbsp;&nbsp; Edit Category</h1></td>
<td align="right" valign="bottom">&nbsp;</td>
</tr>
</table>
</div>
<div class="content">
<form action="index.php?option=com_storecat_insert" method="post" id="frmCreatestate" name="frmCreatestate" class="middle_form" enctype="multipart/form-data" onsubmit="return validate(this.image);">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" >
	<tr>
                <td width="6%" align="left" class="caption-field"><label class="title">Title:</label></td>
                <td width="94%" align="left" valign="middle"><input name="catetitle" class="text_large required" type="text" value="<?php echo  stripslashes($indivdata->catetitle);?>" style="width:800px;"/></td>
	</tr>
			  <tr><td colspan="2" height="7"></td></tr>
			    <tr>
                <td align="left" valign="top" class="caption-field"><label class="title">Description:</label></td>
                <td align="left" valign="middle" class="caption-field"><textarea name="bigtext" id="bigtext" cols="150" rows="2"><?php echo  stripslashes($indivdata->bigtext);?></textarea></td>
				</tr>
				 <tr><td colspan="2" height="7"></td></tr>
				 <tr>
				<td width="6%" align="left" valign="top" class="caption-field"><label class="title">Image:</label></td>
				<td width="94%" align="left" valign="middle"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
				<tr>
				<td width="31%"><input type="file" name="image" size="24"></td>
				<td width="69%"><?php if($indivdata->image!=""){
				?>
				<img src="../uploads/store/category/<?php echo $indivdata->image; ?>" width="185" height="79" />
				<input type="hidden" name="hdn_image" size="24" value="<?php echo $indivdata->image; ?>">
				<?php
				}
				?>
				<small> *Please upload image size WIDTH ( min - 100, max - 150 ) and HEIGHT ( min - 90, max - 130 )</small>
				</td>
				</tr>
				</table></td>
				</tr>
			   
				<tr><td colspan="2" height="7"></td></tr>
				<tr>
                <td align="left" class="caption-field"><label class="title">Status :</label> </td>
                <td align="left" valign="middle" class="caption-field">
    <select name="status" id="status" class="select_large required">
	<option value="Active">Active</option>
    <option value="Inactive">Inactive</option>
	</select>
	<script type="text/javascript">
                for(var i=0;i<document.getElementById('status').length;i++)
                {
						if(document.getElementById('status').options[i].value=="<?php echo $indivdata->status; ?>")
						{
						document.getElementById('status').options[i].selected=true
						}
                }			
                </script>
				</td>
			  </tr>
			   <tr><td colspan="2" height="7"></td></tr>
	<tr>
	<td align="left" valign="middle" colspan="2"><input name="hdn_id" type="hidden" value="<?php echo $indivdata->scid?>"><input value="<?php echo $hdn_value;?>" class="button button_add" type="hidden" name="admininsert"><?php /*?><input <?php echo $hdn_in_up;?> type="submit" value=""><?php */?><input <?php echo $hdn_in_up;?> type="submit" value="" >	</td>
	</tr>
        </table>
	</form>	
	</div>
  </div>
 <?php }?>