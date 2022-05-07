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
    
    //session_start();
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
         <link rel="stylesheet" href="css/admin_categories.css"> 
      
         <style>
             .addcategory{
                 padding-top: 50px;
                 padding-left: 100px;
                 width:100%
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
         
           <table style=" padding-top: 100px;
    padding-left: 100px;width:100%">
               <h2 style="padding-left: 100px; color:green;"><?php display_the_message(); ?></h2>
                <tr style="background-color: black; color:white;">
                    <th>ID</th>
                  <th>Name</th>
                <th>Action</th>
                </tr>
                
                <?php admin_display_categories(); ?>
                
                
              
               
              </table> 
            
            <div class="addcategory">
                
                <?php 
                
                if (isset($_POST['add'])){
        $category_name = escape_value($_POST['category_name']);
        $query = query("INSERT INTO product_categories(category_name) VALUES('{$category_name}')");
        confirm($query);
        
        set_the_message("New category is added");
        redirect_user("admin_categories.php");
    }
                
                
                ?>
                <form action="" method="post" style="border: 3px solid #f1f1f1;background-color: white;
  padding-bottom: 20px; padding-left: 20px; width: 400px;">
                    <p name="catname">
                        Category name:
                    </p>
                    <input name="category_name" type="text" style="padding: 10px;">
            <input name="add" type="submit" value="Add" style="
     list-style-type: none;
     background-color: #000;
     cursor: pointer;
    
    font-size: 18px;
    border: none;
    outline: 0;
    padding: 10px;
    text-align: center;
    color: white; ">
            
            </form>
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
        </div>
    </body>
</html>
