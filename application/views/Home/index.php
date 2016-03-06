<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view('_include/head', ['titulo' => 'Home']); ?>
    <body>

        <?php $this->load->view('_include/menu'); ?>
        <div class="container">
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <?php  echo img(base_url('/assets/img/origem_logo_200x200.png')); ?>
                    </div>
                </div>
            </div>
            <br><br><br><br><br><br><br><br><br><br>
            <?php $this->load->view('_include/footer'); ?>
        </div>
    </body>
</html>