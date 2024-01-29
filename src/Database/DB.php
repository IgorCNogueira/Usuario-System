<?php

namespace src\Database;

use src\helpers\Connection;

class DB extends Connection
{
   public function insertUsuarioTable(array $values) : bool
   {
      $this->__construct();

      $stmt = self::$connection->prepare("INSERT INTO usuario (Nome, Email, Senha) VALUES (?, ?, ?);");
      
      $stmt->bind_param("sss", $values[0], $values[1], $values[2]);
      
      $result = $stmt->execute();

      self::$connection->close();
      
      return $result;
   }
}