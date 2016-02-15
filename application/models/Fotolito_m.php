<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fotolito_m extends CI_Model {

    var $id;
    var $altura;
    var $largura;
    var $descricao;
    var $valor; 

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function total_linhas() {
        return $this->db->get('fotolito')->num_rows();
    }

    public function listar($id = '') {

        if (!empty($id)) {
            $result = $this->db->get_where('fotolito', array('id' => $id));
        } else {
            $result = $this->db->get('fotolito');
        }

        return $this->Fotolito_m->_changeToObject($result->result_array());
    }

    public function inserir(Fotolito_m $fotolito) {
        if (!empty($fotolito)) {
            if ($this->db->insert('fotolito', $fotolito)) {
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
            $this->db->where('id', $fotolito->id);
            if ($this->db->update('fotolito', $fotolito)) {
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
            $fotolito->altura = $value['altura'];
            $fotolito->largura = $value['largura'];
            $fotolito->descricao = $value['descricao'];
            $fotolito->valor = $value['valor'];

            $fotolito_lista[] = $fotolito;
        }

        return $fotolito_lista;
    }

}
