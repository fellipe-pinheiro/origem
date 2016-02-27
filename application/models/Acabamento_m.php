<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Acabamento_m extends CI_Model {

    var $id;
    var $nome;
    var $descricao;
    var $valor;
    var $quantidade;
    var $valor_unitario;
    var $sub_total;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function total_linhas() {
        return $this->db->get('acabamento')->num_rows();
    }

    public function listar($id = '') {

        if (!empty($id)) {
            $result = $this->db->get_where('acabamento', array('id' => $id));
        } else {
            $result = $this->db->get('acabamento');
        }

        return $this->Acabamento_m->_changeToObject($result->result_array());
    }

    public function inserir(Acabamento_m $acabamento) {
        if (!empty($acabamento)) {
            $dados = array(
                'id' => $acabamento->id,
                'nome' => $acabamento->nome,
                'descricao' => $acabamento->descricao,
                'valor' => str_replace(',', '.', $acabamento->valor)
            );
            if ($this->db->insert('acabamento', $dados)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function editar(Acabamento_m $acabamento) {
        if (!empty($acabamento->id)) {
            $dados = array(
                'id' => $acabamento->id,
                'nome' => $acabamento->nome,
                'descricao' => $acabamento->descricao,
                'valor' => str_replace(',', '.', $acabamento->valor)
            );
            $this->db->where('id', $acabamento->id);
            if ($this->db->update('acabamento', $dados)) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function deletar($id = '') {
        if (!empty($id)) {
            $this->db->where('id', $id);
            if ($this->db->delete('acabamento')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function _changeToObject($result_db = '') {
        $acabamento_lista = array();


        foreach ($result_db as $key => $value) {
            $acabamento = new Acabamento_m();
            $acabamento->id = $value['id'];
            $acabamento->nome = $value['nome'];
            $acabamento->descricao = $value['descricao'];
            $acabamento->valor = str_replace('.', ',', $value['valor']);

            $acabamento_lista[] = $acabamento;
        }

        return $acabamento_lista;
    }

}
