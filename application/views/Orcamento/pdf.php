<!DOCTYPE html>
<html lang="pt-br">
    <?php
    $this->load->view('_include/head', ['titulo' => "Orçamento nº {$orcamento->id}"]);
    ?>
    <script type="text/javascript">
        $(document).ready(function(){
            window.print();
        });
    </script>
    <body>
        <?php $this->load->view('_include/menu'); ?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                        </div>
                        <div class="col-md-2">
                            <h3 class="panel-title"></h3>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-condensed text-uppercase">
                                    <tr>
                                        <td>
                                            <?php echo img(base_url('/assets/img/origem_logo_pdf.png')); ?>
                                        </td>
                                        <td>
                                            <h5><br>
                                                Endereço: R. Sebastião de Castro, 58 - Belenzinho, São Paulo - SP,<br> 
                                                CEP: 03054-030<br>
                                                Telefone:(11) 2574-6006
                                            </h5>
                                        </td>
                                        <td>
                                            <?php
                                            list($ano, $mes, $dia) = explode('-', $orcamento->data_orcamento)
                                            ?>
                                            <h5 class="text-center">Data: <?= $dia . '/' . $mes . '/' . $ano ?></h5>
                                            <h3>Orçamento Nº <?= $orcamento->id ?></h3>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <h4>DADOS DO CLIENTE</h4>
                                <table class="table table-condensed table-bordered text-uppercase">
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
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <h4>DESCRIÇÃO</h4>
                                <table class="table table-hover table-condensed table-bordered text-uppercase">
                                    <thead>
                                        <tr>
                                            <th>Serviço / Material</th>    
                                            <th>Qtd</th>    
                                            <th>Descrição</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($orcamento->servico->papel)) {
                                            foreach ($orcamento->servico->papel as $key => $papel) {
                                                ?>
                                                <tr>
                                                    <td>Papel</td>
                                                    <td><?= $orcamento->servico->quantidade ?></td>
                                                    <td><?= $papel->nome ?> (<?= $papel->quantidade ?> fls)</td>
                                                </tr>
                                                <?php
                                                if ($papel->empastamento->status == TRUE) {
                                                    ?>
                                                    <tr>
                                                        <td>Empastamento</td>
                                                        <td><?= $orcamento->servico->quantidade ?></td>
                                                        <td><?= $papel->empastamento->nome ?> (<?= $papel->nome ?>)</td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                        <?php
                                        if (!empty($orcamento->servico->impressao)) {
                                            foreach ($orcamento->servico->impressao as $key => $impressao) {
                                                ?>
                                                <tr>
                                                    <td>Impressão</td>
                                                    <td><?= $orcamento->servico->quantidade ?></td>
                                                    <td><?= $impressao->nome ?> (<?= $impressao->impressao_formato->altura ?>x<?= $impressao->impressao_formato->largura ?>)
                                                        <?= ($orcamento->servico->tipo == 'cartao') ? "Cor: " . $impressao->qtd_cor_frente . 'x' . $impressao->qtd_cor_verso : ''; ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php
                                        if (!empty($orcamento->servico->acabamento)) {
                                            foreach ($orcamento->servico->acabamento as $key => $acabamento) {
                                                ?>
                                                <tr>
                                                    <td>Acabamento</td>
                                                    <td><?= $acabamento->quantidade ?></td>
                                                    <td><?= $acabamento->nome ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php
                                        if (!empty($orcamento->servico->faca)) {
                                            foreach ($orcamento->servico->faca as $key => $faca) {
                                                ?>
                                                <tr>
                                                    <td>Faca</td>
                                                    <?php if ($orcamento->servico->tipo == 'servico') { ?>
                                                        <td><?= $faca->nome ?> : <?= $faca->altura ?> x <?= $faca->largura ?></td>

                                                    <?php } else { ?>
                                                        <td><?= $faca->quantidade ?></td>
                                                    <?php } ?>
                                                    <td></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php
                                        if (!empty($orcamento->servico->laminacao)) {
                                            foreach ($orcamento->servico->laminacao as $key => $laminacao) {
                                                ?>
                                                <tr>
                                                    <td>Laminação</td>
                                                    <td><?= $orcamento->servico->quantidade ?></td>
                                                    <td><?= $laminacao->nome ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php
                                        if (!empty($orcamento->servico->colagem)) {
                                            foreach ($orcamento->servico->colagem as $key => $colagem) {
                                                ?>
                                                <tr>
                                                    <td>Colagem</td>
                                                    <td><?= $orcamento->servico->quantidade ?></td>
                                                    <td><?= $colagem->nome ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <h4>PRODUTO</h4>
                                <table class="table table-condensed table-bordered text-uppercase">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>PRODUTO</th>
                                            <th>QND</th>
                                            <th>UNITÁRIO</th>
                                            <th>SUB-TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?= $orcamento->servico->id ?></td>
                                            <td><?= $orcamento->servico->tipo ?></td>
                                            <td><?= $orcamento->servico->quantidade ?></td>
                                            <td>R$ <?= $orcamento->servico->valor_unitario ?></td>
                                            <td>R$ <?= $orcamento->servico->total ?></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <?php
                                        if (!empty($orcamento->nota_fiscal)) {
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
                                            <td>R$ <?= number_format($orcamento->total, 2, ",", ".") ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <hr>
                            <div>
                                <h4>PAGAMENTO</h4>
                                <textarea rows="3" class="form-control" readonly=""><?= $orcamento->pagamento ?></textarea>
                            </div>
                            <hr>
                            <div>
                                <h4>Prazo</h4>
                                <textarea rows="3" class="form-control" readonly=""><?= $orcamento->prazo ?></textarea>
                            </div>
                            <hr>
                            <div>
                                <h4>Observações</h4>
                                <textarea rows="3" class="form-control" readonly=""><?= $orcamento->observacao ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('_include/footer'); ?>
        </div>
    </body>
</html>