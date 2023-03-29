<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div>
    <h1>Register</h1>
    <p>Already have an account?  
        <a href="login.php">Login here!</a>
    </p>
    <form action="includes/registerscript.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="confirmPassword" placeholder="Confirm Password">
        <button type="submit" name="submit">REGIStER</button>
    </form>
    </div>
</body>
</html>