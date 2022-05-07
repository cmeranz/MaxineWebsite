<?php 

 require ('connection.inc.php');
 require ('functions.inc.php');  
    
    if(isset($_GET['id'])){
        $query= query("DELETE FROM contact WHERE id = ". mysqli_real_escape_string($_GET['id']). "");
        confirm($query);
        
         set_the_message("User is contacted");
        redirect_user("admin_contact.php");
    }else{
        redirect_user("admin_contact.php"); 
    }









?>

