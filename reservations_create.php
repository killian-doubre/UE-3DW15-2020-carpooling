<?php

use App\Controllers\ReservationsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ReservationsController();
echo $controller->createReservation();
?>

<p>Ajouter une réservation</p>
<form method="post" action="reservations_create.php" name ="reservationsCreateForm">
    <label for="idproprietaire">ID propriétaire :</label>
    <input type="text" name="idproprietaire">
    <br />
    <label for="idcovoitureur">ID covoitureur :</label>
    <input type="text" name="idcovoitureur">
    <br />
    <label for="idannonce">ID annonce :</label>
    <input type="text" name="idannonce">
    <br />
    <input type="submit" value="Ajouter une réservation">
</form>