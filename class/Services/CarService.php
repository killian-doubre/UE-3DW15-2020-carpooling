<?php

namespace App\Services;

use App\Entities\CarModel;

class CarService
{
    /**
     * Create or update a car.
     */
    public function setCar(?string $idCar, string $marque, string $modele, string $couleur, string $typeMoteur, string $author): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        if (empty($idCar)) {
            $isOk = $dataBaseService->createCar($marque, $modele, $couleur, $typeMoteur, $author);
        } else {
            $isOk = $dataBaseService->updateCar($idCar, $marque, $modele, $couleur, $typeMoteur, $author);
        }

        return $isOk;
    }

    /**
     * Delete a car.
     */
    public function deleteCar(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteCar($id);

        return $isOk;
    }
}
