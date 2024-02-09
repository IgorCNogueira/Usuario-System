<?php

namespace src\Controllers;

use src\Database\DB;

class LoginController extends Controller
{
   public function index()
   {
      $this->view('login', ['title' => 'Login']);
   }

   public function loginUser($request)
   {
      $data = new DB();

      $result = $data->getUsuarioLogin([$request->email_login, $request->password_login]);

      if ($result == null) {
         echo 'Nenhum Usuário encontrado';
      } else {
         var_dump($result);
      }
   }
}