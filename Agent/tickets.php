<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets</title>
    <link rel="icon" href="help-desk01.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/tickets.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Include Font Awesome for icons -->
</head>
<body>

    <!-- Including the Header Section -->
    <?php include 'header.php'; ?>

    <?php
    // Include the database connection
    include 'config.php';

    // Fetch all tickets from your friend's database
    $sql = "SELECT * FROM ticket"; // Use the ticket database (Users raised tickets)
    $result = $conn->query($sql);
    ?>

    <div style="display: flex;">

        <!-- Left Sidebar for Ticket List -->
        <div id="ticket-list">
            <h3>Tickets</h3>

            <!-- Styled Search Bar -->
            <div class="search-bar">
                <form method="GET" action="tickets.php" style="width: 100%; display: flex;">
                    <input type="text" name="search" placeholder="Search" required>
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>

            <ul>
                <?php
                // If a search term is provided, filter the tickets
                if (isset($_GET['search'])) {
                    $searchTerm = $_GET['search'];
                    $sql .= " WHERE subject LIKE '%$searchTerm%'"; // Filter by subject
                    $result = $conn->query($sql);
                }

                if ($result->num_rows > 0) {
                    // Output data of each ticket
                    while ($row = $result->fetch_assoc()) {
                        // Create a link for each ticket to open details
                        echo "<li class='ticket-box'>
                                <a href='tickets.php?ticketId=" . $row["ticketId"] . "'>
                                    <strong>User ID:</strong> <span>" . htmlspecialchars($row["registrationId"]) . "</span><br>
                                    <strong>Subject:</strong> <span>" . htmlspecialchars($row["subject"]) . "</span>
                                </a>
                              </li>";
                    }
                } else {
                    echo "<li>No tickets found</li>";
                }
                ?>
            </ul>
            <a href="helpdesk_agent.php" class="btn-helpdesk">
                <button>Go to Help Desk Agent</button>
            </a>
        </div>

        <!-- Middle Section for Ticket Details and Responses -->
        <div id="ticket-details">
            <?php
            // Display ticket details and manage responses when a ticket is selected
            if (isset($_GET['ticketId'])) {
                $ticketId = $_GET['ticketId'];
                $sql = "SELECT * FROM ticket WHERE ticketId = $ticketId"; // Fetch the selected ticket
                $ticketResult = $conn->query($sql);

                if ($ticketResult->num_rows > 0) {
                    $ticket = $ticketResult->fetch_assoc();
                    echo "<h3><strong>User ID:</strong> <span>" . htmlspecialchars($ticket['registrationId']) . "</span></h3>"; // Display User ID
                    echo "<h3><strong>Subject:</strong> <span>" . htmlspecialchars($ticket['subject']) . "</span></h3>"; // Display Subject
                    echo "<h4><strong>Question:</strong></h4><p>" . htmlspecialchars($ticket['message']) . "</p>"; // Display Message

                    // Check if a response already exists for this ticket
                    $checkSql = "SELECT * FROM respond WHERE ticketId = '$ticketId'";
                    $checkResult = $conn->query($checkSql);

                    // If a response already exists, display it
                    if ($checkResult->num_rows > 0) {
                        $response = $checkResult->fetch_assoc();
                        echo "<h4>Response:</h4>";
                        echo "<div class='response-box'>";
                        echo "<textarea readonly class='response-text'>" . htmlspecialchars($response['respond_message']) . "</textarea>"; 
                        echo "<div class='response-buttons'>";
                        echo "<a href='update.php?respondId=" . $response['respondId'] . "&ticketId=$ticketId' class='btn-edit'>Edit</a>";
                        echo "<a href='delete.php?respondId=" . $response['respondId'] . "&ticketId=$ticketId' class='btn-delete'>Delete</a>";
                        echo "</div>"; 
                        echo "</div>"; 
                    } else {
                        // Response Form for new response
                        echo "<h4>Add Response</h4>";
                        echo "<form action='create.php' method='POST'>";
                        echo "<textarea name='respond_message' placeholder='Write your response here' required></textarea><br>"; 
                        echo "<input type='hidden' name='ticketId' value='$ticketId'>";

                        // Include a response ID field for manual input
                        echo "<input type='text' name='respondId' placeholder='Response ID' required><br>";
                        
                        // Include agent ID input field
                        echo "<input type='text' name='agentId' placeholder='Agent ID' required><br>"; 

                        echo "<input type='submit' value='Submit' class='btn-submit'>";
                        echo "</form>";
                    }
                } else {
                    echo "Ticket not found";
                }
            }
            ?>
        </div>

    </div>

    <!-- Including the Footer Section -->
    <?php include 'footer.php'; ?>
</body>
</html>
