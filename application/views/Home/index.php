<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => 'Home']); ?>
    <body>

        <?php $this->load->view('_include/menu'); ?>
        <div class="container">
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h1 style="color: green">Origem</h1>
                    </div>
                </div>
            </div>
            
            <?php $this->load->view('_include/footer'); ?>
        </div>
    </body>
</html>