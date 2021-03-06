<?php

namespace App\Controllers;

use App\Entities\CarModel;
use App\Services\UsersService;

class UsersController
{
    /**
     * Return the html for the create action.
     */
    public function createUser(): string
    {
        $html = '';

        // If the form have been submitted :
        if (!empty($_POST['firstname']) &&
            !empty($_POST['lastname']) &&
            !empty($_POST['email']) &&
            !empty($_POST['birthday'])) {
            // Create the user :
            $usersService = new UsersService();
            $isOk = $usersService->setUser(
                null,
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['email'],
                $_POST['birthday']
            );
            if ($isOk) {
                $html = 'Utilisateur créé avec succès.';
            } else {
                $html = 'Erreur lors de la création de l\'utilisateur.';
            }
        } else {
            $html = 'Veuillez remplir tous les champs du formulaire';
        }


        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getUsers(): string
    {
        $html = '';

        // Get all users :
        $usersService = new UsersService();
        $users = $usersService->getUsers();

        // Get html :
        foreach ($users as $user) {
            $html .=
                '#' . $user->getId() . ' ' .
                $user->getFirstname() . ' ' .
                $user->getLastname() . ' ' .
                $user->getEmail() . ' ' .
                $user->getBirthday()->format('Y-m-d') . '<br />';
            $cars = $user->getAllCars();
            if(!empty($cars)) {
                foreach ($cars as $car) {
                    $html .=
                        '_____#' . $car->getIdCar() . ' ' .
                        $car->getMarque() . ' ' .
                        $car->getModele() . ' ' .
                        $car->getCouleur() . ' ' .
                        $car->getTypeMoteur() . '<br />';
                }
            }
            $html .= '<br /><br /><br />';
        }

        return $html;
    }

    /**
     * Update the user.
     */
    public function updateUser(): string
    {
        $html = '';

        // If the form have been submitted :
        if (!empty($_POST['id']) &&
            !empty($_POST['firstname']) &&
            !empty($_POST['lastname']) &&
            !empty($_POST['email']) &&
            !empty($_POST['birthday'])) {
            // Update the user :
            $usersService = new UsersService();
            $isOk = $usersService->setUser(
                $_POST['id'],
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['email'],
                $_POST['birthday']
            );
            if ($isOk) {
                $html = 'Utilisateur mis à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de l\'utilisateur.';
            }
        } else {
            $html = 'Veuillez remplir tous les champs du formulaire';
        }


        return $html;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(): string
    {
        $html = '';

        // If the form have been submitted :
        if (!empty($_POST['id'])) {
            // Delete the user :
            $usersService = new UsersService();
            $isOk = $usersService->deleteUser($_POST['id']);
            if ($isOk) {
                $html = 'Utilisateur supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de l\'utilisateur.';
            }
        } else {
            $html = 'Veuillez remplir tous les champs du formulaire';
        }


        return $html;
    }
}
