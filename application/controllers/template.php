<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index(){
      $this->load->view('template/caput');
      $this->load->view('template/corporis');
      $this->load->view('template/pes');
    }

}
