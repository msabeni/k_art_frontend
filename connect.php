<?php
//establishing connection with database.

$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'k_art';

// initiate connection
$connection = mysqli_connect($host,$user,$pass,$db_name);

//check if the connection failed
if (!$connection){
    die ("<script>alert('Connection failed.')</script>");
}
