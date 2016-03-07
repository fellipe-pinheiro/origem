<?php empty($crud) ? $crud = 'Objeto' : $crud; ?>

<script type="text/javascript" src="<?= base_url("assets/js/jquery.dataTables.js"); ?>"></script>
<script type="text/javascript" src="<?= base_url("assets/js/dataTables.bootstrap.min.js"); ?>"></script>

<link rel="stylesheet" href="<?= base_url("assets/css/dataTables.bootstrap.min.css"); ?>" />

<script type="text/javascript">
    $(document).ready(function () {
        $('table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json"
            }
        });
    });
</script>