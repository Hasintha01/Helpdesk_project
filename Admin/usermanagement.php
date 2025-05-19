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
    <link rel="stylesheet" href="user management.css">
    <link rel="stylesheet" href="./headerandfooter.css">
    <title>User Management</title>
    <link rel="icon" href="help-desk01.png" type="image/x-icon">

</head>
<body>
    <!--Staring of header-->
    <header id="header1">
        <div id="logo"><img src="./weblogo.png" alt="website_logo"></div>
        <div id="heading">HELP DESK</div>
        <div id="profile-button" onClick="toggleMenu()">
            <div class="icon">
                <i class="fas fa-user"></i> <!-- User profile icon from Font Awesome -->
            </div>
        </div>

        <div class="menu" id="submenu">
            <a href="profilepage.php">User Profile</a>
            <hr>
            <a href="../login_and_register/logout.php">Logout</a>
        </div>

        <div id="navigation">
            <a href="./admin.php">Home</a>
            <a href="./admin-announcement.php">Announcement</a>
            <a href="./escalatedtickets.php">Ticket Management</a>
            <div class="search_bar">
                <input type="search" placeholder="Search...">
                <i class="fas fa-search"></i>
            </div>
        </div>
    </header>
    <!--End of header-->

    <!-- End of header -->

    <!-- Start of body -->
    <div class="search-member-area">
        <label for="search">Search</label>
        <input type="text" placeholder="eg: IT23570344" id="search-member">
    </div>

    <!-- Add Member Button -->
    <button class="open-popup-btn" id="addMemberBtn">Add Member</button>

    <hr>

    <!-- Popup Overlay -->
    <div class="popup-overlay" id="popupOverlay"></div>

    <!-- Popup Form -->
    <div class="popup-form" id="popupForm">
        <h2>Enter User Details</h2>
        <form action="insert.inc.php" method="POST">

            <label for="id">ID No: </label>
            <input type="text" name="userId" id="id" pattern="^(IT|AC|NA)[0-9]{8}$" placeholder="Enter ITxxxxxxxx/ACxxxxxxxx/NAxxxxxxxx"  required><br><br>
            
            <label for="name">First Name: </label>
            <input type="text" name="fName" id="name" pattern="[A-Za-z\s]{3,50}" placeholder="Enter First Name" required><br><br>

            <label for="name">Last Name: </label>
            <input type="text" name="lName" id="name" pattern="[A-Za-z\s]{3,50}" placeholder="Enter last Name"><br><br>

            <label for="email">Email: </label>
            <input type="email" id="email" name="email" placeholder="Enter Last Name" required><br><br>
            
            <label for="phone">Phone Number: </label>
            <input type="tel" name="contactNo" id="phone" placeholder="Enter Contact No" required><br><br>

            <label for="role">Role</label>
            <select name="role" id="role">  
                <option value="student">Student</option>
                <option value="accademic">Academic Staff</option>
                <option value="non-accademic">Non-Academic Staff</option>
            </select><br><br>
    
            <label for="password">Password: </label>
            <input type="password" name="password" id="password" placeholder="Enter Password" required><br><br>
    
            <label for="gender">Gender: </label><br>
            <input type="radio" name="gender" id="male" value="male">
            <label for="male">Male</label>
            <input type="radio" name="gender" id="female" value="female">
            <label for="female">Female</label>
            <input type="radio" name="gender" id="other" value="other">
            <label for="other">Other</label><br><br>
    
            <label for="dob">Date of birth</label>
            <input type="date" name="dob" id="dob" required><br><br>

            <input type="submit" value="submit" id="submit">
            <button type="button" id="closePopupBtn">close</button>

        </form>
    </div>
    
    <!-- Main User Table -->
    <div class="collection-main">
        <div class="table-wrapper"> <!-- Wrapper div for the table -->
            <table >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First_Name</th>
                        <th>Last_Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Contact_No</th>
                        <th>Role</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "display.inc.php";
                    ?>
                </tbody>
                
            </table>
        </div>
    </div>
    <script src="user management.js"></script>

    <!-- End of body -->

    <!-- Starting of footer -->
    <footer>
        <div class="description">
            Copyright © 2024 Website, All rights reserved.
        </div>
        <div class="footer-link">
            <a href="#">About Us</a> | <a href="../HELPDESK/contact_us.php">Contact Us</a>
        </div>
    </footer>
    <!-- End of footer -->

    <script>
        let submenu = document.getElementById("submenu");

        function toggleMenu()
        {
            submenu.classList.toggle("open-menu");
        }
    </script>

</body>
</html>
