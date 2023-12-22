<?php

namespace src\Controllers;

class LoginController extends Controller
{
   public function index()
   {
      $this->view('login', ['title' => 'Login', 'style' => '../public/css/login.css']);
   }
}