<?php

use App\Controllers\ReservationsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ReservationsController();
echo $controller->deleteReservation();
?>

<p>Supprimer une réservation</p>
<form method="post" action="reservations_delete.php" name ="reservationsDeleteForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <input type="submit" value="Supprimer une réservation">
</form>