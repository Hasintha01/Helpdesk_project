<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/helpdesk_agent.css">
    <title>Help Desk Agent</title>
</head>
<body>
    <?php include 'header.php'; ?>
  
    <main>
        <!-- Top Section with Title and Search Bar -->
        <div class="top-section">
            <h1>TICKETS</h1>
            <div class="search-bar">
                <input type="text" placeholder="Search tickets...">
            </div>
        </div>

        <div class="container">
            <!-- Sidebar Navigation (Left Section) -->
            <aside class="sidebar">
                <nav>
                    <ul>
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="knowledgebase.php">Knowledgebase</a></li>
                        <li><a href="tickets.php">Tickets</a></li>
                        <li><a href="inbox.php">Inbox</a></li>
                        <li><a href="notification.php">Notification</a></li>
                    </ul>
                </nav>
            </aside>

            <!-- Middle Section: Ticket List -->
            <section class="ticket-section" style="width: 70%; margin-left: 5%;">
                <div class="ticket-list">
                    <!-- Example of 10 tickets -->
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
                    <div class="ticket-box" onclick="expandTicket(this)">
                        <div class="ticket-info">
                            <p>Ref No: 003 - Subject: Ticket Issue C <span class="expand-icon">➕</span></p>
                        </div>
                        <div class="ticket-details" style="display: none;">
                            <p>Details of the ticket C...</p>
                            <button class="accept-btn" style="display: none;">Accept</button>
                            <button class="decline-btn" style="display: none;">Decline</button>
                        </div>
                    </div>
                    <div class="ticket-box" onclick="expandTicket(this)">
                        <div class="ticket-info">
                            <p>Ref No: 004 - Subject: Ticket Issue D <span class="expand-icon">➕</span></p>
                        </div>
                        <div class="ticket-details" style="display: none;">
                            <p>Details of the ticket D...</p>
                            <button class="accept-btn" style="display: none;">Accept</button>
                            <button class="decline-btn" style="display: none;">Decline</button>
                        </div>
                    </div>
                    <div class="ticket-box" onclick="expandTicket(this)">
                        <div class="ticket-info">
                            <p>Ref No: 005 - Subject: Ticket Issue E <span class="expand-icon">➕</span></p>
                        </div>
                        <div class="ticket-details" style="display: none;">
                            <p>Details of the ticket E...</p>
                            <button class="accept-btn" style="display: none;">Accept</button>
                            <button class="decline-btn" style="display: none;">Decline</button>
                        </div>
                    </div>
                    <div class="ticket-box" onclick="expandTicket(this)">
                        <div class="ticket-info">
                            <p>Ref No: 006 - Subject: Ticket Issue F <span class="expand-icon">➕</span></p>
                        </div>
                        <div class="ticket-details" style="display: none;">
                            <p>Details of the ticket F...</p>
                            <button class="accept-btn" style="display: none;">Accept</button>
                            <button class="decline-btn" style="display: none;">Decline</button>
                        </div>
                    </div>
                    <div class="ticket-box" onclick="expandTicket(this)">
                        <div class="ticket-info">
                            <p>Ref No: 007 - Subject: Ticket Issue G <span class="expand-icon">➕</span></p>
                        </div>
                        <div class="ticket-details" style="display: none;">
                            <p>Details of the ticket G...</p>
                            <button class="accept-btn" style="display: none;">Accept</button>
                            <button class="decline-btn" style="display: none;">Decline</button>
                        </div>
                    </div>
                    <div class="ticket-box" onclick="expandTicket(this)">
                        <div class="ticket-info">
                            <p>Ref No: 008 - Subject: Ticket Issue H <span class="expand-icon">➕</span></p>
                        </div>
                        <div class="ticket-details" style="display: none;">
                            <p>Details of the ticket H...</p>
                            <button class="accept-btn" style="display: none;">Accept</button>
                            <button class="decline-btn" style="display: none;">Decline</button>
                        </div>
                    </div>
                    <div class="ticket-box" onclick="expandTicket(this)">
                        <div class="ticket-info">
                            <p>Ref No: 009 - Subject: Ticket Issue I <span class="expand-icon">➕</span></p>
                        </div>
                        <div class="ticket-details" style="display: none;">
                            <p>Details of the ticket I...</p>
                            <button class="accept-btn" style="display: none;">Accept</button>
                            <button class="decline-btn" style="display: none;">Decline</button>
                        </div>
                    </div>
                    <div class="ticket-box" onclick="expandTicket(this)">
                        <div class="ticket-info">
                            <p>Ref No: 010 - Subject: Ticket Issue J <span class="expand-icon">➕</span></p>
                        </div>
                        <div class="ticket-details" style="display: none;">
                            <p>Details of the ticket J...</p>
                            <button class="accept-btn" style="display: none;">Accept</button>
                            <button class="decline-btn" style="display: none;">Decline</button>
                        </div>
                    </div>
                </div>
            </section>

                <!-- Right Section: Portable Notepad -->
                    <aside class="notes-section">
                        <h2>Notepad</h2>
                        <textarea id="notepad" placeholder="Type your reminders here..." rows="10"></textarea>
                        <button id="save-btn">Save</button>
                        <button id="clear-btn">Clear</button>
                    </aside>

        </div>
    </main>

    <?php include 'footer.php'; ?>

    <!-- Include JavaScript -->
    <script src="js/helpdesk_agent.js"></script>
</body>
</html>
