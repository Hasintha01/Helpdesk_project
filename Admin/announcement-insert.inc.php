<?php
//Include connection php file
require_once "announcement-connection.php";

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $announcementId = $_POST ["announcementId"];
    $announcementTitle = $_POST ["announcementTitle"];
    $announcementDesc = $_POST ["announcementDesc"];
    $announcementDate = $_POST ["announcementDate"];
    $adminId = $_POST ["adminId"];

    $checkQuery = "SELECT * FROM announcement WHERE announcementId = '$announcementId'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0){
        echo "<script>alert ('This announcement ID is already used. Please use another announcement ID.')</script>";
        echo "<script>window.location.href='admin-announcement.php'</script>";
    } else {
        //Insert data into database
        $sql = "INSERT INTO announcement (announcementId, topic, details, date, adminId)
        VALUES ('$announcementId', '$announcementTitle', '$announcementDesc', '$announcementDate', '$adminId')";

        //Check if the insert was successful
        if ($conn->query($sql) === TRUE){
            echo "<script>alert('Announcement Added Successfully')</script>";
            echo "<script>window.location.href='admin-announcement.php'</script>";
        } else {
            echo "Error: ". $sql . "<br>" . $conn->error;
        }
    }
}

//close the connection
$conn->close();

?>