<?php

namespace src\Controllers;

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
      
      var_dump([$emailValidation, $pwdValidation]);
   }
}

class EmailFilter
{
   public function emailVerification($email) : bool
   {
      try {
         if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
         }
      } catch (\Exception $th) {
         echo $th->getMessage();
      }
      return false;
   }
}

class PasswordFilter
{
   public function pwdMatch($pwd, $pwdConfirmation) : bool
   {
      if ($this->pwdValidate($pwd, $pwdConfirmation)) {
         try {
            $pwdHash = password_hash($pwd, PASSWORD_DEFAULT);
            $pwdConfirmationHash = password_hash($pwdConfirmation, PASSWORD_DEFAULT);
   
            if (!$pwdHash == $pwdConfirmationHash) {
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
         if (!filter_var($pwd, FILTER_VALIDATE_REGEXP, array("options"=> array("regexp" => "/^[a-zA-Z0-9\.\$\-\_]{8,18}$/")))) {
            return false;
         }
         if (!filter_var($pwdConfirmation, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z0-9\.\$\-\_]{8,18}$/")))) {
            return false;
         }
      } catch (\Exception $th) {
         echo $th->getMessage();
      }
      return true;
   }
}