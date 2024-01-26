<?php

namespace src\Controllers;

use src\Database\insertValidation;
use src\Utils\EmailFilter;
use src\Utils\NameFilter;
use src\Utils\PasswordFilter;

class SigninController extends Controller
{
   public function index()
   {
      $this->view('signin', ['title' => 'Cadastro']);
   }

   public function store($request)
   {
      $nameValidation = new NameFilter();
      $nameValidation = $nameValidation->nameValidate($request->name_signin);

      $emailValidation = new EmailFilter();
      $emailValidation = $emailValidation->emailVerification($request->email_signin);
      
      $pwdValidation = new PasswordFilter();
      $pwdValidation = $pwdValidation->pwdMatch($request->password_signin, $request->password_confirm_signin);

      $verifyAndInsert = new insertValidation();

      try {
         return $verifyAndInsert->processData(
            [
               $request->name_signin, 
               $request->email_signin, 
               $request->password_signin
            ], 
            [
               $nameValidation,
               $emailValidation,
               $pwdValidation
            ]);
      } catch (\Exception $th) {
         echo $th->getMessage();
      }

      return $this->view('signin', [
         'title' => 'Cadastro',
         'message' => 'Cadastro falhou!',
         'nameError' => true,
         'emailError' => true,
         'passwordError' => true
      ]);
   }
}