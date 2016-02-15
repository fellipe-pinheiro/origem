<?php empty($crud) ? $crud = 'Objeto' : $crud; ?>
<script type="text/javascript">
    $(document).ready(function () {
        // confirmar antes de apagar
        $(".deletar").click(function () {
            var id = $(".deletar").parent().parent().children("td:first").text();
            return confirm("<?= $crud ?> ID:"+id+" sera apagado!");
        });

        // Adicionar icone nos botoes
        $(".inserir").prepend(' <span class="glyphicon glyphicon-plus"></span> ');
        $(".deletar").prepend(' <span class="glyphicon glyphicon-trash"></span> ');
        $(".editar").prepend(' <span class="glyphicon glyphicon-pencil"></span> ');

        // Filtrar Tabela
        $("#txtPesquisar").keyup(function () {
            var rows = $("#fbody").find("tr").hide();
            var data = this.value.split(" ");
            $.each(data, function (i, v) {
                rows.filter(":contains('" + v.toLowerCase() + "')").show();
            });
        });
    });
</script>