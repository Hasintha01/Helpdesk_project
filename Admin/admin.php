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
    <title>Admin</title>
    <link rel="icon" href="help-desk01.png" type="image/x-icon">
    <link rel="stylesheet" href="admin.css">
</head>
<body>

    <!-- strating of the side bar -->
    <div class="side-bar-area">
        <div class="side-bar-heading">
            <h1 id="welcomeheader1">WELCOME</h1>
            <h2 id="welcomeheader2">ADMIN</h2>
            <h1 id="welcomeheader3">
                <span><?php echo ($_SESSION['admin_registration']); ?></span>
            </h1>
        </div>


        <div class="side-bar">
            <a href="./admin.php">Dashboard</a>
            <a href="./usermanagement.php">User Management</a>
            <a href="./escalatedtickets.php">Ticket Management</a>
            <a href="./admin-announcement.php">Announcement</a>
        </div>
    </div>
    <!-- end of the side bar -->

    <!-- strat of the main body part -->

    <!-- top solver table -->
    <div class="top-solvers-area">
        <table class="top-solvers">
            <!-- Table Header Row -->
            <tr>
                <th colspan="2">Top Ticket Solvers This Week</th>
            </tr>
            <!-- Column Headers -->
            <tr>
                <td><strong>Name</strong></td>
                <td><strong>Rate</strong></td>
            </tr>
            <!-- Data Rows -->
            <tr>
                <td>Bawantha</td>
                <td>91%</td>
            </tr>
            <tr>
                <td>Someone Else</td>
                <td>85%</td>
            </tr>
            <tr>
                <td>Another Solver</td>
                <td>92%</td>
            </tr>
            <tr>
                <td>New Solver</td>
                <td>88%</td>
            </tr>
            <tr>
                <td>New Solver</td>
                <td>88%</td>
            </tr>
        </table>
    </div>
    

    <!-- active solver table -->
    <div class="active-solvers-area">
        <table class="active-solvers">
            <!-- Table Header Row -->
            <tr>
                <th colspan="2">Active Solvers</th>
            </tr>
            <!-- Column Headers -->
            <tr>
                <td><strong>Name</strong></td>
                <td><strong>solv.count</strong></td>
            </tr>
            <!-- Data Rows -->
            <tr>
                <td>Mr Ruwan</td>
                <td>12</td>
            </tr>
            <tr>
                <td>Mr Ashen</td>
                <td>9</td>
            </tr>
            <tr>
                <td>Ms Hashini</td>
                <td>5</td>
            </tr>
            <tr>
                <td>Miss Nuwanthi</td>
                <td>2</td>
            </tr>
            <tr>
                <td>Mr Asanka</td>
                <td>2</td>
            </tr>
        </table>
    </div>
    
    <!-- ticket by status table -->
    <div class="ticket-by-status-area">
        <table class="ticket-by-status">
            <!-- Table Header Row -->
            <tr>
                <th colspan="2">Ticket By Status This Week</th>
            </tr>
            <!-- Bar Graph Row -->
            <tr>
                <td class="bar-graph">
                    <div class="bar bar-1">Open</div>
                    <div class="bar bar-2">Pending</div>
                    <div class="bar bar-3">Resolved</div>
                    <div class="bar bar-4">Closed</div>
                </td>
            </tr>
        </table>
    </div>
    
    <!-- start of the email table -->

    <div class="email-table-area">
        <table class="emails">
            <tr>
                <th>
                    Emails
                    <i class="fas fa-bell"></i>
                </th>
            </tr>
            <tr>
                <td>
                    example1@temp-mail.org
                    <p>"Collaboration Opportunity: Research Project Proposal"</p>
                </td>
            </tr>
            <tr>
                <td>
                    user12345@fake-email.com
                    <p>"Reminder: Upcoming Faculty Meeting Agenda and Details"</p>
                </td>
            </tr>
            <tr>
                <td>
                    testaccount6789@mailinator.com
                    <p>"Request for Budget Approval for Departmental Activities"</p>
                </td>
            </tr>
            <tr>
                <td>
                    john.doe@university.edu
                    <p>"Invitation to Annual Faculty Conference"</p>
                </td>
            </tr>
            <!-- <tr>
                <td>
                    jane.smith@university.edu
                    <p>"Follow-Up: Grant Application Submission"</p>
                </td>
            </tr>
            <tr>
                <td>
                    research.team@university.edu
                    <p>"Update on Research Funding Opportunities"</p>
                </td>
            </tr> -->
            
        </table>
    </div>
    
    <div class="note-box">
        <h3>Notes:</h3>
        <p>Just a quick note to remind everyone to check the ticket queue regularly and ensure timely responses. Also, please update the knowledge base with any new solutions to help reduce ticket volume.</p>
    </div>

    <div class="admin-box">
        <!-- Admin Icon -->
        <div class="admin-icon">👤</div>
        
        <!-- Admin Label -->
        <div class="admin-label">Admin</div>
        
        <!-- Static Clock -->
        <div class="clock">12:45 PM</div>
        
        <!-- Static Date -->
        <div class="date">September 21, 2024</div>

        <!-- logout -->
        <div class="logout">
            <a href="../login_and_register/logout.php">Logout</a>
        </div>
    </div>



    <!-- end of the email table -->


    <!-- end of the main body part -->


    <!--Starting of footer-->

    <footer>
        <div class="description">
            Copyright @ 2024 Website,All rights
        </div>
        <div class="footer-link">
            <a href="#">About Us </a>|
            <a href="#">Contact Us</a>
        </div>
    </footer>

    <!--End of footer-->
</body>
</html>