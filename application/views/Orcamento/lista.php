<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => 'Orçamentos']); ?>
    <?php $this->load->view('_include/dataTable', ['controler' => 'orcamento']); ?>
    <script type="text/javascript">
        function open_status_modal(id) {
            $("#md_status").modal();
            $("#form_status").prop('action', '<?= base_url('orcamento/status') ?>/' + id);
        }
    </script>
    <?php $this->load->view('_include/menu'); ?>
    <body>
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#aprovado">Aprovado</a></li>
                <li><a data-toggle="tab" href="#aguardando">Aguardando</a></li>
                <li><a data-toggle="tab" href="#cancelado">Cancelado</a></li>
            </ul>

            <div class="tab-content">
                <div id="aprovado" class="tab-pane fade in active">
                    <br>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Lista de Orçamentos</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table display compact table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Cliente</th>
                                                <th>Contato</th>
                                                <th>CNPJ/CPF</th>
                                                <th>Email</th>
                                                <th>Data</th>
                                                <th>Valor</th>
                                                <th>Status</th>
                                                <th>Açoes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($lista_orcamento as $key => $value) { ?>
                                                <?php
                                                if ($value['status'] == '1') {
                                                    $status = 'Aprovado';
                                                    $anchor_class = 'btn btn-success btn-block';
                                                    $span_class = 'glyphicon glyphicon-ok';
                                                    ?>
                                                    <tr>
                                                        <td><?= $value['id'] ?></td>
                                                        <td><?= $value['cliente_nome'] ?></td>
                                                        <td><?= $value['contato_nome'] ?></td>
                                                        <td><?= $value['cnpj_cpf'] ?></td>
                                                        <td><?= $value['email'] ?></td>
                                                        <td><?= $value['data'] ?></td>
                                                        <td>R$ <?= $value['valor'] ?></td>
                                                        <td><span class="<?= $span_class ?>"></span><?= $status ?></td>
                                                        <td data-class-name="priority" >
                                                            <!-- Single button -->
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Ação <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <a id="btn_status" href="#" onclick="open_status_modal(<?= $value['id'] ?>)">
                                                                            <span class="glyphicon glyphicon-refresh"></span> Status
                                                                        </a>
                                                                    </li>
                                                                    <li><a href="<?= base_url("Orcamento/editar/{$value['id']}") ?>"><span class="glyphicon glyphicon-pencil"></span> Editar</a></li>
                                                                    <li role="separator" class="divider"></li>
                                                                    <li><a class="" target="_blank" href="<?= base_url("Orcamento/pdf/{$value['id']}") ?>"><span class="glyphicon glyphicon-file"></span>PDF</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Cliente</th>
                                                <th>Contato</th>
                                                <th>CNPJ/CPF</th>
                                                <th>Email</th>
                                                <th>Data</th>
                                                <th>Valor</th>
                                                <th>Status</th>
                                                <th>Açoes</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="aguardando" class="tab-pane fade">
                    <br>   
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">Lista de Orçamentos</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table display compact table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Cliente</th>
                                                <th>Contato</th>
                                                <th>CNPJ/CPF</th>
                                                <th>Email</th>
                                                <th>Data</th>
                                                <th>Valor</th>
                                                <th>Status</th>
                                                <th>Açoes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($lista_orcamento as $key => $value) { ?>
                                                <?php
                                                if ($value['status'] == '0') {
                                                    $status = 'Aguardando';
                                                    $anchor_class = 'btn btn-warning btn-block';
                                                    $span_class = 'glyphicon glyphicon-time';
                                                    ?>
                                                    <tr>
                                                        <td><?= $value['id'] ?></td>
                                                        <td><?= $value['cliente_nome'] ?></td>
                                                        <td><?= $value['contato_nome'] ?></td>
                                                        <td><?= $value['cnpj_cpf'] ?></td>
                                                        <td><?= $value['email'] ?></td>
                                                        <td><?= $value['data'] ?></td>
                                                        <td>R$ <?= $value['valor'] ?></td>
                                                        <td><span class="<?= $span_class ?>"></span><?= $status ?></td>
                                                        <td data-class-name="priority" >
                                                            <!-- Single button -->
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Ação <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <a id="btn_status" href="#" onclick="open_status_modal(<?= $value['id'] ?>)">
                                                                            <span class="glyphicon glyphicon-refresh"></span> Status
                                                                        </a>
                                                                    </li>
                                                                    <li><a class="editar" href="<?= base_url("Orcamento/editar/{$value['id']}") ?>"><span class="glyphicon glyphicon-pencil"></span> Editar</a></li>
                                                                    <li role="separator" class="divider"></li>
                                                                    <li><a class="" target="_blank" href="<?= base_url("Orcamento/pdf/{$value['id']}") ?>"><span class="glyphicon glyphicon-file"></span>PDF</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Cliente</th>
                                                <th>Contato</th>
                                                <th>CNPJ/CPF</th>
                                                <th>Email</th>
                                                <th>Data</th>
                                                <th>Valor</th>
                                                <th>Status</th>
                                                <th>Açoes</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cancelado" class="tab-pane fade">
                    <br>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Lista de Orçamentos</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table display compact table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Cliente</th>
                                                <th>Contato</th>
                                                <th>CNPJ/CPF</th>
                                                <th>Email</th>
                                                <th>Data</th>
                                                <th>Valor</th>
                                                <th>Status</th>
                                                <th>Açoes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($lista_orcamento as $key => $value) { ?>
                                                <?php
                                                if ($value['status'] == '2') {
                                                    $status = 'Cancelado';
                                                    $anchor_class = 'btn btn-default btn-block';
                                                    $span_class = 'glyphicon glyphicon-remove';
                                                    ?>
                                                    <tr>
                                                        <td><?= $value['id'] ?></td>
                                                        <td><?= $value['cliente_nome'] ?></td>
                                                        <td><?= $value['contato_nome'] ?></td>
                                                        <td><?= $value['cnpj_cpf'] ?></td>
                                                        <td><?= $value['email'] ?></td>
                                                        <td><?= $value['data'] ?></td>
                                                        <td>R$ <?= $value['valor'] ?></td>
                                                        <td><span class="<?= $span_class ?>"></span><?=$status?></td>
                                                        <td data-class-name="priority" >
                                                            <!-- Single button -->
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Ação <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <a id="btn_status" href="#" onclick="open_status_modal(<?= $value['id'] ?>)">
                                                                            <span class="glyphicon glyphicon-refresh"></span> Status
                                                                        </a>
                                                                    </li>
                                                                    <li><a class="editar" href="<?= base_url("Orcamento/editar/{$value['id']}") ?>"><span class="glyphicon glyphicon-pencil"></span> Editar</a></li>
                                                                    <li role="separator" class="divider"></li>
                                                                    <li><a class="" target="_blank" href="<?= base_url("Orcamento/pdf/{$value['id']}") ?>"><span class="glyphicon glyphicon-file"></span>PDF</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Cliente</th>
                                                <th>Contato</th>
                                                <th>CNPJ/CPF</th>
                                                <th>Email</th>
                                                <th>Data</th>
                                                <th>Valor</th>
                                                <th>Status</th>
                                                <th>Açoes</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>
    <?php $this->load->view('_include/footer'); ?>
    <!-- Modal Status -->
    <div class="modal fade" id="md_status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Status</h4>
                </div>
                <form id="form_status" action="#" method="POST">
                    <div class="modal-body">
                        <select required name="status" class="form-control">
                            <option value="0">Aguardando</option>
                            <option value="1">Aprovado</option>
                            <option value="2">Cancelado</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</html>
