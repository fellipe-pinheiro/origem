<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Code extends CI_Controller {

    function index() {
        $arr = [
            'id',
            'nome',
            'numero',
            'complemento',
            'bairro',
            'cidade',
            'estado',
            'cep',
            'cnpj_cpf',
            'ie',
            'im',
            'pessoa_tipo',
            'email',
            'telefone',
            'celular',
            'observacao'];
        
foreach ($arr as $value) {
$vl = ucfirst($value);
$str = <<<"EOD"
<!--$vl-->
<div class="form-group">
<?= form_label('$vl: ', '$value', array('class' => 'control-label col-sm-2')) ?>
<div class="col-sm-5">
<?= form_input('$value', \$cliente['$value'], ' id="$value" class="form-control" placeholder="$vl"') ?>
</div>
</div>
EOD;
    print $str;
}
    }

}
?>
