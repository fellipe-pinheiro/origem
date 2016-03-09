<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Impressao_formato_m extends CI_Model {

    var $id;
    var $altura;
    var $largura;
    var $descricao;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function total_linhas() {
        return $this->db->get('impressao_formato')->num_rows();
    }

    public function _listar($id = '') {

        if (!empty($id)) {
            $result = $this->db->get_where('impressao_formato', array('id' => $id));
        } else {
            $result = $this->db->get('impressao_formato');
        }

        return $result->result_array();
    }

    public function listar($id = '') {
        if (!empty($id)) {
            $result = $this->db->get_where('impressao_formato', array('id' => $id));
        } else {
            $result = $this->db->get('impressao_formato');
        }

        $impressao_formato_lista = $this->Impressao_formato_m->_changeToObject($result->result_array());

        return $impressao_formato_lista;
    }

    public function inserir(Impressao_formato_m $impressao_formato) {
        if (!empty($impressao_formato)) {
            $dados = array(
                'id' => $impressao_formato->id,
                'altura' => $impressao_formato->altura,
                'largura' => $impressao_formato->largura,
                'descricao' => $impressao_formato->descricao
            );
            if ($this->db->insert('impressao_formato', $dados)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function editar(Impressao_formato_m $impressao_formato) {
        if (!empty($impressao_formato->id)) {
            $dados = array(
                'id' => $impressao_formato->id,
                'altura' => $impressao_formato->altura,
                'largura' => $impressao_formato->largura,
                'descricao' => $impressao_formato->descricao
            );
            $this->db->where('id', $impressao_formato->id);
            if ($this->db->update('impressao_formato', $dados)) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function deletar($id = '') {
        if (!empty($id)) {
            $this->db->where('id', $id);
            if ($this->db->delete('impressao_formato')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function _changeToObject($result_db = '') {
        $impressao_formato_lista = array();

        foreach ($result_db as $key => $value) {
            $impressao_formato = new Impressao_formato_m();
            $impressao_formato->id = $value['id'];
            $impressao_formato->altura = $value['altura'];
            $impressao_formato->largura = $value['largura'];
            $impressao_formato->descricao = $value['descricao'];

            $impressao_formato_lista[] = $impressao_formato;
        }
        return $impressao_formato_lista;
    }

}
