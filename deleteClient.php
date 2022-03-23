<?php 
require 'Admin/helpers/DBConnection.php';
require 'Admin/helpers/functions.php';

$id = $_GET['id'];

$status = DBRemove('client',$id);


if($status){
$message = ["Message" => "Raw Removed"];
}else{
$message = ["Message" => "Error Try Again"];
}

$_SESSION['Message'] = $message;

header("Location: index.php");

header("Location: indexClient.php");




?>