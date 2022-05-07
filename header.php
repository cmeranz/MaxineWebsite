<?php 
require ('connection.inc.php');
if(!isset($_SESSION['users_submit_login']) || $_SESSION['users_submit_login'] !== true){
    $user_email=$_SESSION['users_user_email'];
    header("location: user_account_visitor.php");  
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
        
        <link rel = "stylesheet" href="homecss.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link ref="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel = "stylesheet" href="css/header.css"> 
<link rel="shortcut icon" href="images/logo.png">
    </head>
    <body>
        <div class="header">
       <div class="container"> 
        <div class="navbar">
            <div class="logo">
                <img src="images/logo_header.png" width="125px" alt="Logo">
            </div>
            <nav>
                <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
                <li><a href="user_account.php">Account</a></li>
                <li><a href="cart_checkout.php"><img src="images/Cart.png" width="30" height="30"></a></li>
                </ul>   
            </nav>
        </div> 
       </div>
        </body>
</html>
