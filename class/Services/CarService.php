<?php

namespace App\Services;

use App\CarModel;

class CarService
{
    /**
     * Create or update a car.
     */
    public function setCar(?string $idCar, string $marque, string $modele, string $typeMoteur, string $couleur, string $author): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        if (empty($idCar)) {
            $isOk = $dataBaseService->createCar($idCar, $marque, $modele, $typeMoteur, $couleur, $author);
        } else {
            $isOk = $dataBaseService->updateCar($idCar, $marque, $modele, $typeMoteur, $couleur, $author);
        }

        return $isOk;
    }

    /**
     * Get all cars.
     */
    public function getCars(): array
    {
        $cars = [];

        $databaseService = new DataBaseService();
        $carsDTO = $databaseService->getCars();

        if (!empty($carsDTO)) {
            foreach ($carsDTO as $carDTO) {
                $car = new CarModel();
                $car->setIdCar($carsDTO['id']);
                $car->setMarque($carsDTO['marque']);
                $car->setModele($carsDTO['modele']);
                $car->setCouleur($carsDTO['couleur']);
                $car->setTypeMoteur($carsDTO['typeMoteur']);
                $car->setAuthor($carsDTO['author']);
                $cars[] = $car;
            }
        }

        return $cars;
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
