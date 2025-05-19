<?php
//Include db connection
require_once './connection.php';

//Check the delete _id parameter exists in the URL
if (isset($_GET['delete_id'])){
    $deleteID = $_GET['delete_id'];

    $sql = "DELETE FROM user WHERE userId = '$deleteID'";
    
    if ($conn->query($sql) === TRUE){
        echo "<script> window.location.href = 'usermanagement.php';</script>";
    } else {
        echo "Account deleted Failed";
    }
} else {
    echo "delete id parameter not founded";
}

$conn->close();

?>