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
        $this->load->model('Nota_m');
        $this->load->model('Frete_m');
        $this->load->model('Orcamento_m');
        $this->load->model('Usuario_m');
        $this->load->helper('date');
        $this->load->helper('html');
        $this->load->database();
        empty($_SESSION) ? session_start() : '';
        login_necessario();
    }

    public function index() {
        empty($_SESSION['orcamento']) ? $_SESSION['orcamento'] = new Orcamento_m() : '';
        empty($_SESSION['orcamento']->servico) ? $_SESSION['orcamento']->servico = new Servico_m() : '';
        empty($_SESSION['orcamento']->cliente) ? $_SESSION['orcamento']->cliente = new Cliente_m() : '';

        $data['valor_total'] = NULL;
        $data['valor_unitario'] = NULL;
        $data['total'] = NULL;

        $data['laminacao_md'] = $this->Laminacao_m->listar();
        $data['acabamento_md'] = $this->Acabamento_m->listar();
        $data['papel_md'] = $this->Papel_m->listar();
        $data['cliente_md'] = $this->Cliente_m->listar();

        $data['nota_fiscal'] = $this->Nota_m->listar();
        $data['frete'] = $this->Frete_m->listar();
//        Estados brasileiros
        $data['estados'] = array(
            'AC' => 'AC',
            'AL' => 'AL',
            'AM' => 'AM',
            'AP' => 'AP',
            'BA' => 'BA',
            'CE' => 'CE',
            'DF' => 'DF',
            'ES' => 'ES',
            'GO' => 'GO',
            'MA' => 'MA',
            'MG' => 'MG',
            'MS' => 'MS',
            'MT' => 'MT',
            'PA' => 'PA',
            'PB' => 'PB',
            'PE' => 'PE',
            'PI' => 'PI',
            'PR' => 'PR',
            'RJ' => 'RJ',
            'RN' => 'RN',
            'RO' => 'RO',
            'RR' => 'RR',
            'RS' => 'RS',
            'SC' => 'SC',
            'SE' => 'SE',
            'SP' => 'SP',
            'TO' => 'TO',
        );

        if ($_SESSION['orcamento']->servico->tipo == 'servico') {
            $data['impressao_md'] = $this->Impressao_m->listar();
            $data['faca_md'] = $this->Faca_m->listar();
            $data['painel'] = 'Serviço';
        } elseif ($_SESSION['orcamento']->servico->tipo == 'cartao') {
            $data['impressao_cartao_md'] = $this->Impressao_cartao_m->listar();
            $data['faca_cartao_md'] = $this->Faca_cartao_m->listar();
            $data['painel'] = 'Cartão';
        }

        if (!empty($_SESSION['orcamento']->servico->quantidade)) {
            $_SESSION['orcamento']->servico->calcula_total_servico();
            $_SESSION['orcamento']->calcula_total_orcamento();
        }


        $this->load->view('servico/orcamento', $data);
    }

    public function finalizar() {
        $manter_cliente = $this->uri->segment(3);
        $this->db->trans_start();
        //Servico inserir
        $servico_id = $_SESSION['orcamento']->servico->inserir_servico($_SESSION['orcamento']->servico);
        if ($servico_id != FALSE) {
            $_SESSION['orcamento']->servico->id = $servico_id;
            if (!empty($_SESSION['orcamento']->servico->papel)) {
                foreach ($_SESSION['orcamento']->servico->papel as $key => $papel) {
                    $verificador = $_SESSION['orcamento']->servico->inserir_servico_papel($servico_id, $papel);
                    if ($verificador == FALSE) {
                        $erro['papel'] = $verificador;
                    }
                }
            }
            if (!empty($_SESSION['orcamento']->servico->impressao)) {
                if ($_SESSION['orcamento']->servico->tipo == 'servico') {
                    foreach ($_SESSION['orcamento']->servico->impressao as $key => $impressao) {
                        $verificador = $_SESSION['orcamento']->servico->inserir_servico_impressao($servico_id, $impressao);
                        if ($verificador == FALSE) {
                            $erro['impressao'] = $verificador;
                        }
                    }
                } else {
                    foreach ($_SESSION['orcamento']->servico->impressao as $key => $impressao) {
                        $verificador = $_SESSION['orcamento']->servico->inserir_servico_impressao_cartao($servico_id, $impressao);
                        if ($verificador == FALSE) {
                            $erro['impressao'] = $verificador;
                        }
                    }
                }
            }
            if (!empty($_SESSION['orcamento']->servico->acabamento)) {
                foreach ($_SESSION['orcamento']->servico->acabamento as $key => $acabamento) {
                    $verificador = $_SESSION['orcamento']->servico->inserir_servico_acabamento($servico_id, $acabamento);
                    if ($verificador == FALSE) {
                        $erro['acabamento'] = $verificador;
                    }
                }
            }
            if (!empty($_SESSION['orcamento']->servico->faca)) {
                if ($_SESSION['orcamento']->servico->tipo == 'servico') {
                    foreach ($_SESSION['orcamento']->servico->faca as $key => $faca) {
                        $verificador = $_SESSION['orcamento']->servico->inserir_servico_faca($servico_id, $faca);
                        if ($verificador == FALSE) {
                            $erro['faca'] = $verificador;
                        }
                    }
                } else {
                    foreach ($_SESSION['orcamento']->servico->faca as $key => $faca) {
                        $verificador = $_SESSION['orcamento']->servico->inserir_servico_faca_cartao($servico_id, $faca);
                        if ($verificador == FALSE) {
                            $erro['faca_cartao'] = $verificador;
                        }
                    }
                }
            }
            if (!empty($_SESSION['orcamento']->servico->laminacao)) {
                foreach ($_SESSION['orcamento']->servico->laminacao as $key => $laminacao) {
                    $verificador = $_SESSION['orcamento']->servico->inserir_servico_laminacao($servico_id, $laminacao);
                    if ($verificador == FALSE) {
                        $erro['laminacao'] = $verificador;
                    }
                }
            }
            if (!empty($_SESSION['orcamento']->servico->colagem)) {
                foreach ($_SESSION['orcamento']->servico->colagem as $key => $colagem) {
                    $verificador = $_SESSION['orcamento']->servico->inserir_servico_colagem($servico_id, $colagem);
                    if ($verificador == FALSE) {
                        $erro['colagem'] = $verificador;
                    }
                }
            }

            //Orcamento inserir
            if (!empty($_SESSION['orcamento'])) {
                date_default_timezone_set('America/Sao_Paulo');
                $_SESSION['orcamento']->data_orcamento = date('Y-m-d H:i:s');
                $orcamento_id = $_SESSION['orcamento']->id = $_SESSION['orcamento']->inserir_orcamento($_SESSION['orcamento']);
                $erro['orcamento'] = $_SESSION['orcamento']->id;
            }
        }

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            redirect(base_url('servico?msg_tipo=erro&msg_texto=Erro ao inserir o Orcamento no banco'), 'location');
        }
        $cliente_sessao = null;
        if ($manter_cliente) {
            $cliente_sessao = $_SESSION['orcamento']->cliente;
        }

        unset($_SESSION['orcamento']);
        $_SESSION['orcamento'] = new Orcamento_m();
        $_SESSION['orcamento']->cliente = $cliente_sessao;
        redirect(base_url('orcamento/pdf/'.$orcamento_id), 'location');
    }

    public function condicoes_sessao() {
        //Nota fiscal
        $nota_id = $this->input->post('nota_fiscal');
        $nota_fiscal = $this->Nota_m->listar($nota_id);
        $nota_fiscal = $nota_fiscal[0];
        $_SESSION['orcamento']->nota_fiscal = $nota_fiscal;

        if ($this->input->post('frete') == 0) {
            //Frete personalizado
            $valor_frete = $this->input->post('valor_frete');
            $_SESSION['orcamento']->valor_frete = str_replace(',', '.', $valor_frete);
            $_SESSION['orcamento']->frete_personalizado = str_replace(',', '.', $valor_frete);
            $_SESSION['orcamento']->frete = null;
        } else {
            //Frete
            $frete_id = $this->input->post('frete');
            $frete = $this->Frete_m->listar($frete_id);
            $frete = $frete[0];
            $_SESSION['orcamento']->frete = $frete;
            $_SESSION['orcamento']->valor_frete = $frete->valor;
        }

        //Pagamento
        $_SESSION['orcamento']->pagamento = $this->input->post('pagamento');

        //Prazo
        $_SESSION['orcamento']->prazo = $this->input->post('prazo');

        //Prazo
        $_SESSION['orcamento']->observacao = $this->input->post('observacao');
        redirect(base_url('servico'), 'location');
    }

    public function frete_sessao_definir() {
        $valor = $this->input->post('valor_frete');
        $_SESSION['orcamento']->valor_frete = str_replace(',', '.', $valor);
        $_SESSION['orcamento']->frete_personalizado = str_replace(',', '.', $valor);
        $_SESSION['orcamento']->frete = null;
        redirect(base_url('servico'), 'location');
    }

    public function frete_sessao() {
        $id = $this->input->get('id');
        // opcao motoboy ou frete do banco
        $frete = $this->Frete_m->listar($id);
        $frete = $frete[0];
        $_SESSION['orcamento']->frete = $frete;
        $_SESSION['orcamento']->valor_frete = $frete->valor;
        redirect(base_url('servico'), 'location');
    }

    public function nota_fiscal_sessao() {
        $id = $this->input->get('id');
        $nota_fiscal = $this->Nota_m->listar($id);
        $nota_fiscal = $nota_fiscal[0];
        $_SESSION['orcamento']->nota_fiscal = $nota_fiscal;

        redirect(base_url('servico'), 'location');
    }

    public function cliente_session_inserir() {
        $id_cliente = $this->uri->segment(3);
        $cliente = $this->Cliente_m->listar($id_cliente);
        $cliente = $cliente[0];
        $_SESSION['orcamento']->cliente = $cliente;
        redirect(base_url('servico'), 'location');
    }

    public function cliente_session_criar() {
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
        $cliente->id = $this->Cliente_m->inserir($cliente);

        $_SESSION['orcamento']->cliente = $cliente;
        redirect(base_url('servico'), 'location');
    }

    public function excluir_todos_servicos() {
        unset($_SESSION['orcamento']);

        redirect(base_url('servico'), 'location');
    }

    public function criar_servico() {
        $this->form_validation->set_rules('tipo', 'TIPO', 'required');
        $_SESSION['orcamento']->servico->tipo = $_POST['tipo'];
        $_SESSION['orcamento']->servico->quantidade = intval($_POST['quantidade']);
        $_SESSION['orcamento']->servico->desconto = $_POST['desconto'];
        redirect(base_url('servico'), 'location');
    }

    public function editar_servico() {
        if ($_SESSION['orcamento']->servico->quantidade == NULL) {
            redirect(base_url('servico'), 'location');
        }
        if ($_SESSION['orcamento']->servico->tipo != $_POST['tipo']) {
            unset($_SESSION['orcamento']->servico);
            $_SESSION['orcamento']->servico = new Servico_m();
        }
        $_SESSION['orcamento']->servico->tipo = $_POST['tipo'];
        $_SESSION['orcamento']->servico->quantidade = $_POST['quantidade'];
        $_SESSION['orcamento']->servico->desconto = str_replace(',', '.', $_POST['desconto']);

        $servico_quantidade = $_SESSION['orcamento']->servico->quantidade;
        $servico_desconto = $_SESSION['orcamento']->servico->desconto;

        //recalcula valores para os itens que dependem da quantidade
        if (!empty($_SESSION['orcamento']->servico->laminacao)) {
            foreach ($_SESSION['orcamento']->servico->laminacao as $key => $value) {
                $value->valor_unitario = $value->calcula_valor_unitario($value->sub_total, $servico_quantidade);
            }
        }
        if (!empty($_SESSION['orcamento']->servico->colagem)) {
            foreach ($_SESSION['orcamento']->servico->colagem as $key => $value) {
                $value->valor_unitario = $value->calcula_valor_unitario($value->sub_total, $servico_quantidade);
            }
        }
        if (!empty($_SESSION['orcamento']->servico->empastamento)) {
            foreach ($_SESSION['orcamento']->servico->empastamento as $key => $value) {
                $value->valor_unitario = $value->calcula_valor_unitario($value->sub_total, $servico_quantidade);
            }
        }
        if (!empty($_SESSION['orcamento']->servico->papel)) {
            foreach ($_SESSION['orcamento']->servico->papel as $key => $value) {
                $value->valor_unitario = $value->calcula_valor_unitario($value->quantidade, $servico_quantidade);
            }
        }
        if (!empty($_SESSION['orcamento']->servico->impressao)) {
            if ($_SESSION['orcamento']->servico->tipo == 'servico') {
                foreach ($_SESSION['orcamento']->servico->impressao as $key => $value) {
                    $value->valor_unitario = $value->calcula_valor_unitario($servico_quantidade);
                    $value->sub_total = $servico_quantidade * $value->valor_unitario;
                }
            } else {
                foreach ($_SESSION['orcamento']->servico->impressao as $key => $value) {
                    $value->valor_unitario = $value->calcula_valor_unitario($servico_quantidade, $value);
                    $value->sub_total = $servico_quantidade * $value->valor_unitario;
                }
            }
        }
        redirect(base_url('servico'), 'location');
    }

    public function impressao_cartao_sessao_inserir() {
        if (empty($_POST['impressao_cartao'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['impressao_cartao'];
        $qtd_cor_frente = intval($this->input->post('qtd_cor_frente'));
        $qtd_cor_verso = intval($this->input->post('qtd_cor_verso'));
        $qtd_cor_frente == '' ? $qtd_cor_frente = 0 : '';
        $qtd_cor_verso == '' ? $qtd_cor_verso = 0 : '';

        $impressao = $this->Impressao_cartao_m->listar($id); //listo a impressao pelo ID
        $impressao = $impressao[0];
        $quantidade_pedido = $_SESSION['orcamento']->servico->quantidade;
        $impressao->qtd_cor_frente = $qtd_cor_frente;
        $impressao->qtd_cor_verso = $qtd_cor_verso;
        $impressao->valor_unitario = $impressao->calcula_valor_unitario($quantidade_pedido, $impressao);
        $impressao->sub_total = $quantidade_pedido * $impressao->valor_unitario;

        $fotolito = $this->Fotolito_m->listar_formato($impressao->impressao_formato->id); //listo o fotolito pela coluna da impressao_formato
        $fotolito = $fotolito[0];
        if ($_SESSION['orcamento']->servico->tipo == 'cartao') {
            $fotolito->quantidade = $impressao->qtd_cor_frente + $impressao->qtd_cor_verso;
        } else {
            $fotolito->quantidade = 1;
        }
        $fotolito->valor_unitario = $fotolito->valor;
        $fotolito->sub_total = $fotolito->quantidade * $fotolito->valor_unitario;
        $impressao->fotolito = $fotolito;
        $_SESSION['orcamento']->servico->impressao[] = $impressao;
        redirect(base_url('servico'), 'location');
    }

    public function impressao_cartao_sessao_editar() {
        if (empty($_POST['impressao_cartao'])) {
            redirect(base_url('servico'), 'location');
        }
        $posicao = $this->uri->segment(3);
        $id = $_POST['impressao_cartao'];
        $qtd_cor_frente = intval($this->input->post('qtd_cor_frente'));
        $qtd_cor_verso = intval($this->input->post('qtd_cor_verso'));
        $qtd_cor_frente == '' ? $qtd_cor_frente = 0 : '';
        $qtd_cor_verso == '' ? $qtd_cor_verso = 0 : '';

        $impressao = $this->Impressao_cartao_m->listar($id); //listo a impressao pelo ID
        $impressao = $impressao[0];
        $quantidade_pedido = $_SESSION['orcamento']->servico->quantidade;
        $impressao->qtd_cor_frente = $qtd_cor_frente;
        $impressao->qtd_cor_verso = $qtd_cor_verso;
        $impressao->valor_unitario = $impressao->calcula_valor_unitario($quantidade_pedido, $impressao);
        $impressao->sub_total = $quantidade_pedido * $impressao->valor_unitario;

        $fotolito = $this->Fotolito_m->listar_formato($impressao->impressao_formato->id); //listo o fotolito pela coluna da impressao_formato
        $fotolito = $fotolito[0];
        if ($_SESSION['orcamento']->servico->tipo == 'cartao') {
            $fotolito->quantidade = $impressao->qtd_cor_frente + $impressao->qtd_cor_verso;
        } else {
            $fotolito->quantidade = 1;
        }
        $fotolito->valor_unitario = $fotolito->valor;
        $fotolito->sub_total = $fotolito->quantidade * $fotolito->valor_unitario;
        $impressao->fotolito = $fotolito;
        $_SESSION['orcamento']->servico->impressao[$posicao] = $impressao;
        redirect(base_url('servico'), 'location');
    }

    public function impressao_sessao_inserir() {
        if (empty($_POST['impressao'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['impressao'];
        $impressao = $this->Impressao_m->listar($id); //listo a impressao pelo ID
        $impressao = $impressao[0];
        $quantidade_pedido = $_SESSION['orcamento']->servico->quantidade;
        $impressao->valor_unitario = $impressao->calcula_valor_unitario($quantidade_pedido);
        $impressao->sub_total = $quantidade_pedido * $impressao->valor_unitario;
        $fotolito = $this->Fotolito_m->listar_formato($impressao->impressao_formato->id); //listo o fotolito pela coluna da impressao_formato
        $fotolito = $fotolito[0];
        $fotolito->quantidade = 1;
        $fotolito->valor_unitario = $fotolito->valor;
        $fotolito->sub_total = $fotolito->quantidade * $fotolito->valor_unitario;
        $impressao->fotolito = $fotolito;
        $_SESSION['orcamento']->servico->impressao[] = $impressao;
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
        $quantidade_pedido = $_SESSION['orcamento']->servico->quantidade;
        $impressao->valor_unitario = $impressao->calcula_valor_unitario($quantidade_pedido);
        $impressao->sub_total = $quantidade_pedido * $impressao->valor_unitario;
        $fotolito = $this->Fotolito_m->listar_formato($impressao->impressao_formato->id); //listo o fotolito pela coluna da impressao_formato
        $fotolito = $fotolito[0];
        $fotolito->quantidade = 1;
        $fotolito->valor_unitario = $fotolito->valor;
        $fotolito->sub_total = $fotolito->quantidade * $fotolito->valor_unitario;
        $impressao->fotolito = $fotolito;
        $_SESSION['orcamento']->servico->impressao[$posicao] = $impressao;
        redirect(base_url('servico'), 'location');
    }

    public function impressao_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['orcamento']->servico->impressao[$posicao]);
        redirect(base_url('servico'), 'location');
    }

    public function colagem_sessao_inserir() {
        $nome = $_POST['nome'];
        $valor = str_replace(",", ".", $_POST['valor']);
        $colagem = new Colagem_m();
        $quantidade_pedido = $_SESSION['orcamento']->servico->quantidade;
        $colagem->nome = $nome;
        $colagem->valor_unitario = $colagem->calcula_valor_unitario($valor, $quantidade_pedido);
        $colagem->sub_total = $valor;
        $_SESSION['orcamento']->servico->colagem[] = $colagem;
        redirect(base_url('servico'), 'location');
    }

    public function colagem_sessao_editar() {
        $posicao = $this->uri->segment(3);
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $quantidade_pedido = $_SESSION['orcamento']->servico->quantidade;
        $_SESSION['orcamento']->servico->colagem[$posicao]->nome = $nome;
        $_SESSION['orcamento']->servico->colagem[$posicao]->valor_unitario = $_SESSION['orcamento']->servico->colagem[$posicao]->calcula_valor_unitario($valor, $quantidade_pedido);
        $_SESSION['orcamento']->servico->colagem[$posicao]->sub_total = $valor;
        redirect(base_url('servico'), 'location');
    }

    public function colagem_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['orcamento']->servico->colagem[$posicao]);
        redirect(base_url('servico'), 'location');
    }

    public function laminacao_sessao_inserir() {
        if (empty($_POST['laminacao'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['laminacao'];
        $valor = str_replace(',', '.', $_POST['valor']);
        $quantidade_pedido = $_SESSION['orcamento']->servico->quantidade;
        $laminacao = $this->Laminacao_m->listar($id);
        $laminacao = $laminacao[0];
        $laminacao->valor_unitario = $laminacao->calcula_valor_unitario($valor, $quantidade_pedido);
        $laminacao->sub_total = $valor;
        $_SESSION['orcamento']->servico->laminacao[] = $laminacao;
        redirect(base_url('servico'), 'location');
    }

    public function laminacao_sessao_editar() {
        if (empty($_POST['laminacao'])) {
            redirect(base_url('servico'), 'location');
        }
        $posicao = $this->uri->segment(3);
        $id = $_POST['laminacao'];
        $valor = str_replace(',', '.', $_POST['valor']);
        $quantidade_pedido = $_SESSION['orcamento']->servico->quantidade;
        $laminacao = $this->Laminacao_m->listar($id);
        $laminacao = $laminacao[0];
        $laminacao->valor_unitario = $laminacao->calcula_valor_unitario($valor, $quantidade_pedido);
        $laminacao->sub_total = $valor;
        $_SESSION['orcamento']->servico->laminacao[$posicao] = $laminacao;
        redirect(base_url('servico'), 'location');
    }

    public function laminacao_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['orcamento']->servico->laminacao[$posicao]);
        redirect(base_url('servico'), 'location');
    }

    public function papel_sessao_inserir() {
        if (empty($_POST['papel'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['papel'];
        $quantidade = $_POST['quantidade'];
        $quantidade_pedido = $_SESSION['orcamento']->servico->quantidade;
        $papel = $this->Papel_m->listar($id);
        $papel = $papel[0];
        $papel->quantidade = $quantidade;
        $papel->valor_unitario = $papel->calcula_valor_unitario($quantidade, $quantidade_pedido);
        $papel->sub_total = $quantidade_pedido * $papel->valor_unitario;
        $empastamento = new Empastamento_m();
        if ($_POST['empastamento_status'] == 1) {
            $empastamento->nome = 'Empastamento';
            $empastamento->status = TRUE;
            $empastamento->sub_total = $_POST['empastamento_valor'];
            $empastamento->valor_unitario = $empastamento->calcula_valor_unitario($empastamento->sub_total, $quantidade_pedido);
        } else {
            $empastamento->nome = 'Empastamento';
            $empastamento->status = FALSE;
            $empastamento->sub_total = 0;
            $empastamento->valor_unitario = 0;
        }
        $papel->empastamento = $empastamento;
        $_SESSION['orcamento']->servico->papel[] = $papel;
        redirect(base_url('servico'), 'location');
    }

    public function papel_sessao_editar() {
        if (empty($_POST['papel'])) {
            redirect(base_url('servico'), 'location');
        }
        $id = $_POST['papel'];
        $quantidade = $_POST['quantidade'];
        $quantidade_pedido = $_SESSION['orcamento']->servico->quantidade;
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
        $_SESSION['orcamento']->servico->papel[$posicao] = $papel;
        redirect(base_url('servico'), 'location');
    }

    public function papel_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['orcamento']->servico->papel[$posicao]);
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
        $_SESSION['orcamento']->servico->acabamento[] = $acabamento;
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
        $_SESSION['orcamento']->servico->acabamento[$posicao] = $acabamento;
        redirect(base_url('servico'), 'location');
    }

    public function acabamento_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['orcamento']->servico->acabamento[$posicao]);
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
        $_SESSION['orcamento']->servico->faca[] = $faca;
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
        $_SESSION['orcamento']->servico->faca[$posicao] = $faca;
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

        $_SESSION['orcamento']->servico->faca[] = $faca;
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
        $_SESSION['orcamento']->servico->faca[$posicao] = $faca;
        redirect(base_url('servico'), 'location');
    }

    public function faca_sessao_excluir() {
        $posicao = $this->uri->segment(3);
        unset($_SESSION['orcamento']->servico->faca[$posicao]);
        redirect(base_url('servico'), 'location');
    }

}
