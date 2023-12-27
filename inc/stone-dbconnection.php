<?php
$connection = mysqli_connect("localhost", "root", "", "stonekamhan_db");
// $connection = mysqli_connect("localhost", "stonekamhan_user", "3cIb$46x5", "stonekamhan_db"); live

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
return $connection;
mysqli_close($connection);
?>