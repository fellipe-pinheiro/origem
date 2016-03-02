<?php
if ($acao == 'inserir') {
    $action = 'cliente/inserir';
    $titulo = 'Inserir Cliente';
    $id = '';
    $cliente = new Cliente_m();
} elseif ($acao == 'editar') {
    $action = 'cliente/editar';
    $titulo = 'Editar Cliente';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => 'Home']); ?>
    <body>
        <?php $this->load->view('_include/menu'); ?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= $titulo?></h3>
                </div>
                <div class="panel-body">
                    <?= form_open($action, 'class="form-horizontal" role="form"') ?>
                    <!--ID-->
                    <?= form_hidden('id', $cliente->id) ?>

                    <!--Nome-->
                    <div class="form-group">
                        <?= form_label('Nome: ', 'nome', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('nome', $cliente->nome, ' id="nome" class="form-control" placeholder="Nome"') ?>
                        </div>
                    </div>    
                    <!--Cnpj_cpf-->
                    <div class="form-group">
                        <?= form_label('Cnpj_cpf: ', 'cnpj_cpf', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('cnpj_cpf', $cliente->cnpj_cpf, ' id="cnpj_cpf" class="form-control" placeholder="Cnpj_cpf"') ?>
                        </div>
                    </div>
                    <!--Pessoa_tipo-->
                    <div class="form-group">
                        <?= form_label('Pessoa_tipo: ', 'pessoa_tipo', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('pessoa_tipo', $cliente->pessoa_tipo, ' id="pessoa_tipo" class="form-control" placeholder="Pessoa_tipo"') ?>
                        </div>
                    </div>    
                    <!--Email-->
                    <div class="form-group">
                        <?= form_label('Email: ', 'email', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('email', $cliente->email, ' id="email" class="form-control" placeholder="Email"') ?>
                        </div>
                    </div>    
                    <!--Telefone-->
                    <div class="form-group">
                        <?= form_label('Telefone: ', 'telefone', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('telefone', $cliente->telefone, ' id="telefone" class="form-control" placeholder="Telefone"') ?>
                        </div>
                    </div>    
                    <!--Celular-->
                    <div class="form-group">
                        <?= form_label('Celular: ', 'celular', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('celular', $cliente->celular, ' id="celular" class="form-control" placeholder="Celular"') ?>
                        </div>
                    </div>
                    <!--Rua-->
                    <div class="form-group">
                        <?= form_label('Rua: ', 'rua', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('rua', $cliente->rua, ' id="rua" class="form-control" placeholder="Rua"') ?>
                        </div>
                    </div>
                    <!--Numero-->
                    <div class="form-group">
                        <?= form_label('Numero: ', 'numero', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('numero', $cliente->numero, ' id="numero" class="form-control" placeholder="Numero"') ?>
                        </div>
                    </div>    
                    <!--Complemento-->
                    <div class="form-group">
                        <?= form_label('Complemento: ', 'complemento', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('complemento', $cliente->complemento, ' id="complemento" class="form-control" placeholder="Complemento"') ?>
                        </div>
                    </div>    
                    <!--Bairro-->
                    <div class="form-group">
                        <?= form_label('Bairro: ', 'bairro', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('bairro', $cliente->bairro, ' id="bairro" class="form-control" placeholder="Bairro"') ?>
                        </div>
                    </div>    
                    <!--Cidade-->
                    <div class="form-group">
                        <?= form_label('Cidade: ', 'cidade', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('cidade', $cliente->cidade, ' id="cidade" class="form-control" placeholder="Cidade"') ?>
                        </div>
                    </div>    
                    <!--Estado-->
                    <div class="form-group">
                        <?= form_label('Estado: ', 'estado', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('estado', $cliente->estado, ' id="estado" class="form-control" placeholder="Estado"') ?>
                        </div>
                    </div>    
                    <!--Cep-->
                    <div class="form-group">
                        <?= form_label('Cep: ', 'cep', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('cep', $cliente->cep, ' id="cep" class="form-control" placeholder="Cep"') ?>
                        </div>
                    </div>        
                    <!--Ie-->
                    <div class="form-group">
                        <?= form_label('Ie: ', 'ie', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('ie', $cliente->ie, ' id="ie" class="form-control" placeholder="Ie"') ?>
                        </div>
                    </div>    
                    <!--Im-->
                    <div class="form-group">
                        <?= form_label('Im: ', 'im', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('im', $cliente->im, ' id="im" class="form-control" placeholder="Im"') ?>
                        </div>
                    </div>    
                    <!--Observacao-->
                    <div class="form-group">
                        <?= form_label('Observacao: ', 'observacao', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('observacao', $cliente->observacao, ' id="observacao" class="form-control" placeholder="Observacao"') ?>
                        </div>
                    </div>
                    <!--Botoes-->
                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-5">
                            <?= form_button('cancelar', 'Cancelar', 'class="btn btn-default" onClick="javascript:history.back(1)"') ?>
                            <?= form_submit('salvar', 'Salvar', 'class="btn btn-default"') ?>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
            <?php $this->load->view('_include/footer'); ?>
        </div>
    </body>
</html>