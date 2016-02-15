<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Papel_m extends CI_Model {

    //Variaveis para CRUD do Papel
    var $id;
    var $nome;
    var $gramatura;
    var $altura;
    var $largura;
    var $descricao;
    var $valor;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function total_linhas() {
        return $this->db->get('papel')->num_rows();
    }

    public function listar($id = '') {

        if (!empty($id)) {
            $result = $this->db->get_where('papel', array('id' => $id));
        } else {
            $result = $this->db->get('papel');
        }

        return $this->Papel_m->_changeToObject($result->result_array());
    }

    public function inserir(Papel_m $papel) {
        if (!empty($papel)) {
            if ($this->db->insert('papel', $papel)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function editar(Papel_m $papel) {
        if (!empty($papel->id)) {
            $this->db->where('id', $papel->id);
            if ($this->db->update('papel', $papel)) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function deletar($id = '') {
        if (!empty($id)) {
            $this->db->where('id', $id);
            if ($this->db->delete('papel')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function _changeToObject($result_db = '') {
        $papel_lista = array();


        foreach ($result_db as $key => $value) {
            $papel = new Papel_m();
            $papel->id = $value['id'];
            $papel->nome = $value['nome'];
            $papel->gramatura = $value['gramatura'];
            $papel->altura = $value['altura'];
            $papel->largura = $value['largura'];
            $papel->descricao = $value['descricao'];
            $papel->valor = $value['valor'];

            $papel_lista[] = $papel;
        }

        return $papel_lista;
    }

    //restorna o valor do papel unitário
    public function calcula_valor_unitario($quantidade, $quantidade_pedido) {
//        var_dump($this->valor);
//        var_dump($quantidade);
//        var_dump($quantidade_pedido);
//        die();
        return ($this->valor * $quantidade) / $quantidade_pedido;
    }

}
