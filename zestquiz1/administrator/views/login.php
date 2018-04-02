<?php
$userObj->userAuthentication();
if($_POST['submit']=="Login")
{
     $logincheck=$userObj->checkAdmin();
}
?>
<!-- container_login -->



<div class="" style="width: 400px; min-height: 300px; margin-top: 40px; margin-left: auto; margin-right: auto;">
  <div class="col-md-12">
<div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign In</h3>
                    </div>
                    <div class="panel-body" >
                      <div class="col-md-4">
                        <img src="allfiles/login.png" alt="Please enter your login details.">
                      </div>
                      <div class="col-md-8">
                        <form action="index.php?option=com_login" method="post" id="frmLoginAdmin" class="middle_form">
                            <fieldset>
                              <div class="form-group">
                                  <h6><img src="allfiles/lock.png" alt=""> Please enter your login details.</h6>
                                </div>
                                <div class="form-group">
                                  <input type="text" name="chrUserName" id="chrUserName" value="" class="text_large" />
                                    <!--input class="form-control" placeholder="E-mail" name="email" type="email" autofocus=""-->
                                </div>
                                <div class="form-group">
                                    <input type="password" name="chrPassword" id="chrPassword" value="" class="text_large" />
                                    <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="hidden" name="submit" value="Login"  /><input value="" type="submit" class="button button_login">
                                <!--a href="javascript:;" class="btn btn-sm btn-success">Login</a-->
                            </fieldset>
                        </form>
                      </div>
                    </div>
                </div>
</div>
    <!--div class="heading">
      <h1><img src="allfiles/lock.png" alt=""> Please enter your login details.</h1>
    </div-->
    <!--div class="content" style="min-height: 150px; overflow: hidden;">
         <form action="index.php?option=com_login" method="post" id="frmLoginAdmin" class="middle_form">
        <table style="width: 100%;">
          <tbody><tr>
            <td style="text-align: center;" rowspan="4"><img src="allfiles/login.png" alt="Please enter your login details."></td>
          </tr>
          <tr>
            <td>Username:<br>
			        <input type="text" name="chrUserName" id="chrUserName" value="" class="text_large" />
              <br>
              <br>
              Password:<br>
              <input type="password" name="chrPassword" id="chrPassword" value="" class="text_large" />
              <br>
          </tr>
          <tr>
            <td height="5"></td>
          </tr>
          <tr>
            <td ><input type="hidden" name="submit" value="Login"  /><input value="" type="submit" class="button button_login"></td>
          </tr>
        </tbody></table>
        </form>
    </div-->
  </div>
	<!-- container_login -->