<?php 
session_start();

if (isset($_SESSION['userData'])) {
  session_destroy();
  if ($_SESSION['userData']['type'] == 'admin') {
    header("location:./index.php");
  }else{
    header("location:./index.php");   
  }
}
 ?>
