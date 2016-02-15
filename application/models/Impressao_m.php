<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Impressao_m extends CI_Model {

    var $id;
    var $nome;
    var $valor;
    var $descricao;
    var $impressao_formato;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Impressao_formato_m');
    }

    public function total_linhas() {
        return $this->db->get('impressao')->num_rows();
    }

    public function _listar($id = '') {

        if (!empty($id)) {
            $result = $this->db->get_where('impressao', array('id' => $id));
        } else {
            $result = $this->db->get('impressao');
        }

        return $result->result_array();
    }

    public function listar($id = '') {
        if (!empty($id)) {
            $result = $this->db->get_where('impressao', array('id' => $id));
        } else {
            $result = $this->db->get('impressao');
        }
        $impressao_lista = $this->Impressao_m->_changeToObject($result->result_array());

        return $impressao_lista;
    }

    public function inserir(Impressao_m $impressao) {
        if (!empty($impressao)) {
            if ($this->db->insert('impressao', $impressao)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function editar(Impressao_m $impressao) {
        if (!empty($impressao->id)) {
            $this->db->where('id', $impressao->id);
            if ($this->db->update('impressao', $impressao)) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function deletar($id = '') {
        if (!empty($id)) {
            $this->db->where('id', $id);
            if ($this->db->delete('impressao')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function _changeToObject($result_db = '') {
        $impressao_lista = array();


        foreach ($result_db as $key => $value) {
            $impressao = new Impressao_m();
            $impressao->id = $value['id'];
            $impressao->nome = $value['nome'];
            $impressao->valor = $value['valor'];
            $impressao->descricao = $value['descricao'];

            foreach ($this->Impressao_formato_m->listar($value['impressao_formato']) as $key => $value) {
                $impressao->impressao_formato = $value;
            }

            $impressao_lista[] = $impressao;
        }

        return $impressao_lista;
    }

}
