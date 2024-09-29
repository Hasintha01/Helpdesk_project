<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/tickets.css">
    <title>Tickets</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <h1 style="text-align: center; margin-top: 20px;">TICKETS</h1>

        <!-- Search bar -->
        <div class="search-container">
            <input type="text" id="searchTickets" placeholder="Search tickets...">
            <button class="search-btn">Search</button>
        </div>

        <div class="content">
            <!-- Sidebar for ticket list -->
            <div class="sidebar">
                <div id="ticketList" style="max-height: 400px; overflow-y: auto;">
                    <!-- Add at least 10 tickets -->
                    <div class="ticket" onclick="showTicketDetails('001')">
                        <p><strong>Ref No: 001</strong> - Subject: Issue with Login</p>
                        <p>Details: Unable to login to the account</p>
                    </div>
                    <div class="ticket" onclick="showTicketDetails('002')">
                        <p><strong>Ref No: 002</strong> - Subject: Payment Issue</p>
                        <p>Details: Payment not going through</p>
                    </div>
                    <div class="ticket" onclick="showTicketDetails('003')">
                        <p><strong>Ref No: 003</strong> - Subject: Account Verification</p>
                        <p>Details: Verification email not received</p>
                    </div>
                    <div class="ticket" onclick="showTicketDetails('004')">
                        <p><strong>Ref No: 004</strong> - Subject: Mobile App Bug</p>
                        <p>Details: App crashes on startup</p>
                    </div>
                    <div class="ticket" onclick="showTicketDetails('005')">
                        <p><strong>Ref No: 005</strong> - Subject: Feature Request</p>
                        <p>Details: Request to add dark mode</p>
                    </div>
                    <div class="ticket" onclick="showTicketDetails('006')">
                        <p><strong>Ref No: 006</strong> - Subject: Feedback on New Update</p>
                        <p>Details: User feedback on recent updates</p>
                    </div>
                    <div class="ticket" onclick="showTicketDetails('007')">
                        <p><strong>Ref No: 007</strong> - Subject: Password Reset</p>
                        <p>Details: Unable to reset the password</p>
                    </div>
                    <div class="ticket" onclick="showTicketDetails('008')">
                        <p><strong>Ref No: 008</strong> - Subject: Refund Request</p>
                        <p>Details: Request for refund on recent purchase</p>
                    </div>
                    <div class="ticket" onclick="showTicketDetails('009')">
                        <p><strong>Ref No: 009</strong> - Subject: Subscription Issue</p>
                        <p>Details: Cannot access premium features</p>
                    </div>
                    <div class="ticket" onclick="showTicketDetails('010')">
                        <p><strong>Ref No: 010</strong> - Subject: Error Message</p>
                        <p>Details: Getting error message on checkout</p>
                    </div>
                </div>
            </div>

            <!-- Ticket details section -->
            <div class="ticket-detail">
                <h2>Select a ticket to view details</h2>
                <div id="ticketDetails">
                    <!-- Ticket details will be displayed here -->
                </div>
                <div class="response-area">
                    <textarea id="replyMessage" placeholder="Type your reply here..."></textarea>
                    <button class="send-btn">Send Reply</button>
                </div>
                <div class="status-icons">
                    <button class="resolved-btn" onclick="resolveTicket()">Resolved</button>
                    <button class="pending-btn" onclick="pendingTicket()">Pending</button>
                    <button class="rejected-btn" onclick="rejectTicket()">Reject</button>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    
    <script>
        // Ticket details data
        const ticketDetailsData = {
            '001': {
                subject: 'Issue with Login',
                details: 'Unable to login to the account.',
                reply: ''
            },
            '002': {
                subject: 'Payment Issue',
                details: 'Payment not going through.',
                reply: ''
            },
            '003': {
                subject: 'Account Verification',
                details: 'Verification email not received.',
                reply: ''
            },
            '004': {
                subject: 'Mobile App Bug',
                details: 'App crashes on startup.',
                reply: ''
            },
            '005': {
                subject: 'Feature Request',
                details: 'Request to add dark mode.',
                reply: ''
            },
            '006': {
                subject: 'Feedback on New Update',
                details: 'User feedback on recent updates.',
                reply: ''
            },
            '007': {
                subject: 'Password Reset',
                details: 'Unable to reset the password.',
                reply: ''
            },
            '008': {
                subject: 'Refund Request',
                details: 'Request for refund on recent purchase.',
                reply: ''
            },
            '009': {
                subject: 'Subscription Issue',
                details: 'Cannot access premium features.',
                reply: ''
            },
            '010': {
                subject: 'Error Message',
                details: 'Getting error message on checkout.',
                reply: ''
            }
        };

        // Show ticket details
        function showTicketDetails(refNo) {
            const ticketDetails = ticketDetailsData[refNo];
            const detailsDisplay = document.getElementById('ticketDetails');
            detailsDisplay.innerHTML = `<p><strong>Ref No: ${refNo}</strong></p>
                                        <p><strong>Subject:</strong> ${ticketDetails.subject}</p>
                                        <p><strong>Details:</strong> ${ticketDetails.details}</p>`;
        }

        function resolveTicket() {
            alert('Ticket marked as resolved.');
            // Logic to handle resolved ticket
            // Auto-open next ticket logic can be implemented here
        }

        function pendingTicket() {
            alert('Ticket marked as pending.');
            // Logic to handle pending ticket
        }

        function rejectTicket() {
            alert('Ticket has been rejected.');
            // Logic to delete the ticket
        }
    </script>
</body>
</html>
