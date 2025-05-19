<?php
//Include db connection
require_once './announcement-connection.php';

//check the delete id parameter exist in the URL
if (isset($_GET['delete_id'])){

    $deleteID = $_GET['delete_id'];
    $sql = "DELETE FROM announcement WHERE announcementId = '$deleteID'";

    if ($conn->query($sql) === TRUE){
        echo "<script>window.location.href='admin-announcement.php';</script>";
    } else {
        echo "Announcement deleted Failed";
    }

} else {
    echo "Delete id parameter is not found";
}

?>