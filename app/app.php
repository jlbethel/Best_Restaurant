<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Task.php";
    require_once __DIR__."/../src/Category.php";

    $app = new Silex\Application();

    $server = 'mysql:host=localhost;dbname=best_eats';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    return $app;

 ?>
