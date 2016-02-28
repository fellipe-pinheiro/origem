<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('usuario_logado')) {
    $CI = get_instance();
    $CI->load->model('Usuario_m');
    
    function usuario_logado() {
        if (empty($_SESSION['usuario']->id)) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}

if (!function_exists('login_necessario')) {
    $CI = get_instance();
    $CI->load->model('Usuario_m');
    
    function login_necessario() {
        if (empty($_SESSION['usuario']->id)) {
            redirect(base_url("Login"));
        } else {
            return TRUE;
        }
    }

}

if (!function_exists('formata_preco')) {

    function formata_preco($valor) {
        $negativo = false;
        $preco = "";
        $valor = intval(trim($valor));
        if ($valor < 0) {
            $negativo = true;
            $valor = abs($valor);
        }
        $valor = strrev($valor);
        while (strlen($valor) < 3) {
            $valor .= "0";
        }
        for ($i = 0; $i < strlen($valor); $i++) {
            if ($i == 2) {
                $preco .= ",";
            }
            if (($i <> 2) AND ( ($i + 1) % 3 == 0)) {
                $preco .= ".";
            }
            $preco .= substr($valor, $i, 1);
        }
        $preco = strrev($preco);
        return ($negativo ? "-" : "") . $preco;
    }

}