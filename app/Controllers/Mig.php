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

   function generate($tbl=null){
      if($tbl!=null){
         $mig=$this->request->getPost('txt');
         $cls=ucfirst(str_replace('_','',$tbl));
         $txt="<?php \nnamespace App\Database\Migrations;".
         "\nuse CodeIgniter\Database\Migration;".
         "\n\nclass $cls extends Migration{\n".$mig."\n}";

         if(file_put_contents(APPPATH.'Database/Migrations/'.date('Y-m-d-His').'_'.$cls.'.php',$txt)){echo "Y";}
      }
   }
}

?>