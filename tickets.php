<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets</title>
    <link rel="stylesheet" href="css/tickets.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Include Font Awesome for icons -->
</head>
<body>

    <!-- Including the Header Section -->
    <?php include 'header.php'; ?>

    <?php
    // Include the database connection
    include 'config.php';

    // Fetch all tickets from your friend's database
    $sql = "SELECT * FROM tickets"; // Use the ticket database
    $result = $conn->query($sql);
    ?>

    <div style="display: flex;">

        <!-- Left Sidebar for Ticket List -->
        <div id="ticket-list" style="width: 30%; border-right: 1px solid #ccc; padding: 10px;">
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
                    $searchTerm = $conn->real_escape_string($_GET['search']);
                    $sql .= " WHERE subject LIKE '%$searchTerm%'"; // Filter by subject
                    $result = $conn->query($sql);
                }

                if ($result->num_rows > 0) {
                    // Output data of each ticket
                    while ($row = $result->fetch_assoc()) {
                        // Create a link for each ticket to open details
                        echo "<li class='ticket-box'>
                                <a href='tickets.php?ticketid=" . $row["ticketid"] . "'>
                                    <strong>User ID:</strong> <span>" . htmlspecialchars($row["userid"]) . "</span><br>
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
        <div id="ticket-details" style="width: 70%; padding: 10px;">
            <?php
            // Display ticket details and manage responses when a ticket is selected
            if (isset($_GET['ticketid'])) {
                $ticketid = $_GET['ticketid'];
                $sql = "SELECT * FROM tickets WHERE ticketid = $ticketid"; // Fetch the selected ticket
                $ticketResult = $conn->query($sql);

                if ($ticketResult->num_rows > 0) {
                    $ticket = $ticketResult->fetch_assoc();
                    echo "<h3><strong>User ID:</strong> <span>" . htmlspecialchars($ticket['userid']) . "</span></h3>"; // Display User ID
                    echo "<h3><strong>Subject:</strong> <span>" . htmlspecialchars($ticket['subject']) . "</span></h3>"; // Display Subject
                    echo "<h4><strong>Question:</strong></h4><p>" . htmlspecialchars($ticket['message']) . "</p>"; // Display Message

                    // Check if a response already exists and display a message if it does
                    $checkSql = "SELECT * FROM responds WHERE ticketid = '$ticketid'";
                    $checkResult = $conn->query($checkSql);

                    if ($checkResult->num_rows > 0) {
                        echo "<p style='color: red;'>A response has already been submitted for this ticket.</p>";
                    } else {
                        // Response Form
                        echo "<h4>Add Response</h4>";
                        echo "<form action='create.php' method='POST'>";
                        echo "<textarea name='respond' placeholder='Write your response here' required></textarea><br>";
                        echo "<input type='hidden' name='ticketid' value='$ticketid'>";
                        echo "<input type='submit' value='Submit' class='btn-submit'>";
                        echo "</form>";
                    }

                    // Fetch and display existing responses
                    $responseSql = "SELECT * FROM responds WHERE ticketid = $ticketid"; // Fetch responses associated with the ticket
                    $responseResult = $conn->query($responseSql);
                    echo "<h4>Responses:</h4>";
                    if ($responseResult->num_rows > 0) {
                        while ($response = $responseResult->fetch_assoc()) {
                            echo "<p>" . htmlspecialchars($response['respond']) . 
                                 " <a href='update.php?respondid=" . $response['respondid'] . "&ticketid=$ticketid' class='btn-edit'>Edit</a> | " . 
                                 "<a href='delete.php?respondid=" . $response['respondid'] . "&ticketid=$ticketid' class='btn-delete'>Delete</a></p>";
                        }
                    } else {
                        echo "No responses found.";
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
