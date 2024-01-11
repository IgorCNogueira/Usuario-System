<?php

namespace src\Utils;

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