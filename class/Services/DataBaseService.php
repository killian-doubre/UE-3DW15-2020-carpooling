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
    const MYSQL_PASSWORD = '';

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
            'birthday' => $birthday->format('Y-m-d'),
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
            'birthday' => $birthday->format(Y-m-d),
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
    public function createAd(string $idauthor, string $title, string $description, string $car, int $price, string $start, string $destination,
    DateTime $departureDate): bool
    {
        $isOk = false;

        $data = [
            'idauthor' => $idauthor,
            'title' => $title,
            'description' => $description,
            'car' => $car,
            'price' => $price,
            'start' => $start,
            'destination' => $destination,
            'departureDate' => $departureDate->format(Y-m-d),
        ];
        $sql = 'INSERT INTO ads (idauthor, title, description, car, price, start, destination, departureDate) VALUES (:idauthor, :title, :description, :car, :price
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
    public function updateAd(string $id, string $idauthor, string $title, string $description, string $car, int $price, string $start, string $destination,
    DateTime $departureDate): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'idauthor' => $idauthor,
            'title' => $title,
            'description' => $description,
            'car' => $car,
            'price' => $price,
            'start' => $start,
            'destination' => $destination,
            'departureDate' => $departureDate->format(Y-m-d),
        ];
        $sql = 'UPDATE ads SET id = :id, idauthor = :idauthor, title = :title, description = :description, car = :car, price = :price, start = :start,
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
            'date' => $date->format(Y-m-d),
        ];
        $sql = 'INSERT INTO adcomments (idannonce, author, comment, date) VALUES (:idannonce, :author, :comment, :date)';
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

        $sql = 'SELECT * FROM adcomments';
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
            'date' => $date->format(Y-m-d),
        ];
        $sql = 'UPDATE adcomments SET id = :id, idannonce = :idannonce, author = :author, comment = :comment, date = :date WHERE id = :id;';
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
        $sql = 'DELETE FROM adcomments WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }


    
    /**
     * Create an Car.
     */
    public function createCar(string $idCar, string $marque, string $modele, string $typeMoteur, string $couleur, string $author): bool
    {
        $isOk = false;

        $data = [
            'idcar' => $idCar,
            'marque' => $marque,
            'modele' => $modele,
            'typemoteur' => $typeMoteur,
            'couleur' => $couleur,
            'author' => $author,
        ];
        $sql = 'INSERT INTO cars (idcar, marque, modele, typemoteur, couleur, author) VALUES (:idCar, :marque, :modele, :typemoteur, :couleur, :author)';
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
            'idcar' => $idCar,
            'marque' => $marque,
            'modele' => $modele,
            'typemoteur' => $typeMoteur,
            'couleur' => $couleur,
            'author' => $author,
        ];
        $sql = 'UPDATE cars SET idcar = :idcar, marque = :marque, modele = :modele, typemoteur = :typemoteur, couleur = :couleur, author = :author WHERE idCar = :idCar;';
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
            'idcar' => $idCar,
        ];
        $sql = 'DELETE FROM cars WHERE idcar = :idcar;';
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
            'idproprietaire' => $idProprietaire,
            'idcovoitureur' => $idCovoitureur,
            'idannonce' => $idAnnonce,
        ];
        $sql = 'INSERT INTO reservations (id, idproprietaire, idcovoitureur, idannonce) VALUES (:id, :idproprietaire, :idcovoitureur, :idannonce)';
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

        $sql = 'SELECT * FROM reservations';
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
            'idproprietaire' => $idProprietaire,
            'idcovoitureur' => $idCovoitureur,
            'idannonce' => $idAnnonce,
        ];
        $sql = 'UPDATE reservations SET id = :id, idproprietaire = :idproprietaire, idcovoitureur = :idcovoitureur, idannonce = :idannonce WHERE id = :id;';
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
        $sql = 'DELETE FROM reservations WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
}