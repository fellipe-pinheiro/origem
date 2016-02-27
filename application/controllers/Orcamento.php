<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Orcamento extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Impressao_m');
        $this->load->model('Impressao_formato_m');
        $this->load->model('Fotolito_m');
        $this->load->model('Acabamento_m');
        $this->load->model('Faca_m');
        $this->load->model('Papel_m');
        $this->load->model('Empastamento_m');
        $this->load->model('Laminacao_m');
        $this->load->model('Colagem_m');
        $this->load->model('Servico_m');
//        $this->load->library('session');
        
        session_start();
    }

    public function index() {
//        print "<pre>";
//        $_SESSION['laminacao'] = $this->Laminacao_m->listar();
//        var_dump($_SESSION);
//        die();
        $data = '';
//        if (!empty($_SESSION['servico'])) {
//            $data['valor_total'] = $this->session->servico->calcula_total_servico();
//            $data['valor_unitario'] = $this->session->servico->calcula_unitario_servico($data['valor_total'], $this->session->servico->quantidade);
//            $data['total'] = $data['valor_total'] - $this->session->servico->desconto;
//        }
        $this->load->view('Orcamento/lista', $data);
    }

    public function excluir_todos_servicos() {
        unset(
                $_SESSION['papel'], $_SESSION['empastamento'], $_SESSION['impressao'], $_SESSION['acabamento'], $_SESSION['faca'], $_SESSION['servico'], $_SESSION['fotolito'], $_SESSION['laminacao'], $_SESSION['colagem']
        );
        redirect(base_url('orcamento'), 'location');
    }

    public function orcamento_sessao_inserir($param) {
        
    }

}
