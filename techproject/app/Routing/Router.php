<?php

namespace App\Routing;

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\NoConfigurationException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;

class Router
{
    public function __construct(
        protected RouteCollection $routeCollection
    ){}

    public function __invoke(){
        $context = new RequestContext();
        $matcher = new UrlMatcher($this->routeCollection,$context);

        try{
           $parameters = $matcher->match($_SERVER['REQUEST_URI']);
           $controllerName = $parameters['controller'];
           $controllerInstance = new $controllerName($context);

           call_user_func_array([$controllerInstance, $parameters['method']], array_slice($parameters,2,-1));

        }catch (MethodNotAllowedException $e){
            die("False Http method!");
        }catch (NoConfigurationException $e){
            die("System Error 500!");
        }catch (ResourceNotFoundException $e){
            die("Relevant Route Not Found");
        }
    }

}