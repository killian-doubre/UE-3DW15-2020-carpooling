<?php

namespace App\Controllers;

use App\Services\AdCommentsService;

class AdCommentsController
{
    /**
     * Return the html for the create action.
     */
    public function createAdComment(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['idannonce']) &&
            isset($_POST['author']) &&
            isset($_POST['comment']) &&
            isset($_POST['date'])) {
            // Create the ad comment :
            $adCommentsService = new AdCommentsService();
            $isOk = $adCommentsService->setAdComment(
                null,
                $_POST['idannonce'],
                $_POST['author'],
                $_POST['comment'],
                $_POST['date']
            );
            if ($isOk) {
                $html = 'Votre commentaire a été ajouté avec succès.';
            } else {
                $html = 'Erreur lors de la création du commentaire.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getAdComments(): string
    {
        $html = '';

        // Get all ad comments :
        $adCommentsService = new AdCommentsService();
        $ads = $adCommentsService->getAdComments();

        // Get html :
        foreach ($ads as $ad) {
            $html .=
                '#' . $ad->getId() . ' ' .
                $ad->getIdAnnonce() . ' ' .
                $ad->getAuthor() . ' ' .
                $ad->getComment() . ' ' .
                $ad->getDate()->format('d-m-Y') . '<br />';
        }

        return $html;
    }

    /**
     * Update the ad comment.
     */
    public function updateAdComment(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['idannonce']) &&
            isset($_POST['author']) &&
            isset($_POST['comment']) &&
            isset($_POST['date'])) {
            // Update the ad comment :
            $adCommentsService = new AdCommentsService();
            $isOk = $adCommentsService->setAdComment(
                $_POST['id'],
                $_POST['idannonce'],
                $_POST['author'],
                $_POST['comment'],
                $_POST['date']
            );
            if ($isOk) {
                $html = 'Le commentaire a été mis à jour avec succès !';
            } else {
                $html = 'Erreur lors de la mise à jour du commentaire.';
            }
        }

        return $html;
    }

    /**
     * Delete an ad comment.
     */
    public function deleteAdComment(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the ad comment :
            $adCommentsService = new AdCommentsService();
            $isOk = $adCommentsService->deleteAdComment($_POST['id']);
            if ($isOk) {
                $html = 'Le commentaire a été supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression du commentaire.';
            }
        }

        return $html;
    }
}
