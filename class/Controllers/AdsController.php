<?php

namespace App\Controllers;

use App\Services\AdsService;

class AdsController
{
    /**
     * Return the html for the create action.
     */
    public function createAd(): string
    {
        $html = 'Veuillez remplir tous les champs du formulaire';

        // If the form have been submitted :
        if (!empty($_POST['idauthor']) &&
            !empty($_POST['title']) &&
            !empty($_POST['description']) &&
            !empty($_POST['car']) &&
            !empty($_POST['price']) &&
            !empty($_POST['start']) &&
            !empty($_POST['destination']) &&
            !empty($_POST['departureDate'])) {
            // Create the user :
            $adsService = new AdsService();
            $isOk = $adsService->setAd(
                null,
                $_POST['idauthor'],
                $_POST['title'],
                $_POST['description'],
                $_POST['car'],
                $_POST['price'],
                $_POST['start'],
                $_POST['destination'],
                $_POST['departureDate']
            );
            if ($isOk) {
                $html = 'Utilisateur créé avec succès.';
            } else {
                $html = 'Erreur lors de la création de l\'utilisateur.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getAds(): string
    {
        $html = 'Veuillez remplir tous les champs du formulaire';

        // Get all users :
        $adsService = new AdsService();
        $ads = $adsService->getAds();

        // Get html :
        foreach ($ads as $ad) {
            $html .=
                '#' . $ad->getId() . ' ' .
                $ad->getIdAuthor() . ' ' .
                $ad->getTitle() . ' ' .
                $ad->getDescription() . ' ' .
                $ad->getCar() . ' ' .
                $ad->getPrice() . ' ' .
                $ad->getStart() . ' ' .
                $ad->getDestination() . ' ' .
                $ad->getDate()->format('Y-m-d') . '<br />';
        }

        return $html;
    }

    /**
     * Update the user.
     */
    public function updateAd(): string
    {
        $html = 'Veuillez remplir tous les champs du formulaire';

        // If the form have been submitted :
        if (!empty($_POST['id']) &&
            !empty($_POST['idauthor']) &&
            !empty($_POST['title']) &&
            !empty($_POST['description']) &&
            !empty($_POST['car']) &&
            !empty($_POST['price']) &&
            !empty($_POST['start']) &&
            !empty($_POST['destination']) &&
            !empty($_POST['departureDate'])) {
            // Update the user :
            $adsService = new AdsService();
            $isOk = $adsService->setAd(
                $_POST['id'],
                $_POST['idauthor'],
                $_POST['title'],
                $_POST['description'],
                $_POST['car'],
                $_POST['price'],
                $_POST['start'],
                $_POST['destination'],
                $_POST['departureDate']
            );
            if ($isOk) {
                $html = 'Annonce mis à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de l\'annonce.';
            }
        }

        return $html;
    }

    /**
     * Delete an ad.
     */
    public function deleteAd(): string
    {
        $html = 'Veuillez remplir tous les champs du formulaire';

        // If the form have been submitted :
        if (!empty($_POST['id'])) {
            // Delete the ad :
            $adsService = new AdsService();
            $isOk = $adsService->deleteAd($_POST['id']);
            if ($isOk) {
                $html = 'Annonce supprimée avec succès.';
            } else {
                $html = 'Erreur lors de la supression de l\'annonce.';
            }
        }

        return $html;
    }
}
