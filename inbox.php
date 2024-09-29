<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Title -->
    <title>Inbox</title>

    <!-- Linking External CSS for Inbox -->
    <link rel="stylesheet" href="css/inbox.css">
</head>
<body>

    <!-- Including the Header Section -->
    <?php include 'header.php'; ?>

    <!-- Main Container -->
    <div class="main-container">
        <!-- Left Sidebar for Navigation -->
        <div class="sidebar">
            <ul>
                <li><a href="#">Inbox</a></li>
                <li><a href="#">Sent</a></li>
                <li><a href="#">Drafts</a></li>
                <li><a href="#">Trash</a></li>
            </ul>
        </div>

        <!-- Middle Section for Email List -->
        <div class="email-list">
            <input type="text" id="searchEmails" placeholder="Search emails...">

            <div class="email" onclick="showEmailDetails(1)">
                <p><strong>From:</strong> John Doe</p>
                <p><strong>Subject:</strong> Meeting tomorrow</p>
                <p class="email-preview">Don't forget about the meeting tomorrow at...</p>
            </div>

            <div class="email" onclick="showEmailDetails(2)">
                <p><strong>From:</strong> Jane Smith</p>
                <p><strong>Subject:</strong> Project Update</p>
                <p class="email-preview">Here's the latest update on the project...</p>
            </div>

            <!-- Add more emails here -->
        </div>

        <!-- Right Section for Email Details and Reply -->
        <div class="email-details" id="emailDetails">
            <h2>Select an email to view details</h2>
            <div id="emailContent"></div>

            <!-- Reply Section -->
            <div id="replySection" style="display: none;">
                <h3>Reply to this email:</h3>
                <textarea id="replyMessage" rows="5" placeholder="Type your reply here..."></textarea>
                <button onclick="sendReply()">Send</button>
            </div>
        </div>
    </div>

    <!-- Including the Footer Section -->
    <?php include 'footer.php'; ?>

    <!-- JavaScript Functions -->
    <script>
        // Function to display email details
        function showEmailDetails(emailId) {
            let emailContent = '';

            // Dummy content for email details
            if (emailId === 1) {
                emailContent = `
                    <h2>Meeting tomorrow</h2>
                    <p><strong>From:</strong> John Doe</p>
                    <p><strong>To:</strong> You</p>
                    <p>Don't forget about the meeting tomorrow at 10:00 AM. Let's finalize the presentation.</p>
                `;
            } else if (emailId === 2) {
                emailContent = `
                    <h2>Project Update</h2>
                    <p><strong>From:</strong> Jane Smith</p>
                    <p><strong>To:</strong> You</p>
                    <p>Here's the latest update on the project. I've attached the documents for review.</p>
                `;
            }

            document.getElementById('emailContent').innerHTML = emailContent;

            // Show the reply section after selecting an email
            document.getElementById('replySection').style.display = 'block';
        }

        // Function to handle sending replies
        function sendReply() {
            let replyMessage = document.getElementById('replyMessage').value;
            if (replyMessage) {
                alert("Reply sent: " + replyMessage);
                // Clear the reply text area after sending
                document.getElementById('replyMessage').value = '';
            } else {
                alert("Please write a reply before sending.");
            }
        }
    </script>

</body>
</html>
