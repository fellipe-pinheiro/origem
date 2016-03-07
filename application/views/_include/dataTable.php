<link rel="stylesheet" href="<?= base_url("assets/css/dataTables.bootstrap.min.css"); ?>" />

<script type="text/javascript" src="<?= base_url("assets/js/jquery.dataTables.js"); ?>"></script>
<script type="text/javascript" src="<?= base_url("assets/js/dataTables.bootstrap.min.js"); ?>"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var table = $('table').dataTable({
            "language": {
                "url": "<?= base_url("assets/idioma/dataTable-pt.json") ?>"
            }
        });

        $('table tbody').on('click', 'tr', function () {
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
            }
            else {
                table.$('tr.active').removeClass('active');
                $(this).addClass('active');
            }
        });
    });
</script>
<style type="text/css">
    tr.active{
        font-weight: bolder;
    }
</style>