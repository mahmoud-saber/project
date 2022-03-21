<?php 

session_start();

 if(isset($_SESSION['user_client'] ) ){
    session_destroy();
    header("Location: client.php");
 }
 else{
    session_destroy();
    header("Location: driver.php");
  
 }



?>