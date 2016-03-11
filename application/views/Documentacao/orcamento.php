<?php
$titulo = 'Serviço';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => $titulo]); ?>
    <link rel="stylesheet" href="<?= base_url("assets/css/dataTables.bootstrap.min.css"); ?>" />
    <script type="text/javascript" src="<?= base_url("assets/js/jquery.dataTables.js"); ?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/dataTables.bootstrap.min.js"); ?>"></script>
    <!--CSS-->
    <style type="text/css">
        .btn_m{
            text-align: left;
        }
        .modal .modal-body {
            max-height: 470px;
            overflow-y: auto;
        }
        table{
            text-transform: uppercase;
        }
    </style>    
    <!--JavaScript-->
    <script>
//CONTADOR DE CARACTERES PARA PAGAMENTO,OBSERVACAO E PRAZO        
        //Contador de caracteres na observacao
        $(document).on("keydown", "#pagamento", function () {
            var caracteresRestantes = 255;
            var caracteresDigitados = parseInt($(this).val().length);
            var caracteresRestantes = caracteresRestantes - caracteresDigitados;

            $(".caracteres_pagamento").text(caracteresRestantes);
        });
        //Contador de caracteres na observacao
        $(document).on("keydown", "#prazo", function () {
            var caracteresRestantes = 255;
            var caracteresDigitados = parseInt($(this).val().length);
            var caracteresRestantes = caracteresRestantes - caracteresDigitados;

            $(".caracteres_prazo").text(caracteresRestantes);
        });
        //Contador de caracteres na observacao
        $(document).on("keydown", "#observacao", function () {
            var caracteresRestantes = 255;
            var caracteresDigitados = parseInt($(this).val().length);
            var caracteresRestantes = caracteresRestantes - caracteresDigitados;

            $(".caracteres_observacao").text(caracteresRestantes);
        });
        $(document).ready(function () {

            $('[data-toggle="popover"]').popover();

            var table = $("#md_cliente_tabela").dataTable({
                "order": [[1, "asc"]]
            });
            $("#md_cliente_tabela tbody").on('click', 'tr', function () {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                }
                else {
                    table.$('tr.active').removeClass('active');
                    $(this).addClass('active');
                }
            });

            $('#md_cliente_selecionar').click(function () {
                if ($('#md_cliente_tabela tbody tr.active td').eq(0).text() != '') {
                    var id = $('#md_cliente_tabela tbody tr.active td').eq(0).text();
                    window.location.replace("<?= base_url("Servico/cliente_session_inserir") ?>/" + id);
                }
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
    print "$(\"#valor_frete\").prop('disabled', false).attr('type', 'number').show().val({$_SESSION['orcamento']->frete_personalizado})";
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
//            $("#md_btn_laminacao").click(function () {
//                $('#md_laminacao_select_laminacao option[value=""]').attr('selected', 'selected');
//                $('#md_laminacao_valor').val('');
//            });
            $("#md_btn_acabamento_2").click(function () {
                $('#md_acabamento_2_select_acabamento_2 option[value=""]').attr('selected', 'selected');
                $('#md_acabamento_2_valor').val('');
            });
            $("#md_btn_impressao").click(function () {
                $('#md_impressao_select option[value=""]').attr('selected', 'selected');
            });
            $("#md_btn_impressao_cartao").click(function () {
                $("#form_impressao_cartao").prop("action", "servico/impressao_cartao_sessao_inserir")
                $("#impressao_cartao_select option[value='']").prop("selected", true);
                $("#impressao_cartao_qtd_cor_frente").val('').attr('type', 'number').attr('step', '1');
                $("#impressao_cartao_qtd_cor_verso").val('').attr('type', 'number').attr('step', '1');
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

            $("#form_papel_filtrar").keyup(function () {
                $("#form_papel_select option").each(function (index) {
                    var str = this.text;
                    var str_filtro = $("#form_papel_filtrar").val();
                    if (str.match(str_filtro) == null) {
                        if (this.value != "") {
                            $("#form_papel_select option[value='" + this.value.toString() + "']").hide();
                        }
                    } else {
                        $("#form_papel_select option[value='" + this.value.toString() + "']").show();
                    }
                });
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
            $("#excluir_orcamento").click(function () {
                $("#md_excluir_orcamento").modal();
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

            var soma = frente_qtd + verso_qtd;

            if (soma < 1) {
                alert('Insira a quantidade no campo FRENTE ou VERSO');
                $('input[name="qtd_cor_frente"]').focus();
                return false;
            }
            //Frente
            if (frente_qtd < 0) {
                alert('O valor inserido não pode ser ZERO ou NEGATIVO');
                $('input[name="qtd_cor_frente"]').focus();
                return false;
            }

            //Verso
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
        function open_acabamento_2_modal(posicao, id, valor) {
            $("#md_acabamento_2_select_acabamento_2 option[value=" + id + "]").attr("selected", "selected");
            $("#md_acabamento_2_valor").val(valor);
            $("#form_acabamento_2").prop("action", "servico/acabamento_2_sessao_editar/" + posicao);
            $("#myModal_acabamento_2").modal();
        }
//        function open_laminacao_modal(posicao, id, valor) {
//            $("#md_laminacao_select_laminacao option[value=" + id + "]").attr("selected", "selected");
//            $("#md_laminacao_valor").val(valor);
//            $("#form_laminacao").prop("action", "servico/laminacao_sessao_editar/" + posicao);
//            $("#myModal_laminacao").modal();
//        }
        function open_servico_modal() {
            $("#form_servico").prop("action", "servico/editar_servico");
            $('#myModal_produto').modal('show');
        }
    </script>
    <!--Body-->
    <body style="background-color: coral">
        <?php $this->load->view('_include/menu'); ?>
        <div class="container">
            <div  class="alert alert-warning fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Olá! Você esta na documentação!</strong><br> Coloque o mouse sobre os botões para ver as funcionalidades<br>
                No Painel de detalhes, clique nos botões para ver as explicaçoes.
            </div>
            <div class="row">
                <!--PAINEL OPÇÕES-->
                <div class="col-md-3">
                    <div class="panel panel-warning">
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
                                                <a href="#" id="excluir_orcamento">
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
                            <?php
                            if (empty($_SESSION['orcamento']->servico->quantidade)) {
                                echo img(base_url('/assets/img/origem_logo_200x200.png'));
                            } elseif ($_SESSION['orcamento']->servico->tipo == 'cartao') {
                                echo img(base_url('/assets/img/businesscard_200x200.png'));
                            } else {
                                echo img(base_url('/assets/img/silkscreen_200x200.png'));
                            }
                            ?>
                            <br><br>
                        </div>
                    </div>
                </div>
                <!--PAINEL ORÇAMENTO-->
                <div class="col-md-9">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">ORÇAMENTO 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <input type="hidden" name="cliente_id" id="cliente_id_panel">
                                <!-- Button trigger modal -->
                                <div class="col-md-2">
                                    <br>
                                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal_cliente">
                                        <span class="glyphicon glyphicon-user"></span> Clientes
                                    </button>
                                </div>
                                <div class="col-md-1">
                                    <?= form_label('ID: ', '', array('class' => 'control-label')) ?>
                                    <?= form_input('', 2, 'id="cliente_inp_id" readonly class="form-control input-sm"') ?>
                                </div>
                                <div class="col-md-3">
                                    <?= form_label('Nome / Razão Social: ', '', array('class' => 'control-label')) ?>
                                    <?= form_input('', 'Empresa X ', 'id="cliente_inp_nome" readonly class="form-control input-sm"') ?>
                                </div>
                                <div class="col-md-3">
                                    <?= form_label('CPF / CNPJ:', '', array('class' => 'control-label')) ?>
                                    <?= form_input('', '123.456.789/0001-95', 'readonly class="form-control input-sm"') ?>
                                </div>
                                <div class="col-md-3">
                                    <?= form_label('E-mail:', '', array('class' => 'control-label')) ?>
                                    <?= form_input('', 'email@empresa.com.br', 'readonly class="form-control input-sm"') ?>
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
                                            <td>Cartão de visita</td>
                                            <td>100</td>
                                            <td>R$ 0,38</td>
                                            <td>R$ 38,00</td>
                                            <td><button onclick="open_servico_modal()" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>Nota Fiscal (Venda)</td>
                                            <td>R$ 2,54</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>Frete (Moto-Boy)</td>
                                            <td>R$ 30,00 </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><b>Descontos</b></td>
                                            <td class="text-danger">(R$ -15,00) 
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><b>Total à pagar</b></td>
                                            <td><b>Soma (<br>+ Valor do Produto<br> + Nota Fiscal<br> + Frete<br> - Desconto)</b>
                                            </td>
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
                <!--PAINEL DETALHES-->
                <div class="col-md-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">DETALHES</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="col-md-2">
                                    <button id="md_btn_papel" class="btn btn-default btn-block btn_m" data-toggle="modal" data-target="#myModal_papel">
                                        <span class="glyphicon glyphicon-file"></span> Papel <span class="badge"><?= count($_SESSION['orcamento']->servico->papel) ?></span>
                                    </button>
                                </div>
                                <div class="col-md-2">
                                    <button  id="md_btn_impressao_cartao" class="btn btn-default btn-block col-md-2 btn_m" data-toggle="modal" data-target="#myModal_impressao_cartao">
                                        <span class="glyphicon glyphicon-print"></span> Impressão <span class="badge"><?= count($_SESSION['orcamento']->servico->impressao) ?></span>
                                    </button>
                                </div>
                                <div class="col-md-2">
                                    <button id="md_btn_faca" class = "btn btn-default btn-block col-md-2 btn_m" data-toggle = "modal" data-target = "#myModal_faca">
                                        <span class = "glyphicon glyphicon-wrench"></span> Faca <span class="badge"><?= count($_SESSION['orcamento']->servico->faca) ?></span>
                                    </button>
                                </div>
                                <div class="col-md-2">
                                    <button id="md_btn_acabamento" class="btn btn-default btn-block col-md-2 btn_m" data-toggle="modal" data-target="#myModal_acabamento">
                                        <span class="glyphicon glyphicon-scissors"></span> Acabamento <span class="badge"><?= count($_SESSION['orcamento']->servico->acabamento) ?></span>
                                    </button>
                                </div>
                                <div class="col-md-2">
                                    <button id="md_btn_acabamento_2" class="btn btn-default btn-block col-md-2 btn_m" data-toggle="modal" data-target="#myModal_acabamento_2">
                                        <span class="glyphicon glyphicon-tags"></span> Acabamento 2 <span class="badge"><?= count($_SESSION['orcamento']->servico->acabamento_2) ?></span>
                                    </button>
                                </div>
                                <div class="col-md-2">
                                    <button  id="md_btn_colagem" class="btn btn-default btn-block col-md-2 btn_m" data-toggle="modal" data-target="#myModal_colagem">
                                        <span class="glyphicon glyphicon-envelope"></span> Colagem <span class="badge"><?= count($_SESSION['orcamento']->servico->colagem) ?></span>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <table class="table table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>#</th>    
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
                                        $count = 0;
                                        ?>
                                        <tr class="info">
                                            <td><?= $count = $count + 1 ?></td>
                                            <td><span class="glyphicon glyphicon-file"></span> <b>Papel</b></td>
                                            <td>Aspen (10 fls)</td>
                                            <td><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Quantidade do pedido"><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td class="text-center"><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Valor (R$) total de papeis dividido pela qtd do pedido EX: Se cada papel são R$ 10,00 e foram utilizado 10 papeis, logo R$ 100,00 (valor total de papeis) / 100 (qtd pedido) = R$ 1,00 "><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="(Quantidade do pedido) x (Valor unitario)"><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td><button  id="" class="btn btn-primary btn-sm" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Troque aqui o Papel, quantidade, se tem empastamento ou não e valor do empastamento."><span class="glyphicon glyphicon-pencil"></span></button></td>
                                            <td><a class="btn btn-danger btn-sm" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Retire aqui o item deste orçamento deste orçamento, caso esteja em modo de edição, este não altera o orçamento original."><span class="glyphicon glyphicon-trash"></span></a></td>
                                        </tr>
                                        <tr class="info">
                                            <td><?= $count = $count + 1 ?></td>
                                            <td><span class="glyphicon glyphicon-duplicate"></span> <b>Empastamento</b></td>
                                            <td>Empastamento (Papel a ser empastado [Aspen])</td>
                                            <td><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Quantidade do pedido"><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td class="text-center"><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Valor meramente ilustrativo simulando quanto seria o empastamento por unidade. Aqui mostra-se 3 casas depois da virgula pois ocorrem casos de dizimas periódicas..."><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Valor total inserido manualmente"><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="active">
                                            <td><?= $count = $count + 1 ?></td>
                                            <td><span class="glyphicon glyphicon-print"></span> <b>Impressão</b></td>
                                            <td>CARTÃO VISITA (55X95) COR: 1X2</td>
                                            <td><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Quantidade do pedido"><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td class="text-center"><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Valor unitario de impressão calculado pelo cento. "><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="(Quantidade do pedido) x (Valor unitario)"><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td><button  id="" class="btn btn-primary btn-sm" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Altere o tipo de impressão se o pedido for um serviço. Se o pedido for cartão de visita, altere também a quantidade de frente e verso."><span class="glyphicon glyphicon-pencil"></span></button></td>
                                            <td><a class="btn btn-danger btn-sm" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Retire aqui o item deste orçamento deste orçamento, caso esteja em modo de edição, este não altera o orçamento original."><span class="glyphicon glyphicon-trash"></span></a></td>
                                        </tr>
                                        <tr class="active">
                                            <td><?= $count = $count + 1 ?></td>
                                            <td><span class="glyphicon glyphicon-picture"></span> <b>Fotolito</b></td>
                                            <td>320X330</td>
                                            <td><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Quantidade de fotolito, para cada impressão, um fotolito associado."><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td class="text-center"><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Valor do fotolito. "><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Valor total de fotolito"><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        <tr class="success">
                                            <td><?= $count = $count + 1 ?></td>
                                            <td><span class="glyphicon glyphicon-wrench"></span> <b>Faca</b></td>            
                                            <td>FACA : 100 X 100</td>
                                            <td><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Quantidade de faca"><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td class="text-center"><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Valor da faca calculada pela soma da altura e largura multiplicada pelo valor da base de dados. Se o orçamento for para Cartão de visita, o valor é pego da base de dados sem calculos."><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Mesmo valor do unitário."><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td><button  id="" class="btn btn-primary btn-sm" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Alter a faca se o pedido for um cartão de visita. Se o pedido for serviço, altere tambem a altura e largura"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                            <td><a class="btn btn-danger btn-sm" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Retire aqui o item deste orçamento, caso esteja em modo de edição, este não altera o orçamento original."><span class="glyphicon glyphicon-trash"></span></a></td>
                                        </tr>
                                        <tr class="warning">
                                            <td><?= $count = $count + 1 ?></td>
                                            <td><span class="glyphicon glyphicon-scissors"></span> <b>Acabamento</b></td>
                                            <td>CORTE E VINCO</td>
                                            <td><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Quantidade de acabamento"><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td class="text-center"><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Valor unitário do acabamento. Valor selecionado da base de dados."><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Resultado da quantidade de acabamento x valor unitário"><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td><button  id="" class="btn btn-primary btn-sm" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Altere aqui o acabamento e a quantidade."><span class="glyphicon glyphicon-pencil"></span></button></td>
                                            <td><a class="btn btn-danger btn-sm" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Retire aqui o item deste orçamento deste orçamento, caso esteja em modo de edição, este não altera o orçamento original."><span class="glyphicon glyphicon-trash"></span></a></td>
                                        </tr>
                                        <tr class="danger">
                                            <td><?= $count = $count + 1 ?></td>
                                            <td><span class="glyphicon glyphicon-tags"></span> <b>Acabamento 2</b></td>
                                            <td>BOPP FOSCA</td>
                                            <td><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Quantidade do pedido"><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td class="text-center"><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Valor total R$ do acabamento, inserido manualmente, dividido pela quantidade do pedido."><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Resultado da quantidade do pedido x valor unitário"><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td><button  id="" class="btn btn-primary btn-sm" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Altere aqui o acabamento 2 e o valor"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                            <td><a class="btn btn-danger btn-sm" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Retire aqui o item deste orçamento deste orçamento, caso esteja em modo de edição, este não altera o orçamento original."><span class="glyphicon glyphicon-trash"></span></a></td>
                                        </tr>
                                        <tr>
                                            <td><?= $count = $count + 1 ?></td>
                                            <td><span class="glyphicon glyphicon-envelope"></span> <b>Colagem</b></td>
                                            <td><?= $colagem->nome ?></td>
                                            <td><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Quantidade do pedido"><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td class="text-center"><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Valor total R$ da colagem, inserido manualmente, dividido pela quantidade do pedido."><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td><a class="btn btn-default" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Resultado da quantidade do pedido x valor unitário"><span class="glyphicon glyphicon-info-sign"></a></td>
                                            <td><button  id="" class="btn btn-primary btn-sm" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Altere aqui o valor da colagem"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                            <td><a class="btn btn-danger btn-sm" data-toggle="popover" data-placement="auto" title="Documentação" data-content="Retire aqui o item deste orçamento deste orçamento, caso esteja em modo de edição, este não altera o orçamento original."><span class="glyphicon glyphicon-trash"></span></a></td>
                                        </tr>
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
                    <div class="modal-body text-center">
                        <h3>Deseja realizar mais um orçamento para este cliente?</h3>
                        <a href="<?= base_url('Servico/finalizar/0') ?>" class="btn btn-default  btn-lg" >
                            <span class="glyphicon glyphicon-remove"></span> Não
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
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Impressão Cartão</h4>
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
                        <div class="modal-body">
                            <select required autofocus id="md_impressao_select" class="form-control" name="impressao">
                                <option value="" disabled selected="">Selecione</option>
                                <?php
                                foreach ($impressao_md as $key => $value) {
                                    ?>
                                    <option value="<?= $value->id ?>"><?= $value->nome ?> (<?= $value->impressao_formato->altura ?> x <?= $value->impressao_formato->largura ?>) ....................... R$ <?= $value->valor ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button id="impressao_btn_submit" type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
                        </div>
                    </div>
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
                                    <?= form_input('cep', '', ' id="cep" class="form-control input-sm" placeholder="Cep"') ?>
                                </div>
                                <!--cidade-->
                                <div class="col-md-4">
                                    <?= form_label('Cidade: ', 'cidade', array('class' => 'control-label')) ?>
                                    <?= form_input('cidade', '', ' id="cidade" class="form-control input-sm" placeholder="Cidade"') ?>
                                </div>
                                <!--estado-->
                                <div class="col-md-2">
                                    <?= form_label('Estado: ', 'estado', array('class' => 'control-label')) ?>
                                    <?= form_dropdown('estado', $estados, 'SP', 'id="estado" class="form-control input-sm"') ?>
                                </div>
                                <div class="col-md-2">

                                </div>
                            </div>
                            <div class="form-group">
                                <!--observacao-->
                                <div class="col-md-12">
                                    <?= form_label('Observacao: ', 'observacao', array('class' => 'control-label')) ?>
                                    <?= form_textarea('observacao', '', ' id="observacao" class="form-control input-sm" placeholder="Observacao"') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Cliente lista -->
        <div class="modal fade" id="modal_cliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div style="padding-bottom: 10px">
                            <button id="md_btn_criar_cliente" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button>
                            <button id="md_cliente_selecionar" style="float: right" class="btn btn-primary"><span class="glyphicon glyphicon-circle-arrow-right"></span> Selecionar</button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <!--lista clientes-->
                        <table id="md_cliente_tabela" class="table display compact table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>CNPJ/CPF</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cliente_md as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value->id ?></td>
                                        <td><?= $value->nome ?></td>
                                        <td><?= $value->cnpj_cpf ?></td>
                                        <td><?= $value->email ?></td>
                                        <!--<td style="width: 46px;"><a class="btn btn-primary editar" href="<?= base_url("Servico/cliente_session_inserir/{$value->id}") ?>">Selecionar</a></td>-->
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Papel -->
        <div class="modal fade" id="myModal_papel" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Papel</h4>
                    </div>
                    <div class="modal-body">
                        <label class="control-label" for="form_papel_filtrar"><span class="glyphicon glyphicon-filter"></span> Filtro de papel:</label>
                        <input type="search" id="form_papel_filtrar" class="form-control text-uppercase" placeholder="Digite o nome do papel para aplicar o filtro ex: aspen" />
                        <label class="control-label" for="papel"> Papel:</label>
                        <div class="form-group">
                            <select id="form_papel_select" autofocus class="form-control text-uppercase" name="papel" required>
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

            </div>
        </div>
        <!-- Modal acabamento -->
        <div class="modal fade" id="myModal_acabamento" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
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

            </div>
        </div>
        <!-- Modal acabamento_2 -->
        <div class="modal fade" id="myModal_acabamento_2" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Acabamento 2</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="acabamento_2">Acabamento 2:</label>
                            <select required autofocus id="md_acabamento_2_select_acabamento_2" class="form-control" name="acabamento_2">
                                <option value="" disabled selected>Selecione</option>
                                <?php foreach ($acabamento_2_md as $key => $value) { ?>
                                    <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <label class="control-label" for="valor"> Valor:</label>
                        <input required min="0.01" step="0.01" type="number" id="md_acabamento_2_valor" class="form-control" name="valor" placeholder="Insira o valor total do serviço de Acabamento 2">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button id="form_acabamento_2_acao" type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--pagamento-->
        <div class="modal fade" id="myModal_condicoes" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Condições</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="frete"><span class="glyphicon glyphicon-plane"></span>Tipo de frete:</label>
                                <select name="frete" id="frete" class="form-control">
                                    <option value="-1" selected disabled>Selecione</option>
                                    <option value="0" >Personalizado</option>
                                    <?php foreach ($frete as $value) { ?>
                                        <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                    <?php } ?>
                                </select>

                                <input id="valor_frete" disabled="true" type="hidden" step="0.01" min="0" name="valor_frete" placeholder="Digite o valor para o frete" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="nota_fiscal"><span class="glyphicon glyphicon-file"></span>Nota fiscal:</label>
                                <select required name="nota_fiscal" id="nota_fiscal" class="form-control">
                                    <option selected disabled value="" >Selecione</option>
                                    <?php foreach ($nota_fiscal as $value) { ?>
                                        <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <label class="control-label" for="pagamento"><span class="glyphicon glyphicon-usd"></span> Pagamento:</label>
                                <textarea id="pagamento" name="pagamento" class="form-control" rows="3" maxlength="255" placeholder="Descreva neste campo as formas de pagamentos"><?php
                                    if (!empty($_SESSION['orcamento']->pagamento)) {
                                        print $_SESSION['orcamento']->pagamento;
                                    }
                                    ?></textarea><span class="caracteres_pagamento">255</span> Restantes <br>
                                <br>
                                <label class="control-label" for="prazo"><span class="glyphicon glyphicon-time"></span>  Prazo:</label>
                                <textarea id="prazo" name="prazo" class="form-control" rows="3" maxlength="255" placeholder="Descreva neste campo o prazo de entrega"><?php
                                    if (!empty($_SESSION['orcamento']->prazo)) {
                                        print $_SESSION['orcamento']->prazo;
                                    }
                                    ?></textarea><span class="caracteres_prazo">255</span> Restantes <br>
                                <br>
                                <label class="control-label" for="observacao"><span class="glyphicon glyphicon-comment"></span>  Observações:</label>
                                <textarea id="observacao" name="observacao" class="form-control" rows="3" maxlength="255" placeholder="Descreva neste campo as observacões do pedido"><?php
                                    if (!empty($_SESSION['orcamento']->observacao)) {
                                        print $_SESSION['orcamento']->observacao;
                                    }
                                    ?></textarea><span class="caracteres_observacao">255</span> Restantes <br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button id="btn_condicoes" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal faca -->
        <div class="modal fade" id="myModal_faca" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
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
            </div>
        </div>
        <!-- Modal faca cartao-->
        <div class="modal fade" id="myModal_faca_cartao" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
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
            </div>
        </div>
        <!-- Modal acabamento_2 -->
        <div class="modal fade" id="myModal_acabamento_2" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Acabamento 2</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="acabamento_2">Acabamento 2:</label>
                            <select required autofocus id="md_acabamento_2_select_acabamento_2" class="form-control" name="acabamento_2">
                                <option value="" disabled selected>Selecione</option>
                                <?php foreach ($acabamento_2_md as $key => $value) { ?>
                                    <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <label class="control-label" for="valor"> Valor:</label>
                        <input required min="0.01" step="0.01" type="number" id="md_acabamento_2_valor" class="form-control" name="valor" placeholder="Insira o valor total do serviço de laminação">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button id="form_acabamento_2_acao" type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal colagem -->
        <div class="modal fade" id="myModal_colagem" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
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
            </div>
        </div>
        <!-- Modal colagem -->
        <div class="modal fade" id="md_excluir_orcamento" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body text-center">
                        <h2>Deseja limpar este orçamento?</h2>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                        <button id="form_colagem_acao" type="submit" class="btn btn-danger" ><span class="glyphicon glyphicon-trash"></span> Limpar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Produto -->
        <div class="modal fade" id="myModal_produto" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
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
            </div>
        </div>
    </body>
</html>