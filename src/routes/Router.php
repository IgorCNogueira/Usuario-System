<?php

namespace src\routes;

use Exception;
use src\helpers\Request;
use src\helpers\Uri;

class Router
{
   const CONTROLLER_NAMESPACE = 'src\\Controllers';

   public static function load(string $controller, string $method)
   {
      try {
         $controllerNamespace = self::CONTROLLER_NAMESPACE.'\\'.$controller; 
         if(!class_exists($controllerNamespace)) {
            throw new Exception("{$controller} NOT FOUND", 404);
         }

         $controllerInstance = new $controllerNamespace;
         if(!method_exists($controllerInstance, $method)) {
            throw new Exception("{$method} NOT FOUND", 404);
         }

         $controllerInstance->$method((object)$_REQUEST);
      } catch (\Throwable $th) {
         echo $th->getMessage();
      }
   }

   public static function routes() : array
   {
      return [
         'get' => [
            '/' => fn () => self::load('HomeController', 'index'),
            '/login' => fn () => self::load('LoginController', 'index'),
            '/signin' => fn () => self::load('SigninController', 'index')
         ],

         'post' => [
            '/login' => fn () => self::load('LoginController', 'index'),
            '/signin' => fn () => self::load('SigninController', 'store')
         ]
      ];
   }

   public static function execute()
   {
      try {
         $routes = self::routes();
         $request = Request::get();
         $uri = Uri::get('path');

         if(!isset($routes[$request])) {
            throw new Exception("ROUTE NOT FOUND", 404);
         }

         if(!array_key_exists($uri, $routes[$request])) {
            throw new Exception("ROUTE NOT FOUND", 404);
         }

         $router = $routes[$request][$uri];

         if(!is_callable($router)) {
            throw new Exception("ROUTE {$uri} NOT FOUND", 404);
         }

         $router();
      } catch (\Throwable $th) {
         echo $th->getMessage();
      }
   }
}