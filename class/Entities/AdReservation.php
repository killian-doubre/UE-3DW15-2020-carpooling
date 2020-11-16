<?php

namespace App\Entities;


class AddReservation
{
    private $id;
    private $idProprietaire;
    private $idCovoitureur;

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
}
