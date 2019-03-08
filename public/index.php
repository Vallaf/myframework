<?php
require __DIR__ . "/../vendor/autoload.php";
use \Core\Request;
use \Core\Router\Router;
use \Core\Router\Route;
$request = Request::createFromGlobals();
$router = new Router($request);
try {
    $router
        ->addRoute(new Route("testsFoo", "/tests/foo", [], \App\Controller\TestsController::class, "foo"))
        ->addRoute(new Route("testsBar", "/tests/bar/:param", ["param" => "[\w]+"], \App\Controller\TestsController::class, "bar"))
        ->addRoute(new Route("testsRedirection", "/tests/redirection/:param", ["param" => "[\w]+"], \App\Controller\TestsController::class, "redirection"))
        ->addRoute(new Route("login", "/users/login", [], \App\Controller\UsersController::class, "login"))
        ->addRoute(new Route("index", "/users/index", [], \App\Controller\UsersController::class, "index"));
    $route = $router->getRouteByRequest();
    $route->call($request, $router);
} catch (\Exception $e) {
    echo $e->getMessage();
}