<?php 
require 'header.php';
//require ('functions.inc.php');
?>
<?php 
function query($sql){
    global $connection;
    return mysqli_query($connection, $sql);
}
function confirm($result){
    global $connection;
    if(!$result){
    //die ("QUERY FAILED", mysqli_error($connection);
    } 
}
function fetch_the_array($result){
    return mysqli_fetch_array($result);
}
function escape_value($string){
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}
function redirect_user($location){
    return header("Location: $location");
}


if(isset($_POST["logout"])){
    unset($_SESSION['users_user_email']);
//unset($_SESSION["name"]);
header("Location:user_account_visitor.php");
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
        <title>Maxine: Account</title>
        <link rel="shortcut icon" href="images/logo.png">
        <style>
            *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.user_icon{
    text-align: center;
    padding-top: 20px;
}
.usernameinfo{
   text-align: center; 
}
.userinfoform{
    padding-top: 40px;
   text-align: center;  
}

        </style>
    </head>
    <body>
        <div class="container">
        <div class="user_icon">
            <img src="images/user_icon.png" width="125px" alt="User Icon"> 
        </div>  
           <?php 
           $user_email=$_SESSION['users_user_email']; ?>
           
         
           <?php 

           $query= query("SELECT * FROM users WHERE user_email='$user_email'");
confirm($query);


while ($row = fetch_the_array($query)){    ?>
   
       
           <div class="usernameinfo">
            <h1><?php echo $row ['username']  ?></h1>
           <?php echo $user_email; 
           
           ?></p>
           </div>
            <div class="userinfoform">
                <form action=""  method="post">
  
<label for="mobilenumber">Mobile Number:</label><br>
  <input type="text" name="mobilenumber" value="<?php echo $row ['mobile_number'] ?>"><br><br>
  <label for="address">Address:</label><br>
<!--  <input type="text" name="address" value="<?php echo $row ['address'] ?>" ><br>-->
  <textarea name="address" cols="30" rows="10"><?php echo $row ['address'] ?></textarea><br>
  <div class="buttonsubmit" style="padding-top: 30px;">
  <button type="submit" name="submit_user_info" style="background-color: #000;
     cursor: pointer;
    width: 20%;
    font-size: 18px;
    border: none;
    outline: 0;
    padding: 12px;
    text-align: center;
    color: white;">Update</button> 
   
      </div>
  <div class="logout" style="padding-top: 30px; padding-bottom: 30px;">
      <button type="logout" name="logout" style="background-color: #000;
     cursor: pointer;
    width: 20%;
    font-size: 18px;
    border: none;
    outline: 0;
    padding: 12px;
    text-align: center;
    color: white;">Logout</button>
      
  </div>
</form>
                <div>
            
      

            
<?php }?>
<?php 

if(isset($_POST["submit_user_info"])){
  $mobile_number        = escape_value($_POST['mobilenumber']);
    $customer_address   = escape_value($_POST['address']);  
    
    $query = "UPDATE users SET ";
    $query .= "mobile_number = '{$mobile_number}', ";
    $query .= "address = '{$customer_address}' ";
    $query .= "WHERE user_email='$user_email'";
    
    $update_query= query($query);
    confirm($update_query);
    
    redirect_user("user_account.php");
}







?>           
           
           
           
           
         
       
        <div>
            
        </div>
        </div> </div> </div> 
    </body>
    <?php
        require 'footer.php';
        ?>
       
</html>
