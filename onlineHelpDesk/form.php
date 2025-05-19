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
    <link href='https://fonts.googleapis.com/css?family=Architects Daughter' rel='stylesheet'>
    <link rel="stylesheet" href="formStyle.css">
    <link rel="stylesheet" href="headerandfooter.css">
    <title>Support Desk</title>
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
                echo "<a href='profilepage.php?registrationNo=$registrationNo'>User Profile</a>";
            } else {
                echo "<a href='#'>User Profile</a>"; // Default link if the session is not set
            }
            ?>
            
            <hr>
            <a href="../login_and_register/logout.php">Logout</a>
        </div>

        <div id="navigation">
            <a href="home.php">Home</a>
            <a href="announcement.php">Announcement</a>
            <a href="http://localhost/IWT-GITHUB/onlineHelpDesk/form.php">Contact Help Desk</a>
            <div class="search_bar">
                <input type="search" placeholder="Search...">
                <i class="fas fa-search"></i>
            </div>
        </div>
    </header>
    <!--End of header-->

    <!--Start of the content-->

    <div class="details">
        <p>Please complete the form below,and our support team will respond to your request promptly. You'll receive updates directly through the help desk system and we'll notify you by email as soon as there's a response.</p>
    </div>

    <form action="databasecreate.php" method="post" enctype="multipart/form-data" onsubmit="return confirmSubmission();">
        <fieldset>
            <legend>Ticket Details</legend>
    
            <!-- Name and Registration Number in the same row -->
            <div class="form-row">
                <div>
                    <label for="name">Name</label>
                    <input type="text" id="name" placeholder="Eg. enter your first name" name="name" pattern="[A-Za-z\s]{3,50}" required>
                </div>
                <div>
                    <label for="registration_number">Registration Number</label>
                    <input type="text" id="registration_number" name="registrationId" value="<?php echo isset($_SESSION['user_registration']) ? $_SESSION['user_registration'] : ''; ?>" 
                    readonly >
                </div>
            </div>
    
            <!-- Email and Contact Number in the same row -->
            <div class="form-row">
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo isset($_SESSION['user_email']) ? $_SESSION['user_email'] : ''; ?>" 
                    readonly >
                </div>
                <div>
                    <label for="contact_number">Contact Number</label>
                    <input type="tel" id="contact_number" placeholder="Eg. 07........" name="contactNumber" pattern="^07[0-9]{8}$" required>
                </div>
            </div>
    
            <!-- Subject and Message are full width -->
            <label for="subject">Subject</label>
            <input type="text" id="subject" class="full-width" name="subject" pattern=".{5,100}" required>
    
            <label for="message">Message</label>
            <textarea id="message" class="full-width" rows="8" name="message" ></textarea>

            <label for="file">Attachments</label>
            <input type="file" class="full-width" name="attachment" accept=".jpg,.png,.pdf,.docx" title="Please upload a file in .jpg, .png, .pdf, or .docx format.">

            <p>Please attach relevant documents or images to support your request (e.g., screenshots, PDFs, or other related files). Maximum file size: 5MB.</p>
    
            <!-- Submit Button -->
             <div class="form-buttons">
                <input type="reset" value="Reset" class="formbutton">
                <button type="submit" class="formbutton">
                    Submit <i class="fa-solid fa-paper-plane"></i> 
                </button> 
             </div>
        </fieldset>
    </form>

    <!-- Icon Button -->
        <div class="icon-button">
            <a href="mytickets.php">
                Ticket <i class="fa-solid fa-file"></i> 
            </a>
        </div>

       <div class="emptycontainer">
        
       </div>

<!--End of teh content-->



<!--Starting of footer-->
     <footer>
        <div class="description">
            Copyright @ 2024 Website,All rights
        </div>
        <div class="footer-link">
            <a href="#">About Us </a>|
            <a href="../Agent/contact_us.php">Contact Us</a>
        </div>
    </footer>
<!--End of footer-->

<script>
    function confirmSubmission() {
    
    alert("Ticket submitted successfully!");
    return true;
    }
</script>


<script>
    let submenu = document.getElementById("submenu");

    function toggleMenu()
    {
        submenu.classList.toggle("open-menu");
    }
</script>

</body>
</html>