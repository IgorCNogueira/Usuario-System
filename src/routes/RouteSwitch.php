<?php

abstract class RouteSwitch
{
   protected function home()
   {
      require __DIR__ . '/../View/home.html';
   }

   protected function login()
   {
      require __DIR__ . '/../View/login.html';
   }

   protected function signin()
   {
      require __DIR__ . '/../View/signin.html';
   }
    
   public function __call($name, $arguments)
   {
      http_response_code(404);
   }
}