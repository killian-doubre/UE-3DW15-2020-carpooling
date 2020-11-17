<?php

namespace App\Controllers;

use App\Services\CarService;

class CarsController
{
    /**
     * Return the html for the create action.
     */
    public function createCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['marque']) &&
            isset($_POST['modele']) &&
            isset($_POST['couleur']) &&
            isset($_POST['typemoteur']) &&
            isset($_POST['author'])) {
            // Create the car :
            $carsService = new CarService();
            $isOk = $carsService->setCar(
                null,
                $_POST['marque'],
                $_POST['modele'],
                $_POST['couleur'],
                $_POST['typemoteur'],
                $_POST['author']
            );
            if ($isOk) {
                $html = 'Voiture créé avec succès.';
            } else {
                $html = 'Erreur lors de la création de la voiture.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getCars(): string
    {
        $html = '';

        // Get all cars :
        $carsService = new CarService();
        $cars = $carsService->getCars();

        // Get html :
        foreach ($cars as $car) {
            $html .=
                '#' . $car->getIdCar() . ' ' .
                $car->getMarque() . ' ' .
                $car->getLastname() . ' ' .
                $car->getModele() . ' ' .
                $car->getCouleur() . ' ' .
                $car->getTypeMoteur() . ' ' .
                $car->getAuthor() . '<br />';
        }

        return $html;
    }

    /**
     * Update the car.
     */
    public function updateCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['idcar']) &&
            isset($_POST['marque']) &&
            isset($_POST['modele']) &&
            isset($_POST['typemoteur']) &&
            isset($_POST['author'])) {
            // Update the car :
            $carsService = new CarService();
            $isOk = $carsService->setCar(
                $_POST['idcar'],
                $_POST['marque'],
                $_POST['modele'],
                $_POST['couleur'],
                $_POST['typemoteur'],
                $_POST['author']
            );
            if ($isOk) {
                $html = 'Voiture mise à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de la voiture.';
            }
        }

        return $html;
    }

    /**
     * Delete a car.
     */
    public function deleteCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['idcar'])) {
            // Delete the car :
            $carsService = new CarService();
            $isOk = $carsService->deleteCar($_POST['idcar']);
            if ($isOk) {
                $html = 'Voiture supprimée avec succès.';
            } else {
                $html = 'Erreur lors de la supression de la voiture.';
            }
        }

        return $html;
    }
}
