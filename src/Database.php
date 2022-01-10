<?php

declare(strict_types=1);

namespace App;

require_once("src/Exception/AppException.php");

use App\Exception\AppException;
use PDO;
use Throwable;

class Database
{
    private PDO $conn;
    public function __construct(array $config)
    {
        try {
            $this->createConnection($config);
        } catch (Throwable $e) {
            throw new AppException('Connection error');
        }
    }


    public function addcar($cardata):void
    {
         try {
            $nr_rej = $cardata['nr_rejestracyjny'];
            $marka = $cardata['marka'];
            $model = $cardata['model'];
            $przebieg = $cardata['przebieg'];
            $rodzaj =$cardata['rodzaj'];
            $uszkodzenia = $cardata['uszkodzenia'];
            $ilosc_miejsc = $cardata['miejsca'];
            $query = "INSERT INTO `cars` (`nr_rejestracyjny`, `marka`, `model`, `przebieg`, `stan`, `rodzaj`, `uszkodzenia`, `ilosc_miejsc`, `zdjecie`)
             VALUES ('$nr_rej', '$marka', '$model', '$przebieg', 'dostępny', '$rodzaj', '$uszkodzenia', '$ilosc_miejsc', 'images/cars/$nr_rej.jpg')";
            $result = $this->conn->query($query);
        } catch (Throwable $e) {
            throw $e;
        }
    }

    public function login($email, $pass): void
    {
        try {
            $query = "SELECT email, haslo FROM users";
            $result = $this->conn->query($query);
            $users = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($users ?? [] as $data):
                if($email == $data['email'] && $pass == $data['haslo']) {
                    $_SESSION['user'] = $email;

                }
            endforeach;
        } catch (Throwable $e) {
            throw new AppException('Błąd logowania');
        }
    }

    public function register($email, $pass, $passre, $name): void
    {
        try {
            if($pass === $passre)
            {
            $email = $this->conn->quote($email);
            $name = $this->conn->quote($name);
            $pass = $this->conn->quote($pass);
            $query = "INSERT INTO users(email, imie, haslo) VALUES($email, $name, $pass)";
            $this->conn->exec($query);
        } else {echo "Hasła nie są identyczne";}
        } catch (Throwable $e) {
            throw new AppException('Błąd rejestracji');
        }
    }

    public function changedata($email, $name): void
    {
        try {
            $email = $this->conn->quote($email);
            $name = $this->conn->quote($name);
            $query = "UPDATE `users` SET `email` = $email, `imie` = $name WHERE `users`.`email` = $email";
            $this->conn->exec($query);
        } catch (Throwable $e) {
            throw $e;
        }
    }

    public function changepass($password, $passwordre): void
    {
        try {
            if($password === $passwordre)
            {
            $pass = $this->conn->quote($password);
            $query = "UPDATE `users` SET `haslo` = $pass WHERE `email` = '{$_SESSION['user']}'";
            $this->conn->exec($query);
            } else {echo "Hasła nie są identyczne";}
        } catch (Throwable $e) {
            throw $e;
        }
    }

    public function deleteUser($email): void
    {
        try {
            $email = $this->conn->quote($email);
            $query = "DELETE FROM `users` WHERE `users`.`email` = $email";
            unset($_SESSION['user']);
            $this->conn->exec($query);
        } catch (Throwable $e) {
            throw new AppException('Błąd rejestracji');
        }
    }

    public function changestatecar($cardata):void
    {
         try {
            $nr_rej = $this->conn->quote($cardata['nr_rejestracyjny']);
            $stan = $this->conn->quote($cardata['stan']);

            //Kopiowanie zakończonych najmów/rezerwacji do archiwalnej tabelii
            if($stan === "'wynajęte'" || $stan === "'zarezerwowane'" || $stan === "'dostępny'")
            {
                $query3 = "INSERT INTO `najmy/rezerwacje_stare`
                SELECT * FROM `najmy/rezerwacje`
                WHERE `nr_rejestracyjny` = $nr_rej";
                $this->conn->query($query3);

                $query4 = "DELETE FROM `najmy/rezerwacje` WHERE `nr_rejestracyjny` = $nr_rej";
                $this->conn->query($query4);
            }

            if($stan === "'wynajęte'" || $stan === "'zarezerwowane'")
            {
                if($_SESSION['user'] === 'admin@admin.pl') $email = $cardata['e-mail'];
                else $email = $_SESSION['user'];

                $data_wynajmu = $this->conn->quote($cardata['data_wynajmu']);
                $data_zwrotu = $this->conn->quote($cardata['data_zwrotu']);

                $query2 = "INSERT INTO `najmy/rezerwacje` (`id`, `nr_rejestracyjny`, `e-mail`, `od`, `do`, `rodzaj`) VALUES (NULL, $nr_rej, '$email', $data_wynajmu, $data_zwrotu, $stan)";
                $this->conn->query($query2);
            }

            $query = "UPDATE `cars` SET `stan` = $stan WHERE `cars`.`nr_rejestracyjny` = $nr_rej";
            $this->conn->query($query);

        } catch (Throwable $e) {
            throw $e;
            throw new AppException('Błąd dodawania samochodu do bazy');
        }
    }

    public function deleteCar($nrRej): void
    {
        try {
            $nrRej = $this->conn->quote($nrRej);
            $query = "DELETE FROM `cars` WHERE `cars`.`nr_rejestracyjny` = $nrRej";
            $this->conn->exec($query);
        } catch (Throwable $e) {
            throw $e;
        }
    }

    public function getCars($carstype): array
    {
        try {
            if(empty($_GET['car']) || $_GET['car'] !== 'available'){
                $query = "SELECT * FROM cars WHERE rodzaj='$carstype'";
            } else {
                $query = "SELECT * FROM cars WHERE stan='dostępny'";
            }
            $cars= [];
            $result = $this->conn->query($query);
            $cars = $result->fetchAll(PDO::FETCH_ASSOC);
            return $cars;
        } catch (Throwable $e) {
            throw new AppException('Błąd pobierania danych o samochodach');
        }
    }

    public function getAvailableCars(): array
    {
        try {
            $query = "SELECT * FROM cars WHERE stan='dostępny'";
            $result = $this->conn->query($query);
            $allcars = $result->fetchAll(PDO::FETCH_ASSOC);
            return $allcars;
        } catch (Throwable $e) {
            throw new AppException('Błąd pobierania danych o samochodach');
        }
    }

    public function getCar($nr_car): array
    {
        try {
            $car= [];
            $query = "SELECT * FROM cars WHERE nr_rejestracyjny='$nr_car'";
            $result = $this->conn->query($query);
            $car = $result->fetchAll(PDO::FETCH_ASSOC);
            return $car;
        } catch (Throwable $e) {
            throw new AppException('Błąd pobierania danych o samochodach');
        }
    }

    private function createConnection(array $config): void
    {
        $dsn = "mysql:dbname={$config['database']};host={$config['host']}";
        $this->conn = new PDO(
            $dsn,
            $config['user'],
            $config['password']
        );
    }

    public function getTask(string $task): array
    {
        $action = '';
        try {
            if($task === 'history_of_reservation' || $task === 'current_reservation') $action = "zarezerwowane";
            else if($task === 'history_of_rent' || $task === 'current_rent') $action = "wynajęte";

            if($task == 'history_of_reservation' || $task == 'history_of_rent')
            {

                $query = "SELECT * FROM `najmy/rezerwacje_stare` WHERE `rodzaj` = '$action'";
                $result = $this->conn->query($query);
                $task = $result->fetchAll(PDO::FETCH_ASSOC);
            }
            else if($task == 'current_reservation' || $task == 'current_rent')
            {
                $query = "SELECT * FROM `najmy/rezerwacje` WHERE `rodzaj` = '$action'";
                $result = $this->conn->query($query);
                $task = $result->fetchAll(PDO::FETCH_ASSOC);
            }
            else if ($task == 'manage_accounts') {
                $query = "SELECT * FROM `users`";
                $result = $this->conn->query($query);
                $task = $result->fetchAll(PDO::FETCH_ASSOC);
            }
            else if ($task == 'userdata') {
                $query = "SELECT * FROM `users` WHERE `email` = '{$_SESSION['user']}'";
                $result = $this->conn->query($query);
                $task = $result->fetchAll(PDO::FETCH_ASSOC);
            }
            else if ($task == 'userhistory') {
                $query = "SELECT * FROM `najmy/rezerwacje_stare` WHERE `e-mail` = '{$_SESSION['user']}'";
                $result = $this->conn->query($query);
                $task = $result->fetchAll(PDO::FETCH_ASSOC);
            }
            else if ($task == 'current') {
                $query = "SELECT * FROM `najmy/rezerwacje` WHERE `e-mail` = '{$_SESSION['user']}'";
                $result = $this->conn->query($query);
                $task = $result->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                $task = [];
            }

            return $task;
        } catch (Throwable $e) {
            throw $e;
            throw new AppException('Błąd zapytania bazy danych');
        }
    }
}