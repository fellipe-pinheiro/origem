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
                    <h3 class="panel-title"><?= $titulo ?></h3>
                </div>
                <?= form_open($action, 'role="form"') ?>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Dados do Cliente</h4>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                <!--ID-->
                                <?= form_hidden('id', $cliente->id) ?>
                                <!--Pessoa_tipo-->
                                <?php
                                $options = array(
                                    '0' => 'Pessoa Fisica',
                                    '1' => 'Pessoa Juridica',
                                );
                                ?>
                                <div class="form-group">
                                    <?= form_label('Pessoa_tipo: ', 'pessoa_tipo', array('class' => 'control-label')) ?>
                                    <?= form_dropdown('pessoa_tipo', $options, $cliente->pessoa_tipo, 'id="pessoa_tipo" class="form-control input-sm"') ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!--Nome/Razão social-->
                                <div class="form-group">
                                    <?= form_label('Nome: ', 'nome', array('class' => 'control-label')) ?>
                                    <?= form_input('nome', $cliente->nome, ' id="nome" placeholder="Nome / Razão Social" class="form-control input-sm"') ?>
                                </div>
                            </div>
                            <!--CPF/CNPJ-->
                            <div class="col-md-4">
                                <?= form_label('CNPJ/CPF: ', 'cnpj_cpf', array('class' => 'control-label')) ?>
                                <?= form_input('cnpj_cpf', $cliente->cnpj_cpf, ' id="cnpj_cpf" class="form-control input-sm" placeholder="CNPJ / CPF"') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <!--ie-->
                            <div class="col-md-3">
                                <?= form_label('Ie: ', 'ie', array('class' => 'control-label')) ?>
                                <?= form_input('ie', $cliente->ie, ' id="ie" placeholder="Inscrição estadual" class="form-control input-sm"') ?>
                            </div>
                            <!--im-->
                            <div class="col-md-3">
                                <?= form_label('Im: ', 'im', array('class' => 'control-label')) ?>
                                <?= form_input('im', $cliente->im, ' id="im" placeholder="Inscrição municipal" class="form-control input-sm"') ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Contato</h4>
                        </div>
                        <div class="form-group">
                            <!--Nome contato-->
                            <div class="col-md-3">
                                <?= form_label('Contato Nome: ', 'contato_nome', array('class' => 'control-label')) ?>
                                <?= form_input('contato_nome', $cliente->contato_nome, ' id="contato_nome" placeholder="Nome do contato" class="form-control input-sm"') ?>
                            </div>
                            <!--telefone-->
                            <div class="col-md-3">
                                <?= form_label('<span class="glyphicon glyphicon-phone-alt"></span> Telefone: ', 'telefone', array('class' => 'control-label')) ?>
                                <?= form_input('telefone', $cliente->telefone, ' id="telefone" class="form-control input-sm" placeholder="Telefone"') ?>
                            </div>
                            <!--celular-->
                            <div class="col-md-3">
                                <?= form_label('<span class="glyphicon glyphicon-phone"></span> Celular: ', 'celular', array('class' => 'control-label')) ?>
                                <?= form_input('celular', $cliente->celular, ' id="celular" class="form-control input-sm" placeholder="Celular"') ?>
                            </div>
                            <!--email-->
                            <div class="col-md-3">
                                <?= form_label('<span class="glyphicon glyphicon-envelope"></span> Email: ', 'email', array('class' => 'control-label')) ?>
                                <?= form_input('email', $cliente->email, ' id="email" class="form-control input-sm" placeholder="Email"') ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Endereço</h4>
                        </div>
                        <div class="form-group">
                            <!--logradouro-->
                            <div class="col-md-4">
                                <?= form_label('<span class="glyphicon glyphicon-road"></span> Logradouro: ', 'rua', array('class' => 'control-label')) ?>
                                <?= form_input('rua', $cliente->rua, ' id="rua" class="form-control input-sm" placeholder="Rua"') ?>
                            </div>
                            <!--numero-->
                            <div class="col-md-2">
                                <?= form_label('Numero: ', 'numero', array('class' => 'control-label')) ?>
                                <?= form_input('numero', $cliente->numero, ' id="numero" class="form-control input-sm" placeholder="Numero"') ?>
                            </div>
                            <!--complemento-->
                            <div class="col-md-2">
                                <?= form_label('Complemento: ', 'complemento', array('class' => 'control-label')) ?>
                                <?= form_input('complemento', $cliente->complemento, ' id="complemento" class="form-control input-sm" placeholder="Complemento"') ?>
                            </div>
                            <!--bairro-->
                            <div class="col-md-4">
                                <?= form_label('Bairro: ', 'bairro', array('class' => 'control-label')) ?>
                                <?= form_input('bairro', $cliente->bairro, ' id="bairro" class="form-control input-sm" placeholder="Bairro"') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <!--cep-->
                            <div class="col-md-4">
                                <?= form_label('Cep: ', 'cep', array('class' => 'control-label')) ?>
                                <?= form_input('cep', $cliente->cep, ' id="cep" class="form-control" placeholder="Cep"') ?>
                            </div>
                            <!--cidade-->
                            <div class="col-md-4">
                                <?= form_label('Cidade: ', 'cidade', array('class' => 'control-label')) ?>
                                <?= form_input('cidade', $cliente->cidade, ' id="cidade" class="form-control input-sm" placeholder="Cidade"') ?>
                            </div>
                            <!--estado-->
                            <div class="col-md-4">
                                <?= form_label('Estado: ', 'estado', array('class' => 'control-label')) ?>
                                <?= form_input('estado', $cliente->estado, ' id="estado" class="form-control" placeholder="Estado"') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <!--observacao-->
                            <div class="col-md-12">
                                <?= form_label('Observacao: ', 'observacao', array('class' => 'control-label')) ?>
                                <?= form_textarea('observacao', $cliente->observacao, ' id="observacao" class="form-control" placeholder="Observacao"') ?>
                            </div>
                        </div>
                    </div>
                    <!--Botoes-->
                    <div class="form-group">  
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <br>
                            <?= form_button('cancelar', 'Cancelar', 'class="btn btn-default" onClick="javascript:history.back(1)"') ?>
                            <?= form_submit('salvar', 'Salvar', 'class="btn btn-default"') ?>
                        </div>
                    </div>
                </div>
            </div>
            <?= form_close() ?>
        </div>
        <?php $this->load->view('_include/footer'); ?>
    </div>
</body>
</html>