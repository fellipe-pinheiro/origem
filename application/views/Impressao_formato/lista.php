<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => 'Home']); ?>
    <?php $this->load->view('_include/dataTable', ['controler' => 'impressao_formato']); ?>
    <body>
        <?php $this->load->view('_include/menu'); ?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Lista de Área de Impressões</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-primary inserir" href="<?= base_url('impressao_formato/form') ?>"><span class="glyphicon glyphicon-plus"></span></a>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-3 btn-group">
                            <a id="editar" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
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
                                        <th>Área</th>
                                        <th>Descrição</th>
                                    </tr>
                                </thead>
                                <tbody id="fbody">
                                    <?php foreach ($impressao_formato as $key => $value) { ?>
                                        <tr>
                                            <td class="hidden"><?= $value->id ?></td>
                                            <td><?= $value->nome ?></td>
                                            <td><?= $value->altura ?> x <?= $value->largura ?></td>
                                            <td><?= $value->descricao ?></td>
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