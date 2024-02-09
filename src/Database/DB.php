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

   public function getUsuarioLogin(array $values)
   {
      //dados a serem encripitados
      $encryptedEmail = $values[0];
      $encryptedPwd = $values[1];

      $this->__construct();

      $stmt = self::$connection->prepare("SELECT Email, Senha FROM usuario WHERE Email=? AND Senha=?;");

      $stmt->bind_param("ss", $encryptedEmail, $encryptedPwd);
 
      $stmt->execute();

      $result = $stmt->get_result();

      $row = $result->fetch_assoc();

      self::$connection->close();

      return $row;
   }
}