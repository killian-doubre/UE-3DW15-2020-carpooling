<?php

namespace App\Entities;


class AdReservation
{
    private $id;
    private $idProprietaire;
    private $idCovoitureur;
    private $idAnnonce;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getIdProprietaire(): string
    {
        return $this->idProprietaire;
    }

    public function setIdProprietaire(string $idProprietaire): void
    {
        $this->idProprietaire = $idProprietaire;
    }

    public function getIdCovoitureur(): string
    {
        return $this->idCovoitureur;
    }

    public function setIdCovoitureur(string $idCovoitureur): void
    {
        $this->idCovoitureur = $idCovoitureur;
    }    
    
    public function getIdAnnonce(): string
    {
        return $this->idAnnonce;
    }

    public function setIdAnnonce(string $idAnnonce): void
    {
        $this->idAnnonce = $idAnnonce;
    }
}
