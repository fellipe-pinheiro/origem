<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Corte_vinco_m extends CI_Model {

    var $id;
    var $nome;
    var $descricao;
    var $valor;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function total_linhas() {
        return $this->db->get('corte_vinco')->num_rows();
    }

    public function listar($id = '') {

        if (!empty($id)) {
            $result = $this->db->get_where('corte_vinco', array('id' => $id));
        } else {
            $result = $this->db->get('corte_vinco');
        }

        return $this->Corte_vinco_m->_changeToObject($result->result_array());
    }

    public function inserir(Corte_vinco_m $corte_vinco) {
        if (!empty($corte_vinco)) {
            if ($this->db->insert('corte_vinco', $corte_vinco)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function editar(Corte_vinco_m $corte_vinco) {
        if (!empty($corte_vinco->id)) {
            $this->db->where('id', $corte_vinco->id);
            if ($this->db->update('corte_vinco', $corte_vinco)) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function deletar($id = '') {
        if (!empty($id)) {
            $this->db->where('id', $id);
            if ($this->db->delete('corte_vinco')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function _changeToObject($result_db = '') {
        $corte_vinco_lista = array();


        foreach ($result_db as $key => $value) {
            $corte_vinco = new Corte_vinco_m();
            $corte_vinco->id = $value['id'];
            $corte_vinco->nome = $value['nome'];
            $corte_vinco->descricao = $value['descricao'];
            $corte_vinco->valor = $value['valor'];

            $corte_vinco_lista[] = $corte_vinco;
        }

        return $corte_vinco_lista;
    }

}
