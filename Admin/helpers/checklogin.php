<?php
if(!isset($_SESSION['admin'])){
    header('Location: loginAdmin.php');
    exit();
}

?>