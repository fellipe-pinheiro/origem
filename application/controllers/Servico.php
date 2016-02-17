<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Servico extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Impressao_m');
        $this->load->model('Impressao_formato_m');
        $this->load->model('Fotolito_m');
        $this->load->model('Acabamento_m');
        $this->load->model('Faca_m');
        $this->load->model('Papel_m');
        $this->load->model('Laminacao_m');
        $this->load->model('Servico_m');
        $this->load->library('session');
    }

    public function index() {
        $data['laminacao'] = $this->Laminacao_m->listar();
        $data['impressao'] = $this->Impressao_m->listar();
        $data['acabamento'] = $this->Acabamento_m->listar();
        $data['papel'] = $this->Papel_m->listar();
        $data['faca'] = $this->Faca_m->listar();
        $this->load->view('servico/orcamento', $data);
    }

    public function excluir_todos_servicos() {
        unset(
                $_SESSION['papel'], $_SESSION['impressao'], $_SESSION['acabamento'], $_SESSION['faca'], $_SESSION['servico'], $_SESSION['fotolito'], $_SESSION['laminacao'], $_SESSION['colagem']
        );
        redirect(base_url('servico'), 'location');
    }

    public function criar_servico() {
        $this->session->servico = $this->Servico_m;
        $this->session->servico->quantidade = $_POST['quantidade'];
        $this->session->servico->desconto = $_POST['desconto'];
        redirect(base_url('servico'), 'location');
    }

    public function editar_servico() {
        $servico_quantidade = $this->session->servico->quantidade = $_POST['quantidade'];
        $servico_desconto = $this->session->servico->desconto = $_POST['desconto'];
        foreach ($this->session->laminacao as $key => $value) {
            $value[0]->valor_unitario = $value[0]->calcula_valor_unitario($value[0]->sub_total, $servico_quantidade);
        }
        foreach ($this->session->papel as $key => $value) {
            $value[0]->valor_unitario = $value[0]->calcula_valor_unitario($value[0]->quantidade, $servico_quantidade);
        }
        foreach ($this->session->impressao as $key => $value) {
            $value[0]->valor_unitario = $value[0]->calcula_valor_unitario($servico_quantidade);
            $value[0]->sub_total = $servico_quantidade * $value[0]->valor_unitario;
        }
        redirect(base_url('servico'), 'location');
    }

    public function impressao_sessao_inserir() {
        if (empty($_POST['impressao'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['impressao'];
        $impressao = $this->Impressao_m->listar($id); //listo a impressao pelo ID
        $fotolito = $this->Fotolito_m->listar_formato($impressao[0]->impressao_formato->id); //listo o fotolito pela coluna da impressao_formato
        $quantidade_pedido = $this->session->servico->quantidade;
        $impressao[0]->valor_unitario = $impressao[0]->calcula_valor_unitario($quantidade_pedido);
        $impressao[0]->sub_total = $quantidade_pedido * $impressao[0]->valor_unitario;
        $fotolito[0]->quantidade = 1;
        $fotolito[0]->valor_unitario = $fotolito[0]->valor;
        $fotolito[0]->sub_total = $fotolito[0]->quantidade * $fotolito[0]->valor_unitario;
        $_SESSION['impressao'][] = $impressao;
        $_SESSION['fotolito'][] = $fotolito;
        $this->session->servico->impressao = $_SESSION['impressao'];
        $this->session->servico->fotolito = $_SESSION['fotolito'];
        redirect(base_url('servico'), 'location');
    }

    public function impressao_sessao_editar() {
        if (empty($_POST['impressao'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['impressao'];
        $posicao = $this->uri->segment(3);
        $impressao = $this->Impressao_m->listar($id);
        $fotolito = $this->Fotolito_m->listar_formato($impressao[0]->impressao_formato->id); //listo o fotolito pela coluna da impressao_formato
        $quantidade_pedido = $this->session->servico->quantidade;
        $impressao[0]->valor_unitario = $impressao[0]->calcula_valor_unitario($quantidade_pedido);
        $impressao[0]->sub_total = $quantidade_pedido * $impressao[0]->valor_unitario;
        $fotolito[0]->quantidade = 1;
        $fotolito[0]->valor_unitario = $fotolito[0]->valor;
        $fotolito[0]->sub_total = $fotolito[0]->quantidade * $fotolito[0]->valor_unitario;
        $_SESSION['impressao'][$posicao] = $impressao;
        $_SESSION['fotolito'][$posicao] = $fotolito;
        $this->session->servico->impressao = $_SESSION['impressao'];
        $this->session->servico->fotolito = $_SESSION['fotolito'];

        redirect(base_url('servico'), 'location');
    }

    public function impressao_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['impressao'][$posicao]);
        unset($_SESSION['fotolito'][$posicao]);
        $this->session->servico->impressao = $_SESSION['impressao'];
        $this->session->servico->fotolito = $_SESSION['fotolito'];
        redirect(base_url('servico'), 'location');
    }

    //continuar daqui...
    public function colagem_sessao_inserir() {
        if (empty($_POST['colagem'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['colagem'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $quantidade_pedido = $this->session->servico->quantidade;
        $colagem = $this->Colagem_m->listar($id);
        //Cria os atributos: $quantidade e $valor_unitario
        $colagem[0]->quantidade = $quantidade;
        $colagem[0]->valor_unitario = $colagem[0]->calcula_valor_unitario($valor, $quantidade_pedido);
        $colagem[0]->sub_total = $valor;
        $_SESSION['colagem'][] = $colagem;
        $this->session->servico->colagem = $_SESSION['colagem'];
        redirect(base_url('servico'), 'location');
    }
    public function laminacao_sessao_inserir() {
        if (empty($_POST['laminacao'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['laminacao'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $quantidade_pedido = $this->session->servico->quantidade;
        $laminacao = $this->Laminacao_m->listar($id);
        //Cria os atributos: $quantidade e $valor_unitario
        $laminacao[0]->quantidade = $quantidade;
        $laminacao[0]->valor_unitario = $laminacao[0]->calcula_valor_unitario($valor, $quantidade_pedido);
        $laminacao[0]->sub_total = $valor;
        $_SESSION['laminacao'][] = $laminacao;
        $this->session->servico->laminacao = $_SESSION['laminacao'];
        redirect(base_url('servico'), 'location');
    }

    public function laminacao_sessao_editar() {
        if (empty($_POST['laminacao'])) {
            redirect(base_url('servico'), 'location');
        }
        $posicao = $this->uri->segment(3);
        $id = $_POST['laminacao'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $quantidade_pedido = $this->session->servico->quantidade;
        $laminacao = $this->Laminacao_m->listar($id);
        //Cria os atributos: $quantidade e $valor_unitario
        $laminacao[0]->quantidade = $quantidade;
        $laminacao[0]->valor_unitario = $laminacao[0]->calcula_valor_unitario($valor, $quantidade_pedido);
        $laminacao[0]->sub_total = $valor;
        $_SESSION['laminacao'][$posicao] = $laminacao;
        $this->session->servico->laminacao = $_SESSION['laminacao'];
        redirect(base_url('servico'), 'location');
    }

    public function laminacao_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['laminacao'][$posicao]);
        $this->session->servico->laminacao = $_SESSION['laminacao'];
        redirect(base_url('servico'), 'location');
    }

    public function papel_sessao_inserir() {
        if (empty($_POST['papel'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['papel'];
        $quantidade = $_POST['quantidade'];
        $quantidade_pedido = $this->session->servico->quantidade;
        $papel = $this->Papel_m->listar($id);
        //Cria os atributos: $quantidade e $valor_unitario
        $papel[0]->quantidade = $quantidade;
        $papel[0]->valor_unitario = $papel[0]->calcula_valor_unitario($quantidade, $quantidade_pedido);
        $papel[0]->sub_total = $quantidade_pedido * $papel[0]->valor_unitario;
        $_SESSION['papel'][] = $papel;
        $this->session->servico->papel = $_SESSION['papel'];
        redirect(base_url('servico'), 'location');
    }

    public function papel_sessao_editar() {
        if (empty($_POST['papel'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['papel'];
        $quantidade = $_POST['quantidade'];
        $quantidade_pedido = $this->session->servico->quantidade;
        $posicao = $this->uri->segment(3);
        $papel = $this->Papel_m->listar($id);
        //Cria os atributos: $quantidade e $valor_unitario
        $papel[0]->quantidade = $quantidade;
        $papel[0]->valor_unitario = $papel[0]->calcula_valor_unitario($quantidade, $quantidade_pedido);
        $papel[0]->sub_total = $quantidade_pedido * $papel[0]->valor_unitario;
        $_SESSION['papel'][$posicao] = $papel;
        $this->session->servico->papel = $_SESSION['papel'];
        redirect(base_url('servico'), 'location');
    }

    public function papel_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['papel'][$posicao]);
        $this->session->servico->papel = $_SESSION['papel'];
        redirect(base_url('servico'), 'location');
    }

    public function acabamento_sessao_inserir() {
        if (empty($_POST['acabamento'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['acabamento'];
        $quantidade = $_POST['quantidade'];
        $acabamento = $this->Acabamento_m->listar($id);
        $acabamento[0]->quantidade = $quantidade;
        $acabamento[0]->valor_unitario = $acabamento[0]->valor;
        $acabamento[0]->sub_total = $quantidade * $acabamento[0]->valor_unitario;
        $_SESSION['acabamento'][] = $acabamento;
        $this->session->servico->acabamento = $_SESSION['acabamento'];
        redirect(base_url('servico'), 'location');
    }

    public function acabamento_sessao_editar() {
        if (empty($_POST['acabamento'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['acabamento'];
        $quantidade = $_POST['quantidade'];
        $posicao = $this->uri->segment(3);
        $acabamento = $this->Acabamento_m->listar($id);
        $acabamento[0]->quantidade = $quantidade;
        $acabamento[0]->valor_unitario = $acabamento[0]->valor;
        $acabamento[0]->sub_total = $quantidade * $acabamento[0]->valor_unitario;
        $_SESSION['acabamento'][$posicao] = $acabamento;
        $this->session->servico->acabamento = $_SESSION['acabamento'];
        redirect(base_url('servico'), 'location');
    }

    public function acabamento_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['acabamento'][$posicao]);
        $this->session->servico->acabamento = $_SESSION['acabamento'];
        redirect(base_url('servico'), 'location');
    }

    public function faca_sessao_inserir() {
        if (empty($_POST['faca'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['faca'];
        $faca = $this->Faca_m->listar($id);
        $faca[0]->altura = $_POST['altura'];
        $faca[0]->largura = $_POST['largura'];
        $faca[0]->quantidade = 1;
        $faca[0]->valor_faca = $faca[0]->calcular_valor($faca[0]->altura, $faca[0]->largura);
        $faca[0]->sub_total = $faca[0]->quantidade * $faca[0]->valor_faca;
        $_SESSION['faca'][] = $faca;
        $this->session->servico->faca = $_SESSION['faca'];
        redirect(base_url('servico'), 'location');
    }

    public function faca_sessao_editar() {
        if (empty($_POST['faca'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['faca'];
        $posicao = $this->uri->segment(3);
        $faca = $this->Faca_m->listar($id);
        $faca[0]->altura = $_POST['altura'];
        $faca[0]->largura = $_POST['largura'];
        $faca[0]->quantidade = 1;
        $faca[0]->valor_faca = $faca[0]->calcular_valor($faca[0]->altura, $faca[0]->largura);
        $faca[0]->sub_total = $faca[0]->quantidade * $faca[0]->valor_faca;
        $_SESSION['faca'][$posicao] = $faca;
        $this->session->servico->faca = $_SESSION['faca'];
        redirect(base_url('servico'), 'location');
    }

    public function faca_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['faca'][$posicao]);
        $this->session->servico->faca = $_SESSION['faca'];
        redirect(base_url('servico'), 'location');
    }

}
