<?php

namespace App;

class CarService
{
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

    public function getCars(): array
    {
        $cars = [];

        // Get animals from database :
        $databaseService = new DataBaseService();
        $carsDTO = $databaseService->getCars();

        // Get objects from array :
        foreach ($carsDTO as $carDTO) {
            $car = new CarModel();
            if (!empty($carDTO['id'])) {
                $car->setId($carDTO['id']);
            }
            if (!empty($carDTO['marque'])) {
                $car->setMarque($carDTO['marque']);
            }
            if (!empty($carDTO['modele'])) {
                $car->setModele($carDTO['modele']);
            }
            if (!empty($carDTO['couleur'])) {
                $car->setCouleur($carDTO['couleur']);
            }
            if (!empty($carDTO['typeMoteur'])) {
                $car->setTypeMoteur($carDTO['typeMoteur']);
            }
            if (!empty($carDTO['author'])) {
                $car->setAuthor($carDTO['author']);
            }
            
            $cars[] = $car;
        }

        return $cars;
    }
}
