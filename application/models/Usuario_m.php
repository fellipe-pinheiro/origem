<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_m extends CI_Model {

    var $id;
    var $nome;
    var $login;
    var $senha;

    function __construct($id = null, $nome = null, $login = null) {
        $this->id = $id;
        $this->nome = $nome;
        $this->login = $login;

        parent::__construct();
    }

    public function listar($id = '') {

        if (!empty($id)) {
            $result = $this->db->get_where('usuario', array('id' => $id));
        } else {
            $result = $this->db->get('usuario');
        }

        return $this->Usuario_m->_changeToObject($result->result_array());
    }

    public function inserir(Usuario_m $usuario) {
        if (!empty($usuario)) {
            if ($this->db->insert('Usuario', $usuario)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function editar(Usuario_m $usuario) {
        if (!empty($usuario->id)) {
            $this->db->where('id', $usuario->id);
            if ($this->db->update('Usuario', $usuario)) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function deletar($id = '') {
        if (!empty($id)) {
            $this->db->where('id', $id);
            if ($this->db->delete('usuario')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function _changeToObject($result_db = '') {
        $usuario_lista = array();


        foreach ($result_db as $key => $value) {
            $usuario = new Usuario_m();
            $usuario->id = $value['id'];
            $usuario->nome = $value['nome'];
            $usuario->login = $value['login'];
            empty($value['senha']) ? '' : $usuario->senha = true;

            $usuario_lista[] = $usuario;
        }

        return $usuario_lista;
    }

    public function gravar_senha($id = null, $senha = null) {
        if (!empty($id)) {
            $this->db->set('senha', sha1($senha));
            $this->db->where('id', $id);
            if ($this->db->update('usuario')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function buscar_usuario(Usuario_m $usuario) {
        $this->db->or_where('id', $usuario->id);
        $this->db->or_where('nome', $usuario->nome);
        $this->db->or_where('login', $usuario->login);
        $result = $this->db->get('usuario');
        return $this->Usuario_m->_changeToObject($result->result_array());
    }

    public function senha_correta($login = '', $senha = '') {
        $result = $this->db->get_where('usuario', ['login' => $login, 'senha' => sha1($senha)]);
        if ($result->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function existe_senha($login = '') {
        $result = $this->db->get_where('usuario', ['login' => $login, 'senha' => '']);
        if ($result->num_rows() == 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function existe_login($login = '') {
        $result = $this->db->get_where('usuario', ['login' => $login]);
        if ($result->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
