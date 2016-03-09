<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Usuario_m');
        empty($_SESSION) ? session_start() : '';
        login_necessario();
    }

    public function index() {
        $data['usuario'] = $this->Usuario_m->listar();
        $this->load->view('usuario/lista', $data);
    }

    public function form() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            $data['acao'] = 'inserir';

            $this->load->view('usuario/form', $data);
        } else {
            $usuario = $this->Usuario_m->listar($id);

            $data['usuario'] = $usuario[0];
            $data['acao'] = 'editar';
            $data['id'] = $id;

            $this->load->view('usuario/form', $data);
        }
    }

    public function inserir() {
        $usuario = new Usuario_m();
        $usuario->id = null;
        $usuario->nome = $this->input->post('nome');
        $usuario->login = $this->input->post('login');

        $dados = array(
            'id' => $usuario->id,
            'nome' => $usuario->nome,
            'login' => $usuario->login
        );

        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('login', 'Login', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="erro">', '</div>');

        if ($this->form_validation->run() == TRUE) {
            if ($this->Usuario_m->inserir($dados)) {
                redirect(base_url('usuario/?type=sucesso'), 'location');
            } else {
                redirect(base_url('usuario/?type=erro'), 'location');
            }
        } else {
            $data['acao'] = 'inserir';
            $this->load->view('usuario/form', $data);
        }
    }

    public function editar() {
        $usuario = new Usuario_m();
        $usuario->id = $this->input->post('id');
        $usuario->nome = $this->input->post('nome');
        $usuario->login = $this->input->post('login');

        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('login', 'Login', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $this->Usuario_m->editar($usuario);
            redirect(base_url('usuario/?type=sucesso'), 'location');
        } else {
            redirect(base_url('usuario/?type=erro'), 'location');
        }
    }

    public function deletar() {
        $id = $this->uri->segment(3);

        if ($this->Usuario_m->deletar($id)) {
            redirect(base_url('usuario/?type=sucesso'), 'location');
        } else {
            redirect(base_url('usuario/?type=erro'), 'location');
        }
    }

    public function reset_password() {
        $id = $this->uri->segment(3);
        if ($this->Usuario_m->reset_password($id)) {
            redirect(base_url('usuario/?type=sucesso'), 'location');
        } else {
            redirect(base_url('usuario/?type=erro'), 'location');
        }
    }
}
