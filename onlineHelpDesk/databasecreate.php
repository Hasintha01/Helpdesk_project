<?php

//connection file
require_once "connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST" )
{
    $registrationId = $_POST["registrationId"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contactNumber = $_POST["contactNumber"];
    $subject = $_POST["subject"];
    $message = $conn->real_escape_string($_POST["message"]);

     // Handle file upload
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
        // Read file content and MIME type
        $fileContent = addslashes(file_get_contents($_FILES['attachment']['tmp_name']));
        $fileType = $_FILES['attachment']['type']; // Get MIME type of the file
    }

    //insert data into database
    $sql = "INSERT INTO ticket (registrationId,name,email,contactNumber,subject,message,attachment,mimeType) 
            VALUES ('$registrationId','$name','$email','$contactNumber','$subject','$message','$fileContent', '$fileType')";

    //check if insert were successful
    if($conn->query($sql) === TRUE )
    {
        echo "<script>window.location.href='mytickets.php';</script>";
    }
    else
    {
        echo "error ">$sql."<br>".$conn->error;
    }
    
}

$conn->close();

?>