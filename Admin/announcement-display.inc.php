<?php
//insert DB Connection
require_once 'announcement-connection.php';

//Retrieve data from the database
$sql = "SELECT * FROM announcement";
$result = $conn->query($sql);

if ($result->num_rows > 0){
    while ($row = $result -> fetch_assoc()){
        echo "<ul>";
        echo "<li><h3>Announcement: " . $row["topic"] . "</h3>" .
            "Date: " . $row["date"] . "<br>" .
            "Description: " . $row["details"] . 
            "<div style='float: right;'>" .
            "<button class='edit-button' style='background-color: #4CAF50; color: white; padding: 5px 15px ; border: none; border-radius: 4px; cursor: pointer; margin-right: 10px;' onClick=\"redirectToUpdateForm('".$row['announcementId']."')\">Edit</button>" . 
            "<button class='delete-button' style='background-color: #f44336; color: white; padding: 5px 15px; border: none; border-radius: 4px; cursor: pointer;' onClick=\"confirmDelete('announcement-delete.php?delete_id=" . $row['announcementId'] . "')\">Delete</button>" .
            "</div></li>";
        echo "</ul>";
    }
} else {
    echo "No data available";
}

echo "<script>
function confirmDelete(url) {
    if (confirm('Are you sure you want to delete this ticket?')) {
        window.location.href = url;  // Redirect to delete page only if confirmed
    }
}
</script>";

echo "<script src=\"admin-announcement.js\"></script>";

$conn->close();

?>