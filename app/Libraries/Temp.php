<?php
   namespace App\Libraries;

   class Temp{
      function vw($tmp='',$vw='',$dt=[]){
         $dt['contents']=view($vw,$dt);
         return view($tmp,$dt);
      }
   }
?>