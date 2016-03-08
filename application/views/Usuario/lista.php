<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => 'Home']); ?>
    <?php $this->load->view('_include/dataTable', ['controler' => 'usuario']); ?>
    <body>
        <?php $this->load->view('_include/menu'); ?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Lista de Usuarios</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-success" href="<?= base_url('usuario/form') ?>"><span class="glyphicon glyphicon-plus"></span></a>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-3 btn-group">
                            <button id="editar" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Editar</button>
                            <button id="deletar" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Deletar</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>login</th>
                                        <th>Senha</th>
                                    </tr>
                                </thead>
                                <tbody id="fbody">
                                    <?php foreach ($usuario as $key => $value) { ?>
                                        <tr>
                                            <td><?= $value->id ?></td>
                                            <td><?= $value->nome ?></td>
                                            <td><?= $value->login ?></td>
                                            <td><?= empty($value->senha)? '<span class="glyphicon glyphicon-remove"></span>' : '<span class="glyphicon glyphicon-ok"></span>' ; ?></td>
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