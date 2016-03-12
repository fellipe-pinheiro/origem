<?php
if ($acao == 'inserir') {
    $action = 'impressao_formato/inserir';
    $titulo = 'Inserir Área Impressão';
    $id = '';
    $impressao_formato = new Impressao_formato_m();
} elseif ($acao == 'editar') {
    $action = 'impressao_formato/editar';
    $titulo = 'Editar Área Impressão';
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
                    <?= form_hidden('id', $impressao_formato->id) ?>

                    <!--Altura-->
                    <div class="form-group">
                        <?= form_label('Altura (mm): ', 'altura', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <input name="altura" value="<?= $impressao_formato->altura ?>" required type="number" min="0" step="1" id="altura" class="form-control" placeholder="Digite a altura em milimetros">
                        </div>
                    </div>

                    <!--Largura-->
                    <div class="form-group">
                        <?= form_label('Largura (mm): ', 'largura', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <input name="largura" value="<?= $impressao_formato->largura ?>" required type="number" min="0" step="1" id="largura" class="form-control" placeholder="Digite a largura em milimetros">            
                        </div>
                    </div>

                    <!--Descricao-->
                    <div class="form-group">
                        <?= form_label('Descricao: ', 'descricao', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_textarea('descricao', $impressao_formato->descricao, ' id="descricao" class="form-control" placeholder="Nome"') ?>
                        </div>
                    </div>

                    <!--Botoes-->
                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-5">
                            <?= anchor(base_url('impressao_formato'), 'Cancelar', 'class="btn btn-default"') ?>
                            <?= form_submit('salvar', 'Salvar', 'class="btn btn-success"') ?>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
            <?php $this->load->view('_include/footer'); ?>
        </div>
    </body>
</html>