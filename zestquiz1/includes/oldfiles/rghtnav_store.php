<?php 
$categorieslist=$frontUserOnlineStoreObj->getAllStoreCategoryList("scid","DESC",'','');
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="top" colspan="2"><?php include("includes/homelogin.php");?></td>
</tr>
<?php 
$cartdatagrandtotal=$frontUserOnlineStoreObj->getallTempCartGrandTotal();
$noitemstotal=$frontUserOnlineStoreObj->getallTempCartQuantityTotal();
if($noitemstotal=="")
$noitemstotal=0;
else
$noitemstotal=$noitemstotal;
if($noitemstotal!=0){
$totalshipping=$noitemstotal*$sitedata->shippingamount;
?>
<tr>
<td align="left" valign="top" colspan="2"><?php include("includes/mycart.php");?></td>
</tr>
<?php }?>
<tr>
<td align="left" valign="middle" colspan="2" style="padding-bottom:0px; padding-top:5px"><strong class="boldtext">CATEGORIES</strong></td>
</tr>
<tr>
<td align="left" valign="middle" colspan="2" ><hr class="boldtext_hr"/></td>
</tr>
<tr>
<?php 
$sc=0;
foreach($categorieslist as $categories_list)
{
$makehomecaturl="onlinestore.php?scid=".$categories_list->scid;
/*if($categories_list->id==4)
$makehomecaturl="relationshipadvice.php?btid=".$categories_list->id;
if($categories_list->id==9)
$makehomecaturl="onlinestore.php";
if($_GET['btid']==$categories_list->id){
$actviclass="class='blogcategoryactive'";
$actviclassarrow="images/arrow-black_13.gif";
}else {
$actviclass="class='blogcategory'";
$actviclassarrow="images/arrow_13.gif";
}*/
if($sc%2==0)
echo "<tr>";
?>
<td width="5%" height="23" align="left" valign="top" >
<table width="135" border="0" cellspacing="2" cellpadding="1" >
  <tr>
    <td valign="middle" align="center" style="height:96px;"><a href="<?=$makehomecaturl?>" >
	<?php if($categories_list->image!=""){?>
	<img src="uploads/store/category/thumbs/<?php echo $categories_list->image;?>" width="135" height="96"  border="0" alt="<?php echo stripslashes($categories_list->catetitle);?>"/>
	<?php } else {?>
	<img src="images/nopreview.jpg" width="135" height="96" border="0"/><?php }?>
	</a></td>
  </tr>
  <tr>
     <td valign="middle" align="left"><a href="<?=$makehomecaturl?>" class="morelinks"><?php echo stripslashes($categories_list->catetitle);?></a></td>
  </tr>
</table>
</td>
<?php
$sc++;
}
?>
</tr>
</table>