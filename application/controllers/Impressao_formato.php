<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Impressao_formato extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Impressao_formato_m');
        empty($_SESSION) ? session_start() : '';
        login_necessario();
    }

    public function index() {
        $data['impressao_formato'] = $this->Impressao_formato_m->listar();
        $this->load->view('Impressao_formato/lista', $data);
    }

    public function form() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            $data['acao'] = 'inserir';

            $this->load->view('impressao_formato/form', $data);
        } else {
            $impressao_formato = $this->Impressao_formato_m->listar($id);
            
            $data['impressao_formato'] = $impressao_formato[0]; 
            $data['acao'] = 'editar';
            $data['id'] = $id;

            $this->load->view('impressao_formato/form', $data);
        }
    }
    
    public function inserir() {
        
        $impressao_formato = new Impressao_formato_m();
        $impressao_formato->id = null;
        $impressao_formato->nome = $this->input->post('nome');
        $impressao_formato->altura = $this->input->post('altura');
        $impressao_formato->largura = $this->input->post('largura');
        $impressao_formato->descricao = $this->input->post('descricao');
        $id = $this->Impressao_formato_m->inserir($impressao_formato);
        if (!empty($id)) {
            redirect(base_url('impressao_formato/?msgTipe=sucesso&msg=Impressao Formato inserido com sucesso'), 'location');
        } else {
            redirect(base_url('impressao_formato/?msgTipe=erro&msg=Erro ao inserir a Impressao Formato'), 'location');
        }
    }
    
    public function editar() {
        $impressao_formato = new Impressao_formato_m();
        $impressao_formato->id = $this->input->post('id');;
        $impressao_formato->nome = $this->input->post('nome');
        $impressao_formato->altura = $this->input->post('altura');
        $impressao_formato->largura = $this->input->post('largura');
        $impressao_formato->descricao = $this->input->post('descricao');

        if ($this->Impressao_formato_m->editar($impressao_formato)) {
            redirect(base_url('impressao_formato/?msgTipe=sucesso&msg=Impressao Formato alterado com sucesso'), 'location');
        } else {
            sredirect(base_url('impressao_formato/?msgTipe=erro&msg=Erro ao alterar a Impressao Formato'), 'location');
        }
    }
    
    public function deletar() {
        print $id = $this->uri->segment(3);

        if (!empty($this->Impressao_formato_m->deletar($id))) {
            redirect(base_url('impressao_formato/?msgTipe=sucesso&msg=Impressao Formato apagado com sucesso'), 'location');
        } else {
            redirect(base_url('impressao_formato/?msgTipe=erro&msg=Erro ao apagar a Impressao Formato'), 'location');
        }
    }
}
