<?php

namespace App\Services;

use App\Entities\Ad;
use App\Services\AdCommentsService;
use DateTime;

class AdsService
{
    /**
     * Create or update an Ad.
     */
    public function setAd(?string $id, string $idauthor, string $title, string $description, string $car, string $price, string $start, string $destination,
    string $departureDate): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $departureDateTime = new DateTime($departureDate);
        if (empty($id)) {
            $isOk = $dataBaseService->createAd($idauthor, $title, $description, $car, $price, $start, $destination, $departureDateTime);
        } else {
            $isOk = $dataBaseService->updateAd($id, $idauthor, $title, $description, $car, $price, $start, $destination, $departureDateTime);
        }

        return $isOk;
    }

    /**
     * Return all Ads.
     */
    public function getAds(): array
    {
        $ads = [];        
        $comments = [];
        $check = true;
        $loop = 0;
        $ad = new Ad();
        $tempId = null;

        $dataBaseService = new DataBaseService();
        $adCommentsService = new AdCommentsService();
        $adsDTO = $dataBaseService->getAds();
        if (!empty($adsDTO)) {
            foreach ($adsDTO as $adDTO) {
                $check = ($tempId != $adDTO['idannonce']);

                if($check && $loop > 0) {
                    $ad->setAllComments($comments);
                    $ads[] = $ad;
                }

                if($check) {
                    $tempId = $adDTO['idannonce'];
                    $ad = new Ad();
                    $ad->setId($adDTO['idannonce']);
                    $ad->setIdAuthor($adDTO['idauthor']);
                    $ad->setTitle($adDTO['title']);
                    $ad->setDescription($adDTO['description']);
                    $ad->setCar($adDTO['car']);
                    $ad->setPrice($adDTO['price']);
                    $ad->setStart($adDTO['start']);
                    $ad->setDestination($adDTO['destination']);
                    $date = new DateTime($adDTO['departuredate']);
                    if ($date !== false) {
                        $ad->setDate($date);
                    }
                    $comments = [];
                }

                if ($adDTO['idcom'] != null) {
                    $adComment = $adCommentsService->getAdComment($adDTO['idcom'], $adDTO['idad'], $adDTO['author'], 
                    $adDTO['comment'], $adDTO['date']);
                    $comments[] = $adComment;
                }
                $loop += 1;
            }
            $ad->setAllComments($comments);
            $ads[] = $ad;
        }

        return $ads;
    }

    /**
     * Delete an Ad.
     */
    public function deleteAd(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteAd($id);

        return $isOk;
    }
}
