<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Usuario_m');
        empty($_SESSION) ? session_start() : '';
    }

    public function index() {
        $this->load->view('Login/form');
    }

    public function form_senha() {
        $data['id'] = $this->input->post_get('id');
        $this->load->view('Login/form_senha', $data);
    }

    public function gravar_senha() {
        $id = $this->input->post('id');
        $senha = $this->input->post('senha');
        $senha_conf = $this->input->post('senha_conf');

        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        $this->form_validation->set_rules('senha_conf', 'Senha_conf', 'required|matches[senha]');

        $this->form_validation->set_message('matches', 'Senhas não estão iguais.');
        if ($this->form_validation->run() == FALSE) {
            $data['id'] = $id;
            $this->load->view("login/form_senha", $data);
        } else {
            if ($this->Usuario_m->gravar_senha($id, $senha)) {
                redirect(base_url('home'), 'location');
            } else {
                print "Erro ao gravar a senha.";
                die();
            }
        }
    }

    public function logar() {
        $this->form_validation->set_rules('login', 'Login', 'trim|required|callback_existe_senha');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|callback_senha_correta');
        $this->form_validation->set_message('callback_senha_correta', 'Usuario ou Senha incorreto.');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/form');
        } else {
            $usuario = $this->Usuario_m->buscar_usuario(new Usuario_m(null, null, $this->input->post('login')));
            $usuario = $usuario[0];
//            $usuario = array(
//                'id' => $usuario[0]->id,
//                'nome' => $usuario[0]->nome,
//                'login' => $usuario[0]->login,
//                'senha' => $usuario[0]->senha,
//            );
            $_SESSION['usuario'] = $usuario;
            redirect(base_url('home'), 'location');
        }
    }

    function senha_correta() {
        $login = $this->input->post('login');
        $senha = $this->input->post('senha');

        if ($this->Usuario_m->senha_correta($login, $senha)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('senha_correta', 'Usuario ou senha incorreto.');
            return FALSE;
        }

        return $this->Usuario_m->senha_correta($login, $senha);
    }

    function existe_senha($login) {
        if ($this->Usuario_m->existe_login($login)) {
            if ($this->Usuario_m->existe_senha($login)) {
                return TRUE;
            } else {

                $usuario = $this->Usuario_m->buscar_usuario(new Usuario_m(null, null, $login));
                redirect(base_url('login/form_senha/?id=' . $usuario[0]->id), 'location');
                return FALSE;
            }
        } else {
            $this->form_validation->set_message('existe_senha', 'Usuario ou senha incorreto.');
            return FALSE;
        }
    }

    public function logout() {
        unset($_SESSION['usuario']);
        redirect(base_url('home'), 'location');
    }

    public function usuario_logado() {
        if ($this->session->usuario == NULL) {
            return FALSE;
        }else{
            return TRUE;
        }
    }

}
