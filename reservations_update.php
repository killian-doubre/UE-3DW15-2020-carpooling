<?php

use App\Controllers\ReservationsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ReservationsController();
echo $controller->updateReservations();
?>

<p>Mise à jour de la réservation</p>
<form method="post" action="reservations_updare.php" name ="reservationsUpdateForm">
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