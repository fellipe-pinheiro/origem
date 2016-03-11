<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => 'Documentação']); ?>
    <link rel="stylesheet" href="<?= base_url("assets/css/dataTables.bootstrap.min.css"); ?>" />
    <script type="text/javascript" src="<?= base_url("assets/js/jquery.dataTables.js"); ?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/dataTables.bootstrap.min.js"); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
            var table = $('table').dataTable({
                "language": {
                    "url": "<?= base_url("assets/idioma/dataTable-pt.json") ?>"
                }
            });

            $('table tbody').on('click', 'tr', function () {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                }
                else {
                    table.$('tr.active').removeClass('active');
                    $(this).addClass('active');
                }
            });
            $('#deletar').click(function () {
                if ($('table tbody tr.active td').eq(0).text() != '') {
                    var id = $('table tbody tr.active td').eq(0).text();
                    var nome = $('table tbody tr.active td').eq(1).text();
                    if (confirm("O item: " + nome + " sera apagado!")) {
                        window.location.replace("<?= base_url("documentacao?type=sucesso") ?>");
                    }
                }
            });
            $('#editar').click(function () {
                if ($('table tbody tr.active td').eq(0).text() != '') {
                    var id = $('table tbody tr.active td').eq(0).text();
                    window.location.replace("<?= base_url("documentacao/form") ?>/" + id);
                }
            });
        });
    </script>
    <body style="background-color: coral">
        <?php $this->load->view('_include/menu'); ?>
        <div class="container">
            <div  class="alert alert-warning fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Olá! Você esta na documentação!</strong><br> Coloque o mouse sobre os botões para ver as funcionalidades
            </div>
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Documentação
                        <span style="float: right" class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="left" title="Clique aqui para legenda" onclick="$($('#documentacao').modal())"></span>
                    </h3>
                </div>
                <div class="panel-body">
                    <?php $this->load->view('_include/mensagem_crud'); ?>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="<?= base_url('documentacao/form') ?>" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Clique aqui para adicionar um item" href="#"><span class="glyphicon glyphicon-plus"></span></a>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-3 btn-group">
                            <a id="editar" href="#" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Clique na linha que deseja editar e depois no botão editar"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                            <a id="deletar" href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Clique na linha que deseja deletar e depois no botão deletar"><span class="glyphicon glyphicon-trash"></span> Deletar</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table display compact table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody id="fbody">
                                    <tr>
                                        <td>Nome do produto</td>
                                        <td>Descrição do produto</td>
                                        <td>R$ 0,00</td>
                                    </tr>
                                    <tr>
                                        <td>Playstation 3</td>
                                        <td>Fabricante SONY</td>
                                        <td>R$ 600,00</td>
                                    </tr>
                                    <tr>
                                        <td>X-Box 360</td>
                                        <td>Fabricante Microsoft</td>
                                        <td>R$ 800,00</td>
                                    </tr>
                                    <tr>
                                        <td>Nintendo Wii</td>
                                        <td>Fabricante Nintendo</td>
                                        <td>R$ 700,00</td>
                                    </tr>
                                    <tr>
                                        <td>Mega Drive</td>
                                        <td>Fabricante Sega</td>
                                        <td>R$ 700,00</td>
                                    </tr>
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
    <!-- Documentação -->
    <div class="modal fade" id="documentacao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Documentação</h4>
                </div>
                <div class="modal-body">
                    <button class="btn btn-default"><span class="glyphicon glyphicon-plus"></span></button> Adiciona um item
                    <hr>
                    <button class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Editar</button> Para editar, clique sobre a linha que deseja fazer alguma alteração e depois no botão Editar
                    <hr>
                    <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Deletar</button> Para deletar, clique sobre a linha que deseja excluir e depois no botão Deletar
                    <hr>
                    Pesquisar: <input type="text"> Para pesquisar, digite uma palavra. Acentos são considerados!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</html>