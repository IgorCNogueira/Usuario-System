<?php

namespace src\Extensions;

use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;

class Assets implements ExtensionInterface
{
   const STYLE_DIR = __DIR__ . '../../public/css/';
   const SCRIPT_DIR = __DIR__ . '../../public/javascript/';

   public function register(Engine $engine)
   {
      $engine->registerFunction('asset', [$this, 'getObject']);
   }

   public function getObject()
   {
      return $this;
   }

   public function assetSet($file)
   {
      $assetExists = $this->assetVerify($file);

      try {
         if(is_string($assetExists)) {
            return $assetExists;
         }
      } catch (\Exception $th) {
         echo $th->getMessage();
      }
      return '';
   }

   private function assetVerify($file)
   {
      $styles = glob(self::STYLE_DIR);
      $scripts = glob(self::SCRIPT_DIR);

      try {
         foreach ($styles as $style)
         {
            if($style == $file) {
               return self::STYLE_DIR . "{$file}";
            }
         }
         foreach ($scripts as $script)
         {
            if($script == $file) {
               return self::SCRIPT_DIR . "{$file}";
            }
         }
      } catch (\Exception $th) {
         echo $th->getMessage();
      }

      return false;
   }
}