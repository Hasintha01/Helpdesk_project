<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "onlinehelpdesk";
$port = "3308";

//create connection
$conn = new mysqli ($servername , $username , $password , $database);

//check connection
/*
if( $conn -> connect_error)
{
    die("Connection failed".$conn->connect_error);
}
else
{
    echo "connection succeeded";
}
*/

?>