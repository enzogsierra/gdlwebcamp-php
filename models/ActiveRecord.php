<?php
namespace Model;

class ActiveRecord
{
    protected static $db;
    protected static $table = "";
    protected static $columns = [];
    
    // Metodos para la db
    public static function setDB($database)
    {
        self::$db = $database;
    }

    public function save() // Insertar datos
    {
        // Sanitizar datos
        $input = [];
        foreach(static::$columns as $column)
        {
            if($column === "id") continue;
            $input[$column] = self::$db->escape_string($this->$column);
        }

        // Insertar en la db
        return (self::$db->query("INSERT INTO " . static::$table . " (" . join(", ", array_keys($input)) . ") VALUES ('" . join("', '", array_values($input)) . "')"));
    }

    public function update() // Actualizar una fila
    {
        $input = [];
        $str = [];
        foreach(static::$columns as $column) 
        {
            if($column === "id") continue;
            $input[$column] = self::$db->escape_string($this->$column);
        }
        foreach($input as $key => $value)
        {
            $str[] = "{$key} = '{$value}'";
        }

        return self::$db->query("UPDATE " . (static::$table) . " SET " . (join(", ", $str)) . " WHERE id = " . ($this->id) . " LIMIT 1");
    }

    public function delete() // Eliminar fila
    {
        return self::$db->query("DELETE FROM " . (static::$table) . " WHERE id = " . ($this->id) . " LIMIT 1");
    }


    // query
    public static function all()
    {
        return self::query("SELECT * FROM " . (static::$table));
    }
    public static function findById($id)
    {
        return self::query("SELECT * FROM " . (static::$table) . " WHERE id = ${id}");
    }
    public static function findValue($column, $value)
    {
        return self::query("SELECT * FROM " . (static::$table) . " WHERE ${column} = '${value}' LIMIT 1");
    }
    public static function limit($limit)
    {
        return self::query("SELECT * FROM " . (static::$table) . " LIMIT ${limit}");
    }
    public static function query($query)
    {
        $resultado = self::$db->query($query); // Consultar a la db
        $array = [];
        while($registro = $resultado->fetch_assoc())
        {
            $array[] = static::createObject($registro);
        }

        $resultado->free(); // Liberar memoria
        return $array; // Retornar resultados
    }
    public static function queryEx($query)
    {
        $result = self::$db->query($query);
        $array = [];
        while($row = $result->fetch_assoc())
        {
            $array[] = $row;
        }

        $result->free();
        return $array;
    }

    public static function createObject($registro)
    {
        $object = new static;
        foreach($registro as $key => $value)
        {
            if(property_exists($object, $key)) $object->$key = $value;
        }
        return $object;
    }
    

    // Sicronizar el objeto en la memoria con los valores editados
    public function sync($args = [])
    {
        foreach($args as $key => $value)
        {
            if(property_exists($this, $key) && !is_null($value)) $this->$key = $value;
        }
    }
}