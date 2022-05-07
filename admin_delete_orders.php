<?php 

 require ('connection.inc.php');
 require ('functions.inc.php');  
    
    if(isset($_GET['id'])){
        $query= query("DELETE FROM cust_orders WHERE cust_order_id = ". escape_value($_GET['id']). "");
        confirm($query);
        
        $query= query("DELETE FROM order_info WHERE cust_order_id = ". escape_value($_GET['id']). "");
        confirm($query);
        
        set_the_message("Order Fulfilled");
        redirect_user("admin_orders.php");
    }else{
        redirect_user("admin_orders.php"); 
    }









?>

