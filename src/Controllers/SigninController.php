<?php

namespace src\Controllers;

use src\Database\DB;
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

      try {
         if($nameValidation) {
            if($emailValidation) {
               if($pwdValidation) {
                  $dataInsert = new DB();
                  $dataReturn = $dataInsert->insertUsuarioTable([
                     $request->name_signin, 
                     $request->email_signin, 
                     $request->password_signin
                  ]);
      
                  if ($dataReturn) {
                     return $this->view('signin', [
                        'title' => 'Cadastro',
                        'message' => 'Cadastro realizado!',
                        'nameError' => false,
                        'emailError' => false,
                        'passwordError' => false
                     ]);
                  }
               } else {
                  return $this->view('signin', [
                     'title' => 'Cadastro',
                     'message' => 'Cadastro falhou!',
                     'passwordError' => true
                  ]);
               }
            } else {
               return $this->view('signin', [
                  'title' => 'Cadastro',
                  'message' => 'Cadastro falhou!',
                  'emailError' => true
               ]);
            }
         } else {
            return $this->view('signin', [
               'title' => 'Cadastro',
               'message' => 'Cadastro falhou!',
               'nameError' => true
            ]);
         }
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