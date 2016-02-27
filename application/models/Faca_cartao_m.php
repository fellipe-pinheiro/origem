<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faca_cartao_m extends CI_Model {

    var $id;
    var $nome;
    var $descricao;
    var $valor;
    var $quantidade;
    var $sub_total;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function listar($id = '') {

        if (!empty($id)) {
            $result = $this->db->get_where('faca_cartao', array('id' => $id));
        } else {
            $result = $this->db->get('faca_cartao');
        }

        return $this->Faca_cartao_m->_changeToObject($result->result_array());
    }

    public function inserir(Faca_cartao_m $faca) {
        if (!empty($faca)) {
            $data = array(
                'id' => $faca->id,
                'nome' => $faca->nome,
                'descricao' => $faca->descricao,
                'valor' => str_replace(',', '.', $faca->valor)
            );
            if ($this->db->insert('faca_cartao', $data)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function editar(Faca_cartao_m $faca) {
        if (!empty($faca->id)) {
            $data = array(
                'id' => $faca->id,
                'nome' => $faca->nome,
                'descricao' => $faca->descricao,
                'valor' => str_replace(',', '.', $faca->valor)
            );
            $this->db->where('id', $faca->id);
            if ($this->db->update('faca_cartao', $data)) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function deletar($id = '') {
        if (!empty($id)) {
            $this->db->where('id', $id);
            if ($this->db->delete('faca_cartao')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function _changeToObject($result_db = '') {
        $faca_cartao_lista = array();


        foreach ($result_db as $key => $value) {
            $faca_cartao = new Faca_cartao_m();
            $faca_cartao->id = $value['id'];
            $faca_cartao->nome = $value['nome'];
            $faca_cartao->descricao = $value['descricao'];
            $faca_cartao->valor = str_replace('.', ',', $value['valor']);

            $faca_cartao_lista[] = $faca_cartao;
        }

        return $faca_cartao_lista;
    }

}
