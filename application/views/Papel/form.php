<?php
if ($acao == 'inserir') {
    $action = 'papel/inserir';
    $titulo = 'Inserir papel';
    $id = '';
    $papel = new Papel_m();
} elseif ($acao == 'editar') {
    $action = 'papel/editar';
    $titulo = 'Editar papel';
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
                    <?= form_hidden('id', $papel->id) ?>

                    <!--Nome-->
                    <div class="form-group">
                        <?= form_label('Nome: ', 'nome', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('nome', $papel->nome, 'autofocus id="nome" class="form-control" placeholder="Nome"') ?>
                        </div>
                    </div>

                    <!--Gramatura-->
                    <div class="form-group">
                        <?= form_label('Gramatura: ', 'gramatura', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('gramatura', $papel->gramatura, ' id="gramatura" class="form-control" placeholder="Gramatura"') ?>
                        </div>
                    </div>

                    <!--Altura-->
                    <div class="form-group">
                        <?= form_label('Altura: ', 'altura', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('altura', $papel->altura, ' id="altura" class="form-control" placeholder="Altura"') ?>
                        </div>
                    </div>
                    <!--Altura-->
                    <div class="form-group">
                        <?= form_label('Largura: ', 'largura', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('largura', $papel->largura, ' id="largura" class="form-control" placeholder="Largura"') ?>
                        </div>
                    </div>

                    <!--Descricao-->
                    <div class="form-group">
                        <?= form_label('Descrição: ', 'descricao', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_textarea('descricao', $papel->descricao, ' id="descricao" class="form-control" placeholder="Descrição"') ?>
                        </div>
                    </div>

                    <!--Valor-->
                    <div class="form-group">
                        <?= form_label('Valor: ', 'valor', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <input required type="number" min="0" name="valor" value="<?= str_replace('.', ',', $papel->valor)?>"  id="valor" class="form-control" placeholder="Valor" />
                            <?= form_input('', str_replace('.', ',', $papel->valor), 'required type="number" id="valor" class="form-control" placeholder="Valor"') ?>
                        </div>
                    </div>

                    <!--Botoes-->
                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-5">
                            <?= anchor(base_url('papel'), 'Cancelar', 'class="btn btn-default"') ?>
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