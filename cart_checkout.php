<?php 
//require 'header.php';

//require ('connection.inc.php');
//require ('connection.inc.php');
//require ('functions.inc.php');
require ('cart.php');
ob_start();
defined("DATABASE_HOST") ? null : define("DATABASE_HOST", "localhost");
defined("DATABASE_USER") ? null : define("DATABASE_USER", "root");
defined("DATABASE_PASSWORD") ? null : define("DATABASE_PASSWORD","");
defined("DATABASE_NAME") ? null : define("DATABASE_NAME", "maxine");

$connection = mysqli_connect(DATABASE_HOST,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);


if(!isset($_SESSION['users_submit_login']) || $_SESSION['users_submit_login'] !== true){
    $user_email=$_SESSION['users_user_email'];
    header("location: user_account_visitor.php");  
}




?>

<?php display_the_message(); ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Maxine: Cart</title>
         <link rel="shortcut icon" href="images/logo.png">
        <link rel = "stylesheet" href="css/cart_checkout.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link ref="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel = "stylesheet" href="css/header.css"> 
<link rel="shortcut icon" href="images/logo.png">
        <style>
            .checkout{
                 padding-top: 30px;
                padding-bottom: 30px;
            }
            .checkout a {
     list-style-type: none;
     background-color: #000;
     cursor: pointer;
    width: 100%;
    font-size: 18px;
    border: none;
    outline: 0;
    padding: 12px;
    text-align: center;
    color: white;
}

.checkout a:hover {
  opacity: 0.7;
}
        </style>
    
    
    
    
    
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
        <div class="tablecontainer">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>Subtotal</th>
                </tr>
            <tr>      
               
                        <?php                        
                       display_cart_items();
                        ?> 
            </tr>
                  
            </table>
            <div class="total">
                <table>
                    <tr>
                        <td>
                            Subtotal
                        </td>
                        <td>RM 
                            <?php 
                            echo isset($_SESSION['total_item']) ? $_SESSION['total_item']: $_SESSION['total_item']="0";
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Shipping Fee:
                        </td>
                        <td>
                            Free shipping
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Total
                        </td>
                        <td>RM
                            <?php 
                            echo isset($_SESSION['total_item']) ? $_SESSION['total_item']: $_SESSION['total_item']="0";
                            ?>
                        </td>
                    </tr>
                </table>
            </div> 
            <div class="checkout">
             <form method="POST">
               <input type="submit" name="submit_cart_btn" class="submit_cart_btn"  value="Checkout" style="
     list-style-type: none;
     background-color: #000;
     cursor: pointer;
    width: 100%;
    font-size: 18px;
    border: none;
    outline: 0;
    padding: 12px;
    text-align: center;
    color: white;
    "> </form>
    
    <?php 
    $user_email=$_SESSION['users_user_email'];
    if(isset($_POST["submit_cart_btn"])){
    $check_the_items_query= "SELECT * FROM cust_cart WHERE email='$user_email'";
     $result= mysqli_query($connection, $check_the_items_query);
    $count= mysqli_num_rows($result);

    if(empty($count)){
        //redirect_user("shop.php");
        alert_popup("Select items to purchase first");
    }else{
        redirect_user("checkout_confirm.php");
    }
}  
    ?>
<!--            <a href="checkout_confirm.php" name="checkout" value="Checkout" >Checkout</a>-->
        </div>
        </div> 
        
    </body>
    
    <?php
        require 'footer.php';
        ?> 
</html>
