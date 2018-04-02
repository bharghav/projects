<?php 
include('includes/session.php');
include("model/store.class.php");
$storeObj=new storeClass();
if($_GET['action']=="delete"){
   $storeObj->OrderDelete($_GET['id']);
}
if($_GET['st']!="" || $_GET['st']=="Pending" || $_GET['st']=="Delivered"){
   $storeObj->OrderStatusChanging($_GET);
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
$fldname="tx_id";
if($_GET['ord']!="")
$orderby=$_GET['ord'];
else
$orderby="DESC";
$allorderlist=$storeObj->getAllOrdersList($fldname,$orderby,$start,$limit);
$total=$storeObj->getAllOrdersListCount();
?>
<script type="text/javascript">
function getrelatedData(val){
window.location.href="index.php?option=com_orderlist&b_id="+val;
}
</script>
<div class="box">
<div class="heading">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="middle"><h1><img src="allfiles/map.jpeg" alt=""> Store &nbsp;&nbsp;>>&nbsp;&nbsp;Order Details</h1></td>
<td align="right" valign="bottom">&nbsp;</td>
</tr>
</table>
</div>
<div class="content">
<?php 
$query=$callConfig->selectQuery(TPREFIX.TBL_CART_TRANSACTION,'*',"tx_no='".$_GET['id']."'",'','','');
$trasactiondetails=$callConfig->getRow($query);

$query=$callConfig->selectQuery(TPREFIX.TBL_CART_ORDER,'*',"tx_no='".$_GET['id']."'",'','','');
$resitems=$callConfig->getAllRows($query);

$query=$callConfig->selectQuery(TPREFIX.TBL_ADMIN,'*',"user_id='".$trasactiondetails->reg_id."'",'','','');
$userdata=$callConfig->getRow($query);

$query_info=$callConfig->selectQuery(TPREFIX.TBL_ADMINSINFO,'*',"userid='".$trasactiondetails->reg_id."'",'','','');
$userdata_info=$callConfig->getRow($query_info);

$username=$userdata->us_name;
$to=$userdata->email;
?>
<table cellspacing="0" cellpadding="0"  align="left" width="100%" border="0" style="border:1px solid #CCCCCC; border-collapse:collapse; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;" class="list">

<tr>
<td height="25" colspan="2" align="left" valign="top"><strong>Order date:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("d-m-Y",strtotime($trasactiondetails->posted_date));?> <small>&nbsp;&nbsp;(DD/MM/YYYY)</small> </td>
</tr>
<tr>
<td height="25" colspan="2" align="left" valign="top"><strong>Transaction ID:</strong>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_REQUEST["id"];?> </td>
</tr>
<tr>
<td height="25" colspan="2" align="left" valign="top"><strong>Status:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $trasactiondetails->status?> </td>
</tr>
<tr>
<td height="25" colspan="2" align="left" valign="top"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" style="border:1px solid #eeeeee; border-collapse:collapse;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">
<tr>
<td width="396" height="25" align="left" valign="middle"><strong>Product Name </strong></td>
<td width="239" align="left" valign="middle"><strong>Product Size</strong></td>
<td width="239" height="25" align="left" valign="middle"><strong>Quantity</strong></td>
<td width="238" height="25" align="left" valign="middle"><strong>Price</strong></td>
<td width="312" height="25" align="left" valign="middle"><strong>Total</strong></td>
</tr>
<?php foreach($resitems as $itemlist)
{
?>
<tr>
<td height="25" align="left" valign="middle"><?php echo $itemlist->prod_name;?></td>
<td align="left" valign="middle"><?php echo $itemlist->prod_size;?></td>
<td height="25" align="left" valign="middle"><?php echo $itemlist->quantity;?></td>
<td height="25" align="left" valign="middle"><?php echo '$&nbsp;'.$itemlist->indiv_price;?></td>
<td height="25" align="left" valign="middle"><?php echo '$&nbsp;'.$itemlist->total_price;?></td>
</tr>
<?php }?>
<tr>
<td height="25" colspan="4" align="right" valign="middle" >&nbsp;</td>
<td height="25"  align="left" valign="middle" ><strong>Shipping Rate:&nbsp;<?php echo '$&nbsp;'.($trasactiondetails->shiptotal);?></strong></td>
</tr>
<tr>
<td height="25" colspan="4" align="right" valign="middle" >&nbsp;</td>
<td height="25"  align="left" valign="middle" ><strong>Grand Total:&nbsp;<?php echo '$&nbsp;'.$trasactiondetails->total_price;?></strong></td>
</tr>
</table></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td height="25" colspan="2" align="left" valign="top"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" style="border:1px solid #eeeeee; border-collapse:collapse;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">
<tr>
<td width="15%" height="25" align="left" valign="middle" ><strong>Billing Address:</strong></td>
<td width="32%" height="25" align="left" valign="middle" >&nbsp;</td>
<td width="15%" height="25" align="left" valign="middle" ><strong>Shipping Address:</strong></td>
<td width="38%" height="25" align="left" valign="middle" >&nbsp;</td>
</tr>
<tr>
<td height="23" align="left" valign="middle"><strong>Address:</strong></td>
<td height="23" align="left" valign="middle"><?php echo $userdata_info->b_address;?></td>
<td height="23" align="left" valign="middle"><strong>Address:</strong></td>
<td height="23" align="left" valign="middle"><?php echo $trasactiondetails->s_address;?></td>
</tr>
<tr>
<td height="23" align="left" valign="middle"><strong>City:</strong></td>
<td height="23" align="left" valign="middle"><?php echo $userdata_info->b_city;?></td>
<td height="23" align="left" valign="middle"><strong>City:</strong></td>
<td height="23" align="left" valign="middle"><?php echo $trasactiondetails->s_city;?></td>
</tr>
<tr>
<td height="23" align="left" valign="middle"><strong>State:</strong></td>
<td height="23" align="left" valign="middle"><?php echo $userdata_info->b_state;?></td>
<td height="23" align="left" valign="middle"><strong>State:</strong></td>
<td height="23" align="left" valign="middle"><?php echo $trasactiondetails->s_state;?></td>
</tr>
<tr>
<td height="23" align="left" valign="middle"><strong>Country:</strong></td>
<td height="23" align="left" valign="middle"><?php echo $userdata_info->b_country;?></td>
<td height="23" align="left" valign="middle"><strong>Country:</strong></td>
<td height="23" align="left" valign="middle"><?php echo $trasactiondetails->s_country;?></td>
</tr>
<tr>
<td height="23" align="left" valign="middle"><strong>Zip Code:</strong></td>
<td height="23" align="left" valign="middle"><?php echo $userdata_info->b_zipcode;?></td>
<td height="23" align="left" valign="middle"><strong>Zip Code:</strong></td>
<td height="23" align="left" valign="middle"><?php echo $trasactiondetails->s_zipcode;?></td>
</tr>
<tr>
<td height="23" align="left" valign="middle"><strong>Phone:</strong></td>
<td height="23" align="left" valign="middle"><?php echo $userdata_info->b_phoneno;?></td>
<td height="23" align="left" valign="middle"><strong>Phone:</strong></td>
<td height="23" align="left" valign="middle"><?php echo $trasactiondetails->s_phoneno;?></td>
</tr>
</table></td>
</tr>
</table>
  </div>
  </div>