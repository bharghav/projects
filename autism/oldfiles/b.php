<?php
include("dbconfig.php");
include("admin/includes/dbconnection.php");
  //print_r($_REQUEST);
$val = $_POST['id1'];
$array1=explode(',',$val);

//$j=0;

?>
<table class="table table-bordered table-hover">
	 <thead>
                        <tr>
                            <th>Provider</th>
                            <?php 
								$i=0;
	                            foreach ($array1 as $value_val) {
								$result_fet1=mysql_fetch_array(mysql_query("SELECT * FROM tb_providers WHERE id = '".$value_val[$i]."' and status='Active'")); 
	                            ?>
	                             <th style="font-weight:normal;"><?php echo $result_fet1['name'];?></th>
	                             <?php }$i++;?>
	</tr>
	
	<tr>
		<th>Service</th> <?php 
								$j=0;
	                            foreach ($array1 as $value_val1) {
								$result_fet2=mysql_fetch_array(mysql_query("SELECT * FROM tb_providers WHERE id = '".$value_val1[$j]."' and status='Active'")); 
	                            ?>
	                             <th style="font-weight:normal;"><?php echo $result_fet2['service_locations'];?></th>
	                             <?php }$j++;?>
	</tr>
	<tr>
		<th>Location</th> <?php 
								$k=0;
	                            foreach ($array1 as $value_val2) {
								$result_fet3=mysql_fetch_array(mysql_query("SELECT * FROM tb_providers WHERE id = '".$value_val2[$k]."' and status='Active'")); 
	                            ?>
	                             <th style="font-weight:normal;"><?php echo $result_fet3['location'];?></th>
	                             <?php }$k++;?>
	</tr>
	<tr>
		<th>Email</th> <?php 
								$l=0;
	                            foreach ($array1 as $value_val3) {
								$result_fet4=mysql_fetch_array(mysql_query("SELECT * FROM tb_providers WHERE id = '".$value_val3[$l]."' and status='Active'")); 
	                            ?>
	                             <th style="font-weight:normal;"><?php echo $result_fet4['Email'];?></th>
	                             <?php }$l++;?>
	</tr>
	<tr>
		<th>Age Served</th> <?php 
								$m=0;
	                            foreach ($array1 as $value_val4) {
								$result_fet5=mysql_fetch_array(mysql_query("SELECT * FROM tb_providers WHERE id = '".$value_val4[$m]."' and status='Active'")); 
	                            ?>
	                             <th style="font-weight:normal;"><?php echo $result_fet5['ages_served'];?></th>
	                             <?php }$m++;?>
	</tr>
	<tr>
		<th>Speciality</th> <?php 
								$n=0;
	                            foreach ($array1 as $value_val5) {
								$result_fet6=mysql_fetch_array(mysql_query("SELECT * FROM tb_providers WHERE id = '".$value_val5[$n]."' and status='Active'")); 
	                            ?>
	                             <th style="font-weight:normal;"><?php echo $result_fet6['speciality'];?></th>
	                             <?php }$n++;?>
	</tr>
	<tr>
		<th>Providers Category</th> <?php 
								$o=0;
	                            foreach ($array1 as $value_val6) {
								$result_fet7=mysql_fetch_array(mysql_query("SELECT * FROM tb_providers WHERE id = '".$value_val6[$o]."' and status='Active'")); 
	                            ?>
	                             <th style="font-weight:normal;"><?php echo $result_fet7['provider_cat'];?></th>
	                             <?php }$o++;?>
	</tr>
	<tr>
		<th>Insurance</th> <?php 
								$p=0;
	                            foreach ($array1 as $value_val7) {
								$result_fet8=mysql_fetch_array(mysql_query("SELECT * FROM tb_providers WHERE id = '".$value_val7[$p]."' and status='Active'")); 
	                            ?>
	                             <th style="font-weight:normal;"><?php echo $result_fet8['insurance_accepted'];?></th>
	                             <?php }$p++;?>
	</tr>
	<tr>
		<th>Regional funding</th> <?php 
								$r=0;
	                            foreach ($array1 as $value_val8) {
								$result_fet9=mysql_fetch_array(mysql_query("SELECT * FROM tb_providers WHERE id = '".$value_val8[$r]."' and status='Active'")); 
	                            ?>
	                             <th style="font-weight:normal;"><?php echo $result_fet9['regional_fund'];?></th>
	                             <?php }$r++;?>
	</tr>
	</thead>
</table>



