<?php

$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "onlinehelpdesk";
$port = "3308";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check the connection
// if ($conn->connect_errno){
//     die("connection Failed:".$conn->connect_errno);
// }
// else{
//     echo"connection succeeded";
// }
?>