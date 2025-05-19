<?php
$servername = 'localhost';
$db   = 'onlinehelpdesk';
$username = 'root'; 
$pass = ''; 
$port = "3306";

try {
    $pdo = new PDO("mysql:servername=$servername;dbname=$db;port=$port", $username, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
