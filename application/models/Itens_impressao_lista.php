<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Itens_impressao_lista extends Impressao_m {
    var $id;
    var $valor_unitario;
    var $sub_total;
    var $impressao;
    var $servico;
    
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Impressao_m');
    }
    
    public function listar($id = '') {
        if (!empty($id)) {
            $result = $this->db->get_where('itens_impressao', array('id' => $id));
        } else {
            $result = $this->db->get('itens_impressao');
        }
        $itens_impressao_lista = $this->Itens_impressao_lista->_changeToObject($result->result_array());

        return $impressao_lista;
    }
    
    
    public function inserir(Itens_impressao_lista $impressao) {
        if (!empty($impressao)) {
            if ($this->db->insert('impressao', $impressao)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
}
