<?php 
include('includes/session.php');
include("model/blog.class.php");
$blogtopicObj=new blogtopicClass();
if($_GET['action']=="delete"){
   $blogtopicObj->ipaddressDelete($_GET['id']);
}
if($_GET['st']!="" || $_GET['st']=="Block" || $_GET['st']=="Unblock"){
   $blogtopicObj->ipaddressStatusChanging($_GET);
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
$allips=$blogtopicObj->getAllIpsList($fldname,$orderby,$start,$limit);
$total=$blogtopicObj->getAllIpsListCount();
?>
<div class="box">
<div class="heading">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="middle"><h1><img src="allfiles/map.jpeg" alt=""> IP Address Tracing</h1></td>
<td align="right" valign="bottom">&nbsp;</td>
</tr>
</table>
</div>
<div class="content">
	 <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list">
          <thead>
            <tr height="25">
              <td width="29" align="center" valign="middle">sno</td>
              <td width="112" align="left" valign="middle" >ip address</td>
              <td width="40" align="left" valign="middle" class="sort">
                <div >
                <a href="index.php?option=com_iptrace&ord=ASC&fld=ip_address" class="up" title="up"></a>
                <a href="index.php?option=com_iptrace&ord=DESC&fld=ip_address" class="down" title="down"></a>
                </div>
                </td>
               <td width="1045" align="left" valign="middle" >Activities List and Count</td>
			  <td width="48" align="center" valign="middle" >Status</td>
			  <td width="43" align="center" valign="middle" >Delete</td>
            </tr>
          </thead>
			<tbody>
			<?php
			if(sizeof($allips)>0){
					$ii=0;
					foreach($allips as $all_ips){
					if($all_ips->status=="Block")
					$ips="Unblock";
					else
					$ips="Block";
					?>
			<tr height="22">
			<td align="center" valign="middle"><?=($ii+1);?></td>
			<td colspan="2" align="left" valign="middle"><?php echo $all_ips->ip_address;?></td>
            <td  align="left" valign="middle"><?=$blogtopicObj->ipAddressPostingsandCommentsTracing($all_ips->ip_address);?></td>
			<td align="center" valign="middle"><a href="index.php?option=com_iptrace&id=<?php echo $all_ips->id;?>&st=<?php echo $all_ips->status;?>" title="Want to <?=$ips?> ? "><?php echo $all_ips->status;?></a></td>
			<td align="center" valign="middle">
						<a title="delete" href="#" onClick="var q = confirm('Are you sure you want to delete selected record?'); if (q) { window.location = 'index.php?option=com_iptrace&action=delete&id=<?php echo $all_ips->id;?>'; return false;}"><img src="allfiles/icon_delete.png"  alt="Delete" border="0"/></a>
			  </td>
			</tr>
			<?php
				$ii++; } } else{
			?>
							<tr><td colspan="8" align="center" height="100">No IP Addresses..</td></tr>
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
			if($_GET['b_id']!="")
			$param.="&b_id=".$_GET['b_id'];
			$callConfig->paginavigation($start, $limit, $total, 'index.php?option=com_iptrace', $param);
			?>
			</ul>
			<?php 
			}
			?></td></tr>		

      </table>
	
	</div>
  </div>