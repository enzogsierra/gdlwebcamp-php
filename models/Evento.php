<?php
namespace Model;

class Evento extends ActiveRecord
{
    public $id;
    public $titulo;
    public $fecha;
    public $hora;
    public $clave;
    public $categoriaId;
    public $invitadoId;
    protected static $table = "eventos";
    protected static $colums = ["id", "titulo", "fecha", "hora", "clave", "categoriaId", "invitadoId"];

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? "";
        $this->titulo = $args["titulo"] ?? "";
        $this->fecha = $args["fecha"] ?? "";
        $this->hora = $args["hora"] ?? "";
        $this->clave = $args["clave"] ?? "";
        $this->categoriaId = $args["categoriaId"] ?? "";
        $this->invitadoId = $args["invitadoId"] ?? "";
    }
}