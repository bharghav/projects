<?php 
$whichblog=$contentpageObj->checkHomeORBlogPostsForRightNav($_GET['btid']); 
if($whichblog->displayin=="home")
{
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
?>
<tr>
<td align="left" valign="top" colspan="2"><?php include("includes/mycart.php");?></td>
</tr>
<?php }
$homebloglist=$frontUserBlogObj->getAllBlogTopicsList($_GET['btid'],'home','id','DESC',0,20);
if(sizeof($homebloglist)>0)
{
?>
<tr>
<td align="left" valign="middle" colspan="2" style="padding-bottom:0px; padding-top:5px"><strong class="boldtext">ARTICLE ARCHIVES</strong></td>
</tr>
<tr>
<td align="left" valign="middle" colspan="2" ><hr class="boldtext_hr"/></td>
</tr>
<tr>
<?php 
$fib=0;
foreach($homebloglist as $homeblog_list)
{
$makehomecaturl="homeindivtopic.php?bcid=".$homeblog_list->parentid."&btid=".$homeblog_list->id;
if($fib%1==0)
echo "<tr>";
?>
<td width="5%" height="23" align="left" valign="top" >
<?php /*?><table width="135" border="0" cellspacing="2" cellpadding="1" >
  <tr>
    <td valign="middle" align="center" style="height:96px;"><a href="<?=$makehomecaturl?>" >
	<?php if($homeblog_list->image!=""){?>
	<img src="uploads/blog/<?php echo $homeblog_list->image;?>" width="135" height="96"  border="0" alt="<?php echo stripslashes($homeblog_list->title);?>"/>
	<?php } else {?>
	<img src="images/nopreview.jpg" width="135" height="96" border="0"/><?php }?>
	</a></td>
  </tr>
  <tr>
     <td valign="middle" align="left"><a href="<?=$makehomecaturl?>" class="morelinks"><?php echo stripslashes($homeblog_list->title);?></a></td>
  </tr>
</table><?php */?>
<table width="283" border="0" cellspacing="0" cellpadding="0" >
<tr>
  <td width="11" height="22" align="left" valign="middle"><img src="images/arrow.jpg" width="12" height="12"  border="0" /></td>
     <td width="262" height="22" align="left" valign="middle"><a href="<?=$makehomecaturl?>" class="morelinks"><strong>
	 <?php 
	 $cntstr=strlen($homeblog_list->title);
	 if($cntstr>37)
	 $con="&nbsp;&nbsp;...";
	 else
	 $con="";
	 echo substr(stripslashes($homeblog_list->title),0,37).$con;?></strong></a></td>
  </tr>
  <tr>
  <td valign="middle" align="left">&nbsp;</td>
    <td valign="middle" align="left" style="height:96px;"><a href="<?=$makehomecaturl?>" >
	<img src="uploads/blog/<?php echo $homeblog_list->image;?>" width="250" height="107"  border="0" alt="<?php echo stripslashes($homeblog_list->title);?>"/>
	</a></td>
  </tr>
  <tr>
  <td height="20" align="left" valign="top">&nbsp;</td>
     <td height="20" align="left" valign="top"><a href="<?=$makehomecaturl?>" class="morelinks">Posted On : <?php echo date("d M, Y", strtotime($homeblog_list->date)); ?></a></td>
  </tr>
  <?php /*?><tr>
  <td valign="middle" align="left">&nbsp;</td>
     <td valign="middle" align="left"><a href="<?=$makehomecaturl?>" class="morelinks"><?php echo stripslashes($homeblog_list->title);?></a></td>
  </tr><?php */?>
</table>
</td>

<?php
$fib++;
}
}  else {
?>
<?php 
if($_GET['bcid']!="") {
$homebloglist=$frontUserBlogObj->getAllBlogTopicsList($_GET['bcid'],'home','id','DESC',0,20);
$headingart="ARTICLE ARCHIVES";
?>
<tr>
<td align="left" valign="middle" colspan="2" style="padding-bottom:0px; padding-top:5px"><strong class="boldtext"><?=$headingart?></strong></td>
</tr>
<tr>
<td align="left" valign="middle" colspan="2" ><hr class="boldtext_hr"/></td>
</tr>
<tr>
<?php
$fib=0;
foreach($homebloglist as $homeblog_list)
{
$makehomecaturl="homeindivtopic.php?bcid=".$homeblog_list->parentid."&btid=".$homeblog_list->id;
if($fib%1==0)
echo "<tr>";
?>
<td width="5%" height="23" align="left" valign="top" >
<table width="283" border="0" cellspacing="0" cellpadding="0" >
<tr>
  <td width="11" height="22" align="left" valign="middle"><img src="images/arrow.jpg" width="12" height="12"  border="0" /></td>
     <td width="262" height="22" align="left" valign="middle"><a href="<?=$makehomecaturl?>" class="morelinks"><strong><?php 
	 $cntstr1=strlen($homeblog_list->title);
	 if($cntstr1>37)
	 $con1="&nbsp;&nbsp;...";
	 else
	 $con1="";
	 echo substr(stripslashes($homeblog_list->title),0,37).$con1;?></strong></a>
	 </td>
  </tr>
  <tr>
  <td valign="middle" align="left">&nbsp;</td>
    <td valign="middle" align="left" style="height:96px;"><a href="<?=$makehomecaturl?>" >
	<img src="uploads/blog/<?php echo $homeblog_list->image;?>" width="250" height="107"  border="0" alt="<?php echo stripslashes($homeblog_list->title);?>"/>
	</a></td>
  </tr>
  <tr>
  <td height="20" align="left" valign="top">&nbsp;</td>
     <td height="20" align="left" valign="top"><a href="<?=$makehomecaturl?>" class="morelinks">Posted On : <?php echo date("d M, Y", strtotime($homeblog_list->date)); ?></a></td>
  </tr>
  <?php /*?><tr>
  <td valign="middle" align="left">&nbsp;</td>
     <td valign="middle" align="left"><a href="<?=$makehomecaturl?>" class="morelinks"><?php echo stripslashes($homeblog_list->title);?></a></td>
  </tr><?php */?>
</table>
</td>
<?php
$fib++;
}
}  else {
?>
<?php 
$homebloglist=$frontUserBlogObj->getAllBlogTopicsList('0','home','id','DESC',0,20);
$headingart="HOME ARTICLE";
?>
<tr>
<td align="left" valign="middle" colspan="2" style="padding-bottom:0px; padding-top:5px"><strong class="boldtext"><?=$headingart?></strong></td>
</tr>
<tr>
<td align="left" valign="middle" colspan="2" ><hr class="boldtext_hr"/></td>
</tr>
<tr>
<?php
$fib=0;
foreach($homebloglist as $homeblog_list)
{
$makehomecaturl="homeindivtopic.php?btid=".$homeblog_list->id;
if($fib%2==0)
echo "<tr>";
?>
<td width="5%" height="23" align="left" valign="top" >
<table width="135" border="0" cellspacing="2" cellpadding="1" >
  <tr>
    <td valign="middle" align="center" style="height:96px;"><a href="<?=$makehomecaturl?>" >
	<img src="uploads/blog/<?php echo $homeblog_list->image;?>" width="135" height="96"  border="0" alt="<?php echo stripslashes($homeblog_list->title);?>"/>
	</a></td>
  </tr>
  <tr>
     <td valign="middle" align="left"><a href="<?=$makehomecaturl?>" class="morelinks"><?php echo stripslashes($homeblog_list->title);?></a></td>
  </tr>
</table>
</td>
<?php
$fib++;
}
?>
<?php }?>
<?php }?>
</tr>
</table>
<?php
} else
{
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
?>
<tr>
<td align="left" valign="top" colspan="2"><?php include("includes/mycart.php");?></td>
</tr>
<?php }?>
<tr>
<td align="left" valign="middle" colspan="2" style="padding-bottom:0px; padding-top:5px"><strong class="boldtext">BLOG TOPICS</strong></td>
</tr>
<tr>
<td align="left" valign="middle" colspan="2" ><hr class="boldtext_hr"/></td>
</tr>
<tr>
<?php 
$homebloglist=$frontUserBlogObj->getAllBlogTopicsList('0','blog','id','DESC','','');
$fib=0;
foreach($homebloglist as $homeblog_list)
{
$makehomecaturl="blogindivtopic.php?btid=".$homeblog_list->id;
if($homeblog_list->id==4)
$makehomecaturl="relationshipadvice.php?btid=".$homeblog_list->id;
if($homeblog_list->id==9)
$makehomecaturl="onlinestore.php";
if($_GET['btid']==$homeblog_list->id){
$actviclass="class='blogcategoryactive'";
$actviclassarrow="images/arrow-black_13.gif";
}else {
$actviclass="class='blogcategory'";
$actviclassarrow="images/arrow_13.gif";
}
if($fib%2==0)
echo "<tr>";
?>
<td width="5%" height="23" align="left" valign="top" >
<table width="135" border="0" cellspacing="2" cellpadding="1" >
  <tr>
    <td valign="middle" align="center" style="height:96px;"><a href="<?=$makehomecaturl?>" >
	<?php if($homeblog_list->image!=""){?>
	<img src="uploads/blog/<?php echo $homeblog_list->image;?>" width="135" height="96"  border="0" alt="<?php echo stripslashes($homeblog_list->title);?>"/>
	<?php } else {?>
	<img src="images/nopreview.jpg" width="135" height="96" border="0"/><?php }?>
	</a></td>
  </tr>
  <tr>
     <td valign="middle" align="left"><a href="<?=$makehomecaturl?>" class="morelinks"><?php echo stripslashes($homeblog_list->title);?></a></td>
  </tr>
</table>
</td>
<?php
$fib++;
}
?>
</tr>
</table>
<?php
}
?>