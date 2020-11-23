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
     * Return all comments of an Ad.
     */
    public function getAdComments(): array
    {
        $adComments = [];

        $dataBaseService = new DataBaseService();
        $adCommentsDTO = $dataBaseService->getAdComments();
        if (!empty($adCommentsDTO)) {
            foreach ($adCommentsDTO as $adCommentDTO) {
                $adComment = new AdComment();
                $adComment->setId($adCommentDTO['id']);
                $adComment->setIdAnnonce($adCommentDTO['idannonce']);
                $adComment->setAuthor($adCommentDTO['author']);
                $adComment->setComment($adCommentDTO['comment']);
                $date = new DateTime($adCommentDTO['date']);
                if ($date !== false) {
                    $adComment->setDate($date);
                }
                $adComments[] = $adComment;
            }
        }

        return $adComments;
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
