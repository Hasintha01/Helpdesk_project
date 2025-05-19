<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="announcement.css">
</head>
<body>
    
</body>
</html>

<?php
//insert DB Connection
require_once 'connection.php';

//Retrieve data from the database
$sql = "SELECT * FROM announcement";
$result = $conn->query($sql);

if ($result->num_rows > 0){
    while ($row = $result -> fetch_assoc()){
        echo "<div class='contentbox' onClick=\"showDetails('".$row["topic"]."', '".$row["details"]."','".$row["adminId"]."')\">";
        echo "<div class='titlebox'>".$row["topic"]."</div>";
        echo "</div>";

    }
} else {
    echo "No data available";
}
    

$conn->close();

?>