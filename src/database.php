<?php

$db = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'db_name' => 'griyasa_1',

);


$conn = mysqli_connect($db['hostname'], $db['username'], $db['password'], $db['db_name']);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}

//echo "Connection successfully";
?>