<!--MENSAGENS IDE SUCESSO OU ERRO NAS PAGINAS DE CRUD-->
<script>
    $(document).ready(function () {
        $("#msg").fadeOut(5000);
    });
</script>
<?php
if (!empty($_GET['type'])) {
    if ($_GET['type'] == 'sucesso') {
        $classe = 'success';
        $strong = 'Successo!';
        $msg = 'Operação realizada com sucesso!';
    } else {
        $classe = 'danger';
        $strong = 'Erro!';
        $msg = 'Não foi possível realizar esta operação!';
    }
    ?>
    <div id="msg" class="alert alert-<?= $classe ?> fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong><?= $strong ?></strong> <?= $msg ?>
    </div>
    <?php
}
?>