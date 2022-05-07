<?php 
require ('header_visitor.php');
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
        <title>Maxine: Contact Us</title>
        <link rel="shortcut icon" href="images/logo.png">
        <link rel = "stylesheet" href="css/contact_us.css"> 
    </head>
    <body>
        <div class="midsection">
            <div class="contactus">
                <h1>Contact Us</h1><br>
            <p>Have queries? Feel free to contact us. We would be more than happy to be connecting with potential business partners and also customers.</p><br>
            <p>Do note that we respond to queries only during working hours. Therefore, you may contact us during the working hours as such:</p>
            <p>Monday - Friday : 9.30am to 6.00pm</p>
            </div>
            <div class="container-3">
           <div class="container-1">
               <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d127480.81361649882!2d101.712461!3d3.1538310000000003!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe1b11070284accdd!2sRegus%20-%20Kuala%20Lumpur%2C%20Menara%20Darussalam!5e0!3m2!1sen!2smy!4v1621421806509!5m2!1sen!2smy" width="600" height="450" style="border:7;" allowfullscreen="" loading="lazy" alt="Google Map"></iframe>
            
        </div>
            <div class="container-2">
                <h3>Location</h3>
                <p>Level 15, Menara Darussalam, 12, Jalan Pinang, Kuala Lumpur, 50450 Kuala Lumpur, Federal Territory of Kuala Lumpur, Malaysia</p><br>
                <h3>Contact Number</h3>
                <p>03-90827351</p>
                <h4>OR</h4>
                <p>Chat with our customer service representative via SMS</p>
                <img src="images/contactus/qrcode.png" alt="QR Code">
                
            </div>
            </div>
            <div class="contactform">
                <h1>Contact Us</h1>
                
                
               <?php
function function_alert($message) {
    if(isset($_POST['submit']))  
  
    echo "<script>alert('$message');</script>";
}

if(isset($_POST['submit'])){ 
    
$name= escape_value($_POST['name']);
$email= escape_value($_POST['email']);
$subject= escape_value($_POST['subject']);
$message= escape_value($_POST['message']);
$sql = query("INSERT INTO contact (name, email, subject, message) VALUES ('{$name}', '{$email}', '{$subject}', '{$message}')");
    
confirm($sql); 
}

function_alert("Thank You for contacting us. We will contact you within 24 hours.");

?>                
                <form class="form" id="contact-form" method="post">
                  <!--<form class="form" action="contactform.php" method="post"> --> 
                    
                    <input type="text" name="name" placeholder="Ful Name">
                    <input type="text" name="email" placeholder="E-mail">
                    <input type="text" name="subject" placeholder="Subject">
                    <textarea name="message" placeholder="Message"></textarea>
                    <button type="submit" name="submit">SEND MESSAGE</button>
                    
            </div>
            </div>
    </body>
    <?php
        require 'footer_visitor.php';
        ?>
</html>

