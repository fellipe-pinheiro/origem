<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= base_url() ?>">Origem</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Orçamento <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url('orcamento') ?>">Orçamento</a></li>
                        <li><a href="<?= base_url('servico') ?>">Serviço</a></li>
                        <li><a href="<?= base_url('cartao') ?>">Cartão</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Banco de dados <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url('acabamento') ?>">Acabamento</a></li>
                        <li><a href="<?= base_url('faca') ?>">Faca</a></li>
                        <li><a href="<?= base_url('faca_cartao') ?>">Faca p/ cartão</a></li>
                        <li><a href="<?= base_url('papel') ?>">Papel</a></li>
                        <li><a href="<?= base_url('impressao') ?>">Impressão Serviço</a></li>
                        <li><a href="<?= base_url('impressao_cartao') ?>">Impressão Cartão</a></li>
                        <li><a href="<?= base_url('impressao_formato') ?>">Área Impressão</a></li>
                        <li><a href="<?= base_url('fotolito') ?>">Fotolito</a></li>
                        <li><a href="<?= base_url('laminacao') ?>">Laminação</a></li>
                        <li><a href="<?= base_url('frete') ?>">Frete</a></li>
                        <li><a href="<?= base_url('nota') ?>">Nota</a></li>
                        <li><a href="<?= base_url('cliente') ?>">Cliente</a></li>
                        <li><a href="<?= base_url('usuario') ?>">Usuario</a></li>
                    </ul>
                </li>

                <li>
                    <a href="<?= base_url('login') ?>">Login</a>
                </li>
                <?php /* if ($this->session->usuario == NULL) { ?>
                    <li>
                        <a href="#">
                            <span  class="glyphicon glyphicon-user" style="color: red"></span>
                        </a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a href="#">
                            <span  class="glyphicon glyphicon-user" style="color: greenyellow"></span>
                            <?= $this->session->usuario['nome'] ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('login/logout') ?>">
                            <span  class="glyphicon glyphicon-log-out"></span>
                            Logout
                        </a>
                    </li>
                <?php } */?>
            </ul>
        </div>
    </div>
</nav>
