<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Usuario_m');
        empty($_SESSION) ? session_start() : '';
        login_necessario();
    }

    public function index() {
        $this->load->view('Home/index');
    }

    public function login() {
        $this->load->view('Home/login');
    }

    public function teste() {
        $valor = "100000000";
        echo "Valor Original: R$ $valor";
        echo "<br />";
        $this->load->helper("funcoes");
        echo "Valor Formatado: R$ " . formata_preco($valor);
    }

}
