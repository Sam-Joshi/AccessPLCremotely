<!DOCTYPE html>
<?php require_once("config.php");
if(isset($_SESSION["Rlogin_sess"])) 
{
  header("location:account.php"); 
}
?>
<html>
<head>
<title> Forgot Password - FSM Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" > 
    <link rel="stylesheet" href="Rstyle.css">
</head>
<body>
<div class="full-page">
<div class="container">
	<div class="row">
		<div class="col-sm-4">
		</div>
		<div class="col-sm-4">
 	<form action="forgot_process.php" method="POST">
    <div class="Rlogin_Remote">
  <div class="form-group">
 <img src="FSM login.jpg" alt="FSM Login" class="img-fluid logo"> 
 <?php if(isset($_GET['err'])){
 $err=$_GET['err'];
 echo '<p class="errmsg">No user found. </p>';
} 
// If server error 
if(isset($_GET['servererr']))
{ 
echo "<p class='errmsg'>The server failed to send the message. Please try again later.</p>";
}
   //if other issues 
   if(isset($_GET['somethingwrong'])){ 
 echo '<p class="errmsg">Something went wrong.  </p>';
   }
// If Success | Link sent 
if(isset($_GET['sent'])){
echo "<div class='successmsg'>Reset link has been sent to your registered email id . Kindly check your email. 
It can be taken 2 to 3 minutes to deliver on your email id . </div>"; 
  }
  ?>
  <?php if(!isset($_GET['sent'])){ ?>
    <label class="label_txt">Username or Email </label>
    <input type="text" name="Rlogin_var" value="<?php if(!empty($err)){ echo  $err; } ?>" 
    class="form-control" required="">
  </div><br>
  <button type="submit" name="subforgot" class="btn btn-primary btn-group-lg Remote_btn">Send Link </button><br><br>
  <?php } ?>
</div>
</form>
   <br> 
   <p style="border:white;border-width:4px;text-align:center;border-style:solid;background-color:white">
   Have an account? <a href="Rlogin.php">Login</a><br>Don't have an account? <a href="Rsignup.php">Sign up</a> </p>
    
		</div>
		<div class="col-sm-4">
		</div>
	</div>
</div> 
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</html>