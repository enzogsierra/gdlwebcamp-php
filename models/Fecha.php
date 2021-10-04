<?php
namespace Model;

class Fecha extends ActiveRecord
{
    public $id;
    public $fecha;
    protected static $table = "fechas";
    protected static $columns = ["id", "fecha"];

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? "";
        $this->fecha = $args["fecha"] ?? "";
    }
}