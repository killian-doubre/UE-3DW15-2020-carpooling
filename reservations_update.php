<?php

use App\Controllers\ReservationsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ReservationsController();
echo $controller->updateReservations();
?>

<p>Mise à jour de la réservation</p>
<form method="post" action="reservations_update.php" name ="reservationsUpdateForm">
    <label for="id">ID :</label>
    <input type="text" name="id">
    <br />
    <label for="idproprietaire">ID propriétaire :</label>
    <input type="text" name="idproprietaire">
    <br />
    <label for="idcovoitureur">ID covoitureur :</label>
    <input type="text" name="idcovoitureur">
    <br />
    <label for="idannonce">ID annonce :</label>
    <input type="text" name="idannonce">
    <br />
    <input type="submit" value="Modifier une réservation">
</form>