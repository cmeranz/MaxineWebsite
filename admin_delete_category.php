<?php 

 require ('connection.inc.php');
  require ('functions.inc.php');
   
    
    if(isset($_GET['id'])){
        $query= query("DELETE FROM product_categories WHERE id = ". escape_value($_GET['id']). "");
        confirm($query);
        
        set_the_message("Category is deleted");
        redirect_user("admin_categories.php");
    }else{
        redirect_user("admin_categories.php"); 
    }
?>
