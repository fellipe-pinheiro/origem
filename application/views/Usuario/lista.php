<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => 'Usuário']); ?>
    <?php $this->load->view('_include/dataTable', ['controler' => 'usuario']); ?>
    <?php $this->load->view('_include/menu'); ?>
    <script>
        $(document).ready(function () {
            $("#msg").fadeOut(5000);
        });
    </script>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Lista de Usuarios</h3>
            </div>
            <div class="panel-body">
                <?php
                if (!empty($_GET['type'])) {
                    if($_GET['type']=='sucesso'){
                        $classe = 'success';
                        $strong = 'Successo!';
                        $msg = 'Operação realizada com sucesso!';
                    }  else {
                        $classe = 'danger';
                        $strong = 'Erro!';
                        $msg = 'Não foi possível realizar esta operação!';
                    }
                    ?>
                    <div id="msg" class="alert alert-<?= $classe ?> fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><?=$strong?></strong> <?=$msg?>
                    </div>
                    <?php
                }
                ?>
                <div class="row">
                    <div class="col-md-3">
                        <a class="btn btn-default" href="<?= base_url('usuario/form') ?>"><span class="glyphicon glyphicon-plus"></span></a>
                    </div>
                    <div class="col-md-7">
                    </div>
                    <div class="col-md-2">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Ações
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a id="editar" href="#"><span class="glyphicon glyphicon-pencil"></span> Editar</a></li>
                                <li><a id="reset_password" href="#"><span class="glyphicon glyphicon-refresh"></span> Renovar Senha</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a id="deletar" href="#"><span class="glyphicon glyphicon-trash"></span> Deletar</a></li>
                            </ul>
                        </div>
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
                                        <td><?= empty($value->senha) ? '<span class="glyphicon glyphicon-remove"></span>' : '<span class="glyphicon glyphicon-ok"></span>'; ?></td>
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