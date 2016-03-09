<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Papel extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Papel_m');
        empty($_SESSION) ? session_start() : '';
        login_necessario();
    }

    public function index() {
        $data['papel'] = $this->Papel_m->listar();
        $this->load->view('Papel/lista', $data);
    }

    public function form() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            $data['acao'] = 'inserir';

            $this->load->view('papel/form', $data);
        } else {
            $papel = $this->Papel_m->listar($id);

            $data['papel'] = $papel[0];
            $data['acao'] = 'editar';
            $data['id'] = $id;

            $this->load->view('papel/form', $data);
        }
    }

    public function inserir() {
        $papel = new Papel_m();
        $papel->id = null;
        $papel->nome = $this->input->post('nome');
        $papel->gramatura = $this->input->post('gramatura');
        $papel->altura = $this->input->post('altura');
        $papel->largura = $this->input->post('largura');
        $papel->descricao = $this->input->post('descricao');
        $papel->valor = $this->input->post('valor');

        $id = $this->Papel_m->inserir($papel);
        if (!empty($id)) {
            redirect(base_url('papel/?type=sucesso'), 'location');
        } else {
            redirect(base_url('papel/?type=erro'), 'location');
        }
    }

    public function editar() {
        $papel = new Papel_m();
        $papel->id = $this->input->post('id');
        $papel->nome = $this->input->post('nome');
        $papel->gramatura = $this->input->post('gramatura');
        $papel->altura = $this->input->post('altura');
        $papel->largura = $this->input->post('largura');
        $papel->descricao = $this->input->post('descricao');
        $papel->valor = $this->input->post('valor');

        if ($this->Papel_m->editar($papel)) {
            redirect(base_url('papel/?type=sucesso'), 'location');
        } else {
            redirect(base_url('papel/?type=erro'), 'location');
        }
    }

    public function deletar() {
        $id = $this->uri->segment(3);
        if (!empty($this->Papel_m->deletar($id))) {
            redirect(base_url('papel/?type=sucesso'), 'location');
        } else {
            redirect(base_url('papel/?type=erro'), 'location');
        }
    }

}
