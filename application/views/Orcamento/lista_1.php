<!DOCTYPE html>
<html lang="pt-br">
    <?php
    $this->load->view('_include/head', ['titulo' => 'Orçamentos']);
    $this->load->view('_include/js-lista', ['crud' => 'Orçamento']);
    ?>
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
    <?php $this->load->view('_include/menu'); ?>
    <body>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Lista de Orçamentos</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="tabela" class="display table table-hover"width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Cliente</th>
                                        <th>CNPJ/CPF</th>
                                        <th>Email</th>
                                        <th>Data</th>
                                        <th>Valor</th>
                                        <th>Açoes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($lista_orcamento as $key => $value) { ?>
                                        <tr>
                                            <td><?= $value['id'] ?></td>
                                            <td><?= $value['cliente_nome'] ?></td>
                                            <td><?= $value['cnpj_cpf'] ?></td>
                                            <td><?= $value['email'] ?></td>
                                            <td><?= $value['data'] ?></td>
                                            <td>R$ <?= $value['valor'] ?></td>
                                            <td data-class-name="priority" >
                                                <a class="btn btn-primary editar" href="<?= base_url("Orcamento/editar/{$value['id']}") ?>">Editar</a>
                                                <a class="btn btn-danger" target="_blank" href="<?= base_url("Orcamento/pdf/{$value['id']}") ?>">PDF</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php $this->load->view('_include/footer'); ?>
</html>
