<!DOCTYPE html>
<html lang="pt-br">
    <?php
    $this->load->view('_include/head', ['titulo' => "Origem - Orçamento nº {$orcamento->id}"]);
    ?>
    <script type="text/javascript">
        $(document).ready(function () {
            window.print();
        });
    </script>
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/print.css"); ?>" media="print"/>
    <style>
        .tabela{
            font-size: 85%;
        }
    </style>
    <body>
        <?php $this->load->view('_include/menu'); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>
                                    <?php echo img(base_url('/assets/img/origem_logo__pdf_140x140.png')); ?>
                                </td>
                                <td class="text-capitalize">
                                    <br>
                                    Endereço: R. Sebastião de Castro, 58<br>
                                    Belenzinho, São Paulo - SP,<br> 
                                    CEP: 03054-030<br>
                                    Telefone:(11) 2574-6006
                                </td>
                                <td><br>
                                    <?php
                                    list($ano, $mes, $dia) = explode('-', $orcamento->data_orcamento)
                                    ?>
                                    <h5>Data: <?= $dia . '/' . $mes . '/' . $ano ?></h5>
                                    <h4>Orçamento Nº <?= $orcamento->id ?></h4>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <h5><strong>DADOS DO CLIENTE</strong></h5>
                    <table class="table table-condensed text-uppercase tabela">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOME / RAZÃO SOCIAL</th>
                                <th>CONTATO</th>
                                <th>E-MAIL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $orcamento->cliente->id ?></td>
                                <td><?= $orcamento->cliente->nome ?></td>
                                <td><?= $orcamento->cliente->telefone ?> / <?= $orcamento->cliente->celular ?></td>
                                <td><?= $orcamento->cliente->email ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <?php
                    $detalhes = '';
                    if (!empty($orcamento->servico->papel)) {
                        $detalhes = $detalhes . '<strong>[ Papel (' . count($orcamento->servico->papel) . ') ] :</strong> ';
                        foreach ($orcamento->servico->papel as $key => $papel) {
                            $detalhes = $detalhes . '<u>' . $papel->nome . '</u> (' . $papel->quantidade . ' fls)';
                            if ($papel->empastamento->status == TRUE) {
                                $detalhes = $detalhes . ' com empastamento (' . $papel->nome . ')<strong>; </strong> ';
                            } else {
                                $detalhes = $detalhes . '<strong>; </strong> ';
                            }
                        }
                    }
                    if (!empty($orcamento->servico->impressao)) {
                        $detalhes = $detalhes . ' <strong>[ Impressão (' . count($orcamento->servico->impressao) . ') ] :</strong> ';
                        foreach ($orcamento->servico->impressao as $key => $impressao) {
                            $detalhes = $detalhes . '<u>' . $impressao->nome . '</u> (' . $impressao->impressao_formato->altura . ' x ' . $impressao->impressao_formato->largura . ' )';
                            ($orcamento->servico->tipo == 'cartao') ? $detalhes = $detalhes . " Cor: " . $impressao->qtd_cor_frente . 'x' . $impressao->qtd_cor_verso . '<strong>; </strong> ' : $detalhes = $detalhes . '<strong>; </strong> ';
                        }
                    }
                    if (!empty($orcamento->servico->faca)) {
                        $detalhes = $detalhes . ' <strong>[ Faca (' . count($orcamento->servico->faca) . ') ] :</strong> ';
                        foreach ($orcamento->servico->faca as $key => $faca) {
                            if ($orcamento->servico->tipo == 'servico') {
                                $detalhes = $detalhes . '<u>' . $faca->nome . '(' . $faca->altura . ' x ' . $faca->largura . ')</u><strong>; </strong>';
                            } else {
                                $detalhes = $detalhes . '<u>Faca Cartão de Visita</u><strong>; </strong>';
                            }
                        }
                    }

                    if (!empty($orcamento->servico->acabamento)) {
                        $detalhes = $detalhes . ' <strong>[ Acabamento (' . count($orcamento->servico->acabamento) . ') ] :</strong> ';
                        foreach ($orcamento->servico->acabamento as $key => $acabamento) {
                            $detalhes = $detalhes . '<u>' . $acabamento->nome . '</u><strong>; </strong>';
                        }
                    }
                    if (!empty($orcamento->servico->acabamento_2)) {
                        $detalhes = $detalhes . ' <strong>[ Acabamento 2 (' . count($orcamento->servico->acabamento_2) . ') ] :</strong> ';
                        foreach ($orcamento->servico->acabamento_2 as $key => $acabamento_2) {
                            $detalhes = $detalhes . '<u>' . $acabamento_2->nome . '</u><strong>; </strong>';
                        }
                    }
                    if (!empty($orcamento->servico->colagem)) {
                        $detalhes = $detalhes . ' <strong>[ Colagem (' . count($orcamento->servico->colagem) . ') ] :</strong> ';
                        foreach ($orcamento->servico->colagem as $key => $colagem) {
                            $detalhes = $detalhes . '<u>' . $colagem->nome . '</u><strong>; </strong>';
                        }
                    }
                    ?>
                    <h5><strong>DESCRIÇÃO</strong></h5>
                    <p><?= $detalhes ?></p>
                    <hr>
                    <div class="table-responsive">
                        <h5><strong>PRODUTO</strong></h5>
                        <table class="table table-condensed text-uppercase tabela">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>PRODUTO</th>
                                    <th>QTD</th>
                                    <th>UNITÁRIO</th>
                                    <th>SUB-TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $orcamento->servico->id ?></td>
                                    <td><?= $orcamento->servico->tipo ?></td>
                                    <td><?= $orcamento->servico->quantidade ?></td>
                                    <td>R$ <?= number_format($orcamento->servico->valor_unitario, 2, ',', '.') ?></td>
                                    <td>R$ <?= number_format($orcamento->servico->total, 2, ',', '.') ?></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <?php
                                //Se o ID da nota fiscal for igual a 0 (ZERO), não aparece na view
                                if (!empty($orcamento->nota_fiscal) && $orcamento->nota_fiscal->id != '1') {
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Nota Fiscal</b></td>
                                        <td>R$ <?= number_format($orcamento->valor_nota_fiscal, 2, ",", ".") ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                <?php
                                if (!empty($orcamento->valor_frete)) {
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Frete</b></td>
                                        <td>R$ <?= number_format($orcamento->valor_frete, 2, ",", ".") ?> </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><b>Descontos</b></td>
                                    <td>R$ 
                                        <?php
                                        if ($orcamento->servico->desconto == NULL) {
                                            print '0,00';
                                        } else {
                                            print number_format($orcamento->servico->desconto, 2, ",", ".");
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><b>Total</b></td>
                                    <td><strong>R$ <?= number_format($orcamento->total, 2, ",", ".") ?></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <hr>
                    <div>
                        <h5><strong>PAGAMENTO</strong></h5>
                        <p><?= $orcamento->pagamento ?></p>
                    </div>
                    <hr>
                    <div>
                        <h5><strong>Prazo</strong></h5>
                        <p><?= $orcamento->prazo ?></p>
                    </div>
                    <hr>
                    <div>
                        <h5><strong>Observações</strong></h5>
                        <p><?= $orcamento->observacao ?></p>
                    </div>
                    <br><br>
                </div>
            </div>
        </div>
    </body>
</html>