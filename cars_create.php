<?php

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarsController();
echo $controller->createCar();
?>

<p>Ajouter une voiture</p>
<form method="post" action="cars_create.php" name ="carsCreateForm">
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
    <input type="submit" value="Ajouter une voiture">
</form>