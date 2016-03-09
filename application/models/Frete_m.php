<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Frete_m extends CI_Model {

    var $id;
    var $nome;
    var $descricao;
    var $valor;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function total_linhas() {
        return $this->db->get('frete')->num_rows();
    }

    public function listar($id = '') {

        if (!empty($id)) {
            $result = $this->db->get_where('frete', array('id' => $id));
        } else {
            $result = $this->db->get('frete');
        }

        return $this->Frete_m->_changeToObject($result->result_array());
    }

    public function inserir(Frete_m $frete) {
        if (!empty($frete)) {
            $dados = array(
                'id' => $frete->id,
                'nome' => $frete->nome,
                'descricao' => $frete->descricao,
                'valor' => str_replace(',', '.', $frete->valor)
            );
            if ($this->db->insert('frete', $dados)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function editar(Frete_m $frete) {
        if (!empty($frete->id)) {
            $dados = array(
                'id' => $frete->id,
                'nome' => $frete->nome,
                'descricao' => $frete->descricao,
                'valor' => str_replace(',', '.', $frete->valor)
            );
            $this->db->where('id', $frete->id);
            if ($this->db->update('frete', $dados)) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function deletar($id = '') {
        if (!empty($id)) {
            $this->db->where('id', $id);
            if ($this->db->delete('frete')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function _changeToObject($result_db = '') {
        $frete_lista = array();


        foreach ($result_db as $key => $value) {
            $frete = new Frete_m();
            $frete->id = $value['id'];
            $frete->nome = $value['nome'];
            $frete->descricao = $value['descricao'];
            $frete->valor = $value['valor'];

            $frete_lista[] = $frete;
        }

        return $frete_lista;
    }

}
