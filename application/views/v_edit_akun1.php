<?php
  if (empty($akun)){
    $akun = new stdClass();
    $akun->no_akun1 = '';
    $akun->nama_akun1 = '';
    $akun->posisi= '';

    $type = 'add';
  } else {
    $type = 'ubah';
  }
?>
<?=anchor('akunsatu', '<span class="glyphicon glyphicon-arrow-left"></span>&nbsp; kembali', array('class' => 'btn btn-primary'))?>
<?=form_open("akunsatu/$type", array('class' => 'form-horizontal', 'id' =>'form', 'name' => 'form' ))?>

  <div class="form-body">
    <div class="form-group">
      <label class="control-label col-md-3">No Kelompok Akun</label>
      <div class="col-md-9">
        <input name="no_akun1" id="no_akun1" placeholder="No Kelompok Akun" value="<?=$akun->no_akun1?>" class="form-control"
        type="text" <?php if ($type == 'ubah') :?> readonly="readonly" <?php endif; ?>>
      </div>
      <div class="col-md-3"></div>
      <div class="col-md-9"><?php echo form_error('no_akun1'); ?></div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3">Nama Kelompok Akun</label>
      <div class="col-md-9">
        <input name="nama_akun1" value="<?=$akun->nama_akun1?>" placeholder="Nama Kelompok Akun" class="form-control" type="text">
      </div>
      <div class="col-md-3"></div>
      <div class="col-md-9"><?php echo form_error('nama_akun1'); ?></div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3">Posisi</label>
      <div class="col-md-9">
        <?php
          $options = array(
            'debet' => 'Debet',
            'kredit' => 'Kredit'
          );

          echo form_dropdown('posisi', $options, $akun->posisi, 'class="form-control"')
         ?>

      </div>



    </div>

    <div class="form-group">
      <label class="control-label col-md-3"></label>
      <div class="col-md-9">
        <?php echo form_submit('mysubmit', 'Submit!', array("class" => "btn btn-primary"));?>
      </div>
    </div>
  </div>
<?=form_close()?>


</div>
<div class="col-md-2"></div>

</div> <!-- end class row -->
</div> <!-- end class container -->
