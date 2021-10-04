<?php
namespace Model;

class Registrado extends ActiveRecord
{
    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $fecha;
    public $pases;
    public $talleres;
    public $regaloId;
    public $pago;
    protected static $table = "registrados";
    protected static $colums = ["id", "nombre", "apellido", "email", "fecha", "pases", "talleres", "regaloId", "pago"];

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? "";
        $this->nombre = $args["nombre"] ?? "";
        $this->apellido = $args["apellido"] ?? "";
        $this->email = $args["email"] ?? "";
        $this->fecha = $args["fecha"] ?? "";
        $this->pases = $args["pases"] ?? "";
        $this->talleres = $args["talleres"] ?? "";
        $this->regaloId = $args["regaloId"] ?? "";
        $this->pago = $args["pago"] ?? "";
    }
}