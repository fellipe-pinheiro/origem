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
    var $empastamento;

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
            $data = array(
                'id' => $papel->id,
                'nome' => $papel->nome,
                'gramatura' => $papel->gramatura,
                'altura' => $papel->altura,
                'largura' => $papel->largura,
                'descricao' => $papel->descricao,
                'valor' => str_replace(',', '.', $papel->valor)
            );
            if ($this->db->insert('papel', $data)) {
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
            $data = array(
                'id' => $papel->id,
                'nome' => $papel->nome,
                'gramatura' => $papel->gramatura,
                'altura' => $papel->altura,
                'largura' => $papel->largura,
                'descricao' => $papel->descricao,
                'valor' => str_replace(',', '.', $papel->valor)
            );
            $this->db->where('id', $papel->id);
            if ($this->db->update('papel', $data)) {
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
        return ($this->valor * $quantidade) / $quantidade_pedido;
    }

}
