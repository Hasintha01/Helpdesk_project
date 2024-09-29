<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet'>
    <link rel="stylesheet" href="css/home.css"> <!-- Reference to your CSS file -->
    <title><?php echo $title; ?></title> <!-- Dynamic title for each page -->
</head>
<body>
    <!-- Start of header -->
    <header id="header1">
        <div id="logo">LOGO</div>
        <div id="heading">HELP DESK</div>
        <div id="profile-button">
            <button>
                <i class="fas fa-user"></i> <!-- User profile icon from Font Awesome -->
            </button>
        </div>
        <div id="navigation">
            <a href="Dashboard.php">Home</a>
            <a href="announcement.php">Announcement</a>
            <a href="contact_us.php">Contact Help Desk</a>
            <div class="search_bar">
                <input type="search" placeholder="Search...">
                <i class="fas fa-search"></i>
            </div>
        </div>
    </header>
    <!-- End of header -->
