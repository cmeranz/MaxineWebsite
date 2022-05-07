<?php 
    include ('connection.inc.php');
include ('functions.inc.php');
    function login_admin(){
   
    if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];       

    $sqql="SELECT * FROM administrator_users where password='$password' AND username='$username'";
 $connection = mysqli_connect("localhost","root","","maxine");
    $result= mysqli_query($connection, $sqql);
    $counts= mysqli_num_rows($result);
    if($counts>0){
        $_SESSION['admin_login']= TRUE;
        $_SESSION['admin_username']=$username;
        
        header('Location: admin_dashboard.php');
       
    }else{
        //$error_message="Please enter the correct login details";
        set_the_message("Your password or username is wrong");
        redirect_user("admin_login.php");
    }  } 
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="shortcut icon" href="images/logo.png">
        <link rel = "stylesheet" href="css/login.css">  
        <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    </head>
    <body>
        <div><h2 style="color:red;"><?php display_the_message(); ?></h2></div>
        <form action="admin_login.php" method="post">
            <?php login_admin(); ?>
            <h2>Login</h2>
            
            <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" name="username" id="username" placeholder="Username" required="required">
            </div>
            
            <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Password" required="required">
            </div>
             <input style="background-color: black;color:white;" type="submit" class="button" name="submit" value="Login" tabindex="6">
            <!--<a name="submit" href="">Login</a>-->
            <div class="input_error"></div>
            
        </form> 
    </body>
</html>
