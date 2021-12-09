<?php
require 'model/model.php';

$msg['login'] = "";
$msg['valid'] = "";
$msg['pwd'] = "";
$msg['c-pwd'] = "";

$userSession = getUserSession();

if(isset($_POST['mod']) && isset($_POST['mod']) == 'Modifier') {
    
    $db = mysqli_connect('localhost','root','','livreor');
    $sql = mysqli_query($db, "SELECT * FROM utilisateurs WHERE login = '".$_POST['login']."'");
    if(mysqli_num_rows($sql) && $_POST['login'] != $_SESSION['user']) {
        $msg['login'] = "Ce login est déjà utilisé.";

    } else {

        $login = htmlspecialchars($_POST['login']);
        $pwd = htmlspecialchars($_POST['password']);

        $updateUser = updateUser($login, $pwd);
    
        if($updateUser) {
            $_SESSION['user'] = $_POST['login'];
    
            if ($_POST["password"] == $_POST["confirm-password"]) {
    
                $msg['valid'] = "Votre profil est mis à jour avec succès.";
                header('refresh: 2');
            } else {
                $msg['pwd'] = "Les mots de passe ne correspondent pas";
            }
        }
    }
}