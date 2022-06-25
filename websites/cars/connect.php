<?php
//connect to the database
$server = 'mysql';
$username = 'student';
$password = 'student';
$schema = 'cars';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server , $username , $password);
?>


