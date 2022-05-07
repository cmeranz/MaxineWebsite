<?php 
    require ('connection.inc.php');
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
        <title></title>
        <link rel = "stylesheet" href="css/proudct_nav.css">
    </head>
    <body>
        <div class="navitems">
            <?php
            fetch_categories();
            
            ?>
            
      
        </div>
    </body>
</html>
