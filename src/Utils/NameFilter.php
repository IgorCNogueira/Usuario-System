<?php

namespace src\Utils;

class NameFilter
{
   public function nameValidate($name)
   {
      try {
         if(!filter_var($name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^([a-zA-Z]{3,}([\.\s]{1,})?){1,}/")))) {
            return false;
         }
      } catch (\Exception $th) {
         echo $th->getMessage();
      }
      return true;
   }
}