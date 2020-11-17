<?php

use App\Controllers\AdsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AdsController();
echo $controller->updateAd();
?>

<p>Mise à jour de l'annonce</p>
<form method="post" action="ads_updare.php" name ="adUpdateForm">
    <label for="idannonce">ID Annonce :</label>
    <input type="text" name="idannonce">
    <br />
    <label for="title">Titre :</label>
    <input type="text" name="title">
    <br />
    <label for="description">Description :</label>
    <input type="text" name="description">
    <br />
    <label for="car">Numéro de voiture :</label>
    <input type="text" name="car">
    <br />
    <label for="price">Prix :</label>
    <input type="number" name="price">
    <br />
    <label for="start">Depart :</label>
    <input type="text" name="start">
    <br />
    <label for="destination">Destination :</label>
    <input type="text" name="destination">
    <br />
    <label for="departureDate">Date du voyage au format dd-mm-yyyy :</label>
    <input type="text" name="departureDate">
    <br />
    <input type="submit" value="Modifier l'annonce">
</form>