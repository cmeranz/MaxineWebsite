<?php 
 
 require ('connection.inc.php');
 require ('functions.inc.php');  
    
    if(isset($_GET['id'])){
        $query= query("DELETE FROM users WHERE user_id = ". escape_value($_GET['id']). "");
        confirm($query);
        
        set_the_message("Customer Deleted");
        redirect_user("admin_customer_users.php");
    }else{
        redirect_user("admin_customer_users.php"); 
    }

?>