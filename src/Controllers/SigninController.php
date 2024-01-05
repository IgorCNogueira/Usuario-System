<?php

namespace src\Controllers;

use src\Database\DB;

class SigninController extends Controller
{
   public function index()
   {
      $this->view('signin', ['title' => 'Cadastro']);
   }

   public function store($request)
   {
      $emailValidation = new EmailFilter();
      $emailValidation = $emailValidation->emailVerification($request->email_signin);
      
      $pwdValidation = new PasswordFilter();
      $pwdValidation = $pwdValidation->pwdMatch($request->password_signin, $request->password_confirm_signin);

      try {
         if($emailValidation && $pwdValidation) {
            $dataInsert = new DB();
            $dataReturn = $dataInsert->insertUsuarioTable([$request->name_signin, $request->email_signin, $request->password_signin]);
            if ($dataReturn) {
               return 1;
            }
         }
      } catch (\Exception $th) {
         echo $th->getMessage();
      }
      return 0;
   }
}

class EmailFilter
{
   public function emailVerification($email) : bool
   {
      try {
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
         }
      } catch (\Exception $th) {
         echo $th->getMessage();
      }
      return true;
   }
}

class PasswordFilter
{
   public function pwdMatch($pwd, $pwdConfirmation) : bool
   {
      if ($this->pwdValidate($pwd, $pwdConfirmation)) {
         try {   
            if (!$pwd == $pwdConfirmation) {
               return false;
            }
         } catch (\Exception $th) {
            echo $th->getMessage();
         }
         return true;
      } else {
         return false;
      }
   }

   public function pwdValidate($pwd, $pwdConfirmation) : bool
   {
      try {
         if (!filter_var($pwd, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/[a-zA-Z0-9\-\_]{8,18}/")))) {
            return false;
         }
         if (!filter_var($pwdConfirmation, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/[a-zA-Z0-9\-\_]{8,18}/")))) {
            return false;
         }
      } catch (\Exception $th) {
         echo $th->getMessage();
      }
      return true;
   }
}