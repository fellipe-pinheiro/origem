<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => 'Home']); ?>
    <?php $this->load->view('_include/dataTable', ['controler' => 'papel']); ?>
    <body>
        <?php $this->load->view('_include/menu'); ?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Lista de Papeis </h3>
                </div>
                <div class="panel-body">
                    <?php $this->load->view('_include/mensagem_crud'); ?>
                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-success" href="<?= base_url('papel/form') ?>"><span class="glyphicon glyphicon-plus"></span></a>
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
                            <table class="table display compact table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="hidden">ID</th>
                                        <th>Nome</th>
                                        <th>Gramatura</th>
                                        <th>Altura (mm)</th>
                                        <th>Largura (mm)</th>
                                        <th>Descrição</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody id="fbody">
                                    <?php foreach ($papel as $key => $value) { ?>
                                    <tr class="text-uppercase">
                                            <td class="hidden"><?= $value->id ?></td>
                                            <td><?= $value->nome ?></td>
                                            <td><?= $value->gramatura ?></td>
                                            <td><?= $value->altura ?></td>
                                            <td><?= $value->largura ?></td>
                                            <td><?= $value->descricao ?></td>
                                            <td>R$ <?= number_format($value->valor,2,',', '.' ) ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('_include/footer'); ?>
        </div>
    </body>
</html>