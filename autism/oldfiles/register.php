<?php ob_start();
session_start();
include("dbconfig.php");
include("admin/includes/dbconnection.php");
include("model/common.class.php");
$commonObj=new commonClass();

if(isset($_POST['register']))
{
   $insertUserdata=$commonObj->insertUsers($_POST);
}
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>wecare4autism</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   

</head>

<body class="bg-patt">
<section id="login">
    <div class="container">
    	<div class="row">
    	    <div class="col-xs-12">
        	    <div class="form-wrap">
                <h1>Registration</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="uname" class="sr">Username</label>
                            <input type="text" name="uname" id="uname" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <label for="key" class="sr">Confirm Password</label>
                            <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm password">
                        </div>
                        <div class="form-group">
                            <label for="zip_code" class="sr">Zip Code</label>
                            <input type="text" name="zip_code" id="zip_code" class="form-control" placeholder="Zip Code">
                        </div>
                        <div class="form-group">
                            <label for="nochild" class="sr">No of Children's</label>
                            <input type="text" name="nochild" id="nochild" class="form-control" placeholder="No of Children">
                        </div>

                        <div class="form-group">
                            <label for="uname" class="sr">Age Group of child with child Special Needs</label>
                            <select name="agegroup" class="form-control" placeholder="Age Group">
                                <option>Select age group</option>
                                <option>2-6 years</option>
                                <option>6-8 years</option>
                                <option>8-10 years</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="" class="sr">Can other users contact you via Email for support</label>
                            <input type="radio" name="viaemail" id="yes" value="yes"> Yes &nbsp;&nbsp;
                            <input type="radio" name="viaemail" id="no" value="yes"> No
                        </div>

                        <div class="form-group">
                            <label for="listzip" class="sr">List of Providers used for Autism 4 Zipcode</label>
                            <input type="text" name="listzip" id="listzip" class="form-control" placeholder="Zip Code">
                        </div>
                        <!-- <div class="checkbox">
                            <span class="character-checkbox" onclick="showPassword()"></span>
                            <span class="label">Show password</span>
                        </div> -->
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" name="register" value="Register">
                    </form>
                    <a href="login.php" class="forget" data-toggle="modal" data-target=".forget-modal"> --> Back</a>
                   
                    <hr>
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Recovery password</h4>
			</div>
			<div class="modal-body">
				<p>Type your email account</p>
				<input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-custom">Recovery</button>
			</div>
		</div> <!-- /.modal-content -->
	</div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>© - 2016, Powered by <strong><a href="#" target="_blank">Autism</a></strong></p>
            </div>
        </div>
    </div>
</footer>
</body>

</html>