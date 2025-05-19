<?php

// Include connection PHP file
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST["userId"];
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $contactNo = $_POST["contactNo"];
    $role = $_POST["role"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];

    // Check email
    // $checkQuery = "SELECT * FROM user_details ";
    $checkQuery = "SELECT * FROM user WHERE email = '$email'";

    $result = $conn->query($checkQuery);

    if ($result && $result->num_rows > 0) {    
        // Email already exists
        echo "<script>
                alert('The email address is already registered. Please use a different email address');
                window.location.href = './usermanagement.php';
              </script>";
    } else {
        {
            // Check if the userId already exists
            $checkUserIdQuery = "SELECT * FROM user WHERE userId = '$userId'";
            $userIdResult = $conn->query($checkUserIdQuery);
        
            if ($userIdResult && $userIdResult->num_rows > 0) {
                echo "<script>
                        alert('The user ID is already registered. Please use a different user ID.');
                        window.location.href = './usermanagement.php';
                      </script>";
            } else {
                // Insert data into the table
                $sql = "INSERT INTO user(userId, fName, lName, email, password, contactNo, role, gender, dob) 
                VALUES ('$userId', '$fName','$lName', '$email', '$password', '$contactNo', '$role', '$gender', '$dob')";

                // Check if the insert was successful
                if ($conn->query($sql) === TRUE) {
                    echo "<script>
                            alert('Data Added Successfully');
                            window.location.href = 'usermanagement.php';
                        </script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
        
    }
}

$conn->close();
?>
