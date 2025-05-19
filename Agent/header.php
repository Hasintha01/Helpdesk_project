<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet'>
    <link rel="stylesheet" href="css/home.css"> <!-- Reference to your CSS file -->
    <title><?php echo $title; ?></title> <!-- Dynamic title for each page -->


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
            if (isset($_SESSION['agent_registration'])) {
                $registrationNo = $_SESSION['agent_registration'];
                echo "<a href='profilepage.php?registrationNo=$registrationNo'>User Profile</a>";
            } else {
                echo "<a href='#'>User Profile</a>"; // Default link if the session is not set
            }
            ?>

            <hr>
            <a href="../login_and_register/logout.php">Logout</a>
        </div>
        <div id="navigation">
            <a href="Dashboard.php">Home</a>
            <a href="announcement.php">Announcement</a>
            <a href="tickets.php">Tickets</a>
            <div class="search_bar">
                <input type="search" placeholder="Search...">
                <i class="fas fa-search"></i>
            </div>
        </div>
    </header>
    <!-- End of header -->
<script>
    let submenu = document.getElementById("submenu");

    function toggleMenu()
    {
        submenu.classList.toggle("open-menu");
    }
</script>    
</body>
</html>