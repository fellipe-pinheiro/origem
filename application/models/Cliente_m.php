<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_m extends CI_Model {

    var $id;
    var $nome;
    var $pessoa_tipo;
    var $email;
    var $contato_nome;
    var $celular;
    var $telefone;
    var $cnpj_cpf;
    var $ie;
    var $im;
    var $rua;
    var $numero;
    var $complemento;
    var $bairro;
    var $cidade;
    var $estado;
    var $cep;
    var $observacao;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function total_linhas() {
        return $this->db->get('cliente')->num_rows();
    }

    public function listar($id = '') {

        if (!empty($id)) {
            $result = $this->db->get_where('cliente', array('id' => $id));
        } else {
            $result = $this->db->get('cliente');
        }

        return $this->Cliente_m->_changeToObject($result->result_array());
    }

    public function inserir(Cliente_m $cliente) {
        if (!empty($cliente)) {
            if ($this->db->insert('cliente', $cliente)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function editar(Cliente_m $cliente) {
        if (!empty($cliente->id)) {
            $this->db->where('id', $cliente->id);
            if ($this->db->update('cliente', $cliente)) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function deletar($id = '') {
        if (!empty($id)) {
            $this->db->where('id', $id);
            if ($this->db->delete('cliente')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function _changeToObject($result_db = '') {
        $cliente_lista = array();


        foreach ($result_db as $key => $value) {
            $cliente = new Cliente_m();
            $cliente->id = $value['id'];
            $cliente->nome = $value['nome'];
            $cliente->email = $value['email'];
            $cliente->contato_nome = $value['contato_nome'];
            $cliente->telefone = $value['telefone'];
            $cliente->celular = $value['celular'];
            $cliente->pessoa_tipo = $value['pessoa_tipo'];
            $cliente->cnpj_cpf = $value['cnpj_cpf'];
            $cliente->ie = $value['ie'];
            $cliente->im = $value['im'];
            $cliente->rua = $value['rua'];
            $cliente->numero = $value['numero'];
            $cliente->complemento = $value['complemento'];
            $cliente->bairro = $value['bairro'];
            $cliente->cidade = $value['cidade'];
            $cliente->estado = $value['estado'];
            $cliente->cep = $value['cep'];
            $cliente->observacao = $value['observacao'];

            $cliente_lista[] = $cliente;
        }

        return $cliente_lista;
    }

}
