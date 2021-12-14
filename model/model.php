<?php

function dbConnect() {
    $db = mysqli_connect('localhost','root','','livreor');
    return $db;
}

function UserExist($login) {
    $db = dbConnect();
    $sql = "SELECT login FROM utilisateurs WHERE login = '$login'";
    $result = mysqli_query($db,$sql);
    $result = mysqli_num_rows($result);
    //$result = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $result;
}

function insertUserDB($login, $pwd) {
    $db = dbConnect();
    $registrationUser = mysqli_prepare($db, "INSERT INTO utilisateurs (login, password)
            VALUES (?, ?)");
    mysqli_stmt_bind_param($registrationUser, "ss", $login, $pwd);
    mysqli_stmt_execute($registrationUser);
    return $registrationUser;
}

function getUser($login) {
    $db = dbConnect();
    $sql = "SELECT login,password FROM utilisateurs WHERE login='$login'";
    $result = mysqli_query($db,$sql);
    $user = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $user;
}

function getUserSession() {
    $db = dbConnect();
    $sql = "SELECT login,password FROM utilisateurs WHERE login='".$_SESSION['login']."'";
    $result = mysqli_query($db,$sql);
    $userSession = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $userSession;
}

function updateUser($login, $pwd) {
    $db = dbConnect();
    $sql = "UPDATE utilisateurs
            SET login = '$login',
            password = '$pwd'
            WHERE login = '".$_SESSION['login']."' ";
    $updateUser = mysqli_query($db,$sql);
    return $updateUser;
}

function insertComment($comment, $id) {
    $db = dbConnect(); 
    $addComment = mysqli_prepare($db, "INSERT INTO `commentaires`(`commentaire`, `id_utilisateur`, `date`) 
                                 VALUES (?,?,NOW())");
    mysqli_stmt_bind_param($addComment, "ss", $comment, $id);
    mysqli_stmt_execute($addComment);
    return $addComment;
}

function getComment() {
    $db = dbConnect();
    $sql = "SELECT * FROM commentaires 
    INNER JOIN utilisateurs ON utilisateurs.id = commentaires.id_utilisateur
    ORDER BY date DESC";
    $result = mysqli_query($db,$sql);
    $showComment = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $showComment;
}