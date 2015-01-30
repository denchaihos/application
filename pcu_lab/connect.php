<?php
 
// prepare database connection variables

$dsn = 'mysql:host=localhost;dbname=hi';
$username = 'root';
$password = '123456';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
$dbh = new PDO($dsn, $username, $password, $options);
//echo "Connected to database";
 
?>