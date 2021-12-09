<?php
require 'model/model.php'; 

$msg['login'] = "";
$msg['pwd'] = "";

if(isset($_POST['co']) && $_POST['co'] == 'Se Connecter') {
    
    if (!empty($_POST['login']) && !empty($_POST['password'])) {
        $user = getUtilisateurs();
            
        if(count($user)) {
            if($_POST['password'] == $user[0]['password']) {

                $_SESSION['user'] = $user[0]['login'];
                $_SESSION['id'] = $user[0]['id'];

                header('Location: ?page=accueil');
            } else {
                $msg['pwd']= "Le mot de passe est incorrect.";
            }
        } else {
            $msg['login']= "Le login est inconnu.";
        }
    }

    if (empty($_POST['login'])) {
        $msg['login'] = "Veuillez entrer votre login";
    }

    if (empty($_POST['password'])) {
        $msg['pwd'] = "Veuillez entrer votre mot de passe";
    }
}