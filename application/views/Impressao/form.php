<?php
if ($acao == 'inserir') {
    $action = 'impressao/inserir';
    $titulo = 'Inserir impressao';
    $id = '';
    $impressao = new Impressao_m();
    $impressao->impressao_formato = new Impressao_formato_m();
} elseif ($acao == 'editar') {
    $action = 'impressao/editar';
    $titulo = 'Editar Impressão';
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
                    <?= form_hidden('id', $impressao->id) ?>

                    <!--Nome-->
                    <div class="form-group">
                        <?= form_label('Nome: ', 'nome', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('nome', $impressao->nome, 'autofocus required id="nome" class="form-control" placeholder="Nome"') ?>
                        </div>
                    </div>

                    <!--Impressao Formato-->
                    <div class="form-group">
                        <?= form_label('Área Impressão: ', 'impressao_formato', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?php
                            $lista = array();
                            foreach ($impressao_formato as $key => $value) {
                                $lista[$value->id] = $value->altura . 'x' . $value->largura;
                            }
                            print form_dropdown('impressao_formato', $lista, $impressao->impressao_formato->id, ' id="valor" class="form-control" placeholder="Valor"');
                            ?>
                        </div>
                    </div>

                    <!--Descricao-->
                    <div class="form-group">
                        <?= form_label('Descrição: ', 'descricao', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_textarea('descricao', $impressao->descricao, ' id="descricao" class="form-control" placeholder="Descrição"') ?>
                        </div>
                    </div>

                    <!--Valor-->
                    <div class="form-group">
                        <?= form_label('Valor: ', 'valor', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <input name="valor" value="<?= $impressao->valor ?>" type="number" required min="0" step="0.01" id="valor" class="form-control" placeholder="Valor">
                        </div>
                    </div>

                    <!--Botoes-->
                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-5">
                            <?= anchor(base_url('impressao'), 'Cancelar', 'class="btn btn-default"') ?>
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