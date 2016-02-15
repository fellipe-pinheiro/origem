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
                        <li><a href="<?= base_url('cartao_visita') ?>">Cartão de Visita</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Banco de dados <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url('acabamento') ?>">Acabamento</a></li>
                        <li><a href="<?= base_url('faca') ?>">Faca</a></li>
                        <li><a href="<?= base_url('papel') ?>">Papel</a></li>
                        <li><a href="<?= base_url('impressao') ?>">Impressão</a></li>
                        <li><a href="<?= base_url('impressao_formato') ?>">Impressão Formato</a></li>
                        <li><a href="<?= base_url('fotolito') ?>">Fotolito</a></li>
                        <li><a href="<?= base_url('laminacao') ?>">Laminação</a></li>
                        <li><a href="<?= base_url('frete') ?>">Frete</a></li>
                        <li><a href="<?= base_url('nota') ?>">Nota</a></li>
                        <li><a href="<?= base_url('cliente') ?>">Cliente</a></li>
                        <li><a href="<?= base_url('corte_vinco') ?>">Corte e Vinco</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>