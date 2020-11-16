<?php

namespace App\Services;

use DateTime;
use Exception;
use PDO;

class DataBaseService
{
    const HOST = '127.0.0.1';
    const PORT = '3306';
    const DATABASE_NAME = 'carpooling';
    const MYSQL_USER = 'root';
    const MYSQL_PASSWORD = 'password';

    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                'mysql:host=' . self::HOST . ';port=' . self::PORT . ';dbname=' . self::DATABASE_NAME,
                self::MYSQL_USER,
                self::MYSQL_PASSWORD
            );
            $this->connection->exec("SET CHARACTER SET utf8");
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    /**
     * Create an user.
     */
    public function createUser(string $firstname, string $lastname, string $email, DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::RFC3339),
        ];
        $sql = 'INSERT INTO users (firstname, lastname, email, birthday) VALUES (:firstname, :lastname, :email, :birthday)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all users.
     */
    public function getUsers(): array
    {
        $users = [];

        $sql = 'SELECT * FROM users';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $users = $results;
        }

        return $users;
    }

    /**
     * Update an user.
     */
    public function updateUser(string $id, string $firstname, string $lastname, string $email, DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::RFC3339),
        ];
        $sql = 'UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, birthday = :birthday WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM users WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }





    /**
     * Create an Ad.
     */
    public function createAd(string $title, string $description, string $car, int $price, string $start, string $destination,
    DateTime $departureDate): bool
    {
        $isOk = false;

        $data = [
            'title' => $title,
            'description' => $description,
            'car' => $car,
            'price' => $price,
            'start' => $start,
            'destination' => $destination,
            'departureDate' => $departureDate->format(DateTime::RFC3339),
        ];
        $sql = 'INSERT INTO ads (title, description, car, price, start, destination, departureDate) VALUES (:title, :description, :car, :price
        , :start, :destination, :departureDate)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all Ads.
     */
    public function getAds(): array
    {
        $ads = [];

        $sql = 'SELECT * FROM ads';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $ads = $results;
        }

        return $ads;
    }

    /**
     * Update an Ad.
     */
    public function updateAd(string $id, string $title, string $description, string $car, int $price, string $start, string $destination,
    DateTime $departureDate): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'car' => $car,
            'price' => $price,
            'start' => $start,
            'destination' => $destination,
            'departureDate' => $departureDate->format(DateTime::RFC3339),
        ];
        $sql = 'UPDATE users SET id = :id, title = :title, description = :description, car = :car, price = :price, start = :start,
        destination = :destination, departureDate = :departureDate WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an Ad.
     */
    public function deleteAd(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM ads WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }





    /**
     * Create an AdComment.
     */
    public function createAdComment(string $idAnnonce, string $author, string $comment, DateTime $date): bool
    {
        $isOk = false;

        $data = [
            'idannonce' => $idAnnonce,
            'author' => $author,
            'comment' => $comment,
            'date' => $date->format(DateTime::RFC3339),
        ];
        $sql = 'INSERT INTO adComments (idannonce, author, comment, date) VALUES (:idannonce, :author, :comment, :date)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all Ads.
     */
    public function getAdComments(): array
    {
        $adComments = [];

        $sql = 'SELECT * FROM adComments';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $adComments = $results;
        }

        return $adComments;
    }

    /**
     * Update an Ad.
     */
    public function updateAdComment(string $id, string $idAnnonce, string $author, string $comment, DateTime $date): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'idannonce' => $idAnnonce,
            'author' => $author,
            'comment' => $comment,
            'date' => $date->format(DateTime::RFC3339),
        ];
        $sql = 'UPDATE adComments SET id = :id, idannonce = :idannonce, author = :author, comment = :comment, date = :date WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an Ad.
     */
    public function deleteAdComment(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM adComments WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
}
