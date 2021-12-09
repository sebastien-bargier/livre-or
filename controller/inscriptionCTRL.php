<?php
require 'model/model.php';

$msg['login'] = "";
$msg['pwd'] = "";
$msg['c-pwd'] = "";

if(isset($_POST['ins']) && $_POST['ins'] == 'S\'inscrire') {

    $login = htmlentities($_POST['login']);
    $pwd = htmlentities($_POST['password']);

    $db = mysqli_connect('localhost','root','','livreor');
    $sql = mysqli_query($db, "SELECT * FROM utilisateurs WHERE login = '".$_POST['login']."'");
    
    if(mysqli_num_rows($sql)) {
        $msg['login'] = "Ce login est déjà utilisé.";

    } else if(!empty($_POST['login']) && !empty($_POST['password'])) {

        if ($_POST["password"] == $_POST["confirm-password"]) {
            $stmt = insertUser($login, $pwd);
            header('Location: connexion.php');
        } else {
            $msg['pwd'] = "Les mots de passe ne correspondent pas";
        }

    } else {     
        if (empty($_POST['login'])) {
            $msg['login'] = "Veuillez entrer un login";
        }

        if (empty($_POST['password'])) {
            $msg['pwd'] = "Veuillez entrer un mot de passe";
        }

        if (empty($_POST['confirm-password'])) {
            $msg['c-pwd'] = "Veuillez confirmer le mot de passe";
        }
    }
}