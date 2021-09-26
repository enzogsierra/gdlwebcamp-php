<?php
require __DIR__ . "/vendor/autoload.php";
use Model\ActiveRecord;


// Conectar a la base de datos
function dbConnect(): mysqli
{
    $db = new mysqli("localhost", "root", "root", "gdlwebcamp");
    if(!$db) debug("Error al conectar a la db");
    return $db;
}
$db = dbConnect();
ActiveRecord::setDB($db);


// Hacer debug a una variable
function debug($var, $ex = 1)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    if($ex) exit;
}

// Escapar/sanitizar HTML
function s($html)
{
    return htmlspecialchars($html);
}