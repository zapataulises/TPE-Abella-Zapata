<?php

require_once 'libs/Router.php';
require_once 'Controller/ApiCommentsController.php';

$router = new Router();


$router-> addroute('comentarios', 'GET', 'APiComentariosController', 'getComments');
$router-> addroute('comentarios/zapatillas/:ID', 'GET', 'ApiCommentsController', 'getCommentsSneakers');
$router-> addroute('comentarios/zapatillas/:ID', 'POST', 'ApiCommentsController', 'addComment');
$router-> addroute('comentarios/zapatillas/:ID', 'DELETE','ApiCommentsController', 'delComment');
$resource = $_GET['resource'];
$method = $_SERVER['REQUEST_METHOD'];

$router->route($resource, $method);