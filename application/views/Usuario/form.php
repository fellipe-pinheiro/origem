<?php
if ($acao == 'inserir') {
    $action = 'usuario/inserir';
    $titulo = 'Inserir Usuario';
    $id = '';
    $usuario = new Usuario_m();
} elseif ($acao == 'editar') {
    $action = 'usuario/editar';
    $titulo = 'Editar Usuario';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => $titulo]); ?>
    <style type="text/css">
        .erro{
            color: red;
        }
    </style>
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
                    <?= form_hidden('id', $usuario->id) ?>

                    <!--Nome-->
                    <div class="form-group">
                        <?= form_label('Nome: ', 'nome', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('nome', $usuario->nome.set_value('nome'), ' id="nome" class="form-control" placeholder="Nome" autofocus') ?>
                        </div>
                        <?= form_error('nome')?>
                    </div>
                    <!--Descricao-->
                    <div class="form-group">
                        <?= form_label('Login: ', 'login', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('login', $usuario->login.set_value('nome'), ' id="login" class="form-control" placeholder="Login"') ?>
                        </div>
                        <?= form_error('login')?>
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