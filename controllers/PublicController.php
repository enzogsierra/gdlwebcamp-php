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
        $router->render("public/index",
        [
            "load_file" => "colorbox",
            "guests" => Invitado::all()
        ]);
    }

    public static function conferencia(Router $router)
    {
        $router->render("public/conferencia", 
        [
            "load_file" => "lightbox"
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

    public static function invitados(Router $router)
    {
        $router->render("public/invitados",
        [
            "load_file" => "colorbox",
            "guests" => Invitado::all()
        ]);
    }

    public static function reservaciones(Router $router)
    {
        $router->render("public/reservaciones", 
        [
        ]);
    }
}
