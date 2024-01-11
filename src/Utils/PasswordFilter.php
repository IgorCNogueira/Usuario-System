<?php

namespace src\Utils;

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