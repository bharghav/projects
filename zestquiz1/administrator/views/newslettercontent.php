<?php 
include('includes/session.php');
include("model/newsletter.class.php");
$newsletterObj=new newsletterClass();
if($_POST['submit']=="sitesettings")
{
$res=$newsletterObj->mailSubjectConetentSave($_POST);
}
$indivdata=$newsletterObj->getNewsletterContent();
?>
<script type="text/javascript">
function trim(stringToTrim)
{
return stringToTrim.replace(/^\s+|\s+$/g,"");
}
function validate(fld)
{
	if(trim(document.frmCreatestate.mailsubject.value)=="")
	{ 
		alert("Please enter Title");
		document.frmCreatestate.mailsubject.value='';
		document.frmCreatestate.mailsubject.focus();
		return false;
	}
		
document.frmCreatestate.submit();
return true;
}
</script>


<div class="box">
    <div class="heading">
      <h1><img src="allfiles/category.png" alt="">Newsletter</h1>
    </div>
    <div class="content">
      <form action="index.php?option=com_newslettercontent" method="post"  id="frmCreatestate" name="frmCreatestate" class="middle_form" enctype="multipart/form-data"  onsubmit="return validate(this.image);">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="14%" align="left" valign="top"><label class="title">Subject</label></td>
    <td width="86%" align="left" valign="middle"><input type="text" name="mailsubject" id="mailsubject" size="24" value="<?php echo stripslashes($indivdata->mailsubject); ?>" class="text_large" style="width:800px;" ></td>
  </tr>
    <tr>
    <td height="5" colspan="2" align="left" valign="middle"></td>
  </tr>
  <tr>
    <td width="14%" align="left" valign="top"><p><label class="title">Message</label></p></td>
    <td width="86%" align="left" valign="middle"><?php /*?><textarea name="mailcontent" id="mailcontent" cols="150" rows="20"><?php echo  stripslashes($indivdata->mailcontent);?></textarea><?php */?>
	<?
				include 'fckeditor/fckeditor.php'; 
				$sBasePath = 'fckeditor/' ;//to change in web root
				$oFCKeditor = new FCKeditor('mailcontent');  //name of the form-field to be generated
				$oFCKeditor->BasePath	= $sBasePath;
				$oFCKeditor->Value		= stripslashes($indivdata->mailcontent);//the matter that may be in db
				$oFCKeditor->Height=400;
				$oFCKeditor->Width=900;
				$oFCKeditor->Create() ;
				?>
				</td>
  </tr>
  <tr>
    <td height="5" colspan="2" align="left" valign="middle"></td>
  </tr>
    <tr>
    <td align="left" valign="middle"><p><label class="title">&nbsp;</label><input value="sitesettings" type="hidden"  name="submit"><input value="" class="button button_save" type="submit"  name="submitbutton"></p></td>
    <td align="left" valign="middle">&nbsp;</td>
  </tr>
</table>
</form>
    </div>
  </div>