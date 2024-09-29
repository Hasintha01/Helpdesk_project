<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Linking External Stylesheet for Contact Us Page -->
    <link rel="stylesheet" type="text/css" href="css/contact_us.css">
    
    <!-- Title for the Page -->
    <title>Contact Us</title>
</head>
<body>
    <!-- Including the Header Section -->
    <?php include 'header.php'; ?>
    
    <!-- Main Content Section -->
    <main>
        <!-- Page Title -->
        <h1 style="text-align: center; margin-top: 20px;">Contact Us</h1>
        
        <!-- Contact Information Section -->
        <div class="contact-info">
            <!-- Telephone Information -->
            <div class="topic">
                <i class="fas fa-phone fa-2x"></i> <!-- Font Awesome Icon -->
                <h3>Telephone</h3>
                <p>+94 123 456 789</p>
            </div>
            <!-- Email Information -->
            <div class="topic">
                <i class="fas fa-envelope fa-2x"></i> <!-- Font Awesome Icon -->
                <h3>Email</h3>
                <p>info@example.com</p>
            </div>
            <!-- Location Information -->
            <div class="topic">
                <i class="fas fa-map-marker-alt fa-2x"></i> <!-- Font Awesome Icon -->
                <h3>Location</h3>
                <p>123 Help Desk St, Colombo, Sri Lanka</p>
            </div>
        </div>
        
        <!-- Contact Section with Text and Map -->
        <div class="contact-section">
            <!-- Contact Text for Inquiries -->
            <div class="contact-text">
                <p>For any inquiries, please feel free to reach out to us through the provided contact methods. We are here to assist you!</p>
            </div>
            <!-- Embedding Google Maps for Location -->
            <div class="map">
                <h2>Live Map</h2>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983552.4816887162!2d80.1304087105054!3d7.877194600000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25f94e4d15417%3A0x4079b0c679a7b1b4!2sColombo%2C%20Sri%20Lanka!5e0!3m2!1sen!2slk!4v1686041234567!5m2!1sen!2slk"
                    width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </main>

    <!-- Including the Footer Section -->
    <?php include 'footer.php'; ?>
</body>
</html>
