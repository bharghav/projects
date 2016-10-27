<?php ob_start();
session_start();
include("dbconfig.php");
include("admin/includes/dbconnection.php");
include("model/common.class.php");
$commonObj=new commonClass();

if(isset($_POST['submit']))
{
   
   $forgotUserdata=$commonObj->forgotpassword($_POST);
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

<?php if($_GET['regmsg']!=""){?>
                <div class="isa_success">
                    <i class="fa fa-check"></i>
                    Register user created successfully.
                </div>
                <?php }?>
    <div class="container">
    	<div class="row">
    	    <div class="col-xs-12">
        	    <div class="form-wrap">
                <h1>Forgotpassword</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                        
                        <!-- <div class="checkbox">
                            <span class="character-checkbox" onclick="showPassword()"></span>
                            <span class="label">Show password</span>
                        </div> -->
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" name="submit" value="Submit">
                    </form>
                    
                    <hr>
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
</section>



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