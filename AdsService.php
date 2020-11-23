<?php

namespace App\Services;

use App\Entities\Ad;
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

        $dataBaseService = new DataBaseService();
        $adsDTO = $dataBaseService->getAds();
        if (!empty($adsDTO)) {
            foreach ($adsDTO as $adDTO) {
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
                $ads[] = $ad;
            }
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