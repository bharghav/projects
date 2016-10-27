<?php

class regusersClass
{ 

  function getAllregusersList($sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="id DESC";
	 
	 $query=$callConfig->selectQuery(TPREFIX.TBL_USERS,'*','',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 

	function getAllregusersListCount()
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_USERS,'id','','','','');
	return $callConfig->getCount($query);
	} 

	function getregusersData($id)
	{	
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_USERS,'*','id='.$id,'','','');
		return $callConfig->getRow($query);
	}

 	function insertregusers($post)
	{
		global $callConfig;
		
		$fieldnames=array(
		'firstname'=>mysql_real_escape_string($post['firstname']),
		'lastname'=>mysql_real_escape_string($post['lastname']),
		'email'=>mysql_real_escape_string($post['email']),
		'password'=>$callConfig->passwordEncrypt($post['password']),
		
		
		
		'status'=>mysql_real_escape_string($post['status']));
		
		
		$res=$callConfig->insertRecord(TPREFIX.TBL_USERS,$fieldnames);
		if($res!="")
		{
			sitesettingsClass::recentActivities('Page Added successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_regusers&err=Page Added successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Page Adding failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_regusers&ferr=Page Adding failed");
		}
	}
	
	function updateregusers($post)
	{
		global $callConfig;
		
			
		
		$fieldnames=array(
		'firstname'=>mysql_real_escape_string($post['firstname']),
		'lastname'=>mysql_real_escape_string($post['lastname']),
		'email'=>mysql_real_escape_string($post['email']),
		'password'=>$callConfig->passwordEncrypt($post['password']),
		
		
		
		'status'=>mysql_real_escape_string($post['status']));
		
		//print_r($fieldnames); exit;
		echo $res=$callConfig->updateRecord(TPREFIX.TBL_USERS,$fieldnames,'id',$post['hdn_page_id']);
		//echo $res; exit;
		if($res!="")
		{
			sitesettingsClass::recentActivities('Page updated successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_regusers&err=Page updated successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Page updattion failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_regusers&ferr=Page updattion failed");
		}
	}

	function contentpageDelete($id)

	{
	//echo "syam";exit;
	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_USERS,'id',$id);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Page deleted successfully on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_regusers&err=Page deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Page deletion failed on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_regusers&ferr=Page deletion failed");

	}

	}

}

?>