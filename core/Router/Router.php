<?php

namespace Core\Router;

use Core\Request;

class Router
{
    /**
     * @var array
     */
    private $routes;
    /**
     * @var Request
     */
    private $request;
    /**
     * RouterInterface constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * @param Route $route
     *
     * @return Router
     * @throws \Exception
     */
    public function addRoute(Route $route)
    {
       if (isset($this->Route[$route->getName()])){
           throw new \Exception("La route existe déjà");
       }
        $this->routes[$route->getName()] = $route;
        return $this;
        // TODO: Implement addRoute(Route $route) method.
        // Si la route existe déjà (teste sur le nom) alors on soulève une erreur
        // throw new \Exception() ...
        // Sinon on l'ajoute a la liste de nos routes !
    }
    /**
     * @return mixed
     * @throws \Exception
     */
    public function getRouteByRequest()
    {
        foreach($this->routes as $route) {
            if($route->match($this->request->getServer()['REQUEST_URI'])) {
                return $route;
            }
        }
        throw new \Exception("Cette route n'existe pas !");
    }

    // TODO: Implement getRouteByRequest() method.
        // Pour chaque route, on teste si elle correspond à la requête, si oui alors on renvoie cette route
        // Si aucune route ne correspond alors on renvoie une erreur
        // throw new \Exception() ...
    public function getRoute($routeName)
    {
        // Si la route existe (teste sur le nom) alors on renvoie la route en question
        if(isset($this->routes[$routeName])) {
            return $this->routes[$routeName];
        }
        // Sinon on soulève une erreur
        throw new \Exception("Cette route n'existe pas !");
    }

}