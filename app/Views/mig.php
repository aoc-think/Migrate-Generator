<div class="row">
   <?php foreach($dtbl as $k=>$v){$key='';?>
   <div class="card col-md-6"><div class="card-body">
      <small><?=$k?></small>
      <textarea class="form-control mb-3" rows="20">
      $this->forge->addField([
      <?php foreach($v as $r){
         $tp=explode('(',str_replace(')','',$r->Type));
         $key=($r->Key=='PRI')?$r->Field:$key;

         echo "\t'".$r->Field."'\t=> [\n".
         "\t\t'type'\t=> '".strtoupper($tp[0])."',".
         ((isset($tp[1]))?"\n\t\t'constraint'\t=> '".$tp[1]."',":null).
         (($r->Extra=='auto_increment')?"\n\t\t'unsigned'\t=> TRUE,\n\t\t'auto_increment'\t=> TRUE,":null).
         (($r->Null!='NO')?"\n\t\t'null'\t=> TRUE,":null).
         (($r->Default!='')?"\n\t\t'default'\t=> '".$r->Default."',":null).
         "\n\t],\n";
      }?>
      ]);
      $this->forge->addKey('<?=$key?>', TRUE);
      $this->forge->createTable('<?=$k?>');
      </textarea>
   </div></div>
   <?php }?>
</div>