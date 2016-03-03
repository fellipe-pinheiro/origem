<?php
if ($acao == 'inserir') {
    $action = 'laminacao/inserir';
    $titulo = 'Inserir laminação';
    $id = '';
    $laminacao = new Laminacao_m();
} elseif ($acao == 'editar') {
    $action = 'laminacao/editar';
    $titulo = 'Editar laminação';
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
                    <?= form_hidden('id', $laminacao->id) ?>

                    <!--Nome-->
                    <div class="form-group">
                        <?= form_label('Nome: ', 'nome', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('nome', $laminacao->nome, 'autofocus id="nome" class="form-control" placeholder="Nome"') ?>
                        </div>
                    </div>
                    
                    <!--Descricao-->
                    <div class="form-group">
                        <?= form_label('Descrição: ', 'descricao', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_textarea('descricao', $laminacao->descricao, 'required id="descricao" class="form-control" placeholder="Descrição"') ?>
                        </div>
                    </div>
                    
                    <!--Valor-->
                    <div class="form-group">
                        <?= form_label('Valor: ', 'valor', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('valor', $laminacao->valor, 'required min="0" step="0.01" id="valor" class="form-control" placeholder="Valor"') ?>
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