<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Frete extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Frete_m');
        empty($_SESSION) ? session_start() : '';
        login_necessario();
    }

    public function index() {
        $data['frete'] = $this->Frete_m->listar();
        $this->load->view('frete/lista', $data);
    }

    public function form() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            $data['acao'] = 'inserir';

            $this->load->view('frete/form', $data);
        } else {
            $frete = $this->Frete_m->listar($id);

            $data['frete'] = $frete[0];
            $data['acao'] = 'editar';
            $data['id'] = $id;

            $this->load->view('frete/form', $data);
        }
    }

    public function inserir() {
        $frete = new Frete_m();
        $frete->id = null;
        $frete->nome = $this->input->post('nome');
        $frete->descricao = $this->input->post('descricao');
        $frete->valor = $this->input->post('valor');

        $id = $this->Frete_m->inserir($frete);
        if (!empty($id)) {
            redirect(base_url('frete/?type=sucesso'), 'location');
        } else {
            redirect(base_url('frete/?type=erro'), 'location');
        }
    }

    public function editar() {
        $frete = new Frete_m();
        $frete->id = $this->input->post('id');
        $frete->nome = $this->input->post('nome');
        $frete->descricao = $this->input->post('descricao');
        $frete->valor = $this->input->post('valor');

        if ($this->Frete_m->editar($frete)) {
            redirect(base_url('frete/?type=sucesso'), 'location');
        } else {
            redirect(base_url('frete/?type=erro'), 'location');
        }
    }

    public function deletar() {
        $id = $this->uri->segment(3);

        if ($this->Frete_m->deletar($id)) {
            redirect(base_url('frete/?type=sucesso'), 'location');
        } else {
            redirect(base_url('frete/?type=erro'), 'location');
        }
    }

}
