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
