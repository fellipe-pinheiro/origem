<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fotolito_m extends CI_Model {

    var $id;
    var $impressao_formato;
    var $descricao;
    var $valor;
    var $quantidade;
    var $sub_total;
    var $valor_unitario;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Impressao_formato_m');
    }

//    public function total_linhas() {
//        return $this->db->get('fotolito')->num_rows();
//    }
//
//    public function _listar($id = '') {
//
//        if (!empty($id)) {
//            $result = $this->db->get_where('fotolito', array('id' => $id));
//        } else {
//            $result = $this->db->get('fotolito');
//        }
//
//        return $result->result_array();
//    }

    public function listar($id = '') {

        if (!empty($id)) {
            $result = $this->db->get_where('fotolito', array('id' => $id));
        } else {
            $result = $this->db->get('fotolito');
        }
        $impressao_lista = $this->Fotolito_m->_changeToObject($result->result_array());
        return $impressao_lista;
    }

    //Busca pela impressao_formato na tabela Fotolito
    public function listar_formato($impressao_formato = '') {
        if (!empty($impressao_formato)) {
            $result = $this->db->get_where('fotolito', array('impressao_formato' => $impressao_formato));
        } else {
            $result = $this->db->get('fotolito');
        }
        $fotolito_lista = $this->Fotolito_m->_changeToObject($result->result_array());
        return $fotolito_lista;
    }

    public function inserir(Fotolito_m $fotolito) {
        if (!empty($fotolito)) {
            $dados = array(
                'id' => $fotolito->id,
                'impressao_formato' => $fotolito->impressao_formato,
                'descricao' => $fotolito->descricao,
                'valor' => str_replace(',', '.', $fotolito->valor)
            );
            if ($this->db->insert('fotolito', $dados)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function editar(Fotolito_m $fotolito) {
        if (!empty($fotolito->id)) {
            $dados = array(
                'id' => $fotolito->id,
                'impressao_formato' => $fotolito->impressao_formato,
                'descricao' => $fotolito->descricao,
                'valor' => str_replace(',', '.', $fotolito->valor)
            );
            $this->db->where('id', $fotolito->id);
            if ($this->db->update('fotolito', $dados)) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function deletar($id = '') {
        if (!empty($id)) {
            $this->db->where('id', $id);
            if ($this->db->delete('fotolito')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function _changeToObject($result_db = '') {
        $fotolito_lista = array();


        foreach ($result_db as $key => $value) {
            $fotolito = new Fotolito_m();
            $fotolito->id = $value['id'];
            $fotolito->descricao = $value['descricao'];
            $fotolito->valor = $value['valor'];

            foreach ($this->Impressao_formato_m->listar($value['impressao_formato']) as $key => $value) {
                $fotolito->impressao_formato = $value;
            }

            $fotolito_lista[] = $fotolito;
        }

        return $fotolito_lista;
    }

}
