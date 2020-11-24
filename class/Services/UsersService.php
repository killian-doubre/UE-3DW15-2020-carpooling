<?php

namespace App\Services;

use App\Entities\User;
use CarServices;
use DateTime;

class UsersService
{
    /**
     * Create or update an user.
     */
    public function setUser(?string $id, string $firstname, string $lastname, string $email, string $birthday): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $birthdayDateTime = new DateTime($birthday);
        if (empty($id)) {
            $isOk = $dataBaseService->createUser($firstname, $lastname, $email, $birthdayDateTime);
        } else {
            $isOk = $dataBaseService->updateUser($id, $firstname, $lastname, $email, $birthdayDateTime);
        }

        return $isOk;
    }

    /**
     * Return all users.
     */
    public function getUsers(): array
    {
        $users = [];
        $cars = [];
        $check = true;
        $loop = 0;
        $user = new User();
        $tempId = null;

        $dataBaseService = new DataBaseService();
        $carService = new CarService();
        $usersDTO = $dataBaseService->getUsers();
        if (!empty($usersDTO)) {
            foreach ($usersDTO as $userDTO) {
                $check = ($tempId != $userDTO['id']);

                if($check && $loop > 0) {
                    $user->setAllCars($cars);
                    $users[] = $user;
                }

                if($check) {
                    $tempId = $userDTO['id'];
                    $user = new User();
                    $user->setId($userDTO['id']);
                    $user->setFirstname($userDTO['firstname']);
                    $user->setLastname($userDTO['lastname']);
                    $user->setEmail($userDTO['email']);
                    $date = new DateTime($userDTO['birthday']);
                    if ($date !== false) {
                        $user->setbirthday($date);
                    }
                    $cars = [];
                }

                if ($userDTO['idcar'] != null) {
                    $car = $carService->getCar($userDTO['idcar'], $userDTO['marque'], $userDTO['modele'], $userDTO['couleur'],
                    $userDTO['typemoteur'], $userDTO['author']);
                    $cars[] = $car;
                }
                $loop += 1;
            }
            $user->setAllCars($cars);
            $users[] = $user;
        }
        return $users;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteUser($id);

        return $isOk;
    }
}
