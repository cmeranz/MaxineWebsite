 <?php 

 require ('connection.inc.php');
 require ('functions.inc.php'); 


if(isset($_GET['id'])){
        $query= query("DELETE FROM cust_cart WHERE id = ". escape_value($_GET['id']). "");
        confirm($query);
       
        redirect_user("cart_checkout.php");
    }else{
        redirect_user("cart_checkout.php");
    }
    
?>