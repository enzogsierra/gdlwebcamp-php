<?php
namespace Model;

class Invitado extends ActiveRecord
{
    public $id;
    public $nombre;
    public $apellido;
    public $descripcion;
    public $img;
    protected static $table = "invitados";
    protected static $columns = ["id", "nombre", "apellido", "descripcion", "img"];

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? "";
        $this->nombre = $args["nombre"] ?? "";
        $this->apellido = $args["apellido"] ?? "";
        $this->descripcion = $args["descripcion"] ?? "";
        $this->img = $args["img"] ?? "";
    }
}