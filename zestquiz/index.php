<?php include "includes/header.php";?>

<?php
if(isset($_POST['submit']))
{

$number=$_POST['number'];
$message=$_POST['message'];


//echo $var="http://sms.************.com/*****.asp?user=username&password=
//password&sender=sender&sendercdma=**********&text=".$message."&PhoneNumber=".$number."&track=1";exit;
$var="http://smslogin.mobi/spanelv2/api.php?username=zestquiz&password=a12345&to=$number&from=ZESTQU&message=$message";
    //echo $var;

    $curl=curl_init('http://smslogin.mobi/spanelv2/api.php');
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $var);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result= curl_exec($curl);
    echo $result;
    curl_close($curl);
    //die("SMS has sent.....");

    }

?>






			<div class="bottom-head">
				<div class="video-container">
					<iframe width="500" height="280" src="https://www.youtube.com/embed/CwS1iMJAp4Q" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
				<span class="login-box">
					<div>
						<form method="post" name='form'>
							<!-- <input type="text" class="login-field" placeholder="Enter your registered mobile number" required/> -->
							<input type="text" name="numbertext" />-<input type="text" name="number" />
							<textarea name="message" style="display:hidden;"></textarea>
							<!-- <button class="button primary">Login</button> -->
							<input type="submit" name="submit" value="Send"/>
						</form>



					</div>
				</span>
			</div>
			<div class="big-text">
				<h1 class="title">Are you ready for exams...?</h1>
				<p class="sub-title">Zest quiz is the biggest platfrom for you to prepare yourself for any exam at any time.</p>
			</div>
		</div><!--Headder-->
		<div class="content">
			<div class="section align-center features">
				<div class="section-title">
						<h1 class="title">Features</h1>
				</div>
				<div class="container">
					<div class="block">
						<i class="icon-random-quiz"></i>
						<h2 class="title">Random Quizess</h2>
					</div>
					<div class="block">
						<i class="icon-multi-level"></i>
						<h2 class="title">Multi level courses</h2>
					</div>
					<div class="block">
						<i class="icon-concept"></i>
						<h2 class="title">Concept Explination</h2>
					</div>
					<div class="block">
						<i class="icon-mock-test"></i>
						<h2 class="title">Mock tests</h2>
					</div>
					<div class="block">
						<i class="icon-perfomance"></i>
						<h2 class="title">Key Performance Reports</h2>
					</div>
					<div class="block">
						<i class="icon-dashboards"></i>
						<h2 class="title">Detailed Dashboards</h2>
					</div>
				</div>
			</div><!--features-->
			<div class="section align-center testmonials">
				<div class="section-title">
					<h1 class="title">Testimonials</h1>
				</div>
				<div class="container">
					<span class="user-image"><img src="images/profile.jpg" alt="User name"/></span>
					<h3 class="title">Sandeep Mattapalli - Hyderabad</h3>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
				</div>
			</div><!--testmonials-->
			<div class="section counter-container">
				<div class="counter"><span class="count">10000</span> <p class="text">Happy Students</p></div>
				<div class="counter"><span class="count">986</span> <p class="text">Tests Taken</p></div>
				<div class="counter"><span class="count">400</span> <p class="text">Total Topics</p></div>
				<div class="counter"><span class="count">53</span> <p class="text">Educational Experts Transplantation</p></div>
			</div><!--counter-container-->
		</div><!--Content -END-->
<?php include "includes/footer.php";?>
