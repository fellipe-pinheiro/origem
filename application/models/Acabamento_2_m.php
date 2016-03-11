<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Acabamento_2_m extends CI_Model {

    var $id;
    var $nome;
    var $descricao;
    var $valor;
    var $sub_total;
    var $valor_unitario;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function total_linhas() {
        return $this->db->get('acabamento_2')->num_rows();
    }

    public function listar($id = '') {

        if (!empty($id)) {
            $result = $this->db->get_where('acabamento_2', array('id' => $id));
        } else {
            $result = $this->db->get('acabamento_2');
        }

        return $this->Acabamento_2_m->_changeToObject($result->result_array());
    }

    public function inserir(Acabamento_2_m $acabamento_2) {
        if (!empty($acabamento_2)) {
            $data = array(
                'id' => $acabamento_2->id,
                'nome' => $acabamento_2->nome,
                'descricao' => $acabamento_2->descricao,
                'valor' => str_replace(',', '.', $acabamento_2->valor)
            );
            if ($this->db->insert('acabamento_2', $data)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function editar(Acabamento_2_m $acabamento_2) {
        if (!empty($acabamento_2->id)) {
            $data = array(
                'id' => $acabamento_2->id,
                'nome' => $acabamento_2->nome,
                'descricao' => $acabamento_2->descricao,
                'valor' => str_replace(',', '.', $acabamento_2->valor)
            );
            $this->db->where('id', $acabamento_2->id);
            if ($this->db->update('acabamento_2', $data)) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function deletar($id = '') {
        if (!empty($id)) {
            $this->db->where('id', $id);
            if ($this->db->delete('acabamento_2')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function _changeToObject($result_db = '') {
        $acabamento_2_lista = array();


        foreach ($result_db as $key => $value) {
            $acabamento_2 = new Acabamento_2_m();
            $acabamento_2->id = $value['id'];
            $acabamento_2->nome = $value['nome'];
            $acabamento_2->descricao = $value['descricao'];
            $acabamento_2->valor = $value['valor'];

            $acabamento_2_lista[] = $acabamento_2;
        }

        return $acabamento_2_lista;
    }

    public function calcula_valor_unitario($valor, $quantidade_pedido) {
        return $valor / $quantidade_pedido;
    }

}
