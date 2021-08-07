<?php
session_start();
$dbdHost ='localhost';
$dbName = 'mydb';
$dbUsername = 'root';
$dbPassword = '';
$dbc=mysqli_connect($dbdHost,$dbUsername,$dbPassword,$dbName);

?>