<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags for character encoding and responsive design -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Linking external CSS file for styling the Help Desk Agent page -->
    <link rel="stylesheet" type="text/css" href="css/helpdesk_agent.css">

    <!-- Page title -->
    <title>Help Desk Agent</title>
</head>
<body>

    <!-- Including the header section from an external PHP file -->
    <?php include 'header.php'; ?>
  
    <!-- Main content section -->
    <main>
        <!-- Top Section containing the title and search bar -->
        <div class="top-section">
            <h1>TICKETS</h1> <!-- Page Title -->
            
            <!-- Search Bar for ticket search -->
            <div class="search-bar">
                <input type="text" placeholder="Search tickets..."> <!-- Search input field -->
            </div>
        </div>

        <!-- Main container for layout -->
        <div class="container">
            
            <!-- Sidebar Navigation (Left Section) -->
            <aside class="sidebar">
                <nav>
                    <ul>
                        <!-- Sidebar links to other sections/pages -->
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="knowledgebase.php">Knowledgebase</a></li>
                        <li><a href="tickets.php">Tickets</a></li>
                        <li><a href="inbox.php">Inbox</a></li>
                        <li><a href="notification.php">Notification</a></li>
                    </ul>
                </nav>
            </aside>

            <!-- Middle Section: Displaying the list of tickets -->
            <section class="ticket-section" style="width: 70%; margin-left: 5%;">
                <!-- Ticket List -->
                <div class="ticket-list">
                    <!-- Example tickets. Clicking a ticket expands its details -->
                    
                    <!-- Ticket 001 -->
                    <div class="ticket-box" onclick="expandTicket(this)">
                        <div class="ticket-info">
                            <p>Ref No: 001 - Subject: Ticket Issue A <span class="expand-icon">➕</span></p>
                        </div>
                        <div class="ticket-details" style="display: none;">
                            <p>Details of the ticket A...</p>
                            <button class="accept-btn" style="display: none;">Accept</button>
                            <button class="decline-btn" style="display: none;">Decline</button>
                        </div>
                    </div>

                    <!-- Ticket 002 -->
                    <div class="ticket-box" onclick="expandTicket(this)">
                        <div class="ticket-info">
                            <p>Ref No: 002 - Subject: Ticket Issue B <span class="expand-icon">➕</span></p>
                        </div>
                        <div class="ticket-details" style="display: none;">
                            <p>Details of the ticket B...</p>
                            <button class="accept-btn" style="display: none;">Accept</button>
                            <button class="decline-btn" style="display: none;">Decline</button>
                        </div>
                    </div>

                    <!-- We can add more tickets using same format -->
                    

                </div> 
            </section> 

            <!-- Right Section: Portable Notepad for reminders or notes -->
            <aside class="notes-section">
                <h2>Notepad</h2>
                <!-- Textarea for typing notes -->
                <textarea id="notepad" placeholder="Type your reminders here..." rows="10"></textarea>
                
                <!-- Save and Clear buttons for the notepad -->
                <button id="save-btn">Save</button>
                <button id="clear-btn">Clear</button>
            </aside>

        </div> <!-- End of container -->
    </main>

    <!-- Including the footer section from an external PHP file -->
    <?php include 'footer.php'; ?>

    <!-- Including external JavaScript file for page functionality -->
    <script src="js/helpdesk_agent.js"></script>
</body>
</html>
