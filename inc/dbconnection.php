<?php
$connection = mysqli_connect("localhost", "root", '', "kamhandb");
// $connection = mysqli_connect("localhost", "kamhan_usr", 'hM9v$h281', "kamhandb"); live

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
return $connection;
mysqli_close($connection);
?>