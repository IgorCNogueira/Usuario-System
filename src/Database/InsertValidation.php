<?php

namespace src\Database;

use src\Controllers\Controller;
use src\Database\DB;

class insertValidation extends Controller
{
   public function processData (array $requestData, array $dataConfirm)
   {
      try {
         try {
            if($dataConfirm[0]) {
               if($dataConfirm[1]) {
                  if($dataConfirm[2]) {
                     //Dados a serem encripitados
                     $encryptedEmail = $requestData[1];
                     $encryptedPwd = $requestData[2];

                     $dataInsert = new DB();
                     $dataReturn = $dataInsert->insertUsuarioTable([
                        $requestData[0],
                        $encryptedEmail,
                        $encryptedPwd
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
                        'passwordError' => true,
                        'nameData' => $requestData[0],
                        'emailData' => $requestData[1]
                     ]);
                  }
               } else {
                  return $this->view('signin', [
                     'title' => 'Cadastro',
                     'message' => 'Cadastro falhou!',
                     'emailError' => true,
                     'nameData' => $requestData[0],
                     'emailData' => $requestData[1]
                  ]);
               }
            } else {
               return $this->view('signin', [
                  'title' => 'Cadastro',
                  'message' => 'Cadastro falhou!',
                  'nameError' => true,
                  'nameData' => $requestData[0],
                  'emailData' => $requestData[1]
               ]);
            }
         } catch (\Exception $th) {
            echo $th->getMessage();
         }
      } catch (\Exception $th) {
         echo $th->getMessage();
      }
   }
}