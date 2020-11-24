<?php

namespace App\Services;

use App\Entities\AdComment;
use DateTime;

class AdCommentsService
{
    /**
     * Create or update an Ad Comment.
     */
    public function setAdComment(?string $id, string $idAnnonce, string $author, string $comment): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $commentDate = new DateTime("now");
        if (empty($id)) {
            $isOk = $dataBaseService->createAdComment($idAnnonce, $author, $comment, $commentDate);
        } else {
            $isOk = $dataBaseService->updateAdComment($id, $idAnnonce, $author, $comment, $commentDate);
        }

        return $isOk;
    }

    /**
     * Get an Ad Comment.
     */
    public function getAdComment(string $idCom, string $idAd, string $author, string $comment, string $date): AdComment
    {
        $adComment = new AdComment();
        $adComment->setId($idCom);
        $adComment->setIdAnnonce($idAd);
        $adComment->setAuthor($author);
        $adComment->setComment($comment);
        $date = new DateTime($date);
        if ($date !== false) {
            $adComment->setDate($date);
        }
        return $adComment;
    }

    /**
     * Delete an Ad Comment.
     */
    public function deleteAdComment(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteAdComment($id);

        return $isOk;
    }
}
