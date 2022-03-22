<?php 

   require '../helpers/DBConnection.php';
   require '../helpers/functions.php';

  $id = $_GET['id'];
   
  $status = DBRemove('trip',$id); 


  if($status){
      $message = ["Message" => "Raw Removed"]; 
  }else{
    $message = ["Message" => "Error Try Again"]; 
  }

  $_SESSION['Message'] = $message; 

  header("Location: index.php");
?>