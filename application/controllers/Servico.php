<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Servico extends CI_Controller {

    var $posicao = 0;

    function __construct() {
        parent::__construct();
        $this->load->model('Impressao_m');
        $this->load->model('Impressao_formato_m');
        $this->load->model('Acabamento_m');
        $this->load->model('Faca_m');
        $this->load->model('Papel_m');
        $this->load->model('Servico_m');

        $this->load->library('session');
    }

    public function index() {
        $data['impressao'] = $this->Impressao_m->listar();
        $data['acabamento'] = $this->Acabamento_m->listar();
        $data['papel'] = $this->Papel_m->listar();
        $data['faca'] = $this->Faca_m->listar();
        $this->load->view('servico/orcamento', $data);
    }
    
    public function excluir_todos_servicos() {
        unset(
                $_SESSION['papel'], 
                $_SESSION['impressao'], 
                $_SESSION['acabamento'], 
                $_SESSION['faca'],
                $_SESSION['servico']
        );
        redirect(base_url('servico'), 'location');
    }
    
    public function editar_pedido() {
        $this->Servico_m->quantidade = $_POST['quantidade'];
        $this->Servico_m->desconto = $_POST['desconto'];
        $_SESSION['servico'] =  $this->Servico_m;
        redirect(base_url('servico'),'location');
    }
    
    public function impressao_sessao_inserir() {
        $id = $_POST['impressao'];
        $result = $this->Impressao_m->listar($id);
        $_SESSION['impressao'][] = $result;
        redirect(base_url('servico'), 'location');
    }

    public function impressao_sessao_editar() {
        $id = $_POST['impressao'];
        $posicao = $this->uri->segment(3);
        $result = $this->Impressao_m->listar($id);
        $result1 = $this->Impressao_formato_m->listar($result[0]["impressao_formato"]);
        $_SESSION['impressao'][$posicao] = $result;
        redirect(base_url('servico'), 'location');
    }

    public function impressao_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['impressao'][$posicao]);
        redirect(base_url('servico'), 'location');
    }

    public function papel_sessao_inserir() {
        $id = $_POST['papel'];
        $quantidade = $_POST['quantidade'];
        $result = $this->Papel_m->listar($id);
        $_SESSION['papel'][] = $result;
        $quantidade_pedido = $this->session->servico->quantidade;
        $result = $this->Papel_m->listar($id);
        //Cria os atributos: $quantidade e $valor_unitario
        $result[0]->quantidade = $quantidade;
        $result[0]->valor_unitario = $result[0]->calcula_valor_unitario($quantidade,$quantidade_pedido);
        $_SESSION['papel'][] = $result;
//        print '<pre>';
//        var_dump($_SESSION['papel']);
//        print '</pre>';
//        die();

        redirect(base_url('servico'), 'location');
    }

    public function papel_sessao_editar() {
        $id = $_POST['papel'];
        $posicao = $this->uri->segment(3);
        $result = $this->Papel_m->listar($id);
        $_SESSION['papel'][$posicao] = $result;
        redirect(base_url('servico'), 'location');
    }

    public function papel_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['papel'][$posicao]);
        redirect(base_url('servico'), 'location');
    }

    public function acabamento_sessao_inserir() {
        $id = $_POST['acabamento'];
        $result = $this->Acabamento_m->listar($id);
        $_SESSION['acabamento'][] = $result;
        redirect(base_url('servico'), 'location');
    }

    public function acabamento_sessao_editar() {
        $id = $_POST['acabamento'];
        $posicao = $this->uri->segment(3);
        $result = $this->Acabamento_m->listar($id);
        $_SESSION['acabamento'][$posicao] = $result;
        redirect(base_url('servico'), 'location');
    }

    public function acabamento_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['acabamento'][$posicao]);
        redirect(base_url('servico'), 'location');
    }

    public function faca_sessao_inserir() {
        $id = $_POST['faca'];
        $result = $this->Faca_m->listar($id);
        $_SESSION['faca'][] = $result;
        redirect(base_url('servico'), 'location');
    }

    public function faca_sessao_editar() {
        $id = $_POST['faca'];
        $posicao = $this->uri->segment(3);
        $result = $this->Faca_m->listar($id);
        $_SESSION['faca'][$posicao] = $result;
        redirect(base_url('servico'), 'location');
    }

    public function faca_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['faca'][$posicao]);
        redirect(base_url('servico'), 'location');
    }

}
