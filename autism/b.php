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

	<tr>
		<th>Rating</th> 
		

		<?php 
								$r=0;
	                            foreach ($array1 as $value_val9) {
								$result_fet10=mysql_fetch_array(mysql_query("SELECT * FROM tb_providers WHERE id = '".$value_val9[$r]."' and status='Active'")); 
	                            ?>
	                            <style type="text/css">
                        .starRating_<?php echo $result_fet10['id'];?>:not(old){
                              display        : inline-block;
                              width          : 7.5em;
                              height         : 1.5em;
                              overflow       : hidden;
                              vertical-align : bottom;
                              cursor: default;
                            }

                            .starRating_<?php echo $result_fet10['id'];?>:not(old) > input{
                              margin-right : -100%;
                              opacity      : 0;
                              cursor: default;
                            }

                            .starRating_<?php echo $result_fet10['id'];?>:not(old) > label{
                              display         : block;
                              float           : right;
                              position        : relative;
                              background      : url('star-off.svg');
                              background-size : contain;
                              cursor: default;
                            }

                            .starRating_<?php echo $result_fet10['id'];?>:not(old) > label:before{
                              content         : '';
                              display         : block;
                              width           : 1.5em;
                              height          : 1.5em;
                              background      : url('star-on.svg');
                              background-size : contain;
                              opacity         : 0;
                              transition      : opacity 0.2s linear;
                              cursor: default;
                            }

                            .starRating_<?php echo $result_fet10['id'];?>:not(old) > label:hover:before,
                            .starRating_<?php echo $result_fet10['id'];?>:not(old) > label:hover ~ label:before,
                            .starRating_<?php echo $result_fet10['id'];?>:not(:hover) > :checked ~ label:before{
                              opacity : 1;pointer-events:none;cursor: default; color:white;
                            }
                            .starRating_<?php echo $result_fet10['id'];?>:not(.nohover):hover {  
                                border: 0px solid red; pointer-events:none; cursor: default;color:white;
                            }
                        </style>
	                             <th style="font-weight:normal;">
	                             	<span class="starRating_<?php echo $result_fet10['id'];?>" style="cursor:default;">
                                        <input id="rating5_<?php echo $result_fet10['id'];?>" type="radio" id="rating5_<?php echo $result_fet10['id'];?>" disabled="disabled" name="rating_<?php echo $result_fet10['id'];?>" value="5" <?php if($result_fet10['rating']==5){?>checked<?php }?> style="cursor:default;">
                                        <label for="rating5_<?php echo $result_fet10['id'];?>" id="rating5_<?php echo $result_fet10['id'];?>" style="cursor:default;">5</label>
                                        <input id="rating4_<?php echo $result_fet10['id'];?>" type="radio" id="rating4_<?php echo $result_fet10['id'];?>" disabled="disabled" name="rating_<?php echo $result_fet10['id'];?>" value="4" <?php if($result_fet10['rating']==4){?>checked<?php }?>  style="cursor:default;">
                                        <label for="rating4_<?php echo $result_fet10['id'];?>" id="rating4_<?php echo $result_fet10['id'];?>" style="cursor:default;">4</label>
                                        <input id="rating3_<?php echo $result_fet10['id'];?>" type="radio" id="rating3_<?php echo $result_fet10['id'];?>" disabled="disabled" name="rating_<?php echo $result_fet10['id'];?>" value="3" <?php if($result_fet10['rating']==3){?>checked<?php }?>  style="cursor:default;">
                                        <label for="rating3_<?php echo $result_fet10['id'];?>" id="rating3_<?php echo $result_fet10['id'];?>" style="cursor:default;">3</label>
                                        <input id="rating2_<?php echo $result_fet10['id'];?>" type="radio" id="rating2_<?php echo $result_fet10['id'];?>" disabled="disabled" name="rating_<?php echo $result_fet10['id'];?>" value="2" <?php if($result_fet10['rating']==2){?>checked<?php }?>  style="cursor:default;">
                                        <label for="rating2_<?php echo $result_fet10['id'];?>" id="rating2_<?php echo $result_fet10['id'];?>" style="cursor:default;">2</label>
                                        <input id="rating1_<?php echo $result_fet10['id'];?>" type="radio" id="rating1_<?php echo $result_fet10['id'];?>" disabled="disabled" name="rating_<?php echo $result_fet10['id'];?>" value="1" <?php if($result_fet10['rating']==1){?>checked<?php }?>  style="cursor:default;">
                                        <label for="rating1_<?php echo $result_fet10['id'];?>" id="rating1_<?php echo $result_fet10['id'];?>" style="cursor:default;">1</label>
                                      </span>


                                      <script type="text/javascript">
                                      /*$(document).on("click", "#rating1<?php echo $k;?>", function () {
                                          $("#rating1<?php echo $k;?>").prop('disabled',true).css('pointer-events','none');
                                        });
                                      $(document).on("click", "#rating2<?php echo $k;?>", function () {
                                          $("#rating2<?php echo $k;?>").prop('disabled',true).css('pointer-events','none');
                                        });
                                      $(document).on("click", "#rating3<?php echo $k;?>", function () {
                                          $("#rating3<?php echo $k;?>").prop('disabled',true).css('pointer-events','none');
                                        });
                                      $(document).on("click", "#rating4<?php echo $k;?>", function () {
                                          $("#rating4<?php echo $k;?>").prop('disabled',true).css('pointer-events','none');
                                        });
                                      $(document).on("click", "#rating5<?php echo $k;?>", function () {
                                          $("#rating5<?php echo $k;?>").prop('disabled',true).css('pointer-events','none');
                                        });*/
                                      </script>

	                             	<?php echo $result_fet10['rating'];?></th>
	                             <?php }$r++;?>
	</tr>
	</thead>
</table>



