<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title><?= $title_page ?></title>    
        <?php $this->load->view('admin/static/files'); ?>    
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
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>            
            <!-- Widgets -->            
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="mdi mdi-flag-variant   mdi-36px"></i>
                        </div>
                        <div class="content">
                            <div class="text">Newest Temperature</div>
                            <div class="number count-to" data-from="0" data-to="<?=$last_value->suhu?>" data-speed="1000" data-fresh-interval="20"><?=$last_value->suhu?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="mdi mdi-flag-variant mdi-36px"></i>
                        </div>
                        <div class="content">
                            <div class="text">Newest Humidity</div>
                            <div class="number count-to" data-from="0" data-to="<?=$last_value->kelembapan?>" data-speed="1000" data-fresh-interval="20"><?=$last_value->kelembapan?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="mdi mdi-flag-variant mdi-36px"></i>
                        </div>
                        <div class="content">
                            <div class="text">Newest Light</div>
                            <div class="number count-to" data-from="0" data-to="<?=$last_value->cahaya?>" data-speed="1000" data-fresh-interval="20"><?=$last_value->cahaya?></div>
                        </div>
                    </div>
                </div>                
            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->

        </div>
    </section>
    <!-- Jquery Core Js -->

    <?php $this->load->view('admin/include/footer_menu'); ?>

</html>