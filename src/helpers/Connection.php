<?php

namespace src\helpers;

use Exception;
use mysqli;

class Connection
{
   protected static $connection;

   public function __construct()
   {
      try {
         self::$connection = new mysqli(
            'localhost', 
            'root', 
            '.(AccEss_mysql_1', 
            'usuariosystem'
         );

         if (self::$connection->error) {
            die(self::$connection);
         }
      } catch (Exception $th) {
         echo $th->getMessage();
      }
   }
}