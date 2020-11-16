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

    /**
     * Create an Car.
     */
    public function createCar(string $idCar, string $marque, string $modele, string $typeMoteur, string $couleur, string $author): bool
    {
        $isOk = false;

        $data = [
            'idCar' => $idCar,
            'marque' => $marque,
            'modele' => $modele,
            'typeMoteur' => $typeMoteur,
            'couleur' => $couleur,
            'author' => $author,
        ];
        $sql = 'INSERT INTO Cars (idCar, marque, modele, typeMoteur, couleur, author) VALUES (:idCar, :marque, :modele, :typeMoteur, :couleur, :author)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all Cars.
     */
    public function getCars(): array
    {
        $cars = [];

        $sql = 'SELECT * FROM Cars';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $cars = $results;
        }

        return $cars;
    }

    /**
     * Update an Car.
     */
    public function updateCar(string $idCar, string $marque, string $modele, string $typeMoteur, string $couleur, string $author): bool
    {
        $isOk = false;

        $data = [
            'idCar' => $idCar,
            'marque' => $marque,
            'modele' => $modele,
            'typeMoteur' => $typeMoteur,
            'couleur' => $couleur,
            'author' => $author,
        ];
        $sql = 'UPDATE Cars SET idCar = :idCar, marque = :marque, modele = :modele, typeMoteur = :typeMoteur, couleur = :couleur, author = :author WHERE idCar = :idCar;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an Car.
     */
    public function deleteCar(string $idCar): bool
    {
        $isOk = false;

        $data = [
            'idCar' => $idCar,
        ];
        $sql = 'DELETE FROM Cars WHERE idCar = :idCar;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Create an Reservation.
     */
    public function createReservation(string $id, string $idProprietaire, string $idCovoitureur, string $idAnnonce): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'idProprietaire' => $idProprietaire,
            'idCovoitureur' => $idCovoitureur,
            'idAnnonce' => $idAnnonce,
        ];
        $sql = 'INSERT INTO Reservations (id, idProprietaire, idCovoitureur, idAnnonce) VALUES (:id, :idProprietaire, :idCovoitureur, :idAnnonce)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all Reservations.
     */
    public function getReservations(): array
    {
        $reservations = [];

        $sql = 'SELECT * FROM Reservations';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $reservations = $results;
        }

        return $reservations;
    }

    /**
     * Update an Reservation.
     */
    public function updateReservation(string $id, string $idProprietaire, string $idCovoitureur, string $idAnnonce): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'idProprietaire' => $idProprietaire,
            'idCovoitureur' => $idCovoitureur,
            'idAnnonce' => $idAnnonce,
        ];
        $sql = 'UPDATE Reservations SET id = :id, idProprietaire = :idProprietaire, idCovoitureur = :idCovoitureur, idAnnonce = :idAnnonce WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an Car.
     */
    public function deleteReservation(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM Reservations WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
}