<?php

namespace App\Entities;

use DateTime;

class Ad
{
    private $idannonce;
    private $idauthor;
    private $title;
    private $description;
    private $car;
    private $price;
    private $start;
    private $destination;
    private $departureDate;
    private $comments;


    // GET et SET de id ($id)
    public function getId(): string
    {
        return $this->idannonce;
    }

    public function setId(string $idannonce): void
    {
        $this->idannonce = $idannonce;
    }


    // GET et SET de id ($idauthor)
    public function getIdAuthor(): string
    {
        return $this->idauthor;
    }

    public function setIdAuthor(string $idauthor): void
    {
        $this->idauthor = $idauthor;
    }


    // GET et SET de id ($title)
    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }


    // GET et SET de id ($description)
    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }


    // GET et SET de id ($car)
    public function getCar(): string
    {
        return $this->car;
    }

    public function setCar(string $car): void
    {
        $this->car = $car;
    }


    // GET et SET de id ($price)
    public function getPrice(): string
    {
        return $this->price;
    }

    public function setPrice(string $price): void
    {
        $this->price = $price;
    }


    // GET et SET de id ($start)
    public function getStart(): string
    {
        return $this->start;
    }

    public function setStart(string $start): void
    {
        $this->start = $start;
    }


    // GET et SET de id ($destination)
    public function getDestination(): string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): void
    {
        $this->destination = $destination;
    }


    // GET et SET de id ($date)
    public function getDate(): DateTime
    {
        return $this->departureDate;
    }

    public function setDate(DateTime $departureDate): void
    {
        $this->departureDate = $departureDate;
    }

    // GET et SET de id ($comments)
    public function getAllComments(): array
    {
        return $this->comments;
    }
    
    public function setAllComments(array $comments): void
    {
        $this->comments = $comments;
    }
}
