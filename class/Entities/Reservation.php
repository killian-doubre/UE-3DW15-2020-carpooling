<?php

namespace App\Entities;


class Reservation
{
    private $id;
    private $idProprietaire;
    private $idCovoitureur;
    private $idAnnonce;


    // GET et SET de id ($id)
    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }


    // GET et SET de id ($idProprietaire)
    public function getIdProprietaire(): string
    {
        return $this->idProprietaire;
    }

    public function setIdProprietaire(string $idProprietaire): void
    {
        $this->idProprietaire = $idProprietaire;
    }


    // GET et SET de id ($idCovoitureur)
    public function getIdCovoitureur(): string
    {
        return $this->idCovoitureur;
    }

    public function setIdCovoitureur(string $idCovoitureur): void
    {
        $this->idCovoitureur = $idCovoitureur;
    }    
    

    // GET et SET de id ($idAnnonce)
    public function getIdAnnonce(): string
    {
        return $this->idAnnonce;
    }

    public function setIdAnnonce(string $idAnnonce): void
    {
        $this->idAnnonce = $idAnnonce;
    }
}
