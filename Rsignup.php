<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html>
    <head>
        <title>Signup-Remote Access To PLC </title>
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
                <img src="FSM login.jpg" alt="FSM login" class="logo img-fluid">
                </div>
               <div class="col-sm-4">
                </div>
            </div>
            <div class="row">
                <?php
                if(isset($_POST['signup'])){
                    extract($_POST);
                    if(strlen($fname)<3){
                        $error[]='please enter first name using 3 characters atleast';
                    }
                    if(strlen($fname)>20){
                        $error[]='More than 20 characters are not allowed';
                    }
                    if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/",$fname)){
                            $error[]='Invalid Entry First Name.Please Enter letters without any digits
                             or special symblos like (1,2,3,4,5,%,&,#,!,*,^,-,)';
                        }
                    if(strlen($lname)<3)
                    {
                        $error[]='please enter last name using 3 characters atleast';
                    }
                    if(strlen($lname)>20){
                        $error[]='More than 20 characters are not allowed';
                    }
                    if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/",$lname)){
                            $error[]='Invalid Entry of Last  Name.Please Enter letters without any digits
                             or special symblos like (1,2,3,4,5,%,&,#,!,*,^,-,)';
                        }
                    if(strlen($username)<3)
                    {
                        $error[]='please enter username using 3 characters atleast';
                    }
                    if(strlen($username)>20){
                        $error[]='More than 20 characters are not allowed';
                    }
                    if(!preg_match("/^^[^0-9][a-z0-9]+([_-]?[a-z0-9])*$/", $username)){
                        $error[] = 'Invalid Entry for Username. Enter lowercase letters without any space and No
                         number at the start- Eg - myusername, okuniqueuser or myusername123';
                    } 
                    if(strlen($email)>50){  
                        $error[] = 'Email: Max length 50 Characters Not allowed';
                    }
                    if($passwordConfirm ==''){
                        $error[] = 'Please confirm the password.';
                    }
                    if($password != $passwordConfirm){
                        $error[] = 'Passwords do not match.';
                    }
                    if(strlen($password)<5){ 
                        $error[] = 'The password is 6 characters long.';
                    }
                    
                    if(strlen($password)>20){  
                        $error[] = 'Password: Max length 20 Characters Not allowed';
                    }
                    $sql="select * from user where (username='$username' or email='$email');";
                    $res=mysqli_query($dbc,$sql);
                    if (mysqli_num_rows($res) > 0) {
                        $row = mysqli_fetch_assoc($res);
              
                    if($username==$row['username'])
                   {
                         $error[] ='Username alredy Exists.';
                        } 
                     if($email==$row['email'])
                     {
                          $error[] ='Email alredy Exists.';
                        } 
                    }
                    if(!isset($error)){ 
                        $date=date('Y-m-d');
                      $options = array("cost"=>4);
              $password = password_hash($password,PASSWORD_BCRYPT,$options);
                      
                     $result = mysqli_query($dbc,"INSERT into user 
                     values('','$fname','$lname','$username','$email','$password','$date')");
              
                         if($result)
                  {
                   $done=2; 
                  }
                  else{
                    $error[] ='Failed : Something went wrong';
                  } 
                }
                }?>
                <div class="col-sm-4">
                 <?php 
                        if(isset($error)){ 
                        foreach($error as $error){ 
                     echo '<p class="errmsg">&#x26A0;'.$error.' </p>'; 
                    }
                    }
                    ?>
                </div>
                <div class="col-sm-4">
                <?php if(isset($done)) 
                { ?>
                <div class="successmsg"><span style="font-size:100px;">&#9989;</span> <br> You have registered successfully . 
    <br> <a href="Rlogin.php" style="color:#fff;">Login here... 
                </a> </div>
                 <?php } else { ?>
                    <div class="Rsignup_Remote">
                        <form action="" method="POST">
                        <div class="form-group">
                        <label class="lable_txt">First Name</label>
                        <input type="text" class="form-control" name="fname" value="<?php
                         if(isset($error)){ echo $_POST['fname'];}?>" required="">
                        </div>
                        <div class="form-group">
                        <label class="lable_txt">Last Name</label>
                        <input type="text" class="form-control" name="lname" value="<?php
                         if(isset($error)){ echo $_POST['lname'];}?>" required="">
                        </div>
                        <div class="form-group">
                        <label class="lable_txt">UserName</label>
                        <input type="text" class="form-control" name="username" value="<?php 
                        if(isset($error)){ echo $_POST['username'];}?>" required="">
                        </div>
                        <div class="form-group">
                        <label class="lable_txt">Email</label>
                        <input type="text" class="form-control" name="email" value="<?php 
                        if(isset($error)){ echo $_POST['email'];}?>" required="">
                        </div>
                        <div class="form-group">
                        <label class="lable_txt">Password</label>
                        <input type="password" class="form-control" name="password" required="">
                        </div>
                        <div class="form-group">
                        <label class="lable_txt">Confirm Password</label>
                        <input type="password" class="form-control" name="passwordConfirm" required="">
                        </div><br>
                        <button type="submit" name="signup" class="btn btn-primary btn-group-lg Remote_btn">
                            Sign Up</button><br>
                        <p>Have an account?<a href="Rlogin.php">Log In</a></p>
                        </form>
                        <?php } ?>   
                    </div>
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