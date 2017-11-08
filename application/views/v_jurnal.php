<div class="portlet light">
<div class="alert alert-info">Masukkan nama akun, jika akun tidak ditemukan maka &nbsp; <span class="glyphicon glyphicon-arrow-right"></span> &nbsp; <?=anchor('akundua/create?sumber=jurnal', ' Buat baru', array('class' => 'btn btn-default btn-sm') )?></div>
<?=form_open("jurnal/add", array('class' => 'form-horizontal', 'id' =>'form', 'name' => 'form' ))?>

<!-- <input name="nama_akun2" placeholder="Nama Akun 2" class="form-control" type="hidden">-->
<div class="input_fields_wrap">
<div id="message"><?php echo $this->session->flashdata('message'); ?></div>

<div class="form-group">
	<div class="col-md-5">
		<button style="color:#000; font-weight: bold;" class="btn btn-info add_field_button">Tambah field baru</button>
	</div>
</div>

<div class="form-group">
	<div class="col-md-5">
		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			<input class="form-control" id="date" name="date" placeholder="BB/HH/TTTT" type="text" />
		</div>
	</div>
</div>

<div class="form-group">
	<div class="col-md-1">
		<label for="uraian">Uraian</label>
	</div>
	<div class="input-group col-md-10">
		<textarea name="uraian" rows="1" class="form-control" style="width:100%"></textarea>
	</div>
</div>
<div class="form-group">
	<div class="col-md-3">
		<input data-validation="required" name="nama_akun2[]" id="nama_akun2-1" placeholder="Nama Akun 2" class="form-control" type="text">
	</div>
	<div class="col-md-2">
		<select name="posisi[]" class="form-control">
			<option value="" disabled selected>D/K</option>
			<option value="debit">Debet</option>
			<option value="kredit">Kredit</option>
		</select>
	</div>
	<label class="control-label col-md-1">No</label>
	<div class="col-md-2">
		<input name="no_akun2[]" id="no_akun2-1" placeholder="kode akun" class="form-control" type="text" readonly="readonly">
	</div>
	<div class="col-md-3">
		<div class="input-group">
			<span class="input-group-addon col-1">Rp.</span>
			<input data-validation="number" name="jumlah[]" placeholder="Jumlah" class="form-control" type="text">
		</div>
	</div>
	<div class="col-md-1">
	</div>
	<div class="col-md-12">
		<?php echo validation_errors(); ?>
	</div>
</div>
	<!-- end class form_group -->

	<div class="form-group">
		<div class="col-md-3">
			<input data-validation="required" name="nama_akun2[]" id="nama_akun2-2" placeholder="Nama Akun 2" class="form-control" type="text">
		</div>
		<div class="col-md-2">
			<select name="posisi[]" class="form-control">
      <option value="" disabled selected>D/K</option>
      <option value="debit">Debet</option>
      <option value="kredit">Kredit</option>
    </select>
		</div>
		<label class="control-label col-md-1">No</label>
		<div class="col-md-2">
			<input name="no_akun2[]" id="no_akun2-2" placeholder="kode akun" class="form-control" type="text" readonly="readonly">
		</div>

		<div class="col-md-3">
			<div class="input-group">
				<span class="input-group-addon col-1">Rp.</span>
				<input data-validation="number" name="jumlah[]" placeholder="Jumlah" class="form-control" type="text">
			</div>
		</div>

		<div class="col-md-1"></div>

		<div class="col-md-12">
			<?php echo validation_errors(); ?>
		</div>

	</div>
	<!-- end class form_group -->

</div>
<!-- end class input_fields_wrap -->



<div class="form-group">
	<div class="col-md-12">
		<?php echo form_submit('mysubmit', 'Submit!', array("class" => "btn btn-primary"));?>
	</div>
</div>
</div>

<?php form_close()?>
<script src="<?php echo base_url() ?>aset/js/jquery-2.2.3.min.js" ></script>
 <script src="<?php echo base_url() ?>aset/locales/bootstrap-datepicker.id.min.js" charset="UTF-8"></script>
<script src="<?php echo base_url() ?>aset/js/jquery.form-validator.min.js" charset="UTF-8"></script>

<script type="text/javascript">
      $.validate();
$(document).ready(function() {
	var max_fields = 10;
	var wrapper = $(".input_fields_wrap");
	var add_button = $(".add_field_button");
	var x = 2;


 	$(add_button).click(function(e) {
		e.preventDefault();
		if (x < max_fields) {
			x++;
			$(wrapper).append('<div class="form-group">  <div class="col-md-3">    <input name="nama_akun2[]" id="nama_akun2-' + x + '" placeholder="Nama Akun 2" class="form-control" type="text">  </div>  <div class="col-md-2">    <select name="posisi[]" class="form-control">      <option value="" disabled selected>D/K</option>      <option value="debit">Debet</option>      <option value="kredit">Kredit</option>    </select>  </div>  <label class="control-label col-md-1">No</label>  <div class="col-md-2">    <input name="no_akun2[]" id="no_akun2-' + x + '"placeholder="kode akun" class="form-control" type="text" readonly="readonly">  </div> <div class="col-md-3"><div class="input-group"><span class="input-group-addon col-1">Rp.</span><input data-validation="number" name="jumlah[]"  placeholder="Jumlah" class="form-control" type="text"></div></div>   <div class="col-md-1">	<a href="#" class="remove_field"><span class="glyphicon glyphicon-remove"></span></a>  </div><div class="col-md-3"></div><div class="col-md-9"><?php echo form_error("no_akun1"); ?></div></div>');

			$("input[id=nama_akun2-" + x + "]").autocomplete({
				source: "jurnal/saran",
				select: function(event, ui) {
					$('#no_akun2-' + x).val('' + ui.item.coba); // membuat id 'v_nim' untuk ditampilkan

				}
			});
			$.validate();
		}
	});

	$(wrapper).on("click", ".remove_field", function(e) {
		e.preventDefault();
		$(this).parent('div').parent('div').fadeOut("slow", function(){
			$(this).remove();
		});
		x--;
	})

	var date_input = $('input[name="date"]');
	//var container= "form";
	var options = {
		language: "id",
		format: 'yyyy/mm/dd',
		todayHighlight: true,
		todayBtn: true,
		container: $('#date').parent(),
		autoclose: true,
	};
	date_input.datepicker(options);
});




<?php for ($i = 1; $i <=10; $i++) : ?>
	$(function() {
		$("#nama_akun2-<?=$i?>").autocomplete({
			source: "jurnal/saran", // path to the get_birds method
			select: function(event, ui) {
				$('#no_akun2-<?=$i?>').val('' + ui.item.coba); // membuat id 'v_nim' untuk ditampilkan
			}
		});
	});
<?php endfor ?>

$(document).on('focus', '#nama_akun2-1:not(.ui-autocomplete-input)', function(e) {
	$(this).autocomplete({
		source: "jurnal/saran", // path to the get_birds method
		select: function(event, ui) {
			$('#no_akun2-<?=$i?>').val('' + ui.item.coba); // membuat id 'v_nim' untuk ditampilkan
		}
	});
});

$('#date').click(function() {
	var popup = $(this).offset();
	var popupTop = popup.top - 40;
	$('.ui-datepicker').css({
		'top': popupTop
	});
});
</script>


