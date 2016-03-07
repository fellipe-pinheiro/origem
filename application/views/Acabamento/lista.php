<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => 'Home']); ?>
    <script type="text/javascript" src="//cdn.datatables.net/plug-ins/1.10.11/type-detection/date-uk.js"></script>
    <link rel="stylesheet" href="<?= base_url("assets/css/dataTables.bootstrap.min.css"); ?>" />
    <script type="text/javascript" src="<?= base_url("assets/js/jquery.dataTables.js"); ?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/dataTables.bootstrap.min.js"); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function () {
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
                    var href = $("input[id=input_deletar]").val();
                    if (confirm("O item " + nome + " sera apagado!")) {
                        //window.location.replace("<?= base_url('acabamento/deletar') ?>/" + id);
                        window.location.assign(href + '/' + id);
                    }
                }
            });
            $('#editar').click(function () {
                var href = $("input[id=input_editar]").val();
                if ($('table tbody tr.active td').eq(0).text() != '') {
                    var id = $('table tbody tr.active td').eq(0).text();
                    //window.location.replace("<?= base_url('acabamento/form') ?>/" + id);
                    window.location.assign(href + '/' + id);
                }
            });
        });
    </script>
    <style type="text/css">
        tr.active{
            font-weight: bolder;
        }
    </style>
    <body>
        <?php $this->load->view('_include/menu'); ?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Lista de Acabamento</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-primary" href="<?= base_url('acabamento/form') ?>"><span class="glyphicon glyphicon-plus"></span></a>
                        </div>
                        <div class="col-md-6">
                        </div>
                            <input id="input_editar" type="hidden" value="acabamento/form">
                            <input id="input_deletar" type="hidden" value="acabamento/deletar">
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
                                        <th>Descrição</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody id="fbody">
                                    <?php foreach ($acabamento as $key => $value) { ?>
                                        <tr>
                                            <td class="hidden"><?= $value->id ?></td>
                                            <td><?= $value->nome ?></td>
                                            <td><?= $value->descricao ?></td>
                                            <td>R$ <?= number_format($value->valor, 2, ",", ".") ?></td>
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