<!-- Page Content -->
<div class="container site-content">
  <div class="row">
    <div class="col-lg-12">
      <?php
          switch ($body_k) {
            case 'akunsatu':
              $this->load->view('akun_satu');
              break;

            case 'create_kelompok_akun':
              $this->load->view('v_edit_akun1');
              break;

            case 'edit_kelompok_akun':
              $this->load->view('v_edit_akun1');
              break;

            case 'akundua':
              $this->load->view('akun_dua');
              break;

            case 'create_akun':
              $this->load->view('v_edit_akun2');
            break;

            case 'edit_akun':
              $this->load->view('v_edit_akun2');
              break;

            case 'jurnal':
              $this->load->view('v_jurnal');
              break;


            default:
              $this->load->view('index');
              break;
          }
        ?>
    </div>
  </div>
</div>
<!-- /.container -->

<script src="<?php echo base_url() ?>aset/js/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url() ?>aset/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>aset/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>aset/js/respond.min.js"></script>
<script src="<?php echo base_url() ?>aset/js/jquery-ui.js"></script>
<script src="<?php echo base_url() ?>aset/locales/bootstrap-datepicker.id.min.js" charset="UTF-8"></script>
<script src="<?php echo base_url() ?>aset/js/bootstrap-datepicker.min.js"></script>
