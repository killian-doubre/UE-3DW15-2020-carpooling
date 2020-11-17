<?php

namespace App\Entities;

use DateTime;

class AdComment
{
    private $id;
    private $idAnnonce;
    private $author;
    private $comment;
    private $date;

    
    // GET et SET de id ($id)
    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
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


    // GET et SET de id ($author)
    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }


    // GET et SET de id ($comment)
    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }


    // GET et SET de id ($date)
    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }
}
