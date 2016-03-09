<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Orcamento_m extends CI_Model {

    var $id;
    var $cliente;
    var $data_orcamento;
    var $total;
    var $servico;
    var $frete;
    var $valor_frete;
    var $frete_personalizado;
    var $nota_fiscal;
    var $valor_nota_fiscal;
    var $edicao;
    var $pagamento;
    var $prazo;
    var $observacao;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Cliente_m');
        $this->load->model('Frete_m');
        $this->load->model('Servico_m');
        $this->load->model('Nota_m');
    }

    public function get_orcamento($id = '') {
        $orcamento = new Orcamento_m();
        //busca no banco orcamento
        $this->db->select('*');
        $this->db->from('orcamento as orc');
        $this->db->where("orc.id = $id");
        $result = $this->db->get();
        $result_orc = $result->result_array();
        $result_orc = $result_orc[0];

        //retorna um cliente
        $cliente = $this->Cliente_m->listar($result_orc['cliente_id']);
        $cliente = $cliente[0];

        //retorna um servico
        $servico = $this->Servico_m->listar($result_orc['servico_id']);

        // frete
        $frete = null;
        if (!empty($result_orc['frete_id'])) {
            $frete = $this->Frete_m->listar($result_orc['frete_id']);
            $frete = $frete[0];
            $orcamento->valor_frete = $result_orc['valor_frete'];
        }
        $frete_personalizado = null;
        if (!empty($result_orc['frete_personalizado'])) {
            $frete_personalizado = $result_orc['frete_personalizado'];
            $orcamento->valor_frete = $result_orc['valor_frete'];
        }

        // nota_fiscal
        if (!empty($result_orc['nota_fiscal_id'])) {
            $nota_fiscal = $this->Nota_m->listar($result_orc['nota_fiscal_id']);
            $nota_fiscal = $nota_fiscal[0];
        }

        $orcamento->id = $result_orc['id'];
        $orcamento->data_orcamento = $result_orc['data_orcamento'];
        $orcamento->total = $result_orc['total'];
        $orcamento->frete = $frete;
        $orcamento->frete_personalizado = $frete_personalizado;
        $orcamento->nota_fiscal = $nota_fiscal;
        $orcamento->valor_nota_fiscal = $result_orc['valor_nota_fiscal'];
        $orcamento->pagamento = $result_orc['pagamento'];
        $orcamento->prazo = $result_orc['prazo'];
        $orcamento->observacao = $result_orc['observacao'];
        $orcamento->status = $result_orc['status'];
        $orcamento->servico = $servico;
        $orcamento->cliente = $cliente;

        $orcamento->edicao = $result_orc['id'];

        return $orcamento;
    }

    public function set_status($id,$status) {
        $this->db->set('status', $status);
        $this->db->where('id', $id);
        $retorno = $this->db->update('orcamento');
        return $retorno;
    }

    public function Listar_view() {

        $result = $this->db->query("SELECT o.id,date_format(o.data_orcamento,'%d/%m/%Y') as data_orcamento,o.total,c.nome,c.cnpj_cpf,c.email,c.contato_nome,o.status FROM orcamento as o inner join cliente as c on o.cliente_id = c.id ORDER BY o.id DESC");

        $result_array = $result->result_array();
        $lista_orcamento = array();
        foreach ($result_array as $value) {
            $dados = array(
                'id' => $value['id'],
                'data' => $value['data_orcamento'],
                'total' => $value['total'],
                'cliente_nome' => $value['nome'],
                'contato_nome' => $value['contato_nome'],
                'cnpj_cpf' => $value['cnpj_cpf'],
                'email' => $value['email'],
                'valor' => $value['total'],
                'status' => $value['status']
            );
            $lista_orcamento[] = $dados;
        }
        return $lista_orcamento;
    }

    public function inserir_orcamento(Orcamento_m $orcamento) {

        if (!empty($orcamento)) {
            $dados = array(
                'id' => NULL,
                'cliente_id' => $orcamento->cliente->id,
                'servico_id' => $orcamento->servico->id,
                'data_orcamento' => $orcamento->data_orcamento,
                'total' => $orcamento->total,
                'nota_fiscal_id' => $orcamento->nota_fiscal->id,
                'valor_nota_fiscal' => $orcamento->valor_nota_fiscal,
                'pagamento' => $orcamento->pagamento,
                'prazo' => $orcamento->prazo,
                'observacao' => $orcamento->observacao
            );
            if (empty($orcamento->frete->id)) {
                $dados['frete_personalizado'] = $orcamento->frete_personalizado;
                $dados['valor_frete'] = $orcamento->valor_frete;
                $dados['frete_id'] = null;
            } else {
                $dados['frete_id'] = $orcamento->frete->id;
                $dados['valor_frete'] = $orcamento->valor_frete;
                $dados['frete_personalizado'] = null;
            }

            if ($this->db->insert('orcamento', $dados)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
//            if ($this->db->insert('orcamento', $dados)) {
//                if (!empty($_SESSION['orcamento']->edicao)) {
//                    $this->db->set('ativo', 0);
//                    $this->db->where('id', $_SESSION['orcamento']->edicao);
//                    $this->db->update('orcamento');
//                }
//                print $this->db->last_query();
//                return $this->db->insert_id();
//            } else {
//                return false;
//            }
        } else {
            return false;
        }
    }

    /*
      public function inserir(Orcamento_m $orcamento) {
      if (!empty($orcamento)) {
      if ($this->db->insert('orcamento', $orcamento)) {
      return $this->db->insert_id();
      } else {
      return false;
      }
      } else {
      return false;
      }
      }

      public function editar(Orcamento_m $orcamento) {
      if (!empty($orcamento->id)) {
      $this->db->where('id', $orcamento->id);
      if ($this->db->update('orcamento', $orcamento)) {
      return true;
      }
      } else {
      return false;
      }
      }

      public function deletar($id = '') {
      if (!empty($id)) {
      $this->db->where('id', $id);
      if ($this->db->delete('orcamento')) {
      return true;
      } else {
      return false;
      }
      } else {
      return false;
      }
      }

      function _changeToObject($result_db = '') {
      $orcamento_lista = array();

      foreach ($result_db as $key => $value) {
      $orcamento = new Orcamento_m();
      $orcamento->id = $value['id'];
      $orcamento->cliente = $value['nome'];
      $orcamento->gramatura = $value['gramatura'];
      $orcamento->altura = $value['altura'];
      $orcamento->largura = $value['largura'];
      $orcamento->descricao = $value['descricao'];
      $orcamento->valor = $value['valor'];

      $orcamento_lista[] = $orcamento;
      }

      return $orcamento_lista;
      }
     */

    public function calcula_total_orcamento() {
        $this->total = 0;

        if (!empty($this->nota_fiscal)) {
            $this->valor_nota_fiscal = ($this->servico->total * ($this->nota_fiscal->valor / 100));
            $this->total += $this->valor_nota_fiscal;
        }

        if (!empty($this->valor_frete)) {
            $this->total += $this->valor_frete;
        }

        if (!empty($this->servico)) {
            $this->total += $this->servico->total;
        }

        if (!empty($this->servico->desconto)) {
            $this->total -= $this->servico->desconto;
        }
    }

}
