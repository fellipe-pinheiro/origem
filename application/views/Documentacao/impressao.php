<!DOCTYPE html>
<html>
    <?php $this->load->view('_include/head', ['titulo' => 'Documentação']); ?>
    <style>
        img {
            width: 70%;
            margin: auto;
        }
    </style>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        })
    </script>
    <body class="text-left">
        <?php $this->load->view('_include/menu'); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php echo img(base_url('/assets/img/tutorial.png')); ?>
                </div>
                <div class="col-md-4">
                    <div class="alert alert-success" role="alert" data-toggle="tooltip" data-placement="auto" title="Clique nos links para mais informações">
                        <a href="#" class="alert-link" data-toggle="modal" data-target="#area_impressao"><strong>1.</strong>
                            Inserir no banco de dados primeiro a área de impressão
                        </a>
                    </div>
                    <div class="alert alert-success" role="alert" data-toggle="tooltip" data-placement="auto" title="Clique nos links para mais informações">
                        <a href="#" class="alert-link" data-toggle="modal" data-target="#fotolito"><strong>2.</strong>
                            Inserir no banco de dados o fotolito associado a área de impressão
                        </a>
                    </div>
                    <div class="alert alert-success" role="alert" data-toggle="tooltip" data-placement="auto" title="Clique nos links para mais informações">
                        <a href="#" class="alert-link" data-toggle="modal" data-target="#impressao"><strong>3.</strong>
                            Inserir no banco de dados a impressão associada a área de impressão
                        </a>
                    </div>
                    <div class="alert alert-success" role="alert" data-toggle="tooltip" data-placement="auto" title="Clique nos links para mais informações">
                        <a href="#" class="alert-link" data-toggle="modal" data-target="#funcionamento"><strong>4.</strong>
                            Funcionamento das ligações
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <!-- Modal Área de impressão -->
    <div class="modal fade" id="area_impressao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Área de impressão</h4>
                </div>
                <div class="modal-body">
                    <p>A área de impressão é a primeira tabela à ser preenchida.</p>
                    <p>Ela será a base para outras tabelas como: FOTOLITO, IMPRESSÃO  E IMPRESSÃO CARTÃO.</p>
                    <p>Nesta tabela você irá inserir vários tamanhos com a regra de ser um diferente de outro, pois não pode haver duas áreas com o mesmo tamanho.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Fotolito -->
    <div class="modal fade" id="fotolito" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Fotolito</h4>
                </div>
                <div class="modal-body">
                    <p>O Fotolito é a segunda tabela à ser preenchida no banco de dados.</p>
                    <p>Tendo agora as Áreas de Impressão, podemos ligar esta área à um Fotolito associando este fotolito a um valor.</p>
                    <p>Nesta tabela não faz sentido haver dois fotolitos do mesmo tamanho.</p>
                    <p>Caso tente inserir a mesma área de impressão, o banco de dados irá rejeitar esta ação, dizendo que não foi possível concluir esta operação.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Impressão -->
    <div class="modal fade" id="impressao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Impressão</h4>
                </div>
                <div class="modal-body">
                    <p>A impressão é última tabela à ser preenchida no banco de dados.</p>
                    <p>Tendo agora a Área de Impressão, podemos ligar esta área à uma Impressão associando esta impressão a um valor.</p>
                    <p>Nesta tabela podem haver várias impressões com o mesmo tamanho, pois exitem diversos tipo. Ex Alto Relevo, Baixo Relevo, Etc com o mesmo tamanho..</p>
                    <p>Cada impressão terá um valor referente ao trabalho e custo.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Funcionamento -->
    <div class="modal fade" id="funcionamento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Funcionamento</h4>
                </div>
                <div class="modal-body">
                    <p> Quando estiver fazendo o orçamento para o cliente, ao selecionar uma impressão, 
                        este irá buscar o fotolito associado ao mesmo tamanho. como na figura ilustrativa desta página.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</html>
