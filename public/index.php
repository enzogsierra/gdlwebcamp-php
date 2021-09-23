<?php
require_once __DIR__ . "/../include.php";

use MVC\Router;
use Controllers\PublicController;

$router = new Router();
$router->get("/", [PublicController::class, "index"]);
$router->get("/conferencia", [PublicController::class, "conferencia"]);
$router->get("/reservaciones", [PublicController::class, "reservaciones"]);
$router->checkRoutes();