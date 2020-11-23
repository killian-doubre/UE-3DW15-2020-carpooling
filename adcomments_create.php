<?php

use App\Controllers\AdCommentsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AdCommentsController();
echo $controller->createAdComment();
?>

<p>Poster un commentaire</p>
<form method="post" action="adcomments_create.php" name ="adCommentCreateForm">
    <label for="idannonce">ID Annonce :</label>
    <input type="text" name="idannonce">
    <br />
    <label for="author">ID Auteur :</label>
    <input type="text" name="author">
    <br />
    <label for="comment">Commentaire :</label>
    <input type="text" name="comment">
    <br />
    <input type="submit" value="Poster un commentaire">
</form>