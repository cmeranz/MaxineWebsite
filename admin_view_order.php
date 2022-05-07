<?php require ('connection.inc.php');

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
         <style>
             .image img{
    padding-top: 10px;
    padding-left: 120px;  
}
.nav_menu{
    padding: 0px 20px 0px 0px;
 
}

.nav_menu ul{
  list-style-type: none; 
  
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
            <table style=" padding-top: 100px;
    padding-left: 100px;width:100%">
  
                <tr style="background-color: black; color:white;">
                    <th>ID</th>
                    <th>Item Name</th>
                  <th>Quantity</th>
                  
                  <th>Order Size</th>
                    <th>Order Price</th>
                   
                  
                </tr>
                
                            <?php 
    if(isset($_GET['id'])){
    $query= query("SELECT * FROM order_info WHERE cust_order_id= ". escape_value($_GET['id']). "");
    confirm($query);

    while ($row = fetch_the_array($query)){
      
         $order_item_name=$row['order_item_name'];         
    $quantity=$row['quantity'];
    $order_size=$row['order_size'];
    $order_price=$row['order_price'];
    $orders = <<<SEQUENCE
    <tr>
                <td>{$row['cust_order_id']}</td>
                <td>$order_item_name</td>
                <td>$quantity</td>
                <td>$order_size</td>
                <td>RM $order_price</td>

            
                
      
                
            </tr>
SEQUENCE;
                echo $orders;
    
   
 
    }}

     
   
           ?>   
            </table>
           
              
         </div>   
    </body>
</html>
