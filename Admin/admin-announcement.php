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
    <link rel="stylesheet" href="./admin-announcement.css">
    <link rel="stylesheet" href="./headerandfooter.css">
    <title>Admin-Announcement</title>
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
            <a href="./announcement.html">Announcement</a>
            <a href="./escalatedtickets.php">Ticket Management</a>
            <div class="search_bar">
                <input type="search" placeholder="Search...">
                <i class="fas fa-search"></i>
            </div>
        </div>
    </header>
    <!--End of header-->
    <!-- staring the body part -->

    <!-- add announcement button  -->
    <button class="open-popup-btn" id="addAnnouncementBtn">Add Announcement <i class='fas fa-plus'></i></button>

    <!-- popup overlay for announcement -->
    <div class="popup-overlay" id="announcementPopupOverlay"></div>

    <div class="popup-form" id="announcementPopupForm">
        <h2>Add New Announcement</h2>
        <form action="./announcement-insert.inc.php" method="POST">
            <label for="announcementId">Announcement ID: </label>
            <input type="text" name="announcementId"  id="announcementId" pattern="^A[0-9]+$" placeholder="Enter Announcement ID" required><br><br>

            <label for="announcementTitle">Title: </label>
            <input type="text" name="announcementTitle" id="announcementTitle" placeholder="Enter the Title" required><br><br>

            <label for="announcementDesc">Description: </label><br>
            <textarea name="announcementDesc" id="announcementDesc" placeholder="Enter Description" required></textarea><br><br>

            <label for="announcementDate">Date: </label>
            <input type="date" name="announcementDate" id="announcementDate" required><br><br>

            <label for="adminId">Admin ID: </label>
            <input type="text" name="adminId"  id="adminId" placeholder="Enter the Admin ID" value="<?php echo isset($_SESSION['admin_registration']) ? $_SESSION['admin_registration'] : ''; ?>" required readonly><br><br>
            
            <input type="submit" value="Submit" id="submitAnnouncementPopupBtn">
            <input type="button" value="Close" id="closeAnnouncementPopupBtn">
        </form>
    </div>

    <!-- end of add announcement button  -->

    <div class="main-box-one">
        <div class="new-events">

            <div class="topbar-one">
                <h4>New Events Alerts <i class='fas fa-comments'></i></h4>
            </div>

            <div class="bottombar-one">
                <ol>
                    <li><h5>Comedy Karaoke Night! </h5>Get ready to laugh out loud and sing your heart out at our Comedy Karaoke Night! Whether you're a pro singer or just want to have some fun, join us on Friday at the Student Center. Prizes for the funniest performances!</li>
                    <li><h5>Campus Scavenger Hunt Challenge! </h5>Think you know the campus like the back of your hand? Prove it in our Campus Scavenger Hunt! Gather your team and hunt for hilarious clues and quirky campus secrets. Winning team gets bragging rights and an exclusive pizza party!</li>
                    <li><h5>Professor Impersonation Contest! </h5>Think you can nail your professor's quirks? Join our Professor Impersonation Contest! The best impression gets free coffee for a week at the campus café. Time to show off those dramatic skills!</li>
                    <li><h5>Pajama Day Parade! </h5>Feeling lazy? Good! Next Monday is Pajama Day on campus! Come in your best (or worst) sleepwear and join the parade for a chance to win the coziest outfit award. Free hot cocoa for participants!</li>
                    </li>
                </ol>
            </div>

        </div>
    </div>

    <div class="main-box-two">
        <div class="least-announcement">
            <div class="topbar-two">
                <h4>Least Announcements <i class='fas fa-volume-up'></i></h4>
            </div>
    
            <div class="bottombar-two">
                <?php include 'announcement-display.inc.php'?>
            </div>
        </div>
    </div>

    <script>
        let submenu = document.getElementById("submenu");

        function toggleMenu()
        {
            submenu.classList.toggle("open-menu");
        }
    </script>

    <script src="admin-announcement.js"></script>

    <!-- End of the body part -->

    <!--Starting of footer-->

    <footer>
        <div class="description">
            Copyright @ 2024 Website,All rights
        </div>
        <div class="footer-link">
            <a href="#">About Us </a>|
            <a href="../HELPDESK/contact_us.php">Contact Us</a>
        </div>
    </footer>

    <!--End of footer-->

</body>
</html>