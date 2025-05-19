<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlinehelpdesk";
$port = "3308";
//creating connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check the connection
/*if ($conn -> connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "Connection succeeded";
}
*/

?>
