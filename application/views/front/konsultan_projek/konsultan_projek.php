<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>
            <?= $title_page ?>
        </title>
        <?php $this->load->view('front/static/files'); ?>
    </head>

    <body id="top" class="homeStyleSeven style7">
        <!-- preloader-wrap -->
        <div id="preloader">
            <div class="preloader-top"></div>
            <div class="preloader-bottom"></div>
        </div>
        <!-- preloader-wrap -->


        <div class="allWrapper">
            <?php $this->load->view('front/include/top'); ?>
            <?php $this->load->view('front/include/menu'); ?>
            <?php $this->load->view('front/include/modal'); ?>

            <div style="margin-top:200px;"></div>
            <section class="aboutSuccess clearfix sections" id="successStory">
                <div class="sectionWrapper">
                    <div class="container">
                        <div class="row">
                            <div class="successWrapper">
                                <div class="col-sm-12 noPadding">
                                    <div class="successContent">
                                        <center>
                                            <h2>Konsultan & <span class="yellowTxt">Projek</span></h2></center>
                                    </div>
                                    <!-- end of successContent -->
                                </div>
                                <!-- end of col7 -->
                            </div>
                            <!-- end of successWrapper -->

                        </div>
                        <!-- end of row-->
                    </div>
                    <!-- end of container -->
                </div>
                <!-- end of sectionWrapper  -->
            </section>
            <!-- end of aboutSuccess-->
            <section class=" clearfix section">
                <div class="sectionWrapper">
                    <div class="container">
                        <div class="col-lg-12">
                            <img src="<?= base_url() . 'assets/images/backend/consultant.PNG' ?>">
                        </div>
                        <!-- end of row -->
                    </div>
                    <!-- end of container -->
                </div>
                <!-- end of sectionWrapper -->
            </section>
            <!-- end of latestNewsUpdate -->



            <?php $this->load->view('front/include/footer_menu'); ?>
        </div>
        <!-- end of allWrapper -->

</html>