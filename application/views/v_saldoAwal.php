<div class="portlet light">
    <table id="table_id" class="table table-stripped table-bordered datatable" cellspacing="0" width="100%">

        <thead>
          <tr>
            <th>Kode Akun</th>
            <th>Nama Akun</th>
            <th>Saldo Awal</th>

            <th style="width:125px;">Aksi</th>
          </tr>
        </thead>

        <tbody>
            <?php foreach ($akun_dua as $item) : ?>
                <tr>
                    <td><?php echo $item->no_akun2; ?></td>
                    <td><?php echo $item->nama_akun2; ?></td>
                    <td>
                        <input class="saldoAwal" type="text" name="saldoAwal" id="<?=$item->no_akun2?>" value="<?=$item->saldo_awal?>" readonly>
                        
                    </td>   
                    <td class="fit">
                        <button type="button" class="btn btn-default ubahSaldoAwal" kode-akun="<?=$item->no_akun2?>"><b><i class="fa fa-edit"></i> Ubah Saldo Awal</b></button>
                    </td>            
                </tr>
            <?php endforeach ?>
        </tbody>

        <tfoot>
            <th>Kode Akun</th>
            <th>Nama Akun</th>
            <th>Saldo Awal</th>

            <th style="width:125px;">Aksi</th>
        </tfoot>

    </table>
</div>
<script src="<?php echo base_url() ?>aset/js/jquery-2.2.3.min.js" ></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#table_id').DataTable({
            "language": {
                "url" : "<?php echo base_url() ?>aset/indonesian.json"
            }
        });

        $(".saldoAwal").css({
            'border': 'none',
            'display': 'inline',
            'font-family': 'inherit',
            'font-size': 'inherit',
            'padding': 'none',
            'width': 'auto',
        });

        $(".ubahSaldoAwal").each(function(){
            var key = $(this).attr("kode-akun");
            var valSaldoUtama = $("#"+key).val();
            
            $(this).click(function(){
                if ($("#"+key).is('[readonly]')){
                    var valSaldo = $("#"+key).val();
                    $("#"+key).val("");
                    $("#"+key).attr("placeholder", valSaldo);
                    $(this).attr({"class": "btn btn-primary ubahSaldoAwal"});
                    $("#"+key).attr("readonly", false).focus();
                    $(this).html("<b><i class='fa fa-save'></i> Simpan</b>");
                    
                }else{
                    var saldo = $("#"+key).val();
                    var tombol = $(this);

                    if ($.isNumeric(saldo)){
                        $.ajax({
                            url:"<?php echo site_url('akundua/ubah_saldo_awal')?>",
                            type:"POST",
                            data: {
                                key:key,
                                saldo:saldo,
                            },
                            success: function(data){
                                var json = JSON.parse(data);
                                tombol.attr("class", "btn btn-default ubahSaldoAwal");
                                $("#"+key).attr("readonly", true).val(json.saldo);
                                tombol.html("<b><i class='fa fa-edit'></i> Ubah Saldo Awal</b>");

                                if (json.status == true){
                                    toastr["success"]("Saldo sudah diubah", "Berhasil");

                                    toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "positionClass": "toast-top-full-width",
                                    "onclick": null,
                                    "showDuration": "1000",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                    }
                                    
                                }else{
                                    $.bootstrapGrowl("Saldo tidak berhasil diubah.",{
                                        align: 'center',
                                        offset: {from: 'top', amount: 300},
                                        widht: 'auto',
                                        delay: 1000,
                                        type: 'danger',
                                    });
                                }
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert('Error adding / update data');
                            }
                        });
                    }else{
                        // $.toaster({ message : 'Terjadi Kesalahan', title : 'Data yang dimasukkan bukan angka', priority : 'warning' });

                        toastr["error"]("Data saldo tidak berupa angka", "Terjadi Kesalahan");

                        toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "positionClass": "toast-bottom-left",
                        "onclick": null,
                        "showDuration": "1000",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                        }
                        $("#"+key).val("").attr("placeholder", valSaldoUtama);
                        $("#"+key).focus();
                        
                    }

                    
                }
            });
        });


    });
</script>