<?php 
require 'header_visitor.php';
//require ('connection.inc.php');
 require ('functions.inc.php');
 //session_start();

 function login_customer_users(){
    if(isset($_POST['submit_login'])){
     $email= escape_value($_POST['user_email']);
     $password= escape_value($_POST['password']);      

    $sql="SELECT * FROM users WHERE user_email = '{$email}' AND password = '{$password}'";
 $connection = mysqli_connect("localhost","root","","maxine");
    $result= mysqli_query($connection, $sql);
    $count= mysqli_num_rows($result);
    if($count>0){
        $_SESSION['users_submit_login']=TRUE;
        $_SESSION['users_user_email']=$email;
        
        
        redirect_user("shop.php");
       
    }else{
       
         alert_popup("Please enter the correct login details");
     
    }  } 
} 

function register_user(){
    if (isset($_POST['submit_register'])) {
  $connection = mysqli_connect("localhost","root","","maxine");
  
  $registerusername = escape_value($_POST['registerusername']);
  $register_email = escape_value($_POST['register_email']);
  $register_mobile = escape_value($_POST['register_mobile']);
  $register_address = escape_value($_POST['register_address']);
  $register_password = escape_value($_POST['register_password']);
  $repeat_register_password = escape_value($_POST['repeat_register_password']);

        if ($register_password != $repeat_register_password) {
           alert_popup("Passwords does not match.");
            //set_the_message("These two passwords do not match");

        }else{
            $check_user_query = "SELECT * FROM users WHERE user_email='$register_email' LIMIT 1";
              $result = mysqli_query($connection, $check_user_query);
              $the_user = mysqli_fetch_assoc($result);
             if ($the_user['user_email'] === $register_email) {
              alert_popup("The email is already in use for an account.");  
             }else{
 
     
                $query = query("INSERT INTO users (username, user_email, password, mobile_number, address) 
                                          VALUES('$registerusername', '$register_email', '$register_password', '$register_mobile', '$register_address')");
                        confirm($query);
                        $_SESSION['username'] = $registerusername;
                        $_SESSION['login'] = "You are now logged in";
                        //header('location: home.php');
                        redirect_user("user_account_visitor.php");
                        //alert_popup("Account Created. Now, login to continue.");
                        //redirect_user("user_account_visitor.php");
}}}}

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Maxine: Account</title>
         <link rel="shortcut icon" href="images/logo.png">
        <link rel = "stylesheet" href="css/user_account_visitor.css"> 
    </head>
    <body>
        
            <div class="container1-1"  style="background-image: url('images/aboutus/background.jpg');">
            
                
        <div class="logincontainer">
            
            <form action="user_account_visitor.php" method="post">
                <?php login_customer_users(); ?>
                
                <div class="login">
                    <h2>Login</h2>
                </div>

                <div class="container1">
                  <label for="user_email"><b>E-mail</b></label>
                  <input type="text" placeholder="Enter e-mail" name="user_email" id="user_email" required>

                  <label for="pass"><b>Password</b></label>
                  <input type="password" placeholder="Enter Password" name="password" id="password" required>

                  <button type="submit_login" name="submit_login">Login</button>
                </div>

                <div class="container11" style="background-color:#d3d3d3">
                    
                    <a type="forgotpass" name="forgotpass" class="forgotpassbtn" href="contact_us_visitor.php">Forgot Password? Contact Us Now</a>
                  
                </div>
            </form>
        </div>
            
        <div class="registercontainer">
        
             
            <form action="user_account_visitor.php" style="border:1px solid #ccc" method="POST">
                <?php   register_user();?>
                <div class="container2">
                    <div class="signup"> 
                  <h2>Sign Up</h2>
                  <p>Please fill in this form to create an account with us.</p>
                    </div>
                 
                    
                    <label for="register_username"><b>Username</b></label>
                   
                    <input type="text" placeholder="Enter username" name="registerusername" required><br>
                
                   
                    
                    
                    <label for="register_email"><b>Email</b></label>
                 
                    <input type="text" placeholder="Enter email" name="register_email" required><br>

                    <label for="register_mobile"><b>Mobile Number</b></label>
                 
                    <input type="text" placeholder="Enter mobile number" name="register_mobile" required><br>
               
                    <label for="register_mobile"><b>Address</b></label>
                 
                    <input type="text" placeholder="Enter address" name="register_address" required><br>
               
                   

                  <label for="register_password"><b>Password</b></label>
                  <input type="password" placeholder="Enter Password" name="register_password" required>

                  <label for="repeat_register_password"><b>Repeat Password</b></label>
                  <input type="password" placeholder="Repeat Password" name="repeat_register_password" required>


                  <p style="text-align: center;">By creating an account with us,you agree to our Terms Conditions & Privacy</a>.</p><br>
                <p style="text-align: center;">After signing-up, please login to use our website.</a></p><br>

                  <div class="signupclass">
                    
                      <button name="submit_register" class="signupbutton">Sign Up</button>
                  </div>
                </div>
              </form>

            
            
            
            
            
            
            
            
            
            
            
        </div>
        
        </div>
        
       
    </body>
    <?php
        require 'footer_visitor.php';
        ?> 
</html>


