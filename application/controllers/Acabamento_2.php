<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Acabamento_2 extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Acabamento_2_m');
        empty($_SESSION) ? session_start() : '';
        login_necessario();
    }

    public function index() {
        $data['acabamento_2'] = $this->Acabamento_2_m->listar();
        $this->load->view('acabamento_2/lista', $data);
    }

    public function form() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            $data['acao'] = 'inserir';
            $this->load->view('acabamento_2/form', $data);
        } else {
            $acabamento_2 = $this->Acabamento_2_m->listar($id);
            $data['acabamento_2'] = $acabamento_2[0];
            $data['acao'] = 'editar';
            $data['id'] = $id;

            $this->load->view('acabamento_2/form', $data);
        }
    }

    public function inserir() {
        $acabamento_2 = new Acabamento_2_m();
        $acabamento_2->id = null;
        $acabamento_2->nome = $this->input->post('nome');
        $acabamento_2->descricao = $this->input->post('descricao');
        $acabamento_2->valor = $this->input->post('valor');
        $id = $this->Acabamento_2_m->inserir($acabamento_2);
        if (!empty($id)) {
            redirect(base_url('acabamento_2/?type=sucesso'), 'location');
        } else {
            redirect(base_url('acabamento_2/?type=erro'), 'location');
        }
    }

    public function editar() {
        $acabamento_2 = new Acabamento_2_m();
        $acabamento_2->id = $this->input->post('id');
        $acabamento_2->nome = $this->input->post('nome');
        $acabamento_2->descricao = $this->input->post('descricao');
        $acabamento_2->valor = $this->input->post('valor');

        if ($this->Acabamento_2_m->editar($acabamento_2)) {
            redirect(base_url('acabamento_2/?type=sucesso'), 'location');
        } else {
            redirect(base_url('acabamento_2/?type=erro'), 'location');
        }
    }

    public function deletar() {
        $id = $this->uri->segment(3);

        if ($this->Acabamento_2_m->deletar($id)) {
            redirect(base_url('acabamento_2/?type=sucesso'), 'location');
        } else {
            redirect(base_url('acabamento_2/?type=erro'), 'location');
        }
    }

}
