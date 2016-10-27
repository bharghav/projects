<?php ob_start();
session_start();
include("dbconfig.php");
include("admin/includes/dbconnection.php");
//include('session.php');
include("model/common.class.php");
$commonObj=new commonClass();
$contentAlldata=$commonObj->getAllcontentpages();
if(isset($_POST['go']))
{
    
    $name = $_POST['tname'];
    $location = $_POST['location'];
    $service = $_POST['service'];
    $proAlldata=$commonObj->getSeacrhData($name,$location,$service);
}
else
{
    $proAlldata=$commonObj->getlatestProviders('',"id DESC"); 
}


if(isset($_POST['submit']))
{
    $insertProdata=$commonObj->insertProviders($_POST);
}

if(isset($_POST['rvsubmit']))
{
    print_r($_POST);exit;
    $id = $_POST['pr_id'];
    $insertRewComdata=$commonObj->updatedReviewComment($id);
}

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>wecare4autism</title>
    <!-- Bootstrap -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script data-require="jquery@*" data-semver="2.0.3" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    
<link rel="stylesheet" href="http://select2.github.io/select2/select2-3.5.2/select2.css">
  <link rel="stylesheet" href="css/select2-bootstrap.css">

</head>

<body class="bg-patt">
    <nav class="navbar navbar-default navbar-inverse">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">wecare4autism</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Welcome</a></li>
                    <li><a href="#">About</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Events <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Gallery</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Resources</a></li>
                    <li><a href="#">Blog</a></li>
                    <?php if($_SESSION['userid']){?>
                    <li><a href="logout.php">Logout</a></li>
                    <?php }?>
                    <!-- <li><a href="index.php"><span class="glyphicon glyphicon-search" id="logIcon"></span>
Find a provider</a></li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>Find a provider:</h4>
            </div>
            <div class="col-md-6 text-right">
                <button class="btn btn-success btn-small btn-square" data-toggle="modal" data-target="#addProvider"><span class="glyphicon glyphicon-plus"></span> New Provider</button>
            </div>
        </div>
        <form class="form-inline well b-r-0 bg-transparent" role="form" name="serach-form" action="" method="POST">
            <div class="form-group">
                <label for="cityorzip">City / Zip:</label>
                <input type="cityorzip" class="form-control" id="cityorzip" name="location">
            </div>
            <div class="form-group">
                <label for="sel1">Service Type:</label>
                <!-- <select class="form-control" id="sel1" name="service">
                    <option>Behaviour Frontiers</option>
                    <option>Gateway Learning Group</option>
                    <option>Family Resource Navigator</option>
                    <option>Spectrum Playground</option>
                </select> -->
                <input type="sel1" class="form-control" id="sel1" name="service">
            </div>
            <div class="form-group">
                <label for="email">Therapist Name:</label>
                <input type="therapistName" class="form-control" id="therapistName" name="tname">
            </div>
            <button type="submit" class="btn btn-warning btn-square" name="go">Go</button>
        </form>
        <div class="row">
            <div class="col-md-12">
                <h4>Resource Directory</h4>
            </div>
            
        </div>

        <section>

        <?php if($_GET['rewmsg']!=""){?>
                <div class="isa_success">
                    <i class="fa fa-check"></i>
                    Providers review updated successfully.
                </div>
                <?php }?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Provider</th>
                            <th>Insurance</th>
                            <th>Contact</th>
                            <th>Rating</th>
                            <th class="text-center">View</th>
                            <th class="text-center">Compare 
                                <a data-toggle="modal"  title="Add this item" class="compare_popup btn btn-success btn-small btn-square" href="#compare_popup">Button</a>
                                <!-- <button class="btn btn-success btn-small btn-square" data-toggle="modal" id="compare_popup"> Compare</button> -->
                                <!-- <button type="button"  data-toggle="modal" class="btn btn-primary pull-right" name="compare" id="#compare_popup">Compare</button> --></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if(count($proAlldata) > 0){
                        $k = 0;
                        foreach($proAlldata as $all_prod) { ?>

                        <style type="text/css">
                        .starRating<?php echo $k;?>:not(old){
                              display        : inline-block;
                              width          : 7.5em;
                              height         : 1.5em;
                              overflow       : hidden;
                              vertical-align : bottom;
                            }

                            .starRating<?php echo $k;?>:not(old) > input{
                              margin-right : -100%;
                              opacity      : 0;
                            }

                            .starRating<?php echo $k;?>:not(old) > label{
                              display         : block;
                              float           : right;
                              position        : relative;
                              background      : url('star-off.svg');
                              background-size : contain;
                            }

                            .starRating<?php echo $k;?>:not(old) > label:before{
                              content         : '';
                              display         : block;
                              width           : 1.5em;
                              height          : 1.5em;
                              background      : url('star-on.svg');
                              background-size : contain;
                              opacity         : 0;
                              transition      : opacity 0.2s linear;
                            }

                            .starRating<?php echo $k;?>:not(old) > label:hover:before,
                            .starRating<?php echo $k;?>:not(old) > label:hover ~ label:before,
                            .starRating<?php echo $k;?>:not(:hover) > :checked ~ label:before{
                              opacity : 1;
                            }
                        </style>
                        <tr class="cur-poi" >
                            <td>1</td>
                            <td><?php echo $all_prod->name;?></td>
                            <td><?php echo $all_prod->insurance_accepted;?></td>
                            <td><?php echo $all_prod->Phone;?></td>
                            <td><?php $k;?>
                                    <span class="starRating<?php echo $k;?>">
                                        <input id="rating5<?php echo $k;?>" type="radio" name="rating<?php echo $k;?>" value="5" <?php if($all_prod->rating==5){?>checked<?php }?>>
                                        <label for="rating5<?php echo $k;?>">5</label>
                                        <input id="rating4<?php echo $k;?>" type="radio" name="rating<?php echo $k;?>" value="4" <?php if($all_prod->rating==4){?>checked<?php }?>>
                                        <label for="rating4<?php echo $k;?>">4</label>
                                        <input id="rating3<?php echo $k;?>" type="radio" name="rating<?php echo $k;?>" value="3" <?php if($all_prod->rating==3){?>checked<?php }?>>
                                        <label for="rating3<?php echo $k;?>">3</label>
                                        <input id="rating2<?php echo $k;?>" type="radio" name="rating<?php echo $k;?>" value="2" <?php if($all_prod->rating==2){?>checked<?php }?>>
                                        <label for="rating2<?php echo $k;?>">2</label>
                                        <input id="rating1<?php echo $k;?>" type="radio" name="rating<?php echo $k;?>" value="1" <?php if($all_prod->rating==1){?>checked<?php }?>>
                                        <label for="rating1<?php echo $k;?>">1</label>
                                      </span>

                            </td>
                            <td class="text-center"><a data-toggle="modal" data-id="<?php echo $all_prod->id;?>" title="Add this item" class="open-AddBookDialog_<?php echo $all_prod->id;?>" href="#addBookDialog<?php echo $all_prod->id;?>">View</a></td>
                            <td class="text-center">
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="cmpare_val" value="<?php echo $all_prod->id;?>" name="<?php echo $all_prod->id;?>">
                                </label>
                            </td>
                        </tr>
                        <?php $k++;} } else { ?>
                        <tr class="cur-poi" >
                            
                            <td colspan="6" class="text-center">No Providers Available</td>
                            
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
<script>
   
    $(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #bookId").text( myBookId );
    
    });
    $(document).on("click", ".compare_popup", function () {
            //alert($('.cmpare_val:checked').length);
            if($('.cmpare_val:checked').length <= 3)
            {
                var chkId = '';
                var DocId = '';
                
                 $('.cmpare_val:checked').each(function() {
                   chkId += $(this).val() + ",";
                   //DocId += $(this).attr('document-id') + ",";
                 });
                 chkId = chkId.slice(0,-1);// Remove last comma
                 //DocId = DocId.slice(0,-1);// Remove last comma
                 //alert(chkId);
             }
             else
             {
                alert('compare option selective upto 3');
                $("#compare_popup").hide();
                return false;
             }
             
            var myCompareId = chkId;
             //$(".modal-body #compareId").val( myCompareId );
               $.post("b.php", 
                { id1: myCompareId },
                function(data) {
                 $('#stage').html(data);
                });
                
                          
         //$(".modal-body #bookId").text( myBookId );
        
        });

   

</script>

 <?php 
                        foreach($proAlldata as $all_prod) { 


                            ?>
    <div id="addBookDialog<?php echo $all_prod->id; ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content b-r-0">
                <div class="modal-header modal-header-bg-blue">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Provider Details</h4>

                </div>
                <div class="modal-body">
                    <!-- <span id="bookId" ></span> -->
                   <?php echo $value = "<span id='bookId' ></span>";

                    $query="SELECT * FROM tb_providers WHERE id ='".$all_prod->id."' and status='Active'";
                    $result=mysql_query($query);
                    $result_fet=mysql_fetch_array($result);
                    //print_r($result_fet);

                     $reviewlogsAlldata=$commonObj->getreviewlogslist($_SESSION['userid'],$all_prod->id); 
                    //print_r($reviewlogsAlldata);

                    $query_logs="SELECT * FROM tb_review_logs WHERE us_id='".$_SESSION['userid']."' and pr_id='".$all_prod->id."' ORDER BY rid DESC";
                    $result_logs=mysql_query($query_logs);
                    //$result_fet_logs=mysql_fetch_array($result_logs);

                    


                   ?>

                   
                   
                    
                    <div class="row">
                        <div class="col-md-4"><strong>Provider Name:</strong></div>
                        <div class="col-md-8"><?php echo $result_fet['name'];?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><strong>Location:</strong></div>
                        <div class="col-md-8"><?php echo $result_fet['location'];?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><strong>Service:</strong></div>
                        <div class="col-md-8"><?php echo $result_fet['service_locations'];?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><strong>Age Served:</strong></div>
                        <div class="col-md-8"><?php echo $result_fet['ages_served'];?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><strong>Insurance:</strong></div>
                        <div class="col-md-8"><?php echo $result_fet['insurance_accepted'];?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><strong>Description:</strong></div>
                        <div class="col-md-8"><?php echo $result_fet['description'];?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><strong>Regional funding:</strong></div>
                        <div class="col-md-8"><?php echo $result_fet['regional_fund'];?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><strong>Provider Category:</strong></div>
                        <div class="col-md-8"><?php echo $result_fet['provider_cat'];?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><strong>Languages:</strong></div>
                        <div class="col-md-8"><?php echo $result_fet['languages'];?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><strong>Speciality:</strong></div>
                        <div class="col-md-8"><?php echo $result_fet['speciality'];?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><strong>Website:</strong></div>
                        <div class="col-md-8"><?php echo $result_fet['website'];?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><strong>Phone:</strong></div>
                        <div class="col-md-8"><?php echo $result_fet['Phone'];?></div>
                    </div>

                    <?php if($_SESSION['userid']!=''){?>

                       

                  
                    <form  action="" method="post">
                        <style type="text/css">
                        .starRating_popup<?php echo $result_fet['id'];?>:not(old){
                          display        : inline-block;
                          width          : 7.5em;
                          height         : 1.5em;
                          overflow       : hidden;
                          vertical-align : bottom;
                        }

                        .starRating_popup<?php echo $result_fet['id'];?>:not(old) > input{
                          margin-right : -100%;
                          opacity      : 0;
                        }

                        .starRating_popup<?php echo $result_fet['id'];?>:not(old) > label{
                          display         : block;
                          float           : right;
                          position        : relative;
                          background      : url('star-off.svg');
                          background-size : contain;
                        }

                        .starRating_popup<?php echo $result_fet['id'];?>:not(old) > label:before{
                          content         : '';
                          display         : block;
                          width           : 1.5em;
                          height          : 1.5em;
                          background      : url('star-on.svg');
                          background-size : contain;
                          opacity         : 0;
                          transition      : opacity 0.2s linear;
                        }

                        .starRating_popup<?php echo $result_fet['id'];?>:not(old) > label:hover:before,
                        .starRating_popup<?php echo $result_fet['id'];?>:not(old) > label:hover ~ label:before,
                        .starRating_popup<?php echo $result_fet['id'];?>:not(:hover) > :checked ~ label:before{
                          opacity : 1;
                        }
                        </style>
                        <div class="row">
                        <div class="col-md-4"><strong>Rating:</strong></div>
                        <div class="col-md-8">
                            <span class="starRating_popup<?php echo $result_fet['id'];?>">
                                <input id="rating5_popup<?php echo $result_fet['id'];?>" type="radio" name="rating_popup<?php echo $result_fet['id'];?>" value="5" <?php if($result_fet['rating']==5){?>checked<?php }?>>
                                <label for="rating5_popup<?php echo $result_fet['id'];?>">5</label>
                                <input id="rating4_popup<?php echo $result_fet['id'];?>" type="radio" name="rating_popup<?php echo $result_fet['id'];?>" value="4" <?php if($result_fet['rating']==4){?>checked<?php }?>>
                                <label for="rating4_popup<?php echo $result_fet['id'];?>">4</label>
                                <input id="rating3_popup<?php echo $result_fet['id'];?>" type="radio" name="rating_popup<?php echo $result_fet['id'];?>" value="3" <?php if($result_fet['rating']==3){?>checked<?php }?>>
                                <label for="rating3_popup<?php echo $result_fet['id'];?>">3</label>
                                <input id="rating2_popup<?php echo $result_fet['id'];?>" type="radio" name="rating_popup<?php echo $result_fet['id'];?>" value="2" <?php if($result_fet['rating']==2){?>checked<?php }?>>
                                <label for="rating2_popup<?php echo $result_fet['id'];?>">2</label>
                                <input id="rating1_popup<?php echo $result_fet['id'];?>" type="radio" name="rating_popup<?php echo $result_fet['id'];?>" value="1" <?php if($result_fet['rating']==1){?>checked<?php }?>>
                                <label for="rating1_popup<?php echo $result_fet['id'];?>">1</label>
                            </span>

                        </div>
                        </div>
                        

                        
                        <strong>Review:</strong><br>
                        <textarea class="form-control animated" cols="20" id="new-review" name="review_comment" placeholder="Enter your review here..." rows="5"><?php //echo $result_fet['review_comment'];?></textarea>
                        <input type="hidden" name="us_id" id="us_id" value="<?php echo $_SESSION['userid'];?>">


                        <div class="text-right">
                            
                            <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                            <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                            <input type="hidden" name="pr_id" value="<?php echo $result_fet['id'];?>"><br>
                            <button class="btn btn-success btn-md" name="rvsubmit" type="submit">Submit your Review</button>
                        </div>

                        <strong>Review Logs:</strong><br><br>
                        <?php
                            $rows=mysql_num_rows($result_logs);
                            if($rows){
                            while ($row = mysql_fetch_array($result_logs))  
                            {
                                
                                ?>
                                <fieldset title="logs">
                                <div class="row">
                                    <div class="col-md-8"><?php echo $row["rev_comment"];?></div>
                                    <div class="col-md-4" style="text-align:right;font-size:10px;"><strong>Reviewed By --</strong> <?php 
                                $query_user="SELECT * FROM tb_users WHERE id ='".$row["us_id"]."' and status='Active'";
                                $result_user=mysql_query($query_user);
                                $result_fet_user=mysql_fetch_array($result_user);
                                    echo $result_fet_user["username"];?></div>
                                    <div class="col-md-12" style="text-align:right;font-size:10px;"><strong>Reviewed Date --</strong> <?php echo date('M d, Y',strtotime($row["log"]));?></div>
                                </div>
                                </fieldset>
                                <?php
                            }}else{?>
                                    No Review Logs Available
                                <?php }?>

                    </form>
                    <?php }else{?>
                    <strong>Review:</strong><br>
                        <textarea class="form-control animated" cols="20" id="new-review" name="review_comment" placeholder="Enter your review here..." rows="5"><?php //echo $result_fet['review_comment'];?></textarea>

                        <div class="text-right" style="margin-top:10px;"><a href="login.php"><button class="btn btn-success btn-md" name="login" type="submit">Submit your Review</button></a></div>
                    <?php }?>
                    <div class="clearfix"></div>
                    <div class="row text-center m-t-15">
                        <button type="button" class="btn btn-warning btn-xs btn-square" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?>



<div id="compare_popup" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content b-r-0">
                <div class="modal-header modal-header-bg-blue">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Compare Details</h4>

                </div>
                <div class="modal-body">
                    <div id = "stage" ></div>
                    <div class="clearfix"></div>
                    <div class="row text-center m-t-15">
                        <button type="button" class="btn btn-warning btn-xs btn-square" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    
    <div id="addProvider" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content b-r-0">
                <div class="modal-header modal-header-bg-blue">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Provider</h4>
                </div>
                <div class="modal-body">
                    <form class="bg-transparent" role="form" method="POST" action="">
                       <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" name="username" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone:</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="website">Website:</label>
                                    <input type="text" class="form-control" id="website" name="website" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fbUrl">Facebook URL:</label>
                                    <input type="text" class="form-control" id="fbUrl" name="fbUrl" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="liUrl">LinkedIn URL:</label>
                                    <input type="text" class="form-control" id="liUrl" name="liUrl" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="googlePUrl">Google+ URL:</label>
                                    <input type="text" class="form-control" id="googlePUrl" name="googlePUrl" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="igUrl">Instagram URL:</label>
                                    <input type="text" class="form-control" id="igUrl" name="igUrl" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sD">Short Description:</label>
                                    <textarea type="text" class="form-control" id="sD" rows="5" name="address" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location">Location:</label>
                                    <!-- <input type="text" class="form-control" id="location" name="location" required> -->

<select class="select2" id="location[]" name="location[]" multiple="multiple" style="width:250px;" required>
  <option></option>
  <option value="Bakersfield">Bakersfield</option>
  <option value="Los Angeles">Los Angeles</option>
  <option value="Orange County">Orange County</option>
  <option value="Palmdale">Palmdale</option>
  <option value="Alaska">Alaska</option>
  <option value="Pasadena/Glendale">Pasadena/Glendale</option>
  <option value="Hawaii">Hawaii</option>
  <option value="California">California</option>
  <option value="San Jose">San Jose</option>
  <option value="Nevada">Nevada</option>
  <option value="Plano/Dallas">Plano/Dallas</option>
  <option value="Oregon">Oregon</option>
  <option value="Washington">Washington</option>
  <option value="Arizona">Arizona</option>
  <option value="Colorado">Colorado</option>
  <option value="Idaho">Idaho</option>
  <option value="Montana">Montana</option>
  <option value="Nebraska">Nebraska</option>
  <option value="New Mexico">New Mexico</option>
  <option value="North Dakota">North Dakota</option>
  <option value="Utah">Utah</option>
  <option value="Wyoming">Wyoming</option>
  <option value="Alabama">Alabama</option>
  <option value="Arkansas">Arkansas</option>
  <option value="Illinois">Illinois</option>
  <option value="Iowa">Iowa</option>
  <option value="Kansas">Kansas</option>
  <option value="Kentucky">Kentucky</option>
  <option value="Louisiana">Louisiana</option>
  <option value="Minnesota">Minnesota</option>
  <option value="Mississippi">Mississippi</option>
  <option value="Missouri">Missouri</option>
  <option value="Oklahoma">Oklahoma</option>
  <option value="South Dakota">South Dakota</option>
  <option value="Texas">Texas</option>
  <option value="Tennessee">Tennessee</option>
  <option value="Wisconsin">Wisconsin</option>
  <option value="Connecticut">Connecticut</option>
  <option value="Delaware">Delaware</option>
  <option value="Florida">Florida</option>
  <option value="Georgia">Georgia</option>
  <option value="Indiana">Indiana</option>
  <option value="Maine">Maine</option>
  <option value="Maryland">Maryland</option>
  <option value="Massachusetts">Massachusetts</option>
  <option value="Michigan">Michigan</option>
  <option value="New Hampshire">New Hampshire</option>
  <option value="New Jersey">New Jersey</option>
  <option value="New York">New York</option>
  <option value="North Carolina">North Carolina</option>
  <option value="Ohio">Ohio</option>
  <option value="Pennsylvania">Pennsylvania</option>
  <option value="Rhode Island">Rhode Island</option>
  <option value="South Carolina">South Carolina</option>
  <option value="Vermont">Vermont</option>
  <option value="Virginia">Virginia</option>
  <option value="West Virginia">West Virginia</option>

      </select>

                                </div>
                                <div class="form-group">
                                    <label for="sp">Speciality:</label>
                                    <input type="text" class="form-control" id="sp" name="speciality" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pC">Provider Category:</label>
                                    <select class="form-control" id="pC" name="pcategory" required>
                                        <option>Applied Behavioral Analysis</option>
                                        <option>Counselling</option>
                                        <option>Occupational Therapy</option>
                                        <option>Early Intervention Services</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sL">Service Locations:</label>
                                    <select class="form-control" id="sL" name="slocation" required>
                                        <option>Home</option>
                                        <option>Community</option>
                                        <option>School</option>
                                        <option>Care Center</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="aS">Ages Served:</label>
                                    <select class="form-control" id="aS" name="ageserved" required>
                                        <option>Birth to 3</option>
                                        <option>Ages 3-5</option>
                                        <option>Ages 5-12</option>
                                        <option>Ages 13-18</option>
                                        <option>Ages 18 or Older</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ls">Languages:</label>
                                    <select class="form-control" id="ls" name="language" required>
                                        <option>English</option>
                                        <option>Telugu</option>
                                        <option>Hindi</option>
                                        <option>French</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="iA">Insurance Accepted:</label>
                                    
                                    <select class="select2"  id="insurance[]" name="insurance[]" multiple="multiple" style="width:250px;" required>
                                      <option></option>
                                      <option value="Aetna">Aetna</option>
                                      <option value="Blue Cross">Blue Cross</option>
                                      <option value="Anthem BlueCross">Anthem BlueCross</option>
                                      <option value="Blue Shield (Managed by Magellan)">Blue Shield (Managed by Magellan)</option>
                                      <option value="CompCare">CompCare</option>
                                      <option value="Humana">Humana</option>
                                      <option value="Kaiser Permanente">Kaiser Permanente</option>
                                      <option value="LifeSynch">LifeSynch</option>
                                      <option value="Magellan">Magellan</option>
                                      <option value="MHNet Behavioral Health">MHNet Behavioral Health</option>
                                      <option value="LifeSynch">LifeSynch</option>
                                      <option value="Magellan">Magellan</option>
                                      <option value="The Holman Group">The Holman Group</option>
                                      <option value="TriWest Healthcare alliance">TriWest Healthcare alliance</option>
                                      <option value="United hevaioral health/Optum">United hevaioral health/Optum</option>
                                      <option value="ValueOptions">ValueOptions</option>
                                      </select>
                                    <!--<select class="form-control" id="iA" name="insurance" required>
                                        <option>Aetna</option>
                                        <option>Blue Cross</option>
                                        <option>All Savers</option>
                                        <option>Kaiser</option>
                                        <option>American Medical</option>
                                    </select>-->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rC">Regional Center Funding Accepted:</label>
                                    <select class="form-control" id="rC" name="rfunding" required>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                      <button type="submit" class="btn btn-primary pull-right" name="submit" >Submit</button>
                    <br><br>


                     <!--   <button type="submit" name="submit" >Submit</button>
                        -->
                        
                       
                    </form>
                    <!-- <div class="row text-center">
                        <button type="button" class="btn btn-default btn-xs btn-square" data-dismiss="modal">Close</button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<script src="//select2.github.io/select2/select2-3.4.2/select2.js"></script>
<script>
  $( ".select2" ).select2( { placeholder: "Select a State", maximumSelectionSize: 6 } );

  
</script>
</body>

</html>
