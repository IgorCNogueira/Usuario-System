<?php

require_once __DIR__ . '/RouteSwitch.php';

class Router extends RouteSwitch
{
   public function run(string $requestUri)
   {
      $route = $this->URIformater($requestUri);

      //viola OPC (Open/Closed Principle), corrigir mais tarde
      if ($route === '/') {
         $this->home();
      } else {
         $this->$route();
      }
   }

   public function URIformater(string $uri) : string
   {
      $route = substr($uri, -1);
      return $route;
   }
}