<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Orcamento_m extends CI_Model {

    var $id;
    var $cliente;
    var $data_orcamento;
    var $status;
    var $desconto;
    var $total;
    var $itens;
    var $servico;
    var $frete;
    var $valor_frete;
    var $nota_fiscal;
    var $valor_nota_fiscal;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Cliente_m');
    }

    public function total_linhas() {
        return $this->db->get('orcamento')->num_rows();
    }

    public function listar($id = '') {

        if (!empty($id)) {
            $result = $this->db->get_where('orcamento', array('id' => $id));
        } else {
            $result = $this->db->get('orcamento');
        }

        return $this->Orcamento_m->_changeToObject($result->result_array());
    }

    public function inserir(Orcamento_m $orcamento) {
        if (!empty($orcamento)) {
            if ($this->db->insert('orcamento', $orcamento)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function editar(Orcamento_m $orcamento) {
        if (!empty($orcamento->id)) {
            $this->db->where('id', $orcamento->id);
            if ($this->db->update('orcamento', $orcamento)) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function deletar($id = '') {
        if (!empty($id)) {
            $this->db->where('id', $id);
            if ($this->db->delete('orcamento')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function _changeToObject($result_db = '') {
        $orcamento_lista = array();


//        foreach ($result_db as $key => $value) {
//            $orcamento = new Orcamento_m();
//            $orcamento->id = $value['id'];
//            $orcamento->cliente = $value['nome'];
//            $orcamento->gramatura = $value['gramatura'];
//            $orcamento->altura = $value['altura'];
//            $orcamento->largura = $value['largura'];
//            $orcamento->descricao = $value['descricao'];
//            $orcamento->valor = $value['valor'];
//
//            $orcamento_lista[] = $orcamento;
//        }
//
//        return $orcamento_lista;
    }

    public function calcula_total_orcamento() {
        $this->total = 0;

        if (!empty($this->nota_fiscal)) {
            $this->valor_nota_fiscal = ($this->servico->total * ($this->nota_fiscal->valor / 100));
            $this->total += $this->valor_nota_fiscal;
        }

        if (!empty($this->valor_frete)) {
            $this->total += $this->valor_frete;
        }
        
        if (!empty($this->servico)) {
            $this->total += $this->servico->total;
        }

        if (!empty($this->servico->desconto)) {
            $this->total -= $this->servico->desconto;
        }
        
    }

}
