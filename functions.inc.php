<?php


function printr ($array) {
	echo '<pre>';
	print_r($array);
}

function printrx ($array) {
	echo '<pre>';
	print_r($array);
	die();
}

function imput_value_validation($connection, $input){
    return mysqli_real_escape_string($connection, $input);
}

function set_the_message($message){
    if(!empty($message)){
        $_SESSION['message'] = $message;
    } else {
        $message = "";
    }
}
function alert_popup($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
} 


function display_the_message() {
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

//returns sqli queries
function query($sql){
    global $connection;
    return mysqli_query($connection, $sql);
}

//redirects user
function redirect_user($location){
    return header("Location: $location");
}


function confirm($result){
    global $connection;
    if(!$result){
    //die ("QUERY FAILED", mysqli_error($connection);
    } 
}

function fetch_the_array($result){
    return mysqli_fetch_array($result);
}




function escape_value($string){
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}



// get the products //

function fetch_products(){
$query= query("SELECT * FROM products");
confirm($query);

//heredoc method//
while ($row = fetch_the_array($query)){
    $products = <<<SEQUENCE
       <div class="padding">
        <div class="card">
           
            <a href="item.php?id={$row ['id']}"><img src="images/image_uploads/{$row ['product_image']}" alt="Product image" style="width:100%;">
            <h1>{$row ['product_name']}</h1>
            <p class="price"> RM {$row ['product_price']}</p>
            <div class="product_desc">
            <p>{$row ['product_description']}</p></a></div>
                <div class="form_">
            <form action="" method="post">
            <label for="quantity"><b>Quantity</b></label>
            <input type="number" name="qty" value="1" min="1" max="10" padding="10px" required><br>
            <label for="size"><b>Product Size:</b></label>
            <select style="padding-left:70px;" name="size" id="size">
  <option value="XS">XS</option>
  <option value="S">S</option>
  <option value="M">M</option>
  <option value="L">L</option>
            <option value="XL">XL</option>
</select>
                  
            <input type="hidden" name="product_name" value="{$row ['product_name']}">
                    <input type="hidden" name="product_price" value="{$row ['product_price']}">
                    <input type="hidden" name="product_image" value="{$row ['product_image']}">
                   
   </div>
            <li><a href="item.php?id={$row ['id']}">More Information</a></li>
            <button type="submit_cart" name="submit_cart">Add to Cart</button>
            
           </form> 
       </div>  
        </div>   
SEQUENCE;
            
            
            echo $products;
} if (isset($_POST['submit_cart'])) {
  $connection = mysqli_connect("localhost","root","","maxine");
  $user_email=$_SESSION['users_user_email'];
  $product_name = escape_value($_POST['product_name']);
  $qty = escape_value($_POST['qty']);
  $size = escape_value($_POST['size']);
  $product_price = escape_value($_POST['product_price']);
  $product_image = escape_value($_POST['product_image']);
    
  $subtotal_item=$qty*$product_price;
$query = query("INSERT INTO cust_cart (email, item_name, quantity, size, price, price_subtotal, images) 
  			  VALUES('$user_email', '$product_name', '$qty','$size','$product_price', '$subtotal_item', '$product_image')");
  	confirm($query);
      redirect_user("cart_checkout.php");    
}

}





function fetch_categories(){
    $send_query= query("SELECT * FROM product_categories");
                    //$send_query= query(mysqli_query($connection, $query));
                    confirm($send_query);
                    
                    //if(!$send_query){
                        //die("QUERY FAILED", mysqli_error($connection));
                    //}
            
                    while($row= fetch_the_array($send_query)){
                    
                    $category_menu = <<<SEQUENCE
                      
            
                    <li><a href='category.php?id={$row['id']}'>{$row['category_name']}</a></li>
                    
SEQUENCE;
                    echo $category_menu;
}
}

function fetch_products_accr_category (){
    
    $query= query("SELECT * FROM products WHERE product_categories_id=".escape_value($_GET['id']) . "");
confirm($query);

//heredoc method//
while ($row = fetch_the_array($query)){
    $products = <<<SEQUENCE
            
            <div class="padding">
        <div class="card">
           
            <a href="item.php?id={$row ['id']}"><img src="images/image_uploads/{$row ['product_image']}" alt="Product image" style="width:100%;">
            <h1>{$row ['product_name']}</h1>
            <p class="price"> RM {$row ['product_price']}</p>
            <div class="product_desc">
            <p>{$row ['product_description']}</p></a></div>
                <div class="form_">
            <form action="" method="post">
            <label for="quantity"><b>Quantity</b></label>
                  <input type="number" name="qty" value="1" min="1" max="10" padding="10px" required><br>
             <label for="size"><b>Product Size:</b></label>
                   <select style="padding-left:70px;" name="size" id="size">
  <option value="XS">XS</option>
  <option value="S">S</option>
  <option value="M">M</option>
  <option value="L">L</option>
            <option value="XL">XL</option>
</select>
            <input type="hidden" name="product_name" value="{$row ['product_name']}">
                    <input type="hidden" name="product_price" value="{$row ['product_price']}">
                    <input type="hidden" name="product_image" value="{$row ['product_image']}">
            </div>
            <li><a href="item.php?id={$row ['id']}">More Information</a></li>
            <button type="submit_cart" name="submit_cart">Add to Cart</button>
           </form> 
       </div>  
        </div>    
         
SEQUENCE;
            
            echo $products;
}   if (isset($_POST['submit_cart'])) {
  $connection = mysqli_connect("localhost","root","","maxine");
  $user_email=$_SESSION['users_user_email'];
  $product_name = escape_value($_POST['product_name']);
  $qty = escape_value($_POST['qty']);
  $size = escape_value($_POST['size']);
  $product_price = escape_value($_POST['product_price']);
  $product_image = escape_value($_POST['product_image']);
    
  $subtotal_item=$qty*$product_price;
$query = query("INSERT INTO cust_cart (email, item_name, quantity, size, price, price_subtotal, images) 
  			  VALUES('$user_email', '$product_name', '$qty','$size','$product_price', '$subtotal_item', '$product_image')");
  	confirm($query);
      redirect_user("cart_checkout.php");   
}
}

function fetch_item(){
    $query= query("SELECT * FROM products WHERE id =". escape_value($_GET['id']) ." ");
            confirm($query);


            while ($row = fetch_the_array($query)):
    
 $products = <<<SEQUENCE
            
            
            <img src="images/image_uploads/{$row ['product_image']}" alt="Product image" style="width:100%">
            <h1><a href="#">{$row ['product_name']}</a></h1>
            <p class="price">RM {$row ['product_price']}</p>
            <p>{$row ['product_description']}</p><br>
            <p><small>{$row ['product_long_description']}</small></p>
            <form action="" method="post">
            <label for="quantity"><b>Quantity</b></label>
                 <input type="number" name="qty" value="1" min="1" max="10" padding="10px" required><br>
            <label for="size"><b>Product Size:</b></label>
                   <select style="padding-left:70px;" name="size" id="size">
  <option value="XS">XS</option>
  <option value="S">S</option>
  <option value="M">M</option>
  <option value="L">L</option>
            <option value="XL">XL</option>
</select><br><br>
            <input type="hidden" name="product_name" value="{$row ['product_name']}">
                    <input type="hidden" name="product_price" value="{$row ['product_price']}">
                    <input type="hidden" name="product_image" value="{$row ['product_image']}">
            
            
            <button type="submit_cart" name="submit_cart">Add to Cart</button>
           </form> 
           

SEQUENCE;
     
     echo $products;  
     if (isset($_POST['submit_cart'])) {
  $connection = mysqli_connect("localhost","root","","maxine");
  $user_email=$_SESSION['users_user_email'];
  $product_name = escape_value($_POST['product_name']);
  $qty = escape_value($_POST['qty']);
  $size = escape_value($_POST['size']);
  $product_price = escape_value($_POST['product_price']);
  $product_image = escape_value($_POST['product_image']);
    
  $subtotal_item=$qty*$product_price;
$query = query("INSERT INTO cust_cart (email, item_name, quantity, size, price, price_subtotal, images) 
  			  VALUES('$user_email', '$product_name', '$qty', '$size','$product_price', '$subtotal_item', '$product_image')");
  	confirm($query);
      redirect_user("cart_checkout.php");   
}
 endwhile;
}





















function fetch_admin_products(){
$query= query("SELECT * FROM products");
confirm($query);


//heredoc method//
while ($row = fetch_the_array($query)){
    $category_name= display_product_cat_name($row['product_categories_id']);
    $products = <<<SEQUENCE
       <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['product_name']}<br>
                        <img width="200px" src="images/image_uploads/{$row['product_image']}" alt="Product Image">
                  </td>
                  <td>{$category_name}</td>
                  <td>RM {$row['product_price']}</td>
                  <td>{$row['quantity']}</td>
                  <td><a style="text-decoration: none; color:blue;" href="admin_edit_product.php?id={$row['id']}">Edit</a>
                <a style="padding-left:20px;
    text-decoration: none; color:red;" href="admin_delete_product.php?id={$row['id']}">Delete</a></td>
   </tr>  
SEQUENCE;
            
            echo $products;
}
}

function display_product_cat_name($product_cat_id){
    
    $query = query("SELECT * FROM product_categories WHERE id='{$product_cat_id}' ");
    confirm($query);
    
    while($cat_row = fetch_the_array($query)){
        return $cat_row['category_name'];
    }
    
}


function fetch_categories_add_product(){
    $send_query= query("SELECT * FROM product_categories");
                    //$send_query= query(mysqli_query($connection, $query));
                    confirm($send_query);
                    
                    //if(!$send_query){
                        //die("QUERY FAILED", mysqli_error($connection));
                    //}
            
                    while($row= fetch_the_array($send_query)){
                    
                    $admin_category_options = <<<SEQUENCE
                      
             <option value="{$row['id']}">{$row['category_name']}</option>
                    
SEQUENCE;
                    echo $admin_category_options;
}
}





    



















function admin_display_categories(){
    
    $query = "SELECT * FROM product_categories";
    $category= query($query);
    confirm($category);
    
    while ($row = mysqli_fetch_array($category)){
        $category_id = $row['id'];
        $category_title = $row['category_name'];
        
        $categories = <<<SEQUENCE
                
                <tr>
                <td>{$category_id}</td>
                <td>{$category_title}</td>
                <td><a style="
    text-decoration: none; color:red;" href="admin_delete_category.php?id={$row['id']}">Delete</a></td>
                </tr>
SEQUENCE;
                echo $categories;
    }
    
} 



function fetch_customer_users(){
$query= query("SELECT * FROM users");
confirm($query);


//heredoc method//
while ($row = fetch_the_array($query)){
    
    $customers = <<<SEQUENCE
       <tr>
                    <td>{$row['user_id']}</td>
                    <td>{$row['username']}</td>
                  <td>{$row['user_email']}</td>
                  <td>{$row['mobile_number']}</td>
                  <td>{$row['address']}</td>
                  <td>{$row['password']}</td>
                  
                <td><a style="
    text-decoration: none; color:red;" href="admin_delete_customer.php?id={$row['user_id']}">Delete User</a></td>
    <td>  
SEQUENCE;
            
            echo $customers;
}
}

function fetch_contacts(){
$query= query("SELECT * FROM contact");
confirm($query);


//heredoc method//
while ($row = fetch_the_array($query)){
    
    $user_messages = <<<SEQUENCE
       <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['subject']}</td>
                  <td>{$row['message']}</td>
                
                  
                <td><a style="
    text-decoration: none; color:red;" href="admin_delete_contact.php?id={$row['id']}">Contacted</a></td>
   </tr>  
SEQUENCE;
            
            echo $user_messages;
           
}}

function fetch_admin_users(){
    
$query= query("SELECT * FROM administrator_users");
confirm($query);


//heredoc method//
while ($row = fetch_the_array($query)){
    
    $messages = <<<SEQUENCE
       <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['username']}</td>
                  <td>{$row['admin_email']}</td>
                   <td>{$row['admin_mobile']}</td>
                  <td>{$row['admin_address']}</td>
                  <td>{$row['admin_job_position']}</td>
                 
                
                  
                <td><a style="
    text-decoration: none; color:red;" href="admin_delete_admin_user.php?id={$row['id']}">Delete User</a></td>
   </tr>  
SEQUENCE;
            
            echo $messages;
}
}

























?>






















