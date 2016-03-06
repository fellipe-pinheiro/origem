<?php
if ($acao == 'inserir') {
    $action = 'fotolito/inserir';
    $titulo = 'Inserir Fotolito';
    $id = '';
    $desabilitar_select = "";
    $fotolito = new Fotolito_m();
    $fotolito->impressao_formato = new Impressao_formato_m();
} elseif ($acao == 'editar') {
    $action = 'fotolito/editar';
    $titulo = 'Editar Fotolito';
    $desabilitar_select = '$("#impressao_formato").prop("disabled", true);';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => $titulo]); ?>
    <script type="text/javascript">
        $(document).ready(function () {
        });
    </script>
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
                    <?= form_hidden('id', $fotolito->id.set_value('id')) ?>

                    <!--Impressao Formato-->
                    <div class="form-group">
                        <?= form_label('Área Impressão: ', 'impressao_formato', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <select autofocus required name="impressao_formato" id="impressao_formato" class="form-control" >
                                <option disabled selected>Selecione</option>
                                <?php foreach ($impressao_formato as $key => $value) { ?>
                                    <option value="<?= $value->id ?>" <?php
                                    if ($fotolito->impressao_formato->id . set_value('impressao_formato') == $value->id) {
                                        print 'selected';
                                    }
                                    ?>><?= $value->altura . ' x ' . $value->largura ?></option>
                                        <?php } ?>
                            </select>
                        </div>
                        <?= form_error('impressao_formato') ?>
                    </div>

                    <!--Descrição-->
                    <div class="form-group">
                        <?= form_label('Descricao: ', 'descricao', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_textarea('descricao', $fotolito->descricao . set_value('descricao'), ' id="descricao" class="form-control" placeholder="Breve descrição se necessário"') ?>
                        </div>
                        <?= form_error('descricao') ?>
                    </div>

                    <!--Valor-->
                    <div class="form-group">
                        <?= form_label('Valor: ', 'valor', array('class' => 'control-label col-sm-2')) ?>
                        <div class="col-sm-5">
                            <?= form_input('valor', $fotolito->valor . set_value('valor'), 'required min="0" step="0.01" id="valor" class="form-control" placeholder="Valor"') ?>
                        </div>
                        <?= form_error('valor') ?>
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