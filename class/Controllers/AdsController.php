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
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['title']) &&
            isset($_POST['description']) &&
            isset($_POST['car']) &&
            isset($_POST['price']) &&
            isset($_POST['start']) &&
            isset($_POST['destination']) &&
            isset($_POST['departureDate'])) {
            // Create the user :
            $adsService = new AdsService();
            $isOk = $adsService->setAd(
                null,
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
        $html = '';

        // Get all users :
        $adsService = new AdsService();
        $ads = $adsService->getAds();

        // Get html :
        foreach ($ads as $ad) {
            $html .=
                '#' . $ad->getId() . ' ' .
                $ad->getTitle() . ' ' .
                $ad->getDescription() . ' ' .
                $ad->getCar() . ' ' .
                $ad->getPrice() . ' ' .
                $ad->getStart() . ' ' .
                $ad->getDestination() . ' ' .
                $ad->getDate()->format('d-m-Y') . '<br />';
        }

        return $html;
    }

    /**
     * Update the user.
     */
    public function updateAd(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['title']) &&
            isset($_POST['description']) &&
            isset($_POST['car']) &&
            isset($_POST['price']) &&
            isset($_POST['start']) &&
            isset($_POST['destination']) &&
            isset($_POST['departureDate'])) {
            // Update the user :
            $adsService = new AdsService();
            $isOk = $adsService->setAd(
                $_POST['id'],
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
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
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
