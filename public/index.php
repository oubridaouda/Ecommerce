<?php
//Le namspace Router
use Router\Router;

//Pour beneficier des namspace plus facilement et rapidement
//require '../vendor/autoload.php';

require '../routes/Router.php';
require '../controller/ArticleController.php';
require '../routes/Route.php';

//creation d'une nouvelle instance de Router
$router = new Router($_GET['url']);

$router->get('/', 'Controller\Product\ArticleController@index');
$router->get('/posts/:id', 'Controller\Product\ArticleController@show');

$router->run();