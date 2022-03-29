<?php

use Router\Router;

//Le namespace du Router

require '../vendor/autoload.php';//Pour beneficier des namespaces directement à partir de l'autoloader

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR); //definir le repertoire view
define('SCRIPT', dirname('SCRIPT_NAME') . DIRECTORY_SEPARATOR); //definir le repertoire des scripts

$router = new Router($_GET['url']); //creation d'une nouvelle instance de Router

//Les routes
$router->get('/', 'Controller\ArticleController@index');
$router->get('/products/:id', 'Controller\ArticleController@products');
$router->get('/posts/:id', 'Controller\ArticleController@users');


$router->run(); // execution de la function run qui renvoie les vues