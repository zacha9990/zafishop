<div class="portlet light">

    <br />
    <a href="<?=site_url()?>/akundua/create?sumber=akundua" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;Tambah akun</a>

    <br />
    <br />

    <div id="message"><?php echo $this->session->flashdata('message'); ?></div>

    <table id="table_id" class="table table-stripped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Kode Akun</th>
            <th>Nama Akun</th>
            <th>Nama Akun 1</th>

            <th style="width:125px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($akun_dua as $item ) { ?>
            <tr>
              <td><?php echo $item->no_akun2; ?></td>
              <td><?php echo $item->nama_akun2; ?></td>



              <td><?php echo $item->nama_akun1; ?></td>
              <td>
                <a href="<?=site_url()?>/akundua/edit/<?=$item->no_akun2?>" class="btn btn-default"><b><i style="color:blue;" class="glyphicon glyphicon-pencil"></i></b></a>
                <button class="btn btn-danger" onclick="delete_akun(<?php echo $item->no_akun2; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
              </td>
            </tr>
            <?php }?>
        </tbody>

        <tfoot>
          <tr>
              <th>No akun</th>
              <th>Nama akun</th>
              <th>Nama akun</th>
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


    function add_akun2()
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
        url : "<?php echo site_url('akundua/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="no_akun2"]').val(data.no_akun2);
            $('[name="nama_akun2"]').val(data.nama_akun2);
            $('[name="no_akun1"]').val(data.no_akun1);
            $('[name="nama_akun1"]').val(data.nama_akun1);



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
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('akundua/akun2_add')?>";
      }
      else
      {
        url = "<?php echo site_url('akundua/akun2_update')?>";
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
    }

    function delete_akun(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('akundua/akun2_delete')?>/"+id,
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

  </script>

  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Form Akun 2</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <!-- <input type="hidden" value="" name="no_akun1"/> -->
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">No Akun 2</label>
              <div class="col-md-9">
                <input name="no_akun2" placeholder="No Akun 2" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Nama Akun 2</label>
              <div class="col-md-9">
                <input name="nama_akun2" placeholder="Nama Akun 2" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Nama Akun 1</label>
              <div class="col-md-9">

                <select name="no_akun1" class="form-control">
                   <?php

                  $test= $model_obj->get_dropdown_no_akun1();



                     foreach ($test as $key) {
                       echo "<option value='$key->no_akun1'>$key->nama_akun1</option>";
                     }
                   ?>
                  </select


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

  <div class="col-md-2"></div>

</div> <!-- end class row -->
</div> <!-- end class container -->
<br />
<br />
