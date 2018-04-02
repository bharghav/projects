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
<td align="left" valign="middle"><h1><img src="allfiles/map.jpeg" alt=""> Store &nbsp;&nbsp;>>&nbsp;&nbsp;Orders</h1></td>
<td align="right" valign="bottom">&nbsp;</td>
</tr>
</table>
</div>
<div class="content">
	 <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list">
          <thead>
            <tr height="25">
              <td width="20" align="center" valign="middle">sno</td>
			   <td width="114" align="left" valign="middle" >Trasaction Id</td>
              <td width="257" align="left" valign="middle" class="sort">
					<div >
					<a href="index.php?option=com_orderlist&ord=ASC&fld=tx_no" class="up" title="up"></a>
					<a href="index.php?option=com_orderlist&ord=DESC&fld=tx_no" class="down" title="down"></a>
					</div>
</td>
<td width="88" align="left" valign="middle" >total price</td>
              <td width="262" align="left" valign="middle" class="sort">
					<div >
					<a href="index.php?option=com_orderlist&ord=ASC&fld=total_price" class="up" title="up"></a>
					<a href="index.php?option=com_orderlist&ord=DESC&fld=total_price" class="down" title="down"></a>
					</div>
</td>
<td width="104" align="left" valign="middle" >Ordered On</td>
              <td width="200" align="left" valign="middle" class="sort">
					<div >
					<a href="index.php?option=com_orderlist&ord=ASC&fld=posted_date" class="up" title="up"></a>
					<a href="index.php?option=com_orderlist&ord=DESC&fld=posted_date" class="down" title="down"></a>
					</div>
</td>

			  <td width="109" align="center" valign="middle" >Order Details</td>
			  <td width="38" align="center" valign="middle" >Status</td>
			  <td width="39" align="center" valign="middle" >Delete</td>
            </tr>
          </thead>
			<tbody>
			<script type="">
					function getdrop(index)
					{
					document.getElementById('statusdisp'+index).style.display="";
					document.getElementById('resultdisp'+index).style.display="none";
					}
					function statusUpdate(st,id,index)
					{
					if(st!="")
					{
					jQuery.ajax({
					type: "POST",
					url: "ajax_status.php",
					data: "&status="+st+"&id="+id,
					success: function(msg){
					jQuery("#resultdisp"+index).html(msg);
					document.getElementById('resultdisp'+index).style.display="";
					document.getElementById('statusdisp'+index).style.display="none";
					}
					});
					}
					}
					</script>
			<?php
			if(sizeof($allorderlist)>0){
					$ii=0;
					foreach($allorderlist as $all_orderlists){
					?>
			<tr height="22">
			<td align="center" valign="middle"><?=($ii+1);?></td>
			<td colspan="2" align="left" valign="middle"><?php echo $all_orderlists->tx_no;?></td>
			<td colspan="2" align="left" valign="middle"><?php echo '$&nbsp;'.$all_orderlists->total_price;?>&nbsp;&nbsp;&nbsp;&nbsp;( <?php echo $all_orderlists->item." Items";?> )</td>
			<td colspan="2" align="left" valign="middle"><?php echo $all_orderlists->posted_date;?></td>
			<td width="109" align="center" valign="middle" ><a href="index.php?option=com_orderlistview&id=<?php echo $all_orderlists->tx_no;?>">Click Here</a></td>
			<td align="center" valign="middle">
			<a href="javascript:void(0);"  id="resultdisp<?=$ii;?>" onclick="getdrop('<?=$ii;?>');"><?php echo ucfirst($all_orderlists->status);?></a>
			<select name="statusdisp" id="statusdisp<?=$ii;?>" style="display:none;" onchange="statusUpdate(this.value,'<?php echo $all_orderlists->tx_id;?>','<?=$ii;?>');">
			<option value="">-- Choose --</option>
			<option value="Arrived">Arrived</option>
			<option value="In Process">In Process</option>
			<option value="Delivered">Delivered</option>
			<option value="Not Delivered">Not Delivered</option>
			</select>
			<script type="text/javascript">
			for(var i=0;i<document.getElementById('statusdisp<?=$ii;?>').length;i++)
			{
				if(document.getElementById('statusdisp<?=$ii;?>').options[i].value=="<?php echo $all_orderlists->status; ?>")
				{
					document.getElementById('statusdisp<?=$ii;?>').options[i].selected=true;
				}
			}			
			</script>
			</td>
			
			<td align="center" valign="middle">
						<a title="delete" href="#" onClick="var q = confirm('Are you sure you want to delete selected record?'); if (q) { window.location = 'index.php?option=com_orderlist&action=delete&id=<?php echo $all_orderlists->tx_no;?>'; return false;}"><img src="allfiles/icon_delete.png"  alt="Delete" border="0"/></a>
			  </td>
			</tr>
			<?php
				$ii++; } } else{
			?>
							<tr><td colspan="10" align="center" height="100">No Orders..</td></tr>
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
			$callConfig->paginavigation($start, $limit, $total, 'index.php?option=com_orderlist', $param);
			?>
			</ul>
			<?php 
			}
			?></td></tr>		

      </table>
	
	</div>
  </div>