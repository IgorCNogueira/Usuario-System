<?php

namespace src\Controllers;

class HomeController extends Controller
{
   public function index()
   {
      $this->view('home', ['title' => 'Home', 'style' => '../public/css/home.css']);
   }
}