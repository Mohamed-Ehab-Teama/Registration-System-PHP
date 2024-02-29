<?php
session_start();
require '../inc/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

    // Sanitzation
    $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $mobile = filter_var($_POST['mobile'],FILTER_SANITIZE_STRING);
    $password = password_hash(filter_var($_POST['password'],FILTER_SANITIZE_STRING),PASSWORD_DEFAULT);


    //insert data into database:
    $sql = "INSERT INTO users (name,email,mobile,password) VALUES (?,?,?,?)";
    $smt = $pdo->prepare($sql);
    $smt->execute([$name,$email,$mobile,$password]);

    //Store success message in session:
    $_SESSION['success'] = "Registered Successfully";


}else{
    $_SESSION['error'] = "Something Went Wrong, please Try again!!!";
}

header("location:../register.php");

