<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => 'Orçamentos']); ?>
    <script type="text/javascript">
        $(document).ready(function () {

        });
        function addCliente() {
            var parametros = {
                id: $("#cliente_id_panel").val(),
                nome: $("#cliente_nome").val(),
                cnpj_cpf: $("#cliente_cnpj_cpf").val(),
                email: $("#cliente_email").val()
            };
            var url;

            if ($("#cliente_id_panel").val().length == 0) {
                url = "<?= base_url("cliente/inserir_modal") ?>";
            } else {
                url = "<?= base_url("cliente/editar_modal") ?>";
            }

            $.ajax({
                type: "POST",
                url: url,
                data: parametros,
                success: function (retorno) {

                    $("#cliente_id_panel").val(retorno);
                    $("#cliente_nome_panel").text($("#cliente_nome").val());
                    $("#cliente_cnpj_cpf_panel").text($("#cliente_cnpj_cpf").val());
                    $("#cliente_email_panel").text($("#cliente_email").val());

                    $('#modal_cliente').modal('hide');
                },
                error: function (response) {
                    console.log(response);
                    alert('Erro ao salvar cliente! ');
                }
            });
        }
    </script>
    <body>
        <?php $this->load->view('_include/menu'); ?>
        <div class="container">

            <div class="panel-heading">
                <h3 class="panel-title"><b>Novo Orçamento</b></h3>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title"><b>Cliente</b></h3>
                            </div>
                            <div class="panel-body">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_cliente">
                                    <span class="glyphicon glyphicon-plus"></span> Clientes
                                </button><br>
                                <input type="hidden" name="cliente_id" id="cliente_id_panel">

                                <?= form_label('Nome: ', '', array('class' => 'control-label')) ?>
                                <br><span id="cliente_nome_panel"></span><br>
                                <?= form_label('CPF / CNPJ: ', '', array('class' => 'control-label')) ?>
                                <br><span id="cliente_cnpj_cpf_panel"></span><br>
                                <?= form_label('E-mail: ', '', array('class' => 'control-label')) ?>
                                <br><span id="cliente_email_panel"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title"><b>Produto / Serviços</b></h3>
                            </div>
                            <div class="panel-body">
                                <?= anchor(base_url('cartao'),'<span class="glyphicon glyphicon-plus"></span>  Cartão','class="btn btn-success btn-sm"') ?>
                                <?= anchor(base_url('servico'),'<span class="glyphicon glyphicon-plus"></span>  Serviço','class="btn btn-success btn-sm"') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title"><b>Outros</b></h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><b>Entrega</b></p>
                                        <div class="radio">
                                            <label><input type="radio" name="motoboy">Sem Motoboy</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="motoboy">Com Motoboy</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p><b>Nota Fiscal</b></p>
                                        <div class="radio">
                                            <label><input type="radio" name="nota_fiscal">Sem Nota</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="nota_fiscal">Nota Venda</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="nota_fiscal">Nota Serviço</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title"><b>Itens</b></h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Item</th>
                                                <th>Descrição</th>
                                                <th>Qtd</th>
                                                <th>Unitário</th>
                                                <th>Sub-Total</th>
                                                <th>Editar</th>
                                                <th>Excluir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Cartão de Visita</td>
                                                <td>Laminado + Impressão Alto Relevo 1x0</td>
                                                <td>100</td>
                                                <td>R$ 1,40</td>
                                                <td>R$ 140,00</td>
                                                <td><button class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                <td><button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Cartão de Visita Duplo</td>
                                                <td>Verniz + Impressão Alto Relevo 2x0</td>
                                                <td>100</td>
                                                <td>R$ 1,10</td>
                                                <td>R$ 110,00</td>
                                                <td><button class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                <td><button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button></td>
                                            </tr>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><b>Total Parcial</b></td>
                                                <td>R$ 250,00</td>
                                                <td></td>
                                                <td></td>
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
        <?php $this->load->view('_include/footer'); ?>


        <!-- Modal -->
        <div class="modal fade" id="modal_cliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Cliente</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!--Nome-->
                            <div class="form-group">
                                <?= form_label('Nome: ', 'nome', array('class' => 'control-label col-sm-2')) ?>
                                <div class="col-sm-10">
                                    <?= form_input('nome', '', ' id="cliente_nome" class="form-control" placeholder="Nome"') ?>
                                </div>
                            </div>

                            <!--Cnpj_cpf-->
                            <div class="form-group">
                                <?= form_label('Cnpj_cpf: ', 'cnpj_cpf', array('class' => 'control-label col-sm-2')) ?>
                                <div class="col-sm-10">
                                    <?= form_input('cnpj_cpf', '', ' id="cliente_cnpj_cpf" class="form-control" placeholder="Cnpj_cpf"') ?>
                                </div>
                            </div>

                            <!--Email-->
                            <div class="form-group">
                                <?= form_label('Email: ', 'email', array('class' => 'control-label col-sm-2')) ?>
                                <div class="col-sm-10">
                                    <?= form_input('email', '', ' id="cliente_email" class="form-control" placeholder="Email"') ?>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary" onclick="addCliente()">Salvar alterações</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>