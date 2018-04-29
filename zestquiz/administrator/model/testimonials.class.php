<?php
class testimonialsClass
{ 

 // Product category //
 function getAllTestimonialsList($sortfield,$order,$start,$limit)
  {
	global $callConfig;
	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;
	$query=$callConfig->selectQuery(TPREFIX.TBL_TESTIMONIALS,'*','',$order,$start,$limit);
	return $callConfig->getAllRows($query);
  } 
  function getAllTestimonialsListCount()
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_TESTIMONIALS,'id','','','','');
	 return $callConfig->getCount($query);
  } 
  
  function getTestimonialData($id)
  {
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_TESTIMONIALS,'*','id='.$id,'','','');
	return $callConfig->getRow($query);
 }
 
	function insertTestimonials($post)
	{
	global $callConfig;
	$fieldnames=array('title'=>mysql_real_escape_string($post['title']),'big_text'=>mysql_real_escape_string($post['big_text']),'status'=>$post['status']);
	$res=$callConfig->insertRecord(TPREFIX.TBL_TESTIMONIALS,$fieldnames);
	if($res!="")
	{
		sitesettingsClass::recentActivities('Testimonial created successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_testimonialslist&err=Testimonial created successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Testimonial creation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_testimonialslist&ferr=Testimonial creation failed");
	}
	}
	
	function updateTestimonials($post)
	{
	global $callConfig;
	$fieldnames=array('title'=>mysql_real_escape_string($post['title']),'big_text'=>mysql_real_escape_string($post['big_text']),'status'=>$post['status']);
	$res=$callConfig->updateRecord(TPREFIX.TBL_TESTIMONIALS,$fieldnames,'id',$post['hdn_id']);
	if($res!="")
	{
		sitesettingsClass::recentActivities('Testimonial updated successfully on >> '.DATE_TIME_FORMAT.'','g');
		$callConfig->headerRedirect("index.php?option=com_testimonialslist&err=Testimonial updated successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Testimonial updation failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_testimonialslist&ferr=Testimonial updation failed");
	}
	}
	function testimonialsDelete($id)
	{
	global $callConfig;
	$res=$callConfig->deleteRecord(TPREFIX.TBL_TESTIMONIALS,'id',$id);
	if($res!="")
	{
		sitesettingsClass::recentActivities('Testimonial deleted successfully on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_testimonialslist&err=Testimonial deleted successfully");
	}
	else
	{
		sitesettingsClass::recentActivities('Testimonial deletion failed on >> '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_testimonialslist&ferr=Testimonial deletion failed");
	}
	}

	function importInfo()
	{
		if(isset($_POST["Import"])){
		

		 $filename=$_FILES["file"]["tmp_name"];
		

		 if($_FILES["file"]["size"] > 0)
		 {

		  	$file = fopen($filename, "r");
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
	    
	          //It wiil insert a row to our subject table from our csv file`
	           //$sql = "INSERT into subject (`SUBJ_ID`,`SUBJ_CODE`, `SUBJ_DESCRIPTION`, `UNIT`, `PRE_REQUISITE`,COURSE_ID, `AY`, `SEMESTER`) 
	            	//values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]')";

	         	$sql = "INSERT into tb_questions (`catid`,`subcatid`,`subid`,`questionID`,`question`,`questionType`,`questionMarks`) 
	            	values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[9]','$emapData[11]')";
	         
	         //we are using mysql_query function. it returns a resource on true else False on error
	          	$result = mysql_query( $sql);
	          	$quesinsertId = mysql_insert_id();

	          	 $optionssql = "INSERT into tb_questionoptions (`qid`,`option1`,`option2`,`option3`,`option4`,`optionValue`) 
	            	values('$quesinsertId','$emapData[5]','$emapData[6]','$emapData[7]','$emapData[8]','$emapData[10]')";
	            $optionssqlresult = mysql_query( $optionssql );

				if(! $result )
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"index.php?option=com_question&ferr=Question >> Question creation failed\"
						</script>";
				
				}

	         }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	         echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"index.php?option=com_question&err=Question >> Question created successfully\"
					</script>";
	        
			 

			 //close of connection
			mysql_close($conn); 
				
		 	
			
		 }
	}
	}	 
	
	/// Product category  
}	
	?>