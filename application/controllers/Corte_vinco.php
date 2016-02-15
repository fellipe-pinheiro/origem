<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Corte_vinco extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Corte_vinco_m');
    }

    public function index() {
        $data['corte_vinco'] = $this->Corte_vinco_m->listar();
        $this->load->view('corte_vinco/lista', $data);
    }

    public function form() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            $data['acao'] = 'inserir';

            $this->load->view('corte_vinco/form', $data);
        } else {
            $corte_vinco = $this->Corte_vinco_m->listar($id);

            $data['corte_vinco'] = $corte_vinco[0]; 
            $data['acao'] = 'editar';
            $data['id'] = $id;

            $this->load->view('corte_vinco/form', $data);
        }
    }
    
    public function inserir() {
        $corte_vinco = new Corte_vinco_m();
        $corte_vinco->id = null;
        $corte_vinco->nome = $this->input->post('nome');
        $corte_vinco->descricao = $this->input->post('descricao');
        $corte_vinco->valor = $this->input->post('valor');

        $id = $this->Corte_vinco_m->inserir($corte_vinco);
        if (!empty($id)) {
            redirect(base_url('corte_vinco/?msgTipe=sucesso&msg=Corte e Vinco inserido com sucesso'), 'location');
        } else {
            redirect(base_url('corte_vinco/?msgTipe=erro&msg=Erro ao inserir o Corte e Vinco'), 'location');
        }
    }
    
    public function editar() {
        $corte_vinco = new Corte_vinco_m();
        $corte_vinco->id = $this->input->post('id');;
        $corte_vinco->nome = $this->input->post('nome');
        $corte_vinco->descricao = $this->input->post('descricao');
        $corte_vinco->valor = $this->input->post('valor');

        if ($this->Corte_vinco_m->editar($corte_vinco)) {
            redirect(base_url('corte_vinco/?msgTipe=sucesso&msg=Corte e Vinco alterado com sucesso'), 'location');
        } else {
            sredirect(base_url('corte_vinco/?msgTipe=erro&msg=Erro ao alterar a Corte e Vinco'), 'location');
        }
    }
    
    public function deletar() {
        print $id = $this->uri->segment(3);

        if (!empty($this->Corte_vinco_m->deletar($id))) {
            redirect(base_url('corte_vinco/?msgTipe=sucesso&msg=Corte e Vinco apagado com sucesso'), 'location');
        } else {
            redirect(base_url('corte_vinco/?msgTipe=erro&msg=Erro ao apagar o Corte e Vinco'), 'location');
        }
    }
}
