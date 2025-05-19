<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="display.inc.css">
</head>
<body>
    
</body>
</html>
<?php
//insert db connection
require_once 'connection.php';

//Retrive data from the db
$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0){
    while ($row = $result -> fetch_assoc())
    {
        echo "<tr>";
        echo "<td>" . $row["userId"] . "</td>";
        echo "<td>" . $row["fName"] . "</td>";
        echo "<td>" . $row["lName"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "<td>". $row["contactNo"] . "</td>";
        echo "<td>" . $row["role"] . "</td>";
        echo "<td>" . $row["gender"] . "</td>";
        echo "<td>" . $row["dob"] . "</td>";
        echo "<td>";
        echo "<button class='edit-button' onClick=\"redirectToUpdateForm('".$row['userId']."')\">Edit</button>";   
        echo "<button class='delete-button' onClick=\"confirmDelete('delete.php?delete_id=" . $row['userId'] . "')\">Delete</button>";
        echo "</td>";
        echo "</td>";
        echo "</tr>";

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

$conn -> close();

?> 