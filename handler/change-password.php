<?php
session_start();
include '../inc/db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $old_pass = filter_var($_POST['old_password'], FILTER_SANITIZE_STRING);
    $new_pass = filter_var($_POST['new_password'], FILTER_SANITIZE_STRING);
    $confirm_pass = filter_var($_POST['confirm_password'], FILTER_SANITIZE_STRING);


    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_SESSION['user_email']]);
    $data = $stmt->fetchObject();


    if ($data) {

        $check = password_verify($old_pass, $data->password);
        if ($check) {

            if ($new_pass === $confirm_pass) {

                $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
                $sql = "UPDATE users SET password=? WHERE email=?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$new_pass, $_SESSION['user_email']]);

                $_SESSION['success'] = "Password Changed Successfully :)";
                header("location:../change-password.php");
                die();
            } else {
                $_SESSION['error'] = "The Password doesn't match the Confirm!";
                header("location:../change-password.php");
            }
        } else {
            $_SESSION['error'] = "Your Old Password is Not Correct!";
            header("location:../change-password.php");
        }
    }








    //
} else {
    $_SESSION['error'] = "Sorry, Something Went Wrong!!!";
    header("location:../change-password.php");
}
