<?php

namespace src\Controllers;

use League\Plates\Engine;

abstract class Controller
{
   public function view(string $view, array $data = [])
   {
      $pathViews = dirname(__FILE__, 3).DIRECTORY_SEPARATOR.'View';
      $templates = new Engine($pathViews);

      // Render Template
      echo $templates->render($view, $data);
   }
}