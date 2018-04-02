<?php 
include('includes/session.php');
include("model/newsletter.class.php");
$newsletterObj=new newsletterClass();
if($_GET['action']=="delete"){
   $newsletterObj->subsciberDelete($_GET['id']);
}
if($_GET['st']!="" || $_GET['st']=="Active" || $_GET['st']=="Inactive"){
   $newsletterObj->subsciberStatusChanging($_GET);
}
if($_POST['pageredirect']=="Send Mails")
{
 $newsletterObj->massMailSending($_POST);
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
$allsubscribers=$newsletterObj->getAllSubscibersList($fldname,$orderby,$start,$limit);
$total=$newsletterObj->getAllSubscibersListCount();
?>
<script type="text/javascript">
function getrelatedData(val){
window.location.href="index.php?option=com_subscribers&b_id="+val;
}
</script>
<script type="text/javascript" src="js/checkuncheckall.js"></script>
<div class="box">
<div class="heading">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="middle"><h1><img src="allfiles/map.jpeg" alt=""> Subscribers</h1></td>
<td align="right" valign="bottom">&nbsp;</td>
</tr>
</table>
</div>
<div class="content">
<form method="post" name="myform" action="">
	 <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list">
          <thead>
            <tr height="25">
              <td width="20" align="center" valign="middle">sno</td>
			   <td width="238" align="left" valign="middle" >Email Id</td>
              <td width="761" align="left" valign="middle" class="sort">
					<div >
					<a href="index.php?option=com_subscribers&ord=ASC&fld=emailid" class="up" title="up"></a>
					<a href="index.php?option=com_subscribers&ord=DESC&fld=emailid" class="down" title="down"></a>
					</div>
</td>
			  <td width="63" align="center" valign="middle" >Status</td>
              <td width="111" align="center" valign="middle" >Mass Mail
              <input type="checkbox" name="check" id="check" value="" onclick="checkAlluncheckAll('myform', 'list')"/>
              </td>
			  <td width="38" align="center" valign="middle" >Delete</td>
            </tr>
          </thead>
			<tbody>
			<?php
			if(sizeof($allsubscribers)>0){
					$ii=0;
					foreach($allsubscribers as $allsubscriberslist){
					?>
			<tr height="22">
			<td align="center" valign="middle"><?=($ii+1);?></td>
			<td colspan="2" align="left" valign="middle"><?php echo $allsubscriberslist->emailid;?></td>
			<td align="center" valign="middle"><a href="index.php?option=com_subscribers&id=<?php echo $allsubscriberslist->id;?>&st=<?php echo $allsubscriberslist->status;?>"><?php echo $allsubscriberslist->status;?></a></td>
            
            <td align="right" valign="middle">
			<?php
			if($allsubscriberslist->status=="Active")
			{
			?>
			<input type="checkbox" name="list[]" id="list" value="<?php echo $allsubscriberslist->emailid; ?>" />
			<?php } else {?>
			<input type="checkbox" name="list[]" id="list"  disabled="disabled" />
			<?php }?>
			&nbsp;&nbsp;</td>
			<td align="center" valign="middle">
						<a title="delete" href="#" onClick="var q = confirm('Are you sure you want to delete selected record?'); if (q) { window.location = 'index.php?option=com_subscribers&action=delete&id=<?php echo $allsubscriberslist->id;?>'; return false;}"><img src="allfiles/icon_delete.png"  alt="Delete" border="0"/></a>
			  </td>
			</tr>
			<?php
				$ii++; } } else{
			?>
				<tr><td colspan="8" align="center" height="100">No Subscribers..</td></tr>
			<?php 
			}
			?>
			</tbody>
						
            <tr> <td align="right" colspan="4"></td><td align="right" ><input type="submit" name="pageredirect" value="Send Mails"/> </td><td align="right" >&nbsp;</td></tr>		
                        
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
			$callConfig->paginavigation($start, $limit, $total, 'index.php?option=com_subscribers', $param);
			?>
			</ul>
			<?php 
			}
			?>
            
            
            </td>
            </tr>
            

      </table>
	</form>
	</div>
  </div>