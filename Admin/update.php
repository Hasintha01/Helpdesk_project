<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./update.css">
</head>
<body>
    
</body>
</html>

<?php

// db connection
require_once 'connection.php';

if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];
    
    // Retrieve the records with the given ID
    $sql = "SELECT * FROM user WHERE userId = '$userId'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userId = $row['userId'];
        $fName = $row['fName'];
        $lName = $row['lName'];
        $email = $row['email'];
        $contactNo = $row['contactNo'];
        $role = ($row['role']);
        $password = $row['password'];
        $gender = $row['gender'];
        $dob = $row['dob'];

        // Display the update form
        echo "<form action='./update.inc.php' method='POST' onsubmit=\"return confirmSubmission();\">";

        echo "<label for='id'>ID No: </label>";
        echo "<input type='text' name='userId' 'id' value='".$userId."' pattern='^(IT|AC|NA)[0-9]{8}$' required readonly><br><br>";

        echo "<label for='name'>First Name: </label>";
        echo "<input type='text' name='fName' id='name' value='".$fName."' pattern='[A-Za-z\s]{3,50}' required><br><br>";

        echo "<label for='name'>Last Name: </label>";
        echo "<input type='text' name='lName' id='name' value='".$lName."' pattern='[A-Za-z\s]{3,50}' required><br><br>";

        echo "<label for='email'>Email: </label>";
        echo "<input type='email' id='email' name='email' value='".$email."' required><br><br>";

        echo "<label for='role'>Role: </label>";
        echo "<select name='role' id='role'>
            <option value='student' " . ($role == 'student' ? 'selected' : '') . ">Student</option>
            <option value='academic' " . ($role == 'academic' ? 'selected' : '') . ">Academic Staff</option>
            <option value='non-academic' " . ($role == 'non-academic' ? 'selected' : '') . ">Non-Academic Staff</option>
        </select><br><br>";

        echo "<label for='password'>Password: </label>";
        echo "<input type='text' name='password' id='password' value='".$password."' required><br><br>";

        echo "<label for='phone'>Phone Number: </label>";
        echo "<input type='tel' name='contactNo' id='phone' value='".$contactNo."' required><br><br>";

        echo "<label for='gender'>Gender: </label><br>";
        echo "<input type='radio' name='gender' id='male' value='male' " . ($gender == 'male' ? 'checked' : '') . ">";
        echo "<label for='male'>Male</label>";
        echo "<input type='radio' name='gender' id='female' value='female' " . ($gender == 'female' ? 'checked' : '') . ">";
        echo "<label for='female'>Female</label>";
        echo "<input type='radio' name='gender' id='other' value='other' " . ($gender == 'other' ? 'checked' : '') . ">";
        echo "<label for='other'>Other</label><br><br>";

        echo "<label for='dob'>Date of birth: </label>";
        echo "<input type='date' name='dob' id='dob' value='".$dob."' required><br><br>";

        echo "<input type='submit' value='Update' id='submit'>";

        echo "</form>";
    } else {
        echo "No record available";
    } 
} else {
    echo "ID parameter is missing";
}

echo "<script>
    function confirmSubmission() {
        alert('Update submitted successfully!');
        return true;
    }
</script>";

$conn->close();

?>
