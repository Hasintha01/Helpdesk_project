<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tickets</title>
    <link rel="icon" href="help-desk01.png" type="image/x-icon">

    <!-- Link to your external CSS file -->
    <link rel="stylesheet" href="myticketstyle.css">

</head>
<body></body>
</html>

<?php

//insert DB connection 
require_once "connection.php";


if (isset($_SESSION['user_registration'])) {
    $registrationNo = $_SESSION['user_registration']; 

    
    $sql = "SELECT * FROM ticket WHERE registrationId = ?";
    
    // Prepare the SQL statement to prevent SQL injection
    if ($stmt = $conn->prepare($sql)) {
        // Bind the registrationNo parameter to the query
        $stmt->bind_param("s", $registrationNo);
        
        // Execute the query
        $stmt->execute();
        
        // Get the result
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Fetch the data and display it
            while ($row = $result->fetch_assoc()) {
                echo "<details class='boxs' style='margin:20px; cursor: pointer; padding:20px;' >
                <summary class='header'>
                    <span class='tid'>" . $row['ticketId'] . "</span>
                    <span class='title'>" . $row['subject'] . "</span>
                    <button style='background-color: crimson;' onClick='confirmDelete(\"databasedelete.php?delete_ticketId=" . $row['ticketId'] . "\");'>Delete</button>
                    <button style=' background-color: rgb(21,208,56);' onClick=\"redirectToDatabaseUpdate(" . $row['ticketId'] . ")\">Update</button>
                </summary>
                <div class='content'>
                    <p>" . $row['message'] . "</p>";

                         // Check if there's an attachment in the row and add a download/view link
                         if (!empty($row['attachment'])) {
                            
                            echo "<a href='view_attachment.php?id=" . $row['ticketId'] . "' target='_blank' style='text-decoration:none' margin-left:5px; padding:5px;>View Attachment</a>";
                        }                    
               
                     // Retrieve responses for the current ticket from the respond table
                $ticketId = $row['ticketId'];
                $responseQuery = "SELECT respond_message, agentId FROM respond WHERE ticketId = ?";
                
                if ($responseStmt = $conn->prepare($responseQuery)) {
                    // Bind the ticketId parameter to the query
                    $responseStmt->bind_param("i", $ticketId);
                    
                    // Execute the query
                    $responseStmt->execute();
                    
                    // Get the result
                    $responseResult = $responseStmt->get_result();

                    if ($responseResult->num_rows > 0) {
                       
                        echo "<div class='response-section' style='border: 2px solid black; border-radius: 7px;' >";
                        echo "<p><strong>Agent Responses:</strong></p>";
                        while ($responseRow = $responseResult->fetch_assoc()) {
                            echo "<div class='response'>
                                    <p>Agent ID: " . $responseRow['agentId'] . "</p>
                                    <p>" . $responseRow['respond_message'] . "</p>
                                  </div>";
                        }
                        echo "</div>"; 
                    } else {
                        // If no responses exist, display a placeholder message
                        echo "<div class='response-section' style='border: 2px solid black; border-radius: 7px;'  >
                                <p><strong>No responses yet.</strong></p>
                              </div>";
                    }

                    // Close the response statement
                    $responseStmt->close();
                } else {
                    echo "<p>Error retrieving responses.</p>";
                }

                echo "</div>
                      </details>";
            }
        }
         else
        {
            echo "<center>You have NOT made any Tickets</center>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing the SQL query.";
    }
} else {
    echo "User not logged in or registrationNo not set.";
}

echo "<script src='knowledgetoggle.js'></script>";
echo "<script src='databaseupdate.js'></script>";

echo "<script>
function confirmDelete(url) {
    if (confirm('Are you sure you want to delete this ticket?')) {
        window.location.href = url;  // Redirect to delete page only if confirmed
    }
}
</script>";

$conn->close();
?>
