<?php 
$totalofferproducts=$frontUserOnlineStoreObj->getAll_Offer_ProductsList("spid","DESC",0,10);
?>
<table width="95%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="middle"><strong class="boldtext">PROMOTIONS</strong></td>
</tr>
<tr>
<td align="left" valign="middle" colspan="2"><hr class="boldtext_hr"/></td>
</tr>
<tr>
<td align="left" valign="top" height="5"></td>
</tr>
<tr>
<?php 
if(sizeof($totalofferproducts)>0)
{
$sc=0;
foreach($totalofferproducts as $total_offerproducts)
{
$makehomecaturl="onlinestoreproductdisp.php?spid=".$total_offerproducts->spid;
if($sc%2==0)
echo "<tr>";
?>
<td width="5%" height="23" align="left" valign="top" >
<table width="135" border="0" cellspacing="2" cellpadding="1" >
  <tr>
    <td valign="middle" align="center" style="height:96px;"><a href="<?=$makehomecaturl?>" >
	<?php if($total_offerproducts->image!=""){?>
	<img src="uploads/store/products/thumbs/<?php echo $total_offerproducts->image;?>" width="135" height="96"  border="0" alt="<?php echo stripslashes($total_offerproducts->catetitle);?>"/>
	<?php } else {?>
	<img src="images/nopreview.jpg" width="135" height="96" border="0"/><?php }?>
	</a></td>
  </tr>
  <tr>
     <td valign="middle" align="left"><a href="<?=$makehomecaturl?>" class="morelinks"><?php echo stripslashes($total_offerproducts->prodtitle);?></a></td>
  </tr>
   <tr>
     <td valign="middle" align="left"><?php echo "<s>$".$total_offerproducts->oldprice."</s>&nbsp;&nbsp;&nbsp;&nbsp;<span class='redtext'>$".$total_offerproducts->newprice."</span>";?></td>
  </tr>
 
</table>
</td>
<?php
$sc++;
}
}else
{
   ?>
   <td width="5%" height="23" align="left" valign="top" >No Promotions available..</td>
<?php }
?>
</tr>
</table>