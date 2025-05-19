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
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="headerandfooter.css">
    <title>Home</title>
    <link rel="icon" href="help-desk01.png" type="image/x-icon">
    <style>
        .notification-container {
        position: relative; /* Ensure positioning for the dot */
        }

        .notification-dot {
        display: none; /* Start hidden; will show based on JavaScript */
        position: absolute; /* Position it relative to the anchor */
        top: -5px; /* Adjust to fit above the button */
        right: -5px; /* Adjust to fit to the right of the button */
        width: 12px; /* Size of the dot */
        height: 12px; /* Size of the dot */
        background-color: red; /* Color of the dot */
        border-radius: 50%; /* Make it circular */
        border: 2px solid white; /* Optional: adds visibility */
        }

    </style>

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


    <!--Content of the body-->

        <div class="myticketspage">
            <a href="http://localhost/IWT-GITHUB/onlineHelpDesk/mytickets.php" class="notification-container">
                Ticket <i class="fa-solid fa-file"></i>
                <span class="notification-dot" id="notification-dot"></span> 
            </a>
        </div>

        <div class="welcomebox">
            <h1 id="welcomeheader">WELCOME USER <span> <?php echo $_SESSION['user_registration'] ?></span> </h1>
            <p><b>Need Assistance? You’re in the right place!</b>
                Whether you’re dealing with a technical issue, have questions about campus services, or need help with any other concern, our dedicated support team is here to assist you. Raise a ticket or explore our resources to find the answers you need and get started quickly. </p>
        </div>

        <div class="helpdesk">
            <a href="http://localhost/IWT-GITHUB/onlineHelpDesk/form.php">Contact Help Desk</a>
        </div>

        <div class="details">

                <div id="content01">
                    <h2>knowledge Base</h2>
                    <p>"Find answers to common queries and explore a collection of articles and resources to resolve your issues quickly. Whether it’s troubleshooting technical problems or understanding administrative procedures, our Knowledge Base is your go-to solution hub."</p>
                </div>
            
                <div id="content02">
                    <h2>Shuttle Service</h2>
                    <p>"Stay informed about campus shuttle schedules and routes to ensure you never miss a ride. Get real-time updates, service availability, and special announcements regarding our transport facilities for smooth and hassle-free commutes."</p>
                </div>
            
                <div id="content03">
                    <h2>Announcement</h2>
                    <p>"Stay up-to-date with the latest news, events, and important updates from the campus. Our Announcements section provides real-time information on changes, notices, and upcoming activities to keep you connected and informed."</p>
                </div>
            
        </div>



        <div class="feedback">
            <a href="../feedback/insert.php">Give Us Your Feedback
                <i class="fa-solid fa-arrow-right"></i> </a>
        </div>

    <!--End of Content of body-->


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

<script src="home.js" defer ></script>
<script src="notification.js"></script>

</body>
</html>