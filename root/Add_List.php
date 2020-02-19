<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'todolist';

$dsn = 'mysql:host='. $host . ';dbname='. $dbname;

$pdo = new PDO($dsn, $user, $password);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ echo $row['name'] .
    "<br />"; }

?> 