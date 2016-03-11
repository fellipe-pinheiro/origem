<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Servico_m extends CI_Model {

    var $id;
    var $tipo;
    var $quantidade;
    var $desconto;
    var $valor_unitario;
    var $sub_total;
    var $total;
    var $papel;
    var $impressao;
    var $acabamento;
    var $acabamento_2;
    var $faca;
    var $colagem;
//    var $laminacao;

    function __construct() {
        parent::__construct();
        $this->load->model('Impressao_m');
        $this->load->model('Impressao_cartao_m');
        $this->load->model('Impressao_formato_m');
        $this->load->model('Fotolito_m');
        $this->load->model('Acabamento_m');
        $this->load->model('Acabamento_2_m');
        $this->load->model('Faca_m');
        $this->load->model('Faca_cartao_m');
        $this->load->model('Papel_m');
        $this->load->model('Empastamento_m');
        $this->load->model('Colagem_m');
//        $this->load->model('Laminacao_m');
        $this->load->model('Servico_m');
        $this->load->model('Cliente_m');
        $this->load->model('Nota_m');
        $this->load->model('Frete_m');
        $this->load->database();
    }

    public function calcula_total_servico() {
        $this->total = 0;

        if (!empty($this->papel)) {
            foreach ($this->papel as $key => $value) {
                $this->total += $value->sub_total;
                $this->total += $value->empastamento->sub_total;
            }
        }
        if (!empty($this->impressao)) {
            foreach ($this->impressao as $key => $value) {
                $this->total += $value->sub_total;
                $this->total += $value->fotolito->sub_total;
            }
        }
        if (!empty($this->acabamento)) {
            foreach ($this->acabamento as $key => $value) {
                $this->total += $value->sub_total;
            }
        }
        if (!empty($this->faca)) {
            foreach ($this->faca as $key => $value) {
                $this->total += str_replace(',', '.', $value->sub_total);
            }
        }
        if (!empty($this->acabamento_2)) {
            foreach ($this->acabamento_2 as $key => $value) {
                $this->total += $value->sub_total;
            }
        }
//        if (!empty($this->laminacao)) {
//            foreach ($this->laminacao as $key => $value) {
//                $this->total += $value->sub_total;
//            }
//        }
        if (!empty($this->colagem)) {
            foreach ($this->colagem as $key => $value) {
                $this->total += $value->sub_total;
            }
        }

        $this->valor_unitario = $this->total / $this->quantidade;
    }

//  Criar objeto servico a partir da lista de orcamento      
    public function listar($id = '') {
        //Query do servico
        $this->db->select('*');
        $this->db->from('servico');
        $this->db->where("servico.id = $id");
        $result = $this->db->get();
        $result_serv = $result->result_array();
        $result_serv = $result_serv[0];
        //cria um servico e seta as variaveis
        $servico = new Servico_m();
        $servico->id = $result_serv['id'];
        $servico->tipo = $result_serv['tipo'];
        $servico->quantidade = $result_serv['quantidade'];
        $servico->desconto = $result_serv['desconto'];
        $servico->valor_unitario = $result_serv['valor_unitario'];
        $servico->sub_total = $result_serv['sub_total'];
        $servico->total = $result_serv['total'];

        //acabamento
        $this->db->select('*');
        $this->db->from('servico_acabamento');
        $this->db->where("servico_id = $id");
        $result = $this->db->get();
        $result_acab = $result->result_array();
        foreach ($result_acab as $key => $value) {
            $acabamento = $this->Acabamento_m->listar($value['acabamento_id']);
            $acabamento = $acabamento[0];
            $acabamento->quantidade = $value['quantidade'];
            $acabamento->valor_unitario = $acabamento->valor;
            $acabamento->sub_total = $acabamento->quantidade * $acabamento->valor_unitario;
            $servico->acabamento[] = $acabamento;
        }

        //colagem
        $this->db->select('*');
        $this->db->from('servico_colagem');
        $this->db->where("servico_id = $id");
        $result = $this->db->get();
        $result_col = $result->result_array();
        foreach ($result_col as $key => $value) {
            $colagem = new Colagem_m();
            $colagem->nome = 'Colagem';
            $colagem->valor_unitario = $colagem->calcula_valor_unitario($value['colagem_valor'], $servico->quantidade);
            $colagem->sub_total = $value['colagem_valor'];
            $servico->colagem[] = $colagem;
        }

        //acabamento_2
        $this->db->select('*');
        $this->db->from('servico_acabamento_2');
        $this->db->where("servico_id = $id");
        $result = $this->db->get();
        $result_lam = $result->result_array();
        foreach ($result_lam as $key => $value) {
            $acabamento_2 = $this->Acabamento_2_m->listar($value['acabamento_2_id']);
            $acabamento_2 = $acabamento_2[0];
            $acabamento_2->valor_unitario = $acabamento_2->calcula_valor_unitario($value['valor'], $servico->quantidade);
            $acabamento_2->sub_total = $value['valor'];
            $servico->acabamento_2[] = $acabamento_2;
        }
//        //laminacao
//        $this->db->select('*');
//        $this->db->from('servico_laminacao');
//        $this->db->where("servico_id = $id");
//        $result = $this->db->get();
//        $result_lam = $result->result_array();
//        foreach ($result_lam as $key => $value) {
//            $laminacao = $this->Laminacao_m->listar($value['laminacao_id']);
//            $laminacao = $laminacao[0];
//            $laminacao->valor_unitario = $laminacao->calcula_valor_unitario($value['valor'], $servico->quantidade);
//            $laminacao->sub_total = $value['valor'];
//            $servico->laminacao[] = $laminacao;
//        }

        //papel
        $this->db->select('*');
        $this->db->from('servico_papel');
        $this->db->where("servico_id = $id");
        $result = $this->db->get();
        $result_pap = $result->result_array();
        foreach ($result_pap as $key => $value) {
            $papel = $this->Papel_m->listar($value['papel_id']);
            $papel = $papel[0];
            $papel->valor = $value['papel_valor'];
            $papel->quantidade = $value['quantidade'];
            $papel->valor_unitario = $papel->calcula_valor_unitario($papel->quantidade, $servico->quantidade);
            $papel->sub_total = $servico->quantidade * $papel->valor_unitario;
            $empastamento = new Empastamento_m();
            if ($value['empastamento_status'] == 1) {
                $empastamento->nome = 'Empastamento';
                $empastamento->status = TRUE;
                $empastamento->sub_total = $value['empastamento_valor'];
                $empastamento->valor_unitario = $empastamento->calcula_valor_unitario($empastamento->sub_total, $servico->quantidade);
            } else {
                $empastamento->nome = 'Empastamento';
                $empastamento->status = FALSE;
                $empastamento->sub_total = 0;
                $empastamento->valor_unitario = 0;
            }
            $papel->empastamento = $empastamento;
            $servico->papel[] = $papel;
        }
        //impressao & faca
        if ($servico->tipo == 'cartao') {
            //faca cartao
            $this->db->select('*');
            $this->db->from('servico_faca_cartao');
            $this->db->where("servico_id = $id");
            $result = $this->db->get();
            $result_fac_car = $result->result_array();
            foreach ($result_fac_car as $key => $value) {
                $faca = $this->Faca_cartao_m->listar($value['faca_cartao_id']);
                $faca = $faca[0];
                $faca->quantidade = 1;
                $faca->valor = $value['faca_cartao_valor'];
                $faca->sub_total = $faca->valor;
                $servico->faca[] = $faca;
            }
            //impressao cartao
            $this->db->select('*');
            $this->db->from('servico_impressao_cartao');
            $this->db->where("servico_id = $id");
            $result = $this->db->get();
            $result_imp_car = $result->result_array();
            foreach ($result_imp_car as $key => $value) {
                $qtd_cor_frente = $value['qtd_cor_frente'];
                $qtd_cor_verso = $value['qtd_cor_verso'];
                $qtd_cor_frente == '' ? $qtd_cor_frente = 0 : '';
                $qtd_cor_verso == '' ? $qtd_cor_verso = 0 : '';

                $impressao = $this->Impressao_cartao_m->listar($value['impressao_cartao_id']); //listo a impressao pelo ID
                $impressao = $impressao[0];
                $impressao->valor_100 = $value['impressao_cartao_valor_100'];
                $impressao->valor_500 = $value['impressao_cartao_valor_500'];
                $impressao->valor_1000 = $value['impressao_cartao_valor_1000'];
                $impressao->qtd_cor_frente = $qtd_cor_frente;
                $impressao->qtd_cor_verso = $qtd_cor_verso;
                $impressao->valor_unitario = $impressao->calcula_valor_unitario($servico->quantidade, $impressao);
                $impressao->sub_total = $servico->quantidade * $impressao->valor_unitario;

                $fotolito = $this->Fotolito_m->listar_formato($impressao->impressao_formato->id); //listo o fotolito pela coluna da impressao_formato
                $fotolito = $fotolito[0];
                if ($servico->tipo == 'cartao') {
                    $fotolito->quantidade = $impressao->qtd_cor_frente + $impressao->qtd_cor_verso;
                } else {
                    $fotolito->quantidade = 1;
                }
                $fotolito->valor = $value['fotolito_valor'];
                $fotolito->valor_unitario = $fotolito->valor;
                $fotolito->sub_total = $fotolito->quantidade * $fotolito->valor_unitario;
                $impressao->fotolito = $fotolito;
                $servico->impressao[] = $impressao;
            }
        } else {
            //faca
            $this->db->select('*');
            $this->db->from('servico_faca');
            $this->db->where("servico_id = $id");
            $result = $this->db->get();
            $result_fac = $result->result_array();
            foreach ($result_fac as $key => $value) {
                $faca = $this->Faca_m->listar($value['faca_id']);
                $faca = $faca[0];
                $faca->altura = $value['altura'];
                $faca->largura = $value['largura'];
                $faca->valor = $value['faca_valor'];
                $faca->quantidade = 1;
                $faca->valor_faca = $faca->calcular_valor($faca->altura, $faca->largura);
                $faca->sub_total = $faca->quantidade * $faca->valor_faca;
                $servico->faca[] = $faca;
            }
            //impressao
            $this->db->select('*');
            $this->db->from('servico_impressao');
            $this->db->where("servico_id = $id");
            $result = $this->db->get();
            $result_imp = $result->result_array();
            foreach ($result_imp as $key => $value) {
                $impressao = $this->Impressao_m->listar($value['impressao_id']); //listo a impressao pelo ID
                $impressao = $impressao[0];
                $impressao->valor = $value['impressao_valor'];
                $impressao->valor_unitario = $impressao->calcula_valor_unitario($servico->quantidade);
                $impressao->sub_total = $servico->quantidade * $impressao->valor_unitario;
                $fotolito = $this->Fotolito_m->listar_formato($impressao->impressao_formato->id); //listo o fotolito pela coluna da impressao_formato
                $fotolito = $fotolito[0];
                $fotolito->quantidade = 1;
                $fotolito->valor = $value['fotolito_valor'];
                $fotolito->valor_unitario = $fotolito->valor;
                $fotolito->sub_total = $fotolito->quantidade * $fotolito->valor_unitario;
                $impressao->fotolito = $fotolito;
                $servico->impressao[] = $impressao;
            }
        }

        return $servico;
    }

    public function inserir_servico(Servico_m $servico) {
        if (!empty($servico)) {
            $dados = array(
                'id' => NULL,
                'tipo' => $servico->tipo,
                'quantidade' => $servico->quantidade,
                'desconto' => str_replace(',', '.', $servico->desconto),
                'valor_unitario' => str_replace(',', '.', $servico->valor_unitario),
                'sub_total' => str_replace(',', '.', $servico->sub_total),
                'total' => str_replace(',', '.', $servico->total)
            );
            if ($this->db->insert('servico', $dados)) {
                return $this->db->insert_id();
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function inserir_servico_papel($servico_id, Papel_m $papel) {
        if (!empty($papel)) {
            $dados = array(
                'servico_id' => $servico_id,
                'papel_id' => $papel->id,
                'papel_valor' => $papel->valor,
                'quantidade' => $papel->quantidade,
                'empastamento_status' => $papel->empastamento->status,
                'empastamento_valor' => $papel->empastamento->sub_total
            );
            if ($this->db->insert('servico_papel', $dados)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function inserir_servico_impressao($servico_id, Impressao_m $impressao) {
        if (!empty($impressao)) {
            $dados = array(
                'servico_id' => $servico_id,
                'impressao_id' => $impressao->id,
                'impressao_valor' => $impressao->valor,
                'impressao_formato_id' => $impressao->impressao_formato->id,
                'fotolito_id' => $impressao->fotolito->id,
                'fotolito_valor' => $impressao->fotolito->valor,
            );
            if ($this->db->insert('servico_impressao', $dados)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function inserir_servico_impressao_cartao($servico_id, Impressao_cartao_m $impressao) {
        if (!empty($impressao)) {
            $dados = array(
                'servico_id' => $servico_id,
                'impressao_cartao_id' => $impressao->id,
                'impressao_cartao_valor_100' => $impressao->valor_100,
                'impressao_cartao_valor_500' => $impressao->valor_500,
                'impressao_cartao_valor_1000' => $impressao->valor_1000,
                'impressao_formato_id' => $impressao->impressao_formato->id,
                'fotolito_id' => $impressao->fotolito->id,
                'fotolito_valor' => $impressao->fotolito->valor,
                'qtd_cor_frente' => $impressao->qtd_cor_frente,
                'qtd_cor_verso' => $impressao->qtd_cor_verso
            );
            if ($this->db->insert('servico_impressao_cartao', $dados)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function inserir_servico_acabamento($servico_id, Acabamento_m $acabamento) {
        if (!empty($acabamento)) {
            $dados = array(
                'servico_id' => $servico_id,
                'acabamento_id' => $acabamento->id,
                'quantidade' => $acabamento->quantidade,
            );
            if ($this->db->insert('servico_acabamento', $dados)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function inserir_servico_faca($servico_id, Faca_m $faca) {
        if (!empty($faca)) {
            $dados = array(
                'servico_id' => $servico_id,
                'faca_id' => $faca->id,
                'faca_valor' => $faca->valor,
                'altura' => $faca->altura,
                'largura' => $faca->largura
            );
            if ($this->db->insert('servico_faca', $dados)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function inserir_servico_faca_cartao($servico_id, Faca_cartao_m $faca) {
        if (!empty($faca)) {
            $dados = array(
                'servico_id' => $servico_id,
                'faca_cartao_id' => $faca->id,
                'faca_cartao_valor' => $faca->valor,
            );
            if ($this->db->insert('servico_faca_cartao', $dados)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function inserir_servico_acabamento_2($servico_id, Acabamento_2_m $acabamento_2) {
        if (!empty($acabamento_2)) {
            $dados = array(
                'servico_id' => $servico_id,
                'acabamento_2_id' => $acabamento_2->id,
                'valor' => $acabamento_2->sub_total
            );
            if ($this->db->insert('servico_acabamento_2', $dados)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
//    public function inserir_servico_laminacao($servico_id, Laminacao_m $laminacao) {
//        if (!empty($laminacao)) {
//            $dados = array(
//                'servico_id' => $servico_id,
//                'laminacao_id' => $laminacao->id,
//                'valor' => $laminacao->sub_total
//            );
//            if ($this->db->insert('servico_laminacao', $dados)) {
//                return true;
//            } else {
//                return false;
//            }
//        } else {
//            return false;
//        }
//    }

    public function inserir_servico_colagem($servico_id, Colagem_m $colagem) {
        if (!empty($colagem)) {
            $dados = array(
                'servico_id' => $servico_id,
                'colagem_valor' => $colagem->sub_total
            );
            if ($this->db->insert('servico_colagem', $dados)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /*
      public function editar(Nota_m $nota) {
      if (!empty($nota->id)) {
      $this->db->where('id', $nota->id);
      if ($this->db->update('nota', $nota)) {
      return true;
      }
      } else {
      return false;
      }
      }

      public function deletar($id = '') {
      if (!empty($id)) {
      $this->db->where('id', $id);
      if ($this->db->delete('nota')) {
      return true;
      } else {
      return false;
      }
      } else {
      return false;
      }
      }

      function _changeToObject($result_db = '') {
      $nota_lista = array();


      foreach ($result_db as $key => $value) {
      $nota = new Nota_m();
      $nota->id = $value['id'];
      $nota->nome = $value['nome'];
      $nota->descricao = $value['descricao'];
      $nota->valor = $value['valor'];

      $nota_lista[] = $nota;
      }

      return $nota_lista;
      }
     */
}
