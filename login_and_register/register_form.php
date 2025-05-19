<?php

//connect database
@include "makeconnection.php";

if(isset($_POST['submit']))
{
    $fName = mysqli_real_escape_string($conn, $_POST['fName']);
    $userId = mysqli_real_escape_string($conn, $_POST['userId']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $userType = 'user';

    // Check only in the 'user' table if the user already exists
    $select = "SELECT * FROM user WHERE userId ='$userId' OR email = '$email'";

    $result = mysqli_query($conn,$select);

    if(mysqli_num_rows($result) > 0)
    {
        $error[] = 'User already exist in the system!';
    }
    else
    {
        if($password != $confirmPassword)
        {
            $error[] = 'password NOT matched!';
        }
        else
        {
            // insert into 'user' table only
            $insert = "INSERT INTO user (userId, fName, email, password) VALUES('$userId', '$fName', '$email', '$password')";

            // Execute the insert query
            if(mysqli_query($conn, $insert))
            {
                header('location:login_form.php');
            }
            else
            {
                $error[] = 'Error in inserting data: ' . mysqli_error($conn);
            }
        }
    }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register_form</title>
    <link rel="icon" href="help-desk01.png" type="image/x-icon">
    <link rel="stylesheet" href="register_login_style.css">
</head>
<body>

    <div class="form_container">

    <form action="" method="post">

    <h3>Register Now</h3>

    <?php

    if(isset($error))
    {
        foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
        };
    };

    ?>

    <input type="text" name="fName" placeholder="Enter your First name"  pattern="[A-Za-z\s]{3,50}" required>
    <input type="text" name="userId" placeholder="Enter your registration No" pattern="^(IT|AC|NA)[0-9]{8}$" required>
    <input type="email" name="email" placeholder="Enter your email" required>
    <input type="password" name="password" placeholder="Enter your password" required>
    <input type="password" name="confirmPassword" placeholder="confirm password" required>
    
    <input type="submit" name="submit" value="Register Now" class="form-button">
    <p>already have an account? <a href="login_form.php">Login Now</a></p>

    </form>

    </div>
    
</body>
</html>