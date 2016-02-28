<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Impressao extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Impressao_m');
        $this->load->model('Impressao_formato_m');
        empty($_SESSION) ? session_start() : '';
        login_necessario();
    }

    public function index() {
        $data['impressao'] = $this->Impressao_m->listar();

        $this->load->view('impressao/lista', $data);
    }

    public function form() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            $impressao_formato_lista = $this->Impressao_formato_m->listar();
            $data['acao'] = 'inserir';
            $data['impressao_formato'] = $impressao_formato_lista;
            $this->load->view('impressao/form', $data);
        } else {
            $impressao = $this->Impressao_m->listar($id);
            $impressao_formato_lista = $this->Impressao_formato_m->listar();

            $data['impressao'] = $impressao[0];
            $data['impressao_formato'] = $impressao_formato_lista;
            $data['acao'] = 'editar';
            $data['id'] = $id;

            $this->load->view('impressao/form', $data);
        }
    }

    public function inserir() {
        $impressao = new Impressao_m();
        $impressao->id = null;
        $impressao->nome = $this->input->post('nome');
        $impressao->descricao = $this->input->post('descricao');
        $impressao->valor = $this->input->post('valor');
        $impressao->impressao_formato = $this->input->post('impressao_formato');

        $id = $this->Impressao_m->inserir($impressao);
        if (!empty($id)) {
            redirect(base_url('impressao/?msgTipe=sucesso&msg=impressao inserido com sucesso'), 'location');
        } else {
            redirect(base_url('impressao/?msgTipe=erro&msg=Erro ao inserir a impressao'), 'location');
        }
    }

    public function editar() {
        $impressao = new Impressao_m();
        $impressao->id = $this->input->post('id');
        $impressao->nome = $this->input->post('nome');
        $impressao->descricao = $this->input->post('descricao');
        $impressao->valor = $this->input->post('valor');
        $impressao->impressao_formato = $this->input->post('impressao_formato');

        if ($this->Impressao_m->editar($impressao)) {
            redirect(base_url('impressao/?msgTipe=sucesso&msg=impressao alterado com sucesso'), 'location');
        } else {
            sredirect(base_url('impressao/?msgTipe=erro&msg=Erro ao alterar a impressao'), 'location');
        }
    }

    public function deletar() {
        print $id = $this->uri->segment(3);

        if (!empty($this->Impressao_m->deletar($id))) {
            redirect(base_url('impressao/?msgTipe=sucesso&msg=impressao apagado com sucesso'), 'location');
        } else {
            redirect(base_url('impressao/?msgTipe=erro&msg=Erro ao apagar a impressao'), 'location');
        }
    }

}
