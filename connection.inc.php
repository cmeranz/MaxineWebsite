<?php

ob_start();
session_start();
defined("DATABASE_HOST") ? null : define("DATABASE_HOST", "localhost");
defined("DATABASE_USER") ? null : define("DATABASE_USER", "root");
defined("DATABASE_PASSWORD") ? null : define("DATABASE_PASSWORD","");
defined("DATABASE_NAME") ? null : define("DATABASE_NAME", "maxine");
defined("DIRECTORY_OF_UPLOADS") ? null : define("DIRECTORY_OF_UPLOADS",__DIR__ ."/images/image_uploads/");
$connection = mysqli_connect(DATABASE_HOST,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
//$connection = mysqli_connect("localhost","root","","maxine");

//if($connection){
//    echo 'is connected';
//} else {
//    echo 'not connected';
//}



?>


