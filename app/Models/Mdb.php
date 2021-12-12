<?php
   namespace App\Models;

   use CodeIgniter\Model;

   class Mdb extends Model{
      protected $table='';
      protected $primaryKey='';
      protected $allowedFields=[];
      protected $returnType='object';

      function ubah($tb=null,$pk=null,$af=null){
         if($tb!=null){$this->table=$tb;}
         if($pk!=null){$this->primaryKey=$pk;}
         if($af!=null){$this->allowedFields=$af;}
      }
   }
   
?>