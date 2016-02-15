<?php
if ($acao == 'inserir') {
    $action = 'fotolito/inserir';
    $titulo = 'Inserir Fotolito';
    $id = '';
    $fotolito = new Fotolito_m();
} elseif ($acao == 'editar') {
    $action = 'fotolito/editar';
    $titulo = 'Editar Fotolito';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => $titulo]); ?>
    <body>
        <?php $this->load->view('_include/menu'); ?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= $titulo ?></h3>
                </div>
                <div class="panel-body">
                    <?= form_open($action, 'class="form-horizontal" role="form"') ?>
                    <!--ID-->
                    <?= form_hidden('id', $fotolito->id) ?>

                    <!--Altura-->
                    <div class="form-group">
                        <?= form_label('Altura: ', 'altura', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('altura', $fotolito->altura, ' id="altura" class="form-control" placeholder="Altura"') ?>
                        </div>
                    </div>
                    
                    <!--Largura-->
                    <div class="form-group">
                        <?= form_label('Largura: ', 'largura', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('largura', $fotolito->largura, ' id="largura" class="form-control" placeholder="Largura"') ?>
                        </div>
                    </div>

                    <!--Descrição-->
                    <div class="form-group">
                        <?= form_label('Descricao: ', 'descricao', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_textarea('descricao', $fotolito->descricao, ' id="descricao" class="form-control" placeholder="Breve descrição se necessário"') ?>
                        </div>
                    </div>
                    
                    <!--Valor-->
                    <div class="form-group">
                        <?= form_label('Valor: ', 'valor', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('valor', $fotolito->valor, ' id="valor" class="form-control" placeholder="Valor"') ?>
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