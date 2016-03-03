<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Cliente_m');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('array');
        empty($_SESSION) ? session_start() : '';
        login_necessario();
    }

    public function index() {
        $data['cliente'] = $this->Cliente_m->listar();
        $this->load->view('cliente/lista', $data);
    }

    public function form() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            $data['acao'] = 'inserir';

            $this->load->view('cliente/form', $data);
        } else {
            $cliente = $this->Cliente_m->listar($id);

            $data['cliente'] = $cliente[0];
            $data['acao'] = 'editar';
            $data['id'] = $id;

            $this->load->view('cliente/form', $data);
        }
    }

    public function inserir() {
        $cliente = new Cliente_m();
        $cliente->id = null;
        $cliente->nome = $this->input->post('nome');
        $cliente->pessoa_tipo = $this->input->post('pessoa_tipo');
        $cliente->email = $this->input->post('email');
        $cliente->celular = $this->input->post('celular');
        $cliente->telefone = $this->input->post('telefone');
        $cliente->cnpj_cpf = $this->input->post('cnpj_cpf');
        $cliente->ie = $this->input->post('ie');
        $cliente->im = $this->input->post('im');
        $cliente->rua = $this->input->post('rua');
        $cliente->numero = $this->input->post('numero');
        $cliente->complemento = $this->input->post('complemento');
        $cliente->bairro = $this->input->post('bairro');
        $cliente->cidade = $this->input->post('cidade');
        $cliente->estado = $this->input->post('estado');
        $cliente->cep = $this->input->post('cep');
        $cliente->observacao = $this->input->post('observacao');

        $id = $this->Cliente_m->inserir($cliente);
        if (!empty($id)) {
            redirect(base_url('cliente/?msgTipe=sucesso&msg=cliente inserido com sucesso'), 'location');
        } else {
            redirect(base_url('cliente/?msgTipe=erro&msg=Erro ao inserir a cliente'), 'location');
        }
    }

    public function editar() {
        $cliente = new Cliente_m();
        $cliente->id = $this->input->post('id');
        $cliente->nome = $this->input->post('nome');
        $cliente->pessoa_tipo = $this->input->post('pessoa_tipo');
        $cliente->email = $this->input->post('email');
        $cliente->celular = $this->input->post('celular');
        $cliente->telefone = $this->input->post('telefone');
        $cliente->cnpj_cpf = $this->input->post('cnpj_cpf');
        $cliente->ie = $this->input->post('ie');
        $cliente->im = $this->input->post('im');
        $cliente->rua = $this->input->post('rua');
        $cliente->numero = $this->input->post('numero');
        $cliente->complemento = $this->input->post('complemento');
        $cliente->bairro = $this->input->post('bairro');
        $cliente->cidade = $this->input->post('cidade');
        $cliente->estado = $this->input->post('estado');
        $cliente->cep = $this->input->post('cep');
        $cliente->observacao = $this->input->post('observacao');

        if ($this->Cliente_m->editar($cliente)) {
            redirect(base_url('cliente/?msgTipe=sucesso&msg=cliente alterado com sucesso'), 'location');
        } else {
            redirect(base_url('cliente/?msgTipe=erro&msg=Erro ao alterar o cliente'), 'location');
        }
    }

    public function deletar() {
        print $id = $this->uri->segment(3);

        if (!empty($this->Cliente_m->deletar($id))) {
            redirect(base_url('cliente/?msgTipe=sucesso&msg=cliente apagado com sucesso'), 'location');
        } else {
            redirect(base_url('cliente/?msgTipe=erro&msg=Erro ao apagar o cliente'), 'location');
        }
    }

    public function inserir_modal() {
        $cliente = new Cliente_m();
        $cliente->id = null;
        $cliente->nome = $this->input->post('nome');
        $cliente->pessoa_tipo = $this->input->post('pessoa_tipo');
        $cliente->email = $this->input->post('email');
        $cliente->celular = $this->input->post('celular');
        $cliente->telefone = $this->input->post('telefone');
        $cliente->cnpj_cpf = $this->input->post('cnpj_cpf');
        $cliente->ie = $this->input->post('ie');
        $cliente->im = $this->input->post('im');
        $cliente->rua = $this->input->post('rua');
        $cliente->numero = $this->input->post('numero');
        $cliente->complemento = $this->input->post('complemento');
        $cliente->bairro = $this->input->post('bairro');
        $cliente->cidade = $this->input->post('cidade');
        $cliente->estado = $this->input->post('estado');
        $cliente->cep = $this->input->post('cep');
        $cliente->observacao = $this->input->post('observacao');
        $id = $this->Cliente_m->inserir($cliente);
        if (!empty($id)) {
            print $id;
        } else {
            print FALSE;
        }
    }

    public function editar_modal() {
        $cliente = new Cliente_m();
        $cliente->id = $this->input->post('id');
        $cliente->nome = $this->input->post('nome');
        $cliente->pessoa_tipo = $this->input->post('pessoa_tipo');
        $cliente->email = $this->input->post('email');
        $cliente->celular = $this->input->post('celular');
        $cliente->telefone = $this->input->post('telefone');
        $cliente->cnpj_cpf = $this->input->post('cnpj_cpf');
        $cliente->ie = $this->input->post('ie');
        $cliente->im = $this->input->post('im');
        $cliente->rua = $this->input->post('rua');
        $cliente->numero = $this->input->post('numero');
        $cliente->complemento = $this->input->post('complemento');
        $cliente->bairro = $this->input->post('bairro');
        $cliente->cidade = $this->input->post('cidade');
        $cliente->estado = $this->input->post('estado');
        $cliente->cep = $this->input->post('cep');
        $cliente->observacao = $this->input->post('observacao');
        if ($this->Cliente_m->editar($cliente)) {
            print $cliente->id;
        } else {
            print FALSE;
        }
    }

}
