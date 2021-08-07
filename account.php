<!DOCTYPE html>
<?php require_once("config.php");
if(!isset($_SESSION["Rlogin_sess"])) 
{
    header("location:Rlogin.php"); 
}
  $email=$_SESSION["Rlogin_email"];
  $findresult = mysqli_query($dbc, "SELECT * FROM user WHERE email= '$email'");
if($res = mysqli_fetch_array($findresult))
{
$username = $res['username']; 
$fname = $res['fname'];   
$lname = $res['lname'];  
$email = $res['email'];  
}
 ?> 
<html>
<head>
    <title> My Account - Remote Access To PLC</title><br>
    <title>Welcome to Chrome remote Desktop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" > 
    <link rel="stylesheet" type="text/css" href="Rstyle.css">
</head>
<body>
<div class="full-page">
<div class="container">
    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6"><br>
        
            <h5 style="border:white;border-width:4px;text-align:center;border-style:solid;background-color:white">
            Welcome to Chrome Remote Desktop.<br>
                <a href="https://remotedesktop.google.com/support"> 
                Please use this link to access PLC remotely</a>
                </h5>
                
            

            </style>
        <div class="Rlogin_Remote">
 <img src="FSM login.jpg" alt="FSM login" class="logo img-fluid"> <br> 
     <p><a href="logout.php"><span style="color:red; float: right;">Logout</span> </a></p>
          <p> Welcome! <span style="color: green"><?php echo $username; ?></span> </p>
          <table class="table">
          <tr>
              <th>First Name </th>
              <td><?php echo $fname; ?></td>
          </tr>
          <tr>
              <th>Last Name </th>
              <td><?php echo $lname; ?></td>
          </tr>
          <tr>
              <th>Username </th>
              <td><?php echo $username; ?></td>
          </tr>
           <tr>
              <th>Email </th>
              <td><?php echo $email; ?></td>
          </tr>
          </table>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
</div>
</div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>