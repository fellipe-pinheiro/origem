<?php
//error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
$titulo = 'Serviço';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => $titulo]); ?>
    <!--CSS-->
    <style type="text/css">
        .btn_m{
            text-align: left;
        }
        .pnl{
            padding-left: 0px;
            padding-right: 0px;
        }
        .modal .modal-body {
            max-height: 470px;
            overflow-y: auto;
        }
    </style>    
    <!--JavaScript-->
    <script>
        $(document).ready(function () {
            // Filtrar Tabela
            $("#txtPesquisar").keyup(function () {
                var rows = $("#fbody").find("tr").hide();
                var data = this.value.split(" ");
                $.each(data, function (i, v) {
                    rows.filter(":contains('" + v.toLowerCase() + "')").show();
                });
            });

//            Mostrar modal do cliente
            $("#btn_criar_cliente").click(function () {
                $('#modal_cliente').modal('toggle');
                $('#modal_cliente_form').modal('toggle');
            });

//            Habilitar empastamento ao selecionar
            $('input[type=radio]').change(function () {
                var x = document.getElementById("empastamento_valor").disabled;
                if (x == true) {
                    document.getElementById("empastamento_valor").disabled = false;
                }
                else {
                    document.getElementById("empastamento_valor").disabled = true;
                }
            });

//            Envia nota fiscal para sessao
            $("#nota_fiscal").change(function () {
                var id = $("#nota_fiscal option:selected").val();
                window.location.href = "<?= base_url('Servico/nota_fiscal_sessao') ?>?id=" + id;
            });

//            Mostrar modal do frete para definir
            $("#frete").change(function () {
                var id = $("#frete option:selected").val();

                if (id == 0) {
                    $("#modal_frete_valor").modal();
                } else {
                    window.location.href = "<?= base_url('Servico/frete_sessao') ?>?id=" + id;
                }
            });

//            Selecionar os valores de frete
<?php if (!empty($_SESSION['orcamento']->frete)) { ?>
                $('#frete option[value="<?= $_SESSION['orcamento']->frete->id ?>"]').attr('selected', 'selected');
<?php } else { ?>
                $('#frete option[value="0"]').attr('selected', 'selected');
<?php } ?>

//              Selecionar os valores da nota fiscal
<?php if (!empty($_SESSION['orcamento']->nota_fiscal)) { ?>
                $('#nota_fiscal option[value="<?= $_SESSION['orcamento']->nota_fiscal->id ?>"]').attr('selected', 'selected');
<?php } ?>

            $("#md_btn_acabamento").click(function () {
                $('#md_acabamento_select option[value=""]').attr('selected', 'selected');
                $('#md_acabamento_qtd').val('');
            });
            $("#md_btn_laminacao").click(function () {
                $('#md_laminacao_select_laminacao option[value=""]').attr('selected', 'selected');
                $('#md_laminacao_select_qtd option[value=1]').attr('selected', 'selected');
                $('#md_laminacao_valor').val('');
            });
            $("#md_btn_colagem").click(function () {
                $('#md_colagem_valor').val('');
            });
        });
        function open_impressao_modal(posicao, idImpressao, qtd_cor_frente, qtd_cor_verso) {
<?php if ($_SESSION['orcamento']->servico->tipo == 'cartao') { ?>
                document.getElementById('form_impressao_cartao').action = ("servico/impressao_cartao_sessao_editar/" + posicao);
                //alert(posicao + " - " + idImpressao + " - " + qtd_cor_frente + " - " + qtd_cor_verso);
                $("#impressao_cartao_select option[value=" + idImpressao + "]").prop('selected', true);
                $('#impressao_cartao_qtd_cor_frente').val(qtd_cor_frente);
                $('#impressao_cartao_qtd_cor_verso').val(qtd_cor_verso);
                $('#impressao_cartao_btn_submit').text("Salvar");
                $('#myModal_impressao_cartao').modal('show');
<?php } elseif ($_SESSION['orcamento']->servico->tipo == 'servico') { ?>
                document.getElementById('form_impressao').action = "servico/impressao_sessao_editar/" + posicao;
                $('#myModal_impressao').modal('show');
<?php } ?>
        }
        function open_papel_modal(posicao) {
            document.getElementById('form_papel').action = "servico/papel_sessao_editar/" + posicao;
            $('#myModal_papel').modal('show');
        }
        function open_acabamento_modal(posicao, qtd, id) {
            $('#md_acabamento_select option[value=' + id + ']').attr('selected', 'selected');
            $('#md_acabamento_qtd').val(qtd);
            document.getElementById('form_acabamento').action = "servico/acabamento_sessao_editar/" + posicao;
            $('#myModal_acabamento').modal('show');
        }
        function open_faca_modal(posicao, idFaca) {
<?php if ($_SESSION['orcamento']->servico->tipo == 'cartao') { ?>
                document.getElementById('faca_cartao_form').action = "servico/faca_cartao_sessao_editar/" + posicao;
                $("#faca_cartao_select option[value=" + idFaca + "]").prop('selected', true);
                $('#impressao_cartao_btn_submit').text("Salvar");
                $('#myModal_faca_cartao').modal('show');
<?php } elseif ($_SESSION['orcamento']->servico->tipo == 'servico') { ?>
                document.getElementById('form_faca').action = "servico/faca_cartao_sessao_editar/" + posicao;
                $('#myModal_faca').modal('show');
<?php } ?>

        }
        function open_colagem_modal(posicao, valor) {
            $('#md_colagem_valor').val(valor);
            document.getElementById('form_colagem').action = "servico/colagem_sessao_editar/" + posicao;
            $('#myModal_colagem').modal('show');
        }
        function open_laminacao_modal(posicao, id, qtd, valor) {
            $('#md_laminacao_select_laminacao option[value=' + id + ']').attr('selected', 'selected');
            $('#md_laminacao_select_qtd option[value=' + qtd + ']').attr('selected', 'selected');
            $('#md_laminacao_valor').val(valor);
            document.getElementById('form_laminacao').action = "servico/laminacao_sessao_editar/" + posicao;
            $('#myModal_laminacao').modal('show');
        }
        function open_servico_modal() {
            document.getElementById('form_servico').action = "servico/editar_servico";
            $('#myModal_produto').modal('show');
        }
    </script>
    <!--Body-->
    <body>
        <?php $this->load->view('_include/menu'); ?>
        <div class="container">
            <div class="row">
                <div class="row">
                    <!--painel cliente-->
                    <div class="col-md-9">
                        <div class="panel panel-default pnl">
                            <div class="panel-heading">
                                <h3 class="panel-title">Cliente</h3>
                            </div>
                            <div class="panel-body">
                                <input type="hidden" name="cliente_id" id="cliente_id_panel">
                                <!-- Button trigger modal -->
                                <div class="col-md-2">
                                    <br>
                                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal_cliente">
                                        <span class="glyphicon glyphicon-plus"></span> Clientes
                                    </button>
                                </div>
                                <div class="col-md-3">
                                    <?= form_label('Nome: ', '', array('class' => 'control-label')) ?>
                                    <?= form_input('', $_SESSION['orcamento']->cliente->nome, 'disabled class="form-control input-sm"') ?>
                                </div>
                                <div class="col-md-3">
                                    <?= form_label('CPF / CNPJ:', '', array('class' => 'control-label')) ?>
                                    <?= form_input('', $_SESSION['orcamento']->cliente->cnpj_cpf, 'disabled class="form-control input-sm"') ?>
                                </div>
                                <div class="col-md-3">
                                    <?= form_label('E-mail:', '', array('class' => 'control-label')) ?>
                                    <?= form_input('', $_SESSION['orcamento']->cliente->email, 'disabled class="form-control input-sm"') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Acoes-->
                    <div class="col-md-3">
                        <div class="panel panel-default pnl">
                            <div class="panel-heading">
                                <h3 class="panel-title">Ações</h3>
                            </div>
                            <div class="panel-body">
                                <input type="hidden" name="cliente_id" id="cliente_id_panel">
                                <!-- Button trigger modal -->
                                <div class="col-md-12">
                                    <?php if (empty($_SESSION['orcamento']->servico->quantidade)) {
                                        ?>
                                        <a type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal_produto">
                                            <span class="glyphicon glyphicon-plus"></span> Novo
                                        </a>
                                    <?php } else { ?>
                                        <a class="btn btn-success btn-block btn-sm" >
                                            <span class="glyphicon glyphicon-ok"></span> Finalizar
                                        </a>
                                        <a href="<?= base_url('Servico/excluir_todos_servicos') ?>" class="btn btn-danger btn-block btn-sm">
                                            <span class="glyphicon glyphicon-trash"></span> Limpar Orcamento
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--painel Opcionais-->
                    <div class="col-md-3">
                        <div class="col-md-12 pnl">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Opcionais</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="frete">Tipo de frete:</label>
                                            <select name="frete" id="frete" class="form-control">
                                                <option selected disabled >Selecione</option>
                                                <option value="0" >Definir</option>
                                                <?php foreach ($frete as $value) { ?>
                                                    <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="nota_fiscal">Nota fiscal:</label>
                                            <select name="nota_fiscal" id="nota_fiscal" class="form-control">
                                                <option selected disabled >Selecione</option>
                                                <?php foreach ($nota_fiscal as $value) { ?>
                                                    <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Tabela do servico-->
                    <div class="col-md-9">
                        <div class="panel panel-default  pnl">
                            <div class="panel-heading">
                                <h3 class="panel-title"></h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <table class="table table-hover table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Produto</th>    
                                                <th>Qtd</th>    
                                                <th>Valor Unitário</th>    
                                                <th>Sub-Total</th>    
                                                <th style="max-width: 30px">Editar</th>   
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php ?>
                                                <td><?= $_SESSION['orcamento']->servico->tipo ?></td>
                                                <td><?= $_SESSION['orcamento']->servico->quantidade ?></td>
                                                <td>R$ <?= number_format($_SESSION['orcamento']->servico->valor_unitario, 2, ",", ".") ?> </td>
                                                <td>R$ <?= number_format($_SESSION['orcamento']->servico->total, 2, ",", ".") ?></td>
                                                <td><button onclick="open_servico_modal()" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                            </tr>
                                            <?php
                                            if (!empty($_SESSION['orcamento']->nota_fiscal)) {
                                                ?>
                                                <tr>
                                                    <td>Nota Fiscal</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>R$ <?= number_format($_SESSION['orcamento']->valor_nota_fiscal, 2, ",", ".") ?></td>
                                                    <td></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($_SESSION['orcamento']->valor_frete)) {
                                                ?>
                                                <tr>
                                                    <td>Frete</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>R$ <?= number_format($_SESSION['orcamento']->valor_frete, 2, ",", ".") ?> </td>
                                                    <td></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><b>Descontos</b></td>
                                                <td>R$ 
                                                    <?php
                                                    if ($_SESSION['orcamento']->servico->desconto == NULL) {
                                                        print '0,00';
                                                    } else {
                                                        print number_format($_SESSION['orcamento']->servico->desconto, 2, ",", ".");
                                                    }
                                                    ?>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><b>Total</b></td>
                                                <td>R$ <?= number_format($_SESSION['orcamento']->total, 2, ",", ".") ?></td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--tabela detalhes do servico-->
                    <div class="col-md-12">
                        <div class="panel panel-default  pnl">
                            <div class="panel-heading">
                                <h3 class="panel-title"></h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <?php if (!empty($_SESSION['orcamento']->servico->quantidade)) {
                                        ?>
                                        <div class="col-md-2">
                                            <button id="md_btn_papel" class="btn btn-default btn-block btn_m" data-toggle="modal" data-target="#myModal_papel">
                                                <span class="glyphicon glyphicon-plus"></span> Papel
                                            </button>
                                        </div>
                                        <div class="col-md-2">
                                            <button id="md_btn_acabamento" class="btn btn-default btn-block col-md-2 btn_m" data-toggle="modal" data-target="#myModal_acabamento">
                                                <span class="glyphicon glyphicon-plus"></span> Acabamento
                                            </button>
                                        </div>
                                        <div class="col-md-2">
                                            <button id="md_btn_laminacao" class="btn btn-default btn-block col-md-2 btn_m" data-toggle="modal" data-target="#myModal_laminacao">
                                                <span class="glyphicon glyphicon-plus"></span> Laminação
                                            </button>
                                        </div>
                                        <div class="col-md-2">
                                            <button  id="md_btn_colagem" class="btn btn-default btn-block col-md-2 btn_m" data-toggle="modal" data-target="#myModal_colagem">
                                                <span class="glyphicon glyphicon-plus"></span> Colagem
                                            </button>
                                        </div>
                                        <?php if ($_SESSION['orcamento']->servico->tipo == 'cartao') { ?>
                                            <div class="col-md-2">
                                                <button  id="md_btn_impressao_cartao" class="btn btn-default btn-block col-md-2 btn_m" data-toggle="modal" data-target="#myModal_impressao_cartao">
                                                    <span class="glyphicon glyphicon-plus"></span> Impressão
                                                </button>
                                            </div>
                                            <div class="col-md-2">
                                                <button id="md_btn_faca_cartao" class="btn btn-default btn-block col-md-2 btn_m" data-toggle="modal" data-target="#myModal_faca_cartao">
                                                    <span class="glyphicon glyphicon-plus"></span> Faca
                                                </button>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col-md-2">
                                                <button id="md_btn_impressao" class = "btn btn-default btn-block col-md-2 btn_m" data-toggle = "modal" data-target = "#modal_impressao_servico">
                                                    <span class = "glyphicon glyphicon-plus"></span> Impressão
                                                </button>
                                            </div>
                                            <div class="col-md-2">
                                                <button id="md_btn_faca" class = "btn btn-default btn-block col-md-2 btn_m" data-toggle = "modal" data-target = "#myModal_faca">
                                                    <span class = "glyphicon glyphicon-plus"></span> Faca
                                                </button>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <table class="table table-hover table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Serviço / Material</th>    
                                                <th>Descrição</th>    
                                                <th>Qtd</th>    
                                                <th>Valor Unitário</th>    
                                                <th>Sub-Total</th>    
                                                <th>Editar</th>    
                                                <th>Excluir</th>    
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($_SESSION['orcamento']->servico->papel)) {
                                                foreach ($_SESSION['orcamento']->servico->papel as $key => $papel) {
                                                    ?>
                                                    <tr>
                                                        <td>Papel</td>
                                                        <td><?= $papel->nome ?> =><?= $papel->quantidade ?> fls</td>
                                                        <td><?= $_SESSION['orcamento']->servico->quantidade ?></td>
                                                        <td>R$ <?= number_format($papel->valor_unitario, 3, ",", ".") ?></td>
                                                        <td>R$ <?= number_format($papel->sub_total, 2, ",", ".") ?></td>
                                                        <td><button onclick="open_papel_modal(<?= $key ?>, '<?= $papel->nome ?>')" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                        <td><a class="btn btn-danger btn-sm" href="<?= base_url("servico/papel_sessao_excluir/{$key}") ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                    </tr>
                                                    <?php
                                                    if ($papel->empastamento->status == TRUE) {
                                                        ?>
                                                        <tr>
                                                            <td>Empastamento</td>
                                                            <td><?= $papel->empastamento->nome ?> => <?= $papel->nome ?></td>
                                                            <td><?= $_SESSION['orcamento']->servico->quantidade ?></td>
                                                            <td>R$ <?= number_format($papel->empastamento->valor_unitario, 3, ",", ".") ?></td>
                                                            <td>R$ <?= number_format($papel->empastamento->sub_total, 2, ",", ".") ?></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                            <?php
                                            if (!empty($_SESSION['orcamento']->servico->impressao)) {
                                                foreach ($_SESSION['orcamento']->servico->impressao as $key => $impressao) {
                                                    ?>
                                                    <tr>
                                                        <td>Impressão</td>
                                                        <td><?= $impressao->nome ?> / <?= $impressao->impressao_formato->nome ?>: <?= $impressao->impressao_formato->altura ?>x<?= $impressao->impressao_formato->largura ?>
                                                            <?= ($_SESSION['orcamento']->servico->tipo == 'cartao') ? "Cor: " . $impressao->qtd_cor_frente . 'x' . $impressao->qtd_cor_verso : ''; ?>
                                                        </td>
                                                        <td><?= $_SESSION['orcamento']->servico->quantidade ?></td>
                                                        <td>R$ <?= number_format($impressao->valor_unitario, 3, ",", ".") ?></td>
                                                        <td>R$ <?= number_format($impressao->sub_total, 2, ",", ".") ?></td>
                                                        <?php if ($_SESSION['orcamento']->servico->tipo == 'cartao') { ?>
                                                            <td><button onclick="open_impressao_modal(<?= $key ?>, <?= $impressao->id ?>,<?= $impressao->qtd_cor_frente ?>,<?= $impressao->qtd_cor_verso ?>)" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                        <?php } else { ?>
                                                            <td><button onclick="open_impressao_modal(<?= $key ?>, <?= $impressao->id ?>, '', '')" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                        <?php } ?>
                                                        <td><a class="btn btn-danger btn-sm" href="<?= base_url("servico/impressao_sessao_excluir/{$key}") ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Fotolito</td>
                                                        <td><?= $impressao->impressao_formato->nome ?>: <?= $impressao->impressao_formato->altura ?>x<?= $impressao->impressao_formato->largura ?></td>
                                                        <td><?= $impressao->fotolito->quantidade ?></td>
                                                        <td>R$ <?= number_format($impressao->fotolito->valor_unitario, 2, ",", ".") ?></td>
                                                        <td>R$ <?= number_format($impressao->fotolito->sub_total, 2, ",", ".") ?></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <?php
                                            if (!empty($_SESSION['orcamento']->servico->acabamento)) {
                                                foreach ($_SESSION['orcamento']->servico->acabamento as $key => $acabamento) {
                                                    ?>
                                                    <tr>
                                                        <td>Acabamento</td>
                                                        <td><?= $acabamento->nome ?></td>
                                                        <td><?= $acabamento->quantidade ?></td>
                                                        <td>R$ <?= number_format($acabamento->valor_unitario, 2, ",", ".") ?></td>
                                                        <td>R$ <?= number_format($acabamento->sub_total, 2, ",", ".") ?></td>
                                                        <td><button onclick="open_acabamento_modal(<?= $key ?>, <?= $acabamento->quantidade ?>,<?= $acabamento->id ?>)" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                        <td><a class="btn btn-danger btn-sm" href="<?= base_url("servico/acabamento_sessao_excluir/{$key}") ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <?php
                                            if (!empty($_SESSION['orcamento']->servico->faca)) {
                                                foreach ($_SESSION['orcamento']->servico->faca as $key => $faca) {
                                                    ?>
                                                    <tr>
                                                        <td>Faca</td>
                                                        <?php if ($_SESSION['orcamento']->servico->tipo == 'servico') { ?>
                                                            <td><?= $faca->nome ?> : <?= $faca->altura ?> x <?= $faca->largura ?></td>

                                                        <?php } else { ?>
                                                            <td><?= $faca->nome ?></td>
                                                        <?php } ?>

                                                        <td><?= $faca->quantidade ?></td>
                                                        <?php if ($_SESSION['orcamento']->servico->tipo == 'servico') { ?>
                                                            <td>R$ <?= $faca->valor_faca ?></td>
                                                        <?php } else { ?>
                                                            <td>R$ <?= $faca->valor ?></td>
                                                        <?php } ?>
                                                        <td>R$ <?= $faca->sub_total ?></td>
                                                        <td><button onclick="open_faca_modal(<?= $key ?>, <?= $faca->id ?>)" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                        <td><a class="btn btn-danger btn-sm" href="<?= base_url("servico/faca_sessao_excluir/{$key}") ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <?php
                                            if (!empty($_SESSION['orcamento']->servico->laminacao)) {
                                                foreach ($_SESSION['orcamento']->servico->laminacao as $key => $laminacao) {
                                                    ?>
                                                    <tr>
                                                        <td>Laminação</td>
                                                        <td><?= $laminacao->nome ?></td>
                                                        <td><?= $_SESSION['orcamento']->servico->quantidade ?></td>
                                                        <td>R$ <?= number_format($laminacao->valor_unitario, 3, ",", ".") ?></td>
                                                        <td>R$ <?= number_format($laminacao->sub_total, 2, ",", ".") ?></td>
                                                        <td><button onclick="open_laminacao_modal(<?= $key ?>, <?= $laminacao->id ?>,<?= $laminacao->quantidade ?>,<?= $laminacao->sub_total ?>)" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                        <td><a class="btn btn-danger btn-sm" href="<?= base_url("servico/laminacao_sessao_excluir/{$key}") ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <?php
                                            if (!empty($_SESSION['orcamento']->servico->colagem)) {
                                                foreach ($_SESSION['orcamento']->servico->colagem as $key => $colagem) {
                                                    ?>
                                                    <tr>
                                                        <td>Colagem</td>
                                                        <td><?= $colagem->nome ?></td>
                                                        <td><?= $_SESSION['orcamento']->servico->quantidade ?></td>
                                                        <td>R$ <?= number_format($colagem->valor_unitario, 3, ",", ".") ?></td>
                                                        <td>R$ <?= number_format($colagem->sub_total, 2, ",", ".") ?></td>
                                                        <td><button onclick="open_colagem_modal(<?= $key ?>, '<?= $colagem->sub_total ?>')" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                        <td><a class="btn btn-danger btn-sm" href="<?= base_url("servico/colagem_sessao_excluir/{$key}") ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('_include/footer'); ?>

        <!-- Modal Frete valor -->
        <div class="modal fade" id="modal_frete_valor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Cliente</h4>
                    </div>
                    <?= form_open('Servico/frete_sessao_definir', 'class=""') ?>
                    <div class="modal-body">
                        <!--Valor-->
                        <?= form_label('Valor do Frete:', 'valor_frete') ?>
                        <?= form_input('valor_frete', '', ' id="valor_frete" class="form-control" placeholder="Valor do Frete"') ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-default">Salvar</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
        <!-- Modal Cliente Form -->
        <div class="modal fade" id="modal_cliente_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Cliente</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <?= form_open('Servico/cliente_session_criar', 'class="form-horizontal col-md-12" role="form"') ?>
                            <!--Nome-->
                            <div class="form-group">
                                <?= form_label('Nome: ', 'nome', array('class' => 'control-label col-sm-2')) ?>
                                <div class="col-sm-5">
                                    <?= form_input('nome', '', ' id="nome" class="form-control" placeholder="Nome"') ?>
                                </div>
                            </div>    <!--Numero-->
                            <div class="form-group">
                                <?= form_label('Numero: ', 'numero', array('class' => 'control-label col-sm-2')) ?>
                                <div class="col-sm-5">
                                    <?= form_input('numero', '', ' id="numero" class="form-control" placeholder="Numero"') ?>
                                </div>
                            </div>    <!--Complemento-->
                            <div class="form-group">
                                <?= form_label('Complemento: ', 'complemento', array('class' => 'control-label col-sm-2')) ?>
                                <div class="col-sm-5">
                                    <?= form_input('complemento', '', ' id="complemento" class="form-control" placeholder="Complemento"') ?>
                                </div>
                            </div>    <!--Bairro-->
                            <div class="form-group">
                                <?= form_label('Bairro: ', 'bairro', array('class' => 'control-label col-sm-2')) ?>
                                <div class="col-sm-5">
                                    <?= form_input('bairro', '', ' id="bairro" class="form-control" placeholder="Bairro"') ?>
                                </div>
                            </div>    <!--Cidade-->
                            <div class="form-group">
                                <?= form_label('Cidade: ', 'cidade', array('class' => 'control-label col-sm-2')) ?>
                                <div class="col-sm-5">
                                    <?= form_input('cidade', '', ' id="cidade" class="form-control" placeholder="Cidade"') ?>
                                </div>
                            </div>    <!--Estado-->
                            <div class="form-group">
                                <?= form_label('Estado: ', 'estado', array('class' => 'control-label col-sm-2')) ?>
                                <div class="col-sm-5">
                                    <?= form_input('estado', '', ' id="estado" class="form-control" placeholder="Estado"') ?>
                                </div>
                            </div>    <!--Cep-->
                            <div class="form-group">
                                <?= form_label('Cep: ', 'cep', array('class' => 'control-label col-sm-2')) ?>
                                <div class="col-sm-5">
                                    <?= form_input('cep', '', ' id="cep" class="form-control" placeholder="Cep"') ?>
                                </div>
                            </div>    <!--Cnpj_cpf-->
                            <div class="form-group">
                                <?= form_label('Cnpj_cpf: ', 'cnpj_cpf', array('class' => 'control-label col-sm-2')) ?>
                                <div class="col-sm-5">
                                    <?= form_input('cnpj_cpf', '', ' id="cnpj_cpf" class="form-control" placeholder="Cnpj_cpf"') ?>
                                </div>
                            </div>    <!--Ie-->
                            <div class="form-group">
                                <?= form_label('Ie: ', 'ie', array('class' => 'control-label col-sm-2')) ?>
                                <div class="col-sm-5">
                                    <?= form_input('ie', '', ' id="ie" class="form-control" placeholder="Ie"') ?>
                                </div>
                            </div>    <!--Im-->
                            <div class="form-group">
                                <?= form_label('Im: ', 'im', array('class' => 'control-label col-sm-2')) ?>
                                <div class="col-sm-5">
                                    <?= form_input('im', '', ' id="im" class="form-control" placeholder="Im"') ?>
                                </div>
                            </div>    <!--Pessoa_tipo-->
                            <div class="form-group">
                                <?= form_label('Pessoa_tipo: ', 'pessoa_tipo', array('class' => 'control-label col-sm-2')) ?>
                                <div class="col-sm-5">
                                    <?= form_input('pessoa_tipo', '', ' id="pessoa_tipo" class="form-control" placeholder="Pessoa_tipo"') ?>
                                </div>
                            </div>    <!--Email-->
                            <div class="form-group">
                                <?= form_label('Email: ', 'email', array('class' => 'control-label col-sm-2')) ?>
                                <div class="col-sm-5">
                                    <?= form_input('email', '', ' id="email" class="form-control" placeholder="Email"') ?>
                                </div>
                            </div>    <!--Telefone-->
                            <div class="form-group">
                                <?= form_label('Telefone: ', 'telefone', array('class' => 'control-label col-sm-2')) ?>
                                <div class="col-sm-5">
                                    <?= form_input('telefone', '', ' id="telefone" class="form-control" placeholder="Telefone"') ?>
                                </div>
                            </div>    <!--Celular-->
                            <div class="form-group">
                                <?= form_label('Celular: ', 'celular', array('class' => 'control-label col-sm-2')) ?>
                                <div class="col-sm-5">
                                    <?= form_input('celular', '', ' id="celular" class="form-control" placeholder="Celular"') ?>
                                </div>
                            </div>    <!--Observacao-->
                            <div class="form-group">
                                <?= form_label('Observacao: ', 'observacao', array('class' => 'control-label col-sm-2')) ?>
                                <div class="col-sm-5">
                                    <?= form_input('observacao', '', ' id="observacao" class="form-control" placeholder="Observacao"') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <input type="submit" class="btn btn-success" value="Salvar">
                    </div>
                    <?php form_close(); ?>
                </div>
            </div>
        </div>
        <!-- Modal Cliente lista -->
        <div class="modal fade" id="modal_cliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Cliente</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!--filtro-->
                            <div class="col-md-3">
                                <?= form_input('', '', ' id="txtPesquisar" class="" placeholder="Pesquisar"') ?>
                                <button id="btn_criar_cliente" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Novo</button>
                            </div>
                            <!--lista clientes-->
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Bairro</th>
                                        <th>cnpj_cpf</th>
                                        <th colspan="2">Ações</th>
                                    </tr>
                                </thead>
                                <tbody id="fbody">
                                    <?php foreach ($cliente_md as $key => $value) { ?>
                                        <tr>
                                            <td><?= $value->id ?></td>
                                            <td><?= $value->nome ?></td>
                                            <td><?= $value->bairro ?></td>
                                            <td><?= $value->cnpj_cpf ?></td>
                                            <td style="width: 46px;"><a class="btn btn-primary editar" href="<?= base_url("Servico/cliente_session_inserir/{$value->id}") ?>">Selecionar</a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Impressão -->
        <div class="modal fade" id="modal_impressao_servico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                    <form action="#" method="post">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                          ...
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
              </div>
            </div>
          </div>
        <!-- Modal Impressão cartao -->
        <div class="modal fade" id="myModal_impressao_cartao" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form id="form_impressao_cartao" action="<?= base_url('Servico/impressao_cartao_sessao_inserir') ?>" method="POST" class="form-horizontal" role="form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Impressão</h4>
                        </div>
                        <div class="modal-body">
                            <label for="impressao_cartao">Impressão:</label>
                            <select id="impressao_cartao_select" class="form-control" name="impressao_cartao">
                                <option value="">Selecione</option>
                                <?php
                                foreach ($impressao_cartao_md as $key => $value) {
                                    ?>
                                    <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <!--Quantidade Cor frente-->
                            <?= form_label('Qtd cores frente: ', 'qtd_cor_frente', array('class' => ' control-label')) ?>
                            <?= form_input('qtd_cor_frente', '', ' id="impressao_cartao_qtd_cor_frente" class="form-control" placeholder="Quantidade cores frente"') ?>

                            <!--Quantidade Cor verso-->
                            <?= form_label('Qtd cores verso: ', 'qtd_cor_verso', array('class' => ' control-label')) ?>
                            <?= form_input('qtd_cor_verso', '', ' id="impressao_cartao_qtd_cor_verso" class="form-control" placeholder="Quantidade cores verso"') ?>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button id="impressao_cartao_btn_submit" type="submit" class="btn btn-success" >Adicionar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal Papel -->
        <div class="modal fade" id="myModal_papel" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form id="form_papel" action="Servico/papel_sessao_inserir" method="POST" role="form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Papel</h4>
                        </div>
                        <div class="modal-body">
                            <label class="control-label" for="papel"> Papel:</label>
                            <div class="form-group">
                                <select id="form_papel_select" class="form-control" name="papel">
                                    <option value="">Selecione</option>
                                    <?php
                                    foreach ($papel_md as $key => $value) {
                                        ?>
                                        <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <label class="control-label" for="quantidade"> Quantidade:</label>
                            <input class="form-control" name="quantidade" value="" placeholder="Quantidade de papeis"><br>
                            <label class="control-label" for="empastamento"> Empastamento:</label>
                            <label class="checkbox-inline"><input id="empastamento" name="empastamento_status" type="radio" value="0" checked> NÃO</label>
                            <label class="checkbox-inline"><input id="empastamento" name="empastamento_status" type="radio" value="1"> SIM</label><br><br>
                            <label class="control-label" for="empastamento_valor"> Valor:</label>
                            <input class="form-control" id="empastamento_valor" name="empastamento_valor" type="text" value="" disabled="true" placeholder="Insira o valor do empastamento">
                            <input type="hidden" name="empastamento_nome" value="Empastamento">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button id="form_papel_acao" type="submit" class="btn btn-success" >Adicionar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal acabamento -->
        <div class="modal fade" id="myModal_acabamento" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form id="form_acabamento" action="Servico/acabamento_sessao_inserir" method="POST" role="form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Acabamento</h4>
                        </div>
                        <div class="modal-body">
                            <label class="control-label" for="acabamento"> Acabamento:</label>
                            <div class="form-group">
                                <select id="md_acabamento_select" class="form-control" name="acabamento">
                                    <option value="" disabled selected>Selecione</option>
                                    <?php
                                    foreach ($acabamento_md as $key => $value) {
                                        ?>
                                        <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <label class="control-label" for="quantidade"> Quantidade:</label>
                            <input class="form-control" id="md_acabamento_qtd" name="quantidade" value="" placeholder="Quantidade de acabamento">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button id="form_acabamento_acao" type="submit" class="btn btn-success" >Adicionar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal faca -->
        <div class="modal fade" id="myModal_faca" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form id="form_faca" action="Servico/faca_sessao_inserir" method="POST" role="form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Faca</h4>
                        </div>
                        <div class="modal-body">
                            <label class="control-label" for="acabamento"> Faca:</label>
                            <div class="form-group">
                                <select id="form_faca_select" class="form-control" name="faca">
                                    <option value="">Selecione</option>
                                    <?php
                                    foreach ($faca_md as $key => $value) {
                                        ?>
                                        <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <label class="control-label" for="altura"> Altura:</label>
                            <input class="form-control" name="altura" value="" placeholder="Insira a altura da Faca">
                            <label class="control-label" for="largura"> Largura:</label>
                            <input class="form-control" name="largura" value="" placeholder="Insira a largura da Faca">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button id="form_faca_acao" type="submit" class="btn btn-success" >Adicionar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal faca cartao-->
        <div class="modal fade" id="myModal_faca_cartao" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form id="faca_cartao_form" action="Servico/faca_cartao_sessao_inserir" method="POST" role="form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Faca cartão</h4>
                        </div>
                        <div class="modal-body">
                            <label class="control-label" for="acabamento"> Faca:</label>
                            <div class="form-group">
                                <select id="faca_cartao_select" class="form-control" name="faca">
                                    <option value="">Selecione</option>
                                    <?php
                                    foreach ($faca_cartao_md as $key => $value) {
                                        ?>
                                        <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button id="faca_cartao_btn_submit" type="submit" class="btn btn-success" >Adicionar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal laminacao -->
        <div class="modal fade" id="myModal_laminacao" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form id="form_laminacao" action="Servico/laminacao_sessao_inserir" method="POST" role="form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Laminação</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label" for="Laminacao">Laminação:</label>
                                <select id="md_laminacao_select_laminacao" class="form-control" name="laminacao" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <?php foreach ($laminacao_md as $key => $value) { ?>
                                        <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <label class="control-label" for="quantidade"> Quantidade:</label>
                            <select id="md_laminacao_select_qtd" name="quantidade" class="form-control" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <label class="control-label" for="valor"> Valor:</label>
                            <input id="md_laminacao_valor" class="form-control" name="valor" required placeholder="Insira o valor total do serviço de laminação">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button id="form_laminacao_acao" type="submit" class="btn btn-success" >Adicionar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal colagem -->
        <div class="modal fade" id="myModal_colagem" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form id="form_colagem" action="Servico/colagem_sessao_inserir" method="POST" role="form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Colagem</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="nome" value="Colagem">
                            <label class="control-label" for="valor"> Valor:</label>
                            <input id="md_colagem_valor" class="form-control" name="valor" placeholder="Insira o valor total do serviço de Colagem">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button id="form_colagem_acao" type="submit" class="btn btn-success" >Adicionar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal Produto -->
        <div class="modal fade" id="myModal_produto" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form id="form_servico" action="<?= base_url('Servico/criar_servico') ?>" method="POST" role="form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Serviço</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <select name="tipo" class="form-control">
                                        <option value="" disabled selected>Selecione uma opção</option>
                                        <option value="cartao" <?= ($_SESSION['orcamento']->servico->tipo == 'cartao') ? 'selected' : ''; ?>>
                                            Cartão
                                        </option>
                                        <option value="servico" <?= ($_SESSION['orcamento']->servico->tipo == 'servico') ? 'selected' : ''; ?>>
                                            Serviço
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="quantidade"> Quantidade:</label>
                                    <input class="form-control" name="quantidade" value="<?php
                                    if (!empty($_SESSION['orcamento']->servico->quantidade)) {
                                        print $_SESSION['orcamento']->servico->quantidade;
                                    }
                                    ?>" placeholder="Quantidade do pedido"></div>
                                <div class="col-md-6"><label class="control-label" for="desconto"> Desconto:</label>
                                    <input class="form-control" name="desconto" value="<?php
                                    if (!empty($_SESSION['orcamento']->servico->desconto)) {
                                        print $_SESSION['orcamento']->servico->desconto;
                                    }
                                    ?>" placeholder="Valor do desconto para este serviço"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button id="form_faca_acao" type="submit" class="btn btn-success" >Adicionar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>