<?php
// Include database connection file
@include "connection.php";

// Start the session
session_start();

if (!isset($_SESSION['user_registration']) && !isset($_SESSION['admin_registration'])) {
    header('location:../login_and_register/login_form.php');
    exit();
}

// Identify the user based on the session variable set during login
$registrationNo = isset($_SESSION['user_registration']) ? $_SESSION['user_registration'] : $_SESSION['admin_registration'];

// Query to get user details from the database based on userId (assuming registrationNo is equivalent to userId)
$select_user = "SELECT * FROM user WHERE userId = '$registrationNo'";

$result = mysqli_query($conn, $select_user);

// Check if user data is found
if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    echo "User not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="icon" href="help-desk01.png" type="image/x-icon">
    <link rel="stylesheet" href="profilepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Architects Daughter' rel='stylesheet'>
    <link rel="stylesheet" href="headerandfooter.css">
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
            <a href="announcement.html">Announcement</a>
            <a href="http://localhost/IWT_project/onlineHelpDesk/form.php">Contact Help Desk</a>
            <div class="search_bar">
                <input type="search" placeholder="Search...">
                <i class="fas fa-search"></i>
            </div>
        </div>
    </header>
 <!--End of header-->

 <h2>User Profile</h2>
    <div class="profile-container">
        <div class="picture">

        </div>

        <div class="pic-details">

        <form class="profile-form" method="post" action="profilepageupdate.php">
            <label for="userId">User ID:</label>
            <input type="text" name="userId" value="<?php echo $user['userId']; ?>" disabled>

            <label for="fName">First Name:</label>
            <input type="text" name="fName" value="<?php echo $user['fName']; ?>">

            <label for="lName">Last Name:</label>
            <input type="text" name="lName" value="<?php echo $user['lName']; ?>">

            <label for="email">Email:</label>
            <input type="text" name="email" value="<?php echo $user['email']; ?>" disabled>

            <label for="contactNo">Contact Number:</label>
            <input type="text" name="contactNo" value="<?php echo $user['contactNo']; ?>">

            <label for="role">Role:</label>
            <input type="text" name="role" value="<?php echo $user['role']; ?>" >

            <label for="gender">Gender:</label>
            <input type="text" name="gender" value="<?php echo $user['gender']; ?>">

            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" value="<?php echo $user['dob']; ?>" >

            <div class="button">
                 <input type="submit" value="update">
            </div>
        </form>

        </div>

    </div>

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
    let submenu = document.getElementById("submenu");

    function toggleMenu()
    {
        submenu.classList.toggle("open-menu");
    }
</script>

</body>
</html>
