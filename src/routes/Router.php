<?php

require_once __DIR__ . '/RouteSwitch.php';

class Router extends RouteSwitch
{
   public function run(string $requestUri)
   {
      $route = $this->uriFormater($requestUri);

      //viola OPC (Open/Closed Principle), corrigir mais tarde
      // if ($route === '/') {
      //    $this->home();
      // } else {
      //    $this->$route();
      // }
   }

   public function uriFormater(string $uri) : string
   {
      $route = substr($uri, -1);
      return $route;
   }

   public function routeChecker(string $uri, RouteSwitch $rota)
   {
      
   }
}