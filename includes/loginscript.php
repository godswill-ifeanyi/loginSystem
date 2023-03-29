<?php

if (isset($_POST['submit'])) {
    require 'database.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        header("Location: ../login.php?error=emptyfields");
        exist();
    } else {
        $sql = "SELECT * FROM users WHERE  username = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php?error=sqlerror");
            exist();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $passCheck = password_verify($password, $row['password']);
                if ($passCheck == false) {
                    header("Location: ../login.php?error=wrongpassword");
                    exist();
                } elseif ($passCheck == true) {
                    session_start();
                    $_SESSION['sessionid'] = $row['id'];
                    $_SESSION['sessionuser'] = $row['username'];
                    header("Location: ../index.php?success=logged");
                    exist();
                } else {
                    header("Location: ../login.php?error=wrongpassword");
                    exist();
                }

            } else {
                header("Location: ../login.php?error=nouserfound");
                exist();
            }
        }
    }

} else {
    header("Location: ../index.php?error=accessforbidden");
    exist();
}

?>
