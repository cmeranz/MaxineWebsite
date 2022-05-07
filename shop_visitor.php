<?php
    require 'header_visitor.php';
    //require ('connection.inc.php');
    //require ('functions.inc.php');
    //session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Maxine: Shop</title>
        <link rel="shortcut icon" href="images/logo.png">
<!--        <link rel = "stylesheet" href="css/shop.css"> -->
<!--       <link rel = "stylesheet" href="css/proudct_nav.css">-->
<style>
.padding{
    padding: 10px 10px 10px 10px;
    display: inline-block;
    
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  display: inline-block;
}

.price {
  color: grey;
  font-size: 22px;
}

.allproducts{
   padding-left: 70px;
/*       padding-right: 30px;*/
    width: 90%;
    text-align: center;
    display: inline-block;
}
.allproducts li {
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

.allproducts li:hover {
  opacity: 0.7;
}
.product_desc{
    height: 80px;
}
</style>  
    </head>
    <body>
        
        <div class="allproducts">
        
       <?php 
function confirm($result){
    global $connection;
    if(!$result){
    //die ("QUERY FAILED", mysqli_error($connection);
    } 
}   

function fetch_the_array($result){
    return mysqli_fetch_array($result);
}
function query($sql){
    global $connection;
    return mysqli_query($connection, $sql);
}
?>
            <?php
     
$query= query("SELECT * FROM products");
confirm($query);

//heredoc method//
while ($row = fetch_the_array($query)){
    $products = <<<SEQUENCE
       <div class="padding">
        <div class="card">
            <a href="user_account_visitor.php">
            <img src="images/image_uploads/{$row ['product_image']}" alt="Product image" style="width:100%;">
            <h1>{$row ['product_name']}</h1>
            <p class="price"> RM {$row ['product_price']}</p>
            <div class="product_desc">
            <p>{$row ['product_description']}</p>
            </div>
            </a>
       </div>  
        </div>    
SEQUENCE;
            
            echo $products;
}

       
       
       
       
       
       
       
       
       
       ?> 
        
        
        </div>
         
        
        
        
        
    </body>
    <?php
        require 'footer_visitor.php';
        ?>
</html>
