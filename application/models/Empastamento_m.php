<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empastamento_m extends CI_Model {

    var $nome;
    var $status;
    var $sub_total;
    var $valor_unitario;

    function __construct() {
        parent::__construct();
    }

    public function calcula_valor_unitario($valor, $quantidade_pedido) {
        return $valor / $quantidade_pedido;
    }

}
