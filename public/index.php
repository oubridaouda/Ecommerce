<?php
//Le namspace Router
use Router\Router;

//Pour beneficier des namspace plus facilement et rapidement
require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__ ). DIRECTORY_SEPARATOR .'view'. DIRECTORY_SEPARATOR);
define('SCRIPT', dirname('SCRIPT_NAME'). DIRECTORY_SEPARATOR);
//creation d'une nouvelle instance de Router
$router = new Router($_GET['url']);

//Les routes
$router->get('/', 'Controller\ArticleController@index');
$router->get('/products', 'Controller\ArticleController@products');
$router->get('/posts/:id', 'Controller\ArticleController@show');

echo"<h1>putain</h1>";
$router->run();