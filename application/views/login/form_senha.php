<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => 'Home']); ?>
    <style type="text/css">
        .form-signin {
            max-width: 300px;
            margin: 0 auto;
        }
        .form-signin-heading{
            text-align: center;
        }
    </style>
    <body>
        <div class="container">
            <?= form_open(base_url('login/gravar_senha'), 'class="form-signin"') ?>
            <h1 class="form-signin-heading">Digite sua senha</h1>
            <?= form_error('senha_conf') ?>

            <?= form_hidden('id', $id) ?>
            <?= form_label('Senha: ', 'senha') ?>
            <?= form_password('senha', '', ' id="senha" class="form-control" placeholder="Senha" autofocus required') ?>

            <?= form_label('Confirmar Senha: ', 'senha_conf') ?>
            <?= form_password('senha_conf', '', ' id="senha_conf" class="form-control" placeholder="Confirmar Senha" required') ?>

            <hr>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Gravar</button>
            <?= form_close() ?>
            <?php $this->load->view('_include/footer'); ?>
        </div>
    </body>
</html>