<?php

namespace App;

class CarService
{

    public function getCars(): array
    {
        $cars = [];

        // Get animals from database :
        $databaseService = new DataBaseService();
        $carsDTO = $databaseService->getCars();

        // Get objects from array :
        foreach ($carsDTO as $carDTO) {
            $car = new CarModel();
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
