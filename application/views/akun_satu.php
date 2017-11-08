<div class="portlet light">
      <a href="<?=site_url()?>/akunsatu/create" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;Tambah Kelompok Akun</a>
      <br />
      <br />
    <div id="message"><?php echo $this->session->flashdata('message'); ?></div>

    <table id="table_id" class="table table-stripped table-bordered table-hover datatable" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No Akun</th>
            <th>Nama Akun</th>
            <th>Posisi</th>

            <th style="width:125px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($akun_satu as $item ) { ?>
            <tr>
              <td><?php echo $item->no_akun1; ?></td>
              <td><?php echo $item->nama_akun1; ?></td>



              <td><?php echo $item->posisi; ?></td>
              <td>
                <a href="<?=site_url()?>/akunsatu/edit/<?=$item->no_akun1?>" class="btn btn-default"><b><i style="color:blue"class="glyphicon glyphicon-pencil" title="ubah"></i></b></a>
                <button title="hapus" class="btn btn-danger" onclick="delete_akun(<?php echo $item->no_akun1; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
              </td>
            </tr>
            <?php }?>
        </tbody>

        <tfoot>
          <tr>
              <th>No akun</th>
              <th>Nama akun</th>
              <th>Posisi</th>
              <th>Action</th>
          </tr>
        </tfoot>
    </table>
  </div>




  <script src="<?php echo base_url() ?>aset/js/jquery-2.2.3.min.js" ></script>



  <script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable({
        "language": {
          "url" : "<?php echo base_url() ?>aset/indonesian.json"
        }
      });
  } );
    var save_method; //for save method string
    var table;


    function add_akun1()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function edit_akun(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('akunsatu/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="no_akun1"]').val(data.no_akun1);
            $('[name="nama_akun1"]').val(data.nama_akun1);
            $('[name="posisi"]').val(data.posisi);



            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit akun'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }



    function save()
    {
      // var no_akun1 = document.getElementById('no_akun1').value;
      //
      // if (no_akun1 == '') {
      //   alert("isi field Kelompok akun");
      // }else {
      //   var error_no_akun1 = document.getElementById('error_no_akun1');
      //   if (error_no_akun1 == 'Harus Numerik'){
      //     alert("isi informasi yang valid");
      //   }else{



        var url;
        if(save_method == 'add')
        {
            url = "<?php echo site_url('akunsatu/akun1_add')?>";
        }
        else
        {
          url = "<?php echo site_url('akunsatu/akun1_update')?>";
        }

         // ajax adding data to database
            $.ajax({
              url : url,
              type: "POST",
              data: $('#form').serialize(),
              dataType: "JSON",
              success: function(data)
              {
                 //if success close modal and reload ajax table
                 $('#modal_form').modal('hide');
                location.reload();// for reload a page
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  alert('Error adding / update data');
              }
          });
        // }
    }

    function delete_akun(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('akunsatu/akun1_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {

               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

      }
    }

    function validate($field, $query){
      var xmlhttp;
      if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else { // for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }

      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
          document.getElementById(field).innerHTML = "Validating..";
        } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.getElementById(field).innerHTML = xmlhttp.responseText;
        } else {
          document.getElementById(field).innerHTML = "Error Occurred. <a href='index.php'>Reload Or Try Again</a> the page.";
        }
      }
      xmlhttp.open("GET", "akunsatu/validasi?field=" + field + "&query=" + query, false);
      xmlhttp.send();
    }

  </script>

  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Form Akun 1</h3>
      </div>
      <div class="modal-body form">
        <div class="error_message">

        </div> <!-- end div error messager -->
        <form action="#" id="form" class="form-horizontal">
          <!-- <input type="hidden" value="" name="no_akun1"/> -->
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">No Akun 1</label>
              <div class="col-md-9">
                <input name="no_akun1" id="no_akun1" placeholder="No Akun 1" class="form-control" type="text" onblur="validate('no_akun1', this.value)">
              </div>
              <div class="col-md-3"></div>
              <div class="col-md-9"><div id="error_no_akun1"></div></div>

            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Nama Kelompok Akun</label>
              <div class="col-md-9">
                <input name="nama_akun1" placeholder="Nama Kelompok Akun" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Posisi</label>
              <div class="col-md-9">
                <?php
                  $options = array(
                    'debet' => 'Debet',
                    'kredit' => 'Kredit'
                  );

                  echo form_dropdown('posisi', $options, '', 'class="form-control"')
                 ?>

              </div>
            </div>
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->


  
  <script type="text/javascript">
    $(document).ready(function(){
      //alert(1);
    });
  </script>
