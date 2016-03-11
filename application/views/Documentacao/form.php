<?php
$titulo = 'Documentação';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => $titulo]); ?>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <body style="background-color: coral">
        <?php $this->load->view('_include/menu'); ?>
        <div class="container">
            <div  class="alert alert-warning fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Olá! Você esta na documentação!</strong><br> Coloque o mouse sobre os botões para ver as funcionalidades
            </div>
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= $titulo ?></h3>
                </div>
                <div class="panel-body">
                    <?= form_open($action, 'class="form-horizontal" role="form"') ?>
                    <!--ID-->
                    <?= form_hidden('id', '') ?>

                    <!--Nome-->
                    <div class="form-group">
                        <?= form_label('Nome: ', 'nome', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('nome', 'Playstation 3', 'required id="nome" class="form-control" placeholder="Nome"') ?>
                        </div>
                    </div>
                    <!--Descrição-->
                    <div class="form-group">
                        <?= form_label('Descrição: ', 'descricao', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_textarea('descricao', 'Fabricante SONY', ' id="descricao" class="form-control" placeholder="Descricao"') ?>
                        </div>
                    </div>

                    <!--Valor-->
                    <div class="form-group">
                        <?= form_label('Valor: ', 'valor', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <input required step="0.01" min="0" value="600.00" name="valor" type="number" class="form-control" placeholder="Valor" />
                        </div>
                    </div>

                    <!--Botoes-->
                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-5">
                            <a href="<?= base_url('documentacao') ?>" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Cancela a ação voltando para página da lista de itens">Cancelar</a>
                            <a href="<?= base_url('documentacao') ?>" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Salva as alterações realizadas">Salvar</a>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
            <?php $this->load->view('_include/footer'); ?>
        </div>
    </body>
</html>