<?php
session_start();
require '../inc/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

    // Sanitzation
    $name = trim(htmlspecialchars(htmlentities($_POST['name']))) ;
    $email = trim(htmlspecialchars(htmlentities($_POST['email'])));
    $mobile = trim(htmlspecialchars(htmlentities($_POST['mobile'])));
    $password = password_hash(trim(htmlspecialchars(htmlentities($_POST['password']))),PASSWORD_DEFAULT);


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

