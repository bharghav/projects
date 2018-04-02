<?php 
include('includes/session.php');
include("model/blog.class.php");
$blogtopicObj=new blogtopicClass();
if($_GET['action']=="delete"){
   $blogtopicObj->BlogCommentDelete($_GET['id']);
}
if($_GET['st']!="" || $_GET['st']=="Active" || $_GET['st']=="Inactive"){
   $blogtopicObj->BlogCommentStatusChanging($_GET);
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
$allblogposts=$blogtopicObj->getAllBlogCommentsList('blog',$_GET['b_id'],$fldname,$orderby,$start,$limit);
$total=$blogtopicObj->getAllBlogCommentsListCount('blog',$_GET['b_id']);
?>
<script type="text/javascript">
function getrelatedData(val){
window.location.href="index.php?option=com_blogcommnets&b_id="+val;
}
</script>
<div class="box">
<div class="heading">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="middle"><h1><img src="allfiles/map.jpeg" alt=""> Blog &nbsp;&nbsp;>>&nbsp;&nbsp;Comments</h1></td>
<td align="right" valign="bottom"><strong>Blog Posts </strong>&nbsp;&nbsp;
  <select name="blogtopic" id="blogtopic"  onchange="getrelatedData(this.value);">
<option value="all">All Comments</option>
<?php
$blogtopics=$blogtopicObj->getAllBlogTopicsListDropDown('','blog',"id","DESC","","");
foreach($blogtopics as $blogtopicsllistdrop){
?>
<option value="<?=$blogtopicsllistdrop->id;?>"><?=stripslashes($blogtopicsllistdrop->title);?></option>
<?php 
}
?>
</select>
<script type="text/javascript">
for(var i=0;i<document.getElementById('blogtopic').length;i++)
{
		if(document.getElementById('blogtopic').options[i].value=="<?php echo $_GET['b_id']; ?>")
		{
		document.getElementById('blogtopic').options[i].selected=true
		}
}			
</script>
	</td>
</tr>
</table>
</div>
<div class="content">
	 <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list">
          <thead>
            <tr height="25">
              <td width="20" align="center" valign="middle">sno</td>
			   <td width="238" align="left" valign="middle" >comment</td>
              <td width="855" align="left" valign="middle" class="sort">
					<div >
					<a href="index.php?option=com_blogcommnets&ord=ASC&fld=comment_text" class="up" title="up"></a>
					<a href="index.php?option=com_blogcommnets&ord=DESC&fld=comment_text" class="down" title="down"></a>
					</div>
</td>
			  <td width="46" align="center" valign="middle" >Status</td>
			  <td width="38" align="center" valign="middle" >Delete</td>
            </tr>
          </thead>
			<tbody>
			<?php
			if(sizeof($allblogposts)>0){
					$ii=0;
					foreach($allblogposts as $all_blogposts){
					?>
			<tr height="22">
			<td align="center" valign="middle"><?=($ii+1);?></td>
			<td colspan="2" align="left" valign="middle"><?php echo substr(stripslashes($all_blogposts->comment_text),0,300);?></td>
			<td align="center" valign="middle"><a href="index.php?option=com_blogcommnets&id=<?php echo $all_blogposts->id;?>&st=<?php echo $all_blogposts->status;?>"><?php echo $all_blogposts->status;?></a></td>
			<td align="center" valign="middle">
						<a title="delete" href="#" onClick="var q = confirm('Are you sure you want to delete selected record?'); if (q) { window.location = 'index.php?option=com_blogcommnets&action=delete&id=<?php echo $all_blogposts->id;?>'; return false;}"><img src="allfiles/icon_delete.png"  alt="Delete" border="0"/></a>
			  </td>
			</tr>
			<?php
				$ii++; } } else{
			?>
							<tr><td colspan="8" align="center" height="100">No Comments..</td></tr>
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
			$callConfig->paginavigation($start, $limit, $total, 'index.php?option=com_blogcommnets', $param);
			?>
			</ul>
			<?php 
			}
			?></td></tr>		

      </table>
	
	</div>
  </div>