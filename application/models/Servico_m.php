<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Servico_m extends CI_Model {

    var $id;
    var $quantidade;
    var $desconto;
    var $valor_unitario;
    var $sub_total;
    var $total;
    var $tipo;
    var $papel;
    var $impressao;
    var $fotolito;
    var $acabamento;
    var $faca;
    var $laminacao;
    var $colagem;
    var $empastamento;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function calcula_total_servico() {
        $this->total = 0;

        if (!empty($this->papel)) {
            foreach ($this->papel as $key => $value) {
                $this->total += $value->sub_total;
                $this->total += $value->empastamento->sub_total;
            }
        }
        if (!empty($this->impressao)) {
            foreach ($this->impressao as $key => $value) {
                $this->total += $value->sub_total;
                $this->total += $value->fotolito->sub_total;
            }
        }
        if (!empty($this->acabamento)) {
            foreach ($this->acabamento as $key => $value) {
                $this->total += $value->sub_total;
            }
        }
        if (!empty($this->faca)) {
            foreach ($this->faca as $key => $value) {
                $this->total += str_replace(',', '.', $value->sub_total);
            }
        }
        if (!empty($this->laminacao)) {
            foreach ($this->laminacao as $key => $value) {
                $this->total += $value->sub_total;
            }
        }
        if (!empty($this->colagem)) {
            foreach ($this->colagem as $key => $value) {
                $this->total += $value->sub_total;
            }
        }

        $this->valor_unitario = $this->total / $this->quantidade;
    }

//    public function total_linhas() {
//        return $this->db->get('nota')->num_rows();
//    }
//
//    public function listar($id = '') {
//
//        if (!empty($id)) {
//            $result = $this->db->get_where('nota', array('id' => $id));
//        } else {
//            $result = $this->db->get('nota');
//        }
//
//        return $this->Nota_m->_changeToObject($result->result_array());
//    }
//
//    public function inserir(Nota_m $nota) {
//        if (!empty($nota)) {
//            if ($this->db->insert('nota', $nota)) {
//                return $this->db->insert_id();
//            } else {
//                return false;
//            }
//        } else {
//            return false;
//        }
//    }
//
//    public function editar(Nota_m $nota) {
//        if (!empty($nota->id)) {
//            $this->db->where('id', $nota->id);
//            if ($this->db->update('nota', $nota)) {
//                return true;
//            }
//        } else {
//            return false;
//        }
//    }
//
//    public function deletar($id = '') {
//        if (!empty($id)) {
//            $this->db->where('id', $id);
//            if ($this->db->delete('nota')) {
//                return true;
//            } else {
//                return false;
//            }
//        } else {
//            return false;
//        }
//    }
//    
//     function _changeToObject($result_db = '') {
//        $nota_lista = array();
//
//
//        foreach ($result_db as $key => $value) {
//            $nota = new Nota_m();
//            $nota->id = $value['id'];
//            $nota->nome = $value['nome'];
//            $nota->descricao = $value['descricao'];
//            $nota->valor = $value['valor'];
//
//            $nota_lista[] = $nota;
//        }
//
//        return $nota_lista;
//    }
}
