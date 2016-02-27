<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Impressao_cartao extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Impressao_cartao_m');
        $this->load->model('Impressao_formato_m');
    }

    public function index() {
        $data['impressao_cartao'] = $this->Impressao_cartao_m->listar();

        $this->load->view('impressao_cartao/lista', $data);
    }

    public function form() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            $impressao_formato_lista = $this->Impressao_formato_m->listar();
            $data['acao'] = 'inserir';
            $data['impressao_formato'] = $impressao_formato_lista;
            $this->load->view('impressao_cartao/form', $data);
        } else {
            $impressao_cartao = $this->Impressao_cartao_m->listar($id);
            $impressao_formato_lista = $this->Impressao_formato_m->listar();

            $data['impressao_cartao'] = $impressao_cartao[0];
            $data['impressao_formato'] = $impressao_formato_lista;
            $data['acao'] = 'editar';
            $data['id'] = $id;

            $this->load->view('impressao_cartao/form', $data);
        }
    }

    public function inserir() {
        $impressao_cartao = new Impressao_cartao_m();
        $impressao_cartao->id = null;
        $impressao_cartao->nome = $this->input->post('nome');
        $impressao_cartao->valor_100 = $this->input->post('valor_100');
        $impressao_cartao->valor_500 = $this->input->post('valor_500');
        $impressao_cartao->valor_1000 = $this->input->post('valor_1000');
        $impressao_cartao->descricao = $this->input->post('descricao');
        $impressao_cartao->impressao_formato = $this->input->post('impressao_formato');

        $id = $this->Impressao_cartao_m->inserir($impressao_cartao);
        if (!empty($id)) {
            redirect(base_url('impressao_cartao/?msgTipe=sucesso&msg=impressao inserido com sucesso'), 'location');
        } else {
            redirect(base_url('impressao_cartao/?msgTipe=erro&msg=Erro ao inserir a impressao'), 'location');
        }
    }

    public function editar() {
        $impressao_cartao = new Impressao_cartao_m();
        $impressao_cartao->id = $this->input->post('id');
        $impressao_cartao->nome = $this->input->post('nome');
        $impressao_cartao->valor_100 = $this->input->post('valor_100');
        $impressao_cartao->valor_500 = $this->input->post('valor_500');
        $impressao_cartao->valor_1000 = $this->input->post('valor_1000');
        $impressao_cartao->descricao = $this->input->post('descricao');
        $impressao_cartao->impressao_formato = $this->input->post('impressao_formato');

        if ($this->Impressao_cartao_m->editar($impressao_cartao)) {
            redirect(base_url('impressao_cartao/?msgTipe=sucesso&msg=impressao alterado com sucesso'), 'location');
        } else {
            sredirect(base_url('impressao_cartao/?msgTipe=erro&msg=Erro ao alterar a impressao'), 'location');
        }
    }

    public function deletar() {
        print $id = $this->uri->segment(3);

        if (!empty($this->Impressao_cartao_m->deletar($id))) {
            redirect(base_url('impressao_cartao/?msgTipe=sucesso&msg=impressao apagado com sucesso'), 'location');
        } else {
            redirect(base_url('impressao_cartao/?msgTipe=erro&msg=Erro ao apagar a impressao'), 'location');
        }
    }

}
