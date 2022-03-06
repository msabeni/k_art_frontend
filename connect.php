<?php
//establishing connection with database.
$conn = new mysqli('localhost','','') or die('Cannot connect to server');
$conn->select_db('k_art') or die ('Cannot found database');

?>

