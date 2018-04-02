<?php 
include('includes/session.php');
include("model/blog.class.php");
$blogtopicObj=new blogtopicClass();
if($_GET['action']=="delete"){
   $blogtopicObj->BlogTopicDelete($_GET['id']);
}
if($_POST['admininsert']=="Submit"){
   $blogtopicObj->insertBlogTopics($_POST);
}
if($_POST['admininsert']=="Update"){
   $blogtopicObj->updateBlogTopics($_POST);
}
if(isset($_GET['id']) && $_GET['id']!=""){
   $hdn_value="Update";
   $indivdata=$blogtopicObj->getBlogTopicData($_GET['id']); 
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
$fldname="id";
if($_GET['ord']!="")
$orderby=$_GET['ord'];
else
$orderby="DESC";
$allblogposts=$blogtopicObj->getAllBlogTopicsList($_GET['parentid'],'blog',$fldname,$orderby,$start,$limit);
$total=$blogtopicObj->getAllBlogTopicsListCount($_GET['parentid'],'blog');

if($option!="com_blogpost_insert"){
?>
<div class="box">
<div class="heading">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="middle"><h1><img src="allfiles/map.jpeg" alt=""> Blog &nbsp;&nbsp;>>&nbsp;&nbsp; Posts</h1></td>
<td align="right" valign="bottom"><input class="button button_add" value="" type="button" onclick="window.location.href='index.php?option=com_blogpost_insert';"></td>
</tr>
</table>
</div>
<div class="content">
	 <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list">
          <thead>
            <tr height="25">
              <td width="20" align="center" valign="middle">sno</td>
			   <td width="238" align="left" valign="middle" >title</td>
              <td width="855" align="left" valign="middle" class="sort">
					<div >
					<a href="index.php?option=com_blogpost&ord=ASC&fld=title" class="up" title="up"></a>
					<a href="index.php?option=com_blogpost&ord=DESC&fld=title" class="down" title="down"></a>
					</div>
</td>
			  <td width="46" align="center" valign="middle" >Status</td>
              <td width="34" align="center" valign="middle" >Edit</td>
			  <td width="38" align="center" valign="middle" >Delete</td>
            </tr>
          </thead>
			<tbody>
			<?php
			if(sizeof($allblogposts)>0){
					$ii=0;
					foreach($allblogposts as $all_blogposts){
					?>
			<tr height="22">
			<td align="center" valign="middle"><?=($ii+1);?></td>
			<td colspan="2" align="left" valign="middle"><?php echo stripslashes($all_blogposts->title);?></td>
			<td align="center" valign="middle"><?php echo $all_blogposts->status;?></td>
			<td align="center" valign="middle"x><a title="edit" href="index.php?option=com_blogpost_insert&id=<?php echo $all_blogposts->id;?>"><img src="allfiles/icon_edit.png" alt="Edit" border="0"></a></td>
			<td align="center" valign="middle">
						<a title="delete" href="#" onClick="var q = confirm('Are you sure you want to delete selected record?'); if (q) { window.location = 'index.php?option=com_blogpost&action=delete&id=<?php echo $all_blogposts->id;?>'; return false;}"><img src="allfiles/icon_delete.png"  alt="Delete" border="0"/></a>
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
			$callConfig->paginavigation($start, $limit, $total, 'index.php?option=com_blogpost', $param);
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
    if(trim(document.frmCreatestate.title.value)=="")
	{ 
		alert("Please enter Title");
		document.frmCreatestate.title.value='';
		document.frmCreatestate.title.focus();
		return false;
	}	
	 if(trim(document.frmCreatestate.smalltext.value)=="")
	{ 
		alert("Please enter Small Text");
		document.frmCreatestate.smalltext.value='';
		document.frmCreatestate.smalltext.focus();
		return false;
	}
	var imagehdnval="<?=$indivdata->image?>";
	if(imagehdnval=="")
	{
		if(document.frmCreatestate.image.value=="")
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
<td align="left" valign="middle"> <h1><img src="allfiles/map.jpeg" alt="">Blog &nbsp;&nbsp;>>&nbsp;&nbsp;Add Post &nbsp;&nbsp;/&nbsp;&nbsp; Edit Post</h1></td>
<td align="right" valign="bottom">&nbsp;</td>
</tr>
</table>
</div>
<div class="content">
<form action="index.php?option=com_blogpost_insert" method="post" id="frmCreatestate" name="frmCreatestate" class="middle_form" enctype="multipart/form-data" onsubmit="return validate();">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" >
	<tr>
                <td width="6%" align="left" class="caption-field"><label class="title">Title:</label></td>
                <td width="94%" align="left" valign="middle"><input name="title" class="text_large required" type="text" value="<?php echo  stripslashes($indivdata->title);?>" style="width:800px;"/></td>
	</tr>
			  <tr><td colspan="2" height="7"></td></tr>
			  <tr>
                <td width="6%" align="left" class="caption-field"><label class="title">Small Text:</label></td>
                <td width="94%" align="left" valign="middle"><input name="smalltext" class="text_large required" type="text" value="<?php echo  stripslashes($indivdata->smalltext);?>" style="width:950px;"/></td>
	</tr>
			  <tr><td colspan="2" height="7"></td></tr>
			    <tr>
                <td align="left" valign="top" class="caption-field"><label class="title">Content:</label></td>
                <td align="left" valign="middle" class="caption-field"><?php /*?><textarea name="bigtext" id="content_matter" cols="150" rows="20"><?php echo  stripslashes($indivdata->bigtext);?></textarea><?php */?>
				<?
				include 'fckeditor/fckeditor.php'; 
				$sBasePath = 'fckeditor/' ;//to change in web root
				$oFCKeditor = new FCKeditor('bigtext');  //name of the form-field to be generated
				$oFCKeditor->BasePath	= $sBasePath;
				$oFCKeditor->Value		= stripslashes($indivdata->bigtext);//the matter that may be in db
				$oFCKeditor->Height=400;
				$oFCKeditor->Width=900;
				$oFCKeditor->Create() ;
				?>
				</td>
				</tr>
				 <tr><td colspan="2" height="7"></td></tr>
				 <tr>
				<td width="6%" align="left" valign="top" class="caption-field"><label class="title">Image:</label></td>
				<td width="94%" align="left" valign="middle"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
				<tr>
				<td width="31%"><input type="file" name="image" size="24"></td>
				<td width="69%"><?php if($indivdata->image!=""){
				?>
				<img src="../uploads/blog/<?php echo $indivdata->image; ?>" width="204" height="107" />
				<input type="hidden" name="hdn_image" size="24" value="<?php echo $indivdata->image; ?>">
				<?php
				}
				?>
				<small> *Please upload image size WIDTH ( min - 200, max - 250 ) and HEIGHT ( min - 100, max - 150 )</small>
				</td>
				</tr>
				</table></td>
				</tr>
				<tr><td colspan="2" height="7"></td></tr>
				 <?php if($_SESSION['roletype']=="senior")
				  {
				  ?>
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
				</script></td>
				</tr>
				<tr><td colspan="2" height="7"></td></tr>
			   <?php 
			   }
			   if($_SESSION['roletype']=="level1" && $_GET['id']=="")
			   {
			   ?>
			   <tr>
				<td align="left" class="caption-field"><label class="title">Status :</label> </td>
				<td align="left" valign="middle" class="caption-field">
				<select name="status" id="status" class="select_large required">
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
				</script></td>
				</tr>
				<tr><td colspan="2" height="7"></td></tr>
				<?php 
				}
				?>
	<tr>
	<td align="left" valign="middle" colspan="2"><input name="displayin" type="hidden" value="blog"><input name="hdn_id" type="hidden" value="<?php echo $indivdata->id?>"><input value="<?php echo $hdn_value;?>" class="button button_add" type="hidden" name="admininsert"><?php /*?><input <?php echo $hdn_in_up;?> type="submit" value=""><?php */?><input <?php echo $hdn_in_up;?> type="submit" value="" >	</td>
	</tr>
        </table>
	</form>	
	</div>
  </div>
 <?php }?>