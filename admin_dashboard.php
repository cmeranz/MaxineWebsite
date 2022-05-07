<?php
    require ('connection.inc.php');
       //session_start(); 
   if(!isset($_SESSION['admin_login']) ||  $_SESSION['admin_login'] !== true){
    $usernamee= $_SESSION['admin_username'];
     header("location: admin_login.php");  
}
?>
<?php
 require ('functions.inc.php');
 
 if(isset($_POST["logout"])){
    unset($_SESSION['admin_username']);
//unset($_SESSION["name"]);
header("Location:admin_login.php");
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
        <title>Admin Dashboard</title>
         <link rel="shortcut icon" href="images/logo.png">
         <link rel="stylesheet" href="css/admin_dashboard.css"> 
         <style>
          
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
     
        <div id="side_navi" style="width: 25%;display: inline-block;vertical-align: top;">
            <div class='admin_nav'>    
                <div class='image'>
                    <h2><img src="images/logo_header.png" width="125px" alt="Logo"> </h2>
        
                </div>
                <div class="nav_menu">
                    <nav>
                        <ul>
                          <li><a href="admin_dashboard.php">Profile</a></li>
                          <li><a href="admin_orders.php">Orders</a></li>
                          <li><a href="admin_products.php">Products</a></li>
                          <li><a href="admin_categories.php">Categories</a></li>
                          <li><a href="admin_users.php">Users</a></li>
                          <li><a href="admin_customer_users.php">Customers</a></li>
                          <li><a href="admin_contact.php">Contact</a></li>
                          
                        </ul>
                    </nav>
                </div>
            </div>  
        </div>
        
        <div id="contents" style="width: 60%;display: inline-block;height:100%">
         
            
            <h2 style="text-align: center;">Welcome Admin!</h2>
            
            <div class="container">
                    <div class="user_icon">
                        <img src="images/user_icon.png" width="125px" alt="User Icon"> 
                    </div>  
                       <?php 
                        $usernamee= $_SESSION['admin_username']; ?>
                        <?php 

                       $query= query("SELECT * FROM administrator_users WHERE username='$usernamee'");
                       confirm($query);


                       while ($row = fetch_the_array($query)){    ?>
   
       
                        <div class="usernameinfo">
                         <h1><?php echo $usernamee ?></h1>
                         <h2><?php echo $row['admin_job_position']  ?></h2>
                        <p><?php echo $row['admin_email'] ?></p>
                        </div>
                         <div class="userinfoform">
                            <form action=""  method="post">
  
                                <label for="mobilenumber">Mobile Number:</label><br>
                                  <input type="text" name="mobilenumber" value="<?php echo $row ['admin_mobile'] ?>"><br><br>
                                  <label for="address">Address:</label><br>

                                  <textarea name="address" cols="30" rows="10"><?php echo $row ['admin_address'] ?></textarea><br>
                                  <div class="buttonsubmit" style="padding-top: 30px;">
                                  <button type="submit" name="submit_admin_info" style="background-color: #000;
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

if(isset($_POST["submit_admin_info"])){
  $mobile_number        = escape_value($_POST['mobilenumber']);
    $admin_address   = escape_value($_POST['address']);  
    
    $query = "UPDATE administrator_users SET ";
    $query .= "admin_mobile = '{$mobile_number}', ";
    $query .= "admin_address = '{$admin_address}' ";
    $query .= "WHERE username='$usernamee'";
    
    $update_query= query($query);
    confirm($update_query);
    
    redirect_user("admin_dashboard.php");
}







?>           
           
           
           
           
         
       
        <div>
            
        </div>
            
            
            
            
            
            
            
            
            
            
        </div>
    
    </body>
</html>
