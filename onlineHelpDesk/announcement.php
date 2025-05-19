<!--This is announcement page-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Architects Daughter' rel='stylesheet'>
    <link rel="stylesheet" href="announcement.css">
    <link rel="stylesheet" href="headerandfooter.css">
    <title>Announcement</title>
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
            <a href="profilepage.php">User Profile</a>
            <hr>
            <a href="../login_and_register/logout.php">Logout</a>
        </div>

        <div id="navigation">
            <a href="home.php">Home</a>
            <a href="announcement.html">Announcement</a>
            <a href="http://localhost/IWT-GITHUB/onlineHelpDesk/form.php">Contact Help Desk</a>
            <div class="search_bar">
                <input type="search" placeholder="Search...">
                <i class="fas fa-search"></i>
            </div>
        </div>
    </header>
    <!--End of header-->

    <!--starting of content-->

    <div class="bigbox">

        <div class="subbox1">

            <div class="notificationbox">
                <div class="topbar">
                    <h4>Notifications <i class="fa-solid fa-envelope"></i></h4>  <hr>
                </div>

                <div class="bottombar">

                    <?php include "announcementread.php"; ?>

                </div>

            </div>

            <div class="eventsbox">
                <div class="upper">
                    <h4>Upcoming Events <i class="fa-regular fa-calendar-days"></i></h4><hr>
                </div>

                <ul>
                    <li>Virtual Job Fair – Explore job opportunities with top companies. Open to all students. Register now to secure your spot and upload your resume.</li>
                    <li>Annual Sports Meet – Come and support your favorite teams as they compete for the championship title. Events will start at 9:00 AM on the main sports field.</li>
                    <li>Scholarship Application Deadline – Last day to submit your applications for merit-based and need-based scholarships. Be sure to complete all requirements and upload necessary documents</li>
                </ul>

            </div>

        </div>

        <div class="subbox2">
            <h3>Announcements</h3> 
            <hr>
            <div class="Adescription">
                <!-- Announcement details will be dynamically updated here -->
                <h4><i class="fas fa-user"></i> Sent by: </h4>
                <hr>
                <h4>Subject:</h4>
                <br>
                <p></p>
            </div>
        </div>


    </div>

    <!--End of content-->

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

<script src="announcement.js"></script>

</body>
</html>

