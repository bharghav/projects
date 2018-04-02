<?php 
include('includes/session.php');
include("model/blog.class.php");
$blogtopicObj=new blogtopicClass();
if($_GET['action']=="delete"){
   $blogtopicObj->RelationAdviceDelete($_GET['id']);
}
if($_POST['admininsert']=="Submit"){
   $blogtopicObj->insertRelationAdvice($_POST);
}
if($_POST['admininsert']=="Update"){
   $blogtopicObj->updateRelationAdvice($_POST);
}
if(isset($_GET['id']) && $_GET['id']!=""){
   $hdn_value="Update";
   $indivdata=$blogtopicObj->getRelationshipAdviceData($_GET['id']); 
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
$fldname="rid";
if($_GET['ord']!="")
$orderby=$_GET['ord'];
else
$orderby="DESC";
$allrelationadvices=$blogtopicObj->getAllRelationshipAdviceList($fldname,$orderby,$start,$limit);
$total=$blogtopicObj->getAllRelationshipAdviceListCount();

if($option!="com_relationadvice_insert"){
?>
<div class="box">
<div class="heading">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="middle"><h1><img src="allfiles/map.jpeg" alt="">Home &nbsp;&nbsp;>>&nbsp;&nbsp; Article &nbsp;&nbsp;>>&nbsp;&nbsp;Relationship Advice</h1></td>
<td align="right" valign="bottom"><input class="button button_add" value="" type="button" onclick="window.location.href='index.php?option=com_relationadvice_insert';"></td>
</tr>
</table>
</div>
<div class="content">
	 <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list">
          <thead>
            <tr height="25">
              <td width="33" align="center" valign="middle">sno</td>
		      <td width="488" align="left" valign="middle" >Advice</td>
		      <td width="576" align="left" valign="middle" >Reply</td>
               <td width="92" align="left" valign="middle" >IP Address</td>
			  <td width="38" align="center" valign="middle" >Status</td>
              <td width="32" align="center" valign="middle" >Edit</td>
			  <td width="41" align="center" valign="middle" >Delete</td>
            </tr>
          </thead>
			<tbody>
			<?php
			if(sizeof($allrelationadvices)>0){
					$ii=0;
					foreach($allrelationadvices as $all_relationadvices){
					?>
			<tr height="22">
			<td align="center" valign="middle"><?=($ii+1);?></td>
			<td align="left" valign="middle"><?php echo substr(stripslashes($all_relationadvices->comments),0,300);?></td>
			<td align="left" valign="middle"><?php echo substr(stripslashes($all_relationadvices->answers),0,300);?></td>
            <td align="left" valign="middle"><?php echo $all_relationadvices->ip_address;?></td>
			<td align="center" valign="middle"><?php echo $all_relationadvices->status;?></td>
			<td align="center" valign="middle"x><a title="edit" href="index.php?option=com_relationadvice_insert&id=<?php echo $all_relationadvices->rid;?>"><img src="allfiles/icon_edit.png" alt="Edit" border="0"></a></td>
  <td align="center" valign="middle">
						<a title="delete" href="#" onClick="var q = confirm('Are you sure you want to delete selected record?'); if (q) { window.location = 'index.php?option=com_relationadvice&action=delete&id=<?php echo $all_relationadvices->rid;?>'; return false;}"><img src="allfiles/icon_delete.png"  alt="Delete" border="0"/></a>			  </td>
			</tr>
			<?php
				$ii++; } } else{
			?>
							<tr><td colspan="8" align="center" height="100">No Records..</td>
			  </tr>
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
			$callConfig->paginavigation($start, $limit, $total, 'index.php?option=com_relationadvice', $param);
			?>
			</ul>
			<?php 
			}
			?></td>
	   </tr>		
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
	if(trim(document.frmCreatestate.comments.value)=="")
	{ 
		alert("Please enter Advice");
		document.frmCreatestate.comments.value='';
		document.frmCreatestate.comments.focus();
		return false;
	}
		if(trim(document.frmCreatestate.answers.value)=="")
	{ 
		alert("Please enter Reply");
		document.frmCreatestate.answers.value='';
		document.frmCreatestate.answers.focus();
		return false;
	}
return true;
}
</script>
 <div class="box">
<div class="heading">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="middle"> <h1><img src="allfiles/map.jpeg" alt="">Home &nbsp;&nbsp;>>&nbsp;&nbsp; Article &nbsp;&nbsp;>>&nbsp;&nbsp;Add Relationship Advice  &nbsp;&nbsp;/&nbsp;&nbsp;  EDIT Relationship Advice</h1></td>
<td align="right" valign="bottom">&nbsp;</td>
</tr>
</table>
</div>
<div class="content">
<form action="index.php?option=com_relationadvice_insert" method="post" id="frmCreatestate" name="frmCreatestate" class="middle_form" enctype="multipart/form-data" onSubmit="return validate();">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" >
			<tr>
                <td align="left" valign="top" class="caption-field"><label class="title">Advice:</label></td>
                <td align="left" valign="middle" class="caption-field"><textarea name="comments" id="comments" cols="150" rows="5"><?php echo  stripslashes($indivdata->comments);?></textarea></td>
				</tr>
				 <tr><td colspan="2" height="7"></td></tr>
				 
				 <tr>
                <td align="left" valign="top" class="caption-field"><label class="title">Reply:</label></td>
                <td align="left" valign="middle" class="caption-field"><textarea name="answers" id="answers" cols="150" rows="5"><?php echo  stripslashes($indivdata->answers);?></textarea></td>
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
	<td align="left" valign="middle" colspan="2"><input name="hdn_id" type="hidden" value="<?php echo $indivdata->rid?>"><input value="<?php echo $hdn_value;?>" class="button button_add" type="hidden" name="admininsert"><?php /*?><input <?php echo $hdn_in_up;?> type="submit" value=""><?php */?><input <?php echo $hdn_in_up;?> type="submit" value="" >	</td>
	</tr>
        </table>
	</form>	
	</div>
  </div>
 <?php }?>