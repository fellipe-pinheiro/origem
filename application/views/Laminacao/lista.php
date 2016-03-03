<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => 'Home']); ?>
    <?php $this->load->view('_include/js-lista', ['crud' => 'Laminação']); ?>
    <body>
        <?php $this->load->view('_include/menu'); ?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Lista de laminação</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <?= form_input('', '', 'autofocus id="txtPesquisar" class="form-control" placeholder="Pesquisar"') ?>
                        </div>
                        <div class="col-md-3">
                            <a class="btn btn-primary inserir" href="<?= base_url('laminacao/form') ?>">Nova laminacao</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                        <th>Valor</th>
                                        <th colspan="2">Ações</th>
                                    </tr>
                                </thead>
                                <tbody id="fbody">
                                    <?php foreach ($laminacao as $key => $value) { ?>
                                        <tr>
                                            <td><?= $value->id ?></td>
                                            <td><?= $value->nome ?></td>
                                            <td><?= $value->descricao ?></td>
                                            <td><?= $value->valor ?></td>
                                            <td style="width: 46px;"><a class="btn btn-primary editar" href="<?= base_url("laminacao/form/{$value->id}") ?>">Editar</a></td>
                                            <td style="width: 46px;"><a class="btn btn-danger deletar" href="<?= base_url("laminacao/deletar/{$value->id}") ?>">Deletar</a></td>
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