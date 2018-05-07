<?php 
include('includes/session.php');
include("model/testimonials.class.php");
$testimonialsObj=new testimonialsClass();
/*if($_GET['action']=="delete"){
   $testimonialsObj->testimonialsDelete($_GET['id']);
}*/
if(isset($_POST['Import'])){

	$testimonialsObj->importInfo($_POST);
   //$testimonialsObj->insertTestimonials($_POST);
}
/*if($_POST['admininsert']=="Update"){
   $testimonialsObj->updateTestimonials($_POST);
}*/
/*if(isset($_GET['id']) && $_GET['id']!=""){
   $hdn_value="Update";
   $indivdata=$testimonialsObj->getTestimonialData($_GET['id']); 
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
$alltestimonials=$testimonialsObj->getAllTestimonialsList($fldname,$orderby,$start,$limit);
$total=$testimonialsObj->getAllTestimonialsListCount();*/

?>

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
	
	if(trim(document.frmCreatestate.bigtext.value)=="")
	{ 
		alert("Please enter Content");
		document.frmCreatestate.bigtext.value='';
		document.frmCreatestate.bigtext.focus();
		return false;
	}

document.frmCreatestate.submit();
return true;
}

 <div class="box">
<div class="heading">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="middle"> <h1><img src="allfiles/map.jpeg" alt=""> Import Xcel</h1></td>
<td align="right" valign="bottom">&nbsp;</td>
</tr>
</table>
</div>
<div class="content">
<form action="index.php?option=com_import_insert" method="post" id="frmCreatestate" name="frmCreatestate" class="middle_form" enctype="multipart/form-data" onsubmit="return validate();">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" >
	<tr>
        <td width="6%" align="left" class="caption-field"><label class="title">Title:</label></td>
        <td width="94%" align="left" valign="middle">
			<div class="col-md-4">
                 <input type="file" name="file" id="file" class="input-large">
            </div>
 		
                        <!-- Button -->
                        
                                

        </td>
	</tr>
	<tr>
        <td width="6%" align="left" class="caption-field" colspan="2"><button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button></td>
	</tr>		  
	<tr>
	<td align="left" valign="middle" colspan="2">
		<input name="hdn_id" type="hidden" value="<?php echo $indivdata->id?>">
		<input value="<?php echo $hdn_value;?>" class="button button_add" type="hidden" name="admininsert">
		<!-- <input <?php echo $hdn_in_up;?> type="submit" value="" > -->	</td>
	</tr>
        </table>
	</form>	
	</div>
  </div>
