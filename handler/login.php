<?php
session_start();
require '../inc/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {


    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);

    //Check if email & pass in the database or not
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);

    $data = $stmt->fetchObject();

    if ($data) {

        $check = password_verify($password, $data->password);

        if ($check) {

            $_SESSION['user_id'] = $data->id;
            $_SESSION['user_name'] = $data->name;
            $_SESSION['user_email'] = $data->email;
            $_SESSION['user_mobile'] = $data->mobile;

            header("location:../index.php");
            die();
        } else {
            $_SESSION['error'] = "Incorrect Password";
        }
    } else {
        $_SESSION['error'] = 'Incorrect Email ';
    }
} else {
    $_SESSION['error'] = "Something Went Wrong";
}

header("location:../login.php");
