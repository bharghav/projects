<?php 
include('includes/session.php');
include("model/elearn.class.php");
$storeObj=new elearnClass();
if($_GET['action']=="delete"){
   $storeObj->questionDelete($_GET['id']);
}
if($_POST['admininsert']=="Submit"){
   $storeObj->insertQuestions($_POST);
}
if($_POST['admininsert']=="Update"){
   $storeObj->updateQuestion($_POST);
}
if(isset($_GET['id']) && $_GET['id']!=""){
   $hdn_value="Update";
   $indivdata=$storeObj->getQuestionData($_GET['id']); 
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
$fldname="qid";
if($_GET['ord']!="")
$orderby=$_GET['ord'];
else
$orderby="DESC";
$allforumlist=$storeObj->getAllQuestionsList('',$fldname,$orderby,$start,$limit);
$total=$storeObj->getAllQuestionsListCount('');

if($option!="com_question_insert"){
?>
<div class="box">
<div class="heading">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="middle"><h1><img src="allfiles/map.jpeg" alt="">E-learning &nbsp;&nbsp;>>&nbsp;&nbsp;Questions</h1></td>
<td align="right" valign="bottom"><input class="button button_add" value="" type="button" onclick="window.location.href='index.php?option=com_question_insert';"></td>
</tr>
</table>
</div>
<div class="content">
	 <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list">
          <thead>
            <tr height="25">
              <td width="20" align="center" valign="middle">sno</td>
			   <td width="227" align="left" valign="middle" >title</td>
              <td width="750" align="left" valign="middle" class="sort">
					<div >
					<a href="index.php?option=com_question&ord=ASC&fld=catetitle" class="up" title="up"></a>
					<a href="index.php?option=com_question&ord=DESC&fld=catetitle" class="down" title="down"></a>
					</div>
				</td>
 			 <!-- <td width="116" align="center" valign="middle" >Image</td> -->
			  <td width="45" align="center" valign="middle" >Status</td>
              <td width="33" align="center" valign="middle" >Edit</td>
			  <td width="40" align="center" valign="middle" >Delete</td>
            </tr>
          </thead>
			<tbody>
			<?php
			if(sizeof($allforumlist)>0){
					$ii=0;
					foreach($allforumlist as $allforum_list){
					?>
			<tr height="22">
			<td align="center" valign="middle"><?=($ii+1);?></td>
			<td colspan="2" align="left" valign="middle"><?php echo stripslashes($allforum_list->questitle);?></td>
			<!-- <td align="center" valign="middle"><img src="../uploads/store/category/thumbs/<?php echo $allforum_list->image;?>" width="50" height="50" /></td> -->
			<td align="center" valign="middle"><?php echo $allforum_list->status;?></td>
			<td align="center" valign="middle"x><a title="edit" href="index.php?option=com_question_insert&id=<?php echo $allforum_list->qid;?>"><img src="allfiles/icon_edit.png" alt="Edit" border="0"></a></td>
			<td align="center" valign="middle">
						<a title="delete" href="#" onClick="var q = confirm('Are you sure you want to delete selected record?'); if (q) { window.location = 'index.php?option=com_question&action=delete&id=<?php echo $allforum_list->qid;?>'; return false;}"><img src="allfiles/icon_delete.png"  alt="Delete" border="0"/></a>
			  </td>
			</tr>
			<?php
				$ii++; } } else{
			?>
							<tr><td colspan="8" align="center" height="100">No Records..</td></tr>
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
			$callConfig->paginavigation($start, $limit, $total, 'index.php?option=com_question', $param);
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
	if(trim(document.frmCreatestate.questitle.value)=="")
	{ 
		alert("Please enter Category title");
		document.frmCreatestate.questitle.value='';
		document.frmCreatestate.questitle.focus();
		return false;
	}
	//alert(document.frmCreatestate.bigtext.value.length);
	if(trim(document.frmCreatestate.question.value)=="")
	{ 
		alert("Please enter Description");
		document.frmCreatestate.question.value='';
		document.frmCreatestate.question.focus();
		return false;
	}
	if(trim(document.frmCreatestate.questype.value)=="")
	{ 
		alert("Please enter Question Type");
		document.frmCreatestate.questype.value='';
		document.frmCreatestate.questype.focus();
		return false;
	}
	if(trim(document.frmCreatestate.quesmarks.value)=="")
	{ 
		alert("Please enter Question Marks");
		document.frmCreatestate.quesmarks.value='';
		document.frmCreatestate.quesmarks.focus();
		return false;
	}

	
	/*var imagehdnval="<?=$indivdata->image?>";
	if(imagehdnval=="")
	{
		if(trim(document.frmCreatestate.image.value)=="")
		{ 
		alert("Please Upload Image");
		document.frmCreatestate.image.value='';
		document.frmCreatestate.image.focus();
		return false;
		}
		if(!/(\.bmp|\.gif|\.jpg|\.jpeg|\.png)$/i.test(fld.value))
		{
		alert("Please Upload Valid image/file type");
		fld.value='';
		fld.focus();
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
<td align="left" valign="middle"> <h1><img src="allfiles/map.jpeg" alt=""> E-learning &nbsp;&nbsp;>>&nbsp;&nbsp; Add Question &nbsp;&nbsp;/&nbsp;&nbsp; Edit Question</h1></td>
<td align="right" valign="bottom">&nbsp;</td>
</tr>
</table>
</div>
<div class="content">
<form action="index.php?option=com_question_insert" method="post" id="frmCreatestate" name="frmCreatestate" class="middle_form" enctype="multipart/form-data" onsubmit="return validate(this.image);">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" >
	<tr>
                <td width="6%" align="left" class="caption-field"><label class="title">Category :</label></td>
                <td width="94%" align="left" valign="middle">
				<script type="text/javascript">
				function getState(val) {
					$.ajax({
					type: "POST",
					url: "./get_state.php?action=question",
					data:'category_id='+val,
					success: function(data){
						$("#state-list").html(data);
					}
					});
				}
				</script>
				<select name="category" id="category-list" class="demoInputBox" onChange="getState(this.value);">
				<option value="">Select category</option>
				<?php
				$allcategorylist=$storeObj->getAllCategoryList('Active','cid','ASC','','');
				foreach($allcategorylist as $catlist)
				{
				?>
				<option value="<?php echo $catlist->cid;?>" <?php if($catlist->cid == $indivdata->cid){?>selected=selected<?php }?>><?php echo stripslashes($catlist->catetitle);?></option>
				<?php
				}
				?>
				</select>

				<script type="text/javascript">
                for(var i=0;i<document.getElementById('category').length;i++)
                {
						if(document.getElementById('category').options[i].value=="<?php echo $indivdata->scid; ?>")
						{
						document.getElementById('category').options[i].selected=true
						}
                }		
                </script></td>
			  </tr>
			  <tr><td colspan="2" height="7"></td></tr>
			  <tr>
                <td width="6%" align="left" class="caption-field"><label class="title">Sub Category :</label></td>
                <td width="94%" align="left" valign="middle">
				<select name="subcategory" id="subcategory" class="select_medium required">
				<option value="">Select</option>
				<?php
				$allsubcategorylist=$storeObj->getAllsubCategoryList('','','ASC','','');
				foreach($allsubcategorylist as $subcatlist)
				{
				?>
				<option value="<?php echo $subcatlist->cid?>" <?php if($subcatlist->scatid == $indivdata->scid){?>selected=selected<?php }?>><?php echo stripslashes($subcatlist->subcattitle);?></option>
				<?php
				}
				?>
				</select>
				<script type="text/javascript">
                for(var i=0;i<document.getElementById('subcategory').length;i++)
                {
						if(document.getElementById('subcategory').options[i].value=="<?php echo $indivdata->scid ?>")
						{
						document.getElementById('subcategory').options[i].selected=true
						}
                }		
                </script></td>
			  </tr>
			  <tr><td colspan="2" height="7"></td></tr>
	<tr>
                <td width="6%" align="left" class="caption-field"><label class="title">Title:</label></td>
                <td width="94%" align="left" valign="middle"><input name="questitle" class="text_large required" type="text" value="<?php echo  stripslashes($indivdata->questitle);?>" style="width:800px;"/></td>
	</tr>
			  <tr><td colspan="2" height="7"></td></tr>
			    <?php /* ?><tr>
                <td align="left" valign="top" class="caption-field"><label class="title">Description:</label></td>
                <td align="left" valign="middle" class="caption-field"><textarea name="bigtext" id="bigtext" cols="150" rows="2"><?php echo  stripslashes($indivdata->bigtext);?></textarea></td>
				</tr><?php */?>
				 <tr><td colspan="2" height="7"></td></tr>
				 <tr>
                <td align="left" valign="top" class="caption-field"><label class="title">Question:</label></td>
				<td align="left" valign="middle" class="caption-field"> 
				<?php
				include 'fckeditor/fckeditor.php'; 
				$sBasePath = 'fckeditor/' ;//to change in web root
				$oFCKeditor = new FCKeditor('question');  //name of the form-field to be generated
				$oFCKeditor->BasePath	= $sBasePath ;
				$oFCKeditor->Value		= trim($indivdata->question);//the matter that may be in db
				$oFCKeditor->Height=170;
				$oFCKeditor->Width=900;
				$oFCKeditor->Create() ;
				?>	
                </td>
				</tr>
				<tr><td colspan="2" height="7"></td></tr>
				<tr>
                <td width="6%" align="left" class="caption-field"><label class="title">Question Type:</label></td>
                <td width="94%" align="left" valign="middle">
                	<select name="questype" id="questype" class="select_large required" onchange="showDiv(this)">
	                	<option value="">Select Type</option>
						<option value="Single">Single</option>
					    <option value="Multiple">Multiple</option>
					</select>

					<script>

					function showDiv(elem){
						if(elem.value == 'Single')
						{
						document.getElementById('hidden_div_single').style.display = "block";
						document.getElementById('hidden_div_multiple').style.display = "none";
						}
						else if(elem.value=='Multiple')
						{
						document.getElementById('hidden_div_multiple').style.display = "block";
						document.getElementById('hidden_div_single').style.display = "none";
						}
					}

					for(var i=0;i<document.getElementById('questype').length;i++)
	                {
							if(document.getElementById('questype').options[i].value=="<?php echo $indivdata->questionType; ?>")
							{
							document.getElementById('questype').options[i].selected=true
							}
	                }	

				</script>
				</tr>
				<tr>
                	<td width="6%" colspan="2" align="left" class="caption-field">
                	<?php 
                		if($indivdata->questionType == "Single"){
                			if($_GET['id']!= ''){ $divSingleDisplay = "display: block;";$divMultipleDisplay = "display: none;";}else{ $divSingleDisplay = "display: none;";}
                		}else{
                			if($_GET['id']!= ''){ $divMultipleDisplay = "display: block;";$divSingleDisplay = "display: none;";}else{ $divMultipleDisplay = "display: none;";}
                		}
                	?>
                	<div id="hidden_div_single" style="<?php echo $divSingleDisplay;?> padding:10px;">
                		<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
						<tr>
						<td width="15%">Option 1</td>
						<td width="5%"><input type="radio" name="single_correctans" value="A" <?php if($indivdata->optionValue == "A"){?> checked <?php }?>> A </td>
						<td width="70%">
							<?php
							include 'fckeditor/fckeditor.php'; 
							$sBasePath1 = 'fckeditor/' ;//to change in web root
							$oFCKeditor1 = new FCKeditor('option1');  //name of the form-field to be generated
							$oFCKeditor1->BasePath	= $sBasePath1 ;
							$oFCKeditor1->Value		= trim($indivdata->option1);//the matter that may be in db
							$oFCKeditor1->Height=170;
							$oFCKeditor1->Width=900;
							$oFCKeditor1->Create() ;
							?>
						</td>
						</tr>
						<tr>
						<td width="15%">Option 2</td>
						<td width="5%"><input type="radio" name="single_correctans" value="B" <?php if($indivdata->optionValue == "B"){?> checked <?php }?>> B</td>
						<td width="70%">
							<?php
							include 'fckeditor/fckeditor.php'; 
							$sBasePath2 = 'fckeditor/' ;//to change in web root
							$oFCKeditor2 = new FCKeditor('option2');  //name of the form-field to be generated
							$oFCKeditor2->BasePath	= $sBasePath2 ;
							$oFCKeditor2->Value		= trim($indivdata->option2);//the matter that may be in db
							$oFCKeditor2->Height=170;
							$oFCKeditor2->Width=900;
							$oFCKeditor2->Create() ;
							?>
						</td>
						</tr>
						<tr>
						<td width="15%">Option 3</td>
						<td width="5%"><input type="radio" name="single_correctans" value="C" <?php if($indivdata->optionValue == "C"){?> checked <?php }?>> C</td>
						<td width="70%">
							<?php
							include 'fckeditor/fckeditor.php'; 
							$sBasePath3 = 'fckeditor/' ;//to change in web root
							$oFCKeditor3 = new FCKeditor('option3');  //name of the form-field to be generated
							$oFCKeditor3->BasePath	= $sBasePath3 ;
							$oFCKeditor3->Value		= trim($indivdata->option3);//the matter that may be in db
							$oFCKeditor3->Height=170;
							$oFCKeditor3->Width=900;
							$oFCKeditor3->Create() ;
							?>
						</td>
						</tr>
						<tr>
						<td width="15%">Option 4</td>
						<td width="5%"><input type="radio" name="single_correctans" value="D" <?php if($indivdata->optionValue == "D"){?> checked <?php }?>> D</td>
						<td width="70%">
							<?php
							include 'fckeditor/fckeditor.php'; 
							$sBasePath4 = 'fckeditor/' ;//to change in web root
							$oFCKeditor4 = new FCKeditor('option4');  //name of the form-field to be generated
							$oFCKeditor4->BasePath	= $sBasePath4 ;
							$oFCKeditor4->Value		= trim($indivdata->option4);//the matter that may be in db
							$oFCKeditor4->Height=170;
							$oFCKeditor4->Width=900;
							$oFCKeditor4->Create() ;
							?>
						</td>
						</tr>

						</table>
                	</div>
                	<?php $optionVal = explode(',',$indivdata->optionValue); 
                		//print_r($optionVal);
	                	$option1Value = in_array("A", $optionVal); 
	                	$option2Value = in_array("B", $optionVal); 
	                	$option3Value = in_array("C", $optionVal); 
	                	$option4Value = in_array("D", $optionVal); 
                	?>
                	<div id="hidden_div_multiple" style="<?php echo $divMultipleDisplay;?> padding:10px;">
                		<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
						<tr>
						<td width="15%">Option 1</td>
						<td width="5%"><input type="checkbox" name="multiple_correctans[]" value="A" <?php if($option1Value == "1"){?> checked <?php }?>> A </td>
						<td width="70%">
							<?php
							include 'fckeditor/fckeditor.php'; 
							$sBasePath = 'fckeditor/' ;//to change in web root
							$oFCKeditor = new FCKeditor('option5');  //name of the form-field to be generated
							$oFCKeditor->BasePath	= $sBasePath ;
							$oFCKeditor->Value		= trim($indivdata->option1);//the matter that may be in db
							$oFCKeditor->Height=170;
							$oFCKeditor->Width=900;
							$oFCKeditor->Create() ;
							?>
						</td>
						</tr>
						<tr>
						<td width="15%">Option 2</td>
						<td width="5%"><input type="checkbox" name="multiple_correctans[]" value="B" <?php if($option2Value == "1"){?> checked <?php }?>> B</td>
						<td width="70%">
							<?php
							include 'fckeditor/fckeditor.php'; 
							$sBasePath = 'fckeditor/' ;//to change in web root
							$oFCKeditor = new FCKeditor('option6');  //name of the form-field to be generated
							$oFCKeditor->BasePath	= $sBasePath ;
							$oFCKeditor->Value		= trim($indivdata->option2);//the matter that may be in db
							$oFCKeditor->Height=170;
							$oFCKeditor->Width=900;
							$oFCKeditor->Create() ;
							?>
						</td>
						</tr>
						<tr>
						<td width="15%">Option 3</td>
						<td width="5%"><input type="checkbox" name="multiple_correctans[]" value="C" <?php if($option3Value == "1"){?> checked <?php }?>> C</td>
						<td width="70%">
							<?php
							include 'fckeditor/fckeditor.php'; 
							$sBasePath = 'fckeditor/' ;//to change in web root
							$oFCKeditor = new FCKeditor('option7');  //name of the form-field to be generated
							$oFCKeditor->BasePath	= $sBasePath ;
							$oFCKeditor->Value		= trim($indivdata->option3);//the matter that may be in db
							$oFCKeditor->Height=170;
							$oFCKeditor->Width=900;
							$oFCKeditor->Create() ;
							?>
						</td>
						</tr>
						<tr>
						<td width="15%">Option 4</td>
						<td width="5%"><input type="checkbox" name="multiple_correctans[]" value="D" <?php if($option4Value == "1"){?> checked <?php }?>> D</td>
						<td width="70%">
							<?php
							include 'fckeditor/fckeditor.php'; 
							$sBasePath = 'fckeditor/' ;//to change in web root
							$oFCKeditor = new FCKeditor('option8');  //name of the form-field to be generated
							$oFCKeditor->BasePath	= $sBasePath ;
							$oFCKeditor->Value		= trim($indivdata->option4);//the matter that may be in db
							$oFCKeditor->Height=170;
							$oFCKeditor->Width=900;
							$oFCKeditor->Create() ;
							?>
						</td>
						</tr>

						</table>
                	</div>
                	</td>
				</tr>
				
				<tr><td colspan="2" height="7"></td></tr>
				<tr>
                <td width="6%" align="left" class="caption-field"><label class="title">Question Marks:</label></td>
                <td width="94%" align="left" valign="middle"><input name="quesmarks" class="text_large required" type="text" value="<?php echo  stripslashes($indivdata->questionMarks);?>" style="width:800px;"/></td>
				</tr>
			  	<tr><td colspan="2" height="7"></td></tr>
				<?php /*?><tr>
				<td width="6%" align="left" valign="top" class="caption-field"><label class="title">Image:</label></td>
				<td width="94%" align="left" valign="middle"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
				<tr>
				<td width="31%"><input type="file" name="image" size="24"></td>
				<td width="69%"><?php if($indivdata->image!=""){
				?>
				<img src="../uploads/store/category/<?php echo $indivdata->image; ?>" width="185" height="79" />
				<input type="hidden" name="hdn_image" size="24" value="<?php echo $indivdata->image; ?>">
				<?php
				}
				?>
				<small> *Please upload image size WIDTH ( min - 100, max - 150 ) and HEIGHT ( min - 90, max - 130 )</small>
				</td>
				</tr>
				</table></td>
				</tr><?php */?>
			   
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
	<td align="left" valign="middle" colspan="2"><input name="hdn_id" type="hidden" value="<?php echo $indivdata->qid?>"><input name="hdn_opid" type="hidden" value="<?php echo $indivdata->id?>"><input value="<?php echo $hdn_value;?>" class="button button_add" type="hidden" name="admininsert"><?php /*?><input <?php echo $hdn_in_up;?> type="submit" value=""><?php */?><input <?php echo $hdn_in_up;?> type="submit" value="" >	</td>
	</tr>
        </table>
	</form>	
	</div>
  </div>
 <?php }?>