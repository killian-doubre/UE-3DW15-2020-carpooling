<?php

use App\Controllers\AdCommentsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AdCommentsController();
echo $controller->updateAdComment();
?>

<p>Modifier un commentaire</p>
<form method="post" action="adcomments_update.php" name ="adCommentUpdateForm">
    <label for="id">ID Commentaire :</label>
    <input type="text" name="id">
    <br />
    <label for="idannonce">ID Annonce :</label>
    <input type="text" name="idannonce">
    <br />
    <label for="author">ID Auteur :</label>
    <input type="text" name="author">
    <br />
    <label for="comment">Commentaire :</label>
    <input type="text" name="comment">
    <br />
    <input type="submit" value="Editer le commentaire">
</form>