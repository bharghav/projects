<?php 
//ob_start();
//session_start();
require_once 'config.php'; 
/*if(!isset($_SESSION['logged_in'])){
	header('Location: index.php');
}*/
?>
<?php /*?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Zest</title>
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="http://demos.vetbossel.in/img/favicon.png" type="image/x-icon" />
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    
 </head>
 <body>

    <!-- Static navbar -->
	<div role="navigation" class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" data-toggle="collapse"
					data-target=".navbar-collapse" class="navbar-toggle collapsed">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
			</div>
			<?php 
			$arr = explode("/",$_SERVER['REQUEST_URI']);
			$uri = end( $arr ); 
			?>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li <?php if($uri == 'home') echo "class='active'"; ?>><a href="home.php">Home</a></li>
					<li <?php if($uri == 'quiz-results') echo "class='active'"; ?>><a href="quiz-results.php">Quiz Results</a></li>
					<li <?php if($uri == 'start-quiz') echo "class='active'"; ?>><a href="start-quiz.php">Start New Quiz</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">
							Welcome 
							
						<?php if($_SESSION['logged_in']) { ?>
							<?php echo $_SESSION['name']; ?>
							<span class="caret"></span>
						</a>
						<ul role="menu" class="dropdown-menu">
							<li> <a href="account.php">My Account</a> </li>
							<li class="divider"></li>
							<li style="background: #e67e22; color:#fff"> <a href="logout.php">Logout</a> </li>
						</ul>
						<?php } ?>
					</li>
					
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div> <?php */?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
	<title>-::Zest Quiz::-</title>
	<link href="css/mainstyle.css" type="text/css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Nanum+Pen+Script|Permanent+Marker|Sue+Ellen+Francisco" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
</head>

<body class="home">
	<div class="main-container">
		<div class="header">
			<div  class="top-head">
				<span class="icon-logo"></span>
				<?php 
				$arr = explode("/",$_SERVER['REQUEST_URI']);
				$uri = end( $arr ); 
				?>
				<!-- <ul class="nav navbar-nav">
					<li <?php if($uri == 'home') echo "class='active'"; ?>><a href="home.php">Home </a></li>
					<li <?php if($uri == 'quiz-results') echo "class='active'"; ?>><a href="quiz-results.php">Quiz Results</a></li>
					<li <?php if($uri == 'start-quiz') echo "class='active'"; ?>><a href="start-quiz.php">Start New Quiz</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">
							Welcome 
							
						<?php 
						//print_r($_SESSION);
						if(@$_SESSION['logged_in']) { ?>
							<?php echo $_SESSION['name']; ?>
							<span class="caret"></span>
						</a>
						<ul role="menu" class="dropdown-menu">
							<li> <a href="account.php">My Account</a> </li>
							<li class="divider"></li>
							<li style="background: #e67e22; color:#fff"> <a href="logout.php">Logout</a> </li>
						</ul>
						<?php } ?>
					</li>
					
				</ul> -->

				<ul>
					<li><a href="">Classes</a></li>
					<li><a href="">Boards</a></li>
					<li><a href="">Exams</a></li>
					<?php 
					if(@$_SESSION['logged_in']) { ?>
					<li><span style="font-size:24px;"> Welcome </span>  <a href="javascript:void(0)" ><?php echo $_SESSION['name']; ?></a></li>
					<li><a href="logout.php" class="button primary">Logout</a></li>
					<?php }else{?>
					<li><a href="register.php" class="button primary">SignUp</a></li>
					<?php }?>
				</ul>
			</div>
			