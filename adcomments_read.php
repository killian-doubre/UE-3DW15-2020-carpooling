<?php

use App\Controllers\AdCommentsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AdCommentsController();
echo $controller->getAdComments();
