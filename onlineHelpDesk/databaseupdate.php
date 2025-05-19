<?php

@include '../login_and_register/makeconnection.php';

session_start();

if (!isset($_SESSION['user_registration']) && !isset($_SESSION['admin_registration'])) {
    header('location:../login_and_register/login_form.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Architects Daughter' rel='stylesheet'>
    <link rel="stylesheet" href="databaseupdate.css">
    <link rel="stylesheet" href="headerandfooter.css">
    <title>Support Desk</title>
    <link rel="icon" href="help-desk01.png" type="image/x-icon">
</head>
<body>

    <!--Staring of header-->
    <header id="header1">
        <div id="logo"><img src="weblogo.png" alt="website_logo"></div>
        <div id="heading">HELP DESK</div>
        <div id="profile-button" onClick="toggleMenu()">
            <div class="icon">
                <i class="fas fa-user"></i> <!-- User profile icon from Font Awesome -->
            </div>
        </div>

        <div class="menu" id="submenu">
            
             <?php
                if (isset($_SESSION['user_registration'])) {
                    $registrationNo = $_SESSION['user_registration'];
                    echo "<a href='profilepage.php?registrationNo=$registrationNo'>User Profile</a>";
                } else {
                    echo "<a href='#'>User Profile</a>"; // Default link if the session is not set
                }
            ?>

            <hr>
            <a href="../login_and_register/logout.php">Logout</a>
        </div>

        <div id="navigation">
            <a href="home.php">Home</a>
            <a href="announcement.php">Announcement</a>
            <a href="http://localhost/IWT-GITHUB/onlineHelpDesk/form.php">Contact Help Desk</a>
            <div class="search_bar">
                <input type="search" placeholder="Search...">
                <i class="fas fa-search"></i>
            </div>
        </div>
    </header>
<!--End of header-->

<?php

// Database connection
require_once "connection.php";

if (isset($_GET['ticketId'])) {
    $ticketId = $_GET['ticketId']; // Get the ticket ID from the URL

    // Display the received details
    $sql = "SELECT * FROM ticket WHERE ticketId = ?";
    
    // Prepare the SQL statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the ticketId parameter to the query
        $stmt->bind_param("s", $ticketId);
        
        // Execute the query
        $stmt->execute();
        
        // Get the result
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $registrationId = $row["registrationId"];
            $name = $row["name"];
            $email = $row["email"];
            $contactNumber = $row["contactNumber"];
            $subject = $row["subject"];
            $message = $row["message"];

            //form
            echo '<form action="databaseupdateafter.php" method="post" onsubmit="return confirmUpdate();">
            <fieldset>
                <legend>Update Ticket Details</legend>

                <!--Hidden input for to pass the ticketId-->
                <input type="hidden" name="ticketId" value="' . $ticketId . '">

                <div class="form-row">
                    <div>
                        <label for="name">Name</label>
                        <input type="text" id="name" placeholder="Eg. bawantha jayanath" name="name" value="' . $name . '" required>
                    </div>
                    <div>
                        <label for="registration_number">Registration Number</label>
                        <input type="text" id="registration_number" placeholder="Eg. IT23568..." name="registrationId" value="' . $registrationId . '" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div>
                        <label for="email">Email</label>
                        <input type="email" id="email" placeholder="Eg. IT23568...@my.sliit.lk" name="email" value="' . $email. '" readonly>
                    </div>
                    <div>
                        <label for="contact_number">Contact Number</label>
                        <input type="tel" id="contact_number" placeholder="Eg. 0763368848" name="contactNumber" value="' . $contactNumber. '" required>
                    </div>
                </div>

                <label for="subject">Subject</label>
                <input type="text" id="subject" class="full-width" name="subject" value="' . $subject . '">

                <label for="message">Message</label>
                <textarea id="message" class="full-width" rows="8" name="message">' . $message . '</textarea>

                <div class="form-buttons">
                    <input type="reset" value="Reset" class="formbutton">
                    <button type="submit" class="formbutton">
                        Update <i class="fa-solid fa-paper-plane"></i> 
                    </button> 
                </div>
            </fieldset>
        </form>';
        } else {
            echo "No record available.";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing the SQL query.";
    }
} else {
    echo "Ticket ID parameter missing!";
}

$conn->close();
?>


 <!--Starting of footer-->
 <footer>
        <div class="description">
            Copyright @ 2024 Website,All rights
        </div>
        <div class="footer-link">
            <a href="#">About Us </a>|
            <a href="../Agent/contact_us.php">Contact Us</a>
        </div>
    </footer>
<!--End of footer-->

<script>
    function confirmUpdate() {
    
    alert("Ticket Updated successfully!");
    return true;
    }
</script>

<script>
    let submenu = document.getElementById("submenu");

    function toggleMenu()
    {
        submenu.classList.toggle("open-menu");
    }
</script>
    
</body>
</html>