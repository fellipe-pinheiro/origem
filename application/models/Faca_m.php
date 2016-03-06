<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faca_m extends CI_Model {

    var $id;
    var $nome;
    var $descricao;
    var $valor;
    var $altura;
    var $largura;
    var $quantidade;
    var $valor_faca;
    var $sub_total;

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
            $data = array(
                'id' => $faca->id,
                'nome' => $faca->nome,
                'descricao' => $faca->descricao,
                'valor' => str_replace(',', '.', $faca->valor)
            );
            if ($this->db->insert('faca', $data)) {
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
            $data = array(
                'id' => $faca->id,
                'nome' => $faca->nome,
                'descricao' => $faca->descricao,
                'valor' => str_replace(',', '.', $faca->valor)
            );
            $this->db->where('id', $faca->id);
            if ($this->db->update('faca', $data)) {
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

    public function calcular_valor($alt, $lar) {
        $altura = $alt / 10; //Recebo a altura em mm e transformo para cm
        $largura = $lar / 10; //Recebo a largura em mm e transformo para cm
        return ($altura + $largura) * $this->valor;
    }

}
