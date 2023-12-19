<?php

require_once __DIR__ . '/RouteSwitch.php';

class Router extends RouteSwitch
{
   public function run(string $requestUri)
   {
      $route = substr($requestUri, 1); // viola o SRP (Single Responsability Principle) - S do S.O.L.I.D.

      if ($route === '') {
         $this->home();
      } else {
         $this->$route();
      }
   }
}