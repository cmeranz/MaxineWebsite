<?php 

 require ('connection.inc.php');
 require ('functions.inc.php');  
    
    if(isset($_GET['id'])){
        $query= query("DELETE FROM products WHERE id = ". escape_value($_GET['id']). "");
        confirm($query);
        
        set_the_message("Product Deleted");
        redirect_user("admin_products.php");
    }else{
        redirect_user("admin_products.php"); 
    }









?>
