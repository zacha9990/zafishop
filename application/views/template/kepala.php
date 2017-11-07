<?php
  if ($this->uri->segment(1)) {
      $breadcumb = $this->uri->segment(1);
  } else {
      $breadcumb = 'home';
  }
?>
	<!DOCTYPE html>
	<html>
	<head>
    <meta charset="utf-8" />
		<title>
			<?=$title?>
		</title>

		<link rel="stylesheet" href="<?php echo base_url() ?>aset/css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>aset/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>aset/css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>aset/css/jquery.dataTables.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>aset/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>aset/css/shop.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>aset/css/jquery.dataTables_themeroller.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>aset/css/bootstrap-datepicker3.css">
		<script src="<?php echo base_url() ?>aset/js/jquery-2.2.3.min.js"></script>
		<script src="<?php echo base_url() ?>aset/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url() ?>aset/js/jquery.dataTables.js"></script>
		<script src="<?php echo base_url() ?>aset/js/respond.min.js"></script>
		<script src="<?php echo base_url() ?>aset/js/jquery-ui.js"></script>
		<script src="<?php echo base_url() ?>aset/locales/bootstrap-datepicker.id.min.js" charset="UTF-8"></script>
		<script src="<?php echo base_url() ?>aset/js/bootstrap-datepicker.min.js"></script>

		<style>
			.ui-autocomplete-loading {
				background: url('<?php echo base_url() ?>aset/ui-anim_basic_16x16.gif') no-repeat right center
			}
		</style>


	</head>

	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-1"></div>

				<div class="col-md-9">
					<header>

						<div class="page-header text-center">
							<h1>Sistem Informasi Akuntansi </h1>
						</div>

            <!-- taruh navigasi di sini -->

						<ul class="nav nav-tabs" role="tablist">
							<li <?php if ($breadcumb=='home' ) : ?> class="active"
								<?php endif; ?>><a href="#">Home</a>
              </li>

							<li class="dropdown <?php if ($breadcumb == 'akunsatu' || $breadcumb == 'akundua')  echo 'active' ?> ">

								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Data master <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo site_url() ?>/akunsatu" <?php if ($breadcumb=='akunsatu' ) : ?>style="color:blue;"<?php endif ?>><?php if ($breadcumb == 'akunsatu') : ?><span class="glyphicon glyphicon-th-list"></span>
                    <?php endif; ?>Data Kelompok Akun</a></li>
									<li><a href="<?php echo site_url() ?>/akundua" <?php if ($breadcumb=='akundua' ) : ?>style="color:blue;"<?php endif ?>><?php if ($breadcumb == 'akundua') : ?><span class="glyphicon glyphicon-th-list"></span>
                    <?php endif; ?>Data akun</a></li>
									<li><a href="#">Data saldo awal</a></li>
								</ul>
							</li>

							<li <?php if ($breadcumb=='jurnal' ): ?> class="active"
								<?php endif ?>>
								<?php echo anchor('jurnal', 'Jurnal', array('title'=>'Input Jurnal'))?>
							</li>

							<li><a href="#">Laporan</a></li>

              <!-- akhir dari navigasi -->
						</ul>
						<br />
					</header>
