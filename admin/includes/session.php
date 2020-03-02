<?php
session_start();
if($_SESSION['username']){
    
}else{
    header('Location:../index2.php');
}
?>