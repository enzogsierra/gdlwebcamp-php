<?php

namespace Controllers;
use MVC\Router;

class PublicController
{
    public static function index(Router $router)
    {
        if($_SERVER["REQUEST_METHOD"] === "POST")
        {
        }

        $router->render("public/index", 
        [
        ]);
    }

    public static function conferencia(Router $router)
    {
        if($_SERVER["REQUEST_METHOD"] === "POST")
        {
        }

        $router->render("public/conferencia", 
        [
        ]);
    }

    public static function reservaciones(Router $router)
    {
        if($_SERVER["REQUEST_METHOD"] === "POST")
        {
        }

        $router->render("public/reservaciones", 
        [
        ]);
    }
}
