<?php 

require 'header.php';
//require ('connection.inc.php');
 require ('functions.inc.php');
 $user_email=$_SESSION['users_user_email'];


if(isset($_POST["submit_order"])){
   
        $date = date('Y-m-d');
        $sql_l = query("INSERT INTO cust_orders (cust_name,cust_email,mobile_num,address,amount, date) values ('".$_POST["cust_name"]."' ,'$user_email','".$_POST["cust_mobile"]."' ,'".$_POST["cust_address"]."','". $_SESSION['total_item'] ."','$date')");
        confirm($sql_l);

        $sql = query("SELECT cust_order_id FROM cust_orders ORDER BY cust_order_id DESC LIMIT 1");
    confirm($sql);
    
   
     
    
     while ($row = fetch_the_array($sql)){
         
     $value = $row['cust_order_id'];
    
      } 
       $value2= $value;
        $sql1 = query("INSERT INTO order_info (order_item_name, quantity, order_size, order_price, customer_email, cust_order_id) SELECT item_name, quantity, size, price_subtotal, cust_email, cust_order_id FROM cust_cart,cust_orders WHERE email='". $_SESSION['users_user_email'] ."' AND cust_order_id='$value2'");
     confirm($sql1);

               
          $sql2 = query("DELETE FROM cust_cart where email = '$user_email'");
          confirm($sql2);
 
          
          redirect_user("thank_you.php");
          

}   
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Maxine: Account</title>
         <link rel="shortcut icon" href="images/logo.png">
         <style>
             form {
  border: 3px solid #f1f1f1;
  background-color: white;
}

.confirmtheorder{
     padding: 8px 8px 8px 8px;
    width: 50%;
    margin: auto;
}
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}


button {
  
  color: white;
  padding: 13px 20px;
  margin: 7px 0;
  background-color: #04AA6D;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.7;
}



.confirm {
  text-align: center;
  margin: 24px 0 13px 0;
}

.container11{
  text-align: center;
  padding: 30px;
}
.container2 {
  padding: 30px;
}
.container1 button {
    display: block;
     margin: 24px 0 13px 0;
    
}
 input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  background: white;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
         </style>
            
    </head>
    <body>
        <div class="confirmtheorder">
            <form style="border:1px solid #ccc" method="POST">
             
                <div class="container2">
                    <div class="confirm"> 
                        <h2>Confirm Your Order</h2>
                        <p>Please fill in this form to order from us.</p>
                          </div>

                          <div>
                          <label for="cust_name"><b>Name:</b></label>

                          <input type="text" placeholder="Enter name" name="cust_name" required><br>

                          <label for="cust_mobile"><b>Mobile Number</b></label>

                          <input type="text" placeholder="Enter mobile number" name="cust_mobile" required><br>

                          <label for="cust_address"><b>Shipping address</b></label><br>
                          <textarea placeholder="Enter the address" name="cust_address" cols="67" rows="10" required></textarea><br><br>
                           
                          <h4>Note: Payments are done by cash on delivery.</h4><br>
                       </div>
                    <div class="signupclass">
                       
                        <input type="submit" name="submit_order" class="submit_order"  value="Place Order" style="
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
">
                        </div>
                </div>
     
              </form>
        </div>
        
    </body>
</html>