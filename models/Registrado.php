<?php
namespace Model;

class Registrado extends ActiveRecord
{
    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $pedido;
    public $pago;
    protected static $table = "registrados";
    protected static $columns = ["id", "nombre", "apellido", "email", "pedido", "pago"];

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? "";
        $this->nombre = $args["nombre"] ?? "";
        $this->apellido = $args["apellido"] ?? "";
        $this->email = filter_var($args["email"] ?? "", FILTER_VALIDATE_EMAIL);
        $this->pedido = $args["pedido"] ?? "";
        $this->pago = filter_var($args["pago"] ?? "", FILTER_VALIDATE_FLOAT);

        // Verificar que todas las key de pedido[] sean válidas
        foreach($this->pedido as $key => $value)
        {
            if($key === "ticketId") $this->pedido["ticketId"] = filter_var($value, FILTER_VALIDATE_INT, ["options" => ["default" => -1]]);
            elseif($key === "fechaId") $this->pedido["fechaId"] = $value;
            elseif($key === "eventoId") $this->pedido["eventoId"] = $value;
            elseif($key === "camisas") $this->pedido["camisas"] = filter_var($value, FILTER_VALIDATE_INT, ["options" => ["default" => -1]]);
            elseif($key === "etiquetas") $this->pedido["etiquetas"] = filter_var($value, FILTER_VALIDATE_INT, ["options" => ["default" => -1]]);
            elseif($key === "regalo") $this->pedido["regalo"] = $value ?? 0;
            else 
            {
                $this->pedido = ""; // Vaciar
                break;
            }
        }
    }

    public function verify()
    {
        $errors = [];
        if(!$this->nombre) $errors[] = "Debes poner tu nombre";
        if(!$this->apellido) $errors[] = "Debes poner tu apellido";
        if(!$this->email) $errors[] = "Debes incluir un email válido";
        if($this->pedido["ticketId"] < 0) $errors[] = "Debes seleccionar un ticket";
        if(empty($this->pedido["fechaId"])) $errors[] = "Debes seleccionar fechas";
        if(empty($this->pedido["eventoId"])) $errors[] = "Debes seleccionar al menos un evento";
        if($this->pedido["camisas"] < 0) $errors[] = "Cantidad de camisas no válido";
        if($this->pedido["etiquetas"] < 0) $errors[] = "Cantidad de etiquetas no válido";
        if(!$this->pedido["regalo"]) $errors[] = "Debes seleccionar un regalo";
        
        if(!$this->pago) $errors[] = "Monto a pagar inválido";
        else if($this->pago <= 0.0) $errors[] = "Monto a pagar inválido";
        return $errors;
    }
}