<?php /*?><?php 
include('../dbconfig.php');
$str="update tb_cart_transcation set status='".$_POST['status']."' where id=".$_POST['tx_no'];
$res=mysql_query($str);
echo ucfirst($_POST['status']);
?><?php */?>
<?php 
include('../dbconfig.php');
include('includes/dbconnection.php');
global $callConfig;
$fieldnames=array('status'=>$_POST['status']);
$res=$callConfig->updateRecord(TPREFIX.TBL_CART_TRANSACTION,$fieldnames,'tx_id',$_POST['id']);
if($res==1)
{
	echo ucfirst($_POST['status']);
}
?>