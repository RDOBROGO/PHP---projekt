<?php

declare(strict_types=1);

namespace App;

class View {
    public function render(string $page, array $cars, array $car, array $task): void
    {
        include_once("templates/layout.php");
    }
}