<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Acabamento extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Acabamento_m');
        empty($_SESSION) ? session_start() : '';
        login_necessario();
    }

    public function index() {
        $data['acabamento'] = $this->Acabamento_m->listar();
        $this->load->view('acabamento/lista', $data);
    }

    public function form() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            $data['acao'] = 'inserir';

            $this->load->view('acabamento/form', $data);
        } else {
            $acabamento = $this->Acabamento_m->listar($id);

            $data['acabamento'] = $acabamento[0];
            $data['acao'] = 'editar';
            $data['id'] = $id;

            $this->load->view('acabamento/form', $data);
        }
    }

    public function inserir() {
        $acabamento = new Acabamento_m();
        $acabamento->id = null;
        $acabamento->nome = $this->input->post('nome');
        $acabamento->descricao = $this->input->post('descricao');
        $acabamento->valor = $this->input->post('valor');

        $id = $this->Acabamento_m->inserir($acabamento);
        if (!empty($id)) {
            redirect(base_url('acabamento/?msgTipe=sucesso&msg=Acabamento inserido com sucesso'), 'location');
        } else {
            redirect(base_url('acabamento/?msgTipe=erro&msg=Erro ao inserir o acabamento'), 'location');
        }
    }

    public function editar() {
        $acabamento = new Acabamento_m();
        $acabamento->id = $this->input->post('id');
        ;
        $acabamento->nome = $this->input->post('nome');
        $acabamento->descricao = $this->input->post('descricao');
        $acabamento->valor = $this->input->post('valor');

        if ($this->Acabamento_m->editar($acabamento)) {
            redirect(base_url('acabamento/?msgTipe=sucesso&msg=Acabamento alterado com sucesso'), 'location');
        } else {
            sredirect(base_url('acabamento/?msgTipe=erro&msg=Erro ao alterar o acabamento'), 'location');
        }
    }

    public function deletar() {
        print $id = $this->uri->segment(3);

        if (!empty($this->Acabamento_m->deletar($id))) {
            redirect(base_url('acabamento/?msgTipe=sucesso&msg=Acabamento apagado com sucesso'), 'location');
        } else {
            redirect(base_url('acabamento/?msgTipe=erro&msg=Erro ao apagar o acabamento'), 'location');
        }
    }

}
