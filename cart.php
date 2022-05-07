 <?php 
 ob_start();

defined("DATABASE_HOST") ? null : define("DATABASE_HOST", "localhost");
defined("DATABASE_USER") ? null : define("DATABASE_USER", "root");
defined("DATABASE_PASSWORD") ? null : define("DATABASE_PASSWORD","");
defined("DATABASE_NAME") ? null : define("DATABASE_NAME", "maxine");

$connection = mysqli_connect(DATABASE_HOST,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
//$connection = mysqli_connect("localhost","root","","maxine");

//if($connection){
//    echo 'is connected';
//} else {
//    echo 'not connected';
//}
//require ('connection.inc.php');
require ('functions.inc.php');

session_start();


?> 

<?php 
function display_cart_items(){
 $user_email=$_SESSION['users_user_email'];
 $sub2=0;
  $query= query("SELECT * FROM cust_cart WHERE email='$user_email'");
confirm($query);
 

//heredoc method//
while ($row = fetch_the_array($query)){ 
       
        
       $quantity = $row['quantity']; 
       $sub =$row['price_subtotal']; 
       $size = $row['size'];
       
      
       $sub2 = $sub2 +($row['quantity']*$row['price']);
       
$cart_items = <<<SEQUENCE
                    <form action="" method="POST"><tr>
                        <td>
                        <div name="productinfo">
                                   <img src="images/image_uploads/{$row['images']}" alt="Product Image">
                                   <div class="productname">
                                   <p>{$row['item_name']}</p>
                                    <small>{$row['price']}</small><br>
                                    
                                    <a href="cart_delete.php?id={$row['id']}">Delete</a>
                                </div>                       
                                </div>  
                        </td>
                                    <td>
                                   {$quantity}
                           </td><td>  {$size}    </td>
                            <td style="text-align: right;">
                                RM {$sub}
                            <td>        
                      </tr>
SEQUENCE;
         echo $cart_items;  
        
} 
                    
                    $_SESSION['total_item']= $sub2;         
                         
                       }
   
                       
                       
 
                   
 
 
 
 
 ?>
 
 
 
 
 
 

