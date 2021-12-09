<?php

function dbConnect() {
    $db = mysqli_connect('localhost','root','','livreor');
    return $db;
}

function insertUser($login, $pwd) {
    $db = dbConnect();
    $stmt = mysqli_prepare($db, "INSERT INTO utilisateurs (login, password)
            VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $login, $pwd);
    mysqli_stmt_execute($stmt);
    return $stmt;
}