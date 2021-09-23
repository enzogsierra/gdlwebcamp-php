<?php
require __DIR__ . "/vendor/autoload.php";


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