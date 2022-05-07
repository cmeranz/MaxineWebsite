<?php 
 
 require ('connection.inc.php');
 require ('functions.inc.php');  
    
    if(isset($_GET['id'])){
        $query= query("DELETE FROM administrator_users WHERE id = ". escape_value($_GET['id']). "");
        confirm($query);
        
        set_the_message("Administrator Deleted");
        redirect_user("admin_users.php");
    }else{
        redirect_user("admin_users.php"); 
    }

?>