<?php
namespace App\Controllers;

class Mig extends BaseController{
   
   public function index(){
      $dt=[
         'jdlapp'=>'Migrate Generator V1.0',
      ];
      foreach($this->db->listTables() as $r){
         $dt['dtbl'][$r]=$this->db->query("describe ".$r)->getResult();
      }
      return $this->tm->vw('temp','mig',$dt);
   }
}

?>