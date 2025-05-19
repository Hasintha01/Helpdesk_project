<?php

//connect database
@include "makeconnection.php";

session_start();

if(isset($_POST['submit']))
{

    $userId = mysqli_real_escape_string($conn, $_POST['userId']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    
    

    $select = "SELECT userId AS id, fName AS name, email, password, 'user' AS userType FROM user WHERE userId ='$userId' AND email = '$email' AND password ='$password'
               UNION 
               SELECT adminId AS id, name AS name, email, password, 'admin' AS userType FROM admin WHERE adminId = '$userId' AND email ='$email' AND password ='$password'
               UNION
               SELECT agentId AS id, name AS name, email, password, 'agent' AS userType FROM agent WHERE agentId = '$userId' AND email ='$email' AND password ='$password'";

    $result = mysqli_query($conn,$select);

    if(mysqli_num_rows($result) > 0)
    {
      $row = mysqli_fetch_assoc($result);

      if($row['userType'] == 'admin')
        {
            $_SESSION['admin_registration'] = $row['id'];
            header('location:../Admin/admin.php'); // Redirect to admin dashboard
        }
        elseif($row['userType'] == 'user')
        {
            $_SESSION['user_registration'] = $row['id'];
            $_SESSION['user_email'] = $row['email']; 
            header('location:../onlinehelpdesk/home.php'); // Redirect to user home page
        }
        elseif($row['userType'] == 'agent')
        {
            $_SESSION['agent_registration'] = $row['id'];
            header('location:../Agent/dashboard.php'); // Redirect to agent dashboard
        }

    }
    else
    {
        $error[] = 'incorrect credentials!';
    }
    

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login_form</title>
    <link rel="icon" href="help-desk01.png" type="image/x-icon">
    <link rel="stylesheet" href="register_login_style.css">
</head>
<body>

    <div class="form_container">

    <form action="" method="post">

    <h3>Login Now</h3>

    <?php

    if(isset($error))
    {
        foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
        };
    };

    ?>

    <input type="text" name="userId" placeholder="Enter your registration No" pattern="^(IT|AC|NA|AD|AG)[0-9]{8}$" required>
    <input type="email" name="email" placeholder="Enter your email" required>
    <input type="password" name="password" placeholder="Enter your password" required>
    <input type="submit" name="submit" value="Login Now" class="form-button">
    <p>don't have an account? <a href="register_form.php">Register Now</a></p>

    </form>

    </div>
    
</body>
</html>