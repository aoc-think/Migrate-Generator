<div class="row">
   <?php foreach($dtbl as $k=>$v){$key='';?>
   <form id="f<?=$k?>" class="col-md-6 mb-3"><div class="card"><div class="card-body">
      <small><?=$k?></small>
      <textarea name="txt" class="form-control mb-3" rows="20">
      public function up(){
         $this->forge->addField([
      <?php foreach($v as $r){
      $tp=explode(' ',str_replace('(',' ',str_replace(')','',$r->Type)));
      $key=($r->Key=='PRI')?$r->Field:$key;

      echo "\t\t'".$r->Field."'\t=> [\n".
      "\t\t\t'type'\t=> '".strtoupper($tp[0])."',".
      ((isset($tp[1]))?"\n\t\t\t'constraint'\t=> ".((strtoupper($tp[0])=='ENUM')?"[".$tp[1]."]":"'".$tp[1]."'").",":null).
      ((isset($tp[2]))?"\n\t\t\t'unsigned'\t=> TRUE,":null).
      (($r->Extra=='auto_increment')?"\n\t\t\t'auto_increment'\t=> TRUE,":null).
      (($r->Null!='NO')?"\n\t\t\t'null'\t=> TRUE,":null).
      (($r->Default!='')?"\n\t\t\t'default'\t=> '".$r->Default."',":null).
      "\n\t\t],\n";
      }?>
         ]);
         $this->forge->addKey('<?=$key?>', TRUE);
         $this->forge->createTable('<?=$k?>');
      }

      public function down(){$this->forge->dropTable('<?=$k?>');}
      </textarea>
   </div>
   <div class="card-footer"><button type="button" class="btn btn-danger" onclick="gm('<?=$k?>')">Generate Migrate</button></div>
   </div></form>
   <?php }?>
</div>

<script>
   function gm(tbl) {
      $.ajax({
         method : "post",
         data : $("#f"+tbl).serialize(),
         url : '<?=base_url('mig/generate')?>'+'/'+tbl,
         success : (res)=>{if(res=='Y'){alert("Generate berhasil..")}},
         error : (res)=>{alert("Ada masalah dengan server.!!");}
      });
   }
</script>