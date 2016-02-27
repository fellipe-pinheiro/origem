<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
$titulo = 'Cartão';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => $titulo]); ?>
    <body>
        <?php $this->load->view('_include/menu'); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Cartão</h3>
                        </div>
                        <div class="panel-body">
                            <?php if (empty($this->session->cartao->quantidade)) {
                                ?>
                                <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal_cartao"><span class="glyphicon glyphicon-plus"></span> Novo Cartão</button>
                                <?php
                            } else {
                                ?>
                                <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#myModal_papel"><span class="glyphicon glyphicon-plus"></span> Papel</button>
                                <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#myModal_impressao"><span class="glyphicon glyphicon-plus"></span> Impressão</button>
                                <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#myModal_acabamento"><span class="glyphicon glyphicon-plus"></span> Acabamento</button>
                                <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#myModal_faca"><span class="glyphicon glyphicon-plus"></span> Faca</button>
                                <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#myModal_laminacao"><span class="glyphicon glyphicon-plus"></span> Laminação</button>
                                <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#myModal_colagem"><span class="glyphicon glyphicon-plus"></span> Colagem</button>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?= $titulo ?></h3>
                        </div>
                        <div class="panel-body">
                            <?php
                            if ($this->session->flashdata('edicaofalse')):
                                ?>
                                <div class="alert alert-warning alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Atenção!</strong> <?= $this->session->flashdata('edicaofalse') ?>
                                </div>
                                <?php
                            endif;
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"></h3>
                                </div>
                                <div class="panel-body">
                                    <form>
                                        <div class="form-group">
                                            <table class="table table-hover table-condensed">
                                                <thead>
                                                    <tr>
                                                        <th>Produto</th>    
                                                        <th>Qtd</th>    
                                                        <th>Valor Unitário</th>    
                                                        <th>Sub-Total</th>    
                                                        <th>Editar</th>    
                                                        <th>Excluir</th>    
                                                        <th>Próximo</th>    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?= $titulo ?></td>
                                                        <td><?= $this->session->cartao->quantidade ?></td>
                                                        <td>R$ <?= number_format($valor_unitario, 2, ",", ".") ?></td>
                                                        <td>R$ <?= number_format($valor_total, 2, ",", ".") ?></td>
                                                        <td><button onclick="open_cartao_modal()" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                        <td><?= anchor(base_url('Cartao/excluir_todos_cartoes'), '<span class="glyphicon glyphicon-trash"></span>', 'class="btn btn-danger btn-sm"') ?></td>
                                                        <td><?= anchor(base_url('Orcamento'), '<span class="glyphicon glyphicon-share-alt"></span>', 'class="btn btn-success btn-sm"') ?></td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td><b>Descontos</b></td>
                                                        <td>R$ 
                                                            <?php
                                                            if ($this->session->cartao->desconto == NULL) {
                                                                print '0,00';
                                                            } else {
                                                                print number_format($this->session->cartao->desconto, 2, ",", ".");
                                                            }
                                                            ?>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td><b>Total</b></td>
                                                        <td>R$ <?= number_format($total, 2, ",", ".") ?></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tfoot>
                                            </table>  

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"></h3>
                                </div>
                                <div class="panel-body">
                                    <form>
                                        <div class="form-group">
                                            <table class="table table-hover table-condensed">
                                                <thead>
                                                    <tr>
                                                        <th>Cartão / Material</th>    
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
                                                    if ($_SESSION['papel']) {
                                                        foreach ($_SESSION['papel'] as $key => $value) {
                                                            ?>
                                                            <tr>
                                                                <td>Papel</td>
                                                                <td><?= $value[0]->nome ?> =><?= $value[0]->quantidade ?> fls</td>
                                                                <td><?= $this->session->cartao->quantidade ?></td>
                                                                <td>R$ <?= number_format($value[0]->valor_unitario, 3, ",", ".") ?></td>
                                                                <td>R$ <?= number_format($value[0]->sub_total, 2, ",", ".") ?></td>
                                                                <td><button onclick="open_papel_modal(<?= $key ?>, '<?= $value[0]->nome ?>')" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                                <td><a class="btn btn-danger btn-sm" href="<?= base_url("cartao/papel_sessao_excluir/{$key}") ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                            </tr>
                                                            <?php
                                                            if ($this->session->empastamento[$key]->status == TRUE) {
                                                                ?>
                                                                <tr>
                                                                    <td>Empastamento</td>
                                                                    <td><?= $this->session->empastamento[$key]->nome ?> => <?= $value[0]->nome ?></td>
                                                                    <td><?= $this->session->cartao->quantidade ?></td>
                                                                    <td>R$ <?= number_format($this->session->empastamento[$key]->valor_unitario, 3, ",", ".") ?></td>
                                                                    <td>R$ <?= number_format($this->session->empastamento[$key]->sub_total, 2, ",", ".") ?></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($_SESSION['impressao']) {
                                                        foreach ($_SESSION['impressao'] as $key => $value) {
                                                            ?>
                                                            <tr>
                                                                <td>Impressão</td>
                                                                <td><?= $value[0]->nome ?> / <?= $value[0]->impressao_formato->nome ?>: <?= $value[0]->impressao_formato->altura ?>x<?= $value[0]->impressao_formato->largura ?></td>
                                                                <td><?= $this->session->cartao->quantidade ?></td>
                                                                <td>R$ <?= number_format($value[0]->valor_unitario, 3, ",", ".") ?></td>
                                                                <td>R$ <?= number_format($value[0]->sub_total, 2, ",", ".") ?></td>
                                                                <td><button onclick="open_impressao_modal(<?= $key ?>, '<?= $value[0]->nome ?>')" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                                <td><a class="btn btn-danger btn-sm" href="<?= base_url("cartao/impressao_sessao_excluir/{$key}") ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Fotolito</td>
                                                                <td><?= $this->session->fotolito[$key][0]->impressao_formato->nome ?>: <?= $this->session->fotolito[$key][0]->impressao_formato->altura ?>x<?= $this->session->fotolito[$key][0]->impressao_formato->largura ?></td>
                                                                <td><?= $this->session->fotolito[$key][0]->quantidade ?></td>
                                                                <td>R$ <?= number_format($this->session->fotolito[$key][0]->valor_unitario, 2, ",", ".") ?></td>
                                                                <td>R$ <?= number_format($this->session->fotolito[$key][0]->sub_total, 2, ",", ".") ?></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($_SESSION['acabamento']) {
                                                        foreach ($_SESSION['acabamento'] as $key => $value) {
                                                            ?>
                                                            <tr>
                                                                <td>Acabamento</td>
                                                                <td><?= $value[0]->nome ?></td>
                                                                <td><?= $value[0]->quantidade ?></td>
                                                                <td>R$ <?= number_format($value[0]->valor_unitario, 2, ",", ".") ?></td>
                                                                <td>R$ <?= number_format($value[0]->sub_total, 2, ",", ".") ?></td>
                                                                <td><button onclick="open_acabamento_modal(<?= $key ?>, '<?= $value[0]->nome ?>')" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                                <td><a class="btn btn-danger btn-sm" href="<?= base_url("cartao/acabamento_sessao_excluir/{$key}") ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($_SESSION['faca']) {
                                                        foreach ($_SESSION['faca'] as $key => $value) {
                                                            ?>
                                                            <tr>
                                                                <td>Faca</td>
                                                                <td><?= $value[0]->nome ?> : <?= $value[0]->altura ?> x <?= $value[0]->largura ?></td>
                                                                <td><?= $value[0]->quantidade ?></td>
                                                                <td>R$ <?= number_format($value[0]->valor_faca, 2, ",", ".") ?></td>
                                                                <td>R$ <?= number_format($value[0]->sub_total, 2, ",", ".") ?></td>
                                                                <td><button onclick="open_faca_modal(<?= $key ?>, '<?= $value[0]->nome ?>')" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                                <td><a class="btn btn-danger btn-sm" href="<?= base_url("cartao/faca_sessao_excluir/{$key}") ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($_SESSION['laminacao']) {
                                                        foreach ($_SESSION['laminacao'] as $key => $value) {
                                                            ?>
                                                            <tr>
                                                                <td>Laminação</td>
                                                                <td><?= $value[0]->nome ?></td>
                                                                <td><?= $this->session->cartao->quantidade ?></td>
                                                                <td>R$ <?= number_format($value[0]->valor_unitario, 3, ",", ".") ?></td>
                                                                <td>R$ <?= number_format($value[0]->sub_total, 2, ",", ".") ?></td>
                                                                <td><button onclick="open_laminacao_modal(<?= $key ?>, '<?= $value[0]->nome ?>')" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                                <td><a class="btn btn-danger btn-sm" href="<?= base_url("cartao/laminacao_sessao_excluir/{$key}") ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($_SESSION['colagem']) {
                                                        foreach ($_SESSION['colagem'] as $key => $value) {
                                                            ?>
                                                            <tr>
                                                                <td>Colagem</td>
                                                                <td><?= $value->nome ?></td>
                                                                <td><?= $this->session->cartao->quantidade ?></td>
                                                                <td>R$ <?= number_format($value->valor_unitario, 3, ",", ".") ?></td>
                                                                <td>R$ <?= number_format($value->sub_total, 2, ",", ".") ?></td>
                                                                <td><button onclick="open_colagem_modal(<?= $key ?>, '<?= $value->nome ?>')" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                                <td><a class="btn btn-danger btn-sm" href="<?= base_url("cartao/colagem_sessao_excluir/{$key}") ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>  

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('_include/footer'); ?>
        </div>
    </body>
    <!-- Modal Impressão -->
    <div class="modal fade" id="myModal_impressao" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form id="form_impressao" action="Cartao/impressao_sessao_inserir" method="POST" role="form">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Impressão</h4>
                    </div>
                    <div class="modal-body">
                        <select id="form_impressao_select" class="form-control" name="impressao">
                            <option value="">Selecione</option>
                            <?php
                            foreach ($impressao as $key => $value) {
                                ?>
                                <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button id="form_impressao_acao" type="submit" class="btn btn-success" >Adicionar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Papel -->
    <div class="modal fade" id="myModal_papel" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form id="form_papel" action="Cartao/papel_sessao_inserir" method="POST" role="form">
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
                                foreach ($papel as $key => $value) {
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
            <form id="form_acabamento" action="Cartao/acabamento_sessao_inserir" method="POST" role="form">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Acabamento</h4>
                    </div>
                    <div class="modal-body">
                        <label class="control-label" for="acabamento"> Acabamento:</label>
                        <div class="form-group">
                            <select id="form_acabamento_select" class="form-control" name="acabamento">
                                <option value="">Selecione</option>
                                <?php
                                foreach ($acabamento as $key => $value) {
                                    ?>
                                    <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <label class="control-label" for="quantidade"> Quantidade:</label>
                        <input class="form-control" name="quantidade" value="" placeholder="Quantidade de acabamento">
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
            <form id="form_faca" action="Cartao/faca_sessao_inserir" method="POST" role="form">
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
                                foreach ($faca as $key => $value) {
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
    <!-- Modal laminacao -->
    <div class="modal fade" id="myModal_laminacao" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form id="form_laminacao" action="Cartao/laminacao_sessao_inserir" method="POST" role="form">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Laminação</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="Laminacao">Laminação:</label>
                            <select id="form_laminacao_select" class="form-control" name="laminacao">
                                <?php
                                foreach ($laminacao as $key => $value) {
                                    ?>
                                    <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <label class="control-label" for="quantidade"> Quantidade:</label>
                        <select name="quantidade" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <label class="control-label" for="valor"> Valor:</label>
                        <input class="form-control" name="valor" value="" placeholder="Insira o valor total do Cartão de laminação">
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
            <form id="form_colagem" action="Cartao/colagem_sessao_inserir" method="POST" role="form">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Colagem</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="nome" value="Colagem">
                        <label class="control-label" for="valor"> Valor:</label>
                        <input class="form-control" name="valor" value="" placeholder="Insira o valor total do Cartão de Colagem">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button id="form_colagem_acao" type="submit" class="btn btn-success" >Adicionar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Cartão -->
    <div class="modal fade" id="myModal_cartao" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form id="form_cartao" action="Cartao/criar_cartao" method="POST" role="form">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cartão</h4>
                    </div>
                    <div class="modal-body">
                        <label class="control-label" for="quantidade"> Quantidade:</label>
                        <input class="form-control" name="quantidade" value="<?php
                        if ($this->session->cartao->quantidade != NULL) {
                            print $this->session->cartao->quantidade;
                        }
                        ?>" placeholder="Quantidade do pedido">
                        <label class="control-label" for="desconto"> Desconto:</label>
                        <input class="form-control" name="desconto" value="<?php
                        if ($this->session->cartao->desconto != NULL) {
                            print $this->session->cartao->desconto;
                        }
                        ?>" placeholder="Valor do desconto para este Cartão">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button id="form_faca_acao" type="submit" class="btn btn-success" >Adicionar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function open_impressao_modal(posicao, nome) {
            document.getElementById('form_impressao').action = "cartao/impressao_sessao_editar/" + posicao;
            $('#myModal_impressao').modal('show');
        }
        function open_papel_modal(posicao, nome) {
            document.getElementById('form_papel').action = "cartao/papel_sessao_editar/" + posicao;
            $('#myModal_papel').modal('show');
        }
        function open_acabamento_modal(posicao, nome) {
            document.getElementById('form_acabamento').action = "cartao/acabamento_sessao_editar/" + posicao;
            $('#myModal_acabamento').modal('show');
        }
        function open_faca_modal(posicao, nome) {
            document.getElementById('form_faca').action = "cartao/faca_sessao_editar/" + posicao;
            $('#myModal_faca').modal('show');
        }
        function open_colagem_modal(posicao, nome) {
            document.getElementById('form_colagem').action = "cartao/colagem_sessao_editar/" + posicao;
            $('#myModal_colagem').modal('show');
        }
        function open_laminacao_modal(posicao, nome) {
            document.getElementById('form_laminacao').action = "cartao/laminacao_sessao_editar/" + posicao;
            $('#myModal_laminacao').modal('show');
        }
        function open_cartao_modal() {
            document.getElementById('form_cartao').action = "cartao/editar_cartao";
            $('#myModal_cartao').modal('show');
        }
        $('input[type=radio]').change(function () {
            var x = document.getElementById("empastamento_valor").disabled;
            if (x == true) {
                document.getElementById("empastamento_valor").disabled = false;
            }
            else {
                document.getElementById("empastamento_valor").disabled = true;
            }
        });
    </script>
</html>