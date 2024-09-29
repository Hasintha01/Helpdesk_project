<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/contact_us.css">
    <title>Contact Us</title>
</head>
<body>
    <?php include 'header.php'; ?>
    
    <main>
        <h1 style="text-align: center; margin-top: 20px;">Contact Us</h1>
        
        <div class="contact-info">
            <div class="topic">
                <i class="fas fa-phone fa-2x"></i>
                <h3>Telephone</h3>
                <p>+94 123 456 789</p>
            </div>
            <div class="topic">
                <i class="fas fa-envelope fa-2x"></i>
                <h3>Email</h3>
                <p>info@example.com</p>
            </div>
            <div class="topic">
                <i class="fas fa-map-marker-alt fa-2x"></i>
                <h3>Location</h3>
                <p>123 Help Desk St, Colombo, Sri Lanka</p>
            </div>
        </div>
        
        <div class="contact-section">
            <div class="contact-text">
                <p>For any inquiries, please feel free to reach out to us through the provided contact methods. We are here to assist you!</p>
            </div>
            <div class="map">
                <h2>Live Map</h2>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983552.4816887162!2d80.1304087105054!3d7.877194600000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25f94e4d15417%3A0x4079b0c679a7b1b4!2sColombo%2C%20Sri%20Lanka!5e0!3m2!1sen!2slk!4v1686041234567!5m2!1sen!2slk"
                    width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
