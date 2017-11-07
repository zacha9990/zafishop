<?php
  if ($this->uri->segment(1)) {
      $breadcumb = $this->uri->segment(1);
  } else {
      $breadcumb = 'home';
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?=$title?></title>

	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>aset/css/bootstrap.css">

	<!-- Custom CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>aset/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>aset/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>aset/css/jquery.dataTables.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>aset/css/jquery-ui.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>aset/css/jquery.dataTables_themeroller.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>aset/css/bootstrap-datepicker3.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>aset/css/main.css">

  <style>
    .ui-autocomplete-loading {
      background: url('<?php echo base_url() ?>aset/ui-anim_basic_16x16.gif') no-repeat right center
    }
  </style>


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="site">

	<!-- Navigation -->
	<nav class="navbar navbar-fixed-top navbar-default" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<a class="navbar-brand" href="#">
                    <img src="<?php echo base_url() ?>aset/img/logo_new.png" alt="logo">
                </a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav nav-tabs">
					<li>
						<a href="#">Home</a>
					</li>
          <!-- start dropdown -->
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
          <!-- end dropdown -->
					<li <?php if ($breadcumb =='jurnal' ): ?> class="active" <?php endif ?>>
						<a  href="<?=site_url()?>/jurnal">Jurnal</a>
					</li>

          <li>
						<a <?php if ($breadcumb=='laporan' ): ?> class="active" <?php endif ?> href="#">Laporan</a>
					</li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>
