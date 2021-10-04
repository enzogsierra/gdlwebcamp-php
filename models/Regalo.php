<?php
namespace Model;

class Regalo extends ActiveRecord
{
    public $id;
    public $nombre;
    protected static $table = "regalos";
    protected static $colums = ["id", "nombre"];

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? "";
        $this->nombre = $args["nombre"] ?? "";
    }
}