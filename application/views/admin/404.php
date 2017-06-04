<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>404 </title>    
    <?php $this->load->view('static/files'); ?>    
    <script src="<?= BACKEND_STATIC_FILES ?>plugins/jquery-countto/jquery.countTo.js"></script>
</head>

    <?php 
    $this->load->view('admin/include/function'); 
    $this->load->view('admin/include/modal'); 
    $this->load->view('admin/include/top_menu'); 
    $this->load->view('admin/include/sidebar_menu');     
    ?>
        <section class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card">
                        <div class="body bg-red">
                            Mohon maaf, halaman tidak ditemukan.
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Jquery Core Js -->

        <?php $this->load->view('admin/include/footer_menu'); ?>

</html>