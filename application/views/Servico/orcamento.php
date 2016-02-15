<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
$titulo = 'Convite';
$titulo = 'Serviço';
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
                            <h3 class="panel-title">Serviços</h3>
                        </div>
                        <div class="panel-body">
                            <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#myModal_papel"><span class="glyphicon glyphicon-plus"></span> Papel</button>
                            <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#myModal_impressao"><span class="glyphicon glyphicon-plus"></span> Impressão</button>
                            <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#myModal_acabamento"><span class="glyphicon glyphicon-plus"></span> Acabamento</button>
                            <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#myModal_faca"><span class="glyphicon glyphicon-plus"></span> Faca</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?= $titulo ?></h3>
                        </div>
                        <div class="panel-body">
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
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Convite</td>
                                                        <td>100</td>
                                                        <td>R$ 8,60</td>
                                                        <td>R$ 860,00</td>
                                                        <td><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal_quantidade"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                    </tr>
                                                </tbody>
                                                        <td><?= $titulo ?></td>
                                                        <td><?= $this->session->servico->quantidade ?></td>
                                                        <td>R$ 8,60</td>
                                                        <td>R$ 860,00</td>
                                                        <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_servico"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                        <td><?= anchor(base_url('Servico/excluir_todos_servicos'), '<span class="glyphicon glyphicon-trash"></span>', 'class="btn btn-danger btn-sm"') ?></td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td><b>Descontos</b></td>
                                                        <td>R$ 
                                                            <?php
                                                            if ($this->session->servico->desconto == NULL) {
                                                                print '0,00';
                                                            } else {
                                                                print number_format($this->session->servico->desconto, 2, ",", ".");
                                                            }
                                                            ?>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td><b>Total</b></td>
                                                        <td>R$ 810,00</td>
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
                                    <h3 class="panel-title">Sessão</h3>
                                </div>
                                <div class="panel-body">
                                    <form>
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
                                                    $quantidade = 100;
                                                    if ($_SESSION['papel']) {
                                                        foreach ($_SESSION['papel'] as $key => $value) {
                                                            ?>
                                                            <tr>
                                                                <td>Papel</td>
                                                                <td><?= $value[0]->nome ?></td>
                                                                <td><?= $quantidade ?></td>
                                                                <td><?= $value[0]->valor ?></td>
                                                                <td>R$ <?php echo $quantidade * $value[0]->valor; ?></td>
                                                                <td><button onclick="open_papel_modal(<?= $key ?>, '<?= $value[0]->nome ?>')" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                                <td><a class="btn btn-danger btn-sm" href="<?= base_url("servico/papel_sessao_excluir/{$key}") ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                    $quantidade = 100;
                                                    if ($_SESSION['impressao']) {
                                                        foreach ($_SESSION['impressao'] as $key => $value) {
                                                            ?>
                                                            <tr>
                                                                <td>Impressão</td>
                                                                <td><?= $value[0]->nome ?> / <?= $value[0]->impressao_formato->nome ?>: <?= $value[0]->impressao_formato->altura ?>x<?= $value[0]->impressao_formato->largura ?></td>
                                                                <td><?= $quantidade ?></td>
                                                                <td><?= $value[0]->valor ?></td>
                                                                <td>R$ <?php echo $quantidade * $value[0]->valor; ?></td>
                                                                <td><button onclick="open_impressao_modal(<?= $key ?>, '<?= $value[0]->nome ?>')" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                                <td><a class="btn btn-danger btn-sm" href="<?= base_url("servico/impressao_sessao_excluir/{$key}") ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                    $quantidade = 100;
                                                    if ($_SESSION['acabamento']) {
                                                        foreach ($_SESSION['acabamento'] as $key => $value) {
                                                            ?>
                                                            <tr>
                                                                <td>Acabamento</td>
                                                                <td><?= $value[0]->nome?></td>
                                                                <td><?= $value[0]->nome ?></td>
                                                                <td><?= $quantidade ?></td>
                                                                <td><?= $value[0]->valor ?></td>
                                                                <td>R$ <?php echo $quantidade * $value[0]->valor; ?></td>
                                                                <td><button onclick="open_acabamento_modal(<?= $key ?>, '<?= $value[0]->nome ?>')" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                                <td><a class="btn btn-danger btn-sm" href="<?= base_url("servico/acabamento_sessao_excluir/{$key}") ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                    $quantidade = 100;
                                                    if ($_SESSION['faca']) {
                                                        foreach ($_SESSION['faca'] as $key => $value) {
                                                            ?>
                                                            <tr>
                                                                <td>Faca</td>
                                                                <td><?= $value[0]->nome ?></td>
                                                                <td><?= $quantidade ?></td>
                                                                <td><?= $value[0]->valor ?></td>
                                                                <td>R$ <?php echo $quantidade * $value[0]->valor; ?></td>
                                                                <td><button onclick="open_faca_modal(<?= $key ?>, '<?= $value[0]->nome ?>')" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                                <td><a class="btn btn-danger btn-sm" href="<?= base_url("servico/faca_sessao_excluir/{$key}") ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
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
            <form id="form_impressao" action="Servico/impressao_sessao_inserir" method="POST" role="form">
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
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                                foreach ($papel as $key => $value) {
                                    ?>
                                    <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <label class="control-label" for="quantidade"> Quantidade:</label>
                        <input class="form-control" name="quantidade" value="" placeholder="Quantidade de papeis">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="form_faca_acao" type="submit" class="btn btn-success" >Adicionar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Serviço -->
    <div class="modal fade" id="myModal_servico" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form id="form_faca" action="Servico/editar_pedido" method="POST" role="form">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Serviço</h4>
                    </div>
                    <div class="modal-body">
                        <label class="control-label" for="quantidade"> Quantidade:</label>
                        <input class="form-control" name="quantidade" value="<?php
                        if ($this->session->servico->quantidade != NULL) {
                            print $this->session->servico->quantidade;
                        }
                        ?>" placeholder="Quantidade do pedido">
                        <label class="control-label" for="desconto"> Desconto:</label>
                        <input class="form-control" name="desconto" value="<?php
                        if ($this->session->servico->desconto != NULL) {
                            print $this->session->servico->desconto;
                        }
                        ?>" placeholder="Valor do desconto para este serviço">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="form_faca_acao" type="submit" class="btn btn-success" >Adicionar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function open_impressao_modal(posicao, nome) {
            document.getElementById('form_impressao').action = "servico/impressao_sessao_editar/" + posicao;
            $('#myModal_impressao').modal('show');
        }
        function open_papel_modal(posicao, nome) {
            document.getElementById('form_papel').action = "servico/papel_sessao_editar/" + posicao;
            $('#myModal_papel').modal('show');
        }
        function open_acabamento_modal(posicao, nome) {
            document.getElementById('form_acabamento').action = "servico/acabamento_sessao_editar/" + posicao;
            $('#myModal_acabamento').modal('show');
        }
        function open_faca_modal(posicao, nome) {
            document.getElementById('form_faca').action = "servico/faca_sessao_editar/" + posicao;
            $('#myModal_faca').modal('show');
        }
    </script>
</html>