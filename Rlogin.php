<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html>
    <head>
        <title>Login-Remote Access To PLC</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" >
         <link rel="stylesheet" type="text/css" href="Rstyle.css">
    </head>
    <body>
    <div class="full-page">
        <div class="container">
        <div class="row">
            <div class="col-sm-4">
        </div>
            <div class="col-sm-4">
                <div class="Rlogin_Remote">
                <form action="Rlogin_process.php" method="POST">
                <div class="form-group">
                <img src="FSM login.jpg" alt="FSM login" class="logo img-fluid"><br>
                <?php 
if(isset($_GET['loginerror'])) {
	$loginerror=$_GET['loginerror'];
}
 if(!empty($loginerror)){  echo '<p class="errmsg">Invalid login credentials, Please Try Again..</p>'; } ?>
        <label class="lable_txt">Username or Email address</label>
        <input type="text" name="Rlogin_var" value="<?php
     if(!empty($loginerror)){ echo  $loginerror; } ?>" class="form-control" required="">
        </div> 
        <div class="form-group">
            <br>
        <label class="lable_txt">Password</label>
        <input type="password" name="password" class="form-control">
        </div>
        <br>
        <button type="submit" name="subRlogin" class="btn btn-primary btn-group-lg Remote_btn">Log in</button>
        </form>
        <p style="font-size:12px; text-align: center;margin-top: 10px;"><a href="forgot-password.php style="color:#00376b;">
            Forgot Password?</a></p>
          <p>Don't have an account?<a href="Rsignup.php"> Sign Up</a> </p>  
          </div>
        
            <div class="col-sm-4">
            </div>
        </div>
        </div>
        </div>
    </div>
    </body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</html>