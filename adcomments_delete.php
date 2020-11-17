<?php

use App\Controllers\AdCommentsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AdCommentsController();
echo $controller->deleteAdComment();
?>

<p>Supression d'un commentaire</p>
<form method="post" action="adcomments_delete.php" name="adCommentDeleteForm">
    <label for="id">Id Commentaire:</label>
    <input type="text" name="id">
    <br />
    <input type="submit" value="Supprimer un commentaire">
</form>