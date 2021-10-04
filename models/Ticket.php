<?php
namespace Model;

class Ticket extends ActiveRecord
{
    public $id;
    public $precio;
    public $nFechas;
    public $beneficios;
    protected static $table = "tickets";
    protected static $columns = ["id", "precio", "nFechas", "beneficios"];

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? "";
        $this->precio = $args["precio"] ?? "";
        $this->nFechas = $args["nFechas"] ?? "";
        $this->beneficios = $args["beneficios"] ?? "";
    }
}
