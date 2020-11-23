<?php

namespace App\Entities;

use DateTime;

class User
{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $birthday;
    private $cars;


    // GET et SET de id ($id)
    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }


    // GET et SET de id ($firstname)
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }


    // GET et SET de id ($lastname)
    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }


    // GET et SET de id ($email)
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }


    // GET et SET de id ($birthday)
    public function getBirthday(): DateTime
    {
        return $this->birthday;
    }

    public function setBirthday(DateTime $birthday): void
    {
        $this->birthday = $birthday;
    }


    // GET et SET de id ($cars)
    public function getAllCars(): array
    {
        return $this->cars;
    }
    
    public function setAllCars(array $cars): void
    {
        $this->cars = $cars;
    }
}
