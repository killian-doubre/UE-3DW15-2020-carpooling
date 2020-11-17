<?php

namespace App\Services;

class AdReservation
{
    public function setReservation(?string $id, string $idProprietaire, string $idCovoitureur, string $idAnnonce): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $isOk = $dataBaseService->createCar($id, $idProprietaire, $idCovoitureur, $idAnnonce);
        } else {
            $isOk = $dataBaseService->updateCar($id, $idProprietaire, $idCovoitureur, $idAnnonce);
        }

        return $isOk;
    }

    public function getAdReservation(): array
    {
        $reservations = [];

        // Get animals from database :
        $databaseService = new DataBaseService();
        $reservationsDTO = $databaseService->getAdReservation();

        // Get objects from array :
        foreach ($reservationsDTO as $reservationDTO) {
            $reservation = new adReservation();
            if (!empty($reservationDTO['id'])) {
                $reservation->setId($reservationDTO['id']);
            }
            if (!empty($reservationDTO['idProprietaire'])) {
                $reservation->setIdProprietaire($reservationDTO['idProprietaire']);
            }
            if (!empty($reservationDTO['idCovoitureur'])) {
                $reservation->setIdCovoitureur($reservationDTO['idCovoitureur']);
            }
            if (!empty($reservationDTO['idAnnonce'])) {
                $reservation->setIdAnnonce($reservationDTO['idAnnonce']);
            }
            
            $reservations[] = $reservation;
        }

        return $reservations;
    }
}
