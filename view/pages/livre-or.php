<?php
ob_start();
require '../../model/model.php';

$afficherCommentaire = getComments();
if($_SESSION) {
    echo ('
        <a class="lienAjouterCom" href="commentaires.php">Laisser un commentaire</a>
    ');
}

?>

<?php foreach($afficherCommentaire as $commentaire => $value) { ?>
<div class="livreor">
    <p>Posté le :  <?= date("d-m-Y", strtotime($value['date'])) . ' par ' . $value['login'] . ' ' ?></p>
    <p class="line"></p>
    <p><?= $value['commentaire'] ?>
    <br />
    <br />
    <?php
    if($_SESSION) {
    echo ('
        <a  class="modifierCom" href="modifierCommentaires.php">Modifier</a>
    ');
    }
    ?>
</div>
<br />
<?php } ?>

<?php
$content = ob_get_clean();
require '../../template/template.php';
?>