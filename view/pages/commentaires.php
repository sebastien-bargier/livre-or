<?php require 'controller/commentairesCTRL.php'; ?>

<form action="#" method="GET">
    <label for="commentaire">Laisser votre commentaire : </label>
    <textarea name="commentaire"></textarea>

    <input type="submit" class="btn" name="valider" value="Valider">
    <br />
    <p class='error'><?= $msg['erreur'] ?></P>
    <p class='valid'><?= $msg['valid'] ?></P>
</form>