<!DOCTYPE html>
<html lang="pt-br">
    <?php
    $this->load->view('_include/head', ['titulo' => 'Orçamentos']);
     $this->load->view('_include/js-lista', ['crud' => 'Orçamento']);
    ?>
    <body>
        <?php $this->load->view('_include/menu'); ?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Lista de Orçamentos</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <?= form_input('', '', ' id="txtPesquisar" class="form-control" placeholder="Pesquisar"') ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Cliente</th>
                                        <th>CNPJ/CPF</th>
                                        <th>Email</th>
                                        <th>Data</th>
                                        <th>Valor</th>
                                        <th colspan="2">Ações</th>
                                    </tr>
                                </thead>
                                <tbody id="fbody">
                                    <?php foreach ($lista_orcamento as $key => $value) { ?>
                                        <tr>
                                            <td><?= $value['id'] ?></td>
                                            <td><?= $value['cliente_nome']?></td>
                                            <td><?= $value['cnpj_cpf'] ?></td>
                                            <td><?= $value['email'] ?></td>
                                            <td><?= $value['data'] ?></td>
                                            <td><?= $value['valor'] ?></td>
                                            <td style="width: 46px;"><a class="btn btn-primary editar" href="<?= base_url("Orcamento/editar/{$value['id']}") ?>">Editar</a></td>
                                            <td style="width: 46px;"><a class="btn btn-danger deletar" href="<?= base_url("Orcamento/gerar_pdf/{$value['id']}") ?>">PDF</a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('_include/footer'); ?>
    </body>
</html>