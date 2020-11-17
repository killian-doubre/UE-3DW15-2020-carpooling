<?php

namespace App\Services;

use App\Entities\Reservation;

class ReservationService
{
    /**
     * Create or update a reservation.
     */
    public function setReservation(?string $id, string $idProprietaire, string $idCovoitureur, string $idAnnonce): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $isOk = $dataBaseService->createReservation($id, $idProprietaire, $idCovoitureur, $idAnnonce);
        } else {
            $isOk = $dataBaseService->updateReservation($id, $idProprietaire, $idCovoitureur, $idAnnonce);
        }

        return $isOk;
    }

    /**
     * Get all reservations.
     */
    public function getReservation(): array
    {
        $reservations = [];

        $databaseService = new DataBaseService();
        $reservationsDTO = $databaseService->getReservations();

        if (!empty($reservationsDTO)) {
            foreach ($reservationsDTO as $reservationDTO) {
                $reservation = new Reservation();
                $reservation->setId($reservationDTO['id']);
                $reservation->setIdProprietaire($reservationDTO['idProprietaire']);
                $reservation->setIdCovoitureur($reservationDTO['idCovoitureur']);
                $reservation->setIdAnnonce($reservationDTO['idAnnonce']);
                $reservations[] = $reservation;
            }
        }

        return $reservations;
    }

    /**
     * Delete a reservation.
     */
    public function deleteReservation(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteReservation($id);

        return $isOk;
    }
}
