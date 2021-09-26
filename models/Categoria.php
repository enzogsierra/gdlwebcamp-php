<?php
namespace Model;

class Categoria extends ActiveRecord
{
    public $id;
    public $titulo;
    public $icono;
    protected static $table = "categorias";
    protected static $columns = ["id", "titulo", "icono"];

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? "";
        $this->titulo = $args["titulo"] ?? "";
        $this->icono = $args["icono"] ?? "";
    }
}