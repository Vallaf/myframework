<?php

namespace Core;
use Core\Router\Router;
use duncan3dc\Laravel\BladeInstance;


abstract class Controller
{
    /**
     * @var Request
     */
    private $request;
    /**
     * @var Router
     */
    private $router;
    /**
     * Controller constructor.
     *
     * @param Request $request
     * @param Router  $router
     */
    public function __construct(Request $request, Router $router)
    {
        $this->request = $request;
        $this->router = $router;
        $this->blade = new BladeInstance($_SERVER['DOCUMENT_ROOT'] . '/../src/View/', $_SERVER['DOCUMENT_ROOT'] . '/../tmp/cache/views/');
    }
    /**
     * @param       $routeName
     * @param array $args
     *
     * @throws \Exception
     */
    protected final function redirect($routeName, $args = [])
    {
        $route = $this->router->getRoute($routeName);
        header(sprintf("Location: %s", $route->generateUrl($args)));
    }
    protected function render($filename, $data = [])
    {
        echo $this->blade->render($filename, $data);
    }
}