<?php
namespace Controllers;

use MVC\Router;
use Model\ActiveRecord;
use Model\Categoria;
use Model\Evento;
use Model\Invitado;
use Model\Registrado;
use Model\Ticket;
use Model\Fecha;

class PublicController
{
    public static function index(Router $router)
    {
        $categories = Categoria::all();
        foreach($categories as $id => $category)
        {
            $events[$id] = Evento::queryEx("titulo, hora, fechaId, invitadoId", "WHERE categoriaId = ${id} LIMIT 2");
        }

        setlocale(LC_TIME, "spanish");
        $router->render("public/index", 
        [
            "load_file" => "colorbox",
            "categories" => Categoria::all(),
            "events" => $events,
            "guests" => Invitado::all(),
            "dates" => Fecha::all(),
            "tickets" => Ticket::all()
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
        setlocale(LC_TIME, "spanish"); 
        $query = "SELECT eventos.id, eventos.titulo, hora, fechas.fecha, concat(invitados.nombre, ' ', invitados.apellido) as invitado, categorias.titulo as categoria, icono FROM eventos ";
        $query .= "INNER JOIN invitados ON eventos.invitadoId = invitados.id ";
        $query .= "INNER JOIN categorias ON eventos.categoriaId = categorias.id ";
        $query .= "INNER JOIN fechas ON eventos.fechaId = fechas.id ";
        $query .= "ORDER BY hora";
        $events = ActiveRecord::query($query);

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
        $errors = [];
        if($_SERVER["REQUEST_METHOD"] === "POST")
        {
            $registrado = new Registrado($_POST);
            $errors = $registrado->verify();

            if(empty($errors))
            {   
                $registrado->pedido = json_encode($registrado->pedido);
                if($registrado->save()) header("Location: /reservaciones?success=1");
                else $errors[] = "Hubo un error al enviar el registro.";
            }
        }

        if(isset($_GET["success"]) && $_GET["success"] == 1)
        {
            $router->render("public/reservaciones-success");
        }
        else
        {
            setlocale(LC_TIME, "spanish");
            $router->render("public/reservaciones",
            [
                "categories" => Categoria::all(),
                "events" => Evento::all(),
                "tickets" => Ticket::all(),
                "dates" => Fecha::all(),
                "errors" => $errors
            ]);
        }
    }
}
