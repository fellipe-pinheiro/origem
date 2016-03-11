<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faca extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Faca_m');
        empty($_SESSION) ? session_start() : '';
        login_necessario();
    }

    public function index() {
        $data['faca'] = $this->Faca_m->listar();
        $this->load->view('faca/lista', $data);
    }

    public function form() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            $data['acao'] = 'inserir';

            $this->load->view('faca/form', $data);
        } else {
            $faca = $this->Faca_m->listar($id);

            $data['faca'] = $faca[0];
            $data['acao'] = 'editar';
            $data['id'] = $id;

            $this->load->view('faca/form', $data);
        }
    }

    public function inserir() {
        $faca = new Faca_m();
        $faca->id = null;
        $faca->nome = $this->input->post('nome');
        $faca->descricao = $this->input->post('descricao');
        $faca->valor = $this->input->post('valor');

        $id = $this->Faca_m->inserir($faca);
        if (!empty($id)) {
            redirect(base_url('faca/?type=sucesso'), 'location');
        } else {
            redirect(base_url('faca/?type=erro'), 'location');
        }
    }

    public function editar() {
        $faca = new Faca_m();
        $faca->id = $this->input->post('id');
        ;
        $faca->nome = $this->input->post('nome');
        $faca->descricao = $this->input->post('descricao');
        $faca->valor = $this->input->post('valor');

        if ($this->Faca_m->editar($faca)) {
            redirect(base_url('faca/?type=sucesso'), 'location');
        } else {
            redirect(base_url('faca/?type=erro'), 'location');
        }
    }

    public function deletar() {
        $id = $this->uri->segment(3);

        if (!empty($this->Faca_m->deletar($id))) {
            redirect(base_url('faca/?type=sucesso'), 'location');
        } else {
            redirect(base_url('faca/?type=erro'), 'location');
        }
    }

}
