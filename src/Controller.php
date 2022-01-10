<?php

declare(strict_types=1);

namespace App;

require_once("src/View.php");
require_once("src/Database.php");

class Controller
{
    private const DEFAULT_ACTION = 'home';
    private const DEFAULT_CARTYPE = '';
    private const DEFAULT_CAR = '';

    private static array $configuration = [];

    private Database $database;
    private array $request;
    private View $view;

    public static function initConfiguration(array $configuration): void
    {
        self::$configuration = $configuration;
    }

    public function __construct(array $request)
    {
        $this->database = new Database(self::$configuration['db']);

        $this->request = $request;
        $this->view = new View();
    }

    public function run(): void
    {
        $cars = [];
        $car = [];
        $task = [];

        switch ($this->actionPost()) {
            case 'wyślij':
                $data = $this->getRequestPost();
                mail('radoslawyt@gmail.com', $data['subject'], $data['message']);
                break;
            case 'zaloguj się':
                $this->database->login($this->email(), $this->password());
                break;
            case 'zarejestruj się':
                $this->database->register($this->email(), $this->password(), $this->passwordre(), $this->name());
                break;
            case 'Zmień dane':
                $this->database->changedata($this->email(), $this->name());
                break;
            case 'Zmień hasło':
                $this->database->changepass($this->password(), $this->passwordre());
                break;
            case 'Dodaj pojazd':
                $this->database->addcar($this->cardata());
                break;
            case 'Usuń auto':
                $this->database->deleteCar($this->nrRejes());
                break;
            case 'Usuń użytkownika':
                $this->database->deleteUser($this->email());
                break;
             case 'Wynajmij' or 'Auto uszkodzone' or 'Zakończ wynajem' or 'Auto naprawione' or 'Zarezerwój':
                $this->database->changestatecar($this->cardata());
                break;
            }
        
        switch ($this->actionGet()) {
            case 'cars':
                $page = 'cars';
                $cars = $this->database->getCars($this->cartype());
                break;
            case 'car':
                $page = 'car';
                $car = $this->database->getCar($this->car());
                break;
            case 'rent':
                $page = 'rent';
                break;
            case 'logout':
                unset($_SESSION['user']);
                $page = 'home';
            break;
            case 'register':
                $page = 'register';
            break;
            case 'login':
                $page = 'login';
            break;
            case 'settings':
                $page = 'settings';
                $task = $this->database->getTask($this->task());
                
            break;
            case 'addcar':
                $page = 'addcar';
            break;
            default:
                $page = 'home';
        }

        $this->view->render($page, $cars, $car, $task);

    }

    private function actionPost(): string
    {
        $data = $this->getRequestPost();
        return $data['action'] ?? '';
    }

    private function email(): string
    {
        $data = $this->getRequestPost();
        return $data['email'] ?? '';
    }

    private function name(): string
    {
        $data = $this->getRequestPost();
        return $data['name'] ?? '';
    }

    private function nrRejes(): string
    {
        $data = $this->getRequestPost();
        return $data['nr_rejestracyjny'] ?? '';
    }

    private function cardata(): array
    {
        $data = $this->getRequestPost();
        return $data ?? [];
    }

    private function password(): string
    {
        $data = $this->getRequestPost();
        return $data['password'] ?? '';
    }
    private function passwordre(): string
    {
        $data = $this->getRequestPost();
        return $data['passwordre'] ?? '';
    }

    private function actionGet(): string
    {
        $data = $this->getRequestGet();
        return $data['action'] ?? self::DEFAULT_ACTION;
    }

    private function cartype(): string
    {
        $data = $this->getRequestGet();
        return $data['cartype'] ?? self::DEFAULT_CARTYPE;
    }

    private function car(): string
    {
        $data = $this->getRequestGet();
        return $data['car'] ?? self::DEFAULT_CAR;
    }

    private function task(): string
    {
        $data = $this->getRequestGet();
        return $data['task'] ?? '';
    }

    private function getRequestPost(): array
    {
        return $this->request['post'] ?? [];
    }

    private function getRequestGet(): array
    {
        return $this->request['get'] ?? [];
    }
}