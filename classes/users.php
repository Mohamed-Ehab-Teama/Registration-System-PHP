<?php
require './inc/db.php';

class user
{

    public static function getAllUsers()
    {

        global $pdo;
        $sql = "SELECT * FROM users";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}
