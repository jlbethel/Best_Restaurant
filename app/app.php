<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Restaurant.php";
    require_once __DIR__."/../src/Cuisine.php";

    $app = new Silex\Application();
    $app['debug'] = true;

    $server = 'mysql:host=localhost;dbname=best_eats';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'
       ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig', array('cuisines' => Cuisine::getAll()));
    });

    $app->post("/cuisines", function() use ($app) {
       $cuisine = new Cuisine($_POST['flavor']);
       $cuisine->save();
       return $app['twig']->render('index.html.twig', array('cuisines' => Cuisine::getAll()));
   });

   $app->post("/delete_cuisines", function() use ($app) {
        Cuisine::deleteAll();
        $cuisines = [];
        return $app['twig']->render('index.html.twig', array('cuisines' => $cuisines));
    });


    return $app;

 ?>
