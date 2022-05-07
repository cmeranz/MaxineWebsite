<?php
require ('connection.inc.php');

if(!isset($_SESSION['admin_login']) ||  $_SESSION['admin_login'] !== true){
    $usernamee= $_SESSION['admin_username'];
    header("location: adminlogin.php");  
}
?>
<?php
 require ('functions.inc.php');
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
         <link rel="stylesheet" href="css/admin_users.css"> 
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
         <h2 style="padding-left: 100px; color:red;"><?php display_the_message(); ?></h2>
           <table style=" padding-top: 100px;
    padding-left: 100px;width:100%">
  
                <tr style="background-color: black; color:white;">
                    <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile Number</th>
                  <th>Address</th> 
                    <th>Job Position</th>
                    <th>Action</th>
                </tr>
                
                <?php  fetch_admin_users(); ?>
               
              </table> 
            
            
            
            
            
            
            
            
            
            
            
            
            
        </div>
    </body>
</html>
