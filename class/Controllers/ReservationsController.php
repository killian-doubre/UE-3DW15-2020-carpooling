<?php

namespace App\Controllers;

use App\Services\ReservationService;

class ReservationsController
{
    /**
     * Return the html for the create action.
     */
    public function createReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (!empty($_POST['idproprietaire']) &&
            !empty($_POST['idcovoitureur']) &&
            !empty($_POST['idannonce'])) {
            // Create the reservation :
            $reservationsService = new ReservationService();
            $isOk = $reservationsService->setReservation(
                null,
                $_POST['idproprietaire'],
                $_POST['idcovoitureur'],
                $_POST['idannonce']
            );
            if ($isOk) {
                $html = 'La réservation a été créé avec succès.';
            } else {
                $html = 'Erreur lors de la création de la réservation.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getReservations(): string
    {
        $html = '';

        // Get all reservations :
        $reservationsService = new ReservationService();
        $reservations = $reservationsService->getReservation();

        // Get html :
        foreach ($reservations as $reservation) {
            $html .=
                '#' . $reservation->getId() . ' ' .
                $reservation->getIdProprietaire() . ' ' .
                $reservation->getIdCovoitureur() . ' ' .
                $reservation->getIdAnnonce() . '<br />';
        }

        return $html;
    }

    /**
     * Update the reservation.
     */
    public function updateReservations(): string
    {
        $html = '';

        // If the form have been submitted :
        if (!empty($_POST['id']) &&
            !empty($_POST['idproprietaire']) &&
            !empty($_POST['idcovoitureur']) &&
            !empty($_POST['idannonce'])) {
            // Update the reservation :
            $reservationsService = new ReservationService();
            $isOk = $reservationsService->setReservation(
                $_POST['id'],
                $_POST['idproprietaire'],
                $_POST['idcovoitureur'],
                $_POST['idannonce']
            );
            if ($isOk) {
                $html = 'Réservation mise à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de la réservation.';
            }
        }

        return $html;
    }

    /**
     * Delete a reservation.
     */
    public function deleteReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (!empty($_POST['id'])) {
            // Delete the reservation :
            $reservationsService = new ReservationService();
            $isOk = $reservationsService->deleteReservation($_POST['id']);
            if ($isOk) {
                $html = 'Reservation supprimée avec succès.';
            } else {
                $html = 'Erreur lors de la supression de la réservation.';
            }
        }

        return $html;
    }
}
