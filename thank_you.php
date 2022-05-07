<?php
    require 'header.php';?>
        <?php
    //require ('connection.inc.php');
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
         <title>Maxine: Shop</title>
        <link rel="shortcut icon" href="images/logo.png">
       
        <link rel = "stylesheet" href="css/proudct_nav.css">
    </head>
    <body>
        <div style="text-align: center;">
        
        <h2>Thank You for Your Order!</h2>
        
        <p>We are glad to have you as our customer. Your order will be shipped within 2 to 3 weeks depending on shipping location.</p><br><br>
       <p>Below are our shipping service details:</p><br>
        <p>Peninsular Malaysia: 2 Weeks.</p><br>
        <p>West Malaysia: 3 Weeks.</p><br><br>
       <p>Service hours:</p><br>
       <p>Monday - Friday : 9.30am to 6.00pm</p><br>
       <p>Weekends & Public Holidays: Off</p><br><br> 
       
       <p>Should you have any queries, please feel free to contact us.</p><br>
       <a  style="list-style-type: none;
     background-color: #000;
     cursor: pointer;
    width: 100%;
    font-size: 18px;
    border: none;
    outline: 0;
    padding: 12px;
    text-align: center;
    color: white;"href='shop.php' name="back">Back to Shopping</a><a style="padding-left:20px;"></a> <a  style="list-style-type: none;
     background-color: #000;
     cursor: pointer;
    width: 100%;
    font-size: 18px;
    border: none;
    outline: 0;
    padding: 12px;
    text-align: center;
    color: white;"name="contact_page" href='contact_us.php'>Contact Us</a><br><br><br>
        </div>
    </body>
    <?php
        require 'footer.php';
        ?>
</html>
