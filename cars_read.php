<?php

use App\Controllers\CarController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarController();
echo $controller->getCars();
