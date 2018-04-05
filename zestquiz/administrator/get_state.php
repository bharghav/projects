<?php
//require_once("dbcontroller.php");
//$db_handle = new DBController();
include('../dbconfig.php');
include('includes/dbconnection.php');
global $callConfig;
include("model/elearn.class.php");
$forumObj=new elearnClass();
if(!empty($_POST["category_id"])) {
	//$query ="SELECT * FROM tb_category WHERE countryID = '" . $_POST["country_id"] . "'";
	//$results = $db_handle->runQuery($query);
	$allsubcategorydrop=$forumObj->getsubCategoryAllData($_POST["category_id"]);
	//echo "<pre>";
	//print_r($allsubcategorydrop);

?>
	<option value="">Select Subcategory</option>
<?php
	
	foreach($allsubcategorydrop as $subcategory){
	?>
	<option value="<?php echo $subcategory->scatid; ?>"><?php echo $subcategory->subcattitle; ?></option>
<?php
	}
}
?>