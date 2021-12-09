<?php
require 'model/model.php';

$msg['erreur'] = "";
$msg['valid'] = "";

if ((isset($_GET['valider'])) && $_GET['valider'] == 'Valider') {

    if (!empty($_GET['commentaire'])) {

        $commentaire = $_GET['commentaire'];
        $id = $_SESSION['id'];

        $stmt = insertComments($commentaire, $id);

        $msg['valid']= "Votre commentaire à bien été ajouté";

    } else {
        $msg['erreur']= "Veuillez écrire un commentaire";
    }
}