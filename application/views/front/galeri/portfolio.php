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
                                            <h2>Dokumentasi properti berupa <span class="yellowTxt"> portfolio </span>yang dapat dinikmati.</h2></center>
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
            <section class=" clearfix section" id="updateartikel">

                <div class="container">
                    <div class="row">
                        <div class="updatePosts clearfix" id="consLatestPost">
                            <div class="propertylistContent">
                                <div class="propertyGlarryWrapper clearfix" id="galleyColumn3">
                                    <?php foreach ($record as $each) { ?>

                                        <div class="portfolio-item col-sm-4">
                                            <div class="gallerySingleItem">
                                                <div class="portfolio-item-content">
                                                    <div class="itemThumbnail">

                                                        <img title="<?= $each->nama ?>" style="height: 250px;" src="<?= base_url() . BACKEND_IMAGE_DIRECTORY . 'portfolio/' . $each->image; ?>" alt="">
                                                        <div class="hoverBox">
                                                            <div class="smallIcon">
                                                                <a href="<?= base_url() . BACKEND_IMAGE_DIRECTORY . 'portfolio/' . $each->image; ?>" data-gal="prettyPhoto[gal]" class="viewDetials p-photo" title="<?= $each->nama ?>">View </a>
                                                            </div>
                                                            <!-- end of smallIcon -->
                                                        </div>
                                                        <!-- end of hoverBox -->
                                                    </div>
                                                    <!-- end of itemThumbnail -->
                                                </div>
                                                <!-- end of portfolio-item-content -->
                                            </div>
                                            <!-- end of gallerySingleItem -->
                                        </div>

                                    <?php } ?>
                                </div>
                                <!-- end of latestPost -->
                            </div>
                            <!-- end of row -->
                        </div>
                        <!-- end of container -->
                    </div>
                    <!-- end of sectionWrapper -->
                </div>
                <!-- end of container -->

            </section>
            <!-- end of latestNewsUpdate -->



            <?php $this->load->view('front/include/footer_menu'); ?>
        </div>
        <!-- end of allWrapper -->

</html>