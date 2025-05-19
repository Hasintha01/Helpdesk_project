<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./announcement-update.css">
</head>
<body>
    
</body>
</html>

<?php

//db connection
require_once 'announcement-connection.php';

if (isset($_GET['announcementId'])){
    $announcementId = $_GET['announcementId'];

    //Retrive the records with the given announcementId
    $sql = "SELECT * FROM announcement WHERE  announcementId = '$announcementId'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $announcementId = $row['announcementId'];
        $announcementTitle = $row['topic'];
        $announcementDesc = $row['details'];
        $announcementDate = $row['date'];
        $adminId = $row['adminId'];

        //Display the update form        
        echo '<form action="./announcement-update.inc.php" method="POST" onsubmit=\'return confirmSubmission();\'>';

        echo '<label for="announcementId">Announcement ID: </label>';
        echo '<input type="text" name="announcementId" id="announcementId" value="'. $announcementId .'"><br><br>';

        echo '<label for="announcementTitle">Title: </label>';
        echo '<input type="text" name="announcementTitle" value="'.$announcementTitle.'" id="announcementTitle"><br><br>';

        echo '<label for="announcementDesc">Description: </label>';
        echo '<textarea name="announcementDesc" id="announcementDesc">'. $announcementDesc .'</textarea><br><br>';

        echo '<label for="announcementDate">Date: </label>';
        echo '<input type="date" name="announcementDate" id="announcementDate" value="'. $announcementDate .'"><br><br>';

        echo '<label for="adminId">Admin ID: </label>';
        echo '<input type="text" name="adminId" id="adminId" value="'. $adminId .'" readonly><br><br>';

        echo '<button type="submit">Update</button>';
        echo '</form>';

    } else {
        echo "No record available";
    }
} else {
    echo "announcementId is missing";
}

echo "<script>
    function confirmSubmission() {
        alert('Update submitted successfully!');
        return true;
    }
</script>";

$conn->close();

?>