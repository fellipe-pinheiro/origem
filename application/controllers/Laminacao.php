<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laminacao extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Laminacao_m');
    }

    public function index() {
        $data['laminacao'] = $this->Laminacao_m->listar();
        $this->load->view('laminacao/lista', $data);
    }

    public function form() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            $data['acao'] = 'inserir';

            $this->load->view('laminacao/form', $data);
        } else {
            $laminacao = $this->Laminacao_m->listar($id);

            $data['laminacao'] = $laminacao[0]; 
            $data['acao'] = 'editar';
            $data['id'] = $id;

            $this->load->view('laminacao/form', $data);
        }
    }
    
    public function inserir() {
        $laminacao = new Laminacao_m();
        $laminacao->id = null;
        $laminacao->nome = $this->input->post('nome');
        $laminacao->descricao = $this->input->post('descricao');
        $laminacao->valor = $this->input->post('valor');

        $id = $this->Laminacao_m->inserir($laminacao);
        if (!empty($id)) {
            redirect(base_url('laminacao/?msgTipe=sucesso&msg=laminação inserido com sucesso'), 'location');
        } else {
            redirect(base_url('laminacao/?msgTipe=erro&msg=Erro ao inserir a laminação'), 'location');
        }
    }
    
    public function editar() {
        $laminacao = new Laminacao_m();
        $laminacao->id = $this->input->post('id');;
        $laminacao->nome = $this->input->post('nome');
        $laminacao->descricao = $this->input->post('descricao');
        $laminacao->valor = $this->input->post('valor');

        if ($this->Laminacao_m->editar($laminacao)) {
            redirect(base_url('laminacao/?msgTipe=sucesso&msg=laminação alterado com sucesso'), 'location');
        } else {
            sredirect(base_url('laminacao/?msgTipe=erro&msg=Erro ao alterar a laminação'), 'location');
        }
    }
    
    public function deletar() {
        print $id = $this->uri->segment(3);

        if (!empty($this->Laminacao_m->deletar($id))) {
            redirect(base_url('laminacao/?msgTipe=sucesso&msg=laminação apagado com sucesso'), 'location');
        } else {
            redirect(base_url('laminacao/?msgTipe=erro&msg=Erro ao apagar a laminação'), 'location');
        }
    }
}
