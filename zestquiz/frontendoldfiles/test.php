<?php
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Additional headers
//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$headers .= 'From: The Superteens <info@thesuperteens.com>' . "\r\n";
if(mail("sastrimedia3@hotmail.com", "hi", "hi man how ru ", $headers))
	{
		header("location:test.php?msg=success");
	    exit;
	}
	else
	{
	    header("location:test.php?msg=fail");
		//header("location:".$_POST['hdn_slug'].".html");
		exit;
	}
?>