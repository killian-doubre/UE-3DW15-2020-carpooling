<?php

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarsController();
echo $controller->updateCar();
?>

<p>Mise à jour de la voiture</p>
<form method="post" action="cars_updare.php" name ="carsUpdateForm">
    <label for="idcar">ID de la voiture :</label>
    <input type="text" name="idcar">
    <br />
    <label for="marque">Marque de la voiture :</label>
    <input type="text" name="marque">
    <br />
    <label for="modele">Modèle de la voiture :</label>
    <input type="text" name="modele">
    <br />
    <label for="couleur">Couleur de la voiture :</label>
    <input type="text" name="couleur">
    <br />
    <label for="typemoteur">Type du moteur (essence, diesel, éléctrique) :</label>
    <input type="text" name="typemoteur">
    <br />
    <label for="author">ID auteur :</label>
    <input type="text" name="author">
    <br />
    <input type="submit" value="Modifier une voiture">
</form>