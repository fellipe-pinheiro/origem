<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => 'Home']); ?>
    <style type="text/css">
        .form-signin {
            max-width: 300px;
            margin: 0 auto;
        }
        .form-signin-heading{
            color: green;
            text-align: center;
            font-size: 60px;
        }
    </style>
    <body>
        <div class="container">
            <?= form_open(base_url('login/logar'), 'class="form-signin"') ?>
            <h1 class="form-signin-heading">Origem</h1>
            <?= form_error('senha')?>
            <?= form_label('Login: ', 'login', array('class' => 'sr-only')) ?>
            <?= form_input('login', set_value('login'), ' id="login" class="form-control" placeholder="Login" autofocus required') ?>

            <?= form_label('Senha: ', 'senha', array('class' => 'sr-only')) ?>
            <?= form_password('senha', '', ' id="senha" class="form-control" placeholder="Senha"') ?>

            <hr>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
            <?= form_close() ?>

            <?php $this->load->view('_include/footer'); ?>
        </div>
    </body>
</html>