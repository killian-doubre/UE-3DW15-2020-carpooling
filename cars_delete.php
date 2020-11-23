<?php

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarsController();
echo $controller->deleteCar();
?>

<p>Supprimer une voiture</p>
<form method="post" action="cars_delete.php" name ="carDeleteForm">
    <label for="idcar">Id :</label>
    <input type="text" name="idcar">
    <br />
    <input type="submit" value="Supprimer un utilisateur">
</form>