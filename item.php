<?php
    require 'header.php';?><?php
    //require ('connection.inc.php');
    require ('functions.inc.php');
    
    //session_start();
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
         <title>Maxine: Shop</title>
        <link rel="shortcut icon" href="images/logo.png">
        <link rel = "stylesheet" href="css/item.css"> 
        <link rel = "stylesheet" href="css/proudct_nav.css">
    </head>
    <body>
        <div class="sidenav">
            <?php fetch_categories(); ?> 
            
            
        </div>
        <div class="itemcontainer">
        <div class="container1-1-1">
            <?php fetch_item(); ?>
           
           
                      
        </div>
          
            </div>
        
        
      
        
        
        
    </body>
    <?php
        require 'footer.php';
        ?>
</html>
