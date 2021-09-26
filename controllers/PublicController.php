<?php
namespace Controllers;

use MVC\Router;
use Model\Evento;
use Model\Categoria;
use Model\Invitado;

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

    public static function calendario(Router $router)
    {
        // Consulta personalizada
        $query = "SELECT eventos.id, eventos.titulo, fecha, hora, concat(invitados.nombre, ' ', invitados.apellido) as invitado, categorias.titulo as categoria, icono FROM eventos ";
        $query .= "INNER JOIN invitados ON eventos.invitadoId = invitados.id ";
        $query .= "INNER JOIN categorias ON eventos.categoriaId = categorias.id ";
        $query .= "ORDER BY hora";
        $events = Evento::queryEx($query);

        // Agrupar eventos por fecha
        $dates = [];
        foreach($events as $event)
        {
            $dates[$event["fecha"]][] = $event;
        }

        $router->render("public/calendario", 
        [
            "dates" => $dates
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
