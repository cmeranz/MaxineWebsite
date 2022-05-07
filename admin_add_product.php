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
          
         <style>
             .nav_menu{
    padding: 0px 20px 0px 0px;
 
}

.nav_menu ul{
  list-style-type: none; 
  
}
.image img{
    padding-top: 10px;
    padding-left: 120px;  
}
.nav_menu li a{
  
  width: 100%;
  background-color: #f1f1f1;
   display: block;
  color: #000;
  padding: 10px 18px;
  text-decoration: none;
  border-left: 2px solid #000000;
}

.nav_menu li a.active {
  background-color: #000000;
  color: white;
}

.nav_menu li a:hover:not(.active) {
  background-color: #555;
  color: white;
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
            <div style="padding-left:100px;">
        <div class="title">
            <h2 class="pagetitle">
            Add Product Information</h2>
        </div>
            
           
            
            <form action="" enctype="multipart/form-data" method="post">
  <label for="pname">Product name:</label><br>
  <input type="text" name="p_name" value="" size="100"><br>
  <label for="pprice">Product Price:</label><br>
  <input type="text" name="p_price" value=""><br><br>
  <label for="pqty">Product Quantity:</label><br>
  <input type="number" name="p_qty" value=""><br>
  <label for="pdesc">Product Description:</label><br>
  <textarea  name="p_desc" cols="30" rows="10"></textarea><br><br>
  <label for="plongdesc">Product Long Description:</label><br>
  <textarea  name="p_long_desc" cols="50" rows="20"></textarea><br><br>
  <label for="pcat">Product Category:</label><br>
  <select name="p_category_id" value=""><br><br>
      <option value="">Select Category</option>
      <?php fetch_categories_add_product(); ?></select><br><br>
      <label for="pimage">Product Image:</label><br>
  <input type="file" name="p_image" ><br><br><br>
  
  
  
  <input style="
     background-color: #000;
     cursor: pointer;
    width: 100px;
    font-size: 18px;
    border: none;
    outline: 0;
    padding: 12px;
    text-align: center;
    color: white;" type="submit" name="submit" value="Add">
</form>
         <?php  
          if(isset($_POST['submit'])){
    
    $p_category_id        = escape_value($_POST['p_category_id']);
    $p_name               = escape_value($_POST['p_name']);
    $p_price              = escape_value($_POST['p_price']);
    $p_qty                = escape_value($_POST['p_qty']);
    $p_image              = $_FILES['p_image']['name'];
    $p_image_tmp_location = $_FILES['p_image']['tmp_name'];
    $p_desc               = escape_value($_POST['p_desc']);
    $p_long_desc          = escape_value($_POST['p_long_desc']);
    
    
    move_uploaded_file($p_image_tmp_location, DIRECTORY_OF_UPLOADS . $p_image); 
    
    $query = query("INSERT INTO products (product_categories_id, product_name, product_price, quantity, product_image, product_description, product_long_description) VALUES ('{$p_category_id}', '{$p_name}', '{$p_price}', '{$p_qty}', '{$p_image}', '{$p_desc}', '{$p_long_desc}')");
    
    confirm($query);
    
    set_the_message("New product is just added");
    redirect_user("admin_products.php");
    
} 
         
         
         
         
         
         ?>
        </div></div>
    </body>
</html>
