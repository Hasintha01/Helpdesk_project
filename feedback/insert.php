<?php

session_start();

include 'connection.php';

// Initialize variables for the form
$name = $email = $message = "";
$id = 0;

// Handle Create operation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $stmt = $pdo->prepare("INSERT INTO  form_det (name, email, message) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $message]);
    header("Location: insert.php");
    exit();
}

// Handle Delete operation
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM  form_det WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: insert.php");
    exit();
}

// Retrieve all feedback for reading
$stmt = $pdo->query("SELECT * FROM  form_det");
$feedbacks = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Architects Daughter' rel='stylesheet'>
    <link rel="stylesheet" href="insert.css">
    <link rel="stylesheet" href="headerandfooter.css">
    <title>Feedback</title>
    <link rel="icon" href="help-desk01.png" type="image/x-icon">
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
            if (isset($_SESSION['user_registration'])) {
                $registrationNo = $_SESSION['user_registration'];
                echo "<a href='../onlineHelpDesk/profilepage.php?registrationNo=$registrationNo'>User Profile</a>";
            } else {
                echo "<a href='#'>User Profile</a>"; // Default link if the session is not set
            }
            ?>

            <hr>
            <a href="../login_and_register/logout.php">Logout</a>
        </div>

        <div id="navigation">
            <a href="../onlineHelpDesk/home.php">Home</a>
            <a href="../onlineHelpDesk/announcement.php">Announcement</a>
            <a href="http://localhost/IWT-GITHUB/onlineHelpDesk/form.php">Contact Help Desk</a>
            <div class="search_bar">
                <input type="search" placeholder="Search...">
                <i class="fas fa-search"></i>
            </div>
        </div>
    </header>
    <!--End of header-->

    <div class="container">
        <h2>We Value Your Feedback!</h2>
        <p>Your input is essential for improving our services. Please fill out the form below to share your thoughts with us.</p>

        <form action="" method="post">
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" placeholder="John Doe" required aria-required="true">
            </div>

            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" placeholder="john.doe@example.com" required aria-required="true">
            </div>

            <div class="form-group">
                <label for="message">Your Feedback:</label>
                <textarea id="message" name="message" rows="5" placeholder="Please share your thoughts here..." required aria-required="true"></textarea>
            </div>

            <button type="submit" name="create">Submit Feedback</button>
        </form>

        <h2>Feedback List</h2>
        <ul>
            <?php foreach ($feedbacks as $feedback): ?>
                <li>
                    <strong><?php echo htmlspecialchars($feedback['name']); ?></strong> 
                    (<?php echo htmlspecialchars($feedback['email']); ?>): 
                    <?php echo htmlspecialchars($feedback['message']); ?> 
                    <a href="update.php?id=<?php echo $feedback['id']; ?>">Edit</a>
                    <a href="?delete=<?php echo $feedback['id']; ?>" onclick="return confirm('Are you sure you want to delete this feedback?');">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>
        </div>

    <footer>
        <div class="description">Copyright @ 2024 Website, All rights</div>
        <div class="footer-link">
            <a href="#">About Us</a> |
            <a href="#">Contact Us</a>
        </div>
    </footer>
</body>

<script>
    let submenu = document.getElementById("submenu");

    function toggleMenu()
    {
        submenu.classList.toggle("open-menu");
    }
</script>

</html>