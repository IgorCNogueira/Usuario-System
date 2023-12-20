<?php

namespace src\routes;

use Exception;

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

         $controllerInstance->$method();
      } catch (\Throwable $th) {
         echo $th->getMessage();
      }
   }

   public static function routes() : array
   {
      return [
         'get' => [
            '/' =>  self::load('HomeController', 'index'),
            '/login' =>  self::load('LoginController', 'index'),
            '/signin' =>  self::load('SigninController', 'index')
         ],

         'post' => [
            '/signin' =>  self::load('SigninController', 'store')
         ]
      ];
   }
}