<?php

namespace src\Controllers;

class SigninController extends Controller
{
   public function index()
   {
      $this->view('signin', ['title' => 'Cadastro', 'style' => '../public/css/signin.css']);
   }

   public function store($request)
   {
      var_dump($request);
   }
}