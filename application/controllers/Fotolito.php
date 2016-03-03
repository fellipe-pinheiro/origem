<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fotolito extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Fotolito_m');
        $this->load->model('Impressao_formato_m');
        $this->load->model('Impressao_formato_m');
        empty($_SESSION) ? session_start() : '';
        login_necessario();
    }

    public function index() {
        $data['fotolito'] = $this->Fotolito_m->listar();
        $this->load->view('fotolito/lista', $data);
    }

    public function form() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            $impressao_formato_lista = $this->Impressao_formato_m->listar();
            //die();
            $data['acao'] = 'inserir';
            $data['impressao_formato'] = $impressao_formato_lista;
            $this->load->view('fotolito/form', $data);
        } else {
            $fotolito = $this->Fotolito_m->listar($id);
            $impressao_formato_lista = $this->Impressao_formato_m->listar();

            $data['fotolito'] = $fotolito[0];
            $data['impressao_formato'] = $impressao_formato_lista;
            $data['acao'] = 'editar';
            $data['id'] = $id;

            $this->load->view('fotolito/form', $data);
        }
    }

    public function inserir() {
        $fotolito = new Fotolito_m();
        $fotolito->id = null;
        $fotolito->impressao_formato = $this->input->post('impressao_formato');
        $fotolito->descricao = $this->input->post('descricao');
        $fotolito->valor = $this->input->post('valor');

        $id = $this->Fotolito_m->inserir($fotolito);
        if (!empty($id)) {
            redirect(base_url('fotolito/?msgTipe=sucesso&msg=fotolito inserido com sucesso'), 'location');
        } else {
            redirect(base_url('fotolito/?msgTipe=erro&msg=Erro ao inserir a fotolito'), 'location');
        }
    }

    public function editar() {
        $this->form_validation->set_message('is_unique', 'Este %s já está cadastrado no sistema');
        $this->form_validation->set_rules('impressao_formato', 'impressao_formato', 'required|is_unique[fotolito.impressao_formato]');
//        TODO: FLASHDATA
        if ($this->form_validation->run() == TRUE) {
            $fotolito = new Fotolito_m();
            $fotolito->id = $this->input->post('id');
            $fotolito->impressao_formato = $this->input->post('impressao_formato');
            $fotolito->descricao = $this->input->post('descricao');
            $fotolito->valor = $this->input->post('valor');
            if ($this->Fotolito_m->editar($fotolito)) {
                redirect(base_url('fotolito/?msgTipe=sucesso&msg=fotolito alterado com sucesso'), 'location');
            } else {
                sredirect(base_url('fotolito/?msgTipe=erro&msg=Erro ao alterar a fotolito'), 'location');
            }
        } else {
            sredirect(base_url('fotolito/?msgTipe=erro&msg=Erro ao alterar a fotolito'), 'location');
        }
    }

    public function deletar() {
        print $id = $this->uri->segment(3);

        if (!empty($this->Fotolito_m->deletar($id))) {
            redirect(base_url('fotolito/?msgTipe=sucesso&msg=fotolito apagado com sucesso'), 'location');
        } else {
            redirect(base_url('fotolito/?msgTipe=erro&msg=Erro ao apagar a fotolito'), 'location');
        }
    }

}
