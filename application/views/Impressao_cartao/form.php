<?php
if ($acao == 'inserir') {
    $action = 'impressao_cartao/inserir';
    $titulo = 'Inserir Impressão cartão';
    $id = '';
    $impressao_cartao = new Impressao_cartao_m();
    $impressao_cartao->impressao_formato = new Impressao_formato_m();
} elseif ($acao == 'editar') {
    $action = 'impressao_cartao/editar';
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
                    <?= form_hidden('id', $impressao_cartao->id) ?>

                    <!--Nome-->
                    <div class="form-group">
                        <?= form_label('Nome: ', 'nome', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('nome', $impressao_cartao->nome, 'autofocus required id="nome" class="form-control" placeholder="Nome"') ?>
                        </div>
                    </div>

                    <!--valor_100-->
                    <div class="form-group">
                        <?= form_label('Valor 100: ', 'valor_100', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('valor_100', $impressao_cartao->valor_100, 'required id="valor_100" class="form-control" placeholder="valor para 100 impressões"') ?>
                        </div>
                    </div>

                    <!--valor_500-->
                    <div class="form-group">
                        <?= form_label('Valor 500: ', 'valor_500', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('valor_500', $impressao_cartao->valor_500, 'required id="valor_500" class="form-control" placeholder="valor para 500 impressões"') ?>
                        </div>
                    </div>

                    <!--valor_1000-->
                    <div class="form-group">
                        <?= form_label('Valor 1000: ', 'valor_1000', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('valor_1000', $impressao_cartao->valor_1000, 'required id="valor_1000" class="form-control" placeholder="valor para 1000 impressões"') ?>
                        </div>
                    </div>

                    <!--Impressao Formato-->
                    <div class="form-group">
                        <?= form_label('Impressao Formato: ', 'impressao_formato', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?php
                            $lista = array();
                            foreach ($impressao_formato as $key => $value) {
                                $lista[$value->id] = $value->altura . 'x' . $value->largura;
                            }
                            print form_dropdown('impressao_formato', $lista, $impressao_cartao->impressao_formato->id, 'required id="valor" class="form-control" placeholder="Valor"');
                            ?>
                        </div>
                    </div>

                    <!--Descricao-->
                    <div class="form-group">
                        <?= form_label('Descrição: ', 'descricao', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_textarea('descricao', $impressao_cartao->descricao, ' id="descricao" class="form-control" placeholder="Descrição"') ?>
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