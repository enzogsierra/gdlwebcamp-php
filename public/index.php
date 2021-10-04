<?php
require_once __DIR__ . "/../include.php";

use MVC\Router;
use Controllers\PublicController;

$router = new Router();

$router->get("/", [PublicController::class, "index"]);
$router->get("/conferencia", [PublicController::class, "conferencia"]);
$router->get("/calendario", [PublicController::class, "calendario"]);
$router->get("/invitados", [PublicController::class, "invitados"]);
$router->get("/reservaciones", [PublicController::class, "reservaciones"]);
$router->post("/reservaciones", [PublicController::class, "reservaciones"]);

$router->checkRoutes();