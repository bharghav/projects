<?php
//require_once("dbcontroller.php");
//$db_handle = new DBController();
include('../dbconfig.php');
include('includes/dbconnection.php');
global $callConfig;
include("model/elearn.class.php");
$forumObj=new elearnClass();
//echo $_REQUEST['action'];


	if(!empty($_POST["subject_id"])) {
	//echo $_POST["subject_id"];
	//$query ="SELECT * FROM tb_category WHERE countryID = '" . $_POST["country_id"] . "'";
	//$results = $db_handle->runQuery($query);
	$allsubjectsdrop=$forumObj->getsubjectsAllData($_POST["subject_id"]);
	/*echo "<pre>";
	print_r($allsubcategorydrop);exit;*/

?>
	<option value="">Select subjects</option>
<?php
	
	foreach($allsubjectsdrop as $subjects){
	?>
	<option value="<?php echo $subjects->spid; ?>"><?php echo $subjects->subjtitle; ?></option>
<?php
	}
}

?>