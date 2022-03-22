<?php
if(!isset($_SESSION['admin']['id'])){
    header('Location: loginAdmin.php');
    exit();
}

?>