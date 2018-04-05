<?php 
include('includes/session.php');
include("model/elearn.class.php");
$storeObj=new elearnClass();
if($_GET['action']=="delete"){
   $storeObj->subCategoryDelete($_GET['id']);
}
if($_POST['admininsert']=="Submit"){
   $storeObj->insertsubCategory($_POST);
}
if($_POST['admininsert']=="Update"){
   $storeObj->updatesubCategory($_POST);
}
if(isset($_GET['id']) && $_GET['id']!=""){
   $hdn_value="Update";
   $indivdata=$storeObj->getsubCategoryData($_GET['id']); 
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
$fldname="scatid";
if($_GET['ord']!="")
$orderby=$_GET['ord'];
else
$orderby="ASC";
$allproductsdisp=$storeObj->getAllsubCategoryList($fldname,$orderby,$start,$limit);
$total=$storeObj->getAllsubCategoryListCount();

if($option!="com_subcat_insert"){
?>
<div class="box">
<div class="heading">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="middle"><h1><img src="allfiles/map.jpeg" alt=""> E-Learning &nbsp;&nbsp;>>&nbsp;&nbsp; Subcategory</h1></td>
<td align="right" valign="bottom"><input class="button button_add" value="" type="button" onclick="window.location.href='index.php?option=com_subcat_insert';"></td>
</tr>
</table>
</div>
<div class="content">
	 <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list">
          <thead>
            <tr height="25">
              <td width="20" align="center" valign="middle">sno</td>
              <td width="290" align="left" valign="middle" >Category Name</td>
			   <td width="290" align="left" valign="middle" >Subcategory Name</td>
              <td width="808" align="left" valign="middle" class="sort">
					<div >
					<a href="index.php?option=com_subcat&ord=ASC&fld=prodtitle" class="up" title="up"></a>
					<a href="index.php?option=com_subcat&ord=DESC&fld=prodtitle" class="down" title="down"></a>
					</div>
</td>
			   <!-- <td width="290" align="left" valign="middle" >Image</td> -->
              <td width="35" align="center" valign="middle" >Edit</td>
			  <td width="35" align="center" valign="middle" >Delete</td>
            </tr>
          </thead>
			<tbody>
			<?php
			if(sizeof($allproductsdisp)>0){
			$ii=0;
			foreach($allproductsdisp as $all_products){
			?>
			<tr height="22">
			<td align="center" valign="middle"><?=($ii+1);?></td>
			<?php $allcategoryInfo=$storeObj->getCategoryData($all_products->cid); ?>
			<td  align="left" valign="middle"><?php echo stripslashes($allcategoryInfo->catetitle);?></td>
			<td colspan="2" align="left" valign="middle"><?php echo stripslashes($all_products->subcattitle);?></td>
			<!-- <td align="left" valign="middle"><img src="../uploads/subcategory/<?php echo $all_products->image;?>" height="50" width="50"></td> -->
			<td align="center" valign="middle"x><a title="edit" href="index.php?option=com_subcat_insert&id=<?php echo $all_products->scatid;?>"><img src="allfiles/icon_edit.png" alt="Edit" border="0"></a></td>
			<td align="center" valign="middle">
						<a title="delete" href="#" onClick="var q = confirm('Are you sure you want to delete selected record?'); if (q) { window.location = 'index.php?option=com_subcat&action=delete&id=<?php echo $all_products->scatid;?>'; return false;}"><img src="allfiles/icon_delete.png"  alt="Delete" border="0"/></a>
						</td>
			</tr>
			<?php
				$ii++; } } else{
			?>
							<tr><td colspan="11" align="center" height="100">No Records..</td></tr>
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
			$callConfig->paginavigation($start, $limit, $total, 'index.php?option=com_subcat', $param);
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
	if(document.frmCreatestate.cid.value=="")
	{ 
		alert("Please Select Category ");
		document.frmCreatestate.cid.value='';
		document.frmCreatestate.cid.focus();
		return false;
	}
	if(document.frmCreatestate.prodtitle.value=="")
	{ 
		alert("Please Select Product Name");
		document.frmCreatestate.prodtitle.value='';
		document.frmCreatestate.prodtitle.focus();
		return false;
	}
    
	if(document.frmCreatestate.offer.value=="no")
	{   
		if(document.frmCreatestate.newprice.value=="" || document.frmCreatestate.newprice.value=="New Price")
		{ 
			alert("Please Enter Price");
			document.frmCreatestate.newprice.value='';
			document.frmCreatestate.newprice.focus();
			return false;
		}
	} 
	if(document.frmCreatestate.offer.value=="yes")
	{   
	
	   
	if(document.frmCreatestate.oldprice.value=="" || document.frmCreatestate.oldprice.value=="Old Price")
		{ 
			alert("Please Enter Old Price");
			document.frmCreatestate.oldprice.value='';
			document.frmCreatestate.oldprice.focus();
			return false;
		}
		if(document.frmCreatestate.newprice.value=="" || document.frmCreatestate.newprice.value=="New Price")
		{ 
			alert("Please Enter New Price");
			document.frmCreatestate.newprice.value='';
			document.frmCreatestate.newprice.focus();
			return false;
		}
	} 
	if(document.frmCreatestate.bigtext.value=="")
	{ 
	alert("Please Enter Description");
	document.frmCreatestate.bigtext.value='';
	document.frmCreatestate.bigtext.focus();
	return false;
	}

	
	/*var imagehdnval="<?=$indivdata->image?>";
	if(imagehdnval=="")
	{
		if(document.frmCreatestate.image.value=="")
		{ 
		alert("Please Upload Pdf File");
		document.frmCreatestate.image.value='';
		document.frmCreatestate.image.focus();
		return false;
		}
	
	}*/
	
return true;
}
</script>
 <div class="box">
<div class="heading">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="middle"> <h1><img src="allfiles/map.jpeg" alt=""> E-Learning &nbsp;&nbsp;>>&nbsp;&nbsp;Add Subcategory&nbsp;&nbsp;/&nbsp;&nbsp; Edit Subcategory</h1></td>
<td align="right" valign="bottom">&nbsp;</td>
</tr>
</table>
</div>
<div class="content">
<form action="index.php?option=com_subcat_insert" method="post" id="frmCreatestate" name="frmCreatestate" class="middle_form" enctype="multipart/form-data" onsubmit="return validate(this.image);">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" >
			   <tr>
                <td width="6%" align="left" class="caption-field"><label class="title">Category :</label></td>
                <td width="94%" align="left" valign="middle">
				<select name="cid" id="cid" class="select_medium required">
				<option value="">Select</option>
				<?php
				$allcategorylist=$storeObj->getAllCategoryList('Active','cid','ASC','','');
				foreach($allcategorylist as $catlist)
				{
				?>
				<option value="<?php echo $catlist->cid;?>"><?php echo stripslashes($catlist->catetitle);?></option>
				<?php
				}
				?>
				</select>
				<script type="text/javascript">
                for(var i=0;i<document.getElementById('cid').length;i++)
                {
						if(document.getElementById('cid').options[i].value=="<?php echo $indivdata->cid ?>")
						{
						document.getElementById('cid').options[i].selected=true
						}
                }			
                </script></td>
			  </tr>
			   <tr><td colspan="2" height="7"></td></tr>
			   <tr>
                <td width="6%" align="left" class="caption-field"><label class="title">Product Name :</label></td>
                <td width="94%" align="left" valign="middle"><input name="subcattitle" class="text_large required" type="text" value="<?php echo  stripslashes($indivdata->subcattitle);?>"/></td>
	</tr>
			  <tr><td colspan="2" height="7"></td></tr>
			   <script type="text/javascript">
			   function getofferPrices(val){
			    if(val=="yes"){
				document.getElementById('oldprice').style.display="";
				document.getElementById('newprice').style.display="";
				} else {
				document.getElementById('oldprice').style.display="none";
				document.getElementById('newprice').style.display="";
				}  
			   }
			   </script>
			    <!--tr>
                <td width="6%" align="left" class="caption-field"><label class="title">Special Offer:</label></td>
                <td width="94%" align="left" valign="middle">
				<select name="offer" id="offer" class="select_small required" onchange="getofferPrices(this.value)">
				<option value="no">No</option>
				<option value="yes">Yes</option>
				</select>
				<script type="text/javascript">
                for(var i=0;i<document.getElementById('offer').length;i++)
                {
						if(document.getElementById('offer').options[i].value=="<?php echo $indivdata->offer;?>")
						{
						document.getElementById('offer').options[i].selected=true
						}
                }			
                </script>
				<?php
				if($indivdata->oldprice=="")
				$oldprice="Old Price";
				else
				$oldprice=$indivdata->oldprice;
				if($indivdata->newprice=="")
				$newprice="New Price";
				else
				$newprice=$indivdata->newprice;
				if($indivdata->offer=="yes"){
				$oldpricdiv="display:''";
				$newpricediv=="display:''";
				} else {
				$oldpricdiv='style="display:none;"';
				//$newpricediv='style="display:none;"';
				}
				?>
<input type="text" id="oldprice" <?=$oldpricdiv?> name="oldprice" class="text_small required" value="<?php echo $oldprice;?>" onfocus="if(this.value=='Old Price'){ value='' }"; onblur="if(this.value==''){ value='Old Price' }"; />&nbsp;
<input type="text" name="newprice" <?=$newpricediv?> id="newprice" class="text_small required" value="<?php echo $newprice;?>" onfocus="if(this.value=='New Price'){ value='' }"; onblur="if(this.value==''){ value='New Price' }"; />
				</td>
			  </tr-->
			   <tr><td colspan="2" height="7"></td></tr>
			   <tr>
                <td align="left" valign="top" class="caption-field"><label class="title">Description:</label></td>
                <td align="left" valign="middle" class="caption-field"><textarea name="bigtext" id="bigtext" cols="150" rows="2"><?php echo  stripslashes($indivdata->bigtext);?></textarea></td>
				</tr>
				<!--  <tr><td colspan="2" height="7"></td></tr>
			   <tr>
				<td width="6%" align="left" valign="top" class="caption-field"><label class="title">Image :</label></td>
				<td width="94%" align="left" valign="middle"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
				<tr>
				<td width="31%"><input type="file" name="image" size="24"></td>
				<td width="69%"><?php if($indivdata->image!=""){
				?>
				<img src="../uploads/subcategory/<?php echo $indivdata->image; ?>" width="185" height="79" />
				<input type="hidden" name="hdn_image" size="24" value="<?php echo $indivdata->image; ?>">
				<?php
				}
				?>
				<small> *Please upload image size WIDTH ( min - 150, max - 200 ) and HEIGHT ( min - 140, max - 200 )</small>
				</td>
				</tr>
				</table></td>
				</tr> -->
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
	<td align="left" valign="middle" colspan="2"><input name="hdn_id" type="hidden" value="<?php echo $indivdata->cid?>"><input value="<?php echo $hdn_value;?>" class="button button_add" type="hidden" name="admininsert"><?php /*?><input <?php echo $hdn_in_up;?> type="submit" value=""><?php */?><input <?php echo $hdn_in_up;?> type="submit" value="" >	</td>
	</tr>
        </table>
	</form>	
	</div>
  </div>
 <?php }?>