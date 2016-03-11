<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Documentacao extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('html');
    }

    public function index() {
        $this->load->view('documentacao/lista');
    }

    public function form() {
        $this->load->view('documentacao/form');
    }

    public function orcamento() {
        $this->load->view('documentacao/orcamento');
    }

}
