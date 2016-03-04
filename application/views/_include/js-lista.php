<?php empty($crud) ? $crud = 'Objeto' : $crud; ?>

<script type="text/javascript" src="<?= base_url("assets/js/jquery.dataTables.js"); ?>"></script>
<script type="text/javascript" src="<?= base_url("assets/js/dataTables.bootstrap.min.js"); ?>"></script>

<link rel="stylesheet" href="<?= base_url("assets/css/dataTables.bootstrap.min.css"); ?>" />

<script type="text/javascript">
    $(document).ready(function () {
        // confirmar antes de apagar
        $(".deletar").click(function () {
            var id = $(".deletar").parent().parent().children("td:first").text();
            return confirm("<?= $crud ?> ID:"+id+" sera apagado!");
        });
    });
</script>