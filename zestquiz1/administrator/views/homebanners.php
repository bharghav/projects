<?php 
include('includes/session.php');
include("model/bannerGallery.class.php");
$bannergalleryObj=new bannerGalleryClass();
if($_GET['action']=="delete"){
   $bannergalleryObj->bannersDelete($_GET['id']);
}
if($_POST['admininsert']=="Submit"){
   $bannergalleryObj->insertBanner($_POST);
}
if($_POST['admininsert']=="Update"){
   $bannergalleryObj->updateBanner($_POST);
}
if(isset($_GET['id']) && $_GET['id']!=""){
   $hdn_value="Update";
   $indivdata=$bannergalleryObj->getBannerData($_GET['id']); 
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
$fldname="id";
if($_GET['ord']!="")
$orderby=$_GET['ord'];
else
$orderby="DESC";
$allgallery=$bannergalleryObj->getAllBannersList($fldname,$orderby,$start,$limit);
$total=$bannergalleryObj->getAllBannersListCount();

if($option!="com_bannerslist_insert"){
?>
<div class="box">
<div class="heading">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="middle"><h1><img src="allfiles/map.jpeg" alt=""> Image</h1></td>
<td align="right" valign="bottom"><input class="button button_add" value="" type="button" onclick="window.location.href='index.php?option=com_bannerslist_insert';"></td>
</tr>
</table>
</div>
<div class="content">
	 <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list">
          <thead>
            <tr height="25">
              <td width="20" align="center" valign="middle">sno</td>
			   <td width="226" align="left" valign="middle" >Image</td>
<td width="87" align="left" valign="middle" >Title</td>
              <td width="467" align="left" valign="middle" class="sort">&nbsp;</td>
			 <!-- <td width="360" align="left" valign="middle" >Link</td>-->
              <td width="32" align="center" valign="middle" >Edit</td>
			  <td width="39" align="center" valign="middle" >Delete</td>
            </tr>
          </thead>
			<tbody>
			<?php
			if(sizeof($allgallery)>0){
					$ii=0;
					foreach($allgallery as $all_gallery){
					$link=SITEURL."/uploads/baner_gallery/".$all_gallery->image;
					?>
			<tr height="22">
			<td align="center" valign="middle"><?=($ii+1);?></td>
			<td align="left" valign="middle"><img src="../uploads/baner_gallery/<?php echo $all_gallery->image;?>" height="80" width="200"></td>
			<td colspan="2" align="left" valign="middle"><?php echo stripslashes($all_gallery->title);?><?php /*?><?php echo stripslashes($all_gallery->img_desc);?><?php */?></td>
			<?php /*?><td align="center" valign="middle"><input type="text" value="<?=$link;?>" id="sss" class="text_large required"  style="width:360px;" onfocus="document.getElementById('sss').select()" onclick="document.getElementById('sss').select()"/></td><?php */?>
			<td align="center" valign="middle"x><a title="edit" href="index.php?option=com_bannerslist_insert&id=<?php echo $all_gallery->id;?>"><img src="allfiles/icon_edit.png" alt="Edit" border="0"></a></td>
			<td align="center" valign="middle">
						<a title="delete" href="#" onClick="var q = confirm('Are you sure you want to delete selected record?'); if (q) { window.location = 'index.php?option=com_bannerslist&action=delete&id=<?php echo $all_gallery->id;?>'; return false;}"><img src="allfiles/icon_delete.png"  alt="Delete" border="0"/></a>
			  </td>
			</tr>
			<?php
				$ii++; } } else{
			?>
							<tr><td colspan="7" align="center" height="100">No Records..</td></tr>
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
			$callConfig->paginavigation($start, $limit, $total, 'index.php?option=com_bannerslist', $param);
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
		alert("Please enter title");
		document.frmCreatestate.title.value='';
		document.frmCreatestate.title.focus();
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
<!--<script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		/*template_external_list_url : "tinymce/examples/lists/template_list.js",
		external_link_list_url : "tinymce/examples/lists/link_list.js",
		external_image_list_url : "tinymce/examples/lists/image_list.js",
		media_external_list_url : "tinymce/examples/lists/media_list.js",*/

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

               // Extended valid elements
         extended_valid_elements : "iframe[src|width|height|name|align|frameborder]",
        
		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>-->
 <div class="box">
<div class="heading">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="middle"> <h1><img src="allfiles/map.jpeg" alt=""> Add Image &nbsp;&nbsp;/&nbsp;&nbsp; Edit Image</h1></td>
<td align="right" valign="bottom">&nbsp;</td>
</tr>
</table>
</div>
<div class="content">
<form action="index.php?option=com_bannerslist_insert" method="post" id="frmCreatestate" name="frmCreatestate" class="middle_form" enctype="multipart/form-data"  onsubmit="return validate(this.image)">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" >
	<tr>
                <td width="6%" align="left" class="caption-field"><label class="title">Title:</label></td>
                <td width="94%" align="left" valign="middle"><input name="title" type="text" value="<?php echo stripslashes($indivdata->title)?>"></td>
			  </tr>
			   <tr><td colspan="2" height="7"></td></tr>
	<tr>
                <td width="6%" align="left" class="caption-field"><label class="title">Type:</label></td>
                <td width="94%" align="left" valign="middle"><select name="type" id="type">
				<option value="home">Home Page Banners</option>
				<!--<option value="save">I Can Use Any Where</option>-->
				</select>
				<script type="text/javascript">
                for(var i=0;i<document.getElementById('type').length;i++)
                {
						if(document.getElementById('type').options[i].value=="<?php echo $indivdata->type ?>")
						{
						document.getElementById('type').options[i].selected=true
						}
                }			
                </script></td>
			  </tr>
			   <tr><td colspan="2" height="7"></td></tr>
			   <tr>
				<td width="6%" align="left" valign="top" class="caption-field"><label class="title">Image / Banner:</label></td>
				<td width="94%" align="left" valign="middle"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
				<tr>
				<td width="31%"><input type="file" name="image" size="24"></td>
				<td width="69%"><?php if($indivdata->image!=""){
				?>
				<img src="../uploads/baner_gallery/<?php echo $indivdata->image; ?>" width="185" height="79" />
				<input type="hidden" name="hdn_image" size="24" value="<?php echo $indivdata->image; ?>">
				<?php
				}
				?><small> *Please upload image size WIDTH ( min - 300, max - 400 ) and HEIGHT ( min - 150, max - 250 )</small></td>
				</tr>
				</table></td>
				</tr>
			   
				<tr><td colspan="2" height="7"></td></tr>
				<tr>
				<td width="6%" align="left" valign="top" class="caption-field"><label class="title">Description:</label></td>
				<td width="94%" align="left" valign="middle"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
				<tr>
				<td width="31%"><?php /*?><textarea name="img_desc" id="img_desc" cols="100" rows="2"><?php echo  stripslashes($indivdata->img_desc);?></textarea><?php */?>
				<?php
				include 'fckeditor/fckeditor.php'; 
				$sBasePath = 'fckeditor/' ;//to change in web root
				$oFCKeditor = new FCKeditor('img_desc') ;  //name of the form-field to be generated
				$oFCKeditor->BasePath	= $sBasePath ;
				$oFCKeditor->Value		= stripslashes($indivdata->img_desc);//the matter that may be in db
				$oFCKeditor->Height=400;
				$oFCKeditor->Width=900;
				$oFCKeditor->Create() ;
				?>	</td>
				</tr>
				</table></td>
				</tr>
			   
				<tr><td colspan="2" height="7"></td></tr>
				<tr>
                <td width="6%" align="left" class="caption-field"><label class="title">Status:</label></td>
                <td width="94%" align="left" valign="middle">
				<select name="status" id="status">
				<option value="Active">Active</option>
				<option value="Inactive">Inactive</option>
				</select>
				<script type="text/javascript">
                for(var i=0;i<document.getElementById('status').length;i++)
                {
						if(document.getElementById('status').options[i].value=="<?php echo $indivdata->status;?>")
						{
						document.getElementById('status').options[i].selected=true
						}
                }			
                </script></td>
			  </tr>
			   <tr><td colspan="2" height="7"></td></tr>
				
	<tr>
	<td align="left" valign="middle" colspan="2"><input name="hdn_id" type="hidden" value="<?php echo $indivdata->id?>"><input value="<?php echo $hdn_value;?>" class="button button_add" type="hidden" name="admininsert"><?php /*?><input <?php echo $hdn_in_up;?> type="submit" value=""><?php */?><input <?php echo $hdn_in_up;?> type="submit" value="" >
	</td>
	</tr>
        </table>
		</form>	
	</div>
  </div>
 <?php }?>