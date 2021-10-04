<?php
namespace Model;

class Evento extends ActiveRecord
{
    public $id;
    public $titulo;
    public $hora;
    public $fechaId;
    public $categoriaId;
    public $invitadoId;
    protected static $table = "eventos";
    protected static $colums = ["id", "titulo", "hora", "fechaId", "categoriaId", "invitadoId"];

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? "";
        $this->titulo = $args["titulo"] ?? "";
        $this->hora = $args["hora"] ?? "";
        $this->fechaId = $args["fechaId"] ?? "";
        $this->categoriaId = $args["categoriaId"] ?? "";
        $this->invitadoId = $args["invitadoId"] ?? "";
    }
}