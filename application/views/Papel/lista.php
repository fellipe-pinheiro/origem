<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => 'Home']); ?>
    <?php $this->load->view('_include/js-lista', ['crud' => 'Papel']); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#tabela').DataTable({
                "language": {
                    "search": "Pesquisar:",
                    "lengthMenu": "Mostar _MENU_ linhas por pagina",
                    "zeroRecords": "Nada encontrado - refaça a busca",
                    "info": "Mostrando a pagina _PAGE_ de _PAGES_",
                    "paginate": {
                        "first": "Primeira",
                        "last": "Ultima",
                        "next": "Proxima",
                        "previous": "Anterior"
                    }
                }
            });
        });
    </script>
    <body>
        <?php $this->load->view('_include/menu'); ?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Lista de Papeis </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="tabela" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Gramatura</th>
                                        <th>Altura (mm)</th>
                                        <th>Largura (mm)</th>
                                        <th>Descrição</th>
                                        <th>Valor</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody id="fbody">
                                    <?php foreach ($papel as $key => $value) { ?>
                                        <tr>
                                            <td><?= $value->id ?></td>
                                            <td><?= $value->nome ?></td>
                                            <td><?= $value->gramatura ?></td>
                                            <td><?= $value->altura ?></td>
                                            <td><?= $value->largura ?></td>
                                            <td><?= $value->descricao ?></td>
                                            <td><?= $value->valor ?></td>
                                            <td>
                                                <a class="btn btn-primary editar" href="<?= base_url("papel/form/{$value->id}") ?>">Editar</a>
                                                <a class="btn btn-danger deletar" href="<?= base_url("papel/deletar/{$value->id}") ?>">Deletar</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="8">
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