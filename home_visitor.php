<?php 
require 'header_visitor.php';
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
        <title>Maxine: Home</title>
        <link rel="shortcut icon" href="images/logo.png">
        <link rel = "stylesheet" href="css/home.css"> 
        
    </head>
    <body>
        <div class="row1">
            <div class="col-2">
                <h1>Give Your Wardrobe<br>A Change!</h1> 
                <p>Style is the way to say who you are without having to speak.</p>
                <a href="shop_visitor.php" class="btn">Explore Now &#10140;</a>
            </div>
            <div class="col-3">
                <img src="images/homepage/h1.png" alt="girl in dress">
            </div>
        </div>
      </div>
       
        
        <div class="categories">
            
            <h1>Your Style</h1><br>
            
            <p>
                Here at Maxine, we believe that one's style is a way that a person expresses himself. <br><br>
                "What you wear is how you present yourself to the world, especially today, when human contacts are so quick. Fashion is instant language."<br> —Miuccia Prada<br><br>
                Since clothing and the sense of style is an element of self-expression, why not choose to express yourself from our broad range and style of clothing lines? We are sure you will find what you want! For years, Maxine has been a popular choice for the Malaysian women and our fashion has also been displayed in fashion shows. Not only has Maxine won many competitions and prizes, we have also managed to expand our business to the neighbouring countries like Thailand, Indonesia, Singapore and Brunei. In the future, the company aspires to be the No.1 choice of the women around the world when it comes to fashion.<br><br>
            </p>
            <div class="slideshow">
                <img class="slides" src="images/homepage/slide1.jpg" style="width:100%; height: 600px">
                <img class="slides" src="images/homepage/slide2.jpg" style="width:100%; height: 600px">
                <img class="slides" src="images/homepage/slide3.jpg" style="width:100%; height: 600px">
                <img class="slides" src="images/homepage/slide4.jpg" style="width:100%; height: 600px">
            </div>
                
            <script>
            
            var index = 0;
            image_slideshow();

            function image_slideshow() {
              var a;
              var b = document.getElementsByClassName("slides");
              for (a = 0; a < b.length; a++) {
                b[a].style.display = "none";
              }
              index++;
              if (index > b.length) {index = 1}
              b[index-1].style.display = "block";
              setTimeout(image_slideshow, 4000);
            }
            </script> 
            </div>
        
        <div class="offer">
            <div class="row">
            <div class="col-2-1">
                <img src="images/homepage/h2.png" alt="Model in Leather Jacket" class="offerimg">
            </div>
            <div class="col-2-1">
     
                <h1>Explore your style</h1>
                <small>Rockstar Leather Jacket was unveiled on the dramatic AW20 runway, which fused structured tailoring with fluid dresses. It’s expertly crafted in Italy from smooth leather to a fitted silhouette with figure-framing peak lapels and double stitching around the shoulder and arm seams. Fasten the single-breasted button to highlight the back peplum-hem panel. Explore our collections to express yourself.</small><br>
                <a href="shop_visitor.php" class="btn">Explore Now &#10140;</a>
            </div>
        </div>
        </div>
        
    </body>
<?php
        require 'footer_visitor.php';
        ?>
</html>
