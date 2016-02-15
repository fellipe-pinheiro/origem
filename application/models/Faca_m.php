<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faca_m extends CI_Model {

    var $id;
    var $nome;
    var $descricao;
    var $valor;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function total_linhas() {
        return $this->db->get('faca')->num_rows();
    }

    public function listar($id = '') {

        if (!empty($id)) {
            $result = $this->db->get_where('faca', array('id' => $id));
        } else {
            $result = $this->db->get('faca');
        }

        return $this->Faca_m->_changeToObject($result->result_array());
    }

    public function inserir(Faca_m $faca) {
        if (!empty($faca)) {
            if ($this->db->insert('faca', $faca)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function editar(Faca_m $faca) {
        if (!empty($faca->id)) {
            $this->db->where('id', $faca->id);
            if ($this->db->update('faca', $faca)) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function deletar($id = '') {
        if (!empty($id)) {
            $this->db->where('id', $id);
            if ($this->db->delete('faca')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function _changeToObject($result_db = '') {
        $faca_lista = array();


        foreach ($result_db as $key => $value) {
            $faca = new Faca_m();
            $faca->id = $value['id'];
            $faca->nome = $value['nome'];
            $faca->descricao = $value['descricao'];
            $faca->valor = $value['valor'];

            $faca_lista[] = $faca;
        }

        return $faca_lista;
    }

}
