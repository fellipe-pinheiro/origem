<?php
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
        /*        .pnl{
                    padding-left: 0px;
                    padding-right: 0px;
                }*/
        .modal .modal-body {
            max-height: 470px;
            overflow-y: auto;
        }
    </style>    
    <!--JavaScript-->
    <script>
        $(document).ready(function () {
            // Filtrar Tabela cliente
            $("#txtPesquisar").keyup(function () {
                var rows = $("#fbody").find("tr").hide();
                var data = this.value.split(" ");
                $.each(data, function (i, v) {
                    rows.filter(":contains('" + v.toLowerCase() + "')").show();
                });
            });

            // Mostrar modal do cliente
            //BOTÃO DENTRO DA LISTA DE CLIENTES DENTRO DO MODAL
            $("#md_btn_criar_cliente").click(function () {
                $("#modal_cliente").modal('toggle');
                $("#modal_cliente_form").modal('toggle');
            });

            //Habilitar empastamento ao selecionar radio empastamento
            $("input[type=radio][name=empastamento_status]").change(function () {
                if ($("#form_papel_empastamento_valor").prop("disabled")) {
                    $("#form_papel_empastamento_valor").prop("disabled", false);
                } else {
                    $("#form_papel_empastamento_valor").prop("disabled", true);
                }
            });
            /*
             //DESATIVADO ESTA FUNÇÃO
             //Envia nota fiscal para sessao
             $("#nota_fiscal").change(function () {
             var id = $("#nota_fiscal option:selected").val();
             window.location.href = "<?= base_url('Servico/nota_fiscal_sessao') ?>?id=" + id;
             });
             */
//DESATIVADO ESTA FUNÇÃO
            /*            $("#frete").change(function () {
             var id = $("#frete option:selected").val();
             
             if (id == 0) {
             $("#modal_frete_valor").modal();
             } else {
             window.location.href = "<?= base_url('Servico/frete_sessao') ?>?id=" + id;
             }
             });
             */
<?php
//Selecionar os valores de frete
if (!empty($_SESSION['orcamento']->frete->id)) {
    print "$(\"#frete option[value='{$_SESSION['orcamento']->frete->id}']\").attr('selected', 'selected');";
} elseif (!empty($_SESSION['orcamento']->frete_personalizado)) {
    print "$(\"#frete option[value=0]\").attr('selected', 'selected');";
} else {
    print "$(\"#frete option[value='-1']\").attr('selected', 'selected');";
}
?>

            //Selecionar os valores da nota fiscal
<?php
if (!empty($_SESSION['orcamento']->nota_fiscal)) {
    print "$(\"#nota_fiscal option[value='{$_SESSION['orcamento']->nota_fiscal->id}']\").attr('selected', 'selected');";
}
?>
//LIMPA OS MODAIS
            // Limpa os modais ao adicionar um item
            $("#md_btn_acabamento").click(function () {
                $('#md_acabamento_select option[value=""]').attr('selected', 'selected');
                $('#md_acabamento_qtd').val('');
            });
            $("#md_btn_laminacao").click(function () {
                $('#md_laminacao_select_laminacao option[value=""]').attr('selected', 'selected');
                $('#md_laminacao_valor').val('');
            });
            $("#md_btn_impressao").click(function () {
                $('#md_impressao_select option[value=""]').attr('selected', 'selected');
            });
            $("#md_btn_impressao_cartao").click(function () {
                $("#form_impressao_cartao").prop("action", "servico/impressao_cartao_sessao_inserir")
                $("#impressao_cartao_select option[value='']").prop("selected", true);
                $("#impressao_cartao_qtd_cor_frente").val('').attr('min', 1).attr('type', 'number').attr('step', '1');
                $("#impressao_cartao_qtd_cor_verso").val('').attr('min', 0).attr('type', 'number').attr('step', '1');
            });
            $("#md_btn_faca").click(function () {
                $('#md_faca_select option[value=""]').attr('selected', 'selected').focus();
                $('#md_faca_altura').val('');
                $('#md_faca_largura').val('');
            });
            $("#md_btn_faca_cartao").click(function () {
                $('#md_faca_cartao_select option[value=""]').attr('selected', 'selected').focus();
            });
            $("#md_btn_colagem").click(function () {
                $('#md_colagem_valor').val('');
            });
            $("#md_btn_papel").click(function () {
                $("#form_papel_select option[value='']").prop('selected', true);
                $("#form_papel_quantidade").val('');
                $("input[type=radio][name=empastamento_status][value=0]").prop("checked", true);
                $("#form_papel_empastamento_valor").prop("disabled", true);
                $("#form_papel_empastamento_valor").val('');
            });


//VALIDAÇÔES DE FORMULARIO
            // verifca se cliente esta preenchido ao finalizar o servico
            $("#btn_finalizar").click(function () {
                if ($("#cliente_inp_nome").val().length < 1) {
                    $("#modal_cliente").modal();
                } else {
                    if ($("#nota_fiscal").val() == null) {
                        $("#myModal_condicoes").modal();
                    } else {
                        $("#modal_finalizar").modal();
                    }
                }
            });
            //NOVO Mostrar input do valor_frete para definir
            $("#frete").change(function () {
                var id = $("#frete option:selected").val();
                //Mostra o input
                if (id == 0) {
                    $("#valor_frete").prop("disabled", false).attr('type', 'number').prop("autofocus", true);
                    //Esconde o input
                } else {
                    $("#valor_frete").prop("disabled", true).attr('type', 'hidden').prop("required", false);
                }
            });
        });

//Verifica se a nota fiscal esta selecionada ao finalizar e se o frete esta com valor se for personalizado
        function valida_condicoes() {
            var nota = document.forms["form_condicoes"]["nota_fiscal"].value;
            //var id = $("#frete option:selected").val();
            var valor_frete = $("#valor_frete").val();

            //NOTA
            if (nota == null || nota == "") {
                alert('Selecione a Nota Fiscal');
                return false;
            }
            //Frete
            //if (id == 0 && valor_frete == '') {
            if (id == 0) {
                alert('Insira um valor para o frete');
                return false;
            }
        }
        function valida_impressao_cartao() {
            var frente_qtd = $('input[name="qtd_cor_frente"]').val();
            var verso_qtd = $('input[name="qtd_cor_verso"]').val();

            if (frente_qtd <= 0) {
                alert('O valor inserido não pode ser ZERO ou NEGATIVO');
                $('input[name="qtd_cor_frente"]').focus();
                return false;
            }
            if (verso_qtd < 0) {
                alert('O valor inserido não pode ser NEGATIVO');
                $('input[name="qtd_cor_verso"]').focus();
                return false;
            }
        }

        function valida_form_papel() {
            var empastamento = $("input[type=radio][name=empastamento_status]:checked").val();
            var empastamento_valor = $("input[name=empastamento_valor]").val();
            var papel_qtd = $("input[id=form_papel_quantidade]").val();
            if (empastamento == 1) {
                if (empastamento_valor < 0) {
                    alert('O valor inserido não pode ser menor que ZERO');
                    $("input[name=empastamento_valor]").focus();
                    return false;
                }
            }
            if (papel_qtd <= 0) {
                alert('A quantidade do papel não pode ser menor ou igual a ZERO');
                return false;
            }
        }



//ABRE MODAL    
        function open_impressao_modal(posicao, idImpressao, qtd_cor_frente, qtd_cor_verso) {
            if ("<?= $_SESSION['orcamento']->servico->tipo ?>" == "cartao") {
                $("#form_impressao_cartao").prop("action", "servico/impressao_cartao_sessao_editar/" + posicao);
                $("#impressao_cartao_select option[value=" + idImpressao + "]").prop("selected", true);
                $("#impressao_cartao_qtd_cor_frente").val(qtd_cor_frente);
                $("#impressao_cartao_qtd_cor_verso").val(qtd_cor_verso);
                $("#myModal_impressao_cartao").modal();
            }
            if ("<?= $_SESSION['orcamento']->servico->tipo ?>" == "servico") {
                $("#md_impressao_select option[value=" + idImpressao + "]").prop("selected", true);
                $("#form_impressao").prop("action", "servico/impressao_sessao_editar/" + posicao);
                $("#myModal_impressao").modal();
            }
        }
        function open_papel_modal(posicao, idPapel, quantidade, empastamento_status, empastamento_valor) {
            $("#form_papel_select option[value=" + idPapel + "]").prop("selected", true);
            $("#form_papel_quantidade").val(quantidade);
            if (empastamento_status == '1') {
                $("input[type=radio][name=empastamento_status][value=1]").prop("checked", true);
                $("#form_papel_empastamento_valor").prop("disabled", false);
                $("#form_papel_empastamento_valor").val(empastamento_valor);
            } else {
                $("input[type=radio][name=empastamento_status][value=0]").prop("checked", true);
            }
            $("#form_papel").prop("action", "servico/papel_sessao_editar/" + posicao);
            $("#myModal_papel").modal();
        }
        function open_acabamento_modal(posicao, qtd, id) {
            $("#md_acabamento_select option[value=" + id + "]").attr("selected", "selected");
            $("#md_acabamento_qtd").val(qtd);
            $("#form_acabamento").prop("action", "servico/acabamento_sessao_editar/" + posicao);
            $("#myModal_acabamento").modal();
        }
        function open_faca_modal(posicao, id, altura, largura) {
            if ("<?= $_SESSION['orcamento']->servico->tipo ?>" == "cartao") {
                $("#faca_cartao_form").prop("action", "servico/faca_cartao_sessao_editar/" + posicao);
                $("#md_faca_cartao_select option[value=" + id + "]").prop("selected", true);
                $("#myModal_faca_cartao").modal();
            }
            if ("<?= $_SESSION['orcamento']->servico->tipo ?>" == "servico") {
                $("#form_faca").prop("action", "servico/faca_sessao_editar/" + posicao);
                $("#md_faca_select option[value=" + id + "]").prop("selected", true);
                $("#md_faca_altura").val(altura);
                $("#md_faca_largura").val(largura);
                $("#myModal_faca").modal();
            }
        }
        function open_colagem_modal(posicao, valor) {
            $("#md_colagem_valor").val(valor);
            $("#form_colagem").prop("action", "servico/colagem_sessao_editar/" + posicao);
            $("#myModal_colagem").modal();
        }
        function open_laminacao_modal(posicao, id, valor) {
            $("#md_laminacao_select_laminacao option[value=" + id + "]").attr("selected", "selected");
            $("#md_laminacao_valor").val(valor);
            $("#form_laminacao").prop("action", "servico/laminacao_sessao_editar/" + posicao);
            $("#myModal_laminacao").modal();
        }
        function open_servico_modal() {
            $("#form_servico").prop("action", "servico/editar_servico");
            $('#myModal_produto').modal('show');
        }
    </script>
    <!--Body-->
    <body>
        <?php $this->load->view('_include/menu'); ?>
        <div class="container">
            <div class="row">
                <!--Tabela do servico-->
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">PRODUTO</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <input type="hidden" name="cliente_id" id="cliente_id_panel">
                                <!-- Button trigger modal -->
                                <div class="col-md-2">
                                    <br>
                                    <button type="button" class="btn btn-primary btn-block" <?php
                                    if (empty($_SESSION['orcamento']->servico->quantidade)) {
                                        print 'disabled="disabled"';
                                    }
                                    ?> data-toggle="modal" data-target="#modal_cliente">
                                        <span class="glyphicon glyphicon-user"></span> Clientes
                                    </button>
                                </div>
                                <div class="col-md-3">
                                    <?= form_label('Nome: ', '', array('class' => 'control-label')) ?>
                                    <?= form_input('', $_SESSION['orcamento']->cliente->nome, 'id="cliente_inp_nome" readonly class="form-control input-sm"') ?>
                                </div>
                                <div class="col-md-3">
                                    <?= form_label('CPF / CNPJ:', '', array('class' => 'control-label')) ?>
                                    <?= form_input('', $_SESSION['orcamento']->cliente->cnpj_cpf, 'readonly class="form-control input-sm"') ?>
                                </div>
                                <div class="col-md-3">
                                    <?= form_label('E-mail:', '', array('class' => 'control-label')) ?>
                                    <?= form_input('', $_SESSION['orcamento']->cliente->email, 'readonly class="form-control input-sm"') ?>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <table class="table table-hover table-condensed table-striped">
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
                                            <td><button onclick="open_servico_modal()" type="button" class="btn btn-primary btn-sm" <?php
                                                if (empty($_SESSION['orcamento']->servico->quantidade)) {
                                                    print 'disabled="disabled"';
                                                }
                                                ?>><span class="glyphicon glyphicon-pencil"></span></button></td>
                                        </tr>
                                        <?php
                                        if (!empty($_SESSION['orcamento']->nota_fiscal)) {
                                            ?>
                                            <tr>
                                                <td>Nota Fiscal (<?= $_SESSION['orcamento']->nota_fiscal->nome ?>)</td>
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
                                            if($_SESSION['orcamento']->frete != NULL){
                                                $entrega = $_SESSION['orcamento']->frete->nome;
                                            }  else {
                                                $entrega = 'Personalizado';
                                            }
                                            ?>
                                            <tr>
                                                <td>Frete (<?= $entrega ?>)</td>
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
                <!--PAINEL OPCÇÕES-->
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">OPÇÕES</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle btn-block" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Menu
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <?php if (empty($_SESSION['orcamento']->servico->quantidade)) { ?>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#myModal_produto">
                                                    <span class="glyphicon glyphicon-plus"></span> Novo produto
                                                </a>
                                            </li>
                                        <?php } else { ?>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#myModal_condicoes">
                                                    <span class="glyphicon glyphicon-usd"></span> Condições <span class="glyphicon glyphicon-time"></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('Servico/excluir_todos_servicos') ?>">
                                                    <span class="glyphicon glyphicon-trash"></span> Limpar Orcamento
                                                </a>
                                            </li>
                                            <li role="separator" class="divider"></li>
                                            <li>
                                                <a href="#" id="btn_finalizar">
                                                    <span class="glyphicon glyphicon-ok"></span> Finalizar
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <br><br><br>
                            <!--<?php if (!empty($_SESSION['orcamento']->servico->quantidade)) { ?>
                                        <div class="col-md-12">
                                                <label for="frete"><span class="glyphicon glyphicon-plane"></span>Tipo de frete:</label>
                                            <select name="frete" id="frete" class="form-control">
                                                <option value="-1" selected disabled>Selecione</option>
                                                <option value="0" >Definir</option>
                                <?php foreach ($frete as $value) { ?>
                                                                <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="nota_fiscal"><span class="glyphicon glyphicon-file"></span>Nota fiscal:</label>
                                            <select name="nota_fiscal" id="nota_fiscal" class="form-control">
                                                <option selected disabled >Selecione</option>
                                <?php foreach ($nota_fiscal as $value) { ?>
                                                            <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                <?php } ?>
                                            </select>
                                            <dialog id="msg_nota_fiscal" style="width: 200px;">Selecione uma nota fiscal</dialog>
                                        </div>
                            <?php } ?>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!--PAINEL DETALHES-->
                <div class="col-md-12">
                    <div class="panel panel-default  pnl">
                        <div class="panel-heading">
                            <h3 class="panel-title">DETALHES</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <?php if (!empty($_SESSION['orcamento']->servico->quantidade)) {
                                    ?>
                                    <div class="col-md-2">
                                        <button id="md_btn_papel" class="btn btn-default btn-block btn_m" data-toggle="modal" data-target="#myModal_papel">
                                            <span class="glyphicon glyphicon-file"></span> Papel
                                        </button>
                                    </div>
                                    <?php if ($_SESSION['orcamento']->servico->tipo == 'cartao') { ?>
                                        <div class="col-md-2">
                                            <button  id="md_btn_impressao_cartao" class="btn btn-default btn-block col-md-2 btn_m" data-toggle="modal" data-target="#myModal_impressao_cartao">
                                                <span class="glyphicon glyphicon-print"></span> Impressão
                                            </button>
                                        </div>
                                        <div class="col-md-2">
                                            <button id="md_btn_faca_cartao" class="btn btn-default btn-block col-md-2 btn_m" data-toggle="modal" data-target="#myModal_faca_cartao">
                                                <span class="glyphicon glyphicon-wrench"></span> Faca
                                            </button>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col-md-2">
                                            <button id="md_btn_impressao" class = "btn btn-default btn-block col-md-2 btn_m" data-toggle = "modal" data-target = "#myModal_impressao">
                                                <span class = "glyphicon glyphicon-print"></span> Impressão
                                            </button>
                                        </div>
                                        <div class="col-md-2">
                                            <button id="md_btn_faca" class = "btn btn-default btn-block col-md-2 btn_m" data-toggle = "modal" data-target = "#myModal_faca">
                                                <span class = "glyphicon glyphicon-wrench"></span> Faca
                                            </button>
                                        </div>
                                    <?php } ?>
                                    <div class="col-md-2">
                                        <button id="md_btn_acabamento" class="btn btn-default btn-block col-md-2 btn_m" data-toggle="modal" data-target="#myModal_acabamento">
                                            <span class="glyphicon glyphicon-scissors"></span> Acabamento
                                        </button>
                                    </div>
                                    <div class="col-md-2">
                                        <button id="md_btn_laminacao" class="btn btn-default btn-block col-md-2 btn_m" data-toggle="modal" data-target="#myModal_laminacao">
                                            <span class="glyphicon glyphicon-tags"></span> Laminação
                                        </button>
                                    </div>
                                    <div class="col-md-2">
                                        <button  id="md_btn_colagem" class="btn btn-default btn-block col-md-2 btn_m" data-toggle="modal" data-target="#myModal_colagem">
                                            <span class="glyphicon glyphicon-envelope"></span> Colagem
                                        </button>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <table class="table table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Material</th>    
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
                                                    <td><?= $papel->nome ?> (<?= $papel->quantidade ?> fls)</td>
                                                    <td><?= $_SESSION['orcamento']->servico->quantidade ?></td>
                                                    <td>R$ <?= number_format($papel->valor_unitario, 3, ",", ".") ?></td>
                                                    <td>R$ <?= number_format($papel->sub_total, 2, ",", ".") ?></td>
                                                    <td><button onclick="open_papel_modal(<?= $key ?>, '<?= $papel->id ?>', '<?= $papel->quantidade ?>', '<?= $papel->empastamento->status ?>', '<?= $papel->empastamento->sub_total ?>')" id="" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
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
                                                    <td><?= $impressao->nome ?> (<?= $impressao->impressao_formato->altura ?>x<?= $impressao->impressao_formato->largura ?>)
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
                                                    <td><?= $impressao->impressao_formato->nome ?> (<?= $impressao->impressao_formato->altura ?>x<?= $impressao->impressao_formato->largura ?>)</td>
                                                    <td><?= $impressao->fotolito->quantidade ?></td>
                                                    <td>R$ <?= $impressao->fotolito->valor_unitario ?></td>
                                                    <td>R$ <?= number_format($impressao->fotolito->sub_total, 2, ",", ".") ?></td>
                                                    <td></td>
                                                    <td></td>
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
                                                        <td>R$ <?= number_format($faca->valor_faca, 2, ",", ".") ?></td>
                                                    <?php } else { ?>
                                                        <td>R$ <?= $faca->valor ?></td>
                                                    <?php } ?>
                                                    <td>R$ <?= number_format($faca->sub_total, 2, ",", ".") ?></td>
                                                    <?php if ($_SESSION['orcamento']->servico->tipo == 'servico') { ?>
                                                        <td><button onclick="open_faca_modal(<?= $key ?>, <?= $faca->id ?>, <?= $faca->altura ?>, <?= $faca->largura ?>)" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                    <?php } else { ?>
                                                        <td><button onclick="open_faca_modal(<?= $key ?>, <?= $faca->id ?>)" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                    <?php } ?>
                                                    <td><a class="btn btn-danger btn-sm" href="<?= base_url("servico/faca_sessao_excluir/{$key}") ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
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
                                        if (!empty($_SESSION['orcamento']->servico->laminacao)) {
                                            foreach ($_SESSION['orcamento']->servico->laminacao as $key => $laminacao) {
                                                ?>
                                                <tr>
                                                    <td>Laminação</td>
                                                    <td><?= $laminacao->nome ?></td>
                                                    <td><?= $_SESSION['orcamento']->servico->quantidade ?></td>
                                                    <td>R$ <?= number_format($laminacao->valor_unitario, 3, ",", ".") ?></td>
                                                    <td>R$ <?= number_format($laminacao->sub_total, 2, ",", ".") ?></td>
                                                    <td><button onclick="open_laminacao_modal(<?= $key ?>, <?= $laminacao->id ?>,<?= $laminacao->sub_total ?>)" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
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
            <?php $this->load->view('_include/footer'); ?>
        </div>

        <!-- Modal Finalizar -->
        <div class="modal fade" id="modal_finalizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Finalizar Orcamento</h4>
                    </div>
                    <div class="modal-body">
                        <h3>Deseja realizar mais um orçamento para este cliente?</h3>
                        <a href="<?= base_url('Servico/finalizar/0') ?>" class="btn btn-default  btn-lg" >
                            <span class="glyphicon glyphicon-ok"></span> Não
                        </a>
                        <a href="<?= base_url('Servico/finalizar/1') ?>" class="btn btn-success btn-lg" >
                            <span class="glyphicon glyphicon-ok"></span> Sim
                        </a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Impressão cartao -->
        <div class="modal fade" id="myModal_impressao_cartao" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form id="form_impressao_cartao" action="<?= base_url('Servico/impressao_cartao_sessao_inserir') ?>" method="POST" class="form-horizontal" role="form" onsubmit="return  valida_impressao_cartao();">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Impressão</h4>
                        </div>
                        <div class="modal-body">
                            <label for="impressao_cartao">Impressão:</label>
                            <select required autofocus id="impressao_cartao_select" class="form-control" name="impressao_cartao">
                                <option value="">Selecione</option>
                                <?php
                                foreach ($impressao_cartao_md as $key => $value) {
                                    ?>
                                    <option value="<?= $value->id ?>"><?= $value->nome ?>  (<?= $value->impressao_formato->altura ?> x <?= $value->impressao_formato->largura ?>)</option>
                                    <?php
                                }
                                ?>
                            </select>
                            <!--Quantidade Cor frente-->
                            <?= form_label('Qtd cores frente: ', 'qtd_cor_frente', array('class' => ' control-label')) ?>
                            <?= form_input('qtd_cor_frente', '', 'required id="impressao_cartao_qtd_cor_frente" class="form-control" placeholder="Quantidade cores frente"') ?>

                            <!--Quantidade Cor verso-->
                            <?= form_label('Qtd cores verso: ', 'qtd_cor_verso', array('class' => ' control-label')) ?>
                            <?= form_input('qtd_cor_verso', '', 'required id="impressao_cartao_qtd_cor_verso" class="form-control" placeholder="Quantidade cores verso"') ?>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button id="impressao_cartao_btn_submit" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal Impressao-->
        <div class="modal fade" id="myModal_impressao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Impressão</h4>
                        </div>
                        <form id="form_impressao" action="<?= base_url('Servico/impressao_sessao_inserir') ?>" method="POST" role="form">
                            <div class="modal-body">
                                <select required autofocus id="md_impressao_select" class="form-control" name="impressao">
                                    <option value="" disabled selected="">Selecione</option>
                                    <?php
                                    foreach ($impressao_md as $key => $value) {
                                        ?>
                                        <option value="<?= $value->id ?>"><?= $value->nome ?> (<?= $value->impressao_formato->altura ?> x <?= $value->impressao_formato->largura ?>) : R$ <?= $value->valor ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                <button id="impressao_btn_submit" type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Frete valor -->
        <!--        <div class="modal fade" id="modal_frete_valor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Cliente</h4>
                            </div>
        <?= form_open('Servico/frete_sessao_definir', 'class=""') ?>
                            <div class="modal-body">
                                Valor
        <?= form_label('Valor do Frete:', 'valor_frete') ?>
        <?= form_input('valor_frete', '', ' id="valor_frete" class="form-control" placeholder="Valor do Frete"') ?>
        
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
                            </div>
        <?= form_close() ?>
                        </div>
                    </div>
                </div>-->
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
                            <?= form_open('Servico/cliente_session_criar', 'role="form"') ?>
                            <div class="col-md-12">
                                <h4>Dados do Cliente</h4>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    <!--ID-->
                                    <?= form_hidden('id', '') ?>
                                    <!--Pessoa_tipo-->
                                    <?php
                                    $options = array(
                                        '0' => 'Pessoa Fisica',
                                        '1' => 'Pessoa Juridica',
                                    );
                                    ?>
                                    <div class="form-group">
                                        <?= form_label('Pessoa_tipo: ', 'pessoa_tipo', array('class' => 'control-label')) ?>
                                        <?= form_dropdown('pessoa_tipo', $options, '', 'id="pessoa_tipo" class="form-control input-sm"') ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!--Nome-->
                                    <div class="form-group">
                                        <?= form_label('Nome: ', 'nome', array('class' => 'control-label')) ?>
                                        <?= form_input('nome', '', 'required id="nome" placeholder="Nome / Razão Social" class="form-control input-sm"') ?>
                                    </div>
                                </div>
                                <!--CPF/CNPJ-->
                                <div class="col-md-4">
                                    <?= form_label('CNPJ/CPF: ', 'cnpj_cpf', array('class' => 'control-label')) ?>
                                    <?= form_input('cnpj_cpf', '', ' id="cnpj_cpf" class="form-control input-sm" placeholder="CNPJ / CPF"') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <!--ie-->
                                <div class="col-md-3">
                                    <?= form_label('Ie: ', 'ie', array('class' => 'control-label')) ?>
                                    <?= form_input('ie', '', ' id="ie" placeholder="Inscrição estadual" class="form-control input-sm"') ?>
                                </div>
                                <!--im-->
                                <div class="col-md-3">
                                    <?= form_label('Im: ', 'im', array('class' => 'control-label')) ?>
                                    <?= form_input('im', '', ' id="im" placeholder="Inscrição municipal" class="form-control input-sm"') ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Contato</h4>
                            </div>
                            <div class="form-group">
                                <!--Nome contato-->
                                <div class="col-md-3">
                                    <?= form_label('Contato Nome: ', 'contato_nome', array('class' => 'control-label')) ?>
                                    <?= form_input('contato_nome', '', ' id="contato_nome" placeholder="Nome do contato" class="form-control input-sm"') ?>
                                </div>
                                <!--telefone-->
                                <div class="col-md-3">
                                    <?= form_label('<span class="glyphicon glyphicon-phone-alt"></span> Telefone: ', 'telefone', array('class' => 'control-label')) ?>
                                    <?= form_input('telefone', '', ' id="telefone" class="form-control input-sm" placeholder="Telefone"') ?>
                                </div>
                                <!--celular-->
                                <div class="col-md-3">
                                    <?= form_label('<span class="glyphicon glyphicon-phone"></span> Celular: ', 'celular', array('class' => 'control-label')) ?>
                                    <?= form_input('celular', '', ' id="celular" class="form-control input-sm" placeholder="Celular"') ?>
                                </div>
                                <!--email-->
                                <div class="col-md-3">
                                    <?= form_label('<span class="glyphicon glyphicon-envelope"></span> Email: ', 'email', array('class' => 'control-label')) ?>
                                    <?= form_input('email', '', ' id="email" class="form-control input-sm" placeholder="Email"') ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Endereço</h4>
                            </div>
                            <div class="form-group">
                                <!--logradouro-->
                                <div class="col-md-4">
                                    <?= form_label('<span class="glyphicon glyphicon-road"></span> Logradouro: ', 'rua', array('class' => 'control-label')) ?>
                                    <?= form_input('rua', '', ' id="rua" class="form-control input-sm" placeholder="Rua"') ?>
                                </div>
                                <!--numero-->
                                <div class="col-md-2">
                                    <?= form_label('Numero: ', 'numero', array('class' => 'control-label')) ?>
                                    <?= form_input('numero', '', ' id="numero" class="form-control input-sm" placeholder="Numero"') ?>
                                </div>
                                <!--complemento-->
                                <div class="col-md-2">
                                    <?= form_label('Complemento: ', 'complemento', array('class' => 'control-label')) ?>
                                    <?= form_input('complemento', '', ' id="complemento" class="form-control input-sm" placeholder="Complemento"') ?>
                                </div>
                                <!--bairro-->
                                <div class="col-md-4">
                                    <?= form_label('Bairro: ', 'bairro', array('class' => 'control-label')) ?>
                                    <?= form_input('bairro', '', ' id="bairro" class="form-control input-sm" placeholder="Bairro"') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--cep-->
                                <div class="col-md-4">
                                    <?= form_label('Cep: ', 'cep', array('class' => 'control-label')) ?>
                                    <?= form_input('cep', '', ' id="cep" class="form-control" placeholder="Cep"') ?>
                                </div>
                                <!--cidade-->
                                <div class="col-md-4">
                                    <?= form_label('Cidade: ', 'cidade', array('class' => 'control-label')) ?>
                                    <?= form_input('cidade', '', ' id="cidade" class="form-control input-sm" placeholder="Cidade"') ?>
                                </div>
                                <!--estado-->
                                <div class="col-md-4">
                                    <?= form_label('Estado: ', 'estado', array('class' => 'control-label')) ?>
                                    <?= form_input('estado', '', ' id="estado" class="form-control" placeholder="Estado"') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--observacao-->
                                <div class="col-md-12">
                                    <?= form_label('Observacao: ', 'observacao', array('class' => 'control-label')) ?>
                                    <?= form_textarea('observacao', '', ' id="observacao" class="form-control" placeholder="Observacao"') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>

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
                            <div class="col-md-4">
                                <?= form_input('', '', 'autofocus id="txtPesquisar" class="form-control" placeholder="Pesquisar"') ?>
                            </div>
                            <div class="col-md-2">
                                <button id="md_btn_criar_cliente" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Novo</button>
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
        <!--Erro form-->
        <form action="#" method="POST">

        </form>
        <!-- Modal Papel -->
        <div class="modal fade" id="myModal_papel" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form id="form_papel" action="Servico/papel_sessao_inserir" method="POST" role="form" onsubmit="return valida_form_papel()">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Papel</h4>
                        </div>
                        <div class="modal-body">
                            <label class="control-label" for="papel"> Papel:</label>
                            <div class="form-group">
                                <select id="form_papel_select" autofocus class="form-control" name="papel" required>
                                    <option value="">Selecione</option>
                                    <?php
                                    foreach ($papel_md as $key => $value) {
                                        ?>
                                        <option value="<?= $value->id ?>"><?= $value->nome ?> (<?= $value->gramatura ?>g) : R$ <?= $value->valor ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <label class="control-label" for="quantidade"> Quantidade:</label>
                            <input required min="1" type="number" step="1" id="form_papel_quantidade" class="form-control" name="quantidade" value="" placeholder="Quantidade de papeis"><br>
                            <label class="control-label" for="empastamento"> Empastamento:</label>
                            <label class="checkbox-inline"><input name="empastamento_status" type="radio" value="0" checked> NÃO</label>
                            <label class="checkbox-inline"><input name="empastamento_status" type="radio" value="1"> SIM</label><br><br>
                            <label class="control-label" for="empastamento_valor"> Valor:</label>
                            <input step="0.01" min="0" required type="number" class="form-control" id="form_papel_empastamento_valor" name="empastamento_valor" type="text" value="" disabled="true" placeholder="Insira o valor do empastamento">
                            <input type="hidden" name="empastamento_nome" value="Empastamento">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button id="form_papel_acao" type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
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
                                <select id="md_acabamento_select" autofocus class="form-control" name="acabamento" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <?php
                                    foreach ($acabamento_md as $key => $value) {
                                        ?>
                                        <option value="<?= $value->id ?>"><?= $value->nome ?> : R$ <?= $value->valor ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <label class="control-label" for="quantidade"> Quantidade:</label>
                            <input required min="1" step="1" type="number" class="form-control" id="md_acabamento_qtd" name="quantidade" value="" placeholder="Quantidade de acabamento">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button id="form_acabamento_acao" type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--pagamento-->
        <div class="modal fade" id="myModal_condicoes" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form id="form_condicoes" action="Servico/condicoes_sessao" method="POST" role="form" onsubmit="return valida_condicoes()">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Condições</h4>
                        </div>
                        <div class="modal-body">
                            <label for="frete"><span class="glyphicon glyphicon-plane"></span>Tipo de frete:</label>
                            <select name="frete" id="frete" class="form-control">
                                <option value="-1" selected disabled>Selecione</option>
                                <option value="0" >Personalizado</option>
                                <?php foreach ($frete as $value) { ?>
                                    <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                <?php } ?>
                            </select>

                            <input id="valor_frete" disabled="true" type="hidden" step="0.01" min="0" name="valor_frete" placeholder="Digite o valor para o frete" class="form-control">
                            <br>
                            <label for="nota_fiscal"><span class="glyphicon glyphicon-file"></span>Nota fiscal:</label>
                            <select required name="nota_fiscal" id="nota_fiscal" class="form-control">
                                <option selected disabled value="" >Selecione</option>
                                <?php foreach ($nota_fiscal as $value) { ?>
                                    <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                <?php } ?>
                            </select>
                            <br>
                            <label class="control-label" for="pagamento"><span class="glyphicon glyphicon-usd"></span> Pagamento:</label>
                            <textarea name="pagamento" class="form-control" rows="3" placeholder="Descreva neste campo as formas de pagamentos"><?php
                                if (!empty($_SESSION['orcamento']->pagamento)) {
                                    print $_SESSION['orcamento']->pagamento;
                                }
                                ?></textarea>
                            <br>
                            <label class="control-label" for="pagamento"><span class="glyphicon glyphicon-time"></span>  Prazo:</label>
                            <textarea name="prazo" class="form-control" rows="3" placeholder="Descreva neste campo o prazo de entrega"><?php
                                if (!empty($_SESSION['orcamento']->prazo)) {
                                    print $_SESSION['orcamento']->prazo;
                                }
                                ?></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button id="btn_condicoes" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
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
                            <label class="control-label" for="faca_select"> Faca:</label>
                            <div class="form-group">
                                <select id="md_faca_select" autofocus class="form-control" name="faca" required>
                                    <option value="" selected>Selecione</option>
                                    <?php
                                    foreach ($faca_md as $key => $value) {
                                        ?>
                                        <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <label class="control-label" for="altura"> Altura (mm):</label>
                            <input required step="1" type="number" min="1" class="form-control" id="md_faca_altura" name="altura" value="" placeholder="Insira a altura da Faca em milimetros">
                            <label class="control-label" for="largura"> Largura (mm):</label>
                            <input required step="1" type="number" min="1" class="form-control" id="md_faca_largura" name="largura" value="" placeholder="Insira a largura da Faca em milimetros">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button id="faca_btn_submit" type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
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
                                <select required autofocus id="md_faca_cartao_select" class="form-control" name="faca">
                                    <option value="">Selecione</option>
                                    <?php
                                    foreach ($faca_cartao_md as $key => $value) {
                                        ?>
                                        <option value="<?= $value->id ?>"><?= $value->nome ?> : R$ <?= $value->valor ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button id="faca_cartao_btn_submit" type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
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
                                <select required autofocus id="md_laminacao_select_laminacao" class="form-control" name="laminacao">
                                    <option value="" disabled selected>Selecione</option>
                                    <?php foreach ($laminacao_md as $key => $value) { ?>
                                        <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <label class="control-label" for="valor"> Valor:</label>
                            <input required min="0.01" step="0.01" type="number" id="md_laminacao_valor" class="form-control" name="valor" placeholder="Insira o valor total do serviço de laminação">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button id="form_laminacao_acao" type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
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
                            <input required type="number" step="0.01" min="0.01" id="md_colagem_valor" class="form-control" name="valor" placeholder="Insira o valor total do serviço de Colagem">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button id="form_colagem_acao" type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
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
                                    <select required autofocus id="select_tipo_servico" name="tipo" class="form-control">
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
                                    <input required type="number"  step="1" min="1" class="form-control" name="quantidade" value="<?php
                                    if (!empty($_SESSION['orcamento']->servico->quantidade)) {
                                        print $_SESSION['orcamento']->servico->quantidade;
                                    }
                                    ?>" placeholder="Quantidade do pedido"></div>
                                <div class="col-md-6"><label class="control-label" for="desconto"> Desconto:</label>
                                    <input type="number" step="0.01" min="0" class="form-control" name="desconto" value="<?php
                                    if (!empty($_SESSION['orcamento']->servico->desconto)) {
                                        print $_SESSION['orcamento']->servico->desconto;
                                    }
                                    ?>" placeholder="Valor do desconto para este serviço"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button id="btn_criar_pedido" type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>