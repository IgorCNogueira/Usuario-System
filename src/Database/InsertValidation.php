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
                     $dataInsert = new DB();
                     $dataReturn = $dataInsert->insertUsuarioTable([
                        $requestData[0], 
                        $requestData[1], 
                        $requestData[2]
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
      } catch (\Exception $th) {
         echo $th->getMessage();
      }
   }
}