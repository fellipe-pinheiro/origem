<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Servico extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Impressao_m');
        $this->load->model('Impressao_cartao_m');
        $this->load->model('Impressao_formato_m');
        $this->load->model('Fotolito_m');
        $this->load->model('Acabamento_m');
        $this->load->model('Faca_m');
        $this->load->model('Faca_cartao_m');
        $this->load->model('Papel_m');
        $this->load->model('Empastamento_m');
        $this->load->model('Colagem_m');
        $this->load->model('Laminacao_m');
        $this->load->model('Servico_m');
        $this->load->model('Cliente_m');
        session_start();
    }

    public function index() {
        empty($_SESSION['orcamento']['servico']) ? $servico = $_SESSION['orcamento']['servico'] = new Servico_m() : '';
        empty($_SESSION['orcamento']['cliente']) ? $servico = $_SESSION['orcamento']['cliente'] = new Cliente_m() : '';
        
        $data['valor_total'] = NULL;
        $data['valor_unitario'] = NULL;
        $data['total'] = NULL;

        $data['laminacao_md'] = $this->Laminacao_m->listar();
        $data['acabamento_md'] = $this->Acabamento_m->listar();
        $data['papel_md'] = $this->Papel_m->listar();

        if ($_SESSION['orcamento']['servico']->tipo == 'servico') {
            $data['impressao_md'] = $this->Impressao_m->listar();
            $data['faca_md'] = $this->Faca_m->listar();
            $data['painel'] = 'Serviço';
        } elseif ($_SESSION['orcamento']['servico']->tipo == 'cartao') {
            $data['impressao_cartao_md'] = $this->Impressao_cartao_m->listar();
            $data['faca_cartao_md'] = $this->Faca_cartao_m->listar();
            $data['painel'] = 'Cartão';
        }

        if (!empty($_SESSION['orcamento']['servico']->quantidade)) {
            $data['valor_total'] = $_SESSION['orcamento']['servico']->calcula_total_servico();
            $data['valor_unitario'] = $_SESSION['orcamento']['servico']->calcula_unitario_servico($data['valor_total'], $_SESSION['orcamento']['servico']->quantidade);
            $data['total'] = $data['valor_total'] - $_SESSION['orcamento']['servico']->desconto;
        }
        
        $data['cliente'] = $this->Cliente_m->listar();
        
        $this->load->view('servico/orcamento', $data);
    }
    
    public function add_cliente_session() {
        $id_cliente = $this->uri->segment(3);
        $cliente = $this->Cliente_m->listar($id_cliente);
        $cliente = $cliente[0];
        $_SESSION['orcamento']['cliente'] = $cliente;
        redirect(base_url('servico'), 'location');
    }
    public function criar_cliente_session() {
        $cliente = new Cliente_m();
        $cliente->id = null;
        $cliente->nome = $this->input->post('nome');
        $cliente->numero = $this->input->post('numero');
        $cliente->complemento = $this->input->post('complemento');
        $cliente->bairro = $this->input->post('bairro');
        $cliente->cidade = $this->input->post('cidade');
        $cliente->estado = $this->input->post('estado');
        $cliente->cep = $this->input->post('cep');
        $cliente->cnpj_cpf = $this->input->post('cnpj_cpf');
        $cliente->ie = $this->input->post('ie');
        $cliente->im = $this->input->post('im');
        $cliente->pessoa_tipo = $this->input->post('pessoa_tipo');
        $cliente->email = $this->input->post('email');
        $cliente->telefone = $this->input->post('telefone');
        $cliente->celular = $this->input->post('celular');
        $cliente->observacao = $this->input->post('observacao');

        $id = $this->Cliente_m->inserir($cliente);
        
        $_SESSION['orcamento']['cliente'] = $cliente;
        redirect(base_url('servico'), 'location');
    }
    
    public function excluir_todos_servicos() {
        unset($_SESSION['orcamento']['servico']);
        redirect(base_url('servico'), 'location');
    }

    public function criar_servico() {
        $_SESSION['orcamento']['servico']->tipo = $_POST['tipo'];
        $_SESSION['orcamento']['servico']->quantidade = $_POST['quantidade'];
        $_SESSION['orcamento']['servico']->desconto = $_POST['desconto'];
        redirect(base_url('servico'), 'location');
    }

    public function editar_servico() {
        if ($_SESSION['orcamento']['servico']->quantidade == NULL) {
            redirect(base_url('servico'), 'location');
        }
        if ($_SESSION['orcamento']['servico']->tipo != $_POST['tipo']) {
            unset($_SESSION['orcamento']['servico']);
            $_SESSION['orcamento']['servico'] = new Servico_m();
        }
        $_SESSION['orcamento']['servico']->tipo = $_POST['tipo'];
        $servico_quantidade = $_SESSION['orcamento']['servico']->quantidade = $_POST['quantidade'];
        $servico_desconto = $_SESSION['orcamento']['servico']->desconto = $_POST['desconto'];

        //recalcula valores para os itens que dependem da quantidade
        foreach ($_SESSION['orcamento']['servico']->laminacao as $key => $value) {
            $value[0]->valor_unitario = $value[0]->calcula_valor_unitario($value[0]->sub_total, $servico_quantidade);
        }
        foreach ($_SESSION['orcamento']['servico']->colagem as $key => $value) {
            $value->valor_unitario = $value->calcula_valor_unitario($value->sub_total, $servico_quantidade);
        }
        foreach ($_SESSION['orcamento']['servico']->empastamento as $key => $value) {
            $value->valor_unitario = $value->calcula_valor_unitario($value->sub_total, $servico_quantidade);
        }
        foreach ($_SESSION['orcamento']['servico']->papel as $key => $value) {
            $value[0]->valor_unitario = $value[0]->calcula_valor_unitario($value[0]->quantidade, $servico_quantidade);
        }
        foreach ($_SESSION['orcamento']['servico']->impressao as $key => $value) {
            $value[0]->valor_unitario = $value[0]->calcula_valor_unitario($servico_quantidade);
            $value[0]->sub_total = $servico_quantidade * $value[0]->valor_unitario;
        }
        redirect(base_url('servico'), 'location');
    }

    public function impressao_cartao_sessao_inserir() {
        if (empty($_POST['impressao_cartao'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['impressao_cartao'];
        $qtd_cor_frente = $this->input->post('qtd_cor_frente');
        $qtd_cor_verso = $this->input->post('qtd_cor_verso');
        $qtd_cor_frente == '' ? $qtd_cor_frente = 0 : '';
        $qtd_cor_verso == '' ? $qtd_cor_verso = 0 : '';

        $impressao = $this->Impressao_cartao_m->listar($id); //listo a impressao pelo ID
        $impressao = $impressao[0];
        $quantidade_pedido = $_SESSION['orcamento']['servico']->quantidade;
        $impressao->qtd_cor_frente = $qtd_cor_frente;
        $impressao->qtd_cor_verso = $qtd_cor_verso;
        $impressao->valor_unitario = $impressao->calcula_valor_unitario($quantidade_pedido, $impressao);
        $impressao->sub_total = $quantidade_pedido * $impressao->valor_unitario;

        $fotolito = $this->Fotolito_m->listar_formato($impressao->impressao_formato->id); //listo o fotolito pela coluna da impressao_formato
        $fotolito = $fotolito[0];
        if ($_SESSION['orcamento']['servico']->tipo == 'cartao') {
            $fotolito->quantidade = $impressao->qtd_cor_frente + $impressao->qtd_cor_verso;
        } else {
            $fotolito->quantidade = 1;
        }
        $fotolito->valor_unitario = $fotolito->valor;
        $fotolito->sub_total = $fotolito->quantidade * $fotolito->valor_unitario;
        $impressao->fotolito = $fotolito;
        $_SESSION['orcamento']['servico']->impressao[] = $impressao;
        redirect(base_url('servico'), 'location');
    }

    public function impressao_cartao_sessao_editar() {
        if (empty($_POST['impressao_cartao'])) {
            redirect(base_url('servico'), 'location');
        }
        $posicao = $this->uri->segment(3);
        $id = $_POST['impressao_cartao'];
        $qtd_cor_frente = $this->input->post('qtd_cor_frente');
        $qtd_cor_verso = $this->input->post('qtd_cor_verso');
        $qtd_cor_frente == '' ? $qtd_cor_frente = 0 : '';
        $qtd_cor_verso == '' ? $qtd_cor_verso = 0 : '';

        $impressao = $this->Impressao_cartao_m->listar($id); //listo a impressao pelo ID
        $impressao = $impressao[0];
        $quantidade_pedido = $_SESSION['orcamento']['servico']->quantidade;
        $impressao->qtd_cor_frente = $qtd_cor_frente;
        $impressao->qtd_cor_verso = $qtd_cor_verso;
        $impressao->valor_unitario = $impressao->calcula_valor_unitario($quantidade_pedido, $impressao);
        $impressao->sub_total = $quantidade_pedido * $impressao->valor_unitario;

        $fotolito = $this->Fotolito_m->listar_formato($impressao->impressao_formato->id); //listo o fotolito pela coluna da impressao_formato
        $fotolito = $fotolito[0];
        if ($_SESSION['orcamento']['servico']->tipo == 'cartao') {
            $fotolito->quantidade = $impressao->qtd_cor_frente + $impressao->qtd_cor_verso;
        } else {
            $fotolito->quantidade = 1;
        }
        $fotolito->valor_unitario = $fotolito->valor;
        $fotolito->sub_total = $fotolito->quantidade * $fotolito->valor_unitario;
        $impressao->fotolito = $fotolito;
        $_SESSION['orcamento']['servico']->impressao[$posicao] = $impressao;
        redirect(base_url('servico'), 'location');
    }

    public function impressao_sessao_inserir() {
        if (empty($_POST['impressao'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['impressao'];
        $impressao = $this->Impressao_m->listar($id); //listo a impressao pelo ID
        $impressao = $impressao[0];
        $quantidade_pedido = $_SESSION['orcamento']['servico']->quantidade;
        $impressao->valor_unitario = $impressao->calcula_valor_unitario($quantidade_pedido);
        $impressao->sub_total = $quantidade_pedido * $impressao->valor_unitario;
        $fotolito = $this->Fotolito_m->listar_formato($impressao->impressao_formato->id); //listo o fotolito pela coluna da impressao_formato
        $fotolito = $fotolito[0];
        $fotolito->quantidade = 1;
        $fotolito->valor_unitario = $fotolito->valor;
        $fotolito->sub_total = $fotolito->quantidade * $fotolito->valor_unitario;
        $impressao->fotolito = $fotolito;
        $_SESSION['orcamento']['servico']->impressao[] = $impressao;
        redirect(base_url('servico'), 'location');
    }

    public function impressao_sessao_editar() {
        if (empty($_POST['impressao'])) {
            redirect(base_url('servico'), 'location');
        }
        $posicao = $this->uri->segment(3);
        $id = $_POST['impressao'];
        $impressao = $this->Impressao_m->listar($id); //listo a impressao pelo ID
        $impressao = $impressao[0];
        $quantidade_pedido = $_SESSION['orcamento']['servico']->quantidade;
        $impressao->valor_unitario = $impressao->calcula_valor_unitario($quantidade_pedido);
        $impressao->sub_total = $quantidade_pedido * $impressao->valor_unitario;
        $fotolito = $this->Fotolito_m->listar_formato($impressao->impressao_formato->id); //listo o fotolito pela coluna da impressao_formato
        $fotolito = $fotolito[0];
        $fotolito->quantidade = 1;
        $fotolito->valor_unitario = $fotolito->valor;
        $fotolito->sub_total = $fotolito->quantidade * $fotolito->valor_unitario;
        $impressao->fotolito = $fotolito;
        $_SESSION['orcamento']['servico']->impressao[$posicao] = $impressao;
        redirect(base_url('servico'), 'location');
    }

    public function impressao_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['orcamento']['servico']->impressao[$posicao]);
        redirect(base_url('servico'), 'location');
    }

    public function colagem_sessao_inserir() {
        $nome = $_POST['nome'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $colagem = new Colagem_m();
        $quantidade_pedido = $_SESSION['orcamento']['servico']->quantidade;
        $colagem->nome = $nome;
        $colagem->quantidade = $quantidade;
        $colagem->valor_unitario = $colagem->calcula_valor_unitario($valor, $quantidade_pedido);
        $colagem->sub_total = $valor;
        $_SESSION['orcamento']['servico']->colagem[] = $colagem;
        redirect(base_url('servico'), 'location');
    }

    public function colagem_sessao_editar() {
        $posicao = $this->uri->segment(3);
        $nome = $_POST['nome'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $quantidade_pedido = $_SESSION['orcamento']['servico']->quantidade;
        $_SESSION['orcamento']['servico']->colagem[$posicao]->nome = $nome;
        $_SESSION['orcamento']['servico']->colagem[$posicao]->quantidade = $quantidade;
        $_SESSION['orcamento']['servico']->colagem[$posicao]->valor_unitario = $_SESSION['orcamento']['servico']->colagem[$posicao]->calcula_valor_unitario($valor, $quantidade_pedido);
        $_SESSION['orcamento']['servico']->colagem[$posicao]->sub_total = $valor;
        redirect(base_url('servico'), 'location');
    }

    public function colagem_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['orcamento']['servico']->colagem[$posicao]);
        redirect(base_url('servico'), 'location');
    }

    public function laminacao_sessao_inserir() {
        if (empty($_POST['laminacao'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['laminacao'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $quantidade_pedido = $_SESSION['orcamento']['servico']->quantidade;
        $laminacao = $this->Laminacao_m->listar($id);
        $laminacao = $laminacao[0];
        $laminacao->quantidade = $quantidade;
        $laminacao->valor_unitario = $laminacao->calcula_valor_unitario($valor, $quantidade_pedido);
        $laminacao->sub_total = $valor;
        $_SESSION['orcamento']['servico']->laminacao[] = $laminacao;
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
        $quantidade_pedido = $_SESSION['orcamento']['servico']->quantidade;
        $laminacao = $this->Laminacao_m->listar($id);
        $laminacao = $laminacao[0];
        $laminacao->quantidade = $quantidade;
        $laminacao->valor_unitario = $laminacao->calcula_valor_unitario($valor, $quantidade_pedido);
        $laminacao->sub_total = $valor;
        $_SESSION['orcamento']['servico']->laminacao[$posicao] = $laminacao;
        redirect(base_url('servico'), 'location');
    }

    public function laminacao_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['orcamento']['servico']->laminacao[$posicao]);
        redirect(base_url('servico'), 'location');
    }

    public function papel_sessao_inserir() {
        if (empty($_POST['papel'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['papel'];
        $quantidade = $_POST['quantidade'];
        $quantidade_pedido = $_SESSION['orcamento']['servico']->quantidade;
        $papel = $this->Papel_m->listar($id);
        $papel = $papel[0];
        $papel->quantidade = $quantidade;
        $papel->valor_unitario = $papel->calcula_valor_unitario($quantidade, $quantidade_pedido);
        $papel->sub_total = $quantidade_pedido * $papel->valor_unitario;
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
        $papel->empastamento = $empastamento;
        $_SESSION['orcamento']['servico']->papel[] = $papel;
        redirect(base_url('servico'), 'location');
    }

    public function papel_sessao_editar() {
        if (empty($_POST['papel'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['papel'];
        $quantidade = $_POST['quantidade'];
        $quantidade_pedido = $_SESSION['orcamento']['servico']->quantidade;
        $posicao = $this->uri->segment(3);
        $papel = $this->Papel_m->listar($id);
        $papel = $papel[0];
        $papel->quantidade = $quantidade;
        $papel->valor_unitario = $papel->calcula_valor_unitario($quantidade, $quantidade_pedido);
        $papel->sub_total = $quantidade_pedido * $papel->valor_unitario;
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
        $papel->empastamento = $empastamento;
        $_SESSION['orcamento']['servico']->papel[$posicao] = $papel;
        redirect(base_url('servico'), 'location');
    }

    public function papel_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['orcamento']['servico']->papel[$posicao]);
        redirect(base_url('servico'), 'location');
    }

    public function acabamento_sessao_inserir() {
        if (empty($_POST['acabamento'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['acabamento'];
        $quantidade = $_POST['quantidade'];
        $acabamento = $this->Acabamento_m->listar($id);
        $acabamento = $acabamento[0];
        $acabamento->quantidade = $quantidade;
        $acabamento->valor_unitario = $acabamento->valor;
        $acabamento->sub_total = $quantidade * $acabamento->valor_unitario;
        $_SESSION['orcamento']['servico']->acabamento[] = $acabamento;
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
        $acabamento = $acabamento[0];
        $acabamento->quantidade = $quantidade;
        $acabamento->valor_unitario = $acabamento->valor;
        $acabamento->sub_total = $quantidade * $acabamento->valor_unitario;
        $_SESSION['orcamento']['servico']->acabamento[$posicao] = $acabamento;
        redirect(base_url('servico'), 'location');
    }

    public function acabamento_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['orcamento']['servico']->acabamento[$posicao]);
        redirect(base_url('servico'), 'location');
    }

    public function faca_cartao_sessao_inserir() {
        if (empty($_POST['faca'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['faca'];
        $faca = $this->Faca_cartao_m->listar($id);
        $faca = $faca[0];
        $faca->quantidade = 1;
        $faca->sub_total = $faca->valor;
        $_SESSION['orcamento']['servico']->faca[] = $faca;
        redirect(base_url('servico'), 'location');
    }

    public function faca_cartao_sessao_editar() {
        if (empty($_POST['faca'])) {
            redirect(base_url('servico'), 'location');
        }
        $posicao = $this->uri->segment(3);
        $id = $_POST['faca'];
        $faca = $this->Faca_cartao_m->listar($id);
        $faca = $faca[0];
        $faca->quantidade = 1;
        $faca->sub_total = $faca->valor;
        $_SESSION['orcamento']['servico']->faca[$posicao] = $faca;
        redirect(base_url('servico'), 'location');
    }

    public function faca_sessao_inserir() {
        if (empty($_POST['faca'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['faca'];
        $faca = $this->Faca_m->listar($id);
        $faca = $faca[0];
        $faca->altura = $_POST['altura'];
        $faca->largura = $_POST['largura'];
        $faca->quantidade = 1;
        $faca->valor_faca = $faca->calcular_valor($faca->altura, $faca->largura);
        $faca->sub_total = $faca->quantidade * $faca->valor_faca;
        $_SESSION['faca'][] = $faca;
        $_SESSION['orcamento']['servico']->faca = $_SESSION['faca'];
        redirect(base_url('servico'), 'location');
    }

    public function faca_sessao_editar() {
        if (empty($_POST['faca'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['faca'];
        $posicao = $this->uri->segment(3);
        $faca = $this->Faca_m->listar($id);
        $faca = $faca[0];
        $faca->altura = $_POST['altura'];
        $faca->largura = $_POST['largura'];
        $faca->quantidade = 1;
        $faca->valor_faca = $faca->calcular_valor($faca->altura, $faca->largura);
        $faca->sub_total = $faca->quantidade * $faca->valor_faca;
        $_SESSION['orcamento']['servico']->faca[$posicao] = $faca;
        redirect(base_url('servico'), 'location');
    }

    public function faca_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['orcamento']['servico']->faca[$posicao]);
        redirect(base_url('servico'), 'location');
    }

}
