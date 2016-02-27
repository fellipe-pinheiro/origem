<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Impressao_cartao_m extends CI_Model {

    var $id;
    var $nome;
    var $impressao_formato;
    var $descricao;
    var $valor_100;
    var $valor_500;
    var $valor_1000;
    var $qtd_cor_frente;
    var $qtd_cor_verso;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Impressao_formato_m');
    }

    public function total_linhas() {
        return $this->db->get('impressao_cartao')->num_rows();
    }

    public function listar($id = '') {
        if (!empty($id)) {
            $result = $this->db->get_where('impressao_cartao', array('id' => $id));
        } else {
            $result = $this->db->get('impressao_cartao');
        }
        $impressao_cartao_lista = $this->Impressao_cartao_m->_changeToObject($result->result_array());

        return $impressao_cartao_lista;
    }

    public function listar_quantidade($id = '') {
        if (!empty($id) && !empty($pedido_quantidade)) {
            $result = $this->db->get_where('impressao_cartao', array('id' => $id, 'quantidade' => $pedido_quantidade));
        } else {
            $result = $this->db->get_where('impressao_cartao', array('quantidade' => $pedido_quantidade));
        }
        $impressao_cartao_lista = $this->Impressao_cartao_m->_changeToObject($result->result_array());
        return $impressao_cartao_lista;
    }

    public function inserir(Impressao_cartao_m $impressao_cartao) {
        if (!empty($impressao_cartao)) {
            $data = array(
                'id' => $impressao_cartao->id,
                'nome' => $impressao_cartao->nome,
                'impressao_formato' => $impressao_cartao->impressao_formato,
                'descricao' => $impressao_cartao->descricao,
                'valor_100' => str_replace(',', '.', $impressao_cartao->valor_100),
                'valor_500' => str_replace(',', '.', $impressao_cartao->valor_500),
                'valor_1000' => str_replace(',', '.', $impressao_cartao->valor_1000)
            );
            if ($this->db->insert('impressao_cartao', $data)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function editar(Impressao_cartao_m $impressao_cartao) {
        if (!empty($impressao_cartao->id)) {
            $data = array(
                'id' => $impressao_cartao->id,
                'nome' => $impressao_cartao->nome,
                'impressao_formato' => $impressao_cartao->impressao_formato,
                'descricao' => $impressao_cartao->descricao,
                'valor_100' => str_replace(',', '.', $impressao_cartao->valor_100),
                'valor_500' => str_replace(',', '.', $impressao_cartao->valor_500),
                'valor_1000' => str_replace(',', '.', $impressao_cartao->valor_1000)
            );
            $this->db->where('id', $impressao_cartao->id);
            if ($this->db->update('impressao_cartao', $data)) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function deletar($id = '') {
        if (!empty($id)) {
            $this->db->where('id', $id);
            if ($this->db->delete('impressao_cartao')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function _changeToObject($result_db = '') {
        $impressao_cartao_lista = array();


        foreach ($result_db as $key => $value) {
            $impressao_cartao = new Impressao_cartao_m();
            $impressao_cartao->id = $value['id'];
            $impressao_cartao->nome = $value['nome'];
            $impressao_cartao->valor_100 = str_replace('.', ',', $value['valor_100']);
            $impressao_cartao->valor_500 = str_replace('.', ',', $value['valor_500']);
            $impressao_cartao->valor_1000 = str_replace('.', ',', $value['valor_1000']);
            $impressao_cartao->descricao = $value['descricao'];

            foreach ($this->Impressao_formato_m->listar($value['impressao_formato']) as $key => $value) {
                $impressao_cartao->impressao_formato = $value;
            }

            $impressao_cartao_lista[] = $impressao_cartao;
        }

        return $impressao_cartao_lista;
    }

    public function calcula_valor_unitario($quantidade_pedido = '', Impressao_cartao_m $impressao) {
        if ($quantidade_pedido < 500) {
            $valor_unitario = $impressao->valor_100 / $quantidade_pedido;
        } elseif ($quantidade_pedido < 1000) {
            $valor_unitario = $impressao->valor_500 / $quantidade_pedido;
        } elseif ($quantidade_pedido >= 1000) {
            $valor_unitario = $impressao->valor_1000 / $quantidade_pedido;
        }
        $qtd_cor = $impressao->qtd_cor_frente + $impressao->qtd_cor_verso;
        $valor_unitario = $valor_unitario * $qtd_cor;

        return $valor_unitario;
    }

}
