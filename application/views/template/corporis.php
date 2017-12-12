
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1><?=$title?> </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                        <div class="page-toolbar">
                            <!-- BEGIN THEME PANEL -->
                            
                            <!-- END THEME PANEL -->
                        </div>
                        <!-- END PAGE TOOLBAR -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                        <!-- BEGIN PAGE BREADCRUMBS -->
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span><?=$title?></span>
                            </li>
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
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

            case 'saldoawal':
            $this->load->view('v_saldoAwal');
            break;


            default:
              $this->load->view('index');
              break;
          }
        ?>
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->