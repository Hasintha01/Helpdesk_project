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
    <link rel="stylesheet" href="escalatedtickets.css">
    <link rel="stylesheet" href="./headerandfooter.css">
    <title>Escalated Tickets</title>
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
            <a href="./admin.php">Home</a>
            <a href="admin-announcement.php">Announcement</a>
            <a href="escalatedtickets.php">Ticket Management</a>
            <div class="search_bar">
                <input type="search" placeholder="Search...">
                <i class="fas fa-search"></i>
            </div>
        </div>
    </header>
    <!--End of header-->

    <!-- Side scroll bar -->
    <div class="main-box-one">
        <div class="scroll-bar">
            <!-- header-bar -->
            <div class="top-bar-one"><h3>Escalated Tickets</h3></div>
            <div class="latter-bar-one">
                <ol>
                    <li>
                        Critical System Outage:
                        Description: A major application or system is down, affecting all users and halting business operations.
                    </li><hr>
                    <li>
                        Data Breach Incident:
                        Description: A potential security breach has been detected, compromising sensitive customer data.

                    </li><hr>
                    <li>
                        High-Impact Bug:
                        Description: A bug in the software is causing significant functionality issues for a large number of users.

                    </li><hr>
                    <li>
                        Compliance Violation:
                        Description: An issue arises that may violate regulatory compliance, such as GDPR or HIPAA.

                    </li><hr>  
                    <li>
                        Customer Account Lockout:
                        Description: A high-profile customer is locked out of their account and unable to access critical services.

                    </li><hr> 
                    <li>
                        Integration Failure:
                        Description: An integration between two critical systems has failed, impacting workflows.
                        Service Level Agreement (SLA) Breach:


                    </li><hr> 
                </ol>
            </div>
        </div>
    </div>
    
    <div class="main-box-two">
        <div class="add-escalated-ticket">  
            <form id="ticketForm">
                <h3>Reply to Escalated Tickets</h3><hr>
    
                <!-- Ticket ID Field -->
                <div class="form-group">
                    <label for="ticketId">Ticket ID:</label>
                    <input type="text" placeholder="Enter Ticket ID" name="ticketId" id="ticketId" required>
                </div><br>
    
                <!-- Agent ID Field -->
                <div class="form-group">
                    <label for="agentId">Agent ID:</label>
                    <input type="text" placeholder="Enter Agent ID" name="agentId" id="agentId" required>
                </div><br>
    
                <!-- Description Field -->
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea placeholder="Enter the ticket description" name="description" id="description" rows="4" required></textarea>
                </div><br>
    
                <!-- Submit and Cancel Buttons -->
                <div class="form-group button-group">
                    <button type="submit" id="submitBtn">Submit</button>
                    <button type="reset" id="cancelBtn">Cancel</button>
                </div><br>
            </form>
        </div>
    </div>
    
    <div class="it-support">
        <button id="supportBtn">Ask for IT support!</button>
    </div>
    

    <div class="it-support">
        <button>Ask for IT support!</button>
    </div>

    <script src="escalatedtickets.js"></script>

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

    <script>
        let submenu = document.getElementById("submenu");

        function toggleMenu()
        {
            submenu.classList.toggle("open-menu");
        }
    </script>

    <!--End of footer-->
</body>
</html>