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
                        <li><a href="<?= base_url('servico') ?>"><span class="glyphicon glyphicon-arrow-right"></span> Orçamento</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?= base_url('orcamento') ?>"><span class="glyphicon glyphicon-list-alt"></span> Lista de Orçamentos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Banco de dados <span class="caret"></span></a>
                    <ul class="dropdown-menu" id="menu_banco_dados">
                        <li><a href="<?= base_url('acabamento') ?>"><span class="glyphicon glyphicon-scissors"></span> Acabamento</a></li>
                        <li><a href="<?= base_url('acabamento_2') ?>"><span class="glyphicon glyphicon-tags"></span> Acabamento (2)</a></li>
                        <li><a href="<?= base_url('faca') ?>"><span class="glyphicon glyphicon-wrench"></span> Faca (Serviço)</a></li>
                        <li><a href="<?= base_url('faca_cartao') ?>"><span class="glyphicon glyphicon-wrench"></span> Faca (Cartão)</a></li>
                        <li><a href="<?= base_url('papel') ?>"><span class="glyphicon glyphicon-file"></span> Papel</a></li>
                        <li><a href="<?= base_url('impressao') ?>"><span class="glyphicon glyphicon-print"></span> Impressão (Serviço)</a></li>
                        <li><a href="<?= base_url('impressao_cartao') ?>"><span class="glyphicon glyphicon-print"></span> Impressão (Cartão)</a></li>
                        <li><a href="<?= base_url('impressao_formato') ?>"><span class="glyphicon glyphicon-bookmark"></span> Área Impressão</a></li>
                        <li><a href="<?= base_url('fotolito') ?>"><span class="glyphicon glyphicon-picture"></span> Fotolito</a></li>
                        <!--<li><a href="<?= base_url('laminacao') ?>">Laminação</a></li>-->
                        <li><a href="<?= base_url('frete') ?>"><span class="glyphicon glyphicon-plane"></span> Frete</a></li>
                        <li><a href="<?= base_url('nota') ?>"><span class="glyphicon glyphicon-file"></span> Nota</a></li>
                        <li><a href="<?= base_url('cliente') ?>"><span class="glyphicon glyphicon-user"></span> Cliente</a></li>
                        <li><a href="<?= base_url('usuario') ?>"><span class="glyphicon glyphicon-user"></span> Usuário</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Documentação <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url('documentacao') ?>"><span class="glyphicon glyphicon-education"></span> Banco de dados</a></li>
                        <li><a href="<?= base_url('documentacao/orcamento') ?>"><span class="glyphicon glyphicon-education"></span> Serviço</a></li>
                        <li><a href="<?= base_url('documentacao/impressao') ?>"><span class="glyphicon glyphicon-education"></span> Impressão</a></li>
                    </ul>
                </li>
                <?php if (usuario_logado()) { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span  class="glyphicon glyphicon-user" style="color: greenyellow"></span> <?= $_SESSION['usuario']->login ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?= base_url('login/logout') ?>">
                                    <span  class="glyphicon glyphicon-log-out"></span> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li>
                        <a href="<?= base_url('login') ?>">Login</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<script>
    //ORDENA A LISTA DE LINKS
    var mylist = $('#menu_banco_dados');
    var listitems = mylist.children('li').get();
    listitems.sort(function (a, b) {
        return $(a).text().toUpperCase().localeCompare($(b).text().toUpperCase());
    })
    $.each(listitems, function (idx, itm) {
        mylist.append(itm);
    });
</script>
