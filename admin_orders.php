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
         <link rel="stylesheet" href="css/admin_orders.css"> 
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
            <h2 style="padding-left: 100px; color:green;"><?php display_the_message(); ?></h2>
         <table style=" padding-top: 100px;
    padding-left: 100px;width:100%">
  
                <tr style="background-color: black; color:white;">
                    <th>ID</th>
                    <th>Date</th>
                  <th>Customer Details</th>
                  
                  <th>Shipping address</th>
                    <th>Amount</th>
<!--                    <th>Quantity</th>
                    <th>Size</th>
                    
                    <th>Order Items</th>
                     <th>Item Price</th>-->
                    <th style="width:100px;">Action</th>
                  
                </tr>
                
            
            <?php 
    
    $query= query("SELECT * FROM cust_orders");
    confirm($query);

    while ($row = fetch_the_array($query)){
         $order_id=$row['cust_order_id'];
         $order_date=$row['date'];
         $cust_name=$row['cust_name'];
    $cust_email=$row['cust_email'];
    $mobile_num=$row['mobile_num'];
    $address=$row['address'];
    $amount=$row['amount'];
    $orders = <<<SEQUENCE
    <tr>
                <td>$order_id</td>
                <td>$order_date</td>
                <td>
                    <a>Name:</a> <a>$cust_name</a><br>
                 <a>Email:</a> <a>$cust_email</a><br>
                  <a>Mobile Number:</a> <a>$mobile_num</a><br>
                </td>
                <td>$address</td>
                <td>RM $amount</td>

             <td><a style="padding-left:20px;text-decoration: none; color:green;"href="admin_view_order.php?id={$row['cust_order_id']}">View Order</a><br>
                <a style="padding-left:20px; text-decoration: none; color:red;" href="admin_delete_orders.php?id={$row['cust_order_id']}">Confirmed</a></td>   
      
                
            </tr>
SEQUENCE;
                echo $orders;
}
     
   
           ?> 
              
            </table>
            
            
            
            
            
            
            
            
            
            
        </div>
    </body>
</html>
