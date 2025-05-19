<?php

//data base connection 
require_once "connection.php";

//check the delete_ticketId parameter exists in the url
if(isset($_GET['delete_ticketId']))
{
    $delete_ticketId = $_GET['delete_ticketId'];

    $sql = "DELETE FROM ticket WHERE ticketId = '$delete_ticketId'";
    if($conn->query($sql) === TRUE)
    {
        echo "<script> window.location.href = 'mytickets.php';</script>";
    }
    else
    {
        echo "The ticket delete attempt was failed";
    }

}
else
{
    echo "Delete ticketId Parameter NOT Found";
}

$conn->close();

?>