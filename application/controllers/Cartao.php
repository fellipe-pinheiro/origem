<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cartao extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Impressao_cartao_m');
        $this->load->model('Impressao_formato_m');
        $this->load->model('Fotolito_m');
        $this->load->model('Acabamento_m');
        $this->load->model('Faca_m');
        $this->load->model('Papel_m');
        $this->load->model('Empastamento_m');
        $this->load->model('Laminacao_m');
        $this->load->model('Colagem_m');
        $this->load->model('Cartao_m');
        $this->load->library('session');
    }

    public function index() {
        $data['laminacao'] = $this->Laminacao_m->listar();
        $quantidade = 100;
        if (!empty($this->session->cartao->quantidade)) {
            if ($this->session->cartao->quantidade >= 500 && $this->session->cartao->quantidade < 1000) {
                $quantidade = 500;
            }
            if ($this->session->cartao->quantidade >= 1000) {
                $quantidade = 1000;
            }
        }
        $data['impressao'] = $this->Impressao_cartao_m->listar_quantidade('', $quantidade);
        $data['acabamento'] = $this->Acabamento_m->listar();
        $data['papel'] = $this->Papel_m->listar();
        $data['faca'] = $this->Faca_m->listar();
        if ($this->session->cartao) {
            $data['valor_total'] = $this->session->cartao->calcula_total_cartao();
            $data['valor_unitario'] = $this->session->cartao->calcula_unitario_cartao($data['valor_total'], $this->session->cartao->quantidade);
            $data['total'] = $data['valor_total'] - $this->session->cartao->desconto;
        }
        $this->load->view('cartao/orcamento', $data);
    }

    public function excluir_todos_cartoes() {
        unset(
                $_SESSION['papel'], $_SESSION['empastamento'], $_SESSION['impressao'], $_SESSION['acabamento'], $_SESSION['faca'], $_SESSION['cartao'], $_SESSION['fotolito'], $_SESSION['laminacao'], $_SESSION['colagem']
        );
        redirect(base_url('cartao'), 'location');
    }

    public function criar_cartao() {
        $this->session->cartao = $this->Cartao_m;
        $this->session->cartao->quantidade = $_POST['quantidade'];
        $this->session->cartao->desconto = $_POST['desconto'];
        redirect(base_url('cartao'), 'location');
    }

    public function editar_cartao() {
        if ($this->session->cartao->quantidade == NULL) {
            $this->session->set_flashdata('edicaofalse', 'Crie um novo cartão!');
            redirect(base_url('cartao'), 'location');
        }
        $cartao_quantidade = $this->session->cartao->quantidade = $_POST['quantidade'];
        $cartao_desconto = $this->session->cartao->desconto = $_POST['desconto'];
        foreach ($this->session->laminacao as $key => $value) {
            $value[0]->valor_unitario = $value[0]->calcula_valor_unitario($value[0]->sub_total, $cartao_quantidade);
        }
        foreach ($this->session->colagem as $key => $value) {
            $value->valor_unitario = $value->calcula_valor_unitario($value->sub_total, $cartao_quantidade);
        }
        foreach ($this->session->empastamento as $key => $value) {
            $value->valor_unitario = $value->calcula_valor_unitario($value->sub_total, $cartao_quantidade);
        }
        foreach ($this->session->papel as $key => $value) {
            $value[0]->valor_unitario = $value[0]->calcula_valor_unitario($value[0]->quantidade, $cartao_quantidade);
        }
        foreach ($this->session->impressao as $key => $value) {
            $value[0]->valor_unitario = $value[0]->calcula_valor_unitario($cartao_quantidade);
            $value[0]->sub_total = $cartao_quantidade * $value[0]->valor_unitario;
        }
        redirect(base_url('cartao'), 'location');
    }

    public function impressao_sessao_inserir() {
        if (empty($_POST['impressao'])) {
            redirect(base_url('cartao'), 'location');
        }
        $id = $_POST['impressao'];
        $quantidade_pedido = $this->session->cartao->quantidade;
        $impressao = $this->Impressao_cartao_m->listar($id); //listo a impressao pelo ID
        $impressao[0]->valor_unitario = $impressao[0]->calcula_valor_unitario($quantidade_pedido);
        $impressao[0]->sub_total = $quantidade_pedido * $impressao[0]->valor_unitario;
        $_SESSION['impressao'][] = $impressao;
        $this->session->cartao->impressao = $_SESSION['impressao'];
        $fotolito = $this->Fotolito_m->listar_formato($impressao[0]->impressao_formato->id); //listo o fotolito pela coluna da impressao_formato
        $fotolito[0]->quantidade = 1;
        $fotolito[0]->valor_unitario = $fotolito[0]->valor;
        $fotolito[0]->sub_total = $fotolito[0]->quantidade * $fotolito[0]->valor_unitario;
        $_SESSION['fotolito'][] = $fotolito;
        $this->session->cartao->fotolito = $_SESSION['fotolito'];
        redirect(base_url('cartao'), 'location');
    }

    public function impressao_sessao_editar() {
        if (empty($_POST['impressao'])) {
            redirect(base_url('cartao'), 'location');
        }
        $id = $_POST['impressao'];
        $posicao = $this->uri->segment(3);
        $impressao = $this->Impressao_cartao_m->listar($id);
        $quantidade_pedido = $this->session->cartao->quantidade;
        $impressao[0]->valor_unitario = $impressao[0]->calcula_valor_unitario($quantidade_pedido);
        $impressao[0]->sub_total = $quantidade_pedido * $impressao[0]->valor_unitario;
        $_SESSION['impressao'][$posicao] = $impressao;
        $this->session->cartao->impressao = $_SESSION['impressao'];
        $fotolito = $this->Fotolito_m->listar_formato($impressao[0]->impressao_formato->id); //listo o fotolito pela coluna da impressao_formato
        $fotolito[0]->quantidade = 1;
        $fotolito[0]->valor_unitario = $fotolito[0]->valor;
        $fotolito[0]->sub_total = $fotolito[0]->quantidade * $fotolito[0]->valor_unitario;
        $_SESSION['fotolito'][$posicao] = $fotolito;
        $this->session->cartao->fotolito = $_SESSION['fotolito'];
        redirect(base_url('cartao'), 'location');
    }

    public function impressao_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['impressao'][$posicao]);
        unset($_SESSION['fotolito'][$posicao]);
        $this->session->cartao->impressao = $_SESSION['impressao'];
        $this->session->cartao->fotolito = $_SESSION['fotolito'];
        redirect(base_url('cartao'), 'location');
    }

    public function colagem_sessao_inserir() {
        $nome = $_POST['nome'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $colagem = new Colagem_m();
        $quantidade_pedido = $this->session->cartao->quantidade;
        $colagem->nome = $nome;
        $colagem->quantidade = $quantidade;
        $colagem->valor_unitario = $colagem->calcula_valor_unitario($valor, $quantidade_pedido);
        $colagem->sub_total = $valor;
        $_SESSION['colagem'][] = $colagem;
        $this->session->cartao->colagem = $_SESSION['colagem'];
        redirect(base_url('cartao'), 'location');
    }

    public function colagem_sessao_editar() {
        $posicao = $this->uri->segment(3);
        $nome = $_POST['nome'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $quantidade_pedido = $this->session->cartao->quantidade;
        $this->session->cartao->colagem[$posicao]->nome = $nome;
        $this->session->cartao->colagem[$posicao]->quantidade = $quantidade;
        $this->session->cartao->colagem[$posicao]->valor_unitario = $this->session->cartao->colagem[$posicao]->calcula_valor_unitario($valor, $quantidade_pedido);
        $this->session->cartao->colagem[$posicao]->sub_total = $valor;
        redirect(base_url('cartao'), 'location');
    }

    public function colagem_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['colagem'][$posicao]);
        $this->session->cartao->colagem = $_SESSION['colagem'];
        redirect(base_url('cartao'), 'location');
    }

    public function laminacao_sessao_inserir() {
        if (empty($_POST['laminacao'])) {
            redirect(base_url('cartao'), 'location');
        }
        $id = $_POST['laminacao'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $quantidade_pedido = $this->session->cartao->quantidade;
        $laminacao = $this->Laminacao_m->listar($id);
        //Cria os atributos: $quantidade e $valor_unitario
        $laminacao[0]->quantidade = $quantidade;
        $laminacao[0]->valor_unitario = $laminacao[0]->calcula_valor_unitario($valor, $quantidade_pedido);
        $laminacao[0]->sub_total = $valor;
        $_SESSION['laminacao'][] = $laminacao;
        $this->session->cartao->laminacao = $_SESSION['laminacao'];
        redirect(base_url('cartao'), 'location');
    }

    public function laminacao_sessao_editar() {
        if (empty($_POST['laminacao'])) {
            redirect(base_url('cartao'), 'location');
        }
        $posicao = $this->uri->segment(3);
        $id = $_POST['laminacao'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $quantidade_pedido = $this->session->cartao->quantidade;
        $laminacao = $this->Laminacao_m->listar($id);
        //Cria os atributos: $quantidade e $valor_unitario
        $laminacao[0]->quantidade = $quantidade;
        $laminacao[0]->valor_unitario = $laminacao[0]->calcula_valor_unitario($valor, $quantidade_pedido);
        $laminacao[0]->sub_total = $valor;
        $_SESSION['laminacao'][$posicao] = $laminacao;
        $this->session->cartao->laminacao = $_SESSION['laminacao'];
        redirect(base_url('cartao'), 'location');
    }

    public function laminacao_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['laminacao'][$posicao]);
        $this->session->cartao->laminacao = $_SESSION['laminacao'];
        redirect(base_url('cartao'), 'location');
    }

    public function papel_sessao_inserir() {
        if (empty($_POST['papel'])) {
            redirect(base_url('cartao'), 'location');
        }
        $id = $_POST['papel'];
        $quantidade = $_POST['quantidade'];
        $quantidade_pedido = $this->session->cartao->quantidade;
        $papel = $this->Papel_m->listar($id);
        //Cria os atributos: $quantidade e $valor_unitario
        $papel[0]->quantidade = $quantidade;
        $papel[0]->valor_unitario = $papel[0]->calcula_valor_unitario($quantidade, $quantidade_pedido);
        $papel[0]->sub_total = $quantidade_pedido * $papel[0]->valor_unitario;
        $_SESSION['papel'][] = $papel;
        $this->session->cartao->papel = $_SESSION['papel'];
        $empastamento = new Empastamento_m();
        if ($_POST['empastamento_status'] == 1) {
            $empastamento->nome = $_POST['empastamento_nome'];
            $empastamento->status = TRUE;
            $empastamento->sub_total = $_POST['empastamento_valor'];
            $empastamento->valor_unitario = $empastamento->calcula_valor_unitario($empastamento->sub_total, $quantidade_pedido);
        } else {
            $empastamento->nome = $_POST['empastamento_nome'];
            $empastamento->status = FALSE;
            $empastamento->sub_total = 0;
            $empastamento->valor_unitario = 0;
        }
        $_SESSION['empastamento'][] = $empastamento;
        $this->session->cartao->empastamento = $_SESSION['empastamento'];
        redirect(base_url('cartao'), 'location');
    }

    public function papel_sessao_editar() {
        if (empty($_POST['papel'])) {
            redirect(base_url('cartao'), 'location');
        }
        $id = $_POST['papel'];
        $quantidade = $_POST['quantidade'];
        $quantidade_pedido = $this->session->cartao->quantidade;
        $posicao = $this->uri->segment(3);
        $papel = $this->Papel_m->listar($id);
        //Cria os atributos: $quantidade e $valor_unitario
        $papel[0]->quantidade = $quantidade;
        $papel[0]->valor_unitario = $papel[0]->calcula_valor_unitario($quantidade, $quantidade_pedido);
        $papel[0]->sub_total = $quantidade_pedido * $papel[0]->valor_unitario;
        $_SESSION['papel'][$posicao] = $papel;
        $this->session->cartao->papel = $_SESSION['papel'];
        if ($_POST['empastamento_status'] == 1) {
            $this->session->cartao->empastamento[$posicao]->nome = $_POST['empastamento_nome'];
            $this->session->cartao->empastamento[$posicao]->status = TRUE;
            $this->session->cartao->empastamento[$posicao]->sub_total = $_POST['empastamento_valor'];
            $this->session->cartao->empastamento[$posicao]->valor_unitario = $this->session->cartao->empastamento[$posicao]->calcula_valor_unitario($this->session->cartao->empastamento[$posicao]->sub_total, $quantidade_pedido);
        } else {
            $this->session->cartao->empastamento[$posicao]->nome = $_POST['empastamento_nome'];
            $this->session->cartao->empastamento[$posicao]->status = FALSE;
            $this->session->cartao->empastamento[$posicao]->sub_total = 0;
            $this->session->cartao->empastamento[$posicao]->valor_unitario = 0;
        }
        redirect(base_url('cartao'), 'location');
    }

    public function papel_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['papel'][$posicao]);
        unset($_SESSION['empastamento'][$posicao]);
        $this->session->cartao->papel = $_SESSION['papel'];
        $this->session->cartao->empastamento = $_SESSION['empastamento'];
        redirect(base_url('cartao'), 'location');
    }

    public function empastamento_sessao_inserir($quantidade_pedido) {
        if ($_POST['empastamento'] == TRUE) {
            $empastamento = new Empastamento_m();
            $empastamento->nome = $_POST['nome'];
            $empastamento->sub_total = $_POST['empastamento_valor'];
            $empastamento->valor_unitario = $empastamento->calcula_valor_unitario($empastamento->sub_total, $quantidade_pedido);
            $_SESSION['empastamento'][] = $empastamento;
        }
        $this->session->cartao->empastamento = $_SESSION['empastamento'];
    }

    public function empastamento_sessao_editar($quantidade_pedido, $posicao) {
        $this->session->cartao->empastamento[$posicao]->nome = $_POST['nome'];
        $this->session->cartao->empastamento[$posicao]->sub_total = $_POST['empastamento_valor'];
        $this->session->cartao->empastamento[$posicao]->valor_unitario = $this->session->cartao->empastamento[$posicao]->calcula_valor_unitario($this->session->cartao->empastamento[$posicao]->sub_total, $quantidade_pedido);
        var_dump($this->session->cartao->empastamento[$posicao]);
        die();
    }

    public function empastamento_sessao_excluir($posicao) {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['empastamento'][$posicao]);
        $this->session->cartao->empastamento[$posicao] = $_SESSION['empastamento'];
        redirect(base_url('cartao'), 'location');
    }

    public function acabamento_sessao_inserir() {
        if (empty($_POST['acabamento'])) {
            redirect(base_url('cartao'), 'location');
        }
        $id = $_POST['acabamento'];
        $quantidade = $_POST['quantidade'];
        $acabamento = $this->Acabamento_m->listar($id);
        $acabamento[0]->quantidade = $quantidade;
        $acabamento[0]->valor_unitario = $acabamento[0]->valor;
        $acabamento[0]->sub_total = $quantidade * $acabamento[0]->valor_unitario;
        $_SESSION['acabamento'][] = $acabamento;
        $this->session->cartao->acabamento = $_SESSION['acabamento'];
        redirect(base_url('cartao'), 'location');
    }

    public function acabamento_sessao_editar() {
        if (empty($_POST['acabamento'])) {
            redirect(base_url('cartao'), 'location');
        }
        $id = $_POST['acabamento'];
        $quantidade = $_POST['quantidade'];
        $posicao = $this->uri->segment(3);
        $acabamento = $this->Acabamento_m->listar($id);
        $acabamento[0]->quantidade = $quantidade;
        $acabamento[0]->valor_unitario = $acabamento[0]->valor;
        $acabamento[0]->sub_total = $quantidade * $acabamento[0]->valor_unitario;
        $_SESSION['acabamento'][$posicao] = $acabamento;
        $this->session->cartao->acabamento = $_SESSION['acabamento'];
        redirect(base_url('cartao'), 'location');
    }

    public function acabamento_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['acabamento'][$posicao]);
        $this->session->cartao->acabamento = $_SESSION['acabamento'];
        redirect(base_url('cartao'), 'location');
    }

    public function faca_sessao_inserir() {
        if (empty($_POST['faca'])) {
            redirect(base_url('cartao'), 'location');
        }
        $id = $_POST['faca'];
        $faca = $this->Faca_m->listar($id);
        $faca[0]->altura = $_POST['altura'];
        $faca[0]->largura = $_POST['largura'];
        $faca[0]->quantidade = 1;
        $faca[0]->valor_faca = $faca[0]->calcular_valor($faca[0]->altura, $faca[0]->largura);
        $faca[0]->sub_total = $faca[0]->quantidade * $faca[0]->valor_faca;
        $_SESSION['faca'][] = $faca;
        $this->session->cartao->faca = $_SESSION['faca'];
        redirect(base_url('cartao'), 'location');
    }

    public function faca_sessao_editar() {
        if (empty($_POST['faca'])) {
            redirect(base_url('cartao'), 'location');
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
        $this->session->cartao->faca = $_SESSION['faca'];
        redirect(base_url('cartao'), 'location');
    }

    public function faca_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['faca'][$posicao]);
        $this->session->cartao->faca = $_SESSION['faca'];
        redirect(base_url('cartao'), 'location');
    }

}
