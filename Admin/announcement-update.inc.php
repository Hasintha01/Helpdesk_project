<?php
//Include db connection
require_once 'announcement-connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $announcementId = $_POST ["announcementId"];
    $announcementTitle = $_POST ["announcementTitle"];
    $announcementDesc = $_POST ["announcementDesc"];
    $announcementDate = $_POST ["announcementDate"];
    $adminId = $_POST ["adminId"];

    //update data in the database
    $sql = "UPDATE announcement SET announcementId = '$announcementId', topic = '$announcementTitle', 
    details = '$announcementDesc', date = '$announcementDate', adminId = '$adminId'
    WHERE announcementId = '$announcementId'";

    //Check if update was successful
    if ($conn->query($sql) === TRUE){
        // echo "<script>alert('Announcement Updated successfully')</script>";
        echo "<script>window.location.href='admin-announcement.php'</script>";
        exit();
    } else {
        echo "Update Failed : ". $conn->error;
    }
}
//Close connection
$conn->close();

?>