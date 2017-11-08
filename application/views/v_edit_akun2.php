<div class="portlet light">
<?php
  if (empty($akun)){
    $akun = new stdClass();
    $akun->no_akun2 = '';
    $akun->nama_akun2 = '';
    $akun->no_akun1= '';

    $type = 'add';
  } else {
    $type = 'ubah';
  }

  // $sumber = $_GET['sumber'];

?>



<?=anchor("akundua", '<span class="glyphicon glyphicon-arrow-left"></span>&nbsp; kembali', array('class' => 'btn btn-primary'))?>
<?=form_open("akundua/$type", array('class' => 'form-horizontal', 'id' =>'form', 'name' => 'form' ))?>
  <div class="form-body">

    <div class="form-group">
      <label class="control-label col-md-3">Kode Akun</label>
      <div class="col-md-9">
        <input name="no_akun2" id="no_akun2" placeholder="Kode Akun" value="<?=$akun->no_akun2?>" class="form-control"
        type="text" <?php if ($type == 'ubah') :?> readonly="readonly" <?php endif; ?>>
      </div>
      <div class="col-md-3"></div>
      <div class="col-md-9"><?php echo form_error('no_akun2'); ?></div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3">Nama Akun</label>
      <div class="col-md-9">
        <input name="nama_akun2" id="nama_akun2"placeholder="Nama Akun"  value="<?=$akun->nama_akun2?>" class="form-control" type="text">
      </div>
      <div class="col-md-3"></div>
      <div class="col-md-9"><?php echo form_error('nama_akun2'); ?></div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3">Kelompok Akun</label>
      <div class="col-md-9">
        <select name="no_akun1" class="form-control">
           <?php
           $test= $model_obj->get_dropdown_no_akun1();
              foreach ($test as $key) :  ?>
                <option value='<?=$key->no_akun1?>'
                  <?php if($key->no_akun1 == $akun->no_akun1): ?>
                      selected="selected"
                  <?php endif?> ><?=$key->nama_akun1?></option>
              <?php endforeach; ?>
           ?>
         </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3"></label>
      <div class="col-md-9">
        <?php echo form_submit('mysubmit', 'Submit!', array("class" => "btn btn-primary"));?>
      </div>
    </div>

  </div> <!-- end class form-body -->

<?=form_close()?>
</div>

<!-- for footer -->
