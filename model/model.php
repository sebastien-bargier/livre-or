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

function getUtilisateurs() {
    $db = dbConnect();
    $sql = "SELECT id,login,password FROM utilisateurs WHERE login='" . htmlentities($_POST['login']) .  "'";
    $request = mysqli_query($db,$sql);
    $user = mysqli_fetch_all($request,MYSQLI_ASSOC);
    return $user;
}

function getUserSession() {
    $db = dbConnect();
    $sql = "SELECT login,password FROM utilisateurs WHERE login='" . $_SESSION['user'] .  "'";
    $request = mysqli_query($db,$sql);
    $userSession = mysqli_fetch_array($request,MYSQLI_ASSOC);
    return $userSession;
}

function insertComments($commentaire, $id) {
    $db = dbConnect(); 
    $ajoutCommentaire = mysqli_prepare($db, "INSERT INTO `commentaires`(`commentaire`, `id_utilisateur`, `date`) 
                                 VALUES (?,?,NOW())");
    mysqli_stmt_bind_param($ajoutCommentaire, "ss", $commentaire, $id);
    mysqli_stmt_execute($ajoutCommentaire);
    return $ajoutCommentaire;
}

function getComments() {
    $db = dbConnect();
    $sql = "SELECT * FROM `commentaires` 
    INNER JOIN utilisateurs ON utilisateurs.id = commentaires.id_utilisateur
    ORDER BY date DESC";
    $request = mysqli_query($db,$sql);
    $afficherCommentaire = mysqli_fetch_all($request,MYSQLI_ASSOC);
    return $afficherCommentaire;
}