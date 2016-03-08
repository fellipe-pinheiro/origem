<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => 'Clientes']); ?>
    <?php $this->load->view('_include/dataTable', ['controler' => 'cliente']); ?>
    <body>
        <?php $this->load->view('_include/menu'); ?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Lista Cliente</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-primary" href="<?= base_url('cliente/form') ?>"><span class="glyphicon glyphicon-plus"></span></a>
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
                            <div class="table-responsive">
                                <table class="table display compact table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>CNPJ / CPF</th>
                                            <th>Contato</th>
                                            <th>Telefone</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody id="fbody">
                                        <?php foreach ($cliente as $key => $value) { ?>
                                            <tr>
                                                <td><?= $value->id ?></td>
                                                <td><?= $value->nome ?></td>
                                                <td><?= $value->cnpj_cpf ?></td>
                                                <td><?= $value->contato_nome ?></td>
                                                <td><?= $value->telefone ?></td>
                                                <td><?= $value->email ?></td>
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
            </div>
            <?php $this->load->view('_include/footer'); ?>
        </div>
    </body>
</html>