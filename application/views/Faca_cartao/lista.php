<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => 'Faca Cartão']); ?>
    <?php $this->load->view('_include/dataTable', ['controler' => 'faca_cartao']); ?>
    <body>
        <?php $this->load->view('_include/menu'); ?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Lista de faca para cartão</h3>
                </div>
                <div class="panel-body">
                    <?php $this->load->view('_include/mensagem_crud'); ?>
                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-default inserir" href="<?= base_url('faca_cartao/form') ?>"><span class="glyphicon glyphicon-plus"></span></a>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-3 btn-group">
                            <a id="editar" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                            <a id="deletar" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Deletar</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table display compact table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="hidden">ID</th>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody id="fbody">
                                    <?php foreach ($faca_cartao as $key => $value) { ?>
                                        <tr>
                                            <td class="hidden"><?= $value->id ?></td>
                                            <td><?= $value->nome ?></td>
                                            <td><?= $value->descricao ?></td>
                                            <td>R$ <?= number_format($value->valor, 2, ',','.')?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6">
                                            <ul class="pager" id="">
                                                <?php (!empty($paginacao)) ? print $paginacao : ''; ?>
                                            </ul>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('_include/footer'); ?>
        </div>
    </body>
</html>