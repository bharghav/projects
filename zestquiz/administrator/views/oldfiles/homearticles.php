<?php 
include('includes/session.php');
include("model/blog.class.php");
$blogtopicObj=new blogtopicClass();
if($_GET['action']=="delete"){
   $blogtopicObj->HomeBlogTopicDelete($_GET['id']);
}
if($_POST['admininsert']=="Submit"){
   $blogtopicObj->insertHomeBlogTopics($_POST);
}
if($_POST['admininsert']=="Update"){
   $blogtopicObj->updateHomeBlogTopics($_POST);
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
$fldname="disp_order";
if($_GET['ord']!="")
$orderby=$_GET['ord'];
else
$orderby="ASC";
$allblogposts=$blogtopicObj->getAllBlogTopicsList($_GET['parentid'],'home',$fldname,$orderby,$start,$limit);
$total=$blogtopicObj->getAllBlogTopicsListCount($_GET['parentid'],'home');

if($option!="com_articlepost_insert"){
?>
<div class="box">
<div class="heading">
<script type="text/javascript">
function getrelatedData(val){
window.location.href="index.php?option=com_articlepost&parentid="+val;
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="54%" align="left" valign="middle"><h1><img src="allfiles/map.jpeg" alt=""> Home &nbsp;&nbsp;>>&nbsp;&nbsp; Articles</h1></td>
<td width="11%" align="right" valign="bottom"><input class="button button_add" value="" type="button" onclick="window.location.href='index.php?option=com_articlepost_insert';"></td>
<td width="35%" align="right" valign="bottom"> 
<strong>Parent Articles</strong>&nbsp;&nbsp;
<select name="blogtopic" id="blogtopic" class="select_large required" onchange="getrelatedData(this.value);" style="width:300px;">
<option value="all">All Comments</option>
<?php
$blogtopics=$blogtopicObj->getAllBlogTopicsListDropDown('0','home',"disp_order","ASC","","");
foreach($blogtopics as $blogtopicsllistdrop)
{
if($blogtopicsllistdrop->id!=4 && $blogtopicsllistdrop->id!=9)
{
?>
<option value="<?=$blogtopicsllistdrop->id;?>"><?=stripslashes($blogtopicsllistdrop->title);?></option>
<?php 
}
}
?>
</select>
<script type="text/javascript">
for(var i=0;i<document.getElementById('blogtopic').length;i++)
{
		if(document.getElementById('blogtopic').options[i].value=="<?php echo $_GET['parentid']; ?>")
		{
		document.getElementById('blogtopic').options[i].selected=true
		}
}			
</script>
</td>
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
					<a href="index.php?option=com_articlepost&ord=ASC&fld=title" class="up" title="up"></a>
					<a href="index.php?option=com_articlepost&ord=DESC&fld=title" class="down" title="down"></a>
					</div>
</td>
           <td width="238" align="left" valign="middle" >Image</td>
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
					$cate="";
					if($all_blogposts->parentid!="" && $all_blogposts->parentid!="0")
					$cate="<strong>".$blogtopicObj->getCategoryFullName($all_blogposts->parentid)." >> </strong>";
					$cate.=stripslashes($all_blogposts->title);
					?>
			<tr height="22">
			<td align="center" valign="middle"><?=($ii+1);?></td>
			<td colspan="2" align="left" valign="middle"><?php echo $cate;?></td>
			<td align="left" valign="middle"><?php /*?><img src="../uploads/blog/<?php echo $all_blogposts->image; ?>" width="204" height="107" /><?php */?><img src="../uploads/blog/<?php echo $all_blogposts->image; ?>" width="110" height="60" /></td>
			<td align="center" valign="middle"><?php echo $all_blogposts->status;?></td>
			<td align="center" valign="middle">
			<?php if($_SESSION['roletype']=="senior")
			{
			?>
			<a title="edit" href="index.php?option=com_articlepost_insert&id=<?php echo $all_blogposts->id;?>"><img src="allfiles/icon_edit.png" alt="Edit" border="0"></a>
			<?php
			} else { echo "No privileges";} ?>
			</td>
			<td align="center" valign="middle">
			<?php if($_SESSION['roletype']=="senior")
			{
			?>
			<?php if($all_blogposts->id=="4" || $all_blogposts->id=="9")
			{ 
			echo "";
			 }else
			{
			?>
			<a title="delete" href="#" onClick="var q = confirm('Are you sure you want to delete selected record?'); if (q) { window.location = 'index.php?option=com_articlepost&action=delete&id=<?php echo $all_blogposts->id;?>'; return false;}"><img src="allfiles/icon_delete.png"  alt="Delete" border="0"/></a>
			<?php 
			}
			?>
			<?php
			} else { echo "No privileges"; }?>
			  </td>
			</tr>
			<?php
				$ii++; 
				}
				} else{
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
			if($_GET['parentid']!="")
			$param.="&parentid=".$_GET['parentid'];
			$callConfig->paginavigation($start, $limit, $total, 'index.php?option=com_articlepost', $param);
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
	/*if(trim(document.frmCreatestate.disp_order.value)=="")
	{ 
		alert("Please enter Display Order");
		document.frmCreatestate.disp_order.value='';
		document.frmCreatestate.disp_order.focus();
		return false;
	}*/
return true;
}
</script>
 <div class="box">
<div class="heading">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="middle"> <h1><img src="allfiles/map.jpeg" alt="">Home &nbsp;&nbsp;>>&nbsp;&nbsp;Add Articles &nbsp;&nbsp;/&nbsp;&nbsp; Edit Articles</h1></td>
<td align="right" valign="bottom">&nbsp;</td>
</tr>
</table>
</div>
<div class="content">
<form action="index.php?option=com_articlepost_insert" method="post" id="frmCreatestate" name="frmCreatestate" class="middle_form" enctype="multipart/form-data" onsubmit="return validate();">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" >
	<tr>
	<td width="6%" align="left" class="caption-field"><label class="title">Category:</label></td>
	<td width="94%" align="left" valign="middle">
	<select name="parentid" id="parentid">
	<option value="0" >--No Parent--</option>
	<?php 
				$blogtopics=$blogtopicObj->getAllBlogTopicsListDropDown('0','home',"id","ASC","","");
				foreach($blogtopics as $maincategory)
				{
				if($maincategory->id!=4 && $maincategory->id!=9)
				{
				?>
				<option value="<?=$maincategory->id?>"><?=stripslashes($maincategory->title)?></option>
				<?php
				}
				}
				?>
	</select>
	<script type="text/javascript">
	for(var i=0;i<document.getElementById('parentid').length;i++)
	{
	if(document.getElementById('parentid').options[i].value=="<?php echo $indivdata->parentid ?>")
	{
	document.getElementById('parentid').options[i].selected=true;
	}
	}			
	</script>
	</td>
	</tr>
	<tr><td colspan="2" height="7"></td></tr>
	<tr>
                <td width="6%" align="left" class="caption-field"><label class="title">Title:</label></td>
                <td width="94%" align="left" valign="middle"><input name="title" class="text_large required" type="text" value="<?php echo  stripslashes($indivdata->title);?>" style="width:800px;"/></td>
	</tr>
			  <tr><td colspan="2" height="7"></td></tr>
			  <tr>
                <td width="6%" align="left" class="caption-field"><label class="title">Small Text:</label></td>
                <td width="94%" align="left" valign="middle"><input name="smalltext" class="text_large required" type="text" value="<?php echo  stripslashes($indivdata->smalltext);?>" style="width:800px;"/></td>
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
				<tr>
                <td width="6%" align="left" class="caption-field"><label class="title">Display Order:</label></td>
                <td width="94%" align="left" valign="middle"><input name="disp_order" class="text_large required" type="text" value="<?php echo  $indivdata->disp_order;?>" style="width:50px;"/>&nbsp;&nbsp;<small>Leave it empty if you creating a sub article</small></td>
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
	<td align="left" valign="middle" colspan="2"><input name="hdn_id" type="hidden" value="<?php echo $indivdata->id?>"><input value="<?php echo $hdn_value;?>" class="button button_add" type="hidden" name="admininsert"><?php /*?><input <?php echo $hdn_in_up;?> type="submit" value=""><?php */?><input <?php echo $hdn_in_up;?> type="submit" value="" >	</td>
	</tr>
        </table>
	</form>	
	</div>
  </div>
 <?php }?>