<?php

namespace App;

class CarModel
{
    private $idCar;
    private $marque;
    private $modele;
    private $couleur;
    private $typeMoteur;
    private $author;

    // GET et SET de id ($idCar)
    public function getIdCar(): string
    {
        return $this->idCar;
    }
    public function setIdCar(string $idCar): self
    {
        $this->idCar = $idCar;
        return $this;
    }

    // GET et SET de marque ($marque)
    public function getMarque(): string
    {
        return $this->marque;
    }
    public function setMarque(string $marque): self
    {
        $this->marque = $marque;
        return $this;
    }

    // GET et SET de modele ($modele)
    public function getModele(): string
    {
        return $this->modele;
    }
    public function setModele(string $modele): self
    {
        $this->modele = $modele;
        return $this;
    }
    
    // GET et SET de couleur ($couleur)
    public function getCouleur(): string
    {
        return $this->couleur;
    }
    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;
        return $this;
    }

    // GET et SET du type de moteur ($typeMoteur)
    public function getTypeMoteur(): string
    {
        return $this->typeMoteur;
    }
    public function setTypeMoteur(string $typeMoteur): self
    {
        $this->typeMoteur = $typeMoteur;
        return $this;
    }

    // GET et SET de l'id du propriétaire ($author)
    public function getAuthor(): string
    {
        return $this->author;
    }
    public function setAuthor(string $author): self
    {
        $this->author = $author;
        return $this;
    }
}
