<?php
require_once("config.php");
if(isset($_POST['subRlogin']))
{
$Rlogin=$_POST['Rlogin_var'];
$password=$_POST['password'];
$query="select * from user where (username='$Rlogin' OR email='$Rlogin')";
$res=mysqli_query($dbc,$query);
$numRows=mysqli_num_rows($res);
if($numRows==1){
    $row = mysqli_fetch_assoc($res);
        if(password_verify($password,$row['password'])){
           $_SESSION["Rlogin_sess"]="1"; 
             $_SESSION["Rlogin_email"]= $row['email'];
             header("location:account.php");
        }
        else{ 
     header("location:Rlogin.php?loginerror=".$Rlogin);
        }
    }
    else{
  header("location:Rlogin.php?loginerror=".$Rlogin);
    }
}

?>